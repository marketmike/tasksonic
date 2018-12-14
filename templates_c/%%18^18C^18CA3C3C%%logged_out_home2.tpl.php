<?php /* Smarty version 2.6.26, created on 2012-08-14 08:46:31
         compiled from logged_out_home2.tpl */ ?>
<?php 
session_start();
$_SESSION["total_activity"] = 0;
 ?>
<?php echo '
<script>
	function fetch(){
		$.ajax({
			url: \'livefeed-logged-out.php\',
			cache: false,
			success: function(data) {
				$("#list").prepend(data);
				if($("#list #feed_wrapper").length > 5){
					$(\'#list #feed_wrapper:gt(9)\').remove();
				}
				$("#list #feed_wrapper").fadeIn();
				setTimeout("fetch()", 30000);
			}
		});
	}
	$(function(){
		fetch();
	});
</script>
'; ?>

<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">

<!--<img src=../../tmp/middle4.png><br>-->   
<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">
<?php echo $this->_tpl_vars['site_intro']; ?>

<div id="hd">
	<div id="post_free"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/post_free.png" /></div> 	
</div> <!-- end hd -->
<div class="clear"></div>
<div id="marketing_points">
	<div id="marketing_column">
		<img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/how.png" />
		<div class="clear"></div>
		<img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/how_hdr.png" style="margin-top:5px;margin-bottom:5px;" />
		<div class="clear"></div>
		Read more about how TaskSonic actually works.		
	</div>
	<div id="marketing_column">
		<img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/know.png" />
		<div class="clear"></div>
		<img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/know_hdr.png" style="margin-top:5px;margin-bottom:5px;" />
		<div class="clear"></div>
		TaskSonic was created with your safety in mind. Our community has been background checked.	
	</div>
	<div id="marketing_column">
		<img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/post_icon.png" />
		<div class="clear"></div>
		<img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/post_hdr.png" style="margin-top:5px;margin-bottom:5px;" />
		<div class="clear"></div>
		TaskSonic is easy to use and efficient. This so that none of your valuable time is wasted!		
	</div>
	<div id="signup_column">
		<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/signup.php"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/join.png" style="margin-top:50px;" /></a>
		<div class="clear"></div>
		<img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/or.png" style="margin-top:10px;margin-bottom:10px;" />
		<div class="clear"></div>
		<?php if (! $_SESSION['User_Name']): ?>		  
		<a href="#" onClick="fbconnect_login(); return false;"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/fb_connect.png"/></a>
		<?php endif; ?>	
		<?php if ($_SESSION['User_Name']): ?>
		<div style="float:left;vertical-align:middle;color:#fff;margin-right:15px;">
		<?php if ($fb_connect = Get_FB_ID($_SESSION['User_Name'])): ?><img id="image" src="https://graph.facebook.com/<?php echo $fb_connect; ?>/picture" width="30" style="vertical-align:middle;" /> <?php  endif; echo $_SESSION['User_Name']; ?>					
		</div>
		<?php endif; ?>
	</div>
</div>	
</div>
</div><!-- end .grid_12.alpha omega -->
<div class="clear"></div>
</div><!-- end .grid_12.push_12 -->

<div class="clear"></div>

<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">   
	<div class="clear"></div>			
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Latest Activity On Tasksonic						
						</label>
					</div>
					</div>
					<div class="clear"></div>				
					<div id="list">
						<div>Loading...</div>
					</div>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="right-column-wrap">
		<div>
		<?php echo $this->_tpl_vars['marketing_content']; ?>

		</div>
		<div class="clear"></div>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_MapLoggedOut']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->


</div><!-- end .grid_12.alpha omega -->
<div class="clear"></div>
</div><!-- end .grid_12.push_12 -->		