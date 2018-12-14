<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang'].'/edit_task.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);
$pro = new project();
$emails 		= new Email();

if($Action == 'Edit' && $_POST['Submit'] = $lang['Button_Submit'])
{
	if($HTTP_POST_FILES['project_file']['name'] != '')
		{
			$project_file = fileUpload($HTTP_POST_FILES['project_file'],project);
		}
		
	$en_edit_proj 	   = badWordDetect($_POST['en_edit_proj']);

	$pro->Insert_Edit_project($_POST,$project_file,$en_edit_proj);

	$set = $pro->Get_Bids_Mail($_POST['project_id']);
	
	$rscnt = $db->num_rows();

    if($rscnt != 0)
	{
		$i=0;
		while($db->next_record())
		{
			$arr_email[$i]			= $db->f('mem_email');
			$i++;
		}
		
	}	
	  
	////mail sending.......    
	   
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		
	
        $Fromusername = GetEmailAddress($_SESSION['User_Id']);
			
		$mail2->setFrom($Fromusername);
		
		$sendinfo = $emails->GetEmailDetails(TASK_INFORMATION_CHANGE);

		$mail2->setSubject($sendinfo->email_subject);
	
		$set1 = $pro->Getproject($_POST['project_id']);
		
		$tpl2->assign(array(
							"project_title"         =>  $set1->project_title,
						  //  "link"                  =>  $virtual_path['Site_Root']."project_".$_POST['project_id'].".html",
							"link"     			    =>	"<a href=".$virtual_path['Site_Root']."project_".$_POST['project_id']."_".clean_url($set1->project_title).".html>".$set1->project_title."</a>",

							"sender_name"           =>  $_SESSION['User_Name'],
							"en_msg"                =>  $en_edit_proj,  
						));
					

		
			$mail_content_reg = $tpl2->fetch("email_template:".TASK_INFORMATION_CHANGE);	
		
			$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
			$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);			
			$mail_html = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td>'.stripslashes($mail_content_header).'</td>
							</tr>
							<tr>
								<td><table align="center" width="600" cellpadding="15" cellspacing="2" bgcolor="#dfe0e0"><tr><td>'.stripslashes($mail_content_reg).'</td></tr></table></td>
							</tr>
							<tr>
								<td>'.stripslashes($mail_content_footer).'</td>
							</tr>
						</table>';
					
		$mail2->setHtml($mail_html);
		
		if($rscnt != 0)
			{
			   foreach($arr_email as $key => $val)
				{
				   $result = $mail2->send(array($val));
				}
			}
	header("location: edit_task_success_".$_POST['project_id'].".html");
	exit();
}
elseif($Action == 'cancel')
{

	header("location: my-account.html");
	exit();
}
else
{
	
		
	$details = $pro->GetprojectDetails($_GET['id']);	
	
	$count = $pro->project1($_GET['id']);
	
	$str = $_SERVER['HTTP_REFERER'];
	$str1 = substr(strrchr($str,'/'),1);
	
	if($str1 == "my-posted-tasks.html")
	{
		$navigation  = '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>';
		$navigation1 = '<a href=my-posted-tasks.html class=footerlink>'.$lang['View_My_All_project'].'</a>';
		$navigation2  	= '<label class=navigation>'.$lang['Edit_project'].'</label>';
	}
	else
	{
		$navigation 	= '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>';
		$navigation1  	= '<label class=navigation>'.$lang['Edit_project'].'</label>';
	}	
	
	$tpl->assign(array( "T_Body"			=>	'edit_project'. $config['tplEx'],
						"JavaScript"		=>  array("edit_task.js"),
						"lang"				=>  $lang,
						"user_name"         =>  $_SESSION['User_Name'], 
						"TOP_TITLE"         =>  strtoupper($lang['Edit_project']." : ".$details->project_title),    
						"Site_Title"		=>	$config[WC_SITE_TITLE]." - ".$lang['Edit_project'],
						"pro_title"      	=>  stripslashes($details->project_title),
						"total"				=>  $config[WC_EDIT_BID],
						"count1"			=>  $count,
						"count"             =>  $count + 1,
						"id"                =>  $_GET['id'],
						"clear_title"		=>  $details->project_title,
						"navigation"		=>	$navigation,
						"navigation1"		=>	$navigation1,
						"navigation2"		=>	$navigation2, 
						"langJS_en_dec" => $lang['JS_en_dec'],
						));
						
	
}
$tpl->display('default_layout'. $config['tplEx']);
?>