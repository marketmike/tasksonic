<?php /* Smarty version 2.6.26, created on 2012-08-23 10:28:30
         compiled from country_showall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'country_showall.tpl', 54, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Country Management				
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmCountry" action="<?php echo $this->_sections['PHP_SELF']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Country Management </td>
					<td class="pagetitle" width="51%" height="25" align="right"><a href="JavaScript: HELP('country');" class="graylink"><strong>Help</strong></a>&nbsp;&nbsp;</td>
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
						Manage Country. Add/Edit/Delete Country.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmCountry.submit();">
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
			<input type="hidden" name="cat_id" />
			<input type="hidden" name="status" />
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="4" align="right"><a class="actionLink" href="<?php echo $_SERVER['PHP_SELF']; ?>
?Action=Add"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
add.gif" class="imgAction" title="Add" border="0"></a>
					<br /><a href="Javascript: Order_Click()" class="actionLink">Manage Order</a>
					</td>
				</tr>
				<tr>
					<td width="3%" class="headTitle"></td>
					<td class="headTitle">Name </td>
					<td class="headTitle" width="31%">Action</td>
					
				</tr>
				<?php unset($this->_sections['country']);
$this->_sections['country']['name'] = 'country';
$this->_sections['country']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['country']['show'] = true;
$this->_sections['country']['max'] = $this->_sections['country']['loop'];
$this->_sections['country']['step'] = 1;
$this->_sections['country']['start'] = $this->_sections['country']['step'] > 0 ? 0 : $this->_sections['country']['loop']-1;
if ($this->_sections['country']['show']) {
    $this->_sections['country']['total'] = $this->_sections['country']['loop'];
    if ($this->_sections['country']['total'] == 0)
        $this->_sections['country']['show'] = false;
} else
    $this->_sections['country']['total'] = 0;
if ($this->_sections['country']['show']):

            for ($this->_sections['country']['index'] = $this->_sections['country']['start'], $this->_sections['country']['iteration'] = 1;
                 $this->_sections['country']['iteration'] <= $this->_sections['country']['total'];
                 $this->_sections['country']['index'] += $this->_sections['country']['step'], $this->_sections['country']['iteration']++):
$this->_sections['country']['rownum'] = $this->_sections['country']['iteration'];
$this->_sections['country']['index_prev'] = $this->_sections['country']['index'] - $this->_sections['country']['step'];
$this->_sections['country']['index_next'] = $this->_sections['country']['index'] + $this->_sections['country']['step'];
$this->_sections['country']['first']      = ($this->_sections['country']['iteration'] == 1);
$this->_sections['country']['last']       = ($this->_sections['country']['iteration'] == $this->_sections['country']['total']);
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="<?php echo $this->_tpl_vars['country_id'][$this->_sections['country']['index']]; ?>
"></td>
					<td width="28%" class="bodytextblack">&nbsp;<?php echo $this->_tpl_vars['country_name'][$this->_sections['country']['index']]; ?>
</td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['country_id'][$this->_sections['country']['index']]; ?>
');">&nbsp;&nbsp;
					  	<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif"	class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('<?php echo $this->_tpl_vars['country_id'][$this->_sections['country']['index']]; ?>
');">&nbsp;&nbsp;</td>
				</tr>
				<?php endfor; else: ?>
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="3" align="center" class="bodytextblack">No country inserted yet.</td>
				</tr>
				<?php endif; ?>
			</table>
			<?php if ($this->_sections['country']['total'] > 1): ?>
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
	<input type="hidden" name="country_id" />
	</form>
</table>