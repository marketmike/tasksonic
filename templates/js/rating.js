// JavaScript Document
function Check_Details(frm)
{
	with(frm)
	{
		if(!IsEmpty(en_comm,JS_Comment))
		{
			return false;
		}
		return true;
	}
}