<?php
define('IN_SITE', 	true);
define('IN_USER', 	true);
// including related database and language files

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/manage_portfolio.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

// creating objects
$Portfolio = new Portfolio();

if($Action == 'Delete')
{
##############################################################################################
/// delete portfolio 
##############################################################################################
   $Portfolio->Delete_Portfolio($_POST['portfolio_id']);
   header("location: manage_portfolio.php?delete=true");
   exit();
}
##############################################################################################
elseif($Action == 'DeleteSelected')
{
##############################################################################################
/// delete mulitiple portfolio at a time
##############################################################################################
   	foreach($_POST['checkboxgroup'] as $key=>$val)
		{
		      $val = $Portfolio->Delete_Portfolio($val);
	    }
		
		header('location: manage_portfolio.php?deleteall=true');
		exit();
##############################################################################################
}
elseif($Action == 'Order' && $_POST['Submit'] == $lang['Save'])
{
##############################################################################################
/// set portfolio order
##############################################################################################
	// Split the link order	
	$display_order = split(":", $_POST['display_order']);

   // Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$Portfolio->DisplayOrder_Portfolio_Type($display_order[$i], $i);
	}
##############################################################################################
	header('location: manage_portfolio.php');
	exit();
}
elseif($Action == 'Order' && $_POST['Submit'] == $lang['Cancel'])
	{
	   header('location: manage_portfolio.php');
	} 
#listing all Portfolio
if($Action == 'ViewAll')
{

     if($_GET['delete']=='true')
		$succMsg='<br><b>'.$lang['Suss_Msg'].'</b><br>'; 
	 if($_GET['add']=='true')
		$succMsg='<br><b>'.$lang['Suss_Msg1'].'</b><br>';
    if($_GET['deleteall']=='true')
		$succMsg='<br><b>'.$lang['Suss_Msg2'].'</b><br>';		
			
##############################################################################################
/// list all portfolio posted by user
##############################################################################################


	$result = $Portfolio->ViewAllPortfolio($_SESSION['User_Id']);
	$cnt = $db1->num_rows();
	$i=0;
	while($db1->next_record())
	{
	    $arr_portfolio[$i]['id']	   				=	$db1->f('portfolio_id');
		$arr_portfolio[$i]['title']					= 	$db1->f('title');
		$arr_portfolio[$i]['desc']					= 	$db1->f('description');
		$arr_portfolio[$i]['sample_file']	 	  	=	$db1->f('sample_file');
		$arr_portfolio[$i]['industry']				=	$db1->f('industry_name');
		$arr_portfolio[$i]['budget']	   		    =	$db1->f('development_title');
		$arr_portfolio[$i]['time_spent']	   		=	$db1->f('exe_name');
		$arr_portfolio[$i]['categories']	   		=	$db1->f('categories');
		$i++;
	}
##############################################################################################
	
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array( "T_Body"				=>	'manage_portfolio_showall'. $config['tplEx'],
						"JavaScript"			=>  array("portfolio.js"),
						"lang"					=> 	$lang,
						"succMsg"		        =>	$succMsg,
						"Loop"					=>  $cnt,
						"iportfolio"		   	=> 	$arr_portfolio,
						"usr_id"                =>  $_SESSION['User_Id'],
						"member_ship"           =>  $_SESSION['Membership_Name'],
						"img_path_port"                  =>  $virtual_path['Portfolio'],
						"portfolio_id"          =>  $result->portfolio_id,
						"port_img"              =>  $result->sample_file,
						"Action"                =>  "manage_portfolio.php",  
						"free_portfolio"		=>	$config[WC_FREE_PORTFOLIO],	
						"premium_portfolio"		=>	$config[WC_PREMIUM_PORTFOLIO],
						"tab"					=>  4,
						"navigation"			=> '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>',
						"navigation1"		  	=> '<label class=navigation>'.$lang['Manage_Portfolio'].'</label>',
						#"navigation2"		  	=> '<a href=manage_portfolio.php class=footerlink>'.$lang['Manage_Portfolio'].'</a>',
					));
					
					
##############################################################################################
 /* assign language */
	$tpl->assign(array(	"Site_Title"			=>	$config[WC_SITE_TITLE]." - ".$lang['Manage_Portfolio'],
						));					
}

elseif($Action == 'Order')
{
##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array("T_Body"					=>	'manage_portfolio_order'. $config['tplEx'],
						"JavaScript"			=>  array("portfolio.js"),
						"ACTION"				=>  'Order',
						"lang"					=> 	$lang,
						"user_id"				=>	$_SESSION['User_Id'],
						));
##############################################################################################

##############################################################################################
/// assing all portfolio in order
##############################################################################################
				
		$Portfolio->View_Portfolio_All_Order($_SESSION['User_Id']);
		$rscnt = $db->num_rows();

		$arr_portfolio_id		= array();
		$arr_title			= array();
	
		$total = 0;
		$i=0;
		$tpl->assign(array("Loop"			=>	$rscnt,
							"ErrorMsg"		=>	$ErrorMsg,
						));	
        while($db->next_record())
		{
			$arr_portfolio_id[$i]	= $db->f('portfolio_id');
			$arr_title[$i]			= $db->f('title');
			$i++;
		}
		// assign to template
		$tpl->assign(array(	"portf_id"				=>	$arr_portfolio_id,
							"portf_tilte"			=>	$arr_title,
							"Portfolio_Management"	=>	$lang['Portfolio_Management'],
							"JS_Move"				=>	$lang['JS_Move'],
							"tab"					=>  4,
							"navigation"			=> '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>',
							"navigation1"		  	=> '<a href=manage_portfolio.php class=footerlink>'.$lang['Manage_Portfolio'].'</a>',
							"navigation2"		  	=> '<label class=navigation>'.$lang['Manage_Order_Portfolio'].'</label>',
							
					));			
					
##############################################################################################
}
$tpl->display('default_layout'. $config['tplEx']);								
?>