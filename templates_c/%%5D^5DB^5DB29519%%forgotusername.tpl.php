<?php /* Smarty version 2.6.26, created on 2012-08-11 23:32:10
         compiled from forgotusername.tpl */ ?>
<script language="javascript">
	var JS_User_ID		 = '<?php echo $this->_tpl_vars['lang']['JS_User_ID']; ?>
';
	var JS_Valid_Mail 	 = '<?php echo $this->_tpl_vars['lang']['JS_Valid_Mail']; ?>
';
</script>				

<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['Forgotusername_Page']; ?>
</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						<?php echo $this->_tpl_vars['lang']['Forgotusername_Page']; ?>
						
						</label>
					</div>
					</div>
					<div class="clear"></div>
						<?php if ($this->_tpl_vars['msg']): ?>
						<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['msg']; ?>
</div>
						<?php else: ?>
						<div class="note" style="text-align:center;padding:20px;">Enter the email address you registered with to have your password sent!</div>
						<?php endif; ?>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmForgotpasswd">
							<div class="title-links" style="width:400px;">
							<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Email_Address']; ?>
</label>
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
							<button type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Submit']; ?>
" onClick="Javascript: return Check_Details(this.form);">Send User Name</button>
							</div>
							<div class="clear"></div>
							</div>							
						<input type="hidden" name="Action" value="<?php echo $this->_tpl_vars['Action']; ?>
">
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