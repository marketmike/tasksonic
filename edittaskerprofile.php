<?php
define('IN_SITE', 	true);
define('IN_USER',	true);
// including related database and language files
include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/edittaskerprofile.php');
include_once($physical_path['DB_Access']. 'Seller.php');
include_once($physical_path['DB_Access']. 'Industry.php');
include_once($physical_path['DB_Access']. 'Experience.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

// creating objects
$seller 		= new Seller();
$industry		= new Industry();
$exp			= new Experience();

if($Action == 'Edit')
	{
	
	$ERROR = "";
	if(isset($_POST["en_seller_slogan"]) && trim($_POST["en_seller_slogan"]) == "")
	{
		$ERROR .=  "- " . $lang["Err_Slogan"] . "<br>";
	}
	if($_FILES['company_logo']['name'] != '')
	{
		if(!$user->checkFileType($_FILES['company_logo']['name']))
		{
			$ERROR .=  "- " . $lang["Err_Check_File_Type"]  . "<br>";
		}
	}
	$var = count($_POST['industry_id']);
	if($var == 0)
	{
		$ERROR .=  "- " . $lang["JS_Indus"] . "<br>";
	}
	if($var > 5)
	{
		$ERROR .=  "- " . $lang["JS_Cate"] . "<br>";
	}

	if(isset($_POST["skill_name_1"]) && trim($_POST["skill_name_1"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Skill_1"] . "<br>";
	}
	if($_POST['skill_rate_1'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"]  . "<br>";
	}
	if(isset($_POST["skill_name_2"]) && trim($_POST["skill_name_2"]) == "")
	{
		$ERROR .=  "- " . $lang["JS_Skill_1"] . "<br>";
	}
	if($_POST['skill_rate_2'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"]  . "<br>";
	}
	if($_POST["skill_name_3"] != "" && $_POST['skill_rate_3'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"] . "<br>";
	}
	if($_POST["skill_name_4"] != "" && $_POST['skill_rate_3'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"] . "<br>";
	}
	if($_POST["skill_name_5"] != "" && $_POST['skill_rate_3'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"] . "<br>";
	}
	if($_POST["skill_name_6"] != "" && $_POST['skill_rate_3'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"] . "<br>";
	}
	if($_POST["skill_name_7"] != "" && $_POST['skill_rate_3'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"] . "<br>";
	}
	if($_POST["skill_name_8"] != "" && $_POST['skill_rate_3'] == 0)
	{
		$ERROR .=  "- " . $lang["JS_Skill_Rate_1"] . "<br>";
	}
	
	if($ERROR == "")
	{
	
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_1"],$_POST["skill_name_1"],$_POST["skill_rate_1"]);	// insert or update skill in table for user
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_2"],$_POST["skill_name_2"],$_POST["skill_rate_2"]);	// insert or update skill in table for user
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_3"],$_POST["skill_name_3"],$_POST["skill_rate_3"]);	// insert or update skill in table for user
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_4"],$_POST["skill_name_4"],$_POST["skill_rate_4"]);	// insert or update skill in table for user
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_5"],$_POST["skill_name_5"],$_POST["skill_rate_5"]);	// insert or update skill in table for user
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_6"],$_POST["skill_name_6"],$_POST["skill_rate_6"]);	// insert or update skill in table for user
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_7"],$_POST["skill_name_7"],$_POST["skill_rate_7"]);	// insert or update skill in table for user
		$seller->Skills_Master($_SESSION['User_Id'],$_POST["skill_id_8"],$_POST["skill_name_8"],$_POST["skill_rate_8"]);	// insert or update skill in table for user
	 
		$sellerdetails = $seller->GetsellerDetails($_SESSION['User_Id']);
		
		if($sellerdetails == 1)
		{
			
			##############################################################################################
			///insert process
			##############################################################################################
			
			##############################################################################################
			///file uploading
			##############################################################################################
		   if($_FILES['company_logo']['name'] != '')
			{
				$ERROR = "";
				if($_FILES['company_logo']['size'] > 10485756 )
				 {
					
					 $ERROR = $ERROR."You can't upload file more than 1 MB Size";
					 $Action = A_VIEW;
				 }
				else
				 { 
				  	
					$logo = fileUpload($_FILES['company_logo'],SELLER);
					   
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
				   
				   $en_seller_slogan 	   	= badWordDetect($_POST['en_seller_slogan']);		// to avoid some banned word from posted text
				   $en_seller_description  	= badWordDetect($_POST['en_seller_description']); 		// to avoid some banned word from posted text
				   
				   $mother_lang				= badWordDetect($_POST['mother_lang']);		// to avoid some banned word from posted text
				   $lang_pairs  			= badWordDetect($_POST['lang_pairs']); 			// to avoid some banned word from posted text
				   
				   $seller->Insert($_POST,$logo,$en_seller_slogan,$en_seller_description,$lang_pairs,$lang_pairs);
				   
				   
				   if( $_SESSION['Member_As_Seller'] == 1)		
					{
						header('location: welcome.html');
						exit();
					}
				   else
					{
						header('location: my-account.html?profile=change');
						exit();
					}	
				##############################################################################################
				 }
			}	
		   
		}
		elseif($sellerdetails == 0)
		{
			##############################################################################################
			/// update process
			##############################################################################################
			 
			##############################################################################################
			/// if file is not changed 
			##############################################################################################
		   if($_FILES['company_logo']['name'] == '')
			{
				$en_seller_slogan 	 	 	= badWordDetect($_POST['en_seller_slogan']);		// to avoid some banned word from posted text
				$en_seller_description   	= badWordDetect($_POST['en_seller_description']); 		// to avoid some banned word from posted text
				
				$mother_lang				= badWordDetect($_POST['mother_lang']);		// to avoid some banned word from posted text
				$lang_pairs 	 			= badWordDetect($_POST['lang_pairs']); 			// to avoid some banned word from posted text
				
				$rest = $seller->Update($_POST,$_POST['img'],$en_seller_slogan,$en_seller_description,$mother_lang,$lang_pairs); 
		
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
					 
					 $en_seller_slogan 	 	 = badWordDetect($_POST['en_seller_slogan']);		// to avoid some banned word from posted text
					 $en_seller_description  = badWordDetect($_POST['en_seller_description']); 		// to avoid some banned word from posted text
					 
					 $mother_lang				= badWordDetect($_POST['mother_lang']);		// to avoid some banned word from posted text
					 $lang_pairs 	 			= badWordDetect($_POST['lang_pairs']); 			// to avoid some banned word from posted text
				
					 $rest = $seller->Update($_POST,$logo,$en_seller_slogan,$en_seller_description,$mother_lang,$lang_pairs); 
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
					
				}	
				
			}
			if( $_SESSION['Member_As_Seller'] == 1)		
			{
				header('location: my-account.html');
				exit();
			}
			else
			{
				header('location: my-account.html?profile=change');
				exit();
			}	
		}
	}	
	else
	{
		$Action = A_VIEW;
	}	 
}

elseif($Action == 'Delete')
{
##############################################################################################
///remove image from his physical path and update in table
##############################################################################################
     	$n2 = @unlink($physical_path['Seller_Logo'].$_POST['img']);
		$n2 = @unlink($physical_path['Seller_Logo']."thumb_".$_POST['img']);
		$seller->UpdateImage($_POST);
		 $Action = A_VIEW;
##############################################################################################
}

if($Action == ''|| $Action == A_VIEW)
{
    $result = $seller->GetSellerDetails1($_SESSION['User_Id']); 	// to get data of user
	
##############################################################################################
///get experience list in array and set it to combo box
##############################################################################################
	$result2 = $exp->View_experience_Order();
	$Experience_List	=	fillDbCombo($result2,'year_expe_id','expe_title',$result->seller_exp);
##############################################################################################
	
	$arr_industry = explode(",",$result->seller_industry);
	
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"				=>	'edittaskerprofile'. $config['tplEx'],
						"JavaScript"			=>  array("edittaskerprofile.js"),
						"lang"					=>	$lang,
						"TOP_TITLE"             =>  strtoupper($lang['Title_Edit_Profile']),
						"Site_Title"			=>	$config[WC_SITE_TITLE]." - ".$lang['Title_Edit_Profile'],
						"Action"				=>  "Edit",
						"Experience_List"		=>	$Experience_List,
					    "en_seller_slogan"   	=>	$result->seller_slogan,
						"en_seller_description" =>	$result->seller_description,
						"Hourly_Rates"			=>	fillArrayCombo($lang['Hourly_Rates'],$result->seller_rate_per_hour),
						"seller_logo"           =>  $result->seller_logo,
						"arr_industry"          =>  $arr_industry,
						"mother_lang"   		=>	$result->mother_lang,
						"lang_pairs"   			=>	$result->lang_pairs,
						"checked"   			=>	($result->medic == 1)?'checked':'',
						"div_checked"  			=>	($result->medic == 1)?'visible':'hidden',
						"div_checked_2"  		=>	($result->medic == 1)?'block':'none',
						"ERROR"                 =>  $ERROR, 
						"path"                  =>  $virtual_path['Seller_Logo'],
						"navigation"		 	=> '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>',
						"navigation1"		  	=> '<label class=navigation>'.$lang['Edit_Seller'].'</label>',
					));
		
		
##############################################################################################
					

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
##############################################################################################
	// assign to template
	$tpl->assign(array( "industry_id"		=>	$arr_industry_id,
 					    "industry_name"   	=>	$arr_industry_name,
					    "Loop"				=>	$rscnt,
 					    "User_Id"           =>  $_SESSION['User_Id'],
						"Skill_Level_1"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_2"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_3"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_4"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_5"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_6"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_7"	 	=>	fillArrayCombo($lang['Expertize']),
						"Skill_Level_8"	 	=>	fillArrayCombo($lang['Expertize']),
					));

##############################################################################################
/// get listing of industry and set in template
##############################################################################################
	$seller->Get_Skills($_SESSION['User_Id']);
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
##############################################################################################
$tpl->display('default_layout'. $config['tplEx']);
?>