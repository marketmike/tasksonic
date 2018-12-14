<?php /* Smarty version 2.6.26, created on 2012-08-14 22:21:43
         compiled from all_tasker_profiles.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'all_tasker_profiles.tpl', 28, false),array('modifier', 'intval', 'all_tasker_profiles.tpl', 47, false),array('modifier', 'truncate', 'all_tasker_profiles.tpl', 64, false),array('modifier', 'replace', 'all_tasker_profiles.tpl', 97, false),array('modifier', 'mod', 'all_tasker_profiles.tpl', 98, false),)), $this); ?>
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
		<h1><?php echo $this->_tpl_vars['lang']['Find_Sellers']; ?>
 In <?php echo $this->_tpl_vars['citycurrent']; ?>
</h1>
				<div class="page_top"></div>
				<div class="page_content">
				<div class="page_content_white">		
				<div class="title-links" style="width:100%;">
				<div class="form_page_text" style="text-align:center;font-size:26px">
				<label for="login-email-address"><?php echo $this->_tpl_vars['cat_name']; ?>
</label>
				</div>
				</div>
				<div class="clear"></div>		
				</div>
				</div>
				<div class="page_bottom"></div>	
				<div class="clearwspace"></div>	
		<div class="page_top"></div>
				<div class="page_content">
					<div class="page_content_white">		
						<?php if ($this->_tpl_vars['Loop'] > 0): ?>	
						<?php unset($this->_sections['TaskerList']);
$this->_sections['TaskerList']['name'] = 'TaskerList';
$this->_sections['TaskerList']['loop'] = is_array($_loop=$this->_tpl_vars['Loop']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['TaskerList']['show'] = true;
$this->_sections['TaskerList']['max'] = $this->_sections['TaskerList']['loop'];
$this->_sections['TaskerList']['step'] = 1;
$this->_sections['TaskerList']['start'] = $this->_sections['TaskerList']['step'] > 0 ? 0 : $this->_sections['TaskerList']['loop']-1;
if ($this->_sections['TaskerList']['show']) {
    $this->_sections['TaskerList']['total'] = $this->_sections['TaskerList']['loop'];
    if ($this->_sections['TaskerList']['total'] == 0)
        $this->_sections['TaskerList']['show'] = false;
} else
    $this->_sections['TaskerList']['total'] = 0;
if ($this->_sections['TaskerList']['show']):

            for ($this->_sections['TaskerList']['index'] = $this->_sections['TaskerList']['start'], $this->_sections['TaskerList']['iteration'] = 1;
                 $this->_sections['TaskerList']['iteration'] <= $this->_sections['TaskerList']['total'];
                 $this->_sections['TaskerList']['index'] += $this->_sections['TaskerList']['step'], $this->_sections['TaskerList']['iteration']++):
$this->_sections['TaskerList']['rownum'] = $this->_sections['TaskerList']['iteration'];
$this->_sections['TaskerList']['index_prev'] = $this->_sections['TaskerList']['index'] - $this->_sections['TaskerList']['step'];
$this->_sections['TaskerList']['index_next'] = $this->_sections['TaskerList']['index'] + $this->_sections['TaskerList']['step'];
$this->_sections['TaskerList']['first']      = ($this->_sections['TaskerList']['iteration'] == 1);
$this->_sections['TaskerList']['last']       = ($this->_sections['TaskerList']['iteration'] == $this->_sections['TaskerList']['total']);
?>
					<div class="title-links" style="width:100%;">
						<div class="form_page_text" style="text-align:center;">
							<label for="login-email-address"><?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['login_id']; ?>
</label>
						</div>
					</div>
					<div class="clear"></div>						
						<div id="all_Taskers" class="<?php echo smarty_function_cycle(array('values' => 'list_B style3, list_A style3'), $this);?>
" >
						<div class="cat_message"><?php echo $this->_tpl_vars['lang']['Text']; ?>
 <?php echo $this->_tpl_vars['cat_name']; ?>
</div>
						<div class="clear"></div>
							<div class="img_holder">
								<?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['fb_img']): ?>
								<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['fb_img']; ?>

								<?php elseif ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['logo']): ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
thumb_<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['logo']; ?>
" border="0" height="100" width="100">
								<?php else: ?>
								<img src="<?php echo $this->_tpl_vars['img_path']; ?>
default.jpg" border="0" height="100" width="100">
								<?php endif; ?>
								<div class="clear"></div>		
							</div>
							<div class="body_text_left">
							<div class="clear"></div>
							<strong><?php echo $this->_tpl_vars['lang']['Earning']; ?>
 </strong><?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['earning'] == 0.00): ?><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;0.00<?php else: ?><?php echo $this->_tpl_vars['lang_common']['Curreny']; ?>
&nbsp;<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['earning']; ?>
<?php endif; ?>
							<div class="clear"></div>
							<strong><?php echo $this->_tpl_vars['lang']['Location']; ?>
 </strong><?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['location_1'] != ''): ?><?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['location']; ?>
<?php else: ?><?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['location_2']; ?>
<?php endif; ?>
							<div class="clear"></div>
							<strong><?php echo $this->_tpl_vars['lang']['Rating']; ?>
 </strong><?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['rating'] == 0.00): ?><?php echo $this->_tpl_vars['lang']['No_feedback']; ?>
<?php else: ?><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['rating'])) ? $this->_run_mod_handler('intval', true, $_tmp) : smarty_modifier_intval($_tmp)); ?>
.gif" width="120">&nbsp;<a href="<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['login_id']; ?>
_tasker_feedback.html" class="footerlinkcommon2">(<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['reviews']; ?>
 reviews)</a><?php endif; ?>
							<div class="clear"></div>								
							</div>
							<div class="body_text_right">
								<?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['fb_verfy'] == 1 || $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['email_verfy'] == 1 || $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['address_verfy'] == 1 || $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['human_verfy'] == 1 || $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['background_verfy'] == 1): ?>
								<div style="line-height:25px;font-weight:bold;">
								<span style="float:left;margin-right:5px;height:25px">Trusted and Verified:</span>
								<?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['fb_verfy'] == 1): ?><img src="images/facebook-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Facebook Verified" title="Facebook Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['email_verfy'] == 1): ?><img src="images/email-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Email Verified" title="Email Verified" /><?php endif; ?>							
								<?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['address_verfy'] == 1): ?><img src="images/address-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Address Verified" title="Address Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['human_verfy'] == 1): ?><img src="images/phone-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Human Verified" title="Human Verified" /><?php endif; ?>
								<?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['background_verfy'] == 1): ?><img src="images/background-verified.png" style="float:left;margin-right:5px;width:25px;height:25px" alt="Background Checked" title="Background Checked" /><?php endif; ?>	
								<div class="clear"></div>
								</div>
								<?php endif; ?>
							</div>
							<div class="body_text">
							<strong>About This Tasker: </strong><?php if ($this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['description']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)); ?>
<?php else: ?>Tasker has not provided this information yet<?php endif; ?>
							<div class="clear"></div>		
							</div>
							<div class="clear"></div>
							<div class="btm_menu">
								<strong><a href="tasker_profile_<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['login_id']; ?>
.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Profile']; ?>
</a> | <a href="seller_portfolio_<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['login_id']; ?>
.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Portfolio']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['login_id']; ?>
_tasker_feedback.html" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['Feedback']; ?>
</a> | <a href="post_task_<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['login_id']; ?>
.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');"><?php echo $this->_tpl_vars['lang']['Post_project_to']; ?>
<?php echo $this->_tpl_vars['arr_seller'][$this->_sections['TaskerList']['index']]['login_id']; ?>
</a></strong>
							</div>
							<div class="clear"></div>						
						</div>
						<?php endfor; endif; ?>
						<div><ul class="paginator"><?php echo $this->_tpl_vars['Page_Link']; ?>
</ul></div>
						<?php else: ?>
						<div id="all_Taskers" style="height:300px;">
						<div class="clear"></div>
						<div class="none_found"><?php echo $this->_tpl_vars['lang']['No_Seller_Text']; ?>
 <?php echo $this->_tpl_vars['cat_name'][$this->_sections['MemberList']['index']]; ?>
</div>
						<div class="clear"></div>	
						<div class="none_found2"><?php echo $this->_tpl_vars['lang']['Please_Choose']; ?>
</div>
						<div class="clear"></div>
						</div>						
						<?php endif; ?>
						<div id="more_link"></div>
		<div class="clear"></div>		
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>
	  <div class="right-column-wrap">
	  <h1>Tasker Categories</h1>
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
			<div class="cat-col"><a href="all_tasker_profiles_<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['id']; ?>
.html" class="footerlinkcommon2" ><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['desc'])) ? $this->_run_mod_handler('replace', true, $_tmp, '<P>', '') : smarty_modifier_replace($_tmp, '<P>', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, '</P>', '') : smarty_modifier_replace($_tmp, '</P>', '')); ?>
</a><br />(<?php echo $this->_tpl_vars['arr_cat'][$this->_sections['CatList']['index']]['member_count_menu']; ?>
)</div>
			<?php if (((is_array($_tmp=$this->_sections['CatList']['iteration'])) ? $this->_run_mod_handler('mod', true, $_tmp, $this->_tpl_vars['col']) : smarty_modifier_mod($_tmp, $this->_tpl_vars['col'])) == 3): ?>
			<div class="clear"></div>
			<?php endif; ?>			
			<?php endfor; endif; ?>
			</div>			
			<div class="clear"></div>
      </div><!--right-column-wrap-->
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->