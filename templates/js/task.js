function ToggleStatus_Undo_Click(catId,state)

{

	 with(document.frmproject)

	 {

		 bid_id.value	= catId;

		 status.value 	= state;

		 Action.value	= 'ChangeStatusundo';

		 submit();

	 }

}

function ToggleStatus_Click(catId,state)

{

	 with(document.frmproject)

	 {

		 bid_id.value  	= catId;

		 status.value 	= state;

		 Action.value	= 'ChangeStatus';

		 submit();

	 }

}

function DeclineStatus_Click(catId,state)

{

	 with(document.frmproject)

	 {

		 bid_id.value  	= catId;

		 status.value 	= state;

		 Action.value	= 'DeclineStatus';

		 submit();

	 }

}

function Delete_Click(catId)

{

	 with(document.frmproject)

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