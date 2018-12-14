<?php
class Utility
{
    function Utility()
    {
		global $config;
		$_SESSION['Debug']	=	isset($_GET['debug'])?$_GET['debug']:$_SESSION['Debug'];
		define('DEBUG', $_SESSION['Debug']);
		# Set page size under cookie
		#-----------------------------------------------------------------------------
		$_SESSION['page_size']		=	isset($_POST['page_size'])?$_POST['page_size']:(isset($_SESSION['page_size'])?$_SESSION['page_size']:$config[WC_PAGESIZE]);
		$_SESSION['user_page_size']		=	isset($_POST['user_page_size'])?$_POST['user_page_size']:(isset($_SESSION['user_page_size'])?$_SESSION['user_page_size']:$config[WC_USER_PAGESIZE]);
		# Set starting record
		#-----------------------------------------------------------------------------
		if(strpos($_SERVER['HTTP_REFERER'], $_SERVER['PHP_SELF']) !== false)
		{
			$_SESSION['start_record']	=	$_POST['goto_page'] ? (((int)$_POST['goto_page']-1) * $_POST['page_size']) : (isset($_GET['start']) ? (int)$_GET['start'] : ($_SESSION['start_record']?$_SESSION['start_record']:0));
		}
		else
			$_SESSION['start_record']	=	0;
	}
	#====================================================================================================
	#	Function Name		:	showPagination
	#----------------------------------------------------------------------------------------------------
	function showPagination($num_items, $add_prevnext_text = TRUE)
	{
		global $lang;
		$path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);
		$base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],"&start")===false?strlen($_SERVER['QUERY_STRING']):strpos($_SERVER['QUERY_STRING'],"&start"));
		$total_pages = ceil($num_items/$_SESSION['page_size']);

		if ( $total_pages == 1 )
			return '';
		$on_page = floor($_SESSION['start_record'] / $_SESSION['page_size']) + 1;
		$page_string = '';
		if ( $total_pages > 10 )
		{
			$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;
			for($i = 1; $i < $init_page_max + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '" >' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '\';document.forms[0].submit();" >' . $i . '</a>';
				if ( $i <  $init_page_max )
					$page_string .= ' ';
			}
			if ( $on_page > 1  && $on_page < $total_pages )
			{
				$page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';
				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;

				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '" >' . $i . '</a>';
//					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '\'; document.forms[0].submit();">' . $i . '</a>';
					if ( $i <  $init_page_max + 1 )
						$page_string .= ' ';
				}
				$page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
			}
			else
				$page_string .= ' ... ';

			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '">' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if( $i <  $total_pages )
					$page_string .= " ";
			}
		}
		else
		{
			for($i = 1; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '">' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if ( $i <  $total_pages )
						$page_string .= " ";
			}
		}
		if ( $add_prevnext_text )
		{
			if ( $on_page > 1 )
//				$page_string = ' <a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['page_size'] ) . '\'; document.forms[0].submit();">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
				$page_string = ' <a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['page_size'] ) . '">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
			else
				$page_string = '&nbsp;<font class="disabledText">Previous</font>&nbsp;' . $page_string;
			if ( $on_page < $total_pages )
//				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['page_size'] ) . '\';document.forms[0].submit();">' . "Next" . '</a>';
				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['page_size'] ) . '">' . "Next" . '</a>';
			else
				$page_string .= '&nbsp;<font class="disabledText">Next</font>&nbsp;';
		}
		return $page_string;
	}
	
	function showPaginationUser($num_items, $add_prevnext_text = TRUE)
	{

		global $lang;

		$path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);
		$base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],"&start")===false?strlen($_SERVER['QUERY_STRING']):strpos($_SERVER['QUERY_STRING'],"&start"));
		$total_pages = ceil($num_items/$_SESSION['user_page_size']);

		if ( $total_pages == 1 )

			return '';

		$on_page = floor($_SESSION['start_record'] / $_SESSION['user_page_size']) + 1;
		$page_string = '';
		if ( $total_pages > 10 )
		{
			$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;
			for($i = 1; $i < $init_page_max + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<li class="current"><a>' . $i . '</a></li>' : '<li class="other"><a class=pageLink href="'. $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '" >' . $i . '</a></li>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '\';document.forms[0].submit();" >' . $i . '</a>';
				if ( $i <  $init_page_max )
					$page_string .= ' ';
			}

			if ( $on_page > 1  && $on_page < $total_pages )
			{

				$page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';
				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;

				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<li class="current"><a>' . $i . '</a></li>' : '<li class="other"><a class=pageLink href="'. $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '" >' . $i . '</a></li>';
//					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '\'; document.forms[0].submit();">' . $i . '</a>';
					if ( $i <  $init_page_max + 1 )
						$page_string .= ' ';
				}
				$page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
			}
			else
				$page_string .= ' ... ';

			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<li class="current"><a>' . $i . '</a></li>'  : '<li class="other"><a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '">' . $i . '</a></li>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if( $i <  $total_pages )
					$page_string .= " ";
			}

		}
		else
		{
			for($i = 1; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<li class="current"><a>' . $i . '</a></li>' : '<li class="other"><a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '">' . $i . '</a></li>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if ( $i <  $total_pages )
						$page_string .= " ";
			}
		}
		if ( $add_prevnext_text )
		{
			if ( $on_page > 1 )
//				$page_string = ' <a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['user_page_size'] ) . '\'; document.forms[0].submit();">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
				$page_string = '<li class="prev"><a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['user_page_size'] ) . '">' . "&nbsp;" . '</a></li>' . $page_string;
			else
				$page_string = '<li class="prev"><a>&nbsp;</a></li>' . $page_string;
			if ( $on_page < $total_pages )
//				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . "Next" . '</a>';
				$page_string .= '<li class="next"><a class=pageLink href="' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['user_page_size'] ) . '">' . "&nbsp;" . '</a></li>';
			else
				$page_string .= '<li class="next"><a>&nbsp;</a></li>';
		}
		return $page_string;

	}
	/* original, above updated by Mike G
		
	function showPaginationUser($num_items, $add_prevnext_text = TRUE)
	{

		global $lang;

		$path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);
		$base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],"&start")===false?strlen($_SERVER['QUERY_STRING']):strpos($_SERVER['QUERY_STRING'],"&start"));
		$total_pages = ceil($num_items/$_SESSION['user_page_size']);

		if ( $total_pages == 1 )

			return '';

		$on_page = floor($_SESSION['start_record'] / $_SESSION['user_page_size']) + 1;
		$page_string = '';
		if ( $total_pages > 10 )
		{
			$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;
			for($i = 1; $i < $init_page_max + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '" >' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '\';document.forms[0].submit();" >' . $i . '</a>';
				if ( $i <  $init_page_max )
					$page_string .= ' ';
			}

			if ( $on_page > 1  && $on_page < $total_pages )
			{

				$page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';
				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;

				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '" >' . $i . '</a>';
//					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '\'; document.forms[0].submit();">' . $i . '</a>';
					if ( $i <  $init_page_max + 1 )
						$page_string .= ' ';
				}
				$page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
			}
			else
				$page_string .= ' ... ';

			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '">' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if( $i <  $total_pages )
					$page_string .= " ";
			}

		}
		else
		{
			for($i = 1; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '">' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if ( $i <  $total_pages )
						$page_string .= " ";
			}
		}
		if ( $add_prevnext_text )
		{
			if ( $on_page > 1 )
//				$page_string = ' <a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['user_page_size'] ) . '\'; document.forms[0].submit();">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
				$page_string = ' <a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['user_page_size'] ) . '">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
			else
				$page_string = '&nbsp;<font class="disabledText">Previous</font>&nbsp;' . $page_string;
			if ( $on_page < $total_pages )
//				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . "Next" . '</a>';
				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['user_page_size'] ) . '">' . "Next" . '</a>';
			else
				$page_string .= '&nbsp;<font class="disabledText">Next</font>&nbsp;';
		}
		return $page_string;

	}
	
*/	
	
	#====================================================================================================
	#	Function Name		:	showPagination
	#----------------------------------------------------------------------------------------------------
	function showPagination2($num_items, $add_prevnext_text = TRUE)
	{
		global $lang;
		$path_parts = pathinfo($_SERVER['PHP_SELF']);
//		print $path_parts["basename"];
		$base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],"&start")===false?strlen($_SERVER['QUERY_STRING']):strpos($_SERVER['QUERY_STRING'],"&start"));
		$total_pages = ceil($num_items/$_SESSION['page_size']);
//print $base_url;
		if ( $total_pages == 1 )
			return '';
		$on_page = floor($_SESSION['start_record'] / $_SESSION['page_size']) + 1;
		$page_string = '';
		if ( $total_pages > 10 )
		{
			$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;
			for($i = 1; $i < $init_page_max + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '" >' .'[' .$i.']' . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '\';document.forms[0].submit();" >' . $i . '</a>';
				if ( $i <  $init_page_max )
					$page_string .= ' ';
			}

			if ( $on_page > 1  && $on_page < $total_pages )
			{
				$page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';
				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;
				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '" >' .'[' .$i.']' . '</a>';
//					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] )  . '\'; document.forms[0].submit();">' . $i . '</a>';
					if ( $i <  $init_page_max + 1 )
						$page_string .= ' ';
				}
				$page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
			}
			else
				$page_string .= ' ... ';
			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '">' .'[' .$i.']' . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if( $i <  $total_pages )
					$page_string .= " ";
			}
		}
		else
		{
			for($i = 1; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '">' .'[' .$i.']' . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if ( $i <  $total_pages )
						$page_string .= " ";
			}
		}
		if ( $add_prevnext_text )
		{
			if ( $on_page > 1 )
//				$page_string = ' <a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['page_size'] ) . '\'; document.forms[0].submit();">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
				$page_string = ' <a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['page_size'] ) . '">' . "&laquo;" . '</a>&nbsp;&nbsp;' . $page_string;
			//else
				//$page_string = '&nbsp;<font class="disabledText">Previous</font>&nbsp;' . $page_string;

			if ( $on_page < $total_pages )
//				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['page_size'] ) . '\';document.forms[0].submit();">' . "Next" . '</a>';
				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['page_size'] ) . '">' . "&raquo;" . '</a>';
			//else
				//$page_string .= '&nbsp;<font class="disabledText">Next</font>&nbsp;';
		}
		return $page_string;
	}
	#====================================================================================================
	#	Function Name		:	fillArrayCombo
	#----------------------------------------------------------------------------------------------------
	function fillArrayCombo($arrName, $selected='')
	{
		$lstOption = "";
		reset($arrName);
		while(list($key,$val) = each($arrName))
		{	
			$lstOption .= "<option value=\"". $key. "\"";
			if($selected == (string)$key)
				$lstOption .= " selected ";
			$lstOption .= ">".$val. "</option>";
		}
		return $lstOption;
	}

	function showPaginationUser_HTML($num_items, $add_prevnext_text = TRUE)
	{

		global $lang;

		$path_parts = pathinfo($_SERVER['SCRIPT_FILENAME']);
		$new_base_url =  str_replace(".php",".html",$path_parts["basename"]);

//		$base_url = $path_parts["basename"] . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],"&start")===false?strlen($_SERVER['QUERY_STRING']):strpos($_SERVER['QUERY_STRING'],"&start"));
		$base_url = $new_base_url . "?" . substr($_SERVER['QUERY_STRING'], 0, strpos($_SERVER['QUERY_STRING'],"&start")===false?strlen($_SERVER['QUERY_STRING']):strpos($_SERVER['QUERY_STRING'],"&start"));
		
		$total_pages = ceil($num_items/$_SESSION['user_page_size']);

		if ( $total_pages == 1 )

			return '';

		$on_page = floor($_SESSION['start_record'] / $_SESSION['user_page_size']) + 1;

		$page_string = '';
		if ( $total_pages > 10 )
		{
			$init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;
			for($i = 1; $i < $init_page_max + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '" >' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url. "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '\';document.forms[0].submit();" >' . $i . '</a>';
				if ( $i <  $init_page_max )
					$page_string .= ' ';
			}

			if ( $on_page > 1  && $on_page < $total_pages )
			{

				$page_string .= ( $on_page > 5 ) ? ' ... ' : ', ';
				$init_page_min = ( $on_page > 4 ) ? $on_page : 5;
				$init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;

				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++)
				{
					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="'. $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '" >' . $i . '</a>';
//					$page_string .= ($i == $on_page) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] )  . '\'; document.forms[0].submit();">' . $i . '</a>';
					if ( $i <  $init_page_max + 1 )
						$page_string .= ' ';
				}
				$page_string .= ( $on_page < $total_pages - 4 ) ? ' ... ' : ', ';
			}
			else
				$page_string .= ' ... ';

			for($i = $total_pages - 2; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '">' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>'  : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if( $i <  $total_pages )
					$page_string .= " ";
			}

		}
		else
		{
			for($i = 1; $i < $total_pages + 1; $i++)
			{
				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="' . $base_url ."/ ". ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '">' . $i . '</a>';
// new				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '">' . $i . '</a>';
//				$page_string .= ( $i == $on_page ) ? '<font class=activePage>' . $i . '</font>' : '<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $i - 1 ) * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . $i . '</a>';
				if ( $i <  $total_pages )
						$page_string .= " ";
			}
		}
		if ( $add_prevnext_text )
		{
			if ( $on_page > 1 )
//				$page_string = ' <a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['user_page_size'] ) . '\'; document.forms[0].submit();">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
				$page_string = ' <a class=pageLink href="' . $base_url . "&amp;start=" . ( ( $on_page - 2 ) * $_SESSION['user_page_size'] ) . '">' . "Previous" . '</a>&nbsp;&nbsp;' . $page_string;
			else
				$page_string = '&nbsp;<font class="disabledText">Previous</font>&nbsp;' . $page_string;
			if ( $on_page < $total_pages )
//				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="javascript: document.forms[0].action=\'' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['user_page_size'] ) . '\';document.forms[0].submit();">' . "Next" . '</a>';
				$page_string .= '&nbsp;&nbsp;<a class=pageLink href="' . $base_url . "&amp;start=" . ( $on_page * $_SESSION['user_page_size'] ) . '">' . "Next" . '</a>';
			else
				$page_string .= '&nbsp;<font class="disabledText">Next</font>&nbsp;';
		}
		return $page_string;

	}

}

?>