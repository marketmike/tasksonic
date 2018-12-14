function Edit_Click(pending_id)
{
	with(document.frmPendingMoney)
	{
		pk_id.value	= pending_id;
		Action.value	= 'Edit';
		submit();
	}
}
function Delete_Click(emailids)
{
	with(document.frmPendingMoney)
	{
		if(confirm('Are you sure you want to delete Withdraw Money?'))
		{
			ww_id.value 	= emailids;
			Action.value	= 'Delete';
			submit();
		}
	}
}
function DeleteChecked_Click()
{
	with(document.frmPendingMoney)
	{
		var flg=false;

		if(document.all['cat_prod[]'].length)
		{
			for(i=0; i < document.all['cat_prod[]'].length; i++)
			{
				if(document.all['cat_prod[]'][i].checked)
					flg = true;
			}
		}
		else
		{
			if(document.all['cat_prod[]'].checked)
				flg = true;
		}

		if(!flg)
		{
			alert('Please select the record you want to delete.');
			return false;
		}
			
		if(confirm('Are you sure you want to delete selected Withdraw Money?'))
		{
			Action.value 	= 'DeleteSelected';
			submit();
		}
	}
}