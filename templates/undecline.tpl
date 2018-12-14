<div id="popgrid_620">
<div class="clear"></div>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<form method="post" action="{$smarty.server.PHP_SELF}" name="frmundecline">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">{$lang.Decline_Bid}</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="field">
					{$lang.Decline_Msg}<br /><br />
					<strong>{$lang.Provider_Name} : &nbsp;&nbsp;<a target="_blank" href="task_owner_profile_{$provider_name}.html" class="footerLink">{$provider_name}</a></strong>
					<div class="clear"></div>	
					</div>			
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Reason}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="reasons" class="textbox">
						{$reasons}
						</select>
					<div class="clear"></div>	
					</div>	
					<div class="clear"></div>
					<div class="buttons">
					<button type="submit" name="Submit" value="{$lang.Button_Decline_Bid}">{$lang.Button_Decline_Bid}</button>
					</div>						
					<div class="buttons">
					<button type="submit" name="Submit" value="{$lang.Button_Cancel}" onclick="Javascript: window.close();">{$lang.Button_Cancel}</button>
					</div>					
					<input type="hidden" name="provider_name" value="{$provider_name}" />
					<input type="hidden" name="project_id" value="{$project_id}" />
					<input type="hidden" name="bid_id" value="{$bid_id}" />
					<input type="hidden" name="id" value="{$id}" />
					</form>
				<div class="clear"></div>	
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>	
	<div class="page_bottom"></div>	