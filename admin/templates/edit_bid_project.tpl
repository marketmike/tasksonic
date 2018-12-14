<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Bid Place On project [ {$Action} ]			
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmviewbidproject" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top" colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Bid Place On project [ {$Action} ]</td>
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
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">User Name :</td>
					<td class="fieldLabelLeft">{$user_name}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Amount :</td>
					<td class="fieldLabelLeft">{$bid}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Delivery (in days) :</td>
					<td class="fieldLabelLeft">{$delivery}</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Description : </td>
				</tr>
				<tr>
					<td class="fieldlabelRight1" valign="top" colspan="2">{$EN_Page_Editor}</td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton">
							&nbsp;&nbsp;&nbsp;
							<input type="submit" name="Submit" value="Cancel" class="stdButton">
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<input type="hidden" name="Action" value="{$Action}" />
	<input type="hidden" name="project_id" value="{$project_id}" />
	<input type="hidden" name="bid_id" value="{$bid_id}" />
	</form>
</table>