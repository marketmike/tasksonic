<?php
///////deactivate those user who are not logged in from last 31 days
define('IN_SITE', 	true);
define('IN_CRON', 	true);


include_once("../includes/common.php");
include_once($physical_path['DB_Access']. 'Cronjobs.php');
include_once($physical_path['DB_Access']. 'Email.php');

$Action = isset($_GET['Action']) ? $_GET['Action'] : (isset($_POST['Action']) ? $_POST['Action'] : 'ViewAll');

$cron 	 = new Cronjobs();

	
/////////////////////////
/////////// RSS FEED RELATED 
/////////////////////////

$file_content = "";
$file_content.= "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?><rss version=\"2.0\"><channel>
    <title>Task Sonic</title>
    <link>http://www.tasksonic.com/home.html</link>
    <description>New Tasks</description>";
	$cron->Open_projects();
	while($db->next_record())
	{
		$file_content.="<item>
       <title>".str_replace("&","&amp;",$db->f('project_title'))."</title>
       <link>".$site_path."task_".$db->f('project_id')."_".clean_url($db->f('project_title')).".html</link> 
       </item>";
	
	}
$file_content.=  "</channel></rss>";	
writeFileContent('../tasks_feed.xml',$file_content);
echo $file_content;
?>