<?php /* Smarty version 2.6.26, created on 2012-08-14 21:18:50
         compiled from users_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mod', 'users_edit.tpl', 92, false),array('modifier', 'in_array', 'users_edit.tpl', 94, false),)), $this); ?>
<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		User Manager [ <?php echo $this->_tpl_vars['Action']; ?>
 ]
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmUsers" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">User Manager [ <?php echo $this->_tpl_vars['Action']; ?>
 ]</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<!--<tr>
					<td colspan="4" align="left"><input type="submit" name="Submit" value="Back" class="stdButton"></td>
				</tr>-->
				<tr>
					<td width="24%" valign="top" class="fieldlabelRight">UserID :</td>
					<td width="25%" valign="top" class="fieldlabelLeft"><?php echo $this->_tpl_vars['user_login_id']; ?>
<?php if ($this->_tpl_vars['membership_id'] != 0): ?>&nbsp;(VIP member)<?php else: ?>&nbsp;<?php endif; ?> </td>
					<td width="20%" valign="top" class="fieldlabelRight">Email ID :</td>
					<td width="31%" valign="top" class="fieldlabelLeft"> <?php echo $this->_tpl_vars['mem_email']; ?>
</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">First Name :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_fname" class="textbox" value="<?php echo $this->_tpl_vars['mem_fname']; ?>
" /></td>
					<td class="fieldlabelRight" valign="top">Last Name :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_lname" class="textbox" value="<?php echo $this->_tpl_vars['mem_lname']; ?>
" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">City :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_city" class="textbox" value="<?php echo $this->_tpl_vars['mem_city']; ?>
" /></td>
					<td class="fieldlabelRight" valign="top">State :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_state" class="textbox" value="<?php echo $this->_tpl_vars['mem_state']; ?>
" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">County :</td>
					<td class="fieldlabelLeft" valign="top">					
					<select name="mem_country" style="width:145px;" class="textbox" tabindex="8">
						<option value="0">-Select a Country-</option>
						<?php echo $this->_tpl_vars['Country_List']; ?>

					</select>
					</td>
					
					<td class="fieldlabelRight" valign="top">Organization :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_oragnaz" class="textbox" value="<?php echo $this->_tpl_vars['mem_organization']; ?>
" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">No. of Employees :</td>
					<td class="fieldlabelLeft" valign="top">
						<select name="mem_emp" class="textbox" tabindex="5">
						<?php echo $this->_tpl_vars['mem_emp']; ?>

						</select>
					</td>
					<td class="fieldlabelRight" valign="top">Daytime Phone :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_daytime_phone" class="textbox" value="<?php echo $this->_tpl_vars['mem_daytime_phone']; ?>
" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Evening Phone :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_eve_phone" class="textbox" value="<?php echo $this->_tpl_vars['mem_eve_phone']; ?>
" /></td>
					<td class="fieldlabelRight" valign="top">Fax :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_fax" class="textbox" value="<?php echo $this->_tpl_vars['mem_fax_no']; ?>
" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Address :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_address" class="textbox" value="<?php echo $this->_tpl_vars['mem_address']; ?>
" /><BR><br><input type="text" name="mem_address1" class="textbox" value="<?php echo $this->_tpl_vars['mem_address1']; ?>
" /></td>
					<td class="fieldlabelRight" valign="top">Zipcode :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_zip" class="textbox" value="<?php echo $this->_tpl_vars['mem_zip_code']; ?>
" /></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Member Website :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="mem_website" class="textbox" value="<?php echo $this->_tpl_vars['mem_website']; ?>
" /></td>
					<td class="fieldlabelRight" valign="top">Wallet Amount :</td>
					<td class="fieldlabelLeft" valign="top">$&nbsp;<?php echo $this->_tpl_vars['totalamount']; ?>
</td>
				</tr>
				<tr>
				    <td class="fieldlabelLeft" valign="top" colspan="4"><strong>Areas of Interest/Expertise :</strong></td>
				</tr>
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="4">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
						   <?php $this->assign('col', 2); ?>
						   <?php unset($this->_sections['prod']);
$this->_sections['prod']['name'] = 'prod';
$this->_sections['prod']['loop'] = is_array($_loop=$this->_tpl_vars['Loop_cat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						   <tr> <?php endif; ?>
								<td valign="top" width="50%" class="fieldlabelLeft"><input class="stdCheckBox" type="checkbox" name="cat_prod[]" value="<?php echo $this->_tpl_vars['catid'][$this->_sections['prod']['index']]; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['catid'][$this->_sections['prod']['index']])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['checked_cat']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['checked_cat']))): ?>checked<?php endif; ?> />
								  &nbsp;<?php echo $this->_tpl_vars['catname'][$this->_sections['prod']['index']]; ?>
 </td>
								<?php if (((is_array($_tmp=$this->_sections['prod']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 0): ?>
						    </tr>
							   <?php endif; ?>
							<?php endfor; endif; ?>
						  </table>
					</td> 
				</tr>
				<tr>
					<td class="fieldlabelLeft" valign="top" colspan="4"><strong>Notify Options :</strong></td>
				</tr>
				<tr>
					   <td class="fieldlabelLeft" colspan="4">&nbsp;&nbsp;&nbsp;<input type="checkbox" name="check" value="1" <?php echo $this->_tpl_vars['chechked']; ?>
>&nbsp;&nbsp;&nbsp;Notify me by e-mail when  :</td>
					</tr>  
					<tr>
					   <td colspan="4" class="fieldlabelLeft">&nbsp;</td>
					</tr>
					<tr>
				 	  <td class="fieldlabelLeft" colspan="4">
					    <ul>
						<li>Someone places a bid on one of my projects</li><br />
						<li>A message is posted in my project's message board</li>
						</ul>
					 </td>
				    </tr>
				<tr>
				    <td class="fieldlabelLeft" valign="top" colspan="4"><strong>project Notices :</strong></td>
				</tr>
				<tr>
					<td colspan="4" class="fieldlabelRight">
						<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td height="25" align="fieldlabelLeft"><input type="radio" name="project_notices" value="1" <?php echo $this->_tpl_vars['option1']; ?>
/></td>
								<td width="91%" class="fieldlabelLeft">Notify me of all new projects posted on Getanhacker </td>
							</tr>
							<tr>
								<td height="25" align="fieldlabelLeft"><input type="radio" name="project_notices" value="2" <?php echo $this->_tpl_vars['option2']; ?>
/></td>
								<td width="91%" class="fieldlabelLeft">Notify me when new projects related to my area of interest/expertise are posted</td>
							</tr>
							</tr>
							<tr>
								<td height="25" align="fieldlabelLeft"><input type="radio" name="project_notices" value="3" <?php echo $this->_tpl_vars['option3']; ?>
></td>
								<td width="91%" class="fieldlabelLeft">Do not notify me about new projects</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
						<span id="Buyer_Show" style="visibility:visible;">
						<a href="javascript: show_Buyer()" class="actionlink"><strong>Buyers Profile</strong></a>
						</span>
						<span id="Buyer_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Buyer()" class="actionlink"><strong>Buyers Profile</strong></a>
						</span>
					</td>
				</tr>
			</table>
			<span id="Buyer_Hide_Details" style="visibility:hidden;display:none;">
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight" valign="top" width="24%">Slogan :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="buyers_slogan" value="<?php echo $this->_tpl_vars['buyers_slogan']; ?>
" size="100" maxLength="50" class="textbox"></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="24%">Description :</td>
					<td class="fieldlabelLeft"><textarea name="buyers_description" class="textbox" cols="97" rows="8"><?php echo $this->_tpl_vars['buyers_description']; ?>
</textarea></td>
				</tr>
			</table>
			</span>
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
						<span id="Seller_Show" style="visibility:visible;">
						<a href="javascript: show_Seller()" class="actionlink"><strong>Seller Profile</strong></a>
						</span>
						<span id="Seller_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Seller()" class="actionlink"><strong>Seller Profile</strong></a>
						</span>
					</td>
				</tr>
			</table>
			<span id="Seller_Hide_Details" style="visibility:hidden;display:none;">
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight" valign="top" width="24%">Slogan :</td>
					<td class="fieldlabelLeft" valign="top"><input type="text" name="seller_slogan" value="<?php echo $this->_tpl_vars['seller_slogan']; ?>
" class="textbox" size="100" maxLength="50"></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Description :</td>
					<td class="fieldlabelLeft" valign="top"><textarea name="seller_description" class="textbox" cols="97" rows="8"><?php echo $this->_tpl_vars['seller_description']; ?>
</textarea></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Rates Per Hour :</td>
					<td class="fieldlabelLeft" valign="top">
					<select name="rate_hour" class="textbox">
						<?php echo $this->_tpl_vars['Hourly_Rates']; ?>

					</select>
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Experience :</td>
					<td class="fieldlabelLeft" valign="top">
					<select name="Experience" class="textbox">
						<?php echo $this->_tpl_vars['Experience_List']; ?>

					</select></td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Industry :</td>
					<td class="fieldlabelLeft" valign="top">
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
								<td valign="top" width="50%" class="bodytextblack">
								<input class="stdCheckBox" type="checkbox" name="industry_id[]" id="industry_id[]" value="<?php echo $this->_tpl_vars['industry_id'][$this->_sections['prod']['index']]; ?>
" <?php if (((is_array($_tmp=$this->_tpl_vars['industry_id'][$this->_sections['prod']['index']])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['arr_industry']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['arr_industry']))): ?>checked<?php endif; ?>>&nbsp;<?php echo $this->_tpl_vars['industry_name'][$this->_sections['prod']['index']]; ?>

								</td>
						<?php if (((is_array($_tmp=$this->_sections['prod']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 0): ?>
							</tr>
						<?php endif; ?>
						<?php endfor; endif; ?>
						</table>
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Uploaded Image :</td>
					<td class="fieldlabelLeft" valign="top">
					<?php if ($this->_tpl_vars['seller_logo'] != ''): ?>
					<img src="<?php echo $this->_tpl_vars['path']; ?>
<?php echo $this->_tpl_vars['seller_logo']; ?>
" height="100" width="100"/>
					<?php else: ?>
					No Image Uploaded
					<?php endif; ?>
					</td>
				</tr>

				<tr>
					<td class="fieldlabelRight" valign="top">Skills and Ratings :</td>
					<td class="fieldlabelLeft" valign="top">
					<table width="75%" cellpadding="1" cellspacing="1" border="0">
						<tr>
							<td class="varnormal" align="center"><strong>Skill Name</strong></td>
							<td class="varnormal" align="center"><strong>Skill Rate</strong></td>
						</tr>
						<tr>
							<td><input name="skill_name_1" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_1']; ?>
"></td>
							<td><select name="skill_rate_1">
								<option><?php echo $this->_tpl_vars['Skill_Level_1']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_1" value="<?php echo $this->_tpl_vars['skill_id_1']; ?>
" />
							</td>
						</tr>
						<tr>
							<td><input name="skill_name_2" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_2']; ?>
"></td>
							<td><select name="skill_rate_2">
								<option><?php echo $this->_tpl_vars['Skill_Level_2']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_2" value="<?php echo $this->_tpl_vars['skill_id_2']; ?>
"/>
							</td>
						</tr>
						<tr>
							<td><input name="skill_name_3" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_3']; ?>
"></td>
							<td><select name="skill_rate_3">
								<option><?php echo $this->_tpl_vars['Skill_Level_3']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_3" value="<?php echo $this->_tpl_vars['skill_id_3']; ?>
"/>
							</td>
						</tr>
						<tr>
							<td><input name="skill_name_4" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_4']; ?>
"></td>
							<td><select name="skill_rate_4">
								<option><?php echo $this->_tpl_vars['Skill_Level_4']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_4" value="<?php echo $this->_tpl_vars['skill_id_4']; ?>
"/ >
							</td>
						</tr>
						<tr>
							<td><input name="skill_name_5" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_5']; ?>
"></td>
							<td><select name="skill_rate_5">
								<option><?php echo $this->_tpl_vars['Skill_Level_5']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_5" value="<?php echo $this->_tpl_vars['skill_id_5']; ?>
"/>
							</td>
						</tr>
						<tr>
							<td><input name="skill_name_6" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_6']; ?>
"></td>
							<td><select name="skill_rate_6">
								<option><?php echo $this->_tpl_vars['Skill_Level_6']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_6" value="<?php echo $this->_tpl_vars['skill_id_6']; ?>
" />
							</td>
						</tr>
						<tr>
							<td><input name="skill_name_7" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_7']; ?>
"></td>
							<td><select name="skill_rate_7">
								<option><?php echo $this->_tpl_vars['Skill_Level_7']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_7" value="<?php echo $this->_tpl_vars['skill_id_7']; ?>
" />
							</td>
						</tr>
						<tr>
							<td><input name="skill_name_8" type="text" size="40" value="<?php echo $this->_tpl_vars['skill_name_8']; ?>
"></td>
							<td><select name="skill_rate_8">
								<option><?php echo $this->_tpl_vars['Skill_Level_8']; ?>
</option>
								</option>
							</select>
							<input type="hidden" name="skill_id_8" value="<?php echo $this->_tpl_vars['skill_id_8']; ?>
" />
							</td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
			</span>
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td colspan="4" align="center">
						<input type="submit" name="Submit" value="Update" class="stdButton">&nbsp;&nbsp;<input type="submit" name="Submit" value="Cancel" class="stdButton">
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<input type="hidden" name="Action" value="<?php echo $this->_tpl_vars['Action']; ?>
"/>
	<input type="hidden" name="user_auth_id" value="<?php echo $this->_tpl_vars['user_auth_id']; ?>
"/>
	</form>
</table>