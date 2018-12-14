<div id="list_head">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>

							<span class="style9"><font color=black<EUR to USD</font></span>
</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
					<div style=" width:860px; clear:both;">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
<table width="100%"  cellpadding="1" cellspacing="1" border="0">
	<tr>
		<td>&nbsp;</td>
	</tr>
	<!--<tr>
		<td align="center" class="bodytextblack"><strong>EUR to USD</strong></td>
	</tr>-->
	<tr>
		<td align="center" class="bodytextblack">
			1.00 EUR = {$euro_dollar} USD
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="center" class="bodytextblack"><strong>USD to EUR</strong></td>
	</tr>
	<tr>
		<td align="center" class="bodytextblack">
			1.00 USD = {$dollar_euro} EUR
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
</table>	
<form name="frmRates" method="post" action="{$smarty.server.PHP_SELF}">
<table width="50%" cellpadding="1" cellspacing="1" border="0" align="center">
	<tr>
		<td class="bodytextblack">Amount</td>
		<td class="bodytextblack">From</td>
		<td class="bodytextblack">To</td>
	</tr>
	<tr>
		<td><input name="amount" type="text" size="3"></td>
		<td><select name="from">
				<option value="EUR">EUR</option>
				<option value="USD">USD</option>
			</select>
		</td>
		<td><select name="to">
				<option value="USD">USD</option>
				<option value="EUR">EUR</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center"><input type="submit" name="Submit" value="Calculate" class="stdButton"></td>
	</tr>
	{if $new_amount}
	<tr>
		<td colspan="3" align="center" class="bodytextblack">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" align="center" class="bodytextblack">
			<strong>{$amount} {$from} = {$new_amount} {$to}</strong>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center" class="bodytextblack">This are approximate rates</td>
	</tr>
	{/if}
</table>
<input type="hidden" name="Action" value="calculate">
</form>
</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>

</div>
					
					<div id="more_link">
						
						
						
					</div>
				</div>