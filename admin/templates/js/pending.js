// JavaScript Document
function Edit_Click(pending_id)
{
	with(document.frmPaypalRequest)
	{
		pk_id.value	= pending_id;
		Action.value	= 'Edit';
		submit();
	}
}

function Edit_Click2(pending_id)
{
	with(document.frmMoneybookerRequest)
	{
		mpd_id.value	= pending_id;
		Action.value	= 'Edit';
		submit();
	}
}