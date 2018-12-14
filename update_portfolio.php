<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/update_portfolio.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');
include_once($physical_path['DB_Access']. 'Industry.php');
include_once($physical_path['DB_Access']. 'Development.php');
include_once($physical_path['DB_Access']. 'Execution_Time.php');
include_once($physical_path['DB_Access']. 'Category.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$portfolio_id = ($_GET['portfolio_id'] ? $_GET['portfolio_id'] : $_POST['pro_id']);

$industry 		= new Industry();
$development 	= new Development();
$exe_time 		= new Execution_Time();
$cats 			= new Category();
$portfolio 		= new Portfolio();



# Save tha data
if($_POST['Submit'] == $lang['Save_Portfolio'] && $Action == 'Edit')
{
 
   if($HTTP_POST_FILES['sample_file']['name'] == '')
	    {
			$en_seller_title 	   = badWordDetect($_POST['en_seller_title']);
			$en_seller_description  = badWordDetect($_POST['en_seller_description']);
			 
            $portfolio->Update($_POST,$_POST['image'],$en_seller_title,$en_seller_description); 
	    }
   else
	    {
		    $ERROR = "";
		    if($HTTP_POST_FILES['sample_file']['size'] > 1048576 )
			 {
			   	 $ERROR = "You can't upload 1st file more than 1 MB Size";
				 $Action = A_VIEW;
			 }
		     else
			 {
				$n1 = @unlink($physical_path['Portfolio'].$_POST['image']);
				$n1 = @unlink($physical_path['Portfolio']."thumb_".$_POST['image']);
				$logo = fileUpload($HTTP_POST_FILES['sample_file'],PORTFOLIO);
				$size=getimagesize($physical_path['Portfolio'].$logo);
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
				$thumb->image($physical_path['Portfolio'].$logo);
				$thumb->size_fix($nw,$nh);
				$filename = $thumb->get();
					
				$en_seller_title 	   = badWordDetect($_POST['en_seller_title']);
				$en_seller_description  = badWordDetect($_POST['en_seller_description']);		
				
				$portfolio->Update($_POST,$logo,$en_seller_title,$en_seller_description); 
			 }	 
	   }
	if($Action == A_VIEW)   
	{
	
	}
	else
	{
		header("location: manage_portfolio.php");
		exit(0);
	}
}
					


elseif($Action == 'Delete')
{
       	$n2 = @unlink($physical_path['Portfolio'].$_POST['image']);
		$n2 = @unlink($physical_path['Portfolio']."thumb_".$_POST['image']);
		$portfolio->UpdateImage($_POST);

		header("location: update_portfolio.php?portfolio_id=".$_POST['pro_id']);
	    exit(0);
}
#Manage Portfolio Tpl
if($Action == '' || $Action == A_VIEW)
{
   $reset = $portfolio->Get_Portfolio($portfolio_id);
   
   $arr_categories = explode(",",$reset->categories);
   
    $result = $industry->View_Cat_Industry_Order();
	$Industry_List	=	fillDbCombo($result,'industry_id','industry_name',$reset->industry);
	
    $result2 = $development->View_Development_Order();
	$Development_List	=	fillDbCombo($result2,'development_id','development_title',$reset->budget);
	
    $result3 = $exe_time->View_ExecutionTime_Order();
	$Execution_List	=	fillDbCombo($result3,'exe_id','exe_name',$reset->time_spent);

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
					   "Action"				=>	'Edit', 
					   "ERROR"              =>  $ERROR, 

					));
	
	$tpl->assign(array("T_Body"					=>	'manage_portfolio_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("portfolio.js"),
						"lang"					=>  $lang, 	
						"flag"					=>  0,
						"arr_categories"        =>  $arr_categories,
						"checked"				=>	"checked",
						"Industry_List"			=>	$Industry_List,
						"Development_List"		=>	$Development_List,
						"Execution_List"		=>	$Execution_List,
						"en_seller_title"       =>  $reset->title,
						"en_seller_description" =>  $reset->description,
						"sample_file" 			=>  $reset->sample_file,
						"path"                  =>  $virtual_path['Portfolio'],
						"User_Id"               =>  $_SESSION['User_Id'],
					  	"pro_id"                =>  $_GET['portfolio_id'], 
						"tab"					=>  4,
						"Site_Title"			=>	$config[WC_SITE_TITLE]." - ".$lang['Edit_Portfolio_Sample'],
						"navigation"			=> '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>',
						"navigation1"		  	=> '<a href=manage_portfolio.php class=footerlink>'.$lang['Manage_Portfolio'].'</a>',
						"navigation2"		  	=> '<label class=navigation>'.$lang['Update_Portfolio'].'</label>',
						
					));
  			
}
$tpl->display('default_layout'. $config['tplEx']);								
?>