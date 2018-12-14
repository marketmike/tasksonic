function Validate_Page(frm)
{
	with(frm)
	{
		if(!IsEmpty(page_title, 'Please, enter Page Title .'))
		{
			return false;
		}
/*		if(!IsEmpty(gu_page_title, 'Please, enter Page Title in Gujarati.'))
		{
			return false;
		}
*/		return true;
	}
}
function Edit_Click(pageId)
{
	with(document.frmPage)
	{
		pid.value		= pageId;
		Action.value	= 'Edit';
		submit();
	}
}
function Delete_Click(pageId)
{
	with(document.frmPage)
	{
		if(confirm('Are you sure you wants to delete page?'))
		{
			pid.value 		= pageId;
			Action.value	= 'Delete';
			submit();
		}
	}
}
