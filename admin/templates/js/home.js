function Validate_Page(frm)
{
	with(frm)
	{
		if(!IsEmpty(home_title, 'Please, enter Page Title.'))
		{
			return false;
		}
		return true;
	}
}
function Edit_Click(pageId)
{
	with(document.frmPage)
	{
		home_id.value		= pageId;
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
