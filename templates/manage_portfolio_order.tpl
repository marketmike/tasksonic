<script language="javascript">
	var JS_Move				 = '{$lang.JS_Move}';
</script>
<div class="grid_12 push_12 alpha omega content_body"> 

	<div class="grid_8 alpha">
	<h1>{$lang.Manage_Order_Portfolio}</h1>
<div class="page_top"></div>
        <div class="page_content">
            <div class="page_content_white">
				<div class="clear"></div>
					<div class="title-links" style="width:100%;">
					<div class="form_page_text" style="text-align:center;">
						<label for="login-email-address">
						Order Your Portfolio Examples						
						</label>
					</div>
					</div>				
					<div class="clear"></div>					
						<table border="0" cellpadding="0" cellspacing="1" width="100%"  class="stdTableBorder">
							<form name="frmPortfolio" action="{$smarty.server.PHP_SELF}" method="post">
							
							<tr>
								<td valign="top" align="center">
									<table border="0" cellpadding="0" cellspacing="1" width="27%">
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr>
											<td width="25%">
												<select name="category" style="width:200px;" size="10">
													{section name=Opt loop=$Loop}
														<option value="{$portf_id[Opt]}">{$portf_tilte[Opt]}</option>
													{/section}
												</select>
												<input type="hidden" name="display_order">
											</td>
											<td width="2%">&nbsp;</td>
											<td align="left">
												<img src="{$Templates_Image}top.gif" style="cursor:hand" border="0" onClick="JavaScript: UpDown_Click(-1);"><br><br>
												<img src="{$Templates_Image}bottom1.gif" style="cursor:hand" border="0" onClick="JavaScript: UpDown_Click(1);">
											</td>
										</tr>
										<tr>
											<td height="20"></td>
										</tr>
										<tr>
											<td colspan="3" align="center">
											<div style="margin:0 auto;width:300px">
											<div class="buttons" style="float:left;margin-right:10px;">
											<button type="submit" name="Submit" value="{$lang.Save}" onClick="Javascript: return Button_Click(this.form);">Submit</button>
											</div>
											<div class="buttons" style="float:left;">
											<button type="submit" name="Submit" value="{$lang.Cancel}" onClick="Javascript: return return cancel();">Cancel</button>
											</div>
												<input type="hidden" name="Action" value="{$ACTION}">
												<input type="hidden" name="user_id" value="{$user_id}">
											</div>	
											</td>
										</tr>
									</table>
									<br><br>
									<br><br>
								</td>
							</tr>
							</form>
						</table>
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