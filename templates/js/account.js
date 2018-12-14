// JavaScript Document
function DeleteChecked_Click()
{
	
	with(document.frmaccout)
	{
		var flg=false;
		
		if(document.getElementsByName('cat_prod[]').length)
		{
			for(i=0; i < document.getElementsByName('cat_prod[]').length; i++)
			{
				if(document.getElementsByName('cat_prod[]')[i].checked)
					flg = true;
			}
		}
		else
		{
			if(document.getElementsByName('cat_prod[]').checked)
				flg = true;
		}

		if(!flg)
		{
			alert('Please select the record you want to delete.');
			return false;
		}
		var msg = confirm('Are you sure you want to delete selected records?');	
		if(msg)
		{
			Action.value   = 'DeleteSelected';
			//admin_id.value = adminid;
			submit();
		}
		
	}
}