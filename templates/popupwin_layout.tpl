<html>
<head>
	<title>{$Site_Title}</title>
	<meta name="title" 			content="{$Meta_Title}">
	<meta name="description" 	content="{$Meta_Description}">
	<meta name="keywords" 		content="{$Meta_Keyword}">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link href="{$Templates_CSS}style.css" rel="stylesheet" type="text/css">
	<script language="javascript" src="{$Templates_JS}validate.js"></script>
	<script language="javascript" src="{$Templates_JS}functions.js"></script>
	<script language="javascript" src="{$Templates_JS}menu.js"></script>
    {section name=FileName loop=$JavaScript}
    <script language="javascript" src="{$Templates_JS}{$JavaScript[FileName]}"></script>
	{/section}
</head>
<body>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="13">&nbsp;</td>
		
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="25%"><a href="home.html"><img src="{$Templates_Image}logo.png" border="0"/></a></td>
				</tr>
			</table>
		</td>
		<td width="13">&nbsp;</td>
	</tr>
</table>
<table width="100%" border="0"  align="center" cellpadding="0" cellspacing="0">
	
	<tr>
		<td width="11"></td>
		<td height="280" valign="top">{include file="$T_Body"}
		</td>
		
	</tr>
	
</table>
</body>
</html>