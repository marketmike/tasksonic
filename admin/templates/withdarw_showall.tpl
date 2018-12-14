<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Withdraw Money Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmwithdrawl" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Withdraw Money Management </td>
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
						Manage Withdraw Money. Edit/Delete Withdraw Money.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmwithdrawl.submit();">
							{$PageSize_List}
					  </select></div>
					</td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td colspan="6" class="varnormal"><font color="#9D0027">Red Indiacates Withdraw money Requested (Pending)</font></td>
				</tr>
				<tr>
					<td colspan="6" class="varnormal"><font color="#339900">Green Indiacates Withdraw money Completed</font></td>
				</tr>
				<tr>
				    <td>&nbsp;</td>
				</tr>
				<tr>
					<td width="5%" class="headTitle">&nbsp;</td>
					<td width="19%" class="headTitle" align="center">Name </td>
					<td width="19%" class="headTitle" align="center">Amount </td>
					<td width="19%" class="headTitle" align="center">Requested Date</td>
					<td width="19%" class="headTitle" align="center">Status</td>
					<td width="19%" class="headTitle" align="center">Action</td>
				</tr>
			{section name=withdraw_money loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="5%"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$withmoney[withdraw_money].id}" align="middle"></td>
					<td class="bodytextblack">
					{if $withmoney[withdraw_money].status == 0}
							&nbsp;<font color="#9D0027">
					{else}
						&nbsp;<font color="#339900">
					{/if}&nbsp;{$withmoney[withdraw_money].user_name}</td>
					<td class="bodytextblack">
					{if $withmoney[withdraw_money].status == 0}
						&nbsp;<font color="#9D0027">
					{else}
						&nbsp;<font color="#339900">
					{/if}&nbsp;$&nbsp;{$withmoney[withdraw_money].amount}</td>
					<td class="bodytextblack">
					{if $withmoney[withdraw_money].status == 0}
						&nbsp;<font color="#9D0027">
					{else}
						&nbsp;<font color="#339900">
					{/if}&nbsp;{$withmoney[withdraw_money].requested_date}</td>
					{if $withmoney[withdraw_money].status == 0}
					<td class="bodytextblack">&nbsp;<font color="#9D0027">&nbsp;Requested (Pending)</td>
					{else}
					<td class="bodytextblack">&nbsp;<font color="#339900">&nbsp;Completed</td>
					{/if}
				    <td align="center">
						<img src="{$Templates_Image}edit.gif" 	class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$withmoney[withdraw_money].id}');">&nbsp;&nbsp;
				</td>	
				</tr>
			{/section}
			</table>
			{if $smarty.section.withdraw_money.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('{$withmoney[withdraw_money].id}');">
					</td>
				</tr>
			</table>
			{/if}
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
	<input type="hidden" name="ww_id" />
	</form>
</table>