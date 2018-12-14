<?php
define('IN_SITE', 	true);
include_once("includes/common.php");
$referrer = $_GET['ref'];

if($_POST['user_id'] == '' || $_POST['password'] == ''){ // validation

			if ($referrer)
			{						
			$new_str =	$referrer;						
			}
			else
			{
			$new_str = 'home.html';

			}		
		$_SESSION['login_error'] = 4; 			
		header("location: ".$new_str);	
		exit();	
}

if($_POST['Submit'] == $lang['Login'])
{
    $check_user = $user->Check_User_ID($_POST['user_id']);
	
	if($check_user == 0) // if valid user id
	 {
			$res = $user->Get_Password($_POST['user_id']);
			
			if($res->user_status == 1)
			{ 
				if( $user->IsValidLogin($_POST['user_id'],$_POST['password'],1) )
				{
					$is_verfied = $user->is_verfied($_POST['user_id']); // now check if user has been verified
					$is_first_logon = $user->is_first_logon($_POST['user_id']); // now check if this is the users first time logging in which will check to see if value is 1 and return 1 if it is
				
							if( $is_verfied == 0 )
							{
								$_SESSION['login_error']='';
								$user->Destroy();
								header("location: verify.html");
								exit();
								
							}elseif($is_first_logon == 1){
								
								$_SESSION['login_error']='';
								header("location: welcome.html");
								exit();					
								
							}else{

								if(strpos($_SERVER['HTTP_REFERER'],"login_error=true") > 0)
								{
									$pos = strpos($_SERVER['HTTP_REFERER'],"login_error=true");
									$new_str = substr_replace($_SERVER['HTTP_REFERER'], '', ($pos - 1));
								}
								elseif ($referrer)
								{						
								$new_str =	$referrer;						
								}
								else
								{
								$new_str = 'home.html';
									
								}
							$_SESSION['login_error']='';
							header("location: ".$new_str);	
							exit();
								
					} // end if verified
					
				}
				else
				{
					## USERNAME AND PASSWORD COMBINATION ARE INCORRECT
					if ($referrer)
					{						
					$new_str =	$referrer;						
					}
					else
					{
					$new_str = 'home.html';

					}
					$_SESSION['login_error'] = 3; 			

					header("location: ".$new_str);	
					exit();	
				}
			}else{ 

				## USERNAME IS SET TO INACTIVE - STATUS 0
					if ($referrer)
					{						
					$new_str =	$referrer;						
					}
					else
					{
					$new_str = 'home.html';

					}

				$_SESSION['login_error'] = 2; 			

				header("location: ".$new_str);	
				exit();			

			}
	 }
	else
	 {
		## USERNAME DOES NOT EXIST
		if ($referrer)
		{						
		$new_str =	$referrer;						
		}
		else
		{
		$new_str = 'home.html';

		}

		$_SESSION['login_error'] = 1; 			

		header("location: ".$new_str);	
		exit();
	 } 			
}
$tpl->display('default_layout'. $config['tplEx']);
?>