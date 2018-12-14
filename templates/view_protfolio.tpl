<div id="list_head">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
<span class="style9"><font color=black>{$protfolio_title}</font></span>
</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
					
					<div style=" width:860px; clear:both;">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
<form name="frmviewprotfolio" method="post" >
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
		<tr align="center"> 
		<td vAlign="top" align="middle"> 
			<table width="100%" border="0">
				<tr> 
				  <td>&nbsp;</td>
				  <td align="middle" width="17%">
						<center>
							<a href="javascript:OpenImage('{$sample_file}')"><IMG src="{$path}{$sample_file}" height="125" width="125" border="0"></a>
						</center>
				  </td>
				  <td width="1%">&nbsp;</td>
				  <td width="81%" align="middle" valign="top">
						<table border="0">
							<tr> 
								<td width="781"> 
								<table width="100%" cellPadding="2" cellSpacing="0">
								    <tr>
									   <td>&nbsp;</td>
									   <td>&nbsp;</td>
									</tr>
									<tr> 
										<td vAlign="top" width="24%"  align="left" class="bodytextblack"><strong>{$lang.Development_cost} :</strong></td>
										<td vAlign="top" width="76%" align="left" class="bodytext">{$budget}</td>
									</tr>
									<tr> 
										<td vAlign="top"  align="left"  class="bodytextblack"><strong>{$lang.Execution_time} :</strong></td>
										<td vAlign="top" align="left"  class="bodytext ">{$time_spent}</td>
								    </tr>
									<tr>
									    <td>&nbsp;</td>
									    <td>&nbsp;</td>
									</tr>
									<tr> 
										<td vAlign="top"  align="left" class="bodytextblack"><strong>{$lang.Category} :</strong></td>
										<td vAlign="top" align="left" class="bodytext">{$new_categories}</td>
									</tr>
									<tr> 
										<td vAlign="top"  align="left" class="bodytextblack"><strong>{$lang.Industry} :</strong></td>
										<td vAlign="top" align="left" class="bodytext">{$industry}</td>
									</tr>
								</table>
							  </td>
							</tr>
							<tr>
							   <td>&nbsp;</td>
							</tr>
							<tr>
							  <td valign="top"><a href="javascript:OpenImage('{$sample_file}')" class="footerlinkcommon2">{$lang.view_sample}</a> <span class="bodytextblack"> |</span> <a href="post_project_{$user_name}.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('{$smarty.session.User_Id}');"> {$lang.post_project} {$user_name}</a></td>
							</tr>
						</table>
		          </td>
				</tr>
			</table>
			<table width="100%" border="0">
				<tr> 
				   <td width="2%">&nbsp;</td>
				   <td valign="top" class="bodytextblack"><strong> {$lang.Work_Done}</strong></td>
				</tr>
				<tr>
				   <td width="2%">&nbsp;</td>
					<td class="bodytext">
					  {$desc|wordwrap:135:"\n":true}<br />
					  <br />
				  </td>
				</tr>
		  </table>
		</td>
  	</tr>		
    <tr>
	    <td>&nbsp;&nbsp;</td>
 	</tr>
	{if $smarty.session.User_Name != ''}
	<tr>
       	<td> 
		<table width="95%" cellPadding="2" cellSpacing="0">
			<tr> 
			 <td width="2%">&nbsp;</td>
				<td width="92%"  class="bodytext">{$lang.Please_read_the} <a href="Javascript: View_Terms()" class="footerlinkcommon2">{$lang.task_Guidelines} </a>{$lang.before_project}</td>
			    <td vAlign="top" width="8%" align="right" class="bodytextblack"> 
				<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="{$lang.Button_Submit}"/></td>
			</tr>
	   </table>
	   </td>	      
	</tr>
	{/if}
	<tr>
	    <td>&nbsp;&nbsp;</td>
 	</tr>
</table>
<input type="hidden" name="user_name" value="{$user_name}" />
</form>
</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
</div>
					
	<div id="more_link">
		
	</div>
</div>