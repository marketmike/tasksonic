<?php /* Smarty version 2.6.26, created on 2012-08-23 10:31:00
         compiled from bid_showall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'bid_showall.tpl', 47, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Bid Management			
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmNewBid" action="<?php echo $this->_tpl_vars['A_Action']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Bid Management </td>
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
						Manage Bid. Add/Edit/Delete Bid.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmNewBid.submit();">
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
			<table border="0" cellpadding="1" cellspacing="1" width="90%">
				<tr>
					<td width="5%" class="headTitle"></td>
					<td class="headTitle" align="center" width="15%">Bid by User </td>
					<td class="headTitle" align="center" width="15%">Bid Amount </td>
					<td class="headTitle" align="center" width="38%">On Task </td>
					<td class="headTitle" width="15%" align="center">Action</td>
				</tr>
				<?php unset($this->_sections['bad']);
$this->_sections['bad']['name'] = 'bad';
$this->_sections['bad']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bad']['show'] = true;
$this->_sections['bad']['max'] = $this->_sections['bad']['loop'];
$this->_sections['bad']['step'] = 1;
$this->_sections['bad']['start'] = $this->_sections['bad']['step'] > 0 ? 0 : $this->_sections['bad']['loop']-1;
if ($this->_sections['bad']['show']) {
    $this->_sections['bad']['total'] = $this->_sections['bad']['loop'];
    if ($this->_sections['bad']['total'] == 0)
        $this->_sections['bad']['show'] = false;
} else
    $this->_sections['bad']['total'] = 0;
if ($this->_sections['bad']['show']):

            for ($this->_sections['bad']['index'] = $this->_sections['bad']['start'], $this->_sections['bad']['iteration'] = 1;
                 $this->_sections['bad']['iteration'] <= $this->_sections['bad']['total'];
                 $this->_sections['bad']['index'] += $this->_sections['bad']['step'], $this->_sections['bad']['iteration']++):
$this->_sections['bad']['rownum'] = $this->_sections['bad']['iteration'];
$this->_sections['bad']['index_prev'] = $this->_sections['bad']['index'] - $this->_sections['bad']['step'];
$this->_sections['bad']['index_next'] = $this->_sections['bad']['index'] + $this->_sections['bad']['step'];
$this->_sections['bad']['first']      = ($this->_sections['bad']['iteration'] == 1);
$this->_sections['bad']['last']       = ($this->_sections['bad']['iteration'] == $this->_sections['bad']['total']);
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td width="5%"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="<?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['id']; ?>
" align="middle" ></td>
					<td class="bodytextblack" align="center"><?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['bid_by_user']; ?>
</td>
					<td class="bodytextblack" align="center">$&nbsp;<?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['bid_amount']; ?>
</td>
					<td class="bodytextblack" align="center"><?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['project_title']; ?>
</td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['id']; ?>
','<?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['project_id']; ?>
');">&nbsp;&nbsp;
					  	<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('<?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['id']; ?>
','<?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['project_id']; ?>
','<?php echo $this->_tpl_vars['arr_bid'][$this->_sections['bad']['index']]['bid_by_user']; ?>
');">&nbsp;&nbsp;
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
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="bid_id" />
	<input type="hidden" name="project_id" />
	<input type="hidden" name="user_name" />
</form>
</table>