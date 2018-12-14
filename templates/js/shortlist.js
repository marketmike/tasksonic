function ToggleStatus_Click(catId,state)

{

	 with(document.frmshortlist)

	 {

		 bid_id.value	= catId;

		 status.value 		= state;

		 Action.value	= 'ChangeStatus';

		 submit();

	 }

}

function DeclineStatus_Click(catId,state)

{

	 with(document.frmshortlist)

	 {

		 bid_id.value  	= catId;

		 status.value 	= state;

		 Action.value	= 'DeclineStatus';

		 alert(bid_id.value);

		 alert(status.value);

		 alert(Action.value);

		 submit();

	 }

}

function Delete_Click(catId)

{

	 with(document.frmshortlist)

	 {

		 bid_id.value  	= catId;

		 Action.value	= 'Delete';

		 submit();

	 }

}

function chk_user(userId)

{

	if(userId != '')

	{

		return true;

	}

	else

	{

		alert("Please, First Login.")

		return false;

	}

}

function chk_user_1(userId, url)
{
	if(userId != '')
	{
		document.location = url;
		return true;
	}
	else
	{
		alert("Please, First Login.")
		return false;
	}

}