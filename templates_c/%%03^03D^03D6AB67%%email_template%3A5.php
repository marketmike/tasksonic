<?php /* Smarty version 2.6.26, created on 2012-08-14 09:15:55
         compiled from email_template:5 */ ?>
<br><br><?php if ($this->_tpl_vars['flag'] == 1): ?>Dear <?php echo $this->_tpl_vars['user_id']; ?>
,<br><br>Please click on the below link to verify your email address <?php echo $this->_tpl_vars['email_id']; ?>
 and complete the Task Sonic registration process.<br><br><?php echo $this->_tpl_vars['verify_url']; ?>
<br><br><?php else: ?><b>Thank you for registering your Task Sonic account at Tasksonic.com</b>, your account has been set up and you are almost ready to get started. Click on the verification link to complete the registration process. Once your account has been verified, you'll want to update your Task Owner and Tasker profiles depending on what role or roles you will use on task sonic. Remember, updating your profiles helps other members to make more informative choices, and increases your chances of being selected as a Tasker or your task in being bid on.<br><br><span style="font-weight: bold;">Verify Your Email: </span><?php echo $this->_tpl_vars['verify_url']; ?>
<br><br><br><strong>Details of your account :</strong><br><br><strong>UserID</strong> : <?php echo $this->_tpl_vars['user_id']; ?>
<br><strong>Password</strong> : <?php echo $this->_tpl_vars['password']; ?>
<br><strong>Email Address</strong> : <?php echo $this->_tpl_vars['email_id']; ?>
<br><br><br><?php endif; ?><br><br>