function Form_Submit(frm)
{
	with(frm)
    {
	       for(i=0; i < document.all['email_title[]'].length; i++)
			{
					if(!IsEmpty(document.all['email_title[]'][i], 'Please, enter your email title.'))
					{
						return false;
					}
			}
			
			for(i=0; i < document.all['email_adress[]'].length; i++)
			{
					if(!IsEmpty(document.all['email_adress[]'][i], 'Please, enter email address.'))
					{
						return false;
					}
					else if(!IsEmail(document.all['email_adress[]'][i], "Please enter valid Email."))
        			{			
						return false;
        			}
			}
		 return true;
    }
}
function Validate_Form(frm)
{
	with(frm)
    {
	    if(Action.value == 'Add')
		{
			if(!IsEmpty(bad_name, 'Please enter Badword.'))
			{
				return false;
			}
		}
		if(Action.value == 'Edit')
		{
			if(!IsEmpty(bad_name, 'Please enter Badword.'))
			{
				return false;
			}
		}
		
	   return true;
    }
}
function Edit_Click(badids)
{
	with(document.frmBadwd)
	{
		badword_id.value	= badids;
		Action.value		= 'Edit';
		submit();
	}
}
function Delete_Click(badids)
{
	with(document.frmBadwd)
	{
		if(confirm('Are you sure you want to delete Badword?'))
		{
			badword_id.value 	= badids;
			Action.value	= 'Delete';
			submit();
		}
	}
}
function DeleteChecked_Click()
{
	with(document.frmBadwd)
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
			
		if(confirm('Are you sure you want to delete selected Badwords?'))
		{
			Action.value 	= 'DeleteSelected';
			submit();
		}
	}
}