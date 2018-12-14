<?php /* Smarty version 2.6.26, created on 2012-08-12 01:02:44
         compiled from signup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mod', 'signup.tpl', 298, false),array('modifier', 'in_array', 'signup.tpl', 302, false),)), $this); ?>
<script language="javascript">
	var JS_User_ID				 = '<?php echo $this->_tpl_vars['lang']['JS_User_ID']; ?>
';
	var JS_Fname 				 = '<?php echo $this->_tpl_vars['lang']['JS_Fname']; ?>
';
	var JS_Lname				 = '<?php echo $this->_tpl_vars['lang']['JS_Lname']; ?>
';
	var JS_Passwd 				 = '<?php echo $this->_tpl_vars['lang']['JS_Passwd']; ?>
';
	var JS_Password_Short 		 = 'Password must be between 8 and 16 characters';
	var JS_Re_Passwd			 = '<?php echo $this->_tpl_vars['lang']['JS_Re_Passwd']; ?>
';
	var JS_Confirm 				 = '<?php echo $this->_tpl_vars['lang']['JS_Confirm']; ?>
';
	var JS_City					 = '<?php echo $this->_tpl_vars['lang']['JS_City']; ?>
';
	var JS_Valid_Mail		 	 = '<?php echo $this->_tpl_vars['lang']['JS_Valid_Mail']; ?>
';
	var JS_Terms				 = '<?php echo $this->_tpl_vars['lang']['JS_Terms']; ?>
';
	var JS_Country				 = '<?php echo $this->_tpl_vars['lang']['JS_Country']; ?>
';
	var JS_Check_User_Login		 = '<?php echo $this->_tpl_vars['lang']['JS_Check_User_Login']; ?>
';
	var JS_Check_User_Lenght	 = '<?php echo $this->_tpl_vars['lang']['JS_Check_User_Lenght']; ?>
';
	var JS_Check_Special_Cha	 = '<?php echo $this->_tpl_vars['lang']['JS_Check_Special_Cha']; ?>
';
	var JS_Check_Special_Cha2	 = '<?php echo $this->_tpl_vars['lang']['JS_Check_Special_Cha2']; ?>
';	
	var JS_Role					 = '<?php echo $this->_tpl_vars['lang']['JS_Role']; ?>
';
	var JS_Areas				 = '<?php echo $this->_tpl_vars['lang']['JS_Areas']; ?>
';
	var JS_Address				 = '<?php echo $this->_tpl_vars['lang']['JS_Address']; ?>
';
	var JS_Zipcode				 = '<?php echo $this->_tpl_vars['lang']['JS_Zipcode']; ?>
';
	var JS_Phone 		 		 = 'Please provide a 10 digit phone number';
	var JS_Valid_Phone           = 'Please provide a 10 digit phone number';
	var JS_Phone1 	 	 = 'The phone number is not a valid US format, e.g. (555) 555-5555 or 555-555-5555';
	var JS_Mobile 		 = 'The mobile phone number is not a valid US format, e.g. (555) 555-5555 or 555-555-5555';
	var JS_Check_Role    = ' You must select at least one reason for "How may we serve you?"';
	addLoadEvent(prepareInputsForHints);	


</script>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
	<h1>SIGN UP</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmSignup" id="frmSignup">
				<input type="hidden" name="Action" value="Signup">
				<input type="hidden" name="aff_user" value="<?php echo $this->_tpl_vars['aff']; ?>
">
				<input type="hidden" name="invitation_id" value="<?php echo $this->_tpl_vars['invitation_id']; ?>
">				
				<?php if ($this->_tpl_vars['fbconnect'] == register): ?>
				<input name="fbid" value="<?php echo $this->_tpl_vars['fbid']; ?>
" type="hidden"  />
				<?php endif; ?>
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">Register To Begin</label>
					</div>
				</div>
				<div class="clear"></div>
				<div class="field username account_login" style="margin-bottom:20px;">
				<div style="margin:0 auto;text-align:center;"><?php echo $this->_tpl_vars['lang']['intro']; ?>
</div>
				<div style="text-align:center;margin:0 auto;margin-top:10px;margin-bottom:10px">
				Have a facebook account?<br />	
				<a href="#" onClick="fbconnect_login();popup('loginDiv'); return false;"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/connect_fb.png" style="vertical-align:middle;margin-right:5px;"/></a>	
				</div>
				<div class="clear"></div>
				</div>				
				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['User_ID']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<?php if ($this->_tpl_vars['fbconnect'] == register): ?>
				<input name="user_id" class="hinthelp" value="<?php echo $this->_tpl_vars['username']; ?>
" type="text" tabindex="1" size="25" /><div id="user_checking"></div>							
				<?php else: ?>
				<input name="user_id" class="hinthelp" value="<?php echo $this->_tpl_vars['user_id']; ?>
" type="text" tabindex="1" size="25" /><div id="user_checking"></div>
				<?php endif; ?>
				<span class="hint"><?php echo $this->_tpl_vars['lang']['User_Hint']; ?>
<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>
				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Password']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="password" value="<?php echo $this->_tpl_vars['password']; ?>
" type="password" tabindex="2" size="25" onkeyup="passwordStrength(this.value)" />
				<span class="hint"><?php echo $this->_tpl_vars['lang']['Password_Hint']; ?>
<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				<strong>Password strength</strong>
				<div id="passwordDescription">Password not entered</div>
				<div id="passwordStrength" class="strength0"></div>
				<div class="clear"></div>				
				</div>				

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">Retype your password</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="password_retype" value="<?php echo $this->_tpl_vars['password_retype']; ?>
" type="password" tabindex="3" size="25" />
				<span class="hint"><?php echo $this->_tpl_vars['lang']['Password_Repeat_Hint']; ?>
<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['First_Name']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<?php if ($this->_tpl_vars['fbconnect'] == register): ?>
				<input id="mem_fname" name="mem_fname" value="<?php echo $this->_tpl_vars['first_name']; ?>
" type="text" tabindex="4" size="25" />				
				<?php else: ?>
				<input id="mem_fname" name="mem_fname" value="<?php echo $this->_tpl_vars['mem_fname']; ?>
" type="text" tabindex="4" size="25" />
				<?php endif; ?>	
				<span class="hint">Please enter your first name here<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Last_Name']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<?php if ($this->_tpl_vars['fbconnect'] == register): ?>
				<input id="mem_lname" name="mem_lname" value="<?php echo $this->_tpl_vars['last_name']; ?>
" type="text" tabindex="5" size="25" />
				<?php else: ?>
				<input id="mem_lname" name="mem_lname" value="<?php echo $this->_tpl_vars['mem_lname']; ?>
" type="text" tabindex="5" size="25" />
				<?php endif; ?>
				<span class="hint">Please enter your last name here<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				</div>	
								
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Phone']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input  id="mem_phone"  name="mem_phone" value="<?php echo $this->_tpl_vars['mem_phone']; ?>
" type="text" tabindex="7" size="25" />
				<span class="hint">Please enter your phone number here, e.g. (555) 555-5555 or 555-555-5555<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	
				
					
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Mobile']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input id="mem_mobile" name="mem_mobile" value="<?php echo $this->_tpl_vars['mem_mobile']; ?>
" type="text" tabindex="8" size="25" />
				<span class="hint">Please enter your mobile phone number here, e.g. (555) 555-5555 or 555-555-5555<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">Your Location</label>
					</div>
				</div>
				<div class="clear"></div>
					<div class="field username account_login" style="margin-bottom:20px;text-align:left">
					<span style="width:auto;text-align:left;"><?php echo $this->_tpl_vars['lang']['Location_Note']; ?>
</span>
					</div>	
				<div class="clear"></div>				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Address']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input name="mem_address" value="<?php echo $this->_tpl_vars['mem_address']; ?>
" type="text" tabindex="9" size="25" />
				<span class="hint">Please enter your address here<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['City']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<select name="mem_city" tabindex="13" class="dropdownmedium">
				<option value="0">-Select Your City-</option>
				<?php echo $this->_tpl_vars['City_List']; ?>

				</select>	
				<span class="hint"><?php echo $this->_tpl_vars['lang']['City_Message']; ?>
<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>		

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['State_Province']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<select name="mem_state" tabindex="13" class="dropdownmedium">
				<option value="0">-Select Your State-</option>
				<?php echo $this->_tpl_vars['State_List']; ?>

				</select>
				<span class="hint"><?php echo $this->_tpl_vars['lang']['State_Message']; ?>
<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	
				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Zip_Code']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">				
				<input name="mem_zipcode" value="<?php echo $this->_tpl_vars['mem_zipcode']; ?>
" type="text" tabindex="11" size="25" />
				<span class="hint"><?php echo $this->_tpl_vars['lang']['Zip_Message']; ?>
<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Country']; ?>
</label>
					</div>
				</div>				
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<select name="mem_country" tabindex="13" class="dropdownmedium">
				<option value="0">-Select Your Country-</option>
				<?php echo $this->_tpl_vars['Country_List']; ?>

				</select>	
				<span class="hint">Please select your country from the available countries currently served<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Email_Address']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<?php if ($this->_tpl_vars['fbconnect'] == register): ?>
				<input name="mem_email" value="<?php echo $this->_tpl_vars['fbemail']; ?>
" type="text" tabindex="14" size="25" readonly />
				<?php else: ?>
				<input name="mem_email" value="<?php echo $this->_tpl_vars['mem_email']; ?>
" type="text"  tabindex="14" size="25"  />
				<?php endif; ?>
				<span class="hint">Please enter your email here<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>					

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Select_Your_Role']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<div class="clear"></div>
				<span><?php echo $this->_tpl_vars['lang']['Role_Message']; ?>
</span>
				<div class="clear"></div>			
				<div style="line-height:40px;font-size:18px;vertical-align:middle"><input type="checkbox" name="check_buyer" class="shorter" value="1" tabindex="15" />&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['lang']['Select_Buyer_Role']; ?>
</div>
				<div class="clear"></div>				
				<div style="line-height:40px;font-size:18px;vertical-align:middle"><input type="checkbox" name="check_seller" value="1" class="shorter" tabindex="16"  />&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['lang']['Select_Seller_Role']; ?>
</div>
				<div class="clear"></div>				
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Areas']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<strong>Select between 1 and 5</strong>
				<div class="clear"></div>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<?php $this->assign('col', 2); ?>
				<?php unset($this->_sections['prod']);
$this->_sections['prod']['name'] = 'prod';
$this->_sections['prod']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prod']['show'] = true;
$this->_sections['prod']['max'] = $this->_sections['prod']['loop'];
$this->_sections['prod']['step'] = 1;
$this->_sections['prod']['start'] = $this->_sections['prod']['step'] > 0 ? 0 : $this->_sections['prod']['loop']-1;
if ($this->_sections['prod']['show']) {
    $this->_sections['prod']['total'] = $this->_sections['prod']['loop'];
    if ($this->_sections['prod']['total'] == 0)
        $this->_sections['prod']['show'] = false;
} else
    $this->_sections['prod']['total'] = 0;
if ($this->_sections['prod']['show']):

            for ($this->_sections['prod']['index'] = $this->_sections['prod']['start'], $this->_sections['prod']['iteration'] = 1;
                 $this->_sections['prod']['iteration'] <= $this->_sections['prod']['total'];
                 $this->_sections['prod']['index'] += $this->_sections['prod']['step'], $this->_sections['prod']['iteration']++):
$this->_sections['prod']['rownum'] = $this->_sections['prod']['iteration'];
$this->_sections['prod']['index_prev'] = $this->_sections['prod']['index'] - $this->_sections['prod']['step'];
$this->_sections['prod']['index_next'] = $this->_sections['prod']['index'] + $this->_sections['prod']['step'];
$this->_sections['prod']['first']      = ($this->_sections['prod']['iteration'] == 1);
$this->_sections['prod']['last']       = ($this->_sections['prod']['iteration'] == $this->_sections['prod']['total']);
?>
				<?php if (((is_array($_tmp=$this->_sections['prod']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 1): ?>
				<tr>
				<?php endif; ?>
					<td valign="top" width="25%" class="style3">
					<div style="line-height:40px;font-size:18px;vertical-align:middle"><input type="checkbox" class="shorter" name="cat_prod[]" value="<?php echo $this->_tpl_vars['catid'][$this->_sections['prod']['index']]; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['catid'][$this->_sections['prod']['index']])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['checked_cat']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['checked_cat']))): ?>checked<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['catname'][$this->_sections['prod']['index']]; ?>
</div>
					</td>
				<?php if (((is_array($_tmp=$this->_sections['prod']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 0): ?>
				</tr>
				<?php endif; ?>
				<?php endfor; endif; ?>
				</table>
				<span class="hint">Please select your interest and or expertise<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>	

				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">Notifications</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="radio" class="shorter" name="project_notices" value="1" /><?php echo $this->_tpl_vars['lang']['task_Notices1']; ?>
</div>
				<div class="clear"></div>			
				<div style="line-height:40px;vertical-align:middle"><input type="radio" class="shorter" name="project_notices" value="2" /><?php echo $this->_tpl_vars['lang']['task_Notices2']; ?>
</div>
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="radio" name="project_notices" class="shorter" value="3" checked="checked"/><?php echo $this->_tpl_vars['lang']['task_Notices4']; ?>
</div>
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="checkbox" class="shorter" name="check" value="1" checked="checked"><?php echo $this->_tpl_vars['lang']['Notify']; ?>
 <?php echo $this->_tpl_vars['lang']['Options1']; ?>
 or <?php echo $this->_tpl_vars['lang']['Options2']; ?>
</div>					
				<span class="hint">Please select options for notification by email<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				<div style="line-height:40px;vertical-align:middle"><input type="checkbox" class="shorter" name="newsletter" value="1" checked="checked">Subscribe to Newsletter</div>					
				<span class="hint">Receive important updates and tips from Task Sonic<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>				
				<?php 
				global $register;
				if ($fbconnect == register) {
				 ?>
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address">Publish To Facebook</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field" style="line-height:24px;">
				<div style="line-height:40px;font-size:18px;vertical-align:middle"><input type="checkbox" class="shorter" name="fb_publish" checked> Publish my post and activity to my Facebook wall</div>
				<span class="hint">Publish your tasks and activity automatically to your facebook wall.<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>
				</div>				
				<?php 
				}
				 ?>	
				
				<div class="title-links" style="width:400px;">
					<div class="form_page_text" style="text-align:right;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['terms_title']; ?>
</label>
					</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<div style="width=500px;height:200px;overflow:scroll"><?php echo $this->_tpl_vars['terms']; ?>
</div>
				<div class="clear"></div>
				<div style="line-height:30px;vertical-align:middle"><input type="checkbox" class="shorter" name="agree">&nbsp;&nbsp;<?php echo $this->_tpl_vars['lang']['Agree1']; ?>
&nbsp;<a href="Javascript: View_Terms()" class="footerlink"><?php echo $this->_tpl_vars['lang']['Agree2']; ?>
</a></div>
				<span class="hint">Please read and agree to the site terms before submitting<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>				
				</div>
				<div class="buttons">				
				<button type="submit" class="regular" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Submit']; ?>
" onClick="Javascript: return Check_Details(frmSignup);">
					Signup
				</button>
				</div>
				<div class="clear"></div>				
			</form>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Marketing']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_PostLoggedOut']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_MapLoggedOut']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->