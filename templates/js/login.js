function Validate_Login(frm)
{
	with(frm)
	{
		if(!IsEmpty(user_id, JS_UserName))
		{
			return false;
		}
		if(!IsEmpty(password, JS_Password))
		{
			return false;
		}
		return true;
	}
}