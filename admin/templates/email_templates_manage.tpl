<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Email Template Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmEmailTemplate" action="{$A_Action}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Email Template Management </td>
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
						Manage Email Template.
					</td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="headTitle">Name </td>
					<td class="headTitle" width="15%">Action</td>
				</tr>
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack">&nbsp;&nbsp;Template of Header  </td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('header');">&nbsp;&nbsp;
					</td>
				</tr>
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack">&nbsp;&nbsp;Template of Footer</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('footer');">&nbsp;&nbsp;
					</td>
				</tr>
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack">&nbsp;&nbsp;Template of Forgotpassword</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('forgotpasswd');">&nbsp;&nbsp;
					</td>
				</tr>
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack">&nbsp;&nbsp;Template of Invitation</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('invitation');">&nbsp;&nbsp;
					</td>
				</tr>
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack">&nbsp;&nbsp;Template of Sendmail</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('sendmail');">&nbsp;&nbsp;
					</td>
				</tr>
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack">&nbsp;&nbsp;Template of Signup</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('signup');">&nbsp;&nbsp;
					</td>
				</tr>
			</table>
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="template_name" />
	</form>
</table>