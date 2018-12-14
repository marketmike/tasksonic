//====================================================================================================
//	File Name		:	validate.js
//----------------------------------------------------------------------------------------------------
//	Purpose			:	Client side validation in JavaScript.
//====================================================================================================

var ie4=document.all&&navigator.userAgent.indexOf("Opera")==-1;
var ns6=document.getElementById&&navigator.userAgent.indexOf("Opera")==-1;
var ns4=document.layers;
var ffox=!(navigator.userAgent.indexOf("Firefox")==-1);

//====================================================================================================
//	Function Name	:	IsEmpty
//----------------------------------------------------------------------------------------------------
function IsEmpty(fld,msg)
{
	strTemp = trimAll(fld.value);
	if(strTemp.length > 0)
	{
		return true;
	}
	else
	{
		alert(msg);
		try {fld.focus();}catch(e){return true;}
		return false;
	}
}

function trimAll( strValue ) 
{
	var objRegExp = /^(\s*)$/;
	//check for all spaces
	if(objRegExp.test(strValue)) 
	{
		strValue = strValue.replace(objRegExp, '');
		if( strValue.length == 0)
			return strValue;
	}
	//check for leading & trailing spaces
	objRegExp = /^(\s*)([\W\w]*)(\b\s*$)/;
	if(objRegExp.test(strValue)) 
	{
	//remove leading and trailing whitespace characters
		strValue = strValue.replace(objRegExp, '$2');
	}
	return strValue;
}


function IsEmail(fld,msg)
{

	var emailStr = fld.value;

	if (emailStr.toString() == "") 
	{
		alert ("Please Enter Email address");
			fld.focus()
			return false;

	}
	else if (emailStr != "")
	{	
	var checkTLD=1;
	var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;
	var emailPat=/^(.+)@(.+)$/;
	var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
	var validChars="\[^\\s" + specialChars + "\]";
	var quotedUser="(\"[^\"]*\")";
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	var matchArray=emailStr.match(emailPat);
	
	if (matchArray==null) {
	alert("Email address seems incorrect (check @ and .'s)");
	fld.focus()
	return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];
	for (i=0; i<user.length; i++) {
	if (user.charCodeAt(i)>127) {
	alert("Email address contains invalid characters.");
	fld.focus()
	return false;
	   }
	}
	for (i=0; i<domain.length; i++) {
	if (domain.charCodeAt(i)>127) {
	alert("Email's domain name contains invalid characters.");
	fld.focus()
	return false;
	   }
	}
	if (user.match(userPat)==null) {
	alert("Email address doesn't seem to be valid.");
	fld.focus()
	return false;
	}
	
	var IPArray=domain.match(ipDomainPat);
	if (IPArray!=null) {
	for (var i=1;i<=4;i++) {
	if (IPArray[i]>255) {
	alert("Email's Destination IP address is invalid!");
	fld.focus()
	return false;
	   }
	}
	//return true;
	}
	var atomPat=new RegExp("^" + atom + "$");
	var domArr=domain.split(".");
	var len=domArr.length;
	for (i=0;i<len;i++) {
	if (domArr[i].search(atomPat)==-1) {
	alert("Email's domain name does not seem to be valid.");
	fld.focus()
	return false;
	   }
	}
	

	if (len<2) {
	alert("Email address is missing a hostname!");
	fld.focus()
	return false;
	}
	//return true;

	}

	return true;
      
}

//====================================================================================================
//	Function Name	:	IsInt
//----------------------------------------------------------------------------------------------------
function IsInt(fld,msg)
{
	var regex = /^[0-9]*$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}


//====================================================================================================
//	Function Name	:	IsFloat
//----------------------------------------------------------------------------------------------------
function IsFloat(fld,msg)
{
	var regex = /^[0-9.]*$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsValidString
//----------------------------------------------------------------------------------------------------
function IsValidString(fld,msg)
{
	var regex = /^[_]*[a-zA-Z_]+[a-zA-Z0-9_]*$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsPassword
//----------------------------------------------------------------------------------------------------
function IsPassword(fld,msg)
{
	var regex = /^[_]*[a-zA-Z]+[0-9]+[a-zA-Z0-9]*$/;
	if(!regex.test(fld.value))
  	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsLen
//----------------------------------------------------------------------------------------------------
function IsLen(fld, minlen, maxlen, msg)
{
	if(fld.value.length < minlen || fld.value.length > maxlen)
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsCurrency
//----------------------------------------------------------------------------------------------------
function IsCurrency(fld,msg)
{
    val = fld.value.replace(/\s/g, "");

	regex = /^\$?\d{1,3}(,?\d{3})*(\.\d{1,2})?$/;

    if(!regex.test(val)) {
         alert(msg);
		 fld.focus();
		 return false;
    }
	return true;
}

//====================================================================================================
//	Function Name	:	IsZip
//----------------------------------------------------------------------------------------------------
function IsZip(fld,msg)
{
	var num = /^[\d]+$/;
	if(!num.test(fld.value) || (fld.value.length !=5 && fld.value.length !=6))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsValidFormat
//----------------------------------------------------------------------------------------------------
function IsValidFormat(fld, filelist, msg)
{
	var regex = new RegExp('(' + filelist.toLowerCase() + ')$');
	if(!regex.test(fld.value.toLowerCase()))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsUrl
//----------------------------------------------------------------------------------------------------
function IsUrl(fld,msg)
{
//	var regex = /^(http:\/\/)/;
	var regex = /^(http:\/\/)/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsValidSize
//----------------------------------------------------------------------------------------------------
function IsValidSize(fld, msg)
{
	var regex = /^[0-9]*x[0-9]*$/i;
	
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}
//====================================================================================================
//	Function Name	:	IsValidSize
//----------------------------------------------------------------------------------------------------
function CheckFileType(fld,msg)
{
	var regex = /(.jpg|.jpeg|.gif|.JPG|.GIF|.JPEG)$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}
function isNumericKey()
{
	if (window.event.keyCode < 48 || window.event.keyCode > 57)
	{
		window.event.keyCode = 0;
	} 
}