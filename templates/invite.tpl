{literal}
<script>
	function newInvite(){
		 var receiverUserIds = FB.ui({ 
				method : 'apprequests',
				message: 'Check out Task Sonic, help for the everyday things you need done... you can even earn some cash helping others. Visit {/literal}{$referral_link}{literal}',
		 },
		 function(receiverUserIds) {
				  console.log("IDS : " + receiverUserIds.request_ids);
				}
		 );
		 //http://developers.facebook.com/docs/reference/dialogs/requests/
	}
</script>
{/literal}
<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
	<h1>{$lang.Invite}</h1>
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
							<label for="login-email-address">{$lang.Email_Addresses}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<div class="invite_col_left">
						<textarea id="recipient_list" name="mail_ids" class="textarea-short">{$mail_ids}</textarea>
						<div class="clear"></div>
						{$lang.Comment}{$lang.Example} 
						</div>
						<div  class="invite_col_right">
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="{$Templates_Image}aol-small.gif" align="bottom"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="{$Templates_Image}gmail-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="{$Templates_Image}outlook-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">
						<img src="{$Templates_Image}yahoo-small.gif" align="absmiddle"/>
						</a>
						<div class="clear"></div>
						</div>							
					</div>					
				
	
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">{$lang.Invite1}</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<div class="invite_col_left">
					<textarea name="notes" class="textarea-short">{$notes}</textarea>
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
	  <h3>{$lang.Invite}</h3>
						<div  class="invite_right_rail">
						<a href="#" onclick="newInvite(); return false;">						
						<img src="{$Templates_Image}facebook.png" align="bottom"/>
						</a><br />						
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="{$Templates_Image}aol-small.gif" align="bottom"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="{$Templates_Image}gmail-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">						
						<img src="{$Templates_Image}outlook-small.gif" align="absmiddle"/>
						</a><br />
						<div class="clear"></div>
						<a href="#" onclick="showPlaxoABChooser('recipient_list', '/callback.html'); return false" class="footerlink">
						<img src="{$Templates_Image}yahoo-small.gif" align="absmiddle"/>
						</a>
						<div class="clear"></div>
						</div>
						<div class="clear"></div>						
						<div style="padding:5px;"><strong>{$lang.Desc}. </strong></div>
						<div class="clear"></div>							
						<div style="padding:5px;">{$lang.Desc1}.</div>
			<div class="clear"></div>
      </div><!--right-column-wrap-->
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->