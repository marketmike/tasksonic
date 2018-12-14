function addTextEvent(func) {

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



function prepareInputsForTextBox() 

{

	var inputs = document.getElementsByTagName("input");

	for (var i=0; i<inputs.length; i++)

	{



		inputs[i].onfocus = function () 

		{

			this.className = 'textinputHovered';

		}

		// when the cursor moves away from the field, hide the hint

		inputs[i].onblur = function () 

		{

			this.className = 'textinput';

		}

	}

	var textarea = document.getElementsByTagName("textarea");

	for (var i=0; i<textarea.length; i++)

	{



		// the span exists!  on focus, show the hint

		textarea[i].onfocus = function () 

		{

			this.className = 'textinputHovered';

		}

		// when the cursor moves away from the field, hide the hint

		textarea[i].onblur = function () 

		{

			this.className = 'textinput';

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

				this.className = 'textinputHovered';

			}

			selects[k].onblur = function () 

			{

				this.className = 'textinput';

			}

		}

	}



}



function Language_Type(lang)

{

	document.forms[0].Language_Types.value = lang;

	document.forms[0].action = window.location.href;

	document.forms[0].submit();

}



function Rates_PopUp()

{

	popupWindowURL('rates.php','','400','400','','true','true');	

}



function ReportViolation_Click(frms,user_login_id,reportedby)

{

	with(frms)

	{

		if(confirm('Are you sure you want to report this user?'))

		{

//			login_id.value 	= user_login_id;

//			Action.value	= 'violate';

			location.href = 'violate_user.php?user_id='+user_login_id+'&reportedby='+reportedby+'&Action=violate';

		}

	}

}

function popupWindowURL(url, winname,  w, h, menu, resize, scroll) {



    var x = (screen.width-w)/2;

    var y = (screen.height-h)/3;



	if (winname == null) winname = "newWindow";

	if (w == null) w = 800;

	if (h == null) h = 600;

	if (resize == null) resize = 1;



	menutype   = "nomenubar";

	resizetype = "noresizable";

	scrolltype = "noscrollbars";

	if (menu) menutype = "menubar";

	if (resize) resizetype = "resizable";

	if (scroll) scrolltype = "scrollbars";

	//alert(url+","+x+","+winname);

    cwin=window.open(url,winname,"top=" + y + ",left=" + x + ",screenX=" + x + ",screenY=" + y + "," + "status," + menutype + "," + scrolltype + "," + resizetype + ",width=" + w + ",height=" + h);



	if (!cwin.opener) cwin.opener=self;

	cwin.focus();



	return true;

}



function CheckUncheck_Click(fld, status)
{
	
	if(fld.length)
		for(i=0; i < fld.length; i++)
			fld[i].checked = status;
	else
		fld.checked = status;
}


function Menu_ShowHide(menu, img, imgUp, imgDown)

{

	if(menu)

	{

		if(menu.style.display == 'none')

		{

			menu.style.visibility	= 'visible';

			menu.style.display		= 'block';

			img.src = imgUp;

			SetCookie(menu.id, 'open');

		}

		else

		{

			menu.style.visibility 	= 'hidden';

			menu.style.display 		= 'none';

			img.src = imgDown;

			SetCookie(menu.id, 'close');

		}

	}

}



function UploadImage_Change(obj, imgTag, defaultVal, defaultWidth)

{

	imgTag.width=120;



	if(obj.value == '')

		imgTag.src = defaultVal;

	else

	{

		imgTag.src = obj.value;

		if(defaultWidth != '')

			imgTag.width=defaultWidth;

	}

}



function SetTime()

{

	if(!document.getElementById('timeId'))	return;



	var Hours;

	var Mins;

	var Time;



	Stamp = new Date();



	Hours = Stamp.getHours();

	

	if (Hours >= 12)

		Time = " PM";

	else

		Time = " AM";

	

	if (Hours > 12)

		Hours -= 12;

	

	if (Hours == 0)

		Hours = 12;

	

	Mins = Stamp.getMinutes();



	if (Mins < 10)

		Mins = "0" + Mins;



	Sec = Stamp.getSeconds();

	if (Sec < 10)

		Sec = "0" + Sec;



	document.getElementById('timeId').innerHTML = ("&nbsp;" + Hours + ":" + Mins + ":" + Sec + Time);

}



setInterval('SetTime()',1000);



function getDate(parmDate)

{

	var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September","October", "November", "December");



	var curr_date = parmDate.getDate();



	var sup = "";



	if (curr_date == 1 || curr_date == 21 || curr_date ==31)

	{

	   sup = "st";

	}

	else if (curr_date == 2 || curr_date == 22)

	{

	   sup = "nd";

	}

	else if (curr_date == 3 || curr_date == 23)

	{

	   sup = "rd";

	}

	else

	{

	   sup = "th";

	}



	var curr_month 	= parmDate.getMonth();

	var curr_year 	= parmDate.getFullYear();



	return (curr_date + "<SUP>" + sup + "</SUP> " + m_names[curr_month] + " " + curr_year);

}



function GetCookie (name) 

{

	var arg = name + "=";

	var alen = arg.length;

	var clen = document.cookie.length;

	var i = 0;

	while (i < clen) 

	{

		var j = i + alen;

		if (document.cookie.substring(i, j) == arg)

			return getCookieVal (j);



		i = document.cookie.indexOf(" ", i) + 1;

		if (i == 0) break; 

	}

	return null;

}



function SetCookie (name, value) 

{

	var argv = SetCookie.arguments;

	var argc = SetCookie.arguments.length;

	

	var expires = (argc > 2) ? argv[2] : null;

	var path = (argc > 3) ? argv[3] : null;

	var domain = (argc > 4) ? argv[4] : null;

	var secure = (argc > 5) ? argv[5] : false;

	

	document.cookie = name + "=" + escape (value) +

	((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +

	((path == null) ? "" : ("; path=" + path)) +

	((domain == null) ? "" : ("; domain=" + domain)) +

	((secure == true) ? "; secure" : "");

}



function convertnew_old(ln)

{

	var loc = document.location.toString();

	loc = loc.substring(7,loc.length);

	

	var newname = window.open('http://translate.google.com/translate_c?langpair=' + ln + "&u=" + document.location,"new_trans");

	newname.focus();

	return false;

	

}



function View_Prod(prod)

{

	popupWindowURL('product.php?Action=View&prod_id='+prod,'','300','250','','false','false');	

}

function Download_File(filename,folder)

{

	popupWindowURL('download.php?file_id='+filename+'&upload_folder='+folder,'','300','250','','false','false');	

}



function openImportWindow(server)

{

	var obj = document.getElementById('emails');

	var url = server+'.php';

	popupWindowURL(url,'', '600','500', '','false','true');

}



function popup_window_link(path)

{

	var path_name = path;

	opener.location.href = ''+path_name+'';

	window.close();

}

function fb_share(message, attachment, action_links, user_message_prompt) 
{
  var generic_message = null;
  var generic_attachment = {
    name: "Tasksonic.com",
    description: "Tasksonic, helping you to get the things you need done fast!",
    caption: null,
    href: "http://www.tasksonic.com/"
  };
  var generic_action_links = [ { text: "Go to Tasksonic.com", href: "http://www.tasksonic.com/" } ];
  var generic_user_message_prompt = "What do you want to tell your friends about Tasksonic.com?";
  FB.ui({
    method: 'stream.publish',
    message: message || generic_message,
    attachment: attachment || generic_attachment,
    action_links: action_links || generic_action_links,
    user_message_prompt: user_message_prompt || generic_user_message_prompt
  });
}



