<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
Edit Task Owner/Tasker  Manager [ {$Action} ]	
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
<form name="frmSellerBuyer" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Edit Task Owner/Tasker  Manager [ {$Action} ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				
				<tr><td>&nbsp;</td></tr>
				{if $profile_id==''}
				<tr><td class="successMsg" align="center">{$Error_Message}</td></tr>
				{else}
				<tr>
					<td class="fieldLabelLeft1" align="left" colspan="2" ><strong>Buyer Profile</strong> </td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Slogan :</td>
					<td class="fieldlabelLeft" valign="top"> 
						<input type="text" name="buyers_slogan" size="40" maxlength="50" value="{$buyers_slogan}" class="textbox">
					</td>
					
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Description :</td>
				</tr>
				<tr>
					<td class="fieldlabelRight1" valign="top" colspan="2">{$EN_Buyer_Editor}</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td class="fieldLabelLeft1" align="left" colspan="2" ><strong>Seller Profile </strong></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Slogan :</td>
					<td class="fieldlabelLeft" valign="top"> 
						<input type="text" name="seller_slogan" size="40" maxlength="50" value="{$seller_slogan}" class="textbox">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Image :</td>
					<td class="fieldlabelLeft" valign="top">&nbsp;</td>
				</tr>
				{if $seller_logo != ''}
				<tr>
					<td class="fieldLabelLeft1" valign="top" colspan="2" align="center">
					 <img src="{$img_path}thumb_{$seller_logo}" border="0" align="middle"/><br /><br />
					 <a href="#" onclick="JavaScript : return Delete_Image()" class="actionLink" >Remove</a>
					</td>
				</tr>
				{else}
				<tr>
					<td class="fieldLabelLeft1" valign="top" colspan="2" align="center">No Image is Upload
					</td>
				</tr>
				{/if}
				<tr>
					<td class="fieldlabelRight" valign="top">Description :</td>
				</tr>
				<tr>
					<td class="fieldlabelRight1" valign="top" colspan="2">{$EN_Seller_Editor}</td>
				</tr>
				
			</table>	
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
			<tr>
				<td colspan="2" align="center">&nbsp;
					<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form_SellerBuyer(document.frmSellerBuyer);">
					&nbsp;&nbsp;&nbsp;
					<input type="submit" name="Submit" value="Cancel" class="stdButton">
				</td>
			</tr>
			{/if}
			</table>
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<input type="hidden" name="user_auth_id" value="{$user_auth_id}"/>
			<input type="hidden" name="seller_logo" value="{$seller_logo}"/>
			</br>
		</td>
	</tr>
</table>
</form>