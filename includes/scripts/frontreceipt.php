<?php

global $AI;
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$orderid = $uri_segments[2];

if(intval($orderid) == 0){
    util_redirect_abs('/');
}

$o_res = db_query("SELECT `o`.`userID`,`o`.`date_added`,`o`.`billing_addr`,`o`.`shipping_addr`,`o`.`shipping`,`o`.`tax`,`o`.`total`,`o`.`source_type`,`o`.`source_name`,`od`.* FROM `orders` `o` INNER JOIN `order_details` `od` ON `o`.`order_id` = `od`.`order_id` WHERE `o`.`order_id` = ".$orderid);

$total_amnt = 0.00;
$shipping = 0.00;
$tax = 0.00;
$subtotal = 0.00;

$product_html = '<tr>
                <th style="background:#51b517;" width="2%" valign="middle" align="left">&nbsp;</th>
                <th style="background:#51b517; font-size:14px; color:#fff; font-weight:normal; text-align: left; " width="47%" valign="middle" align="left">Item Description</th>
                <th style="background:#51b517; font-size:14px; color:#fff; font-weight:normal; " width="5%" valign="middle" align="center"><img src="system/themes/prelaunch_lp/images/arrowimgupdate.png" alt="#"></th>
                <th style="background:#51b517; font-size:14px; color:#fff; font-weight:normal; text-align: right; " width="9%" valign="middle" align="right"> Price</th>
                <th style="background:#51b517; font-size:14px; color:#fff; font-weight:normal; " width="5%" valign="middle" align="center"><img src="system/themes/prelaunch_lp/images/arrowimgupdate.png" alt="#"></th>
                <th style="background:#51b517; font-size:14px; color:#fff; font-weight:normal; text-align:right; " width="8%" valign="middle" align="right">Qty. </th>
                <th style="background:#51b517; font-size:14px; color:#fff; font-weight:normal;" width="5%" valign="middle" align="center"><img src="system/themes/prelaunch_lp/images/arrowimgupdate.png" alt="#"></th>
                <th style="background:#51b517; font-size:14px; color:#fff; font-weight:normal; text-align:center; " width="16%" valign="middle" align="center">Total </th>
                <th style="background:#51b517;" width="2%" valign="middle" align="left">&nbsp;</th>
            </tr>';


while($o_res && $order = db_fetch_assoc($o_res)) {


    $billing_addr = $order['billing_addr'];
    $billing_addr = unserialize($billing_addr);

    $total_amnt = $order['total'];
    $shipping = $order['shipping'];
    $tax = $order['tax'];

    $p_total = ($order['price'] * $order['qty']);
    $p_total = number_format($p_total, 2, '.', '');

    $subtotal += $p_total;

    $product_html .= '<tr>
                <td style="border-bottom:solid 2px #51b517;" valign="middle" align="left">&nbsp;</td>
                <td style="font-size:18px; color:#111; font-weight:normal;text-align: left;  border-bottom:solid 2px #9e9b9b" valign="middle" align="left">'.$order['title'].'</td>
                <td style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
                <td style="font-size:18px; color:#111; font-weight:normal; text-align: right;  border-bottom:solid 2px #9e9b9b" valign="middle" align="right">$'.$order['price'].'</td>
                <td style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
                <td style="font-size:18px; color:#111; font-weight:normal;  border-bottom:solid 2px #9e9b9b; text-align:right;" valign="middle" align="right">'.$order['qty'].' </td>
                <td style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="center">&nbsp;</td>
                <td style="font-size:18px; color:#111; font-weight:normal;  border-bottom:solid 2px #9e9b9b; text-align:right; padding-right: 20px!important;" valign="middle" align="right">$'.$p_total.' </td>
                <td style="border-bottom:solid 2px #51b517;" valign="middle" align="left">&nbsp;</td>
            </tr>';


}






?>




<div class="success_wrapper">

    <div class="order_heading">Order Successful</div>

<!--    <img src="system/themes/prelaunch_lp/images/success_img.jpg" alt="#" class="success_img">-->
    <h2>Thank You! Your Order Has Been Successfully Completed</h2>

    <!--<h3>Thank you for placing your order. We will get back to you soon</h3>-->




    <div class="success_table_block">














            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <?php echo $product_html;?>
                <tr>
                    <td     align="left" valign="middle" style="border-bottom:solid 2px #51b517">&nbsp;</td>


                    <td  colspan="5"  valign="middle" align="right" style="border-bottom:solid 2px #9e9b9b; text-align: right;" class="td_detawidth"><div class="td_text">Subtotal</div></td>
                    <td  style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
                    <td    valign="middle" align="left" style="border-bottom:solid 2px #9e9b9b; text-align: right; padding-right: 20px!important;"><div class="td_valu">$<?php echo  number_format($subtotal, 2, '.', '');?></div></td>
                    <td    align="left" valign="middle" style="border-bottom:solid 2px #51b517">&nbsp;</td>
                </tr>
                <tr>
                    <td  align="left" valign="middle" style="border-bottom:solid 2px #51b517">&nbsp;</td>


                    <td colspan="5" valign="middle" align="right" style="border-bottom:solid 2px #9e9b9b;  text-align: right;"><div class="td_text">Shipping</div></td>
                    <td   style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
                    <td  valign="middle" align="left" style="border-bottom:solid 2px #9e9b9b; text-align: right; padding-right: 20px!important;"><div class="td_valu">$<?php echo $shipping;?></div></td>
                    <td  align="left" valign="middle" style="border-bottom:solid 2px #51b517">&nbsp;</td>
                </tr>
                <tr>
                    <td  align="left" valign="middle" style="border-bottom:solid 2px #51b517">&nbsp;</td>


                    <td colspan="5" valign="middle" align="right" style="border-bottom:solid 2px #9e9b9b; text-align: right;"><div class="td_text">Tax</div></td>
                    <td   style="border-bottom:solid 2px #9e9b9b;" valign="middle" align="left">&nbsp;</td>
                    <td  valign="middle" align="left" style="border-bottom:solid 2px #9e9b9b; text-align: right; padding-right: 20px!important;"><div class="td_valu">$<?php echo $tax;?></div></td>
                    <td  align="left" valign="middle" style="border-bottom:solid 2px #51b517">&nbsp;</td>
                </tr>
                <tr>
                    <td align="left" valign="middle" style="background:#51b517;">&nbsp;</td>


                    <td  colspan="5" style="color:#fff; background:#51b517; text-align: right;" valign="middle" align="right"><div class="td_text td_text1">Grand Total</div></td>
                    <td   style="background:#51b517;" valign="middle" align="left">&nbsp;</td>
                    <td   style="color:#fff; background:#51b517; text-align: right; padding-right: 20px!important;" valign="middle" align="right"><div class="td_valu">$<?php echo $total_amnt;?></div></td>
                    <td   align="left" valign="middle" style="background:#51b517;">&nbsp;</td>

                </tr>

                </tbody></table>



        <div class="clearfix"></div>
    </div>


</div>



