<?php /* Smarty version 2.6.26, created on 2012-08-14 09:45:57
         compiled from award_task.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'award_task.tpl', 63, false),array('modifier', 'date_format', 'award_task.tpl', 70, false),array('modifier', 'intval', 'award_task.tpl', 75, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">   
<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">
<h1>Award Your Task</h1>
<div class="page_top_941"></div>
        <div class="page_content">
            <div class="page_content_white">
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						<?php echo $this->_tpl_vars['project_name']; ?>
						
						</label>
					</div>
					</div>				
					<div class="clear"></div>			
			<div class="content_padder">

					<?php if ($this->_tpl_vars['error'] == 1): ?>
					<table width="100%"  border="0" align="center">
						<tr>
							<td>&nbsp;</td>
						</tr> 
						<tr>	
							<td width="50%" align="center" class="successMsg"><?php echo $this->_tpl_vars['lang']['award_task_Err']; ?>
</td>
						</tr>
						<tr>	
							<td width="50%" align="center" class="bodytextblack">&nbsp;</td>
						</tr>
					</table>
					<?php else: ?>
					  <?php if ($this->_tpl_vars['Loop'] > 0): ?>
							<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmAward">
							<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
								<?php if ($this->_tpl_vars['succMsg']): ?>
								<tr>
									<td colspan="2" align="center" class="successMsg"><?php echo $this->_tpl_vars['succMsg']; ?>
</td>
								</tr>
								<tr>	
									<td height="20"></td>
								</tr>
								<?php endif; ?>
								<tr>
									<td colspan="2" class="bodytext"><div class="body_spacer"><?php echo $this->_tpl_vars['lang']['Award_Text']; ?>
</div></td>	  
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr bgcolor="#B2B2B2">
												<td class="bodytextwhite" align="center" width="8%" height="20">&nbsp;<strong><?php echo $this->_tpl_vars['lang']['Pick']; ?>
</strong></td>
												<td class="bodytextwhite" align="left" width="15%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Provider']; ?>
</strong></td>
												<td class="bodytextwhite" align="center" width="10%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Bid']; ?>
</strong></td>
												<td class="bodytextwhite" align="center" width="10%" height="20"><strong>In Wallet</strong></td>
												<td class="bodytextwhite" align="center" width="14%" height="20"><strong>Commission Due</strong></td>
												<td class="bodytextwhite" align="center" width="8%" height="20"><strong>Short</strong></td>
												<td class="bodytextwhite" align="center" width="20%" height="20"><strong>Bid Date</strong></td>
												<td class="bodytextwhite" align="center" width="15%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Reviews']; ?>
</strong></td>
											</tr>
											<?php unset($this->_sections['bids']);
$this->_sections['bids']['name'] = 'bids';
$this->_sections['bids']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bids']['show'] = true;
$this->_sections['bids']['max'] = $this->_sections['bids']['loop'];
$this->_sections['bids']['step'] = 1;
$this->_sections['bids']['start'] = $this->_sections['bids']['step'] > 0 ? 0 : $this->_sections['bids']['loop']-1;
if ($this->_sections['bids']['show']) {
    $this->_sections['bids']['total'] = $this->_sections['bids']['loop'];
    if ($this->_sections['bids']['total'] == 0)
        $this->_sections['bids']['show'] = false;
} else
    $this->_sections['bids']['total'] = 0;
if ($this->_sections['bids']['show']):

            for ($this->_sections['bids']['index'] = $this->_sections['bids']['start'], $this->_sections['bids']['iteration'] = 1;
                 $this->_sections['bids']['iteration'] <= $this->_sections['bids']['total'];
                 $this->_sections['bids']['index'] += $this->_sections['bids']['step'], $this->_sections['bids']['iteration']++):
$this->_sections['bids']['rownum'] = $this->_sections['bids']['iteration'];
$this->_sections['bids']['index_prev'] = $this->_sections['bids']['index'] - $this->_sections['bids']['step'];
$this->_sections['bids']['index_next'] = $this->_sections['bids']['index'] + $this->_sections['bids']['step'];
$this->_sections['bids']['first']      = ($this->_sections['bids']['iteration'] == 1);
$this->_sections['bids']['last']       = ($this->_sections['bids']['iteration'] == $this->_sections['bids']['total']);
?>
											<tr class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
">
												<td  align="center"><input type="radio" name="selected_user[]" value="<?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['bid_by_user']; ?>
"><!--<input type="checkbox" name="selected_user[]" value="<?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['bid_by_user']; ?>
">--></td>
												<td align="left">&nbsp;<a href="tasker_profile_<?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['bid_by_user']; ?>
.html" ><?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['bid_by_user']; ?>
</a></td>
												<td align="center">$ <?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['bid_amount']; ?>
</td>
												<td  align="center">$<?php echo $this->_tpl_vars['inwallet']; ?>
</td>
												<td  align="center">$<?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['commission']; ?>
</td>
												<td  align="center" style="color:red">$<?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['howshort']; ?>
</td>												
												<td  align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['arr_bids'][$this->_sections['bids']['index']]['date_2'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
												<td  align="center">
												<?php if ($this->_tpl_vars['arr_bids'][$this->_sections['bid']['index']]['rating'] == 0.00): ?>
												   No Feedback yet
												<?php else: ?>
													<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arr_bids'][$this->_sections['bid']['index']]['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120"><br />&nbsp;<a href="<?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bid']['index']]['bid_by_user']; ?>
_tasker_feedback.html" >(<?php if ($this->_tpl_vars['arr_bids'][$this->_sections['bid']['index']]['reviews'] < 1): ?>0<?php endif; ?><?php echo $this->_tpl_vars['arr_bids'][$this->_sections['bid']['index']]['reviews']; ?>
 reviews)</a>
												<?php endif; ?>   
												
												</td>
											</tr>
											<?php endfor; endif; ?>
										</table>
									</td>
								</tr>
								<tr>
									<td height="20"></td>
								</tr>
								<tr>
									<td colspan="2">
					<!--<input id="btnbg" type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Select']; ?>
" class="login_txt style5" onClick="javascript: return check_award(document.frmAward,'<?php echo $this->_tpl_vars['Loop']; ?>
');">-->
					<div class="buttons">
						<button type="submit" value="<?php echo $this->_tpl_vars['lang']['Select']; ?>
" name="Submit"  onClick="javascript: return check_award(document.frmAward,'<?php echo $this->_tpl_vars['Loop']; ?>
');"  style='text-decoration:none;' class="negative">
							Award task to selected provider
						</button>
					</div>						
									</td>
								</tr>
							</table>
							<input type="hidden" name="project_id" value="<?php echo $this->_tpl_vars['project_id']; ?>
" />
							</form>
						<?php else: ?>	
							<table width="100%"  border="0">
									<tr><td height="6"></td></tr>
									<tr>
										<td colspan="2" align="center" class="successMsg"><?php echo $this->_tpl_vars['lang']['Text1']; ?>
 <strong><?php echo $this->_tpl_vars['project_name']; ?>
</strong> <?php echo $this->_tpl_vars['lang']['Text2']; ?>
 <strong><?php echo $this->_tpl_vars['project_name']; ?>
</strong> <?php echo $this->_tpl_vars['lang']['Text3']; ?>
 </td>
									</tr>
									<tr><td height="6"></td></tr>
							</table>		
						<?php endif; ?>	
					<?php endif; ?>
			</div>
			</div>
		</div>
<div class="page_bottom_941"></div>
<div class="clearwspace"></div>	
</div><!-- end .grid_12.alpha omega -->
<div class="clear"></div>
</div><!-- end .grid_12.push_12 -->