// JavaScript Document
function Edit_Click(template1)
{
	with(document.frmEmailTemplate)
	{
		template_name.value	= template1;
		Action.value		= 'Edit';
		submit();
	}
}