// JavaScript Document
function Check_Details_Violation(frm)
{
	with(frm)
	{
		if(your_email.value != '')
		{
			if(!IsEmail(your_email,JS_Email))
			{
				return false;
			}
		}
		if(violation_list.value == 0)
		{
			alert(JS_violation); 
			return false;
		}
		if(!IsEmpty(other_person_name, JS_Person))
		{
			return false;
		}
		if(!IsEmpty(url,JS_Url))
		{
			return false;
		}
		else if(!IsUrl(url,JS_Url_Text))
		{
			return false;
		}
		if(!IsEmpty(en_violation_details,JS_En_Violation))
		{
			return false;
		}
		return true;
	}
}