<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Category_List1} in Ocala</h1>
	<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li><a href="latest-open-tasks.html">Latest Tasks</a><span></span></li>			
					<li><a href="latest-online-tasks.html">Online Tasks</a><span></span></li>
					<li class="current"><a href="task-categories.html">By Category</a><span></span></li>
					<li><a href="completed-tasks.html">Completed</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>	
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><strong>Choose A Category To View Tasks</strong></label>
				</div>
				</div>
				<div class="clear"></div>									
				<div class="cat-row">  				
					{assign var="col" value=5}
					{section name=CatList loop=$Loop}
					<div class="cat-col"><a href="category_{$arr_cat[CatList].id}.html" class="footerlinkcommon2" >{$arr_cat[CatList].desc|replace:'<P>':''|replace:'</P>':''}</a><br />({$arr_cat[CatList].task_count_menu})</div>
					{if $smarty.section.CatList.iteration|mod:$col==5}
					<div class="clear"></div>
					{/if}
					{/section}
				</div>					
			<div class="clear"></div> 				
			<div id="more_link"></div>
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
		{include file="$T_Mytasks"}		
		{include file="$T_Map"}					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->