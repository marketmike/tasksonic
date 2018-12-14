<?php
define('IN_SITE', 	true);
$fbconnect = '';
$fbconnect = $_GET['facebook'];
include_once("includes/common.php");
include_once($physical_path['DB_Access']. 'Country.php');
include_once($physical_path['DB_Access']. 'Category.php');
include_once($physical_path['DB_Access']. 'Email.php');
include_once($physical_path['Site_Lang']. 'signup.php');
include_once($physical_path['DB_Access'].'Page.php');

$fbid = '';
$fbemail = '';
$first_name = '';
$last_name = '';
//$location = '';
$username = '';
if ($fbconnect == register) {
include_once("fblib/facebook.php");
//facebook process
// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => $fb_app_id,
  'secret' => $fb_app_secret,
  'cookie' => true,
));
$session = $facebook->getUser();
$me = null;
// Session based API call.
if ($session) {
  try {
    $uid = $facebook->getUser();
    $me = $facebook->api('/me');	
  } catch (FacebookApiException $e) {
    error_log($e);	
  }
}
$fbid = $me['id'];
$fbemail = $me['email'];
$first_name = $me['first_name'];
$last_name = $me['last_name'];
$location = $me['location']['name'];
$username = $me['username'];
}
//End facebook process

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$country1 	= new Country();
$state 	= new State();
$city 	= new City();
$cats 		= new Category();
$emails 	= new Email();
$page = new Page();

if($Action == "Signup")
{
	$ERROR = "";
	
	//Check if User Id is Empty or Not
	if(isset($_POST["user_id"]) && trim($_POST["user_id"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_User_ID"] . "<br>";
	}
	
	//Check if User Login Id contains Maximum 16 characters or not
	//Check if User Login Id contains Minimum 3 characters or not
	if(strlen(trim($_POST["user_id"])) < 3 || strlen(trim($_POST["user_id"])) > 16)
	{
		$ERROR .=  "- " . $lang["JS_Check_User_Login"] . "<br>";
	}
	
	//Check if User ID is not start form no...
	if($user->checkUserName_No(trim($_POST["user_id"])))
	{
		$ERROR .= "- " . $lang["JS_Check_User_Lenght"] . "<br>";
	}
	
	//Check if User Id is Valid or Not
	if(!$user->checkUserName(trim(strtolower($_POST["user_id"]))))
	{
		$ERROR .= "- " . $lang["JS_Check_Special_Cha"] . "<br>";
	}
	//Check if User Login Id is Unique or Not
	if(!$user->Check_User_Exist(trim($_POST["user_id"])))
	{
		$ERROR .= "- " . $lang["User_ID_Not_Available"] . "<br>";
	}
	
	//Check if Password is Empty or Not
	if(isset($_POST["password"]) && trim($_POST["password"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Passwd"] . "<br>";
	}
	//Check if Password Retype is Empty or Not
	if(isset($_POST["password_retype"]) && trim($_POST["password_retype"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Re_Passwd"] . "<br>";
	}
	
	//Check if Compair Password & Password Retype r same or not??
	if($_POST["password"] != $_POST["password_retype"])
	{
		$ERROR .=  "- " . $lang["JS_Confirm"] . "<br>";
	}
	if (preg_match("/^[a-zA-Z0-9_?+$!#~|]{8,16}$/", $_POST["password"])) {
		
	} else {
		$ERROR .=  "- Your password contains illegal characters! Only letters A-Z, numbers 0-9 and the following special characters are allowed _ ? + $ ! # ~ |<br>";
	}	
	//Check if First Name is Empty or Not
	if(isset($_POST["mem_fname"]) && trim($_POST["mem_fname"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Fname"] . "<br>";
	}
	
	//Check if Last Name is Empty or Not
	if(isset($_POST["mem_lname"]) && trim($_POST["mem_lname"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Lname"] . "<br>";
	}

	//Check if Phone is Empty or Not
	if(isset($_POST["mem_phone"]) && trim($_POST["mem_phone"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Phone"] . "<br>";
	}

	//Check if Address is Empty or Not
	if(isset($_POST["mem_address"]) && trim($_POST["mem_address"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Address"] . "<br>";
	}
	
	//Check if City is Empty or Not
	if(isset($_POST["mem_city"]) && trim($_POST["mem_city"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_City"] . "<br>";
	}
	
	//Check if Zipcode is Empty or Not
	if(isset($_POST["mem_zipcode"]) && trim($_POST["mem_zipcode"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Zipcode"] . "<br>";
	}
	//Check if Country is selected or Not
	if($_POST["mem_country"] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Country"] . "<br>";
	}
	
		//Check if User Email is Empty or Not
	if(isset($_POST["mem_email"]) && trim($_POST["mem_email"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Mail"] . "<br>";
	}
	//Check if User Email  is Valid or Not
	elseif(!$user->checkUserEmail(trim($_POST["mem_email"])))
	{
		$ERROR .= "- " . $lang["JS_Valid_Mail"] . "<br>";
	}
	
	//Check  if user email is already exists or not
	if(!$user->Check_Email_ID(trim($_POST['mem_email'])) == true)
	{
		$ERROR .= "- " . $lang["JS_Taken_Mail"] . "<br>";
	}
	if($ERROR == "")
	{
	
		$verify_code = getActivationCode();
		global $mail2;
		$mail2 = '';
		$mail2 = new htmlMimeMail();
		
		$tpl2 = new Smarty;
		$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';
		
		$sendinfo = $emails->GetEmailDetails1(EMAIL_SIGNUP);
		$mail2->setFrom($sendinfo->email_adress);
		$mail2->setSubject($sendinfo->email_subject);
		$tpl2->assign(array("user_id"				=>	$_POST['user_id'],
							"password"				=>  $_POST['password'],
							"email_id"				=>  $_POST['mem_email'],
							"verify_url"          	=>	"<a href=".$virtual_path['Site_Root']."verify.php?user_id=".$_POST['user_id']."&code=".$verify_code.">" . $virtual_path['Site_Root']."verify.php?user_id=".$_POST['user_id']."&code=".$verify_code . "</a>",
							"verification_code"     =>  $verify_code,
							"site_link"    			=>  "<a href=".$virtual_path['Site_Root'].">Login</a>",							
							));
							
			$mail_content_reg = $tpl2->fetch("email_template:".EMAIL_SIGNUP);	
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
                
		$result = $mail2->send(array($_POST['mem_email']));

		$user_name = $_POST['user_id'];
		
		$user->Signup($_POST,$verify_code,$user_name);
		

		if ($_POST['fbid'] == '') { // If not a facebook user we redirect to verification page
		
			header("location: verify.php?verify=next");
			exit();
			
		}else{ // If facebook user we will skip verification since facebook emails are already verified
		
		$user->IsValidLogin($user_name,$_POST['password'],1); /// only execute if facebook
		
		$_SESSION['Member_As_Buyer'] = $_POST['check_buyer'];
		$_SESSION['Member_As_Seller'] = $_POST['check_seller'];
		
		// if user is not as buyer or seller
		if($_SESSION['Member_As_Buyer'] != 1 && $_SESSION['Member_As_Seller'] != 1)
		{
			header("location: welcome.html");
			exit();
		}
		// if user is as buyer & not as seller
		if($_SESSION['Member_As_Buyer'] == 1 && $_SESSION['Member_As_Seller'] != 1)
		{
			header("location: edit-task-owner-profile.html");
			exit();
		}
		// if user is as seller & not as buyer
		if($_SESSION['Member_As_Buyer'] != 1 && $_SESSION['Member_As_Seller'] == 1)
		{
			header("location: edit-tasker-profile.html");
			exit();
		}
		// if user is as seller & as buyer
		if($_SESSION['Member_As_Buyer'] == 1 && $_SESSION['Member_As_Seller'] == 1)
		{
			header("location: edit-task-owner-profile.html");
			exit();
		}
	} // End if Not $fbid	
		
	}	
	else
	{
		$Action = A_VIEW;
	}
}
if($_GET['Checking'] == 'CheckID')
{
	$user->Check_User_ID($_GET['check']);
	if($db->num_rows() == 0)
		$response = $lang['User_ID_Available'];
	if($db->num_rows() == 1)
		$response = $lang['User_ID_Not_Available'];
	print $response;die;
}
elseif($_GET['Checking'] == 'CheckEmail')
{
	$result = $user->Check_Email_ID($_GET['check']);
	if($result == 1)
		$response = $lang['JS_Not_Taken_Mail'];
	if($result == 0)
		$response = $lang['JS_Taken_Mail'];
	print $response;die;
}



$user->Destroy();



if($Action == ''|| $Action == A_VIEW)
{

	$contry_list = $country1->GetCountryList();
	$Country	 = fillDbCombo($contry_list,'country_id','country_name');
	$state_list = $state->GetStateList();
	$state	 = fillDbCombo($state_list,'state_id','state_name');
	$city_list = $city->GetCityList();
	$city	 = fillDbCombo($city_list,'city_name','city_name');	
	$content = $page->getPage(2);	
	
	$tpl->assign(array( "T_Body"			=>	'signup'. $config['tplEx'],
						"JavaScript"		=>	array('signup.js',"check.js"),
						"lang"				=>	$lang,	
						"Country_List"		=>	$Country,
						"State_List"		=>	$state,
						"City_List"			=>	$city,							
						"msg"				=>	$msg,
						"ERROR"				=>  $ERROR,
						"checked"			=>	"checked",
						"aff"				=>  $_GET['aff'],
						"terms"             =>  $content->page_content,
						"tab"				=>	4,
						"navigation"		=>	'<label class=navigation>'.$lang['Sign_Up'].'</label>',
						"marketing_content"	=>	$home_content->home_content,
						"nav_select"		=>	'join',
						"fbid"				=>	$fbid,
						"fbemail"			=>	$fbemail,
						"first_name"		=>	$first_name,
						"last_name"			=>	$last_name,
						"username"			=>	$username,
						"fbconnect"			=>	$fbconnect,
						"location"			=>	$location,
						"invitation_id"		=>	$active_invites,					
						
				));
	
	$result = $cats->HomeCategory();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	$arr_cats =explode(",",$mem_category);
	
	while($db->next_record())
	{
		$arr_cat_name[$i]			= $db->f('cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$i++;
	}	
	
	$tpl->assign(array("catid"			    =>	$arr_cat_id,
					   "catname"   			=>	$arr_cat_name,
					   "Loop"				=>	$rscnt,
					   "checked_cat"		=>	$arr_cats,
					));
}
$tpl->display('default_layout'. $config['tplEx']);
?>