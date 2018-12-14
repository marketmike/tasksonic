<script language="javascript">
	var JS_Del				 = '{$JS_Del}';
	var JS_Select			 = '{$JS_Select}';
	var JS_Del_All			 = '{$JS_Del_All}';
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1>{$lang.Manage_Portfolio}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					{if $member_ship == ''}
	
						  {if $Loop == $free_portfolio }
							<label for="login-email-address">You have used all {$free_portfolio} examples.</label>
						  {else}
							<label for="login-email-address">{$Loop} out of {$free_portfolio} used</label>
						  {/if}

					{else}
		
						  {if $Loop == $premium_portfolio }
							<label for="login-email-address">You have used all {$premium_portfolio} examples.</label>
						  {else}
							<label for="login-email-address">{$Loop} out of {$premium_portfolio} used</label>
						  {/if}									
					{/if}
					</div>
					</div>				
					<div class="clear"></div>
					{if $Loop == $free_portfolio }				
					<div class="message" style="text-align:center;padding:10px;margin:10px;">Upgrade to premium membership and post up to {$premium_portfolio} examples</div>
					<div class="clear"></div>
					{/if}					
					<form method="post" action="{$Action}" name="frmportfolio">
					{if $succMsg}
					<div class="clear"></div>					
					<div class="message" style="text-align:center;padding:10px;margin:10px;">{$succMsg}</div>
					<div class="clear"></div>
					{/if}
					<div class="body_shim">					
														
						<div id="all_tasks" class="{cycle values='list_B style3, list_A style3'}" >
						<span class="title" style="text-transform:capitalize">
						{if $Loop != $free_portfolio || $Loop == $premium_portfolio }
						<a href="add_portfolio.php">{$lang.New_Portfolio}</a>
						{/if}
						</span>
							<div style="float:right;margin-right:5px">
								{if $Loop>1}
								<a href="Javascript: Order_Click('{$usr_id}')" class="footerlink">{$lang.Manage_Order}</a>
								{/if}			
							</div>
							<div class="clear"></div>
							<div style="width:560px;background:#E0E1E2;height:140px;padding:10px;">
							{if $Loop > 0 && $Loop < 6}
								{section name=seller loop=$Loop}							
								<div style="float:left;margin-left:10px;margin-right:10px;" class="portfolio"><img src="{$img_path_port}{$iportfolio[seller].sample_file}" alt="{$iportfolio[seller].title}" title="{$iportfolio[seller].title}" border="0" height="100" width="100" style="margin:0px" />
								<div class="clear"></div>
								<div style="margin-top:5px;line-height:40px;">
								<input class="shorter" type="checkbox" style="height:30px;width:30px;" name="checkboxgroup[]" value="{$iportfolio[seller].id}" />
								<a href="update_portfolio.php?portfolio_id={$iportfolio[seller].id}" ><img src="{$Templates_Image}edit.gif" title="Edit" border="0"/></a>
								<img src="{$Templates_Image}delete.gif" title="Delete" onclick="javascript: return Delete_Click('{$iportfolio[seller].id}');"/>
								</div>
								</div>
								{/section}
							{else}
							<div style="margin:0 auto;text-align:center;padding:20px">
							<h3>No Tasker Portfolio Found</h3>
							</div>
							{/if}						
							<div class="clear"></div>
					
							</div>
							{if $smarty.section.seller.total > 1}
							<div style="width:578px;margin-top:10px;background:#fff;text-align:right">
									<img src="{$Templates_Image}arrow_ltr.png">	
									<a href="JavaScript: CheckUncheck_Click(document.getElementsByName('checkboxgroup[]'), true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="footerlinkcommon2">{$lang.Check_All}</a> / 
									<a href="JavaScript: CheckUncheck_Click(document.getElementsByName('checkboxgroup[]'), false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="footerlinkcommon2">{$lang.Uncheck_All}</a>  &nbsp;&nbsp;					
									Delete Selected <img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('{$iportfolio[seller].id}');">	
							</div>
							{/if}
						</div>
						<div class="clear"></div>								
	
							</div> <!-- end body shim-->
							<input type="hidden" name="Action" >
							<input type="hidden" name="portfolio_id" />
							<input type="hidden" name="port_img"/>
							</form>
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