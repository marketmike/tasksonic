<?php /* Smarty version 2.6.26, created on 2012-08-14 16:48:24
         compiled from block_side_my_tasks.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'block_side_my_tasks.tpl', 8, false),array('modifier', 'stripslashes', 'block_side_my_tasks.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['Loop1'] > 0): ?>
<div class="right-column-wrap">
<h3>My Open Tasks</h3>
<div style="padding:5px;font-weight:bold;">
<div style="float:right;margin-right:0px;width:60px;text-align:center;">Ave. Bid</div>
</div>
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
<div class="<?php echo smarty_function_cycle(array('values' => 'list_D,list_C'), $this);?>
" style="padding:5px;font-weight:bold;">
<div style="float:left;min-height:24px;height:auto;width:210px;border:1px dotted #436200;padding:5px;"><a href="task_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"><?php echo ((is_array($_tmp=$this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></div><div style="float:left;margin-left:5px;background:#436200;color:#fff;font-weight:bold;line-height:30px;font-size:14px;height:30px;width:40px;text-align:center;"><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['bid']; ?>
</div>
<div class="clear"></div>
</div>
<?php endfor; endif; ?>
</div>
<?php endif; ?>			