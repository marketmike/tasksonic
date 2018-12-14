<div id="list_head">
					<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
							<span class="style9"><font color=black>{$lang.Search_Profiles}</font></span>
						</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
					
					<div style=" width:860px; clear:both;">
					<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>

<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>
		<td height="20"></td>
	</tr>
</table>
{if $Loop > 0}
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
	<tr>
		<td width="230" height="25" bgcolor="#D5D5D5" class="bodytextwhite" align="left">&nbsp;</td>
	</tr>
	{section name=SellerList loop=$Loop}
	<tr class="{cycle values='list_A, list_B'}">
		<td height="25" class="bodytextblack">
			<table cellpadding="2" cellspacing="1" border="0" width="100%">
				<tr>
					<td width="18%" class="bodytextblack" valign="top">
					    <table width="100%" cellpadding="3" cellspacing="4" border="0">
							<tr>
							    <td  colspan="2" valign="top"><a href="tasker_profile_{$user_login_id[SellerList]}.html" class="footerlinkcommon2">{$user_login_id[SellerList]}</a>
								</td>
							</tr>
							<tr>
							    <td width="160" valign="top">
					      			{if $seller_logo[SellerList]}<img src="{$img_path}thumb_{$seller_logo[SellerList]}" border="0" height="150" width="150">{else}<img src="{$Templates_Image}no_image.jpg" border="0" height="150" width="150">{/if}
								</td>
								<td valign="top">
									<table width="100%" cellpadding="3" cellspacing="4" border="0">
										<tr valign="top">
											<td class="bodytextblack" width="10%">{$lang.Rating}</td>
											<td class="bodytext" width="20%">{if $rating[SellerList] == 0.00}{$lang.No_feedback}{else}<img src="{$Templates_Image}{$rating[SellerList]|intval}.gif" width="120"><a href="{$user_login_id[SellerList]}_feedback.html" class="footerlinkcommon2">({$reviews[SellerList]} {$lang.Review})</a>{/if}</td>
											<td class="bodytextblack" width="10%">{$lang.Earning}</td>
											<td class="bodytext" width="20%">{if $earning[SellerList] == 0.00}{$lang_common.Curreny}&nbsp;0.00{else}{$lang_common.Curreny}&nbsp;{$earning[SellerList]}{/if}</td>
											<td class="bodytextblack" width="10%">{$lang.Location}</td>
											<td class="bodytext" width="30%">{if $location_1[SellerList] != ''}{$location[SellerList]}{else}{$location_2[SellerList]}{/if}</td>
										</tr>
										<tr>
											<td class="bodytext" colspan="6">{$seller_description[SellerList]}</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="bodytextblack"><a href="tasker_profile_{$user_login_id[SellerList]}.html" class="footerlinkcommon2">{$lang.Profile}</a> | <a href="seller_portfoilo_{$user_login_id[SellerList]}.html" class="footerlinkcommon2">{$lang.Portfolio}</a> | <a href="{$user_login_id[SellerList]}_feedback.html" class="footerlinkcommon2">{$lang.Feedback}</a> | <a href="post_project_{$user_login_id[SellerList]}.html" class="footerlinkcommon2">{$lang.Post_proj} {$user_login_id[SellerList]}</a></td>
							</tr>
						</table>			
				  	</td>
				 </tr>
			</table>
		</td>
	</tr>
	{/section}
	<tr style="style2">
		<td height="22" align="center" class="style8">{$Page_Link} </td>
	</tr>
</table>
{else}
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="50%" align="center" class="successMsg">{$lang.Sorry}</td>
	</tr>
	<tr>
	    <td>&nbsp;</td>
	</tr>
</table>
{/if}
						</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>

</div>
					
					<div id="more_link">
						
					</div>
</div>