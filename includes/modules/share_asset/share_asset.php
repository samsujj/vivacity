<?php
	//Copyright (c)2006 All Rights Reserved - Apogee Design Inc. 
	//Generated: 2012-05-22 15:24:18 by jon
	//DB Table: share_links, Unique ID: share_links, PK Field: id
	
	require_once( ai_cascadepath( dirname(__FILE__) . '/includes/class.te_share_asset.php' ) );

echo '<link href="includes/modules/share_asset/share_asset.css" rel="stylesheet">';

	global $AI;

	$dbWhere = "";

	if(@$_GET['te_mode'] != 'insert' && @$_GET['te_mode'] != 'update'){
		if(isset($_GET['te_share_link_id']))
			$dbWhere = " share_link_id=".@$_GET['te_share_link_id'];
		else
			$dbWhere = " share_link_id=0";
	}

	$te_share_asset = new C_te_share_asset(@$dbWhere);

	$te_share_asset->_obFieldDefault = 'sort_order';
	$te_share_asset->_obDirDefault = 'DESC';
	$te_share_asset->set_session( 'te_obField', $te_share_asset->_obFieldDefault );
	$te_share_asset->set_session( 'te_obDir', $te_share_asset->_obDirDefault );
	$te_share_asset->_obField = $te_share_asset->get_session( 'te_obField' );
	$te_share_asset->_obDir = $te_share_asset->get_session( 'te_obDir' );

	$te_share_asset->select($te_share_asset->te_key);

	$te_share_asset->run_TableEdit();
?>
