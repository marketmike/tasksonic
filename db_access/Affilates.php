<?php
class Affilates
{
	function Affilates()
	{}
	function ViewAll($ref_by_login_id)
	{
		global $db;
			  
/*		$sql = "SELECT *,SUM(AC.affiliation_earning) AS Eearn FROM ".AFFILATION_MASTER . " AM"
			   . " LEFT JOIN " . AFFILATION_COMMISION . " AC"
			   . " ON AM.ref_by_login_id = AC.affilative_login_id"
			   . " AND AM.affilated_login_id = AC.seller_login_id"
			   ." WHERE AM.ref_by_login_id  = '".$ref_by_login_id."'"
			   ." GROUP BY AM.affilated_login_id";
		#print $sql;
*/
	    $sql =  "SELECT * FROM ". AFFILATION_MASTER
            . 	" WHERE ref_by_login_id  = '". $ref_by_login_id. "' ";
		$db->query($sql);
	}
	
	function GetEarningofAffilatedUser($login_id,$signup_date)
	{
		global $db1;
		$count = 0;
	    $sql =  "SELECT * FROM ". AFFILATION_COMMISION
            . 	" WHERE seller_login_id  = '". $login_id. "' AND (date BETWEEN  '".$signup_date."' AND DATE_ADD('".$signup_date."',INTERVAL 1 YEAR) AND status =".'0'." )";
		$db1->query($sql);
		while($db1->next_record())
		{
			$count = $count + $db1->f('affiliation_earning');
		}
		return ($count);	
	}
	function Check_User_Is_Afflilated($username)
	{
		global $db;
	    $sql =  "SELECT * FROM ". AFFILATION_MASTER
            . 	" WHERE affilated_login_id  = '". $username. "' ";
		$db->query($sql);

	    if($db->num_rows() > 0)
	    {
			return 0;
	    }
	    return 1;
	}
	function Insert_Affilation_Comm($post,$affilate_parent,$seller_name,$per_comm,$new_seller_wallet,$affiliation_earning)
	{
		global $db;
	    $sql = "INSERT INTO ".AFFILATION_COMMISION
			." (project_id,affiliative_auth_id,affilative_login_id,seller_auth_id,seller_login_id,"
			." per_comm,seller_comm_proj,affiliation_earning,date,date_time,status)"
			." VALUES ("
			." '".$post['project_id']."' ,"
			." '".md5($affilate_parent)."' ,"
			." '".$affilate_parent."' ,"
			." '".md5($seller_name)."' ,"
			." '".$seller_name."' ,"
			." '".$per_comm."' ,"
			." '".$new_seller_wallet."' ,"
			." '".$affiliation_earning."' ,"
			." '".date('Y-m-d'). "' ,"
			." '".date('m/d/y \a\t H:i T')."',"
			." 0 "
			." )";
		$db->query($sql);	
	}
	function Get_Affilate_Parent($username)
	{
	  global $db;
		$sql =  "SELECT * FROM ". AFFILATION_MASTER
			  . 	" WHERE affilated_login_id  = '". $username. "' ";
		$db->query($sql);
  	    $db->next_record();
		return($db->f('ref_by_login_id'));
	}
	
	function Transfer_Amt($username)
	{
	 	global $db;
		$sql = 	"UPDATE ". AFFILATION_COMMISION
				.	" SET "
				.	" status				= '".'1'. "'"
				.	" WHERE affilative_login_id = '".$username. "'";
		
		$db->query($sql);
		
	}
	function Insert_Affilation_Transfer_Fees($user_id,$login_id,$amount,$earn_by,$in_acc)
	{
	 
	  	$trans_type = "+";
		$desc =$earn_by."<strong>".'$'.$amount."</strong>".$in_acc;
	   
		global $db;
		   $sql="INSERT INTO ".PAYPAL_MASTER
					." (user_auth_id,user_login_id,amount,status,description,trans_type,date ) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." 1 ,"
					." '".$desc."' ,"
					." '".$trans_type."' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);
		   
		    $sql="INSERT INTO ".AFFILATION_LOG
					." (user_auth_id,user_login_id,amount,date,datetime ) "
					." VALUES ('".$user_id."' ,"
					." '".$login_id."' ,"
					." '".$amount."' ,"
					." '".date('Y-m-d'). "' ,"
					." '".date('m/d/y \a\t H:i T')."' "
					." )";
		   $db->query($sql);
		
	}
}
?>