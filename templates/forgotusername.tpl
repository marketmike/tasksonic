<script language="javascript">
	var JS_User_ID		 = '{$lang.JS_User_ID}';
	var JS_Valid_Mail 	 = '{$lang.JS_Valid_Mail}';
</script>				

<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{$lang.Forgotusername_Page}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						{$lang.Forgotusername_Page}						
						</label>
					</div>
					</div>
					<div class="clear"></div>
						{if $msg}
						<div class="note" style="text-align:center;padding:20px;">{$msg}</div>
						{else}
						<div class="note" style="text-align:center;padding:20px;">Enter the email address you registered with to have your password sent!</div>
						{/if}
						<form method="post" action="{$smarty.server.PHP_SELF}" name="frmForgotpasswd">
							<div class="title-links" style="width:400px;">
							<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Email_Address}</label>
							</div>
							</div>
							<div class="title-bottom"></div>
							<div class="clear"></div>
							<div class="field">
							<input id="mem_email" name="mem_email"  type="text" style="border:1px solid #000000;" size="25" />
							<div class="clear"></div>
							</div>
							<div class="field">							
							<div class="buttons">
							<button type="submit" name="Submit" value="{$lang.Button_Submit}" onClick="Javascript: return Check_Details(this.form);">Send User Name</button>
							</div>
							<div class="clear"></div>
							</div>							
						<input type="hidden" name="Action" value="{$Action}">
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