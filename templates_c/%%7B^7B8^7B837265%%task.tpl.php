<?php /* Smarty version 2.6.26, created on 2012-08-14 22:10:39
         compiled from task.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'task.tpl', 85, false),array('modifier', 'wordwrap', 'task.tpl', 221, false),array('modifier', 'intval', 'task.tpl', 301, false),array('modifier', 'urlencode', 'task.tpl', 308, false),array('modifier', 'date_format', 'task.tpl', 436, false),array('function', 'cycle', 'task.tpl', 412, false),)), $this); ?>
<!--template used on task.php shortlist.php and decline.php-->
<?php 
// select the timezone for your countdown
$timezone = 'US/Eastern';
//$timezone = 'US/Pacific';
//$timezone = 'US/Central';
$client_timezone = putenv("TZ=$timezone");
 ?>		
<?php echo '
<SCRIPT language="JavaScript">
function countdown_clock(year, month, day, hour, minute, format)
         {
         //I chose a div as the container for the timer, but
         //it can be an input tag inside a form, or anything
         //who\'s displayed content can be changed through
         //client-side scripting.
         html_code = \'<div id="countdown"></div>\';
         
         document.write(html_code);
         
         countdown(year, month, day, hour, minute, format);                
         }
         
function countdown(year, month, day, hour, minute, format)
         {
         Today = new Date();
         Todays_Year = Today.getFullYear() - 2000;
         Todays_Month = Today.getMonth();                  
         
         //Convert both today\'s date and the target date into miliseconds.                           
         Todays_Date = (new Date(Todays_Year, Todays_Month, Today.getDate(), 
                                 Today.getHours(), Today.getMinutes(), Today.getSeconds())).getTime();                                 
         Target_Date = (new Date(year, month - 1, day, hour, minute, 00)).getTime();                  
         
         //Find their difference, and convert that into seconds.                  
         Time_Left = Math.round((Target_Date - Todays_Date) / 1000);
         
         if(Time_Left < 0)
            Time_Left = 0;
         
         var innerHTML = \'\';
         
         switch(format)
               {
               case 0:
                    //The simplest way to display the time left.
                    innerHTML = Time_Left + \' seconds\';
                    break;
               case 1:
                    //More datailed.
                    days = Math.floor(Time_Left / (60 * 60 * 24));
                    Time_Left %= (60 * 60 * 24);
                    hours = Math.floor(Time_Left / (60 * 60));
                    Time_Left %= (60 * 60);
                    minutes = Math.floor(Time_Left / 60);
                    Time_Left %= 60;
                    seconds = Time_Left;
                    
                    dps = \'s\'; hps = \'s\'; mps = \'s\'; sps = \'s\';
                    //ps is short for plural suffix.
                    if(days == 1) dps =\'\';
                    if(hours == 1) hps =\'\';
                    if(minutes == 1) mps =\'\';
                    if(seconds == 1) sps =\'\';
                    
                    innerHTML = days + \' day\' + dps + \' \';
                    innerHTML += hours + \' hour\' + hps + \' \';
                    innerHTML += minutes + \' minute\' + mps + \' and \';
                    innerHTML += seconds + \' second\' + sps;
					innerHTML += \' left for bidding!\';
                    break;
               default: 
                    innerHTML = Time_Left + \' seconds\';
               }                   
                    
            document.getElementById(\'countdown\').innerHTML = innerHTML;     
               
         //Recursive call, keeps the clock ticking.
         setTimeout(\'countdown(\' + year + \',\' + month + \',\' + day + \',\' + hour + \',\' + minute + \',\' + format + \');\', 1000);
         }
</SCRIPT>
'; ?>
 
 <div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['project_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</h1>
	<h5>posted on <?php echo $this->_tpl_vars['project_posted_date']; ?>
 by <?php echo $this->_tpl_vars['project_posted_by']; ?>
</h5>
	<h3 style="color:red;"><strong><center>
		<?php if ($this->_tpl_vars['project_status'] == 2): ?>
			Task Awarded to <?php echo $this->_tpl_vars['project_post_to']; ?>

		<?php elseif ($this->_tpl_vars['project_status'] == 3): ?>
			Task Accepted and Underway
		<?php elseif ($this->_tpl_vars['project_status'] == 4): ?>
			Task Canceled bt Task Owner
		<?php elseif ($this->_tpl_vars['project_status'] == 5): ?>
			Task Marked Completed By Tasker 
		<?php elseif ($this->_tpl_vars['project_status'] == 6): ?>
			Task Completed
		<?php elseif ($this->_tpl_vars['project_status'] == 7): ?>
			Task Failed		
		<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 0): ?>
			<?php echo $this->_tpl_vars['lang']['task_Closed_Bidding']; ?>

		<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 1): ?>
			<script type="text/javascript">countdown_clock(<?php echo $this->_tpl_vars['year']; ?>
, <?php echo $this->_tpl_vars['month']; ?>
, <?php echo $this->_tpl_vars['day']; ?>
, <?php echo $this->_tpl_vars['hour']; ?>
, <?php echo $this->_tpl_vars['min']; ?>
, 1);</script>		
		<?php endif; ?>
	</center></strong>
	</h3>
	<?php if ($this->_tpl_vars['bid_type'] == 'all'): ?>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<?php if ($this->_tpl_vars['project_status'] == 5 && $_SESSION['User_Id'] == $this->_tpl_vars['user_id']): ?><div style="background:#FFFF66;padding:5px;text-align:center;height:auto;font-weight:bold;"><?php if ($this->_tpl_vars['tasker_reimburse'] > 0): ?>The Tasker has marked the task completed. Please create an escrow payment for the amount of $<?php echo $this->_tpl_vars['tasker_reimburse']; ?>
 to cover additional charges incurred by the tasker, e.g. paying for dog food, dry cleaning pickup. Details on these charges were highlighted in the email you received from the Tasker when they marked the Task as completed. You have three days to create the remaining escrow payment and release all escrow payments to the Tasker or to dispute task completion or the additional charges should you disagree with their assessment.<?php else: ?>The Tasker has marked the task completed. You have three days to release the escrow payment to the Tasker or to dispute task completion should you disagree with their assessment of the task.<?php endif; ?></div><?php endif; ?>
			 <form name="frmproject" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address"><?php echo ((is_array($_tmp=$this->_tpl_vars['project_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</label>
					</div>
					</div>					
				<div class="clear"></div>
					<div class="body_shim">
						<div class="title" style="margin-top:10px;margin:5px">
							<div class="f-right" style="text-align:center">
							<div class="clear"></div>
								<?php if ($_SESSION['User_Id'] != $this->_tpl_vars['user_id']): ?>
									<div class="button-no">
									<?php if ($this->_tpl_vars['project_status'] == 2): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Awarded
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 3): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Accepted
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 4): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Canceled
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 5): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Tasker Done
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 6): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Completed
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 7): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 0): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 1): ?>
											<?php if ($this->_tpl_vars['task_owner_vip'] != 1 && $this->_tpl_vars['project_allow_bid'] == 1): ?>
												<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
												VIP BIDS ONLY
												</a>												
											<?php elseif ($this->_tpl_vars['Tasker']): ?>
												<a href="place_bid_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html"  onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');" style='text-decoration:none;' class="negative">
												Update Bid
												</a>
											<?php else: ?>
												<a href="place_bid_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html"  onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');" style='text-decoration:none;' class="negative">
												Place Bid
												</a>											
											<?php endif; ?>
									<?php endif; ?>									
									</div>
								<?php else: ?>
									<div class="button-no">
									<?php if ($this->_tpl_vars['project_status'] == 2): ?>
										<a href="reaward_task.php?id=<?php echo $this->_tpl_vars['project_id']; ?>
"  style='text-decoration:none;' class="negative">
										Re-Award
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 3): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Accepted
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 4): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Canceled
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 5): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Tasker Done
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 6): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Completed
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 7): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 0): ?>
										<a href="#"  style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
										Failed
										</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 1): ?>
										<?php if (! $_SESSION['User_Name']): ?>
											<a onclick="popup('popUpDiv')" href=#>
											Award task
											</a>
										<?php else: ?>
											<?php if ($this->_tpl_vars['Loop'] > 0): ?>										
											<a href="award_task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html"   style='text-decoration:none;' class="negative">
											Award task
											</a>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php if ($this->_tpl_vars['premium_project'] == 1): ?>
							<div class="clear"></div>
							<div style="margin:0 auto;text-align:center"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
premium_large.png" border="0" style="vertical-align:middle" /></div>
							<div class="clear"></div>
							<?php endif; ?>								
							</div>
						<div style="width:410px;"><strong>Task Owner's Budget:</strong> <?php echo $this->_tpl_vars['project_budget']; ?>
<br /><strong>Task Details:</strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['project_description'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 1000, "\n", true) : smarty_modifier_wordwrap($_tmp, 1000, "\n", true)); ?>
</div>
						</div><!-- /award button -->
						<div class="clear"></div>
						<div class="deadlines_wrapper"><div class="deadlines-left"><strong>Confirm Tasker by:</strong><br /><?php echo $this->_tpl_vars['project_days_left']; ?>
 at <?php echo $this->_tpl_vars['bidding_time']; ?>
</div> <div class="deadlines-right"><strong>Complete Task by:</strong><br /><?php echo $this->_tpl_vars['completed_by']; ?>
 at <?php echo $this->_tpl_vars['completed_time']; ?>
</div><div class="clear"></div></div>					
						<div class="clear"></div>
						</div><!--end body shim--> 
						<div class="clear"></div>


					<?php if ($this->_tpl_vars['additionalcnt'] > 0): ?>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">	
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Additional_Information']; ?>
</label>
					</div>
					</div>
					
					<div class="clear"></div>
										
					<div class="field">
					<?php unset($this->_sections['addinfo']);
$this->_sections['addinfo']['name'] = 'addinfo';
$this->_sections['addinfo']['loop'] = is_array($_loop=$this->_tpl_vars['additionalcnt']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['addinfo']['show'] = true;
$this->_sections['addinfo']['max'] = $this->_sections['addinfo']['loop'];
$this->_sections['addinfo']['step'] = 1;
$this->_sections['addinfo']['start'] = $this->_sections['addinfo']['step'] > 0 ? 0 : $this->_sections['addinfo']['loop']-1;
if ($this->_sections['addinfo']['show']) {
    $this->_sections['addinfo']['total'] = $this->_sections['addinfo']['loop'];
    if ($this->_sections['addinfo']['total'] == 0)
        $this->_sections['addinfo']['show'] = false;
} else
    $this->_sections['addinfo']['total'] = 0;
if ($this->_sections['addinfo']['show']):

            for ($this->_sections['addinfo']['index'] = $this->_sections['addinfo']['start'], $this->_sections['addinfo']['iteration'] = 1;
                 $this->_sections['addinfo']['iteration'] <= $this->_sections['addinfo']['total'];
                 $this->_sections['addinfo']['index'] += $this->_sections['addinfo']['step'], $this->_sections['addinfo']['iteration']++):
$this->_sections['addinfo']['rownum'] = $this->_sections['addinfo']['iteration'];
$this->_sections['addinfo']['index_prev'] = $this->_sections['addinfo']['index'] - $this->_sections['addinfo']['step'];
$this->_sections['addinfo']['index_next'] = $this->_sections['addinfo']['index'] + $this->_sections['addinfo']['step'];
$this->_sections['addinfo']['first']      = ($this->_sections['addinfo']['iteration'] == 1);
$this->_sections['addinfo']['last']       = ($this->_sections['addinfo']['iteration'] == $this->_sections['addinfo']['total']);
?>
					<div><strong><?php echo $this->_tpl_vars['lang']['Submitted_On']; ?>
</strong>&nbsp;<?php echo $this->_tpl_vars['arr_additional'][$this->_sections['addinfo']['index']]['Date_add']; ?>
</div>
					<?php if ($this->_tpl_vars['arr_additional'][$this->_sections['addinfo']['index']]['filename']): ?>
					<div class="clear"></div>
					<div><strong><?php echo $this->_tpl_vars['lang']['Additional_File']; ?>
 :</strong>&nbsp;<a href="Javascript: Download_File('<?php echo $this->_tpl_vars['arr_additional'][$this->_sections['addinfo']['index']]['filename1']; ?>
','project');" class="footerlinkcommon2"><?php echo $this->_tpl_vars['arr_additional'][$this->_sections['addinfo']['index']]['filename']; ?>
</a></div>
					<?php endif; ?>
					<div class="clear"></div>
					<div><?php echo $this->_tpl_vars['arr_additional'][$this->_sections['addinfo']['index']]['Desc']; ?>
</div>
					<?php endfor; endif; ?>
					<div class="clear"></div>
					</div>
					<div class="clear"></div>															
					<?php endif; ?>												
							
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Task Owner Information</label>
						</div>
						</div>
						
						<div class="clear"></div>
						<div class="field">
							<span class="f-right">						
							<?php if (! $_SESSION['User_Name']): ?>
							<div class="buttons">
							<a onclick="popup('popUpDiv')" href=#>Message</a>
							</div>
							<?php elseif ($this->_tpl_vars['task_owner_vip'] != 1 && $this->_tpl_vars['project_allow_bid'] == 1): ?>

							<?php else: ?>
							<?php if ($_SESSION['User_Id'] != $this->_tpl_vars['user_id']): ?><div class="buttons"><a href="#" class="footerlinkcommon2" <?php if ($this->_tpl_vars['bid_status'] == 0 && $this->_tpl_vars['project_post_to'] != $_SESSION['User_Name']): ?>onclick="return(false);" disabled="disabled" <?php else: ?>onclick="JavaScript: popupWindowURL('private_message.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&id=1&pop_up=true','','600','500','','true','true');" <?php endif; ?>>Message</a></div><?php endif; ?>
							<?php endif; ?>
							<div class="clear"></div>
							<?php if ($this->_tpl_vars['fb_verfy'] == 1 || $this->_tpl_vars['email_verfy'] == 1 || $this->_tpl_vars['address_verfy'] == 1 || $this->_tpl_vars['human_verfy'] == 1 || $this->_tpl_vars['background_verfy'] == 1): ?>
							<div style="right;line-height:25px;font-weight:bold;">
							<span style="float:left;margin-right:5px;height:25px">Trusted and Verified</span>
							<div class="clear"></div>
							<?php if ($this->_tpl_vars['fb_verfy'] == 1): ?><img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" /><?php endif; ?>
							<?php if ($this->_tpl_vars['email_verfy'] == 1): ?><img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" /><?php endif; ?>							
							<?php if ($this->_tpl_vars['address_verfy'] == 1): ?><img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" /><?php endif; ?>
							<?php if ($this->_tpl_vars['human_verfy'] == 1): ?><img src="images/phone--verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" /><?php endif; ?>
							<?php if ($this->_tpl_vars['background_verfy'] == 1): ?><img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" /><?php endif; ?>	
							<div class="clear"></div>
							</div>
							<?php endif; ?>							
							</span>						
								<?php if ($this->_tpl_vars['membership_id'] != 0): ?>
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
vip_large.png" border="0"/>
								<div class="clear"></div>
								<?php endif; ?>
								<strong>Task Owner: </strong>
								<?php if (! $_SESSION['User_Name']): ?>
								<a onclick="popup('popUpDiv')" href=#><?php echo $this->_tpl_vars['project_posted_by']; ?>
</a>
								<?php else: ?>
								<a href="task_owner_profile_<?php echo $this->_tpl_vars['project_posted_by']; ?>
.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['project_posted_by']; ?>
</a>
								<?php endif; ?>
								<div><strong>Location : </strong><?php if ($this->_tpl_vars['project_post_to'] == $_SESSION['User_Name']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['project_location'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 1000, "\n", true) : smarty_modifier_wordwrap($_tmp, 1000, "\n", true)); ?>
<br /><?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['project_city'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 1000, "\n", true) : smarty_modifier_wordwrap($_tmp, 1000, "\n", true)); ?>
</div>						
								<strong>Feedback/Rating: </strong>									
								<?php if ($this->_tpl_vars['ave_rating'] == 0.00): ?>
								(<?php echo $this->_tpl_vars['lang']['NO_Feddback']; ?>
)
								<?php else: ?>	 
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['ave_rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120">&nbsp;&nbsp;&nbsp;<?php if (! $_SESSION['User_Name']): ?><a onclick="popup('popUpDiv')" href="#" class="footerlink">(<?php echo $this->_tpl_vars['lang']['Reviews']; ?>
)</a><?php else: ?><a href="<?php echo $this->_tpl_vars['project_posted_by']; ?>
_task_owner_feedback.html" class="footerlink">(<?php echo $this->_tpl_vars['lang']['Reviews']; ?>
)</a><?php endif; ?>
								<div class="clear"></div>
								<?php endif; ?>
								<div class="share_btns" style="margin-top:5px;width:150px;border:1px solid #ccc;background-color:#efeeee;padding-right:5px;padding-left:5px;">
								<strong>Share With Friends</strong>
								<div class="clear"></div>
								<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $this->_tpl_vars['title']; ?>
&amp;p[summary]=<?php echo $this->_tpl_vars['summary']; ?>
&amp;p[url]=<?php echo $this->_tpl_vars['url']; ?>
%3Finvitation_id=<?php echo $_SESSION['User_Id']; ?>
&amp;&p[images][0]=<?php echo $this->_tpl_vars['image']; ?>
', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><img src="images/facebook.png" width="30" /></a>&nbsp;&nbsp;
								<a onClick="window.open('http://twitter.com/share?url=<?php echo ((is_array($_tmp=$this->_tpl_vars['Site_URL'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
/task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
.html%3Finvitation_id=<?php echo $_SESSION['User_Id']; ?>
&text=Check out the task - <?php echo ((is_array($_tmp=$this->_tpl_vars['project_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
 - on <?php echo $this->_tpl_vars['Site_URL']; ?>
&related=tasksonic', 'twtsharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">				
								<img src="images/twitter.png" width="30" /></a>&nbsp;&nbsp;
								<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/share_earn.html">
								<img src="images/emailicon.png" width="30" /></a>&nbsp;
								<div class="clear"></div>
								</div>							
						<div class="clear"></div>
						</div>	
						
						<?php if ($this->_tpl_vars['project_file_1'] != '' || $this->_tpl_vars['project_file_2'] != '' || $this->_tpl_vars['project_file_3'] != ''): ?>
						<div class="clear"></div>
						<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Related_Files']; ?>
</label>
						</div>
						</div>
						
						<div class="clear"></div>
						<div class="field">
						<?php if ($this->_tpl_vars['project_file_1']): ?>
							<a href="Javascript: Download_File('<?php echo $this->_tpl_vars['download_project_file_1']; ?>
','project');" class="footerlinkcommon2"><?php echo $this->_tpl_vars['project_file_1']; ?>
</a>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['project_file_2']): ?>
						<BR>
							<a href="Javascript: Download_File('<?php echo $this->_tpl_vars['download_project_file_2']; ?>
','project');" class="footerlinkcommon2"><?php echo $this->_tpl_vars['project_file_2']; ?>
</a>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['project_file_3']): ?>
						<BR>
						  <a href="Javascript: Download_File('<?php echo $this->_tpl_vars['download_project_file_3']; ?>
','project');" class="footerlinkcommon2"><?php echo $this->_tpl_vars['project_file_3']; ?>
</a>
						<?php endif; ?>
						<div class="clear"></div>
						</div>
						<?php endif; ?>						
						<div class="clear"></div>
						<input type="hidden" name="Action" />
						<input type="hidden" name="project_id" value="<?php echo $this->_tpl_vars['project_id']; ?>
" />
						<input type="hidden" name="status" />
						<input type="hidden" name="bid_id" />
					<div class="clear"></div>
					<div class="body_shim">					
					<div class="bid_reminder"><strong><?php echo $this->_tpl_vars['lang']['Reminder']; ?>
</strong>:&nbsp;<?php echo $this->_tpl_vars['lang']['Bid_Note1']; ?>
</div>					
					<div class="clear"></div>					
					</div><!--end body shim-->					
					<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;font-size:14px">
						<label for="login-email-address">
						<?php if (! $_SESSION['User_Name']): ?><a onclick="popup('popUpDiv')" href="#" class="taskfootermenuelink"><strong><?php echo $this->_tpl_vars['lang']['Posted_project']; ?>
</strong></a><?php else: ?><a href="copy_task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="taskfootermenuelink" onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');"><strong><?php echo $this->_tpl_vars['lang']['Posted_project']; ?>
</strong></a><?php endif; ?>
						| <?php if (! $_SESSION['User_Name']): ?><a onclick="popup('popUpDiv')" href="#" class="taskfootermenuelink"><strong><?php echo $this->_tpl_vars['lang']['SEND_TASK']; ?>
</strong></a><?php else: ?><a href="#bid_list" onclick="JavaScript: popupWindowURL('share_task.php?task_id=<?php echo $this->_tpl_vars['project_id']; ?>
&pop_up=true','','650','500','','true','true');" class="taskfootermenuelink"><strong><?php echo $this->_tpl_vars['lang']['SEND_TASK']; ?>
</strong></a><?php endif; ?> 
						|  <?php if (! $_SESSION['User_Name']): ?><a onclick="popup('popUpDiv')" href="#" class="taskfootermenuelink"><strong><?php echo $this->_tpl_vars['lang']['Message_Board']; ?>
(<?php echo $this->_tpl_vars['msgboardcnt']; ?>
)</strong></a><?php else: ?><a href="#bid_list" onclick="JavaScript: popupWindowURL('message_board.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&project_creator=<?php echo $this->_tpl_vars['project_posted_by']; ?>
&id=1&pop_up=true','','645','500','','true','true');" class="taskfootermenuelink"><strong><?php echo $this->_tpl_vars['lang']['Message_Board']; ?>
(<?php echo $this->_tpl_vars['msgboardcnt']; ?>
)</strong></a><?php endif; ?> 
						<?php if ($this->_tpl_vars['project_posted_by'] == $_SESSION['User_Name']): ?>|  <a href="republish_task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="taskfootermenuelink"><strong><?php echo $this->_tpl_vars['lang']['Republish_project']; ?>
</strong></a><?php endif; ?>						
						</label>
					</div>
					</div>					
				<div class="clear"></div>				
			<div id="more_link"></div>
		</form>
		</div>
	</div>
	<div class="page_bottom"></div>
	<div class="clear" style="height:40px;">&nbsp;</div>
	<?php endif; ?>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['bid_type']; ?>
 Bids On "<?php echo ((is_array($_tmp=$this->_tpl_vars['project_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</label>
						</div>
					</div>			
				<div class="clear"></div>
					<?php if ($this->_tpl_vars['project_status'] == 2): ?>
						<div class="bid_closed">Task Awarded to <?php echo $this->_tpl_vars['project_post_to']; ?>
</div>
						<div class="clear"></div>
					<?php elseif ($this->_tpl_vars['project_status'] == 3): ?>
						<div class="bid_closed">Task Accepted and Underway</div>
						<div class="clear"></div>
					<?php elseif ($this->_tpl_vars['project_status'] == 4): ?>
						<div class="bid_closed">Task Canceled bt Task Owner</div>
						<div class="clear"></div>
					<?php elseif ($this->_tpl_vars['project_status'] == 5): ?>
						<div class="bid_closed">Task Marked Completed By Tasker</div>
						<div class="clear"></div>
					<?php elseif ($this->_tpl_vars['project_status'] == 6): ?>
						<div class="bid_closed">Task Completed</div>
						<div class="clear"></div>
					<?php elseif ($this->_tpl_vars['project_status'] == 7): ?>
						<div class="bid_closed">Task Failed</div>
						<div class="clear"></div>		
					<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 0): ?>
						<div class="bid_closed"><?php echo $this->_tpl_vars['lang']['task_Closed_Bidding']; ?>
 and received (<?php echo $this->_tpl_vars['count']; ?>
) bids</div>
						<div class="clear"></div>
					<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 1): ?>
						<div class="bid_closed">Bidding Underway - (<?php echo $this->_tpl_vars['count']; ?>
) bids received</div>
						<div class="clear"></div>		
					<?php endif; ?>				
	
					<!-- All Bids Shown to Task Owner But Current User Can Only See Their Bid -->														
					<?php if ($_SESSION['User_Id'] == $this->_tpl_vars['user_id']): ?> <!--If the task owner is viewing-->
						<?php unset($this->_sections['bid']);
$this->_sections['bid']['name'] = 'bid';
$this->_sections['bid']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bid']['show'] = true;
$this->_sections['bid']['max'] = $this->_sections['bid']['loop'];
$this->_sections['bid']['step'] = 1;
$this->_sections['bid']['start'] = $this->_sections['bid']['step'] > 0 ? 0 : $this->_sections['bid']['loop']-1;
if ($this->_sections['bid']['show']) {
    $this->_sections['bid']['total'] = $this->_sections['bid']['loop'];
    if ($this->_sections['bid']['total'] == 0)
        $this->_sections['bid']['show'] = false;
} else
    $this->_sections['bid']['total'] = 0;
if ($this->_sections['bid']['show']):

            for ($this->_sections['bid']['index'] = $this->_sections['bid']['start'], $this->_sections['bid']['iteration'] = 1;
                 $this->_sections['bid']['iteration'] <= $this->_sections['bid']['total'];
                 $this->_sections['bid']['index'] += $this->_sections['bid']['step'], $this->_sections['bid']['iteration']++):
$this->_sections['bid']['rownum'] = $this->_sections['bid']['iteration'];
$this->_sections['bid']['index_prev'] = $this->_sections['bid']['index'] - $this->_sections['bid']['step'];
$this->_sections['bid']['index_next'] = $this->_sections['bid']['index'] + $this->_sections['bid']['step'];
$this->_sections['bid']['first']      = ($this->_sections['bid']['iteration'] == 1);
$this->_sections['bid']['last']       = ($this->_sections['bid']['iteration'] == $this->_sections['bid']['total']);
?>
						<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Premium_Member'] == 1): ?>
						<div id="all_bids"  class="premium_task" >
						<?php else: ?>
						<div id="all_bids" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
						<?php endif; ?>
							<div class="img_holder">
								<a href="tasker_profile_<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']; ?>
.html"  class="link"><?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']; ?>
</a>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['fb_profile_img']): ?>
								<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['fb_profile_img']; ?>

								<?php elseif ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['buyer_logo']): ?>
								<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['buyer_logo']; ?>
" height="70" width="70" class="profile_img"/>
								<?php else: ?>
								<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_default.jpg" height="70" width="70" class="profile_img"/>
								<?php endif; ?>
								<div class="clear"></div>
								<div class="share_btns" style="margin-top:5px;">
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Premium_Member'] == 1): ?>
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
vip_small.png" border="0"/>
								<?php endif; ?>			
								<div class="clear"></div>
								</div>
							<div class="clear"></div>			
							<div class="premium_urgent">
							<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Location']; ?>

							<div class="clear"></div>
							</div>		
							</div>
							<div class="body_text"><span class="title"><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Amount']; ?>
 to complete by <?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Delivery_Time']; ?>
.</span> <span>Posted on <?php echo ((is_array($_tmp=$this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Time'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</span>
							<div class="clear"></div>		
							<span class="description">
							<div class="desc_holder"><?php echo ((is_array($_tmp=$this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Desc'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 100, "\n", true) : smarty_modifier_wordwrap($_tmp, 100, "\n", true)); ?>
</div>
							<div style="background:#fff;padding-left:5px;">
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['rating'] == 0.00): ?>
								No Feedback yet
								<?php else: ?>
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120">&nbsp;<a href="<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']; ?>
_tasker_feedback.html" class="">(<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['reviews']; ?>
 reviews)</a>
								<?php endif; ?>
								<div class="clear"></div>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['fb_verfy'] == 1 || $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['email_verfy'] == 1 || $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['address_verfy'] == 1 || $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['human_verfy'] == 1 || $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['background_verfy'] == 1): ?>
								<div style="line-height:25px;font-weight:bold;">
								<span style="float:left;margin-right:5px;height:25px">Trusted and Verified:</span>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['fb_verfy'] == 1): ?><img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['email_verfy'] == 1): ?><img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" /><?php endif; ?>							
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['address_verfy'] == 1): ?><img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['human_verfy'] == 1): ?><img src="images/phone-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['background_verfy'] == 1): ?><img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" /><?php endif; ?>	
								</div>
								<div class="clear"></div>
								<?php endif; ?>
							</div>		
							</span>
							<div class="clear"></div>
							</div>
							<div class="more_button">
									<?php if ($this->_tpl_vars['project_post_to'] == $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']): ?>
									<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
winner.gif" border="0"/>
									<?php endif; ?>
									<div class="clear"></div>
									<?php if ($this->_tpl_vars['project_post_to'] == $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']): ?>
									<?php if ($this->_tpl_vars['project_status'] != 6): ?>									
									<div id="button_award"><a href="#" class="footerlinkcommon2" onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&id=1&bid_user=<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']; ?>
&pop_up=true','','645','500','','true','true');">Message</a></div>
									<?php endif; ?>
									<?php else: ?>
									<div id="button_award"><a href="#" class="footerlinkcommon2" <?php if ($this->_tpl_vars['bid_status'] == 0): ?>disabled="disabled" onclick="return(false);"<?php else: ?>onclick="JavaScript: popupWindowURL('private_message_form_user.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&id=1&bid_user=<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']; ?>
&pop_up=true','','645','500','','true','true');" <?php endif; ?>>Message</a></div>									
									<?php endif; ?>
									<div class="clear"></div>
											<div id="button_award">
											<?php if ($this->_tpl_vars['project_status'] == 1): ?>					
											<a href="award_task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html"   style='text-decoration:none;' class="negative">
											Award
											</a>										
											<?php elseif ($this->_tpl_vars['project_status'] == 2): ?>					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											<?php if ($this->_tpl_vars['project_post_to'] == $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']): ?>Winner</span><?php else: ?>Awarded<?php endif; ?>
											</a>
											<?php elseif ($this->_tpl_vars['project_status'] == 3): ?>					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
												<?php if ($this->_tpl_vars['project_post_to'] == $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']): ?>Winner</span><?php else: ?>Accepted<?php endif; ?>
											</a>
											<?php elseif ($this->_tpl_vars['project_status'] == 4): ?>					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											Closed
											</a>											
											<?php elseif ($this->_tpl_vars['project_status'] == 5): ?>					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);">
											Tasker Done
											</a>												
											<?php elseif ($this->_tpl_vars['project_status'] == 6): ?>					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											Completed
											</a>
											<?php elseif ($this->_tpl_vars['project_status'] == 7): ?>					
											<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
											Failed
											</a>												
											<?php endif; ?>						
											</div>
											<?php if ($this->_tpl_vars['project_status'] == 6 && $this->_tpl_vars['project_post_to'] == $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']): ?>
											<div id="button_award">
												<a href="rating_user.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&User_type=tasker&to=<?php echo $this->_tpl_vars['project_post_to']; ?>
"  onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');" style='text-decoration:none;' class="negative">
												Feedback
												</a>
											</div>
											<?php endif; ?>											
									<div class="clear"></div>			
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Shortlist'] == 1 && $this->_tpl_vars['project_status'] == 1): ?>
								<a href="JavaScript: ToggleStatus_Click('<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['bid_id']; ?>
', '0');" class="">Add to Favorites</a>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Shortlist'] == 1 && $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Decline'] == 1 && $this->_tpl_vars['project_status'] == 1): ?>
								&nbsp;|&nbsp;
								<?php endif; ?>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Decline'] == 1 && $this->_tpl_vars['project_status'] == 1): ?>
								<a href="#bid_list" onclick="JavaScript: popupWindowURL('undecline.php?bid_id=<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['bid_id']; ?>
&provider_name=<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['User_Name']; ?>
&project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&id=1&pop_up=true','','645','450','','true','true');">Send to Declined</a>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['Bid_Decline'] == 0 && $this->_tpl_vars['project_status'] == 1): ?>
								<a href="JavaScript: ToggleStatus_Undo_Click('<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['bid_id']; ?>
', '1');" class=""><strong>Reinstate</strong></a>
								<?php endif; ?>								

							</div>
							<div class="clear"></div>
						</div>
					<div class="clear"></div>

						
					
					<?php endfor; endif; ?>	
					<!-- End if Task Owner Viewing -->			
					<?php else: ?>					
					<!-- If logged in user equals the id of a bid show bid for current logged in user-->	
					<?php if ($this->_tpl_vars['Tasker']): ?>
						<div id="all_bids" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
							<div class="img_holder">
								<a href="tasker_profile_<?php echo $this->_tpl_vars['Tasker']; ?>
.html" class="link"><?php echo $this->_tpl_vars['Tasker']; ?>
</a>
								<?php if ($this->_tpl_vars['fb_profile_img_tasker']): ?>
								<?php echo $this->_tpl_vars['fb_profile_img_tasker']; ?>

								<?php elseif ($this->_tpl_vars['buyer_logo']): ?>								
								<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_<?php echo $this->_tpl_vars['buyer_logo']; ?>
" height="70" width="70" class="profile_img"/>
								<?php else: ?>
								<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_default.jpg" height="70" width="70" class="profile_img"/>
								<?php endif; ?>
								<div class="clear"></div>
								<div class="share_btns" style="margin-top:5px;">
								<?php if ($this->_tpl_vars['Premium_Member'] == 1): ?>
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
vip_small.png" border="0"/>
								<?php endif; ?>			
								<div class="clear"></div>
								</div>
							<div class="clear"></div>			
							<div class="premium_urgent">
							<?php echo $this->_tpl_vars['Location']; ?>

							<div class="clear"></div>
							</div>		
							</div>
							<div class="body_text"><?php if ($this->_tpl_vars['Bid_Decline'] == 0): ?><center><span style="color:red;font-weight:bold;">Your Bid Has Been Declined. Update your bid to be reconsidered!</span></center><br /></br /><?php endif; ?><span class="title"><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
<?php echo $this->_tpl_vars['Bid_Amount']; ?>
 to complete by <?php echo $this->_tpl_vars['Delivery_Time']; ?>
.</span> <span>Posted on <?php echo ((is_array($_tmp=$this->_tpl_vars['Bid_Time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B %d, %Y at %I:%M %p') : smarty_modifier_date_format($_tmp, '%B %d, %Y at %I:%M %p')); ?>
</span>
							<div class="clear"></div>		
							<span class="description">
							<div class="desc_holder"><?php echo ((is_array($_tmp=$this->_tpl_vars['Bid_Desc'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 100, "\n", true) : smarty_modifier_wordwrap($_tmp, 100, "\n", true)); ?>
</div>
							<div style="background:#fff;padding-left:5px;">
								<?php if ($this->_tpl_vars['rating'] == 0.00): ?>
								No Feedback yet
								<?php else: ?>
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120">&nbsp;<a href="<?php echo $this->_tpl_vars['Tasker']; ?>
_tasker_feedback.html" class="">(<?php echo $this->_tpl_vars['reviews']; ?>
 reviews)</a>
								<?php endif; ?>
								<div class="clear"></div>
								<?php if ($this->_tpl_vars['fb_verfy_tasker'] == 1 || $this->_tpl_vars['email_verfy_tasker'] == 1 || $this->_tpl_vars['address_verfy_tasker'] == 1 || $this->_tpl_vars['human_verfy_tasker'] == 1 || $this->_tpl_vars['background_verfy_tasker'] == 1): ?>
								<div style="line-height:25px;font-weight:bold;">
								<span style="float:left;margin-right:5px;height:25px">Trusted and Verified:</span>
								<?php if ($this->_tpl_vars['fb_verfy_tasker'] == 1): ?><img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['email_verfy_tasker'] == 1): ?><img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" /><?php endif; ?>							
								<?php if ($this->_tpl_vars['address_verfy_tasker'] == 1): ?><img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['human_verfy_tasker'] == 1): ?><img src="images/phone-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['background_verfy_tasker'] == 1): ?><img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" /><?php endif; ?>	
								<div class="clear"></div>
								</div>
								<?php endif; ?>
							</div>		
							</span>
							<div class="clear"></div>
							</div>
								<div class="more_button">
									<?php if ($this->_tpl_vars['project_post_to'] == $this->_tpl_vars['Tasker']): ?>
									<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
winner.gif" border="0"/>
									<?php endif; ?>
									<div class="clear"></div>		
									<?php if ($this->_tpl_vars['project_post_to'] == $this->_tpl_vars['Tasker'] && $this->_tpl_vars['project_status'] != 6): ?>
									<div id="button_award"><a href="#" class="footerlinkcommon2" onclick="JavaScript: popupWindowURL('private_message.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&id=1&pop_up=true','','645','500','','true','true');">Messages <?php if ($this->_tpl_vars['privatecnt']): ?>(<?php echo $this->_tpl_vars['privatecnt']; ?>
)<?php else: ?>(0)<?php endif; ?></a></div>
									<?php else: ?>
									<?php if ($this->_tpl_vars['project_status'] == 1): ?>									
									<div id="button_award"><a href="#" class="footerlinkcommon2" onclick="JavaScript: popupWindowURL('private_message.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&id=1&pop_up=true','','645','500','','true','true');">Messages <?php if ($this->_tpl_vars['privatecnt']): ?>(<?php echo $this->_tpl_vars['privatecnt']; ?>
)<?php else: ?>(0)<?php endif; ?></a></div>
									<?php endif; ?>
									<?php endif; ?>
									<div id="button_award">
						
									<?php if ($this->_tpl_vars['project_status'] == 1): ?>
									<a href="place_bid_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html"  onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');" style='text-decoration:none;' class="negative">
									Update Bid
									</a>										
									<?php elseif ($this->_tpl_vars['project_status'] == 2): ?>
									<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
									Awarded
									</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 3): ?>
									<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
									Accepted
									</a>
									<?php elseif ($this->_tpl_vars['project_status'] == 5): ?>
									<a href="#"   style='text-decoration:none;' class="negative" disabled="disabled" onclick="return(false);"> 
									Tasker Done
									</a>									
									<?php endif; ?>
									</div>
									<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to'] && $this->_tpl_vars['project_status'] == 6): ?>
									<div id="button_award">
										<a href="rating_user.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&User_type=task_owner&to=<?php echo $this->_tpl_vars['project_posted_by']; ?>
" style='text-decoration:none;' class="negative">
										Feedback
										</a>
									</div>
									<?php endif; ?>								
									<div class="clear"></div>		
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								<!-- Accept Task Awarding-->	
								<?php if ($this->_tpl_vars['project_status'] == 2 && $this->_tpl_vars['project_post_to'] == $this->_tpl_vars['Tasker']): ?>								
								<?php if ($this->_tpl_vars['error'] == 1): ?>
								<?php echo $this->_tpl_vars['lang']['Accept_project_Err']; ?>

								<?php else: ?>
								<form method="post" action="<?php echo $this->_tpl_vars['Site_URL']; ?>
/accept_task.php?id=<?php echo $this->_tpl_vars['project_id']; ?>
">								
								<select name="accept_deny" style="width:70px; border:1px solid #bcbcbc; margin-top:4px;">
								<?php echo $this->_tpl_vars['Accept_Deny']; ?>

								</select>
								<input type="hidden" name="project_id" value="<?php echo $this->_tpl_vars['project_id']; ?>
" />
								<input type="hidden" name="auth_id_of_post_by" value="<?php echo $this->_tpl_vars['user_id']; ?>
" />
								<input type="hidden" name="bid_id" value="<?php echo $this->_tpl_vars['arr_Bid'][$this->_sections['bid']['index']]['bid_id']; ?>
" />
								<input id="btnbg" type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Accept_Submit']; ?>
" class="login_txt style5" />	
								</form>
								<?php endif; ?>
								<?php endif; ?>
								<!-- End Accept Task Awarding-->								
							</div>
							<div class="clear"></div>
						</div>
					<?php else: ?>
					<div class="note">You have not bid on this Task as of yet!</div>
					<?php endif; ?>	
					<div class="clear"></div>
					<?php endif; ?>	
					<?php if ($this->_tpl_vars['count'] > 0): ?>						
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Bid_hide']; ?>
</label>
					</div>
					</div>
					<div class="clear"></div>	
					<?php endif; ?>	
						<!-- End if hide bids-->					
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>				
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
			<div class="right-column-wrap-top">
			<h3>Task Control Panel</h3>		
				<strong>Task <?php echo $this->_tpl_vars['lang']['Status']; ?>
 : </strong>
					<?php if ($this->_tpl_vars['project_status'] == 2): ?>
						Task Awarded to <?php echo $this->_tpl_vars['project_post_to']; ?>

					<?php elseif ($this->_tpl_vars['project_status'] == 3): ?>
						Task Accepted and Underway
					<?php elseif ($this->_tpl_vars['project_status'] == 4): ?>
						Task Canceled bt Task Owner
					<?php elseif ($this->_tpl_vars['project_status'] == 5): ?>
						Task Marked Completed By Tasker
					<?php elseif ($this->_tpl_vars['project_status'] == 6): ?>
						Task Completed
					<?php elseif ($this->_tpl_vars['project_status'] == 7): ?>
						Task Failed		
					<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 0): ?>
						<?php echo $this->_tpl_vars['lang']['task_Closed_Bidding']; ?>

					<?php elseif ($this->_tpl_vars['project_status'] == 1 && $this->_tpl_vars['bid_status'] == 1): ?>
						<?php echo $this->_tpl_vars['time_remaining']; ?>
 left for bidding as of last page load!		
					<?php endif; ?>					
				<div class="clear" style="height:3px;">&nbsp;</div>
				<strong>Category: </strong><?php echo $this->_tpl_vars['categories']; ?>

				<div class="clear" style="height:3px;">&nbsp;</div>
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to'] || $_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by']): ?>
				<?php if ($this->_tpl_vars['project_status'] != 1 && $this->_tpl_vars['project_status'] != 2): ?>				
				<div style="padding:3px;border:1px solid #000">
				<strong>Escrow For Task</strong>
				<table>
				<tr>
					<td class="bodytextblack" width="55%"><strong>Milestone</strong></td>
					<td class="bodytextblack" width="23%"><strong>Amount</strong></td>
					<td class="bodytextblack" width="17%"><strong>Action</strong></td>					
				</tr>
				<?php $_from = $this->_tpl_vars['Task_Escrow_List']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['esc_in'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['esc_in']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['esc_in']):
        $this->_foreach['esc_in']['iteration']++;
?>
				<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A style3, list_B style3'), $this);?>
">
					<td class="bodytextblack" width="55%">&nbsp;<?php echo $this->_tpl_vars['esc_in']->milestone; ?>
</td>
					<td class="bodytextblack" width="23%"><?php echo $this->_tpl_vars['lang']['Curreny']; ?>
<?php echo $this->_tpl_vars['esc_in']->amount; ?>
</td>
					<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to']): ?>
					<td class="bodytextblack" width="17%"><a href="cancel_payment_<?php echo $this->_tpl_vars['esc_in']->ep_id; ?>
.html" class="footerlink">Cancel</a></td>
					<?php elseif ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by']): ?>
					<td class="bodytextblack" width="17%"><?php if ($this->_tpl_vars['project_status'] == 5): ?><a href="release_payment_<?php echo $this->_tpl_vars['esc_in']->ep_id; ?>
.html" class="footerlinkcommon2">Release</a><?php else: ?>Pending Completion<?php endif; ?></td>
					<?php endif; ?>					
				</tr>
				<?php endforeach; else: ?>
				<tr>
					<td class="bodytext" align="center" colspan="3"><?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by']): ?>Please create an Escrow payment so the Tasker can begin the task!<?php endif; ?><?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to']): ?>(No Escrow Payments Pending. Do not start the task until the Task Owner has created an escrow payment in the amount of your bid!)<?php endif; ?></td>
				</tr>
				<?php endif; unset($_from); ?>
				</table>
				</div>				
				<?php endif; ?>
				<?php endif; ?>
			
								
				<?php if ($this->_tpl_vars['count'] == 0): ?>
				<?php if ($this->_tpl_vars['project_status'] == 1 || $this->_tpl_vars['project_status'] == 2): ?>
				<?php if ($_SESSION['User_Id'] == $this->_tpl_vars['user_id']): ?>
				<div class="button-no" style="margin-left:70px;"><a href="extend_task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="footerlinkcommon2"><strong>Extend Time</strong></a></div>
				<?php endif; ?>
				<?php endif; ?>
				<?php endif; ?>
				<?php if ($_SESSION['User_Id'] == $this->_tpl_vars['user_id']): ?>
				<?php if ($this->_tpl_vars['project_status'] == 3): ?><br /><div class="button-no" style="margin-left:70px;"><a href="/create-escrow-payment.html" class="footerlinkcommon2"><strong>Escrow Payment</strong></a></div><?php endif; ?>
				<?php if ($this->_tpl_vars['project_status'] == 5 && $this->_tpl_vars['tasker_reimburse'] > 0): ?><br /><div class="button-no" style="margin-left:70px;"><a href="/create-escrow-payment.html" class="footerlinkcommon2"><strong>Escrow Payment</strong></a></div><?php endif; ?>
				<div class="clear"></div>
				<?php endif; ?>				
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to'] && $this->_tpl_vars['project_status'] == 3 && $this->_tpl_vars['Escrow_Created'] != ''): ?><br /><div class="button-no" style="margin-left:70px;"><a href="mark-completed_<?php echo $this->_tpl_vars['project_id']; ?>
.html" >Mark Completed</a></div><?php endif; ?>
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to'] && $this->_tpl_vars['project_status'] == 3 && $this->_tpl_vars['Escrow_Created'] == ''): ?><br /><div class="button-no" style="margin-left:70px;"><a href="report_task_inactivity_<?php echo $this->_tpl_vars['project_id']; ?>
.html">Report Inactivity</a></div><?php endif; ?>
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by'] && $this->_tpl_vars['project_status'] == 3 && $this->_tpl_vars['Escrow_Created'] != ''): ?><br /><div class="button-no" style="margin-left:70px;"><a href="report_task_inactivity_<?php echo $this->_tpl_vars['project_id']; ?>
.html">Report Inactivity</a></div><?php endif; ?>				
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by'] && $this->_tpl_vars['project_status'] == 5 && $this->_tpl_vars['task_owner_dispute'] == 0): ?><br /><div class="button-no" style="margin-left:70px;"><a href="dispute-completed_<?php echo $this->_tpl_vars['project_id']; ?>
.html" >Dispute Completed</a></div><?php endif; ?>
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by'] && $this->_tpl_vars['project_status'] == 5 && $this->_tpl_vars['task_owner_dispute'] != 0): ?><br /><div class="button-no" style="margin-left:70px;"><a href="dispute-completed_<?php echo $this->_tpl_vars['project_id']; ?>
.html" >Resolution Board</a></div><?php endif; ?>					
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to'] && $this->_tpl_vars['project_status'] == 5 && $this->_tpl_vars['task_owner_dispute'] != 0): ?><br /><div class="button-no" style="margin-left:70px;"><a href="dispute-completed_<?php echo $this->_tpl_vars['project_id']; ?>
.html" >Resolution Board</a></div><?php endif; ?>	
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by'] && $this->_tpl_vars['project_status'] == 1): ?><br /><div class="button-no" style="margin-left:70px;"><a href="close_task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="footerlinkcommon2">Close</a></div><?php endif; ?>	
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by'] && $this->_tpl_vars['project_status'] == 2): ?><br /><div class="button-no" style="margin-left:70px;"><a href="close_task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="footerlinkcommon2">Close</a></div><?php endif; ?>					
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_posted_by'] && $this->_tpl_vars['project_status'] == 6): ?>
				<div class="button-no" style="margin-left:70px;margin-top:20px;">
				<a href="rating_user.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&User_type=tasker&to=<?php echo $this->_tpl_vars['project_post_to']; ?>
" class="footerlinkcommon2">Post Feedback</a>
				</div>
				<?php endif; ?>
				<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_post_to'] && $this->_tpl_vars['project_status'] == 6): ?>
				<div class="button-no" style="margin-left:70px;margin-top:20px;">
				<a href="rating_user.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&User_type=task_owner&to=<?php echo $this->_tpl_vars['project_posted_by']; ?>
" class="footerlinkcommon2">Post Feedback</a>
				</div>
				<?php endif; ?>
				<div class="clear"></div>				
			</div>
			<div class="right-column-wrap">	
			<h3>Bid Details</h3>			
				<strong><?php echo $this->_tpl_vars['lang']['Bids_Received']; ?>
 (<?php echo $this->_tpl_vars['count']; ?>
) </strong></a>
				<div class="clear"></div>
				<?php if ($_SESSION['User_Id'] == $this->_tpl_vars['user_id']): ?>
				<a href="task_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="footerlinkcommon23"><strong>All Bids (<?php echo $this->_tpl_vars['count']; ?>
) </strong></a>
				<div class="clear"></div>				
				<a href="shortlist_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="footerlinkcommon23"><strong>Favorite Bids (<?php echo $this->_tpl_vars['shortlistcnt']; ?>
) </strong></a>
				<div class="clear"></div>
				<a href="decline_<?php echo $this->_tpl_vars['project_id']; ?>
_<?php echo $this->_tpl_vars['clear_title']; ?>
.html" class="footerlinkcommon23"><strong>Declined Bids (<?php echo $this->_tpl_vars['declinecnt']; ?>
)</strong></a>
				<div class="clear"></div>
				<?php endif; ?>
				<strong><?php echo $this->_tpl_vars['lang']['Average_bid_amount']; ?>
:</strong> <?php if ($this->_tpl_vars['count'] != 0): ?><strong><?php echo $this->_tpl_vars['lang']['Curreny']; ?>
<?php echo $this->_tpl_vars['Bid']; ?>
</strong><?php else: ?><strong><?php echo $this->_tpl_vars['lang']['Curreny']; ?>
0.00</strong><?php endif; ?>
				<div class="clear"></div>
			</div>		
			<div class="right-column-wrap">
				<h3>Important</h3>			
				<strong><?php echo $this->_tpl_vars['lang']['Remember']; ?>
</strong>&nbsp;<?php echo $this->_tpl_vars['lang']['Remember_Note']; ?>
 
				<div class="clear"></div>
				<?php if ($this->_tpl_vars['project_allow_bid'] == 1): ?>
				<strong><font size="3"><?php echo $this->_tpl_vars['lang']['Vip']; ?>
</font></strong>
				<div class="clear"></div>
				<?php endif; ?>
			</div>			
			<div class="right-column-wrap">
				<h3>Task Location</h3>			
				 <img src="http://maps.google.com/maps/api/staticmap?center=<?php echo $this->_tpl_vars['project_latitude']; ?>
,<?php echo $this->_tpl_vars['project_longitude']; ?>
&zoom=11&size=280x195&maptype=normal&markers=color:blue%7Clabel:S%7C<?php echo $this->_tpl_vars['project_latitude']; ?>
,<?php echo $this->_tpl_vars['project_longitude']; ?>
&mobile=true&sensor=false">
					<br><?php echo $this->_tpl_vars['project_city']; ?>

			</div>
			<div class="right-column-wrap">
			<h3><?php echo $this->_tpl_vars['lang']['Related_projects']; ?>
</h3>		
					<?php if ($this->_tpl_vars['Related_Loop'] > 1): ?>
					 <?php unset($this->_sections['related_project']);
$this->_sections['related_project']['name'] = 'related_project';
$this->_sections['related_project']['loop'] = is_array($_loop=$this->_tpl_vars['Related_Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['related_project']['show'] = true;
$this->_sections['related_project']['max'] = $this->_sections['related_project']['loop'];
$this->_sections['related_project']['step'] = 1;
$this->_sections['related_project']['start'] = $this->_sections['related_project']['step'] > 0 ? 0 : $this->_sections['related_project']['loop']-1;
if ($this->_sections['related_project']['show']) {
    $this->_sections['related_project']['total'] = $this->_sections['related_project']['loop'];
    if ($this->_sections['related_project']['total'] == 0)
        $this->_sections['related_project']['show'] = false;
} else
    $this->_sections['related_project']['total'] = 0;
if ($this->_sections['related_project']['show']):

            for ($this->_sections['related_project']['index'] = $this->_sections['related_project']['start'], $this->_sections['related_project']['iteration'] = 1;
                 $this->_sections['related_project']['iteration'] <= $this->_sections['related_project']['total'];
                 $this->_sections['related_project']['index'] += $this->_sections['related_project']['step'], $this->_sections['related_project']['iteration']++):
$this->_sections['related_project']['rownum'] = $this->_sections['related_project']['iteration'];
$this->_sections['related_project']['index_prev'] = $this->_sections['related_project']['index'] - $this->_sections['related_project']['step'];
$this->_sections['related_project']['index_next'] = $this->_sections['related_project']['index'] + $this->_sections['related_project']['step'];
$this->_sections['related_project']['first']      = ($this->_sections['related_project']['iteration'] == 1);
$this->_sections['related_project']['last']       = ($this->_sections['related_project']['iteration'] == $this->_sections['related_project']['total']);
?> 							   
								 <?php if ($this->_tpl_vars['arr_related_project'][$this->_sections['related_project']['index']]['project_id'] != $this->_tpl_vars['project_id']): ?>
									  <ul style="margin-left:15px;"><li><a href="task_<?php echo $this->_tpl_vars['arr_related_project'][$this->_sections['related_project']['index']]['project_id']; ?>
_<?php echo $this->_tpl_vars['arr_related_project'][$this->_sections['related_project']['index']]['clear_title']; ?>
.html" class="footerlinkcommon23"><?php echo ((is_array($_tmp=$this->_tpl_vars['arr_related_project'][$this->_sections['related_project']['index']]['project_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></li> </ul>
								 <?php endif; ?> 	
					 <?php endfor; endif; ?>
					 <?php else: ?>
					<?php echo $this->_tpl_vars['lang']['No_Related']; ?>

					 <?php endif; ?>
			</div>				
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->
<div class="clear"></div>				