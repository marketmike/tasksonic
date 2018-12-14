<?php /* Smarty version 2.6.26, created on 2012-08-11 23:32:10
         compiled from block_side_post.tpl */ ?>
<div class="top-blue">Post A Task</div>
<div class="right-column-wrap">

	<div style="float:left;margin-left:5px;width:135px;" >
	Get started, post your task and see how things get done fast with Task Sonic.
	<div class="buttons-tall" style="margin-top:10px;">
	<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/post-new-task.html">Post Task</a>
	</div>
	</div>
	<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
task_symbol.png" border="0" style="float:left;margin-left:10px;width:125px;" />	
	<div class="clear"></div>	
</div><!--right-column-wrap-->
<?php if ($this->_tpl_vars['tasker_commission'] && $this->_tpl_vars['task_owner_commission'] && $this->_tpl_vars['tasker_minimum'] && $this->_tpl_vars['task_owner_minimum']): ?>
<div class="right-column-wrap">
 <h3>Current Task Fees</h3>
 <div class="clear"></div>
 <strong>Task Owner:</strong> <?php echo $this->_tpl_vars['task_owner_commission']; ?>
% of awarded bid - min fee $<?php echo $this->_tpl_vars['task_owner_minimum']; ?>

 <div class="clear"></div>
 <strong>Tasker:</strong> <?php echo $this->_tpl_vars['tasker_commission']; ?>
% of awarded bid - min fee $<?php echo $this->_tpl_vars['tasker_minimum']; ?>

 <div class="clear"></div>
 <div style="text-align:center;font-size:10px;font-weight:bold;margin-top:4px;">(min fee applied when commission less than)</div>
</div><!--right-column-wrap-->
<?php endif; ?>
<div class="right-column-wrap">
<div style="line-height:45px;font-weight:bold;">
<h3>Trusted and Verified:</h3>
<img src="images/facebook-verified.png" style="float:left;margin-right:9px;width:45px;height:45px" alt="Facebook Verified" title="Facebook Verified" />
<img src="images/email-verified.png" style="float:left;margin-right:9px;width:45px;height:45px" alt="Email Verified" title="Email Verified" />						
<img src="images/address-verified.png" style="float:left;margin-right:9px;width:45px;height:45px" alt="Address Verified" title="Address Verified" />
<img src="images/phone-verified.png" style="float:left;margin-right:9px;width:45px;height:45px" alt="Human Verified" title="Phone Verified" />
<img src="images/background-verified.png" style="float:left;margin-right:1px;width:45px;height:45px" alt="Background Checked" title="Background Checked" />	
</div>
 <div class="clear"></div>
 <div style="text-align:left;margin-top:4px;">Task Sonic is committed to your security and offers multiple options for Task Owners and Taskers to get verified. We want our users to be confident they are working with people whose identities check out!</div>
 <div class="clear"></div>
	<div class="buttons-tall" style="margin-top:10px;">
	<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/faq_details_28.html">Learn More</a>
	</div> 
 <div class="clear"></div>	
</div><!--right-column-wrap-->	