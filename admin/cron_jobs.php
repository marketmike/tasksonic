<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");

$tpl->assign(array(	"T_Body"					   =>	'cron_jobs'. $config['tplEx'],
					
				));

$tpl->display('default_layout'. $config['tplEx']);
?>