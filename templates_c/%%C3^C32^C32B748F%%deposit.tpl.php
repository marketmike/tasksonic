<?php /* Smarty version 2.6.26, created on 2012-08-14 14:56:52
         compiled from deposit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'deposit.tpl', 87, false),)), $this); ?>
<script language="javascript">
	var JS_Amount		 	= '<?php echo $this->_tpl_vars['lang']['JS_Amount']; ?>
';
	var JS_Amount_gra	 	= '<?php echo $this->_tpl_vars['lang']['JS_Amount_gra']; ?>
';
	var JS_Amount_no	 	= '<?php echo $this->_tpl_vars['lang']['JS_Amount_no']; ?>
';
	var JS_WC_POST_DEPOSIT	= '<?php echo $this->_tpl_vars['JS_WC_POST_DEPOSIT']; ?>
';
	addLoadEvent(prepareInputsForHints);
</script>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
	<h1><?php echo $this->_tpl_vars['lang']['Deposit_Money']; ?>
</h1>
	<div class="clearwspace"></div>
						<div class="dashboard_top"></div>
						<div class="dashboard" id="dashboard">
						<ul>
						<li><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
						<li><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
						<li class="current"><a href="make-deposit.html">Deposit</a><span></span></li>
						<li><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
						</ul>
						</div>
	<div class="clear"></div>	
	<div class="page_top"></div>
			<div class="page_content">
				<div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Deposit']; ?>
</label>
					</div>
					</div>
					<div class="clear"></div>
					<div class="field username account_login" style="margin-bottom:20px;">
					<span style="width:100%;text-align:center;"><?php echo $this->_tpl_vars['lang']['Intro']; ?>
</span>
					</div>					
					<div class="clear"></div>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?Action=Next_Step" name="frmPayPal">
					<table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0" align="center">					
						<tr>
							<td height="20"></td>
						</tr>
						<tr>
							<td>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr class="header" bgcolor="#D5D5D5">
										<td width="20%" class="bodytextwhite" height="20">&nbsp;<strong><?php echo $this->_tpl_vars['lang']['Payment_Method']; ?>
</strong></td>
										<td width="20%" class="bodytextwhite"><strong><?php echo $this->_tpl_vars['lang']['Cost']; ?>
</strong></td>
										<td class="bodytextwhite">&nbsp;</td>
									</tr>
									<tr>
										<td colspan="3">&nbsp;</td>
									</tr>
									<?php if ($this->_tpl_vars['paypal_status'] == 1): ?>
									<tr>
										<td width="20%" class="bodytextblack" valign="top">&nbsp;<input type="radio" name="pay_method" value="paypal" <?php if ($this->_tpl_vars['paypal_status'] == 1): ?>checked="checked"<?php endif; ?>/> 
										<?php echo $this->_tpl_vars['lang']['PayPal']; ?>
 / <?php echo $this->_tpl_vars['lang']['Credit_Card']; ?>
</td>
										<td width="20%" class="bodytextblack" valign="top"> <?php echo $this->_tpl_vars['per_amount']; ?>
% + <?php echo $this->_tpl_vars['fix_amount']; ?>
 <?php echo $this->_tpl_vars['lang']['Curreny']; ?>
</td>
									</tr>
									<tr>
										<td class="bodytextblack" align="center" valign="top" colspan="2" ><img src="http://www.rollanet.org/images/paypal/paypal_mrb_banner.gif" BORDER="0" ALT="Effettua la registrazione a PayPal e inizia ad accettare pagamenti tramite carta di credito "/></td>
									</tr>
									<?php endif; ?>									
									<tr>
										<td colspan="3">&nbsp;</td>
									</tr>
									<?php if ($this->_tpl_vars['moneybooker_status'] == 1): ?>
									<tr>
										<td width="20%" class="bodytextblack" valign="top">&nbsp;<input type="radio" name="pay_method" <?php if ($this->_tpl_vars['paypal_status'] != 1 && $this->_tpl_vars['moneybooker_status'] == 1): ?>checked="checked"<?php endif; ?> value="moneybooker"/> 
										Moneybooker</td>
										<td width="20%" class="bodytextblack" valign="top"> <?php echo $this->_tpl_vars['money_booker_per_amount']; ?>
% + <?php echo $this->_tpl_vars['money_booker_fix_amount']; ?>
 <?php echo $this->_tpl_vars['Curreny']; ?>
</td>										
									</tr>
									<tr>
										<td class="bodytextblack" align="center" valign="top" colspan="2"  ><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
logo_moneybookers.gif" BORDER="0" ALT="Effettua la registrazione a PayPal e inizia ad accettare pagamenti tramite carta di credito "/></td>
									</tr>
									<?php endif; ?>									
								</table>
							</td>
						</tr>
						<tr>
							<td height="15">&nbsp;</td>
						</tr>
						<tr>
							<td>
							<?php if ($this->_tpl_vars['paypal_status'] == 1 || $this->_tpl_vars['moneybooker_status'] == 1): ?>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr class="header" bgcolor="#D5D5D5">
										<td height="25" class="bodytextwhite">&nbsp;<strong><?php echo $this->_tpl_vars['lang']['Deposit_Amount']; ?>
 : <?php echo $this->_tpl_vars['lang']['Curreny']; ?>
</strong>
									  <input type="text" name="amount" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['amt_short'])) ? $this->_run_mod_handler('replace', true, $_tmp, '-', '') : smarty_modifier_replace($_tmp, '-', '')); ?>
" />&nbsp;(Minimum deposit amount $<?php echo $this->_tpl_vars['JS_WC_POST_DEPOSIT']; ?>
)									  
									  </td>
									</tr>
									
								</table>
							<?php endif; ?>	
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</table>
					<input type="hidden" name="task_staged_id" value="<?php echo $this->_tpl_vars['staged_id']; ?>
" />
					<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
						   <td width="49%" align="right" class="bodytextblack">
							<?php if ($this->_tpl_vars['paypal_status'] == 1 || $this->_tpl_vars['moneybooker_status'] == 1): ?>
							<div class="buttons">
							<button type="submit" name="Submit" class="negative" value="<?php echo $this->_tpl_vars['lang']['Button_Ctn']; ?>
" onclick="javascript : return Check_Details(this.form);">
							Continue
							</button>
							</div>
							<?php else: ?>
							No Gateway Providers Configured
							<?php endif; ?>
						   </td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</table>
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