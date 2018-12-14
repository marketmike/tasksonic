<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$header}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">{$task_recent}</label>
						</div>
					</div>
					<div class="clear"></div>
				<div id="map" style="width:605px;border:1px solid #000;" >
					<div id="maprecent" class="centermap" style="height:450px"></div>
				</div>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
		<div class="rail_spacer">&nbsp;</div>	
		{include file="$T_Mytasks"}
		{include file="$T_Balance"}		
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->