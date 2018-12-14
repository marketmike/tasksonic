<?php /* Smarty version 2.6.26, created on 2012-08-14 09:15:55
         compiled from verify.tpl */ ?>
<script language="javascript">
	var JS_Valid_Mail		 	 = 'Please enter a valid email address!';
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1><?php if ($this->_tpl_vars['verfiy_success'] == 1): ?>Your email has been successfully verified.<?php elseif ($this->_tpl_vars['show_form'] == 1): ?>Resend Verification Email<?php else: ?>Registration Success<?php endif; ?></h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><?php if ($this->_tpl_vars['show_form'] == 1): ?>Please Enter Your Email Address<?php else: ?>You're Almost Done<?php endif; ?></label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<?php if ($this->_tpl_vars['show_form'] == 1): ?>
				<div class="message" style="text-align:left;padding:10px">
					If you were redirected to this page after attempting to log in, you must first complete the email verification process. Enter the email address you used when you registered with Task Sonic to resend the verification. You will need to click on the link in the email to verify your email address before logging into the site.
				</div>				
					<form method="post" action="<?php echo $this->_tpl_vars['smaty']['server']['PHP_SELF']; ?>
" name="frmverify" id="frmverify">						
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Email Address</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input name="verify_email" value="" type="text" maxlength="40" tabindex="1" size="50" />
					<div class="clear"></div>	
					</div>						
						<input type="hidden" name="action" value="send_verification" />				
					<div class="buttons">
					<button type="submit" name="Submit" value="send_verification" onClick="Javascript: return Check_Details(this.form);">Submit</button>
					</div>
				<?php elseif ($this->_tpl_vars['verfiy_success'] == 1): ?>
				<div class="message" style="text-align:center;margin-bottom:50px;padding:10px">
				Your email has been successfully verified.<br /><a href="#" onclick="popup('loginDiv')">Login Now!</a>	
				</div>
				<?php elseif ($this->_tpl_vars['verified_check'] == 1): ?>
				<div class="message" style="text-align:center;margin-bottom:50px;padding:10px">
				<?php echo $this->_tpl_vars['ERROR']; ?>
<br /><a href="#" onclick="popup('loginDiv')">Login Now!</a>	
				</div>
				<?php else: ?>
					<div class="message" style="text-align:center;margin-bottom:50px;padding:10px"><?php echo $this->_tpl_vars['confirm']; ?>
</div>
				<?php endif; ?>
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