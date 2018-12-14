<?php /* Smarty version 2.6.26, created on 2012-08-14 09:49:09
         compiled from undecline1.tpl */ ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
" name="frmundecline1">
<table width="98%" border="0" align="center">
<tr>
  <td>
    <table width="90%" border="0" align="center">
		<tr>
			<td class="white_cont" colspan="2"><strong><?php echo $this->_tpl_vars['lang']['Decline_Bid']; ?>
</strong></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td class="white_cont"><?php echo $this->_tpl_vars['lang']['Decline_Msg']; ?>
. </td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td class="white_cont" colspan="2"><strong><?php echo $this->_tpl_vars['lang']['Provider_Name']; ?>
 : &nbsp;&nbsp;<a target="_blank" href="task_owner_profile_<?php echo $this->_tpl_vars['provider_name']; ?>
.html" class="footerLink"><?php echo $this->_tpl_vars['provider_name']; ?>
</a></strong></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</table>
	<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		   <td width="49%" align="center" class="bodytextblack"><input type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['Button_Close']; ?>
" class="Button" onclick="javascript : return back2(<?php echo $this->_tpl_vars['id']; ?>
);"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>

  </td>
</tr>
</table>
<input type="hidden" name="Action"/>
<input type="hidden" name="bid_id" value="<?php echo $this->_tpl_vars['bid_id']; ?>
" />
<input type="hidden" name="project_id" value="<?php echo $this->_tpl_vars['project_id']; ?>
" />
<input type="hidden" name="reasons" value="<?php echo $this->_tpl_vars['reasons']; ?>
" />
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
</form>