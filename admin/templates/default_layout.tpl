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
<!-- Header Postion of Template Begins Here -->
<div id="hdw">
<div id="hdw_top">
<div id="hdw_wrapper">
                <div class="top_menu_right" >					
                    <div class="top_sub_menu">
					<div class="sub_left"></div>
                        <div class="sub_center">
						<div class="link" style="float:left;line-height:30px;margin-right:20px;">Welcome, <strong>{$smarty.session.Admin_Name}</strong></div>
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
	{include file="$T_Header"}
	<div style="clear:both"></div>
	{if $smarty.session.Admin_Id}
		{include file="$T_Menu"}
	{/if}
	<div class="clear"></div>	
	<div class="page_top_941"></div>
	<div class="page_content">
		<div class="page_content_white">
			{include file="$T_Body"}
			<div class="clear"></div>
		</div>
	</div>
	<div class="page_bottom_941"></div>
	<div class="clear"></div>	
		<!-- FOOTER BG STARTS HERE -->
		{include file="$T_Footer"}
		<!-- FOOTER BG ENDS HERE -->
  <div class="clear"></div>  
</div><!-- end .container_16 -->
<!-- 940 Grid 12 column ends here-->
</body>
</html>
