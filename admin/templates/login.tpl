<html>
<head>
	<title>{$Site_Title}</title>
	<meta name="title" 			content="{$Meta_Title}">
	<meta name="description" 	content="{$Meta_Description}">
	<meta name="keywords" 		content="{$Meta_Keyword}">
	<link href="{$Templates_CSS}style.css" rel="stylesheet" type="text/css">
	<script language="javascript" src="{$Templates_JS}validate.js"></script>
	<script language="javascript" src="{$Templates_JS}functions.js"></script>
    {section name=FileName loop=$JavaScript}
    <script language="javascript" src="{$Templates_JS}{$JavaScript[FileName]}"></script>
	{/section}
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
	<div id="login-container">
	<center><img src="{$Templates_Image}logo_dark.png"></center><br />
	<div class="top-blue">Task Sonic Admin Panel</div>
	<div style="clear:both"></div>
	<div class="login-wrap">
	<div class="hdr_img"><img src="{$Templates_Image}avatar-30-30.png" width="38" height="38">&nbsp;&nbsp;<img src="{$Templates_Image}administrator_hed.gif" width="184" height="14"></div>
	<div style="clear:both"></div>
		<form name="frmLogin" action="{$A_Login}"  method="post" onSubmit="JavaScript: return Form_Submit(this);">
		<table width="267" border="0" align="center" cellpadding="6" cellspacing="0">
          <tr>
            <td width="30%" align="right" class="bodytextgray"><strong>USERNAME:</strong></td>
            <td width="70%"><input type="text" class="text"  name="username"  value="{$smarty.post.username}" size="18" maxlength="25" tabindex="1"></td>
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
