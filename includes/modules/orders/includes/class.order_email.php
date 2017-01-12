<?php
/**
 *Samuel Larkin 2015.6.15 updated to use C_system_email
 */

require_once( ai_cascadepath('includes/plugins/dynamic_areas/includes/class.te_dynamic_areas.php') );
require_once( ai_cascadepath('includes/modules/orders/includes/class.orders.php') );
require_once( ai_cascadepath('includes/plugins/system_emails/class.system_emails.php') );

/**
*
*/
class C_order_email
{
	var $order_id = '';
	var $site_name = '';
	var $_body = '';
	var $_admin_email = '';
	var $_contact_email = '';
	var $http_url = '';
	var $_crlf = '<br>';
	var $confirm_email = '';
	var $use_default_email=true;
	var $confirm_name = '';
	var $errors = array();
	var $send_to_admin;
	var $order;
	var $sys_email_title;
	var $vars;
	var $default_vars;

	var $subject = 'order receipt';


	var $emailcontent='<div style="background-color:white; border:1px solid #AAA;
            max-width: 500px;
            margin:0 auto;
            -webkit-border-radius:15px; -moz-border-radius:15px; border-radius:15px;
            font-size:11px; font-family:arial,helvetica,sans-serif;
            padding:20px;">
  [[top]]
  <br>
  <table width="100%" style="font-size:11px; font-family:arial,helvetica,sans-serif; color:#666;">
    <tbody><tr>
      <td valign="top">
        <span style="color:#000; font-size:13px; font-weight:bold">Order ID: [[order_ID]]</span>
      </td><td valign="top">
        <span style="float:right; font-size:11px; color:#666;">[[date_added]]</span>
      </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
      <td valign="top">
        <span style="color:#000; font-weight:bold">Address</span><br>
        [[first_name]] [[last_name]]<br>
        [[address_line_1]] [[address_line_2]] <br>
        [[city]],&nbsp;[[region]]&nbsp;[[postal_code]]
      </td><td valign="top">
        <span style="color:#000; font-weight:bold">Placed By</span><br>
        [[placed_by]]<br>
        [[[phone]]<br>
        [[confirmation_email]]
      </td>
    </tr>
    </tbody></table>
  <br>
  [[comments]]
  <table align="center" border="0" cellpadding="0" cellspacing="0" style="clear:both;color:#666!important;font-family:arial,helvetica,sans-serif;font-size:11px" width="100%">
    <tbody>
      <tr>
        <td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#000!important" width="350" align="left">
          Description
        </td>
        <td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#333!important" width="100" align="right">
          Unit price
        </td>
        <td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#000!important" width="50" align="right">
          Qty
        </td>
        <td style="border:1px solid #ccc;border-right:none;border-left:none;padding:5px 10px 5px 10px!important;color:#000!important" width="80" align="right">
          Amount
        </td>
      </tr>
      <tr><td colspan="4">[[order_details]]</td></tr>
    </tbody>
  </table>

  <table align="left" border="0" cellpadding="0" cellspacing="0" style="float:none;border-top:1px solid #ccc;border-bottom:1px solid #ccc;clear:both;color:#666666!important;font-family:arial,helvetica,sans-serif;font-size:11px" width="100%">
    <tbody>
      <tr>
        <td>
          <table border="0" cellpadding="0" cellspacing="0" style="color:#666666!important;font-family:arial,helvetica,sans-serif;font-size:11px;margin:20px 5px 0 0;clear:both;" align="right" width="300">
            <tbody>
              <tr>
                <td style="width:390px;text-align:right;padding:0 10px 0 0">
                  <strong>Subtotal</strong>
                </td>
                <td style="width:90px;text-align:right;padding:0 5px 0 0">
                  $[[subtotal]]
                </td>
              </tr>
              <tr>
                <td style="width:390px;text-align:right;padding:0 10px 0 0">
                  <strong>Shipping</strong>
                </td>
                <td style="width:90px;text-align:right;padding:0 5px 0 0">
                  $[[shipping]]
                </td>
              </tr>
              <tr>
                <td style="width:390px;text-align:right;padding:0 10px 0 0">
                  <strong>Tax</strong>
                </td>
                <td style="width:90px;text-align:right;padding:0 5px 0 0">
                  $[[tax]]
                </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
              <tr>
                <td style="width:390px;text-align:right;padding:0 10px 0 0">
                  <strong>Total</strong>
                </td>
                <td style="width:90px;text-align:right;padding:0 5px 0 0;">
                  <strong>$[[total]]</strong>
                </td>
              </tr>
              <tr><td>&nbsp;</td></tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <div>
    [[coupon]]
  </div>
  [[custom_receipt_messages]]
  <div>
  </div>
  [[bott]]
  <div style="clear:both; margin:10px; display:block;">&nbsp;</div>
</div>';

	// Quick-n-Dirty: custom FROM: address for outgoing emails to customers -JonJon 2009-07-02 11:38:51 -1000
	var $custom_from = AI_CONTACTEMAIL;

	/**
	 * @param $send_to_admin string set to 'yes','no', or '' for default
	 */
	function C_order_email($order_id = '', $order_object=null,$email_to_admin='',$send_to='',$sys_email_title='order_success')
	{
		global $AI;

		if($send_to != ''){$this->confirm_email=$send_to;$this->use_default_email=false;}

		if($order_object!=null) $this->order=$order_object;

		if($order_id>0) {
			if($order_object===null) {
				$this->order = new C_order($order_id);
			}
			$this->set_order($order_id);
		}

		$this->site_name = $AI->get_setting('siteName');

			$this->_contact_email = $AI->get_setting('contactEmail');


		$this->_admin_email = $AI->get_setting('contactEmail');
		$this->http_url = $AI->get_setting('HTTP_URL');

		$this->sys_email_title = $sys_email_title;

		$this->send_to_admin = false;
		if($email_to_admin == '' && $AI->get_setting('send_order_email_copy_to_admin') == 'Yes')
		{
			$this->send_to_admin = true;
		}
		else if(strtolower($email_to_admin) == 'yes')
		{
			$this->send_to_admin = true;
		}

	}

	public function set_vars($key,$value) { $this->vars[$key] = $value; }
	public function get_vars() {return $this->vars;}
	public function get_errors() {return $this->errors;}

	function set_subjsect($str)
	{
		$this->subject = $str;
	}

	function set_order($order_id)
	{
		$this->order_id = $order_id;
		$o = db_lookup_assoc("SELECT * FROM orders WHERE order_id = '" . db_in($order_id) . "' LIMIT 1;");

		$bill = unserialize($o['billing_addr']);

		if($this->use_default_email)
		{
			$this->confirm_email = $bill['email'];
		}

		$this->confirm_name = trim($bill['first_name'] . ' ' . $bill['last_name']);
		$this->_built_vars_array($o);
	}

	function send_email()
	{
		global $AI;
		$sys_email = new C_system_emails($this->sys_email_title);

		$sys_email->encode_vars=false;
		$sys_email->set_vars_array($this->vars);
		$sys_email->set_defaults_array($this->default_vars);

		//send copy of receipt to admin if setting is enabled
		if($this->send_to_admin)
		{
			if(!$sys_email->send($this->_admin_email))
			{
				$this->error('Could not send order email to admin');
			}
		}

		//send out email to user
		if( $this->confirm_email != '' )
		{
			if(!$sys_email->send($this->confirm_email))
			{
				$this->error('Could not send email to user');
			}
		}

		if($sys_email->has_errors())
		{
			$this->error($sys_email->get_errors());
		}
	}

	function _built_vars_array($o)
	{
		global $AI;
		if(util_mod_enabled('product_email_receipts')) require_once(ai_cascadepath('includes/modules/product_email_receipts/functions.php'));

		$order=$this->order;
		$billing = unserialize($o['billing_addr']);
		$shipping = unserialize($o['shipping_addr']);



		// Get dynamic area html for top of email
		$da = new C_te_dynamic_areas();

		$top_html =  $da->get('order_email_top', 'name', '', false);
		$bott_html = ((($bot=$da->get('order_email_bott', 'name', '', false))!='')? "<p>$bot</p>":'');

		//load the order details
		$order_details_html = '';
		$order_total = 0.00;
		$contents = $order->get_contents();
		$custom_receipt_messages = '';
		$used_receipt_messages = array();
		if ($contents && is_array($contents))
		{
			$order_details_html = "<table>";

			foreach ( $contents as $stock_data )
			{
				$stock_id = (int) $stock_data['id'];
				$product_id = (int) $stock_data['product_id'];
				$title = db_out($stock_data['title']);
				$product_code = db_out($stock_data['product_code']);
				$attributes = $stock_data['attributes'];
				$unit_price = $stock_data['price'];
				$quantity = (int) $stock_data['qty'];
				$subtotal = $unit_price * $quantity;
				$order_total += $subtotal;
				$num_sister_skus = db_lookup_scalar("SELECT count(*) FROM product_stock_items WHERE product_id=".$product_id);

				$order_details_html .= "\n".'<tr><td style="padding:10px" width=350 align="left">'.$title.' '.($num_sister_skus>1? "($product_code)":'').'</td>
					<td style="padding:10px" align="right" width=100>$'.number_format($unit_price, 2).'</td>
					<td style="padding:10px" align="right" width=50>'.$quantity.'</td>
					<td style="padding:10px" align="right" width=80>$'.number_format( $subtotal, 2).'</td></tr>';


				//$product_receipt_res = db_query('SELECT product_stock_id FROM product_stock_items WHERE product_id='.intval($product_id).' AND custom_receipt <>0');
				if(util_mod_enabled('product_email_receipts') && !isset($used_receipt_messages[$stock_data['stock_item_id']]))
				{
					$custom_message = get_sku_custom_receipt($stock_data['stock_item_id']);//defined in product_email_receipts/functions.php
					$custom_message .= '<br>'.get_fulfillment_notes2($product_id);
					if($custom_message !== false)
					{
						$custom_receipt_messages .= '<div style="padding:20px; background:#CCCCCC">';
						$custom_receipt_messages .= $custom_message;
						$custom_receipt_messages .= '</div>';
					}
					$used_receipt_messages[$stock_data['stock_item_id']] = true;//don't display the same message twice
				}
			}
			$order_details_html .= "</table>";
		}//if $contents

		//load any comments if they exist
		$comments_html ='';

		if( $o['user_comments'] != '' )
		{
			$comments_html .= '
			<span style="color:#000; font-weight:bold; font-size:11px;">Comments</span><br>
			<span style="color:#666; font-size:11px;">
			'.db_out(nl2br($o['user_comments'])). '
			</span><br><br>';
		}

		//load any donation area if donation module is enabled
		$donation_html='';

		if(util_mod_enabled('donations'))
		{
			$donation = db_lookup_assoc('SELECT donations.amount_donation, charities.name as charity_name FROM donations LEFT JOIN charities ON donations.charity_id = charities.id WHERE order_id = "'.db_in($this->order_id).'"');
			if($donation && floatval($donation['amount_donation']) > 0.0)
			{
				$donation_html .= '<tr><td style="width:390px;text-align:right;padding:0 10px 0 0"><strong>Donation</strong></td><td style="width:90px;text-align:right;padding:0 5px 0 0">$'.number_format( (float)$donation['amount_donation'], 2 ).'</td></tr>';
				$donation_html .= '<tr><td style="width:390px;text-align:right;padding:0 10px 0 0">'.h($donation['charity_name']).'</td><td>&nbsp;</td></tr>';
			}
		}//donations enabled


		$date_added = date('jS, M Y',strtotime($o['date_added']));
		$address_line_2 = ($shipping['address_line_2']!=''? '<br>'.$shipping['address_line_2']:'');
		$placed_by = trim($billing['first_name'] . ' ' . $billing['last_name']);

		$subtotal_n = number_format( $order_total, 2 );
		$shipping_n = number_format( (float)$o['shipping'], 2 );
		$tax_n = number_format( (float)$o['tax'], 2 );
		$total_n = number_format( $o['total'], 2 );

		$coupons = $AI->db->GetAll('SELECT * FROM coupon_redemptions WHERE order_id = "'.db_in($this->order_id).'"');
		$coupon_discount = 0;
		if($coupons)
		{

			foreach($coupons as $coupon)
			{
				$coupon_discount += abs($coupon['amount']);
			}
		}
		if($coupon_discount == 0.00)
		{
			$coupon_data = '';
		}
		else
		{
			$coupon_discount  = number_format( ($coupon_discount * -1) , 2);
			$coupon_data = '<table>
					<tbody>
						<tr>
							<td >
								<strong>Coupon</strong>
							</td>
							<td style="width:90px;text-align:right;padding:0 5px 0 0">
								$'.$coupon_discount.'
							</td>
						</tr>
					</tbody>
				</table>';
		}

		$billaddr = $billing['address_line_1'].",".$billing['address_line_2'].",".$billing['city'].",".$billing['region']." - ".$billing['postal_code'];


		$p_det123 = '';

		if ($contents && is_array($contents))
		{

			$p_det123 .= '<table style="font-family:Arial,Helvetica,sans-serif" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody>';

			$p_det123 .= '<tr>
        <th style="background:#51b517" width="2%" valign="middle" align="left">&nbsp;</th>
        <th style="background:#51b517;padding:8px 10px;font-size:16px;font-weight:bold!important;color:#fff;font-weight:normal" width="47%" valign="middle" align="left">Item Description</th>
        <th style="background:#51b517;padding:8px 10px;font-size:16px;font-weight:bold!important;color:#fff;font-weight:normal" width="5%" valign="middle" align="center"><img src="http://www.vivacitygo.com/system/themes/prelaunch_lp/images/arrowimgupdate.png" alt="#" ></th>
        <th style="background:#51b517;padding:8px 10px;font-size:16px;font-weight:bold!important;color:#fff;font-weight:normal" width="9%" valign="middle" align="right"> Price</th>
        <th style="background:#51b517;padding:8px 10px;font-size:16px;font-weight:bold!important;color:#fff;font-weight:normal" width="5%" valign="middle" align="center"><img src="http://www.vivacitygo.com/system/themes/prelaunch_lp/images/arrowimgupdate.png" alt="#"></th>
        <th style="background:#51b517;padding:8px 10px;font-size:16px;font-weight:bold!important;color:#fff;font-weight:normal" width="8%" valign="middle" align="right">Qty. </th>
        <th style="background:#51b517;padding:8px 10px;font-size:16px;font-weight:bold!important;color:#fff;font-weight:normal" width="5%" valign="middle" align="center"><img src="http://www.vivacitygo.com/system/themes/prelaunch_lp/images/arrowimgupdate.png" alt="#"></th>
        <th style="background:#51b517;padding:8px 10px;font-size:16px;font-weight:bold!important;color:#fff;font-weight:normal" width="16%" valign="middle" align="center">Total </th>
        <th style="background:#51b517" width="2%" valign="middle" align="left">&nbsp;</th>
    </tr>';

			foreach ( $contents as $stock_data )
			{
				$stock_id = (int) $stock_data['id'];
				$product_id = (int) $stock_data['product_id'];
				$title = db_out($stock_data['title']);
				$product_code = db_out($stock_data['product_code']);
				$attributes = $stock_data['attributes'];
				$unit_price = $stock_data['price'];
				$quantity = (int) $stock_data['qty'];
				$subtotal = $unit_price * $quantity;
				$order_total += $subtotal;
				$num_sister_skus = db_lookup_scalar("SELECT count(*) FROM product_stock_items WHERE product_id=".$product_id);





				$p_det123 .= '<tr>
        <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>
        <td style="padding:8px 10px;font-size:16px;color:#111;font-weight:normal;border-bottom:solid 2px #9e9b9b" valign="middle" align="left">'.$title.'</td>
        <td style="border-bottom:solid 2px #9e9b9b" valign="middle" align="left">&nbsp;</td>
        <td style="padding:8px 10px;font-size:16px;color:#111;font-weight:normal;border-bottom:solid 2px #9e9b9b" valign="middle" align="right">$'.number_format($unit_price, 2).'</td>
        <td style="border-bottom:solid 2px #9e9b9b" valign="middle" align="left">&nbsp;</td>
        <td style="padding:8px 10px;font-size:16px;color:#111;font-weight:normal;border-bottom:solid 2px #9e9b9b" valign="middle" align="right">'.$quantity.'</td>
        <td style="border-bottom:solid 2px #9e9b9b" valign="middle" align="left">&nbsp;</td>
        <td style="padding:8px 10px;font-size:16px;color:#111;font-weight:normal;border-bottom:solid 2px #9e9b9b; padding-right:20px; font-size:16px;" valign="middle" align="right">$'.number_format( $subtotal, 2).'</td>
        <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>
    </tr>';
			}


			$p_det123 .= '<tr>
      <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>

    <td colspan="5" style="border-bottom:solid 2px #9e9b9b; text-align: right; padding:8px 10px;font-size:16px;" valign="middle" align="right">Subtotal</td>
     <td style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
     <td style="border-bottom:solid 2px #9e9b9b; text-align: right; padding-right: 20px!important; font-size:16px;" valign="middle" align="left">$'.$subtotal_n.'</td>
       <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>
         </tr>';

			$p_det123 .= '<tr>
      <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>

    <td colspan="5" style="border-bottom:solid 2px #9e9b9b; text-align: right; padding:8px 10px;font-size:16px;" valign="middle" align="right">Shipping</td>
     <td style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
     <td style="border-bottom:solid 2px #9e9b9b; text-align: right; padding-right: 20px!important; font-size:16px;" valign="middle" align="left">$'.$shipping_n.'</td>
       <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>
         </tr>';

			$p_det123 .= '<tr>
      <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>

    <td colspan="5" style="border-bottom:solid 2px #9e9b9b; text-align: right; padding:8px 10px;font-size:16px;" valign="middle" align="right">Tax</td>
     <td style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
     <td style="border-bottom:solid 2px #9e9b9b; text-align: right; padding-right: 20px!important; font-size:16px;" valign="middle" align="left">$'.$tax_n.'</td>
       <td style="border-bottom:solid 2px #51b517" valign="middle" align="left">&nbsp;</td>
         </tr>';

			$p_det123 .= '<tr>
      <td style="background:#51b517; color:#fff;" valign="middle" align="left">&nbsp;</td>

    <td colspan="5" style="background:#51b517; text-align: right; color:#fff; padding:8px 10px;font-size:16px;" valign="middle" align="right">Grand Total</td>
     <td style="background:#51b517;" valign="middle" align="left">&nbsp;</td>
     <td style="background:#51b517; text-align: right; padding-right: 20px!important; color:#fff; font-size:16px;" valign="middle" align="left">$'.$total_n.'</td>
       <td style="background:#51b517;" valign="middle" align="left">&nbsp;</td>
         </tr>';

			$p_det123 .= '</tbody></table>';
		}

		$this->vars = array
					(
						'user' => $billing['first_name']." ".$billing['last_name'],
						'useraddr' => $billaddr,
						'useremail' => $billing['email'],
						'orderid' => $this->order_id,
						'orderdate' => $date_added,
						'total' => $total_n,
						'ptotal' => $subtotal_n,
						'shipping' => $shipping_n,
						'tax' => $tax_n,
						'producthtml' => $p_det123,
		);

		$this->default_vars = array
										(
											'email_msg' => $this->emailcontent,
											'email_subject' => 'Your Order Successfull :: vivacitygo.com',
											'title' => 'order_success'
										);

	}


	function error($msg)
	{
		$this->errors[] = $msg;
	}

	function has_error()
	{
		return count($this->errors) > 0 ? true : false;
	}

}

?>
