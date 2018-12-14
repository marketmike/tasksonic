<?php /* Smarty version 2.6.26, created on 2012-08-23 10:32:32
         compiled from contact_showall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'contact_showall.tpl', 48, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Contact Us Management				
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmContactUs" action="<?php echo $this->_sections['PHP_SELF']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Contact Us Management </td>
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
						Manage Contact Us. View/Update Status/Delete Contacts.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmContactUs.submit();">
							<?php echo $this->_tpl_vars['PageSize_List']; ?>

					  </select></div>
					</td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;<?php echo $this->_tpl_vars['succMessage']; ?>
</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td width="3%" class="headTitle"></td>
					<td class="headTitle" width="20%">User Name </td>
					<td class="headTitle" width="20%">Subject </td>
					<td class="headTitle" width="20%">Reason </td>
					<td class="headTitle" width="30%">Action</td>
					
				</tr>
				<?php unset($this->_sections['contact']);
$this->_sections['contact']['name'] = 'contact';
$this->_sections['contact']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['contact']['show'] = true;
$this->_sections['contact']['max'] = $this->_sections['contact']['loop'];
$this->_sections['contact']['step'] = 1;
$this->_sections['contact']['start'] = $this->_sections['contact']['step'] > 0 ? 0 : $this->_sections['contact']['loop']-1;
if ($this->_sections['contact']['show']) {
    $this->_sections['contact']['total'] = $this->_sections['contact']['loop'];
    if ($this->_sections['contact']['total'] == 0)
        $this->_sections['contact']['show'] = false;
} else
    $this->_sections['contact']['total'] = 0;
if ($this->_sections['contact']['show']):

            for ($this->_sections['contact']['index'] = $this->_sections['contact']['start'], $this->_sections['contact']['iteration'] = 1;
                 $this->_sections['contact']['iteration'] <= $this->_sections['contact']['total'];
                 $this->_sections['contact']['index'] += $this->_sections['contact']['step'], $this->_sections['contact']['iteration']++):
$this->_sections['contact']['rownum'] = $this->_sections['contact']['iteration'];
$this->_sections['contact']['index_prev'] = $this->_sections['contact']['index'] - $this->_sections['contact']['step'];
$this->_sections['contact']['index_next'] = $this->_sections['contact']['index'] + $this->_sections['contact']['step'];
$this->_sections['contact']['first']      = ($this->_sections['contact']['iteration'] == 1);
$this->_sections['contact']['last']       = ($this->_sections['contact']['iteration'] == $this->_sections['contact']['total']);
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="<?php echo $this->_tpl_vars['arr_contact'][$this->_sections['contact']['index']]['contact_id']; ?>
"></td>
					<td class="bodytextblack">&nbsp;<?php echo $this->_tpl_vars['arr_contact'][$this->_sections['contact']['index']]['user_name']; ?>
</td>
					<td class="bodytextblack">&nbsp;<?php echo $this->_tpl_vars['arr_contact'][$this->_sections['contact']['index']]['contact_subject']; ?>
</td>
					<td class="bodytextblack">&nbsp;<?php echo $this->_tpl_vars['arr_contact'][$this->_sections['contact']['index']]['contact_reason']; ?>
</td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['arr_contact'][$this->_sections['contact']['index']]['contact_id']; ?>
');">&nbsp;&nbsp;
					  	<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif"	class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('<?php echo $this->_tpl_vars['arr_contact'][$this->_sections['contact']['index']]['contact_id']; ?>
');">&nbsp;&nbsp;</td>
				</tr>
				<?php endfor; else: ?>
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="4" align="center" class="bodytextblack">No Contact Us inserted yet.</td>
				</tr>
				<?php endif; ?>
			</table>
			<?php if ($this->_sections['contact']['total'] > 1): ?>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click();">
					</td>
				</tr>
			</table>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['Page_Link']): ?>
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						<?php echo $this->_tpl_vars['Page_Link']; ?>

				</td>
				</tr>
			</table>
			<?php endif; ?>
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="contact_id" />
	</form>
</table>