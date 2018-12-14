<?php /* Smarty version 2.6.26, created on 2012-09-21 03:23:37
         compiled from withdraw_pending.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'withdraw_pending.tpl', 36, false),array('modifier', 'string_format', 'withdraw_pending.tpl', 37, false),array('modifier', 'date_format', 'withdraw_pending.tpl', 39, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">  
	<h1>Pending Withdraws</h1>
	<div class="clear"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="request-withdraw.html">Withdraw Request</a><span></span></li>			
						<li class="current"><a href="pending-withdraw.html">Pending Withdraws</a><span></span></li>
						<li><a href="my-transactions.html">Transactions</a><span></span></li>		
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
									<label for="login-email-address">Pending Withdraws</label>
								</div>
							</div>
							<div class="clear"></div>
							<?php if ($this->_tpl_vars['Loop1'] > 0): ?>
							<div class="field">						
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr class="header" bgcolor="#D5D5D5">
									<td class="bodytextwhite" align="center" width="10%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Amount_Head']; ?>
</strong></td>
									<td class="bodytextwhite" align="center" width="35%" ><strong><?php echo $this->_tpl_vars['lang']['Description']; ?>
</strong></td>
									<td class="bodytextwhite" align="center" width="15%" ><strong><?php echo $this->_tpl_vars['lang']['Date']; ?>
</strong></td>
									<td class="bodytextwhite" align="center" width="15%" ><strong><?php echo $this->_tpl_vars['lang']['Status']; ?>
</strong></td>
								</tr>
								<?php unset($this->_sections['withdrawmoney']);
$this->_sections['withdrawmoney']['name'] = 'withdrawmoney';
$this->_sections['withdrawmoney']['loop'] = is_array($_loop=$this->_tpl_vars['Loop1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['withdrawmoney']['show'] = true;
$this->_sections['withdrawmoney']['max'] = $this->_sections['withdrawmoney']['loop'];
$this->_sections['withdrawmoney']['step'] = 1;
$this->_sections['withdrawmoney']['start'] = $this->_sections['withdrawmoney']['step'] > 0 ? 0 : $this->_sections['withdrawmoney']['loop']-1;
if ($this->_sections['withdrawmoney']['show']) {
    $this->_sections['withdrawmoney']['total'] = $this->_sections['withdrawmoney']['loop'];
    if ($this->_sections['withdrawmoney']['total'] == 0)
        $this->_sections['withdrawmoney']['show'] = false;
} else
    $this->_sections['withdrawmoney']['total'] = 0;
if ($this->_sections['withdrawmoney']['show']):

            for ($this->_sections['withdrawmoney']['index'] = $this->_sections['withdrawmoney']['start'], $this->_sections['withdrawmoney']['iteration'] = 1;
                 $this->_sections['withdrawmoney']['iteration'] <= $this->_sections['withdrawmoney']['total'];
                 $this->_sections['withdrawmoney']['index'] += $this->_sections['withdrawmoney']['step'], $this->_sections['withdrawmoney']['iteration']++):
$this->_sections['withdrawmoney']['rownum'] = $this->_sections['withdrawmoney']['iteration'];
$this->_sections['withdrawmoney']['index_prev'] = $this->_sections['withdrawmoney']['index'] - $this->_sections['withdrawmoney']['step'];
$this->_sections['withdrawmoney']['index_next'] = $this->_sections['withdrawmoney']['index'] + $this->_sections['withdrawmoney']['step'];
$this->_sections['withdrawmoney']['first']      = ($this->_sections['withdrawmoney']['iteration'] == 1);
$this->_sections['withdrawmoney']['last']       = ($this->_sections['withdrawmoney']['iteration'] == $this->_sections['withdrawmoney']['total']);
?>
									<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
										<td align="center" class="bodytext" width="20%" height="20"><?php echo $this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['trans_type']; ?>
&nbsp;<?php echo $this->_tpl_vars['lang']['Curreny']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
										<td align="center" class="bodytext" ><?php echo $this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['description']; ?>
</td>
										<td align="center" class="bodytext" ><?php echo ((is_array($_tmp=$this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['requested_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B %d, %Y at %I:%M %p') : smarty_modifier_date_format($_tmp, '%B %d, %Y at %I:%M %p')); ?>
</td>
										<td align="center" class="bodytext" ><?php if ($this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['status'] == 0): ?><?php echo $this->_tpl_vars['lang']['Requested']; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang']['Completed']; ?>
<?php endif; ?></td>
								   </tr>
								<?php endfor; endif; ?>
							</table>
							</div>														
							<?php endif; ?>
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