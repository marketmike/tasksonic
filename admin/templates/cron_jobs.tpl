		<div class="title-links" style="width:930px;">
		<div class="form_page_text" style="text-align:center;">
			<label for="login-email-address">
			Cron Jobs Configuration					
			</label>
		</div>
		</div>
		<div class="clear"></div>
		<div class="content_padder">
		<h1>Cron Jobs Configuration	</h1>
		<strong>Windows Task Scheduler Using wget.exe</strong> <br />
		<strong>Program Script: </strong>C:\inetpub\wget\wget.exe<br />
		<strong>Arguements: </strong>-O - -q -t 1 http://www.tasksonic.com/cronjobs/expire_special_user.php<br />
		<strong>Start In: </strong>C:\inetpub\wget<br /><br />
		<h1>Task Status Related</h1>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/bid_ending_notifications.php" target="blank">Bid Ending Notifications (Task Status 1) [Notification]</a></div><div class="col_right">Every 30 Mins</div>
		<div class="clear"></div>
		<div class="note">Dependant on timeframe selected for bidding and completion date, this process sends a series of notifications at intervals of 2 days, 1 day, 3 hours, 1 hour, and expired to Task Owner for tasks in status 1. </div>
		</div>
		<div class="clearwspace"></div>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/awarded_bidding_expiring_notifications.php" target="blank">Awarded - Not Accepted - Bidding Expiring (Task Status 2) [Notification]</a></div><div class="col_right">Every 30 Mins</div>
		<div class="clear"></div>
		<div class="note">Dependant on timeframe selected for bidding and completion date, this process sends a series of notifications at intervals of 2 days, 1 day, 3 hours, 1 hour, and expired to Task Owner for tasks in status 2. </div>		
		</div>
		<div class="clearwspace"></div>		
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/awarded_completion_date_near_notifications.php" target="blank">Awarded/Accepted - Completion Date Nearing (Task Status 3) [Notification]</a></div><div class="col_right">Every Hour</div>
		<div class="clear"></div>
		<div class="note">Dependant on timeframe selected for bidding and completion date, this process sends a series of notifications at intervals of 2 days, 1 day, 3 hours, 1 hour, and expired to Task Owner for tasks in status 3. </div>		
		</div>
		<div class="clearwspace"></div>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/marked_complete_payment_due_notifications.php" target="blank">Marked Complete - Payment Due (Task Status 5) [Notification]</a></div><div class="col_right">Run Once Daily</div>
		<div class="clear"></div>
		<div class="note">Dependant on timeframe selected for bidding and completion date, this process sends a series of notifications at intervals of 2 days, 1 day, 3 hours, 1 hour, and expired to Task Owner for tasks in status 4. </div>		
		</div>
		<div class="clearwspace"></div>
		<h1>Subscribed Notifications</h1>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/last_7_days_tasks_send.php" target="blank">Latest Tasks (Last 7 Days) Send [Notification] to those subscribed</a></div><div class="col_right">Run Once Daily</div>
		<div class="clear"></div>
		<div class="note">Sends users who have subscibed to New Posted Task updates an email with new tasks posted in the last seven days.</div>		
		</div>
		<div class="clearwspace"></div>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/send_all_tasks.php" target="blank">Send All Tasks - Sends Latest Task List to Subscribed Users - Task Posted in Last 24 Hours</a></div><div class="col_right">Run Once Daily</div>
		<div class="clear"></div>
		<div class="note">Sends a daily list to users subscribing to new task notifications.</div>		
		</div>
		<div class="clearwspace"></div>		
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/send_task_match_interest.php" target="blank">Send Tasks Daily To Those Subscribed to receive task that match their interest</a></div><div class="col_right">Run Once Daily</div>
		<div class="clear"></div>
		<div class="note">Sends a daily notification with tasks matching the users interest if they have subscribed.</div>		
		</div>		
		<h1>Membership</h1>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/expire_special_user.php" target="blank">Expire Special User Privledges  when 30 days has passed [Notification]</a></div><div class="col_right">Run Once Daily</div>
		<div class="clear"></div>
		<div class="note">Used to expire special user priviledges 30 days after the user joins or the privledge is added by admin.</div>			
		</div>
		<div class="clearwspace"></div>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/renew_membership.php" target="blank">Notify VIP members that subscription has expired [Notification]</a></div><div class="col_right">Run Once Daily</div>
		<div class="clear"></div>
		<div class="note">Used to notify VIP users that their VIP subscription has expired and they need to renew.</div>			
		</div>
		<div class="clearwspace"></div>	
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/rss.php" target="blank">RSS</a></div><div class="col_right">Every Hour</div>
		</div>
		<div class="clearwspace"></div>		
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/block_visible_user.php" target="blank">Block Visible User</a></div><div class="col_right">Notes</div>
		</div>
		<div class="clearwspace"></div>

		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/unde.php" target="blank">Undelete</a></div><div class="col_right">Notes</div>
		</div>
		<div class="clearwspace"></div>
		<h1>Utilities</h1>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/send_mail_from_pipeline.php" target="blank">Send Mail From Pipeline</a></div><div class="col_right">Every 15 Mins</div>
		<div class="clear"></div>
		<div class="note">Used to manage email pipeline forbulk subsciption sends - limit 100 per run</div>		
		</div>
		<div class="clearwspace"></div>
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/update_cat_count.php" target="blank">Update the category count for Open Tasks</a></div><div class="col_right">Every Hour</div>
		<div class="clear"></div>
		<div class="note">Updates the category count for tasks.</div>			
		</div>
		<div class="clearwspace"></div>		
		<div class="stats_wrapper">
		<div class="col_left"><a href="{$Site_URL}/cronjobs/delete_staged_task_48_hour.php" target="blank">Delete Staged Task After 48 hours</a></div><div class="col_right">Run Once Daily</div>
		<div class="clear"></div>
		<div class="note">Used to delete staged task after 48 hours if the user does not publish. If published, the staged version is deleted automatically by the publish script</div>		
		</div>
		<div class="clearwspace"></div>	
		<div class="stats_wrapper">
		<div class="col_left">Open</div><div class="col_right">Notes</div>
		</div>
		<div class="clearwspace"></div>
		<div class="stats_wrapper">
		<div class="col_left">Open</div><div class="col_right">Notes</div>
		</div>
		<div class="clearwspace"></div>			
		</div>		
