<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Change Password					
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="{$Templates_Image}title_bg.gif" height="25">Change Password </td>
					<!--<td class="pagetitle" width="50%" background="{$Templates_Image}title_bg.gif" align="right"><a href="JavaScript: popupWindowURL('help.php?type=change_pwd&pop_up=true','','500','500','','true','true');" class="graylink"><strong>Help</strong></a>&nbsp;&nbsp;</td>-->
					<td class="pagetitle" width="50%" background="{$Templates_Image}title_bg.gif" align="right"><a href="JavaScript: HELP('change_pwd');" class="graylink"><strong>Help</strong></a>&nbsp;&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td class="successMsg" align="center">{$succMsg}</td></tr>
	<tr><td class="successMsg" align="center">{$Error_Message}</td></tr>
	<tr>
		<td valign="top" align="center">
			<form name="frmChangePass" action="{$A_Action}" method="post">
			<table border="0" cellpadding="0" cellspacing="1" width="60%" align="center" >
				<tr>
				  <td colspan="2" align="center" class="stdSectionHeader"><strong>Manage Password</strong></td>	
				</tr>
				<tr>
				  <td class="fieldlabelRight">Old Password</td>	
				  <td class="fieldlabelLeft"><input type="password" name="old_password">
				  <input type="hidden" name="old_pass_value" value="{$old_pass}">
				  </td>
				</tr>
				<tr>
				  <td class="fieldlabelRight">New Password</td>	
				  <td class="fieldlabelLeft"><input type="password" name="new_password1"></td>
				</tr>
				<tr>
				  <td class="fieldlabelRight">Retype Password</td>	
				  <td class="fieldlabelLeft"><input type="password" name="new_password2"></td>
				</tr>
				<tr>
				  <td colspan="2" align="center"><input type="submit" name="Sumbit" value="Change" class="stdButton" onClick="javascript: return Form_Submit(frmChangePass);">&nbsp;&nbsp;
				  </td>	
				</tr>
			  </table>
			  <input type="hidden" name="Action" value="{$Action}"> 
			  <input type="hidden" name="admin_id" value="{$Admin_Id}">
			  </form>
		</td>
	</tr>
</table>