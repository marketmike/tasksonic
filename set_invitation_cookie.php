<?php
$invitation_id = strval($_GET['invitation_id']);
$active_invites = cookieget('invitation', $default='');	

if ($active_invites == '' && $invitation_id != '') {
		cookie_invite($invitation_id);
	    header("location: signup.php");	
		exit();
}
?>