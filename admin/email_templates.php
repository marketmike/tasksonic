<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");

include EDITOR_ROOT. 'spaw_control.class.php';

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

if($_POST['Submit'] == "Cancel")
{
	header('location: email_templates.php');
	exit();
}
if($_POST['Submit'] == "Save")
{
 
$content = stripslashes($_POST['template']);

//print $physical_path['EmailTemplate'].$_POST['template_name'].$config['tplEx'];die;
   writeFileContent($physical_path['EmailTemplate'].$_POST['template_name'].$config['tplEx'] , $content );
	header('location: email_templates.php');
	exit();
}

if($Action == '' || $Action == 'ShowAll')
{
	$tpl->assign(array("T_Body"		=>	'email_templates_manage'. $config['tplEx'],
					   "JavaScript"	=>  array("email.js"),
						));
}
elseif($Action == 'Edit')
{
//    readFileContent($physical_path['EmailTemplate'].$_POST['template_name'].$config['tplEx']);
	
	$tpl->assign(array("T_Body"			=>	'email_templates_addedit'. $config['tplEx'],
					   "Action"	    	=>   $Action ,
					   "template_name"	=>	$_POST['template_name'],
						));
	$templates_value = readFileContent($physical_path['EmailTemplate'].$_POST['template_name'].$config['tplEx']);


    $sw = new SPAW_Wysiwyg('template' /*name*/, stripslashes($templates_value) /*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("EN_Page_Editor", $sw->getHtml());						
						
}  
$tpl->display('default_layout'. $config['tplEx']);
?>