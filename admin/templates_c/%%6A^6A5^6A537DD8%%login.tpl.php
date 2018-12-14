<?php /* Smarty version 2.6.26, created on 2012-08-11 09:57:22
         compiled from login.tpl */ ?>
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
	<link href="<?php echo $this->_tpl_vars['Templates_CSS']; ?>
style.css" rel="stylesheet" type="text/css">
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
validate.js"></script>
	<script language="javascript" src="<?php echo $this->_tpl_vars['Templates_JS']; ?>
functions.js"></script>
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
	<div id="login-container">
	<center><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
logo_dark.png"></center><br />
	<div class="top-blue">Task Sonic Admin Panel</div>
	<div style="clear:both"></div>
	<div class="login-wrap">
	<div class="hdr_img"><img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
avatar-30-30.png" width="38" height="38">&nbsp;&nbsp;<img src="<?php echo $this->_tpl_vars['Templates_Image']; ?>
administrator_hed.gif" width="184" height="14"></div>
	<div style="clear:both"></div>
		<form name="frmLogin" action="<?php echo $this->_tpl_vars['A_Login']; ?>
"  method="post" onSubmit="JavaScript: return Form_Submit(this);">
		<table width="267" border="0" align="center" cellpadding="6" cellspacing="0">
          <tr>
            <td width="30%" align="right" class="bodytextgray"><strong>USERNAME:</strong></td>
            <td width="70%"><input type="text" class="text"  name="username"  value="<?php echo $_POST['username']; ?>
" size="18" maxlength="25" tabindex="1"></td>
          </tr>
          <tr>
            <td width="30%" align="right" class="bodytextgray"><strong>PASSWORD:</strong></td>
            <td width="70%"><input  type="password" class="text" name="password"  maxlength="15" size="18" tabindex="2"></td>
          </tr>
          </tr>
        </table>
		<div style="clear:both"></div>
		<div id="button-wrapper"><input  type="submit" name="Submit" value="Login" onClick="javascript: return Form_Submit(document.frmLogin);" tabindex="3"></div>
		<div style="clear:both;height:15px;"></div>
	</div>
</div>	
</body>
</html>