{if $citycurrent == 'Select' || $citycurrent == ''}
{literal}
<script  type="text/javascript">
popup('popUpDivCity'); 
</script>
{/literal}
{/if}
<div id="task-location">
<div class="location">Viewing {$Site_Title_Absolute}</div>					
<div id="task_city_change" class="change">
	<img alt="" src="{$Site_URL}/images/select_arrow_white.png">
	<span>{$Current_City}</span>
</div>
<div id="task_city_list" class="city-list">
 <div class="state_header">Task Sonic In Florida</div>
	<ul>{$Task_City_List}</ul>
	<div class="clear"></div>
	<div>Select A City To View Activity </div>
</div>
</div>
