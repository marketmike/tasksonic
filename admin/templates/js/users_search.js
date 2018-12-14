function View_Click(catId)
{
	with(document.frmSearchUsers)
	{
		user_auth_id.value	= catId;
		Action.value	= 'View';
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