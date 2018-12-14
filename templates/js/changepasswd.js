// JavaScript Document

function Form_Submit(frmChangePass)

{

	with(frmChangePass)

    {

		if(!IsEmpty(old_password, JS_Old_Password))

		{

			return false;

		}

		if(!IsEmpty(new_password1, JS_New_Password))

		{

			return false;

		}
		
		else if ((new_password1.value.length < 8) || (new_password1.value.length > 16) )

		{

			alert(JS_Password_Short);

			password.focus();

			return (false);

		}		

		if(new_password1.value != new_password2.value)

		{
            new_password2.focus();
			alert(JS_Confirm_Password);

			return false;

		}
		var checkOK2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_ ? + $ ! # ~ |";

		var checkStr2 = new_password1.value;

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

		return true;

    }

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

function addLoadEvent2(func) {
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
	// repeat the same tests as above for textarea
	var textarea = document.getElementsByTagName("textarea");
	for (var k=0; k<selects.length; k++){
		if (textarea[k].parentNode.getElementsByTagName("span")[0]) {
			textarea[k].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			textarea[k].onblur = function () {
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

addLoadEvent2(prepareInputsForHints);