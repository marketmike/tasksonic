<?php /* Smarty version 2.6.26, created on 2012-08-13 20:57:42
         compiled from logged_in_home.tpl */ ?>
<?php 
session_start();
$_SESSION["total_activity"] = 0;
 ?>
<?php echo '
<script>
	function fetch(){
		$.ajax({
			url: \'livefeed.php\',
			cache: false,
			success: function(data) {
				$("#list").prepend(data);
				if($("#list #feed_wrapper").length > 10){
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

<div class="grid_12 push_12 alpha omega content_body">
	 
   <div class="grid_8 alpha">   
	<div class="clear"></div>			
        <div class="welcome_hdr">
			<div class="welcome_wrapper">
			<div class="clear"></div>
				<div class="col-left"><h1>Welcome <?php echo $_SESSION['User_Name']; ?>
</h1>
				<?php echo $this->_tpl_vars['site_intro']; ?>
</div>
				<div class="col-right"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Balance_Right']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>					
			</div>
		</div>
<div class="clearwspace"></div>		
<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li><a href="latest-open-tasks.html">Latest Tasks</a><span></span></li>			
					<li><a href="latest-online-tasks.html">Online Tasks</a><span></span></li>
					<li><a href="task-categories.html">By Category</a><span></span></li>
					<li><a href="completed-tasks.html">Completed</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>	
<div class="clear"></div>			
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Latest Activity For <?php echo $this->_tpl_vars['citycurrent']; ?>
						
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
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Post']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Location']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Balance']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Mytasks']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Map']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->
				