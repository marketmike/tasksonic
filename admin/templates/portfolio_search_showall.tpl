<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
		Protfolio Search Management
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" align="center">
	<form name="frmSearchPortfolio" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Protfolio Search Management </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td class="varnormal">
						Manage Protfolio Search. Edit/Delete project.
					<div align="right">Page Size:
					  <select name="page_size" onChange="JavaScript: document.frmSearchPortfolio.submit();">
							{$PageSize_List}
					  </select></div>
				  </td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td class="successMsg" align="center">&nbsp;{$succMessage}</td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<br>
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				{section name=Portfolios loop=$Loop}
				<tr class="{cycle values='list_A, list_B'}">
				   <td>
				      <table width="100%" cellpadding="3" cellspacing="3" border="0">
						<tr>
							<td colspan="3" width="70%">
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										{foreach name=files_name from=$files[Portfolios] item=files_name}
											<td width="33%"><img src="{$img_path}{$files_name->sample_file}" border="0" height="140" width="140" /></td>
										{/foreach}
										{if $smarty.foreach.files_name.total == 2}
											<td width="33%" class="bodytextblack">&nbsp;</td>
										{/if}
										{if $smarty.foreach.files_name.total == 1}
											<td width="33%" class="bodytextblack">&nbsp;</td>
											<td width="33%" class="bodytextblack">&nbsp;</td>
										{/if}
									</tr>
								</table>
							</td>
							<td width="30%">
								<table width="100%" cellpadding="3" cellspacing="3" border="0">
									<tr>
										<td class="bodytextblack"><strong>User</strong></td>
										<td class="bodytextblack"><a href="users.php?Action=Edit&user_auth_id={$user_auth_id[Portfolios]}" class="actionLink" target="_blank">{$user_login_id[Portfolios]}</a></td>
									</tr>
									<tr>
										<td class="bodytextblack"><strong>Rating</strong></td>
										<td class="bodytextblack">
										{if $rating[Portfolios] == 0.00}
											No Feedback yet
										{else}	
											<img src="{$Templates_Image}{$rating[Portfolios]|intval}.gif" width="120"><br /><a href="{$user_login_id[Portfolios]}_tasker_feedback.html" class="actionlink">({$reviews[Portfolios]} reviews)</a>
										{/if}
										</td>
									</tr>
									<tr>
										<td class="bodytextblack"><strong>Earning</strong></td>
										<td class="bodytextblack">
										{if $earning[Portfolios] == 0.00}
											<span class="fieldlabelLeft">$</span> 0.00
										{else}
											<span class="fieldlabelLeft">$</span>&nbsp;{$earning[Portfolios]}
										{/if}										</td>
									</tr>
									<tr>
										<td class="bodytextblack"><strong>Location</strong></td>
										<td class="bodytextblack">{$location[Portfolios]}</td>
									</tr>
								</table>
							</td>
						</tr>	
						<tr>
						    <td colspan="3" class="bodytextblack">&nbsp;</td>
<!--							<td colspan="3" class="bodytextblack"><a href="tasker_profile_{$user_login_id[Portfolios]}.html" class="actionlink">Profile</a> | <a href="{$user_login_id[Portfolios]}_tasker_feedback.html" class="actionlink">Feedback</a> | <a href="tasker_portfolio_{$user_login_id[Portfolios]}.html" class="actionlink">Portfolio</a> | <a href="contact_{$user_login_id[Portfolios]}.html" class="actionlink">Contact {$user_login_id[Portfolios]}</a> | <a href="post_task.php" class="actionlink">Post project to {$user_login_id[Portfolios]}</a></td>
-->							<td class="bodytextblack" align="center"><!--a href="#" class="actionlink"-->{$user_portfolio_count[Portfolios]} sample(s) match your criteria <!--/a--></td>
						</tr>
					</table>
				   </td>
				</tr>
				{/section}
			</table>
			<!--{if $smarty.section.frmProList.total > 1}
			<table border="0" cellpadding="1" cellspacing="1" width="95%">
				<tr>
					<td class="bodytextblack">
						<img src="{$Templates_Image}arrow_ltr.png"> 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], true);" onMouseMove="window.status='Check All';" onMouseOut="window.status='';" class="actionLink">Check All</a> / 
						<a href="JavaScript: CheckUncheck_Click(document.all['cat_prod[]'], false);" onMouseMove="window.status='Uncheck All';" onMouseOut="window.status='';" class="actionLink">Uncheck All</a>  &nbsp;&nbsp;
						With selected
						<img src="{$Templates_Image}delete.gif" class="imgAction" title="Delete" onClick="JavaScript: DeleteChecked_Click('{$aprolist[frmProList].id}');">
					</td>
				</tr>
			</table>
			{/if}-->
			{if $Page_Link}
			<table border="0" cellpadding="2" cellspacing="2" width="95%">
				<tr>
					<td align="right">{$Page_Link}</td>
				</tr>
			</table>
			{/if}
			<br><br>
		</td>
	</tr>
	</form>
</table>