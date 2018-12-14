<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Close Task</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">{$project_name}</label>
					</div>
					</div>					
				<div class="clear"></div>
					<div class="body_shim">							
				<table width="100%"  border="0">
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> 
							{if $error == 1}
							<table width="95%" border="0">
								<tr>	
									<td width="50%" align="center" class="successMsg">{$lang.Close_project_Err}</td>
								</tr>
								<tr>	
									<td width="50%" align="center" class="bodytextblack">&nbsp;</td>
								</tr>
							</table>
							{else}
							<form method="post" action="{$smarty.server.PHP_SELF}">
							<table width="95%" border="0">
								<tr>	
									<td width="50%" align="center" class="bodytextblack">{$lang.Close_project} <strong>{$project_name}</strong> ?</td>
								</tr>
								<tr>	
									<td width="50%" align="center" class="bodytextblack">&nbsp;<input type="hidden" name="project_id" value="{$project_id}"></td>
								</tr>
								<tr>	
									<td width="50%" align="center" class="bodytextblack">
										<div style="text-align:center">		 
												<div class="buttons" style="float:left;margin-left:150px;">
												<button type="submit" name="Submit" value="{$lang.Close_Yes}">Close Task</button>
												</div>									 
												<div class="buttons" style="float:left;margin-left:20px;">
												<button type="submit" id="btnbg" name="Submit" value="{$lang.Close_No}">Cancel</button>
												</div>
										</div>
									</td>
								</tr>
								<tr>	
									<td width="50%" align="center" class="bodytextblack">{$lang.Note}</td>
								</tr>								
							</table>
							</form>
							{/if}
						</td>
					</tr>
				</table>
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