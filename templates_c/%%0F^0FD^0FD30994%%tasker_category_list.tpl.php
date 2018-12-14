<?php /* Smarty version 2.6.26, created on 2012-08-14 14:56:35
         compiled from tasker_category_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'tasker_category_list.tpl', 17, false),array('modifier', 'mod', 'tasker_category_list.tpl', 18, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Locate A Sonic Tasker in <?php echo $this->_tpl_vars['citycurrent']; ?>
</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
				<label for="login-email-address"><strong>Choose A Category To View Sonic Taskers in <?php echo $this->_tpl_vars['citycurrent']; ?>
</strong></label>
				</div>
				</div>
				<div class="clear"></div>									
				<div class="cat-row">  				
					<?php $this->assign('col', 5); ?>
					<?php unset($this->_sections['CatList']);
$this->_sections['CatList']['name'] = 'CatList';
$this->_sections['CatList']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['CatList']['show'] = true;
$this->_sections['CatList']['max'] = $this->_sections['CatList']['loop'];
$this->_sections['CatList']['step'] = 1;
$this->_sections['CatList']['start'] = $this->_sections['CatList']['step'] > 0 ? 0 : $this->_sections['CatList']['loop']-1;
if ($this->_sections['CatList']['show']) {
    $this->_sections['CatList']['total'] = $this->_sections['CatList']['loop'];
    if ($this->_sections['CatList']['total'] == 0)
        $this->_sections['CatList']['show'] = false;
} else
    $this->_sections['CatList']['total'] = 0;
if ($this->_sections['CatList']['show']):

            for ($this->_sections['CatList']['index'] = $this->_sections['CatList']['start'], $this->_sections['CatList']['iteration'] = 1;
                 $this->_sections['CatList']['iteration'] <= $this->_sections['CatList']['total'];
                 $this->_sections['CatList']['index'] += $this->_sections['CatList']['step'], $this->_sections['CatList']['iteration']++):
$this->_sections['CatList']['rownum'] = $this->_sections['CatList']['iteration'];
$this->_sections['CatList']['index_prev'] = $this->_sections['CatList']['index'] - $this->_sections['CatList']['step'];
$this->_sections['CatList']['index_next'] = $this->_sections['CatList']['index'] + $this->_sections['CatList']['step'];
$this->_sections['CatList']['first']      = ($this->_sections['CatList']['iteration'] == 1);
$this->_sections['CatList']['last']       = ($this->_sections['CatList']['iteration'] == $this->_sections['CatList']['total']);
?>
					<div class="cat-col"><a href="all_tasker_profiles_<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['id']; ?>
.html" class="footerlinkcommon2" ><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['desc'])) ? $this->_run_mod_handler('replace', true, $_tmp, '<P>', '') : smarty_modifier_replace($_tmp, '<P>', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, '</P>', '') : smarty_modifier_replace($_tmp, '</P>', '')); ?>
</a><br />(<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['member_count_menu']; ?>
)</div>
					<?php if (((is_array($_tmp=$this->_sections['CatList']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 5): ?>
					<div class="clear"></div>
					<?php endif; ?>
					<?php endfor; endif; ?>
				</div>					
			<div class="clear"></div> 				
			<div id="more_link"></div>
			<div class="clear"></div>
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