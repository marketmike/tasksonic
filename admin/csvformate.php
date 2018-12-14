<?php

define('IN_ADMIN', 	true);
define('IN_SITE', 	true);
include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Member.php');

$member = new Member();
if($_GET['Action'] == 'All')
{
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment; filename=email_ids.csv");
	
	
	$query=$member->ViewAllcsv();
	$rscnt = $db->num_rows();
	
	print "Member Login ID,";
	print "Email \n";	
		$i=0;
		while($db->next_record())
		{
			print '"' . $db->f('user_login_id').'",';
			print '"' . $db->f('mem_email'). '"' . "\n";
			$i++;
		}
}
if($_GET['Action'] == 'Posted')
{
	
	$query=$member->ViewPostProjcsv();
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment; filename=post_pro_email_ids.csv");
	
	$member = new Member();
	$query=$member->ViewPostProjcsv();
	$rscnt = $db->num_rows();
	
	print "Member Login ID,";
	print "Email \n";	
		$i=0;
		while($db->next_record())
		{
			print '"' . $db->f('user_login_id').'",';
			print '"' . $db->f('mem_email'). '"' . "\n";
			$i++;
		}
}

if($_GET['Action'] == 'Bid')
{
	
	$query=$member->ViewPostBidcsv();
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment; filename=post_bid_email_ids.csv");
	
	$member = new Member();
	$query=$member->ViewPostProjcsv();
	$rscnt = $db->num_rows();
	
	print "Member Login ID,";
	print "Email \n";	
		$i=0;
		while($db->next_record())
		{
			print '"' . $db->f('user_login_id').'",';
			print '"' . $db->f('mem_email'). '"' . "\n";
			$i++;
		}
}

if($_GET['Action'] == 'Proj_Info')
{
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Disposition: attachment; filename=proj_info_email_ids.csv");
	
	
	$query=$member->ViewProjInfoAllcsv();
	$rscnt = $db->num_rows();
	
	print "Member Login ID,";
	print "Email \n";	
		$i=0;
		while($db->next_record())
		{
			print '"' . $db->f('user_login_id').'",';
			print '"' . $db->f('mem_email'). '"' . "\n";
			$i++;
		}
}
?>
