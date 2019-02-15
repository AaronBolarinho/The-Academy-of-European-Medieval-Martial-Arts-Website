// global parameters
var helpWindow

//
// help window
//
function helpMe()
{
//alert("inside help")
if (!helpWindow || helpWindow.closed)
	{
	helpWindow=window.open("../../help/logonLibraryHelp.htm","helpWin_eClass","toolbar=no,scrollbars=yes,height=500,width=350")
	}
else
	{
	// choosing help window already opened; bring it into focus
	helpWindow.focus()
	}
} // end of function: helpMe

//
// cancelMe window - bring up the library listing page
//
function cancelMe()
{
//alert("cancel me")
self.close();
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
var userID		= form.userID.value
var password1	= form.password1.value
var password2	= form.password2.value
var ip			= form.ipaddr.value
var treatise	= form.treatise.value
var treatPath	= form.treatPath.value
passOK	= 0

alert("Your IP address is "+ip);

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
		if (!isEmpty(password2))
			{
//			alert("password2 not empty")
			if (password1 != password2)
				{
				alert ("Your password and your confirmation password do not match!  Please re-enter the password and confirmation password.")
				}
			else
				{
//				alert("passOK assigned value of 1")
				passOK = 1
				}
			}
		else
			{
			alert ("You have not entered a confirmation password!  Please enter a confirmation password before proceeding.  This confirmation password should be the same as your initial password.")
			}
		}
	else
		{
		alert ("You have not entered a password!  In order to proceed with accessing the online library material, you must enter a password and confirmation password along with your user ID.")
		}
	}
else
	{
	//	alert("inside enterMe")
	// check for password entries and check if userID entered	
	if (!isEmpty(password1))
		{
		alert("You have entered a password, but no user ID!  Please enter a userID, or delete your password entry.")
		}
	else
		{
		alert("You have not entered a user ID nor password! Please try again.")
		}
	}

//
// continue with validation of captured userID and passwords - send it off to CGI
// to compare against security file contents
//
if (passOK == 1)
	{
	if (!isEmpty(treatise) && !isEmpty(treatPath))
		{
		// submit the entry
		//	alert("about to invoke idCheck.cgi")
		form.action = "http://www.aemma.org/cgi-bin/security/library/idCheckLibrary_test.cgi"
		return true
		}
	else
		{
		alert ("Library path not found - please contact AEMMA Administrator");
		return false
		}
	}
else
	{
	return false
	}
	
} // end of function: enterMe
