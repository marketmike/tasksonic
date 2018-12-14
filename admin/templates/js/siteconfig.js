function Form_Submit(frm)
{
	with(frm)
    {
			if(!IsEmpty(site_title, 'Please, enter your site title.'))
			{
				return false;
			}
			
			if(!IsEmpty(site_keyword, 'Please, enter your site keyworld.'))
			{
				return false;
			}
		
			if(!IsEmpty(site_description, 'Please, enter your site description.'))
			{
				return false;
			}
			
			if(!IsEmpty(fees_Taken_for_post_project, 'Please, enter project Post Deposite.'))
			{
				return false;
			}
			else if(isNaN(frm.fees_Taken_for_post_project.value))
			{
				alert("You can't enter letters for project Post Deposite");
				return false;
			}
			else if(fees_Taken_for_post_project.value < 0)
			{
				alert("You can't enter less then zero for project Post Deposite");
				return false;
			}
			
			if(!IsEmpty(project_post_deposite, 'Please, enter Minimum amount required in wallet to Post project.'))
			{
				return false;
			}
			else if(isNaN(frm.project_post_deposite.value))
			{
				alert("You can't enter letters for Minimum amount required in wallet to Post project");
				return false;
			}
			else if(project_post_deposite.value < 0)
			{
				alert("You can't enter less then zero for Minimum amount required in wallet to Post project");
				return false;
			}
			
			if(!IsEmpty(edit_bid, 'Please, enter Edit project.'))
			{
				return false;
			}
			else if(isNaN(frm.edit_bid.value))
			{
				alert("You can't enter letters for Edit project");
				return false;
			}
			else if(edit_bid.value < 0)
			{
				alert("You can't enter less then zero for Edit project");
				return false;
			}
			
			if(!IsEmpty(minimum_bid_place, 'Please, enter Minimum Amount needed to place Bid.'))
			{
				return false;
			}
			else if(isNaN(frm.minimum_bid_place.value))
			{
				alert("You can't enter letters for Minimum Amount needed to place Bid ");
				return false;
			}
			else if(minimum_bid_place.value < 0)
			{
				alert("You can't enter less then zero for Minimum Amount needed to place Bid ");
				return false;
			}
			
			if(!IsEmpty(urgent_project_fee, 'Please, enter Urgent project Fees.'))
			{
				return false;
			}
			else if(isNaN(frm.urgent_project_fee.value))
			{
				alert("You can't enter letters for Urgent project Fees");
				return false;
			}
			else if(urgent_project_fee.value < 0)
			{
				alert("You can't enter less then zero for Urgent project Fees");
				return false;
			}
			
			if(!IsEmpty(minimum_deposite_amount, 'Please, enter Minimum Deposite Amount.'))
			{
				return false;
			}
			else if(isNaN(frm.minimum_deposite_amount.value))
			{
				alert("You can't enter letters for Minimum Deposite Amount ");
				return false;
			}
			else if(minimum_deposite_amount.value < 0)
			{
				alert("You can't enter less then zero for Minimum Deposite Amount ");
				return false;
			}
			
			if(!IsEmpty(minimum_withdaw_amount, 'Please, enter Minimum Withdaw Amount.'))
			{
				return false;
			}
			else if(isNaN(frm.minimum_withdaw_amount.value))
			{
				alert("You can't enter letters for Minimum Withdaw Amount ");
				return false;
			}
			else if(minimum_withdaw_amount.value < 0)
			{
				alert("You can't enter less then zero for Minimum Withdaw Amount ");
				return false;
			}
			
			if(!IsEmpty(escrow_payment, 'Please, enter Escrow Payment.'))
			{
				return false;
			}
			else if(isNaN(frm.escrow_payment.value))
			{
				alert("You can't enter letters for Escrow Payment");
				return false;
			}
			else if(escrow_payment.value < 0)
			{
				alert("You can't enter less then zero for Escrow Payment");
				return false;
			}
			
			if(!IsEmpty(comm_from_buyer, 'Please, enter Commission From buyer.'))
			{
				return false;
			}
			else if(isNaN(frm.comm_from_buyer.value))
			{
				alert("You can't enter letters for Commission From buyer");
				return false;
			}
			else if(comm_from_buyer.value < 0)
			{
				alert("You can't enter less then zero for Commission From buyer");
				return false;
			}
			
			if(!IsEmpty(minimum_comm_buyer, 'Please, enter Minimun Commission From buyer.'))
			{
				return false;
			}
			else if(isNaN(frm.minimum_comm_buyer.value))
			{
				alert("You can't enter letters for Minimun Commission From buyer");
				return false;
			}
			else if(minimum_comm_buyer.value < 0)
			{
				alert("You can't enter less then zero for Minimun Commission From buyer");
				return false;
			}
			
			if(!IsEmpty(minimum_comm_buyer, 'Please, enter Commission From seller.'))
			{
				return false;
			}
			else if(isNaN(frm.minimum_comm_buyer.value))
			{
				alert("You can't enter letters for Commission From seller");
				return false;
			}
			else if(minimum_comm_buyer.value < 0)
			{
				alert("You can't enter less then zero for Commission From seller");
				return false;
			}
			
			if(!IsEmpty(minimum_comm_seller, 'Please, enter Minimun Commission From Seller.'))
			{
				return false;
			}
			else if(isNaN(frm.minimum_comm_seller.value))
			{
				alert("You can't enter letters for Minimun Commission From Seller");
				return false;
			}
			else if(minimum_comm_seller.value < 0)
			{
				alert("You can't enter less then zero for Minimun Commission From Seller");
				return false;
			}
			
			if(!IsEmpty(user_page_size, 'Please, enter Records Displayed per page at user side.'))
			{
				return false;
			}
			else if(isNaN(frm.user_page_size.value))
			{
				alert("You can't enter letters for Records Displayed per page at user side");
				return false;
			}
			else if(user_page_size.value < 0)
			{
				alert("You can't enter less then zero for Records Displayed per page at user side");
				return false;
			}
			
			if(!IsEmpty(premium_project_fees, 'Please, enter Premium project Fees.'))
			{
				return false;
			}
			else if(isNaN(frm.premium_project_fees.value))
			{
				alert("You can't enter letters for Premium project Fees");
				return false;
			}
			else if(premium_project_fees.value < 0)
			{
				alert("You can't enter less then zero for Premium project Fees");
				return false;
			}
/*			if(!IsEmpty(copyright_text, 'Please, enter your copyright text.'))
			{
				return false;
			}
			
			if(!IsEmpty(powered_by, 'Please, enter powered by text.'))
			{
				return false;
			}
*/		 return true;
    }
}

