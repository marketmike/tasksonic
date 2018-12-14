<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$Site_Title} - Content Experiment Version II Homepage</title>
	<meta name="title" 			content="{$Meta_Title}">
	<meta name="description" 	content="{$Meta_Description}">
	<meta name="keywords" 		content="{$Meta_Keyword}">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="{$Templates_CSS}reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="{$Templates_CSS}main.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="{$Templates_CSS}sifr.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="{$Templates_CSS}960-grid.css" />	
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="{$Templates_CSS}main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="{$Templates_CSS}style2.css" />
	<link rel="stylesheet" media="print" type="text/css" href="{$Templates_CSS}print.css" />
	<script type='text/javascript' src='{$Templates_JS}jquery.min.js'></script>
	{if !$hidemap} 
	<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
	{/if}	
	{if $smarty.session.User_Name}
	{if !$hidemap} 	
	<script src="{$Site_URL}/generate_map_recent.php" type="text/javascript"></script>
	{/if}
	{else}
	<script src="{$Site_URL}/recent-all.js" type="text/javascript"></script>
	{/if}	

	<script src="{$Templates_JS}tabbedContent.js" type="text/javascript"></script>
	<script src="{$Templates_JS}csspopup.js" type="text/javascript"></script>

	<script language="javascript" src="{$Templates_JS}validate.js"></script>
	
	<script language="javascript" src="{$Templates_JS}sifr.js"></script>
	<script language="javascript" src="{$Templates_JS}sifr-config.js"></script>
	<script language="javascript" src="{$Templates_JS}functions.js"></script>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>

    {section name=FileName loop=$JavaScript}
    <script language="javascript" src="{$Templates_JS}{$JavaScript[FileName]}"></script>
	{/section}			
</head>

<body onUnload="GUnload()">
	{if !$smarty.session.User_Name}
	{php}
	$referrer = $_GET['ref'];
	{/php}
	{/if}	
<!-- facebook connect -->
<div id="fb-root"></div>

{literal}
    <script type="text/javascript">
    fbconnect_login = function(session)
    {
      fbconnect_login.allow = true;
      if(session/* || FB.getSession()*/)  { window.location = "/fblogin.php?ref={/literal}{php}echo $referrer;{/php}{literal}"; }
      else { FB.login(function(response) { if(response.authResponse) fbconnect_login(response.authResponse); }, { scope:'email,publish_stream,sms,publish_checkins,user_birthday,user_about_me,user_location,offline_access' }); }
    }
    
    window.fbAsyncInit = function() {
      FB.init({appId: '{/literal}{$fb_app_id}{literal}', status: true, cookie: true, xfbml: true, oauth:true});
      FB.Event.subscribe('auth.sessionChange', function(response) {
        
        if (fbconnect_login.allow && response.authResponse) { fbconnect_login(response.authResponse); }
        
        
      });
    };

    </script>
{/literal}
<!-- end facebook connect -->
<!-- Check query params for login errors -->
{if $smarty.session.login_error == 1}
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">The User Name Entered Can Not Be Found In Our System<span class="close">Close</span></div></div>
{php}$_SESSION['login_error']='';{/php}
{/if}
{if $smarty.session.login_error == 2}
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">The Account Associated With That User Name Is Inactive<span class="close">Close</span></div></div>
{php}$_SESSION['login_error']='';{/php}
{/if}
{if $smarty.session.login_error == 3}
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">The User Name And Password Combinaton You Entered Is Incorrect<span class="close">Close</span></div></div>
{php}$_SESSION['login_error']='';{/php}
{/if}
{if $smarty.session.login_error == 4}
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">User Name And Password Fields Can Not Be Blank<span class="close">Close</span></div></div>
{php}$_SESSION['login_error']='';{/php}
{/if}
{if $smarty.session.login_error == 5}
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">Login Failed - The Facebook Email Is Associated With An Account Termporarily Suspended<span class="close">Close</span></div></div>
{php}$_SESSION['login_error']='';{/php}
{/if}
<!-- End check query params for login errors -->
<!-- Global Success and Error Messages -->  
{if $ERROR}
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">{$ERROR}<span class="close">Close</span></div></div> 
{/if}
{if $sucmsg}
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg">{$sucmsg}<span class="close">Close</span></div></div>
{/if}
<!-- Global Success and Error Messages -->
 
<!-- Pop Up Div -->
<div id="blanket" style="display:none;"></div>
<div id="popUpDiv" style="display:none; font-size:12px;">
<a name="aici"></a>
<div align=right>
<a href="#" style='text-decoration:none;' onclick="popup('popUpDiv')"><font color=black>Click Here To Close</font> <img src="{$Site_URL}/images/close.png" border="0" align="absmiddle" /></a><br>
</div><div align=center>

<img src="{$site_url}/images/logo.png" />
<br>
<br>You need to <a href="signup.php"><strong><font color="black">register</font></strong></a> or <a href="#" onclick="popup('loginDiv'),popup('popUpDiv')" ><strong><font color="black">login</font></strong></a> in order to use this feature.
	<div style="text-align:center;margin:0 auto;margin-top:10px;margin-bottom:10px">
	Have a facebook account?<br />	
	<a href="#" onClick="fbconnect_login();popup('loginDiv'); return false;"><img src="{$Site_URL}/images/connect_fb.png" style="vertical-align:middle;margin-right:5px;"/></a>	
	</div>
</div>
</div>
<!-- End Pop Up Div -->
<!-- Pop Up Div For City Selection -->
<div id="popUpDivCity" style="display:none; font-size:12px;">
<a name="aici"></a>
<div align="right">
<a href="#" style='text-decoration:none;' onclick="popup('popUpDivCity')"><font color="black">Click Here To Close</font> <img src="{$Site_URL}/images/close.png" border="0" align="absmiddle" /></a><br>
</div>
<div align="center">
<img src="{$site_url}/images/logo.png" />
<br><br>
<div class="clear"></div>
<div style="position:relative;width:230px;margin:0 auto;">{include file="$T_City2"}<div class="clear"></div></div>
<div class="clear"></div>
<br><br>
<div>Task Sonic Is City Driven, Please Select A City From the List</div>
</div>
</div>
<!-- End Pop Up Div -->
<!-- Login Popup-->
<div id="loginDiv" style='display:none'>
<a name="aici"></a>
<div style="text-align:right;margin-bottom:10px;">
<a href="#" style='text-decoration:none;' onclick="popup('loginDiv')"><font color="black">Click Here To Close</font> <img src="{$Site_URL}/images/close.png" border="0" align="absmiddle" /></a>
</div>
<div align="center" width="300">
	<strong>Have an account? Please Sign in!</strong><br /><br />
	<form method="post" name="frmLogin" id="signin" action="login.php?ref={php}echo $referrer;{/php}">
	<strong>Username:</strong> <input id="username" name="user_id" value="" title="username" tabindex="154" type="text"><br /><br />
	<strong>Password:</strong> <input id="password" name="password" value="" title="password" tabindex="155" type="password"><br /><br />
	<div class="button-center">
	<button id="signin_submit" name="Submit" value="LOGIN" tabindex="156" type="submit">LOGIN</button>
	</div>
	</form>
	<br />							
	Don't have an account? <a href="{$Site_URL}/signup.php" id="nav-active">Register</a>
	<br />
	Forgot your username? <a href="{$Site_URL}/forgotusername.html" id="nav-active">Get It!</a>
	|
	Forgot your password? <a href="{$Site_URL}/forgotpasswd.html" id="nav-active">Recover It!</a>
	<div style="text-align:center;margin:0 auto;margin-top:10px;margin-bottom:10px">
	Have a facebook account?<br />	
	<a href="#" onClick="fbconnect_login();popup('loginDiv'); return false;"><img src="{$Site_URL}/images/connect_fb.png" style="vertical-align:middle;margin-right:5px;"/></a>	
	</div>
</div>
</div>
<!-- End Login Popup-->
<!-- My Account Menue JS -->
{literal}
<script>
$(document).ready(function(){

	//Hide (Collapse) the toggle containers on load
	$(".myaccount_menu").hide(); 

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$("a.account").click(function(){
		$('.myaccount_menu').toggleClass("active").slideToggle("slow");
		return false; //Prevent the browser jump to the link anchor
	});
    jQuery("div:not(#task_city_change)").click(function() {
        jQuery('#task_city_list').css('display', 'none')
    });
    jQuery('#task_city_change').click(function() {
        return ! jQuery('#task_city_list').toggle()
    });
    jQuery("div:not(#task_city_change2)").click(function() {
        jQuery('#task_city_list2').css('display', 'none')
    });
    jQuery('#task_city_change2').click(function() {
        return ! jQuery('#task_city_list2').toggle()
    });
    jQuery('#sysmsg-error span.close').click(function() {
        return ! jQuery('#sysmsg-error').remove()
    });
    jQuery('#sysmsg-success span.close').click(function() {
        return ! jQuery('#sysmsg-success').remove()
    });
	
});
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}
{/literal}
{if !$hidemap}
{literal}
addLoadEvent(init_maprecent);
{/literal}
{/if}
{literal}
</script>
{/literal}
<!-- End My Account Mennue JS -->
<!-- Header Postion of Template Begins Here -->
<div id="doc">
<div id="hdw">
<div id="hdw_top">
<div id="hdw_wrapper">
                <div class="top_menu_right" >					
                    <div class="top_sub_menu">
					<div class="sub_left"></div>
                        <div class="sub_center">
							{if $smarty.session.User_Name}			
							<a href="{$Site_URL}/logout.php" class="link" style="float:left;">Logout</a>
							{php}if ($fb_connect = Get_FB_ID($_SESSION['User_Name'])):{/php}<img id="image" src="https://graph.facebook.com/{php}echo $fb_connect;{/php}/picture" width="30" style="vertical-align:middle;float:left;" /> {php} endif; {/php} <a href="{$Site_URL}/my-account.html" class="account link" style="float:left;">Account&nbsp;<img alt="" src="{$Site_URL}/images/sub_arrow.png"></a>					
							{/if}
							{if !$smarty.session.User_Name}			
							<a href="#" onclick="popup('loginDiv')" class="link" style="float:left;">Login</a>
							<a href="http://www.tasksonic.com/signup.php" class="link" style="float:left;">Register</a>
							{/if}
							{if !$smarty.session.User_Name}			
							<a href="#" onclick="popup('popUpDiv')" class="link nobg" style="float:left;">FAQ</a>
							{else}
							<a href="{$Site_URL}/faq.html" class="link" style="float:left;">FAQ</a> 							
							{/if}														
							{if !$smarty.session.User_Name}			
							<a href="#" onclick="popup('popUpDiv')" class="link" style="float:left;">Contact</a>
							{else}
							<a href="{$Site_URL}/contact_us.html" class="link" style="float:left;">Contact</a>							
							{/if}
							{if !$smarty.session.User_Name}			
							<a href="#" onclick="popup('popUpDiv')" class="link nobg" style="float:left;">RSS</a>
							{else}
							<a href="{$Site_URL}/tasks_feed.xml" class="link nobg" style="float:left;"  target="blank">RSS</a>							
							{/if}							
                            <div class="clear"></div>
							{if $smarty.session.User_Name}	
                            <div class="myaccount_menu" style="display:none;">
                                <ul>
								<li style="font-size:24px"><a href="{$Site_URL}/my-account.html" style="text-decoration:none;">My Account</a></li>
								<li style="border-bottom:1px solid #fff;color:#fff"><strong>Quick Links</strong></li>
								<li><a href="{$Site_URL}/task_owner_profile_{$smarty.session.User_Name}.html" style="text-decoration:none;">My Task Owner Profile</a></li>
								<li><a href="{$Site_URL}/tasker_profile_{$smarty.session.User_Name}.html" style="text-decoration:none;">My Tasker Profile</a></li>								
								<li><a href="{$Site_URL}/post-new-task.html"  style="text-decoration:none;">Post Task</a></li>
								<li><a href="{$Site_URL}/my-posted-tasks.html"    style="text-decoration:none;">My Posted Tasks</a></li>
								<li><a href="{$Site_URL}/my-assigned-tasks.html"   style="text-decoration:none;">My Assigned Tasks</a></li>
								<li><a href="{$Site_URL}/membership.php"  style="text-decoration:none;">VIP Membership</a></li>
								<li><a href="{$Site_URL}/my-escrow-payments.html"   style="text-decoration:none;">My Escrow Payments</a></li>	
								<li><a href="{$Site_URL}/my-transactions.html"   style="text-decoration:none;">Transaction History</a></li>									
								</ul>
                                <div class="sub_dropdown_bottom_little"></div>
                            </div>
							{/if}
                        </div>
					<div class="sub_right"></div>	
                    </div>
                </div>				
</div><!-- hdw_wrapper-->
</div><!-- hdw_top-->
</div><!-- hdw-->				
<!-- Header Postion of Template Ends Here -->
<div id="hdw_center">
<!-- 940 Grid 12 column Starts Here-->			
<div class="container_12">
    <!-- Header -->
    <div id="header">
        <div id="logo"><a href="{$Site_URL}" title="[Go to homepage]"><img src="{$Site_URL}/images/logo.png" alt="" /></a></div>
        <hr class="noscreen" />
        <!-- Quick Navigation -->
        <div id="nav">
					{if $smarty.session.User_Name}	
					{include file="$T_City"}
					 <div class="buttons-tall" style="float:right;margin-right:5px;margin-left:10px;">
						<form method="post" action="search_tasks.php"> 
						<input name="search_this" type="text" style="background:url({$Site_URL}/templates/images/search_box.png); width:213px; padding-left:5px;padding-right:5px;height:31px; border:0px solid #000000;  margin:7px 0px;line-height:31px;vertical-align:middle;" /><input name="findnow" type="image" id="findnow" src="{$Site_URL}/templates/images/search_button.png" value="Find Now!" style="margin-left:10px;margin-bottom:0px;vertical-align:middle;height:30px;" />
						</form>
					</div>
					{else}
					<div id="task-location">				
					<div id="task_city_change_text" class="change">
						<a href="{$Site_URL}/signup.php"  style="text-decoration:none;"><span>FREE TO JOIN</span></a>
					</div>
					</div>					
					 <div class="buttons-tall" style="float:right;margin-right:5px;margin-left:10px;">
						<form method="post" action="search_tasks.php"> 
						<input name="search_this" type="text" style="background:url({$Site_URL}/templates/images/search_box.png); width:213px; padding-left:5px;padding-right:5px;height:31px; border:0px solid #000000;  margin:7px 0px;line-height:31px;vertical-align:middle;" /><input name="findnow" type="image" id="findnow" src="{$Site_URL}/templates/images/search_button.png" value="Find Now!" style="margin-left:10px;margin-bottom:0px;vertical-align:middle;height:30px;" />
						</form>
					</div>				
					 {/if}	  
        </div> <!-- /Quick Navigation-->
		<div class="clear"></div>
		{include file="$T_Stats"}
    </div> <!-- /header -->
	</div><!-- end .container_12 -->
  <div class="clear"></div>
  <div class="container_12">
   <div id="hd">
	<div class="top_bg_nav_left1"></div>
	<div class="top_bg_nav_center1">
	 <div class="clear"></div>
			<ul class="mainnav cf">
            	<li><a href="{$Site_URL}/home.html"><span {if $nav_select == home}class="selected"{/if}>Home</span></a>&nbsp;|&nbsp;</li>
				{if $smarty.session.User_Name}
                <li><a href="{$Site_URL}/latest-open-tasks.html"><span {if $nav_select == latest}class="selected"{/if}>Open</span></a>&nbsp;|&nbsp;</li>
				{else}
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Open</span></a>&nbsp;|&nbsp;</li>				
				{/if}
				{if $smarty.session.User_Name}
                <li><a href="{$Site_URL}/latest-online-tasks.html"><span {if $nav_select == online}class="selected"{/if}>Online</span></a>&nbsp;|&nbsp;</li>
				{else}
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Online</span></a>&nbsp;|&nbsp;</li>				
				{/if}				
				{if $smarty.session.User_Name}
                <li><a href="{$Site_URL}/task-categories.html"><span {if $nav_select == categories}class="selected"{/if}>Categories</span></a>&nbsp;|&nbsp;</li>
				{else}
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Categories</span></a>&nbsp;|&nbsp;</li>				
				{/if}
				{if $smarty.session.User_Name}
                <li><a href="{$Site_URL}/completed-tasks.html"><span {if $nav_select == completed}class="selected"{/if}>Completed</span></a>&nbsp;|&nbsp;</li>			
				{/if}				
				{if $smarty.session.User_Name}
                <li><a href="{$Site_URL}/tasker_category_list.php"><span {if $nav_select == find}class="selected"{/if}>Find Taskers</span></a>&nbsp;|&nbsp;</li>
				{else}
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Find Taskers</span></a>&nbsp;|&nbsp;</li>				
				{/if}				
				{if !$smarty.session.User_Name}
				<li><a href="{$Site_URL}/signup.php"><span {if $nav_select == join}class="selected"{/if}>Signup</span></a></li>
				{/if}
				{if $smarty.session.User_Name}
                <li><a href="{$Site_URL}/all_portfolio.php"><span {if $nav_select == portfolio}class="selected"{/if}>Portfolios</span></a></li>				
				{/if}				
			</ul>			
	</div>
	<div class="top_bg_nav_right1"></div>
	<div class="clear"></div> 	
	</div> <!-- end hd -->
	<div id="share_buttons">	   
	   {if !$smarty.session.User_Name}
		  <span style="margin-left:5px;margin-right:5px;color:#fff;font-weight:bold">Invite:</span>
		  <a onclick="popup('popUpDiv')" href=#><img border="0"  style="vertical-align:middle;margin-right:3px;" src="{$Site_URL}/images/emailicon.png" width="27" /></a>
		  <span style="margin-left:0px;margin-right:5px;color:#fff;font-weight:bold">Share:</span>						  
		  <a onclick="popup('popUpDiv')" href=#><img border="0" style="vertical-align:middle;margin-right:3px;" src="{$Site_URL}/images/facebook.png" /></a>
		  <a onclick="popup('popUpDiv')" href=#><img border="0"  style="vertical-align:middle;margin-right:3px;" src="{$Site_URL}/images/twitter.png" /></a>				  
	  {/if}
	  {if $smarty.session.User_Name}
		  <span style="margin-left:5px;margin-right:5px;color:#000;font-weight:bold">Invite:</span>		
		  <a href="{$Site_URL}/share_earn.html"><img border="0" style="vertical-align:middle;margin-right:3px;" src="{$Site_URL}/images/emailicon.png" /></a>
		  <span style="margin-left:0px;margin-right:5px;color:#000;font-weight:bold">Share:</span>					  
		  <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=Check out {$Site_Title} and see how you can get things done fast!&amp;p[summary]=Task Sonic - Connecting People Who Need Things Done With People Willing To Help!&amp;p[url]={$Site_URL|urlencode}%3Finvitation_id={$smarty.session.User_Id}&amp;&p[images][0]={$Site_URL}/images/logo.png>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><img border="0" style="vertical-align:middle;margin-right:8px;" src="{$Site_URL}/images/facebook.png" /></a>
		  <a onClick="window.open('http://twitter.com/share?url={$Site_URL|urlencode}%3Finvitation_id={$smarty.session.User_Id}&text={$Site_Title} - Get the help you need or earn money helping others at {$Site_Title}&related=tasksonic', 'twtsharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
		  <img border="0"  style="vertical-align:middle;margin-right:10px;" src="{$Site_URL}/images/twitter.png" />
		  </a>				  
	  {/if}
	</div>
	<div class="clear"></div> 	
  </div><!-- end .container_12 -->
</div>  
<div class="clear"></div>
<div id="bdw">		
	<div class="container_12">
	  <!-- Content Starts Here-->
	  {include file="$T_Body"}
	  <!-- Content Ends Here-->	
	</div>  
</div>		  
  <div class="clear"></div>
  <div id="ftw">
			<!-- FOOTER BG STARTS HERE -->
			{include file="$T_Footer"}
			<!-- FOOTER BG ENDS HERE -->
  </div> <!-- End FTW--> 
  <div class="clear"></div>  
</div><!-- end .container_16 -->
<!-- 940 Grid 12 column ends here-->
</div><!-- doc ends here-->
</body>
</html>