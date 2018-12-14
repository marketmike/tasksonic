<?php /* Smarty version 2.6.26, created on 2012-08-21 22:20:04
         compiled from home_page_manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'home_page_manage.tpl', 33, false),)), $this); ?>
<table border="0" cellpadding="0" cellspacing="1" width="95%" height="97%" class="stdTableBorder">
	<form name="frmPage" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="<?php echo $this->_tpl_vars['Templates_Image']; ?>
title_bg.gif" height="25">Home Page Manager </td>
					<td class="pagetitle" width="50%" background="<?php echo $this->_tpl_vars['Templates_Image']; ?>
title_bg.gif">&nbsp;</td>
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
						Manage your website static contents of Home Page.
					</td>
				</tr>
				<tr><td class="successMsg" align="center">&nbsp;<?php echo $this->_tpl_vars['succMessage']; ?>
</td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<!--tr>
					<td colspan="4" align="right"><a href="<?php echo $_SERVER['PHP_SELF']; ?>
?Action=Add"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
add.gif" class="imgAction" title="Add" border="0"></a>&nbsp;</td>
				</tr-->
				<tr>
					<td class="headTitle" width="20%">Page Title</td>
					<td class="headTitle" width="15%">Action</td>
				</tr>
				<?php $_from = $this->_tpl_vars['Options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pageInfo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pageInfo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Page']):
        $this->_foreach['pageInfo']['iteration']++;
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td class="varnormal">&nbsp;<?php echo $this->_tpl_vars['Page']->home_title; ?>
</td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['Page']->home_id; ?>
');">&nbsp;
					</td>
				</tr>
				<?php endforeach; else: ?>
				<tr>
					<td colspan="4" class="varnormal" align="center">No static page available.</td>
				</tr>
				<?php endif; unset($_from); ?>
			</table>
			<br><br>
			<input type="hidden" name="Action">
			<input type="hidden" name="home_id">
			<input type="hidden" name="status">
		</td>
	</tr>
	</form>
</table>