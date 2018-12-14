<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1>{$pagename}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">{$msg}</label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="message" style="text-align:center;margin-bottom:50px">
				{if $info}{$info}<br /><br />{/if}
				<div style="margin:0 auto;margin-top:30px;{if $navigation && $navigation1 && $navigation2}width:450px;{elseif $navigation && $navigation1}width:300px;{else}width:150px;{/if}"><div class="button-no" style="float:left;margin-right:6px;">{$navigation}</div>{if $navigation1}<div class="button-no" style="float:left;margin-right:6px;">{$navigation1}</div>{/if}{if $navigation2}<div class="button-no" style="float:left;margin-right:6px;">{$navigation2}</div>{/if}</div>
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
		{include file="$T_Map"}					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->