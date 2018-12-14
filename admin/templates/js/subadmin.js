//====================================================================================================
//	Function Name	:	Validate_Form
//----------------------------------------------------------------------------------------------------
function Validate_Form(frm)
{
	with(frm)
    {	
		
		if(Action.value == 'Add')
		{
			if(!IsEmpty(user_login_id, 'Please enter User Login Id.'))
			{
				return false;
			}
			if(!IsEmpty(user_passwd, 'Please enter Password.'))
			{
				return false;
			}
		}
		return true;
	}
}

//====================================================================================================
//	Function Name	:	Delete_Click()
//----------------------------------------------------------------------------------------------------
function Delete_Click(catId)
{
	with(document.frmSubadmin)
	{
		if(confirm('Are you sure you want to delete Subadmin?'))
		{
			user_auth_id.value 		= catId;
			Action.value		= 'Delete';
			submit();
		}
	}
}

//====================================================================================================
//	Function Name	:	DeleteChecked_Click()
//----------------------------------------------------------------------------------------------------
function DeleteChecked_Click()
{
	with(document.frmSubadmin)
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
			
		if(confirm('Are you sure you want to delete selected Subadmin?'))
		{
			Action.value 	= 'DeleteSelected';
			submit();
		}
	}
}