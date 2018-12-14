// JavaScript Document
function Check_Details(frm)
{
	with(frm)
	{
		if(!IsEmpty(email_address, "Please enter an email address"))
		{
			return false;
		}
		else if(!IsEmail(email_address, "Please check email address"))
		{
			return false;
		}
		if(!IsEmpty(Comment, "Please enter your comments"))
		{
			return false;
		}
		return true;
	}
}