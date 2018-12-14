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
			if(!IsEmpty(membership_name, 'Please, enter member name.'))
				{
					return false;
				}
			if(!IsEmpty(membership_time, "Please enter member Time."))
				{			
					return false;
				}
			else if(isNaN(membership_time.value))
				{
					alert("Please, enter proper member time"); 
					frm.membership_time.focus;
					return false;
				}	
			if(!IsEmpty(membership_fee, 'Please, enter member fees.'))
				{
					return false;
				}   
		
			return true;
    }
}
function Edit_Click(emailids)
{
	with(document.frmMemberShip)
	{
		membership_id.value	= emailids;
		Action.value	= 'Edit';
		submit();
	}
}
function Order_Click()
{
	with(document.frmMemberShip)
	{
		//membership_id.value = orderid;
		Action.value = 'Order';
		submit();
	}
}
function Button_Click(btn)
{
	with(document.frmMemberShip)
	{
		Submit.value = btn.value;
		for(i=0; i<category.length; i++)
		{
			display_order.value += category[i].value + ':';
		}
		submit();
	}
}
function UpDown_Click(direction)
{
	var list = document.frmMemberShip.category;
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
function Delete_Click(emailids)
{
	with(document.frmMemberShip)
	{
		if(confirm('Are you sure you want to delete Membership?'))
		{
			membership_id.value = emailids;
			Action.value	= 'Delete';
			submit();
		}
	}
}
function DeleteChecked_Click()
{
	with(document.frmMemberShip)
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
			
		if(confirm('Are you sure you want to delete selected Membership?'))
		{
			Action.value 	= 'DeleteSelected';
			submit();
		}
	}
}
function ToggleStatus_Click(memId,state)
{
	 with(document.frmMemberShip)
	 {
		 membership_id.value	= memId;
		 status.value 			= state;
		 Action.value			= 'ChangeStatus';
		 submit();
	 }
}