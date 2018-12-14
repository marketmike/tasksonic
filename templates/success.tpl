<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1>{$Page_Title_1}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>						
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">{if $OOPS}OOPS, there seems to be a problem!{else}{$lang.Payment_Text}{/if}</label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
				{include file = "$T_payment_submenu"}
				<div class="message" style="text-align:center;margin-bottom:50px">
				{if $OOPS}
				<div class="message" style="margin:0 auto;width:400px;">
				{$OOPS}
				</div>
				{else}
						<a href="my-transactions.html" class="link">{$lang.Payment_Text1}</a>
						{if $staged_task_link}
						<br /><br />
						You have an unpublished task "{$staged_task_link}", click to publish and process payment fees for this task.
						{/if}
				{/if}	
				</div>
				<div class="clear"></div>
				<div id="more_link"></div>
			</div>
		</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">	
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->