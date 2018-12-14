<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1>Task Awarding Can Not Be Accepted</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">Task Awarding Can Not Be Accepted</label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="message" style="text-align:left;padding:10px;margin-bottom:50px">
				Dear {$tasker_link},
				<br><br>
				Your recent attempt to accept the awarding of the Task Sonic Task "{$task_name}" by Task Sonic Task Owner {$task_owner} was unsuccessful due to the following reason(s).
				<br /><br />

				{if $tasker_flag == 0}
				<br><br>
				<b>Tasker Action Required</b>
				<br><br>
				You do not have enough money in your Task Sonic Wallet to cover commission fees. Please make sure your wallet has at least ${$short} in it in order for you to accept the awarding. Please be certain to private message {$task_owner} once you have deposited the required amount to minimize the likeliness they will re-award. The Task Owner {$task_owner} has been notified as well and has been asked to contact you to resolve so you can accept the awarding.
				<div class="clear"></div><br />
				<center><a href="make-deposit.html">Make A Deposit</a></center>
				{/if}

				{if $tasker_owner_flag == 0}
				<br>
				<b>Task Owner Action Required</b>
				<br><br>
				The Task Sonic Task Owner {$task_owner} who awarded the task to you does not appear to have enough money in their Task Sonic Wallet to cover commissions for the task. Therefore you are unable to accept the task awarding. We have notified them by email and asked them to make the necessary deposit to their Task Sonic Wallet.<br /><br />You may wish to private message them as well as a reminder. You may also choose to not accept this task at this time if you feel it necessary to do so. Please re-visit the tasks detail page to either accept the task once the Task Owner has notified you that they have made the deposit or to decline if you are no longer interested in performing the task.
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