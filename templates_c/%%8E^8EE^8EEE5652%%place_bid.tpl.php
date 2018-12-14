<?php /* Smarty version 2.6.26, created on 2012-08-14 11:18:36
         compiled from place_bid.tpl */ ?>
<script language="javascript">
	var min_bid_amount		 	 = '<?php echo $this->_tpl_vars['lang']['min_bid_amount']; ?>
';
	var JS_Bid_Amount			 = '<?php echo $this->_tpl_vars['lang']['JS_Bid_Amount']; ?>
';
	var JS_Confirm_Bid			 = '<?php echo $this->_tpl_vars['lang']['JS_Confirm_Bid']; ?>
';
	var JS_Days					 = '<?php echo $this->_tpl_vars['lang']['JS_Days']; ?>
';
	var JS_English				 = '<?php echo $this->_tpl_vars['lang']['JS_English']; ?>
';
	var JS_Days1				 = '<?php echo $this->_tpl_vars['lang']['JS_Days1']; ?>
';
	var JS_bid				 	 = '<?php echo $this->_tpl_vars['lang']['JS_bid']; ?>
';
	var JS_Bid1				 	 = '<?php echo $this->_tpl_vars['lang']['JS_Bid1']; ?>
';
	addLoadEvent(prepareInputsForHints);
</script>
 <div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<?php if ($this->_tpl_vars['status'] != 1): ?><h1>Bid On Tasks : <?php echo $this->_tpl_vars['project_title']; ?>
</h1><?php elseif ($this->_tpl_vars['status'] != 0): ?><h1>Update Bid - Tasks "<?php echo $this->_tpl_vars['project_title']; ?>
"</h1><?php endif; ?>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><?php if ($this->_tpl_vars['status'] != 1): ?>Place A Bid<?php elseif ($this->_tpl_vars['status'] != 0): ?>Update Your Bid<?php endif; ?></label>
				</div>
				</div>
				<div class="clear"></div>
				<div class="field username account_login" style="margin-bottom:20px;">
				<span style="width:100%;text-align:center;">
				Use this form to <?php if ($this->_tpl_vars['status'] != 1): ?>submit<?php else: ?>update<?php endif; ?> your bid for the task "<?php echo $this->_tpl_vars['project_title']; ?>
". Be sure to provide comments for the Task Owner in  the Bids Details section.
				If you need more clarity on the task before bidding, use the messaging system to ask a question by clicking on <?php if (! $_SESSION['User_Name']): ?><a onclick="popup('popUpDiv')" href="#" class="footerlinkcommon23"><strong><?php echo $this->_tpl_vars['lang']['Message_Board']; ?>
(<?php echo $this->_tpl_vars['msgboardcnt']; ?>
)</strong></a><?php else: ?><a href="#bid_list" onclick="JavaScript: popupWindowURL('message_board.php?project_id=<?php echo $this->_tpl_vars['project_id']; ?>
&project_creator=<?php echo $this->_tpl_vars['project_posted_by']; ?>
&id=1&pop_up=true','','680','500','','true','true');" class="footerlinkcommon23"><strong>Ask A Question</strong></a><?php endif; ?> 
				</span>
				</div>					
				<div class="clear"></div>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmBid" enctype="multipart/form-data">
				<div class="clear"></div>				
				<?php if ($this->_tpl_vars['SuccMsg']): ?>
				<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['SuccMsg']; ?>
</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['premium_msg']): ?>
				<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['premium_msg']; ?>
</div>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['status'] != 1): ?>
				<div class="note" style="text-align:center;padding:20px;"><?php echo $this->_tpl_vars['msg']; ?>
</div>
				<?php else: ?>
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Bid_Amount']; ?>
</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<input type="text" class="textbox" name="bid_amount" value="<?php echo $this->_tpl_vars['bid_amount']; ?>
" size="3" />
				<span class="hint"><?php echo $this->_tpl_vars['lang']['Note3']; ?>
<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				</div>
				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">Task To Be Completed By</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<center><h3><?php echo $this->_tpl_vars['completed_by']; ?>
 at <?php echo $this->_tpl_vars['completed_time']; ?>
</h3></center>
				<div class="note" style="text-align:center;padding:10px;">
				This is the date the Task Owner indicated they need the tssk completed by. Please be certain you are able to complete the task by the date shown.
				</div>
				<input type="hidden" class="textbox" name="delivery_within" value="<?php echo $this->_tpl_vars['completed_by']; ?>
 at <?php echo $this->_tpl_vars['completed_time']; ?>
" size="5" />
				<span class="hint">This is the date the Task Owner indicated they need the tssk completed by. Please be certain you are able to complete the task by the date shown.<span class="hint-pointer">&nbsp;</span></span>
				<div class="clear"></div>	
				
				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address">Bid Comments</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<textarea name="en_bid_desc" cols="90" rows="10" class="textarea"><?php echo $this->_tpl_vars['en_bid_desc']; ?>
</textarea>
				<span class="hint"><?php echo $this->_tpl_vars['lang']['Bid_Note']; ?>
<span class="hint-pointer">&nbsp;</span></span>				
				<div class="clear"></div>	
				</div>
				
				<div class="note" style="text-align:center;padding:10px;">
				<a href="Javascript: View_Terms()" class="footerlinkcommon21"><strong>View Terms & Conditions</strong></a><br />
				<?php echo $this->_tpl_vars['lang']['IMPORTANT']; ?>

				</div>				

				<div class="title-links" style="width:400px;">
				<div class="form_page_text" style="text-align:right;">
				<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Notification_Option']; ?>
</label>
				</div>
				</div>
				<div class="title-bottom"></div>
				<div class="clear"></div>
				<div class="field">
				<span style="line-height:35px"><input class="shorter" type="checkbox" name="notification_status" value="1" <?php echo $this->_tpl_vars['chechked']; ?>
/>&nbsp;<?php echo $this->_tpl_vars['lang']['Notify']; ?>
</span>
				<div class="clear"></div>	
				</div>														
				<div class="buttons">
				<button type="submit" value="<?php echo $this->_tpl_vars['lang']['Place_Bid']; ?>
"  name="Submit"  onclick="javascript: return Check_Bidding(document.frmBid);"  style='text-decoration:none;' class="negative">
				<?php if ($this->_tpl_vars['status'] != 1): ?>Place Bid<?php elseif ($this->_tpl_vars['status'] != 0): ?>Update Bid<?php endif; ?>
				</button>
				</div>
	
				<?php endif; ?>
				<input type="hidden" name="project_id" value="<?php echo $this->_tpl_vars['project_id']; ?>
" />
				<input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['amount']; ?>
" />
				</form>
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