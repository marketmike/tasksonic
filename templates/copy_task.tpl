<script language="javascript">
	var JS_Cats		 = '{$lang.JS_Cats}';
	var JS_en_title	 = '{$lang.JS_en_title}';
	var JS_en_dec	 = '{$lang.JS_en_dec}';
	var JS_Bid		 = '{$lang.JS_Bid}';
	var JS_Dev		 = '{$lang.JS_Dev}';
	var JS_Term		 = '{$lang.JS_Term}';
	var JS_Cat		 = '{$lang.JS_Cat}';
	var JS_City		 = '{$lang.JS_City}';	
	addLoadEvent(prepareInputsForHints);
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	{if $User_Id != $Recevier_id and $msg!= TRUE}  
	<h1>Post A Task In {$citycurrent}</h1>
	{/if}
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
				<form method="post" action="{$post_url}" name="frmpostproject" enctype="multipart/form-data">			
				{if $User_Id != $Recevier_id and $msg!= TRUE}									
				<div class="clear"></div>
				{if $special_user == 1}
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
					<div class="note" style="text-align:center;padding:20px;">{$lang.Note1} <a href="Javascript: View_Terms()" class="footerlink"><strong>{$lang.task_Guidelines}</strong></a> {$lang.Note2}.</div>					
					<div class="clear"></div>				
				{elseif $task_owner_vip == 1}
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
					<div class="note" style="text-align:center;padding:20px;">{$lang.Note1} <a href="Javascript: View_Terms()" class="footerlink"><strong>{$lang.task_Guidelines}</strong></a> {$lang.Note2}.</div>					
					<div class="clear"></div>				
													
				{elseif $flag == 1}
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
					<div class="note" style="text-align:center;padding:20px;">{$lang.Note1} <a href="Javascript: View_Terms()" class="footerlink"><strong>{$lang.task_Guidelines}</strong></a> {$lang.Note2}.</div>					
					<div class="clear"></div>				
				
				{else}
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						{if $how_short < 0}Task Posting Fee: ${$needed_to_purchase}{/if}						
						</label>
					</div>
					</div>
					<div class="clear"></div>						
					<div class="note" style="text-align:center;padding:20px;">{$lang.Note1} <a href="Javascript: View_Terms()" class="footerlink"><strong>{$lang.task_Guidelines}</strong></a> {$lang.Note2}.</div>					
					<div class="clear"></div>					
					<div class="message" style="text-align:center;padding-left:10px;padding-right:10px;padding-bottom:5px;">{if $how_short < 0}You currently have ${$amount} in your wallet which leaves you short ${$how_short}. After submitting... your task will be saved unpublished and you will be redirected to the deposit page in order to add funds to your Task Sonic Wallet. Once sufficient funds have been added you can return to the task and publish it.{if $how_short < $Premium_Fees + $Urgent_Fees + $amount} If you are planning to upgrade your task to premium (${$Premium_Fees}) or urgent (${$Urgent_Fees}), these fees will be added when the task is submitted!{/if}{else} Good to Go! You have ${$amount} in your Task Sonic wallet and it will cost you ${$needed_to_purchase} to post this task leaving you with ${$how_short} in your wallet. {if $how_short < $Premium_Fees + $Urgent_Fees + $amount}Please note, you may still need to add money to your Task Sonic Wallet if you are planning to upgrade your task to premium (${$Premium_Fees}) or urgent (${$Urgent_Fees}){/if}{/if}</div>
				<div class="clear"></div>
				{/if}		
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.task_Title}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="en_project_title" value="{$en_project_title}" type="text" maxlength="50" tabindex="1" size="40" />
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
						<strong>Address</strong><br /><input name="en_project_location" value="{$en_project_location}" type="text" maxlength="50" tabindex="2" size="50" />
						<span class="hint">Please enter the street address where the Task needs to be completed, e.g. 115 Wilshire Blvd. Suite 1950. Note that addresses will be verified and geo coded for accuracy and will be displayed as a general point of reference on a map. Street Addresses will not be shown unlesss the task is awarded and only to the selected Tasker. If the task is a task that can be performed online, just enter the CITY, STATE ZIP where you are located in the below field, e.g. Ocala, Fl 34481<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div class="field">
						<strong>City, State, Zip</strong><br /><input name="en_project_city" value="{$en_project_city}" type="text" maxlength="50" tabindex="2" size="50" />
						<span class="hint">Please enter City, State and Zipcode, e.g. Ocala, FL 34474. Note that addresses will be verified and geo coded for accuracy. If the task is a task that can be performed online, just enter the CITY, STATE ZIP where you are located, e.g. Ocala, Fl 34481<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>			

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.task_Dec}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_project_description" class="textarea" cols="50" rows="10" tabindex="3">{$en_project_description}</textarea>
						<span class="hint">The information below is publically viewable; please refrain from including specific details for the project including personal data such as addresses or phone numbers. Alternately, you can communicate information of this nature by way of private messaging with Sonic Taskers who bid on your task. You are not allowed to post any contact information in accordance with our Terms of service.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>						
					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Cats}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div class="clear"></div>					
					<select name="cat_prod" tabindex="4" class="dropdownmedium">
					  <option value=" ">Select A Category</option>
						{section name=prod loop=$Loop}
							<option value="{$catid[prod]}" {if $catid[prod]==$selected_cat}selected{/if} >{$catname[prod]}</option>								
						{/section}
					</select>
					<span class="hint">Choose a relevant category for your task. Be as specific as possible.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>										
					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Upload_Img}</label>
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
						<span class="hint">({$lang.File_1}) Add file attachments that will help better descibe the task, including examples, data, details, etc.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>							
					</div>			


					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Budget}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="dev" class="dropdownmedium" tabindex="6">
						  <option value="0">( {$lang.Please_Choose_Budget} )</option>
							{$Development_List}
						</select>
						<span class="hint">How much are you willing to spend for this tasks? The amount will not be shown to Taskers.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	


					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Days_Of_Bidding}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div>Must be at least three hours later then the current time</div>
					<div class="clear"></div>					
						<select name="bidding" class="dropdownmediumext" tabindex="7">
						  <option value="0">-----</option>
							{$Bidding_List}
						</select>
						<select name="bidding_time" tabindex="7" class="dropdownshort">
						  <option value="0">Time</option>
							{$Time_List}
						</select>						
						<span class="hint">Select the date and time bidding will end. Be sure to allow enough time to permit enough Taskers to bid.  Bidding end time must be at least 3 hours later then current time.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>						
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="completed_by">{$lang.Needs_Be_Completed}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div>Must be at least three hours later then the bidding time</div>
					<div class="clear"></div>					
						<select name="completed_by" tabindex="7" class="dropdownmediumext">
						  <option value="0">-----</option>
							{$Completed_List}
						</select>
						<select name="completed_time" tabindex="7" class="dropdownshort">
						  <option value="0">Time</option>
							{$Time_List2}
						</select>						
						<span class="hint">Select a date and time the task must be completed, this must be at least 3 hours later then the bidding end time.<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Addtional_Options}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
							<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="project_online" value="1" tabindex="9" class="shorter" {$project_online} /> <strong>{$lang.Online}</strong><img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="project_online_help"  />
							<span class="hint" id="project_online">{$lang.Hint_Online}<span class="hint-pointer">&nbsp;</span></span>	
							</div>						
							<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="project_allow_bid" value="1" tabindex="9" class="shorter" {$project_allow_bid} /> <strong>{$lang.Option2}</strong><img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="project_allow_bid_help"  />
							<span class="hint" id="project_allow_bid">{$lang.Hint_task_option}<span class="hint-pointer">&nbsp;</span></span>	
							</div>
						{if $special_user != 1 && $task_owner_vip != 1 && $flag != 1}							
							<div class="clear"></div>
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="premium_project" value="1" tabindex="10" class="shorter"  {$premium_project} /> <strong>{$lang.Option3} - Cost ${$Premium_Fees}</strong> (Stand out with a Premium Upgrade)<img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="premium_project_help"  />
							<span class="hint" id="premium_project">{$lang.Premium_Text_1}{$Premium_Fees} {$lang.Premium_Text_2}<br />{$lang.Premium_Text_3}<span class="hint-pointer">&nbsp;</span></span>							
							</div>
							<div class="clear"></div>	
							<div style="line-height:40px;vertical-align:middle">
							<input type="checkbox" name="urgent_project" value="1" tabindex="11" class="shorter" {$urgent_project} /> <strong>{$lang.Urgent} - Cost ${$lang.Urgent_Fees}</strong> (Need Done In A Hurry?)<img src="/images/help.png" style="margin-left:5px;height:20px;width:20px;vertical-align:middle" id="urgent_project_help"  />
							<span class="hint" id="urgent_project">{$lang.Urgent_text_1}{$lang.Urgent_Fees}{$lang.Urgent_text_2}<span class="hint-pointer">&nbsp;</span></span>														
							</div>							
						{/if}
					<div class="clear"></div>						
					</div>
					<div class="clear"></div>					
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.task_Guidelines}</label>
						</div>
					</div>
					<div class="title-bottom"></div> 
					<div class="clear"></div>
					<div class="field">
						<div style="line-height:40px;vertical-align:middle">
						<input type="checkbox" name="agree1" tabindex="12"  class="shorter" />{$lang.Note} <a href="Javascript: View_Terms()" class="footerlink"><strong>{$lang.task_Guidelines}</strong></a> and agree to them.
						</div>
					</div>
					<div class="clear"></div>
					<div class="field">
							<div class="buttons">
							<button type="submit" name="Submit" value="{$lang.Submit}" onClick="Javascript: return Check_Details(this.form);">Post Your Task</button>
							</div>
					</div>
					<div class="clear"></div>					
						<input type="hidden" name="Action" value="Add" />
						<input type="hidden" name="user_name" value="{$user_name}" />
						<input type="hidden" name="amount" value="{$amount}" />
				{/if}
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
