<?php /* Smarty version 2.6.26, created on 2013-06-05 14:42:43
         compiled from paypal.tpl */ ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		PayPal Managment
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSiteConfig" action="<?php echo $_SERVER['PHP_SLEF']; ?>
" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">PayPal Managment</td>
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
				    <td class="fieldlabelRight1" align="center" colspan="2">Manage Gateway</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Active </td>
					<td class="fieldlabelLeft">
					<input type="checkbox" name="paypal_active" value="1" tabindex="1" class="shorter" <?php echo $this->_tpl_vars['paypal_active']; ?>
 />
					</td>
				</tr>				
				<tr>
					<td class="fieldlabelRight" valign="top">SendBox or Live </td>
					<td class="fieldlabelLeft">
					<?php if ($_SESSION['Admin_Perm'] == 'Subadmin'): ?>
						<?php echo $this->_tpl_vars['paypal_sendbox']; ?>

					<?php else: ?>  	
						<input type="text" name="paypal_sendbox" class="textbox" value="<?php echo $this->_tpl_vars['paypal_sendbox']; ?>
" />&nbsp;(set 1 for Sendbox and 0 for live)
					<?php endif; ?>	
					</td>
				</tr>
				<tr>
				    <td>&nbsp;</td>
				</tr>
				<tr>
				    <td class="fieldlabelRight1" align="center" colspan="2">Details for Deposit Money On Paypal</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">PayPal Email ID </td>
					
					<td class="fieldlabelLeft">
					<?php if ($_SESSION['Admin_Perm'] == 'Subadmin'): ?>
						<?php echo $this->_tpl_vars['paypal_mail']; ?>

					<?php else: ?>
						<input type="text" name="paypal_mail" class="textbox" value="<?php echo $this->_tpl_vars['paypal_mail']; ?>
" />&nbsp;
					<?php endif; ?>	
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Paypal Fix Amount Charge</td>
				  <td class="fieldlabelLeft">
						<input type="text" name="paypal_fix_amount" class="textbox" value="<?php echo $this->_tpl_vars['paypal_fix_amount']; ?>
" />
					  &nbsp;$					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Paypal Percentage </td>
					<td class="fieldlabelLeft">
						<input type="text" name="paypal_percentage" class="textbox" value="<?php echo $this->_tpl_vars['paypal_percentage']; ?>
" />&nbsp;(in %)
					</td>
				</tr>
	            <tr>
				    <td>&nbsp;</td>
				</tr>
				<tr>
				    <td class="fieldlabelRight1" align="center" colspan="2">Details for Withdraw Money On Paypal</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">PayPal Email ID </td>
					<td class="fieldlabelLeft">
					<?php if ($_SESSION['Admin_Perm'] == 'Subadmin'): ?>
						<?php echo $this->_tpl_vars['paypal_mail']; ?>

					<?php else: ?>
						<?php echo $this->_tpl_vars['paypal_mail']; ?>
&nbsp;
					 <?php endif; ?>	
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Paypal Fix Amount Charge</td>
				  <td class="fieldlabelLeft">
						<input type="text" name="paypal_fix_amount_deposit" class="textbox" value="<?php echo $this->_tpl_vars['paypal_fix_amount_deposit']; ?>
" />&nbsp;$					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Paypal Percentage </td>
					<td class="fieldlabelLeft">
						<input type="text" name="paypal_percentage_deposit" class="textbox" value="<?php echo $this->_tpl_vars['paypal_percentage_deposit']; ?>
" />&nbsp;(in %)
					</td>
				</tr>
				<!--<tr>
					<td class="fieldlabelRight" valign="top">Paypal Deposit</td>
					<td class="fieldlabelLeft">
						<input type="text" name="paypal_deposit" class="textbox" value="<?php echo $this->_tpl_vars['paypal_deposit']; ?>
" />&nbsp;(in %)
					</td>
				</tr>-->
				<tr><td class="divider" colspan="2"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Update" class="button">
						<input type="submit" name="Submit" value="Cancel" class="button">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>