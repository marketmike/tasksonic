<?php /* Smarty version 2.6.26, created on 2012-08-25 22:40:34
         compiled from home_page_slider_addedit.tpl */ ?>
<table border="0" cellpadding="0" cellspacing="1" width="95%" class="stdTableBorder" height="97%">
	<form name="frmPage" action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="post" enctype="multipart/form-data">
	<tr>
		<td valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td class="pagetitle" width="49%" background="<?php echo $this->_tpl_vars['Templates_Image']; ?>
title_bg.gif" height="25">Home Page Manager [<?php echo $this->_tpl_vars['Action']; ?>
] </td>
					<td class="pagetitle" width="50%" background="<?php echo $this->_tpl_vars['Templates_Image']; ?>
title_bg.gif">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="top" align="center">
			
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton" onclick="javascript: return Validate_Page(document.frmPage);">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="page_id" value="<?php echo $this->_tpl_vars['page_id']; ?>
">
						<input type="hidden" name="Action" value="<?php echo $this->_tpl_vars['Action']; ?>
">
					</td>
				</tr>
			</table>	
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr>
					<td width="25%" class="fieldLabelRight" valign="top">Slider Imager URL:</td>
					<td width="75%" class="fieldLabelLeft">
					<script src="/editor/spaw_script.js.php" language="JavaScript"></script>
					<script src="/editor/lib/themes/default/js/toolbar.js.php" language="JavaScript"></script>				
					<img unselectable="on" onmouseup="SPAW_default_bt_up(this)" onmousedown="SPAW_default_bt_down(this)" onmouseout="SPAW_default_bt_out(this)" onmouseover="SPAW_default_bt_over(this)" class="SPAW_default_tb_out" onclick="SPAW_image_insert_click('en_home_content',this)" src="http://www.tasksonic.com/editor/lib/themes/default/img/tb_image_insert.gif" alt="Insert image" id="SPAW_en_home_content_tb_image_insert">					
					<input type="text" name="slide_url" value="<?php echo $this->_tpl_vars['slide_url']; ?>
" style="width:300px" />
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="1" cellspacing="2" width="95%">
				<tr><td class="divider" colspan="4"></td></tr>
				<tr>
					<td align="left" colspan="2">
						<input type="submit" name="Submit" value="Save" class="stdButton" onclick="javascript: return Validate_Page(document.frmPage);">
						<input type="submit" name="Submit" value="Cancel" class="stdButton">
						<input type="hidden" name="home_id" value="<?php echo $this->_tpl_vars['home_id']; ?>
">
						<input type="hidden" name="Action" value="<?php echo $this->_tpl_vars['Action']; ?>
">
					</td>
				</tr>
			</table>	
			<br>
		</td>
	</tr>
	</form>
</table>