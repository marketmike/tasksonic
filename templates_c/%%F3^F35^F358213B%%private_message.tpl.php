<?php /* Smarty version 2.6.26, created on 2012-08-14 09:40:15
         compiled from private_message.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'private_message.tpl', 91, false),)), $this); ?>
<!-- Private Messages Pop Up For Tasker To Communicate with Task Owner--> 
<script language="javascript">
	var JS_English_Msg		 = 'Message Text Required';
</script>

<div id="popgrid_620">
<div class="clear"></div>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmprivatemsg" enctype="multipart/form-data">
					<?php if ($_SESSION['User_Name'] == ''): ?>
								<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['lang']['Private_Message1']; ?>
</div>
								<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Close']; ?>
" onclick="javascript : window.close();"/>					
					<?php else: ?>
					
						<?php if ($_SESSION['User_Name'] == $this->_tpl_vars['project_creator']): ?>
								<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['lang']['Private_Message']; ?>
</div>
								<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Close']; ?>
" onclick="javascript : window.close();"/>
						<?php else: ?>
								<?php if ($this->_tpl_vars['m1']): ?>
								<div class="note" style="text-align:center;padding:20px;"><h3><?php echo $this->_tpl_vars['title']; ?>
</h3><br /><?php echo $this->_tpl_vars['lang']['Msg']; ?>
<?php echo $this->_tpl_vars['project_creator']; ?>
</div>
								<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Close']; ?>
" onclick="javascript : window.close();"/>
								<?php else: ?>
								<div class="clear"></div>
								<div class="title-links" style="width:100%;">
									<div class="form_page_text" style="text-align:center;">
										<label for="login-email-address"><?php echo $this->_tpl_vars['Site_Title']; ?>
 Task "<?php echo $this->_tpl_vars['title']; ?>
"</label>
									</div>
								</div>
								<div class="clear"></div>					
								<div class="field">
								<div class="message_title"><?php echo $this->_tpl_vars['lang']['Msg_Between']; ?>
 <?php echo $this->_tpl_vars['project_creator']; ?>
 <?php echo $this->_tpl_vars['lang']['And']; ?>
 <?php echo $this->_tpl_vars['user_name']; ?>
</div>
								<div class="clear"></div>
								<?php if ($this->_tpl_vars['project_status'] == 3): ?>
								Now that the task has been awarded to <?php echo $this->_tpl_vars['user_name']; ?>
, <?php echo $this->_tpl_vars['project_creator']; ?>
 and <?php echo $this->_tpl_vars['user_name']; ?>
 should use the Private Message system to stay in touch throughout the completion process.<br /><br />While we encourage you to use the Private Messaging system for all communication, we do realize that alternate means of communication can at times be more effective for certain types of tasks. Exchanging contact information for this purpose is permitted as needed to complete the task.
								<?php else: ?>
								<?php echo $this->_tpl_vars['lang']['Important2']; ?>

								<?php endif; ?>
								<div class="clear"></div>	
								</div>			
								<div class="clear"></div>
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address">Post Message To <?php echo $this->_tpl_vars['project_creator']; ?>
</label>
									</div>
								</div>
								<div class="title-bottom"></div>
								<div class="clear"></div>
								<div class="field">
									<textarea name="en_message_desc" class="textarea" cols="60" rows="7"></textarea>					
								<div class="clear"></div>	
								</div>						
								<div class="clear"></div>
								<div class="title-links" style="width:400px;">
									<div class="form_page_text" style="text-align:right;">
										<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Attached_document']; ?>
</label>
									</div>
								</div>
								<div class="title-bottom"></div>
								<div class="clear"></div>
								<div class="field">
									<input type="file" name="attch_file">					
								<div class="clear"></div>	
								</div>	
								<div class="clear"></div>
								<div class="buttons">
								<button type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Post']; ?>
"  onclick="Javascript: return Check_Details(this.form);"><?php echo $this->_tpl_vars['lang']['Button_Post']; ?>
</button>
								</div>								
							<div class="clear"></div>	
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>	
				<div class="page_bottom"></div>	
				<br /><br />
			<?php if ($this->_tpl_vars['Loop'] > 0): ?>	
			<div class="clear"></div>
			<div class="page_top"></div>
					<div class="page_content">
						<div class="page_content_white">
							<div class="clear"></div>
							<div class="title-links" style="width:100%;">
								<div class="form_page_text" style="text-align:center;">
									<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Msg_Between']; ?>
 <?php echo $this->_tpl_vars['project_creator']; ?>
 <?php echo $this->_tpl_vars['lang']['And']; ?>
 <?php echo $this->_tpl_vars['user_name']; ?>
</label>
								</div>
							</div>
							<div class="clear"></div>				
									<?php unset($this->_sections['privatemsg']);
$this->_sections['privatemsg']['name'] = 'privatemsg';
$this->_sections['privatemsg']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['privatemsg']['show'] = true;
$this->_sections['privatemsg']['max'] = $this->_sections['privatemsg']['loop'];
$this->_sections['privatemsg']['step'] = 1;
$this->_sections['privatemsg']['start'] = $this->_sections['privatemsg']['step'] > 0 ? 0 : $this->_sections['privatemsg']['loop']-1;
if ($this->_sections['privatemsg']['show']) {
    $this->_sections['privatemsg']['total'] = $this->_sections['privatemsg']['loop'];
    if ($this->_sections['privatemsg']['total'] == 0)
        $this->_sections['privatemsg']['show'] = false;
} else
    $this->_sections['privatemsg']['total'] = 0;
if ($this->_sections['privatemsg']['show']):

            for ($this->_sections['privatemsg']['index'] = $this->_sections['privatemsg']['start'], $this->_sections['privatemsg']['iteration'] = 1;
                 $this->_sections['privatemsg']['iteration'] <= $this->_sections['privatemsg']['total'];
                 $this->_sections['privatemsg']['index'] += $this->_sections['privatemsg']['step'], $this->_sections['privatemsg']['iteration']++):
$this->_sections['privatemsg']['rownum'] = $this->_sections['privatemsg']['iteration'];
$this->_sections['privatemsg']['index_prev'] = $this->_sections['privatemsg']['index'] - $this->_sections['privatemsg']['step'];
$this->_sections['privatemsg']['index_next'] = $this->_sections['privatemsg']['index'] + $this->_sections['privatemsg']['step'];
$this->_sections['privatemsg']['first']      = ($this->_sections['privatemsg']['iteration'] == 1);
$this->_sections['privatemsg']['last']       = ($this->_sections['privatemsg']['iteration'] == $this->_sections['privatemsg']['total']);
?>
										<div id="message_wrapper" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
">
											<div class="clear"></div>
											<div class="message_row">
												<div class="col_left"><strong>From: </strong>
												  <?php if ($this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['sender_login_id'] == $this->_tpl_vars['project_creator']): ?>
													  <a href="#" onclick="Javascript : popup_window_link('task_owner_profile_<?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['sender_login_id']; ?>
.html')" class="footerlinkcommon2"> <?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['sender_login_id']; ?>
</a>
												  <?php else: ?>	
													  <a href="#" onclick="Javascript : popup_window_link('tasker_profile_<?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['sender_login_id']; ?>
.html')" class="footerlinkcommon2"> <?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['sender_login_id']; ?>
</a>
												  <?php endif; ?>	
												</div>
												<div class="col_right"><strong><?php echo $this->_tpl_vars['lang']['Date_posted']; ?>
: </strong><?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['date']; ?>
</div>
											<div class="clear"></div>
											</div>											
											<div class="clear"></div>										
											<div class="message_body">
													<strong><?php echo $this->_tpl_vars['lang']['Message']; ?>
: </strong>
													<?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['msg_dec']; ?>
<br><br>
													<div class="clear"></div>
				
												<div class="reply">
												<?php if ($this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['sender_login_id'] == $this->_tpl_vars['project_creator']): ?>
												<a href=#  onClick="JavaScript: ReportViolation_Click(document.frmprivatemsg,'<?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['sender_login_id']; ?>
','<?php echo $this->_tpl_vars['user_name']; ?>
');"/>Report user</a>
												<?php endif; ?>
												</div>
												<div class="clear"></div>												
											</div>
												<div class="clear"></div>
												<?php if ($this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['file1']): ?>
													<div class="message_row">
													<div class="col_left_full"><strong>Attachment : </strong><a href="Javascript: Download_File('<?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['file']; ?>
','Private_Message');" class="footerlinkcommon2"> <?php echo $this->_tpl_vars['arr_private_msg'][$this->_sections['privatemsg']['index']]['file1']; ?>
</a></div>
													<div class="clear"></div>
													</div>
												<?php endif; ?>								
											</div>
											<br />
											<div class="clear"></div>											
										<?php endfor; endif; ?>				
										<div class="clear"></div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>	
								<div class="page_bottom"></div>											
										
						<?php endif; ?>
					<?php endif; ?>
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
</div><!-- end .grid_8.alpha -->