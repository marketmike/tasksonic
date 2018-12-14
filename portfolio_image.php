<?php
define('IN_SITE', 	true);

include_once("includes/common.php");

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
$tpl->assign(array(	"T_Body"			  => 'portfolio_image'. $config['tplEx'],
					"Image_path"          => $virtual_path['Portfolio']."thumb_".$_GET['path'],
					"flag_flag"           => "0",
					"no_head_footer"      => "1",
					));
		

$tpl->display('popupwin_layout_blank'. $config['tplEx']);
?>