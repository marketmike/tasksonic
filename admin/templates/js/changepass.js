function Form_Submit(frm)
{
	with(frm)
    {
		if(!IsEmpty(old_password, 'Please, enter the Old Password.'))
		{
			return false;
		}
		if(!IsEmpty(new_password1, 'Please, enter the New Password.'))
		{
			return false;
		}
		else if(!IsPassword(new_password1, 'Please enter valid password. It must consist of letters or letters followed by numbers,\n do not use any special character.'))
		{
			return false;
		}
		if(new_password1.value != new_password2.value)
		{
			alert("Please confirm your new password.");
			return false;
		}
		return true;
    }
}

function Form_Submit_Mail(frm)
{
	with(frm)
	{
		if(!IsEmail(newmail,'Please Enter valid email address'))
		{
			return false;
		}
	return true;
	}
}