<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Rate {$Site_Title_Absolute} Task Owners</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="body_shim">				
					<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
						
						<tr>
							<td height="20"></td>
						</tr>
						{if $Loop_Buyer > 0}
						<tr>
							<td width="40%" height="25" bgcolor="#D5D5D5" class="bodytextwhite" align="center"><strong>{$lang.task_Name}</strong></td>
							<td width="10%" bgcolor="#D5D5D5" class="bodytextwhite" align="center"><strong>{$lang.User_Name}</strong></td>
							<td width="10%" bgcolor="#D5D5D5" class="bodytextwhite" align="center"><strong>{$lang.User_Type}</strong></td>
							<td width="10%" bgcolor="#D5D5D5" class="bodytextwhite" align="center"><strong>&nbsp;</strong></td>
						</tr>
						{/if}
						{if $Loop_Buyer > 0}
						{section name=ProList_1 loop=$Loop_Buyer}
							<tr class="{cycle values='list_B, list_A'}">
								<td width="40%" height="25" class="bodytextblack"><a href="project_{$arating_buyer[ProList_1].id}_{$arating_buyer[ProList_1].clear_title}.html" class="footerlinkcommon2"><strong>{$arating_buyer[ProList_1].project_Title|stripslashes}</strong></a></td>
								<td width="10%" class="bodytextblack" align="center">{$arating_buyer[ProList_1].project_posted_by}</td>
								<td width="10%" class="bodytextblack" align="center">{$lang.Seller}</td>
								<td width="10%" class="bodytextblack" align="center"><a href="rating_user.php?project_id={$arating_buyer[ProList_1].id}&User_type=task_owner&to={$arating_buyer[ProList_1].project_posted_by}" class="footerlinkcommon2">{$lang.Rate}</a></td>
						</tr>
						{/section}
						{else}
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4" class="bodytextblack" align="center"><strong>{$lang.Text}</strong></td>
						</tr>
						{/if}
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
					</table>
					</div>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
		<div class="rail_spacer">&nbsp;</div>		
			{include file="$T_Post"}
			{include file="$T_Location"}
			{include file="$T_Balance"}
			{include file="$T_Mytasks"}		
			{include file="$T_Map"}				
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->