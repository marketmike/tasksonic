<?php /* Smarty version 2.6.26, created on 2012-08-23 10:35:38
         compiled from email_managment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'email_managment.tpl', 58, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Email Management	
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmEmailManagment" action="<?php echo $this->_sections['PHP_SELF']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Email Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td class="varnormal">
						Manage Email. Edit Email.
						<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmEmailManagment.submit();">
							<?php echo $this->_tpl_vars['PageSize_List']; ?>

					  </select></div>
					</td>
				</tr>
				<tr>
					<td height="2">&nbsp;</td>
				</tr>
				<tr>
					<td height="2" align="center"><font size="+1">
If you want to change any email-template here than please contact technical team. Please do not try yourself.</font></td>
				</tr>
				<tr>
					<td height="2">&nbsp;</td>
				</tr>
				<tr><td class="successMsg" align="center">&nbsp;<?php echo $this->_tpl_vars['succMessage']; ?>
</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="2" align="right">
					</td>
				</tr>
				<tr>
					<td class="headTitle"  width="50%" >Name </td>
					<td class="headTitle"   align="center">Email Send </td>
					<td class="headTitle"  >Action</td>
				</tr>
				<?php unset($this->_sections['emailmagamant']);
$this->_sections['emailmagamant']['name'] = 'emailmagamant';
$this->_sections['emailmagamant']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['emailmagamant']['show'] = true;
$this->_sections['emailmagamant']['max'] = $this->_sections['emailmagamant']['loop'];
$this->_sections['emailmagamant']['step'] = 1;
$this->_sections['emailmagamant']['start'] = $this->_sections['emailmagamant']['step'] > 0 ? 0 : $this->_sections['emailmagamant']['loop']-1;
if ($this->_sections['emailmagamant']['show']) {
    $this->_sections['emailmagamant']['total'] = $this->_sections['emailmagamant']['loop'];
    if ($this->_sections['emailmagamant']['total'] == 0)
        $this->_sections['emailmagamant']['show'] = false;
} else
    $this->_sections['emailmagamant']['total'] = 0;
if ($this->_sections['emailmagamant']['show']):

            for ($this->_sections['emailmagamant']['index'] = $this->_sections['emailmagamant']['start'], $this->_sections['emailmagamant']['iteration'] = 1;
                 $this->_sections['emailmagamant']['iteration'] <= $this->_sections['emailmagamant']['total'];
                 $this->_sections['emailmagamant']['index'] += $this->_sections['emailmagamant']['step'], $this->_sections['emailmagamant']['iteration']++):
$this->_sections['emailmagamant']['rownum'] = $this->_sections['emailmagamant']['iteration'];
$this->_sections['emailmagamant']['index_prev'] = $this->_sections['emailmagamant']['index'] - $this->_sections['emailmagamant']['step'];
$this->_sections['emailmagamant']['index_next'] = $this->_sections['emailmagamant']['index'] + $this->_sections['emailmagamant']['step'];
$this->_sections['emailmagamant']['first']      = ($this->_sections['emailmagamant']['iteration'] == 1);
$this->_sections['emailmagamant']['last']       = ($this->_sections['emailmagamant']['iteration'] == $this->_sections['emailmagamant']['total']);
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td width="50%" class="bodytextblack">&nbsp;<?php echo $this->_tpl_vars['memail'][$this->_sections['emailmagamant']['index']]['en_sub']; ?>
</td>
					<td class="bodytextblack">&nbsp;<?php echo $this->_tpl_vars['memail'][$this->_sections['emailmagamant']['index']]['emailsend']; ?>
</td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['memail'][$this->_sections['emailmagamant']['index']]['id']; ?>
');">&nbsp;&nbsp;
					</td>	
				</tr>
				<?php endfor; endif; ?>
			</table>
			<?php if ($this->_tpl_vars['Page_Link']): ?>
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						<?php echo $this->_tpl_vars['Page_Link']; ?>

				</td>
				</tr>
			</table>
			<?php endif; ?>
	 	  </td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="email_id" />
	</form>
</table>