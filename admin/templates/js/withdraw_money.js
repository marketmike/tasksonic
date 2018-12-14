function Edit_Click(withdraw_id)
{
	with(document.frmwithdrawl)
	{
		ww_id.value	= withdraw_id;
		Action.value	= 'Edit';
		submit();
	}
}
function Delete_Click(emailids)
{
	with(document.frmwithdrawl)
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
	with(document.frmwithdrawl)
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