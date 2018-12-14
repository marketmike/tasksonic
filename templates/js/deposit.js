// JavaScript Document

function Check_Details(frm)

{

	with(frm)

	{

		if(!IsEmpty(amount,JS_Amount))

		{

			return false;

		}

		

		var checkOK = "0123456789.";

		var checkStr = frm.amount.value;

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

			alert (JS_Amount_no);

			frm.amount.focus();

			return false;

		}   

		

		if(parseFloat(amount.value) < parseFloat(JS_WC_POST_DEPOSIT))

		{

			alert(JS_Amount_gra+JS_WC_POST_DEPOSIT);

			frm.amount.focus();

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



function prepareInputsForHints() 

{

	var inputs = document.getElementsByTagName("input");

	for (var i=0; i<inputs.length; i++)

	{



		// test to see if the hint span exists first

		if (inputs[i].parentNode.getElementsByTagName("span")[0]) 

		{

			// the span exists!  on focus, show the hint

			inputs[i].onfocus = function () 

			{

				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";

			}

			// when the cursor moves away from the field, hide the hint

			inputs[i].onblur = function () 

			{

				this.parentNode.getElementsByTagName("span")[0].style.display = "none";

			}

		}

	}

	var textarea = document.getElementsByTagName("textarea");

	for (var i=0; i<textarea.length; i++)

	{



		// test to see if the hint span exists first

		if (textarea[i].parentNode.getElementsByTagName("span")[0]) 

		{

			// the span exists!  on focus, show the hint

			textarea[i].onfocus = function () 

			{

				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";

			}

			// when the cursor moves away from the field, hide the hint

			textarea[i].onblur = function () 

			{

				this.parentNode.getElementsByTagName("span")[0].style.display = "none";

			}

		}

	}

	

	// repeat the same tests as above for selects

	var selects = document.getElementsByTagName("select");

	for (var k=0; k<selects.length; k++)

	{

		if (selects[k].parentNode.getElementsByTagName("span")[0]) 

		{

			selects[k].onfocus = function () 

			{

				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";

			}

			selects[k].onblur = function () 

			{

				this.parentNode.getElementsByTagName("span")[0].style.display = "none";

			}

		}

	}



}

//addLoadEvent(prepareInputsForHints);



