// JavaScript Document
function Check_Details(frm)
{
	with(frm)
	{
/*		if(!IsEmpty(user_id, JS_User_ID))
		{
			return false;
		}
*/		if(!IsEmail(mem_email, JS_Valid_Mail))
		{
			return false;
		}
		return true;
	}
}
