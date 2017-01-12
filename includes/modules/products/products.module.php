<?php
require_once( ai_cascadepath('includes/plugins/modules/class.module_base.php') );

/**
 * products_module
 *
 *
 */
class products_module extends module_base
{
	var $mod_system_name = 'products'; // Not static because parent needs to access this
	var $mod_name = 'Products';
	var $mod_description = 'Create and manage products for your store.';
	var $mod_version = '0.13';
	var $mod_ignore_lock_at_or_before_version = '0.0';
	var $dependencies = array('product_inventory','product_folders');

	var $show_manual_range = 0;
	var $show_cost_fields = 1;
	var $show_external_link = 0;
	var $min_markup = 0.00;
	var $global_markup_percent = 0.00;
	var $show_alt_prices = 0;
	var $receipt_message_memberships = 'Thank you for purchasing a membership. Your account has been updated accordingly.'; // Does this really belong in this module? -JonJon 2014-07-03 07:31:46 -1000

	/**
	 * Called when module is loaded AND is initiated
	 *
	 * @param $settings Array of settings, unrealized from the database
	 */
	public function mod_load_settings($settings)
	{
		$this->show_manual_range = (int) @$settings['show_manual_range'];
		$this->show_cost_fields = (int) @$settings['show_cost_fields'];
		$this->show_external_link = (int) @$settings['show_external_link'];
		$this->min_markup = floatval(@$settings['min_markup']);
		$this->global_markup_percent = floatval(@$settings['global_markup_percent']);
		$this->show_alt_prices = (int)@$settings['show_alt_prices'];
		$this->receipt_message_memberships = trim(@$settings['receipt_message_memberships'] . '') == '' ? $this->receipt_message_memberships : $settings['receipt_message_memberships'];

		//iPayAuto needs to default settings thusly:
		if(util_is_site_type('ipayauto') || installing_site_type('ipayauto')) {
			$installing = installing_site_type('ipayauto');
			if($installing || !isset($settings['show_manual_range'])) $this->show_manual_range = 1;
			if($installing || !isset($settings['show_cost_fields'])) $this->show_cost_fields = 0;
		}
	}

	/**
	 * mod_upgrade()
	 *
	 * Run any version upgrades.  Only triggered when db version # is out of date when compared to static version # within the module.
	 */
	public function mod_upgrade( $db_version )
	{
		global $AI;

		if( $this->mod_is_older_version($db_version, '.1') ) {

			//create products and product_details database tables if they don't already exist
			db_query("
				CREATE TABLE `products`
				( `product_id` int(10) unsigned NOT NULL auto_increment
				, `title` varchar(255) NOT NULL
				, `url_name` varchar(255) NOT NULL
				, `taxable` enum('Yes','No') NOT NULL default 'Yes'
				, `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP
				, `description` text character set utf8 collate utf8_unicode_ci NOT NULL
				, `features` text NOT NULL
				, `show_qty_input` enum('Yes','No') NOT NULL default 'Yes'
				, `affiliate_commission_group` int(10) unsigned NOT NULL default '0'
				, `scheduled_purchase_product` int(10) NOT NULL default '0'
				, `scheduled_purchase_delay` int(3) NOT NULL default '0'
				, `scheduled_purchase_auto_create` enum('Yes','No') NOT NULL default 'Yes'
				, `on_purchase_permission_group` varchar(100) NOT NULL default ''
				, `limit_qty` int(11) NOT NULL default '0'
				, `ingredients` text NOT NULL
				, `benefits` text NOT NULL
				, `alternate_url` varchar(255) NOT NULL
				, PRIMARY KEY (`product_id`)
				, UNIQUE KEY `url_name` (`url_name`)
				)
			;");

			$AI->skin->create_dynamicpage(
			  'products'
			  , array('body'=>'includes/modules/product_folders/product_folders.php')
			  , array('body'=>'file')
			  , 'default'
			  , 'N'
			  , 'en'
			);

			//permissions
			$AI->grant_page_perm( 'products', 'Website Developers' );
			$AI->grant_page_perm( 'products', 'Administrators' );

			$perm_classes = array('products');
			$perm_groups = array('Website Developers','Administrators');
			$perm_types = array('ajax','asearch','delete','insert','multidelete','table','update','view');
			$AI->grant_multiple_perms( $perm_classes, $perm_groups, $perm_types, false );

			$this->mod_set_db_version('.1');
		}

		if ( $this->mod_is_older_version($db_version, '.2') )
		{
			$AI->skin->update_dynamicpage(
			  'products'
			  , array('body'=>'includes/modules/products/products.php')
			  , array('body'=>'file')
			  , 'default'
			  , 'N'
			  , 'en'
			);
			$this->mod_set_db_version('.2');
		}

		if ( $this->mod_is_older_version($db_version, '.3') )
		{
			db_query('ALTER TABLE `products` ADD `fulfillment_notes` TEXT NOT NULL DEFAULT ""');
			$this->mod_set_db_version('.3');
		}

		if ( $this->mod_is_older_version($db_version, '.5') )
		{
			//add product-source field
			db_query("ALTER TABLE  `products` ADD  `source` VARCHAR( 255 ) NOT NULL DEFAULT 'manual' COMMENT 'mannual/doba/etc'");
			$this->mod_set_db_version('.5');
		}

		if ( $this->mod_is_older_version($db_version, '.6') )
		{
			//add product-source field
			db_query("ALTER TABLE `products` ADD `visible` INT(1) NOT NULL DEFAULT '1' AFTER `product_id`, ADD INDEX (`visible`);");
			$this->mod_set_db_version('.6');
		}

		if ( $this->mod_is_older_version($db_version, '.8') )
		{
			//add product-source field
			db_query("ALTER TABLE  `products` ADD  `is_external` ENUM(  'No',  'Link',  'HTML' ) NOT NULL DEFAULT  'No' AFTER `features`,
				ADD  `external_content` TEXT NOT NULL AFTER  `is_external` ;");
			$this->mod_set_db_version('.8');
		}

		if ( $this->mod_is_older_version($db_version, '.9') )
		{
			//add img_url and img_url_last_update fields
			db_query("ALTER TABLE  `products` ADD  `img_url` VARCHAR( 255 ) NULL DEFAULT NULL;");
			db_query("ALTER TABLE  `products` ADD `img_url_last_update` DATETIME NULL DEFAULT NULL;");
			$this->mod_set_db_version('.9');
		}

		if ( $this->mod_is_older_version($db_version, '.10') )
		{
			//add img_url and img_url_last_update fields
			db_query("ALTER TABLE  `products` ADD  `sort_order` int( 10 ) NOT NULL DEFAULT 0;");
			$this->mod_set_db_version('.10');
		}

		if ( $this->mod_is_older_version($db_version, '.11') )
		{
			//add img_url and img_url_last_update fields
			db_query("ALTER TABLE  `products` DROP COLUMN  `sort_order`;");
			$this->mod_set_db_version('.11');
		}

		if ( $this->mod_is_older_version($db_version, '.12') )
		{
			//add img_url and img_url_last_update fields
			db_query("ALTER TABLE `products` ADD `sort_order` int(11) NOT NULL DEFAULT 0;");
			$this->mod_set_db_version('.12');
		}

		if ( $this->mod_is_older_version($db_version, '.13') )
		{
			//add img_url and img_url_last_update fields
			db_query("ALTER TABLE `products` ADD `brand` VARCHAR(100) NOT NULL DEFAULT '';");
			$this->mod_set_db_version('.13');
		}
	}

	/**
	 * Display help documents
	 */
	public function mod_help()
	{
		echo '<p>This module is used to create and modify products that may be purchased in your store.</p>';
	}

	/**
	 * Draw a form to build settings.
	 * @param $fieldstart The starting string to use for input fields
	 * @return null
	 */
	public function mod_settings($fieldstart)
	{
		echo '<table class="compact">';

		$ops = array('No','Yes');
		echo '<tr><th><label for="' . $fieldstart . 'show_manual_range">Show Manual Range Field in Products?</label></th><td>';
		echo '<select id="' . $fieldstart . 'show_manual_range" name="' . $fieldstart . 'show_manual_range">';
		foreach ( $ops as $val => $text ) echo '<option value="'.$val.'"'.($this->show_manual_range==$val? ' selected="selected"':'').'>' . $text . '</option>';
		echo '</select>';
		echo '</td></tr>';

		$ops = array('No','Yes');
		echo '<tr><th><label for="' . $fieldstart . 'show_cost_fields">Show Cost Fields in Products?</label></th><td>';
		echo '<select id="' . $fieldstart . 'show_cost_fields" name="' . $fieldstart . 'show_cost_fields" onchange="if ( $(this).val() == \'1\' ) { $(\'.cost_field_trs\').fadeIn(); } else { $(\'.cost_field_trs\').fadeOut(); }">';
		foreach ( $ops as $val => $text ) echo '<option value="'.$val.'"'.($this->show_cost_fields==$val? ' selected="selected"':'').'>' . $text . '</option>';
		echo '</select>';
		echo '</td></tr>';

		echo '<tr class="cost_field_trs"'.($this->show_cost_fields==0? 'style="display:none;"':'').'">
			<th><label for="' . $fieldstart . 'min_markup">Min Markup</label></th><td>
			<input type="text"  id="' . $fieldstart . 'min_markup" name="' . $fieldstart . 'min_markup" value="$'.number_format($this->min_markup,2,'.','').'">
			<div style="width:300px"><small>The minimum dollar amount that may be gained from an individual product sale.</small></div>';
		echo '</td></tr>';

		echo '<tr class="cost_field_trs"'.($this->show_cost_fields==0? 'style="display:none;"':'').'>
			<th><label for="' . $fieldstart . 'global_markup_percent">Global Markup Percent</label></th><td>
			<input type="text"  id="' . $fieldstart . 'global_markup_percent" name="' . $fieldstart . 'global_markup_percent" value="'.number_format($this->global_markup_percent,2,'.','').'%">
			<div style="width:300px"><small>The default markup for all products (like \'20.00%\'). This markup is used for any product where managers haven\'t specified a markup.</small></div>';
		echo '</td></tr>';

		$ops = array('No','Yes');
		echo '<tr><th><label for="' . $fieldstart . 'show_external_link">Show External Link Option?</label></th><td>';
		echo '<select id="' . $fieldstart . 'show_external_link" name="' . $fieldstart . 'show_external_link">';
		foreach ( $ops as $val => $text ) echo '<option value="'.$val.'"'.($this->show_external_link==$val? ' selected="selected"':'').'>' . $text . '</option>';
		echo '</select> <div style="width:300px;"><small>Allow administrators to provide an external link (or html) instead of the standard \'Add To Cart\' button.</small></div>';
		echo '</td></tr>';

		$ops = array('No','Yes');
		echo '<tr><th><label for="' . $fieldstart . 'show_alt_prices">Show Alternate Prices in Products?</label></th><td>';
		echo '<select id="' . $fieldstart . 'show_alt_prices" name="' . $fieldstart . 'show_alt_prices">';
		foreach ( $ops as $val => $text ) echo '<option value="'.$val.'"'.($this->show_alt_prices==$val? ' selected="selected"':'').'>' . $text . '</option>';
		echo '</select>';
		echo '</td></tr>';

		echo '<tr><th><label for="' . $fieldstart . 'receipt_message_memberships">Receipt Message: Memberships</label></th><td>';
		echo '<textarea id="' . $fieldstart . 'receipt_message_memberships" name="' . $fieldstart . 'receipt_message_memberships" cols="50" rows="3">' . h($this->receipt_message_memberships) . '</textarea>';
		echo '</td></tr>';

		echo '</table>';
	}

	/**
	 * Run though the inputed fields
	 *
	 * @see mod_settings
	 * @param $form_items The values submitted by the form drawn in mod_settings()
	 */
	public function mod_settings_validate(&$form_items)
	{
		$form_items['min_markup'] = round( abs(trim($form_items['min_markup'],' $')), 2);
		$form_items['global_markup_percent'] = round( abs(trim($form_items['global_markup_percent'],' %')), 2);
		$min_mark = $form_items['min_markup'];
		$mark_dec = round(1+($form_items['global_markup_percent']/100.00),6);

		//update price using new markup
		db_query("UPDATE product_stock_items SET price=round($mark_dec*cost,2) WHERE cost!=0.00 AND markup=-1.00") or die(mysql_error());
		//min markup
		db_query("UPDATE product_stock_items SET price=round(cost+$min_mark,2) WHERE price<round(cost+$min_mark,2) AND cost!=0.00 AND markup=-1.00") or die(mysql_error());

		return true;
	}

	/**
	 * Validates products/stock items by checking against the current stock
	 * @param int $order_id
	 * @return bool|string
	 */
	public function hook_orders_validate($order_id)
	{
		global $AI;

		$sql = "
			SELECT od.stock_item_id, od.qty, od.title, od.attributes, psi.track_stock_level, psi.stock
			FROM order_details od
			LEFT JOIN product_stock_items psi ON od.stock_item_id = psi.stock_item_id
			WHERE order_id = " . (int) db_in($order_id) . "
			ORDER BY id ASC
		;";
		$items = $AI->db->GetAll($sql);
		if ( isset($items[0]) )
		{
			foreach ( $items as $i => $item )
			{
				$track_stock_level = $item['track_stock_level'];
				if ( $track_stock_level == 'Y' )
				{
					$quantity = (int) $item['qty'];
					$current_stock = (int) $item['stock'];
					if ( $quantity > $current_stock )
					{
						$message = $item['title'];
						if ( $item['attributes'] != '' )
						{
							$message .= ' (' . $item['attributes'] . ')';
						}
						$message .= ' is currently out of stock';
						return $message;
					}
				}
			}
		}
		return true;
	}

	/**
	 * Finalizes products/stock items by decrementing their stock
	 * @param int $order_id
	 * @return void
	 */
	public function hook_orders_finalize($order_id)
	{
		global $AI;

		$sql = "
			SELECT stock_item_id, qty
			FROM order_details
			WHERE order_id = " . (int) db_in($order_id) . "
			ORDER BY id ASC
		;";
		$items = $AI->db->GetAll($sql);
		if ( isset($items[0]) )
		{
			foreach ( $items as $i => $item )
			{
				$stock_item_id = (int) $item['stock_item_id'];
				$quantity = (int) $item['qty'];
				$sql = "
					UPDATE product_stock_items
					SET stock = stock - " . (int) db_in($quantity) . "
					WHERE stock_item_id = " . (int) db_in($stock_item_id) . "
					AND track_stock_level = 'Y'
					LIMIT 1
				;";
				db_query($sql);
			}
		}
	}


	/**
	 * PRINT product specific responses on the receipt page
	 */
	public function hook_order_receipt_comments($order_id)
	{
		global $AI;

		$order_id = intval($order_id);
		$order = db_lookup_assoc("SELECT * FROM orders WHERE order_id=".$order_id);
		$userID = intval($order['userID']);
		$rsm = db_query("SELECT * FROM order_details WHERE order_id=".intval($order_id));
		$notes = array();
		while($rsm && ($prod=db_fetch_assoc($rsm))!==false){
			if($prod['stock_item_id']>0) {

				$membership = db_lookup_assoc("SELECT * FROM product_memberships WHERE stock_item_id=".intval($prod['stock_item_id'])." AND account_type_id > 0");
				if(is_array($membership)) { $notes[] = $this->receipt_message_memberships; }

				$lead_modules_inventory_settings = db_lookup_assoc("SELECT * FROM lead_modules_inventory_settings WHERE stock_item_id=".intval($prod['stock_item_id'])."");
				if(is_array($lead_modules_inventory_settings)) {
					$notes[] = "Thank you for purchasing '".$prod['title']."'. Your leads will be delivered.";
				}
			}
		}

		$notes = array_unique($notes);
		return implode("\n<br><br>",$notes);
	}

	public function hook_panel_menus_add()
	{
		$ret['admin']['products'] = array
			( 'stat' => true
			, 'btxt' => 'Product Management'
			, 'href' => 'products'
			, 'img'  => 'images/menu_tree/shopping_cart_config_48.png'
			, 'desc' => 'Manage all your system\'s products.  Aside from naming, describing, organizing, and pricing your products, you can also upload multiple images to a product. Also, depending on the setup of your system, there can be a multitude of fulfillment options you can set for each individual product and stock item.'
			, 'tags' => 'sales'
			, 'sort' => 1000
			);
		return $ret;
	}
};