<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/escrow_success.php');

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'escrow_complete'. $config['tplEx'],
						"lang"			    =>	$lang,	
						));

$tpl->display('default_layout'. $config['tplEx']);
?>