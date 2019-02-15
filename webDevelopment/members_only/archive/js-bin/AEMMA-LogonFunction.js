//
// help window
//
function helpMe(lang)
{
//alert("inside helpMe")
if (lang == "en")
	{
	window.location = "http://www.aemma.org/help/AEMMA-logon_Help.htm";
	}
else
	{
	window.location = "http://www.aemma.org/help/AEMMA-logon_Help_fr.htm";
	}
} // end of function: helpMe

//
// return window
//
function returnMe(lang)
{
//alert("inside returnMe")
if (lang == "en")
	{
	window.location = "http://www.aemma.org/onlineResources/members/memberLogon.shtml";
	}
else
	{
	window.location = "http://www.aemma.org/onlineResources/members/memberLogon_fr.shtml";
	}
} // end of function: returnMe

//
// cancelMe window - bring up the AEMMA screen
//
function cancelMe(lang)
{
//alert("inside cancelMe")
if (lang == "en")
	{
	window.location = "http://www.aemma.org";
	}
else
	{
	window.location = "http://www.aemma.org";
	}

} // end of function: cancelMe


//
// isEmpty - checks for incoming empty strings
//
function isEmpty(inputStr)
{
if (inputStr == null || inputStr == "")
	{
	return true
	}
else
	{
	return false
	}
} // end of function: isEmpty


//
// when the browser changes the quantity or frequency, make the appropriate changes to values
// verify that all fields have entries
//
function enterMe(form)
{

// alert ("inside enterMe form")

var userID	= form.userID.value
var password1	= form.password1.value
//var password2	= form.password2.value
var ip		= form.ipaddr.value
var lang	= form.lang.value

passOK	= 0

//form.accessDate.value = getToday()

//
// password check should there be a userID entered
//
if (!isEmpty(userID))
	{
//	alert("userID not empty")
	if (!isEmpty(password1))
		{
//		alert("password1 not empty")
//		if (!isEmpty(password2))
//			{
//			alert("password2 not empty")
//			if (password1 != password2)
//				{
//				if (lang == "en")
//					{
//					alert ("Your password and your confirmation password do not match!  Please re-enter the password and confirmation password.");
//					}
//				else
//					{
//					alert ("Your password and your confirmation password do not match!  Please re-enter the password and confirmation password.(French)");
//					}
//				passOK = 2;
//				}
//			else
//				{
//				alert("passOK assigned value of 1")
				passOK = 1;
//				}
//			}
//		else
//			{
//			if (lang == "en")
//				{
//				alert ("You have not entered a confirmation password!  Please enter a confirmation password before proceeding.  This confirmation password should be the same as your initial password.");
//				}
//			else
//				{
//				alert ("ou have not entered a confirmation password!  Please enter a confirmation password before proceeding.  This confirmation password should be the same as your initial password.(French)");
//				}
//			passOK = 2;
//			}
		}
	else
		{
		if (lang == "en")
			{
			alert ("You have not entered a password!  In order to proceed with accessing the members only resources, you must enter a password and confirmation password along with your user ID.")
			}
		else
			{
			alert ("You have not entered a password!  In order to proceed with accessing the members only resources, you must enter a password and confirmation password along with your user ID. (French)")
			}
		passOK = 2
		}
	}
else
	{
	//	alert("inside enterMe")
	// check for password entries and check if userID entered	
	if (!isEmpty(password1))
		{
		if (lang == "en")
			{
			alert("You have entered a password, but no user ID!  Please enter a userID, or delete your password entry.")
			}
		else
			{
			alert("You have entered a password, but no user ID!  Please enter a userID, or delete your password entry. (French)")
			}
		passOK = 2
		}
	else
		{
		if (lang == "en")
			{
			alert("You have not entered a user ID nor password! Please try again.")
			}
		else
			{
			alert("You have not entered a user ID nor password! Please try again. (French)")
			}
		}
	}

//
// continue with validation of captured userID and passwords - send it off to CGI
// to compare against security file contents
//
if (passOK == 1)
	{
	// alert("about to invoke idCheck.cgi")
	form.action = "http://www.aemma.org/cgi-bin/security/members/idCheck-Login.cgi";
	return true;
	}
if (passOK == 2)
	{
	// actually, do nothing, because all error messages already displayed
	}
else
	{
	if (lang == "en")
		{
		alert ("If you are experiencing problems with your login - please contact the AEMMA Administrator.");
		}
	else
		{
		alert ("If you are experiencing problems with your login - please contact the AEMMA Administrator. (French)");
		}
	return false;
	}
	
} // end of function: enterMe
