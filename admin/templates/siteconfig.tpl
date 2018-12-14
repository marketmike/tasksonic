<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" height="97%" align="center">
<tr><td>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td class="pagetitle" width="49%" height="25">Website Settings</td>
	</tr>
</table>
</td></tr>
<tr><td>			
	<table border="0" cellpadding="1" cellspacing="2" width="95%">
		<tr>
			<td class="varnormal">
				Change your company title, browser title, meta title, keywords & description, copyright text and click <b>Update</b> to save the changes.
				Click <b>Cancel</b> to discard the changes.
			</td>
		</tr>
		<tr><td height="5"></td></tr>
		<tr><td class="successMsg" align="center">{$succMessage}</td></tr>
		<tr><td height="5"></td></tr>
	</table>	
	<form name="frmSiteConfig" action="{$A_Action}" method="post">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">			
				<tr>				
					<td class="fieldlabelRight" width="230" valign="top">Site Title</td>
					<td class="fieldlabelLeft">
						<textarea name="site_title" rows="2" cols="80" class="textbox">{$site_title}</textarea>
						<br>
						<font class="validationText">Maximum 100 characters </font><br>
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Site URL</td>
					<td class="fieldlabelLeft">
						<input type="text" name="site_url" class="textbox" style="width:200px;" value="{$site_url}" />
						<br>
						<font class="validationText">Example: http://www.yourdomain.com </font><br>						
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Site Email Address</td>
					<td class="fieldlabelLeft">
						<input type="text" name="site_email" class="textbox" style="width:200px;" value="{$site_email}" />
						<br>
						<font class="validationText">Used various places, e.g. send to for contact us</font><br>						
					</td>
				</tr>					
				<tr>
					<td class="fieldlabelRight" valign="top">Google Map API Key</td>
					<td class="fieldlabelLeft">
						<input type="text" name="map_key" class="textbox" style="width:500px;"  value="{$map_key}" />
						<br />
						<font class="validationText">http://code.google.com/apis/maps/signup.html</font><br>	
						
					</td>
				</tr>				
				<tr>
					<td class="fieldlabelRight" valign="top">Site Keyword</td>
					<td class="fieldlabelLeft">
						<textarea name="site_keyword" rows="3" cols="80" class="textbox">{$site_keyword}</textarea>
						<br>
						<font class="validationText">Maximum 1000 characters </font><br>
						<b>Site Keywords</b> - A list of terms and phrases search engines use to find and rank your site. 
						Your keywords should accurately describe your services, features, products, and location. 						
					</td>
				</tr>
			
				<tr>
					<td class="fieldlabelRight" valign="top">Site Description</td>
					<td class="fieldlabelLeft">
						<textarea name="site_description" rows="3" cols="80" class="textbox">{$site_description}</textarea>
						<br>
						<font class="validationText">Maximum 400 characters </font><br>
						<b>Site Description</b> - This text appears in the listing for your site in search engine results 
						(e.g., a brief description of the services and products you offer, as well as your location). 
						Begin this description with your service title, and then include other keywords and/or phrases 
						describing your services. 						
					</td>
				</tr>
				<tr><td class="divider" colspan="2"></td></tr>
			</table>	
	</td></tr>
	<tr><td>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td class="pagetitle" width="49%" height="25"><strong>Social Media Settings</strong></td>
			</tr>
		</table>
	</td></tr>
	<tr><td>

			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelRight" width="230" valign="top">Facebook Fan Page</td>
					<td class="fieldlabelLeft">
						<input type="text" name="fb_fan" class="textbox" style="width:500px;"  value="{$fb_fan}" />
						<br />
						<font class="validationText">Please use ID</font><br>	
						
					</td>
				</tr>
				{if $fb_fan && $fb_api_key}
				<tr>
					<td class="fieldlabelRight" valign="top">Authorize Publish To Page As Page</td>
					<td class="fieldlabelLeft">
						<a href="http://www.facebook.com/connect/prompt_permissions.php?api_key={$fb_api_key}v=1.0&next=http://www.facebook.com/connect/login_success.html?xxRESULTTOKENxx&display=popup&ext_perm=publish_stream&enable_profile_selector=1&profile_selector_ids={$fb_fan}" target="blank">Authorize</a>
						<br />
						<font class="validationText">Used to auto publish site activity to fan page when the user does not have associated facebook account or publish to wall.</font><br>	
						
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Get Page Token - Enter Below</td>
					<td class="fieldlabelLeft">
						<a href="https://graph.facebook.com/oauth/access_token?type=client_cred&client_id={$fb_app_id}&client_secret={$fb_app_secret}" target="blank">Get Token</a>
						<br />
						<font class="validationText">Used to auto publish site activity to fan page when the user does not have associated facebook account or publish to wall.</font><br>	
						
					</td>
				</tr>				
				{/if}
				<tr>
					<td class="fieldlabelRight" valign="top">Facebook Page Token</td>
					<td class="fieldlabelLeft">
						<input type="text" name="fb_page_token" class="textbox" style="width:500px;"  value="{$fb_page_token}" />
						<br />
						<font class="validationText">Used for auto publish</font><br>	
						
					</td>
				</tr>				
				<tr>
					<td class="fieldlabelRight" valign="top">Twitter Page</td>
					<td class="fieldlabelLeft">
						<input type="text" name="twitter_page" class="textbox" style="width:500px;"  value="{$twitter_page}" />
						<br />
						<font class="validationText">Twitter Page Name</font><br>	
						
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Facebook App ID</td>
					<td class="fieldlabelLeft">
						<input type="text" name="fb_app_id" class="textbox" style="width:500px;"  value="{$fb_app_id}" />
						<br />
						<font class="validationText">Facebook App ID</font><br>	
						
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Facebook API Key</td>
					<td class="fieldlabelLeft">
						<input type="text" name="fb_api_key" class="textbox" style="width:500px;"  value="{$fb_api_key}" />
						<br />
						<font class="validationText">Facebook API Key</font><br>	
						
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Facebook App Secret</td>
					<td class="fieldlabelLeft">
						<input type="text" name="fb_app_secret" class="textbox" style="width:500px;"  value="{$fb_app_secret}" />
						<br />
						<font class="validationText">Facebook App Secret</font><br>	
						
					</td>
				</tr>
				</table>
	</td></tr>
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Task Settings </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelLeft" colspan="4"><h2>Currency Related</h2></td>
				</tr>
				<tr>
					<td width="26%" valign="top" class="fieldlabelRight">1 Euro </td>
					<td width="24%" class="fieldlabelLeft"><input type="text" name="euro_dollar" class="textbox" value="{$euro_dollar}" />
					&nbsp;USD</td>
					<td width="23%" valign="top" class="fieldlabelRight">1 USD </td>
					<td width="27%" class="fieldlabelLeft"><input type="text" name="dollar_euro" class="textbox" value="{$dollar_euro}" />&nbsp;Euro</td>
				</tr>
			</table>
			<BR />
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelLeft" colspan="4"><h2>Task Related</h2></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Task Post Deposit (Refundable)</td>
				  <td class="fieldlabelLeft"><input type="text" name="fees_Taken_for_post_project" class="textbox" value="{$fees_Taken_for_post_project}" />&nbsp;$</td>
					<td class="fieldlabelRight" valign="top">Minimum amount required<br />in wallet to Post Task</td>
				  <td class="fieldlabelLeft"><input type="text" name="project_post_deposite" class="textbox" value="{$project_post_deposite}" />&nbsp;$</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Edit Task</td>
					<td class="fieldlabelLeft"><input type="text" name="edit_bid" class="textbox" value="{$edit_bid}" />&nbsp;(times)</td>
					<td class="fieldlabelRight" valign="top">Minimum Amount needed<br />to place Bid </td>
				  <td class="fieldlabelLeft"><input type="text" name="minimum_bid_place" class="textbox" value="{$minimum_bid_place}" />&nbsp;$</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Urgent Task Fees</td>
				  <td class="fieldlabelLeft"><input type="text" name="urgent_project_fee" class="textbox" value="{$urgent_project_fee}" />&nbsp;$</td>
					<td class="fieldlabelRight" valign="top">&nbsp; </td>
					<td class="fieldlabelLeft">&nbsp;</td>
				</tr>
			</table>
			<BR />
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelLeft" colspan="4"><h2>Payment and Withdraw Related</h2></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Minimum Deposit Amount </td>
				  <td class="fieldlabelLeft"><input type="text" name="minimum_deposite_amount" class="textbox" value="{$minimum_deposite_amount}" />&nbsp;$</td>
					<td class="fieldlabelRight" valign="top">Minimum Withdaw Amount </td>
				  <td class="fieldlabelLeft"><input type="text" name="minimum_withdaw_amount" class="textbox" value="{$minimum_withdaw_amount}" />&nbsp;$</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Escrow Payment</td>
				  <td class="fieldlabelLeft"><input type="text" name="escrow_payment" class="textbox" value="{$escrow_payment}" />&nbsp;$</td>
					<td class="fieldlabelRight" valign="top">&nbsp;</td>
					<td class="fieldlabelLeft">&nbsp;</td>
				</tr>
			</table>
			<BR />
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelLeft" colspan="4"><h2>Commision Related</h2></td>
				</tr>
				<tr>
					<td class="fieldlabelLeft" colspan="4"><strong>Task Owner</strong></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Task Owner Commission</td>
					<td class="fieldlabelLeft"><input type="text" name="comm_from_buyer" class="textbox" value="{$comm_from_buyer}" />&nbsp;(in %)</td>
					<td class="fieldlabelRight" valign="top"> Task Owner Minimun Commission</td>
				  <td class="fieldlabelLeft"><input type="text" name="minimum_comm_buyer" class="textbox" value="{$minimum_comm_buyer}" />&nbsp;$</td>
				</tr>
				<tr>
					<td class="fieldlabelLeft" colspan="4"><strong>Taskers</strong></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Tasker Commission</td>
					<td class="fieldlabelLeft"><input type="text" name="comm_from_seller" class="textbox" value="{$comm_from_seller}" />&nbsp;(in %)</td>
					<td class="fieldlabelRight" valign="top">Tasker Minimun Commission</td>
				  <td class="fieldlabelLeft"><input type="text" name="minimum_comm_seller" class="textbox" value="{$minimum_comm_seller}" />&nbsp;$</td>
				</tr>
			</table>
			<BR />
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelLeft" colspan="4"><h2>Referral Bonus</h2></td>
				</tr>
				<tr>
					<td width="26%" valign="top" class="fieldlabelRight">Bonus Amount</td>
					<td width="24%" class="fieldlabelLeft"><input type="text" name="comm_for_referral" class="textbox" value="{$comm_for_referral}" />&nbsp;$</td>
					<td width="46%" colspan="2" valign="top" class="fieldlabelleft"><strong>Paid after referred user is out of special user role and when their first paid task is awarded/accepted.</strong></td>
				</tr>
			</table>
			<br />
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelLeft" colspan="4"><h2>Misc. Settings</h2></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Records Displayed per page at user side</td>
					<td class="fieldlabelLeft"><input type="text" name="user_page_size" class="textbox" value="{$user_page_size}" />&nbsp;</td>
					<td class="fieldlabelRight" valign="top">Premium Task Fees</td>
				  <td class="fieldlabelLeft"><input type="text" name="premium_project_fees" class="textbox" value="{$premium_project_fees}" />&nbsp;$</td>
				</tr>				
			</table>			
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td class="fieldlabelLeft" colspan="4"><h2>Verification Settings</h2></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Phone Verification Fee</td>
					<td class="fieldlabelLeft"><input type="text" name="phone_verified_fee" class="textbox" value="{$phone_verified_fee}" />&nbsp;</td>
					<td class="fieldlabelRight" valign="top">Phone Verify API Key (<a href="http://www.webphonecheck.com" target="blank">webphonecheck.com</a>)</td>
				  <td class="fieldlabelLeft"><input type="text" name="phone_verify_api" class="textbox" value="{$phone_verify_api}" />&nbsp;$</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Background Check Fee</td>
					<td class="fieldlabelLeft"><input type="text" name="background_check_fee" class="textbox" value="{$background_check_fee}" />&nbsp;</td>
					<td class="fieldlabelRight" valign="top">Background Check API Key</td>
				  <td class="fieldlabelLeft"><input type="text" name="background_check_api" class="textbox" value="{$background_check_api}" />&nbsp;$</td>
				</tr>				
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Update" class="button" onclick="javascript: return Form_Submit(document.frmSiteConfig);">
						<input type="submit" name="Submit" value="Cancel" class="button">
					</td>
				</tr>
			</table>			
			<br>
		</td>
	</tr>
	</form>
</table>