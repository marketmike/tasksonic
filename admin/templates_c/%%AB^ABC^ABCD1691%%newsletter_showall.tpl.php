<?php /* Smarty version 2.6.26, created on 2012-08-23 10:30:25
         compiled from newsletter_showall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'newsletter_showall.tpl', 53, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Membership Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmNewsletter" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Membership Management </td>
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
						Manage Newletter. Add/Edit/Delete Newletter.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmNewsletter.submit();">
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
					<td colspan="6" align="right"><a class="actionLink" href="<?php echo $_SERVER['PHP_SELF']; ?>
?Action=Add"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
add.gif" class="imgAction" title="Add" border="0" /></a></td>
				</tr>
				<tr>
				   <td colspan="6" align="right"><a href="Javascript: Order_Click()" class="actionLink">Manage Order</a>
				   </td> 
				</tr>
				<tr>
					<td width="5%" class="headTitle"></td>
					<td class="headTitle" align="center">News Title </td>
					<td class="headTitle" width="23%" align="center">Status</td>					
					<td class="headTitle" width="23%" align="center">Action</td>
				</tr>
				<?php unset($this->_sections['news']);
$this->_sections['news']['name'] = 'news';
$this->_sections['news']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['news']['show'] = true;
$this->_sections['news']['max'] = $this->_sections['news']['loop'];
$this->_sections['news']['step'] = 1;
$this->_sections['news']['start'] = $this->_sections['news']['step'] > 0 ? 0 : $this->_sections['news']['loop']-1;
if ($this->_sections['news']['show']) {
    $this->_sections['news']['total'] = $this->_sections['news']['loop'];
    if ($this->_sections['news']['total'] == 0)
        $this->_sections['news']['show'] = false;
} else
    $this->_sections['news']['total'] = 0;
if ($this->_sections['news']['show']):

            for ($this->_sections['news']['index'] = $this->_sections['news']['start'], $this->_sections['news']['iteration'] = 1;
                 $this->_sections['news']['iteration'] <= $this->_sections['news']['total'];
                 $this->_sections['news']['index'] += $this->_sections['news']['step'], $this->_sections['news']['iteration']++):
$this->_sections['news']['rownum'] = $this->_sections['news']['iteration'];
$this->_sections['news']['index_prev'] = $this->_sections['news']['index'] - $this->_sections['news']['step'];
$this->_sections['news']['index_next'] = $this->_sections['news']['index'] + $this->_sections['news']['step'];
$this->_sections['news']['first']      = ($this->_sections['news']['iteration'] == 1);
$this->_sections['news']['last']       = ($this->_sections['news']['iteration'] == $this->_sections['news']['total']);
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td width="5%"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="<?php echo $this->_tpl_vars['newsletter'][$this->_sections['news']['index']]['id']; ?>
" align="middle"></td>
					<td class="bodytextblack" align="center">&nbsp;<?php echo $this->_tpl_vars['newsletter'][$this->_sections['news']['index']]['title']; ?>
</td>
					<td class="bodytextblack" align="center">&nbsp;<?php echo $this->_tpl_vars['newsletter'][$this->_sections['news']['index']]['status']; ?>
 </td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['newsletter'][$this->_sections['news']['index']]['id']; ?>
');">&nbsp;&nbsp;
					  	<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('<?php echo $this->_tpl_vars['newsletter'][$this->_sections['news']['index']]['id']; ?>
');">&nbsp;&nbsp;
					</td>	
				</tr>
			<?php endfor; endif; ?>
			</table>
			<?php if ($this->_sections['news']['total'] > 1): ?>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('<?php echo $this->_tpl_vars['newsletter'][$this->_sections['news']['index']]['id']; ?>
');">
					</td>
				</tr>
			</table>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['Page_Link']): ?>
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
					<td align="right"><?php echo $this->_tpl_vars['Page_Link']; ?>
</td>
				</tr>
			</table>
			<?php endif; ?>
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="news_id" />
	<input type="hidden" name="status" />

	</form>
</table>