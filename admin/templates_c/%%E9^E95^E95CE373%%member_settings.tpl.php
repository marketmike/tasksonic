<?php /* Smarty version 2.6.26, created on 2012-08-23 10:27:17
         compiled from member_settings.tpl */ ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Portfolio Settings
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSiteConfig" action="<?php echo $this->_tpl_vars['A_Action']; ?>
" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Portfolio Settings</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr><td height="5"></td></tr>
				<tr><td class="successMsg" align="center"><?php echo $this->_tpl_vars['succMessage']; ?>
</td></tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
		
				<tr>
					<td class="fieldlabelRight" valign="top" width="35%">Portfolio Count (Standard User) </td>
					<td class="fieldlabelLeft">
						<input type="text" name="free_portfolio" class="textbox" value="<?php echo $this->_tpl_vars['free_portfolio']; ?>
" />
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Portfolio Count (VIP User) </td>
					<td class="fieldlabelLeft">
						<input type="text" name="premium_portfolio" class="textbox" value="<?php echo $this->_tpl_vars['premium_portfolio']; ?>
" />
					</td>
				</tr>
			
				<tr><td class="divider" colspan="2"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Update" class="button" onclick="javascript: return Form_Submit(document.frmSiteConfig);">
						<input type="submit" name="Submit" value="Cancel" class="button">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>