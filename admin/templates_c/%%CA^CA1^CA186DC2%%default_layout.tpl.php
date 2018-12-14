<?php /* Smarty version 2.6.26, created on 2012-08-11 10:18:00
         compiled from default_layout.tpl */ ?>
<html>
<head>
	<title><?php echo $this->_tpl_vars['Site_Title']; ?>
</title>
	<meta name="title" 			content="<?php echo $this->_tpl_vars['Meta_Title']; ?>
">
	<meta name="description" 	content="<?php echo $this->_tpl_vars['Meta_Description']; ?>
">
	<meta name="keywords" 		content="<?php echo $this->_tpl_vars['Meta_Keyword']; ?>
">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF8">
	<link href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
960-grid.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
style.css" rel="stylesheet" type="text/css">	
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
validate.js"></script>
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
functions.js"></script>
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
dropdowntab.js"></script>
    <?php unset($this->_sections['FileName']);
$this->_sections['FileName']['name'] = 'FileName';
$this->_sections['FileName']['loop'] = is_array($_loop=$this->_tpl_vars['JavaScript']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['FileName']['show'] = true;
$this->_sections['FileName']['max'] = $this->_sections['FileName']['loop'];
$this->_sections['FileName']['step'] = 1;
$this->_sections['FileName']['start'] = $this->_sections['FileName']['step'] > 0 ? 0 : $this->_sections['FileName']['loop']-1;
if ($this->_sections['FileName']['show']) {
    $this->_sections['FileName']['total'] = $this->_sections['FileName']['loop'];
    if ($this->_sections['FileName']['total'] == 0)
        $this->_sections['FileName']['show'] = false;
} else
    $this->_sections['FileName']['total'] = 0;
if ($this->_sections['FileName']['show']):

            for ($this->_sections['FileName']['index'] = $this->_sections['FileName']['start'], $this->_sections['FileName']['iteration'] = 1;
                 $this->_sections['FileName']['iteration'] <= $this->_sections['FileName']['total'];
                 $this->_sections['FileName']['index'] += $this->_sections['FileName']['step'], $this->_sections['FileName']['iteration']++):
$this->_sections['FileName']['rownum'] = $this->_sections['FileName']['iteration'];
$this->_sections['FileName']['index_prev'] = $this->_sections['FileName']['index'] - $this->_sections['FileName']['step'];
$this->_sections['FileName']['index_next'] = $this->_sections['FileName']['index'] + $this->_sections['FileName']['step'];
$this->_sections['FileName']['first']      = ($this->_sections['FileName']['iteration'] == 1);
$this->_sections['FileName']['last']       = ($this->_sections['FileName']['iteration'] == $this->_sections['FileName']['total']);
?>
    <script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
<?php echo $this->_tpl_vars['JavaScript'][$this->_sections['FileName']['index']]; ?>
"></script>
	<?php endfor; endif; ?>
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
<!-- Header Postion of Template Begins Here -->
<div id="hdw">
<div id="hdw_top">
<div id="hdw_wrapper">
                <div class="top_menu_right" >					
                    <div class="top_sub_menu">
					<div class="sub_left"></div>
                        <div class="sub_center">
						<div class="link" style="float:left;line-height:30px;margin-right:20px;">Welcome, <strong><?php echo $_SESSION['Admin_Name']; ?>
</strong></div>
						<a href="logout.php" class="link" style="float:left;">Sign Out</a>
                        </div>
                        <div class="sub_right"></div>
                    </div>
                </div>				
</div><!-- hdw_wrapper-->
</div><!-- hdw_top-->
</div><!-- hdw-->				
<!-- Header Postion of Template Ends Here -->
<!-- 940 Grid 12 column Starts Here-->		
<div class="container_12">
  <div class="grid_12">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Header']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div style="clear:both"></div>
	<?php if ($_SESSION['Admin_Id']): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Menu']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<div class="clear"></div>	
	<div class="page_top_941"></div>
	<div class="page_content">
		<div class="page_content_white">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Body']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="clear"></div>
		</div>
	</div>
	<div class="page_bottom_941"></div>
	<div class="clear"></div>	
		<!-- FOOTER BG STARTS HERE -->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['T_Footer']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<!-- FOOTER BG ENDS HERE -->
  <div class="clear"></div>  
</div><!-- end .container_16 -->
<!-- 940 Grid 12 column ends here-->
</body>
</html>