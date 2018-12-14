<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
		<h1>{$lang.Find_Sellers} In {$citycurrent}</h1>
				<div class="page_top"></div>
				<div class="page_content">
				<div class="page_content_white">		
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;font-size:26px">
				<label for="login-email-address">{$cat_name}</label>
				</div>
				</div>
				<div class="clear"></div>		
				</div>
				</div>
				<div class="page_bottom"></div>	
				<div class="clearwspace"></div>	
		<div class="page_top"></div>
				<div class="page_content">
					<div class="page_content_white">		
						{if $Loop > 0}	
						{section name=TaskerList loop=$Loop}
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">{$arr_seller[TaskerList].login_id}</label>
						</div>
					</div>
					<div class="clear"></div>						
						<div id="all_Taskers" class="{cycle values='list_B style3, list_A style3'}" >
						<div class="cat_message">{$lang.Text} {$cat_name}</div>
						<div class="clear"></div>
							<div class="img_holder">
								{if $arr_seller[TaskerList].fb_img}
								{$arr_seller[TaskerList].fb_img}
								{elseif $arr_seller[TaskerList].logo}
								<img src="{$img_path}thumb_{$arr_seller[TaskerList].logo}" border="0" height="100" width="100">
								{else}
								<img src="{$img_path}default.jpg" border="0" height="100" width="100">
								{/if}
								<div class="clear"></div>		
							</div>
							<div class="body_text_left">
							<div class="clear"></div>
							<strong>{$lang.Earning} </strong>{if $arr_seller[TaskerList].earning == 0.00}{$lang_common.Curreny}&nbsp;0.00{else}{$lang_common.Curreny}&nbsp;{$arr_seller[TaskerList].earning}{/if}
							<div class="clear"></div>
							<strong>{$lang.Location} </strong>{if $arr_seller[TaskerList].location_1 != ''}{$arr_seller[TaskerList].location}{else}{$arr_seller[TaskerList].location_2}{/if}
							<div class="clear"></div>
							<strong>{$lang.Rating} </strong>{if $arr_seller[TaskerList].rating == 0.00}{$lang.No_feedback}{else}<img src="{$Templates_Image}{$arr_seller[TaskerList].rating|intval}.gif" width="120">&nbsp;<a href="{$arr_seller[TaskerList].login_id}_tasker_feedback.html" class="footerlinkcommon2">({$arr_seller[TaskerList].reviews} reviews)</a>{/if}
							<div class="clear"></div>								
							</div>
							<div class="body_text_right">
								{if $arr_seller[TaskerList].fb_verfy == 1 || $arr_seller[TaskerList].email_verfy == 1 || $arr_seller[TaskerList].address_verfy == 1 || $arr_seller[TaskerList].human_verfy == 1 || $arr_seller[TaskerList].background_verfy == 1}
								<div style="line-height:25px;font-weight:bold;">
								<span style="float:left;margin-right:5px;height:25px">Trusted and Verified:</span>
								{if $arr_seller[TaskerList].fb_verfy == 1}<img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" />{/if}
								{if $arr_seller[TaskerList].email_verfy == 1}<img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" />{/if}							
								{if $arr_seller[TaskerList].address_verfy == 1}<img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" />{/if}
								{if $arr_seller[TaskerList].human_verfy == 1}<img src="images/phone-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" />{/if}
								{if $arr_seller[TaskerList].background_verfy == 1}<img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" />{/if}	
								<div class="clear"></div>
								</div>
								{/if}
							</div>
							<div class="body_text">
							<strong>About This Tasker: </strong>{if $arr_seller[TaskerList].description}{$arr_seller[TaskerList].description|truncate:200}{else}Tasker has not provided this information yet{/if}
							<div class="clear"></div>		
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								<strong><a href="tasker_profile_{$arr_seller[TaskerList].login_id}.html" class="footerlinkcommon2">{$lang.Profile}</a> | <a href="seller_portfolio_{$arr_seller[TaskerList].login_id}.html" class="footerlinkcommon2">{$lang.Portfolio}</a> | <a href="{$arr_seller[TaskerList].login_id}_tasker_feedback.html" class="footerlinkcommon2">{$lang.Feedback}</a> | <a href="post_task_{$arr_seller[TaskerList].login_id}.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');">{$lang.Post_project_to}{$arr_seller[TaskerList].login_id}</a></strong>
							</div>
							<div class="clear"></div>						
						</div>
						{/section}
						<div><ul class="paginator">{$Page_Link}</ul></div>
						{else}
						<div id="all_Taskers" style="height:300px;">
						<div class="clear"></div>
						<div class="none_found">{$lang.No_Seller_Text} {$cat_name[MemberList]}</div>
						<div class="clear"></div>	
						<div class="none_found2">{$lang.Please_Choose}</div>
						<div class="clear"></div>
						</div>						
						{/if}
						<div id="more_link"></div>
		<div class="clear"></div>		
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>
	  <div class="right-column-wrap">
	  <h1>Tasker Categories</h1>
	  <div style="margin:0 auto;width:240px">
			{assign var="col" value=3}
			{section name=CatList loop=$CatLoop}
			<div class="cat-col"><a href="all_tasker_profiles_{$arr_cat[CatList].id}.html" class="footerlinkcommon2" >{$arr_cat[CatList].desc|replace:'<P>':''|replace:'</P>':''}</a><br />({$arr_cat[CatList].member_count_menu})</div>
			{if $smarty.section.CatList.iteration|mod:$col==3}
			<div class="clear"></div>
			{/if}			
			{/section}
			</div>			
			<div class="clear"></div>
      </div><!--right-column-wrap-->
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->