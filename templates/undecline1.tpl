<form method="post" action="{$smarty.server.PHP_SELF}" name="frmundecline1">
<table width="98%" border="0" align="center">
<tr>
  <td>
    <table width="90%" border="0" align="center">
		<tr>
			<td class="white_cont" colspan="2"><strong>{$lang.Decline_Bid}</strong></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td class="white_cont">{$lang.Decline_Msg}. </td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td class="white_cont" colspan="2"><strong>{$lang.Provider_Name} : &nbsp;&nbsp;<a target="_blank" href="task_owner_profile_{$provider_name}.html" class="footerLink">{$provider_name}</a></strong></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</table>
	<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		   <td width="49%" align="center" class="bodytextblack"><input type="submit" name="Submit" value="{$lang.Button_Close}" class="Button" onclick="javascript : return back2({$id});"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>

  </td>
</tr>
</table>
<input type="hidden" name="Action"/>
<input type="hidden" name="bid_id" value="{$bid_id}" />
<input type="hidden" name="project_id" value="{$project_id}" />
<input type="hidden" name="reasons" value="{$reasons}" />
<input type="hidden" name="id" value="{$id}" />
</form>