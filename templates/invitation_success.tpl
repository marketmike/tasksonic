<table width="95%" bgcolor="#000000" border="0">
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
    <td class="bodytextblack" align="center">
	     {$lang.Message} :  
	</td>
</tr>
<tr>
  <td> 
    <table width="100%" border="0" cellpadding="2" cellspacing="2">
      	{section name=msg2 loop=$cnt}
		<tr class="{cycle values='list_A, list_B'}">
		   <td align="center" class="bodytextblack" height="100">
		    {$msg1[msg2]} 
		   </td>
	    </tr>	
		{/section} 
	</table>
  </Td>
</Tr>
<tr>
   <td align="center">
      <input type="submit" name="Submit" id="btnbg" value="Close" onclick="javascript : window.close();" class="login_txt style5"/>     
   </td>
</tr>
</table>