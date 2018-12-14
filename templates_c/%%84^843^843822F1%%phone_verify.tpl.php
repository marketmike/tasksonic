<?php /* Smarty version 2.6.26, created on 2012-09-10 03:37:24
         compiled from phone_verify.tpl */ ?>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1>Get Phone Verified</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><?php if ($this->_tpl_vars['message']): ?><?php echo $this->_tpl_vars['message']; ?>
<?php else: ?>Verify Your Phone Number! Cost: $<?php echo $this->_tpl_vars['fee']; ?>
<?php endif; ?></label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<form method="post" action="get-phone-verified.html" name="frmVerify" enctype="multipart/form-data">
				<div class="message" style="text-align:left;padding:15px;margin-bottom:20px">
				<img src="http://www.tasksonic.com/images/phone-verified.png" style="float:left;margin-right:10px;margin-bottom:10px;width:100px;height:100px" alt="Phone Verified" title="Phone Verified">
				<?php if ($this->_tpl_vars['transaction_completed']): ?><?php echo $this->_tpl_vars['transaction_completed']; ?>
<br /><br /><?php else: ?><?php echo $this->_tpl_vars['info']; ?>
<br /><br /><?php endif; ?>
				<center>
				<?php if ($this->_tpl_vars['flag'] == 0): ?><span style="font-size:18px;font-weight:bold;padding:5px;background:#ccc;">Your Verification Code: <?php echo $this->_tpl_vars['code']; ?>
</span><br /><br /><?php endif; ?>
				<div class="clear"></div>
				<strong>Task Sonic User Name:</strong> <?php echo $this->_tpl_vars['user']; ?>
<br />
				<strong>Phone Number To Be Verified:</strong> <?php echo $this->_tpl_vars['formatted_phone_number']; ?>

				<br /><br />
				<span style="font-size:16px;color:red;font-weight:bold">
				<?php echo $this->_tpl_vars['warning']; ?>

				</span>
				</center>
				</div>
				<?php if ($this->_tpl_vars['flag'] == 0): ?>
				<div class="buttons">
				<button type="submit" value="verify"  name="Submit"  onclick="javascript: return Confirm_Click(document.frmVerify);"  style='text-decoration:none;' class="negative">
				CALL ME NOW!
				</button>
				</div>
				<?php endif; ?>
				<input type="hidden" name="Action" value=""/>
				<input type="hidden" name="verification_code" value="<?php echo $this->_tpl_vars['code']; ?>
"/>				
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