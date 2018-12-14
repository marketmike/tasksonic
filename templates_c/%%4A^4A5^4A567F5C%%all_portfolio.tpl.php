<?php /* Smarty version 2.6.26, created on 2012-08-14 22:21:17
         compiled from all_portfolio.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'all_portfolio.tpl', 18, false),array('modifier', 'intval', 'all_portfolio.tpl', 32, false),)), $this); ?>
<?php echo '
    <script type="text/javascript">
    $(function() {
        $(\'.portfolio a\').lightBox();
    });
    </script>
'; ?>

<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['Find_Portfolio']; ?>
</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="body_shim">
				<?php if ($this->_tpl_vars['Loop'] > 0): ?>
					<?php unset($this->_sections['Portfolios']);
$this->_sections['Portfolios']['name'] = 'Portfolios';
$this->_sections['Portfolios']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['Portfolios']['show'] = true;
$this->_sections['Portfolios']['max'] = $this->_sections['Portfolios']['loop'];
$this->_sections['Portfolios']['step'] = 1;
$this->_sections['Portfolios']['start'] = $this->_sections['Portfolios']['step'] > 0 ? 0 : $this->_sections['Portfolios']['loop']-1;
if ($this->_sections['Portfolios']['show']) {
    $this->_sections['Portfolios']['total'] = $this->_sections['Portfolios']['loop'];
    if ($this->_sections['Portfolios']['total'] == 0)
        $this->_sections['Portfolios']['show'] = false;
} else
    $this->_sections['Portfolios']['total'] = 0;
if ($this->_sections['Portfolios']['show']):

            for ($this->_sections['Portfolios']['index'] = $this->_sections['Portfolios']['start'], $this->_sections['Portfolios']['iteration'] = 1;
                 $this->_sections['Portfolios']['iteration'] <= $this->_sections['Portfolios']['total'];
                 $this->_sections['Portfolios']['index'] += $this->_sections['Portfolios']['step'], $this->_sections['Portfolios']['iteration']++):
$this->_sections['Portfolios']['rownum'] = $this->_sections['Portfolios']['iteration'];
$this->_sections['Portfolios']['index_prev'] = $this->_sections['Portfolios']['index'] - $this->_sections['Portfolios']['step'];
$this->_sections['Portfolios']['index_next'] = $this->_sections['Portfolios']['index'] + $this->_sections['Portfolios']['step'];
$this->_sections['Portfolios']['first']      = ($this->_sections['Portfolios']['iteration'] == 1);
$this->_sections['Portfolios']['last']       = ($this->_sections['Portfolios']['iteration'] == $this->_sections['Portfolios']['total']);
?>
					<div id="all_tasks" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
						<span class="title" style="text-transform:capitalize">
						<?php echo $this->_tpl_vars['user_login_id'][$this->_sections['Portfolios']['index']]; ?>

						<?php if ($this->_tpl_vars['location_1'][$this->_sections['Portfolios']['index']] != ''): ?>
						from <?php echo $this->_tpl_vars['location'][$this->_sections['Portfolios']['index']]; ?>

						<?php else: ?>
						from <?php echo $this->_tpl_vars['location_2'][$this->_sections['Portfolios']['index']]; ?>

						<?php endif; ?>
						</span>
						<div style="float:right;margin-right:5px">
							<strong><?php echo $this->_tpl_vars['lang']['Rating']; ?>
: </strong>
							<?php if ($this->_tpl_vars['rating'][$this->_sections['Portfolios']['index']] == 0.00): ?>
								<?php echo $this->_tpl_vars['lang']['No_feedback']; ?>
<?php else: ?>
								<a href="<?php echo $this->_tpl_vars['user_login_id'][$this->_sections['Portfolios']['index']]; ?>
_tasker_feedback.html" class="footerlink">								
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['rating'][$this->_sections['Portfolios']['index']])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120"></a>
							<?php endif; ?>				
						</div>
						<div class="clear"></div>
						<div style="width:560px;background:#E0E1E2;height:140px;padding:10px;">
						<?php $_from = $this->_tpl_vars['files'][$this->_sections['Portfolios']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['files_name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['files_name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['files_name']):
        $this->_foreach['files_name']['iteration']++;
?>
						<?php if ($this->_foreach['files_name']['total'] == 1): ?>
							<div style="float:left;margin-left:10px;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo $this->_tpl_vars['files_name']->sample_file; ?>
" title="<?php echo $this->_tpl_vars['files_name']->title; ?>
 - <?php echo $this->_tpl_vars['files_name']->description; ?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo $this->_tpl_vars['files_name']->sample_file; ?>
" border="0" height="100" width="100" style="margin:0px" /></a></div>
						<?php else: ?>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo $this->_tpl_vars['files_name']->sample_file; ?>
" title="<?php echo $this->_tpl_vars['files_name']->title; ?>
 - <?php echo $this->_tpl_vars['files_name']->description; ?>
"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo $this->_tpl_vars['files_name']->sample_file; ?>
" border="0" height="100" width="100" style="margin:0px" /></a></div>
						<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						<?php if ($this->_foreach['files_name']['total'] == 4): ?>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
<?php echo $this->_tpl_vars['files_name']->sample_file; ?>
" border="0" height="100" width="100" style="margin:0px" /></a></div>
						<?php endif; ?>
						<?php if ($this->_foreach['files_name']['total'] == 3): ?>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>							
						<?php endif; ?>
						<?php if ($this->_foreach['files_name']['total'] == 2): ?>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>							
						<?php endif; ?>
						<?php if ($this->_foreach['files_name']['total'] == 1): ?>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>
							<div style="float:left;margin-right:10px;" class="portfolio"><a href="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png"><img src="<?php echo $this->_tpl_vars['img_path']; ?>
default-portfolio.png" border="0" height="100" width="100" style="margin:0px" /></a></div>							
						<?php endif; ?>						
						<div class="clear"></div>
						<div style="width:578px;margin-top:10px;background:#fff">
						<div class="button-no" style="float:left;margin-left:2px;margin-right:6px;"><a href="tasker_profile_<?php echo $this->_tpl_vars['user_login_id'][$this->_sections['Portfolios']['index']]; ?>
.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Profile']; ?>
</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="<?php echo $this->_tpl_vars['user_login_id'][$this->_sections['Portfolios']['index']]; ?>
_tasker_feedback.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Feedback']; ?>
</a></div>
						<div class="button-no" style="float:left;margin-right:6px;"><a href="tasker_portfolio_<?php echo $this->_tpl_vars['user_login_id'][$this->_sections['Portfolios']['index']]; ?>
.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Portfolio']; ?>
</a></div>
						<div class="button-no" style="float:left;margin-right:0px;"><a href="post_task_<?php echo $this->_tpl_vars['user_login_id'][$this->_sections['Portfolios']['index']]; ?>
.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');">Post Task To</a></div>	
						</div>					
						<div class="clear"></div>					
						</div>
					</div>
					<div class="clear"></div>				
					<?php endfor; endif; ?>
					<?php else: ?>
					<div style="margin:0 auto;text-align:center;padding:20px">
					<h3>No Tasker Portfolios Found For <?php echo $this->_tpl_vars['citycurrent']; ?>
</h3>
					</div>
					<?php endif; ?>
					</div>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
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