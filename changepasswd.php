<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/changepasswd.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

##############################################################################################
//	Change Password into database
##############################################################################################
if($Action == 'ChangePass' && $_POST['Sumbit'] = $lang['Button_password'])
{

	if(strlen(trim($_POST["old_password"])) < 8)
	{
		$errMsg .=  "- Please enter your current password, must be 8-16 characters.<br>";
	}

	if(strlen(trim($_POST["new_password1"])) < 8 || strlen(trim($_POST["new_password1"])) > 16)
	{
		$errMsg .=  "- Your new password must be between 8 and 16 characters.<br>";
	}
	if(strlen(trim($_POST["new_password1"])) >= 8 || strlen(trim($_POST["new_password1"])) >= 16)
	{	
		if (preg_match("/^[a-zA-Z0-9_?+$!#~|]{8,16}$/", $_POST['new_password1'])) {
			$errMsg .=  "";
		} else {
			$errMsg .=  "- Your password contains illegal characters!<br />Only letters A-Z, numbers 0-9 and the following special characters are allowed _ ? + $ ! # ~ |<br>";
		}
	}
	if ($_POST['new_password1'] != $_POST['new_password2'])
	{
		$errMsg .=  "- Your new password does not match the repeated password.";
	}
	if($errMsg == "")
	{
		   if($user->UpdatePassUser($_SESSION['User_Id'],$_POST['old_password'],$_POST['new_password1']))
			{
				header('location: update-password.html?update=true');
				exit();
			}
			else
			{
				header('location: update-password.html?update=false');
				exit();
			}
	}else{
		$Action = ViewAll;
	}
}
##############################################################################################

if($Action == 'ViewAll')
{

	if($_GET['update'] == 'true')
		$succMsg='Password has been changed successfully.';
	else if($_GET['update'] == 'false')
		$errMsg='Please check your old password.';

##############################################################################################
/// assing templates and javascript with related varibles according to template
/// get detail of user from session id
##############################################################################################
	$result = $user->UserInfo($_SESSION['User_Id']);

	$tpl->assign(array("T_Body"					=>	'changepasswd'. $config['tplEx'],
						"JavaScript"			=>  array("changepasswd.js"),
						"A_Action"				=>	"changepasswd.php",
						"Action"				=>	'ChangePass',
						"sucmsg"				=>	$succMsg,
						"old_pass"				=>	$result->user_passwd,
						"User_Id"				=>	$_SESSION['User_Id'],
						"ERROR"	        		=>	$errMsg,
						"lang"					=>  $lang,
						"tab"					=>	4,
						"navigation"			=>	$navigation,
						"navigation1"			=>	$navigation1,
						"navigation2"			=>	$navigation2,
					));
			
}
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>