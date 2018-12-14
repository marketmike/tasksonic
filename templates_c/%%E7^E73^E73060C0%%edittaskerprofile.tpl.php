<?php /* Smarty version 2.6.26, created on 2012-08-14 21:24:11
         compiled from edittaskerprofile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mod', 'edittaskerprofile.tpl', 107, false),array('modifier', 'in_array', 'edittaskerprofile.tpl', 111, false),)), $this); ?>
<script language="javascript">
	var JS_en_slogan		 = '<?php echo $this->_tpl_vars['lang']['JS_en_slogan']; ?>
';
	var JS_Cate				 = '<?php echo $this->_tpl_vars['lang']['JS_Cate']; ?>
';
	var JS_Skill_1			 = '<?php echo $this->_tpl_vars['lang']['JS_Skill_1']; ?>
';
	var JS_Skill_Rate_1		 = '<?php echo $this->_tpl_vars['lang']['JS_Skill_Rate_1']; ?>
';
	var JS_Image			 = '<?php echo $this->_tpl_vars['lang']['JS_Image']; ?>
';
	var JS_Indus			 = '<?php echo $this->_tpl_vars['lang']['JS_Indus']; ?>
';
	var JS_Company_Logo		 = '<?php echo $this->_tpl_vars['lang']['JS_Company_Logo']; ?>
';
	var JS_Mother_Lang		 = '<?php echo $this->_tpl_vars['lang']['JS_Mother_Lang']; ?>
';
	var JS_Lang_Pairs		 = '<?php echo $this->_tpl_vars['lang']['JS_Lang_Pairs']; ?>
';
addLoadEvent(prepareInputsForHints);	
</script>			
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['Edit_Seller']; ?>
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
" name="frmeditSeller" enctype="multipart/form-data">
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Introduction</label>
						</div>
					</div>
					<div class="clear"></div>
						<div class="field" style="margin-bottom:20px;">
						<span style="width:100%;text-align:center;"><?php echo $this->_tpl_vars['lang']['Intro']; ?>
</span>
						<div class="clear"></div>
						</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Slogan_En']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<input name="en_seller_slogan" value="<?php echo $this->_tpl_vars['en_seller_slogan']; ?>
"  type="text" tabindex="1" size="110" maxLength="50" />
						<span class="hint"><?php echo $this->_tpl_vars['lang']['Slogan_Hint']; ?>
<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>	
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Desc_En']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_seller_description" class="textarea" cols="90" rows="10"><?php echo $this->_tpl_vars['en_seller_description']; ?>
</textarea>
						<span class="hint"><?php echo $this->_tpl_vars['lang']['Desc_Hint']; ?>
<span class="hint-pointer">&nbsp;</span></span>
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
					<div class="clear"></div>
					</div>							
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Rate_Per_Hour']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<select name="rate_hour" class="dropdownshort">
							<?php echo $this->_tpl_vars['Hourly_Rates']; ?>

						</select>
						<span class="hint"><?php echo $this->_tpl_vars['lang']['Rate_Note']; ?>
<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>										
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Indu_Exp']; ?>
</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<h3>You can make up to 5 selections</h3>
						<table cellpadding="3" cellspacing="4" border="0" width="100%">
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
								<td valign="top" width="33%" class="bodytext">
								<input class="shorter" type="checkbox" name="industry_id[]" id="industry_id[]" value="<?php echo $this->_tpl_vars['industry_id'][$this->_sections['prod']['index']]; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['industry_id'][$this->_sections['prod']['index']])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['arr_industry']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['arr_industry']))): ?>checked<?php endif; ?>>&nbsp;<span style="height:30px;line-height:35px;font-size:18px"><?php echo $this->_tpl_vars['industry_name'][$this->_sections['prod']['index']]; ?>
</span>
								</td>
						<?php if (((is_array($_tmp=$this->_sections['prod']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 0): ?>
							</tr>
						<?php endif; ?>
						<?php endfor; endif; ?>
						</table>
						<span class="hint">You can make up to 5 selections<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
					</div>									
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Skill Details</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field short">
					<h3>Examples: Plumbing Repair, Landscaping, Couponing</h3>
						<table cellpadding="3" cellspacing="4" border="0" width="98%">
							<tr>
								<td width="60%" class="bodytextblack"><strong><?php echo $this->_tpl_vars['lang']['Skill_Title']; ?>
</strong></td>
								<td width="40%" class="bodytextblack"><strong><?php echo $this->_tpl_vars['lang']['Skill_Level']; ?>
</strong></td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_1" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_1']; ?>
" class="short"></td>
								<td><select name="skill_rate_1" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_1']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_1" value="<?php echo $this->_tpl_vars['skill_id_1']; ?>
" />
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_2" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_2']; ?>
" class="short"></td>
								<td><select name="skill_rate_2" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_2']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_2" value="<?php echo $this->_tpl_vars['skill_id_2']; ?>
"/>
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_3" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_3']; ?>
" class="short"></td>
								<td><select name="skill_rate_3" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_3']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_3" value="<?php echo $this->_tpl_vars['skill_id_3']; ?>
"/>
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_4" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_4']; ?>
" class="short"></td>
								<td><select name="skill_rate_4" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_4']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_4" value="<?php echo $this->_tpl_vars['skill_id_4']; ?>
"/ >
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_5" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_5']; ?>
" class="short"></td>
								<td><select name="skill_rate_5" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_5']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_5" value="<?php echo $this->_tpl_vars['skill_id_5']; ?>
"/>
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_6" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_6']; ?>
" class="short"></td>
								<td><select name="skill_rate_6" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_6']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_6" value="<?php echo $this->_tpl_vars['skill_id_6']; ?>
" />
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_7" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_7']; ?>
" class="short"></td>
								<td><select name="skill_rate_7" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_7']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_7" value="<?php echo $this->_tpl_vars['skill_id_7']; ?>
" />
								</td>
							</tr>
							<tr>
								<td class="bodytext"><input name="skill_name_8" type="text" size="30" value="<?php echo $this->_tpl_vars['skill_name_8']; ?>
" class="short"></td>
								<td><select name="skill_rate_8" class="dropdownmini">
									<option><?php echo $this->_tpl_vars['Skill_Level_8']; ?>
</option>
									</option>
								</select>
								<input type="hidden" name="skill_id_8" value="<?php echo $this->_tpl_vars['skill_id_8']; ?>
" />
								</td>
							</tr>
						</table>
						<span class="hint"><?php echo $this->_tpl_vars['lang']['Skill_Note_1']; ?>
<BR><?php echo $this->_tpl_vars['lang']['Skill_Note_2']; ?>
<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>
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
