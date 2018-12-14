<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Bid Management			
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmNewBid" action="{$A_Action}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Bid Management </td>
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
						Manage Bid. Add/Edit/Delete Bid.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmNewBid.submit();">
							{$PageSize_List}
					  </select></div>
				  </td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="90%">
				<tr>
					<td width="5%" class="headTitle"></td>
					<td class="headTitle" align="center" width="15%">Bid by User </td>
					<td class="headTitle" align="center" width="15%">Bid Amount </td>
					<td class="headTitle" align="center" width="38%">On Task </td>
					<td class="headTitle" width="15%" align="center">Action</td>
				</tr>
				{section name=bad loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
					<td width="5%"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="{$arr_bid[bad].id}" align="middle" ></td>
					<td class="bodytextblack" align="center">{$arr_bid[bad].bid_by_user}</td>
					<td class="bodytextblack" align="center">$&nbsp;{$arr_bid[bad].bid_amount}</td>
					<td class="bodytextblack" align="center">{$arr_bid[bad].project_title}</td>
					<td align="center">
						<img src="{$Templates_Image}edit.gif" class="imgAction" title="Edit" onClick="JavaScript: Edit_Click('{$arr_bid[bad].id}','{$arr_bid[bad].project_id}');">&nbsp;&nbsp;
					  	<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: Delete_Click('{$arr_bid[bad].id}','{$arr_bid[bad].project_id}','{$arr_bid[bad].bid_by_user}');">&nbsp;&nbsp;
				</tr>
			{/section}
			</table>
			{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
				<td align="right">
						{$Page_Link}
				</td>
				</tr>
			</table>
			{/if}
			<br><br>
		</td>
	</tr>
	<input type="hidden" name="Action" />
	<input type="hidden" name="bid_id" />
	<input type="hidden" name="project_id" />
	<input type="hidden" name="user_name" />
</form>
</table>