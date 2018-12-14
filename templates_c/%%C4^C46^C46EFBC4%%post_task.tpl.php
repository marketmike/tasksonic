<?php /* Smarty version 2.6.26, created on 2012-08-13 01:30:24
         compiled from post_task.tpl */ ?>
<script language="javascript">
	var JS_Cats		 = '<?php echo $this->_tpl_vars['lang']['JS_Cats']; ?>
';
	var JS_en_title	 = '<?php echo $this->_tpl_vars['lang']['JS_en_title']; ?>
';
	var JS_en_dec	 = '<?php echo $this->_tpl_vars['lang']['JS_en_dec']; ?>
';
	var JS_Bid		 = '<?php echo $this->_tpl_vars['lang']['JS_Bid']; ?>
';
	var JS_Dev		 = '<?php echo $this->_tpl_vars['lang']['JS_Dev']; ?>
';
	var JS_Term		 = '<?php echo $this->_tpl_vars['lang']['JS_Term']; ?>
';
	var JS_Cat		 = '<?php echo $this->_tpl_vars['lang']['JS_Cat']; ?>
';
	var JS_City		 = '<?php echo $this->_tpl_vars['lang']['JS_City']; ?>
';	
	addLoadEvent(prepareInputsForHints);
</script>

<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1>Post A Task In <?php echo $this->_tpl_vars['citycurrent']; ?>
</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<?php if ($this->_tpl_vars['special_user'] == 1): ?>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Publish Your Task Free For 30 Days!						
						</label>
					</div>
					</div>				
					<div class="clear"></div>					
					<div class="message" style="text-align:center;padding:10px;margin:10px;">Thank you for giving Task Sonic a try! Since your in your first 30 days as a new member of Task Sonic, post your task on us! That's right, your task can be published on Task Sonic with no posting deposit and will be commission free as long as your task ia awarded and accepted during the first 30 days following your registration, you only pay for the assigned Tasker to perform the task. Go ahead and get started, post your free task today!</div>
					<div class="clear"></div>						
					<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['lang']['Note1']; ?>
 <a href="Javascript: View_Terms()" class="footerlink"><strong><?php echo $this->_tpl_vars['lang']['task_Guidelines']; ?>
</strong></a> <?php echo $this->_tpl_vars['lang']['Note2']; ?>
.</div>					
					<div class="clear"></div>				
				<?php elseif ($this->_tpl_vars['task_owner_vip'] == 1): ?>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						You're A VIP, Go Ahead And Publish Your Task For Free!						
						</label>
					</div>
					</div>				
					<div class="clear"></div>					
					<div class="message" style="text-align:center;padding:10px;margin:10px;">Thank you selecting the VIP upgrade! As a VIP member your Task is posted for FREE. You also enjoy commissions free tasks for your tasks awareded and accepted while your VIP status is active.</div>
					<div class="clear"></div>						
					<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['lang']['Note1']; ?>
 <a href="Javascript: View_Terms()" class="footerlink"><strong><?php echo $this->_tpl_vars['lang']['task_Guidelines']; ?>
</strong></a> <?php echo $this->_tpl_vars['lang']['Note2']; ?>
.</div>					
					<div class="clear"></div>				
													
				<?php elseif ($this->_tpl_vars['flag'] == 1): ?>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Publish Your First Task Sonic Task Free!						
						</label>
					</div>
					</div>				
					<div class="clear"></div>					
					<div class="message" style="text-align:center;padding:10px;margin:10px;">Thank you for giving Task Sonic a try! Since this is your first task, its on us! That's right, your first task can be published on Task Sonic absolutely free. That means no commission charged to the Task Owner and we'll wave the posting fee. Go ahead and get started, post your free task today!</div>
					<div class="clear"></div>						
					<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['lang']['Note1']; ?>
 <a href="Javascript: View_Terms()" class="footerlink"><strong><?php echo $this->_tpl_vars['lang']['task_Guidelines']; ?>
</strong></a> <?php echo $this->_tpl_vars['lang']['Note2']; ?>
.</div>					
					<div class="clear"></div>				
				
				<?php else: ?>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						<?php if ($this->_tpl_vars['how_short'] < 0): ?>Task Posting Fee: $<?php echo $this->_tpl_vars['needed_to_purchase']; ?>
<?php else: ?>Good to Go!<?php endif; ?>						
						</label>
					</div>
					</div>
					<div class="clear"></div>											
					<div class="message" style="text-align:center;padding:10px;margin:10px;<?php if ($this->_tpl_vars['how_short'] < 0): ?>background:#FF0000;color:#fff<?php else: ?>background:#0198E1;color:#000<?php endif; ?>"><?php if ($this->_tpl_vars['how_short'] < 0): ?>You currently have $<?php echo $this->_tpl_vars['amount']; ?>
 in your wallet which leaves you short $<?php echo $this->_tpl_vars['how_short']; ?>
. After submitting... your task will be saved unpublished and you will be redirected to the deposit page in order to add funds to your Task Sonic Wallet. Once sufficient funds have been added you can return to the task and publish it.<?php if ($this->_tpl_vars['how_short'] < $this->_tpl_vars['Premium_Fees'] + $this->_tpl_vars['Urgent_Fees'] + $this->_tpl_vars['amount']): ?> If you are planning to upgrade your task to premium ($<?php echo $this->_tpl_vars['Premium_Fees']; ?>
) or urgent ($<?php echo $this->_tpl_vars['Urgent_Fees']; ?>
), these fees will be added when the task is submitted!<?php endif; ?><?php else: ?>You have $<?php echo $this->_tpl_vars['amount']; ?>
 in your Task Sonic wallet and it will cost you $<?php echo $this->_tpl_vars['needed_to_purchase']; ?>
 to post this task leaving you with $<?php echo $this->_tpl_vars['how_short']; ?>
 in your wallet. <?php if ($this->_tpl_vars['how_short'] < $this->_tpl_vars['Premium_Fees'] + $this->_tpl_vars['Urgent_Fees']): ?>Please note, you may still need to add money to your Task Sonic Wallet if you are planning to upgrade your task to premium ($<?php echo $this->_tpl_vars['Premium_Fees']; ?>
) or urgent ($<?php echo $this->_tpl_vars['Urgent_Fees']; ?>
)<?php else: ?> You even have enough in your wallet for upgrading your task to premium ($<?php echo $this->_tpl_vars['Premium_Fees']; ?>
) and urgent ($<?php echo $this->_tpl_vars['Urgent_Fees']; ?>
) if you choose to.<?php endif; ?><?php endif; ?></div>
					<div class="clear"></div>
					<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['lang']['Note1']; ?>
 <a href="Javascript: View_Terms()" class="footerlink"><strong><?php echo $this->_tpl_vars['lang']['task_Guidelines']; ?>
</strong></a> <?php echo $this->_tpl_vars['lang']['Note2']; ?>
.</div>									
				<div class="clear"></div>
				<?php endif; ?>
				<form method="post" action="post-new-task.html" name="frmpostproject" enctype="multipart/form-data">															
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['task_Title']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="en_project_title" value="<?php echo $_POST['en_project_title']; ?>
" type="text" maxlength="40" tabindex="1" size="50" />
						<span class="hint">Use a descriptive title, e.g. "Need someone to pick up my dry cleaning" or "Someone to mow my lawn". Max length is 40 characters<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Task Location</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div style="line-height:40px;vertical-align:middle;margin-bottom:5px;"><input type="checkbox" name="profileaddress" value="1" tabindex="11" onClick="Javascript: return usethisaddress(this.form);" class="shorter" <?php echo $this->_tpl_vars['urgent_project']; ?>
 /> <strong>Use My Task Sonic Profile Address</strong></div>
					<input type="hidden" name="adress1" value="<?php echo $this->_tpl_vars['profile_address1']; ?>
" /><input type="hidden" name="adress2" value="<?php echo $this->_tpl_vars['profile_address2']; ?>
" />
					<div class="clear"></div>
						<strong>Address</strong><br /><input name="en_project_location" value="<?php echo $_POST['en_project_location']; ?>
" type="text" maxlength="50" tabindex="2" size="50" />
						<span class="hint">Please enter the street address where the Task needs to be completed, e.g. 115 Wilshire Blvd. Suite 1950. Note that addresses will be verified and geo coded for accuracy and will be displayed as a general point of reference on a map. Street Addresses will not be shown unlesss the task is awarded and only to the selected Tasker. If the task is a task that can be performed online, just enter the CITY, STATE ZIP where you are located in the below field, e.g. Ocala, Fl 34481<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div class="field">
						<strong>City, State, Zip</strong><br /><input name="en_project_city" value="<?php echo $_POST['en_project_city']; ?>
" type="text" maxlength="50" tabindex="2" size="50" />
						<span class="hint">Please enter City, State and Zipcode, e.g. Ocala, FL 34474. Note that addresses will be verified and geo coded for accuracy. If the task is a task that can be performed online, just enter the CITY, STATE ZIP where you are located, e.g. Ocala, Fl 34481<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>						

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['task_Dec']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_project_description" title="" class="textarea" cols="50" rows="10" tabindex="3"><?php echo $_POST['en_project_description']; ?>
</textarea>
						<span class="hint">The information below is publically viewable; please refrain from including specific details for the task including personal data such as addresses or phone numbers. Alternately, you can communicate information of this nature by way of private messaging with Sonic Taskers who bid on your task. You are not allowed to post any contact information in accordance with our Terms of service.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>						
					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Cats']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div class="clear"></div>					
					<select name="cat_prod" tabindex="4" class="dropdownmedium">
					  <option value=" ">Select A Category</option>
						<?php unset($this->_sections['prod']);
$this->_sections['prod']['name'] = 'prod';
$this->_sections['prod']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prod']['show'] = true;
$this->_sections['prod']['max'] = $this->_sections['prod']['loop'];
$this->_sections['prod']['step'] = 1;
$this->_sections['prod']['start'] = $this->_sections['prod']['step'] > 0 ? 0 : $this->_sections['prod']['loop']-1;
if ($this->_sections['prod']['show']) {
    $this->_sections['prod']['total'] = $this->_sections['prod']['loop'];
    if ($this->_sections['prod']['total'] == 0)
        $this->_sections['prod']['show'] = false;
} else
    $this->_sections['prod']['total'] = 0;
if ($this->_sections['prod']['show']):

            for ($this->_sections['prod']['index'] = $this->_sections['prod']['start'], $this->_sections['prod']['iteration'] = 1;
                 $this->_sections['prod']['iteration'] <= $this->_sections['prod']['total'];
                 $this->_sections['prod']['index'] += $this->_sections['prod']['step'], $this->_sections['prod']['iteration']++):
$this->_sections['prod']['rownum'] = $this->_sections['prod']['iteration'];
$this->_sections['prod']['index_prev'] = $this->_sections['prod']['index'] - $this->_sections['prod']['step'];
$this->_sections['prod']['index_next'] = $this->_sections['prod']['index'] + $this->_sections['prod']['step'];
$this->_sections['prod']['first']      = ($this->_sections['prod']['iteration'] == 1);
$this->_sections['prod']['last']       = ($this->_sections['prod']['iteration'] == $this->_sections['prod']['total']);
?>
							<option value="<?php echo $this->_tpl_vars['catid'][$this->_sections['prod']['index']]; ?>
" <?php if ($this->_tpl_vars['catid'][$this->_sections['prod']['index']] == $this->_tpl_vars['selected_cat']): ?>selected<?php endif; ?> ><?php echo $this->_tpl_vars['catname'][$this->_sections['prod']['index']]; ?>
</option>								
						<?php endfor; endif; ?>
					</select>
					<span class="hint">Choose a relevant category for your task. Be as specific as possible.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>				
					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Upload_Img']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div>Upload an attachment to help explain the task, e.g. a graphic showing a design</div>
					<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
							  <input type="file" name="project_file_1" tabindex="3"/>
							 </div><div class="clear"></div>
							<!-- Disabling extra uploads for now 
							<div style="line-height:40px;vertical-align:middle">
								<input type="file" name="project_file_2" tabindex="4"/>
							</div><div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
								<input type="file" name="project_file_3" tabindex="5"/>
							</div><div class="clear"></div>-->
						<span class="hint">(<?php echo $this->_tpl_vars['lang']['File_1']; ?>
) Add file attachments that will help better descibe the task, including examples, data, details, etc.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>							
					</div>				


					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Budget']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="dev" class="dropdownmedium" tabindex="6">
						  <option value="0">( <?php echo $this->_tpl_vars['lang']['Please_Choose_Budget']; ?>
 )</option>
							<?php echo $this->_tpl_vars['Development_List']; ?>

						</select>
						<span class="hint">How much are you willing to spend for this tasks? The amount will not be shown to Taskers.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Tasker Expenses</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="tasker_expenses" class="dropdownmedium" tabindex="6">
						  <option value="0">( Please select )</option>
							<?php echo $this->_tpl_vars['Tasker_Expenses_List']; ?>

						</select>
						<span class="hint">How much do you anticipate the Tasker will need to spend to perform this task, e.g paying for dog food, picking up dry cleaning, purchasing groceries etc.? Please be sure to select an adequate amount as the amount will be used to indicate the maximum the Tasker is able to submit for reimbursement. You will be able to update the amount to a higher level after the Task has been awarded and you and the Tasker have used the Private Messaging system to discuss.<br><br>If your task will likely require the Tasker to spend more than $250, the Tasker will not have a limit when submitting for reimbursement. However, please note that you may dispute any charges not documented in private message conversations should the submitted charges be inaccurate with what was agreed upon. If you do not anticipate any expenses will be incurred by the Tasker you may skip this question.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Days_Of_Bidding']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div>Must be at least three hours later then the current time</div>
					<div class="clear"></div>
						<select name="bidding" class="dropdownmediumext" tabindex="7">
						  <option value="0">-----</option>
							<?php echo $this->_tpl_vars['Bidding_List']; ?>

						</select>
						<select name="bidding_time" tabindex="7" class="dropdownshort">
						  <option value="0">Time</option>
							<?php echo $this->_tpl_vars['Time_List']; ?>

						</select>						
						<span class="hint">Select the date and time bidding will end. Be sure to allow enough time to permit enough Taskers to bid. Bidding end time must be at least 3 hours later then current time.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>						
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="completed_by"><?php echo $this->_tpl_vars['lang']['Needs_Be_Completed']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div>Must be at least three hours later then the bidding time</div>
					<div class="clear"></div>
						<select name="completed_by" tabindex="7" class="dropdownmediumext">
						  <option value="0">-----</option>
							<?php echo $this->_tpl_vars['Completed_List']; ?>

						</select>
						<select name="completed_time" tabindex="7" class="dropdownshort">
						  <option value="0">Time</option>
							<?php echo $this->_tpl_vars['Time_List2']; ?>

						</select>						
						<span class="hint">Select a date and time the task must be completed, this must be at least 3 hours later then the bidding end time.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Addtional_Options']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">

							<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="project_online" value="1" tabindex="9" class="shorter" <?php echo $this->_tpl_vars['project_online']; ?>
 /> <strong><?php echo $this->_tpl_vars['lang']['Online']; ?>
</strong><img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="project_online_help"  />
							<span class="hint" id="project_online"><?php echo $this->_tpl_vars['lang']['Hint_Online']; ?>
<span class="hint-pointer">&nbsp;</span></span>	
							</div>
							<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="project_allow_bid" value="1" tabindex="9" class="shorter" <?php echo $this->_tpl_vars['project_allow_bid']; ?>
 /> <strong><?php echo $this->_tpl_vars['lang']['Option2']; ?>
</strong><img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="project_allow_bid_help"  />
							<span class="hint" id="project_allow_bid"><?php echo $this->_tpl_vars['lang']['Hint_task_option']; ?>
<span class="hint-pointer">&nbsp;</span></span>	
							</div>							
					<?php if ($this->_tpl_vars['special_user'] != 1 && $this->_tpl_vars['task_owner_vip'] != 1 && $this->_tpl_vars['flag'] != 1): ?>							
							<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="premium_project" value="1" tabindex="10" class="shorter"  <?php echo $this->_tpl_vars['premium_project']; ?>
 /> <strong><?php echo $this->_tpl_vars['lang']['Option3']; ?>
 - Cost $<?php echo $this->_tpl_vars['Premium_Fees']; ?>
</strong> (Stand out with a Premium Upgrade)<img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="premium_project_help"  />
							<span class="hint" id="premium_project"><?php echo $this->_tpl_vars['lang']['Premium_Text_1']; ?>
<?php echo $this->_tpl_vars['Premium_Fees']; ?>
 <?php echo $this->_tpl_vars['lang']['Premium_Text_2']; ?>
<br /><?php echo $this->_tpl_vars['lang']['Premium_Text_3']; ?>
<span class="hint-pointer">&nbsp;</span></span>							
							</div>
							<div class="clear"></div>	

							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="urgent_project" value="1" tabindex="11" class="shorter" <?php echo $this->_tpl_vars['urgent_project']; ?>
 /> <strong><?php echo $this->_tpl_vars['lang']['Urgent']; ?>
 - Cost $<?php echo $this->_tpl_vars['lang']['Urgent_Fees']; ?>
</strong> (Need Done In A Hurry?)<img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="urgent_project_help"  />
							<span class="hint" id="urgent_project"><?php echo $this->_tpl_vars['lang']['Urgent_text_1']; ?>
<?php echo $this->_tpl_vars['lang']['Urgent_Fees']; ?>
<?php echo $this->_tpl_vars['lang']['Urgent_text_2']; ?>
<span class="hint-pointer">&nbsp;</span></span>														
							</div>
					<?php endif; ?>
					<div class="clear"></div>						
					</div>
					<div class="clear"></div>					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['task_Guidelines']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div> 
					<div class="clear"></div>
					<div class="field">
						<div style="line-height:40px;vertical-align:middle">
						<input type="checkbox" name="agree1" tabindex="12" value="1" class="shorter"  /><?php echo $this->_tpl_vars['lang']['Note']; ?>
 <a href="Javascript: View_Terms()" class="footerlink"><strong><?php echo $this->_tpl_vars['lang']['task_Guidelines']; ?>
</strong></a> and agree to them.
						</div>
					</div>
					<div class="clear"></div>
					<div class="field">
							<div class="buttons">
							<button type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Submit']; ?>
" onClick="Javascript: return Check_Details(this.form);">Post Your Task</button>
							</div>
					</div>
					<div class="clear"></div>					
						<input type="hidden" name="Action" value="Add" />
						<input type="hidden" name="user_name" value="<?php echo $this->_tpl_vars['user_name']; ?>
" />
						<input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['amount']; ?>
" />
				</form>
				<div class="clear"></div>
				<div id="more_link"></div>
			</div>
		</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Post']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Location']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Balance']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Map']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->