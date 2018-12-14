<?php

#------------------------------------------------------------------------------------------------------------------------------
#	Include required files
#------------------------------------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Development.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang'].'/post_task.php');
include_once($physical_path['DB_Access']. 'Country.php');

include EDITOR_ROOT. 'spaw_control.class.php';

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$project		= new project();
$cats 	 		= new Category();
$development 	= new Development();
$emails 		= new Email();
$city 	= new City();

#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
if ($_POST['Submit'] == 'Back')
{
	header("location: project_list.php");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
elseif($Action == 'Edit' && $_POST['Submit']=='Update')
{
   	if(($HTTP_POST_FILES['project_file_1']['name'] == '') && ($HTTP_POST_FILES['project_file_2']['name'] == '') && ($HTTP_POST_FILES['project_file_3']['name'] == '') )
	   {
	     $project_file_1 = $_POST['image1'];
		 $project_file_2 = $_POST['image2'];
		 $project_file_3 = $_POST['image3'];
	   }
	 elseif(($HTTP_POST_FILES['project_file_1']['name'] != '') && ($HTTP_POST_FILES['project_file_2']['name'] == '') && ($HTTP_POST_FILES['project_file_3']['name'] == ''))
	  {
	      $n1 = @unlink($physical_path['project'].$_POST['image1']);;
		  $project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
		  $project_file_2 = $_POST['image2'];
		  $project_file_3 = $_POST['image3'];
	  }
	 elseif(($HTTP_POST_FILES['project_file_2']['name'] != '') && ($HTTP_POST_FILES['project_file_1']['name'] == '') && ($HTTP_POST_FILES['project_file_3']['name'] == ''))
	  {
	      $n1 = @unlink($physical_path['project'].$_POST['image2']);
		  $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
		  $project_file_1 = $_POST['image1'];
		  $project_file_3 = $_POST['image3'];
	  } 
	 elseif(($HTTP_POST_FILES['project_file_2']['name'] == '') && ($HTTP_POST_FILES['project_file_1']['name'] == '') && ($HTTP_POST_FILES['project_file_3']['name'] != ''))
	  {
	      $n1 = @unlink($physical_path['project'].$_POST['image3']);
		  $project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
		  $project_file_1 = $_POST['image1'];
		  $project_file_2 = $_POST['image2'];
	  } 
	 elseif(($HTTP_POST_FILES['project_file_2']['name'] != '') && ($HTTP_POST_FILES['project_file_1']['name'] != '') && ($HTTP_POST_FILES['project_file_3']['name'] == ''))
	  {
	      $n1 = @unlink($physical_path['project'].$_POST['image1']);
          $n2 = @unlink($physical_path['project'].$_POST['image2']);
		  $project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
		  $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
		  $project_file_3 = $_POST['image3'];
	  } 
     elseif(($HTTP_POST_FILES['project_file_2']['name'] != '') && ($HTTP_POST_FILES['project_file_1']['name'] == '') && ($HTTP_POST_FILES['project_file_3']['name'] != ''))
	  {
	      $n1 = @unlink($physical_path['project'].$_POST['image2']);
		  $n2 = @unlink($physical_path['project'].$_POST['image3']);
		  $project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
          $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
		  $project_file_1 = $_POST['image1'];
	  } 
 	elseif(($HTTP_POST_FILES['project_file_2']['name'] == '') && ($HTTP_POST_FILES['project_file_1']['name'] != '') && ($HTTP_POST_FILES['project_file_3']['name'] != ''))
	  {
	      $n1 = @unlink($physical_path['project'].$_POST['image1']);
		  $n2 = @unlink($physical_path['project'].$_POST['image3']);
		  $project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
          $project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
		  $project_file_2 = $_POST['image2'];
	  } 
  
     elseif(($HTTP_POST_FILES['project_file_1']['name'] != '') && ($HTTP_POST_FILES['project_file_2']['name'] != '') && ($HTTP_POST_FILES['project_file_3']['name'] != ''))
	   {
	         $n1 = @unlink($physical_path['project'].$_POST['image1']);
             $n2 = @unlink($physical_path['project'].$_POST['image1']);
			 $n3 = @unlink($physical_path['project'].$_POST['image3']);
			 $project_file_1 = fileUpload($HTTP_POST_FILES['project_file_1'],project);
			 $project_file_2 = fileUpload($HTTP_POST_FILES['project_file_2'],project);
			 $project_file_3 = fileUpload($HTTP_POST_FILES['project_file_3'],project);
		}			
    $project->Update($_POST,$project_file_1,$project_file_2,$project_file_3);
	header("location: project_list.php?edit=true");
	exit();
}
elseif($_POST['Submit'] == 'Send' && $Action == 'Mail')
{
        global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(NOTIFICATION_OF_TASK);

		$mail2->setFrom($sendinfo->email_adress);
		$mail2->setSubject($sendinfo->email_subject);
	
	   $tpl2->assign(array(
						 	 "content"          =>  $_POST['content'], 
						 					
						));							 

			$mail_content_reg = $tpl2->fetch("email_template:".NOTIFICATION_OF_TASK);	
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
        $result = $mail2->send(array($_POST['user_mail_id']));

	
	header("location: project_list.php?send=true");
	exit();
}
elseif($_POST['Submit'] == 'Send' && $Action == 'Delete_And_Mail')
{
        global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(NOTIFICATION_OF_TASK);

		$mail2->setFrom($sendinfo->email_adress);
		$mail2->setSubject($sendinfo->email_subject);
	
	   $tpl2->assign(array(
						 	 "content"          =>  $_POST['content'], 
						 					
						));							 

			$mail_content_reg = $tpl2->fetch("email_template:".NOTIFICATION_OF_TASK);	
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
        $result = $mail2->send(array($_POST['user_mail_id']));

	$project->Delete($_POST['project_id']);
	
	header("location: project_list.php?send=true");
	exit();
}

elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
	     $val = $project->Delete($val)?'true':'false';			
	}

	header("location: project_list.php?delall=true");
	exit();
}
elseif($_POST['Submit'] == 'Back')
{
	header('location: project_list.php');
	exit();
}
#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
	if($_GET['edit']==true)
		$succMessage = "Task has been updated successfully!!";
	elseif($_GET['del']==true)
		$succMessage = "Task has been deleted successfully!!";	
    elseif($_GET['delall']==true)
		$succMessage = "All tasks have been deleted successfully!!";
	elseif($_GET['send']==true)
		$succMessage = "Mail send successfully!!";				
	
	
	$tpl->assign(array( "T_Body"			=>	'project_showall'. $config['tplEx'],
						"JavaScript"	    =>  array("project_list.js"),
						"A_Action"		    =>	"project_list.php",
						"succMessage"	    =>	$succMessage,
						"path"              =>  $virtual_path['Site_Root'],
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
								
    $project->ViewAll();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_pro_list[$i]['id']					= $db->f('project_id');
		$arr_pro_list[$i]['membership_id']		= $db->f('membership_id');
		$arr_pro_list[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_pro_list[$i]['premium_project']	= $db->f('premium_project');
		$arr_pro_list[$i]['posted_by']			= $db->f('project_posted_by');
		$arr_pro_list[$i]['auth_id_of_post_by']	= $db->f('auth_id_of_post_by');
		$arr_pro_list[$i]['posted_to']			= $db->f('project_post_to');
		$arr_pro_list[$i]['auth_id_of_post_to']	= $db->f('auth_id_of_post_to');
		$arr_pro_list[$i]['title']		        = $db->f('project_title');
		$arr_pro_list[$i]['dec']		        = $db->f('project_description');
		$arr_pro_list[$i]['project_open_days']	= $db->f('project_days_open');
		$arr_pro_list[$i]['project_status']		= $db->f('project_status');
		$arr_pro_list[$i]['project_closed_date']		= $db->f('project_closed_date');		
		$arr_pro_list[$i]['project_city']		= $db->f('project_city');		
		//$a = explode("-",$db->f('project_posted_date'));
		//$arr_pro_list[$i]['project_closed_date1'] = date('Y-m-d ', mktime(0,0,0,$a[1],($a[2]+$db->f('project_days_open')),$a[0]) );
		//$arr_pro_list[$i]['project_closed_date']  = formatDate($arr_pro_list[$i]['project_closed_date1'],'d-M-Y');
		
		$arr_pro_list[$i]['project_posted_date1']= $db->f('project_posted_date');
		$arr_pro_list[$i]['project_posted_date']  = formatDate($arr_pro_list[$i]['project_posted_date1'],'d-M-Y');

		$i++;
	}

	$tpl->assign(array(	"aprolist"	    	=>	$arr_pro_list,
						"Loop"				=>	$rscnt,
				));
					
	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
					
}	
elseif($Action == 'Edit')
{
	$ret = $project->Getproject($_GET['project_id']);
		
	if($ret->project_category != '')
	{
	   $arr_categories = explode(",",$ret->project_category);
	}

    $result2 = $development->View_Development_Order();
	$Development_List	=	fillDbCombo($result2,'development_id','development_title',$ret->project_budget);
	$city_list = $city->GetCityList();
	$city	 = fillDbCombo($city_list,'city_name','city_name',$ret->project_city);	
	
	$tpl->assign(array("T_Body"					=>	'project_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("project_list.js"),
						"Action"				=>	$Action,
						"arr_categories"        =>  $arr_categories,
						"checked"				=>	"checked",
						"imgpath"               =>  $virtual_path['project'], 
						"Development_List"	 	=>  $Development_List,
						"Bidding_List"     		=>  fillArrayCombo($lang['days_for_bidding'],$ret->project_days_open),
						"Completed_List"     	=>  fillArrayCombo($lang['task_completed_dates'],$ret->completed_by),
						"Time_List"      	  	=>  fillArrayCombo($lang['time_of_day'],$ret->bidding_time),
						"Time_List2"      	  	=>  fillArrayCombo($lang['time_of_day'],$ret->completed_time),
						"City_List"				=>	$city,							
						"title"					=>	$ret->project_title,
					    "status"				=>	$ret->project_status,
						"project_file_1"		=>	$ret->project_file_1,
						"project_file_2"		=>	$ret->project_file_2,
						"project_file_3"		=>	$ret->project_file_3,
						"project_id"			=>	$ret->project_id,
						"option1" 				=> ($ret->project_hide == 1) ? 'checked' : '',
						"option2"  				=> ($ret->project_allow_bid == 1) ? 'checked' : '',
						"option3"  				=> ($ret->premium_project == 1) ? 'checked' : '',
						));
   $results = $cats->Get_Category_Listing();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f('cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$arr_sub_cat[$i]			= $cats->GetCategorybyParent($db->f('cat_id'));
		$i++;
	}	

	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
 					   "sub_cat"   			=>	$arr_sub_cat,
					   "Loop"				=>	$rscnt,
					));	
					
	$sw = new SPAW_Wysiwyg('desc' /*name*/,		$ret->project_description/*value*/,
				   'en' /*language*/, 'mini' /*toolbar mode*/, 'default' /*theme*/,
				   '750px' /*width*/, '100px' /*height*/);					   
				   
	$tpl->assign("EN_Page_Editor", $sw->getHtml());				
}		
elseif($Action == 'View')
{
	$ret = $project->GetprojectDetails($_GET['project_id']);
		
	if(($ret->project_hide) == 1)
	{
		$option1 = "Hide task bids from other users. To view bids Task Owner must login.";
	}
	if(($ret->project_allow_bid) == 1)
	{
		$option2 = "Allow only premium members to bid on my project.";
	}
	if(($ret->premium_project) == 1)
	{
		$option3 = "Set Task As a Premium Task.";
	}
	if(($ret->urgent_project) == 1)
	{
		$option4 = "Urgent project.";
	}
	if($ret->project_category != "")
	{
		$cat1 = explode(",",$ret->project_category);
		$count = count($cat1);
		$i = 0;
		foreach ($cat1 as $key=>$val)
		{
			$result[$i] = $cats->GetCatName($val);
			$i++;
		}
	}	
	
	$tpl->assign(array("T_Body"						=>	'project_view'. $config['tplEx'],

						"Action"					=>	$Action,
						"imgpath"           	    =>  $virtual_path['project'], 
						"open_days"	 				=>  $ret->project_days_open,
						"Bidding_List"     			=>  $ret->development_title,
						"title"						=>	$ret->project_title,
						"desc"						=>	$ret->project_description,
						"catname1"					=>	$result,
 					   	"Loop"						=>	$count,
						
						"project_file_1"			=>	substr($ret->project_file_1,25),
						"project_file_2"			=>	substr($ret->project_file_2,25),	
						"project_file_3"			=>	substr($ret->project_file_3,25),
						"download_project_file_1"	=>	$ret->project_file_1,
						"download_project_file_2"	=>	$ret->project_file_2,
						"download_project_file_3"	=>	$ret->project_file_3,
							
						"project_id"				=>	$ret->project_id,
						"option1" 					=>  $option1,
						"option2"  					=>  $option2,
						"option3"  					=>  $option3,
						"option4"  					=>  $option4,
						));
   $results = $cats->Get_Category_Listing();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f('cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$arr_sub_cat[$i]			= $cats->GetCategorybyParent($db->f('cat_id'));
		$i++;
	}	

	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
 					   "sub_cat"   			=>	$arr_sub_cat,
					   "Loop"				=>	$rscnt,
					));	
	$details = $project->GetEditprojectDeatils($_GET['project_id']);
	$rscnt_edit = $db->num_rows();
	$i=0;
	while($db->next_record())
	{
	    $arr_edit[$i]['description']		= $db->f('description');
		$arr_edit[$i]['filename']			= $db->f('filename');
		$arr_edit[$i]['edit_date']			= $db->f('edit_date');
		$i++;
	}
	$tpl->assign(array(
						   "arr_edit"   		=>	$arr_edit,
						   "Loop_Edit"			=>	$rscnt_edit,
				));	
}					
elseif($Action=='Delete_And_Mail')
{
    $delete_project = $project->Getprojectdelete($_POST['project_id']);
	$tpl->assign(array( "T_Body"				=>	'project_mail'. $config['tplEx'],
						"JavaScript"			=>  array("project_list.js"),
						"Action"				=>	$Action,
						"user_mail_id"    	 	=>  $delete_project->mem_email,
						"project_name"    		=>  $delete_project->project_title,
						"project_id"  	    	=>  $_POST['project_id'],
						));
}elseif($Action=='Mail')
{
    $mail_project = $project->Getprojectdelete($_POST['project_id']);
	$tpl->assign(array( "T_Body"				=>	'project_mail'. $config['tplEx'],
						"JavaScript"			=>  array("project_list.js"),
						"Action"				=>	$Action,
						"user_mail_id"    	 	=>  $mail_project->mem_email,
						"project_name"    		=>  $mail_project->project_title,
						"project_id"  	    	=>  $_POST['project_id'],
						));
}
$tpl->display('default_layout'. $config['tplEx']);
?>