<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha">
	<h1>Deposit Needed</h1>
	<div class="page_top"></div>
			<div class="page_content">
				<div class="page_content_white">
				<div class="clear"></div>
					<table width="100%" border="0" align="center" >
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td width="50%" align="center">
							  <font size="2" color="#FF0000"><strong>{$Less_Amount_3}</strong></font>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td width="50%" class="successMsg" height="100">
							<font color="#00000">{$Less_Amount}<strong>{$amount}&nbsp;{$lang_common.Curreny}</strong>{$Less_Amount_1}<strong>{$amount}&nbsp;{$lang_common.Curreny}</strong>{$Less_Amount_2}
							<br><br>
							{$Reuired} : <strong>{$re_amount}&nbsp;{$lang_common.Curreny}.</strong>&nbsp;{$Note5}
							<br>
							<br>
							<strong><!--{$Note6}--><a href="make-deposit.html" class="successMsg"><font color="#00000"><strong>{$Note7}</strong></font></a>{$Note8}</strong></font>		</td>
						</tr>
						<tr>
							<td>&nbsp;Staged ID: {$staged_id} {$amt_short}</td>
						</tr>
					</table>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
    <div class="grid_4 omega">
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>
    </div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->