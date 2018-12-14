// JavaScript Document
function show_Resume(ids)
{
/////show resume
	document.getElementById('subcat_'+ids).style.visibility = 'visible';
	document.getElementById('subcat_'+ids).style.display = '';

/////show hide link
	document.getElementById('ExpandHide_'+ids).style.visibility = 'visible';
	document.getElementById('ExpandHide_'+ids).style.display = '';

///// hide show link
	document.getElementById('ExpandShow_'+ids).style.visibility = 'hidden';
	document.getElementById('ExpandShow_'+ids).style.display = 'none';
	
}
function hide_Resume(ids)
{
///// hide resume
	document.getElementById('subcat_'+ids).style.visibility = 'hidden';
	document.getElementById('subcat_'+ids).style.display = 'none';

///// hide hide link 
	document.getElementById('ExpandHide_'+ids).style.visibility = 'hidden';
	document.getElementById('ExpandHide_'+ids).style.display = '';

///// show show link
	document.getElementById('ExpandShow_'+ids).style.visibility = 'visible';
	document.getElementById('ExpandShow_'+ids).style.display = '';
}
function Edit_Click(proid)
{
	with(document.frmProList)
	{
		project_id.value	= proid;
		Action.value		= 'Edit';
		submit();
	}
}

//====================================================================================================
//	Function Name	:	Delete_Click()
//----------------------------------------------------------------------------------------------------
function Mail_Click(catId)
{
	with(document.frmProList)
	{
		if(confirm('Are you sure you want to email the Task Owner?'))
		{
			project_id.value 	= catId;
			Action.value	= 'Mail';
			submit();
		}
	}
}

//====================================================================================================
//	Function Name	:	Delete_Click()
//----------------------------------------------------------------------------------------------------

function Delete_Mail_Click(projectid)
{
	with(document.frmProList)
	{
		if(confirm('Are you sure you want to delete task and mail task owner?'))
		{
			project_id.value 	= projectid;
			Action.value	= 'Delete_And_Mail';
			submit();
		}
	}
}

//====================================================================================================
//	Function Name	:	DeleteChecked_Click()
//----------------------------------------------------------------------------------------------------
function DeleteChecked_Click()
{
	with(document.frmProList)
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
			
		if(confirm('Are you sure you want to delete selected projects?'))
		{
			Action.value 	= 'DeleteSelected';
			submit();
		}
	}
}
function Check_Details(frm)
{
	with(frm)
	{
		x = 0;
		for(i=0; i < elements['cat_prod[]'].length; i++)
		{
			if(elements['cat_prod[]'][i].checked == true)
			{
				x = x + 1;
			}
		}
		if(x > 5)
		{
			alert("You can select maximum 5 categories");
			return false;
		}
		if(!IsEmpty(title, "Please enter Task Title"))
		{
			return false;
		}
		if(!IsEmpty(desc, "Please enter Task Description"))
		{
			return false;
		}
		return true;
	}
}
