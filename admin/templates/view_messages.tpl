<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		View Messages Posted by {$user_id} 
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmUsers" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">View Messages Posted by {$user_id} </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr>
					<td colspan="5"><strong>Bid Posted By {$user_id} on various projects</strong></td>
				</tr>
				<tr class="header">
					<td align="center"><strong>project Name</strong></td>
					<td align="center"><strong>Bid Amount</strong></td>
					<td align="center"><strong>Delivery Within</strong></td>
					<td align="center"><strong>Bid Description</strong></td>
					<td align="center"><strong>Date</strong></td>
				</tr>
			
				{section name=bidcycle loop=$bid_Loop}
				<tr class="{cycle values='list_B, list_A'}">
					<td align="center" class="fieldLabelLeft1">{$arr_bid[bidcycle].project_title}</td>
					<td align="justify" class="fieldLabelLeft1"><span class="fieldlabelLeft">$</span>{$arr_bid[bidcycle].bid_amount}</td>
					<td align="center" class="fieldLabelLeft">{$arr_bid[bidcycle].delivery_within} Days</td>
					<td align="center" class="fieldLabelLeft">{$arr_bid[bidcycle].bid_desc}</td>
					<td align="center" class="fieldLabelLeft1">{$arr_bid[bidcycle].date_2}</td>
				</tr>
				{sectionelse}
				<tr>
					<td colspan="5" align="center" class="varnormal">no Bid Posted By {$user_id} on any project</td>
				</tr>
				{/section}
			</table>
			<BR>
			<BR>
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr>
					<td colspan="5"><strong>Private Messages Posted By {$user_id} on various projects</strong></td>
				</tr>
				<tr class="header">
					<td align="center"><strong>project Name</strong></td>
					<td align="center"><strong>Message Sent to</strong></td>
					<td align="center"><strong>Message Description</strong></td>
					<td align="center"><strong>Files</strong></td>
					<td align="center"><strong>Date</strong></td>
				</tr>
			
				{section name=pmscycle loop=$pm_Loop}
				<tr class="{cycle values='list_B, list_A'}">
					<td align="center" class="fieldLabelLeft1">{$arr_pms[pmscycle].project_title}</td>
					<td align="justify" class="fieldLabelLeft1">{$arr_pms[pmscycle].recevier_login_id}</td>
					<td align="center" class="fieldLabelLeft">{$arr_pms[pmscycle].private_msg_desc}</td>
					<td align="center" class="fieldLabelLeft">{$arr_pms[pmscycle].file}</td>
					<td align="center" class="fieldLabelLeft1">{$arr_pms[pmscycle].date}</td>
				</tr>
				{sectionelse}
				<tr>
					<td colspan="5" align="center" class="varnormal">no Private Messages Posted By {$user_id} on any project</td>
				</tr>
				{/section}
			</table>		
			<BR>
			<BR>
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr>
					<td colspan="5"><strong>Message board entry Posted By {$user_id} on various projects</strong></td>
				</tr>
				<tr class="header">
					<td align="center"><strong>project Name</strong></td>
					<td align="center"><strong>Message Sent to</strong></td>
					<td align="center"><strong>Message Description</strong></td>
					<td align="center"><strong>Date</strong></td>
				</tr>
				{section name=messagecycle loop=$messages_Loop}
				<tr class="{cycle values='list_B, list_A'}">
					<td align="center" class="fieldLabelLeft1">{$arr_messages[messagecycle].project_title}</td>
					<td align="justify" class="fieldLabelLeft1">{$arr_messages[messagecycle].receiver_login_id}</td>
					<td align="center" class="fieldLabelLeft">{$arr_messages[messagecycle].message_desc}</td>
					<td align="center" class="fieldLabelLeft1">{$arr_messages[messagecycle].dates}</td>
				</tr>
				{sectionelse}
				<tr>
					<td colspan="5" align="center" class="varnormal">no Messages Posted By {$user_id} on any project's message board</td>
				</tr>
				{/section}
			</table>		
			<BR>
			<BR>
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr>
					<td colspan="5"><strong>project Posted By {$user_id}</strong></td>
				</tr>
				<tr class="header">
					<td align="center"><strong>project Name</strong></td>
					<td align="center"><strong>Description</strong></td>
					<td align="center"><strong>Date</strong></td>
				</tr>
				{section name=projectcycle loop=$cnt_project}
				<tr class="{cycle values='list_B, list_A'}">
					<td align="center" class="fieldLabelLeft1" valign="top"><a href="project_list.php?Action=View&project_id={$arr_project[projectcycle].project_id}" class="actionLink">{$arr_project[projectcycle].project_title}</a></td>
					<td align="justify" class="fieldLabelLeft1">{$arr_project[projectcycle].project_description}</td>
					<td align="center" class="fieldLabelLeft">{$arr_project[projectcycle].project_posted_date}</td>
				</tr>
				{sectionelse}
				<tr>
					<td colspan="5" align="center" class="varnormal">no project Posted By {$user_id}</td>
				</tr>
				{/section}
			</table>		
		</td>
	</tr>
	</form>
</table>