<?php
#====================================================================================================
#	Include required files
#----------------------------------------------------------------------------------------------------
define('IN_SITE', 	true);
define('IN_ADMIN', 	true);

include_once("../includes/common.php");
include_once($physical_path['Site_Lang']. '/common.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');
include($physical_path['DB_Access']. 'Others.php');
include($physical_path['DB_Access']. 'Country.php');
include($physical_path['DB_Access']. 'Category.php');
include($physical_path['DB_Access']. 'Industry.php');
include($physical_path['DB_Access']. 'Seller.php');
include($physical_path['DB_Access']. 'Payment.php');
include($physical_path['DB_Access']. 'Buyers.php');
include($physical_path['DB_Access']. 'Experience.php');
include_once($physical_path['DB_Access']. 'Email.php');

#=======================================================================================================================================
# Define the action
#---------------------------------------------------------------------------------------------------------------------------------------
$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ShowAll');
$user_ids = isset($_GET['user_auth_id']) ? $_GET['user_auth_id'] : (isset($_POST['user_auth_id']) ? $_POST['user_auth_id'] : 'ShowAll');
# Initialize object
$others 	=	 new Others();
$country	=	 new Country();
$cate		=	 new Category();
$industry	=	 new Industry();
$seller		=	 new Seller();
$pays 		=    new Payment();
$emails 	= 	 new Email();
$buyer 		= 	 new Buyers();
$exp		= 	 new Experience();


if($_POST['Submit'] == 'Back')
{
	header('location: users.php');
	exit();
}

if($_POST['Submit'] == 'Cancel')
{
	header('location: users.php');
	exit();
}

if($_POST['Submit'] == 'Update')
{
	$admins->UpdateMemberDetails($_POST);
	
	##################################   For Buyer  #############################################
	$byuerid = $buyer->GetBuyerDetails($_POST['user_auth_id']);	
	
	if($byuerid == 1)  	/// insert data
		{
		   $buyer->Insert_task_owner_profile($_POST);
		}
	elseif($buyerid == 0)	/// edit data
		{
		   $buyer->Update_task_owner_profile($_POST);
		}
	##############################################################################################	
	##################################   For Seller  #############################################
	############################################################################################## 
	
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_1"],$_POST["skill_name_1"],$_POST["skill_rate_1"]);	// insert or update skill in table for user
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_2"],$_POST["skill_name_2"],$_POST["skill_rate_2"]);	// insert or update skill in table for user
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_3"],$_POST["skill_name_3"],$_POST["skill_rate_3"]);	// insert or update skill in table for user
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_4"],$_POST["skill_name_4"],$_POST["skill_rate_4"]);	// insert or update skill in table for user
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_5"],$_POST["skill_name_5"],$_POST["skill_rate_5"]);	// insert or update skill in table for user
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_6"],$_POST["skill_name_6"],$_POST["skill_rate_6"]);	// insert or update skill in table for user
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_7"],$_POST["skill_name_7"],$_POST["skill_rate_7"]);	// insert or update skill in table for user
	$seller->Skills_Master($_POST['user_auth_id'],$_POST["skill_id_8"],$_POST["skill_name_8"],$_POST["skill_rate_8"]);	// insert or update skill in table for user

	$sellerdetails = $seller->GetsellerDetails($_POST['user_auth_id']);
	 
	if($sellerdetails == 1) /// insert data
		{
			$seller->Insert_tasker_profile($_POST);
		}
	elseif($sellerdetails == 0) /// edit data
		{
		   $seller->Update_tasker_profile($_POST); 
		} 
	
	############################################################################################## 

	header("location: users.php?update_user=true");
	exit();
}
elseif($_POST['Submit1'] == 'Send')
{
   		$mail_addresses = explode(",",$_POST['email_ids']);
   
  		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_SEND_USER);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject($_POST['subject']);

        $tpl2->assign(array(
		 						"content"	=>	$_POST['content'],
						));

		
			$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_SEND_USER);	
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
		
		$result = $mail2->send(array($mail2->setBcc($mail_addresses)));
	
		header("location: users.php?mail=true");
		exit();
}
elseif($_POST['Submit'] == 'Send')
{

        ////////////////////////////////////////////////////////////////////////////////////////////
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();

		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

		$sendinfo = $emails->GetEmailDetails1(EMAIL_SEND_USER);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject($_POST['subject']);

        $tpl2->assign(array(
		 						"content"	=>	$_POST['content'],
						));

		$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
		$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
		
		$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_SEND_USER);	
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
		header("location: users.php?mail=true");
		exit();
		////////////////////////////////////////////////////////////////////////////////////////////
		
	}
	
elseif($Action == 'Delete')	
{
  
  $name = $others->GetNameprojectBY($_POST['user_auth_id']);
  $others->Delproject($name);
  $others->Seller_DelProfile($_POST['user_auth_id']);
  $others->Seller_DelPortfolio($_POST['user_auth_id']);
  $others->Del_Contact($_POST['user_auth_id']);
  $others->Delete($_POST['user_auth_id']);
  
  header("location: users.php?del=true");
  exit();
}
elseif($Action == 'ChangeStatus')
{
	$val=$others->ToggleStatusUser($_POST['user_auth_id'],$_POST['status']);
		
	if($_POST['status'] == 0 )
	{
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
		
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
		$sendinfo = $emails->GetEmailDetails1(EMAIL_SEND_TO_BLOCKUSER);
		
		$mail2->setFrom($sendinfo->email_adress);
		
		$mail2->setSubject($sendinfo->email_subject);
		
		$user_id = Get_Sender_Name($_POST['user_auth_id']);
		
		$tpl2->assign(array(
								"user_id"	=>	$user_id,
								"terms_link"	=>	'<a href="'. $site_url . '/terms_conditions.html">Terms & Conditions</a>',								
								"contact_us"	=>	'<a href="'. $site_url . '/contact_us.html">Contact Us</a>',	
						));
		
		$mail_content_header = $tpl2->fetch("email_template:".EMAIL_HEADER);	
		$mail_content_footer = $tpl2->fetch("email_template:".EMAIL_FOOTER);	
		
		$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_SEND_TO_BLOCKUSER);	
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
		$recevier = GetEmailAddress($_POST['user_auth_id']);
		
		$result = $mail2->send(array($recevier));
	}		
	header("location: users.php?edit=true");
	exit();
}
elseif($Action == 'ChangeStatus_SpecailUser')
{
	$val=$others->ToggleStatusUser_Special($_POST['user_auth_id'],$_POST['yes_no']);
	header("location: users.php?edit=true");
	exit();
}

#-----------------------------------------------------------------------------------------------------------------------------
#	Show page list
#-----------------------------------------------------------------------------------------------------------------------------
if(!in_array($Action, array('View', 'Edit', 'Sort', 'View' , 'Send_Mail','MailSelected','Search')))
{
	if($_GET['mail'] == 'true')
	    $succMessage = "Mail send sucessfully";
	elseif($_GET['del'] == 'true')
	    $succMessage = "User Delete sucessfully";
	elseif($_GET['edit'] == 'true')
	    $succMessage = "User updated sucessfully";
	elseif($_GET['update'] == 'true')
	    $succMessage = "User Name updated sucessfully";	
	elseif($_GET['update_user'] == 'true')
	    $succMessage = "User Info updated sucessfully";		
	
	$others->ViewAllUsers();
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_user_details[$i]['mem_email']			= $db->f('mem_email');
		$arr_user_details[$i]['user_login_id']		= $db->f('user_login_id');
		$arr_user_details[$i]['mem_fname']			= $db->f('mem_fname');
		$arr_user_details[$i]['mem_lname']			= $db->f('mem_lname');
		$arr_user_details[$i]['country_name']		= $db->f('country_name');
		$arr_user_details[$i]['mem_pro_notice']		= $db->f('mem_pro_notice');
		$arr_user_details[$i]['membership_id']		= $db->f('membership_id');
		$arr_user_details[$i]['special_user']		= $db->f('special_user');
		$arr_user_details[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_user_details[$i]['user_status']		= $db->f('user_status');
		$arr_user_details[$i]['special_start_date'] = $db->f('special_user_start_date');
		$date_check = explode("-",$db->f('special_user_start_date') );
		$arr_user_details[$i]['special_end_date'] 	= date('Y-m-d', mktime(0,0,0,$date_check[1]+1,($date_check[2]),$date_check[0]) );
		$i++;
	}
	
	//print "hihih";
	$tpl->assign(array( "T_Body"				=>	'users_manage'. $config['tplEx'],
						"JavaScript"			=>  array("users.js"),
						"succMessage"			=>	$succMessage,
						"Action"				=>	$Action,
						"user_details"			=>	$arr_user_details,
						"Loop"					=>	$rscnt,
						//"Options"				=>	$others->ViewAllUsers(),
						"PageSize_List"			=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));

	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}
elseif($Action == 'View')
{
    $ret	=	$others->getUserDetails($_POST['user_auth_id']);
	
	if(($ret->mem_option) == 1)
	{
		$mem_option = "Yes";
	}
	else
	{
		$mem_option = "No";
	}
	
	if(($ret->mem_pro_notice) == 1)
	{
		$mem_pro_notice = "Notify me of all new tasks posted on Task Sonic ";
	}
	elseif(($ret->mem_pro_notice) == 2)
	{
		$mem_pro_notice = "Notify me when new tasks related to my area of interest/expertise are posted";
	}
	elseif(($ret->mem_pro_notice) == 3)
	{
		$mem_pro_notice = "Do not notify me about new tasks";
	}
	
	$cat1 = explode(",",$ret->mem_category);
	$count = count($cat1);
	$i = 0;
	foreach ($cat1 as $key=>$val)
	{
		$result[$i] = $cate->GetCatName($val);
        $i++;
	}
	$tpl->assign(array("catname"			=>	$result,
 					   "Loop"				=>	$count,
					  ));
	$totalamount = Select_wallet_sum($_POST['user_auth_id']);
	
	$tpl->assign(array("T_Body"				=>	'users_view'. $config['tplEx'],
						"JavaScript"		=>  array("users.js"),
						"Action"			=>	$Action,
						"user_login_id"		=>	$ret->user_login_id,
						"membership_id"		=>	$ret->membership_id,
						"mem_email"			=>	$ret->mem_email,
						"mem_fname"			=>	$ret->mem_fname,
						"mem_lname"			=>	$ret->mem_lname,
						"mem_city"			=>	$ret->mem_city,
						"mem_state"			=>	$ret->mem_state,
						"mem_country"		=>	$country->GetCountryName($ret->mem_country),
						"mem_organization"	=>	$ret->mem_organization,
						"mem_employes"		=>	$ret->mem_employes,
						"mem_daytime_phone"	=>	$ret->mem_daytime_phone,
						"mem_eve_phone"		=>	$ret->mem_eve_phone,
						"mem_fax_no"		=>	$ret->mem_fax_no,
						"mem_address"		=>	$ret->mem_address,
						"mem_address1"		=>	$ret->mem_address1,
						"mem_zip_code"		=>	$ret->mem_zip_code,
						"mem_website"		=>	$ret->mem_website,
						"mem_option"		=>	$mem_option,
						"mem_pro_notice"	=>	$mem_pro_notice,
						"totalamount"		=>	$totalamount,
						));

//////////////view buyer profile of user
    $prof	=	$others->getUserBuyersDetails($_POST['user_auth_id']);
	

	$tpl->assign(array(	"buyers_slogan"			=>	$prof->buyers_slogan,
						"buyers_description"	=>	wordwrap($prof->buyers_description , 120, "\n", 1),
						
						));
//////////////view seller profile of user
	$industries = "";
	if($prof->seller_industry !="")
	{
		$arr_industry	=	explode(",",$prof->seller_industry);					
		
		foreach($arr_industry as $key => $val)
		{
			$names 	=	$industry->Get_Industry_Name($val);
			$industries =	$industries.$names."<BR>";
		}
	}
	
	
	$tpl->assign(array(	"seller_slogan"			=>	$prof->seller_slogan,
						"seller_description"	=>	$prof->seller_description,
						"seller_rate_per_hour"	=>	$prof->seller_rate_per_hour,
						"seller_exp"			=>	$prof->seller_exp,
						"seller_logo"			=>	$prof->seller_logo,
						"industries"			=>	$industries,
						"Listing"				=>	$seller->Skills_Listing($_POST['user_auth_id']),
						"average_skill"			=>	$seller->Get_Avg_Skill_User($_POST['user_auth_id']),
						));
   //////////////view seller protfolio of user
    $resultset = $seller->GetSellerPortfolio($_POST['user_auth_id']);	
	
	$cnt = $db->num_rows();
	$i=0;
	
	while($db->next_record())
	{
	    $seller_portfolio[$i]['id']	   				=	$db->f('portfolio_id');
		$seller_portfolio[$i]['user_auth_id']	  	=	$db->f('user_auth_id');
		$seller_portfolio[$i]['user_name']	   		=	$db->f('user_name');
		$seller_portfolio[$i]['title']				= 	$db->f('title');
		$seller_portfolio[$i]['desc']				= 	$db->f('desc');
		$seller_portfolio[$i]['sample_file']	  	=	$db->f('sample_file');
		$seller_portfolio[$i]['industry']			=	$db->f('industry_name');
		$seller_portfolio[$i]['budget']	   		    =	$db->f('development_title');
		$seller_portfolio[$i]['time_spent']	   		=	$db->f('exe_name');
		$seller_portfolio[$i]['categories']	   		=	$db->f('categories');
		$seller_portfolio1     					    =   explode(",",$seller_portfolio[$i]['categories']);
		   
		$categories = "";
		foreach($seller_portfolio1 as $key=>$val)
	    {
			$cats = $cate->GetCatName($val);
			$categories = $categories.$cats."  ,";
		}
		$new_categories	=	substr($categories,0,-1);
		$seller_portfolio[$i]['cats']	=	$new_categories;
		$i++;
	}

	$tpl->assign(array( "Loop"					=>  $cnt,
						"sportfolio"		   	=> 	$seller_portfolio,
						"portfolio_imgpath"     =>  $virtual_path['Portfolio'],
						
					));	

	$tpl->assign(array("seller_catname"			=>	$seller_result,
					   "sellerLoop"				    =>	$seller_count,
					  ));
	  //////////////view Transcation Details
	  $result_tras = $pays->ViewAll($_POST['user_auth_id']);
	  $rscnt_tras = $db->num_rows();
	  $i=0;
		while($db->next_record())
		{
			$arr_traction[$i]['id']				= $db->f('pp_id');
			$arr_traction[$i]['user_auth_id']	= $db->f('user_auth_id');
			$arr_traction[$i]['amount']			= $db->f('amount');
			$arr_traction[$i]['description']	= $db->f('description');
			$arr_traction[$i]['trans_type']		= $db->f('trans_type');
			$arr_traction[$i]['date']			= $db->f('date');
			$i++;
		}
		$tpl->assign(array(	"trasLoop"				=>	$rscnt_tras,
							"atraction"       		=>  $arr_traction,
							));
	///////////////////withdraw
	$result_withdraw = $pays->ViewAllwithdarw($_POST['user_auth_id']);
	$rscnt_withdraw = $db->num_rows();
	$i=0;
		while($db->next_record())
		{
			$arr_withdraw[$i]['id']				= $db->f('ww_id');
			$arr_withdraw[$i]['user_auth_id']	= $db->f('user_auth_id');
			$arr_withdraw[$i]['requested_date']	= $db->f('requested_date');
			$arr_withdraw[$i]['description']	= $db->f('details');
			$arr_withdraw[$i]['withdraw_type']	= $db->f('withdraw_type');
			$arr_withdraw[$i]['amount']			= $db->f('amount');
			$arr_withdraw[$i]['trans_type']		= $db->f('trans_type');
			$arr_withdraw[$i]['status']			= $db->f('status');
			$i++;
		}
		
		$tpl->assign(array(	
							"withdrawLoop"				=>	$rscnt_withdraw,
							"awithdarw"       			=>  $arr_withdraw,
							));								
}
elseif($Action == 'Edit')
{
	
	$ret	=	$others->getUserDetails($user_ids);
	
	$totalamount = Select_wallet_sum($user_ids);
	
	$result = $cate->HomeCategory();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	$arr_cats =explode(",",$ret->mem_category);
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f('cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$i++;
	}	
	//assign to template
	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
					   "Loop_cat"				=>	$rscnt,
					   "checked_cat"		=>	$arr_cats,
				));
	
	
	
	
	$contry_list = $country->GetCountryList();
	$Country1  = fillDbCombo($contry_list,'country_id','country_name',$ret->mem_country);
	
	$tpl->assign(array("T_Body"				=>	'users_edit'. $config['tplEx'],
						"JavaScript"		=>  array("users.js"),
						"Action"			=>	$Action,
						"user_login_id"		=>	$ret->user_login_id,
						"membership_id"		=>	$ret->membership_id,
						"mem_email"			=>	$ret->mem_email,
						"mem_fname"			=>	$ret->mem_fname,
						"mem_lname"			=>	$ret->mem_lname,
						"mem_city"			=>	$ret->mem_city,
						"mem_state"			=>	$ret->mem_state,
						"Country_List"		=>	$Country1,
						"mem_organization"	=>	$ret->mem_organization,
						"mem_daytime_phone"	=>	$ret->mem_daytime_phone,
						"mem_eve_phone"		=>	$ret->mem_eve_phone,
						"mem_fax_no"		=>	$ret->mem_fax_no,
						"mem_address"		=>	$ret->mem_address,
						"mem_address1"		=>	$ret->mem_address1,
						"mem_zip_code"		=>	$ret->mem_zip_code,
						"mem_website"		=>	$ret->mem_website,
						"totalamount"		=>	$totalamount,
						"mem_emp"         	=>  fillArrayCombo($lang_arr['Employees'],$ret->mem_employes),

						"option1" 			=> ($ret->mem_pro_notice == 1) ? 'checked' : '',
						"option2"  			=> ($ret->mem_pro_notice == 2) ? 'checked' : '',
						"option3"  			=> ($ret->mem_pro_notice == 3) ? 'checked' : '',
						"chechked"			=> ($ret->mem_option == 1) ? 'checked' : '',
						"user_auth_id"		=>	$ret->user_auth_id,
						));
	#############################################################################################
	#################          Buyer's Profile    ###############################################
	#############################################################################################
	
	$prof	=	$others->getUserBuyersDetails($user_ids);
	

	$tpl->assign(array(	"buyers_slogan"			=>	$prof->buyers_slogan,
						"buyers_description"	=>	wordwrap($prof->buyers_description , 120, "\n", 1),
						
						));  
							
	#############################################################################################
	#################          Seller's Profile    ###############################################
	#############################################################################################					
	$industries = "";
	if($prof->seller_industry !="")
	{
		$arr_industry	=	explode(",",$prof->seller_industry);					
		
		foreach($arr_industry as $key => $val)
		{
			$names 	=	$industry->Get_Industry_Name($val);
			$industries =	$industries.$names."<BR>";
		}
	}
	
	$result2 = $exp->View_experience_Order();
	$Experience_List	=	fillDbCombo($result2,'year_expe_id','expe_title',$prof->seller_exp);
	
	$arr_industry = explode(",",$prof->seller_industry);
	
	$tpl->assign(array(	"seller_slogan"			=>	$prof->seller_slogan,
						"seller_description"	=>	$prof->seller_description,
						"seller_rate_per_hour"	=>	$prof->seller_rate_per_hour,
						"seller_exp"			=>	$prof->seller_exp,
						"seller_logo"			=>	$prof->seller_logo,
						"industries"			=>	$industries,
						"Listing"				=>	$seller->Skills_Listing($user_ids),
						"Experience_List"		=>	$Experience_List,
						"arr_industry"          =>  $arr_industry,
						"path"                  =>  $virtual_path['Seller_Logo'],
						"Hourly_Rates"			=>	fillArrayCombo($lang['Hourly_Rates'],$prof->seller_rate_per_hour),
						));		
	##############################################################################################
	/// get listing of industry and set in template
	##############################################################################################
    $result = $industry->View_Cat_Industry_Order();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_industry_name[$i]			= $db->f('industry_name');
		$arr_industry_id[$i]			= $db->f('industry_id');
		$i++;
	}	
	$tpl->assign(array( "industry_id"		=>	$arr_industry_id,
 					    "industry_name"   	=>	$arr_industry_name,
					    "Loop"				=>	$rscnt,
						"Skill_Level_1"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_2"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_3"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_4"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_5"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_6"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_7"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_8"	 	=>	fillArrayCombo($lang['Expertize']),
					));
	
	$seller->Get_Skills($user_ids);
	$Count	= $db->num_rows();
	$i = 1;
	while($db->next_record())
	{
		$tpl->assign(array(	
							"skill_id_".$i.""      	    =>  $db->f('skill_id'), 
							"skill_name_".$i.""         =>  $db->f('skill_name'), 
							"Skill_Level_".$i.""		=>	fillArrayCombo($lang['Expertize'],$db->f('skill_rate')),
					));		
		$i++;
				
	}				
}
elseif($Action == 'Send_Mail')
{
    $result1 = $others->getUserDetails($_POST['user_auth_id']);
	$tpl->assign(array("T_Body"				=>	'users_mail'. $config['tplEx'],
						"JavaScript"		=>  array("users.js"),
						"Action"			=>	$Action,
						"user_mail_id"      =>  $result1->mem_email,
						));
}
elseif($Action == 'MailSelected')
{
    $j = '';
    $k = '';
	$total_count = count($_POST['cat_prod']);
	foreach($_POST['cat_prod'] as $key=>$val)
	{
//		$j = $j.$val.",<br>";
		if($key == $total_count - 1)
			$j = $j.$val."";
		else
			$j = $j.$val.",";
			
			$k = $k.$val.",";
		
	}
	$new_string_2 = substr($k,0,-1);
	$tpl->assign(array(
						"T_Body"			=>	'mul_users_mail'. $config['tplEx'],
						"JavaScript"		=>  array("users.js"),
						"Action"			=>	$Action,
						"user_mail_id"      =>  $j,
						"mul_user_mail_id"  =>  $new_string_2,
						));
}
if($Action == 'Search' )
{
  	
	if($_GET['mail'] == 'true')
	    $succMessage = "Mail send sucessfully";
	elseif($_GET['del'] == 'true')
	    $succMessage = "User Delete sucessfully";
	elseif($_GET['edit'] == 'true')
	    $succMessage = "User updated sucessfully";
	
	$others->SearchUsers($_POST['search_user'],$_POST['search_email']);
	$rscnt = $db->num_rows();
	
	$i=0;
	while($db->next_record())
	{
		$arr_user_details[$i]['mem_email']			= $db->f('mem_email');
		$arr_user_details[$i]['user_login_id']		= $db->f('user_login_id');
		$arr_user_details[$i]['mem_fname']			= $db->f('mem_fname');
		$arr_user_details[$i]['mem_lname']			= $db->f('mem_lname');
		$arr_user_details[$i]['country_name']		= $db->f('country_name');
		$arr_user_details[$i]['mem_pro_notice']		= $db->f('mem_pro_notice');
		$arr_user_details[$i]['membership_id']		= $db->f('membership_id');
		$arr_user_details[$i]['special_user']		= $db->f('special_user');
		$arr_user_details[$i]['user_auth_id']		= $db->f('user_auth_id');
		$arr_user_details[$i]['user_status']		= $db->f('user_status');
		$arr_user_details[$i]['special_start_date'] = $db->f('special_user_start_date');
		$date_check = explode("-",$db->f('special_user_start_date') );
		$arr_user_details[$i]['special_end_date'] 	= date('Y-m-d', mktime(0,0,0,$date_check[1]+1,($date_check[2]),$date_check[0]) );
		$i++;
	}
	/*print "<pre>";
	print_r($arr_user_details);die;
	print "</pre>";*/
	$tpl->assign(array("T_Body"			=>	'users_manage'. $config['tplEx'],
						"JavaScript"	=>  array("users.js"),
						"succMessage"	=>	$succMessage,
						"Action"		=>	$Action,
						"User_Search"   =>  $_POST['search_user'],
					//	"Options"		=>	$others->SearchUsers($_POST['search_user']),
						"user_details"	=>	$arr_user_details,
						"Loop"			=>	$rscnt,
						"PageSize_List"	=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));


	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
}
$tpl->display('default_layout'. $config['tplEx']);
?>