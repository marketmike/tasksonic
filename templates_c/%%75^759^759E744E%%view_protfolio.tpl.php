<?php /* Smarty version 2.6.26, created on 2012-08-24 11:19:04
         compiled from view_protfolio.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'wordwrap', 'view_protfolio.tpl', 71, false),)), $this); ?>
<div id="list_head">
<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div>
<span class="style9"><font color=black><?php echo $this->_tpl_vars['protfolio_title']; ?>
</font></span>
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
							<a href="javascript:OpenImage('<?php echo $this->_tpl_vars['sample_file']; ?>
')"><IMG src="<?php echo $this->_tpl_vars['path']; ?>
<?php echo $this->_tpl_vars['sample_file']; ?>
" height="125" width="125" border="0"></a>
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
										<td vAlign="top" width="24%"  align="left" class="bodytextblack"><strong><?php echo $this->_tpl_vars['lang']['Development_cost']; ?>
 :</strong></td>
										<td vAlign="top" width="76%" align="left" class="bodytext"><?php echo $this->_tpl_vars['budget']; ?>
</td>
									</tr>
									<tr> 
										<td vAlign="top"  align="left"  class="bodytextblack"><strong><?php echo $this->_tpl_vars['lang']['Execution_time']; ?>
 :</strong></td>
										<td vAlign="top" align="left"  class="bodytext "><?php echo $this->_tpl_vars['time_spent']; ?>
</td>
								    </tr>
									<tr>
									    <td>&nbsp;</td>
									    <td>&nbsp;</td>
									</tr>
									<tr> 
										<td vAlign="top"  align="left" class="bodytextblack"><strong><?php echo $this->_tpl_vars['lang']['Category']; ?>
 :</strong></td>
										<td vAlign="top" align="left" class="bodytext"><?php echo $this->_tpl_vars['new_categories']; ?>
</td>
									</tr>
									<tr> 
										<td vAlign="top"  align="left" class="bodytextblack"><strong><?php echo $this->_tpl_vars['lang']['Industry']; ?>
 :</strong></td>
										<td vAlign="top" align="left" class="bodytext"><?php echo $this->_tpl_vars['industry']; ?>
</td>
									</tr>
								</table>
							  </td>
							</tr>
							<tr>
							   <td>&nbsp;</td>
							</tr>
							<tr>
							  <td valign="top"><a href="javascript:OpenImage('<?php echo $this->_tpl_vars['sample_file']; ?>
')" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['view_sample']; ?>
</a> <span class="bodytextblack"> |</span> <a href="post_project_<?php echo $this->_tpl_vars['user_name']; ?>
.html" class="footerlinkcommon2" onClick="Javascript: return chk_user('<?php echo $_SESSION['User_Id']; ?>
');"> <?php echo $this->_tpl_vars['lang']['post_project']; ?>
 <?php echo $this->_tpl_vars['user_name']; ?>
</a></td>
							</tr>
						</table>
		          </td>
				</tr>
			</table>
			<table width="100%" border="0">
				<tr> 
				   <td width="2%">&nbsp;</td>
				   <td valign="top" class="bodytextblack"><strong> <?php echo $this->_tpl_vars['lang']['Work_Done']; ?>
</strong></td>
				</tr>
				<tr>
				   <td width="2%">&nbsp;</td>
					<td class="bodytext">
					  <?php echo ((is_array($_tmp=$this->_tpl_vars['desc'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 135, "\n", true) : smarty_modifier_wordwrap($_tmp, 135, "\n", true)); ?>
<br />
					  <br />
				  </td>
				</tr>
		  </table>
		</td>
  	</tr>		
    <tr>
	    <td>&nbsp;&nbsp;</td>
 	</tr>
	<?php if ($_SESSION['User_Name'] != ''): ?>
	<tr>
       	<td> 
		<table width="95%" cellPadding="2" cellSpacing="0">
			<tr> 
			 <td width="2%">&nbsp;</td>
				<td width="92%"  class="bodytext"><?php echo $this->_tpl_vars['lang']['Please_read_the']; ?>
 <a href="Javascript: View_Terms()" class="footerlinkcommon2"><?php echo $this->_tpl_vars['lang']['task_Guidelines']; ?>
 </a><?php echo $this->_tpl_vars['lang']['before_project']; ?>
</td>
			    <td vAlign="top" width="8%" align="right" class="bodytextblack"> 
				<input class="login_txt style5" type="submit" id="btnbg" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Submit']; ?>
"/></td>
			</tr>
	   </table>
	   </td>	      
	</tr>
	<?php endif; ?>
	<tr>
	    <td>&nbsp;&nbsp;</td>
 	</tr>
</table>
<input type="hidden" name="user_name" value="<?php echo $this->_tpl_vars['user_name']; ?>
" />
</form>
</div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b><br>
</div>
					
	<div id="more_link">
		
	</div>
</div>