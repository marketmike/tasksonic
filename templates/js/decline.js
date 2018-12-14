function DeclineStatus_Click(catId,state)
{
	 with(document.frmdecline)
	 {
		 bid_id.value	= catId;
		 status.value 	= state;
		 Action.value	= 'ChangeStatus';
		 submit();
	 }
}
function Delete_Click(catId)
{
	 with(document.frmdecline)
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