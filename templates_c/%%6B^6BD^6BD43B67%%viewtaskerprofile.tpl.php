<?php /* Smarty version 2.6.26, created on 2012-08-14 21:22:18
         compiled from viewtaskerprofile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'intval', 'viewtaskerprofile.tpl', 42, false),array('modifier', 'string_format', 'viewtaskerprofile.tpl', 47, false),array('modifier', 'stripslashes', 'viewtaskerprofile.tpl', 121, false),array('function', 'cycle', 'viewtaskerprofile.tpl', 120, false),)), $this); ?>
<?php echo '
    <script type="text/javascript">
    $(function() {
        $(\'.portfolio a\').lightBox();
    });
    </script>
'; ?>

<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1><?php echo $this->_tpl_vars['user_name1']; ?>
<?php echo $this->_tpl_vars['lang']['tasker_profile']; ?>
</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
<?php if ($this->_tpl_vars['user_name'] == 1): ?>
<table width="100%"  border="0" align="center">
	<tr>
		<td valign="top" align="center" class="successMsg"><?php echo $this->_tpl_vars['lang']['view_Seller_msg']; ?>
</td>
	</tr>
</table>	
<?php endif; ?>
<?php if ($this->_tpl_vars['user_name'] == 0): ?>
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
			<div class="form_page_text" style="text-align:center;">
			<label for="login-email-address"><strong><?php echo $this->_tpl_vars['user_name1']; ?>
's Tasker Profile</strong></label>
			</div>
			</div>
			<div class="clear"></div>
			<div id="tasker_profile_wrap" style="margin:10px;">
			<div class="clear"></div>
			<h3><?php echo $this->_tpl_vars['seller_slogan']; ?>
</h3>
			<div class="clear"></div>
			<div style="float:left;width:340px;">
			<div class="clear"></div>
			<strong><?php echo $this->_tpl_vars['lang']['Location']; ?>
: </strong><?php echo $this->_tpl_vars['location']; ?>
 
			<div class="clear"></div>			
			<strong><?php echo $this->_tpl_vars['lang']['Service_Rating']; ?>
: </strong>
			<?php if ($this->_tpl_vars['rating'] == 0.00): ?>
			<?php echo $this->_tpl_vars['lang']['No_Feedback']; ?>

			<?php else: ?>									 
			<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120">&nbsp;<strong><?php echo $this->_tpl_vars['rating']; ?>
</strong>&nbsp;<a href="<?php echo $this->_tpl_vars['user']; ?>
_tasker_feedback.html" class="footerlink">(<?php echo $this->_tpl_vars['ave_count']; ?>
 reviews)</a>
			<?php endif; ?>		
			<div class="clear"></div>		
			<strong><?php echo $this->_tpl_vars['lang']['Skill_Rating']; ?>
: </strong>                                                   
			<?php if ($this->_tpl_vars['skill_count'] != 0): ?>
			<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['avg_rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120"> <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['avg_rating'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</strong> <?php echo $this->_tpl_vars['skill_count']; ?>
 <?php echo $this->_tpl_vars['lang']['Skill_Msg']; ?>
</td>
			<?php endif; ?>
			<div class="clear"></div>
			<strong><?php echo $this->_tpl_vars['lang']['Earn_Reported']; ?>
: </strong>
			<?php if ($this->_tpl_vars['earn_by_site'] == 0.00): ?>
			<strong><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['earn_by_site']; ?>
</strong>
			<?php else: ?>
			<strong><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['earn_by_site']; ?>
</strong>
			<?php endif; ?>
			<div class="clear"></div>
			<strong><?php echo $this->_tpl_vars['lang']['Experience']; ?>
: </strong>
			<?php if ($this->_tpl_vars['industries'] != NULL): ?>
			<?php echo $this->_tpl_vars['industries']; ?>

			<?php else: ?>
			<div class="successMsg"><?php echo $this->_tpl_vars['lang']['Industry_Msg']; ?>
</div>
			<?php endif; ?>
			<div class="clear"></div>			
			</div>
			<div style="float:left;margin-left:15px;width:220px;">
			<div class="clear"></div>
			<?php if ($this->_tpl_vars['mem_employes'] != ""): ?>			
			<div class="clear"></div>			
			<strong><?php echo $this->_tpl_vars['lang']['Employees']; ?>
: </strong>
			<?php echo $this->_tpl_vars['mem_employes']; ?>

			<?php endif; ?>
			<div class="clear"></div>
				<?php if ($this->_tpl_vars['fb_verfy'] == 1 || $this->_tpl_vars['email_verfy'] == 1 || $this->_tpl_vars['address_verfy'] == 1 || $this->_tpl_vars['human_verfy'] == 1 || $this->_tpl_vars['background_verfy'] == 1): ?>
				<div style="line-height:30px;font-weight:bold;margin-top:0px;">
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
				<div class="clear"></div>
			</div>			
		<div class="clear"></div>
		<div style="margin:0 auto;margin-top:5px;padding-top:5px;border-top:1px dashed #ccc;">
			<div class="clear"></div>
			<strong><?php echo $this->_tpl_vars['lang']['Service_Desc']; ?>
<?php echo $this->_tpl_vars['user_name1']; ?>
:</strong><br />
			<?php if ($this->_tpl_vars['seller_description'] != NULL): ?>
			<?php echo $this->_tpl_vars['seller_description']; ?>

			<?php else: ?>
			<?php echo $this->_tpl_vars['lang']['Service_Desc_Msg']; ?>

			<?php endif; ?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>		
		</div><!--tasker_profile_wrap-->
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
			<div class="form_page_text" style="text-align:center;">
			<label for="login-email-address"><strong><?php echo $this->_tpl_vars['user_name1']; ?>
's Awarded Tasks for <?php echo $this->_tpl_vars['citycurrent']; ?>
</strong></label>
			</div>
			</div>
			<!--Won Tasks Starts-->
					<div class="body_shim">
						<?php if ($this->_tpl_vars['LoopWon'] > 0): ?>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr bgcolor="#D5D5D5" >
						<td class="bodytextwhite" align="center" width="32%" height="20"><strong><?php echo $this->_tpl_vars['lang']['My_Selling_Activity']; ?>
</strong></td>
						<td class="bodytextwhite" align="center" width="32%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Description']; ?>
</strong></td>
						</tr>
						<?php unset($this->_sections['seller_project_name']);
$this->_sections['seller_project_name']['name'] = 'seller_project_name';
$this->_sections['seller_project_name']['loop'] = is_array($_loop=$this->_tpl_vars['LoopWon']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['seller_project_name']['show'] = true;
$this->_sections['seller_project_name']['max'] = $this->_sections['seller_project_name']['loop'];
$this->_sections['seller_project_name']['step'] = 1;
$this->_sections['seller_project_name']['start'] = $this->_sections['seller_project_name']['step'] > 0 ? 0 : $this->_sections['seller_project_name']['loop']-1;
if ($this->_sections['seller_project_name']['show']) {
    $this->_sections['seller_project_name']['total'] = $this->_sections['seller_project_name']['loop'];
    if ($this->_sections['seller_project_name']['total'] == 0)
        $this->_sections['seller_project_name']['show'] = false;
} else
    $this->_sections['seller_project_name']['total'] = 0;
if ($this->_sections['seller_project_name']['show']):

            for ($this->_sections['seller_project_name']['index'] = $this->_sections['seller_project_name']['start'], $this->_sections['seller_project_name']['iteration'] = 1;
                 $this->_sections['seller_project_name']['iteration'] <= $this->_sections['seller_project_name']['total'];
                 $this->_sections['seller_project_name']['index'] += $this->_sections['seller_project_name']['step'], $this->_sections['seller_project_name']['iteration']++):
$this->_sections['seller_project_name']['rownum'] = $this->_sections['seller_project_name']['iteration'];
$this->_sections['seller_project_name']['index_prev'] = $this->_sections['seller_project_name']['index'] - $this->_sections['seller_project_name']['step'];
$this->_sections['seller_project_name']['index_next'] = $this->_sections['seller_project_name']['index'] + $this->_sections['seller_project_name']['step'];
$this->_sections['seller_project_name']['first']      = ($this->_sections['seller_project_name']['iteration'] == 1);
$this->_sections['seller_project_name']['last']       = ($this->_sections['seller_project_name']['iteration'] == $this->_sections['seller_project_name']['total']);
?>
						<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
						<td align="left" class="bodytextblack" width="32%" height="20"><a href="task_<?php echo $this->_tpl_vars['aseller_win'][$this->_sections['seller_project_name']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['aseller_win'][$this->_sections['seller_project_name']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"><?php echo ((is_array($_tmp=$this->_tpl_vars['aseller_win'][$this->_sections['seller_project_name']['index']]['project_Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></td>
						<td align="center" class="bodytextblack">
							<?php if ($this->_tpl_vars['aseller_win'][$this->_sections['seller_project_name']['index']]['project_status'] == 3): ?><strong><?php echo $this->_tpl_vars['lang']['Accepted']; ?>
</strong><?php endif; ?>
							<?php if ($this->_tpl_vars['aseller_win'][$this->_sections['seller_project_name']['index']]['project_status'] == 5): ?><strong><?php echo $this->_tpl_vars['lang']['Completed']; ?>
</strong><?php endif; ?>
							<?php if ($this->_tpl_vars['aseller_win'][$this->_sections['seller_project_name']['index']]['project_status'] == 6): ?><strong><?php echo $this->_tpl_vars['lang']['task_Finished']; ?>
</strong><?php endif; ?>
							<?php if ($this->_tpl_vars['aseller_win'][$this->_sections['seller_project_name']['index']]['project_status'] == 7): ?><strong><?php echo $this->_tpl_vars['lang']['task_Finished']; ?>
</strong><?php endif; ?>								
						</td>
						</tr>
						<?php endfor; endif; ?>
						</table>
						<?php else: ?>
						<div class="clear"></div>
						<div style="margin:0 auto;text-align:center;padding:20px;"><strong>No Tasks Awarded Yet In <?php echo $this->_tpl_vars['citycurrent']; ?>
</strong></div>	  
						<?php endif; ?>
					</div>	
			<!--Won Tasks Ends-->
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
			<div class="form_page_text" style="text-align:center;">
			<label for="login-email-address"><?php echo $this->_tpl_vars['user_name1']; ?>
's <?php echo $this->_tpl_vars['lang']['Portfolio_Summary']; ?>
s</label>
			</div>
			</div>		
		<!--portfolio starts-->
			<div class="clear"></div>
				<div class="body_shim">
					<div id="all_tasks" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
						<span class="title" style="text-transform:capitalize">
						<?php echo $this->_tpl_vars['user_name']; ?>

						</span>
						<div style="float:right;margin-right:5px">
							<strong><?php echo $this->_tpl_vars['lang']['Rating']; ?>
: </strong>
							<?php if ($this->_tpl_vars['rating'] == 0.00): ?>
								<?php echo $this->_tpl_vars['lang']['No_feedback']; ?>
<?php else: ?>
								<a href="<?php echo $this->_tpl_vars['user_name']; ?>
_tasker_feedback.html" class="footerlink">								
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120"></a>
							<?php endif; ?>				
						</div>
						<div class="clear"></div>
						<div style="width:560px;background:#E0E1E2;height:140px;padding:10px;">
						<?php if ($this->_tpl_vars['Loop'] > 0 && $this->_tpl_vars['Loop'] < 6): ?>
							<?php unset($this->_sections['seller']);
$this->_sections['seller']['name'] = 'seller';
$this->_sections['seller']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['seller']['show'] = true;
$this->_sections['seller']['max'] = $this->_sections['seller']['loop'];
$this->_sections['seller']['step'] = 1;
$this->_sections['seller']['start'] = $this->_sections['seller']['step'] > 0 ? 0 : $this->_sections['seller']['loop']-1;
if ($this->_sections['seller']['show']) {
    $this->_sections['seller']['total'] = $this->_sections['seller']['loop'];
    if ($this->_sections['seller']['total'] == 0)
        $this->_sections['seller']['show'] = false;
} else
    $this->_sections['seller']['total'] = 0;
if ($this->_sections['seller']['show']):

            for ($this->_sections['seller']['index'] = $this->_sections['seller']['start'], $this->_sections['seller']['iteration'] = 1;
                 $this->_sections['seller']['iteration'] <= $this->_sections['seller']['total'];
                 $this->_sections['seller']['index'] += $this->_sections['seller']['step'], $this->_sections['seller']['iteration']++):
$this->_sections['seller']['rownum'] = $this->_sections['seller']['iteration'];
$this->_sections['seller']['index_prev'] = $this->_sections['seller']['index'] - $this->_sections['seller']['step'];
$this->_sections['seller']['index_next'] = $this->_sections['seller']['index'] + $this->_sections['seller']['step'];
$this->_sections['seller']['first']      = ($this->_sections['seller']['iteration'] == 1);
$this->_sections['seller']['last']       = ($this->_sections['seller']['iteration'] == $this->_sections['seller']['total']);
?>							
							<div style="float:left;margin-left:10px;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path_port']; ?>
<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['sample_file']; ?>
" title="<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['title']; ?>
 - <?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['desc']; ?>
"><img src="<?php echo $this->_tpl_vars['img_path_port']; ?>
<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['sample_file']; ?>
" alt="<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['title']; ?>
" title="<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['title']; ?>
" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<?php endfor; endif; ?>
						<?php else: ?>
						<div style="margin:0 auto;text-align:center;padding:20px">
						<h3>No Tasker Portfolio Found</h3>
						</div>
						<?php endif; ?>						
						<div class="clear"></div>
						<div style="width:578px;margin-top:10px;background:#fff">
						<div class="button-no" style="float:left;margin-left:0px;margin-right:6px;"><a href="tasker_profile_<?php echo $this->_tpl_vars['user_name']; ?>
.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Profile']; ?>
</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="<?php echo $this->_tpl_vars['user_name']; ?>
_tasker_feedback.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Feedback']; ?>
</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="tasker_portfolio_<?php echo $this->_tpl_vars['user_name']; ?>
.html" class="footerlinkcommon2">View All</a></div>						
						<div class="button-no" style="float:left;margin-right:0px;"><a href="post_task_<?php echo $this->_tpl_vars['user_name']; ?>
.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');">Post Task To</a></div>	
						</div>					
						<div class="clear"></div>					
						</div>
					</div>
					<div class="clear"></div>				

					</div>				
			<!--portfolio ends-->			
		<div id="more_link"></div>
	<div class="clear"></div>		
	</div>
</div>
<div class="page_bottom"></div>
</div><!-- end .grid_8.alpha -->
<div class="grid_4 omega">
  <div class="right-column-wrap">
 			<div style="margin:0 auto">
			<?php if ($this->_tpl_vars['fb_img']): ?>
			<div align="center"><?php echo $this->_tpl_vars['fb_img']; ?>
</div>
			<?php elseif ($this->_tpl_vars['seller_logo'] != ''): ?>
			<div align="center"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
thumb_<?php echo $this->_tpl_vars['seller_logo']; ?>
" border="0" width="125"/></div>
			<?php else: ?>
			<div align="center"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
thumb-default.png" border="0" width="125"/></div>
			<?php endif; ?>
			</div>		
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr bgcolor="#B2B2B2">
					<td width="35%" class="bodytextwhite">&nbsp;<strong><?php echo $this->_tpl_vars['lang']['Skill']; ?>
</strong></td>
					<td width="33%" class="bodytextwhite" align="center"><strong><?php echo $this->_tpl_vars['lang']['Level']; ?>
</strong></td>
					<td width="32%" class="bodytextwhite" align="center"><strong><?php echo $this->_tpl_vars['lang']['Grade']; ?>
</strong></td>
				</tr>			
				<?php $_from = $this->_tpl_vars['Listing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['skills'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['skills']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['skills']):
        $this->_foreach['skills']['iteration']++;
?>
				<tr class="list_A">
					<td class="bodytextblack" width="35%">&nbsp;<?php echo $this->_tpl_vars['skills']->skill_name; ?>
</td>
					<td class="bodytextblack" align="center" width="33%">
					<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['skills']->skill_rate)) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120" />&nbsp;&nbsp;</td>
					<td class="bodytextblack" align="center" width="32%"><?php echo $this->_tpl_vars['skills']->skill_rate; ?>
</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
			<div class="clear"></div>
			<div><?php echo $this->_tpl_vars['lang']['Skill_Note']; ?>
</div>
			<br />
			<table width="100%" cellpadding="1" cellspacing="0" border="0">
				<tr class="list_A">
					<td colspan="2" class="bodytextblack" height="20"><span style ="text-transform:capitalize"><strong><a target="_blank" href="<?php echo $this->_tpl_vars['Site_Root']; ?>
tasker_profile_<?php echo $this->_tpl_vars['user_name1']; ?>
.html" class="footerlinkcommon2">Profile Permalink</a></strong></span></td>
				</tr>
				<tr>
				    <td colspan="2">&nbsp;</td>
				</tr>
				<?php if ($this->_tpl_vars['membership_id'] != 0): ?>
				<tr valign="top" align="center">
				    <td colspan="2" class="bodytextblack1" align="center">&nbsp;<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
vip_large.png" border="0" /><br /><span style ="text-transform:capitalize"><strong><?php echo $this->_tpl_vars['user']; ?>
 <?php echo $this->_tpl_vars['lang']['Text']; ?>
.</strong></span></td>
				</tr>
				<?php endif; ?>
			</table>
	</div><!--right-column-wrap-->
	<div class="right-column-wrap">
	  <h3>Tasker Feedback</h3>
					<div style="margin:0px;">						
					<?php if ($this->_tpl_vars['Loop1']): ?>
					<strong>Feedback Summary</strong> | <a href="<?php echo $this->_tpl_vars['user']; ?>
_task_owner_feedback.html" class="footerlinkcommon23"> <strong>View All</strong></a>
					<div class="clear"></div>
					<?php unset($this->_sections['rating']);
$this->_sections['rating']['name'] = 'rating';
$this->_sections['rating']['loop'] = is_array($_loop=$this->_tpl_vars['Loop1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					 <div class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
" style="padding:7px">
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
					Comments: <?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['dec']; ?>

					</div>					
					<?php endfor; endif; ?>
					<?php else: ?>
					<div style="margin:0 auto;text-align:center;">No Feedback Yet</div>					
					<?php endif; ?>
				</div>
				<?php endif; ?>
			<div class="clear"></div>
      </div><!--right-column-wrap-->
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->		