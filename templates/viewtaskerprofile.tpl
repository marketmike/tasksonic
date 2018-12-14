{literal}
    <script type="text/javascript">
    $(function() {
        $('.portfolio a').lightBox();
    });
    </script>
{/literal}
<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1>{$user_name1}{$lang.tasker_profile}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
{if $user_name == 1}
<table width="100%"  border="0" align="center">
	<tr>
		<td valign="top" align="center" class="successMsg">{$lang.view_Seller_msg}</td>
	</tr>
</table>	
{/if}
{if $user_name == 0}
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
			<div class="form_page_text" style="text-align:center;">
			<label for="login-email-address"><strong>{$user_name1}'s Tasker Profile</strong></label>
			</div>
			</div>
			<div class="clear"></div>
			<div id="tasker_profile_wrap" style="margin:10px;">
			<div class="clear"></div>
			<h3>{$seller_slogan}</h3>
			<div class="clear"></div>
			<div style="float:left;width:340px;">
			<div class="clear"></div>
			<strong>{$lang.Location}: </strong>{$location} 
			<div class="clear"></div>			
			<strong>{$lang.Service_Rating}: </strong>
			{if $rating == 0.00}
			{$lang.No_Feedback}
			{else}									 
			<img src="{$Templates_Image}{$rating|intval}.gif" width="120">&nbsp;<strong>{$rating}</strong>&nbsp;<a href="{$user}_tasker_feedback.html" class="footerlink">({$ave_count} reviews)</a>
			{/if}		
			<div class="clear"></div>		
			<strong>{$lang.Skill_Rating}: </strong>                                                   
			{if $skill_count != 0}
			<img src="{$Templates_Image}{$avg_rating|intval}.gif" width="120"> <strong>{$avg_rating|string_format:"%.2f"}</strong> {$skill_count} {$lang.Skill_Msg}</td>
			{/if}
			<div class="clear"></div>
			<strong>{$lang.Earn_Reported}: </strong>
			{if $earn_by_site == 0.00}
			<strong>{$lang_common.Curreny}&nbsp;{$earn_by_site}</strong>
			{else}
			<strong>{$lang_common.Curreny}&nbsp;{$earn_by_site}</strong>
			{/if}
			<div class="clear"></div>
			<strong>{$lang.Experience}: </strong>
			{if $industries!= NULL}
			{$industries}
			{else}
			<div class="successMsg">{$lang.Industry_Msg}</div>
			{/if}
			<div class="clear"></div>			
			</div>
			<div style="float:left;margin-left:15px;width:220px;">
			<div class="clear"></div>
			{if $mem_employes != ""}			
			<div class="clear"></div>			
			<strong>{$lang.Employees}: </strong>
			{$mem_employes}
			{/if}
			<div class="clear"></div>
				{if $fb_verfy == 1 || $email_verfy == 1 || $address_verfy == 1 || $human_verfy == 1 || $background_verfy == 1}
				<div style="line-height:30px;font-weight:bold;margin-top:0px;">
				<span style="float:left;margin-right:5px;height:30px">Trusted and Verified</span>
				<div class="clear"></div>
				{if $fb_verfy == 1}<img src="images/facebook-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Facebook Verified" title="Facebook Verified" />{/if}
				{if $email_verfy == 1}<img src="images/email-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Email Verified" title="Email Verified" />{/if}							
				{if $address_verfy == 1}<img src="images/address-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Address Verified" title="Address Verified" />{/if}
				{if $human_verfy == 1}<img src="images/phone-verified.png" style="float:left;margin-right:10px;width:30px;height:30px" alt="Human Verified" title="Human Verified" />{/if}
				{if $background_verfy == 1}<img src="images/background-verified.png" style="float:left;margin-right:5px;width:30px;height:30px" alt="Background Checked" title="Background Checked" />{/if}	
				</div>
				<div class="clear"></div>
				{else}
				<div style="line-height:30px;font-weight:bold;margin-top:10px;margin-bottom:10px;">
				Task Owner has not completed any verification methods as of yet! 
				</div>
				<div class="clear"></div>
				{/if}
				<div class="clear"></div>
			</div>			
		<div class="clear"></div>
		<div style="margin:0 auto;margin-top:5px;padding-top:5px;border-top:1px dashed #ccc;">
			<div class="clear"></div>
			<strong>{$lang.Service_Desc}{$user_name1}:</strong><br />
			{if $seller_description != NULL}
			{$seller_description}
			{else}
			{$lang.Service_Desc_Msg}
			{/if}
		<div class="clear"></div>
		</div>
		<div class="clear"></div>		
		</div><!--tasker_profile_wrap-->
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
			<div class="form_page_text" style="text-align:center;">
			<label for="login-email-address"><strong>{$user_name1}'s Awarded Tasks for {$citycurrent}</strong></label>
			</div>
			</div>
			<!--Won Tasks Starts-->
					<div class="body_shim">
						{if $LoopWon > 0}
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr bgcolor="#D5D5D5" >
						<td class="bodytextwhite" align="center" width="32%" height="20"><strong>{$lang.My_Selling_Activity}</strong></td>
						<td class="bodytextwhite" align="center" width="32%" height="20"><strong>{$lang.Description}</strong></td>
						</tr>
						{section name=seller_project_name loop=$LoopWon}
						<tr class="{cycle values='list_A, list_B'}">
						<td align="left" class="bodytextblack" width="32%" height="20"><a href="task_{$aseller_win[seller_project_name].id}_{$aseller_win[seller_project_name].clear_title}.html" class="footerlinkcommon2">{$aseller_win[seller_project_name].project_Title|stripslashes}</a></td>
						<td align="center" class="bodytextblack">
							{if $aseller_win[seller_project_name].project_status == 3}<strong>{$lang.Accepted}</strong>{/if}
							{if $aseller_win[seller_project_name].project_status == 5}<strong>{$lang.Completed}</strong>{/if}
							{if $aseller_win[seller_project_name].project_status == 6}<strong>{$lang.task_Finished}</strong>{/if}
							{if $aseller_win[seller_project_name].project_status == 7}<strong>{$lang.task_Finished}</strong>{/if}								
						</td>
						</tr>
						{/section}
						</table>
						{else}
						<div class="clear"></div>
						<div style="margin:0 auto;text-align:center;padding:20px;"><strong>No Tasks Awarded Yet In {$citycurrent}</strong></div>	  
						{/if}
					</div>	
			<!--Won Tasks Ends-->
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
			<div class="form_page_text" style="text-align:center;">
			<label for="login-email-address">{$user_name1}'s {$lang.Portfolio_Summary}s</label>
			</div>
			</div>		
		<!--portfolio starts-->
			<div class="clear"></div>
				<div class="body_shim">
					<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
						<span class="title" style="text-transform:capitalize">
						{$user_name}
						</span>
						<div style="float:right;margin-right:5px">
							<strong>{$lang.Rating}: </strong>
							{if $rating == 0.00}
								{$lang.No_feedback}{else}
								<a href="{$user_name}_tasker_feedback.html" class="footerlink">								
								<img src="{$Templates_Image}{$rating|intval}.gif" width="120"></a>
							{/if}				
						</div>
						<div class="clear"></div>
						<div style="width:560px;background:#E0E1E2;height:140px;padding:10px;">
						{if $Loop > 0 && $Loop < 6}
							{section name=seller loop=$Loop}							
							<div style="float:left;margin-left:10px;margin-right:10px;" class="portfolio"><a href="{$img_path_port}{$iportfolio[seller].sample_file}" title="{$iportfolio[seller].title} - {$iportfolio[seller].desc}"><img src="{$img_path_port}{$iportfolio[seller].sample_file}" alt="{$iportfolio[seller].title}" title="{$iportfolio[seller].title}" border="0" height="100" width="100" style="margin:0px" /></a></div>
							{/section}
						{else}
						<div style="margin:0 auto;text-align:center;padding:20px">
						<h3>No Tasker Portfolio Found</h3>
						</div>
						{/if}						
						<div class="clear"></div>
						<div style="width:578px;margin-top:10px;background:#fff">
						<div class="button-no" style="float:left;margin-left:0px;margin-right:6px;"><a href="tasker_profile_{$user_name}.html" class="footerlinkcommon2">{$lang.Profile}</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="{$user_name}_tasker_feedback.html" class="footerlinkcommon2">{$lang.Feedback}</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="tasker_portfolio_{$user_name}.html" class="footerlinkcommon2">View All</a></div>						
						<div class="button-no" style="float:left;margin-right:0px;"><a href="post_task_{$user_name}.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');">Post Task To</a></div>	
						</div>					
						<div class="clear"></div>					
						</div>
					</div>
					<div class="clear"></div>				

					</div>				
			<!--portfolio ends-->			
		<div id="more_link"></div>
	<div class="clear"></div>		
	</div>
</div>
<div class="page_bottom"></div>
</div><!-- end .grid_8.alpha -->
<div class="grid_4 omega">
  <div class="right-column-wrap">
 			<div style="margin:0 auto">
			{if $fb_img}
			<div align="center">{$fb_img}</div>
			{elseif $seller_logo != ''}
			<div align="center"><img src="{$img_path}thumb_{$seller_logo}" border="0" width="125"/></div>
			{else}
			<div align="center"><img src="{$img_path}thumb-default.png" border="0" width="125"/></div>
			{/if}
			</div>		
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr bgcolor="#B2B2B2">
					<td width="35%" class="bodytextwhite">&nbsp;<strong>{$lang.Skill}</strong></td>
					<td width="33%" class="bodytextwhite" align="center"><strong>{$lang.Level}</strong></td>
					<td width="32%" class="bodytextwhite" align="center"><strong>{$lang.Grade}</strong></td>
				</tr>			
				{foreach name=skills from=$Listing item=skills}
				<tr class="list_A">
					<td class="bodytextblack" width="35%">&nbsp;{$skills->skill_name}</td>
					<td class="bodytextblack" align="center" width="33%">
					<img src="{$Templates_Image}{$skills->skill_rate|intval}.gif" width="120" />&nbsp;&nbsp;</td>
					<td class="bodytextblack" align="center" width="32%">{$skills->skill_rate}</td>
				</tr>
				{/foreach}
			</table>
			<div class="clear"></div>
			<div>{$lang.Skill_Note}</div>
			<br />
			<table width="100%" cellpadding="1" cellspacing="0" border="0">
				<tr class="list_A">
					<td colspan="2" class="bodytextblack" height="20"><span style ="text-transform:capitalize"><strong><a target="_blank" href="{$Site_Root}tasker_profile_{$user_name1}.html" class="footerlinkcommon2">Profile Permalink</a></strong></span></td>
				</tr>
				<tr>
				    <td colspan="2">&nbsp;</td>
				</tr>
				{if $membership_id !=0}
				<tr valign="top" align="center">
				    <td colspan="2" class="bodytextblack1" align="center">&nbsp;<img src="{$Templates_Image}vip_large.png" border="0" /><br /><span style ="text-transform:capitalize"><strong>{$user} {$lang.Text}.</strong></span></td>
				</tr>
				{/if}
			</table>
	</div><!--right-column-wrap-->
	<div class="right-column-wrap">
	  <h3>Tasker Feedback</h3>
					<div style="margin:0px;">						
					{if $Loop1}
					<strong>Feedback Summary</strong> | <a href="{$user}_task_owner_feedback.html" class="footerlinkcommon23"> <strong>View All</strong></a>
					<div class="clear"></div>
					{section name=rating loop=$Loop1}		
					 <div class="{cycle values='list_A, list_B'}" style="padding:7px">
					{$arating[rating].project_title}</a>
					<div class="clear"></div>
					<img src="{$Templates_Image}{$arating[rating].rating|intval}.gif" width="120">
					<div class="clear"></div>
					Rated on: {$arating[rating].date_time}
					<div class="clear"></div>
					Rated by: <a href="tasker_profile_{$arating[rating].rating_by_user}.html" class="footerlink">{$arating[rating].rating_by_user}</a>
					<div class="clear"></div>
					Ratings: 
					{if $arating[rating].averating != ''} 
					   <a href="{$arating[rating].rating_by_user}_tasker_feedback.html" class="footerlink">({$arating[rating].averating})</a>
					 {else}
					   <a href="{$arating[rating].rating_by_user}_tasker_feedback.html" class="footerlink">(0)</a>
					{/if} 
					<div class="clear"></div>
					Rating: {$arating[rating].rating|string_format:"%.2f"}
					<div class="clear"></div>
					Comments: {$arating[rating].dec}
					</div>					
					{/section}
					{else}
					<div style="margin:0 auto;text-align:center;">No Feedback Yet</div>					
					{/if}
				</div>
				{/if}
			<div class="clear"></div>
      </div><!--right-column-wrap-->
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->		