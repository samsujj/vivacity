<?php
	require_once ai_cascadepath('includes/plugins/ajax/ajax.require_once.php');

	global $AI, $products_selected_tab;

	$AI->skin->css('includes/modules/products/includes/draw.products.css');
	$AI->skin->css('includes/modules/schedule_purchases/schedule_purchases.css');
	$AI->skin->js('includes/modules/products/includes/draw.products.js');

	// Dynamic Fulfillment Tab
	if ( $this->te_mode != 'insert' && $this->te_mode != 'copy' )
	{
		$module_enabled_res = aimod_run_hook('hook_product_manager_fulfillment_tab_enabled', $this->te_key);
		$module_title_res = aimod_run_hook('hook_product_manager_fulfillment_tab_title', $this->te_key);
		if ( is_array($module_enabled_res) && is_array($module_title_res) )
		{
			foreach ( $module_enabled_res as $module_name => $res )
			{
				if ( isset($module_title_res[$module_name]) && trim($module_title_res[$module_name]) != '' )
				{
					$this->verified_fulfillment_modules[$module_name] = array
						( 'enabled' => $res
						, 'title' => $module_title_res[$module_name]
						);
				}
			}
		}
	}

	////////////////////////////////////////////////////////////////
	// BEGIN HTML OUTPUT

	echo '<div id="product_tab_container" class="ui-tabs ui-widget ui-widget-content ui-corner-all">';

	echo '<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">';
	echo '<li class="ui-state-default"><a id="product_tab_summary_a" href="'. $AI->skin->get_full_url() .'#product_tab_summary">Summary</a></li>';
	echo '<li class="ui-state-default"><a id="product_tab_description_a" href="'. $AI->skin->get_full_url() .'#product_tab_description">Description</a></li>';
	if ( $this->te_mode == 'insert' || $this->te_mode == 'copy' )
	{
		echo '<li class="ui-state-default"><a id="product_tab_category_a" class="product_tab_off" href="'. $AI->skin->get_full_url() .'#product_tab_category">Category</a></li>';
		echo '<li class="ui-state-default"><a id="product_tab_inventory_a" class="product_tab_off" href="'. $AI->skin->get_full_url() .'#product_tab_inventory">Inventory</a></li>';
		echo '<li class="ui-state-default"><a id="product_tab_affiliate_a" class="product_tab_off" href="'. $AI->skin->get_full_url() .'#product_tab_affiliate">Affiliate</a></li>';
	}
	else
	{
		echo '<li class="ui-state-default"><a id="product_tab_category_a" href="'. $AI->skin->get_full_url() .'#product_tab_category">Category</a></li>';
		echo '<li class="ui-state-default"><a id="product_tab_inventory_a" href="'. $AI->skin->get_full_url() .'#product_tab_inventory">Inventory</a></li>';
		echo '<li class="ui-state-default"><a id="product_tab_affiliate_a" href="'. $AI->skin->get_full_url() .'#product_tab_affiliate">Affiliate</a></li>';
		if ( count($this->verified_fulfillment_modules) > 0 )
		{
			echo '<li class="ui-state-default"><a id="product_tab_fulfillment_a" href="'. $AI->skin->get_full_url() .'#product_tab_fulfillment">Fulfillment</a></li>';
		}
	}
	echo '</ul>';

	echo '<div id="product_tab_summary" class="ui-tabs-panel ui-widget-content ui-corner-bottom">';
	$products_selected_tab = 'Summary';
	include ai_cascadepath('includes/modules/products/includes/draw.products.TAB.Summary.php');
	echo '</div>';

	echo '<div id="product_tab_description" class="ui-tabs-panel">';
	$products_selected_tab = 'Description';
	include ai_cascadepath('includes/modules/products/includes/draw.products.TAB.Description.php');
	echo '</div>';

	echo '<div id="product_tab_category" class="ui-tabs-panel">';
	$products_selected_tab = 'Category';
	include ai_cascadepath('includes/modules/products/includes/draw.products.TAB.Category.php');
	echo '</div>';

	echo '<div id="product_tab_inventory" class="ui-tabs-panel">';
	$products_selected_tab = 'Inventory';
	include ai_cascadepath('includes/modules/products/includes/draw.products.TAB.Inventory.php');
	echo '</div>';

	echo '<div id="product_tab_affiliate" class="ui-tabs-panel">';
	$products_selected_tab = 'Affiliate';
	include ai_cascadepath('includes/modules/products/includes/draw.products.TAB.Affiliate.php');
	echo '</div>';

	if ( count($this->verified_fulfillment_modules) > 0 )
	{
		echo '<div id="product_tab_fulfillment" class="ui-tabs-panel">';
		$products_selected_tab = 'Fulfillment';
		include ai_cascadepath('includes/modules/products/includes/draw.products.TAB.Fulfillment.php');
		echo '</div>';
	}

	echo '</div>'; // <div id="product_tab_container">

	/*
	hook_product_manager_fulfillment_tab_title();
	hook_product_manager_fulfillment_tab_enabled();
	hook_product_manager_fulfillment_tab_render_form();
	hook_product_manager_fulfillment_tab_process_form();
	*/
?>