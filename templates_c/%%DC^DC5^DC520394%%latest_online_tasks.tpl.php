<?php /* Smarty version 2.6.26, created on 2012-08-14 13:56:26
         compiled from latest_online_tasks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'latest_online_tasks.tpl', 45, false),array('modifier', 'urlencode', 'latest_online_tasks.tpl', 58, false),array('modifier', 'stripslashes', 'latest_online_tasks.tpl', 58, false),array('modifier', 'truncate', 'latest_online_tasks.tpl', 80, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body">
	 
   <div class="grid_8 alpha">   
	<h1>Latest Online Tasks</h1>
	<div class="clear"></div>			
        <div class="welcome_hdr">
			<div class="welcome_wrapper">
			<div class="clear"></div>
				<div class="col-left"><h1>Welcome <?php echo $_SESSION['User_Name']; ?>
</h1>
				<?php echo $this->_tpl_vars['marketing_content']; ?>
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
					<li class="current"><a href="latest-online-tasks.html">Online Tasks</a><span></span></li>
					<li><a href="task-categories.html">By Category</a><span></span></li>
					<li><a href="completed-tasks.html">Completed</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>			
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;;margin-bottom:10px">
						<label for="intro">
							<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
premium_small.png" align="bottom" style="height:20px"/> Premium Task
							&nbsp;&nbsp;&nbsp;	
							<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
urgent.png" align="absmiddle" style="height:20px"/> Urgent Task
							&nbsp;&nbsp;&nbsp;	
						</label>
					</div>
				</div>
				<div class="clear"></div>			
<?php if ($this->_tpl_vars['Loop'] > 0): ?>	
	<?php unset($this->_sections['ProList']);
$this->_sections['ProList']['name'] = 'ProList';
$this->_sections['ProList']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ProList']['show'] = true;
$this->_sections['ProList']['max'] = $this->_sections['ProList']['loop'];
$this->_sections['ProList']['step'] = 1;
$this->_sections['ProList']['start'] = $this->_sections['ProList']['step'] > 0 ? 0 : $this->_sections['ProList']['loop']-1;
if ($this->_sections['ProList']['show']) {
    $this->_sections['ProList']['total'] = $this->_sections['ProList']['loop'];
    if ($this->_sections['ProList']['total'] == 0)
        $this->_sections['ProList']['show'] = false;
} else
    $this->_sections['ProList']['total'] = 0;
if ($this->_sections['ProList']['show']):

            for ($this->_sections['ProList']['index'] = $this->_sections['ProList']['start'], $this->_sections['ProList']['iteration'] = 1;
                 $this->_sections['ProList']['iteration'] <= $this->_sections['ProList']['total'];
                 $this->_sections['ProList']['index'] += $this->_sections['ProList']['step'], $this->_sections['ProList']['iteration']++):
$this->_sections['ProList']['rownum'] = $this->_sections['ProList']['iteration'];
$this->_sections['ProList']['index_prev'] = $this->_sections['ProList']['index'] - $this->_sections['ProList']['step'];
$this->_sections['ProList']['index_next'] = $this->_sections['ProList']['index'] + $this->_sections['ProList']['step'];
$this->_sections['ProList']['first']      = ($this->_sections['ProList']['iteration'] == 1);
$this->_sections['ProList']['last']       = ($this->_sections['ProList']['iteration'] == $this->_sections['ProList']['total']);
?>
	<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['premium_project'] == 1): ?>
	<div id="all_tasks"  class="premium_task" >
	<?php else: ?>
	<div id="all_tasks" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
	<?php endif; ?>
		<div class="img_holder">
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['fb_profile_img']): ?>
			<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['fb_profile_img']; ?>

			<?php elseif ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['buyer_logo']): ?>
			<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['buyer_logo']; ?>
" height="70" width="70" class="profile_img"/>
			<?php else: ?>
			<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_default.jpg" height="70" width="70" class="profile_img"/>
			<?php endif; ?>
			<div class="clear"></div>
			<div class="share_btns" style="margin-top:5px;">
			<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title']; ?>
&amp;p[summary]=<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['summary']; ?>
&amp;p[url]=<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['url']; ?>
%3Finvitation_id=<?php echo $_SESSION['User_Id']; ?>
&amp;&p[images][0]=<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['image']; ?>
', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><img src="images/facebook.png" width="24" /></a>			
			<a onClick="window.open('http://twitter.com/share?url=<?php echo ((is_array($_tmp=$this->_tpl_vars['Site_URL'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
/task_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
.html%3Finvitation_id=<?php echo $_SESSION['User_Id']; ?>
&text=Check out the task <?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
 on <?php echo $this->_tpl_vars['Site_URL']; ?>
&related=tasksoni', 'twtsharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
			<img src="images/twitter.png" width="24" />
			</a>
			<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/share_earn.html">
			<img src="images/emailicon.png" width="24" />
			</a>
			<div class="clear"></div>
			</div>
		<div class="clear"></div>			
		<div class="premium_urgent">
		<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['urgent_project'] == 1): ?><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
urgent.png" border="0" style="vertical-align:middle" /><?php endif; ?>
		<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['premium_project'] == 1): ?>
		&nbsp;<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
premium_small.png" border="0" style="vertical-align:middle" />
		<?php elseif ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['membership_id'] != 0): ?>
		&nbsp;<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
vip_small.png" border="0" style="vertical-align:middle" />
		<?php endif; ?>
		<div class="clear"></div>
		</div>		
		</div>
		<div class="body_text"><span class="title"><a href="task_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
.html" ><?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title1'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></span>
		<div class="clear"></div>		
		<span class="description">
		<div class="desc_holder"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['dec'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200, '..', true, false) : smarty_modifier_truncate($_tmp, 200, '..', true, false)); ?>
</div>
		<div style="background:#fff;padding-left:5px;">
		<strong>Bidding Ends On:</strong> <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['project_days_open']; ?>
 at <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['bidding_time']; ?>
<br />
		<strong>Task To Be Complete by:</strong> <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['completed_by']; ?>
 at <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['completed_time']; ?>

		</div>		
		</span>
		<div class="clear"></div>
		</div>
		<div class="more_button">
		Bids
		<div class="clear"></div>
		<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['bid']; ?>

			<div class="status">
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 1): ?>Bidding Open<?php endif; ?>
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 2): ?>Task Awarded<?php endif; ?>
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 3): ?>Task Underway<?php endif; ?>
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 4): ?>Task Cancelled<?php endif; ?>
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 5): ?>Bidding Ended<?php endif; ?>
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 6): ?>Task Complete<?php endif; ?>
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 7): ?>Task Expired<?php endif; ?>			
			</div>		
		</div>
		<div class="clear"></div>
		<div class="btm_menu">
			<strong>Posted by:</strong>  <span class="user"><?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['project_posted_by']; ?>
</span>
			<strong>Average Bid:</strong>  
			<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['bid'] == 0): ?>
			<?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;0.00 |
			<?php else: ?>
			<?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['Ave_Bid1']; ?>
 |
			<?php endif; ?>
			<strong>Created:</strong> <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['project_date']; ?>

		</div>
		<div class="clear"></div>
	</div>
<div class="clear"></div>	
<?php endfor; endif; ?>
<div><ul class="paginator"><?php echo $this->_tpl_vars['Page_Link']; ?>
</ul></div>
<?php else: ?>
<div style="margin:0 auto;text-align:center;padding:20px">
<h3><?php echo $this->_tpl_vars['lang']['No_project_Text']; ?>
 <?php echo $this->_tpl_vars['citycurrent']; ?>
</h3>
</div>	
<?php endif; ?>
<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>	
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
				