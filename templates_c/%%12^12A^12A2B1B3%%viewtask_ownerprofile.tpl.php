<?php /* Smarty version 2.6.26, created on 2012-08-14 09:45:36
         compiled from viewtask_ownerprofile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'intval', 'viewtask_ownerprofile.tpl', 66, false),array('modifier', 'string_format', 'viewtask_ownerprofile.tpl', 79, false),array('modifier', 'truncate', 'viewtask_ownerprofile.tpl', 81, false),array('modifier', 'wordwrap', 'viewtask_ownerprofile.tpl', 95, false),array('modifier', 'stripslashes', 'viewtask_ownerprofile.tpl', 136, false),array('modifier', 'urlencode', 'viewtask_ownerprofile.tpl', 140, false),array('function', 'cycle', 'viewtask_ownerprofile.tpl', 123, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1><?php echo $this->_tpl_vars['user']; ?>
's Task Owner Profile</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><strong><?php echo $this->_tpl_vars['user']; ?>
's Task Owner Profile</strong></label>
				</div>
				</div>
				<div class="clear"></div>			
				<?php if ($this->_tpl_vars['user_name'] == 1): ?><div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['view_buyer_msg']; ?>
</div><?php endif; ?>
				<?php if ($this->_tpl_vars['user_name'] == 0): ?>
				<div class="clear"></div>
				<div class="task_owner_wrapper" style="margin:0px;background:#fff;padding:10px;height:100%;">
				<h3><?php echo $this->_tpl_vars['Slogan']; ?>
</h3>
				<div class="clear"></div>
				<div class="task_owner_imag_wrap" style="float:left;width:135px;">
				<?php if ($this->_tpl_vars['fb_img']): ?>
				<div align="center"><?php echo $this->_tpl_vars['fb_img']; ?>
</div>
				<?php elseif ($this->_tpl_vars['buyer_logo'] != ''): ?>
				<div align="center"><img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_<?php echo $this->_tpl_vars['buyer_logo']; ?>
" border="0" width="125"/></div>
				<?php else: ?>
				<div align="center"><img src="<?php echo $this->_tpl_vars['path']; ?>
thumb-default.png" border="0" width="125"/></div>
				<?php endif; ?>
				<div class="clear"></div>
				</div>
						<div class="task_owner_info" style="float:left;margin-left:20px;width:425px;">
								<div id="column" class="left" style="width:200px;">
									<strong><?php echo $this->_tpl_vars['lang']['Location']; ?>
</strong>
									<div class="clear"></div>
									<?php echo $this->_tpl_vars['Location1']; ?>

									<div class="clear"></div>
										<?php if ($this->_tpl_vars['fb_verfy'] == 1 || $this->_tpl_vars['email_verfy'] == 1 || $this->_tpl_vars['address_verfy'] == 1 || $this->_tpl_vars['human_verfy'] == 1 || $this->_tpl_vars['background_verfy'] == 1): ?>
										<div style="line-height:30px;font-weight:bold;margin-top:10px;">
										<span style="float:left;margin-right:5px;height:30px">Trusted and Verified</span>
										<div class="clear"></div>
										<?php if ($this->_tpl_vars['fb_verfy'] == 1): ?><img src="images/facebook-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Facebook Verified" title="Facebook Verified" /><?php endif; ?>
										<?php if ($this->_tpl_vars['email_verfy'] == 1): ?><img src="images/email-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Email Verified" title="Email Verified" /><?php endif; ?>							
										<?php if ($this->_tpl_vars['address_verfy'] == 1): ?><img src="images/address-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Address Verified" title="Address Verified" /><?php endif; ?>
										<?php if ($this->_tpl_vars['human_verfy'] == 1): ?><img src="images/phone-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Human Verified" title="Human Verified" /><?php endif; ?>
										<?php if ($this->_tpl_vars['background_verfy'] == 1): ?><img src="images/background-verified.png" style="float:left;margin-right:5px;width:30px;height:30px" alt="Background Checked" title="Background Checked" /><?php endif; ?>	
										</div>
										<div class="clear"></div>
										<?php else: ?>
										<div style="line-height:30px;font-weight:bold;margin-top:10px;margin-bottom:10px;">
										Task Owner has not completed any verification methods as of yet! 
										</div>
										<div class="clear"></div>
										<?php endif; ?>
								<div style="text-transform:capitalize;font-weight:bold;margin-top:10px;"><a target="_blank" href="<?php echo $this->_tpl_vars['Site_Root']; ?>
task_owner_profile_<?php echo $this->_tpl_vars['user']; ?>
.html" class="footerlinkcommon23">Profile Permalink</a></div>		
								<div class="clear"></div>
								</div>
								<div id="column" class="right">				
									<div class="clear"></div>
									<div style="margin:0px;background-color:#D3D3D3">						
										<?php if ($this->_tpl_vars['Loop']): ?>
										<strong>Feedback Summary</strong> | <a href="<?php echo $this->_tpl_vars['user']; ?>
_task_owner_feedback.html" class="footerlinkcommon23"> <strong>View All</strong></a>
										<div class="clear"></div>
										<?php unset($this->_sections['rating']);
$this->_sections['rating']['name'] = 'rating';
$this->_sections['rating']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rating']['show'] = true;
$this->_sections['rating']['max'] = $this->_sections['rating']['loop'];
$this->_sections['rating']['step'] = 1;
$this->_sections['rating']['start'] = $this->_sections['rating']['step'] > 0 ? 0 : $this->_sections['rating']['loop']-1;
if ($this->_sections['rating']['show']) {
    $this->_sections['rating']['total'] = $this->_sections['rating']['loop'];
    if ($this->_sections['rating']['total'] == 0)
        $this->_sections['rating']['show'] = false;
} else
    $this->_sections['rating']['total'] = 0;
if ($this->_sections['rating']['show']):

            for ($this->_sections['rating']['index'] = $this->_sections['rating']['start'], $this->_sections['rating']['iteration'] = 1;
                 $this->_sections['rating']['iteration'] <= $this->_sections['rating']['total'];
                 $this->_sections['rating']['index'] += $this->_sections['rating']['step'], $this->_sections['rating']['iteration']++):
$this->_sections['rating']['rownum'] = $this->_sections['rating']['iteration'];
$this->_sections['rating']['index_prev'] = $this->_sections['rating']['index'] - $this->_sections['rating']['step'];
$this->_sections['rating']['index_next'] = $this->_sections['rating']['index'] + $this->_sections['rating']['step'];
$this->_sections['rating']['first']      = ($this->_sections['rating']['iteration'] == 1);
$this->_sections['rating']['last']       = ($this->_sections['rating']['iteration'] == $this->_sections['rating']['total']);
?>		
										<div style="background:#fff;padding:5px">
										<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['project_title']; ?>
</a>
										<div class="clear"></div>
										<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120">
										<div class="clear"></div>
										Rated on: <?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['date_time']; ?>

										<div class="clear"></div>
										Rated by: <a href="tasker_profile_<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
.html" class="footerlink"><?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
</a>
										<div class="clear"></div>
										Ratings: 
										<?php if ($this->_tpl_vars['arating'][$this->_sections['rating']['index']]['averating'] != ''): ?> 
										   <a href="<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
_tasker_feedback.html" class="footerlink">(<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['averating']; ?>
)</a>
										 <?php else: ?>
										   <a href="<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
_tasker_feedback.html" class="footerlink">(0)</a>
										<?php endif; ?> 
										<div class="clear"></div>
										Rating: <?php echo ((is_array($_tmp=$this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

										<div class="clear"></div>
										Comments: <?php echo ((is_array($_tmp=$this->_tpl_vars['arating'][$this->_sections['rating']['index']]['dec'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "") : smarty_modifier_truncate($_tmp, 30, "")); ?>

										<div class="clear"></div>
										</div>					
										<?php endfor; endif; ?>
										<?php else: ?>
										<div style="margin:0 auto;text-align:center;">No Feedback Yet</div>					
										<?php endif; ?>
									</div>
								</div>
								<div class="clear"></div>	
							</div>
						<div class="clear"></div>
					<div class="row">
					<?php if ($this->_tpl_vars['Desc'] != ''): ?>
					<strong><?php echo $this->_tpl_vars['lang']['Description1']; ?>
:</strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['Desc'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 135, "\n", true) : smarty_modifier_wordwrap($_tmp, 135, "\n", true)); ?>

					<?php else: ?>
					<strong><?php echo $this->_tpl_vars['lang']['Description1']; ?>
:</strong> <?php echo $this->_tpl_vars['lang']['Msg_Desc']; ?>

					<?php endif; ?>
					</div>				
				</div>
			<?php endif; ?>	
		<div class="clear"></div>		
		</div>
	</div>
	<div class="page_bottom"></div>
	<br />			
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>				
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><?php echo $this->_tpl_vars['user']; ?>
's Open Tasks for <?php echo $this->_tpl_vars['citycurrent']; ?>
</label>
				</div>
				</div>
				<div class="clear"></div>					
					<?php if ($this->_tpl_vars['TaskLoop'] > 0): ?>	
						<?php unset($this->_sections['ProList']);
$this->_sections['ProList']['name'] = 'ProList';
$this->_sections['ProList']['loop'] = is_array($_loop=$this->_tpl_vars['TaskLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

								<?php elseif ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['buyer_logo_task']): ?>
								<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['buyer_logo_task']; ?>
" height="70" width="70" class="profile_img"/>
								<?php else: ?>
								<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_default.jpg" height="70" width="70" class="profile_img"/>
								<?php endif; ?>
								<div class="clear"></div>
								<div class="share_btns" style="margin-top:5px;">
								<?php echo '
								<a href="" onclick="fb_share(\'\',{\'name\':\'Check out this new task ('; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
<?php echo ') on '; ?>
<?php echo $this->_tpl_vars['Site_Title']; ?>
<?php echo '!\',\'href\':\''; ?>
<?php echo $this->_tpl_vars['Site_URL']; ?>
<?php echo '/task_'; ?>
<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
<?php echo '.html\',\'description\':\''; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['dec'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)); ?>
<?php echo '\'},null);return false;">			
								'; ?>

								<img src="images/facebook.png" width="24" />
								</a>
								<a href="http://twitter.com/share?url=<?php echo ((is_array($_tmp=$this->_tpl_vars['Site_URL'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
/task_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
.html&text=Check out the task ''<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
'' on <?php echo $this->_tpl_vars['Site_URL']; ?>
&related=tasksonic" target="_blank">
								<img src="images/twitter.png" width="24" />
								</a>
								<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/invite.php">
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
.html" ><?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
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
						<div class="clear"></div>
						<div class="field">
						There are currently no new and open task for this Task Owner. Check back frequently to see new tasks posted by <?php echo $this->_tpl_vars['user']; ?>
!
						</div>						
					<?php endif; ?>
		<div id="more_link"></div>
		<div class="clear"></div>		
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
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Map']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>									
			<div class="clear"></div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->