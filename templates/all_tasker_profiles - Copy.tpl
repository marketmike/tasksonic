<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
		<h1>{$lang.Find_Sellers}</h1>
		<div class="page_top"></div>
				<div class="page_content">
					<div class="page_content_white">		
						{section name=MemberList loop=$Loop1}
						<div id="homepage_projects_{$smarty.section.MemberList.index}" {if $smarty.section.MemberList.index == 0}style="visibility:visible;display:block;"{else}style="visibility:hidden;display:none;"{/if}>	
						{section name=MemberListint loop=$member_count[MemberList]}
						<div id="all_Taskers" class="{cycle values='list_B style3, list_A style3'}" >
						<div class="cat_message">{$lang.Text} {$cat_name[MemberList]}</div>
						<div class="clear"></div>
							<div class="img_holder">
								{if $arr_seller[MemberList][MemberListint].logo}
								<img src="{$img_path}thumb_{$arr_seller[MemberList][MemberListint].logo}" border="0" height="150" width="150">
								{else}
								<img src="{$img_path}default.jpg" border="0" height="150" width="150">
								{/if}
								<div class="clear"></div>		
							</div>
							<div class="body_text">
							<table width="100%" cellpadding="3" cellspacing="4" border="0">
							<tr valign="top">
							<td class="bodytextblack" width="120">{$lang.Earning}</td>
							<td class="bodytext" width="15%">{if $arr_seller[MemberList][MemberListint].earning == 0.00}{$lang_common.Curreny}&nbsp;0.00{else}{$lang_common.Curreny}&nbsp;{$arr_seller[MemberList][MemberListint].earning}{/if}</td>
							<td class="bodytextblack" width="120">{$lang.Location}</td>
							<td class="bodytext" width="20%">{if $arr_seller[MemberList][MemberListint].location_1 != ''}{$arr_seller[MemberList][MemberListint].location}{else}{$arr_seller[MemberList][MemberListint].location_2}{/if}</td>
							</tr>
							<tr valign="top">
							<td class="bodytextblack" width="120">{$lang.Rating}</td>
							<td class="bodytext" width="40%" colspan="3">{if $arr_seller[MemberList][MemberListint].rating == 0.00}{$lang.No_feedback}{else}<img src="{$Templates_Image}{$arr_seller[MemberList][MemberListint].rating|intval}.gif" width="120">&nbsp;<a href="{$arr_seller[MemberList][MemberListint].login_id}_tasker_feedback.html" class="footerlinkcommon2">({$arr_seller[MemberList][MemberListint].reviews} reviews)</a>{/if}</td>
							</tr>
							{if $arr_seller[MemberList][MemberListint].mother_lang != ''}
							<tr>
							<td class="bodytextblack" width="120 valign="top">{$lang.Mother_Lang}</td>
							<td class="bodytext" colspan="3">{$arr_seller[MemberList][MemberListint].mother_lang}</td>
							</tr>
							{/if}
							{if $arr_seller[MemberList][MemberListint].lang_pairs != ''}
							<tr>
							<td class="bodytextblack" width="120" valign="top">{$lang.Lang_Pairs}</td>
							<td class="bodytext" colspan="3">{$arr_seller[MemberList][MemberListint].lang_pairs}</td>
							</tr>
							{/if}
							<tr>
							<td class="bodytext" colspan="6">{$arr_seller[MemberList][MemberListint].description}</td>
							</tr>
							</table>		
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								<strong><a href="tasker_profile_{$arr_seller[MemberList][MemberListint].login_id}.html" class="footerlinkcommon2">{$lang.Profile}</a> | <a href="tasker_portfolio_{$arr_seller[MemberList][MemberListint].login_id}.html" class="footerlinkcommon2">{$lang.Portfolio}</a> | <a href="{$arr_seller[MemberList][MemberListint].login_id}_tasker_feedback.html" class="footerlinkcommon2">{$lang.Feedback}</a> | <a href="post_project_{$arr_seller[MemberList][MemberListint].login_id}.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');">{$lang.Post_project_to}{$arr_seller[MemberList][MemberListint].login_id}</a></strong>
							</div>
							<div class="clear"></div>						
						</div>
						{sectionelse}
						<div id="all_Taskers" style="height:300px;">
						<div class="clear"></div>
						<div class="none_found">{$lang.No_Seller_Text} {$cat_name[MemberList]}</div>
						<div class="clear"></div>	
						<div class="none_found2">{$lang.Please_Choose}</div>
						<div class="clear"></div>
						</div>
						{/section}						
				</div>
						{/section}
			<div id="more_link"></div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<h2 class="title" style="margin-left:5px;">Choose A Category</h1>
	<table width="100%" border="0" cellspacing="0" cellpadding="10" style="padding:10px">		
	{section name=CatList loop=$Loop1}
	<tr class="style3 tdheight">
	<td id="td_id_{$smarty.section.CatList.index}"  height="38" class="borders" onclick="javascript: show_Category({$smarty.section.CatList.index},{$total_cat});"><a href="#">{$cat_name[CatList]}</a></td>
	</tr>
	{if $smarty.section.CatList.last}

	{else}
	<tr>
	<td background="{$Templates_Image}line_bg.gif" style=""><img src="{$Templates_Image}line_bg.gif" width="2" height="2" /></td>
	</tr>
	{/if}
	{/section}
	</table>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->