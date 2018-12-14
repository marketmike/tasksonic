<script language="javascript">
	var JS_EN_Slogan	 = '{$lang.JS_EN_Slogan}';
	var JS_EN_Desc		 = '{$lang.JS_EN_Desc}';
addLoadEvent(prepareInputsForHints);
</script>
<div id="list_head">
					<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
							<span class="style9"><font color=black>{$lang.Ln_En}</span>
						</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
					
					<div style=" width:819px; clear:both;">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
<form method="post" action="{$smarty.server.PHP_SELF}" name="frmeditbuyer">
<table width="100%" bgcolor="#FFFFFF" border="0" align="center" cellpadding="0" cellspacing="0">
	
	{if $ERROR}
				<tr>
					<td align="center" class="successMsg" colspan="2">{$ERROR}</td>
				</tr>
				<tr>
					<td align="center" class="successMsg" colspan="2">&nbsp;</td>
				</tr>
	{/if}
	<tr>
		<td align="center">
		   <table cellpadding="3" cellspacing="4" border="0" width="95%">
				
				<tr>
						<td width="51%" class="bodytext">{$lang.EN_Slogan} :</td>
				</tr>
				<tr><td height="3"></td></tr>
				<tr>		
						<td width="49%">
						 <table cellpadding="0" cellspacing="0" border="0">
						   <tr>
						     <td><img src="{$Templates_Image}txtleft.jpg"/></td>
								<td height="26" style="background-color:#FFFFFF;"><input name="en_buyers_slogan" value="{$en_buyers_slogan}"  type="text"style="border:none;" tabindex="1" size="110" maxLength="50" /></td>
								<td><img src="{$Templates_Image}txtright.jpg" /></td>
								<td></td>
						   </tr>
						   </table>
						</td>
					
				</tr>
				<tr><td height="3"></td></tr>
				
				<tr>
					<td class="bodytext">{$lang.EN_Description} :<br><br>
					<textarea name="en_buyers_description" class="textbox" cols="90" rows="10">{$en_buyers_description}</textarea>	</td>
				</tr>
				<tr><td height="3"></td></tr>
				<tr>
					<td align="center">
					<input class="login_txt style5" type="submit" id="btnbg2" name="Submit" value="{$lang.Button_Buyer}" onClick="Javascript: return Check_Details(this.form);"  /></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<input type="hidden" name="Action" value="Edit">
<input type="hidden" name="User_Id" value="{$User_Id}">
</form>
</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
</div>
					
					<div id="more_link">
						
						
						
					</div>
				</div>