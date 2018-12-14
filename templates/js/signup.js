function Check_Details(frmSignup)

{

	with(frmSignup)

	{

		if(!IsEmpty(user_id, JS_User_ID))

		{

			return false;

		}

		else if ((user_id.value.length < 5) || (user_id.value.length > 16) )

		{

			alert(JS_Check_User_Login);

			user_id.focus();

			return (false);

		}

		if(!isNaN(user_id.value)) 

		   { 

			 alert(JS_Check_User_Lenght); 

			 user_id.focus();

			 return (false); 

		   }



		var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-";

		var checkStr = user_id.value;

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

			alert (JS_Check_Special_Cha);

			user_id.focus();

			return false;

		}   

		if(!IsEmpty(password, JS_Passwd))

		{

			return false;

		}
		else if ((password.value.length < 8) || (password.value.length > 16) )

		{

			alert(JS_Password_Short);

			password.focus();

			return (false);

		}		
		var checkOK2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_ ? + $ ! # ~ |";

		var checkStr2 = password.value;

		var allValid2 = true;

		for (i = 0;  i < checkStr2.length;  i++)

		{

			ch = checkStr2.charAt(i);

			for (j = 0;  j < checkOK2.length;  j++)

			  if (ch == checkOK2.charAt(j))

				break;

			if (j == checkOK2.length)

			{

			  allValid2 = false;

			  break;

			}

		}   

		if (!allValid2)

		{

			alert (JS_Check_Special_Cha2);

			password.focus();

			return false;

		} 
		if(!IsEmpty(password_retype, JS_Re_Passwd))

		{

			return false;

		}

		if(password.value != password_retype.value)

		{

			alert(JS_Confirm);

			return false;

		}
		
		if(!IsEmpty(mem_fname, JS_Fname))

		{

			return false;

		}

		if(!IsEmpty(mem_lname, JS_Lname))

		{

			return false;

		}

		var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;	
		var phone = mem_phone.value;
		
		if(!IsEmpty(mem_phone, JS_Phone))

		{

			return false;

		}

		else if (phoneNumberPattern.test(phone)) {
		
		} else {
			alert(JS_Phone1);

			mem_phone.focus;

			return false;
		}

		if(mem_mobile.value != '')

		{
		var mobile = mem_mobile.value;
			if (phoneNumberPattern.test(mobile)) {
				
				} else {
					alert(JS_Mobile);

					mem_mobile.focus;

					return false;
				}

		}

		if(!IsEmpty(mem_address, JS_Address))

		{

			return false;

		}

		if(!IsEmpty(mem_city, JS_City))

		{

			return false;

		}

		

		if(mem_country.value == 0)

		{

			alert(JS_Country); 

			return false;

		}



		if(!IsEmail(mem_email, JS_Valid_Mail))

		{

			return false;

		}
		

		


		if ((check_buyer.checked == false) && (check_seller.checked == false) )

		{

			alert(JS_Check_Role);
			return (false);

		}
		if ((check_buyer.value == '') && (check_seller.value == '') )

		{

			alert(JS_Check_Role);
			return (false);

		}		
		
		x = 0;

		for(i=0; i < elements['cat_prod[]'].length; i++)

		{

			if(elements['cat_prod[]'][i].checked == true)

			{

				x = x + 1;

			}

		}

		

		if(x == 0)

		{

			alert(JS_Areas);

			return false;

		}

		

		if(x > 5)

		{

			alert('You can not select more then five areas of Interest/Expertise.');

			return false;

		}		
		

		if(agree.checked == false )

		{

			alert(JS_Terms);

			return false;

		}

		return true;

	}
return true;
}





function View_Terms()

{

	popupWindowURL('page.php?pid=2&pop_up=true','','900','500','','true','true');	

}





/*

############################

*/

function addLoadEvent(func) {

    var oldonload = window.onload;

  if (typeof window.onload != 'function') {

    window.onload = func;

  } else {

    window.onload = function() {

      oldonload();

      func();

    }

  }

}

function prepareInputsForHints() {
	var inputs = document.getElementsByTagName("input");
	for (var i=0; i<inputs.length; i++){
		// test to see if the hint span exists first
		if (inputs[i].parentNode.getElementsByTagName("span")[0]) {
			// the span exists!  on focus, show the hint
			inputs[i].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			// when the cursor moves away from the field, hide the hint
			inputs[i].onblur = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "none";
			}
		}
	}
	var inputs = document.getElementsByTagName("testarea");
	for (var i=0; i<inputs.length; i++){
		// test to see if the hint span exists first
		if (inputs[i].parentNode.getElementsByTagName("span")[0]) {
			// the span exists!  on focus, show the hint
			inputs[i].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			// when the cursor moves away from the field, hide the hint
			inputs[i].onblur = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "none";
			}
		}
	}	
	// repeat the same tests as above for selects
	var selects = document.getElementsByTagName("select");
	for (var k=0; k<selects.length; k++){
		if (selects[k].parentNode.getElementsByTagName("span")[0]) {
			selects[k].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			selects[k].onblur = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "none";
			}
		}
	}

	
}

function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}