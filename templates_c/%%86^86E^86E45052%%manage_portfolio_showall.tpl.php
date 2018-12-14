<?php /* Smarty version 2.6.26, created on 2012-08-14 21:21:56
         compiled from manage_portfolio_showall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'manage_portfolio_showall.tpl', 47, false),)), $this); ?>
<script language="javascript">
	var JS_Del				 = '<?php echo $this->_tpl_vars['JS_Del']; ?>
';
	var JS_Select			 = '<?php echo $this->_tpl_vars['JS_Select']; ?>
';
	var JS_Del_All			 = '<?php echo $this->_tpl_vars['JS_Del_All']; ?>
';
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1><?php echo $this->_tpl_vars['lang']['Manage_Portfolio']; ?>
</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<?php if ($this->_tpl_vars['member_ship'] == ''): ?>
	
						  <?php if ($this->_tpl_vars['Loop'] == $this->_tpl_vars['free_portfolio']): ?>
							<label for="login-email-address">You have used all <?php echo $this->_tpl_vars['free_portfolio']; ?>
 examples.</label>
						  <?php else: ?>
							<label for="login-email-address"><?php echo $this->_tpl_vars['Loop']; ?>
 out of <?php echo $this->_tpl_vars['free_portfolio']; ?>
 used</label>
						  <?php endif; ?>

					<?php else: ?>
		
						  <?php if ($this->_tpl_vars['Loop'] == $this->_tpl_vars['premium_portfolio']): ?>
							<label for="login-email-address">You have used all <?php echo $this->_tpl_vars['premium_portfolio']; ?>
 examples.</label>
						  <?php else: ?>
							<label for="login-email-address"><?php echo $this->_tpl_vars['Loop']; ?>
 out of <?php echo $this->_tpl_vars['premium_portfolio']; ?>
 used</label>
						  <?php endif; ?>									
					<?php endif; ?>
					</div>
					</div>				
					<div class="clear"></div>
					<?php if ($this->_tpl_vars['Loop'] == $this->_tpl_vars['free_portfolio']): ?>				
					<div class="message" style="text-align:center;padding:10px;margin:10px;">Upgrade to premium membership and post up to <?php echo $this->_tpl_vars['premium_portfolio']; ?>
 examples</div>
					<div class="clear"></div>
					<?php endif; ?>					
					<form method="post" action="<?php echo $this->_tpl_vars['Action']; ?>
" name="frmportfolio">
					<?php if ($this->_tpl_vars['succMsg']): ?>
					<div class="clear"></div>					
					<div class="message" style="text-align:center;padding:10px;margin:10px;"><?php echo $this->_tpl_vars['succMsg']; ?>
</div>
					<div class="clear"></div>
					<?php endif; ?>
					<div class="body_shim">					
														
						<div id="all_tasks" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
						<span class="title" style="text-transform:capitalize">
						<?php if ($this->_tpl_vars['Loop'] != $this->_tpl_vars['free_portfolio'] || $this->_tpl_vars['Loop'] == $this->_tpl_vars['premium_portfolio']): ?>
						<a href="add_portfolio.php"><?php echo $this->_tpl_vars['lang']['New_Portfolio']; ?>
</a>
						<?php endif; ?>
						</span>
							<div style="float:right;margin-right:5px">
								<?php if ($this->_tpl_vars['Loop'] > 1): ?>
								<a href="Javascript: Order_Click('<?php echo $this->_tpl_vars['usr_id']; ?>
')" class="footerlink"><?php echo $this->_tpl_vars['lang']['Manage_Order']; ?>
</a>
								<?php endif; ?>			
							</div>
							<div class="clear"></div>
							<div style="width:560px;background:#E0E1E2;height:140px;padding:10px;">
							<?php if ($this->_tpl_vars['Loop'] > 0 && $this->_tpl_vars['Loop'] < 6): ?>
								<?php unset($this->_sections['seller']);
$this->_sections['seller']['name'] = 'seller';
$this->_sections['seller']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['seller']['show'] = true;
$this->_sections['seller']['max'] = $this->_sections['seller']['loop'];
$this->_sections['seller']['step'] = 1;
$this->_sections['seller']['start'] = $this->_sections['seller']['step'] > 0 ? 0 : $this->_sections['seller']['loop']-1;
if ($this->_sections['seller']['show']) {
    $this->_sections['seller']['total'] = $this->_sections['seller']['loop'];
    if ($this->_sections['seller']['total'] == 0)
        $this->_sections['seller']['show'] = false;
} else
    $this->_sections['seller']['total'] = 0;
if ($this->_sections['seller']['show']):

            for ($this->_sections['seller']['index'] = $this->_sections['seller']['start'], $this->_sections['seller']['iteration'] = 1;
                 $this->_sections['seller']['iteration'] <= $this->_sections['seller']['total'];
                 $this->_sections['seller']['index'] += $this->_sections['seller']['step'], $this->_sections['seller']['iteration']++):
$this->_sections['seller']['rownum'] = $this->_sections['seller']['iteration'];
$this->_sections['seller']['index_prev'] = $this->_sections['seller']['index'] - $this->_sections['seller']['step'];
$this->_sections['seller']['index_next'] = $this->_sections['seller']['index'] + $this->_sections['seller']['step'];
$this->_sections['seller']['first']      = ($this->_sections['seller']['iteration'] == 1);
$this->_sections['seller']['last']       = ($this->_sections['seller']['iteration'] == $this->_sections['seller']['total']);
?>							
								<div style="float:left;margin-left:10px;margin-right:10px;" class="portfolio"><img src="<?php echo $this->_tpl_vars['img_path_port']; ?>
<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['sample_file']; ?>
" alt="<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['title']; ?>
" title="<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['title']; ?>
" border="0" height="100" width="100" style="margin:0px" />
								<div class="clear"></div>
								<div style="margin-top:5px;line-height:40px;">
								<input class="shorter" type="checkbox" style="height:30px;width:30px;" name="checkboxgroup[]" value="<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['id']; ?>
" />
								<a href="update_portfolio.php?portfolio_id=<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['id']; ?>
" ><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
edit.gif" title="Edit" border="0"/></a>
								<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" title="Delete" onclick="javascript: return Delete_Click('<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['id']; ?>
');"/>
								</div>
								</div>
								<?php endfor; endif; ?>
							<?php else: ?>
							<div style="margin:0 auto;text-align:center;padding:20px">
							<h3>No Tasker Portfolio Found</h3>
							</div>
							<?php endif; ?>						
							<div class="clear"></div>
					
							</div>
							<?php if ($this->_sections['seller']['total'] > 1): ?>
							<div style="width:578px;margin-top:10px;background:#fff;text-align:right">
									<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
arrow_ltr.png">	
									<a href="JavaScript: CheckUncheck_Click(document.getElementsByName('checkboxgroup[]'), true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Check_All']; ?>
</a> / 
									<a href="JavaScript: CheckUncheck_Click(document.getElementsByName('checkboxgroup[]'), false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Uncheck_All']; ?>
</a>  &nbsp;&nbsp;					
									Delete Selected <img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('<?php echo $this->_tpl_vars['iportfolio'][$this->_sections['seller']['index']]['id']; ?>
');">	
							</div>
							<?php endif; ?>
						</div>
						<div class="clear"></div>								
	
							</div> <!-- end body shim-->
							<input type="hidden" name="Action" >
							<input type="hidden" name="portfolio_id" />
							<input type="hidden" name="port_img"/>
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