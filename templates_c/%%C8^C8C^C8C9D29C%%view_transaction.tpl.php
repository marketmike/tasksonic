<?php /* Smarty version 2.6.26, created on 2012-08-14 03:57:59
         compiled from view_transaction.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'view_transaction.tpl', 33, false),array('modifier', 'string_format', 'view_transaction.tpl', 34, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['Transaction_History']; ?>
</h1>
	<div class="clear"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="request-withdraw.html">Withdraw Request</a><span></span></li>			
						<li><a href="pending-withdraw.html">Pending Withdraws</a><span></span></li>
						<li class="current"><a href="my-transactions.html">Transactions</a><span></span></li>		
						</ul>
						</div>
	<div class="clear"></div>	
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Transaction History</label>
					</div>
				</div>
				<div class="clear"></div>				
					<form name="frmtrans" method="post">
					<table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
						<tr class="header" bgcolor="#D5D5D5">
							<td class="bodytextwhite" align="center" width="10%" height="20"><strong><?php echo $this->_tpl_vars['lang']['Amount']; ?>
</strong></td>
							<td class="bodytextwhite" align="center" width="70%" ><strong><?php echo $this->_tpl_vars['lang']['Description']; ?>
</strong></td>
							<td class="bodytextwhite" align="center" width="20%" ><strong><?php echo $this->_tpl_vars['lang']['Date']; ?>
</strong></td>
						</tr>
						<?php if ($this->_tpl_vars['Loop'] != ''): ?>
						<?php unset($this->_sections['trac']);
$this->_sections['trac']['name'] = 'trac';
$this->_sections['trac']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['trac']['show'] = true;
$this->_sections['trac']['max'] = $this->_sections['trac']['loop'];
$this->_sections['trac']['step'] = 1;
$this->_sections['trac']['start'] = $this->_sections['trac']['step'] > 0 ? 0 : $this->_sections['trac']['loop']-1;
if ($this->_sections['trac']['show']) {
    $this->_sections['trac']['total'] = $this->_sections['trac']['loop'];
    if ($this->_sections['trac']['total'] == 0)
        $this->_sections['trac']['show'] = false;
} else
    $this->_sections['trac']['total'] = 0;
if ($this->_sections['trac']['show']):

            for ($this->_sections['trac']['index'] = $this->_sections['trac']['start'], $this->_sections['trac']['iteration'] = 1;
                 $this->_sections['trac']['iteration'] <= $this->_sections['trac']['total'];
                 $this->_sections['trac']['index'] += $this->_sections['trac']['step'], $this->_sections['trac']['iteration']++):
$this->_sections['trac']['rownum'] = $this->_sections['trac']['iteration'];
$this->_sections['trac']['index_prev'] = $this->_sections['trac']['index'] - $this->_sections['trac']['step'];
$this->_sections['trac']['index_next'] = $this->_sections['trac']['index'] + $this->_sections['trac']['step'];
$this->_sections['trac']['first']      = ($this->_sections['trac']['iteration'] == 1);
$this->_sections['trac']['last']       = ($this->_sections['trac']['iteration'] == $this->_sections['trac']['total']);
?>
						<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
							<td align="center" class="bodytextblack" width="10%" height="30"><?php echo $this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['trans_type']; ?>
<?php echo $this->_tpl_vars['Curreny']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
							<td align="left" class="bodytextblack" width="70%"><?php echo $this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['description']; ?>
</td>
							<td align="center" class="bodytextblack" width="20%" ><?php echo $this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['trans_date']; ?>
</td>
					   </tr>
						<tr>
							<td colspan="3" height="10"></td>
					   </tr>					   
						<?php endfor; endif; ?>
						<?php else: ?>
						<tr>
							<td>&nbsp;</td>
						</tr>	
						<tr>
							<td width="50%" align="center" class="bodytext" colspan="3">
								<?php echo $this->_tpl_vars['msg']; ?>
		
							</td>
						</tr>
						<?php endif; ?>
						<tr>
							<td>&nbsp;</td>
						</tr>	
					</table>
					<div><ul class="paginator"><?php echo $this->_tpl_vars['Page_Link']; ?>
</ul></div>	
					</form>
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