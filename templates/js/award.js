// JavaScript Document
function check_award(frm,loop_cnt)
{
	with(frm)
	{
		if(loop_cnt == 1)
		{
			if(elements['selected_user[]'].checked != true)
			{
				alert("Please pick up provider");
				return false;
			}
		}
		if(loop_cnt > 1)
		{
			x = 0;
			for(i=0; i < elements['selected_user[]'].length; i++)
			{
				if(elements['selected_user[]'][i].checked == true)
				{
					x = x + 1;
				}
			}
			if(x == 0)
			{
				alert("Please pick up provider");
				return false;
			}
		}
		return true;
	}
}
	