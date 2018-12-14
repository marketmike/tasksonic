function Edit_Click(catId)
{
	with(document.frmNewPm)
	{
			pm_id.value 	 = catId;
			Action.value	 = 'Edit';
			submit();
	}
}
