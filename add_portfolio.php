<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/add_portfolio.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');
include_once($physical_path['DB_Access']. 'Industry.php');
include_once($physical_path['DB_Access']. 'Development.php');
include_once($physical_path['DB_Access']. 'Execution_Time.php');
include_once($physical_path['DB_Access']. 'Category.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

$industry 		= new Industry();
$development 	= new Development();
$exe_time 		= new Execution_Time();
$cats 			= new Category();
$portfolio 		= new Portfolio();


# Save tha data
if($_POST['Submit'] == $lang['Save_Portfolio'] && $Action == 'Add')
{  
  // print_r($_POST)."<br>";
   if($_FILES['sample_file']['name'] != '')
		{
		    $ERROR = "";
		    if($_FILES['sample_file']['size'] > 1048576 )
			{
			   $ERROR = "You can't upload file more than 1 MB Size";
			   $Action = A_VIEW;
			}
		    else
			{
				$portfolio_image = fileUpload($_FILES['sample_file'],PORTFOLIO);
				
				$size=getimagesize($physical_path['Portfolio'].$portfolio_image);
				
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
					
					$thumb->image($physical_path['Portfolio'].$portfolio_image);
					
					$thumb->size_fix($nw,$nh);
					$filename = $thumb->get();

					$en_seller_title 	   = badWordDetect($_POST['en_seller_title']);
					$en_seller_description  = badWordDetect($_POST['en_seller_description']);
						
					$portfolio->Insert($_POST,$portfolio_image,$_SESSION['User_Id'],$_SESSION['User_Name'],$en_seller_title,$en_seller_description);
					
					header("location: manage_portfolio.php?add=true");
					exit(0);
			}
	}		
}

#Manage Portfolio Tpl
if($Action == ''|| $Action == A_VIEW)
{
    $result = $industry->View_Cat_Industry_Order();
	$Industry_List	=	fillDbCombo($result,'industry_id','industry_name');
	
    $result2 = $development->View_Development_Order();
	$Development_List	=	fillDbCombo($result2,'development_id','development_title');
	
    $result3 = $exe_time->View_ExecutionTime_Order();
	$Execution_List	=	fillDbCombo($result3,'exe_id','exe_name');

    $results = $cats->Get_Category_Listing();
	$rscnt = $db->num_rows();
	$total = 0;
	$i=0;
	
	while($db->next_record())
	{
	    $arr_cat_name[$i]			= $db->f('cat_name');
		$arr_cat_id[$i]				= $db->f('cat_id');
		$arr_sub_cat[$i]			= $cats->GetCategorybyParent($db->f('cat_id'));
		$i++;
	}	
    
    
	$tpl->assign(array("catid"			    =>	$arr_cat_id,
 					   "catname"   			=>	$arr_cat_name,
 					   "sub_cat"   			=>	$arr_sub_cat,
					   "Loop"				=>	$rscnt,
					   "flag"				=>  1,
					));
	
	$tpl->assign(array("T_Body"					=>	'manage_portfolio_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("portfolio.js"),
						"lang"					=>  $lang,
						"Industry_List"			=>	$Industry_List,
						"Development_List"		=>	$Development_List,
						"Execution_List"		=>	$Execution_List,
						"Action"				=>	'Add',
						"ERROR"                 =>  $ERROR, 
						"tab"					=>  4,
						"Site_Title"			=>	$config[WC_SITE_TITLE]." - ".$lang['New_Portfolio_Title'],

					));
   
	
}
$tpl->display('default_layout'. $config['tplEx']);								
?>