<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Protfolio Search Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSearchPortfolio" action="portfolio_search_result.php" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Protfolio Search Management </td>
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
					<td class="fieldlabelRight2" width="30%">User Id : </td>
					<td width="70%" class="fieldlabelRight2">
						<input type="text" name="user_name" class="textbox" >	
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">Portfolio Title : </td>
					<td width="70%" class="fieldlabelRight2">
					<input type="text" name="portfolio_title" class="textbox" size="100" maxLength="50">					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%" valign="top">Portfolio Description : </td>
					<td width="70%" class="fieldlabelRight2">
					<textarea name="portfolio_description" class="textbox" cols="120" rows="10"></textarea>					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight2" width="30%">
						Any where in Portfolio
					</td>
					<td width="70%" class="fieldlabelRight2">
						<input type="text" name="any_where" class="textbox" >
					</td>
				</tr>
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