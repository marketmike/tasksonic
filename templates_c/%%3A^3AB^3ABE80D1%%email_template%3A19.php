<?php /* Smarty version 2.6.26, created on 2012-08-14 21:21:54
         compiled from email_template:19 */ ?>
Congratulations  <?php echo $this->_tpl_vars['task_owner']; ?>
, 
<br><br>
The Task Sonic Tasker <strong><?php echo $this->_tpl_vars['tasker_link']; ?>
</strong> has accepted the awarding of your task "<?php echo $this->_tpl_vars['task_name']; ?>
". You will now need to log in at <a href="http://www.tasksonic.com/create-escrow-payment.html">Task Sonic Escrow</a>  and create an escrow payment for the amount of the awarded bid. This ensures the Tasker that you have the funds necessary to cover the cost of the task before they begin working on it! <strong>Do not release the escrow payments to the Tasker until the task is completed. </strong>

<br><br>

Once the escrow payment has been created, the Tasker will be notified and you are ready to begin to work with the Task Sonic Tasker <strong><?php echo $this->_tpl_vars['tasker_link']; ?>
</strong>. You may contact <strong><?php echo $this->_tpl_vars['tasker_link']; ?>
</strong> at the following e-mail address: <strong><?php echo $this->_tpl_vars['email_of_tasker']; ?>
</strong>, though we highly recommend using the Task Sonic private messaging system. This way communications are documented and can aid Task Sonic in reaching a decision should a disagreement between the parties arise during the task completion time-frame. 

<br><br>

We encourage you to communicate daily with the other party to ascertain the Task progresses and both parties are clear on what is being done.  Make sure that the Task Sonic Tasker <strong><?php echo $this->_tpl_vars['tasker_link']; ?>
</strong> knows precisely what you need done before beginning the task. Naturally this must coincide with your original task description. In our experience, lack of communication is the leading cause of problems with tasks on Tasksonic.com, so communicate regularly and enjoy a successfully completed task.

<br><br>

Had you budgeted for <strong>"Tasker Expenses"</strong> when you created the task, the Tasker will be asked to record those expenses they incurred when they have completed the task and have marked it completed using the tools in their Task Sonic account. They will only be able to record expenses up to the amount you budgeted. You may elect to increase the budget if need be by logging into Task Sonic and visiting the Task details page at the following link <?php echo $this->_tpl_vars['task_link']; ?>
.  Please be sure to document discussions on "Tasker Expenses" through the use of the Task Sonic Private messaging system. This is the only way Task Sonic can resolve disagreements should they arise.

<?php if ($this->_tpl_vars['commission_task_owner'] != 0): ?>

<br><br><strong>Task Commissions</strong><br><br>

A fee of <strong>$<?php echo $this->_tpl_vars['commission_task_owner']; ?>
</strong> has been deducted from your Task Sonic Wallet to cover commissions due to Task Sonic as outlined in our fee schedules in the Terms &amp; Conditions.
<?php endif; ?>

<?php if ($this->_tpl_vars['flag'] != 0): ?>

<br><br><strong>Task Deposit</strong><br><br>

Task Sonic has also refunded to your Task Sonic Wallet the refundable deposit <strong>$<?php echo $this->_tpl_vars['refundable_deposit']; ?>
</strong>  originally charged to your account when you posted your task.

<?php endif; ?>