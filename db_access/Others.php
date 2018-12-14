<?php
class Others
{
	function Others()
	{}
  
	function Count_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER;
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_VIP_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER." WHERE membership_id != 0 AND special_user = 0";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_VIP_SPEC_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER." WHERE membership_id != 0 AND special_user = 1";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Bid_Pending()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".BID_MASTER." WHERE 	bid_status = 0";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Normal_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER." WHERE membership_id = 0 AND special_user = 0";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Special_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER." WHERE special_user = 1 AND membership_id = 0";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Portfolio()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".SELLER_PORTFOLIO_MASTER;
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_project()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".project_MASTER." WHERE project_status = 1";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Buyer()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".PROFILE_MASTER." WHERE buyers_profile_status = 1";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Seller()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".PROFILE_MASTER." WHERE seller_slogan IS NOT NULL";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	
	function Count_Last_Week_project($last_date,$today_date)
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".project_MASTER." WHERE project_posted_date BETWEEN '".$last_date."' AND '".$today_date."' ";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	
	function Count_Withdraw_Money_Form_Paypal()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".WITHDRAW_MASTER." WHERE withdraw_type='Paypal' AND status=0 ";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Withdraw_Money_Form_Moneybooker()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".WITHDRAW_MASTER." WHERE withdraw_type='Moneybooker' AND status=0 ";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Deposite_Money_Form_Paypal()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".PAYPAL_PENDING_DEPOSITE." WHERE status=0 ";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function Count_Deposite_Money_Form_Moneybooker()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MONEYBOOKER_PENDING_DEPOSITE." WHERE status=0 ";
		$db->query($sql);
		$db->next_record();
		return ($db->f('cnt'));
	}
	function ViewAllUsers()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
		." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
		." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." ORDER BY MM.mem_id DESC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
		//return($db->fetch_object());
	}
	function ViewAll_VIP_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
		." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
		." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id WHERE MM.membership_id != 0";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id WHERE MM.membership_id != 0 "
			." ORDER BY MM.mem_id DESC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
		//return($db->fetch_object());
	}
	function ViewAll_Special_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
		." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
		." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id WHERE MM.special_user = 1";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id WHERE MM.special_user = 1 "
			." ORDER BY MM.mem_id DESC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	//	return($db->fetch_object());
	}
	function ViewAll_Normal_Users()
	{
		global $db;
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
		." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
		." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id WHERE MM.special_user = 0 AND MM.membership_id = 0";
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$sql= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id WHERE MM.special_user = 0 AND MM.membership_id = 0"
			." ORDER BY MM.mem_id DESC "
			." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	//	return($db->fetch_object());
	}
	function getUserDetails($userid)
	{
		global $db;
		$sql = " SELECT * FROM ".MEMBER_MASTER
			  ." WHERE user_auth_id  = '".$userid."'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	
	function Delete($package_id)
    {
		global $db;
		$sql = " DELETE FROM ".AUTH_USER
			 . " WHERE user_auth_id =  '". $package_id ."'";
	//	print $sql;	 
		$db->query($sql);
		
		$sql = " DELETE FROM ".MEMBER_MASTER
			 . " WHERE user_auth_id =  '". $package_id ."'";
	//	print $sql;				 
		$db->query($sql);
		
		$sql = " DELETE FROM ".SELLER_SKILL_MASTER
			 . " WHERE user_auth_id =  '". $package_id ."'";
	//	print $sql;		 
		$db->query($sql);
		
		$sql = " DELETE FROM ".PAYPAL_MASTER
			 . " WHERE user_auth_id =  '". $package_id ."'";
	//	print $sql;				 
		$db->query($sql);
		
		$sql = " DELETE FROM ".WITHDRAW_MASTER
			 . " WHERE user_auth_id =  '". $package_id ."'";
		// print $sql;	
		$db->query($sql);
		
	}
	function ToggleStatusUser($user_auth_id, $status)
	{
		global $db;
		$sql = " UPDATE ".AUTH_USER
			 . " SET user_status ='". $status."'"
			 . " WHERE user_auth_id ='". $user_auth_id. "'";
		
		return ($db->query($sql));
	}
	function ToggleStatusUser_Special($user_auth_id, $status)
	{
		global $db;
		if($status == 0)
			$special_user_start_date = '0000-00-00';
		else
			$special_user_start_date = date('Y-m-d');
			
		$sql = " UPDATE ".MEMBER_MASTER
			 . " SET special_user ='". $status."',"
			 . " special_user_start_date ='". $special_user_start_date."'"
			 . " WHERE user_auth_id ='". $user_auth_id. "'";
		return ($db->query($sql));
	}
	function getUserBuyersDetails($userid)
	{
		global $db;
		$sql = " SELECT * FROM ".PROFILE_MASTER
			  ." WHERE user_auth_id  = '".$userid."'";
		$db->query($sql);
		return ($db->fetch_object(MYSQL_FETCH_SINGLE));
	}
	function Seller_DelPortfolio($prod_id)
	{
		global $db,$physical_path;
		
		$sql = " SELECT * FROM ".SELLER_PORTFOLIO_MASTER
		     ." WHERE user_auth_id = '".$prod_id."'";
	//	print $sql."<br>";	
		$db->query($sql);
		while($db->next_record())
		{
			$n1 = @unlink($physical_path['Portfolio'].$db->f('sample_file'));
			$n1 = @unlink($physical_path['Portfolio']."thumb_".$db->f('sample_file'));
		}	
		$sql = " DELETE FROM ".SELLER_PORTFOLIO_MASTER
			 . " WHERE user_auth_id =  '". $prod_id ."'";
	//		 print $sql;	
		return($db->query($sql));
	}
	function Seller_DelProfile($prod_id1)
	{
		global $db,$physical_path;
		
		$sql = " SELECT * FROM ".PROFILE_MASTER
		     ." WHERE user_auth_id = '".$prod_id1."'";
	//	print $sql;	
		$db->query($sql);
		while($db->next_record())
		{
			$n1 = @unlink($physical_path['Seller_Logo'].$db->f('seller_logo'));
			$n1 = @unlink($physical_path['Seller_Logo']."thumb_".$db->f('seller_logo'));
		}	
		$sql =  " DELETE FROM ".PROFILE_MASTER
			 . " WHERE user_auth_id =  '". $prod_id1 ."'";
	//	print $sql;		 
		return($db->query($sql));
	}
	function GetNameprojectBY($prod_id1)
	{
		global $db,$physical_path;
		
		$sql = " SELECT * FROM ".MEMBER_MASTER
		     ." WHERE user_auth_id = '".$prod_id1."'";
		$db->query($sql);
		$db->next_record();
	    return ($db->f('user_login_id'));
	}
	function Delproject($name)
	{
		global $db,$physical_path;
		
		$sql = " SELECT * FROM ".project_MASTER
		     ." WHERE project_posted_by = '".$name."'";
//print $sql;	
		$db->query($sql);
		
		while($db->next_record())
		{
			$n1 = @unlink($physical_path['project'].$db->f('project_file_1'));
			$n1 = @unlink($physical_path['project'].$db->f('project_file_2'));
			$n1 = @unlink($physical_path['project'].$db->f('project_file_3'));
		}	
		$sql =  " DELETE FROM ".project_MASTER
			 . " WHERE project_posted_by =  '". $name ."'";
		//	 print $sql;	
		return($db->query($sql));
	}
	function Del_Contact($prod_id1)
	{
		global $db,$physical_path;
		
		$sql = " SELECT * FROM ".CONTACT_MASTER
		     ." WHERE sender_id = '".$prod_id1."'";
		$db->query($sql);
		
		while($db->next_record())
		{
			$n1 = @unlink($physical_path['Contact'].$db->f('image_file'));
		}	
		$sql =  " DELETE FROM ".CONTACT_MASTER
			 . " WHERE sender_id =  '". $prod_id1 ."'";
		return($db->query($sql));
	}
	
	function SearchUsers($name,$email)
	{
		global $db;
		$query="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
		if($name != '' && $email == '')
		{
			$sql2 = " WHERE MM.user_login_id like '$name%' ";
		}
		else if($email != '' && $name == '')
		{
			$sql2 = " WHERE MM.mem_email like '%$email%' ";
		}
		else if($email != '' && $name != '')
		{
			$sql2 = " WHERE  MM.user_login_id like '$name%' AND MM.mem_email like '%$email%' ";
		}
		$sql = $query.$sql2;
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();
		
		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
		
		$query= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
		if($name != '' && $email == '')
		{
			$sql1 = " WHERE MM.user_login_id like '$name%' ";
		}
		else if($email != '' && $name == '')
		{
			$sql1 = " WHERE MM.mem_email like '%$email%' ";
		}
		else if($email != '' && $name != '')
		{
			$sql1 = " WHERE  MM.user_login_id like '$name%' AND MM.mem_email like '%$email%' ";
		}
		
		$sql=$query.$sql1." ORDER BY MM.mem_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	//	return($db->fetch_object());
	}
	function Search_VIP_Users($name,$email)
	{
		global $db;
		$query ="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
		
		if($name != '' && $email == '')
		{
			$sql2 = " WHERE MM.membership_id != 0 AND MM.user_login_id LIKE '$name%'";
		}
		else if($email != '' && $name == '')
		{
			$sql2 = "WHERE MM.membership_id != 0 AND MM.mem_email like '%$email%'";
		}
		else if($email != '' && $name != '')
		{
			$sql2 = " WHERE MM.membership_id != 0 AND MM.user_login_id LIKE '$name%' AND MM.mem_email like '%$email%'";
		}
		
		$sql = $query.$sql2;
		
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$query= " SELECT * FROM ".MEMBER_MASTER." AS MM "
		." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
		." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
			
		if($name != '' && $email == '')
		{			
			$sql1 = " WHERE MM.membership_id != 0 AND MM.user_login_id like '$name%' ";
		}
		else if($email != '' && $name == '')
		{
			$sql1 = " WHERE MM.membership_id != 0 AND MM.mem_email like '%$email%' ";
		}
		else if($email != '' && $name != '')
		{
			$sql1 = " WHERE MM.membership_id != 0 AND MM.user_login_id like '$name%' AND MM.mem_email like '%$email%' ";
		}
		$sql=$query.$sql1." ORDER BY MM.mem_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		#print $sql;die;
		$db->query($sql);
		//return($db->fetch_object());
	}
	function Search_Special_Users($name,$email)
	{	
		global $db;
		$query="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
		if($name != '' && $email == '')
		{
			$sql2 = " WHERE MM.special_user = 1 AND MM.user_login_id LIKE '$name%' ";
		}
		else if($email != '' && $name == '')
		{
			$sql2 = " WHERE MM.special_user = 1 AND MM.mem_email like '%$email%' ";
		}
		else if($email != '' && $name != '')
		{
			$sql2 = " WHERE MM.special_user = 1 AND MM.user_login_id LIKE '$name%' AND MM.mem_email like '%$email%' ";
		}
		$sql = $query.$sql2;
		
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}

		$query= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
			
		if($name != '' && $email == '')
		{
			$sql1 = " WHERE MM.special_user = 1 AND MM.user_login_id like '$name%' ";
		}
		else if($email != '' && $name == '')
		{
			$sql1 = " WHERE MM.special_user = 1 AND MM.mem_email like '%$email%' ";
		}
		else if($email != '' && $name != '')
		{
			$sql1 = " WHERE MM.special_user = 1 AND MM.user_login_id like '$name%' AND MM.mem_email like '%$email%' ";
		}
		$sql=$query.$sql1." ORDER BY MM.mem_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		
		$db->query($sql);
	//	return($db->fetch_object());
	}
	function Search_Normal_Users($name,$email)
	{
		global $db;
		$query="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
		if($name != '' && $email == '')
		{
			$sql2 = " WHERE MM.special_user = 0 AND MM.membership_id = 0 AND MM.user_login_id LIKE '$name%' ";
		}
		else if($email != '' && $name == '')
		{
			$sql2 = " WHERE MM.special_user = 0 AND MM.membership_id = 0 AND MM.mem_email like '%$email%' ";
		}
		else if($email != '' && $name != '')
		{
			$sql2 = " WHERE MM.special_user = 0 AND MM.membership_id = 0 AND MM.user_login_id LIKE '$name%' AND MM.mem_email like '%$email%' ";
		}
		$sql = $query.$sql2;
		
		$db->query($sql);
		$db->next_record();
		$_SESSION['total_record'] = $db->f("cnt") ;
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
		
		$query= " SELECT * FROM ".MEMBER_MASTER." AS MM "
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id "
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id ";
			
		if($name != '' && $email == '')
		{
			$sql1 = " WHERE MM.special_user = 0 AND MM.membership_id = 0 AND MM.user_login_id like '$name%' ";
		}
		else if($email != '' && $name == '')
		{
			$sql1 = " WHERE MM.special_user = 0 AND MM.membership_id = 0 AND MM.mem_email like '%$email%' ";
		}
		else if($email != '' && $name != '')
		{
			$sql1 = " WHERE MM.special_user = 0 AND MM.membership_id = 0 AND MM.user_login_id like '$name%' AND MM.mem_email like '%$email%' ";
		}
		$sql=$query.$sql1." ORDER BY MM.mem_id DESC LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size'];
		$db->query($sql);
	//	return($db->fetch_object());
	}
	
	function Search_Users($post)
	{
	    global $db;
		
		$sql_where = "";
		
		if($post['user_login_id'] != '')
			{
			   $sql_where = $sql_where." AND MM.user_login_id like '%".$post['user_login_id']."%' ";
			}
		if($post['mem_fname'] != '')
			{
			   $sql_where = $sql_where." AND MM.mem_fname like '%".$post['mem_fname']."%' ";
			}
        
		if($post['mem_lname'] != '')
			{
			   $sql_where = $sql_where." AND MM.mem_lname like '%".$post['mem_lname']."%' ";
			}
		if($post['country_name'] != '0')
			{
			   $sql_where = $sql_where." AND MM.mem_country = '".$post['country_name']."' ";
			}
		if($post['mem_state'] != '')
			{
			   $sql_where = $sql_where." AND MM.mem_state like '%".$post['mem_state']."%' ";
			}
		if($post['mem_city'] != '')
			{
			   $sql_where = $sql_where." AND MM.mem_city like '%".$post['mem_city']."%' ";
			}	
 		if($post['mem_zip_code'] != '')
			{
			   $sql_where = $sql_where." AND MM.mem_zip_code '%".$post['mem_zip_code']."%' ";
			}	
		if($post['vip_user'] == 'on')
			{
			   $sql_where = $sql_where." AND MM.membership_id != '0' ";
			}			
		if($post['normal_user'] == 'on')
			{
			   $sql_where = $sql_where." AND MM.membership_id = '0' ";
			}	
		if($post['special_user'] == 'on')
			{
			   $sql_where = $sql_where." AND MM.special_user = '1' ";
			}	
					 
		$sql="SELECT count(*) as cnt FROM ".MEMBER_MASTER ." AS MM " 
			." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
			." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
			." WHERE 1 ".$sql_where;	 

        $db->query($sql);
		
		$db->next_record();
		
		$_SESSION['total_record'] = $db->f("cnt") ;
		
		$db->free();

		# Reset the start record if required
		if($_SESSION['page_size'] >= $_SESSION['total_record'])
		{
			$_SESSION['start_record'] = 0;
		}
       
		$sql_1 ="SELECT * FROM ".MEMBER_MASTER ." AS MM " 
				." LEFT JOIN ".AUTH_USER." AS AU ON MM.user_auth_id = AU.user_auth_id"
				." LEFT JOIN ".COUNTRY_MASTER." AS CM ON MM.mem_country = CM.country_id"
				." WHERE 1 ".$sql_where." LIMIT ". $_SESSION['start_record']. ", ". $_SESSION['page_size']; 
		$db->query($sql_1);
	}

}
?>