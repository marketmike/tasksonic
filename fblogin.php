<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
include_once("fblib/facebook.php");
$referrer = $_GET['ref'];
//facebook process
// Create our Application instance.
$facebook = new Facebook(array(
  'appId' => $fb_app_id,
  'secret' => $fb_app_secret,
  'cookie' => true,
));
$fbid = $facebook->getUser();
$me = null;
// We may or may not have this data based 
// on whether the user is logged in.
// If we have a $user id here, it means we know 
// the user is logged into
// Facebook, but we don’t know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($fbid) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $fbid = null;
  }
}

$fbid;
$fbemail = $user_profile['email'];

if($fbid){
	$check_fbid = $user->Check_FB_ID($fbid);
	$check_fbemail = $user->Check_fbEmail($fbemail);
	if($check_fbid == 0){

		$user->IsValidFBLogin($fbid);
		if ($referrer)
		{
		$new_str = $referrer;
		}else{
		$new_str = "index.php";
		}
		
		header("location: ".$new_str);
		die();
		
	}elseif($check_fbemail == 0){
	
		$AssociateFBLogin = $user->AssociateFBLogin($fbemail, $fbid);

		if ($referrer)
		{
		$new_str = $referrer;
		}else{
		$new_str = "index.php";
		}
		
		header("location: ".$new_str);
		die();		
	
	}else{
		$new_str = "signup.php?facebook=register";
		header("location: ".$new_str);
		die();	
	}
}

$tpl->display('default_layout'. $config['tplEx']);
?>