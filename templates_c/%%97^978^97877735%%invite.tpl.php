<?php /* Smarty version 2.6.26, created on 2012-08-15 22:41:08
         compiled from invite.tpl */ ?>
<?php echo '
<script>
	function newInvite(){
		 var receiverUserIds = FB.ui({ 
				method : \'apprequests\',
				message: \'Check out Task Sonic, help for the everyday things you need done... you can even earn some cash helping others. Visit '; ?>
<?php echo $this->_tpl_vars['referral_link']; ?>
<?php echo '\',
		 },
		 function(receiverUserIds) {
				  console.log("IDS : " + receiverUserIds.request_ids);
				}
		 );
		 //http://developers.facebook.com/docs/reference/dialogs/requests/
	}
</script>
'; ?>

<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
	<h1><?php echo $this->_tpl_vars['lang']['Invite']; ?>
</h1>
	<div class="page_top"></div>
			<div class="page_content">
				<div class="page_content_white">
				<form name="frmInvitation" method="post" action="share_earn.html">
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Invite Your Friends</label>
					</div>
				</div>
				<div class="clear"></div>
				<div class="note" style="text-align:center;padding:20px;">
				<span style="color:#000;font-weight:normal">It's easy to invite your friends to Task Sonic, just <strong><a href="#" onclick="newInvite(); return false;">click here</a></strong> to invite your <strong><a href="#" onclick="newInvite(); return false;">facebook friends</strong></a> or enter your friend's emails below and send them an invitation via email. You can also import your firends email addresses from your favorite email client. <br /><br />Click on one of the image links below or to the right to get started.</span>
				</div>				
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Email_Addresses']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<div class="invite_col_left">
						<textarea id="recipient_list" name="mail_ids" class="textarea-short"><?php echo $this->_tpl_vars['mail_ids']; ?>
</textarea>
						<div class="clear"></div>
						<?php echo $this->_tpl_vars['lang']['Comment']; ?>
<?php echo $this->_tpl_vars['lang']['Example']; ?>
 
						</div>
						<div  class="invite_col_right">
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
aol-small.gif" align="bottom"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
gmail-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
outlook-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
yahoo-small.gif" align="absmiddle"/>
						</a>
						<div class="clear"></div>
						</div>							
					</div>					
				
	
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Invite1']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div class="invite_col_left">
					<textarea name="notes" class="textarea-short"><?php echo $this->_tpl_vars['notes']; ?>
</textarea>
					</div>
					<div class="invite_col_right">
					<div class="buttons">
					<button type="submit" name="Submit" class="negative" value="Preview Invitation" onclick="javascript : return Preview_Invitation();">
					Preview Invitation
					</button>
					</div>						
					<div class="clear"></div>				
					<div class="buttons">
					<button type="submit" name="Submit" class="negative" value="Send" onclick="javascript : return Check_Details(this.form);">
					Send Invitation
					</button>
					</div>						
					</div>
					<div class="clear"></div>
					</div>
		
			  
					</form>
					<br class="clear" />
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>
	  <div class="right-column-wrap">
	  <h3><?php echo $this->_tpl_vars['lang']['Invite']; ?>
</h3>
						<div  class="invite_right_rail">
						<a href="#" onclick="newInvite(); return false;">						
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
facebook.png" align="bottom"/>
						</a><br />						
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
aol-small.gif" align="bottom"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
gmail-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
outlook-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">
						<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
yahoo-small.gif" align="absmiddle"/>
						</a>
						<div class="clear"></div>
						</div>
						<div class="clear"></div>						
						<div style="padding:5px;"><strong><?php echo $this->_tpl_vars['lang']['Desc']; ?>
. </strong></div>
						<div class="clear"></div>							
						<div style="padding:5px;"><?php echo $this->_tpl_vars['lang']['Desc1']; ?>
.</div>
			<div class="clear"></div>
      </div><!--right-column-wrap-->
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->