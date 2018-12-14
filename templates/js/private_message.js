// JavaScript Document
function Check_Details(frm)
{
	with(frm)
	{
		if(!IsEmpty(en_message_desc, JS_English_Msg))
		{
			return false;
		}
		return true;
	}
}

function back1(redirect1)
{
	with(document.frmprivatemsg)
	{
		id.value	 = redirect1;
		Action.value = 'Close';
		submit();
	}
}