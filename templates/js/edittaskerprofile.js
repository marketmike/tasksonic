// JavaScript Document
function Check_Details(frm)
{
	with(frm)
	{
		if(!IsEmpty(en_seller_slogan, JS_en_slogan))
		{
			return false;
		}
		if(company_logo.value != '')
		{
			if(!CheckFileType(company_logo, JS_Image))
			{
				return false; 
			}
		}
/*		if(Action.value == 'Add')
		{
			if(company_logo.value != '')
			{
				if(!CheckFileType(company_logo, JS_Image))
				{
					return false; 
				}
			}
		}
		if(Action.value == 'Edit')
		{
			if(company_logo.value != '')
			{
				if(!CheckFileType(company_logo, JS_Image))
				{
					return false; 
				}
			}
		}
*/		if(!IsEmpty(skill_name_1, JS_Skill_1))
		{
			return false;
		}
		if(skill_rate_1.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		if(!IsEmpty(skill_name_2, JS_Skill_1))
		{
			return false;
		}
		if(skill_rate_2.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		if(skill_name_3.value!='' && skill_rate_3.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		if(skill_name_4.value!='' && skill_rate_4.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		if(skill_name_5.value!='' && skill_rate_5.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		if(skill_name_6.value!='' && skill_rate_6.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		if(skill_name_7.value!='' && skill_rate_7.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		if(skill_name_8.value!='' && skill_rate_8.value == 0)
		{
			alert(JS_Skill_Rate_1);
			return false;
		}
		
		x = 0;
		for(i=0; i < elements['industry_id[]'].length; i++)
		{
			if(elements['industry_id[]'][i].checked == true)
			{
				x = x + 1;
			}
		}
		
		if(x == 0)
		{
			alert(JS_Indus);
			return false;
		}
		
		if(x > 5)
		{
			alert(JS_Cate);
			return false;
		}
		if(medic.checked == true)
		{
			if(mother_lang.value == '')
			{
				alert(JS_Mother_Lang);
				return false; 
			}
			if(lang_pairs.value == '')
			{
				alert(JS_Lang_Pairs);
				return false; 
			}
		}

	    return true;
	}
	
}

function Delete_Image(user_id)
{
	with(document.frmeditSeller)
	{
		if(confirm('Are you sure you want to delete Image?'))
		{
			User_Id.value 	= user_id;
			Action.value	= 'Delete';
			submit();
		}
	}
}
/*############################*/function prepareInputsForHints() {	var inputs = document.getElementsByTagName("input");	for (var i=0; i<inputs.length; i++){		// test to see if the hint span exists first		if (inputs[i].parentNode.getElementsByTagName("span")[0]) {			// the span exists!  on focus, show the hint			inputs[i].onfocus = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";			}			// when the cursor moves away from the field, hide the hint			inputs[i].onblur = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "none";			}		}	}	var inputs = document.getElementsByTagName("textarea");	for (var i=0; i<inputs.length; i++){		// test to see if the hint span exists first		if (inputs[i].parentNode.getElementsByTagName("span")[0]) {			// the span exists!  on focus, show the hint			inputs[i].onfocus = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";			}			// when the cursor moves away from the field, hide the hint			inputs[i].onblur = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "none";			}		}	}	var inputs = document.getElementsByTagName("file");	for (var i=0; i<inputs.length; i++){		// test to see if the hint span exists first		if (inputs[i].parentNode.getElementsByTagName("span")[0]) {			// the span exists!  on focus, show the hint			inputs[i].onfocus = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";			}			// when the cursor moves away from the field, hide the hint			inputs[i].onblur = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "none";			}		}	}			// repeat the same tests as above for selects	var selects = document.getElementsByTagName("select");	for (var k=0; k<selects.length; k++){		if (selects[k].parentNode.getElementsByTagName("span")[0]) {			selects[k].onfocus = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";			}			selects[k].onblur = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "none";			}		}	}	// repeat the same tests as above for selects	var selects = document.getElementsByTagName("checkbox");	for (var k=0; k<selects.length; k++){		if (selects[k].parentNode.getElementsByTagName("span")[0]) {			selects[k].onfocus = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";			}			selects[k].onblur = function () {				this.parentNode.getElementsByTagName("span")[0].style.display = "none";			}		}	}		}
//====================================================================================================
//	Function Name	:	show_Items
//----------------------------------------------------------------------------------------------------
/*function show_Items(id)
{
	alert(id);
	document.getElementById('show').style.visibility = 'visible';
	document.getElementById('show').style.display = 'block';
	
	
}*/

function show_Buyer(medic)
{
	if(document.getElementById('medic').checked == true)
	{
		document.getElementById('Buyer_Hide_Details').style.visibility = 'visible';
		document.getElementById('Buyer_Hide_Details').style.display = '';
	}
	else
	{
		document.getElementById('Buyer_Hide_Details').style.visibility = 'hidden';
		document.getElementById('Buyer_Hide_Details').style.display = 'none';
	}
	
//	document.getElementById('Buyer_Show').style.visibility = 'hidden';
//	document.getElementById('Buyer_Show').style.display = 'none';
	
	
}
function hide_Buyer(off)
{
	alert(off);
	document.getElementById('Buyer_Show').style.visibility = 'visible';
	document.getElementById('Buyer_Show').style.display = '';

	document.getElementById('Buyer_Hide_Details').style.visibility = 'hidden';
	document.getElementById('Buyer_Hide_Details').style.display = 'none';

	document.getElementById('Buyer_Hide').style.visibility = 'hidden';
	document.getElementById('Buyer_Hide').style.display = '';
	
		document.getElementById('off').style.visibility = 'visible';
	document.getElementById('off').style.display = '';

}