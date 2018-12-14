// JavaScript Document
function Edit_Click(emailids)
{
	with(document.frmEmailManagment)
	{
		email_id.value	= emailids;
		Action.value	= 'Edit';
		submit();
	}
}
function Validate_Form(frm)
{
	with(frm)
    {	
		if(!IsEmpty(en_email_subject, 'Please enter Email Subject.'))
			{
				return false;
			}
		return true;
	}
}