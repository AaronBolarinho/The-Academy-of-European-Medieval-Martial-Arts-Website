// global parameters
var helpWindow

//
// help window
//
function helpMe()
{
if (!helpWindow || helpWindow.closed)
	{
	helpWindow=window.open("../help/eClassified.htm","helpWin_eClass","toolbar=no,scrollbars=yes,height=400,width=300")
	}
else
	{
	// choosing help window already opened; bring it into focus
	helpWindow.focus()
	}
} // end of function: helpMe

//
// validate price entry
//
function priceCheck(form)
{
inputString = form.price.value
if (isEmpty(inputString))
	{
	alert("Error: The price field is empty!  This field is required.")
	}
//if (isNumeric(inputString))
//	{
//	alert("Warning: The price field is a numeric field only!  Please revise the price accordingly.")
//	}
var userPrice = "$" + decimalPoint(inputString)
alert("input price = '" + userPrice + "'")
form.price.value = userPrice

} // end of function: titleCheck


//
// validate title entry
//
function titleCheck(inputString)
{
if (isEmpty(inputString))
	{
	alert("Error: The advertisement title is empty!  This field is required.")
	}
if (isBad(inputString))
	{
	alert("Warning: The advertisement title contains words that are inappropriate for the e-classifieds!  Please revise the title accordingly.")
	}

} // end of function: titleCheck

//
// validate description entry
//
function descriptionCheck(form)
{
var description = form.description.value
if (isEmpty(description))
	{
	alert("Error: The description is empty!  This field is required.")
	}

} // end of function: descriptionCheck

//
// call up the date function to get today's date in the form of mm/dd/yy
//
function getTodaysDate(form)
{
form.entryDate.value = getToday()

} // end of function: getTodaysDate

//
// when the browser changes the quantity or frequency, make the appropriate changes to values
// verify that all fields have entries
//
function eValidate(form)
{
var proceed	= 0
var addTitle	= form.add_title.value
var description = form.description.value
var email	= form.email.value
var city	= form.city.value
var price	= form.price.value
var password1	= form.password1.value
var password2	= form.password2.value

//
// check if an critical entries were made
//
if (isEmpty(email))
	{
	alert("The email address field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(addTitle))
	{
	alert("The e-classified title field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(description))
	{
	alert("The description field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(city))
	{
	alert("The city field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(price))
	{
	alert("The price field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(userID))
	{
	alert("You have not entered a user ID!  This is an optional field, however, without a user ID and password, you will not be able to revise your e-classified entry at a later date.")
	}
else if (emailCheck(email))
	{
	// do nothing, the appropriate alert has already happened
	}
else
	{
	proceed = 1
	}

//
// password check should there be a userID entered
//
if (!isEmpty(userID))
	{
	if (!isEmpty(password1))
		{
		if (!isEmpty(password2))
			{
			if (password1 != password2)
				{
				alert ("Your password and your confirmation password do not match!  Please re-enter the passwords to ensure you are able to revise your e-classifieds entry at a later date.")
				}
			}
		else
			{
			alert ("You have not entered a confirmation password!  Please enter a confirmation password before proceeding.  This confirmation password should be the same as your initial password.")
			}
		}
	else
		{
		alert ("You have not entered a password!  In order to revise your e-classified entry at a later date, you must enter a password and confirmation password along with your user ID.")
		}
	}

if (proceed == 1 && isProvState(form))
	{
	// the form entries are now validated, bring up a window to ask if the browser
	// now wishes to proceed to step 2 and submit the e-classified entry
	if (confirm("Your entries have been validated and are ready to submit your e-classified's entry (step #2). Do you wish to continue?"))
		{
		formValidated = 1
		form.formValidated.value = formValidated // a flag check for the e-classifieds program
		}
	else
		{
		alert("Your e-classified entry has been cancelled.  Thank you for visiting AEMMA's Virtual Market Place e-Classifieds.")
		}		

	} // end of proceed if

} // end of function: validateForm
