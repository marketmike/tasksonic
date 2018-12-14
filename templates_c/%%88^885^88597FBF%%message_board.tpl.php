<?php /* Smarty version 2.6.26, created on 2012-08-14 22:19:52
         compiled from message_board.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'message_board.tpl', 17, false),array('function', 'cycle', 'message_board.tpl', 61, false),)), $this); ?>
<script language="javascript">
	var JS_English_Msg		 = '<?php echo $this->_tpl_vars['js']; ?>
';
</script>
<div id="popgrid_620">
<div class="clear"></div>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>				
					<?php if ($_SESSION['User_Name'] == ''): ?>
					<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['msg_board']; ?>
</div>									
					<?php else: ?>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmmsgboard">
					<div class="clear"></div>
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address">Message Board For: <?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</label>
						</div>
					</div>
					<div class="clear"></div>
					<div class="field">
					<strong><?php echo $this->_tpl_vars['lang']['Important1']; ?>
</strong> <?php echo $this->_tpl_vars['lang']['msg_board1']; ?>
 <?php echo $this->_tpl_vars['lang']['msg_board2']; ?>
.
					<div class="clear"></div>	
					</div>			
					<div class="clear"></div>
					<div class="title-links" style="width:400px;">
						<div class="form_page_text" style="text-align:right;">
							<label for="login-email-address">Post Message To <?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_creator']): ?>Community<?php else: ?><?php echo $this->_tpl_vars['project_creator']; ?>
<?php endif; ?></label>
						</div>
					</div>
					<div class="title-bottom"></div>
					<div class="clear"></div>
					<div class="field">
						<textarea name="en_message_desc" class="textarea" cols="80" rows="7"></textarea>
						<span class="hint">Use a descriptive title<span class="hint-pointer">&nbsp;</span></span>
					<div class="clear"></div>	
					</div>	
					<div class="clear"></div>
					<div class="buttons">
					<button type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Submit']; ?>
" onclick="Javascript: return Check_Details(this.form);"><?php echo $this->_tpl_vars['lang']['Button_Post']; ?>
</button>
					</div>					
				<div class="clear"></div>	
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>	
	<div class="page_bottom"></div>	
	<br /><br />
		
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">Messages</label>
					</div>
					</div>
					<div class="clear"></div>
								<?php if ($this->_tpl_vars['Loop'] > 0): ?>
								<?php unset($this->_sections['msg']);
$this->_sections['msg']['name'] = 'msg';
$this->_sections['msg']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['msg']['show'] = true;
$this->_sections['msg']['max'] = $this->_sections['msg']['loop'];
$this->_sections['msg']['step'] = 1;
$this->_sections['msg']['start'] = $this->_sections['msg']['step'] > 0 ? 0 : $this->_sections['msg']['loop']-1;
if ($this->_sections['msg']['show']) {
    $this->_sections['msg']['total'] = $this->_sections['msg']['loop'];
    if ($this->_sections['msg']['total'] == 0)
        $this->_sections['msg']['show'] = false;
} else
    $this->_sections['msg']['total'] = 0;
if ($this->_sections['msg']['show']):

            for ($this->_sections['msg']['index'] = $this->_sections['msg']['start'], $this->_sections['msg']['iteration'] = 1;
                 $this->_sections['msg']['iteration'] <= $this->_sections['msg']['total'];
                 $this->_sections['msg']['index'] += $this->_sections['msg']['step'], $this->_sections['msg']['iteration']++):
$this->_sections['msg']['rownum'] = $this->_sections['msg']['iteration'];
$this->_sections['msg']['index_prev'] = $this->_sections['msg']['index'] - $this->_sections['msg']['step'];
$this->_sections['msg']['index_next'] = $this->_sections['msg']['index'] + $this->_sections['msg']['step'];
$this->_sections['msg']['first']      = ($this->_sections['msg']['iteration'] == 1);
$this->_sections['msg']['last']       = ($this->_sections['msg']['iteration'] == $this->_sections['msg']['total']);
?>
										<div id="message_wrapper" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
">
											<div class="clear"></div>
											<div class="message_row">
												<div class="col_left"><strong>From: </strong>
												  <?php if ($this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['sender_login_id'] == $this->_tpl_vars['project_creator']): ?>
													  <a href="#" onclick="Javascript : popup_window_link('task_owner_profile_<?php echo $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['sender_login_id']; ?>
.html')" class="footerlinkcommon2"> Task Owner <?php echo $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['sender_login_id']; ?>
</a>
												  <?php else: ?>	
													  <a href="#" onclick="Javascript : popup_window_link('tasker_profile_<?php echo $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['sender_login_id']; ?>
.html')" class="footerlinkcommon2"> <?php echo $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['sender_login_id']; ?>
</a>
												  <?php endif; ?>	
												</div>
												<div class="col_right"><strong><?php echo $this->_tpl_vars['lang']['Date_posted']; ?>
: </strong><?php echo $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['dates']; ?>
</div>
											<div class="clear"></div>
											</div>											
											<div class="clear"></div>										
											<div class="message_body">
													<strong><?php echo $this->_tpl_vars['lang']['Message']; ?>
: </strong>
													<?php echo $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['msg_dec']; ?>
<br><br>
													<div class="clear"></div>
				
												<div class="reply">
											   <?php if ($this->_tpl_vars['current_user'] != $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['sender_login_id']): ?>
											   <a href=#  onClick="JavaScript: ReportViolation_Click(document.frmmsgboard,'<?php echo $this->_tpl_vars['arr_msg'][$this->_sections['msg']['index']]['sender_login_id']; ?>
','<?php echo $this->_tpl_vars['current_user']; ?>
');"/>Report user</a>
											   <?php endif; ?>
												</div>
												<div class="clear"></div>												
											</div>							
											</div>						
								<?php endfor; endif; ?>				   
								<br /><br />
								<div class="buttons">
								<button type="submit" name="Submit" value="Close"  onclick="Javascript: window.close();">Close</button>
								</div>	

								<?php endif; ?>
								<?php endif; ?>
	
					<input type="hidden" name="Action"/>
					<input type="hidden" name="project_id" value="<?php echo $this->_tpl_vars['project_id']; ?>
" />
					<input type="hidden" name="project_creator" value="<?php echo $this->_tpl_vars['project_creator']; ?>
" />
					<input type="hidden" name="title" value="<?php echo $this->_tpl_vars['title']; ?>
" />
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" />

					</form>
									<div class="clear"></div>
				<div id="more_link"></div>
			</div>
		</div>
	<div class="page_bottom"></div>
	<div class="clear"></div>
</div><!-- end .grid_8.alpha -->