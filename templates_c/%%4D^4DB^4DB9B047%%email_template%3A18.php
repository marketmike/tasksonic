<?php /* Smarty version 2.6.26, created on 2012-08-14 21:21:54
         compiled from email_template:18 */ ?>
Congratulations <?php echo $this->_tpl_vars['tasker_name']; ?>
, 

<br><br>

The Task Sonic Task Owner <strong><?php echo $this->_tpl_vars['task_owner_link']; ?>
</strong> has been notified that you accepted the awarding of the task "<?php echo $this->_tpl_vars['task_name']; ?>
". They have been instructed to create an escrow payment for the amount of your bid before you begin the task. 

<br><br>

Once the escrow payment has been created, you will be notified by email and you are ready to begin to work with the Task Sonic Task Owner <strong><?php echo $this->_tpl_vars['task_owner_link']; ?>
</strong>. You may contact <strong><?php echo $this->_tpl_vars['task_owner_link']; ?>
</strong> at the following e-mail address: <strong><?php echo $this->_tpl_vars['email_of_task_owner']; ?>
</strong>, though we highly recommend using the Task Sonic private messaging system. This way communications are documented and can aid Task Sonic in reaching a decision should a disagreement between the parties arise during the task completion time-frame. 

<br><br>
We encourage you to communicate daily with the other party to ascertain the Task progresses and both parties are clear on what is being done.  Make sure that you know precisely what the Task Owner needs done before beginning the task. Naturally this must coincide with <strong><?php echo $this->_tpl_vars['task_owner_link']; ?>
s</strong>  original task description. In our experience, lack of communication is the leading cause of problems with tasks on Tasksonic.com, so communicate regularly and let’s have another successfully completed task.

<br><br>If the Task Owner <strong><?php echo $this->_tpl_vars['task_owner_link']; ?>
</strong>  budgeted for <strong>"Tasker Expenses"</strong> when they created the task, you will need to record the expenses you incur when you have completed the task and have marked it completed using the tools in your Task Sonic account. You will only be able to record expenses up to the amount the Task Owner budgeted. The Task Owner may elect to increase the budget if need be.  Please be sure to document discussions on "Tasker Expenses" through the use of the Task Sonic Private Messaging system. This is the only way Task Sonic can resolve disagreements should they arise.

<br><br>

Please note you are expected to complete the task by the agreed upon completion date unless otherwise mutually agreed upon and documented through private message discussions. This is the date listed as "Complete Task by" on the Task details page found here "<?php echo $this->_tpl_vars['task_link']; ?>
".

<?php if ($this->_tpl_vars['commission_tasker'] != 0): ?>
<br><br><strong>Task Commissions</strong><br><br>
A fee of <strong>$<?php echo $this->_tpl_vars['commission_tasker']; ?>
</strong> has been deducted from your Task Sonic Wallet to cover commissions due to Task Sonic as outlined in our fee schedules in the Terms &amp; Conditions.
<?php endif; ?>