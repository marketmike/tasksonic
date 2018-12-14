<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$page_name}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Welcome {$username}, This is your first time logging in!					
						</label>
					</div>
					</div>
					<div class="clear"></div>
					<div class="field">
					Thank you for recently joining Task Sonic. While we are sure you are eager to get started, please be sure to read the below information on "Getting Started".
					{if $taskowner_profile || $tasker_profile}
					You will also want to update your {$taskowner_profile}{if $taskowner_profile && $tasker_profile} and {/if}{$tasker_profile}. Completed profiles increase your chances of success whether you are posting tasks or bidding on them.
					{/if}
					<div class="clear"></div>	
					</div>
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Getting Started!</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">{$page_content}</div>							
				<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Current Task Sonic Fees</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<h3>Posting A Task</h3>
					To "Post A Task", a <strong>${$posting_fee}</strong> refundable fee is charged for each posted Task to minimize fake Tasks from being posted by malicious users. Unless a Task Owner cancels the task, the fee is refunded when the task is awarded/accepted or the task fails due to no bids or a suitable bid not being received.<br/><br /> 
					<h3>Task Sonic Commissions</h3>
					When a task is awarded to a Task Sonic Tasker and they accept the task, the following fees are applied and withdrawn from the users Task Sonic Wallets as payment to Task Sonic for services rendered. Please see Terms & Conditions for a description of services provided by Task Sonic.<br /><br />
					<blockquote>
					<strong>Task Owner: </strong>{$commission_task_owner}% of awarded bid - min fee ${$min_commission_task_owner}<br />
					<strong>Tasker: </strong>{$commission_tasker}% of awarded bid - min fee ${$min_commission_tasker}
					</blockquote>
					<br/><center>(min fee applied when commission less than)</center>
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
			
