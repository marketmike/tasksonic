<?php /* Smarty version 2.6.26, created on 2012-08-11 22:00:30
         compiled from city_list.tpl */ ?>
<?php if ($this->_tpl_vars['citycurrent'] == 'Select' || $this->_tpl_vars['citycurrent'] == ''): ?>
<?php echo '
<script  type="text/javascript">
popup(\'popUpDivCity\'); 
</script>
'; ?>

<?php endif; ?>
<div id="task-location">
<div class="location">Viewing <?php echo $this->_tpl_vars['Site_Title_Absolute']; ?>
</div>					
<div id="task_city_change" class="change">
	<img alt="" src="<?php echo $this->_tpl_vars['Site_URL']; ?>
/images/select_arrow_white.png">
	<span><?php echo $this->_tpl_vars['Current_City']; ?>
</span>
</div>
<div id="task_city_list" class="city-list">
 <div class="state_header">Task Sonic In Florida</div>
	<ul><?php echo $this->_tpl_vars['Task_City_List']; ?>
</ul>
	<div class="clear"></div>
	<div>Select A City To View Activity </div>
</div>
</div>