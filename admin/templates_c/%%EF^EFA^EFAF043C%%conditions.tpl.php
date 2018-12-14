<?php /* Smarty version 2.6.26, created on 2012-08-23 10:27:04
         compiled from conditions.tpl */ ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Condition Manager						
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmPage" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="<?php echo $this->_tpl_vars['Templates_Image']; ?>
title_bg.gif" height="25">Condition Manager</td>
					<td class="pagetitle" width="51%" height="25" align="right"><a href="JavaScript: HELP('condition');" class="graylink"><strong>Help</strong></a>&nbsp;&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
			    <tr>
					<td class="fieldLabelRight2" valign="top" colspan="2">Condition Content:</td>
				</tr>
				<tr>
					<td align="center" colspan="2" class="fieldLabelRight2"><textarea name="en_content" cols="100" rows="15"><?php echo $this->_tpl_vars['en_content']; ?>
</textarea></td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="Action" value="Update">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>