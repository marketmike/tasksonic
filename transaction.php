<?php
define('IN_SITE', 	true);
define('IN_USER',	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/transaction.php');
include_once($physical_path['DB_Access']. 'Payment.php');

$pays 		= new Payment();

if(isset($_GET['start']))
$_SESSION['start_record']	=	$_GET['start'];

	$reult = $pays->Viewtrans($_SESSION['User_Id']);
	$rscnt = $db->num_rows();
	$i=0;
	while($db->next_record())
	{
		$arr_traction[$i]['id']				= $db->f('pp_id');
		$arr_traction[$i]['user_auth_id']	= $db->f('user_auth_id');
		$arr_traction[$i]['amount']			= $db->f('amount');
		$arr_traction[$i]['description']	= stripslashes($db->f('description'));
		$arr_traction[$i]['trans_type']		= $db->f('trans_type');
		$arr_traction[$i]['trans_date']			= $db->f('date');
		$i++;
	}


	$tpl->assign(array(	"T_Body"			  => 'view_transaction'. $config['tplEx'],
	                    "Loop"				  =>  $rscnt,
						"atraction"        	  =>  $arr_traction,		
						"tab"			 	  =>  4,
					   ));
	if($_SESSION['total_record'] > $_SESSION['user_page_size'])
		{
			$tpl->assign(array('Page_Link' =>	$utility->showPaginationUser($_SESSION['total_record']),
							));
		}	
	
	$tpl->assign(array(
						"TOP_TITLE"         =>  strtoupper($lang['Transaction_Title']),    
						"Site_Title"		=>	$config[WC_SITE_TITLE]." - ",
						"msg"				=>	$lang['No_Transaction'],
						"lang"				=> 	$lang,	
									
					));
					
	 $str = $_SERVER['HTTP_REFERER'];
	 $str1 = substr(strrchr($str,'/'),1);
	
	 if($str1 == "my-account.html")
	 {
	 	$navigation = '<a href="my-account.html" class=footerlink>'.$lang['My_Account'].'</a>';
		$navigation1 = '<label class=navigation>'.$lang['Transaction_History'].'</label>';
	 }
	 else if($str1 == "manage_payments.php")
	 {
	 	$navigation = '<a href=manage_payments.php class=footerlink>'.$lang['Manage_Payments'].'</a>';
		$navigation1 = '<label class=navigation>'.$lang['Transaction_History'].'</label>';
	 }
	 else if($str1 == "account.php")
	 {
	 	$navigation = '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>';
		$navigation1 = '<label class=navigation>'.$lang['Transaction_History'].'</label>';
	 }
	 else if($str1 == "account.php")
	 {
	 	$navigation = '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>';
		$navigation1 = '<label class=navigation>'.$lang['Transaction_History'].'</label>';
	 }
	 else if($str1 == "post-new-task.html") 
	 {
	 	$navigation = '<a href="post-new-task.html" class=footerlink>'.$lang['Post_Proj'].'</a>';
		$navigation1 = '<label class=navigation>'.$lang['Transaction_History'].'</label>';

	 }
	 else
	 {
		$navigation = '<label class=navigation>'.$lang['Transaction_History'].'</label>';
	 }
	 $tpl->assign(array( "navigation"		  => $navigation,
					     "navigation1"		  => $navigation1,
					));
$tpl->display('default_layout'. $config['tplEx']);
?>