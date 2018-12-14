<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Bid Place On {$title} 
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmviewbidproject" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Bid Place On {$title} </td>
				</tr>
				<tr>
				    <td>&nbsp;</td>
				</tr>
				<tr><td class="successMsg" align="center">&nbsp;{$SuccMsg}</td></tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<br>
			{if $Loop >0}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td width="10%" align="center" class="headTitle">User Name</td>
					<td width="10%" align="center" class="headTitle">Amount </td>
					<td width="20%" align="center" class="headTitle">Delivery (in days)</td>
					<td width="25%" class="headTitle" align="center">Description</td>
					<td width="30%" class="headTitle" align="center">Action</td>
				</tr>
				{section name=frmviewbid loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td class="bodytextblack" align="center" valign="top">&nbsp;<a href="users.php?Action=Edit&user_auth_id={$abid[frmviewbid].user_auth_id}"  class="actionLink"  target="_blank">{$abid[frmviewbid].bid_by_user}</a></td>
					<td class="bodytextblack" align="center" valign="top">&nbsp;<span class="fieldlabelLeft">$</span>&nbsp;{$abid[frmviewbid].bid_amount}</td>
					<td class="bodytextblack" align="center" valign="top">&nbsp;{$abid[frmviewbid].delivery_within}</td>
					<td class="bodytextblack" align="justify" valign="top">
						<table border="0" cellpadding="1" cellspacing="1" width="95%" align="center">
							<tr>
								<td class="bodytextblack" align="justify">&nbsp;{$abid[frmviewbid].dec|wordwrap:50:"\n":true}</td>
							</tr>
						</table>
					</td>
					<td class="bodytextblack" align="center" valign="top">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Delete" onClick="JavaScript: Edit_Click('{$abid[frmviewbid].id}');">
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$abid[frmviewbid].id}');">
					</td>
				</tr>
			{/section}
			</table>
			{else}
			 <table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="successMsg" align="center">&nbsp;No one bid on this project still....</td>
				</tr>
			</table>
			{/if}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
			<tr>
			    <td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="right"><input type="submit" name="Submit" value="Back" class="stdButton"></td>
			</tr>
			</table>
			{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
					<td align="right">{$Page_Link}</td>
				</tr>
			</table>
			{/if}
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="project_id" value="{$project_id}" />
	<input type="hidden" name="bid_id" />
	</form>
</table>