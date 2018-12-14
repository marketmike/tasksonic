<script language="javascript">
	var JS_Del				 = '{$JS_Del}';
	var JS_Select			 = '{$JS_Select}';
	var JS_Del_All			 = '{$JS_Del_All}';
</script>
<div id="list_head">
					<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
							<span class="style9"><font color=black>{$lang.Accept_Deny_project}</font></span>
					</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
					
					<div style=" width:860px; clear:both;">
						<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
{if $smarty.session.User_Name}
	{include file = "$T_seller_submenu"}
{/if}

<form method="post" action="{$smaty.server.PHP_SELF}">
<div class="find_container">			
	<div>				
		<div class="el_white_row">			
			<div align="center">				
				<table width="100%"  cellspacing="0" cellpadding="0" border="0">
					{if $error == 1}
					<tr><td height="6"></td></tr>
					<tr>
						<td align="center" class="successMsg">{$lang.Accept_project_Err}</td>
					</tr>
					<tr><td height="6"></td></tr>
					{else}
					<tr>
						<td align="center" class="bodytextblack" colspan="2"><strong>{$lang.Accept_project_Text_2} <font size="2">{$project_name}</font> {$lang.task}.</strong></td>
					</tr>
					<tr><td height="6"></td></tr>
					<tr>	
						<td align="right" class="bodytextblack" width="50%">
						<select name="accept_deny" style="width:70px; border:1px solid #bcbcbc; margin-top:4px;">
							{$Accept_Deny}
						</select>
						&nbsp;&nbsp;<input type="hidden" name="project_id" value="{$project_id}" />
						<input type="hidden" name="auth_id_of_post_by" value="{$auth_id_of_post_by}" />						
						</td>
						<td align="left"><input id="btnbg" type="submit" name="Submit" value="{$lang.Accept_Submit}" class="login_txt style5" /></td>
					</tr>
					<tr><td height="6"></td></tr>
					{/if}
				</table>										
			</div>
		</div>				
	</div>
	</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
</div>
</form>
<div id="more_link">
						
						
						
					</div>
				</div></div>
