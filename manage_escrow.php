<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/manage_escrow.php');
include_once($physical_path['DB_Access']. 'Payment.php');
include_once($physical_path['DB_Access']. 'Escrow.php');
include('balance1.php');

$pays 		= new Payment();
$escrow		= new Escrow();

if(isset($_GET['error']))
$ERROR	=	$_GET['error'];

if(isset($_GET['success']))
$success	=	$_GET['success'];

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');



if($Action == 'success')
{
	$Action = 'ViewAll';
}
if($Action == 'ViewAll')
{

		
		$tpl->assign(array(	"T_Body"			=>	'manage_escrow'. $config['tplEx'],
							"Site_Title"		=>	$config[WC_SITE_TITLE]." - ".$lang['Payment'],
							"tab"			 	=>  4,
							"lang"				=>  $lang,
							));
							
	$escrow_out = $escrow->Escrow_Out($_SESSION['User_Name']);

	$rscnt_escrow_out = $db->num_rows();
	$i=0;
		while($db->next_record())
		{
			$arr_escrow_out[$i]['ep_id']				= $db->f('ep_id');
			$arr_escrow_out[$i]['project_id']			= $db->f('project_id');			
			$arr_escrow_out[$i]['to_user_login_id']		= $db->f('to_user_login_id');
			$arr_escrow_out[$i]['milestone']			= $db->f('milestone');
			$arr_escrow_out[$i]['amount']				= $db->f('amount');
			$arr_escrow_out[$i]['task_title']			= $escrow->Get_Task_Title($arr_escrow_out[$i]['project_id']);
			$arr_escrow_out[$i]['clean_title']			= clean_url($arr_escrow_out[$i]['task_title']);
			$i++;
		}
	$escrow_in = $escrow->Escrow_In($_SESSION['User_Name']);
	$rscnt_escrow_in = $db->num_rows();
	$i=0;
		while($db->next_record())
		{
			$arr_escrow_in[$i]['ep_id']					= $db->f('ep_id');
			$arr_escrow_in[$i]['project_id']			= $db->f('project_id');			
			$arr_escrow_in[$i]['from_user_login_id']	= $db->f('from_user_login_id');
			$arr_escrow_in[$i]['milestone']				= $db->f('milestone');
			$arr_escrow_in[$i]['amount']				= $db->f('amount');
			$arr_escrow_in[$i]['task_title']			= $escrow->Get_Task_Title($arr_escrow_in[$i]['project_id']);
			$arr_escrow_in[$i]['clean_title']			= clean_url($arr_escrow_in[$i]['task_title']);			
			$i++;
		}		
		$tpl->assign(array( "Loop2"				=>	$rscnt_escrow_out,
							"aescrowout"        =>  $arr_escrow_out,
							"Loop3"				=>	$rscnt_escrow_in,
							"ERROR"				=>	$ERROR,
							"sucmsg"         	=>  $success,
							));		
							
										

}
$tpl->display('default_layout'. $config['tplEx']);
?>