<html>
<head>
	<title>{$Site_Title}</title>
	<meta name="title" 			content="{$Site_Title}">
	<meta name="description" 	content="{$Site_Description}">
	<meta name="keywords" 		content="{$Site_Keyword}">
	<link href="{$Templates_CSS}style.css" rel="stylesheet" type="text/css">
	<script language="javascript" src="{$Templates_JS}validate.js"></script>
	<script language="javascript" src="{$Templates_JS}functions.js"></script>
    {section name=FileName loop=$JavaScript}
    <script language="javascript" src="{$Templates_JS}{$JavaScript[FileName]}"></script>
	{/section}
</head>
<body >
<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" height="100%">
    <tr>
		<td bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" align="center" bgcolor="#FFFFFF">
		<BR />
			{include file="$T_Body"}
		</td>
	</tr>
</table>
</body>
</html>