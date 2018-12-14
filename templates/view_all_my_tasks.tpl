<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.page_header} For {$citycurrent}</h1>
<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li class="current"><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
					<li><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
					<li><a href="make-deposit.html">Deposit</a><span></span></li>
					<li><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>		
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="body_shim">
					{if $succMsg}
					<div>{$succMsg}</div>
					{/if}
					{if $Loop1 > 0}
								{section name=project_name loop=$Loop1}
									<div class="{cycle values='list_A, list_B'}" style="border:1px dashed #ccc;padding:5px;">
									<div class="row column_format">
									<span class="row_title"><strong><a href="task_{$post_project[project_name].id}_{$post_project[project_name].clear_title}.html" class="footerlinkcommon2">{$post_project[project_name].project_Title|stripslashes}</a></strong></span><span style="float:right;margin-right:10px;padding:2px;background:#FF0000;color:#fff;"><strong>Bids {$post_project[project_name].bid}</strong></span>
									<div class="clear"></div>
									<strong>Complete By: </strong> {$post_project[project_name].completed_by} at {$post_project[project_name].completed_time}
									</div>
									<div class="clear"></div>
									<div class="row column_format">									
										<div class="left red">
											{if $post_project[project_name].project_status == 1}
												{$post_project[project_name].time_remaining} left for bidding!										
											{elseif $post_project[project_name].project_status == 2}
												Task Awarded to {$post_project[project_name].project_post_to}
												<div class="clear"></div>
												Time Left To Accept: {$post_project[project_name].time_remaining}
											{elseif $post_project[project_name].project_status == 3}
												Task Accepted and Underway
											{elseif $post_project[project_name].project_status == 4}
												Task Canceled bt Task Owner
											{elseif $post_project[project_name].project_status == 5}
												Task Marked Completed
											{elseif $post_project[project_name].project_status == 6}
												Task Completed
											{elseif $post_project[project_name].project_status == 7}
												Task Failed				
											{/if}												
											</div>
											
											<div class="right button-no" style="margin-right:5px;">
											<a href="task_{$post_project[project_name].id}_{$post_project[project_name].clear_title}.html" class="footerlinkcommon2">Manage This Task</a>
											</div>
										</div>
									<div class="clear"></div>	
								   </div>
							   
								{/section}
					<div><ul class="paginator">{$Page_Link}</ul></div>			

					{else}
					<div>{$lang.Text4}</strong></div>	  
					{/if}

				</div>
 				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
	<br/><br />
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">
					Your Unpublished Task For {$citycurrent}					
					</label>
				</div>
				</div>			
				<div class="clear"></div>
				{if $StagedLoop > 0}
				<div class="message" style="text-align:center;padding:20px;">Your unpublished Task will expire within <strong>48 HOURS</strong> of when they were submitted. Please click on a task link to begin the publishing process. You need to have sufficient funds in your Task Sonic Wallet to publish a task.</div>					
				<div class="clear"></div>
				{/if}				
				<div class="body_shim">
					{if $StagedLoop > 0}
								{section name=staged_name loop=$StagedLoop}
									<div class="{cycle values='list_A, list_B'}">
									<div class="row column_format">
									<span class="row_title"><strong><a href="staged_task_{$staged_task[staged_name].id}_{$staged_task[staged_name].clear_title}.html" class="footerlinkcommon2">{$staged_task[staged_name].project_Title|stripslashes}</a></strong></span><span style="float:right;margin-right:10px;">Posted: {$staged_task[staged_name].project_posted_date}</span>
									</div>
									<div class="clear"></div>
								   </div>
							   
								{/section}		
					{else}
					<div>No unpublished tasks found</strong></div>	  
					{/if}

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