<?php /* Smarty version 2.6.26, created on 2012-08-14 15:39:49
         compiled from manage_escrow.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'manage_escrow.tpl', 37, false),array('modifier', 'truncate', 'manage_escrow.tpl', 38, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">  
	<h1>Manage Escrow Payments</h1>
	<div class="clearwspace"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
						<li><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
						<li><a href="make-deposit.html">Deposit</a><span></span></li>
						<li class="current"><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
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
									<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Escrow_Out']; ?>
</label>
								</div>
							</div>
							<div class="clear"></div>
							<div class="field">	
							<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
								<tr class="header"  bgcolor="#D5D5D5">
									<td class="bodytextwhite" height="15" width="25%"><strong>&nbsp;Task Title</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;<?php echo $this->_tpl_vars['lang']['User']; ?>
</strong></td>
									<td class="bodytextwhite" height="15" width="30%"><strong>&nbsp;MILESTONE</strong></td>							
									<td class="bodytextwhite" height="15" width="10%"><strong>&nbsp;<?php echo $this->_tpl_vars['lang']['Amount_Head']; ?>
</strong></td>
									<td class="bodytextwhite" height="15" width="20%"><strong>&nbsp;Action</strong></td>
								</tr>
								<?php unset($this->_sections['escrowout']);
$this->_sections['escrowout']['name'] = 'escrowout';
$this->_sections['escrowout']['loop'] = is_array($_loop=$this->_tpl_vars['Loop2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['escrowout']['show'] = true;
$this->_sections['escrowout']['max'] = $this->_sections['escrowout']['loop'];
$this->_sections['escrowout']['step'] = 1;
$this->_sections['escrowout']['start'] = $this->_sections['escrowout']['step'] > 0 ? 0 : $this->_sections['escrowout']['loop']-1;
if ($this->_sections['escrowout']['show']) {
    $this->_sections['escrowout']['total'] = $this->_sections['escrowout']['loop'];
    if ($this->_sections['escrowout']['total'] == 0)
        $this->_sections['escrowout']['show'] = false;
} else
    $this->_sections['escrowout']['total'] = 0;
if ($this->_sections['escrowout']['show']):

            for ($this->_sections['escrowout']['index'] = $this->_sections['escrowout']['start'], $this->_sections['escrowout']['iteration'] = 1;
                 $this->_sections['escrowout']['iteration'] <= $this->_sections['escrowout']['total'];
                 $this->_sections['escrowout']['index'] += $this->_sections['escrowout']['step'], $this->_sections['escrowout']['iteration']++):
$this->_sections['escrowout']['rownum'] = $this->_sections['escrowout']['iteration'];
$this->_sections['escrowout']['index_prev'] = $this->_sections['escrowout']['index'] - $this->_sections['escrowout']['step'];
$this->_sections['escrowout']['index_next'] = $this->_sections['escrowout']['index'] + $this->_sections['escrowout']['step'];
$this->_sections['escrowout']['first']      = ($this->_sections['escrowout']['iteration'] == 1);
$this->_sections['escrowout']['last']       = ($this->_sections['escrowout']['iteration'] == $this->_sections['escrowout']['total']);
?>
								<tr class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
">
									<td class="bodytextblack" width="25%">&nbsp;<a href="task_<?php echo $this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['project_id']; ?>
_<?php echo $this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['clean_title']; ?>
.html" title="<?php echo $this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['task_title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['task_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : smarty_modifier_truncate($_tmp, 20)); ?>
</a></td>
									<td class="bodytextblack" width="15%">&nbsp;<?php echo $this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['to_user_login_id']; ?>
</td>
									<td class="bodytextblack" width="30%">&nbsp;<?php echo $this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['milestone']; ?>
</td>							
									<td class="bodytextblack" width="15%"><?php echo $this->_tpl_vars['lang']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['amount']; ?>
</td>
									<td class="bodytextblack" width="15%"><a href="release_payment_<?php echo $this->_tpl_vars['aescrowout'][$this->_sections['escrowout']['index']]['ep_id']; ?>
.html" class="footerlinkcommon2">Release</a> </td>
								</tr>
								<?php endfor; else: ?>
								<tr>
									<td class="bodytext" align="center" colspan="3">(<?php echo $this->_tpl_vars['lang']['Text']; ?>
.)</td>
								</tr>
								<?php endif; ?>
							</table>			

							<div class="clear"></div>
							</div>
							<div class="title-links" style="width:100%;">
								<div class="form_page_text" style="text-align:center;">
									<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Escrow_In']; ?>
</label>
								</div>
							</div>
							<div class="clear"></div>
						<div class="field">					
							<table width="99%" cellpadding="0" cellspacing="0" border="0" align="center">
								<tr class="header"  bgcolor="#D5D5D5">
									<td class="bodytextwhite" height="15" width="25%"><strong>&nbsp;Task Title</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;<?php echo $this->_tpl_vars['lang']['User']; ?>
</strong></td>
									<td class="bodytextwhite" height="15" width="30%"><strong>&nbsp;MILESTONE</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;<?php echo $this->_tpl_vars['lang']['Amount_Head']; ?>
</strong></td>
									<td class="bodytextwhite" height="15" width="15%"><strong>&nbsp;Action</strong></td>
								</tr>
								<?php unset($this->_sections['escrowin']);
$this->_sections['escrowin']['name'] = 'escrowin';
$this->_sections['escrowin']['loop'] = is_array($_loop=$this->_tpl_vars['Loop3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['escrowin']['show'] = true;
$this->_sections['escrowin']['max'] = $this->_sections['escrowin']['loop'];
$this->_sections['escrowin']['step'] = 1;
$this->_sections['escrowin']['start'] = $this->_sections['escrowin']['step'] > 0 ? 0 : $this->_sections['escrowin']['loop']-1;
if ($this->_sections['escrowin']['show']) {
    $this->_sections['escrowin']['total'] = $this->_sections['escrowin']['loop'];
    if ($this->_sections['escrowin']['total'] == 0)
        $this->_sections['escrowin']['show'] = false;
} else
    $this->_sections['escrowin']['total'] = 0;
if ($this->_sections['escrowin']['show']):

            for ($this->_sections['escrowin']['index'] = $this->_sections['escrowin']['start'], $this->_sections['escrowin']['iteration'] = 1;
                 $this->_sections['escrowin']['iteration'] <= $this->_sections['escrowin']['total'];
                 $this->_sections['escrowin']['index'] += $this->_sections['escrowin']['step'], $this->_sections['escrowin']['iteration']++):
$this->_sections['escrowin']['rownum'] = $this->_sections['escrowin']['iteration'];
$this->_sections['escrowin']['index_prev'] = $this->_sections['escrowin']['index'] - $this->_sections['escrowin']['step'];
$this->_sections['escrowin']['index_next'] = $this->_sections['escrowin']['index'] + $this->_sections['escrowin']['step'];
$this->_sections['escrowin']['first']      = ($this->_sections['escrowin']['iteration'] == 1);
$this->_sections['escrowin']['last']       = ($this->_sections['escrowin']['iteration'] == $this->_sections['escrowin']['total']);
?>
								<tr class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
">
									<td class="bodytextblack" width="25%">&nbsp;<a href="task_<?php echo $this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['project_id']; ?>
_<?php echo $this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['clean_title']; ?>
.html" title="<?php echo $this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['project_title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['project_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : smarty_modifier_truncate($_tmp, 20)); ?>
</a></td>
									<td class="bodytextblack" width="15%">&nbsp;<?php echo $this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['from_user_login_id']; ?>
</td>
									<td class="bodytextblack" width="30%">&nbsp;<?php echo $this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['milestone']; ?>
</td>							
									<td class="bodytextblack" width="15%"><?php echo $this->_tpl_vars['lang']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['amount']; ?>
</td>
									<td class="bodytextblack" width="15%"><a href="cancel_payment_<?php echo $this->_tpl_vars['aescrowin'][$this->_sections['escrowin']['index']]['ep_id']; ?>
.html" class="footerlinkcommon2">Cancel</a> </td>
								</tr>
								<?php endfor; else: ?>
								<tr>
									<td class="bodytext" align="center" colspan="3">(<?php echo $this->_tpl_vars['lang']['Text']; ?>
.)</td>
								</tr>
								<?php endif; ?>											
						  </table>
							<div class="clear"></div>				  
						</div>

	
						<div class="clear"></div>
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
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Map']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->