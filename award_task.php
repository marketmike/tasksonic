<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Bid.php');
include_once($physical_path['DB_Access']. 'task.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['Site_Lang'].'award_task.php');
include_once($physical_path['fblib']. 'facebook.php');

//facebook process used for publish to wall
// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => $fb_app_id,
  'secret' => $fb_app_secret,
  'cookie' => true,
));
$session = $facebook->getUser();

$bid 			= new Bid();
$proj			= new project();
$emails 		= new Email();
$seller			= new Seller();

if($_POST['Submit'] == $lang['Select'])
{		
   //check account
		$ret  = $proj->Getproject($_POST['project_id']);

		$awarded_user = $_POST['selected_user'][0];
		
		$bid_details = $proj->Bid_details_Of_User($_POST['project_id'],md5($awarded_user)); 
		
		$bid->award_task_Winner($_POST['project_id'],$awarded_user);
		
			// Publish award notice to latest_activity table for display on logged_in_home.tpl
			$task_id = $ret->project_id;
			$task_owner = $ret->project_posted_by;
			$tasker = $awarded_user;
			$activity_type = "Task Awarded";
			$description = '<a href="task_owner_profile_' . $task_owner . '.html">' . $task_owner . '</a> just awarded the task "'.$ret->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker <a href="tasker_profile_' . $tasker . '.html";>' . $tasker . '</a>';
			$activity_link = 'task_'.$task_id.'_'.clean_url($ret->project_title).'.html';
			Insert_Latest_Activity($task_owner,$tasker,$activity_type,$description,$activity_link,$citycurrent);
			// End publish award notice to latest_activity table for display on logged_in_home.tpl
			
			//////////////////////////////////////////
			///////// Publish to facebook
			//////////////////////////////////////////
			$retuser = $user->getauthUserDetails(md5($_SESSION['User_Name']));
			$fbid = $retuser->fbid;
			$fb_publish = $retuser->fb_publish;

						if($fb_publish && $fbid){				
							// Session based API call.		
							if($session){
									// Publish to user wall as user
									try { 
									$facebook->api('/me/feed','post', array('message'=>'I just awarded the task "'.$ret->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker ' . $tasker, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										} catch (FacebookApiException $e) {
										error_log($e);	
										}
									// Publish to sites fanpage as user
										try {										
											$facebook->api('/' .$fb_fan. '/feed', 'post', array('message'=>'I just awarded the task "'.$ret->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker ' . $tasker, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))));
										  } catch (FacebookApiException $e) {
											error_log($e);	
										  }
									} // end if session
 									
						}else{ // IF NOT A FACEBOOK USER OR IF NOT PUBLISH TO FB, THEN SITE PUBLISHES TO FANPAGE 
						
									// Post As Page Admin									
										$args = array(
										'access_token'  => $fb_page_token,     
										'message'=> $Site_Title. ' user ' . $task_owner . ' just awarded the task "'.$ret->project_title.'" on '.$Site_Title. ' in ' .$citycurrent . ' to Sonic Tasker ' . $tasker, 'name'=>$activity->project_title, 'picture'=>$virtual_path['Site_Root'].'/tmp/logo.png', 'caption' => 'Check out Tasksonic!', 'description'=>'Get things done fast', 'link'=>$virtual_path['Site_Root'].'/'.$activity_link, 'actions' => array(array('name' => 'Post Your Task!', 'link' => $virtual_path['Site_Root']))
										);
										try {										
											$post_id = $facebook->api("/$fb_fan/feed","post",$args);
											} catch (FacebookApiException $e) {
											error_log($e);											
										}	
						} // end if $fb_publish && $fbid									
			//Publish to facebook	

		
		$ret = $user->getUserDetails(md5($awarded_user));
		$send_to = $ret->mem_email;
		
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
		
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
		$sendinfo = $emails->GetEmailDetails1(BID_WON);
		
		$mail2->setSubject($sendinfo->email_subject);
		$mail2->setFrom($sendinfo->email_adress);
		
		$ret  = $proj->Getproject($_POST['project_id']);
		
		$tpl2->assign(array(
							"project_name"          =>  $ret->project_title, 
							"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html >".$ret->project_title."</a>",
							"link"         			=>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_id']."_".clean_url($ret->project_title).".html >Here</a>",
							
				));
		
			$mail_content_reg = $tpl2->fetch("email_template:".BID_WON);	
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
		$result = $mail2->send(array($send_to));
		
		header("location: award_task.php?send_mail=true&id=".$_POST['project_id']);
		exit();
}
 
if($_GET['send_mail'] == true)
{
	
	$tpl->assign(array(	"T_Body"			=>	'award_tasks_send'. $config['tplEx'],
                     	
				));
}
else
{	 
	$error = 0;
	$ret  = $proj->Getproject($_GET['id']);
	
	if($_SESSION['User_Id'] == $ret->auth_id_of_post_by)
	{
	
		#### Get current balance in their wallet ####
		$task_owner_wallet = Select_wallet_sum($_SESSION['User_Id']);	
	
		$bid->Get_Award_List_project($_GET['id']);
		$cnt = $db1->num_rows();
		$i = 0;
		while($db1->next_record())
		{
			$arr_bids[$i]['bid_by_user']		= $db1->f('bid_by_user');
			$arr_bids[$i]['bid_amount']			= $db1->f('bid_amount');
			$arr_bids[$i]['delivery_within']	= $db1->f('delivery_within');
			$arr_bids[$i]['date_2']				= $db1->f('date_2');
			$arr_bids[$i]['reviews']			= $seller->Average_Seller_Rating_Count($db1->f('bid_by_user'));
			$arr_bids[$i]['rating']				= number_format($seller->Average_Seller_Rating($db1->f('bid_by_user')),2);
	 
			#### calculate Tasker commision based on bid amount ####	
			$task_owner_comm = number_format(($config[WC_COMM_FROM_BUYER] * $db1->f('bid_amount'))/100,2);
			#### figure which is higher, min or percent ####	
				if($task_owner_comm > $config[WC_MINIMUM_COMM_BUYER] )
				{
					$arr_bids[$i]['commission']		= $task_owner_comm;
						if ($task_owner_wallet < $task_owner_comm){
						$arr_bids[$i]['howshort'] = $task_owner_wallet - $task_owner_comm;
						}else{
						$arr_bids[$i]['howshort'] = '00.00';
						}
				}	 
				else
				{
					$arr_bids[$i]['commission']		= $config[WC_MINIMUM_COMM_BUYER];
						if ($task_owner_wallet < $config[WC_MINIMUM_COMM_BUYER]){
						$arr_bids[$i]['howshort'] = $task_owner_wallet - $config[WC_MINIMUM_COMM_BUYER];
						}else{
						$arr_bids[$i]['howshort'] = '00.00';
						}			
				}

			
		
			$i++;
		}
	}
	else
	{
		$error = 1;
	}

	
	$tpl->assign(array(	"T_Body"			=>	'award_task'. $config['tplEx'],
						"JavaScript"	    =>  array("award.js"),
                     	"arr_bids"    		=>	$arr_bids,
						"Loop"				=>	$cnt,
						"error"				=>  $error,
						"inwallet"			=>	$task_owner_wallet,
						"hidemap"			=>	'hidemap',						

				));
}

if(($ret->project_status) == 2 && ($_SESSION['User_Id'] ==  $ret->auth_id_of_post_by))
{
	
	$str = $_SERVER['HTTP_REFERER'];
	
	$str1 = substr(strrchr($str,'/'),1);
	
	if($str1 == 'project_'.$_GET['id'].'_'.$_GET['proj_name'].'.html')
	{
		
		$navigation = '<a href=project_'.$_GET['id'].'_'.$_GET['proj_name'].'.html class=footerlink>'.stripslashes($ret->project_title).'</a>';
		$navigation1= '<label class=navigation>'.$lang['Award_project'].'</label>';
		
	}
		$tpl->assign(array(	"T_Body"			=>	'Msg1'. $config['tplEx'],
							"msg"	  			=>  $lang['Award_Again'],
							"user"              =>  $ret->project_post_to,  
							"msg1"	  			=>  $lang['Award_Again1'],
							"navigation"		=>	$navigation,
							"navigation1"		=>	$navigation1,
							"navigation2"		=>	$navigation2,
							));
}	
$ret  = $proj->Getproject($_GET['id']);


$tpl->assign(array(
							"lang"						=>  $lang,	
							"project_name"				=>  stripslashes($ret->project_title),
							"project_id"				=>  $ret->project_id,
							"navigation"				=>  '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>',
							"navigation1"				=>  '<a href=award_task_'.$ret->project_id.'.html class=footerlink>'.$lang['Pick_a_Software_Coder'].'</a>',
							"tab"						=>  4,
							"navigation"				=>	$navigation,
							"navigation1"				=>	$navigation1,
							"navigation2"				=>	$navigation2,
							
			));

$tpl->display('default_layout'. $config['tplEx']);
?>