<?php
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Utility.php');
include EDITOR_ROOT. 'spaw_control.class.php';

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

$email = new Email();
$utility = new Utility();


if($Action == 'Edit' && $_POST['Submit']=='Save')
{

    $email->UpdateEmailTemplate($_POST);
	header("location: email_managment.php?edit=true");
	exit();
}
elseif ($_POST['Submit'] == 'Cancel')
{
	header("location: email_managment.php");
	exit();
}

if($Action == 'ViewAll' || $Action =='')
{
   if($_GET['edit'] == 'true')
      $succMessage = "Email Template updated successfully";
   
	$tpl->assign(array(
						   "T_Body"			=>	'email_managment'. $config['tplEx'],
						   "A_Action"		=>	"email_managment.php",
						   "JavaScript"	    =>  array("emailmanagment.js"),
						   "succMessage"	=>	$succMessage,
						   "PageSize_List"	=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
					));
    if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record']),
						));
	}	
				   
	$email->ViewAllEmail();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_email_management[$i]['id']				= $db->f('email_id');
		$arr_email_management[$i]['en_sub']			= $db->f('email_subject');
		//$arr_email_management[$i]['it_sub']			= $db->f('it_email_subject');
		$arr_email_management[$i]['emailcontent']	= $db->f('email_content');
		$arr_email_management[$i]['emailsend']		= $db->f('email_title');
		$i++;
	}
	$tpl->assign(array(	"memail"	    	=>	$arr_email_management,
						"Loop"				=>	$rscnt,
				));				   
}				   
elseif($Action == 'Edit')
{
	$ret = $email->GetEmailDetails($_POST['email_id']);			
		
    $email_List1 	= $email->Email_List();
	$email_List	 	= fillDbCombo($email_List1,'email_id','email_title',$ret->email_id_sending);
						
	$tpl->assign(array("T_Body"					=>	'email_managment_addedit'. $config['tplEx'],
					   "JavaScript"	            =>  array("emailmanagment.js"),
						"Action"				=>	$Action,
						"en_email_subject"		=>	$ret->email_subject,
						//"it_email_subject"		=>	$ret->it_email_subject,
						"email_id"				=>	$ret->email_id,
						"email_List" 			=>  $email_List,
						));
	$sw = new SPAW_Wysiwyg('content' /*name*/,		$ret->email_content/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("Page_Editor", $sw->getHtml());					
   
}					

$tpl->display('default_layout'. $config['tplEx']);
?>