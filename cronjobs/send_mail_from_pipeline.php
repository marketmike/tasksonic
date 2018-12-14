<?php

// manage pipeline for mass emailings - used in send_all_tasks.php
define('IN_SITE', 	true);

define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron 	 = new Cronjobs();
$emails  = new Email();


	global $mail2;
	$mail2 = '';
	$mail2 = new htmlMimeMail();
	
	
	$tpl2 = new Smarty;
	$tpl2->compile_dir 	= $physical_path['Site_Root']. 'templates_c/';

	$cron->Get_Emails_From_Pipeline();
	$cnt = $db->num_rows();	// get num of rows

	$i=0;
	while($db->next_record())		// loop till last record
	{
		$mail2->setFrom($db->f('send_from'));
		$mail2->setSubject($db->f('mail_subject')); #Email Subject
		$mail_html = $db->f('mail_content');
		$mail2->setHtml($mail_html);
		$result = $mail2->send(array($db->f('send_to')));
		
		$cron->Delete_From_Pipeline($db->f('pk_id'));
		$i++;
	}
?>