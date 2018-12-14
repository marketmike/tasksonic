<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">   
<div class="grid_12 push_12 alpha omega">
<div class="grid_12 alpha omega">
<h1>Award Your Task</h1>
<div class="page_top_941"></div>
        <div class="page_content">
            <div class="page_content_white">
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						{$project_name}						
						</label>
					</div>
					</div>				
					<div class="clear"></div>			
			<div class="content_padder">

					{if $error == 1}
					<table width="100%"  border="0" align="center">
						<tr>
							<td>&nbsp;</td>
						</tr> 
						<tr>	
							<td width="50%" align="center" class="successMsg">{$lang.award_task_Err}</td>
						</tr>
						<tr>	
							<td width="50%" align="center" class="bodytextblack">&nbsp;</td>
						</tr>
					</table>
					{else}
					  {if $Loop > 0 }
							<form method="post" action="{$smarty.server.PHP_SELF}" name="frmAward">
							<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
								{if $succMsg}
								<tr>
									<td colspan="2" align="center" class="successMsg">{$succMsg}</td>
								</tr>
								<tr>	
									<td height="20"></td>
								</tr>
								{/if}
								<tr>
									<td colspan="2" class="bodytext"><div class="body_spacer">{$lang.Award_Text}</div></td>	  
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>	  
								</tr>
								<tr>
									<td colspan="2">
										<table width="100%" border="0" cellpadding="0" cellspacing="0">
											<tr bgcolor="#B2B2B2">
												<td class="bodytextwhite" align="center" width="8%" height="20">&nbsp;<strong>{$lang.Pick}</strong></td>
												<td class="bodytextwhite" align="left" width="15%" height="20"><strong>{$lang.Provider}</strong></td>
												<td class="bodytextwhite" align="center" width="10%" height="20"><strong>{$lang.Bid}</strong></td>
												<td class="bodytextwhite" align="center" width="10%" height="20"><strong>In Wallet</strong></td>
												<td class="bodytextwhite" align="center" width="14%" height="20"><strong>Commission Due</strong></td>
												<td class="bodytextwhite" align="center" width="8%" height="20"><strong>Short</strong></td>
												<td class="bodytextwhite" align="center" width="20%" height="20"><strong>Bid Date</strong></td>
												<td class="bodytextwhite" align="center" width="15%" height="20"><strong>{$lang.Reviews}</strong></td>
											</tr>
											{section name=bids loop=$Loop}
											<tr class="{cycle values='list_B style3, list_A style3'}">
												<td  align="center"><input type="radio" name="selected_user[]" value="{$arr_bids[bids].bid_by_user}"><!--<input type="checkbox" name="selected_user[]" value="{$arr_bids[bids].bid_by_user}">--></td>
												<td align="left">&nbsp;<a href="tasker_profile_{$arr_bids[bids].bid_by_user}.html" >{$arr_bids[bids].bid_by_user}</a></td>
												<td align="center">$ {$arr_bids[bids].bid_amount}</td>
												<td  align="center">${$inwallet}</td>
												<td  align="center">${$arr_bids[bids].commission}</td>
												<td  align="center" style="color:red">${$arr_bids[bids].howshort}</td>												
												<td  align="center">{$arr_bids[bids].date_2|date_format %l:%M %p}</td>
												<td  align="center">
												{if $arr_bids[bid].rating == 0.00}
												   No Feedback yet
												{else}
													<img src="{$Templates_Image}{$arr_bids[bid].rating|intval}.gif" width="120"><br />&nbsp;<a href="{$arr_bids[bid].bid_by_user}_tasker_feedback.html" >({if $arr_bids[bid].reviews < 1}0{/if}{$arr_bids[bid].reviews} reviews)</a>
												{/if}   
												
												</td>
											</tr>
											{/section}
										</table>
									</td>
								</tr>
								<tr>
									<td height="20"></td>
								</tr>
								<tr>
									<td colspan="2">
					<!--<input id="btnbg" type="submit" name="Submit" value="{$lang.Select}" class="login_txt style5" onClick="javascript: return check_award(document.frmAward,'{$Loop}');">-->
					<div class="buttons">
						<button type="submit" value="{$lang.Select}" name="Submit"  onClick="javascript: return check_award(document.frmAward,'{$Loop}');"  style='text-decoration:none;' class="negative">
							Award task to selected provider
						</button>
					</div>						
									</td>
								</tr>
							</table>
							<input type="hidden" name="project_id" value="{$project_id}" />
							</form>
						{else}	
							<table width="100%"  border="0">
									<tr><td height="6"></td></tr>
									<tr>
										<td colspan="2" align="center" class="successMsg">{$lang.Text1} <strong>{$project_name}</strong> {$lang.Text2} <strong>{$project_name}</strong> {$lang.Text3} </td>
									</tr>
									<tr><td height="6"></td></tr>
							</table>		
						{/if}	
					{/if}
			</div>
			</div>
		</div>
<div class="page_bottom_941"></div>
<div class="clearwspace"></div>	
</div><!-- end .grid_12.alpha omega -->
<div class="clear"></div>
</div><!-- end .grid_12.push_12 -->