function Form_Submit(frm)
{
	with(frm)
    {
		if(!IsEmpty(free_portfolio, 'Please, enter Portfolio available In Free.'))
		{
			return false;
		}
		else if(isNaN(free_portfolio.value))
		{
			alert('Please enter valid Number.');
			free_portfolio.focus;
			return false;
		}
		
		if(!IsEmpty(premium_portfolio, 'Please, enter Portfolio available In Premium.'))
		{
			return false;
		}
		else if(isNaN(premium_portfolio.value))
		{
			alert('Please enter valid Number.');
			premium_portfolio.focus;
			return false;
		}
	    return true;
    }
}

