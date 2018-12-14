<?php /* Smarty version 2.6.26, created on 2012-08-14 14:26:26
         compiled from tasker_activity.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'tasker_activity.tpl', 40, false),array('modifier', 'stripslashes', 'tasker_activity.tpl', 41, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1><?php echo $_SESSION['User_Name']; ?>
<?php echo $this->_tpl_vars['lang']['Seller_Activites']; ?>
</h1>
<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
					<li class="current"><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
					<li><a href="make-deposit.html">Deposit</a><span></span></li>
					<li><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>	
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<form method="post" name="frmselleractivity" >
						<div class="clear"></div>
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address"><strong><?php echo $this->_tpl_vars['lang']['task_win_close']; ?>
</strong></label>
						</div>
						</div>
						<div class="clear"></div>
						<div class="body_shim">						
							<table width="100%" border="0" style="margin-left:10px">
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
								<?php if ($this->_tpl_vars['Loop1'] > 0): ?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr bgcolor="#D5D5D5" style="padding:5px">
												<td class="bodytextwhite" align="center" width="32%" height="20"><strong><?php echo $this->_tpl_vars['lang']['My_Selling_Activity']; ?>
</strong></td>
												<td class="bodytextwhite" align="center" width="32%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Description']; ?>
</strong></td>
											</tr>
											<?php unset($this->_sections['seller_task_name']);
$this->_sections['seller_task_name']['name'] = 'seller_task_name';
$this->_sections['seller_task_name']['loop'] = is_array($_loop=$this->_tpl_vars['Loop1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['seller_task_name']['show'] = true;
$this->_sections['seller_task_name']['max'] = $this->_sections['seller_task_name']['loop'];
$this->_sections['seller_task_name']['step'] = 1;
$this->_sections['seller_task_name']['start'] = $this->_sections['seller_task_name']['step'] > 0 ? 0 : $this->_sections['seller_task_name']['loop']-1;
if ($this->_sections['seller_task_name']['show']) {
    $this->_sections['seller_task_name']['total'] = $this->_sections['seller_task_name']['loop'];
    if ($this->_sections['seller_task_name']['total'] == 0)
        $this->_sections['seller_task_name']['show'] = false;
} else
    $this->_sections['seller_task_name']['total'] = 0;
if ($this->_sections['seller_task_name']['show']):

            for ($this->_sections['seller_task_name']['index'] = $this->_sections['seller_task_name']['start'], $this->_sections['seller_task_name']['iteration'] = 1;
                 $this->_sections['seller_task_name']['iteration'] <= $this->_sections['seller_task_name']['total'];
                 $this->_sections['seller_task_name']['index'] += $this->_sections['seller_task_name']['step'], $this->_sections['seller_task_name']['iteration']++):
$this->_sections['seller_task_name']['rownum'] = $this->_sections['seller_task_name']['iteration'];
$this->_sections['seller_task_name']['index_prev'] = $this->_sections['seller_task_name']['index'] - $this->_sections['seller_task_name']['step'];
$this->_sections['seller_task_name']['index_next'] = $this->_sections['seller_task_name']['index'] + $this->_sections['seller_task_name']['step'];
$this->_sections['seller_task_name']['first']      = ($this->_sections['seller_task_name']['iteration'] == 1);
$this->_sections['seller_task_name']['last']       = ($this->_sections['seller_task_name']['iteration'] == $this->_sections['seller_task_name']['total']);
?>
											<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
												<td align="left" class="bodytextblack" width="32%" height="20"  style="padding:5px" valign="top"><a href="task_<?php echo $this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"><?php echo ((is_array($_tmp=$this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></td>
												<td align="center" class="bodytextblack"  style="padding:5px">
											<?php if ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 1): ?>
												<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['time_remaining']; ?>
 left for bidding!										
											<?php elseif ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 2): ?>
												Task Awarded to <?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_post_to']; ?>

											<?php elseif ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 3): ?>
					
											<?php if ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['tasker_completed'] == 0): ?>

											<div class="clear"></div>
											<div class="buttons" style="margin-right:75px;">
											<a href="mark-completed_<?php echo $this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['id']; ?>
.html" >Mark Completed</a>
											</div>
											<?php else: ?>
											Tasker Has Marked As Completed
											<div class="clear"></div>
											Awaiting Payment
											<?php endif; ?>
											<?php elseif ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 4): ?>
												Task Canceled bt Task Owner
											<?php elseif ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 5): ?>
												Task Expiring - Bidding Frozen
											<?php elseif ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 6): ?>
												Task Completed
											<?php elseif ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 7): ?>
												Task Failed				
											<?php endif; ?>								
												</td>
											</tr>
											<?php if ($this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['project_status'] == 3): ?>	
											<tr>
												<td style="border-bottom:1px dashed #ccc" align="center" colspan="2"><strong>Must Be Completed By: <?php echo $this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['completed_by']; ?>
 <?php echo $this->_tpl_vars['aseller_win'][$this->_sections['seller_task_name']['index']]['completed_time']; ?>
</strong></td>
											</tr>
											<?php endif; ?>
											<tr>
												<td class="bodytextwhite" height="20" colspan="2"></td>
											</tr>											
											<?php endfor; endif; ?>
										</table>
									</td>
								</tr>
								<?php else: ?>
								<tr>
									<td colspan="2" class="bodytextblack" align="center"><strong><?php echo $this->_tpl_vars['lang']['No_recorded']; ?>
</strong></td>	  
								</tr>
								<?php endif; ?>
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
							</table>
						</div>					
						<div class="clear"></div>
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address"><strong><?php echo $this->_tpl_vars['lang']['Bid_Placed']; ?>
</strong></label>
						</div>
						</div>
						<div class="clear"></div>
						<div class="body_shim">
							<table width="100%" border="0" style="margin-left:10px">
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
								<?php if ($this->_tpl_vars['Loop_bid'] > 0): ?>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr bgcolor="#D5D5D5">
												<td class="bodytextwhite" align="center" width="32%" height="20"><span class="row_title"><strong><?php echo $this->_tpl_vars['lang']['My_Selling_Activity']; ?>
</strong></td>
												<td class="bodytextwhite" align="center" width="32%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Description']; ?>
</strong></td>
											</tr>
											<?php unset($this->_sections['seller_task_name1']);
$this->_sections['seller_task_name1']['name'] = 'seller_task_name1';
$this->_sections['seller_task_name1']['loop'] = is_array($_loop=$this->_tpl_vars['Loop_bid']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['seller_task_name1']['show'] = true;
$this->_sections['seller_task_name1']['max'] = $this->_sections['seller_task_name1']['loop'];
$this->_sections['seller_task_name1']['step'] = 1;
$this->_sections['seller_task_name1']['start'] = $this->_sections['seller_task_name1']['step'] > 0 ? 0 : $this->_sections['seller_task_name1']['loop']-1;
if ($this->_sections['seller_task_name1']['show']) {
    $this->_sections['seller_task_name1']['total'] = $this->_sections['seller_task_name1']['loop'];
    if ($this->_sections['seller_task_name1']['total'] == 0)
        $this->_sections['seller_task_name1']['show'] = false;
} else
    $this->_sections['seller_task_name1']['total'] = 0;
if ($this->_sections['seller_task_name1']['show']):

            for ($this->_sections['seller_task_name1']['index'] = $this->_sections['seller_task_name1']['start'], $this->_sections['seller_task_name1']['iteration'] = 1;
                 $this->_sections['seller_task_name1']['iteration'] <= $this->_sections['seller_task_name1']['total'];
                 $this->_sections['seller_task_name1']['index'] += $this->_sections['seller_task_name1']['step'], $this->_sections['seller_task_name1']['iteration']++):
$this->_sections['seller_task_name1']['rownum'] = $this->_sections['seller_task_name1']['iteration'];
$this->_sections['seller_task_name1']['index_prev'] = $this->_sections['seller_task_name1']['index'] - $this->_sections['seller_task_name1']['step'];
$this->_sections['seller_task_name1']['index_next'] = $this->_sections['seller_task_name1']['index'] + $this->_sections['seller_task_name1']['step'];
$this->_sections['seller_task_name1']['first']      = ($this->_sections['seller_task_name1']['iteration'] == 1);
$this->_sections['seller_task_name1']['last']       = ($this->_sections['seller_task_name1']['iteration'] == $this->_sections['seller_task_name1']['total']);
?>
											<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
												<td align="left" class="bodytextblack" width="32%" height="20"><a href="task_<?php echo $this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"><?php echo ((is_array($_tmp=$this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['project_Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></td>
												<td align="center" class="bodytextblack">
												<!-- If a person awarded is viewing-->
												<?php if ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['project_post_to'] == $this->_tpl_vars['user']): ?>
													<?php if ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['project_status'] == 2): ?><strong><?php echo $this->_tpl_vars['lang']['Awarded_you']; ?>
</strong> &nbsp;<strong>( <a href="task_<?php echo $this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"> <?php echo $this->_tpl_vars['lang']['Accept_Deny']; ?>
 </a>)</strong><?php endif; ?>
													<?php if ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['project_status'] == 3): ?><strong><?php echo $this->_tpl_vars['lang']['task_win']; ?>
</strong><?php endif; ?>
												<!-- If a person not awarded is viewing-->
												<?php elseif ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['project_post_to'] != $this->_tpl_vars['user']): ?>
													<?php if ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['project_status'] == 2): ?><strong><?php echo $this->_tpl_vars['lang']['Bid_Lost']; ?>
</strong><?php endif; ?>
														<?php if ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['project_status'] == 1): ?>		
															<?php if ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['bid_status'] == 0): ?>
																<strong><?php echo $this->_tpl_vars['lang']['Your_bid_is_in_pending']; ?>
</strong>
															<?php endif; ?>
															<?php if ($this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['bid_status'] == 1): ?>
																<strong><?php echo $this->_tpl_vars['lang']['Bid_Placed']; ?>
</strong>&nbsp;&nbsp;
																<strong>(<a href="JavaScript: Delete_Click('<?php echo $this->_tpl_vars['aseller_bid'][$this->_sections['seller_task_name1']['index']]['bid_id']; ?>
');" class="footerlinkcommon2" > <?php echo $this->_tpl_vars['lang']['Cancel_Bid']; ?>
 </a>)</strong>
															<?php endif; ?>
														<?php endif; ?>
											
												<?php endif; ?>
												</td>
											</tr>
										<?php endfor; endif; ?>
										</table>
									</td>
								</tr>
								<?php else: ?>
								<tr>
									<td colspan="2" class="bodytextblack" align="center"><strong><?php echo $this->_tpl_vars['lang']['No_recorded']; ?>
</strong></td>	  
								</tr>
								<?php endif; ?>
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
							</table>
							</div>
				<input name="bid_id" type="hidden" />
				<input type="hidden" name="Action" />
				</form>
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