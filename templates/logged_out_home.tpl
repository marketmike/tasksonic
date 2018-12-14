{literal}
<!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='48076016-0',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<!-- End of Google Analytics Content Experiment code -->
{/literal}
{php}
session_start();
$_SESSION["total_activity"] = 0;
{/php}
{literal}
<script>
	function fetch(){
		$.ajax({
			url: 'livefeed-logged-out.php',
			cache: false,
			success: function(data) {
				$("#list").prepend(data);
				if($("#list #feed_wrapper").length > 5){
					$('#list #feed_wrapper:gt(9)').remove();
				}
				$("#list #feed_wrapper").fadeIn();
				setTimeout("fetch()", 30000);
			}
		});
	}
	$(function(){
		fetch();
	});
</script>
{/literal}
<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">  
<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">
{$site_intro}
<div id="hd">
	<div id="post_free"><img src="{$Site_URL}/templates/images/post_free.png" /></div> 	
</div> <!-- end hd -->
<div class="clear"></div>
<div id="marketing_points">
	<div id="marketing_column" onclick="location.href='how_works.html';" style="cursor:pointer;">
		<img src="{$Site_URL}/templates/images/how.png" />
		<div class="clear"></div>
		<img src="{$Site_URL}/templates/images/how_hdr.png" style="margin-top:5px;margin-bottom:5px;" />
		<div class="clear"></div>
		{$marketing_col_one}		
	</div>
	<div id="marketing_column" onclick="location.href='get_verified.html';" style="cursor:pointer;">
		<img src="{$Site_URL}/templates/images/know.png" />
		<div class="clear"></div>
		<img src="{$Site_URL}/templates/images/know_hdr.png" style="margin-top:5px;margin-bottom:5px;" />
		<div class="clear"></div>
		{$marketing_col_two}	
	</div>
	<div id="marketing_column" onclick="location.href='tour.html';" style="cursor:pointer;">
		<img src="{$Site_URL}/templates/images/post_icon.png" />
		<div class="clear"></div>
		<img src="{$Site_URL}/templates/images/post_hdr.png" style="margin-top:5px;margin-bottom:5px;" />
		<div class="clear"></div>
		{$marketing_col_three}		
	</div>
	<div id="signup_column">
		<a href="{$Site_URL}/signup.php"><img src="{$Site_URL}/images/join.png" style="margin-top:50px;" /></a>
		<div class="clear"></div>
		<img src="{$Site_URL}/images/or.png" style="margin-top:10px;margin-bottom:10px;" />
		<div class="clear"></div>
		{if !$smarty.session.User_Name}		  
		<a href="#" onClick="fbconnect_login(); return false;"><img src="{$Site_URL}/images/fb_connect.png"/></a>
		{/if}	
		{if $smarty.session.User_Name}
		<div style="float:left;vertical-align:middle;color:#fff;margin-right:15px;">
		{php}if ($fb_connect = Get_FB_ID($_SESSION['User_Name'])):{/php}<img id="image" src="https://graph.facebook.com/{php}echo $fb_connect;{/php}/picture" width="30" style="vertical-align:middle;" /> {php} endif; echo $_SESSION['User_Name'];{/php}					
		</div>
		{/if}
	</div>
</div>
</div>
</div><!-- end .grid_12.alpha omega -->
<div class="clear"></div>
</div><!-- end .grid_12.push_12 -->

<div class="clearwspace">&nbsp;</div>

<div class="grid_12 push_12 alpha omega content_body"> 
   <div class="grid_8 alpha">   
	<div class="clear"></div>			
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Latest Activity On Tasksonic						
						</label>
					</div>
					</div>
					<div class="clear"></div>				
					<div id="list">
						<div>Loading...</div>
					</div>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
	<div class="right-column-wrap">
		<div>
		{$marketing_content}
		</div>
		<div class="clear"></div>
	</div>
	{include file="$T_MapLoggedOut"}	
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->


</div><!-- end .grid_12.alpha omega -->
<div class="clear"></div>
</div><!-- end .grid_12.push_12 -->		