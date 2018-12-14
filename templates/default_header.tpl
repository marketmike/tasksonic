<div id="bannerbg">
			<div id="inner_bg">
				<div id="cont_area" style="padding-top:20px;">
					<!-- LOGIN AREA STARTS HERE -->
						<div id="login_area">
						  <div class="align1">
								<span class="style4">{$lang_common.Mem_login}</span>
								<span class="style3" ><br />{$lang_common.Not_Registered_Yet}<span class="style6"> <a href="signup.php">{$lang_common.Sign_Up}</a></span><br />
								{$lang_common.Forgot_Your_Password} <span class="style6"> <a href="forgotpasswd.php">{$lang_common.Recover_It}</a></span></span>
								<div class="btop" style="clear:both; background-color:#fffffff; width:293px; height:118px; ">
								 <div style="margin:0px 15px;">
								 {if $smarty.session.User_Name}
								  <table width="92%" border="0" align="center" cellpadding="2" cellspacing="0">
									  <tr>
										<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;font-weight:bold;color:#A7A7A7;text-decoration:none;">{$lang_common.Welcome} {$smarty.session.User_Name}</td>
									  </tr>
									  <br />
									  <tr>
										<td class="style3">
										<font size="2" >&raquo;</font>&nbsp;<a href="post-new-task.html" class="bodytextlightblue">{$lang_common.Post_project}</a><br />
										<font size="2" >&raquo;</font>&nbsp;<a href="my-account.html" class="bodytextlightblue">{$lang_common.Buyer_Activity}</a> <br />
										<font size="2" >&raquo;</font>&nbsp;<a href="my-account.html" class="bodytextlightblue">medic Activity</a><br />
										<font size="2" >&raquo;</font>&nbsp;<a href="membership.php" class="bodytextlightblue">Membership</a><br />
										<font size="2" >&raquo;</font>&nbsp;<a href="manage_payments.php" class="bodytextlightblue">{$lang_common.Payment}</a><br />
									  </tr>
								  </table>
			  						{else}
								<form name="frmLogin" method="post" action="login.php">
								
								
								<table cellspacing="0" cellpadding="0">
										
										{if $smarty.get.login_error}
										<tr class="style3">
											<td height="5" align="center" colspan="7">{if $smarty.get.login_error}{$lang_common.Login_Error}{else}&nbsp;{/if}</td>
										</tr>
										{/if}
										
										<tr class="style3">
											<td>{$lang_common.Username}:</td>
											<td width="19" colspan="3">&nbsp;</td>
											<td></td>
											<td height="26" style=""><input name="user_id" type="text" style="border: 1px solid #005696;" size="20" /></td>
											<td ></td>
										</tr>
										<tr class="style3">
											<td height="10" colspan="7"></td>
										</tr>
										<tr class="style3">
											<td>{$lang_common.Password}:</td>
											<td width="19" colspan="3">&nbsp;</td>
											<td></td>
											<td height="26" style=""><input name="password" type="password" style="border:1px solid #005696;" size="20" /></td>
											<td ></td>
										</tr>
										<tr class="style3">
											<td height="10" colspan="7"></td>
										</tr>
										<tr class="style3">
											<td></td><td width="19" colspan="3"></td>
											<td></td>
											<td align="right">
												<div class="buttons">
    <button type="submit" class="regular" name="Submit" value="{$lang_common.Login}">
        Login
    </button>
</div>
												<!--<input name="Submit" id="btnbg" type="submit" class="login_txt style5" value="{$lang_common.Login}" />--></td>
											<td ></td>
										</tr>
									</table>
								</form>
								{/if}
								</div>
								</div>
							</div>
						</div>
					<!-- LOGIN AREA ENDS HERE -->
					
					<!-- SEARCH AREA STARTS HERE -->
						
						<div id="search_area">
						<div id="wrap" style="padding-left:37px; padding-top:7px;">

    <div id="controller" class="hidden">
        <span class="jFlowControl">No 1</span>
        <span class="jFlowControl">No 2</span>
        <span class="jFlowControl">No 3</span>
    </div>

    
    <div id="prevNext">
        <img src="/images/prev.png" alt="Previous Tab" class="jFlowPrev" />
        <img src="/images/next.png" alt="Next Tab" class="jFlowNext" />
    </div>
    
    <div id="slides">
        <div><img src="/images/1.jpg" alt="photo" /><p class="myclass1">Do you want advice from a medic?</p></div>
        <div><img src="/images/2.jpg" alt="photo" /><p class="myclass1">Are you a legal professional? Earn money!</p></div>
        <div><img src="/images/3.jpg" alt="photo" /><p class="myclass1">Post your request for a consultation.</p></div>

    </div>
    
</div>
					</div>
					</form>
					<!-- SEARCH AREA ENDS HERE -->
				</div>
			</div>
		</div>