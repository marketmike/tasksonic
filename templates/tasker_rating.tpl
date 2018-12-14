<div class="grid_12 push_12 alpha omega content_body"> 
<div class="grid_8 alpha"> 
	<h1>Rate {$Site_Title_Absolute} Taskers</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="body_shim">
					<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">				  
						<tr>
							<td height="20"></td>
						</tr>
					{if $Loop_Seller >0}
					  <tr>
						<td width="40%" height="25" bgcolor="#B2B2B2" class="bodytextwhite" align="center"><strong>{$lang.task_Name}</strong></td>
						<td width="10%" bgcolor="#B2B2B2" class="bodytextwhite" align="center"><strong>{$lang.User_Name}</strong></td>
						<td width="10%" bgcolor="#B2B2B2" class="bodytextwhite" align="center"><strong>{$lang.User_Type}</strong></td>
						<td width="10%" bgcolor="#B2B2B2" class="bodytextwhite" align="center"><strong>&nbsp;</strong></td>
					  </tr>
					  {/if}
					  {if $Loop_Seller >0}
					  {section name=ProList loop=$Loop_Seller}
					  <tr class="{cycle values='list_B, list_A'}">
						<td width="40%" height="25" class="bodytextblack"><a href="task_{$arating_seller[ProList].id}_{$arating_seller[ProList].clear_title}.html" class="footerlinkcommon2"><strong>{$arating_seller[ProList].project_Title|stripslashes}</strong></a></td>
						<td width="10%" class="bodytextblack" align="center">{$arating_seller[ProList].project_post_to}</td>
						<td width="10%" class="bodytextblack" align="center">{$lang.Buyer}</td>
						<td width="10%" class="bodytextblack" align="center"><a href="rating_user.php?project_id={$arating_seller[ProList].id}&User_type=tasker&to={$arating_seller[ProList].project_post_to}" class="footerlinkcommon2">{$lang.Rate}</a></td>
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