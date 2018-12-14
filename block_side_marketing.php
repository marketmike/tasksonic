<?php

include_once("includes/common.php");

include_once($physical_path['DB_Access']. 'HomePage.php');
$home_page_content 	= new HomePage();
$home_content = $home_page_content->ShowHomePage(2);

##############################################################################################
/// assign templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"					=>	'block_side_marketing'. $config['tplEx'],
						"marketing_content"			=>	$home_content->home_content,
						
						));
?>