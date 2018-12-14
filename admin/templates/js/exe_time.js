//====================================================================================================
//	Function Name	:	Validate_Form
//----------------------------------------------------------------------------------------------------
function Validate_Form(frm)
{
	with(frm)
    {	
		
		if(Action.value == 'Add')
		{
			if(!IsEmpty(en_exe_name, 'Please enter Execution Time.'))
			{
				return false;
			}
		}
		if(Action.value == 'Edit')
		{
			if(!IsEmpty(exe_name, 'Please enter Execution Time.'))
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
	with(document.frmExecution)
	{
		exe_id.value	= catId;
		Action.value	= 'Edit';
		submit();
	}
}
//====================================================================================================
//	Function Name	:	Delete_Click()
//----------------------------------------------------------------------------------------------------
function Delete_Click(catId)
{
	with(document.frmExecution)
	{
		if(confirm('Are you sure you want to delete Execution Time?'))
		{
			exe_id.value 		= catId;
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
	with(document.frmExecution)
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
			
		if(confirm('Are you sure you want to delete selected Execution Time?'))
		{
			Action.value 	= 'DeleteSelected';
			submit();
		}
	}
}
function Order_Click()
{
	with(document.frmExecution)
	{
		Action.value = 'Order';
		submit();
	}
}

function Button_Click(btn)
{
	with(document.frmExecution)
	{
		Submit.value = btn.value;
		for(i=0; i<category.length; i++)
			display_order.value += category[i].value + ':';
		submit();
	}
}
function UpDown_Click(direction)
{
	var list = document.frmExecution.category;
	var tmpVal;
	var tmpText;

	if(list.selectedIndex==-1)
	{
		alert("Select the page you want to move.");
		return;
	}

	if(!list.length) return;
	
	if(direction==1)
	{
		if(list.selectedIndex == list.length-1) return;
	}
	else
		if(list.selectedIndex == 0) return;

	tmpVal 	= list.options[list.selectedIndex+direction].value;
	tmpText	= list.options[list.selectedIndex+direction].text;

	list.options[list.selectedIndex+direction].value 	= list.options[list.selectedIndex].value;
	list.options[list.selectedIndex+direction].text 	= list.options[list.selectedIndex].text;

	list.options[list.selectedIndex].value 	= tmpVal;
	list.options[list.selectedIndex].text 	= tmpText;

	list.selectedIndex += direction;
}
