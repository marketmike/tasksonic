
//====================================================================================================
//	Function Name	:	Validate_Form
//----------------------------------------------------------------------------------------------------
/*function Validate_Form_SellerBuyer(frm)
{
	with(frm)
    {	
		
		if(!IsEmpty(buyers_slogan, 'Please enter Slogan For Buyer.'))
		{
			return false;
		}
		
		if(!IsEmpty(buyers_description, 'Please enter Description For Buyer.'))
		{
			return false;
		}
		
		if(!IsEmpty(seller_slogan, 'Please enter Slogan For Seller.'))
		{
			return false;
		}
		if(!IsEmpty(seller_description, 'Please enter Description For Seller.'))
		{
			return false;
		}
	}
	return true;

}
*/
function Delete_Image()
{
	with(document.frmSellerBuyer)
	{
		if(confirm('Are you sure you want to delete Image?'))
		{
			Action.value	= 'Delete';
			submit();
		}
	}
}

