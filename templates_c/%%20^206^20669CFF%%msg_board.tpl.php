<?php /* Smarty version 2.6.26, created on 2012-08-14 14:02:43
         compiled from msg_board.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'msg_board.tpl', 30, false),array('modifier', 'stripslashes', 'msg_board.tpl', 31, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1><?php echo $this->_tpl_vars['lang']['Message_Board']; ?>
 (<?php echo $this->_tpl_vars['citycurrent']; ?>
)</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
			<div class="clear"></div>
			<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;">
					<label for="login-email-address"><?php echo $this->_tpl_vars['lang']['Message_Board2']; ?>
</label>
				</div>
			</div>
			<div class="clear"></div>			
			<div class="clear"></div>
			<div class="body_shim">
				<div class="clear"></div>
					  <table width="100%"  border="0" align="center">
					  
						<?php if ($this->_tpl_vars['Loop1'] > 0): ?>
						 <tr>
						  <td colspan="2">
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
						  	<tr>
								<td align="left" class="tbheadinng" width="60%" height="20"><strong>Task Name</strong></td>
								<td align="center" class="tbheadinng" width="15%"><strong>Messages</strong></td>
								<td align="center" class="tbheadinng" width="25%"><strong>Action</strong></td>
							</tr>
							  
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
							  <tr class="<?php echo smarty_function_cycle(array('values' => 'list_A, list_B'), $this);?>
">
								<td align="left" class="bodytextblack" width="60%" height="20">&nbsp;&nbsp;<span class="span_title"><a href="task_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['id']; ?>
_<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['clear_title']; ?>
.html" class="footerlinkcommon2"><?php echo ((is_array($_tmp=$this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['project_Title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></span></td>
								<td align="center" class="bodytextblack" width="15%"><strong><?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['message_count']; ?>
</strong></td>
								<td align="center" class="bodytextblack" width="25%"><div class="button-no" style="margin-top:10px"><a href="#" onclick="JavaScript: popupWindowURL('message_board.php?project_id=<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['id']; ?>
&project_creator=<?php echo $this->_tpl_vars['post_project'][$this->_sections['project_name']['index']]['task_owner']; ?>
&id=4&pop_up=true','','650','500','','true','true');" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Click_Message_Board']; ?>
</a></div></td>
							  </tr>
							  <?php endfor; endif; ?>
							</table></td>
						</tr>
					  <?php else: ?>
							<tr>
								<td align="center" class="successMsg"><?php echo $this->_tpl_vars['lang']['Msg']; ?>
</td>
							</tr>
						<?php endif; ?>
					  </table>
				<div class="clear"></div>
			<div><ul class="paginator"><?php echo $this->_tpl_vars['Page_Link']; ?>
</ul></div>
		   </div>
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