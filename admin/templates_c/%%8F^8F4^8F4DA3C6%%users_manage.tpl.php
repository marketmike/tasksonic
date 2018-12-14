<?php /* Smarty version 2.6.26, created on 2012-08-14 21:18:29
         compiled from users_manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'users_manage.tpl', 74, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		<?php echo $this->_tpl_vars['Type']; ?>
 User Manager
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmUsers" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="<?php echo $this->_tpl_vars['Templates_Image']; ?>
title_bg.gif" height="25">User Manager </td>
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
						Manage Task Sonic Site Users.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmUsers.submit();">
							<?php echo $this->_tpl_vars['PageSize_List']; ?>

					  </select></div>
					</td>
				</tr>
				<tr>
					<td class="successMsg" align="center">&nbsp;<?php echo $this->_tpl_vars['succMessage']; ?>
</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="right" class="varnormal"> Search By User ID : &nbsp;</td>
					  <td align="left" class="varnormal"><input type="text" name="search_user"  size="40" maxlength="50" class="textbox" /></td>
				</tr>
				<tr>
					<td align="right" class="varnormal">Search By User Email-ID : &nbsp;</td>
					 <td align="left" class="varnormal"><input type="text" name="search_email"  size="40" maxlength="50" class="textbox" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="submit" name="Submit" value="Search" class="stdButton" onclick="JavaScript: return Search(search_user.value);" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
				    <td width="3%" class="headTitle"></td>
					<td class="headTitle" width="10%">User ID</td>
					<td class="headTitle" width="18%">Name</td>
					<td class="headTitle" width="12%">Country</td>
					<td class="headTitle" width="5%">Notify</td>
					<td class="headTitle" width="5%">VIP</td>
					<td class="headTitle" width="10%">Special User(?)</td>
					<td class="headTitle" width="10%">Status</td>
					<td class="headTitle" width="25%">Action</td>
				</tr>
				<?php unset($this->_sections['userinfo']);
$this->_sections['userinfo']['name'] = 'userinfo';
$this->_sections['userinfo']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['userinfo']['show'] = true;
$this->_sections['userinfo']['max'] = $this->_sections['userinfo']['loop'];
$this->_sections['userinfo']['step'] = 1;
$this->_sections['userinfo']['start'] = $this->_sections['userinfo']['step'] > 0 ? 0 : $this->_sections['userinfo']['loop']-1;
if ($this->_sections['userinfo']['show']) {
    $this->_sections['userinfo']['total'] = $this->_sections['userinfo']['loop'];
    if ($this->_sections['userinfo']['total'] == 0)
        $this->_sections['userinfo']['show'] = false;
} else
    $this->_sections['userinfo']['total'] = 0;
if ($this->_sections['userinfo']['show']):

            for ($this->_sections['userinfo']['index'] = $this->_sections['userinfo']['start'], $this->_sections['userinfo']['iteration'] = 1;
                 $this->_sections['userinfo']['iteration'] <= $this->_sections['userinfo']['total'];
                 $this->_sections['userinfo']['index'] += $this->_sections['userinfo']['step'], $this->_sections['userinfo']['iteration']++):
$this->_sections['userinfo']['rownum'] = $this->_sections['userinfo']['iteration'];
$this->_sections['userinfo']['index_prev'] = $this->_sections['userinfo']['index'] - $this->_sections['userinfo']['step'];
$this->_sections['userinfo']['index_next'] = $this->_sections['userinfo']['index'] + $this->_sections['userinfo']['step'];
$this->_sections['userinfo']['first']      = ($this->_sections['userinfo']['iteration'] == 1);
$this->_sections['userinfo']['last']       = ($this->_sections['userinfo']['iteration'] == $this->_sections['userinfo']['total']);
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
					<td><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['mem_email']; ?>
"></td>
					<td class="varnormal">&nbsp;<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_login_id']; ?>
</td>
					<td class="varnormal">&nbsp;<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['mem_fname']; ?>
&nbsp;<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['mem_lname']; ?>
</td>
					<td class="varnormal" align="center">&nbsp;<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['country_name']; ?>
&nbsp;</td>
					<td class="varnormal" align="center">
					<?php if ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['mem_pro_notice'] == 1): ?>
						All
					<?php elseif ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['mem_pro_notice'] == 2): ?>
						Area
					<?php elseif ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['mem_pro_notice'] == 3): ?>	
					 None
					<?php endif; ?>
					</td>
					<td class="varnormal" align="center">
					   <?php if ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['membership_id'] != 0): ?> 
					        YES
					   <?php else: ?>
					        X  
					    <?php endif; ?> 	 	
					</td>
					<td align="center" class="varnormal">
						<table border="0" cellpadding="1" cellspacing="1" width="95%">
							<tr>
								<td align="center" class="varnormal">
								<?php if ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['special_user'] == 1): ?>
									<strong>Yes</strong>
								<?php else: ?>
									No
								<?php endif; ?>
								<?php if ($_SESSION['Admin_Perm'] == 'Admin'): ?>
									<?php if ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['special_user'] == 1): ?>
										(<a href="JavaScript: ToggleStatus_Click_Special('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
', '0');" class="actionLink">No</a>)
									<?php else: ?>
										(<a href="JavaScript: ToggleStatus_Click_Special('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
', '1');" class="actionLink">Yes</a>)
									<?php endif; ?>
								<?php endif; ?>
								</td>
							</tr>
							<?php if ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['special_user'] == 1): ?>
							<tr align="left">
								<td align="left" class="varnormal">S.D :<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['special_start_date']; ?>
</td>
							</tr>
							<tr align="left">
								<td align="left" class="varnormal">E.D :<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['special_end_date']; ?>
</td>
							</tr>	
							<?php endif; ?>
						</table>
					</td>
					<td align="center" class="varnormal">
						<?php if ($this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_status'] == 1): ?>
							<strong>Visible</strong>&nbsp;(<a href="JavaScript: ToggleStatus_Click('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
', '0');" class="actionLink">Block</a>)
						<?php else: ?>
							<strong>Block</strong>&nbsp;(<a href="JavaScript: ToggleStatus_Click('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
', '1');" class="actionLink">Visible</a>)
						<?php endif; ?>
					</td>
					<td align="center">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
view.gif" class="imgAction" title="View" onClick="JavaScript: View_Click('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
');">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
');">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
');">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
sendmail.gif" class="imgAction" title="Send Mail" onClick="JavaScript: Mail_Click('<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
');">
						<a href="view_messages.php?user_id=<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_login_id']; ?>
"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
view.gif" class="imgAction" title="View Message Posted By User" border="0"></a>
						<a href="edit_seller_buyer.php?user_id=<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_auth_id']; ?>
"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
view.gif" class="imgAction" title="Edit Buyer/Seller Profile Posted By User" border="0"></a>
<!--						<a class="actionLink" href="change_username.php?user_login_id=<?php echo $this->_tpl_vars['user_details'][$this->_sections['userinfo']['index']]['user_login_id']; ?>
"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
add.gif" class="imgAction" title="Add" border="0" /></a>				
-->					</td>
				</tr>
				<?php endfor; else: ?>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="9" class="varnormal" align="center">There are no records found.</td>
				</tr>
				<?php endif; ?>
			</table>	
			<?php if ($this->_sections['userinfo']['total'] > 1): ?>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
sendmail.gif" class="imgAction" title="Send Mail" onClick="JavaScript: Mail_To_ALL();">
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
			<input type="hidden" name="Action">
			<input type="hidden" name="user_auth_id">
			<input type="hidden" name="status">
			<input type="hidden" name="yes_no">
		</td>
	</tr>			

	</form>
</table>