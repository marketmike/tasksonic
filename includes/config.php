<?php
/* this file is used for database connection */
$config['tplEx'] = '.tpl';  // file extension
//$Language_Types = isset($_POST['Language_Types']) ? $_POST['Language_Types'] : (isset($_SESSION['Language_Types'])?$_SESSION['Language_Types']:"en" );
//$_SESSION['Language_Types'] = $Language_Types;

#====================================================================================================
#	Database		
#----------------------------------------------------------------------------------------------------

	    $config['DB_Type']      = 'mysql';
	    $config['DB_Host']      = 'localhost';
	    $config['DB_Name']      = 'tasksonic';
	    $config['DB_User']      = 'root';
	    $config['DB_Passwd']    = '2Many0s';

?>
