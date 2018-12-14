<?php /* Smarty version 2.6.26, created on 2012-08-27 20:16:24
         compiled from tasker_feedback.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'tasker_feedback.tpl', 16, false),array('modifier', 'intval', 'tasker_feedback.tpl', 19, false),array('modifier', 'string_format', 'tasker_feedback.tpl', 28, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">
<h1><?php echo $this->_tpl_vars['user']; ?>
's Tasker Feedback</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>					
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><strong>Feedback for <?php echo $this->_tpl_vars['user']; ?>
</strong></label>			
				</div>
				</div>
				<div class="clear"></div>
							<?php if ($this->_tpl_vars['Loop']): ?>
							<?php unset($this->_sections['rating']);
$this->_sections['rating']['name'] = 'rating';
$this->_sections['rating']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rating']['show'] = true;
$this->_sections['rating']['max'] = $this->_sections['rating']['loop'];
$this->_sections['rating']['step'] = 1;
$this->_sections['rating']['start'] = $this->_sections['rating']['step'] > 0 ? 0 : $this->_sections['rating']['loop']-1;
if ($this->_sections['rating']['show']) {
    $this->_sections['rating']['total'] = $this->_sections['rating']['loop'];
    if ($this->_sections['rating']['total'] == 0)
        $this->_sections['rating']['show'] = false;
} else
    $this->_sections['rating']['total'] = 0;
if ($this->_sections['rating']['show']):

            for ($this->_sections['rating']['index'] = $this->_sections['rating']['start'], $this->_sections['rating']['iteration'] = 1;
                 $this->_sections['rating']['iteration'] <= $this->_sections['rating']['total'];
                 $this->_sections['rating']['index'] += $this->_sections['rating']['step'], $this->_sections['rating']['iteration']++):
$this->_sections['rating']['rownum'] = $this->_sections['rating']['iteration'];
$this->_sections['rating']['index_prev'] = $this->_sections['rating']['index'] - $this->_sections['rating']['step'];
$this->_sections['rating']['index_next'] = $this->_sections['rating']['index'] + $this->_sections['rating']['step'];
$this->_sections['rating']['first']      = ($this->_sections['rating']['iteration'] == 1);
$this->_sections['rating']['last']       = ($this->_sections['rating']['iteration'] == $this->_sections['rating']['total']);
?>
							<div id="all_tasks" style="margin:0 auto;padding:10px" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >							
							<span class="title"><a href="task_<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['project_id']; ?>
_<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['clean_title']; ?>
.html" class="footerlink"><?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['project_title']; ?>
</a></span>
							<div class="clear"></div>
							<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120">
							<div class="clear"></div>							
							<strong>Rated on:</strong> <?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['date_time']; ?>
 | <strong>Rated by:</strong> <a href="tasker_profile_<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
.html" class="footerlink"><?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
</a>
											 <?php if ($this->_tpl_vars['arating'][$this->_sections['rating']['index']]['count'] != ''): ?> 
											   <a href="<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
_task_owner_feedback.html" class="footerlink">(<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['count']; ?>
)</a>
											 <?php else: ?>
											   <a href="<?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating_by_user']; ?>
_task_owner_feedback.html" class="footerlink">(0)</a>
											<?php endif; ?>
							|
							<strong>Rating: </strong><?php echo ((is_array($_tmp=$this->_tpl_vars['arating'][$this->_sections['rating']['index']]['rating'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
	
							<div class="clear"></div>
							<strong>Comments: </strong><?php echo $this->_tpl_vars['arating'][$this->_sections['rating']['index']]['dec']; ?>

							<div class="clear"></div>
							</div>							
							<?php endfor; endif; ?>
							<?php else: ?>
							<div style="margin:0 auto;text-align:center;padding:20px;"><?php echo $this->_tpl_vars['Text1']; ?>
 <strong><?php echo $this->_tpl_vars['user']; ?>
</strong> <?php echo $this->_tpl_vars['Text2']; ?>
 </div>
							</tr>
							<?php endif; ?>
						<div class="clear"></div>
						<div id="more_link"></div>
		<div class="clear"></div>		
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>	
	  <div class="right-column-wrap">
	  <h1>Average Ratings</h1>
		<?php if ($this->_tpl_vars['Loop']): ?>
		<div><strong><?php echo $this->_tpl_vars['Total_Reviews']; ?>
</strong><strong> :  <?php echo $this->_tpl_vars['Loop']; ?>
</strong></div>
		<div class="clear"></div>		
		<?php else: ?>
		<div><strong><?php echo $this->_tpl_vars['Total_Reviews']; ?>
</strong><strong> :  0</strong></div>
		<div class="clear"></div>		
		<?php endif; ?>		
		<div><strong><?php echo $this->_tpl_vars['Average_Rating']; ?>
 : </strong><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['ave_rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120"></div>
		<div class="clear"></div>
		<div>(<strong><?php echo $this->_tpl_vars['ave_rating']; ?>
 out of 10</strong>)</div>
		<div class="clear"></div>
      </div><!--right-column-wrap-->
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
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Mytasks']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Map']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		  
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->