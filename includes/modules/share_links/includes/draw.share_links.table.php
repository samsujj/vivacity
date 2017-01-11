<?php

global $AI;

// Merge Codes
$sub_domain = $AI->user->username;


echo '<link href="includes/modules/share_links/bootstrap.min.css" rel="stylesheet">';
echo '<script type="text/javascript" src="includes/modules/share_links/bootstrap.min.js"></script>';

?>

<style>
	.share_links_main_table tr{
		cursor: auto !important;
	}
	.tooltip-inner{
		max-width :340px !important;
		padding: 8px !important;
		text-align: left !important;
		border-radius: 0 !important;
	}
</style>
<script src="includes/modules/share_links/clipboard.min.js"></script>
<script language="javascript" type="text/javascript">
<!--
	function share_links_update_sort_index(table, row)
	{
		// Fix Zebra Stripping
		//$("table.te_main_table tr:even").removeClass("te_odd_row").addClass("te_even_row");
		//$("table.te_main_table tr:odd").removeClass("te_even_row").addClass("te_odd_row");

		var post_str = $(table).tableDnDSerialize();
		//$('#saving').css('display', 'inline');

		// Create a post request
		ajax_post_request('<?= $this->ajax_url('update_sort_index', '') ?>', post_str, ajax_handler_default);
	}
-->

$( window ).load(function() {
	setTimeout(function(){
		var clipboard = new Clipboard('.clip_button1');
		$('.clip_button1').show();
		$('[data-toggle="tooltip"]').tooltip();
	},2000);
});
	
	function grabbanner(id) {
		$.ajax({
			url:  'asset-list',
			type: 'GET',
			data: {te_share_link_id: id},
			success: function(html){
				$('#myModal').find('.modal-body').html(html);
				$('#myModal').modal('show');

				setTimeout(function(){
					var clipboard = new Clipboard('.clip1btn');
					var clipboard = new Clipboard('.clip1btn');
				},2000);
			}
		});


	}


</script>


<?php

if ( @$this->te_permit['insert'] )
{
	echo '<button class="btnnew1" onclick="document.location = \'' . h($this->url('te_mode=insert_old')) . '\'; return false;">New</button>';
}

echo $AI->get_dynamic_area('my-urls-header');
echo '<p>&nbsp;</p><!--spacer-->';

$lead_id = (int) db_lookup_value('users', 'userID', (int) $AI->user->userID, 'lead_id');

echo '<table class="te_main_table share_links_main_table" id="share_links_main_table">';

$table_row = db_fetch_assoc($table_result);



for ( $table_i = 0; $table_i < $this->_pgSize && $table_row; $table_i++ )
{


	foreach ( $table_row as $n => $v )
	{
		$this->db[$n] = db_out($v);
	}
	if ( $this->db['requires_success_line'] == '1' && !$this->te_permit['insert_share_link'] )
	{
		$is_in_success_line = aimod_run_hook_module('success_line', 'hook_is_in_success_line', $lead_id);
		if ( !$is_in_success_line )
		{
			continue;
		}
	}

	/*
	DrewL 20150415 - whoever wrote this 'Marketing System Sign Up' hack needs to be kicked
	  IT'S NEVER OK TO HARDCODE SOMETHING LIKE THIS
	  	Instead add a 'locked' setting to the module or something similar
	// Hide the "Marketing System Sign Up" entries from non admin
	//if (!preg_match("/Marketing System Sign Up/i", $this->db['name']) || $this->te_permit['insert_share_link']) {
	*/
	if (true) {



		$ai_sid_key = ai_sid_keygen();
		$ai_sid = ai_sid_save_sessionid( $ai_sid_key );
		$core_set = (isset($_SESSION['using_ai_core']) && $_SESSION['using_ai_core']!='default')? '&ai_core='.$_SESSION['using_ai_core']:'';
		
		echo '<tr class="te_data_row ' . ( $table_i % 2 == 1 ? 'te_even_row' : 'te_odd_row' ) . '" id="'.$this->db[$this->_keyFieldName].'" data-row-i="' . $this->_row_i . '"><td>';
		
		echo '<div class="row te_table">';
	
		echo '<div class="span-one-third col-sm-4" style="text-align:center;">';
		
		$this->draw_value_field('img_url', $this->db['img_url'], $this->db[$this->_keyFieldName], 'table');
		echo '</div>';
	
		echo '<div class="span-two-thirds col-sm-8">';
		echo "<table  cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<td>";
			//DrewL 20150415 - whoever wrote this needs to be kicked - it's NEVER OK TO HARDCODE something like this
			//if(preg_match("/Marketing System Sign Up/i", $this->db['name'])) { echo "<img src=\"images/lock.png\" style=\"float: left; margin: 3px 5px auto auto;\"> "; }
			$this->draw_value_field('name', $this->db['name'], $this->db[$this->_keyFieldName], 'table');
			$this->draw_value_field('url', $this->db['url'], $this->db[$this->_keyFieldName], 'table');
			$this->draw_value_field('description', $this->db['description'], $this->db[$this->_keyFieldName], 'table');

		if ( $AI->get_access_group_perm('Website Developers') || $this->te_permit['insert'])
		{
			echo '<input type="button" style="left: 852px; top: 885px; width: auto; height: 30px; z-index: 99; background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(14, 133, 202, 1) 0%, rgba(4, 100, 156, 1) 100%) repeat scroll 0 0; color: #fff; font-size: 16px; border:none;" onclick="document.location = \'share_asset?te_share_link_id='.$this->db[$this->_keyFieldName].'\'; return false;" value="Manage Banner" />';

		}

		echo '<input type="button" style="left: 852px; top: 885px; width: auto; height: 30px; z-index: 99; background: rgba(0, 0, 0, 0) linear-gradient(to bottom, rgba(14, 133, 202, 1) 0%, rgba(4, 100, 156, 1) 100%) repeat scroll 0 0; color: #fff; font-size: 16px; border:none;" onclick="grabbanner('. $this->db[$this->_keyFieldName] .')" value="Grab Banner" />';

		echo "</td>";
		echo "<td align='right' class='sharetable'>";


			if ( $this->te_permit['insert'] && empty($this->db['template_id']))
			{
				echo '<button style="width: 120px" class="icon_button_16 share_link_buttons" onclick="document.location = \'' . h($this->url('te_mode=update&te_key=' . $this->db[$this->_keyFieldName])) . '&te_row=' . $this->_row_i . '\'; return false;">';
				echo '<img src="images/dynamic_edit.14.transparent.png">';
				echo '<span>Edit</span>';
				echo '</button>';
			}
			if ( $this->te_permit['delete'] && $this->db['owner_id'] == $AI->user->userID || $AI->get_access_group_perm('Website Developers') || $AI->get_access_group_perm('Administrator'))
			{
				echo '<button style="width: 120px" class="icon_button_16 share_link_buttons" onclick="document.location = \'' . h($this->url('te_mode=delete&te_key=' . $this->db[$this->_keyFieldName])) . '&te_row=' . $this->_row_i . '\'; return false;">';
				echo '<img src="images/drop.png">';
				echo '<span>Delete</span>';
				echo '</button>';
			}
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo '</div>';
	
		echo '</div>';
	
		echo '<hr />';
		echo '</td></tr>';
	}
	//--
	$this->_row_i++;
	$table_row = db_fetch_assoc($table_result);
}

echo '</table>';
/*
if(@$this->settings['enable_landing_page_manager'] != "No" && @$this->te_permit['landing_page_manager'] == 1) {
	echo '<button class="icon_button" style="margin: 25px auto; font-size: 16px; width: 400px; text-align: center;" onclick="document.location = \'' . h($this->url('te_mode=insert')) . '\'; return false;"><img src="images/menu_tree/ao1n_landing_page_leads_48.gif" align="absmiddle"> Add Landing Page</button>';
}
*/
$te_key = util_GET('te_key');
if ( !empty($te_key) )
{
	$AI->skin->js_onload('lead_management_table.scrollTo(' . (int) $te_key . ');');
}
?>

<div class="modal fade grabmodal " id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Banner</h4>
			</div>
			<div class="modal-body">

			</div>
		</div>

	</div>
</div>
