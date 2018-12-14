<?php
define('IN_SITE', 	true);
include_once("includes/common.php");

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : '');

if($Action == '')
{

	$tpl->assign(array(	"T_Body"			=>	'rates_main'. $config['tplEx'],
						"euro_dollar"		=>	$config[WC_EURO_DOLLAR],
						"dollar_euro"		=>	$config[WC_DOLLAR_EURO],
						));
					
}
elseif($_POST['Submit'] == 'Calculate' && $Action == 'calculate')
{

	
	if($_POST['from'] == 'EUR' && $_POST['to'] == 'USD')
	{
		//////convert euro_dollar
		$new_amount		=	$config[WC_EURO_DOLLAR] * $_POST['amount'];
	}
	elseif($_POST['from'] == 'USD' && $_POST['to'] == 'EUR')
	{
		//////convert dollar_euro
		$new_amount		=	$config[WC_DOLLAR_EURO] * $_POST['amount'];
	}
	elseif($_POST['from'] == 'EUR' && $_POST['to'] == 'EUR')
	{
		//////show only amount posted
		$new_amount		=	$_POST['amount'];
	}
	elseif($_POST['from'] == 'USD' && $_POST['to'] == 'USD')
	{
		//////show only amount posted
		$new_amount		=	$_POST['amount'];
	}

##############################################################################################
/// assing templates and javascript with related varibles according to template
##############################################################################################
	$tpl->assign(array(	"T_Body"			=>	'rates_main'. $config['tplEx'],
						"euro_dollar"		=>	$config[WC_EURO_DOLLAR],
						"dollar_euro"		=>	$config[WC_DOLLAR_EURO],
						"new_amount"		=>	$new_amount,
						"from"				=>	$_POST['from'],
						"to"				=>	$_POST['to'],
						"amount"			=>	$_POST['amount'],
						));
}

$tpl->display('popupwin_rates'. $config['tplEx']);
?>