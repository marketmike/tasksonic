<?php
define('IN_ADMIN', 	true);
define('IN_SITE', 	true);

if(isset($_GET['start']))
	$_SESSION['start_record']	=	$_GET['start'];

include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Category.php');
include EDITOR_ROOT. 'spaw_control.class.php';


$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');
$cat_parent_id = isset($_GET['cat_parent_id']) ? $_GET['cat_parent_id'] : (isset($_POST['cat_parent_id']) ? $_POST['cat_parent_id'] : '0');

$category = new Category();

#----------------------------------------------------------------------------------------------------
# Add categories
#----------------------------------------------------------------------------------------------------

if($Action == 'Add' && $_POST['Submit']=='Save')
{
	$no = $category->AddCategory($_POST);   
	header("location: category.php?cat_parent_id=".$_POST['cat_parent_id']."&add=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Edit selected categories
#----------------------------------------------------------------------------------------------------

elseif($Action == 'Edit' && $_POST['Submit']=='Save')
{
	$no = $category->UpdateCategory($_POST);
	header("location: category.php?cat_parent_id=".$_POST['cat_parent_id']."&edit=true");
	exit();
}

#----------------------------------------------------------------------------------------------------
# Delete selected categories
#----------------------------------------------------------------------------------------------------

elseif($Action=='Delete' && $_POST['cat_id'])
{

	$val = $category->ChkSubCat($_POST['cat_id']);
	if($val=='noprod')
	{ 
		$val = $category->DelCategory1($_POST['cat_id'])?'true':'false';
		header("location: category.php?cat_parent_id=".$_POST['cat_parent_id']."&del=true");	
		exit();
	}
	else
	{
		header("location: category.php?cat_parent_id=".$_POST['cat_parent_id']."&del1=true");	
		exit();
	}
}

#----------------------------------------------------------------------------------------------------
# Delete all selected categories
#----------------------------------------------------------------------------------------------------

elseif($Action=='DeleteSelected')
{
	$i=0;
	foreach($_POST['cat_prod'] as $key=>$val)
	{
		$val1 = $category->ChkSubCat($val);
		
		if($val1=='noprod')
		{ 
			$val = $category->DelCategory1($val)?'true':'false';
			$noprod[$i]=$val;
		}
		else
		{
			$prod[$i]=$val;
		}
		$i++;
	}
	if(count($noprod) !=0)
	{
	  
	}
	if(count($prod)!=0)
	{
		$expprodid=implode(',',$prod);
	}
	if($expprodid!='')
	{
			header("location: category.php?product_id1=".$expprodid."");
			exit;
	}
	
}

elseif($Action == 'Order' && $_POST['Submit'] == 'Save')
{
    // Split the link order	
	$display_order = split(":", $_POST['display_order']);
	// Update the link position
	for($i=0; $i<count($display_order); $i++)
	{
		$category->DisplayOrder_Cat_Type($display_order[$i], $i);
	}
	header("location: category.php?cat_parent_id=".$cat_parent_id);
	exit;
}

#----------------------------------------------------------------------------------------------------
# Cancel
#----------------------------------------------------------------------------------------------------


elseif($_POST['Submit'] == 'Cancel')
{
	header("location: category.php?cat_parent_id=".$cat_parent_id);
}

#----------------------------------------------------------------------------------------------------
# Change status of selected categories
#----------------------------------------------------------------------------------------------------

elseif($Action == 'ChangeStatus')
{
	$val=$category->ToggleStatusCategory($_POST['cat_id'],$_POST['status']);
	header("location: category.php?cat_parent_id=".$cat_parent_id."&edit=true");	
	exit();
}

#----------------------------------------------------------------------------------------------------
# List all Category
#----------------------------------------------------------------------------------------------------

	if ($_GET['add']=='true')
		$msg="Category added successfully";
	elseif ($_GET['del']=='true')
		$msg="Category deleted successfully";
	elseif ($_GET['del1']=='true')
		$msg="This Category  may contain product or sub catagory so its can't be deleted.";
	elseif ($_GET['edit']=='true')
		$msg="Category updated successfully";
	
	
	if($_GET['product_id1']!='')
	{
		$pid=split(',', $_GET['product_id1']);
		 
		foreach($pid as $key=>$val)
		{
			$prod_title .=$category->getTitle($val).",";
		}
	
		$prod_title = substr($prod_title,0,strlen($prod_title)-1);
		if($prod_title !='')
		{
			$msg = $prod_title." <br> Category  may contain sub catagory so its can't be deleted.";
		}
	
	}	
	$navigationLink = getCategoryLinkPath($cat_parent_id);
	$tpl->assign(array("T_Body"					=>	'category_showall'. $config['tplEx'],
						"JavaScript"			=>  array("category.js"),
						"cat_parent_id"			=>	$cat_parent_id,
						"succMessage"			=>	$msg,
						"navigationLink"		=>	$navigationLink,
						"A_Action"				=>	"category.php?cat_parent_id=".$cat_parent_id,
						"PageSize_List"	 		=>	$utility->fillArrayCombo($lang['PageSize_List'], $_SESSION['page_size']),						
						));
						
		$category->ViewAllCatagory($cat_parent_id);
		$rscnt = $db->num_rows();
		
		$arr_cat_id				= array();
		$arr_cat_parent_id 		= array();
		$arr_cat_path			= array();
		$arr_cat_name			= array();
		$arr_cat_status			= array();
		$arr_cat_order			= array();
	
		$total = 0;
		$i=0;
		$tpl->assign(array("Loop"			=>	$rscnt,
							"ErrorMsg"		=>	$ErrorMsg,
						));
	
		while($db->next_record())
		{
		   
			$arr_cat_id[$i]				= $db->f('cat_id');
			$arr_cat_parent_id[$i]		= $db->f('cat_parent_id');
			$arr_cat_path[$i]			= $db->f('cat_path');
			$arr_cat_name[$i]			= $db->f('cat_name');
			$arr_cat_status[$i]			= $db->f('cat_status');
			$arr_cat_order[$i]			= $db->f('cat_order');
			$i++;
		}
							
		$tpl->assign(array(	"cat_id"				=>	$arr_cat_id,
							"cat_parent_id"			=>	$cat_parent_id,
							"cat_path"				=>	$arr_cat_path,
							"cat_name"				=>	$arr_cat_name,
							"cat_status"			=>	$arr_cat_status,
							"cat_order"				=>	$arr_cat_order,
					));
						

	if($_SESSION['total_record'] > $_SESSION['page_size'])
	{
		$tpl->assign(array('Page_Link' =>	$utility->showPagination($_SESSION['total_record'])
						));
	}
	
	
#----------------------------------------------------------------------------------------------------
# Add / Edit Catagories
#----------------------------------------------------------------------------------------------------
	
if($Action == 'Add' || $Action == 'Edit')
{

	$tpl->assign(array("T_Body"					=>	'category_addedit'. $config['tplEx'],
						"JavaScript"			=>  array("category.js"),
						"Action"				=>	$Action,
						"cat_parent_id"	        =>	$cat_parent_id,
				));
				
				
	if($Action == 'Edit' && $_POST['cat_id'])
	{
		$result = $category->GetCategory($_POST['cat_id']);
		
		$tpl->assign(array("cat_id"				=>	$result->cat_id,
							"cat_parent_id"		=>	$result->cat_parent_id,
							"cat_name1"			=>	$result->cat_name,
							#"desc"				=>	$result->cat_desc,
							"disp_title"		=>	$result->disp_title,
							"cat_path"			=>	$result->cat_path,
							"cat_status"		=>	($result->cat_status == 1)?'checked':'',
					));
	}
	$sw = new SPAW_Wysiwyg('cat_desc' /*name*/,		$result->cat_desc/*value*/,
				   'en' /*language*/, 'full' /*toolbar mode*/, 'default' /*theme*/,
				   '700px' /*width*/, '475px' /*height*/);					   
				   
	$tpl->assign("EN_Desc_Editor", $sw->getHtml());
}

#----------------------------------------------------------------------------------------------------
# Manage Order Catagories
#----------------------------------------------------------------------------------------------------

if($Action=='Order')
{
	$tpl->assign(array("T_Body"					=>	'category_order'. $config['tplEx'],
						"JavaScript"			=>  array("category.js"),
						"ACTION"				=>  'Order',
						"cat_parent_id"			=>	$cat_parent_id,
						));
						
		$category->View_Cat_All_Order($_POST['cat_parent_id']);
		$rscnt = $db->num_rows();
		
		$arr_cat_id				= array();
		$arr_cat_parent_id 		= array();
		$arr_cat_path			= array();
		$arr_cat_name			= array();
	
		$total = 0;
		$i=0;
		$tpl->assign(array("Loop"			=>	$rscnt,
							"ErrorMsg"		=>	$ErrorMsg,
						));
	
		while($db->next_record())
		{
		   
			$arr_cat_id[$i]				= $db->f('cat_id');
			$arr_cat_parent_id[$i]		= $db->f('cat_parent_id');
			$arr_cat_path[$i]			= $db->f('cat_path');
			$arr_cat_name[$i]			= $db->f('cat_name');
			$i++;
		}
							
		$tpl->assign(array(	"cat_id"				=>	$arr_cat_id,
							"cat_parent_id"			=>	$cat_parent_id,
							"cat_path"				=>	$arr_cat_path,
							"cat_name"				=>	$arr_cat_name,
					));
						
}
$tpl->display('default_layout'. $config['tplEx']);
?>