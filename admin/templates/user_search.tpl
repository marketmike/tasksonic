<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		User Search Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSearchUser" action="user_search_result.php" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">User Search Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>   
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight2" width="30%">User Name: </td>
					<td width="70%" class="fieldlabelRight2"><input type="text" name="user_login_id" class="textbox" size="40" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">First Name: </td>
					<td width="70%" class="fieldlabelRight2"><input type="text" name="mem_fname" class="textbox" size="40" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">Last Name  : </td>
					<td width="70%" class="fieldlabelRight2">
					<input type="text" name="mem_lname" class="textbox" size="40">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">Country : </td>
					<td width="70%" class="fieldlabelRight2"><select name="country_name" class="textbox">
							<option value="0">- Select Country Name-</option>
							{$Country_List}
						</select></td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">State : </td>
					<td width="70%" class="fieldlabelRight2"><input type="text" name="mem_state" class="textbox" size="40" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">City : </td>
					<td width="70%" class="fieldlabelRight2"><input type="text" name="mem_city" class="textbox" size="40" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">Zipcode : </td>
					<td width="70%" class="fieldlabelRight2"><input type="text" name="mem_zip_code" class="textbox" size="40" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">Normal User</td>
					<td width="70%" class="fieldlabelRight2">
					<input type="checkbox" name="normal_user">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">VIP User</td>
					<td width="70%" class="fieldlabelRight2">
					<input type="checkbox" name="vip_user">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">Special User</td>
					<td width="70%" class="fieldlabelRight2">
					<input type="checkbox" name="special_user">
					</td>
				</tr>
				<!--<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">Feedback : </td>
					<td width="70%" class="fieldlabelRight2">
						<select name="feedback" class="textbox">
							<option value="11">- Select Feedback Rating-</option>
							{*$Feedback_List*}
						</select> 	
					</td>
				</tr>-->
				
				<tr>
				    <td colspan="2">&nbsp;</td>
				</tr>
				<tr>
				    <td colspan="2" align="right"><input type="submit" name="Submit" value="Submit" class="stdButton"></td>
				</tr>
			</table>
			<br>
		</td>
	</tr>
	</form>
</table>