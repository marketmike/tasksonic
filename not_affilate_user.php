<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'signup.php');

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"					=>	'Msg'. $config['tplEx'],
						"msg"						=>	$lang['Affilation_Msg'],	
						));

$tpl->display('default_layout'. $config['tplEx']);
?>