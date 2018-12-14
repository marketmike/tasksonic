<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/edittask_ownerprofile.php');
include_once($physical_path['DB_Access']. 'Buyers.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');
// creating objects
$buyer = new Buyers();


if($Action == 'Edit')
{
   	$byuerid = $buyer->GetBuyerDetails($_POST['User_Id']);		// to check wheather to insert or update

##############################################################################################
/// insert data
##############################################################################################
	if($byuerid == 1)
	{
  	  	$ERROR = "";
		//Check if Deposit value is Empty or Not
		if(isset($_POST["en_buyers_slogan"]) && trim($_POST["en_buyers_slogan"]) == "")
		{
			$ERROR .=  "- " . $lang["Err_Empty_Slogan"] . "<br>";
		}

		if($_FILES['company_logo']['name'] != '')
		{
			if(!$user->checkFileType($_FILES['company_logo']['name']))
			{
				$ERROR .=  "- " . $lang["Err_Check_File_Type"]  . "<br>";
			}
		}		
		
		//Check if Deposit value length is proper or not
		if(isset($_POST["en_buyers_description"]) && trim($_POST["en_buyers_description"]) == "")
		{
			$ERROR .=  "- " . $lang["Err_Empty_Description"] . "<br>";
		}
		
	   	if($ERROR == "")
		{
			##############################################################################################
			///file uploading
			##############################################################################################
		   if($_FILES['company_logo']['name'] != '')
			{
				$ERROR = "";
				if($_FILES['company_logo']['size'] > 10485756 )
				 {
					
					 $ERROR = $ERROR."You can't upload file more than 1 MB Size";
					 $Action = ViewAll;
				 }
				else
				 { 
				  	
					$logo = fileUpload($_FILES['company_logo'],BUYER);
					   
					$size=getimagesize($physical_path['Seller_Logo'].$logo);
					
					##############################################################################################
					/// generating image thumb with aspect ration
					##############################################################################################
					$w=$size[0];
					$h=$size[1];
					if ($w > $h)
						{
							$ratio = $w / $h;  
							$nw = 200/*$config['disp_snap_width']*/; 
							$nh = ($nw / $ratio)+50;
						} 
					else 
						{
							$ratio = $h / $w; 
							$nh = 200 /*$config['disp_snap_height']*/; 
							$nw = $nh / $ratio+50;
						}	
					$thumb->image($physical_path['Seller_Logo'].$logo);
					$thumb->size_fix($nw,$nh);
					$filename = $thumb->get();				
					##############################################################################################
				
					##############################################################################################		
				}
			}
	   		$en_buyers_slogan 	   = badWordDetect($_POST['en_buyers_slogan']);				// to avoid some banned word from posted text
	   		$en_buyers_description  = badWordDetect($_POST['en_buyers_description']);		// to avoid some banned word from posted text
			
			$buyer->Insert($_POST,$logo,$en_buyers_slogan,$en_buyers_description);
			
			if($_SESSION['Member_As_Buyer'] == 1 && $_SESSION['Member_As_Seller'] != 1)		
			{
				header('location: welcome.html');
				exit();
			}
			elseif($_SESSION['Member_As_Buyer'] == 1 && $_SESSION['Member_As_Seller'] == 1)		
			{
				header('location: edit-tasker-profile.html');
				exit();
			}
			else
			{
				header('location: account.php?profile=change');
				exit();
			}	
		}
		else
		{
			$Action = 'ViewAll';
		}	
	}
##############################################################################################

##############################################################################################
/// edit data
##############################################################################################
	elseif($buyerid == 0)
	{
	   	$ERROR = "";
		//Check if Deposit value is Empty or Not
		if(isset($_POST["en_buyers_slogan"]) && trim($_POST["en_buyers_slogan"]) == "")
		{
			$ERROR .=  "- " . $lang["Err_Empty_Slogan"] . "<br>";
		}
	
		//Check if Deposit value length is proper or not
		if(isset($_POST["en_buyers_description"]) && trim($_POST["en_buyers_description"]) == "")
		{
			$ERROR .=  "- " . $lang["Err_Empty_Description"] . "<br>";
		}
	  	#print $ERROR;die;
		if($ERROR == "")
		{
		
			##############################################################################################
			/// if file is not changed 
			##############################################################################################
		   if($_FILES['company_logo']['name'] == '')
			{
				$en_buyers_slogan 	   = badWordDetect($_POST['en_buyers_slogan']);				// to avoid some banned word from posted text
				$en_buyers_description  = badWordDetect($_POST['en_buyers_description']);		// to avoid some banned word from posted text
		   
				$rest = $buyer->Update($_POST,$logo,$en_buyers_slogan,$en_buyers_description);
			
				header('location: account.php?profile=change');
				exit();			
			}
			##############################################################################################
		
			##############################################################################################
			/// if file is changed 
			##############################################################################################
		   else
			{
			   
				$ERROR = "";
				if($_FILES['company_logo']['size'] > 10485756 )
				 {
					// print "Hi";   die;
					 $ERROR = "You can't upload 1st file more than 1 MB Size";
					 $Action = A_VIEW;
				 }
				 else
				 {
				
					##############################################################################################
					/// remove old files and upload and update table with new
					##############################################################################################
					 $n1 = @unlink($physical_path['Seller_Logo'].$_POST['img']);
					 $n1 = @unlink($physical_path['Seller_Logo']."thumb_".$_POST['img']);
					 $logo = fileUpload($_FILES['company_logo'],SELLER);
					 
					##############################################################################################
					 
					$en_buyers_slogan 	   = badWordDetect($_POST['en_buyers_slogan']);				// to avoid some banned word from posted text
					$en_buyers_description  = badWordDetect($_POST['en_buyers_description']);		// to avoid some banned word from posted text
		   

					 $rest = $buyer->Update($_POST,$logo,$en_buyers_slogan,$en_buyers_description); 
					##############################################################################################
					/// generating image thumb with aspect ration
					##############################################################################################
					 $size=getimagesize($physical_path['Seller_Logo'].$logo);
					 $w=$size[0];
					 $h=$size[1];
					 if ($w > $h)
						{
							$ratio = $w / $h;  
							$nw = 200/*$config['disp_snap_width']*/; 
							$nh = ($nw / $ratio)+50;
						} 
					 else 
						{
							$ratio = $h / $w; 
							$nh = 200 /*$config['disp_snap_height']*/; 
							$nw = $nh / $ratio+50;
						}	
					$thumb->image($physical_path['Seller_Logo'].$logo);
					$thumb->size_fix($nw,$nh);
					$filename = $thumb->get();						
					##############################################################################################
					
				header('location: account.php?profile=change');
				exit();
					
				}	
				
			}			
		}
		else
		{
			$Action = 'ViewAll';
		}
	}	
}elseif($Action == 'Delete')
{
##############################################################################################
///remove image from his physical path and update in table
##############################################################################################
     	$n2 = @unlink($physical_path['Seller_Logo'].$_POST['img']);
		$n2 = @unlink($physical_path['Seller_Logo']."thumb_".$_POST['img']);
		$buyer->UpdateImage($_POST);
		$Action = ViewAll;
##############################################################################################
}


if($Action == 'ViewAll')
{
	$result1 = $buyer->GetDetail($_SESSION['User_Id']);		// to get data
	
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"				=>	'edittask_ownerprofile'. $config['tplEx'],
						"JavaScript"			=>  array("edittask_ownerprofile.js"),
						"lang"					=>  $lang,
						"seller_logo"           =>  $result1->seller_logo,
						"Action"				=>  "Edit",
						"ERROR"					=>  $ERROR,
						"User_Id"				=>	$_SESSION['User_Id'],
						"en_buyers_slogan" 		=>  $result1->buyers_slogan, 
						"en_buyers_description" =>  $result1->buyers_description,
						"tab"					=>	4,
						"path"                  =>  $virtual_path['Seller_Logo'],
						"navigation"		  	=> '<a href=account.php class=footerlink>'.$lang['Buyer'].'</a>',
						"navigation1"		  	=> '<label class=navigation>'.$lang['Ln_En'].'</label>',
					));
					
$tpl->assign(array( "Site_Title"		=>	$config[WC_SITE_TITLE]." - ".$lang['TOP_TITLE'],
				 ));
}
$tpl->display('default_layout'. $config['tplEx']);    // assign to layout template
?>