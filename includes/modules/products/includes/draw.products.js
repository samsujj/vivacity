var product_tabs = {
	init : function() {
		$(".product_tab_off").unbind("click").removeAttr("href").click(function(e) {
			jonbox_alert("Please fill out Description first, then procede through Product Entry Next Step.");
		});
		var ajax_error = $("#product_save_error").html();
		if ( typeof ajax_error == "string" && $.trim(ajax_error) != "" ) {
			jonbox_alert(ajax_error);
		}
	}
}

////////////////////////////////////////////////////////////////

var product_inventory = {
	autosave_ok : false
	, init : function() {
		//ai.te.init("product_inventory");
		//ai.helptext.init();
		$("#te_product_inventory .te_action_menu a.te_new_button").addClass("button");
		$("#te_product_inventory .te_action_menu a.te_multidelete_button").addClass("button button_disabled button_danger");
		$("#te_product_inventory .te_action_menu a.te_multiselect_button").addClass("button button_disabled");

		$("#te_action_menu_product_inventory a.te_new_button, div.te_table.product_inventory_table div.te_noresults a.te_new_button").on("click", function( e ) {
			e.preventDefault();
			var ajax_url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=new_product_inventory";
			var product_id = $("#inventory_form_product_id").val();
			$("#inventory_container #te_product_inventory").load(ajax_url, { "product_id" : product_id }, function(data, status, xhr) {
				product_inventory.init();
			});
			return false;
		});
		$("#te_action_menu_product_inventory a.te_multidelete_button").removeAttr("onclick").on("click", function( e ) {
			if ( confirm("Delete Selected Items?") ) {
				var ajax_url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=multidelete_product_inventory";
				var product_id = $("#inventory_form_product_id").val();
				var form_data =  $("form#product_inventory_table_form").serialize();
					form_data += "&product_id=" + encodeURIComponent(product_id);
				$.post(ajax_url, form_data, function( data, status, xhr ) {
					$("#inventory_container #te_product_inventory").html(data);
					product_inventory.init();
				});
			}
			return false;
		});
		// Undo some standard TE functionality
		//$("#inventory_container .te_data_row").unbind("hover");
		$("#inventory_container .te_data_row .te_data_cell").css("cursor", "default").removeAttr("title");//.unbind("click");
		$("#inventory_container").on("click", ".te_data_row .te_data_cell", false); // Catches event delegation before bubbling up to #te_products
		// Inline edit functionality
		$("#inventory_container").on("blur keydown", "td.te_data_cell input[type='text']", function(e) {
			
			if( e.type=='blur' || e.type=='focusout' || e.which===13)
			{
				var $tr_parent = $(this).parents("tr");
				var item_id = $tr_parent.attr("id");
				product_inventory.autosave(item_id);
			}
		});
		
		
		
		// Stock Column
		$("#inventory_container").on("click", "input.track_stock_level_checkbox", function( e ) {
			e.stopPropagation(); //this fixes issue where the checkbox was not displaying proper value
			var item_id = $(this).attr("id").match(/[0-9]+$/i)[0];
			if ( $(this).is(":checked") ) {
				$("#track_stock_level_" + item_id).val("Y");
				$("#stock_" + item_id).removeAttr("disabled");
			} else {
				$("#track_stock_level_" + item_id).val("N");
				$("#stock_" + item_id).attr("disabled", "disabled");
			}
			product_inventory.autosave(item_id);
			
		});


		// Tax Status
		$("#inventory_container").on("click", "input.tax_status", function( e ) {
			e.stopPropagation(); //this fixes issue where the checkbox was not displaying proper value
			var item_id = $(this).attr("id").match(/[0-9]+$/i)[0];
			if ( $(this).is(":checked") ) {
				$("#tax_status_number_" + item_id).val("2");
			} else { 
				$("#tax_status_number_" + item_id).val("1");
			}
			product_inventory.autosave(item_id);
			
		});


		// Free Shipping
		$("#inventory_container").on("click", "input.free_ship", function( e ) {
			e.stopPropagation(); //this fixes issue where the checkbox was not displaying proper value
			var item_id = $(this).attr("id").match(/[0-9]+$/i)[0];
			if ( $(this).is(":checked") ) {
				$("#free_ship_" + item_id).val("1");
			} else { 
				$("#free_ship_" + item_id).val("0");
			}
			product_inventory.autosave(item_id);
			
		});

		
		// Scheduled Payments
		$("#inventory_container").on("click", "input.scheduled_payments_enabled", function( e ) {
			e.stopPropagation(); //this fixes issue where the checkbox was not displaying proper value
			var item_id = $(this).attr("id").match(/[0-9]+$/i)[0];
			if ( $(this).is(":checked") ) {
				$(this).parents('tr.te_data_row').nextAll('tr.product_inventory_scheduled_payments_row:first').show();
			} else {
				$(this).parents('tr.te_data_row').nextAll('tr.product_inventory_scheduled_payments_row:first').hide();
			}
			product_inventory.autosave_scheduled_payments(item_id);
			
		});
		$("#inventory_container").on("blur keydown", "tr.product_inventory_scheduled_payments_row input[type='text'], tr.product_inventory_scheduled_payments_row select", function(e) {			
			if( e.type=='blur' || e.type=='focusout' || e.which===13)
			{
				var $tr_parent = $(this).parents('tr.product_inventory_scheduled_payments_row');
				var item_id = $tr_parent.attr("id").match(/[0-9]+$/i)[0];
				product_inventory.autosave_scheduled_payments(item_id);
			}
		});

		$("#show_qty_input").click(this.autosave_store_front_options);
		$("#limit_qty").blur(this.autosave_store_front_options);
		$("#product_inventory_coupon_form input, #product_inventory_coupon_form select").blur(this.autosave_coupons);
		$("#product_inventory_coupon_form select").change(this.autosave_coupons);
	}
	, reload : function() {
		var ajax_url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=reload_product_inventory";
		var product_id = $("#inventory_form_product_id").val();
		$("#inventory_container #te_product_inventory").load(ajax_url, { "product_id" : product_id }, function(data, status, xhr) {
			product_inventory.init();
		});
		return false;
	}
	, autosave : function(item_id) {
		var ajax_url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=autosave_product_inventory";
		var $tr = $("#product_inventory_main_table tr#" + item_id);
		if ( $tr.length > 0 ) {
			var post_obj = {item_id: item_id};
			$("input[type='text'], input[type='checkbox'], input[type='hidden']", $tr).each(function(i) {
				var name = $(this).attr("name");
				if(name+''=='undefined') return true;
				if( $(this).attr('type')=='checkbox' && $(this).is(':checked')!=true ) return true;
				var val = $(this).val();
				if ( $(this).hasClass("helptext") && name.substr(0,6) != "attval" ) {
					val = "";
				}
				post_obj[name] = val;
			});
			$("#up_inventory_error").html('<img src="images/loading.gif" alt="" /> Saving...');
			$.post(ajax_url, post_obj, function(data, status, xhr) {
				if ( $.trim(data) == "OK" ) {
					$("#up_inventory_error").html("&nbsp;");
				} else {
					ai.toaster.set(data).show();
				}
			});
			// TODO: Create algorithm to save less often to create less HTTP requests
		}
	}
	, autosave_store_front_options : function() {
		var product_id = $("#store_front_product_id").val();
		var ajax_url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=autosave_store_front_options&te_key=" + encodeURIComponent(product_id);
		var show_qty_input = $("#show_qty_input").is(":checked") ? 'Yes' : 'No';
		var limit_qty = $("#limit_qty").val();
		var post_obj = { show_qty_input : show_qty_input, limit_qty : limit_qty };
		$.post(ajax_url, post_obj, function(data, status, xhr) {
			if ( $.trim(data) != "OK" ) {
				ai.toaster.set(data).show();
			}
		});
	}
	, autosave_scheduled_payments : function(item_id) {
		var ajax_url = "scheduled_payments?ai_skin=full_page&te_class=scheduled_payments&te_mode=ajax&ajax_cmd=autosave";
		var $tr = $("#product_inventory_main_table tr#" + item_id);
		if ( $tr.length > 0 ) {
			var $sp_tr = $("tr#product_inventory_scheduled_payments_row_" + item_id);
			var post_obj = {item_id: item_id, 
							count: $sp_tr.find('select.scheduled_payments_count').val(), 
							amount: $sp_tr.find('input.scheduled_payments_amount').val(), 
							period: $sp_tr.find('select.scheduled_payments_period').val()};
			
			$.post(ajax_url, post_obj, function(data, status, xhr) {
				if ( $.trim(data) != "OK" ) {
					ai.toaster.set(data).show();
				}
			});
		}
	}
	, autosave_coupons : function() {
		var product_id = $("#store_front_product_id").val();
		var ajax_url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=autosave_coupons&te_key=" + encodeURIComponent(product_id);
		var $tr = $(this).parents('tr').first();
		var all_coupon_codes = '';

		if($tr.find('input.coupon_code').val() == '')
		{
			$('#product_inventory_coupon_form .coupon_code').each(function(){
				all_coupon_codes += $(this).val() + '|';
			});
		}

		if ( $tr.length > 0 ) {
			var post_obj = {code: $tr.find('input.coupon_code').val(), 
							discount: $tr.find('input.coupon_discount').val(), 
							type: $tr.find('select.coupon_type').val(),
							description: $tr.find('input.coupon_description').val(),
							allcodes: all_coupon_codes
						};
			$.post(ajax_url, post_obj, function(data, status, xhr) {
				if ( $.trim(data) != "OK" ) {
					ai.toaster.set(data).show();
				}
			});
		}
	}
};

////////////////////////////////////////////////////////////////

var product_affiliate = {
	init : function() {
		$("#new_product_group_link").click(function() {
			$("#new_product_group_wrapper").slideToggle();
			return false;
		});
		$("#new_product_group_form").submit(function() {
			var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=new_product_group";
			var post = {name : $(this.name).val()};
			$("#affiliate_marketing_wrapper").load(url, post, function(data, status, xhr) {
				$("#new_product_group_wrapper").slideToggle();
				product_affiliate.init_product_group_inline_edit();
			});
			return false;
		});

		$("#new_affiliate_commission_group_link").click(function() {
			$("#new_affiliate_commission_group_wrapper").slideToggle();
			return false;
		});
		$("#new_affiliate_commission_group_form").submit(function() {
			var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=new_affiliate_commission_group";
			var post = {name : $(this.name).val()};
			$("#affiliate_commission_groups_wrapper").load(url, post, function(data, status, xhr) {
				$("#new_affiliate_commission_group_wrapper").slideToggle();
				product_affiliate.init_group_delete();
				product_affiliate.redraw_affiliate_marketing();
			});
			return false;
		});
		this.init_group_delete();
		this.init_product_group_inline_edit();
	}
	, init_group_delete : function() {
		$(".affiliate_commission_groups_delete").click(function(e) {
			var group_id = $(this).attr("val");
			var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=delete_affiliate_commission_group";
			var post = {group_id : group_id};
			$("#affiliate_commission_groups_wrapper").load(url, post, function(data, status, xhr) {
				product_affiliate.init_group_delete();
				product_affiliate.redraw_affiliate_marketing();
			});
			return false;
		});
	}
	, init_product_group_inline_edit : function() {
		$(".product_group_inline_edit span").click(function(e) {
			product_affiliate.start_inline_edit(this);
		});
		$(".product_group_radio").click(function(e) {
			var product_id = $("#current_product_id").val();
			var affiliate_commission_group = $(this).val();
			var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=update_product_group_selection&te_key=" + encodeURIComponent(product_id);
			var post = {affiliate_commission_group : affiliate_commission_group};
			$(this).replaceWith('<img src="images/loading.gif" alt="Saving..." />');
			$("#affiliate_marketing_wrapper").load(url, post, function(data, status, xhr) {
				product_affiliate.init_product_group_inline_edit();
			});
		});
	}
	, start_inline_edit : function(o_span) {
		var val = $(o_span).hide().html();
		if ( val == "- -" ) {
			val = "";
		}
		var id = $(o_span).attr("id");
		$('<input type="text" class="span2" id="' + id +  '" value="' + val + '" />').insertAfter(o_span).blur(function(e) {
			product_affiliate.end_inline_edit(this);
		}).keydown(function(e) {
			if ( e.which == 13 ) { // ENTER
				product_affiliate.end_inline_edit(this);
			}
		}).focus();
	}
	, end_inline_edit : function(o_input) {
		$(o_input).after('<img src="images/loading.gif" alt="Saving..." />').remove();
		var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=update_product_group_commission";
		var post = {id : $(o_input).attr("id"), value : $(o_input).val() };
		$("#affiliate_marketing_wrapper").load(url, post, function(data, status, xhr) {
			product_affiliate.init_product_group_inline_edit();
		});
	}
	, redraw_affiliate_marketing : function() {
		var product_id = $("#current_product_id").val();
		var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=redraw_affiliate_marketing&te_key=" + encodeURIComponent(product_id);
		var post = {};
		$("#affiliate_marketing_wrapper").load(url, post, function(data, status, xhr) {
			product_affiliate.init_product_group_inline_edit();
		});
	}
};

////////////////////////////////////////////////////////////////

var product_fulfillment = {
	init : function() {
		$("form.fulfillment_module_form").submit(function(e) {
			var product_id = $(this.product_id).val();
			var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=run_fulfillment_module_process_form&te_key=" + encodeURIComponent(product_id);
			var post = $(this).serialize();
			$.post(url, post, function(data, status, xhr) {
				if ( $.trim(data) == "OK" ) {
					ai.notification.success("", "Your changes have been successfully saved!");
				} else {
					ai.notification.error("Could not save", data);
				}
			});
			return false;
		});
	}
	, toggle : function(module, id) {
		var url = "product_folders?ai_skin=full_page&te_class=products&te_mode=ajax&ajax_cmd=run_fulfillment_module_toggle";
		var post = {module : module};
		$.post(url, post, function(data, status, xhr) {
			if ( $.trim(data) == "enabled" ) {
				$("#" + id).addClass("success");
				$("#" + id + " a").html("Enabled");
			} else if ( $.trim(data) == "disabled" ) {
				$("#" + id).removeClass("success");
				$("#" + id + " a").html("Disabled");
			} else {
				ai.notification.error("Could not change status", data);
			}
		});
	}
};



////////////////////////////////////////////////////////////////
// ONLOAD ------------------------------------------------------
$(function() {
	$("#product_tab_container").tabs();
	product_tabs.init();
	//product_inventory.init(); // Deferred
	product_affiliate.init();
	product_fulfillment.init();
});
