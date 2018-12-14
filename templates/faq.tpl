<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Task Sonic FAQ</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						{if $Action ==1}Here's The Answer!{else}Task Sonic FAQ{/if}						
						</label>
					</div>
					</div>
					<div class="clear"></div>
					{if $Action ==1}
					<div class="field">
					<h3>{$faq_title}</h3>
					{$faq_content}
					<div class="clear"></div>
					<div class="faq_return">{$back}</div>
					<div class="clear"></div>
					</div>
					{else}
					<div class="field">
					{section name=faq loop=$Loop}
					<div class="faq_title"><img src="{$Site_URL}/templates/images/bullet.png" alt="" />&nbsp;&nbsp;<a href="/faq_details_{$arr_faq[faq].faq_id}.html">{$arr_faq[faq].faq_title}</a></div>
					<div class="clear"></div>
					{sectionelse}
					No FAQs Available
					{/section}			
					</div>
					{/if}				
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>		
		{if $smarty.session.User_Name}
			{include file="$T_Post"}		
			{include file="$T_Location"}
			{include file="$T_Balance"}
		{else}
		{include file="$T_PostLoggedOut"}		
		{/if}
		{include file="$T_Map"}				
		<div class="clear"></div>		
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->				
			
