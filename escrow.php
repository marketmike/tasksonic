<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/escrow.php');
include_once($physical_path['DB_Access']. 'Escrow.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['DB_Access']. 'task.php');


$Action	= isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : A_VIEW_ALL);
$escrow		= new Escrow();
$emails 	= new Email();
$proj 		= new project();

$milestone="";	
///////////if submit pressed at that time process according to payment method
if($_POST['Submit'] == $lang['Button_Submit'])
{
	switch($_POST['type'])
	{
	  
		case 1: // Create Escrow Payment In Full For the total amount bid by the awarded Tasker
		  
		    if($_POST['send_amount'] > $_POST['amount'])
			{
			   $flag = 1;
			   break;
			} 
			else
			{
			   //Send email to Tasker
			   
			    global $mail2;
				$mail2 = '';
				$mail2 = new htmlMimeMail();
			
				$tpl2 = new Smarty;
				$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
				$sendinfo = $emails->GetEmailDetails1(ESCROW_PAYMENT_TO_TASKER);
				
				$mail2->setSubject($sendinfo->email_subject);
				$mail2->setFrom($sendinfo->email_adress);
			
				$ret  = $proj->Getproject($_POST['project_list']);
							
				$tpl2->assign(array(
									"sender_name"           =>  $_SESSION['User_Name'],
									"amount"                =>  number_format($_POST['send_amount'],2),    
									"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_list']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
 									"flag"                  =>  1,
								));
			
	
			$mail_content_reg = $tpl2->fetch("email_template:".ESCROW_PAYMENT_TO_TASKER);	
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
				
				
				$send_to = GetEmailAddress(md5($_POST['user_name']));
				$result = $mail2->send(array($send_to));
			   
		///////////////////////////////////////////////////////////////////////////////////	
		
		
			 //Send email to Task Owner
			   
			    global $mail2;
				$mail2 = '';
				$mail2 = new htmlMimeMail();
			
				$tpl2 = new Smarty;
				$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
			
				$sendinfo = $emails->GetEmailDetails1(ESCROW_PAYMENT_TO_TASKER);
				
				$mail2->setSubject($sendinfo->email_subject);
				$mail2->setFrom($sendinfo->email_adress);
			
				$ret  = $proj->Getproject($_POST['project_list']);
							
				$tpl2->assign(array(
									"user_name"          	=>  $_POST['user_name'],
									"amount"                =>  number_format($_POST['send_amount'],2),    
									"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_list']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
									"flag"                  =>  0,
								));
			
			
				$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
				$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
				$mail_content_reg = $tpl2->fetch("email_template:".ESCROW_PAYMENT_TO_TASKER);	
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
				
				$send_to = GetEmailAddress(md5($_SESSION['User_Name']));
				$result = $mail2->send(array($send_to));
			   
		///////////////////////////////////////////////////////////////////////////////////	
		
				$milestone="Escrow For Bid Total";
	  	///// query for escrow payment complete with change in project status
				$escrow->Insert($_SESSION['User_Id'],$_SESSION['User_Name'],md5($_POST['user_name']),$_POST['user_name'],$_POST['send_amount'],$_POST['project_list'],$milestone,2);
					#### Now update Task Owner finances ####
				//	Generate unique transaction id to tie the records together
				srand((double)microtime()*1000000);
				$transaction_id = md5(uniqid(rand())) . '-' . time();				
				#### Update to transactions table ###
				$task_title = $escrow->Get_Task_Title($_POST['project_list']);
				$desc = 'Escrow created for tasker ' . $_POST['user_name'] . ', task "' . $task_title . '"'; 
				$escrow->Insert_Record_Of_Escrow($_SESSION['User_Id'],$_SESSION['User_Name'],$_POST['send_amount'],$_POST['project_list'],$desc,$transaction_id);

		
				//Cutting amount from Buyer Account  
				$wallet_buyer = Select_wallet_sum($_SESSION['User_Id']);
				$new_wallet1 = $wallet_buyer - $_POST['send_amount'];
				Update_wallet_sum($_SESSION['User_Id'],$new_wallet1); 
				$flag = 0;
				break;
			}		

		case 2: // Create escrow payment for expenses incurred by Tasker
			    if($_POST['total_max_amount'] != '')
				{
				   if($_POST['total_max_amount'] > $_POST['amount'])
					{
					    $flag = 1;
					    break;
					} 
				   else
				    {	
					
					     //Send email to Tasker
			   
							global $mail2;
							$mail2 = '';
							$mail2 = new htmlMimeMail();
						
							$tpl2 = new Smarty;
							$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
						
							$sendinfo = $emails->GetEmailDetails1(ESCROW_PAYMENT_TO_TASKER);
							
							$mail2->setSubject($sendinfo->email_subject);
							$mail2->setFrom($sendinfo->email_adress);
						
							$ret  = $proj->Getproject($_POST['project_lists']);
							
						
							$tpl2->assign(array(
												"sender_name"           =>  $_SESSION['User_Name'],
												"amount"                =>  number_format($_POST['total_max_amount'],2), 
												"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_list']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
												"flag"                  =>  1,    
											));
						
							$mail_content_reg = $tpl2->fetch("email_template:".ESCROW_PAYMENT_TO_TASKER);	
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
							
							$send_to = GetEmailAddress(md5($_POST['user_name']));
							$result = $mail2->send(array($send_to));
						   
						///////////////////////////////////////////////////////////////////////////////////	
						
						
						 //Send email to Task Owner
			   
							global $mail2;
							$mail2 = '';
							$mail2 = new htmlMimeMail();
						
							$tpl2 = new Smarty;
							$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
						
							$sendinfo = $emails->GetEmailDetails1(ESCROW_PAYMENT_TO_TASKER);
							
							$mail2->setSubject($sendinfo->email_subject);
							$mail2->setFrom($sendinfo->email_adress);
						
							$ret  = $proj->Getproject($_POST['project_lists']);
													
							$tpl2->assign(array(
												"user_name"           	=>  $_POST['user_name'],
												"amount"                =>  number_format($_POST['total_max_amount'],2),
												"project_link"          =>	"<a href=".$virtual_path['Site_Root']."task_".$_POST['project_list']."_".clean_url($ret->project_title).".html>".$ret->project_title."</a>",
												"flag"                  =>  0,     
											));
						
						
							$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
							$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
							$mail_content_reg = $tpl2->fetch("email_template:".ESCROW_PAYMENT_TO_TASKER);	
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
							$send_to = GetEmailAddress(md5($_SESSION['User_Name']));
							$result = $mail2->send(array($send_to));
						 
						$milestone="Expense Reimburse";						 
						///////////////////////////////////////////////////////////////////////////////////	
										
						 ///// query for escrow payment partial 
						$escrow->Insert($_SESSION['User_Id'],$_SESSION['User_Name'],md5($_POST['user_name']),$_POST['user_name'],$_POST['total_max_amount'],$_POST['project_lists'],$milestone,3);
			
						//Cutting amount from Buyer Account  
						$wallet_buyer = Select_wallet_sum($_SESSION['User_Id']);
						$new_wallet1 = $wallet_buyer - $_POST['total_max_amount'];
						Update_wallet_sum($_SESSION['User_Id'],$new_wallet1); 
						$flag = 0;
						break;
					}	
				}
				else
				{
	  			  	$error = 1;
				  	break;
				}
	}
	if($flag == 1)
	{	   
	   $ERROR = 'You do not have sufficient funds to create this escrow payment, please <a href="/make-deposit.html">deposit</a> into your account.';
	}
	elseif($error == 1)
	{
	   $ERROR = 'Payment amount is missing, cannot proceed!';
	}
	elseif($flag == 0)
	{
	   $sucmsg = 'Escrow Payment Successfully Transfered';
	}
}

/////////////////////////////////////////////////////\
/// Step 1 Gets The Total Bid Amount For Awarded Tasker
if($_GET['Action'] == 'Next_Step1')
{
    $response = $escrow->SellerName($_GET['check']);
    $total_bid_amount = $escrow->Amount($_GET['check']);
	
	print $total_bid_amount."-".$response;die;
}
elseif($_GET['Action'] == 'Next_Step2')// Gets any additional expenses incurred
{
    $yes = $escrow->Get_Amount_Details($_GET['check']);
	
	if($yes == 1)
    {
	print 'The Tasker has not marked the task completed as of yet or they did not incurr any additional expenses'
	;die;
	}
	
   	elseif($yes == 0)   	
    {
       $response = $escrow->SellerName($_GET['check']);
	   $total_bid_amount = $escrow->Amount($_GET['check']);
	   $total_reimburse = $escrow->ExtraExpenses($_GET['check']); // Testing to add extra escrow for reimburse
	   $adjusted_total_bid_amount = $total_bid_amount + $total_reimburse;
	   $escrow_amount = $escrow->Get_ESC_Amount_Details($_GET['check']);
	   $remaing_amount = number_format($adjusted_total_bid_amount - $escrow_amount,2);
	   print $remaing_amount."-".$response;die;
	}
}



///////check wallet amount
	$totalamount1 = Select_wallet_sum($_SESSION['User_Id']);
	$test = substr($totalamount1,1);
	$test2	=	str_replace(",","",$test);
	$str = $_SERVER['HTTP_REFERER'];
	
	 	$str1 = substr(strrchr($str,'/'),1);
		
		if($str1 == 'post-new-task.html')
		{
			$navigation = '<a href="post-new-task.html" class=footerlink>'.$lang['Post_Proj'].'</a>';
			$navigation1= '<label class=navigation>'.$lang['New_Escrow_Pay'].'</label>';
		}
		else if($str1 == 'my-account.html')
		{
			$navigation = '<a href="my-account.html" class=footerlink>'.$lang['Buyer_Activity'].'</a>';
			$navigation1= '<label class=navigation>'.$lang['New_Escrow_Pay'].'</label>';
		}
		else if($str1 == 'account.php')
		{
			$navigation = '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>';
			$navigation1= '<label class=navigation>'.$lang['New_Escrow_Pay'].'</label>';
		}
		else if($str1 == 'account.php')
		{
			$navigation = '<a href="my-account.html" class=footerlink>'.$lang['My_Account'].'</a>';
			$navigation1= '<label class=navigation>'.$lang['Withdraw_Money'].'</label>';
		}
		else
		{
			$navigation = '<a href=manage_payments.php class=footerlink>'.$lang['Manage_Payments'].'</a>';
			$navigation1= '<label class=navigation>'.$lang['New_Escrow_Pay'].'</label>';
		}
///////if amount is not sufficient than deny for payment
	if($test2 < number_format($config[WC_POST_DEPOSIT],2))
	{
		$tpl->assign(array(	"T_Body"			=>	'Msg'. $config['tplEx'],
							"msg"  				=>  "You can't use Escrow Payment because you don't have enough money...",  
							"navigation"		=>	$navigation,
							"navigation1"		=>	$navigation1,
							"navigation2"		=>	$navigation2,
						));	
	}
///////if amount is sufficient than go for payment
	else
    {		
		
		$tpl->assign(array(	"T_Body"			=>	'escrow'. $config['tplEx'],
							"TOP_TITLE"         =>  strtoupper("Escrow Payment"),
							"ERROR"				=>  $ERROR,
							"JavaScript"		=>	array("escrow.js","check.js"),    /*,"check1.js"*/
							"totalamount1"      =>  $test2,
							"minimum_amount"    =>  number_format($config[WC_POST_DEPOSIT],2),     
							"sucmsg"     		=>  $sucmsg,
							"navigation"		=>	$navigation,
							"navigation1"		=>	$navigation1,
							"navigation2"		=>	$navigation2,
							));
	///////get listing of project with related status

		$listing_for_full = $escrow->project_Listing_for_full($_SESSION['User_Id']);			
		$project_Listing_For_Full	=	fillDbCombo($listing_for_full,'project_id','project_title');
		
		$tpl->assign(array(	 "project_Listing_For_Full"				=>	$project_Listing_For_Full,
						   ));
						   
		$listing_for_Partial = $escrow->project_Listing_for_Partial($_SESSION['User_Id']);			
		$project_Listing_For_Partial	=	fillDbCombo($listing_for_Partial,'project_id','project_title');
		
		$tpl->assign(array(	 "project_Listing_For_Partial"				=>	$project_Listing_For_Partial,
						   ));				   

	}	
///// assing language
	$tpl->assign(array(	"lang"					=>  $lang,
					 ));


$tpl->display('default_layout'. $config['tplEx']);
?>