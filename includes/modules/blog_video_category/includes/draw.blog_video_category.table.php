<?php

global $AI;

// Merge Codes
$sub_domain = $AI->user->username;

?>

<!--<link href="includes/modules/share_asset/share_asset.css" rel="stylesheet">-->

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
</script>

<?php

	echo '<button onclick="document.location = \'' . h($this->url('te_mode=insert')) . '\'; return false;">New</button>';


echo "<h2>Blog / Video Category Manager</h2>";
echo '<p>&nbsp;</p><!--spacer-->';

echo '<table class="te_main_table pixel_main_table" id="pixel_main_table">';


echo "<tr>";
echo "<th>Title</th>";
echo "<th>Description</th>";
echo "<th>Status</th>";
echo "<th>Action</th>";
echo "</tr>";


//var_dump($table_result);

$table_row = db_fetch_assoc($table_result);

for ( $table_i = 0; $table_i < $this->_pgSize && $table_row; $table_i++ )
{


	if (true) {

		$ai_sid_key = ai_sid_keygen();
		$ai_sid = ai_sid_save_sessionid( $ai_sid_key );
		$core_set = (isset($_SESSION['using_ai_core']) && $_SESSION['using_ai_core']!='default')? '&ai_core='.$_SESSION['using_ai_core']:'';
		
		echo '<tr class="te_data_row ' . ( $table_i % 2 == 1 ? 'te_even_row' : 'te_odd_row' ) . '" id="'.$this->db[$this->_keyFieldName].'" data-row-i="' . $this->_row_i . '">';
		
		echo "<td>";
			$this->draw_value_field('title', $table_row['title'], $this->db[$this->_keyFieldName], 'table');
		echo "</td>";
		echo "<td>";
			$this->draw_value_field('description', $table_row['description'], $this->db[$this->_keyFieldName], 'table');
		echo "</td>";
		echo "<td align='center'>";
		$this->draw_value_field('status', $table_row['status'], $this->db[$this->_keyFieldName], 'table');
		echo "</td>";
		echo "<td align='center' class='addbtn'>";

		echo '<button  class="icon_button_16 editbtn" onclick="document.location = \'' . h($this->url('te_mode=update&te_key=' . $table_row['id'])) . '&te_row=' . $this->_row_i.'\'; return false;">';
		echo '<img src="images/dynamic_edit.14.transparent.png">';
		echo '<span>Edit</span>';
		echo '</button>';

		echo '<button  class="icon_button_16 deletebtn" onclick="document.location = \'' . h($this->url('te_mode=delete&te_key=' . $table_row['id'])) . '&te_row=' . $this->_row_i.'\'; return false;">';
		echo '<img src="images/drop.png">';
		echo '<span>Delete</span>';
		echo '</button>';

		echo "</td>";
		echo "</tr>";
	}
	//--
	$this->_row_i++;
	$table_row = db_fetch_assoc($table_result);
}

echo '</table>';

?>
