<?php /* Smarty version 2.6.26, created on 2013-08-09 18:50:03
         compiled from category.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mod', 'category.tpl', 31, false),array('modifier', 'stripslashes', 'category.tpl', 66, false),array('modifier', 'truncate', 'category.tpl', 66, false),array('modifier', 'urlencode', 'category.tpl', 70, false),array('modifier', 'replace', 'category.tpl', 151, false),array('function', 'cycle', 'category.tpl', 55, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>Category "<?php echo $this->_tpl_vars['MAIN_CAT']; ?>
" In <?php echo $this->_tpl_vars['citycurrent']; ?>
</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
					<label for="intro">
							<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
premium_small.png" align="bottom" style="height:20px"/> Premium Task
							&nbsp;&nbsp;&nbsp;	
							<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
urgent.png" align="absmiddle" style="height:20px"/> Urgent Task
							&nbsp;&nbsp;&nbsp;						
					</label>
					</div>
				</div>
				<div class="clear"></div>			
					<?php if ($this->_tpl_vars['Loop'] > 0): ?>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
					<tr>
						<td width="99%" class="">&nbsp;<strong><?php echo $this->_tpl_vars['lang']['Category_List']; ?>
 : </strong></td>
					</tr>
					<tr>
						<td class="">&nbsp;</td>
					</tr>
					<tr>
						<td colspan="3">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<?php $this->assign('col', 3); ?>
								<?php unset($this->_sections['cats']);
$this->_sections['cats']['name'] = 'cats';
$this->_sections['cats']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cats']['show'] = true;
$this->_sections['cats']['max'] = $this->_sections['cats']['loop'];
$this->_sections['cats']['step'] = 1;
$this->_sections['cats']['start'] = $this->_sections['cats']['step'] > 0 ? 0 : $this->_sections['cats']['loop']-1;
if ($this->_sections['cats']['show']) {
    $this->_sections['cats']['total'] = $this->_sections['cats']['loop'];
    if ($this->_sections['cats']['total'] == 0)
        $this->_sections['cats']['show'] = false;
} else
    $this->_sections['cats']['total'] = 0;
if ($this->_sections['cats']['show']):

            for ($this->_sections['cats']['index'] = $this->_sections['cats']['start'], $this->_sections['cats']['iteration'] = 1;
                 $this->_sections['cats']['iteration'] <= $this->_sections['cats']['total'];
                 $this->_sections['cats']['index'] += $this->_sections['cats']['step'], $this->_sections['cats']['iteration']++):
$this->_sections['cats']['rownum'] = $this->_sections['cats']['iteration'];
$this->_sections['cats']['index_prev'] = $this->_sections['cats']['index'] - $this->_sections['cats']['step'];
$this->_sections['cats']['index_next'] = $this->_sections['cats']['index'] + $this->_sections['cats']['step'];
$this->_sections['cats']['first']      = ($this->_sections['cats']['iteration'] == 1);
$this->_sections['cats']['last']       = ($this->_sections['cats']['iteration'] == $this->_sections['cats']['total']);
?>
								<?php if (((is_array($_tmp=$this->_sections['cats']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 1): ?>
									<tr class="style3 tdheight">
								<?php endif; ?>
										<td valign="top" width="25%" class="bodytextblack borders">
											&nbsp;<a href="category_<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['cats']['index']]['id']; ?>
.html" class="article"><strong><?php echo $this->_tpl_vars['arr_cat'][$this->_sections['cats']['index']]['name']; ?>
</strong></a>&nbsp;(<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['cats']['index']]['total_projects']; ?>
)
										</td>
								<?php if (((is_array($_tmp=$this->_sections['cats']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 0): ?>
									</tr>
								<?php endif; ?>
								<?php endfor; endif; ?>
							</table>
						</td>	
					</tr>	
					<tr>
						<td>&nbsp;</td>
					</tr>
					</table>
					<?php endif; ?>
				
				<?php if ($this->_tpl_vars['rscntpro'] > 0): ?>	
				<?php unset($this->_sections['ProList']);
$this->_sections['ProList']['name'] = 'ProList';
$this->_sections['ProList']['loop'] = is_array($_loop=$this->_tpl_vars['rscntpro']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ProList']['show'] = true;
$this->_sections['ProList']['max'] = $this->_sections['ProList']['loop'];
$this->_sections['ProList']['step'] = 1;
$this->_sections['ProList']['start'] = $this->_sections['ProList']['step'] > 0 ? 0 : $this->_sections['ProList']['loop']-1;
if ($this->_sections['ProList']['show']) {
    $this->_sections['ProList']['total'] = $this->_sections['ProList']['loop'];
    if ($this->_sections['ProList']['total'] == 0)
        $this->_sections['ProList']['show'] = false;
} else
    $this->_sections['ProList']['total'] = 0;
if ($this->_sections['ProList']['show']):

            for ($this->_sections['ProList']['index'] = $this->_sections['ProList']['start'], $this->_sections['ProList']['iteration'] = 1;
                 $this->_sections['ProList']['iteration'] <= $this->_sections['ProList']['total'];
                 $this->_sections['ProList']['index'] += $this->_sections['ProList']['step'], $this->_sections['ProList']['iteration']++):
$this->_sections['ProList']['rownum'] = $this->_sections['ProList']['iteration'];
$this->_sections['ProList']['index_prev'] = $this->_sections['ProList']['index'] - $this->_sections['ProList']['step'];
$this->_sections['ProList']['index_next'] = $this->_sections['ProList']['index'] + $this->_sections['ProList']['step'];
$this->_sections['ProList']['first']      = ($this->_sections['ProList']['iteration'] == 1);
$this->_sections['ProList']['last']       = ($this->_sections['ProList']['iteration'] == $this->_sections['ProList']['total']);
?>
				<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['premium_project'] == 1): ?>
				<div id="all_tasks"  class="premium_task" >
				<?php else: ?>
				<div id="all_tasks" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
				<?php endif; ?>
					<div class="img_holder">
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['buyer_logo']): ?>
						<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['buyer_logo']; ?>
" height="70" width="70" class="profile_img"/>
						<?php else: ?>
						<img src="<?php echo $this->_tpl_vars['path']; ?>
thumb_default.jpg" height="70" width="70" class="profile_img"/>
						<?php endif; ?>
						<div class="clear"></div>
						<div class="share_btns" style="margin-top:5px;">
						<?php echo '
						<a href="" onclick="fb_share(\'\',{\'name\':\'Check out this new task ('; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
<?php echo ') on '; ?>
<?php echo $this->_tpl_vars['Site_Title']; ?>
<?php echo '!\',\'href\':\''; ?>
<?php echo $this->_tpl_vars['Site_URL']; ?>
<?php echo '/task_'; ?>
<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
<?php echo '.html\',\'description\':\''; ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['dec'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)); ?>
<?php echo '\'},null);return false;">			
						'; ?>

						<img src="images/facebook.png" width="24" />
						</a>
						<a href="http://twitter.com/share?url=<?php echo ((is_array($_tmp=$this->_tpl_vars['Site_URL'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
/task_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
.html&text=Check out the task ''<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
'' on <?php echo $this->_tpl_vars['Site_URL']; ?>
&related=tasksonic" target="_blank">
						<img src="images/twitter.png" width="24" />
						</a>
						<a href="<?php echo $this->_tpl_vars['Site_URL']; ?>
/invite.php">
						<img src="images/emailicon.png" width="24" />
						</a>
						<div class="clear"></div>
						</div>
					<div class="clear"></div>			
					<div class="premium_urgent">
					<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['urgent_project'] == 1): ?><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
urgent.png" border="0" style="vertical-align:middle" /><?php endif; ?>
					<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['premium_project'] == 1): ?>
					&nbsp;<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
premium_small.png" border="0" style="vertical-align:middle" />
					<?php elseif ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['membership_id'] != 0): ?>
					&nbsp;<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
vip_small.png" border="0" style="vertical-align:middle" />
					<?php endif; ?>
					<div class="clear"></div>
					</div>		
					</div>
					<div class="body_text">
					<span class="title"><a href="task_<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['id']; ?>
_<?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['clear_title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
.html" ><?php echo ((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</a></span>
					<div class="clear"></div>
					<span class="description">
					<div class="desc_holder"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['dec'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200, '..', true, false) : smarty_modifier_truncate($_tmp, 200, '..', true, false)); ?>
</div>
					<div style="background:#fff;padding-left:5px;">
					<strong>Bidding Ends On:</strong> <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['project_days_open']; ?>
 at <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['bidding_time']; ?>
<br />
					<strong>Task To Be Complete by:</strong> <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['completed_by']; ?>
 at <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['completed_time']; ?>

					</div>		
					</span>
					<div class="clear"></div>
					</div>
					<div class="more_button">
					Bids
					<div class="clear"></div>		
					<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['bid']; ?>

						<div class="status">
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 1): ?>Bidding Open<?php endif; ?>
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 2): ?>Task Awarded<?php endif; ?>
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 3): ?>Task Underway<?php endif; ?>
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 4): ?>Task Cancelled<?php endif; ?>
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 5): ?>Bidding Ended<?php endif; ?>
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 6): ?>Task Complete<?php endif; ?>
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['status'] == 7): ?>Task Expired<?php endif; ?>			
						</div>		
					</div>
					<div class="clear"></div>
					<div class="btm_menu">
						<strong>Posted by:</strong>  <span class="user"><?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['project_posted_by']; ?>
</span>
						<strong>Average Bid:</strong>  
						<?php if ($this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['bid'] == 0): ?>
						<?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;0.00 |
						<?php else: ?>
						<?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['Ave_Bid1']; ?>
 |
						<?php endif; ?>
						<strong>Category:</strong> <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['category']; ?>
 |
						<strong>Created:</strong> <?php echo $this->_tpl_vars['view_project'][$this->_sections['ProList']['index']]['project_date']; ?>

					</div>
					<div class="clear"></div>
				</div>
			<div class="clear"></div>	
			<?php endfor; endif; ?>
			<div><ul class="paginator"><?php echo $this->_tpl_vars['Page_Link']; ?>
</ul></div>
			<?php else: ?>
			<div class="body_shim" style="text-align:center">
			<?php echo $this->_tpl_vars['lang']['No_project_Text']; ?>
<br />
			<a href="category_list.php" class="footerlink" style="font-size:14px; margin-right:5px;">Back</a>
			<div class="clear"></div>			
			</div>
			<div class="clear"></div>			
			<?php endif; ?>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
			<div class="right-column-wrap">
			<h1>Task Categories</h1>
			<div style="margin:0 auto;width:240px">
			<?php $this->assign('col', 3); ?>
			<?php unset($this->_sections['CatList']);
$this->_sections['CatList']['name'] = 'CatList';
$this->_sections['CatList']['loop'] = is_array($_loop=$this->_tpl_vars['CatLoop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<div class="cat-col"><a href="category_<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['id']; ?>
.html" class="footerlinkcommon2" ><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['desc'])) ? $this->_run_mod_handler('replace', true, $_tmp, '<P>', '') : smarty_modifier_replace($_tmp, '<P>', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, '</P>', '') : smarty_modifier_replace($_tmp, '</P>', '')); ?>
</a><br />(<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['total_projects']; ?>
)</div>
			<?php if (((is_array($_tmp=$this->_sections['CatList']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 3): ?>
			<div class="clear"></div>
			<?php endif; ?>			
			<?php endfor; endif; ?>
			</div>			
			<div class="clear"></div>			
			</div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->