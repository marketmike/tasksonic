<script language="javascript">
	var JS_Member			 = '{$lang.JS_Member}';
	var JS_Member_Check 	 = '{$lang.JS_Member_Check}';
</script>	
<div class="grid_12 push_12 alpha omega content_body"> 
	<div class="grid_8 alpha"> 
	<h1>{if $membership_id != ''}{else}{$lang.Title}{/if}</h1>
	<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Sign Up For Task Sonic Membership						
						</label>
					</div>
					</div>
					<div class="clear"></div>	
					<form name="frmmembership" method="post">
					{if $membership_id != ''}
					<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
						<tr>
							<td colspan="4">
								<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
									<tr>
										<td colspan="2" align="center" class="bodytextblack"><font size="3">
											{$lang.Message1} <strong>{$membership_name}</strong> at <strong>{$start_date}</strong> {$lang.Message2} <strong>{$end_date}</strong>.<br />
											{$lang.Message3}	</font>
										</td>
									</tr>
								</table>	
							</td>
						</tr>
					</table>
					{else}
					<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">
						
						<tr>
							<td height="20"></td>
						</tr> 
						<tr>
							<td colspan="4"class="bodytextblack">
								<center><font size="2"><strong>{$lang.Membership_Msg}</strong></font></center>
								<div class="clear"></div>
								<div style="padding:10px">VIP Members get a VIP icon displayed on their profiles and posted tasks to indicate their status as a VIP Member. This let's other users know immediately that you are a VIP Member. Better yet, a VIP user does not pay any Task Owner or Tasker commissions on tasks that are awarded and accepted while they are a VIP member.</div>
							</td>
						</tr>
						<tr>
							<td height="20"></td>
						</tr>   
						<tr bgcolor="#D5D5D5" height="20">
							<td align="center" class="bodytextwhite" width="10%" ><strong>{$lang.Pick}</strong></td> 
							<td align="center"  class="bodytextwhite" width="35%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$lang.Membership_Name}</strong></td>
							<td align="center" class="bodytextwhite"><strong>{$lang.Membership_Time}</strong></td>
							<td align="center" class="bodytextwhite"><strong>{$lang.Membership_Fees}</strong></td>
						</tr>
						{section name=mem loop=$Loop}
						<tr class="{cycle values='list_A, list_B'}"  height="20">
							<td align="center" class="bodytextblack" width="10%"><input type="radio" name="selected_membership[]" value="{$arr_member[mem].id}"></td>
							<td align="center"  class="bodytextblack" width="35%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$arr_member[mem].name}</td>
							<td align="center" class="bodytextblack">{$arr_member[mem].time} month(s)</td>
							<td align="center" class="bodytextblack">{$lang_common.Curreny}&nbsp;{$arr_member[mem].fees}</td>
						</tr>
						{/section}
						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4" align="right">		
							<!--<input id="btnbg2" type="submit" name="Submit" value="{$lang.Button_Submit}" class="login_txt style5" onClick="javascript: return check_membership(document.frmmembership,'{$Loop}');">-->
								
					<div class="buttons">
					   <button type="submit" name="Submit" class="negative" value="{$lang.Button_Submit}" onClick="javascript: return check_membership(document.frmmembership,'{$Loop}');">
							Submit membership type
						</button>			
					</div>			
							</td>
						</tr>

						<tr>
							<td colspan="4">&nbsp;</td>
						</tr>
					</table>
					{/if}	
					</form>
				<div class="clear"></div>
			<div id="more_link"></div>
		</div>
	</div>
	<div class="page_bottom"></div>
    </div><!-- end .grid_8.alpha -->
		<div class="grid_4 omega">
	<div class="rail_spacer">&nbsp;</div>		
		{include file="$T_Post"}
		{include file="$T_Location"}
		{include file="$T_Balance"}
		{include file="$T_Map"}					
		<div class="clear"></div>		
		</div><!-- end .grid_4.omega -->
<div class="clear"></div>
</div><!-- end .grid_12.pull_12 -->