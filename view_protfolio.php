<?php
define('IN_SITE', 	true);
//define('IN_USER',	true);

include_once("includes/common.php");
include_once($physical_path['Site_Lang'].'/view_protfolio.php');
include_once($physical_path['DB_Access']. 'Portfolio.php');
include($physical_path['DB_Access']. 'Category.php');

$portfolio = new Portfolio();
$cate	   = new Category();

if($_POST['Submit'] == $lang['Button_Submit'])
{
   header("location: tasker_profile_".$_POST['user_name'].".html");
   exit();
}
$reult = $portfolio->GetPortFolio(md5($_GET['username']),$_GET['portid']);

	if($db->next_record())
	   {
			$view_seller['categories']	   	=	$db->f('categories');
			$view_seller1     				=   explode(",",$view_seller['categories']);
		   
			$categories_seller = "";
			foreach($view_seller1 as $key=>$val)
			{
				$cats = $cate->GetCatName($val);
				$categories_seller = $categories_seller.$cats."  ,";
			}
			$new_categories	=	substr($categories_seller,0,-1);
	   }
	$tpl->assign(array(	"T_Body"			  => 'view_protfolio'. $config['tplEx'],
						"JavaScript"		  =>  array("seller.js"),
						"lang"				  => $lang,
	                    "path"                => $virtual_path['Portfolio'],
						"protfolio_title"     => $db->f('title'),
						"sample_file"         => $db->f('sample_file'),
						"desc"		          => $db->f('description'),
						"title" 			  => $db->f('title'),
						"industry"			  => $db->f('industry_name'),
						"budget"	          => $db->f('development_title'),
						"time_spent"	   	  => $db->f('exe_name'),
						"user_name"	   	      => $db->f('user_name'),
						"new_categories"	  => $new_categories,
						"navigation"		  =>  '<a href="my-account.html" class=footerlink>'.$lang['tasker_activity'].'</a>',
						"navigation1"		  =>  '<a href=tasker_portfolio_'.$db->f('user_name').'.html class=footerlink>'.$lang['All_portfolio'].$db->f('user_name').'</a>',	
						"navigation2"		  =>  '<label class=navigation>'.$db->f('title').'</label>',									
					   ));

$tpl->display('default_layout'. $config['tplEx']);
?>