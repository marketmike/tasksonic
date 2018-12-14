//====================================================================================================
//	Function Name	:	Edit_Click()
//----------------------------------------------------------------------------------------------------
function Edit_Click(pageId)
{
	with(document.frmPage)
	{
		email_id.value		= pageId;
		Action.value		= 'Edit';
		submit();
	}
}
//====================================================================================================
//	Function Name	:	Validate_Form
//----------------------------------------------------------------------------------------------------
function Validate_Form_SubCat(frm)
{
	with(frm)
    {	
		
		if(Action.value == 'Add')
		{
			if(!IsEmpty(title_name, 'Please enter Title.'))
			{
				return false;
			}
			if(!IsEmpty(email_address, 'Please enter Email Address.'))
			{
				return false;
			}
		}
		if(Action.value == 'Edit')
		{
			if(!IsEmpty(mail_address, 'Please enter Email Address.'))
			{
				return false;
			}
		}
		return true;

	}
}

//====================================================================================================
//	Function Name	:	Edit_Click()
//----------------------------------------------------------------------------------------------------

function Edit_Click(catId)
{
	with(document.frmCountry)
	{
		country_id.value	= catId;
		Action.value		= 'Edit';
		submit();
	}
}
//====================================================================================================
//	Function Name	:	Delete_Click()
//----------------------------------------------------------------------------------------------------
function Delete_Click(catId)
{
	with(document.frmCountry)
	{
		if(confirm('Are you sure you want to delete country?'))
		{
			country_id.value 	= catId;
			Action.value	= 'Delete';
			submit();
		}
	}
}

//====================================================================================================
//	Function Name	:	DeleteChecked_Click()
//----------------------------------------------------------------------------------------------------
function DeleteChecked_Click()
{
	with(document.frmCountry)
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
			
		if(confirm('Are you sure you want to delete selected categories?'))
		{
			Action.value 	= 'DeleteSelected';
			submit();
		}
	}
}
//====================================================================================================
//	Function Name	:	ToggleStatus_Click()
//----------------------------------------------------------------------------------------------------
function ToggleStatus_Click(catId,state)
{
	 with(document.frmCategory)
	 {
		 cat_id.value	= catId;
		 status.value 	= state;
		 Action.value	= 'ChangeStatus';
		 submit();
	 }
}
