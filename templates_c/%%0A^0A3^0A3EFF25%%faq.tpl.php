<?php /* Smarty version 2.6.26, created on 2012-08-13 02:28:28
         compiled from faq.tpl */ ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Task Sonic FAQ</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						<?php if ($this->_tpl_vars['Action'] == 1): ?>Here's The Answer!<?php else: ?>Task Sonic FAQ<?php endif; ?>						
						</label>
					</div>
					</div>
					<div class="clear"></div>
					<?php if ($this->_tpl_vars['Action'] == 1): ?>
					<div class="field">
					<h3><?php echo $this->_tpl_vars['faq_title']; ?>
</h3>
					<?php echo $this->_tpl_vars['faq_content']; ?>

					<div class="clear"></div>
					<div class="faq_return"><?php echo $this->_tpl_vars['back']; ?>
</div>
					<div class="clear"></div>
					</div>
					<?php else: ?>
					<div class="field">
					<?php unset($this->_sections['faq']);
$this->_sections['faq']['name'] = 'faq';
$this->_sections['faq']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['faq']['show'] = true;
$this->_sections['faq']['max'] = $this->_sections['faq']['loop'];
$this->_sections['faq']['step'] = 1;
$this->_sections['faq']['start'] = $this->_sections['faq']['step'] > 0 ? 0 : $this->_sections['faq']['loop']-1;
if ($this->_sections['faq']['show']) {
    $this->_sections['faq']['total'] = $this->_sections['faq']['loop'];
    if ($this->_sections['faq']['total'] == 0)
        $this->_sections['faq']['show'] = false;
} else
    $this->_sections['faq']['total'] = 0;
if ($this->_sections['faq']['show']):

            for ($this->_sections['faq']['index'] = $this->_sections['faq']['start'], $this->_sections['faq']['iteration'] = 1;
                 $this->_sections['faq']['iteration'] <= $this->_sections['faq']['total'];
                 $this->_sections['faq']['index'] += $this->_sections['faq']['step'], $this->_sections['faq']['iteration']++):
$this->_sections['faq']['rownum'] = $this->_sections['faq']['iteration'];
$this->_sections['faq']['index_prev'] = $this->_sections['faq']['index'] - $this->_sections['faq']['step'];
$this->_sections['faq']['index_next'] = $this->_sections['faq']['index'] + $this->_sections['faq']['step'];
$this->_sections['faq']['first']      = ($this->_sections['faq']['iteration'] == 1);
$this->_sections['faq']['last']       = ($this->_sections['faq']['iteration'] == $this->_sections['faq']['total']);
?>
					<div class="faq_title"><img src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/templates/images/bullet.png" alt="" />&nbsp;&nbsp;<a href="/faq_details_<?php echo $this->_tpl_vars['arr_faq'][$this->_sections['faq']['index']]['faq_id']; ?>
.html"><?php echo $this->_tpl_vars['arr_faq'][$this->_sections['faq']['index']]['faq_title']; ?>
</a></div>
					<div class="clear"></div>
					<?php endfor; else: ?>
					No FAQs Available
					<?php endif; ?>			
					</div>
					<?php endif; ?>				
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>		
		<?php if ($_SESSION['User_Name']): ?>
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
		<?php else: ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_PostLoggedOut']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
		<?php endif; ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Map']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>				
		<div class="clear"></div>		
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->				
			