<?php /* Smarty version 2.6.26, created on 2012-08-11 23:32:10
         compiled from block_side_balance.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'block_side_balance.tpl', 17, false),array('modifier', 'stripslashes', 'block_side_balance.tpl', 20, false),)), $this); ?>
<div class="right-column-wrap">
<h3>My Account Activity</h3>
<div style="float:left;margin-left:5px;width:135px;" >
		<div><strong>Wallet: </strong><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
<?php echo $this->_tpl_vars['Total_Amount']; ?>
</div>
		<div class="clear"></div>
		<div><a href="make-deposit.html" class="footerlinkcommon21">Deposit Money</a></div>
		<div class="clear"></div>
		<div><a href="create-escrow-payment.html" class="footerlinkcommon21">Escrow Payment</a>&nbsp;<a href="page_7.html" class="footerlinkcommon21"><?php echo $this->_tpl_vars['lang']['New_Escrow_Payment1_question']; ?>
</a></div>
		<div class="clear"></div>
		<div><a href="request-withdraw.html" class="footerlinkcommon21">Withdrawl Money</a></div>
		<div class="clear"></div>
</div>
<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
activity_symbol.png" border="0" style="float:left;margin-left:10px;width:125px;" />	
<div style="float:left;margin-left:5px;width:270px;" >
		<h3>Last Transaction</h3>
		<div class="clear"></div>
		<div><strong>Amount (<?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
) : <?php echo $this->_tpl_vars['last_trans_type']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['last_amount'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</strong></div>
		<div class="clear"></div>
		<?php if ($this->_tpl_vars['Total_Amount'] > 0.00): ?>
		<div><strong>Description :</strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['last_desc'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</div>
		<div class="clear"></div>
		<div>Date : <?php echo $this->_tpl_vars['last_date']; ?>
 </div>
		<div class="clear"></div>
		<?php endif; ?>
	<div class="buttons-tall" style="margin-top:10px;">
	<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/my-transactions.html">View All</a>
	</div>
</div>
<div class="clear"></div>
</div><!--right-column-wrap-->