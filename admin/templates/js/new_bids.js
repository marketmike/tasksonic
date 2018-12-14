function Delete_Click(catId,project_id1,username1)
{
	with(document.frmNewBid)
	{
		if(confirm('Are you sure you want to delete Bid?'))
		{
			bid_id.value 	 = catId;
			project_id.value = project_id1;
			user_name.value  = username1;
			Action.value	 = 'Delete';
			submit();
		}
	}
}
function Edit_Click(catId,project_id1)
{
	with(document.frmNewBid)
	{
			bid_id.value 	 = catId;
			project_id.value = project_id1;
			Action.value	 = 'Edit';
			submit();
	}
}
