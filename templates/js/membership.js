// JavaScript Document
function check_membership(frm,loop_cnt)
{
	with(frm)
	{
		if(loop_cnt == 1)
		{
			if(elements['selected_membership[]'].checked != true)
			{
				alert(JS_Member);
				return false;
			}
		}
		if(loop_cnt > 1)
		{
			x = 0;
			for(i=0; i < elements['selected_membership[]'].length; i++)
			{
				if(elements['selected_membership[]'][i].checked == true)
				{
					x = x + 1;
				}
			}
			if(x == 0)
			{
				alert(JS_Member_Check);
				return false;
			}
		}
		return true;
	}
}
	