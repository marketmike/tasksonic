function Search(search_user)
{
	with(document.frmUsers)
	{
		Action.value='Search';
		submit();
	}
}
function Edit_Click(catId)
{
	with(document.frmUsers)
	{
		user_auth_id.value	= catId;
		Action.value	= 'Edit';
		submit();
	}
}

function View_Click(catId)
{
	with(document.frmUsers)
	{
		user_auth_id.value	= catId;
		Action.value	= 'View';
		submit();
	}
}

function Mail_Click(catId)
{
	with(document.frmUsers)
	{
		user_auth_id.value	= catId;
		Action.value	= 'Send_Mail';
		submit();
	}
}
//====================================================================================================
//	Function Name	:	Delete_Click()
//----------------------------------------------------------------------------------------------------

function Mail_To_ALL()
{
	with(document.frmUsers)
	{
		var flg=false;

		if(document.all['cat_prod[]'].length)
		{
			for(i=0; i < document.all['cat_prod[]'].length; i++)
			{
				if(document.all['cat_prod[]'][i].checked)
					flg = true;
			}
		}
		else
		{
			if(document.all['cat_prod[]'].checked)
				flg = true;
		}

		if(!flg)
		{
			alert('Please select the record you want to send mail.');
			return false;
		}
			
/*		if(confirm('Are you sure you want to delete selected Experience Year?'))
		{
*/			Action.value 	= 'MailSelected';
			submit();
	//	}
	}
}
//====================================================================================================
//	Function Name	:	Delete_Click()
//----------------------------------------------------------------------------------------------------
function Delete_Click(catId)
{
	with(document.frmUsers)
	{
		if(confirm('Are you sure you want to delete ?'))
		{
			user_auth_id.value 	= catId;
			Action.value	= 'Delete';
			submit();
		}
	}
}


function Check_Details(frm)
{
	with(frm)
	{
		if(!IsEmpty(subject, "Please enter Subject."))
		{
			frm.subject.focus();
			return false;
		}
		if(!IsEmpty(content, "Please enter content."))
		{
			frm.content.focus(); 
			return false;
		}
		return true;
	}
}
function ToggleStatus_Click(catId,state)
{
	 with(document.frmUsers)
	 {
		 user_auth_id.value	= catId;
		 status.value 	= state;
		 Action.value	= 'ChangeStatus';
		 submit();
	 }
}
function ToggleStatus_Click_Special(catId,state)
{
	 with(document.frmUsers)
	 {
		 user_auth_id.value	= catId;
		 yes_no.value 	= state;
		 Action.value	= 'ChangeStatus_SpecailUser';
		 submit();
	 }
}

function show_Buyer()
{
	document.getElementById('Buyer_Hide').style.visibility = 'visible';
	document.getElementById('Buyer_Hide').style.display = '';
	
	document.getElementById('Buyer_Hide_Details').style.visibility = 'visible';
	document.getElementById('Buyer_Hide_Details').style.display = '';

	document.getElementById('Buyer_Show').style.visibility = 'hidden';
	document.getElementById('Buyer_Show').style.display = 'none';
	
}
function hide_Buyer()
{
	document.getElementById('Buyer_Show').style.visibility = 'visible';
	document.getElementById('Buyer_Show').style.display = '';

	document.getElementById('Buyer_Hide_Details').style.visibility = 'hidden';
	document.getElementById('Buyer_Hide_Details').style.display = 'none';

	document.getElementById('Buyer_Hide').style.visibility = 'hidden';
	document.getElementById('Buyer_Hide').style.display = '';
}

function show_Seller()
{
	document.getElementById('Seller_Hide').style.visibility = 'visible';
	document.getElementById('Seller_Hide').style.display = '';
	
	document.getElementById('Seller_Hide_Details').style.visibility = 'visible';
	document.getElementById('Seller_Hide_Details').style.display = '';

	document.getElementById('Seller_Show').style.visibility = 'hidden';
	document.getElementById('Seller_Show').style.display = 'none';
	
}
function hide_Seller()
{
	document.getElementById('Seller_Show').style.visibility = 'visible';
	document.getElementById('Seller_Show').style.display = '';

	document.getElementById('Seller_Hide_Details').style.visibility = 'hidden';
	document.getElementById('Seller_Hide_Details').style.display = 'none';

	document.getElementById('Seller_Hide').style.visibility = 'hidden';
	document.getElementById('Seller_Hide').style.display = '';
}

function show_Seller_Protfolio()
{
	document.getElementById('Seller_Protfolio_Hide').style.visibility = 'visible';
	document.getElementById('Seller_Protfolio_Hide').style.display = '';
	
	document.getElementById('Seller_Protfolio_Hide_Details').style.visibility = 'visible';
	document.getElementById('Seller_Protfolio_Hide_Details').style.display = '';

	document.getElementById('Seller_Protfolio_Show').style.visibility = 'hidden';
	document.getElementById('Seller_Protfolio_Show').style.display = 'none';
	
}
function hide_Seller_Protfolio()
{
	document.getElementById('Seller_Protfolio_Show').style.visibility = 'visible';
	document.getElementById('Seller_Protfolio_Show').style.display = '';

	document.getElementById('Seller_Protfolio_Hide_Details').style.visibility = 'hidden';
	document.getElementById('Seller_Protfolio_Hide_Details').style.display = 'none';

	document.getElementById('Seller_Protfolio_Hide').style.visibility = 'hidden';
	document.getElementById('Seller_Protfolio_Hide').style.display = '';
}
function show_Transcation()
{
	document.getElementById('Transcation_Hide').style.visibility = 'visible';
	document.getElementById('Transcation_Hide').style.display = '';
	
	document.getElementById('Transcation_Hide_Details').style.visibility = 'visible';
	document.getElementById('Transcation_Hide_Details').style.display = '';

	document.getElementById('Transcation_Show').style.visibility = 'hidden';
	document.getElementById('Transcation_Show').style.display = 'none';
	
}
function hide_Transcation()
{
	document.getElementById('Transcation_Show').style.visibility = 'visible';
	document.getElementById('Transcation_Show').style.display = '';

	document.getElementById('Transcation_Hide_Details').style.visibility = 'hidden';
	document.getElementById('Transcation_Hide_Details').style.display = 'none';

	document.getElementById('Transcation_Hide').style.visibility = 'hidden';
	document.getElementById('Transcation_Hide').style.display = '';
}
function show_Deposit()
{
	document.getElementById('Deposit_Hide').style.visibility = 'visible';
	document.getElementById('Deposit_Hide').style.display = '';
	
	document.getElementById('Deposit_Hide_Details').style.visibility = 'visible';
	document.getElementById('Deposit_Hide_Details').style.display = '';

	document.getElementById('Deposit_Show').style.visibility = 'hidden';
	document.getElementById('Deposit_Show').style.display = 'none';
	
}
function hide_Deposit()
{
	document.getElementById('Deposit_Show').style.visibility = 'visible';
	document.getElementById('Deposit_Show').style.display = '';

	document.getElementById('Deposit_Hide_Details').style.visibility = 'hidden';
	document.getElementById('Deposit_Hide_Details').style.display = 'none';

	document.getElementById('Deposit_Hide').style.visibility = 'hidden';
	document.getElementById('Deposit_Hide').style.display = '';
}
function show_Withdraw()
{
	document.getElementById('Withdraw_Hide').style.visibility = 'visible';
	document.getElementById('Withdraw_Hide').style.display = '';
	
	document.getElementById('Withdraw_Hide_Details').style.visibility = 'visible';
	document.getElementById('Withdraw_Hide_Details').style.display = '';

	document.getElementById('Withdraw_Show').style.visibility = 'hidden';
	document.getElementById('Withdraw_Show').style.display = 'none';
	
}
function hide_Withdraw()
{
	document.getElementById('Withdraw_Show').style.visibility = 'visible';
	document.getElementById('Withdraw_Show').style.display = '';

	document.getElementById('Withdraw_Hide_Details').style.visibility = 'hidden';
	document.getElementById('Withdraw_Hide_Details').style.display = 'none';

	document.getElementById('Withdraw_Hide').style.visibility = 'hidden';
	document.getElementById('Withdraw_Hide').style.display = '';
}