<?php /* Smarty version 2.6.26, created on 2012-08-14 14:26:41
         compiled from view_all_my_tasks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'view_all_my_tasks.tpl', 25, false),array('modifier', 'stripslashes', 'view_all_my_tasks.tpl', 27, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['page_header']; ?>
 For <?php echo $this->_tpl_vars['citycurrent']; ?>
</h1>
<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li class="current"><a href="my-posted-tasks.html">My Posted Task</a><span></span></li>			
					<li><a href="my-assigned-tasks.html">My Assigned Tasks</a><span></span></li>
					<li><a href="make-deposit.html">Deposit</a><span></span></li>
					<li><a href="my-escrow-payments.html">Escrow</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>		
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="body_shim">
					<?php if ($this->_tpl_vars['succMsg']): ?>
					<div><?php echo $this->_tpl_vars['succMsg']; ?>
</div>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['Loop1'] > 0): ?>
								<?php unset($this->_sections['project_name']);
$this->_sections['project_name']['name'] = 'project_name';
$this->_sections['project_name']['loop'] = is_array($_loop=$this->_tpl_vars['Loop1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['project_name']['show'] = true;
$this->_sections['project_name']['max'] = $this->_sections['project_name']['loop'];
$this->_sections['project_name']['step'] = 1;
$this->_sections['project_name']['start'] = $this->_sections['project_name']['step'] > 0 ? 0 : $this->_sections['project_name']['loop']-1;
if ($this->_sections['project_name']['show']) {
    $this->_sections['project_name']['total'] = $this->_sections['project_name']['loop'];
    if ($this->_sections['project_name']['total'] == 0)
        $this->_sections['project_name']['show'] = false;
} else
    $this->_sections['project_name']['total'] = 0;
if ($this->_sections['project_name']['show']):

            for ($this->_sections['project_name']['index'] = $this->_sections['project_name']['start'], $this->_sections['project_name']['iteration'] = 1;
                 $this->_sections['project_name']['iteration'] <= $this->_sections['project_name']['total'];
                 $this->_sections['project_name']['index'] += $this->_sections['project_name']['step'], $this->_sections['project_name']['iteration']++):
$this->_sections['project_name']['rownum'] = $this->_sections['project_name']['iteration'];
$this->_sections['project_name']['index_prev'] = $this->_sections['project_name']['index'] - $this->_sections['project_name']['step'];
$this->_sections['project_name']['index_next'] = $this->_sections['project_name']['index'] + $this->_sections['project_name']['step'];
$this->_sections['project_name']['first']      = ($this->_sections['project_name']['iteration'] == 1);
$this->_sections['project_name']['last']       = ($this->_sections['project_name']['iteration'] == $this->_sections['project_name']['total']);
?>
									<div class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
" style="border:1px dashed #ccc;padding:5px;">
									<div class="row column_format">
									<span class="row_title"><strong><a href="task_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"><?php echo ((is_array($_tmp=$this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></strong></span><span style="float:right;margin-right:10px;padding:2px;background:#FF0000;color:#fff;"><strong>Bids <?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['bid']; ?>
</strong></span>
									<div class="clear"></div>
									<strong>Complete By: </strong> <?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['completed_by']; ?>
 at <?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['completed_time']; ?>

									</div>
									<div class="clear"></div>
									<div class="row column_format">									
										<div class="left red">
											<?php if ($this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_status'] == 1): ?>
												<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['time_remaining']; ?>
 left for bidding!										
											<?php elseif ($this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_status'] == 2): ?>
												Task Awarded to <?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_post_to']; ?>

												<div class="clear"></div>
												Time Left To Accept: <?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['time_remaining']; ?>

											<?php elseif ($this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_status'] == 3): ?>
												Task Accepted and Underway
											<?php elseif ($this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_status'] == 4): ?>
												Task Canceled bt Task Owner
											<?php elseif ($this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_status'] == 5): ?>
												Task Marked Completed
											<?php elseif ($this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_status'] == 6): ?>
												Task Completed
											<?php elseif ($this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_status'] == 7): ?>
												Task Failed				
											<?php endif; ?>												
											</div>
											
											<div class="right button-no" style="margin-right:5px;">
											<a href="task_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2">Manage This Task</a>
											</div>
										</div>
									<div class="clear"></div>	
								   </div>
							   
								<?php endfor; endif; ?>
					<div><ul class="paginator"><?php echo $this->_tpl_vars['Page_Link']; ?>
</ul></div>			

					<?php else: ?>
					<div><?php echo $this->_tpl_vars['lang']['Text4']; ?>
</strong></div>	  
					<?php endif; ?>

				</div>
 				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
	<br/><br />
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address">
					Your Unpublished Task For <?php echo $this->_tpl_vars['citycurrent']; ?>
					
					</label>
				</div>
				</div>			
				<div class="clear"></div>
				<?php if ($this->_tpl_vars['StagedLoop'] > 0): ?>
				<div class="message" style="text-align:center;padding:20px;">Your unpublished Task will expire within <strong>48 HOURS</strong> of when they were submitted. Please click on a task link to begin the publishing process. You need to have sufficient funds in your Task Sonic Wallet to publish a task.</div>					
				<div class="clear"></div>
				<?php endif; ?>				
				<div class="body_shim">
					<?php if ($this->_tpl_vars['StagedLoop'] > 0): ?>
								<?php unset($this->_sections['staged_name']);
$this->_sections['staged_name']['name'] = 'staged_name';
$this->_sections['staged_name']['loop'] = is_array($_loop=$this->_tpl_vars['StagedLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['staged_name']['show'] = true;
$this->_sections['staged_name']['max'] = $this->_sections['staged_name']['loop'];
$this->_sections['staged_name']['step'] = 1;
$this->_sections['staged_name']['start'] = $this->_sections['staged_name']['step'] > 0 ? 0 : $this->_sections['staged_name']['loop']-1;
if ($this->_sections['staged_name']['show']) {
    $this->_sections['staged_name']['total'] = $this->_sections['staged_name']['loop'];
    if ($this->_sections['staged_name']['total'] == 0)
        $this->_sections['staged_name']['show'] = false;
} else
    $this->_sections['staged_name']['total'] = 0;
if ($this->_sections['staged_name']['show']):

            for ($this->_sections['staged_name']['index'] = $this->_sections['staged_name']['start'], $this->_sections['staged_name']['iteration'] = 1;
                 $this->_sections['staged_name']['iteration'] <= $this->_sections['staged_name']['total'];
                 $this->_sections['staged_name']['index'] += $this->_sections['staged_name']['step'], $this->_sections['staged_name']['iteration']++):
$this->_sections['staged_name']['rownum'] = $this->_sections['staged_name']['iteration'];
$this->_sections['staged_name']['index_prev'] = $this->_sections['staged_name']['index'] - $this->_sections['staged_name']['step'];
$this->_sections['staged_name']['index_next'] = $this->_sections['staged_name']['index'] + $this->_sections['staged_name']['step'];
$this->_sections['staged_name']['first']      = ($this->_sections['staged_name']['iteration'] == 1);
$this->_sections['staged_name']['last']       = ($this->_sections['staged_name']['iteration'] == $this->_sections['staged_name']['total']);
?>
									<div class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
									<div class="row column_format">
									<span class="row_title"><strong><a href="staged_task_<?php echo $this->_tpl_vars['staged_task'][$this->_sections['staged_name']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['staged_task'][$this->_sections['staged_name']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"><?php echo ((is_array($_tmp=$this->_tpl_vars['staged_task'][$this->_sections['staged_name']['index']]['project_Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></strong></span><span style="float:right;margin-right:10px;">Posted: <?php echo $this->_tpl_vars['staged_task'][$this->_sections['staged_name']['index']]['project_posted_date']; ?>
</span>
									</div>
									<div class="clear"></div>
								   </div>
							   
								<?php endfor; endif; ?>		
					<?php else: ?>
					<div>No unpublished tasks found</strong></div>	  
					<?php endif; ?>

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