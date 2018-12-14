// JavaScript Document
function Delete_Click(catId)
{
	with(document.frmPrivateMsg)
	{
		if(confirm('Are you sure you want to delete Private message?'))
		{
			pm_id.value 	= catId;
			Action.value	= 'Delete';
			submit();
		}
	}
}
function Edit_Click(catId)
{
	with(document.frmPrivateMsg)
	{
			pm_id.value 	= catId;
			Action.value	= 'Edit';
			submit();
	}
}
