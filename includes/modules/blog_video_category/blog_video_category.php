<?php
	//Copyright (c)2006 All Rights Reserved - Apogee Design Inc. 
	//Generated: 2012-05-22 15:24:18 by jon
	//DB Table: share_links, Unique ID: share_links, PK Field: id
	
	require_once( ai_cascadepath( dirname(__FILE__) . '/includes/class.te_blog_video_category.php' ) );

	global $AI;

	$te_blog_video_category = new C_te_blog_video_category();

	$te_blog_video_category->_obFieldDefault = 'id';
	$te_blog_video_category->_obDirDefault = 'DESC';
	$te_blog_video_category->set_session( 'te_obField', $te_blog_video_category->_obFieldDefault );
	$te_blog_video_category->set_session( 'te_obDir', $te_blog_video_category->_obDirDefault );
	$te_blog_video_category->_obField = $te_blog_video_category->get_session( 'te_obField' );
	$te_blog_video_category->_obDir = $te_blog_video_category->get_session( 'te_obDir' );

	$te_blog_video_category->select($te_blog_video_category->te_key);

	$te_blog_video_category->run_TableEdit();
?>
