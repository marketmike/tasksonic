<?php /* Smarty version 2.6.26, created on 2012-08-23 10:27:30
         compiled from category_showall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'category_showall.tpl', 56, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Category Management						
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmCategory" action="<?php echo $this->_tpl_vars['A_Action']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Category Management </td>
					<td class="pagetitle" width="51%" height="25" align="right"><a href="JavaScript: HELP('category');" class="graylink"><strong>Help</strong></a>&nbsp;&nbsp;</td>
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
						Manage Category. Add/Edit/Delete Category.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmCategory.submit();">
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
					<td colspan="4"><?php echo $this->_tpl_vars['navigationLink']; ?>
</td>
				</tr>
				<tr>
					<td colspan="4" align="right"><a class="actionLink" href="javascript: Add_Click('<?php echo $this->_tpl_vars['cat_parent_id']; ?>
')"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
add.gif" class="imgAction" title="Add" border="0" /></a><br />
					  <a href="Javascript: Order_Click('<?php echo $this->_tpl_vars['cat_parent_id']; ?>
')" class="actionLink">Manage Order</a>				  </td>
				</tr>
				<tr>
					<td width="3%" class="headTitle"></td>
					<td class="headTitle">Name </td>
					<td class="headTitle">Status</td>
					<td class="headTitle" width="31%">Action</td>
				</tr>
				<?php unset($this->_sections['prodCat']);
$this->_sections['prodCat']['name'] = 'prodCat';
$this->_sections['prodCat']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prodCat']['show'] = true;
$this->_sections['prodCat']['max'] = $this->_sections['prodCat']['loop'];
$this->_sections['prodCat']['step'] = 1;
$this->_sections['prodCat']['start'] = $this->_sections['prodCat']['step'] > 0 ? 0 : $this->_sections['prodCat']['loop']-1;
if ($this->_sections['prodCat']['show']) {
    $this->_sections['prodCat']['total'] = $this->_sections['prodCat']['loop'];
    if ($this->_sections['prodCat']['total'] == 0)
        $this->_sections['prodCat']['show'] = false;
} else
    $this->_sections['prodCat']['total'] = 0;
if ($this->_sections['prodCat']['show']):

            for ($this->_sections['prodCat']['index'] = $this->_sections['prodCat']['start'], $this->_sections['prodCat']['iteration'] = 1;
                 $this->_sections['prodCat']['iteration'] <= $this->_sections['prodCat']['total'];
                 $this->_sections['prodCat']['index'] += $this->_sections['prodCat']['step'], $this->_sections['prodCat']['iteration']++):
$this->_sections['prodCat']['rownum'] = $this->_sections['prodCat']['iteration'];
$this->_sections['prodCat']['index_prev'] = $this->_sections['prodCat']['index'] - $this->_sections['prodCat']['step'];
$this->_sections['prodCat']['index_next'] = $this->_sections['prodCat']['index'] + $this->_sections['prodCat']['step'];
$this->_sections['prodCat']['first']      = ($this->_sections['prodCat']['iteration'] == 1);
$this->_sections['prodCat']['last']       = ($this->_sections['prodCat']['iteration'] == $this->_sections['prodCat']['total']);
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="<?php echo $this->_tpl_vars['cat_id'][$this->_sections['prodCat']['index']]; ?>
"></td>
					<td width="28%" class="bodytextblack"><a href="category.php?cat_parent_id=<?php echo $this->_tpl_vars['cat_id'][$this->_sections['prodCat']['index']]; ?>
" class="FieldLink"><?php echo $this->_tpl_vars['cat_name'][$this->_sections['prodCat']['index']]; ?>
</a></td>
					<td align="center" class="bodytextblack">
						<?php if ($this->_tpl_vars['cat_status'][$this->_sections['prodCat']['index']] == 1): ?>
							Visible
						<?php else: ?>
							<b>Hidden</b>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['cat_id'][$this->_sections['prodCat']['index']] != 0): ?>
							<?php if ($this->_tpl_vars['cat_status'][$this->_sections['prodCat']['index']] == 1): ?>
								(<a href="JavaScript: ToggleStatus_Click('<?php echo $this->_tpl_vars['cat_id'][$this->_sections['prodCat']['index']]; ?>
', '0','<?php echo $this->_tpl_vars['cat_parent_id']; ?>
');" class="actionLink">Hidden</a>)
							<?php else: ?>
								(<a href="JavaScript: ToggleStatus_Click('<?php echo $this->_tpl_vars['cat_id'][$this->_sections['prodCat']['index']]; ?>
', '1','<?php echo $this->_tpl_vars['cat_parent_id']; ?>
');" class="actionLink">Visible</a>)
							<?php endif; ?>
						<?php endif; ?>					</td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['cat_id'][$this->_sections['prodCat']['index']]; ?>
');">&nbsp;&nbsp;
					  	<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" 	class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('<?php echo $this->_tpl_vars['cat_id'][$this->_sections['prodCat']['index']]; ?>
','<?php echo $this->_tpl_vars['cat_parent_id']; ?>
');">&nbsp;&nbsp;</td>
				</tr>
				<?php endfor; else: ?>
				<tr>	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan="3" align="center" class="bodytextblack">No category inserted yet.</td>
				</tr>
				<?php endif; ?>
			</table>
			<?php if ($this->_sections['prodCat']['total'] > 1): ?>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('<?php echo $this->_tpl_vars['cat_parent_id']; ?>
');">
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
	<input type="hidden" name="cat_parent_id" />
	</form>
</table>