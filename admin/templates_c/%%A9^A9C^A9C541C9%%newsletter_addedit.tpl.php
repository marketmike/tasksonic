<?php /* Smarty version 2.6.26, created on 2012-08-23 10:30:34
         compiled from newsletter_addedit.tpl */ ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Newletter Management [ <?php echo $this->_tpl_vars['Action']; ?>
 ]
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
					<td class="pagetitle" width="49%" height="25">Newletter Management [ <?php echo $this->_tpl_vars['Action']; ?>
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
					<td align="center"><strong><?php echo $this->_tpl_vars['Action']; ?>
 News.</strong></td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
			<?php if ($this->_tpl_vars['Action'] == 'Edit'): ?>
				<tr>
					<td class="fieldlabelRight" valign="top" width="25%">Status:</td>
					<td class="fieldLabelLeft">
						<input class="textbox" type="checkbox" name="status" value="1" <?php if ($this->_tpl_vars['status'] == 1): ?>checked<?php endif; ?>/>&nbsp;Check to mark as active
					</td>
				</tr>
			    <tr>
					<td class="fieldlabelRight" valign="top" width="30%">News Title :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="news_title" value="<?php echo $this->_tpl_vars['title']; ?>
"size="40" maxlength="50" class="textbox"></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">News Description :</td>
					<td class="fieldLabelLeft"><?php echo $this->_tpl_vars['EN_NL_Editor']; ?>
</td>
				</tr>
			<?php else: ?>
				<tr>
					<td class="fieldlabelRight" valign="top" width="25%">Status:</td>
					<td class="fieldLabelLeft">
						<input class="textbox" type="checkbox" name="status" value="1" />&nbsp;Check to mark as active
					</td>
				</tr>			
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">News Title :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="en_news_title" size="40" maxlength="50" class="textbox"></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">News Description :</td>
					<td class="fieldLabelLeft"><?php echo $this->_tpl_vars['EN_NL_Editor']; ?>
</td>
				</tr>
			<?php endif; ?>
			   	<tr>
				  <td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form(document.frmNewsletter);" tabindex="4">
				    &nbsp;&nbsp;&nbsp;
				    <input type="submit" name="Submit2" value="Cancel" class="stdButton" /></td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="<?php echo $this->_tpl_vars['Action']; ?>
"/>
			<input type="hidden" name="news_id" value="<?php echo $this->_tpl_vars['news_id']; ?>
" />
			<br>
		</td>
	</tr>
	</form>
</table>