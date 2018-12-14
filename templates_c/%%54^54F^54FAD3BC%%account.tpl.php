<?php /* Smarty version 2.6.26, created on 2012-08-14 09:45:23
         compiled from account.tpl */ ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['My_Account']; ?>
</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="colmask"> 
							<div class="colmid"> 
							<div class="colin"> 
							<div class="colwu"> 
								<div class="colleft"> 
									<div class="col1">
									   <a href="/edit-task-owner-profile.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/task_owner-profile.png" border="0" /></a>				
									</div> 
									<div class="col2"> 
									  <a href="/edit-your-profile.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/edit-profile.png" border="0" /></a>
									</div> 
									<div class="col3"> 
										 <a href="/edit-tasker-profile.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/tasker-profile.png" border="0" /></a>
									</div> 
									<div class="col4"> 
										<a href="/my-assigned-tasks.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/my-assigned-tasks.png" border="0" /></a> 
									</div> 
									<div class="col5"> 
										<a href="/my-posted-tasks.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/my-posted-tasks.png" border="0" /></a> 
									</div> 
								</div> 
							</div> 
							</div> 
							</div> 
					</div>				
					<div class="clear"></div>				
					<div class="colmask"> 
							<div class="colmid"> 
							<div class="colin"> 
							<div class="colwu"> 
								<div class="colleft"> 
									<div class="col1"> 
									  <a href="/manage_portfolio.php"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/edit-portfolio.png" border="0" /></a>
									</div> 
									<div class="col2"> 
									   <a href="/update-password.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/change-password.png" border="0" /></a>
									</div> 
									<div class="col3"> 
										 <a href="/invite.php"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/invite-friends.png" border="0" /></a>
									</div> 
									<div class="col4"> 
										<a href="/pm-inbox.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/private-messages.png" border="0" /></a> 
									</div> 
									<div class="col5"> 
										<a href="/clarification-board.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/message-boards.png" border="0" /></a> 
									</div> 
								</div> 
							</div> 
							</div> 
							</div> 
					</div>				
					<div class="clear"></div>					
					<div class="colmask"> 
							<div class="colmid"> 
							<div class="colin"> 
							<div class="colwu"> 
								<div class="colleft"> 
									<div class="col1"> 
									  <a href="/create-escrow-payment.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/new-escrow-payment.png" border="0" /></a>
									</div> 
									<div class="col2"> 
									   <a href="/my-transactions.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/balance-activity.png" border="0" /></a>
									</div> 
									<div class="col3"> 
										 <a href="/request-withdraw.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/withdraw-money.png" border="0" /></a>
									</div> 
									<div class="col4"> 
										<a href="/my-escrow-payments.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/manage-payments.png" border="0" /></a> 
									</div> 
									<div class="col5"> 
										<a href="/make-deposit.html"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/images/deposit-money.png" border="0" /></a> 
									</div> 
								</div> 
							</div> 
							</div> 
							</div> 
					</div>				
					<div class="clear"></div>					
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
			<div class="rail_spacer">&nbsp;</div>
			<?php if ($this->_tpl_vars['Membership_Name'] == ''): ?>
				<div class="clear"></div>
				<a href="membership.php" class="footerlinkcommon2" style="text-decoration:none;">
				<div style="cursor:pointer;width:302px;height:320px; background:url('<?php echo $this->_tpl_vars['site_url']; ?>
/images/vip-ad.png') no-repeat 0 0 transparent;position:relative;margin-botttom:20px;">
				<div style="position:absolute;width:120px;bottom:50px;right:28px;font-size:40px;font-weight:bold;text-decoration:none;"><?php echo $this->_tpl_vars['lang']['Curreny']; ?>
<?php echo $this->_tpl_vars['as_low_as']; ?>
</div>
				</div>
				</a>
				<br class="clear" />
			<?php else: ?>
				<div class="clear"></div>
				<div class="right-column-wrap">
					<div style="float:left;"><img src="<?php echo $this->_tpl_vars['site_url']; ?>
/templates/images/vip_large.png" style="float:left;margin-right:5px;" />You purchased <strong><?php echo $this->_tpl_vars['Membership_Name']; ?>
</strong> membership on <strong><?php echo $this->_tpl_vars['Buy_Date']; ?>
</strong> which will expires on <strong><?php echo $this->_tpl_vars['Finished_Date']; ?>
</strong>.</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
			<?php endif; ?>			
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Balance']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->