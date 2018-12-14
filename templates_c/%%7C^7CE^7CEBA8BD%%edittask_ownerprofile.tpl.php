<?php /* Smarty version 2.6.26, created on 2012-08-14 21:22:58
         compiled from edittask_ownerprofile.tpl */ ?>
<script language="javascript">
	var JS_EN_Slogan	 = '<?php echo $this->_tpl_vars['lang']['JS_EN_Slogan']; ?>
';
	var JS_EN_Desc		 = '<?php echo $this->_tpl_vars['lang']['JS_EN_Desc']; ?>
';
	var JS_Image			 = '<?php echo $this->_tpl_vars['lang']['JS_Image']; ?>
';
	var JS_Company_Logo		 = '<?php echo $this->_tpl_vars['lang']['JS_Company_Logo']; ?>
';	
	addLoadEvent(prepareInputsForHints);
</script>

<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['Ln_En']; ?>
</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<?php if ($this->_tpl_vars['ERROR']): ?>
			<div class="message"><?php echo $this->_tpl_vars['ERROR']; ?>
</div>
			<?php endif; ?>
			<div class="clear"></div>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmeditbuyer" enctype="multipart/form-data">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Introduction</label>
						</div>
					</div>
					<div class="clear"></div>
						<div class="field" style="margin-bottom:20px;">
						<span style="width:100%;text-align:center;"><?php echo $this->_tpl_vars['lang']['Intro']; ?>
</span>
						</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['EN_Slogan']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="en_buyers_slogan" value="<?php echo $this->_tpl_vars['en_buyers_slogan']; ?>
"  type="text" tabindex="1" size="110" maxLength="50" />
						<span class="hint">Enter a slogan or phrase that summarizes your profile<span class="hint-pointer">&nbsp;</span></span>						
					<div class="clear"></div>
					</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['EN_Description']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_buyers_description" class="textarea" cols="90" rows="10"><?php echo $this->_tpl_vars['en_buyers_description']; ?>
</textarea>
						<span class="hint">Enter a description of yourself or your business. (3000 character max)<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>	

					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Company_logo']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<input type="file" class="textbox" name="company_logo"><br />
					<span class="hint">Maximum 1 MB, jpg, jpeg, or png<span class="hint-pointer">&nbsp;</span></span>				
					  <?php if ($this->_tpl_vars['seller_logo'] != ''): ?>
					  <br />
					  <img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_<?php echo $this->_tpl_vars['seller_logo']; ?>
" height="100" width="100"/>
					  <br />
					  <a href="Javascript: Delete_Image('<?php echo $this->_tpl_vars['User_Id']; ?>
')" class="footerlinkcommon2" ><?php echo $this->_tpl_vars['lang']['Remove']; ?>
</a>
					  <?php endif; ?>
					  <?php if ($this->_tpl_vars['seller_logo'] == ''): ?>
					  <br />					  
					  <img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_default.jpg" height="100" width="100"/>
					  <br />
					  <?php endif; ?>
					</div>											
					
					<div class="clear"></div>
					<div class="field">
						<div class="buttons">
							<button type="submit" name="Submit" class="negative" value="<?php echo $this->_tpl_vars['lang']['Submit']; ?>
" onClick="Javascript: return Check_Details(this.form);">
							Save Profile
							</button>			
						</div>
					</div>
					<div class="clear"></div>
					<input type="hidden" name="Action" value="Edit">
					<input type="hidden" name="User_Id" value="<?php echo $this->_tpl_vars['User_Id']; ?>
">
					<input type="hidden" name="img" value="<?php echo $this->_tpl_vars['seller_logo']; ?>
"/>
					</form>
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