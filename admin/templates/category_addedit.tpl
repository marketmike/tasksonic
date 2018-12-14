<div class="title-links" style="width:930px;">
<div class="form_page_text" style="text-align:center;">
	<label for="login-email-address">
	Category Management [ {$Action} ] - Description Image Width 100px						
	</label>
</div>
</div>
<div class="clear"></div>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" height="97%" align="center">
	<form name="frmCategory" action="{$smarty.server.PHP_SELF}" method="post" >
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" height="25">Category Management [ {$Action} ] - Description Image Width 100px</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center"><strong>{$Action} Category.</strong></td>
				</tr>
				<tr><td height="2"></td></tr>
				<tr><td height="2"></td></tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="75%">
			{if $Action=='Edit'}
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Name :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="cat_name" size="40" maxlength="50" value="{$cat_name1}" class="textbox">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Display Title :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="disp_title" value="{$disp_title}" size="40" maxlength="50" class="textbox">
					</td>
				</tr>
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Category Description :</td>
					<td class="fieldLabelLeft">{$EN_Desc_Editor}<!--<textarea name="cat_desc" cols="50" rows="5">{$desc}</textarea>-->
				</tr>
			{else}
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Name :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="en_cat_name" size="40" maxlength="50" class="textbox"></td>
				</tr>

				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Display Title :</td>
					<td class="fieldLabelLeft">
						<input type="text" name="en_disp_title" size="40" maxlength="50" class="textbox"></td>
				</tr>

				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Category Description :</td>
					<td class="fieldLabelLeft">{$EN_Desc_Editor}<!--<textarea name="en_cat_desc" cols="50" rows="5"></textarea>--></td>
				</tr>
			{/if}
				<tr>
					<td class="fieldlabelRight" valign="top" width="30%">Visible :</td>
					<td class="fieldLabelLeft">
						<input type="checkbox" name="cat_status" value="1" class="stdCheckBox" {$cat_status}>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;
							<input type="submit" name="Submit" value="Save" class="stdButton" onClick="javascript: return Validate_Form_SubCat(document.frmCategory);">
							&nbsp;&nbsp;&nbsp;
							<input type="submit" name="Submit" value="Cancel" class="stdButton">
					</td>
				</tr>
			</table>	
			<br>
			<input type="hidden" name="Action" value="{$Action}"/>
			<input type="hidden" name="cat_parent_id"  value="{$cat_parent_id}"/>
			<input type="hidden" name="cat_id" value="{$cat_id}" />
			<br>
		</td>
	</tr>
	</form>
</table>