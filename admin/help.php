<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");


if($_GET['type'] == 'change_pwd')
{
	$type = 'help_change_pwd';
}
elseif($_GET['type'] == 'category')
{
    $type = 'help_category';
}
elseif($_GET['type'] == 'country')
{
    $type = 'help_country';
}
elseif($_GET['type'] == 'industry')
{
    $type = 'help_industry';
}
elseif($_GET['type'] == 'development_cost')
{
    $type = 'help_development_cost';
}
elseif($_GET['type'] == 'execution_time')
{
    $type = 'help_execution_time';
}
elseif($_GET['type'] == 'experience_year')
{
    $type = 'help_experience_year';
}
elseif($_GET['type'] == 'bannedword')
{
    $type = 'help_bannedword';
}
elseif($_GET['type'] == 'condition')
{
    $type = 'help_condition';
}
elseif($_GET['type'] == 'member')
{
    $type = 'help_member';
}
elseif($_GET['type'] == 'email')
{
    $type = 'help_email';
}
	$tpl->assign(array( 
						"T_Body"		=>	$type. $config['tplEx'],
					  ));
$tpl->display('popupwin_layout'. $config['tplEx']);
?>