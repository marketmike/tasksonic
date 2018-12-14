<html>
<head>
	<title>{$Site_Title}</title>
	<meta name="title" 			content="{$Meta_Title}">
	<meta name="description" 	content="{$Meta_Description}">
	<meta name="keywords" 		content="{$Meta_Keyword}">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link rel="stylesheet" media="screen,projection" type="text/css" href="{$Templates_CSS}reset.css" />
    <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="{$Templates_CSS}main-msie.css" /><![endif]-->	
	<link href="{$Templates_CSS}popup.css" rel="stylesheet" type="text/css">
	<script language="javascript" src="{$Templates_JS}validate.js"></script>
	<script language="javascript" src="{$Templates_JS}functions.js"></script>
	<script language="javascript" src="{$Templates_JS}menu.js"></script>
    {section name=FileName loop=$JavaScript}
    <script language="javascript" src="{$Templates_JS}{$JavaScript[FileName]}"></script>
	{/section}
</head>
<body>
<div id="main">
{if $no_head_footer == 1}
{else}
<div style="margin:0 auto;margin-bottom:20px;text-align:center"><a href="home.html"><img src="{$Templates_Image}logo_dark.png" border="0"/></a></div>
{/if}
<div class="clear"></div>
{include file="$T_Body"}
<div class="clear"></div>
</div>
</body>
</html>