<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Newsletter - Preview & Send
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmUsers" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">

			{if $newsletter_sent}
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="successMsg" align="center">&nbsp;{$newsletter_sent}</td>
				</tr>
			</table>
			{/if}
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" height="25">Newsletter - Preview & Send</td>
					<td class="pagetitle" style="width:80px;color:#fff;" align="right"><a href="newsletter_send.php?fetch=true" target="blank" style="color:#fff;" class="actionLink">Fetch URL</a>&nbsp;&nbsp;&nbsp;</td> 
					<td class="pagetitle" style="width:80px;color:#fff;" align="right"><a href="newsletter_send.php?viewhtml=true" target="blank" style="color:#fff;" class="actionLink">View HTML</a>&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center" style="padding-top:20px">
		<span>Newsletter will be sent to all subscribed members. To send via thrid party vendor, use the fetch URL or view html links above.</span>
		<div class="clearwspace"></div>
			{$preview}
			<br /><br />
			<table border="0" cellpadding="1" cellspacing="2" width="30%" align="right">
				<tr>
					<td colspan="4" align="left"><input type="submit" name="Submit" value="Send" class="stdButton" onClick="Javascript: return Check_Details(this.form);">
                      &nbsp;
					  <input type="submit" name="Submit" value="Back" class="stdButton">
					  </td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<input type="hidden" name="mul_user_mail_id" value="{$mul_user_mail_id}"/>
			<br>
		</td>
	</tr>
	</form>
	</table>