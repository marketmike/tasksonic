<?php /* Smarty version 2.6.26, created on 2012-08-23 10:32:55
         compiled from contact_addedit.tpl */ ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Contact Us Management [ <?php echo $this->_tpl_vars['Action']; ?>
 ]					
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmContactUs" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Contact Us Management [ <?php echo $this->_tpl_vars['Action']; ?>
 ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center"><strong>Specify Action Taken</strong></td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Message From:</td>
					<td class="fieldLabelLeft">
					<?php echo $this->_tpl_vars['user_name']; ?>

					</td>
				</tr>			
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Contact Subject:</td>
					<td class="fieldLabelLeft">
					<?php echo $this->_tpl_vars['contact_subject']; ?>

					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Contact Reason:</td>
					<td class="fieldLabelLeft">
					<?php echo $this->_tpl_vars['contact_reason']; ?>

					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Contact Message:</td>
					<td class="fieldLabelLeft">
					<?php echo $this->_tpl_vars['contact_message']; ?>

					</td>
				</tr>				
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Status:</td>
					<td class="fieldLabelLeft">
					<span style="line-height:35px"><input class="textbox" type="checkbox" name="status" value="1" <?php if ($this->_tpl_vars['status'] == 1): ?>checked<?php endif; ?>/>&nbsp;This email has been addressed</span>
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Action Taken:</td>
					<td class="fieldLabelLeft">
					<textarea name="action_taken" rows="3" cols="80" class="textbox"><?php echo $this->_tpl_vars['action_taken']; ?>
</textarea>
					</td>
				</tr>

				<tr>
					<td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form(document.frmContactUs);">
							&nbsp;&nbsp;&nbsp;
							<input type="submit" name="Submit" value="Cancel" class="stdButton">
					</td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="<?php echo $this->_tpl_vars['Action']; ?>
"/>
			<input type="hidden" name="contact_id" value="<?php echo $this->_tpl_vars['contact_id']; ?>
" />
			<br>
		</td>
	</tr>
	</form>
</table>