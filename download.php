<?php
define('IN_SITE', 	true);
include_once("includes/common.php");

switch($_GET['upload_folder'])
{
	case 'project':
		$get_path	=	$physical_path['project'].$_GET['file_id'];
		break;
	case 'Private_Message':
		$get_path	=	$physical_path['Private_Message'].$_GET['file_id'];
		break;
	case 'Contact':
		$get_path	=	$physical_path['Contact'].$_GET['file_id'];
		break;	
}

$allowed_ext = array (

  // archives
  'zip' => 'application/zip',
  'tar' => 'application/x-tar',
  
  // documents
  'pdf'   => 'application/pdf',
  'doc'   => 'application/msword',
  'xml'   => 'application/xml',
  'xls'   => 'application/vnd.ms-excel',
  'xhtml' => 'application/xhtml+xml',
  'ppt'	  => 'application/vnd.ms-powerpoint',
  'txt'   => 'text/plain',
  'css'   => 'text/css',
  'htm'   => 'text/html',
  'html'  => 'text/html',
  'rtf'   => 'application/rtf',
  'rtx'   => 'text/richtext',
  
  // executables
  'exe' => 'application/octet-stream',
  'dll' => 'application/octet-stream',

  // images
  'bmp'  => 'image/bmp',
  'gif'  => 'image/gif',
  'png'  => 'image/png',
  'jpg'  => 'image/jpeg',
  'jpeg' => 'image/jpeg',
  'ico'  => 'image/x-icon',

  // audio
  'mp2' => 'audio/mpeg',
  'mp3' => 'audio/mpeg',
  'mid' => 'audio/midi',
  'midi'=> 'audio/midi',
  'wav' => 'audio/x-wav',

  // video
  'mov' 	=> 	'video/quicktime',
  'movie' 	=>	'video/x-sgi-movie',
  'mp4' 	=> 	'video/mp4',
  'mpe' 	=> 	'video/mpeg',
  'mpeg' 	=> 	'video/mpeg',
  'mpg' 	=> 	'video/mpeg',
  'mpga' 	=> 	'video/mpeg',
  'avi' 	=> 	'video/x-msvideo'
);
$fext = strtolower(substr(strrchr($_GET['file_id'],"."),1));

// get mime type
if ($allowed_ext[$fext] == '') 
{
	$mtype = '';
	// mime type is not set, get from server settings
	if (function_exists('mime_content_type')) 
	{
		$mtype = mime_content_type($get_path);
	}
	else if (function_exists('finfo_file')) 
	{
		$finfo = finfo_open(FILEINFO_MIME); // return mime type
		$mtype = finfo_file($finfo, $get_path);
		finfo_close($finfo);  
	}
	if ($mtype == '') 
	{
		$mtype = "application/force-download";
	}
}
else 
{
	// get mime type defined by admin
	$mtype = $allowed_ext[$fext];
}

// set headers
//$mtype = mime_content_type($get_path);
$getfilename = substr($_GET['file_id'],25);

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Type: $mtype");
header("Content-Disposition: attachment; filename=\"$getfilename\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: " . filesize($get_path));

$fp = fopen($get_path,"r"); 
$output = fread($fp,filesize($get_path)); 
fclose($fp); 
echo $output;
flush();

print "<script language='javascript'>";
print "window.close();";
print "</script>";
?>