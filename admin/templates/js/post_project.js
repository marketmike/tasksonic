// JavaScript Document
function Check_Details(frm)
{
	with(frm)
	{
		x = 0;
		for(i=0; i < elements['cat_prod[]'].length; i++)
		{
			if(elements['cat_prod[]'][i].checked == true)
			{
				x = x + 1;
			}
		}
		if(x > 5)
		{
			alert(JS_Cats);
			return false;
		}
		if(!IsEmpty(it_project_title, JS_it_title))
		{
			return false;
		}
		if(!IsEmpty(it_project_description, JS_it_dec))
		{
			return false;
		}
		if(!IsEmpty(en_project_title, JS_en_title))
		{
			return false;
		}
		if(!IsEmpty(en_project_description, JS_en_dec))
		{
			return false;
		}
		if(agree1.checked == false )
		{
			alert(JS_Term);
			return false;
		}
		return true;
	}
}

function View_Terms()
{
	popupWindowURL('page.php?pid=7&pop_up=true','','900','500','','true','true');	
}
function View_Terms1()
{
	popupWindowURL('page.php?pid=2&pop_up=true','','900','500','','true','true');		
}

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
