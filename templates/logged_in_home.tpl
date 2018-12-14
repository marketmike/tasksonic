{php}
session_start();
$_SESSION["total_activity"] = 0;
{/php}
{literal}
<script>
	function fetch(){
		$.ajax({
			url: 'livefeed.php',
			cache: false,
			success: function(data) {
				$("#list").prepend(data);
				if($("#list #feed_wrapper").length > 10){
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
<div class="grid_12 push_12 alpha omega content_body">
	 
   <div class="grid_8 alpha">   
	<div class="clear"></div>			
        <div class="welcome_hdr">
			<div class="welcome_wrapper">
			<div class="clear"></div>
				<div class="col-left"><h1>Welcome {$smarty.session.User_Name}</h1>
				{$site_intro}</div>
				<div class="col-right">{include file="$T_Balance_Right"}</div>					
			</div>
		</div>
<div class="clearwspace"></div>		
<div class="clearwspace"></div>
					<div class="dashboard_top"></div>
					<div class="dashboard" id="dashboard">
					<ul>
					<li><a href="latest-open-tasks.html">Latest Tasks</a><span></span></li>			
					<li><a href="latest-online-tasks.html">Online Tasks</a><span></span></li>
					<li><a href="task-categories.html">By Category</a><span></span></li>
					<li><a href="completed-tasks.html">Completed</a><span></span></li>			
					</ul>
					</div>
<div class="clear"></div>	
<div class="clear"></div>			
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Latest Activity For {$citycurrent}						
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
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Mytasks"}		
		{include file="$T_Map"}					
		<div class="clear"></div>			
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->
				