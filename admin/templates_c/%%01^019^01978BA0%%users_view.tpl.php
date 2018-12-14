<?php /* Smarty version 2.6.26, created on 2012-08-14 21:20:53
         compiled from users_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mod', 'users_view.tpl', 90, false),array('modifier', 'truncate', 'users_view.tpl', 219, false),array('modifier', 'string_format', 'users_view.tpl', 265, false),array('function', 'cycle', 'users_view.tpl', 212, false),)), $this); ?>
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
				<tr>
					<td colspan="4" align="left"><input type="submit" name="Submit" value="Back" class="stdButton"></td>
				</tr>
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
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_fname']; ?>
</td>
					<td class="fieldlabelRight" valign="top">Last Name :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_lname']; ?>
</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">City :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_city']; ?>
</td>
					<td class="fieldlabelRight" valign="top">State :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_state']; ?>
</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">County :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_country']; ?>
</td>
					<td class="fieldlabelRight" valign="top">Organization :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_organization']; ?>
</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">No. of Employees :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_employes']; ?>
</td>
					<td class="fieldlabelRight" valign="top">Daytime Phone :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_daytime_phone']; ?>
</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Evening Phone :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_eve_phone']; ?>
</td>
					<td class="fieldlabelRight" valign="top">Fax :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_fax_no']; ?>
</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Address :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_address']; ?>
<BR><?php echo $this->_tpl_vars['mem_address1']; ?>
</td>
					<td class="fieldlabelRight" valign="top">Zipcode :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_zip_code']; ?>
</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top">Member Website :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_website']; ?>
</td>
					<td class="fieldlabelRight" valign="top">Wallet Amount :</td>
					<td class="fieldlabelLeft" valign="top">$&nbsp;<?php echo $this->_tpl_vars['totalamount']; ?>
</td>
				</tr>
				<tr>
				    <td class="fieldlabelRight" valign="top">project Notices :</td>
					<td class="fieldlabelLeft" valign="top"> <?php echo $this->_tpl_vars['mem_pro_notice']; ?>
</td>
					<td class="fieldlabelRight" valign="top">Options :</td>
					<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['mem_option']; ?>
 </td>
				</tr>
			</table>	
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
			   <tr>
			      <td class="fieldlabelRight1" valign="top" align="left">Areas of Interest/Expertise :</td>
			   </tr>
			   <tr>
				   <td colspan="3">
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
							<?php $this->assign('col', 3); ?>
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
									<td valign="top" width="25%" class="fieldlabelRight2">
										&nbsp;<?php echo $this->_tpl_vars['catname'][$this->_sections['prod']['index']]; ?>

									</td>
							<?php if (((is_array($_tmp=$this->_sections['prod']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 0): ?>
								</tr>
							<?php endif; ?>
							<?php endfor; endif; ?>
							</table>
					</td>
				</tr>	
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
						<span id="Buyer_Show" style="visibility:visible;">
						<a href="javascript: show_Buyer()" class="actionlink"><strong>Task Owner Profile</strong></a>
						</span>
						<span id="Buyer_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Buyer()" class="actionlink"><strong>Task Owner Profile</strong></a>
						</span>
					</td>
				</tr>
			</table>	
		<span id="Buyer_Hide_Details" style="visibility:hidden;display:none;">
		<table border="0" cellpadding="1" cellspacing="2" width="90%">
			<tr>
				<td class="fieldlabelRight" valign="top" width="24%">Slogan :</td>
				<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['buyers_slogan']; ?>
</td>
			</tr>
			<tr>
				<td class="fieldlabelRight" valign="top" width="24%">Description :</td>
				<td class="fieldlabelLeft">&nbsp;</td>
			</tr>
			<tr>
				<td class="fieldLabelLeft1" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['buyers_description']; ?>
</td>
			</tr>
		</table>
		</span>
		<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
						<span id="Seller_Show" style="visibility:visible;">
						<a href="javascript: show_Seller()" class="actionlink"><strong>Tasker Profile</strong></a>
						</span>
						<span id="Seller_Hide" style="visibility:hidden;display:none;">
						<a href="javascript: hide_Seller()" class="actionlink"><strong>Tasker Profile</strong></a>
						</span>
					</td>
				</tr>
			</table>	
				   <span id="Seller_Hide_Details" style="visibility:hidden;display:none;">
						<table border="0" cellpadding="1" cellspacing="2" width="90%">
							<tr>
								<td class="fieldlabelRight" valign="top" width="24%">Slogan :</td>
								<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['seller_slogan']; ?>
</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Description :</td>
								<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['seller_description']; ?>
</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Rates Per Hour :</td>
								<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['seller_rate_per_hour']; ?>
 $</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Experience :</td>
								<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['seller_exp']; ?>
</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Industry :</td>
								<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['industries']; ?>
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
									<?php $_from = $this->_tpl_vars['Listing']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['skills'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['skills']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['skills']):
        $this->_foreach['skills']['iteration']++;
?>
									<tr>
										<td class="varnormal" align="center"><?php echo $this->_tpl_vars['skills']->skill_name; ?>
</td>
										<td class="varnormal" align="center"><?php echo $this->_tpl_vars['skills']->skill_rate; ?>
</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?>
								</table>
								</td>
							</tr>
							<tr>
								<td class="fieldlabelRight" valign="top">Average Skills :</td>
								<td class="fieldlabelLeft" valign="top"><?php echo $this->_tpl_vars['average_skill']; ?>
</td>
							</tr>
						</table>
						</span>
		<table border="0" cellpadding="1" cellspacing="2" width="90%">
			<tr>
				<td class="fieldlabelRight1" valign="top" align="left">
					<span id="Seller_Protfolio_Show" style="visibility:visible;">
					<a href="javascript: show_Seller_Protfolio()" class="actionlink"><strong>Tasker Protfolio</strong></a>
					</span>
					<span id="Seller_Protfolio_Hide" style="visibility:hidden;display:none;">
					<a href="javascript: hide_Seller_Protfolio()" class="actionlink"><strong>Tasker Protfolio</strong></a>
					</span>
				</td>
			</tr>
		</table>
		<span id="Seller_Protfolio_Hide_Details" style="visibility:hidden;display:none;">
		 <table width="90%" border="0" cellspacing="1" cellpadding="3">
				 	<tr class="header">
						<td align="center" ><strong>Imgae</strong></td>
						<td align="center" ><strong>Description</strong></td>
						<td align="center" ><strong>Industry</strong></td>
						<td align="center" ><strong>Development Cost</strong></td>
						<td align="center" ><strong>Execution Time</strong></td>
						<td align="center" ><strong>Categories</strong></td>
			       </tr>
				 			   
				 <?php unset($this->_sections['sellerport']);
$this->_sections['sellerport']['name'] = 'sellerport';
$this->_sections['sellerport']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sellerport']['show'] = true;
$this->_sections['sellerport']['max'] = $this->_sections['sellerport']['loop'];
$this->_sections['sellerport']['step'] = 1;
$this->_sections['sellerport']['start'] = $this->_sections['sellerport']['step'] > 0 ? 0 : $this->_sections['sellerport']['loop']-1;
if ($this->_sections['sellerport']['show']) {
    $this->_sections['sellerport']['total'] = $this->_sections['sellerport']['loop'];
    if ($this->_sections['sellerport']['total'] == 0)
        $this->_sections['sellerport']['show'] = false;
} else
    $this->_sections['sellerport']['total'] = 0;
if ($this->_sections['sellerport']['show']):

            for ($this->_sections['sellerport']['index'] = $this->_sections['sellerport']['start'], $this->_sections['sellerport']['iteration'] = 1;
                 $this->_sections['sellerport']['iteration'] <= $this->_sections['sellerport']['total'];
                 $this->_sections['sellerport']['index'] += $this->_sections['sellerport']['step'], $this->_sections['sellerport']['iteration']++):
$this->_sections['sellerport']['rownum'] = $this->_sections['sellerport']['iteration'];
$this->_sections['sellerport']['index_prev'] = $this->_sections['sellerport']['index'] - $this->_sections['sellerport']['step'];
$this->_sections['sellerport']['index_next'] = $this->_sections['sellerport']['index'] + $this->_sections['sellerport']['step'];
$this->_sections['sellerport']['first']      = ($this->_sections['sellerport']['iteration'] == 1);
$this->_sections['sellerport']['last']       = ($this->_sections['sellerport']['iteration'] == $this->_sections['sellerport']['total']);
?>
				   	<tr class="<?php echo smarty_function_cycle(array('values' => 'list_B, list_A'), $this);?>
">
					    <?php if ($this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['sample_file'] != NULL): ?>
			            <td align="center" class="fieldLabelLeft1"><img src="<?php echo $this->_tpl_vars['portfolio_imgpath']; ?>
<?php echo $this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['sample_file']; ?>
" height="50" width="50"/></td>
						<?php else: ?>
			            <td align="justify" class="fieldLabelLeft1"></td>
						<?php endif; ?>
					  	<td align="left" class="fieldLabelLeft1" valign="top"><strong>Title</strong> : <?php echo $this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['title']; ?>
<br /><br />					    
					    <?php echo ((is_array($_tmp=$this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['desc'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</td> 
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['industry']; ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['budget']; ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['time_spent']; ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['sportfolio'][$this->_sections['sellerport']['index']]['cats']; ?>
</td>
			        </tr>
				<?php endfor; endif; ?>
			 </table>		
			</span> 
			<table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="left">
					<span id="Transcation_Show" style="visibility:visible;">
					<a href="javascript: show_Transcation()" class="actionlink"><strong>Transaction</strong></a>
					</span>
					<span id="Transcation_Hide" style="visibility:hidden;display:none;">
					<a href="javascript: hide_Transcation()" class="actionlink"><strong>Transaction</strong></a>
					</span>
					</td>
				</tr>
			</table>
		<!--Start Transcation_Hide_Details-->
		 <span id="Transcation_Hide_Details" style="visibility:hidden;display:none;">
		 <!--######################################################################## -->
		 <!--Paypal _Master -->
		 <table border="0" cellpadding="1" cellspacing="2" width="90%">
		       <tr>
					<td class="fieldlabelRight1" valign="top" align="right"></t></t>
					<span id="Deposit_Show" style="visibility:visible;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: show_Deposit()" class="actionlink"><strong>Deposit Money</strong></a>
					</span>
					<span id="Deposit_Hide" style="visibility:hidden;display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: hide_Deposit()" class="actionlink"><strong>Deposit Money</strong></a>
					</span>
					</td>
				</tr>
		 </table>
		 <span id="Deposit_Hide_Details" style="visibility:hidden;display:none;">
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr class="header">
					<td align="center" ><strong>Amount</strong></td>
					<td align="center" ><strong>Description</strong></td>
					<td align="center" ><strong>Date</strong></td>
				</tr>
				<?php unset($this->_sections['trac']);
$this->_sections['trac']['name'] = 'trac';
$this->_sections['trac']['loop'] = is_array($_loop=$this->_tpl_vars['trasLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['trac']['show'] = true;
$this->_sections['trac']['max'] = $this->_sections['trac']['loop'];
$this->_sections['trac']['step'] = 1;
$this->_sections['trac']['start'] = $this->_sections['trac']['step'] > 0 ? 0 : $this->_sections['trac']['loop']-1;
if ($this->_sections['trac']['show']) {
    $this->_sections['trac']['total'] = $this->_sections['trac']['loop'];
    if ($this->_sections['trac']['total'] == 0)
        $this->_sections['trac']['show'] = false;
} else
    $this->_sections['trac']['total'] = 0;
if ($this->_sections['trac']['show']):

            for ($this->_sections['trac']['index'] = $this->_sections['trac']['start'], $this->_sections['trac']['iteration'] = 1;
                 $this->_sections['trac']['iteration'] <= $this->_sections['trac']['total'];
                 $this->_sections['trac']['index'] += $this->_sections['trac']['step'], $this->_sections['trac']['iteration']++):
$this->_sections['trac']['rownum'] = $this->_sections['trac']['iteration'];
$this->_sections['trac']['index_prev'] = $this->_sections['trac']['index'] - $this->_sections['trac']['step'];
$this->_sections['trac']['index_next'] = $this->_sections['trac']['index'] + $this->_sections['trac']['step'];
$this->_sections['trac']['first']      = ($this->_sections['trac']['iteration'] == 1);
$this->_sections['trac']['last']       = ($this->_sections['trac']['iteration'] == $this->_sections['trac']['total']);
?>
				   	<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
				      	<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['trans_type']; ?>
&nbsp;$&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['description']; ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['atraction'][$this->_sections['trac']['index']]['date']; ?>
</td>
				   </tr>
				<?php endfor; endif; ?>	   
			</table>
		 </span>	
			 <!--Paypal _Master End-->	
			 <!--Withdraw _Master -->
		 <table border="0" cellpadding="1" cellspacing="2" width="90%">
				<tr>
					<td class="fieldlabelRight1" valign="top" align="right">
					<span id="Withdraw_Show" style="visibility:visible;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: show_Withdraw()" class="actionlink"><strong>Requested withdraw Money</strong></a>
					</span>
					<span id="Withdraw_Hide" style="visibility:hidden;display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript: hide_Withdraw()" class="actionlink"><strong>Requested withdraw Money</strong></a>
					</span>
					</td>
				</tr>
		 </table>
		  <span id="Withdraw_Hide_Details" style="visibility:hidden;display:none;">
			<table width="90%" border="0" cellspacing="1" cellpadding="3">
				<tr class="header">
					<td align="center" ><strong>Amount</strong></td>
					<td align="center" ><strong>Description</strong></td>
					<td align="center" ><strong>Date</strong></td>
					<td align="center" ><strong>Status</strong></td>
				</tr>
				<?php unset($this->_sections['withdrawmoney']);
$this->_sections['withdrawmoney']['name'] = 'withdrawmoney';
$this->_sections['withdrawmoney']['loop'] = is_array($_loop=$this->_tpl_vars['withdrawLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['withdrawmoney']['show'] = true;
$this->_sections['withdrawmoney']['max'] = $this->_sections['withdrawmoney']['loop'];
$this->_sections['withdrawmoney']['step'] = 1;
$this->_sections['withdrawmoney']['start'] = $this->_sections['withdrawmoney']['step'] > 0 ? 0 : $this->_sections['withdrawmoney']['loop']-1;
if ($this->_sections['withdrawmoney']['show']) {
    $this->_sections['withdrawmoney']['total'] = $this->_sections['withdrawmoney']['loop'];
    if ($this->_sections['withdrawmoney']['total'] == 0)
        $this->_sections['withdrawmoney']['show'] = false;
} else
    $this->_sections['withdrawmoney']['total'] = 0;
if ($this->_sections['withdrawmoney']['show']):

            for ($this->_sections['withdrawmoney']['index'] = $this->_sections['withdrawmoney']['start'], $this->_sections['withdrawmoney']['iteration'] = 1;
                 $this->_sections['withdrawmoney']['iteration'] <= $this->_sections['withdrawmoney']['total'];
                 $this->_sections['withdrawmoney']['index'] += $this->_sections['withdrawmoney']['step'], $this->_sections['withdrawmoney']['iteration']++):
$this->_sections['withdrawmoney']['rownum'] = $this->_sections['withdrawmoney']['iteration'];
$this->_sections['withdrawmoney']['index_prev'] = $this->_sections['withdrawmoney']['index'] - $this->_sections['withdrawmoney']['step'];
$this->_sections['withdrawmoney']['index_next'] = $this->_sections['withdrawmoney']['index'] + $this->_sections['withdrawmoney']['step'];
$this->_sections['withdrawmoney']['first']      = ($this->_sections['withdrawmoney']['iteration'] == 1);
$this->_sections['withdrawmoney']['last']       = ($this->_sections['withdrawmoney']['iteration'] == $this->_sections['withdrawmoney']['total']);
?>
				   	<tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
				      	<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['trans_type']; ?>
&nbsp;$&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['description']; ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php echo $this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['requested_date']; ?>
</td>
						<td align="center" class="fieldLabelLeft1"><?php if ($this->_tpl_vars['awithdarw'][$this->_sections['withdrawmoney']['index']]['status'] == 0): ?>Requested (Pending)<?php else: ?>Completed<?php endif; ?></td>
				   </tr>
				<?php endfor; endif; ?>
			</table>
			</span>
			 <!--Withdraw _Master End-->	
			<!--######################################################################## -->	
			</span> <!-- End-->
			<br>
			<input type="hidden" name="Action" value="<?php echo $this->_tpl_vars['Action']; ?>
"/>
			<br>
		</td>
	</tr>
	</form>
</table>