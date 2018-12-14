<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['Site_Lang'].'/undecline.php');

$project 		= new project();

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

//if($Action == 'Decline' && $_POST['Submit'] == 'Decline Bid')
if($_POST['Submit'] == $lang['Button_Decline_Bid'])
{
   $tpl->assign(array(	"T_Body"					=>	'undecline1'. $config['tplEx'],
 						"JavaScript"				=>	array('undecline.js'),
						"lang"						=>  $lang,		
   						"provider_name"				=>	$_POST['provider_name'],
						"project_id"				=>	$_POST['project_id'],
						"bid_id"	                =>  $_POST['bid_id'],
						"reasons"                   =>  $_POST['reasons'],
						"id"               		    =>  $_POST['id'],
  ));
  
}
elseif($Action == 'Close')
{

  $project->ToggleStatusUnDecline($_POST['bid_id'],$_POST['reasons']);
  
  if($_POST['id'] == 1)
  {
	  echo "<script type=text/javascript> opener.location.href = 'project_".$_POST['project_id'].".html#bid_list';";
	  echo "opener.location.reload();";
	  echo "window.close();";
	  echo "</script>";
  }
  else	  
    {
	  echo "<script type=text/javascript> opener.location.href = 'shortlist_".$_POST['project_id'].".html#short_list';";
	  echo "opener.location.reload();";
	  echo "window.close();";
	  echo "</script>";
  }

}
else
{
		$tpl->assign(array(	"T_Body"					=>	'undecline'. $config['tplEx'],
							"lang"						=>  $lang,	
							"provider_name"				=>	$_GET['provider_name'],
							"project_id"				=>	$_GET['project_id'],
							"bid_id"	                =>  $_GET['bid_id'],
							"id"                        =>  $_GET['id'],
							"reasons"         			=>  fillArrayCombo($lang_arr['Reasons']),
							"flag_flag"					=>	'1',
							));
}
$tpl->assign(array(	"lang"						=>  $lang,	
				));
$tpl->display('popupwin_layout_blank'. $config['tplEx']);
?>