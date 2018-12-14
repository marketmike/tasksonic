function show_Resume(ids)

{

/////show resume

	document.getElementById('subcat_'+ids).style.visibility = 'visible';

	document.getElementById('subcat_'+ids).style.display = '';



/////show hide link

	document.getElementById('ExpandHide_'+ids).style.visibility = 'visible';

	document.getElementById('ExpandHide_'+ids).style.display = '';



///// hide show link

	document.getElementById('ExpandShow_'+ids).style.visibility = 'hidden';

	document.getElementById('ExpandShow_'+ids).style.display = 'none';

	

}

function hide_Resume(ids)

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



function Check_Details(frm)

{

	with(frm)

	{

		if(!IsEmpty(en_seller_title, JS_En_Title))

		{

			return false;

		}

		if(!IsEmpty(en_seller_description, JS_En_Desc))

		{

			return false;

		}

		if(Action.value == 'Add')

		{

			if(!IsEmpty(sample_file, JS_Image))

			{

				return false;

			}

			else if(!CheckFileType(sample_file, JS_Image_Desc))

			{

				return false; 

			}

		}

		if(Action.value == 'Edit')

		{

			if(image.value == '' && sample_file.value == '')

			{

				alert(JS_Image);

				return false;

			}

			if(sample_file.value != '' && image.value == '')

			{

				if(!CheckFileType(sample_file, JS_Image_Desc))

				{

					return false; 

				}

			}

		}

		x = 0;

		for(i=0; i < elements['cat_prod[]'].length; i++)

		{

			if(elements['cat_prod[]'][i].checked == true)

			{

				x = x + 1;

			}

		}

		

		if(x==0)

		{

			alert("Please Select atleast one Category");

			return false;

		}

		if(x > 3)

		{

			alert("You can select maximum 3 categories");

			return false;

		}

     return true;

	}

}



function Delete_Click(portfolio_id1)

{

	with(document.frmportfolio)

	{

		if(confirm('Are you sure you want to delete porfolio?'))

		{

			portfolio_id.value 	= portfolio_id1;

			Action.value	= 'Delete';

			submit();

		}

	}

}

function Button_Click(btn)

{

	with(document.frmPortfolio)

	{

		Submit.value = btn.value;

		for(i=0; i<category.length; i++)

		{

			display_order.value += category[i].value + ':';

		}

		submit();

	}

}

function UpDown_Click(direction)

{

	var list = document.frmPortfolio.category;

	var tmpVal;

	var tmpText;



	if(list.selectedIndex==-1)

	{

		alert("Select the portfolio title you want to move.");

		return;

	}



	if(!list.length) return;

	

	if(direction==1)

	{

		if(list.selectedIndex == list.length-1) return;

	}

	else

		if(list.selectedIndex == 0) return;



	tmpVal 	= list.options[list.selectedIndex+direction].value;

	tmpText	= list.options[list.selectedIndex+direction].text;



	list.options[list.selectedIndex+direction].value 	= list.options[list.selectedIndex].value;

	list.options[list.selectedIndex+direction].text 	= list.options[list.selectedIndex].text;



	list.options[list.selectedIndex].value 	= tmpVal;

	list.options[list.selectedIndex].text 	= tmpText;



	list.selectedIndex += direction;

}



function Order_Click(catId)

{

	with(document.frmportfolio)

	{

		portfolio_id.value = catId;

		Action.value = 'Order';

		submit();

	}

}


function DeleteChecked_Click(portfolioId)
{
	
	with(document.frmportfolio)
	{
		var flg=false;
		
		if(document.getElementsByName('checkboxgroup[]').length)
		{
			for(i=0; i < document.getElementsByName('checkboxgroup[]').length; i++)
			{
				if(document.getElementsByName('checkboxgroup[]')[i].checked)
					flg = true;
			}
		}
		else
		{
			if(document.getElementsByName('checkboxgroup[]').checked)
				flg = true;
		}

		if(!flg)
		{
			alert('Please select the record you want to delete.');
			return false;
		}
		var msg = confirm('Are you sure you want to delete selected records?');	
		if(msg)
		{
			Action.value   = 'DeleteSelected';
			portfolio_id.value = portfolioId;
			submit();
		}
		
	}
}

function Delete_Image(user_id,portfolio_id2)

{

	with(document.frmeditSeller)

	{

		if(confirm('Are you sure you want to delete Image?'))

		{

			User_Id.value 	= user_id;

			pro_id.value 	= portfolio_id2;

			Action.value	= 'Delete';

			submit();

		}

	}

}

function cancel()

 {

	  with(document.frmeditSeller)

		{

			if(Action.value == 'Edit')

			{

				if(image.value == '' && sample_file.value == '')

				{

					alert(JS_Image);

					return false;

				}

				if(sample_file.value != '' && image.value == '')

				{

					if(!CheckFileType(sample_file, JS_Image_Desc))

					{

						return false; 

					}

				}

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



