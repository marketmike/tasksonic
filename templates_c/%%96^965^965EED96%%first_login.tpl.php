<?php /* Smarty version 2.6.26, created on 2012-08-14 09:17:14
         compiled from first_login.tpl */ ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['page_name']; ?>
</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Welcome <?php echo $this->_tpl_vars['username']; ?>
, This is your first time logging in!					
						</label>
					</div>
					</div>
					<div class="clear"></div>
					<div class="field">
					Thank you for recently joining Task Sonic. While we are sure you are eager to get started, please be sure to read the below information on "Getting Started".
					<?php if ($this->_tpl_vars['taskowner_profile'] || $this->_tpl_vars['tasker_profile']): ?>
					You will also want to update your <?php echo $this->_tpl_vars['taskowner_profile']; ?>
<?php if ($this->_tpl_vars['taskowner_profile'] && $this->_tpl_vars['tasker_profile']): ?> and <?php endif; ?><?php echo $this->_tpl_vars['tasker_profile']; ?>
. Completed profiles increase your chances of success whether you are posting tasks or bidding on them.
					<?php endif; ?>
					<div class="clear"></div>	
					</div>
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Getting Started!</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field"><?php echo $this->_tpl_vars['page_content']; ?>
</div>							
				<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Current Task Sonic Fees</label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
					<h3>Posting A Task</h3>
					To "Post A Task", a <strong>$<?php echo $this->_tpl_vars['posting_fee']; ?>
</strong> refundable fee is charged for each posted Task to minimize fake Tasks from being posted by malicious users. Unless a Task Owner cancels the task, the fee is refunded when the task is awarded/accepted or the task fails due to no bids or a suitable bid not being received.<br/><br /> 
					<h3>Task Sonic Commissions</h3>
					When a task is awarded to a Task Sonic Tasker and they accept the task, the following fees are applied and withdrawn from the users Task Sonic Wallets as payment to Task Sonic for services rendered. Please see Terms & Conditions for a description of services provided by Task Sonic.<br /><br />
					<blockquote>
					<strong>Task Owner: </strong><?php echo $this->_tpl_vars['commission_task_owner']; ?>
% of awarded bid - min fee $<?php echo $this->_tpl_vars['min_commission_task_owner']; ?>
<br />
					<strong>Tasker: </strong><?php echo $this->_tpl_vars['commission_tasker']; ?>
% of awarded bid - min fee $<?php echo $this->_tpl_vars['min_commission_tasker']; ?>

					</blockquote>
					<br/><center>(min fee applied when commission less than)</center>
					</div>							
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
			