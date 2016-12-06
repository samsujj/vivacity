<?php


//set and submit landing page 2nd step

global $AI;
require_once(ai_cascadepath('includes/plugins/landing_pages/class.landing_pages.php'));
require_once(ai_cascadepath('includes/modules/mlmsignup/class.enrollment_lp.php'));

require_once(ai_cascadepath('includes/modules/genealogy/class.genealogy.php'));

$gene            = new C_genealogy( $AI->get_setting('structure_show_genealogy') ? C_genealogy::GENEALOGY_TREE : C_genealogy::ENROLLER_TREE );
$is_logged_in    = $AI->user->isLoggedIn();
$is_admin        = $AI->get_access_group_perm('Administrators');
$is_in_genealogy = $is_logged_in ? $gene->is_descendant(AI_STRUCTURE_NODE_ROOT, util_affiliate_id()) : false;


$landing_page = new C_landing_pages('prelauchtest');
$landing_page->next_step = 'prelaunchtest';
$landing_page->pp_create_campaign = true;

$landing_page->css_error_class = 'lp_error';


//add validation rule

$landing_page->add_validator('first_name', 'is_length', 3,'Invalid First Name');
$landing_page->add_validator('last_name', 'is_length', 3,'Invalid Last Name');
$landing_page->add_validator('bill_address_line_1', 'is_length', 5,'Invalid Billing Address');
$landing_page->add_validator('bill_city', 'is_length', 5,'Invalid City');
$landing_page->add_validator('bill_region', 'is_length', 2,'Invalid State');
$landing_page->add_validator('bill_country', 'is_length', 2,'Invalid Country');
$landing_page->add_validator('bill_postal_code', 'is_length', 5,'Invalid Postal Code');
$landing_page->add_validator('email', 'util_is_email','','Invalid Email Address');
$landing_page->add_validator('phone', 'is_phone','','Invalid Phone Number');
$landing_page->add_validator('besttime', 'is_length', 3,'Invalid \'Best time to call\'');

$landing_page->add_validator('card_name', 'is_length', 3,'Invalid Name on Card');
$landing_page->add_validator('card_number', 'is_length', 14,'Invalid Card Number');
$landing_page->add_validator('card_type', 'is_length', 2,'Invalid Card Type');
$landing_page->add_validator('card_exp_mo', 'card_expire_check', '','Invalid Card Expiration');
$landing_page->add_validator('card_cvv', 'is_length', 3,'Invalid Card Security Code (CVV)');

$landing_page->card_type_options = array('visa'=>'Visa','mast'=>'Mastercard','amx'=>'American Express','disc'=>'Discover');
$landing_page->no_ship_addr = true;

if(util_is_POST()) {
    $landing_page->validate();
    if($landing_page->has_errors()) { $landing_page->display_errors(); }
    else {
        //save user as distributor
        $landing_page->save_user('Distributor');
        if($landing_page->has_errors()) { $landing_page->display_errors(); }
        else {
            //save oreder
            $landing_page->save_order();
            if($landing_page->has_errors()) { $landing_page->display_errors(); }
            else
            {
                // Subscribe them to the drip campaign
                $landing_page->pp_drip_opt_in();

                //$this->goto_next_step();


                $util_rep_id = 100;

                if(util_rep_id()){
                    $util_rep_id = util_rep_id();
                }

                // add user at geneology tree

                $gene = new C_genealogy(C_genealogy::GENEALOGY_TREE);
                try
                {
                    $gene->insert_node($landing_page->session['created_user'], $util_rep_id, null, 'stop', true);
                }
                catch ( NodeAlreadyInTreeException $naite )
                {
                    $data = $naite->get_data();
                    if ( $data['parent'] != $util_rep_id )
                    {
                        $gene->move_sub_tree($landing_page->session['created_user'], $util_rep_id, 0);
                    }
                }

                // add user at enrollment tree

                $gene = new C_genealogy(C_genealogy::ENROLLER_TREE);
                try
                {
                    $gene->insert_node($landing_page->session['created_user'], $util_rep_id, null, 'stop', true);
                }
                catch ( NodeAlreadyInTreeException $naite )
                {
                    $data = $naite->get_data();
                    if ( $data['parent'] != $util_rep_id )
                    {
                        $gene->move_sub_tree($landing_page->session['created_user'], $util_rep_id, 0);
                    }
                }

                header('Location : prelaunch');
            }
        }
    }
}

$landing_page->refill_form();



?>

<form name="landing_page" id="landing_page" action="<?=$_SERVER['REQUEST_URI']?>" method="post">

<!--<form method="post" name="form" onSubmit="return validate(this)">-->
    <input name="pid" type="hidden" value="1">
    <input type="hidden" name="form_time" value="<?= date('Y-m-d H:i:s') ?>" />
    <p>
        <label for="first_name">user Name:</label>
        <input name="username" type="text" id="username" />
    </p>
    <p>
        <label for="last_name">password</label>
        <input name="password" type="password" id="password" />

    </p>
    <p>
        <label for="first_name">First Name:</label>
        <input name="first_name" type="text" id="first_name" />
    </p>
    <p>
        <label for="last_name">Last Name</label>
        <input name="last_name" type="text" id="last_name" />

    </p>
    <p>
        <label for="bill_address_line_1">Address</label>
        <input name="bill_address_line_1" type="text" id="bill_address_line_1" value="" />
    </p>
    <p>
        <label for="bill_city">City</label>
        <input name="bill_city" type="text" id="bill_city" value="" />
    </p>

    <p>

        <label for="bill_country">Country</label>
        <?php $landing_page->draw_country_select('bill_'); ?>
    </p>


    <p>
        <label for="bill_region">State</label>
        <?php $landing_page->draw_region_select('bill_'); ?>
    </p>
    <!--
        <p>
    <label for="">Province/Other</label>

    <input type="hidden" name="question[40]" value="Other state"  />
<input type="text" name="answer[40]" value="" onChange="this.form.state.selectedIndex=1"  />
        </p>
    -->
    <p>
        <label for="bill_postal_code">Zip / Postal Code</label>
        <input name="bill_postal_code" type="text" id="bill_postal_code" />
    </p>
    <p>
        <label for="phone">Phone</label>
        <input name="phone" type="text" id="phone" />
    </p>

    <p>
        <label for="email">Email</label>
        <input name="email" type="text" id="email"  />
    </p>
    <p>
        <label for="besttime">Best Time to Call</label>
        <select name="besttime" id="besttime">
            <?php $landing_page->draw_besttime_options(); ?>
        </select>
    </p>
    <h3 id="two">Enter your billing information - SECURE</h3>

    <p>
        <label for="card_name">Name on Credit Card</label>
        <input name="card_name" type="text" id="card_name" value="" />
    </p>
    <p>
        <label for="card_number">Credit Card Number</label>
        <input name="card_number" type="text" id="card_number" value="" />
        <!--<strong class="secure">Secure</strong>--></p>
    <p>
        <label for="card_type">Credit Card Type</label>
        <select name="card_type" class="col1 cc_type" id="card_type">
            <?php $landing_page->draw_card_type_options(); ?>
        </select>
    </p>
    <p>
        <label for="card_exp_mo">Expiration Date</label>
        <select name="card_exp_mo" id="card_exp_mo">
            <?php $landing_page->draw_card_month_options_short(); ?>
        </select>
        /
        <select name="card_exp_yr" id="card_exp_yr">
            <?php $landing_page->draw_card_year_options_short(); ?>
        </select>

    </p>
    <p>
        <label for="card_cvv">Card CVV#</label>

        <input name="card_cvv" type="text" id="card_cvv" value="" style='width:50px;' />
    </p>

    <div style="font-size:12px;color:black;text-align:center;">
        <input type="checkbox" name="iagreetoit" id="iagreetoit" value="Y" />
        I agree to your Terms &amp; Conditions.
        <br />
        &nbsp;
    </div>
<!--    <center><input type="submit" name="Submit" onclick="javascript:noPopup();" /></center>-->

    <input type="submit" value="Submit">

    </fieldset>
</form>