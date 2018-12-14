<?php /* Smarty version 2.6.26, created on 2012-08-20 22:10:56
         compiled from default_layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', 'default_layout.tpl', 369, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php echo $this->_tpl_vars['Site_Title']; ?>
</title>
	<meta name="title" content="<?php echo $this->_tpl_vars['Meta_Title']; ?>
">
	<meta name="description" content="<?php echo $this->_tpl_vars['Meta_Description']; ?>
">
	<meta name="keywords" content="<?php echo $this->_tpl_vars['Meta_Keyword']; ?>
">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
main.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
sifr.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
960-grid.css" />	
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
style2.css" />
	<link rel="stylesheet" media="print" type="text/css" href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
print.css" />
	<script type='text/javascript' src='<?php echo $this->_tpl_vars['Templates_JS']; ?>
jquery.min.js'></script>
	<?php if (! $this->_tpl_vars['hidemap']): ?> 
	<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
	<?php endif; ?>	
	<?php if ($_SESSION['User_Name']): ?>
	<?php if (! $this->_tpl_vars['hidemap']): ?> 	
	<script src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/generate_map_recent.php" type="text/javascript"></script>
	<?php endif; ?>
	<?php else: ?>
	<script src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/recent-all.js" type="text/javascript"></script>
	<?php endif; ?>	

	<script src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
tabbedContent.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
csspopup.js" type="text/javascript"></script>

	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
validate.js"></script>
	
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
sifr.js"></script>
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
sifr-config.js"></script>
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
functions.js"></script>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>

    <?php unset($this->_sections['FileName']);
$this->_sections['FileName']['name'] = 'FileName';
$this->_sections['FileName']['loop'] = is_array($_loop=$this->_tpl_vars['JavaScript']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['FileName']['show'] = true;
$this->_sections['FileName']['max'] = $this->_sections['FileName']['loop'];
$this->_sections['FileName']['step'] = 1;
$this->_sections['FileName']['start'] = $this->_sections['FileName']['step'] > 0 ? 0 : $this->_sections['FileName']['loop']-1;
if ($this->_sections['FileName']['show']) {
    $this->_sections['FileName']['total'] = $this->_sections['FileName']['loop'];
    if ($this->_sections['FileName']['total'] == 0)
        $this->_sections['FileName']['show'] = false;
} else
    $this->_sections['FileName']['total'] = 0;
if ($this->_sections['FileName']['show']):

            for ($this->_sections['FileName']['index'] = $this->_sections['FileName']['start'], $this->_sections['FileName']['iteration'] = 1;
                 $this->_sections['FileName']['iteration'] <= $this->_sections['FileName']['total'];
                 $this->_sections['FileName']['index'] += $this->_sections['FileName']['step'], $this->_sections['FileName']['iteration']++):
$this->_sections['FileName']['rownum'] = $this->_sections['FileName']['iteration'];
$this->_sections['FileName']['index_prev'] = $this->_sections['FileName']['index'] - $this->_sections['FileName']['step'];
$this->_sections['FileName']['index_next'] = $this->_sections['FileName']['index'] + $this->_sections['FileName']['step'];
$this->_sections['FileName']['first']      = ($this->_sections['FileName']['iteration'] == 1);
$this->_sections['FileName']['last']       = ($this->_sections['FileName']['iteration'] == $this->_sections['FileName']['total']);
?>
    <script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
<?php echo $this->_tpl_vars['JavaScript'][$this->_sections['FileName']['index']]; ?>
"></script>
	<?php endfor; endif; ?>			
</head>

<body onUnload="GUnload()">
	<?php if (! $_SESSION['User_Name']): ?>
	<?php 
	$referrer = $_GET['ref'];
	 ?>
	<?php endif; ?>	
<!-- facebook connect -->
<div id="fb-root"></div>

<?php echo '
    <script type="text/javascript">
    fbconnect_login = function(session)
    {
      fbconnect_login.allow = true;
      if(session/* || FB.getSession()*/)  { window.location = "/fblogin.php?ref='; ?>
<?php echo $referrer; ?><?php echo '"; }
      else { FB.login(function(response) { if(response.authResponse) fbconnect_login(response.authResponse); }, { scope:\'email,publish_stream,sms,publish_checkins,user_birthday,user_about_me,user_location,offline_access\' }); }
    }
    
    window.fbAsyncInit = function() {
      FB.init({appId: \''; ?>
<?php echo $this->_tpl_vars['fb_app_id']; ?>
<?php echo '\', status: true, cookie: true, xfbml: true, oauth:true});
      FB.Event.subscribe(\'auth.sessionChange\', function(response) {
        
        if (fbconnect_login.allow && response.authResponse) { fbconnect_login(response.authResponse); }
        
        
      });
    };

    </script>
'; ?>

<!-- end facebook connect -->
<!-- Check query params for login errors -->
<?php if ($_SESSION['login_error'] == 1): ?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">The User Name Entered Can Not Be Found In Our System<span class="close">Close</span></div></div>

<?php endif; ?>
<?php if ($_SESSION['login_error'] == 2): ?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">The Account Associated With That User Name Is Inactive<span class="close">Close</span></div></div>

<?php endif; ?>
<?php if ($_SESSION['login_error'] == 3): ?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">The User Name And Password Combinaton You Entered Is Incorrect<span class="close">Close</span></div></div>

<?php endif; ?>
<?php if ($_SESSION['login_error'] == 4): ?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">User Name And Password Fields Can Not Be Blank<span class="close">Close</span></div></div>

<?php endif; ?>
<?php if ($_SESSION['login_error'] == 5): ?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg">Login Failed - The Facebook Email Is Associated With An Account Termporarily Suspended<span class="close">Close</span></div></div>

<?php endif; ?>
<!-- End check query params for login errors -->
<!-- Global Success and Error Messages -->  
<?php if ($this->_tpl_vars['ERROR']): ?>
<div class="sysmsgw" id="sysmsg-error"><div class="sysmsg"><?php echo $this->_tpl_vars['ERROR']; ?>
<span class="close">Close</span></div></div> 
<?php endif; ?>
<?php if ($this->_tpl_vars['sucmsg']): ?>
<div class="sysmsgw" id="sysmsg-success"><div class="sysmsg"><?php echo $this->_tpl_vars['sucmsg']; ?>
<span class="close">Close</span></div></div>
<?php endif; ?>
<!-- Global Success and Error Messages -->
 
<!-- Pop Up Div -->
<div id="blanket" style="display:none;"></div>
<div id="popUpDiv" style="display:none; font-size:12px;">
<a name="aici"></a>
<div align=right>
<a href="#" style='text-decoration:none;' onclick="popup('popUpDiv')"><font color=black>Click Here To Close</font> <img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/close.png" border="0" align="absmiddle" /></a><br>
</div><div align=center>

<img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/logo_dark.png" />
<br>
<br>You need to <a href="signup.php"><strong><font color="black">register</font></strong></a> or <a href="#" onclick="popup('loginDiv'),popup('popUpDiv')" ><strong><font color="black">login</font></strong></a> in order to use this feature.
	<div style="text-align:center;margin:0 auto;margin-top:10px;margin-bottom:10px">
	Have a facebook account?<br />	
	<a href="#" onClick="fbconnect_login();popup('loginDiv'); return false;"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/connect_fb.png" style="vertical-align:middle;margin-right:5px;"/></a>	
	</div>
</div>
</div>
<!-- End Pop Up Div -->
<!-- Pop Up Div For City Selection -->
<div id="popUpDivCity" style="display:none; font-size:12px;">
<a name="aici"></a>
<div align="right">
<a href="#" style='text-decoration:none;' onclick="popup('popUpDivCity')"><font color="black">Click Here To Close</font> <img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/close.png" border="0" align="absmiddle" /></a><br>
</div>
<div align="center">
<img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/logo.png" />
<br><br>
<div class="clear"></div>
<div style="position:relative;width:230px;margin:0 auto;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_City2']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><div class="clear"></div></div>
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
<a href="#" style='text-decoration:none;' onclick="popup('loginDiv')"><font color="black">Click Here To Close</font> <img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/close.png" border="0" align="absmiddle" /></a>
</div>
<div align="center" width="300">
	<strong>Have an account? Please Sign in!</strong><br /><br />
	<form method="post" name="frmLogin" id="signin" action="login.php?ref=<?php echo $referrer; ?>">
	<strong>Username:</strong> <input id="username" name="user_id" value="" title="username" tabindex="154" type="text"><br /><br />
	<strong>Password:</strong> <input id="password" name="password" value="" title="password" tabindex="155" type="password"><br /><br />
	<div class="button-center">
	<button id="signin_submit" name="Submit" value="LOGIN" tabindex="156" type="submit">LOGIN</button>
	</div>
	</form>
	<br />							
	Don't have an account? <a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/signup.php" id="nav-active">Register</a>
	<br />
	Forgot your username? <a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/forgotusername.html" id="nav-active">Get It!</a>
	|
	Forgot your password? <a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/forgotpasswd.html" id="nav-active">Recover It!</a>
	<div style="text-align:center;margin:0 auto;margin-top:10px;margin-bottom:10px">
	Have a facebook account?<br />	
	<a href="#" onClick="fbconnect_login();popup('loginDiv'); return false;"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/connect_fb.png" style="vertical-align:middle;margin-right:5px;"/></a>	
	</div>
</div>
</div>
<!-- End Login Popup-->
<!-- My Account Menue JS -->
<?php echo '
<script>
$(document).ready(function(){

	//Hide (Collapse) the toggle containers on load
	$(".myaccount_menu").hide(); 

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$("a.account").click(function(){
		$(\'.myaccount_menu\').toggleClass("active").slideToggle("slow");
		return false; //Prevent the browser jump to the link anchor
	});
    jQuery("div:not(#task_city_change)").click(function() {
        jQuery(\'#task_city_list\').css(\'display\', \'none\')
    });
    jQuery(\'#task_city_change\').click(function() {
        return ! jQuery(\'#task_city_list\').toggle()
    });
    jQuery("div:not(#task_city_change2)").click(function() {
        jQuery(\'#task_city_list2\').css(\'display\', \'none\')
    });
    jQuery(\'#task_city_change2\').click(function() {
        return ! jQuery(\'#task_city_list2\').toggle()
    });
    jQuery(\'#sysmsg-error span.close\').click(function() {
        return ! jQuery(\'#sysmsg-error\').remove()
    });
    jQuery(\'#sysmsg-success span.close\').click(function() {
        return ! jQuery(\'#sysmsg-success\').remove()
    });
	
});
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != \'function\') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}
'; ?>

<?php if (! $this->_tpl_vars['hidemap']): ?>
<?php echo '
addLoadEvent(init_maprecent);
'; ?>

<?php endif; ?>
<?php echo '
</script>
'; ?>

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
							<?php if ($_SESSION['User_Name']): ?>			
							<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/logout.php" class="link" style="float:left;">Logout</a>
							<?php if ($fb_connect = Get_FB_ID($_SESSION['User_Name'])): ?><img id="image" src="https://graph.facebook.com/<?php echo $fb_connect; ?>/picture" width="30" style="vertical-align:middle;float:left;" /> <?php  endif;  ?> <a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/my-account.html" class="account link" style="float:left;">Account&nbsp;<img alt="" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/sub_arrow.png"></a>					
							<?php endif; ?>
							<?php if (! $_SESSION['User_Name']): ?>			
							<a href="#" onclick="popup('loginDiv')" class="link" style="float:left;">Login</a>
							<a href="http://www.tasksonic.com/signup.php" class="link" style="float:left;">Register</a>
							<?php endif; ?>
							<?php if (! $_SESSION['User_Name']): ?>			
							<a href="#" onclick="popup('popUpDiv')" class="link nobg" style="float:left;">FAQ</a>
							<?php else: ?>
							<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/faq.html" class="link" style="float:left;">FAQ</a> 							
							<?php endif; ?>														
							<?php if (! $_SESSION['User_Name']): ?>			
							<a href="#" onclick="popup('popUpDiv')" class="link" style="float:left;">Contact</a>
							<?php else: ?>
							<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/contact_us.html" class="link" style="float:left;">Contact</a>							
							<?php endif; ?>
							<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/tasks_feed.xml" class="link nobg" style="float:left;"  target="blank">RSS</a>													
                            <div class="clear"></div>
							<?php if ($_SESSION['User_Name']): ?>	
                            <div class="myaccount_menu" style="display:none;">
                                <ul>
								<li style="font-size:24px"><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/my-account.html" style="text-decoration:none;">My Account</a></li>
								<li style="border-bottom:1px solid #fff;color:#fff"><strong>Quick Links</strong></li>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/task_owner_profile_<?php echo $_SESSION['User_Name']; ?>
.html" style="text-decoration:none;">My Task Owner Profile</a></li>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/tasker_profile_<?php echo $_SESSION['User_Name']; ?>
.html" style="text-decoration:none;">My Tasker Profile</a></li>								
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/post-new-task.html"  style="text-decoration:none;">Post Task</a></li>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/my-posted-tasks.html"    style="text-decoration:none;">My Posted Tasks</a></li>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/my-assigned-tasks.html"   style="text-decoration:none;">My Assigned Tasks</a></li>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/membership.php"  style="text-decoration:none;">VIP Membership</a></li>
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/my-escrow-payments.html"   style="text-decoration:none;">My Escrow Payments</a></li>	
								<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/my-transactions.html"   style="text-decoration:none;">Transaction History</a></li>									
								</ul>
                                <div class="sub_dropdown_bottom_little"></div>
                            </div>
							<?php endif; ?>
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
        <div id="logo"><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
" title="[Go to homepage]"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/logo.png" alt="" /></a></div>
        <hr class="noscreen" />
        <!-- Quick Navigation -->
        <div id="nav">
					<?php if ($_SESSION['User_Name']): ?>	
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_City']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					 <div class="buttons-tall" style="float:right;margin-right:5px;margin-left:10px;">
						<form method="post" action="search_tasks.php"> 
						<input name="search_this" type="text" style="background:url(<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/search_box.png); width:213px; padding-left:5px;padding-right:5px;height:31px; border:0px solid #000000;  margin:7px 0px;line-height:31px;vertical-align:middle;" /><input name="findnow" type="image" id="findnow" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/search_button.png" value="Find Now!" style="margin-left:10px;margin-bottom:0px;vertical-align:middle;height:30px;" />
						</form>
					</div>
					<?php else: ?>
					<div id="task-location">				
					<div id="task_city_change_text" class="change">
						<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/signup.php"  style="text-decoration:none;"><span>FREE TO JOIN</span></a>
					</div>
					</div>					
					 <div class="buttons-tall" style="float:right;margin-right:5px;margin-left:10px;">
						<?php if (! $_SESSION['User_Name']): ?>
						<input name="search_this" type="text" style="background:url(<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/search_box.png); width:213px; padding-left:5px;padding-right:5px;height:31px; border:0px solid #000000;  margin:7px 0px;line-height:31px;vertical-align:middle;" /><input onclick="popup('popUpDiv')" name="findnow" type="image" id="findnow" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/search_button.png" value="Find Now!" style="margin-left:10px;margin-bottom:0px;vertical-align:middle;height:30px;" />	
						<?php else: ?>
						<form method="post" action="search_tasks.php">
						<input name="search_this" type="text" style="background:url(<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/search_box.png); width:213px; padding-left:5px;padding-right:5px;height:31px; border:0px solid #000000;  margin:7px 0px;line-height:31px;vertical-align:middle;" /><input name="findnow" type="image" id="findnow" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/search_button.png" value="Find Now!" style="margin-left:10px;margin-bottom:0px;vertical-align:middle;height:30px;" />						
						</form>
						<?php endif; ?>						
					</div>				
					 <?php endif; ?>	  
        </div> <!-- /Quick Navigation-->
		<div class="clear"></div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Stats']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div> <!-- /header -->
	</div><!-- end .container_12 -->
  <div class="clear"></div>
  <div class="container_12">
   <div id="hd">
	<div class="top_bg_nav_left1"></div>
	<div class="top_bg_nav_center1">
	 <div class="clear"></div>
			<ul class="mainnav cf">
            	<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/home.html"><span <?php if ($this->_tpl_vars['nav_select'] == home): ?>class="selected"<?php endif; ?>>Home</span></a>&nbsp;|&nbsp;</li>
				<?php if ($_SESSION['User_Name']): ?>
                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/latest-open-tasks.html"><span <?php if ($this->_tpl_vars['nav_select'] == latest): ?>class="selected"<?php endif; ?>>Latest</span></a>&nbsp;|&nbsp;</li>
				<?php else: ?>
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Latest</span></a>&nbsp;|&nbsp;</li>				
				<?php endif; ?>
				<?php if ($_SESSION['User_Name']): ?>
                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/latest-online-tasks.html"><span <?php if ($this->_tpl_vars['nav_select'] == online): ?>class="selected"<?php endif; ?>>Online</span></a>&nbsp;|&nbsp;</li>
				<?php else: ?>
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Online</span></a>&nbsp;|&nbsp;</li>				
				<?php endif; ?>				
				<?php if ($_SESSION['User_Name']): ?>
                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/task-categories.html"><span <?php if ($this->_tpl_vars['nav_select'] == categories): ?>class="selected"<?php endif; ?>>Categories</span></a>&nbsp;|&nbsp;</li>
				<?php else: ?>
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Categories</span></a>&nbsp;|&nbsp;</li>				
				<?php endif; ?>
				<?php if ($_SESSION['User_Name']): ?>
                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/completed-tasks.html"><span <?php if ($this->_tpl_vars['nav_select'] == completed): ?>class="selected"<?php endif; ?>>Complete</span></a>&nbsp;|&nbsp;</li>			
				<?php endif; ?>				
				<?php if ($_SESSION['User_Name']): ?>
                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/tasker_category_list.php"><span <?php if ($this->_tpl_vars['nav_select'] == find): ?>class="selected"<?php endif; ?>>Find Taskers</span></a>&nbsp;|&nbsp;</li>
				<?php else: ?>
                <li><a href="#" onclick="popup('popUpDiv')" ><span>Find Taskers</span></a>&nbsp;|&nbsp;</li>				
				<?php endif; ?>				
				<?php if (! $_SESSION['User_Name']): ?>
				<li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/signup.php"><span <?php if ($this->_tpl_vars['nav_select'] == join): ?>class="selected"<?php endif; ?>>Signup</span></a></li>
				<?php endif; ?>
				<?php if ($_SESSION['User_Name']): ?>
                <li><a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/all_portfolio.php"><span <?php if ($this->_tpl_vars['nav_select'] == portfolio): ?>class="selected"<?php endif; ?>>Portfolios</span></a></li>				
				<?php endif; ?>				
			</ul>			
	</div>
	<div class="top_bg_nav_right1"></div>
	<div class="clear"></div> 	
	</div> <!-- end hd -->
	<div id="share_buttons">	   
	   <?php if (! $_SESSION['User_Name']): ?>
		  <span style="margin-left:5px;margin-right:5px;color:#fff;font-weight:bold">Invite:</span>
		  <a onclick="popup('popUpDiv')" href=#><img border="0"  style="vertical-align:middle;margin-right:3px;" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/emailicon.png" width="27" /></a>
		  <span style="margin-left:0px;margin-right:5px;color:#fff;font-weight:bold">Share:</span>						  
		  <a onclick="popup('popUpDiv')" href=#><img border="0" style="vertical-align:middle;margin-right:3px;" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/facebook.png" /></a>
		  <a onclick="popup('popUpDiv')" href=#><img border="0"  style="vertical-align:middle;margin-right:3px;" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/twitter.png" /></a>				  
	  <?php endif; ?>
	  <?php if ($_SESSION['User_Name']): ?>
		  <span style="margin-left:5px;margin-right:5px;color:#000;font-weight:bold">Invite:</span>		
		  <a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/share_earn.html"><img border="0" style="vertical-align:middle;margin-right:3px;" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/emailicon.png" /></a>
		  <span style="margin-left:0px;margin-right:5px;color:#000;font-weight:bold">Share:</span>					  
		  <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=Check out <?php echo $this->_tpl_vars['Site_Title']; ?>
 and see how you can get things done fast!&amp;p[summary]=Task Sonic - Connecting People Who Need Things Done With People Willing To Help!&amp;p[url]=<?php echo ((is_array($_tmp=$this->_tpl_vars['Site_URL'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
%3Finvitation_id=<?php echo $_SESSION['User_Id']; ?>
&amp;&p[images][0]=<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/logo.png>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><img border="0" style="vertical-align:middle;margin-right:8px;" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/facebook.png" /></a>
		  <a onClick="window.open('http://twitter.com/share?url=<?php echo ((is_array($_tmp=$this->_tpl_vars['Site_URL'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
%3Finvitation_id=<?php echo $_SESSION['User_Id']; ?>
&text=<?php echo $this->_tpl_vars['Site_Title']; ?>
 - Get the help you need or earn money helping others at <?php echo $this->_tpl_vars['Site_Title']; ?>
&related=tasksonic', 'twtsharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
		  <img border="0"  style="vertical-align:middle;margin-right:10px;" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/twitter.png" />
		  </a>				  
	  <?php endif; ?>
	</div>
	<div class="clear"></div> 	
  </div><!-- end .container_12 -->
</div>  
<div class="clear"></div>
<div id="bdw">		
	<div class="container_12">
	  <!-- Content Starts Here-->
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Body']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <!-- Content Ends Here-->	
	</div>  
</div>		  
  <div class="clear"></div>
  <div id="ftw">
			<!-- FOOTER BG STARTS HERE -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Footer']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!-- FOOTER BG ENDS HERE -->
  </div> <!-- End FTW--> 
  <div class="clear"></div>  
</div><!-- end .container_16 -->
<!-- 940 Grid 12 column ends here-->
</div><!-- doc ends here-->
</body>
</html>