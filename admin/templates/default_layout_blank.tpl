<html>
<head>
	<title>{$Site_Title}</title>
	<meta name="title" 			content="{$Meta_Title}">
	<meta name="description" 	content="{$Meta_Description}">
	<meta name="keywords" 		content="{$Meta_Keyword}">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF8">
	<link href="{$Templates_CSS}960-grid.css" rel="stylesheet" type="text/css">
	<link href="{$Templates_CSS}style.css" rel="stylesheet" type="text/css">	
	<script language="javascript" src="{$Templates_JS}validate.js"></script>
	<script language="javascript" src="{$Templates_JS}functions.js"></script>
	<script language="javascript" src="{$Templates_JS}dropdowntab.js"></script>
    {section name=FileName loop=$JavaScript}
    <script language="javascript" src="{$Templates_JS}{$JavaScript[FileName]}"></script>
	{/section}
</head>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
{include file="$T_Body"}
</body>
</html>
