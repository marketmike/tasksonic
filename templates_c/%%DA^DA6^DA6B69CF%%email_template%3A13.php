<?php /* Smarty version 2.6.26, created on 2012-08-14 09:40:47
         compiled from email_template:13 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wordwrap', 'email_template:13', 1, false),)), $this); ?>
<br>The Task Sonic user <strong><?php echo $this->_tpl_vars['sender_name']; ?>
</strong> has just posted a message for you on the task named <strong><?php echo $this->_tpl_vars['link']; ?>
</strong>.<br><br><strong>Message</strong> : <?php echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 135, ' ', true) : smarty_modifier_wordwrap($_tmp, 135, ' ', true)); ?>
<br><br>To reply to this message visit the task details page at <strong><?php echo $this->_tpl_vars['link']; ?>
</strong> or your Task Sonic <?php echo $this->_tpl_vars['link_inbox']; ?>
.<br><br>