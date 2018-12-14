<?php /* Smarty version 2.6.26, created on 2012-08-14 09:49:01
         compiled from undecline.tpl */ ?>
<div id="popgrid_620">
<div class="clear"></div>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmundecline">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Decline_Bid']; ?>
</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="field">
					<?php echo $this->_tpl_vars['lang']['Decline_Msg']; ?>
<br /><br />
					<strong><?php echo $this->_tpl_vars['lang']['Provider_Name']; ?>
 : &nbsp;&nbsp;<a target="_blank" href="task_owner_profile_<?php echo $this->_tpl_vars['provider_name']; ?>
.html" class="footerLink"><?php echo $this->_tpl_vars['provider_name']; ?>
</a></strong>
					<div class="clear"></div>	
					</div>			
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Reason']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="reasons" class="textbox">
						<?php echo $this->_tpl_vars['reasons']; ?>

						</select>
					<div class="clear"></div>	
					</div>	
					<div class="clear"></div>
					<div class="buttons">
					<button type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Decline_Bid']; ?>
"><?php echo $this->_tpl_vars['lang']['Button_Decline_Bid']; ?>
</button>
					</div>						
					<div class="buttons">
					<button type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Cancel']; ?>
" onclick="Javascript: window.close();"><?php echo $this->_tpl_vars['lang']['Button_Cancel']; ?>
</button>
					</div>					
					<input type="hidden" name="provider_name" value="<?php echo $this->_tpl_vars['provider_name']; ?>
" />
					<input type="hidden" name="project_id" value="<?php echo $this->_tpl_vars['project_id']; ?>
" />
					<input type="hidden" name="bid_id" value="<?php echo $this->_tpl_vars['bid_id']; ?>
" />
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
					</form>
				<div class="clear"></div>	
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>	
	<div class="page_bottom"></div>	