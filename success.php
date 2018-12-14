<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Payment.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang'].'success.php');
include_once($physical_path['DB_Access']. 'task.php');

$pays 		= new Payment();
$emails 	= new Email();
$project        = new project();

		$task_staged_id = $_GET['task_staged_id'];
		
		if ($task_staged_id){// If this transaction involves a staged task then set up the link
		$ret_staged_task = $project->Get_Staged_Task($task_staged_id);
		$staged_task_link = '<a href="' . $site_url . '/staged_task_' . $task_staged_id . '_'. clean_url($ret_staged_task->project_title) . '.html">' . $ret_staged_task->project_title . '</a>';
		}
		
if($_GET['check_value'] == $_SESSION['User_Id'])
{
	if($_POST["payer_status"] == 'verified')
	{
	 $sucmsg ='Mail regarding payment status has been sent.'; // Please improve the message here.
	}
	else if ($_POST["payer_status"] == 'invalid')
	{
	 $ERROR ='There might be some problem in paypal or moneybroker system, so try to contact administrator.'; // Please improve the message here.
	}else{
	$ERROR ='No Payments To Confirm'; // Please improve the message here
	$OOPS = 'You do not appear to have any pending payment confirmations so it would seem you have arrived at this page accidentally.<br />If you believe this is a mistake, please visit the <a href="contact_us.html">contact us</a> page and inform the site administrator.';
	}
	
	$tpl->assign(array(	"T_Body"			=>	'success'. $config['tplEx'],
						"sucmsg"		   	=>	$sucmsg,
						"ERROR"		   		=>	$ERROR,
						"lang"				=>	$lang,
						"OOPS"				=>	$OOPS,
						"staged_task_link"	=>	$staged_task_link,
						));
	


}
	
	


$tpl->display('default_layout'. $config['tplEx']);					
?>