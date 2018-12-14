function show_Category(ids,total)

{

	for(i = 0;i <= total; i++)

	{

		if(i == ids)

		{

			document.getElementById('homepage_projects_'+i).style.visibility = 'visible';

			document.getElementById('homepage_projects_'+i).style.display = 'block';



			//document.getElementById('td_id_'+i).style.color  = '#FFFFFF';

		}

		else

		{

			document.getElementById('homepage_projects_'+i).style.visibility = 'hidden';

			document.getElementById('homepage_projects_'+i).style.display = 'none';



			//document.getElementById('td_id_'+i).style.color = '#5C5C5C';

		}

	}

}

/*

function hide_Category(ids)

{

///// hide resume

	document.getElementById('subcat_'+ids).style.visibility = 'hidden';

	document.getElementById('subcat_'+ids).style.display = 'none';



///// hide hide link 

	document.getElementById('ExpandHide_'+ids).style.visibility = 'hidden';

	document.getElementById('ExpandHide_'+ids).style.display = '';



///// show show link

	document.getElementById('ExpandShow_'+ids).style.visibility = 'visible';

	document.getElementById('ExpandShow_'+ids).style.display = '';

}

*/









function Check_User(frm1)

{

	with(frm1)

	{

		if(!IsEmpty(user_id, JS_User_Id))

		{

			return false;

		}

		else if ((frm1.user_id.value.length < 3) || (frm1.user_id.value.length > 16) )

		{

			alert("User ID must be from 3 to 16 characters long.");

			frm1.user_id.focus();

			return (false);

		}

		if(!isNaN(frm1.user_id.value)) 

		   { 

			 alert("User ID must contain letters."); 

			 frm1.user_id.focus();

			 return (false); 

		   }

		else if(!isNaN(frm1.user_id.value.charAt(0))) 

		   { 

			 alert("User Name can't started with Number...."); 

			 frm1.user_id.focus();

			 return (false); 

		   }   

		   

		var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-";

		var checkStr = frm1.user_id.value;

		var allValid = true;

		for (i = 0;  i < checkStr.length;  i++)

		{

			ch = checkStr.charAt(i);

			for (j = 0;  j < checkOK.length;  j++)

			  if (ch == checkOK.charAt(j))

				break;

			if (j == checkOK.length)

			{

			  allValid = false;

			  break;

			}

		}   

		if (!allValid)

		{

			alert ("Your username has special characters. These are not allowed.\n Please remove them and try again.");

			frm1.user_id.focus();

			frm1.user_id.value="";

			return (false);

		}

		

		if(!IsEmail(email_id, JS_Email))

		{

			return false;

		}

		return true;

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

