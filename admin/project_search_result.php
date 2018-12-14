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

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');


$project		= new project();
$cats 	 		= new Category();
$development 	= new Development();
$emails 		= new Email();

#-----------------------------------------------------------------------------------------------------------------------------
#	Cancel
#-----------------------------------------------------------------------------------------------------------------------------
/*if ($_POST['Submit'] == 'Cancel')
{
	header("location: project_search_result.php");
	exit();
}
*/
#----------------------------------------------------------------------------------------------------
# Add Country
#----------------------------------------------------------------------------------------------------
/*elseif($Action == 'Edit' && $_POST['Submit']=='Update')
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
	header("location: project_search_result.php?edit=true");
	exit();
}
*/
if($Action=='Delete')
{
       	$delete_project = $project->Getprojectdelete($_POST['project_id']);
		
    	global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_DELETE_TASK);

		$mail2->setFrom($sendinfo->email_adress);
		$mail2->setSubject($sendinfo->email_subject);
		
			$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_DELETE_TASK);	
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
   
	  	$result = $mail2->send(array($delete_project->mem_email));

	$project->Delete($_POST['project_id']);
	
	header("location: project_search_result.php?del=true");
	exit();
}
elseif($Action=='DeleteSelected')
{
	foreach($_POST['cat_prod'] as $key=>$val)
	{
	     $val = $project->Delete($val)?'true':'false';			
	}

	header("location: project_search_result.php?delall=true");
	exit();
}
#=======================================================================================================================================
#											RESPONSE CREATING CODE
#---------------------------------------------------------------------------------------------------------------------------------------

if($Action == 'ViewAll' || $Action == '')
{
    //print_r($_POST); die;

	if($_GET['edit']==true)
		$succMessage = "project has been updated successfully!!";
	elseif($_GET['del']==true)
		$succMessage = "project has been deleted successfully!!";	
    elseif($_GET['delall']==true)
		$succMessage = "All projects has been deleted successfully!!";			
	
	
	$tpl->assign(array( "T_Body"			=>	'project_search_showall'. $config['tplEx'],
						"JavaScript"	    =>  array("project_search.js"),
						"A_Action"		    =>	"project_search_result.php",
						"succMessage"	    =>	$succMessage,
						"PageSize_List"		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						

						));
								
		$_SESSION['pre_project']			=	(!isset($_POST['pre_project']) ? $_SESSION['pre_project'] : $_POST['pre_project']);
		$_SESSION['vip_project']			=	(!isset($_POST['vip_project']) ? $_SESSION['vip_project'] : $_POST['vip_project']);
		$_SESSION['project_posted_by']		=	(!isset($_POST['project_posted_by']) ? $_SESSION['project_posted_by'] : $_POST['project_posted_by']);
		$_SESSION['project_title']			=	(!isset($_POST['project_title']) ? $_SESSION['project_title'] : $_POST['project_title']);
		$_SESSION['project_description']	=	(!isset($_POST['project_description']) ? $_SESSION['project_description'] : $_POST['project_description']);
		$_SESSION['cat_prod']				=	(!isset($_POST['cat_prod']) ? $_SESSION['cat_prod'] : $_POST['cat_prod']);
		$_SESSION['budget']					=	(!isset($_POST['budget']) ? $_SESSION['budget'] : $_POST['budget']);
		$_SESSION['bidding_days']			=	(!isset($_POST['bidding_days']) ? $_SESSION['bidding_days'] : $_POST['bidding_days']);
		$_SESSION['status_of_project']		=	(!isset($_POST['status_of_project']) ? $_SESSION['status_of_project'] : $_POST['status_of_project']);
		
			
	$project->Search_projects_Admin_side($_SESSION);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
	   	$arr_pro_list[$i]['id']					= $db->f('project_id');
		$arr_pro_list[$i]['membership_id']		= $db->f('membership_id');
		$arr_pro_list[$i]['auth_id_of_post_by']	= $db->f('auth_id_of_post_by');
		$arr_pro_list[$i]['auth_id_of_post_to']	= $db->f('auth_id_of_post_to');
		$arr_pro_list[$i]['premium_project']	= $db->f('premium_project');
		$arr_pro_list[$i]['project_posted_date']= $db->f('project_posted_date');
		$arr_pro_list[$i]['posted_by']			= $db->f('project_posted_by');
		$arr_pro_list[$i]['posted_to']			= $db->f('project_post_to');
		$arr_pro_list[$i]['title']		        = $db->f('project_title');
		$arr_pro_list[$i]['dec']		        = $db->f('project_description');
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
/*elseif($Action == 'Edit')
{
	$ret = $project->Getproject($_POST['project_id']);
	$project_title	=	"".$_SESSION['Language_Types']."_project_title";
	$project_Dec	=	"".$_SESSION['Language_Types']."_project_description";
	
	if($ret->project_category != '')
	{
	   $arr_categories = explode(",",$ret->project_category);
	}

    $result2 = $development->View_Development_Order();
	$Development_List	=	fillDbCombo($result2,'development_id',''.$_SESSION['Language_Types'].'_development_title',$ret->project_budget);
	
	$tpl->assign(array("T_Body"					=>	'project_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("project_search.js"),
						"Action"				=>	$Action,
						"arr_categories"        =>  $arr_categories,
						"checked"				=>	"checked",
						"imgpath"               =>  $virtual_path['project'], 
						"Development_List"	 	=>  $Development_List,
						"Bidding_List"     		=>  fillArrayCombo($lang['days_for_bidding'],$ret->project_days_open),
						"title"					=>	$ret->$project_title,
						"desc"					=>	$ret->$project_Dec,
						"project_file_1"		=>	$ret->project_file_1,
						"project_file_2"		=>	$ret->project_file_2,
						"project_file_3"		=>	$ret->project_file_3,
						"project_id"			=>	$ret->project_id,
						"option1" 				=> ($ret->project_hide == 1) ? 'checked' : '',
						"option2"  				=> ($ret->project_allow_bid == 2) ? 'checked' : '',
						));
   $results = $cats->Get_Category_Listing();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f(''.$_SESSION['Language_Types'].'_cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$arr_sub_cat[$i]			= $cats->GetCategorybyParent($db->f('cat_id'));
		$i++;
	}	

	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
 					   "sub_cat"   			=>	$arr_sub_cat,
					   "Loop"				=>	$rscnt,
					));	
}		
elseif($Action == 'View')
{
	$ret = $project->GetprojectDetails($_GET['project_id']);
	$project_title	=	"".$_SESSION['Language_Types']."_project_title";
	$project_Dec	=	"".$_SESSION['Language_Types']."_project_description";
	$project_budget	=	"".$_SESSION['Language_Types']."_development_title";

	
	if(($ret->project_hide) == 1)
	{
		$option1 = "Hide projects bids from other users. To view bids project creator must login.";
	}
	if(($ret->project_allow_bid) == 2)
	{
		$option2 = "Allow only premium members to bid on my project.";
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

	$tpl->assign(array("T_Body"					=>	'project_view'. $config['tplEx'],
						"JavaScript"			=>  array("project_search.js"),
						"Action"				=>	$Action,
						"imgpath"               =>  $virtual_path['project'], 
						"open_days"	 			=>  $ret->project_days_open,
						"Bidding_List"     		=>  $ret->$project_budget,
						"title"					=>	$ret->$project_title,
						"desc"					=>	$ret->$project_Dec,
						"catname1"				=>	$result,
 					   	"Loop"					=>	$count,
						"project_file_1"		=>	$ret->project_file_1,
						"project_file_2"		=>	$ret->project_file_2,
						"project_file_3"		=>	$ret->project_file_3,
						"project_id"			=>	$ret->project_id,
						"option1" 				=> $option1,
						"option2"  				=> $option2,
						));
   $results = $cats->Get_Category_Listing();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f(''.$_SESSION['Language_Types'].'_cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$arr_sub_cat[$i]			= $cats->GetCategorybyParent($db->f('cat_id'));
		$i++;
	}	

	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
 					   "sub_cat"   			=>	$arr_sub_cat,
					   "Loop"				=>	$rscnt,
					));	
}					
*/$tpl->display('default_layout'. $config['tplEx']);
?>