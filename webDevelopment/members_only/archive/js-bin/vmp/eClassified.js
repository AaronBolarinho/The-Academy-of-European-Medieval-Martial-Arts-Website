// global parameters
var helpWindow
var proceed
var passOK
var priceOK

//
// hide the category in a hidden value for the purpose of not price checking
// when categories are "Give Away" or "Do you have...?" or "Trading Post"
//
function regCatFun(form)
{
var selectPos_cat	= form.classified_category.selectedIndex
var category		= form.classified_category.options[selectPos_cat].value
form.regCat.value	= category
form.price.value	= ""

passOK	= 0
proceed	= 0
priceOK	= 0

} // end of function: regCatFun


//
// help window
//
function helpMe()
{
if (!helpWindow || helpWindow.closed)
	{
	helpWindow=window.open("../help/eClassified.htm","helpWin_eClass","toolbar=no,scrollbars=yes,height=400,width=350")
	}
else
	{
	// choosing help window already opened; bring it into focus
	helpWindow.focus()
	}
} // end of function: helpMe

//
// help window
//
function helpMeUpdate()
{
if (!helpWindow || helpWindow.closed)
	{
	helpWindow=window.open("http://www.aemma.org/vmp/help/eClassifiedUpDel.htm","helpWin_eClass","toolbar=no,scrollbars=yes,height=400,width=300")
	}
else
	{
	// choosing help window already opened; bring it into focus
	helpWindow.focus()
	}
} // end of function: helpMeUpdate



function priceRedundant(form)
{
var regCat = form.regCat.value

if (regCat == "anyone" && regCat == "away" && regCat == "trading")
	{
	// the category is one of the non-price required categories
	// assign blanks to the price to bypass the final form check
	form.price.value = "  "
	}
} // end of function: priceRedundant


//
// validate price entry
//
function priceCheck(form)
{
var inputString = form.price.value
var regCat = form.regCat.value
var OKtoGo = 0

if (regCat != "anyone" && regCat != "away" && regCat != "trading")
	{
	if (isEmpty(inputString))
		{
		alert("Error: The price field is empty!  This field is required.")
		}
	else
		{
		OKtoGo = 1
		}
	}
else
	{
	// the category is one of the non-price required categories
	// assign blanks to the price to bypass the final form check
	form.price.value = "  "
	}

if (OKtoGo == 1)
	{
	if (isNumber(inputString))
		{
		var atPos = inputString.indexOf("$")
		if (atPos < 0)
			{
			var userPrice = "$" + decimalPoint(inputString)
			}
		else
			{
			var userPrice = decimalPoint(inputString)
			}
		form.price.value = userPrice
		}
	else
		{
		alert ("The price data element only accepts numeric values! A decimal point and/or '$' sign is optional.  Please try again")
		}
	}
} // end of function: priceCheck


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
//alert ("eClassified.js: getTodaysDate")
form.entryDate.value = getToday()

} // end of function: getTodaysDate

//
// when the browser changes the quantity or frequency, make the appropriate changes to values
// verify that all fields have entries
//
function eValidate(form,whichOne)
{
var addTitle	= form.add_title.value
var description 	= form.description.value
var email		= form.email.value
var city		= form.city.value
var price		= form.price.value
var userID	= form.userID.value
var password1	= form.password1.value
var password2	= form.password2.value
var regCat 	= form.regCat.value
var validated	= form.formValidate.value // 1 = validated only, 2 = submitted
passOK	= 0
proceed	= 0
priceOK	= 0

// figure on which e-classifieds category was selected, if at all
//
var selectPos_cat	= form.classified_category.selectedIndex
var category		= form.classified_category.options[selectPos_cat].value

//
// check if an critical entries were made
//
if (isEmpty(email))
	{
	alert("The email address field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(category))
	{
	alert("The e-classified category field is empty, it is a required field!! Please try again.")
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
else if (!isProvState(form))
	{
	// do nothing, the appropriate error message
	}
else if (!emailCheck(email))
	{
	// do nothing, the appropriate alert has already happened
	}
else
	{
	proceed = 1
	}
//
// special test case for an empty price, check for no-price required categories
// and if so, ignore the empty/blank price
//
if (proceed == 1)
	{
	if (regCat != "anyone" && regCat != "away" && regCat != "trading")
		{
		if (isEmpty(price))
			{
			alert("Error: The price field is empty!  This field is required.")
			}
		else
			{
			priceOK = 1
			}
		}
	else
		{
		priceOK = 1
		}
	}
//
// password check should there be a userID entered
//
if (proceed == 1 && priceOK == 1)
	{
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
				else
					{
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
			alert ("You have not entered a password!  In order to revise your e-classified entry at a later date, you must enter a password and confirmation password along with your user ID.")
			}
		}
	else
		{
		// check for password entries and check if userID entered	
		if (!isEmpty(password1))
			{
			alert("You have entered a password, but no user ID!  Please enter a userID, or delete your password entry.")
			}
		else
			{
			passOK = 1
			}
		}
	}

//
// determine if this is a validation process or a submission process
// based on the value of "whichOne" where 1 = validate, 2 = submission
//
if (passOK == 1 && proceed == 1 && priceOK == 1)
	{
	if (whichOne == 1)
		{
		// validation process only
		//
		if (confirm("Your e-classified entry has been validated and is ready to proceed to step #2. Do you wish to submit your e-classified entry?"))
			{
			// indicate the form hidden value that the entry has been validated and will be processed for submission
			//
			validated = 2
			form.formValidate.value = validated // form has been validated and submitted
			// submit the entry
			form.action = "http://www.aemma.org/cgi-bin/vmp/e_classifieds.cgi"
			return true
			}
		else
			{
			return false
			}
		}
	else
		{
		if (confirm("Your e-classified entry has been validated. Do you wish to submit your entry?"))
			{
			// confirm first if the entry had already been submitted in the previous step
			//
			if (validated == 2)
				{
				alert("Your entry has already been submitted when you accepted to proceed to step #2 after you pressed the 'Validate Entry' button!  Check the e-classifieds under the appropriate category to see your entry.")
				}
			else
				{
				// submit the entry
				form.action = "http://www.aemma.org/cgi-bin/vmp/e_classifieds.cgi"
				return true
				}
			}
		else
			{
			return false
			}
		}
	}

if (passOK == 0 || proceed == 0 || priceOK == 0)
	{
	return false
	}

} // end of function: eValidate



function retrieveEntry(form)
{
//
// retrieve an existing e-classified form data, provided the userID and password
// are supplied
//
var selectPos_cat	= form.classified_category.selectedIndex
var category		= form.classified_category.options[selectPos_cat].value
var retValue		= 0
if (!form.userID.value == "")
	{
	if (!form.password1.value == "")
		{
		if (!form.addNum.value == "")
			{
			if (!category == "")
				{
				form.action = "http://www.aemma.org/cgi-bin/vmp/e_classifiedsUpDel.cgi"
				retValue = 1
				}
			else
				{
				alert("You must supply the category in which your e-classifieds entry exists!  Please try again.")
				}
			}
		else
			{
			alert("You must supply the advertisement number in order to retrieve the desired e-classified entry for update or deletion! Please try again")
			}
		}
	else
		{
		alert("You've entered a userID, but no password! Please try again.")
		}
	}
else
	{
	alert("In order to retrieve an existing e-classified entry, you must supply a userID and password!  Please try again")
	}

if (retValue == 1)
	{
	return true
	}
else
	{
	return false
	}

} // end of function: retrieveEntry


function buttonClick(upDelValue)
{
if (upDelValue == 1)
	{
	alert("the update request")
	}
else
	{
	alert("delete request")
	}

} // end of function: buttonClick
