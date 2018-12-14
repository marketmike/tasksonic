<?php /* Smarty version 2.6.26, created on 2012-08-14 09:19:53
         compiled from email_template:31 */ ?>
 <br>Dear <strong><?php echo $this->_tpl_vars['user_name']; ?>
</strong>,<br> <br>Your have posted a new task on Tasksonic.com<br> <br><?php if ($this->_tpl_vars['flag'] == 1): ?> <br>Your elected to upgrade your task to a premium status tasks and&nbsp; <strong>$ <?php echo $this->_tpl_vars['premium_fees']; ?>
</strong> was deducted as from your Tasksonic account.<br><?php else: ?><br>Your Taskonic account was charged <strong>$ <?php echo $this->_tpl_vars['post_project_fee']; ?>
</strong> for posting a standard task. This is a refundable fee that will be returned to your Task Sonic wallet<font size="2"> 
once the Task has been awarded and accepted or in the event the Task is not 
awarded and reaches its expiration time. Fees will not be refunded if the Task 
Owner cancels the Task at any time.</font> Task Owner and Tasker commissions will be deducted from the parties Task Sonic wallets once an awarding of the task is accepted by the awarded tasker. <br><?php endif; ?> <br><?php if ($this->_tpl_vars['urgent'] == 1): ?> <br>You selected to upgrade your task&nbsp; to Urgent Status and your Tasksonic account has been charged t <strong>$ <?php echo $this->_tpl_vars['urgent_fees']; ?>
</strong> fee.<br><?php endif; ?> <br>     <br>