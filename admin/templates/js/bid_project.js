// JavaScript Document
function Delete_Click(catId)
{
	with(document.frmviewbidproject)
	{
		if(confirm('Are you sure you want to delete Bid?'))
		{
			bid_id.value 	= catId;
			Action.value	= 'Delete';
			submit();
		}
	}
}
function Edit_Click(catId)
{
	with(document.frmviewbidproject)
	{
			bid_id.value 	= catId;
			Action.value	= 'Edit';
			submit();
	}
}
