<?php /* Smarty version 2.6.26, created on 2012-08-12 12:41:37
         compiled from Msg.tpl */ ?>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['pagename']; ?>
</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;margin-bottom:10px">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><?php echo $this->_tpl_vars['msg']; ?>
</label>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="message" style="text-align:center;margin-bottom:50px">
				<?php if ($this->_tpl_vars['info']): ?><?php echo $this->_tpl_vars['info']; ?>
<br /><br /><?php endif; ?>
				<div style="margin:0 auto;margin-top:30px;<?php if ($this->_tpl_vars['navigation'] && $this->_tpl_vars['navigation1'] && $this->_tpl_vars['navigation2']): ?>width:450px;<?php elseif ($this->_tpl_vars['navigation'] && $this->_tpl_vars['navigation1']): ?>width:300px;<?php else: ?>width:150px;<?php endif; ?>"><div class="button-no" style="float:left;margin-right:6px;"><?php echo $this->_tpl_vars['navigation']; ?>
</div><?php if ($this->_tpl_vars['navigation1']): ?><div class="button-no" style="float:left;margin-right:6px;"><?php echo $this->_tpl_vars['navigation1']; ?>
</div><?php endif; ?><?php if ($this->_tpl_vars['navigation2']): ?><div class="button-no" style="float:left;margin-right:6px;"><?php echo $this->_tpl_vars['navigation2']; ?>
</div><?php endif; ?></div>
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