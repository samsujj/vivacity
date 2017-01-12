<?php
//Copyright (c)2006 All Rights Reserved - Apogee Design Inc.
//Generated: 2007-11-05 11:47:46
//DB Table: products, Unique ID: products, PK Field: product_id


require_once( ai_cascadepath( 'includes/core/classes/tableedit_base.php' ) );
require_once( ai_cascadepath( 'includes/plugins/dynamic_fields/class.dynamic_fields.php' ) );
require_once( ai_cascadepath( 'includes/core/functions/choice.php') );
require_once( ai_cascadepath( 'includes/modules/affiliate_commission_groups/includes/class.te_affiliate_commission_groups.php' ) );
require_once( ai_cascadepath( 'includes/modules/product_folders/includes/class.te_product_folders.php' ) );
require_once( ai_cascadepath( 'includes/core/upload/class.upload.php' ) );
//require_once( ai_cascadepath( 'includes/plugins/tool_tip/class.tool_tip.php' ) );
//require_once(ai_cascadepath('includes/plugins/dynamic_tooltips/simptip_init.php'));
aimod_load_module('products'); //so we can refference $AI->MODS['products']

global $attr_colors;
$attr_colors = array('#4986e7', '#2da2bb', '#b99aff', '#fb4c2f', '#ff7537', '#ffad46', '#cca6ac', '#16a765', '#c2c2c2', '#1c4587');

class C_te_products extends C_tableedit_base
{
	var $verified_fulfillment_modules = array();

	//(configure) parameters
	var $_dbTableName = 'products';
	var $_keyFieldName = 'product_id';
	var $_numeric_key = true;
	var $unique_id = 'products';
	var $_tableTitle = ''; //default in constructor
	var $draw_qsearch = true;

	//(configure) Draw Code
	var $view_include_file = 'includes/modules/products/includes/draw.products.view.php';
	var $edit_include_file = 'includes/modules/products/includes/draw.products.edit.php';
	var $table_include_file = 'includes/modules/products/includes/draw.products.table.php';
	var $qsearch_include_file = 'includes/modules/products/includes/draw.products.qsearch.php';
	var $asearch_include_file = 'includes/modules/products/includes/draw.products.asearch.php';
	var $viewnav_include_file = 'includes/modules/products/includes/draw.products.viewnav.php';
	var $noresults_include_file = 'includes/modules/products/includes/draw.products.noresults.php';
	var $ajax_include_file = 'includes/modules/products/includes/handler.products.ajax.php';

	//(configure) ob stands for "order by" members
	var $_obFieldDefault = 'title'; //default in constructor
	var $_obDirDefault = "ASC";
	var $_pgSizeDefault = 20;
	var $_te_modeDefault = 'table';
	var $_default_mode_after_save = 'table';
	var $_draw_paging_for_more_than_n_results = 2;
	var $_max_results_2_select_pg_num = 200; //0 to disable
	var $_paging_size_options = array( 5, 10, 20, 50, 100, 200 ); //empty to disable
	var $_unit_label = 'Results';
	var $_table_controls_side = 'right'; // ( left, right )

	//(configure) more
	var $_image_save_path = 'uploads/files';
	var $_dynafields = null;
	var $_ai_lang = '';
	var $tool_tip = null;

	function C_te_products( $param_dbWhere = '' )
	{
		$this->dbWhere = $param_dbWhere;

		//INITIALIZE DATABASE VARS
		$this->db['product_id'] = '';
		$this->db['date_added'] = '';
		$this->db['title'] = '';
		$this->db['url_name'] = '';
		$this->db['description'] = '';
		$this->db['features'] = '';
		$this->db['is_external'] = '';
		$this->db['external_content'] = '';
		$this->db['show_qty_input'] = '';
		$this->db['affiliate_commission_group'] = '';
		$this->db['taxable'] = '';
		$this->db['scheduled_purchase_product'] = '';
		$this->db['scheduled_purchase_delay'] = '';
		$this->db['scheduled_purchase_auto_create'] = '';
		$this->db['on_purchase_permission_group'] = '';
		$this->db['limit_qty'] = '';
		$this->db['brand'] = '';
		$this->db['ingredients'] = '';
		$this->db['benefits'] = '';
		$this->db['alternate_url'] = '';

		if(util_mod_enabled('product_vendors')) $this->db['vendor_id'] = '';

		//INITIALIZE SEARCH VARS
		//these should NOT conflict with database fields above
		$this->search_vars['example_of_a_special_search_var'] = '';

		//INITIALIZE DATABASE DESCRIPTION
		$this->desc['product_id'] = array( 'Field' => 'product_id', 'Type' => 'int(10) unsigned', 'Null' => 'NO', 'Key' => 'PRI', 'Default' => '', 'Extra' => 'auto_increment' );
		$this->desc['date_added'] = array( 'Field' => 'date_added', 'Type' => 'timestamp', 'Null' => 'YES', 'Key' => '', 'Default' => 'CURRENT_TIMESTAMP', 'Extra' => '' );
		$this->desc['title'] = array( 'Field' => 'title', 'Type' => 'varchar(128)', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['url_name'] = array( 'Field' => 'url_name', 'Type' => 'varchar(128)', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['description'] = array( 'Field' => 'description', 'Type' => 'text', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['features'] = array( 'Field' => 'features', 'Type' => 'text', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['is_external'] = array( 'Field' => 'is_external', 'Type' => 'enum(\'Yes\',\'No\')', 'Null' => 'NO', 'Key' => '', 'Default' => 'No', 'Extra' => '' );
		$this->desc['external_content'] = array( 'Field' => 'external_content', 'Type' => 'text', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['show_qty_input'] = array( 'Field' => 'show_qty_input', 'Type' => 'enum(\'Yes\',\'No\')', 'Null' => '', 'Key' => '', 'Default' => 'Yes', 'Extra' => '' );
		$this->desc['affiliate_commission_group'] = array( 'Field' => 'affiliate_commission_group', 'Type' => 'int(10)', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['taxable'] = array( 'Field' => 'unlimited_stock', 'Type' => 'enum(\'Yes\',\'No\')', 'Null' => '', 'Key' => '', 'Default' => 'Yes', 'Extra' => '' );
		$this->desc['scheduled_purchase_product'] = array( 'Field' => 'scheduled_purchase_product', 'Type' => 'int(11)', 'Null' => 'NO', 'Key' => '', 'Default' => '0', 'Extra' => '' );
		$this->desc['scheduled_purchase_delay'] = array( 'Field' => 'scheduled_purchase_delay', 'Type' => 'int(3)', 'Null' => 'NO', 'Key' => '', 'Default' => '0', 'Extra' => '' );
		$this->desc['scheduled_purchase_auto_create'] = array( 'Field' => 'scheduled_purchase_auto_create', 'Type' => 'enum(\'Yes\',\'No\')', 'Null' => '', 'Key' => '', 'Default' => 'Yes', 'Extra' => '' );
		$this->desc['on_purchase_permission_group'] = array( 'Field' => 'on_purchase_permission_group', 'Type' => 'varchar(100)', 'Null' => '', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['limit_qty'] = array( 'Field' => 'limit_qty', 'Type' => 'int(11)', 'Null' => 'NO', 'Key' => '', 'Default' => '0', 'Extra' => '' );
		$this->desc['brand'] = array( 'Field' => 'brand', 'Type' => 'varchar(100)', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['ingredients'] = array( 'Field' => 'ingredients', 'Type' => 'text', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['benefits'] = array( 'Field' => 'benefits', 'Type' => 'text', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '' );
		$this->desc['alternate_url'] = array( 'Field' => 'alternate_url', 'Type' => 'varchar(255)', 'Null' => 'NO', 'Key' => '', 'Default' => '', 'Extra' => '');

		if(util_mod_enabled('product_vendors')) $this->desc['vendor_id'] = array( 'Field' => 'vendor_id', 'Type' => 'int(11)', 'Null' => 'NO', 'Key' => '', 'Default' => '0', 'Extra' => '' );

		//CALL PARENT CLASS CONSTRUCTOR ( creates permissions "$this->perm", etc... )
		parent::C_tableedit_base();

		//SPECIFY MODES ALLOWED FOR INLINE-EDITIBLE FIELDS
		//the value may be 'all', 'table', 'view', or 'none'
		$this->inline_edit_db_field['product_id'] = 'none';
		$this->inline_edit_db_field['date_added'] = 'none';
		$this->inline_edit_db_field['title'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['url_name'] = 'none';
		$this->inline_edit_db_field['description'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['features'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['is_external'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['external_content'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['show_qty_input'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['affiliate_payment_group'] = 'none';
		$this->inline_edit_db_field['scheduled_purchase_product'] = 'none';
		$this->inline_edit_db_field['scheduled_purchase_delay'] = 'none';
		$this->inline_edit_db_field['scheduled_purchase_auto_create'] = 'none';
		$this->inline_edit_db_field['limit_qty'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['brand'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['ingredients'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );
		$this->inline_edit_db_field['benefits'] = ( $this->perm->get('ajax_cmd_inline_edit') ? 'all' : 'none' );

		if(util_mod_enabled('product_vendors')) $this->inline_edit_db_field['vendor_id'] = 'none';


		//Don't inline edit the primary key
		$this->inline_edit_db_field[ $this->_keyFieldName ] = 'none';
		/*
		$this->_dynafields = new C_dynamic_fields('Title', 'Description', 'Features', 'Language');
		$this->_dynafields->add_input_handler('df_handler_product_default', 'Title');
		$this->_dynafields->add_input_handler('df_handler_product_textarea', 'Description');
		$this->_dynafields->add_input_handler('df_handler_product_textarea', 'Features');
		$this->_dynafields->add_input_handler('df_handler_language_selector', 'Language');

		$this->_dynafields_sub = new C_dynamic_fields('Number of Months', 'Price');
		$this->_dynafields_sub->add_input_handler('df_handler_product_default', 'Number of Months');
		$this->_dynafields_sub->add_input_handler('df_handler_product_price', 'Price');

		$this->_dynafields_attr = new C_dynamic_fields('Attr ID', 'Name', 'Price', 'Group');
		$this->_dynafields_attr->add_input_handler('df_handler_product_price', 'Price');
		*/

		$this->_ai_lang = $GLOBALS['AI']->get_lang();

		//$this->tool_tip = new C_tool_tip();

		//$this->_dynafields_triggers = new C_dynamic_fields('Product ID', 'Qty', 'Attribute ID', 'Subscription ID');
		//$this->_dynafields_triggers->add_input_handler('db_handler_products', 'Product ID');
	}

	function validate_write()
	{
		global $AI;
		//OCCURS BEFORE DATABASE INSERT OR UPDATE ( te_modes : insert, copy, update, ajax )

		//write errors occur if $this->write_error_msg != '' ( this will allow the user to modify their input )
		$this->write_error_msg = '';

		if( $this->_numeric_key || ( $this->te_mode != 'update' && $this->te_mode != 'insert' ) )
		{
			$this->writable_db_field[ $this->_keyFieldName ] = false;  //don't allow the primary key to be overwritten
		}
		else
		{
			$this->writable_db_field[ $this->_keyFieldName ] = true;
		}

		if($this->te_mode=='insert') {
			$this->db['date_added']=date('Y-m-d H:i:s');
			$this->writable_db_field['date_added'] = true;
		}

		if ( $this->te_mode != 'ajax' && $this->writable_db_field['url_name'] ) {
			//validate the url_name to be unique
			if($this->db['url_name']=='') { $this->write_error_msg = 'The URL Name must be a unique value.'; return; }
			$upsql = ($this->te_mode=='update')? 'AND product_id!='.$this->te_key:'';
			$cnt = db_lookup_scalar("SELECT count(product_id) FROM products WHERE url_name='".db_in($this->db['url_name'])."' ".$upsql);
			if($cnt>0) { $this->write_error_msg = 'Another product is using this URL Name ('.$this->db['url_name'].'). The URL Name must be a unique value.'; return; }
		}

		require_once ai_cascadepath('includes/plugins/dynamic_areas/includes/class.te_dynamic_areas.php');
		$da = new C_te_dynamic_areas();
		if ( $this->writable_db_field['description'] )
		{
			$da->inline_save($this->db['description'], $_POST);
		}
		if ( $this->writable_db_field['features'] )
		{
			$da->inline_save($this->db['features'], $_POST);
		}
		if ( $this->writable_db_field['ingredients'] )
		{
			$da->inline_save($this->db['ingredients'], $_POST);
		}
		if ( $this->writable_db_field['benefits'] )
		{
			$da->inline_save($this->db['benefits'], $_POST);
		}


		/*
		if ($this->te_mode != 'ajax')
		{
			// Prep descriptions for the db
			$this->writable_db_field['description'] = true;
			$this->db['description'] = $this->_dynafields->parse_POST('description');

			$this->writable_db_field['triggers'] = true;
			$this->db['triggers'] = $this->_dynafields_triggers->parse_POST('triggers');

			// Ensure that language is unique
			$langs = unserialize($this->db['description']);
			$existing_langs = array();
			foreach ($langs as $row => $lang) {
				if(in_array($lang['3'], $existing_langs)) {
					$this->write_error_msg = 'You may only have one description per language';
				}
				$existing_langs[] = $lang['3'];
			}

			// Prep subscriptin rates for the DB
			$this->writable_db_field['subscription_rates'] = true;
			$this->db['subscription_rates'] = $this->_dynafields_sub->parse_POST('subscription_rates');

			// Check the subscription rates, make sure their is a unique month !
			$rates = unserialize($this->db['subscription_rates']);
			$existing_rates = array();
			foreach ($rates as $row => $rate) {
				if(in_array($rate['0'], $existing_rates)) {
					$this->write_error_msg = 'You have duplicate Number of Months for your subscription rates.';
				}
				$existing_rates[] = $rate['0'];
			}

			// Prep the atributes for db
			if(@$_POST['include_attributes'] == 'Yes') {
				$this->writable_db_field['attributes'] = true;
				$this->db['attributes'] = $this->_dynafields_attr->parse_POST('attributes');

				$attributes = unserialize($this->db['attributes']);
				$existing_attrs = array();
				foreach ($attributes as $row => $attr) {
					if(in_array($attr['0'], $existing_attrs) || trim($attr['0']) == '') {
						$this->write_error_msg = 'Sub ID\'s must be unique and are required.';
					}
					$existing_attrs[] = $attr['0'];
				}
			}

			//If the product being created/updated is a subscritpion, force the limit_qty field to 1
				if(isset($_POST['subscription']) && $_POST['subscription'] == 'Yes') {
				$this->writable_db_field['limit_qty'] = true;
				$this->db['limit_qty'] = 1;
				$_POST['limit_qty'] = 1; // Override post also
				} // Subscriptions now include quantity support

			//$this->writable_db_field['folderID'] = true; // Make sure to save the folderID passed by product_folders TE

			// if($_POST['price'] <= 0) { $this->write_error_msg = 'You must specify a price greater than 0'; } // Can have 0 price products now ~ JosephL 2008.11.26


			// Format and check both min and max prices for manual price range (defaults are 0 and 1, so if they are not changed they should meet the rules)
			$min = (float)$_POST['manual_price_range_min'];
			$max = (float)$_POST['manual_price_range_max'];

			if( $min < 0 || $max < 0 ) {
				$this->write_error_msg = 'Minimum and maximum manual prices must be greater than 0';
			} elseif ($min >= $max) {
				$this->write_error_msg = 'Minimum manual price range must be greater than the maximum.';
			} else {
				// SHOULD BE ALL GOOD
				$this->writable_db_field['manual_price_range'] = true;
				$this->db['manual_price_range'] = db_in($min.'-'.$max);
			}


			// Serialize the shipping prices
			if($AI->get_setting('shipping_type')=='flat_rate')
			{
				$shipping = array();
				foreach ($_POST as $key => $value) {
					if(preg_match('/^shipping_/', $key)) {
						$shipping[substr($key, 9)] = (float)$value;
					}
				}

				$this->writable_db_field['shipping_prices'] = true;
				$this->db['shipping_prices'] = serialize($shipping);
			}
			/*else
			{
				$shipping = array();
				foreach ($_POST as $key => $value) {
					if(preg_match('/^shipping_/', $key)) {
						$shipping[substr($key, 9)] = (float)$value;
					}
				}

				$this->writable_db_field['shipping_weight_prices'] = true;
				$this->db['shipping_weight_prices'] = serialize($shipping);

			}
		}
		*/
		// REMEMBER SORT ORDER FOR FINALIZE
		//$this->finalize_sort_order = $this->db['sort_order'];
	}


	function finalize_write()
	{
		global $AI;

		//OCCURS AFTER SUCCESSFUL DATABASE INSERT OR UPDATE ( te_modes : insert, copy, update, ajax )

		// RESORT ON DUPLIACTE SORT ORDER
		/*
		if (isset($this->finalize_sort_order))
		{
			$duplicate_sort_exists = (int)db_lookup_scalar("SELECT " . $this->_keyFieldName . " FROM " . $this->_dbTableName . " WHERE " . $this->_keyFieldName . " <> " . $this->te_key . " AND sort_order = " . (int)$this->finalize_sort_order . " LIMIT 1;");
			if ($duplicate_sort_exists)
			{
				db_query("UPDATE " . $this->_dbTableName . " SET sort_order = sort_order + 1 WHERE " . $this->_keyFieldName . " <> " . $this->te_key . " AND sort_order >= " . (int)$this->finalize_sort_order . ";");
			}
			unset($this->finalize_sort_order);
		}
		*/

		//UPDATE DATA FOR UPLOADED FILES IF IN INSERT MODE
		if( $this->te_mode == 'insert' || $this->te_mode == 'copy' )
		{
			if( !empty($_POST['ai_upload_add']) )
			{
				$i = 0;
				$sql = "UPDATE files SET foreignID = '".$this->te_key."' WHERE foreignID = '' AND ( ";
				foreach( $_POST['ai_upload_add'] as $add_dir_file )
				{
					if( $i > 0 ){ $sql .= " OR "; }
					list( $dir, $filename) = explode( '|', $add_dir_file, 2);
					$sql .= " (filename = '".$filename."' AND dirname = '".$dir."') ";
					$i++;
				}
				$sql .= " ) ";
				db_query($sql);
			}
		}

		// Mutli folder System recognition now ~ josephL 2009.03.24
		if(isset($_POST['folderID']) && count($_POST['folderID']) > 0) {
			$link_ids = array();
			foreach ($_POST['folderID'] as $num => $id) {
				$set_sql = 'folderID='.(int)$id.', product_id='.$this->te_key.', sort_order='.@(float)$_POST['fp_sort'][$num];
				$link_id = db_lookup_scalar('SELECT link_id FROM products2folders WHERE folderID = '.(int)$id.' AND product_id = '.$this->te_key);
				if((int)$link_id > 0) {
					// Link exists
					db_query('UPDATE products2folders SET '.$set_sql.' WHERE link_id = '.$link_id);
				}
				else {
					// Create new link
					db_query('INSERT INTO products2folders SET '.$set_sql);
					$link_id = db_insert_id();
				}

				$link_ids[] = $link_id;
			}

			// Now remove anly links that were not updated...
			$sql = 'DELETE FROM products2folders WHERE product_id = '.$this->te_key.' AND link_id NOT IN ('.implode(',', $link_ids).')';
			db_query($sql);
		}

		if ( !empty($_POST['first_save']) )
		{
			// Create new inventory item
			$sql = "
				INSERT INTO product_stock_items
				SET product_id = " . (int) $this->te_key . "
			;";
			db_query($sql);
			util_redirect($this->url('te_mode=update&te_key=' . $this->te_key . '#product_tab_category'));
		}
		if ( !empty($_POST['duplicate']) )
		{
			// Initial Copy
			$this->select($this->te_key);
			$copy_db = $this->db;
			unset($copy_db[$this->_keyFieldName]);
			unset($copy_db['url_name']);
			$copy_db['title']      .= ' (Copy)';
			$copy_db['description'] = $this->make_dynamic_area_name('description');
			$copy_db['features']    = $this->make_dynamic_area_name('features');
			$copy_db['ingredients']    = $this->make_dynamic_area_name('ingredients');
			$copy_db['benefits']    = $this->make_dynamic_area_name('benefits');
			$AI->db->Insert($this->_dbTableName, $copy_db);
			$copy_key = db_insert_id();

			if ( $copy_key > 0 )
			{
				$now = date('Y-m-d H:i:s');
				// Description Tab
				$sql = "
					INSERT INTO files (title, filename, size, type, foreignID, foreign_table, dirname, date_added, userID)
					SELECT title, filename, size, type, '" . db_in($copy_key) . "', 'products', dirname, '" . db_in($now) . "', userID
					FROM files
					WHERE foreignID = '" . db_in($this->te_key) . "'
					AND foreign_table = 'products'
				;";
				db_query($sql);
				$sql = "
					INSERT INTO dynamic_areas (userID, name, mode, content, settings, lang, created_on, saved_on)
					SELECT userID, '" . db_in($copy_db['description']) . "', mode, content, settings, lang, NOW(), NOW()
					FROM dynamic_areas
					WHERE name = '" . db_in($this->db['description']) . "'
					ORDER BY id ASC
					LIMIT 1
				;";
				db_query($sql);
				$sql = "
					INSERT INTO dynamic_areas (userID, name, mode, content, settings, lang, created_on, saved_on)
					SELECT userID, '" . db_in($copy_db['features']) . "', mode, content, settings, lang, NOW(), NOW()
					FROM dynamic_areas
					WHERE name = '" . db_in($this->db['features']) . "'
					ORDER BY id ASC
					LIMIT 1
				;";
				db_query($sql);

				$sql = "
					INSERT INTO dynamic_areas (userID, name, mode, content, settings, lang, created_on, saved_on)
					SELECT userID, '" . db_in($copy_db['ingredients']) . "', mode, content, settings, lang, NOW(), NOW()
					FROM dynamic_areas
					WHERE name = '" . db_in($this->db['ingredients']) . "'
					ORDER BY id ASC
					LIMIT 1
				;";
				db_query($sql);

				$sql = "
					INSERT INTO dynamic_areas (userID, name, mode, content, settings, lang, created_on, saved_on)
					SELECT userID, '" . db_in($copy_db['benefits']) . "', mode, content, settings, lang, NOW(), NOW()
					FROM dynamic_areas
					WHERE name = '" . db_in($this->db['benefits']) . "'
					ORDER BY id ASC
					LIMIT 1
				;";
				db_query($sql);

				// Category Tab
				$sql = "
					INSERT IGNORE INTO products2folders (folderID, product_id, sort_order)
					SELECT folderID, " . (int) $copy_key . ", sort_order
					FROM products2folders
					WHERE product_id = " . (int) $this->te_key . "
				;";
				db_query($sql);

				// Inventory Tab
				$sql = "
					INSERT INTO product_attributes (product_id, attr_name)
					SELECT " . (int) $copy_key . ", attr_name
					FROM product_attributes
					WHERE product_id = " . (int) $this->te_key . "
				;";
				db_query($sql);
				$sql = "
					INSERT INTO product_attribute_options (attr_id, op_name)
					SELECT o.attr_id, o.op_name
					FROM product_attribute_options o
					JOIN product_attributes a ON o.attr_id = a.attr_id
					WHERE a.product_id = " . (int) $this->te_key . "
				;";
				db_query($sql);
				$sql = "
					INSERT INTO product_stock_items (product_id, attval_0, attval_1, attval_2, attval_3, attval_4, attval_5, attval_6, attval_7, attval_8, attval_9, product_code, price, compare_price, flat_shipping_price, flat_handling_fee, weight, length, width, height, track_stock_level, stock, deny_purchase_without_stock, date_added)
					SELECT " . (int) $copy_key . ", attval_0, attval_1, attval_2, attval_3, attval_4, attval_5, attval_6, attval_7, attval_8, attval_9, product_code, price, compare_price, flat_shipping_price, flat_handling_fee, weight, length, width, height, track_stock_level, stock, deny_purchase_without_stock, '" . db_in($now) . "'
					FROM product_stock_items
					WHERE product_id = " . (int) $this->te_key . "
				;";
				db_query($sql);

				util_redirect($this->url('te_mode=update&te_key=' . $copy_key));
			}
		}

		//update main image path cache
		$sql = "
			SELECT f.*
			FROM files f
			WHERE f.foreignID = " . (int) $this->te_key . "
			AND f.foreign_table = 'products'
			ORDER BY f.fileID ASC
		;";
		$images = $AI->db->GetAll($sql);
		if(isset($images[0]))
		{
			$found_img_url = 'uploads/files/' . $images[0]['dirname'] . '/' . $images[0]['filename'];
			//save updated main image url
			$sql = '
				UPDATE products SET
				img_url = "'.db_in($found_img_url).'",
				img_url_last_update = "'.date('Y-m-d H:i:s').'"
				WHERE product_id = "'.(int)$this->te_key.'"
				LIMIT 1
			;';
			db_query($sql);
		}
		else
		{
			$sql = "
				UPDATE products
				SET img_url = NULL
				, img_url_last_update = '" . db_in(date('Y-m-d H:i:s')) . "'
				WHERE product_id = '" . (int) $this->te_key . "'
				LIMIT 1
			;";
			db_query($sql);
		}
	}

	function validate_delete( $delKey )
	{
		//BEFORE DELETE -- return false to abort delete
		return true;
	}

	function finalize_delete( $delKey )
	{
		//AFTER DELETE
	}

	//overriding select so that serialized data does not have slashes removed
	function select( $pk )
	{
		//return true on success, false on error

		if( $this->is_valid_key( $pk ) )
		{
			$this->te_key = $pk;
			$result = db_query("SELECT * FROM " . $this->_dbTableName . " WHERE " . $this->_keyFieldName . " = " . ( $this->_numeric_key ? (int)db_in($this->te_key) : "'".db_in($this->te_key)."'" ) . ";");
			if( !$result ){ return false; }

			$row = db_fetch_assoc($result);
			if( $row )
			{
				//LOAD THE VARIABLES FROM THE DB
				foreach( $this->db as $n => $v )
				{
					if( isset($row[$n]) )
					{
						$this->db[$n] = db_out( $row[$n] );
					}
				}
				return true;
			}
			else
			{
				return false;
			}
		}
	}//~function select( $pk )

	function calcSqlQuery_ASearch()
	{
		$asearch_sql = '';

		//ADD SEARCHES FOR DB FIELDS
		if( $this->search_vars['product_id'] != '' ){ $asearch_sql .= "AND product_id LIKE '%" . db_in( $this->search_vars['product_id'] ) . "%' "; }
		if( $this->search_vars['date_added'] != '' ){ $asearch_sql .= "AND date_added LIKE '%" . db_in( $this->search_vars['date_added'] ) . "%' "; }
		if( $this->search_vars['title'] != '' ){ $asearch_sql .= "AND title LIKE '%" . db_in( $this->search_vars['title'] ) . "%' "; }
		if( $this->search_vars['url_name'] != '' ){ $asearch_sql .= "AND url_name LIKE '%" . db_in( $this->search_vars['url_name'] ) . "%' "; }
		if( $this->search_vars['description'] != '' ){ $asearch_sql .= "AND description LIKE '%" . db_in( $this->search_vars['description'] ) . "%' "; }
		if( $this->search_vars['features'] != '' ){ $asearch_sql .= "AND features LIKE '%" . db_in( $this->search_vars['features'] ) . "%' "; }
		if( $this->search_vars['is_external'] != '' ){ $asearch_sql .= "AND is_external LIKE '%" . db_in( $this->search_vars['is_external'] ) . "%' "; }
		if( $this->search_vars['external_content'] != '' ){ $asearch_sql .= "AND external_content LIKE '%" . db_in( $this->search_vars['external_content'] ) . "%' "; }
		if( $this->search_vars['brand'] != '' ){ $asearch_sql .= "AND brand LIKE '%" . db_in( $this->search_vars['brand'] ) . "%' "; }


		//example: if( $this->search_vars['example_of_a_special_search_var'] != '' ){ $asearch_sql .= "AND example_of_a_special_search_var LIKE '%" . db_in( $this->search_vars['example_of_a_special_search_var'] ) . "%' "; }

		return $asearch_sql;
	}

	/**
	 * DRAW INPUT FIELDS
	 * $mode : asearch, edit, inline
	 * $element_id : this will default to $fieldname if left blank
	 */
	function draw_input_field( $fieldname, $value, $mode, $element_id = '' )
	{
		global $AI;

		if( $element_id == '' ){ $element_id = $fieldname; }
		if($mode=='asearch') { $this->draw_input_field_by_desc( $fieldname, $value, $mode, $this->desc[ $fieldname ], $element_id ); }
		else switch( $fieldname )
		{
			//DRAW THE INPUT FIELD BASED UPON THE DATABASE'S DESCRIBE RESULTS

			/*
			case 'include_manual_price':
			case 'subscription':
			case 'include_attributes':
				if($value == '') { $value = $this->desc[ $fieldname ]['Default']; }
				$field_type = $this->parse_field_type( $this->desc[ $fieldname ]['Type'] );

				echo '<input id="' . $element_id . '" type="hidden" name="' . $fieldname . '" value="' . htmlspecialchars( ( $mode != 'asearch' && $value == '' ) ? @$desc_row['Default'].'' : $value ) . '" >';

				if( $mode == 'asearch' )
				{
					echo "\n" . ' Any<input id="' . $element_id . '_default" class="te" type="radio" name="' . $fieldname . '_radio_button" value="" ' . ( $value == '' ? 'checked' : '' ) . '  onClick="if(this.checked){ document.getElementById(\'' . $element_id . '\').value = this.value; } " onChange="if(this.checked){ document.getElementById(\'' . $element_id . '\').value = this.value; } " onKeyUp="if(this.checked){ document.getElementById(\'' . $element_id . '\').value = this.value; } ">&nbsp;&nbsp;';
				}

				// Add JS to make extra area appear
				$extra_js = 'if(this.value == \'Yes\') { $(\'#'.$fieldname.'_extra\').show(); } else { $(\'#'.$fieldname.'_extra\').hide(); }';
				foreach( $field_type['attribs'] as $i => $attrib )
				{
					echo "\n " . ucwords($attrib) . '<input id="' . $element_id . '_' . $attrib . '" class="te" type="radio" name="' . $fieldname . '_radio_button" value="' . $attrib . '" ' . ( ( $value == $attrib || ( $mode != 'asearch' && $value == '' && @$desc_row['Default'].'' == $attrib ) ) ? 'checked' : '' ) . ' onClick="if(this.checked){ document.getElementById(\'' . $element_id . '\').value = this.value; } '.$extra_js.'" onChange="if(this.checked){ document.getElementById(\'' . $element_id . '\').value = this.value; }  '.$extra_js.'" onKeyUp="if(this.checked){ document.getElementById(\'' . $element_id . '\').value = this.value; }  '.$extra_js.'">&nbsp;&nbsp;';
				}

				break;
			*/

			/*case 'description':
				{
					$this->_dynafields->row_title = 'Language';
					$this->_dynafields->draw_input_fields($fieldname, $value, $mode, $element_id);
				}
				break;*/
			/*
			case 'triggers':
				$this->_dynafields_triggers->row_title = 'Trigger';
				$this->_dynafields_triggers->draw_input_fields($fieldname, $value, $mode, $element_id);
				break;
			*/
			/*
			case 'subscription_rates':
				{
					$this->_dynafields_sub->row_title = 'Rate';
					$this->_dynafields_sub->draw_input_fields($fieldname, $value, $mode, $element_id);
				}
				break;
			*/
			/*
			case 'attributes':
				$this->_dynafields_attr->row_title = 'Attribute';
				$this->_dynafields_attr->draw_input_fields($fieldname, $value, $mode, $element_id);
				break;
			*/
			/*
			case 'price':
				{
					if ($value == '') { $value = 0; }
					echo '<input type="text" id="' . $element_id . '" name="' . $fieldname . '" value="' . $value . '" onchange="if($(\'#taxable_price\').val() == \'0\'){$(\'#taxable_price\').val(this.value);}" onkeypress="return check_number(event);" onblur="this.value -= 0;" />';
				}
				break;

			case 'weight':
			case 'taxable_price':
			case 'cv':
			case 'bv':
			case 'other1':
			case 'other2':
			case 'other3':
			case 'other6':
			case 'other7':
			case 'other8':
			case 'other9':
				{
					if ($value == '') { $value = 0; }
					echo '<input type="text" id="' . $element_id . '" name="' . $fieldname . '" value="' . $value . '" onkeypress="return check_number(event);" onblur="this.value -= 0;" />';
				}
				break;

			case 'sort_order':
				{
					if ($this->te_mode == 'insert' || $this->te_mode == 'copy')
					{
						$value = (int)db_lookup_scalar("SELECT MAX(sort_order) + 5 FROM " . $this->_dbTableName . " WHERE folderID = ".$this->db['folderID'].";");
						if (!$value) { $value = 5; }
					}
					echo '<input type="text" id="' . $element_id . '" name="' . $fieldname . '" value="' . htmlspecialchars($value) . '" size="11" maxlength="11" />';
				}
				break;
			*/
			case 'affiliate_commission_group':
				$sql = 'SELECT * FROM affiliate_commission_groups';
				$groups = $AI->db->GetAll($sql, 'group_id');

				if($value<1){
					$value = db_lookup_scalar("SELECT group_id FROM affiliate_commission_groups WHERE is_default='Yes'");
				}

				echo '<select name="'.$fieldname.'" id="'.$element_id.'" onchange="ajax_get_request(\''.$this->ajax_url('update_commission_group', 'group_id=\'+this.value').', ajax_handler_default, \'affiliate_commission_group_display\')" >';
				echo '<option value="0">None</option>';
				foreach ($groups as $id => $row) {
					$name = $row['name'];
					echo '<option value="'.$id.'" '.(($value == $id) ? 'selected="selected"' : '').'>'.$name.'</option>';
				}
				echo '</select>';
				echo '<div id="affiliate_commission_group_display">';
				if((int)$value > 0) {
					$groups_te = new C_te_affiliate_commission_groups();
					$groups_te->select($value);
					$groups_te->draw_value_field( 'payout_settings', $groups_te->db['payout_settings'].'', $this->te_key, 'view' );
				}
				echo '</div>';
				break;
			/*
			case 'manual_price_range':
				$value = @explode('-', $value);

				if(!isset($value['0']) || $value['0'] == '') {
					$value['0'] = '1';
				}

				if(!isset($value['1']) || $value['1'] == '') {
					$value['1'] = '2';
				}

				echo '$&nbsp;<input type="text" name="'.$fieldname.'_min" value="'.$value['0'].'" id="'.$element_id.'_min" style="text-align:right;width:50px;" onkeypress="return check_number(event);"/> thru. ';
				echo '$&nbsp;<input type="text" name="'.$fieldname.'_max" value="'.$value['1'].'" id="'.$element_id.'_max" style="text-align:right;width:50px;" onkeypress="return check_number(event);"/>';
				break;
			case 'shipping_prices':
				// Default Price
				$prices = array();
				if($value != '') {
					$prices = unserialize($value);
				}
				echo '<div class="shipping_wrapper"><label for="shipping_default" class="shipping">Default</label><input type="text" name="shipping_default" value="'.@$prices['default'].'" id="shipping_default" class="shipping"></div>';
				$sql = 'SELECT * FROM shipping_rates_special';
				$rates = $AI->db->GetAll($sql);
				if(is_array($rates)) {
					foreach ($rates as $r) {
						echo '<div class="shipping_wrapper"><label for="shipping_'.$r['rate_id'].'" class="shipping">'.$r['name'].'</label><input type="text" name="shipping_'.$r['rate_id'].'" value="'.@$prices[$r['rate_id']].'" id="shipping_'.$r['rate_id'].'" class="shipping"></div>';
					}
				}
				echo '&nbsp;<br>&nbsp;<br>&nbsp;';
				break;
			*/
			case 'on_purchase_permission_group':
				  $AI->draw_access_groups_select($fieldname,$value, false);
				break;
			case 'scheduled_purchase_product':
				$this->draw_product_select($fieldname, $element_id, $value, '', 'This');
				break;
			case 'url_name':
				echo '<span class="input_addon_left">' . h(AI_HTTP_URL) . 'store/p/</span>';
				echo '<input type="text" class="input_right" id="' . $element_id . '" name="' . $fieldname . '" value="' . h($value) . '" />';
				break;
			case 'alternate_url':
				echo '<span class="input_addon_left">' . h(AI_HTTP_URL) . '</span>';
				echo '<input type="text" class="input_right" id="' . $element_id . '" name="' . $fieldname . '" value="' . h($value) . '" />';
				break;

			case 'title':
			{
				echo '<input type="text" id="' . $element_id . '" class="span10" name="' . $fieldname . '" value="' . htmlspecialchars($value) . '" />';
			}
			break;

			case 'description':
			case 'ingredients':
			case 'benefits':
			case 'features':
			{
				if ( $value == '' )
				{
					$value = $this->make_dynamic_area_name($fieldname);
				}
				echo '<input type="hidden" name="' . $fieldname . '" value="' . h($value) . '" />';
				echo $AI->get_dynamic_area( /*$name_or_id*/ $value, /*$type =*/ 'name', /*$lang =*/ $AI->get_lang(), /*$edit =*/ true, /*$inline =*/ true, /*$width =*/ '100%', /*$height =*/ '300', /*$history =*/ true);
			}
			break;

			default: { $this->draw_input_field_by_desc( $fieldname, $value, $mode, $this->desc[ $fieldname ], $element_id ); } break;
		}

	}
	function draw_input_field_folders(){
		global $AI;
		$fieldname='folderID';
		//$db_where = util_mod_enabled('doba')? 'visible=1':'';
		$te = new C_te_product_folders();
		$sql = 'SELECT * FROM products2folders WHERE product_id = '.$this->te_key;
		$folders = $AI->db->GetAll($sql, 'folderID');
		if(!is_array($folders) || count($folders) <= 0) {
			$key = (isset($this->default_folder) ? $this->default_folder : 0);
			$folders = array($key => array());
		}
		// util_vardump($folders, 'folders');
		$def = '<span id="folder_"><select name="'.$fieldname.'[]" id="folder_select_">';
		ob_start();
		$te->draw_folder_options(0, '', 0);
		$def.= ob_get_contents();
		ob_end_clean();
		$def.= '</select>&nbsp;';
		//$def.= '<input name="fp_sort[]" value="0">&nbsp;<a href="#" onclick="remove_folder(\'folder_\');return false;">X</a>';
		$def.= '<br></span>';
		$folder_count = 0;
		//echo 'Folder &amp; Sort Order<br>';
		foreach ($folders as $id => $f) {
			$folder_count++;
			echo '<span id="folder_'.$folder_count.'" style="display:block; margin-bottom:14px;">';
			echo '<select name="'.$fieldname.'[]" id="folder_select_'.$folder_count.'">';
			$te->draw_folder_options(0, '', $id);
			echo '</select>&nbsp;';
			//echo '<input name="fp_sort[]" value="'.(isset($f['sort_order']) ? $f['sort_order'] : '0').'">';
			if($folder_count > 1) {
				echo '&nbsp;<a href="#" onclick="remove_folder(\'folder_'.$folder_count.'\');return false;">X</a>';
			}
			echo '<br>';
			echo '</span>';
			echo '<script type="text/javascript" charset="utf-8">$(document).ready(function(){$("#folder_select_'.$folder_count.'").select_autocomplete();});</script>';
		}
		echo '<div id="additional_folders"></div>';
		?>

		<script type="text/javascript" charset="utf-8">
			var default_folder_select = '<?= addslashes($def) ?>';
			var folder_count = <?= (int)$folder_count ?>;
			function add_folder()
			{
				folder_count++;
				var new_id = 'folder_'+folder_count;
				var select = default_folder_select.replace(/folder_/gi, new_id);
				var select = default_folder_select.replace(/folder_select_/gi, 'folder_select_'+folder_count);
				$('#additional_folders').append(select);
				$("#folder_select_"+folder_count).select_autocomplete();
			}
			function remove_folder(id)
			{
				$('#'+id).slideUp(function(){
					$('#'+id).remove();
				});
			}
		</script>
		<?php
		echo '<a href="" onclick="add_folder();return false;">Add Category</a>';
		$AI->skin->js('includes/modules/products/includes/jquery.autocomplete.js');
	}

	/**
	 * DRAW VALUE FIELDS
	 */
	function draw_value_field( $fieldname, $value, $key, $mode )
	{
		global $AI;

		//IF THEY CAN "INLINE-EDIT" THEN SET IT UP
		if( $this->perm->get('ajax') && ( $this->inline_edit_db_field[ $fieldname ] == $mode || $this->inline_edit_db_field[ $fieldname ] == 'all' ) )
		{
			echo '<div class="te_inline_edit_cell" onClick="javascript:ajax_get_request( \'' . $this->ajax_url( 'inline_edit', 'te_key=' . $key . '&fieldname=' . $fieldname . '&view_mode=' . $mode ) . '\', ajax_handler_default );" >';
		}

		//DRAW THE VALUES
		if( $mode == 'table' )
		{
			switch( $fieldname )
			{
				case 'product_id': { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
				case 'date_added': { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
				//case 'title': { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
				case 'title':
				{
					//$desc = $AI->get_dynamic_area($this->db['description'], 'name', '', false);
					//$desc = substr(strip_tags($desc), 0, 200);
					//echo '<div style="overflow:hidden; white-space:nowrap; width:600px;">';
					if(AI_PAGE_NAME!='product_folders')
					{
						echo '<img src="images/menu_tree/shopping_cart_48.png" alt="" style="width:20px;height:20px;" /> ';
						echo h($value) . '&nbsp;';
					}
					else
					{
						//echo '<img src="images/te_sortable_icon.gif" alt=""  class="product_folder_sort" /> ';
						echo '<span class="glyphicon glyphicon-move product_folder_sort"></span> ';
						echo h($value) . '&nbsp;';
					}
					//echo '<small style="color:#ccc;">' . h($desc) . '</small>&nbsp;';
					//echo '</div>';
				}
				break;
				/*
				case 'stock':
					{
						if($this->db['unlimited_stock'] == 'Yes')
						{
							echo '&#8734;&nbsp;';
						}
						else
						{
							echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;';
						}
					} break;
				case 'view_status': { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
				case 'weight': { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
				case 'taxable_price': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'price':
					{
						if($this->db['subscription'] == 'Yes')
						{
							echo 'Subscription&nbsp;';
						}
						else
						{
							if($this->db['special_price'] > 0) {
								echo '<strike> $'.htmlspecialchars( number_format($value, 2)).'</strike>&nbsp;$'.number_format($this->db['special_price'], 2);
							}
							else{
								echo util_trim_string( '$'.htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;';
							}
						}
					} break;
				case 'cv': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'bv': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'other1': { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
				case 'other2': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'other3': { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
				case 'other6': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'other7': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'other8': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'other9': { echo util_trim_string( htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;'; } break;
				case 'folderID':
					{
						$serialized_data = db_lookup_scalar("SELECT title FROM product_categories WHERE folderID = " . (int)$value . " LIMIT 1;");
						$df = new C_dynamic_fields('Title', 'Language');
						$value = $df->get_single_value_by_condition($serialized_data, 'Title', 'Language', $AI->get_setting('default_lang'));
						echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;';
					}
					break;
				*/
				/*case 'description':
					{
						$value = $this->_dynafields->get_single_value_by_condition($value, 'Title', 'Language', $this->_ai_lang);
						echo util_trim_string( htmlspecialchars( strip_tags($value) ), 25, '..' ) . '&nbsp;';
					}
					break;*/

				default: { echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;'; } break;
			}
		}
		elseif( $mode == 'view' )
		{
			switch( $fieldname )
			{
				case 'product_id': { echo htmlspecialchars( $value ) . '&nbsp;'; } break;
				case 'date_added': { echo htmlspecialchars( $value ) . '&nbsp;'; } break;
				case 'title': { echo htmlspecialchars( $value ) . '&nbsp;'; } break;
				case 'show_qty_input':
					echo $this->db['show_qty_input'];
					break;
				/*
				case 'stock':
					{
						if($this->db['unlimited_stock'] == 'Yes')
						{
							echo '&#8734;&nbsp;';
						}
						else
						{
							echo util_trim_string( htmlspecialchars( $value ), 25, '..' ) . '&nbsp;';
						}
					} break;
				case 'view_status': { echo htmlspecialchars( $value ) . '&nbsp;'; } break;
				case 'weight': { echo htmlspecialchars( $value ) . '&nbsp;'; } break;
				case 'taxable_price': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'price':
					{
						if($this->db['subscription'] == 'Yes')
						{
							echo 'See Subscription Rates &nbsp;';
						}
						else
						{
							if($this->db['special_price'] > 0) {
								echo '<strike> $'.htmlspecialchars( number_format($value, 2)).'</strike>&nbsp;$'.number_format($this->db['special_price'], 2);
							}
							else{
								echo util_trim_string( '$'.htmlspecialchars( number_format($value, 2) ), 25, '..' ) . '&nbsp;';
							}
						}
					} break;
				case 'cv': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'bv': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'other1': { echo htmlspecialchars( $value ) . '&nbsp;'; } break;
				case 'other2': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'other3': { echo htmlspecialchars( $value ) . '&nbsp;'; } break;
				case 'other6': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'other7': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'other8': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'other9': { echo htmlspecialchars( number_format($value, 2) ) . '&nbsp;'; } break;
				case 'handling_fee':{echo '$ '.htmlspecialchars(number_format($value,2)).'&nbsp;';} break;
				case 'folderID':
					{
						$serialized_data = db_lookup_scalar("SELECT title FROM product_categories WHERE folderID = " . (int)$value . " LIMIT 1;");
						$df = new C_dynamic_fields('Title', 'Language');
						echo htmlspecialchars( $df->get_single_value_by_condition($serialized_data, 'Title', 'Language', $AI->get_setting('default_lang')) );
					}
					break;

				case 'subscription_rates':
					{
						$this->_dynafields_sub->draw_value_fields($fieldname, $value, $key, $mode);
					}
					break;
				case 'triggers':
					// $this->_dynafields_triggers->draw_value_fields($fieldname, $value, $key, $mode);
					$triggers = @unserialize($value);
					if(is_array($triggers) && count($triggers) > 0) {
						foreach ($triggers as $row_id => $t) {
							if($t['0'] > 0) {
								$sql = 'SELECT product_code, description, product_id FROM products WHERE product_id = '.(int)$t['0'];
								$p = db_lookup_assoc($sql);
								$title = $this->_dynafields->get_single_value_by_condition($p['description'], 'Title', 'Language', $AI->get_setting('default_lang'));
								echo '('.$p['product_code'].') '.$title.' | QTY:'.$t['1'];
								if($t['2'] != ''){
									echo ' | Attribute '.$t['2'];
								}

								if($t['3'] != '') {
									echo ' | Subscription '.$t['3'];
								}
								// echo ' ID '.$t['0'];
								echo '<br>';
							}
						}
					}
					echo '&nbsp;';
					break;

				case 'subscription_shipping':
					if($value > 0) {
						echo '$'.number_format($value, 2);
					} else {
						echo 'FREE';
					}
					break;

				case 'manual_price_range':
					$value = @explode('-', $value);
					echo '$'.number_format(@$value['0'], 2).' thru. $'.number_format(@$value['1'], 2);
					break;

				case 'shipping_prices':
					$rates = @unserialize($value);
					if(is_array($rates) && count($rates)) {
						$sql = 'SELECT * FROM shipping_rates_special';
						$s = $AI->db->GetAll($sql, 'rate_id');
						foreach ($rates as $id => $rate) {
							if($id == 'default') {
								echo '<b>Default</b> ';
							}
							elseif(isset($s[$id]) && $s[$id]['name'] != '') {
								echo '<b>'.$s[$id]['name'].'</b> ';
							}
							else {
								echo '<b><i>Unknown '.$id.'</i></b> ';
							}
							echo '$'.number_format($rate, 2).'&nbsp;&nbsp;';
						}
					}
					echo '&nbsp;';
					break;

				case 'subscription_delay':
					echo "$value Days Delay.  Initial Price of $".number_format($this->db['price'], 2)." charged during checkout.";
					break;

				*/

				case 'affiliate_commission_group':
					if((int)$value > 0) {
						$groups_te = new C_te_affiliate_commission_groups();
						$groups_te->select($value);
						echo '<h3>'.htmlspecialchars($groups_te->db['name']).'</h3>';
						$groups_te->draw_value_field( 'payout_settings', $groups_te->db['payout_settings'].'', $this->te_key, 'view' );
					} else {
						echo 'None';
					}
					break;


				default: { echo htmlspecialchars( $value ); } break;
			}
		}
		else
		{
			echo 'Error: Invalid view mode specified.';
		}

		//IF THEY CAN "INLINE-EDIT" THEN FINISH IT UP
		if( $this->perm->get('ajax') && ( $this->inline_edit_db_field[ $fieldname ] == $mode || $this->inline_edit_db_field[ $fieldname ] == 'all' ) )
		{
			echo '</div>';
		}
	}

	function get_current_image_fileID($key, $title = 'small')
	{
		return (int)db_lookup_scalar("SELECT fileID FROM files WHERE foreign_table = '" . $this->_dbTableName . "' AND foreignID = '" . (int)$key . "' AND title = '" . db_in($title) . "' LIMIT 1;");
	}

	function draw_current_image($key)
	{
		$file_small = db_lookup_assoc("SELECT * FROM files WHERE foreign_table = '" . $this->_dbTableName . "' AND foreignID = '" . (int)$key . "' AND title = 'small' LIMIT 1;");
		$file_large = db_lookup_assoc("SELECT * FROM files WHERE foreign_table = '" . $this->_dbTableName . "' AND foreignID = '" . (int)$key . "' AND title = 'large' LIMIT 1;");

		if ($file_small && $file_large)
		{
			$img_src_small  = 'image.php?imgurl=' . urlencode('uploads/files/' . $file_small['dirname'] . '/' . $file_small['filename']);
			$img_src_large  = 'image.php?imgurl=' . urlencode('uploads/files/' . $file_large['dirname'] . '/' . $file_large['filename']);
			echo '<a rel="" href="' . htmlspecialchars($img_src_large) . '" class="lightwindow" title="Current Image">';
			echo '<img src="' . htmlspecialchars($img_src_small) . '" alt="Current Image" style="border:0;" />';
			echo '</a>';
		}
		elseif ($file_small)
		{
			$img_src_small  = 'image.php?imgurl=' . urlencode('uploads/files/' . $file_small['dirname'] . '/' . $file_small['filename']);
			echo '<img src="' . htmlspecialchars($img_src_small) . '" alt="Current Image" style="border:0;" />';
		}
	}

	//updated to use simptip -ben 2011.09.20
	function draw_tool_tip($name)
	{
		global $AI;
		echo '<div id="simptip_'.$name.'" class="simptip_qmark"><img src="'.$AI->get_setting('MASTER_URL').'includes/plugins/tool_tip/images/qmark_15.gif" style="border-style: none" /></div>';
	}

	function draw_tool_tip_js()
	{
	?>
		<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			simptip_nice("#simptip_prod_folder", "Product Folder", "The organizational tool for products.  Folders determine who will be able to view the products.  You may select a new folder, and when this product is saved it will be moved to that folder.");
			simptip_nice("#simptip_prod_code", "Product Code", "A unique identifying code selected by the merchant.");
			simptip_nice("#simptip_prod_description", "Product Description", "A general summary of this product.");
			simptip_nice("#simptip_prod_unlim_stock", "Unlimited Stock", "If this option is set to true, the product will never display a low stock warning and no subscription will be taken into account regarding stock.");
			simptip_nice("#simptip_prod_show_qty_input", "Show Quantity Input", "Toggles the display of quantity input for this product.");
			simptip_nice("#simptip_prod_limit_qty", "Limit Quantity", "This field represent the max quantity a customer can purchase in a single transaction.  If the value is 0, their is not limit on the quantity.");
			simptip_nice("#simptip_prod_price", "Price", "This is the price charged to the customer purchasing this product.  If this item contains attributes, they could effect this price.  If this item is a \"subscription\", then this price is not used and subscription prices are used.  Prices is in USD.");
			simptip_nice("#simptip_prod_special_price", "Special Price", "Special Price will be charged if its greater than $0.00.  Display will show the original price, slashed with the special price.");
			simptip_nice("#simptip_prod_taxable", "Taxable", "If selected \"Yes\", then takes will be calculated for this item if the shipping state is properly set up in \"taxes\" area.  If not, then taxes will not be charged.");
			simptip_nice("#simptip_prod_inc_attr", "Include Attributes", "If selected \"Yes\", then attributes will be enabled for this product.  See below to set up attributes.");
			simptip_nice("#simptip_prod_attr", "Attributes", "Attributes represent a specific part of your product.  If \"Include Attributes\" is selected to \"Yes\", then attributes will be included with your product. Click \"Add Attribute\" to add as many attributes as desired.  Attr ID is required and represents a unique identifier to represent the attribute.  If Price is 0 or left blank, this attribute will not effect the price structure, other wise the price will effect the price specified above. Or if this item is a subscription, then it will effect the subscription price.<br>EX: Product is a T-shirt, then attributes could represent the size (s, m, l, xl, xxl) or colors (red, blue, green or white).");
			simptip_nice("#simptip_prod_attr_name", "Attribute Name", "A name that  is displayed to your customers to identify the attribute.<br><br>Ex: \"color\" or \"size\"");
			simptip_nice("#simptip_prod_activation_fee", "Activation Fee", "A activation fee is a one time charge that is charged during checkout.");
			simptip_nice("#simptip_prod_affiliate_group", "Affiliate Group", "Affiliate Groups determine how much an affiliate will be paid based on their affiliate level when this product is purchased using an affiliate campaign code.");
		});
		</script>
	<?php
	}
	/*
	function draw_tool_tip_OLD($name)
	{
		$this->tool_tip->select_by_name($name);
		echo $this->tool_tip->get_qmark_15();
	}
	*/

	//////////////////////////override get_list_sql

	function get_list_sql( $extra_where = '' )
	{
		// Re-wrote this method because the duplicated logic was starting to become obselete
		// At the time of this rewrite, the multi-select logic was depending on the updated logic of parent::get_list_sql()
		// Thus, fetched the parent's return and only altered what is needed to retain the desired query
		// -JonJon 2014-11-25 15:14:03 -1000
		$sql = parent::get_list_sql($extra_where);
		$sql = $this->alter_query($sql, 'append', 'JOIN', "LEFT JOIN `products2folders` AS p2f ON p2f.`product_id` = this.`" . $this->_keyFieldName . "`");
		$sql = $this->alter_query($sql, 'append', 'GROUP BY', "GROUP BY this.`" . $this->_keyFieldName . "`");
		return $sql;
	}

	function get_list_sql_OLD( $extra_where = '' )
	{
		// Only use these mods in export mode.  Don't touch billing profiles unless you have to (even viewing only)!
		// if($this->te_mode != 'export') {
		// 	return C_tableedit_base::get_list_sql();
		// }

		//$this->read_search_vars_session();  //this can be used to maintain previous search vars which are not read in by "$this->read_search_vars_get();"
		$this->read_search_vars_get();
		$dbWhere = $this->calcSqlQuery();

		if( $dbWhere != '' && $this->dbWhere != '' )
		{
			$dbWhere = " ( " . $this->dbWhere . " ) AND ( " . $dbWhere . " ) ";
		}
		elseif( $this->dbWhere != '' )
		{
			$dbWhere = $this->dbWhere;
		}

		if( $dbWhere != '' )
		{
			$dbWhere = " WHERE " . $dbWhere . " ";
		}

		//debugger
		//echo "dbWhere=[" . $dbWhere . "]";

		$this->get_paging_info();
		$this->get_orderby_info();

		if(strpos($this->_obField, '.') === false) {
			$dbOrderBy = " ORDER BY " . $this->_dbTableName . '.' . $this->_obField . " " . $this->_obDir . " ";
		}
		else {
			$dbOrderBy = " ORDER BY " . $this->_obField . " " . $this->_obDir . " ";
		}
		//SLURP THE INFO OUTTA THE DATABASE

		// add the table name infront of they keyname to make is unique
		$keys = array();
		foreach (array_keys($this->db) as $key) {
			$keys[] = $this->_dbTableName.'.'.$key;
		}
		// also pull some extra data, saves queries in table mode
		$tables['p2f'] = array('folderID', 'sort_order');
		foreach ($tables as $name => $columns) {
			foreach ($columns as $c_name) {
				$keys[] = $name.'.'.$c_name.' as '.$name.'_'.$c_name;
			}
		}

		// This query does have the possibility of relating things wrong... external_id for a invoice could point to a grant payment
		//  Then those rows for the grant payment would also be filled.  When looping through results, items will be specifiec to a site_specific level,
		//  So it does not matter!
		$sql = "SELECT " . ( isset($this->db[$this->_keyFieldName]) ? '' : $this->_keyFieldName.','  ) . implode( ',', $keys ) . " FROM " . $this->_dbTableName. '';
		$sql.= ' LEFT JOIN ( products2folders p2f) ON ( p2f.product_id =  products.product_id) ';
		$sql.= $dbWhere .' GROUP BY '.$this->_keyFieldName.' '. $dbOrderBy . ";"; // Added the group by to make left join unique
		$sql = str_replace('this.','products.',$sql);
		return $sql;
	}

	function draw_product_select($fieldname, $element_id, $selected_product = 0, $on_change_js = '', $default_msg = 'Select a Product') {
		global $AI;
		echo '[draw_product_select() should refference new attribute options also]';
		return;

		$df = new C_dynamic_fields('Title', 'Description', 'Features', 'Language');

		if(!isset($this->cached_product_res)) {
			$sql = 'SELECT product_code, description, product_id FROM products';
			$res = db_query($sql);
			$this->cached_product_res = $res;
		}
		else {
			$res = $this->cached_product_res;
		}

		echo '<select name="'.$fieldname.'" id="'.$element_id.'" onchange="'.$on_change_js.'" style="width:330px;">';
		echo '<option value="0">'.$default_msg.'</option>';
		while ($res && $p = db_fetch_assoc($res)) {
			$id = $p['product_id'];
			$title = $df->get_single_value_by_condition($p['description'], 'Title', 'Language', $AI->get_setting('default_lang'));
			echo '<option value="'.$id.'" '.( ($id == $selected_product) ? 'selected="selected"' : '' ).'>'.htmlspecialchars(addslashes(($p['product_code'] != '' ? $p['product_code'].' - ' : '').$title)).'</option>';
		}
		echo '</select>';
	}










	function te_mode_ajax()
	{
		if( $this->ajax_cmd != '' )
		{
			if( $this->perm->get('update') ) //'ajax_cmd_' . $this->ajax_cmd ) )
			{
				require( ai_cascadepath( $this->ajax_include_file ) );
			}
			else
			{
				echo 'ajax_error|Permission Denied.';
			}
		}
		else
		{
			echo 'ajax_error|Error: No Ajax Command Specified.';
		}

	}//~function te_mode_ajax()


	//$this->select() on product key before calling this (like in ajax)
	function draw_attribute_contents()
	{
		global $AI;
		global $attr_colors;
		?>
		<h2 class="divlabel" style="margin-bottom:7px;">Product Attributes<br /><small>Examples: Color, Size</small></h2>
		<?php
		if($this->te_mode=='insert') {
			echo 'You need to save the new product before adding attributes or inventory!';
		} else {
			$att_rs = db_query("SELECT * FROM product_attributes WHERE product_id='".$this->te_key."' ORDER BY attr_id");
			if(!$att_rs || db_num_rows($att_rs)==0) echo '<div id="noattrmsg">There are no attributes on this product.</div>';
			//echo "<table id='att_table'>";
			require_once ai_cascadepath('includes/core/classes/color.php');
			echo '<ul id="att_cloud" class="tag_cloud" style="margin-bottom:7px;">';
			$i=0;
			while($att_rs && ($attr=db_fetch_assoc($att_rs))!==false) {
				$ops = $AI->db->GetAll("SELECT * FROM product_attribute_options WHERE attr_id=".$attr['attr_id'],'op_name');
				//echo "<tr><td><img src='images/drop.png' onClick='delete_attribute(".$attr['attr_id'].");' style='cursor:pointer;'></td><td width=100 align=left style='color:".$attr_colors[$i++]."; font-weight:bold; vertical-align:top;'>".h($attr['attr_name'])."&nbsp;</td><td>".((is_array($ops) && count($ops))? implode(', ',array_keys($ops)):'No Options')."</td></tr>"; //<input name='attr_name_".$attr['attr_id']."' value='".$attr['attr_name']."'>

				$tag_color = $attr_colors[$i];

				$color1 = new C_color($tag_color);
				$color1->lighten(25);
				$tint = $color1->hex();

				$color2 = new C_color($tag_color);
				$color2->darken(25);
				$shade = $color2->hex();

				$border_color = sprintf('#%s #%s #%s #%s', $tint, $shade, $shade, $tint);
				echo '<li class="tag" style="background-color:' . h($tag_color) . '; border-color:' . $border_color . ';"><a href="javascript:void(0);">' . h($attr['attr_name']) . '</a> <a class="remove_tag" href="#" onclick="delete_attribute(' . (int) $attr['attr_id'] . '); return false;"><span>&times;</span></a></li>';
				$i++;
			}
			//echo "</table>";
			echo '</ul>';
			?>
			<p><input id='attr_update_button' type="button" value="Update Attributes" onClick='update_attributes();' style='display:none;'></p>
			<p><a href="#" onClick="add_attribute(); return false;">New Attribute</a><!-- (e.g. Size, Color)--></p>
			<?php
		} ?>
		<?php
	}


	function draw_inventory_contents()
	{
		if($this->te_mode=='insert') return;
		global $AI;
		global $attr_colors;

		//echo '<div class="divlabel">Inventory</div>';

		require(ai_cascadepath('includes/modules/product_inventory/includes/class.te_product_inventory.php'));
		$te_product_inventory = new C_te_product_inventory("product_id = " . (int) $this->te_key);
		$te_product_inventory->parent_te_key = $this->te_key;
		$te_product_inventory->draw_qsearch=false;
		$te_product_inventory->init_backbone_js = false;
		$te_product_inventory->run_TableEdit();

		/*
		//pull the attributes
		$rsm = db_query("SELECT * FROM product_attributes WHERE product_id=".$this->te_key." ORDER BY attr_id");
		$attrs = array(); while($rsm && ($row=db_fetch_assoc($rsm))!==false) { $attrs[]=$row; }
		$num_attr=count($attrs);

		echo "<table id='inventory_table'><tr>";
		foreach($attrs as $i=>$attr) { echo "<th style='color:".$attr_colors[$i].";'>".h($attr['attr_name'])."</th>"; }
		echo "<th>SKU</th><th>Price</th><th>Stock</th><th>&nbsp;</th>"
		echo "</tr>";
		echo "<tr>";

		$rsm = db_query("SELECT * FROM product_attributes WHERE product_id=".$this->te_key." ORDER BY attr_id");

		$attrs = array(); while($rsm && ($row=db_fetch_assoc($rsm))!==false) { $attrs[]=$row; }

		foreach($attrs as $i=>$attr) { echo "<th style='color:".$attr_colors[$i].";'>".h($attr['attr_name'])."</th>"; }
		echo "<th>SKU</th><th>Price</th><th>Stock</th><th>&nbsp;</th>"

		$att_rs = db_query("SELECT * FROM product_attributes WHERE product_id='".$this->te_key."' ORDER BY attr_id");
		if(!$att_rs || db_num_rows($att_rs)==0) echo '<div id="noattrmsg">There are no attributes on this product.</div>';
		echo "<table id='att_table' numatt='".db_num_rows($att_rs)."'>";
		$i=0;
		while($att_rs && ($attr=db_fetch_assoc($att_rs))!==false) {
			$ops = $AI->db->GetAll("SELECT * FROM product_attribute_options WHERE attr_id=".$attr['attr_id'],'op_name');
			echo "<tr><td><img src='images/drop.png' onClick='delete_attribute(".$attr['attr_id'].");' style='cursor:pointer;'></td><td width=100 align=left style='color:".$attr_colors[$i++]."; font-weight:bold; vertical-align:top;'>".$attr['attr_name']."&nbsp;</td><td>".((is_array($ops) && count($ops))? implode(', ',array_keys($ops)):'No Options')."</td></tr>"; //<input name='attr_name_".$attr['attr_id']."' value='".$attr['attr_name']."'>
		}
		echo "</table>";
		*/
	}


	function draw_product_nav() {
		global $AI;
		$AI->skin->css('css/products_topnav.css');

		$_GET['pmenu'] = $sel = isset($_GET['pmenu'])? $_GET['pmenu']:'Summary';
		$mops = array('Summary'=>'','Category'=>'','Description'=>'','Inventory'=>''/*,'Shipping'=>''*/,'Affiliate'=>'');
		if(isset($mops[$sel])) $mops[$sel]='class="pem_active"';
		?>
			<div id="product_edit_menu">
			  <ul>
		   		<?php
		   		foreach($mops as $option=>$active) {
			   		$url=util_adjust_url($_SERVER['REQUEST_URI'],'pmenu='.$option);
		   			//if($option=='Inventory') $option='Attribute Inventory';
		   			echo "<li><a href='$url' $active>$option</a></li>";
		   		}
		  		?>
			  </ul>
			</div>
		<?php
	}

	function get_GET($key, $default = null)
	{
		if ( !isset($_GET[$key]) )
		{
			return $default;
		}
		return $_GET[$key];
	}
	function get_POST($key, $default = null)
	{
		if ( !isset($_POST[$key]) )
		{
			return $default;
		}
		return ai_magic_quotes() ? stripslashes($_POST[$key]) : $_POST[$key];
	}

	function draw_folders($parent_id, &$children, $depth = 0)
	{
		static $count = 0;
		$parent_id = (int) $parent_id;
		if ( isset($children[$parent_id]) )
		{
			if ( $depth == 0 )
			{
				echo '<table id="product_categories_table" class="pad0">';
				echo '<thead>';
			}
			foreach ( $children[$parent_id] as $row )
			{
				if ( $count == 15 )
				{
					echo '</thead>';
					echo '<tfoot><tr><td colspan="3"><button id="product_categories_show_more" style="width:100%"><span>Show More</span></button></td></tr></tfoot>';
					echo '<tbody style="display:none;">';
				}
				echo "\n"; for($d=0;$d<$depth;$d++) echo '  ';
				echo '<tr id="product_folders_' . (int) $row['folderID'] . '"><td><input class="products2folders_checkbox" type="checkbox" val="' . (int) $row['folderID'] . '" chkrep="'.$row['folderID'].'"';
				/*if ( !empty($row['link_id']) )
				{
					echo ' checked="checked"';
				}*/
				echo ' /></td>';
				echo '<td style="line-height:28px;" class="filter-able">&nbsp;' . str_repeat('&emsp;', $depth) . h($row['title']) . '&nbsp;</td>';
				echo '<td style="line-height:28px;"><a href="#" class="mini_close product_folders_delete" style="margin-top:5px;" val="' . (int) $row['folderID'] . '" title="' . h($row['title']) . '"><span>&times;</span></a></td></tr>';
				$count++;
				$this->draw_folders($row['folderID'], $children, $depth + 1);
			}
			if ( $depth == 0 )
			{
				if ( $count >= 15 )
				{
					echo '</tbody>';
				}
				else
				{
					echo '</thead>';
				}
				echo '</table>';
			}
			return true;
		}
		return false;
	}
	function draw_folder_options($parent_id, &$parents, $depth = 0)
	{
		$parent_id = (int) $parent_id;
		if ( isset($parents[$parent_id]) )
		{
			foreach ( $parents[$parent_id] as $row )
			{
				echo '<option value="' . (int) $row['folderID'] . '">' . str_repeat('&emsp;', $depth) . '&bull; ' . h($row['title']) . '</option>';
				$this->draw_folder_options($row['folderID'], $parents, $depth + 1);
			}
			return true;
		}
		return false;
	}

	function draw_affiliate_commission_groups()
	{
		$sql = "
			SELECT level_id, name
			FROM affiliate_levels
			ORDER BY name ASC
		;";
		$res = db_query($sql);
		if ( $res )
		{
			$numrows = db_num_rows($res);
			if ( 0 < $numrows )
			{
				echo '<table id="affiliate_commission_groups_table" class="compact">';
				echo '<tbody>';
				while ( $res && $row = db_fetch_assoc($res) )
				{
					$row = array_map('db_out', $row);

					echo '<tr>';
					echo '<td>' . h($row['name']) . '</td>';
					echo '<td><a href="#" class="mini_close affiliate_commission_groups_delete" val="' . (int) $row['level_id'] . '"><span>&times;</span></a></td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
			}
			else
			{
				echo '<p>No Groups</p>';
			}
		}
		else
		{
			echo '<p>' . db_error() . '</p>';
		}
	}

	function draw_affiliate_marketing()
	{
		global $AI;

		$sql = "
			SELECT g.group_id, g.name, g.payout_settings, p.product_id
			FROM affiliate_commission_groups g
			LEFT JOIN products p ON g.group_id = p.affiliate_commission_group AND p.product_id = " . (int) $this->te_key . "
			ORDER BY g.name ASC
		;";
		$res = db_query($sql);
		if ( $res )
		{
			$numrows = db_num_rows($res);
			if ( 0 < $numrows )
			{
				$levels = $AI->db->GetAll("SELECT level_id, name FROM affiliate_levels ORDER BY name ASC;");

				echo '<table id="affiliate_marketing_table" class="nice compact">';

				echo '<thead>';
				echo '<tr>';
				echo '<th>&nbsp;</th>';
				echo '<th>Product Group</th>';
				if ( isset($levels[0]) )
				{
					foreach ( $levels as $_level )
					{
						echo '<th>' . h($_level['name']) . ' Commission</th>';
					}
				}
				echo '</tr>';
				echo '</thead>';
				echo '<tfoot>';
				$checked = false;
				while ( $res && $row = db_fetch_assoc($res) )
				{
					$row = array_map('db_out', $row);

					echo '<tr>';
					echo '<td><input type="radio" class="product_group_radio" name="affiliate_commission_group" value="' . (int) $row['group_id'] . '"';
					if ( 0 < (int) $row['product_id'] && $row['product_id'] == $this->te_key )
					{
						echo ' checked="checked"';
						$checked = true;
					}
					echo ' /></td>';
					echo '<td>' . h($row['name']) . '</td>';
					$ps = @unserialize($row['payout_settings']);
					if ( isset($levels[0]) )
					{
						foreach ( $levels as $_level )
						{
							$_commission = '- -';
							if ( isset($ps[$_level['level_id']]) )
							{
								$_selected_ps = $ps[$_level['level_id']];
								if ( $_selected_ps['amount'] > 0 )
								{
									switch ( $_selected_ps['type'] )
									{
										case 'Percent':
											$_commission = $_selected_ps['amount'] . '%';
											break;
										case 'Flat':
											$_commission = sprintf('$%0.2f', $_selected_ps['amount']);
											break;
										default:
											$_commission = sprintf('%0.2f', $_selected_ps['amount']);
											break;
									}
								}
							}
							echo '<td><span class="product_group_inline_edit"><span id="product_group_inline_edit_' . (int) $row['group_id'] . '_' . (int) $_level['level_id'] . '">' . h($_commission) . '</span></span></td>';
						}
					}
					echo '</tr>';
				}
				echo '</tfoot>';
				echo '<tbody>';
				echo '<tr>';
				echo '<td><input type="radio" class="product_group_radio" name="affiliate_commission_group" value="0"';
				if ( !$checked )
				{
					echo ' checked="checked"';
				}
				echo ' /></td>';
				echo '<td>None</td>';
				if ( isset($levels[0]) )
				{
					foreach ( $levels as $_level )
					{
						echo '<td>- -</td>';
					}
				}
				echo '</tr>';
				echo '</tbody>';
				echo '</table>';
			}
			else
			{
				echo '<p>No Product Groups</p>';
			}
		}
		else
		{
			echo '<p>' . db_error() . '</p>';
		}
	}

	function draw_product_entry_menu()
	{
		include ai_cascadepath('includes/modules/products/includes/draw.products.entry_menu.php');
	}

	function get_folders(array $product_ids)
	{
		$folders = array();
		$sql = "
			SELECT f.folderID, p2f.product_id
			FROM products2folders p2f
			JOIN product_folders f ON p2f.folderID = f.folderID
			WHERE p2f.product_id IN (" . implode(',', $product_ids) . ")
			ORDER BY p2f.product_id ASC, p2f.sort_order ASC
		;";
		$res = db_query($sql);
		if ( $res )
		{
			$numrows = db_num_rows($res);
			if ( 0 < $numrows )
			{
				while ( $res && $row = db_fetch_assoc($res) )
				{
					$product_id = (int) $row['product_id'];
					$folder_id = (int) $row['folderID'];
					$path = $this->parse_folder_path($folder_id);
					$folders[$product_id][$folder_id] = $path;
				}
			}
		}
		else
		{
			return false;
		}
		return $folders;
	}

	function parse_folder_path($folder_id)
	{
		static $cache = array();
		if ( isset($cache[$folder_id]) )
		{
			return $cache[$folder_id];
		}

		$trail = array();
		$folder = db_lookup_assoc("SELECT folderID, parentID, title FROM product_folders WHERE folderID = " . (int) db_in($folder_id) . " LIMIT 1;");
		while ( isset($folder['folderID']) )
		{
			$trail[] = $folder;
			$folder = db_lookup_assoc("SELECT folderID, url_name, parentID, title FROM product_folders WHERE folderID = " . (int) $folder['parentID'] . " LIMIT 1;");
		}
		$path = '';
		foreach ( $trail as $i => $folder )
		{
			if ( $i > 0 )
			{
				$path = '<span class="divider"> / </span>' . $path;
			}
			$path = h($folder['title']) . $path;
		}
		$cache[$folder_id] = $path;
		return $path;
	}


	function get_orderby_info()
	{
		global $AI;
		if( AI_PAGE_NAME =='product_folders')
		{

			$this->_obField = 'p2f.sort_order';
			$this->_obDir = 'ASC';
		}
		else
		{
			return parent::get_orderby_info();
		}
	}

	protected function make_dynamic_area_name( $fieldname )
	{
		return 'product_' . $fieldname . '_' . util_rand_string(40, '0123456789abcdefghijklmnopqrstuvwxyz');
	}

};//~class C_te_products extends C_tableedit_base














function df_handler_product_default($fieldname, $value)
{
	echo "\n" . '<input id="' . $fieldname . '" name="' . $fieldname . '" value="' . htmlspecialchars(db_out($value)) . '" size="20" style="font-size:10px;" />' . "\n";
}
function df_handler_product_textarea($fieldname, $value)
{
	echo "\n" . '<textarea id="' . $fieldname . '" name="' . $fieldname . '" rows="10" cols="28" style="font-size:10px;">' . htmlspecialchars(db_out($value)) . '</textarea>' . "\n";
}

function df_handler_product_price($fieldname, $value)
{
	echo "\n" . '&nbsp;$&nbsp;<input id="' . $fieldname . '" name="' . $fieldname . '" value="' . htmlspecialchars($value) . '" size="10" style="font-size:10px;" onkeypress="return check_number(event);" />' . "\n";
}
/*references product_code
function db_handler_products($fieldname, $value)
{
	global $AI;
	$df = new C_dynamic_fields('Title', 'Description', 'Features', 'Language');

	$element_id = $fieldname;
	$default = 'Please select a product...';
	$on_change_js = '';
	$sql = 'SELECT product_code, description, product_id FROM products';
	$products = $AI->db->GetAll($sql, 'product_id');
	echo '<select name="'.$fieldname.'" id="'.$element_id.'" onchange="'.$on_change_js.'" style="width:330px;">';
	echo '<option value="0">'.$default.'</option>';
	foreach ($products as $id => $p) {
		$title = $df->get_single_value_by_condition($p['description'], 'Title', 'Language', $AI->get_setting('default_lang'));
		echo '<option value="'.$id.'" '.( ($id == $value) ? 'selected="selected"' : '' ).'>'.htmlspecialchars(addslashes(($p['product_code'] != '' ? $p['product_code'].' - ' : '').$title)).'</option>';
	}

	echo '</select>';
}
*/
