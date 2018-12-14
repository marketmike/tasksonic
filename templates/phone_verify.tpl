<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1>Get Phone Verified</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address">{if $message}{$message}{else}Verify Your Phone Number! Cost: ${$fee}{/if}</label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<form method="post" action="get-phone-verified.html" name="frmVerify" enctype="multipart/form-data">
				<div class="message" style="text-align:left;padding:15px;margin-bottom:20px">
				<img src="http://www.tasksonic.com/images/phone-verified.png" style="float:left;margin-right:10px;margin-bottom:10px;width:100px;height:100px" alt="Phone Verified" title="Phone Verified">
				{if $transaction_completed}{$transaction_completed}<br /><br />{else}{$info}<br /><br />{/if}
				<center>
				{if $flag == 0}<span style="font-size:18px;font-weight:bold;padding:5px;background:#ccc;">Your Verification Code: {$code}</span><br /><br />{/if}
				<div class="clear"></div>
				<strong>Task Sonic User Name:</strong> {$user}<br />
				<strong>Phone Number To Be Verified:</strong> {$formatted_phone_number}
				<br /><br />
				<span style="font-size:16px;color:red;font-weight:bold">
				{$warning}
				</span>
				</center>
				</div>
				{if $flag == 0}
				<div class="buttons">
				<button type="submit" value="verify"  name="Submit"  onclick="javascript: return Confirm_Click(document.frmVerify);"  style='text-decoration:none;' class="negative">
				CALL ME NOW!
				</button>
				</div>
				{/if}
				<input type="hidden" name="Action" value=""/>
				<input type="hidden" name="verification_code" value="{$code}"/>				
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