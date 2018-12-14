<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1>{$lang.Search_project} {if $Searched_For}{$Searched_For}{else}All Open Tasks {$citycurrent}{/if}</h1>
	<div class="page_top"></div>
			<div class="page_content">
				<div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address"><strong>Searched: </strong>{if $Searched_For}{$Searched_For}{else}All Open Tasks {$citycurrent}{/if}</label>
						</div>
					</div>				
				<div class="clear"></div>
				<div class="body_shim">
				<div class="clear"></div>
							<table  width="100%"  border="0" align="center" cellpadding="4" cellspacing="0">
							{if $Loop!=0}
								<tr class="style10 lh_bg">
									<td width="0" height="25"  class="bodytextwhite" align="left">&nbsp;</td>
									<td width="285" height="25"   align="left" class="bodytext"><strong>{$lang.task}</strong></td>
									<td width="55"  class="bodytext" align="center"><strong>{$lang.Bids}</strong></td>
									<td width="120"  class="bodytext" align="left"><strong>{$lang.Category}</strong></td>
									<td width="120"  class="bodytext" align="center"><strong>{$lang.Posted}</strong></td>
								</tr>
							{/if}	
								{section name=ProList loop=$Loop}
								 {if $view_project[ProList].premium_project == 1}
								<tr style="background-color:#FDF8D4;" class="styletr tdheight">
								 {else}
								<tr class="{cycle values='list_B style3, list_A style3'}">
								 {/if}
									<td width="0" height="25" class="bodytextblack" align="left">
									{if $view_project[ProList].premium_project == 1}
										   <img src="{$Templates_Image}premium_project.gif" border="0" />
									{elseif $view_project[ProList].membership_id !=0}
										<img src="{$Templates_Image}vip_member.gif" border="0" />
									{else}
										&nbsp;
									{/if}
									</td>
									<td width="285" height="25"><a href="task_{$view_project[ProList].id}_{$view_project[ProList].clear_title|stripslashes}.html" ><strong>{$view_project[ProList].title|stripslashes}</strong></a>
									&nbsp;{if $view_project[ProList].urgent_project == 1} <strong><font color="#BA0403">({$lang.Urgent})</font></strong> {else} &nbsp; {/if}					
									</td>
									<td width="55"  align="center">{$view_project[ProList].bid}</td>
								
									<td width="120">{$view_project[ProList].category}</td>
									<td width="120"  align="center">{$view_project[ProList].project_date|date_format:'%B %d, %Y'}</td>
								</tr>
							{sectionelse}
								<tr>
									<td align="center" class="bodytextblack" colspan="7"><br /><strong>{$lang.Sorry} for {if $Searched_For}{$Searched_For}{else}"All Open Tasks {$citycurrent}"{/if}</strong></td>
								</tr>
							{/section}
						</table>
					<div class="clear"></div>	
					<div><ul class="paginator">{$Page_Link}</ul></div>
				<div class="clear"></div>
				<div id="more_link"></div>
			</div>
			<div class="clear"></div>
			</div>
		</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>	
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->