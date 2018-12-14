<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Report Violation [ {$Action} ] 
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmViolation" action="{$A_Action}" method="post">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Report Violation [ {$Action} ] </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	   <td>&nbsp;</td>
	</tr>
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center"><strong>{$Action} Report Violation.</strong></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td height="205" align="center" valign="top">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td height="5"></td></tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight2" valign="top" width="20%" height="20" >Your Name :</td>
					<td width="80%" class="fieldlabelRight2">&nbsp;{$your_name}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" valign="top" width="20%" height="20" >Your E-mail :</td>
					<td width="80%" class="fieldlabelRight2">&nbsp;{$your_email}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" valign="top" width="20%" height="20" >Your Username :</td>
					<td width="80%" class="fieldlabelRight2">&nbsp;{$your_username}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" valign="top" width="20%" height="20" >Violation Reason :</td>
					<td width="80%" class="fieldlabelRight2">&nbsp;{$violation}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" valign="top" width="20%" height="20" >Other person's Username :</td>
					<td width="80%" class="fieldlabelRight2">&nbsp;{$other_person_name}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" valign="top" width="20%" height="20" >URL of violation  :</td>
					<td width="80%" class="fieldlabelRight2">&nbsp;{$url}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" valign="top" width="20%" height="20" >Violation Details  :</td>
					<td width="80%" class="fieldlabelRight2">&nbsp;{$violation_details|wordwrap:100:"\n":true}</td>
				</tr>
			</table>
	  </td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<input type="submit" name="Submit" value="Back" class="button">
		</td>
	</tr>
	<input type="hidden" name="Action" value="{$Action}" />
	</form>
	</table>