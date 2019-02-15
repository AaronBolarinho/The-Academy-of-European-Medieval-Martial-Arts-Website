<!--
// global parameters
var helpWindow
var proceed
var priceOK
var validated
var browserVersion

//
// determine the version of the browser - NOTE: window.print() function not supported in
// Nav 3.0!!!
//
function whichBrowser() {
var major = parseInt(navigator.appVersion)
if (major == "3")
	{
	// the browser operating is Navigator 3
	//
	browserVersion = 3
	}
} // end of function: whichBrowser


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
	alert("Warning: The advertisement title contains words that are inappropriate for the advertisement!  Please revise the title accordingly.")
	}

} // end of function: titleCheck


//
// call up the date function to get today's date in the form of mm/dd/yy
//
function getTodaysDate(form)
{
form.entryDate.value = getToday()

} // end of function: getTodaysDate


//
// help window
//
function helpMe()
{
if (!helpWindow || helpWindow.closed)
	{
	helpWindow=window.open("help/adHelp.htm","helpWin_ad","toolbar=no,scrollbars=yes,height=400,width=350")
	}
else
	{
	// choosing help window already opened; bring it into focus
	helpWindow.focus()
	}
} // end of function: helpMe

//
// if the duration value has been changed on the form, then calculate the new subtotal
//
function setDur(form,duration)
{
//alert("inside setDur")
var monthlyFee	= 15
var discount	= 35

newFee = monthlyFee * duration
if (duration == 12) {
	newFee = newFee - discount
	}
newFee = '$' + newFee + ".00"
form.duration.value = duration

//
// assign the final value to the form element
//
form.total.value = newFee

} // end of function setDur


//
// validate URL entry
//
function urlCheck(form)
{
var urlValue	= form.url.value
var atPos	= urlValue.indexOf("http")
if (atPos < 0)
	{
	urlValue = "http://" + urlValue
	form.url.value = urlValue
	}

} // end of function: urlCheck

//
// when the browser changes the quantity or frequency, make the appropriate changes to values
// verify that all fields have entries
//
function validateForm(form,whichOne)
{
var addTitle	= form.add_title.value
var email	= form.email.value
var url		= form.url.value
var vendor	= form.vendor.value
var contact	= form.contact.value
var price	= form.total.value
var address	= form.street1.value
var city	= form.city.value
var pcZip	= form.postalCode.value
var tel		= form.phone.value
validated	= form.formValidate.value // 1 = validated only, 2 = submitted
passOK	= 0
proceed	= 0
priceOK	= 0

//
// do the following test of the values, regardless of which button was hit
// so, if the email button was hit, the values will be tested, and if step's
// 1 & 2 not done, the email will not happen
//

if (whichOne != 3)
{
// figure on which ad category was selected, if at all
//
var selectPos_cat	= form.ad_category.selectedIndex
var category		= form.ad_category.options[selectPos_cat].value
var selectPos_ctry	= form.country.selectedIndex
var country		= form.country.options[selectPos_ctry].value

//
// a quick fix, set pcZip to "*" so that the pcCheck function will dismiss the
// input value due to it not being related to Canada or the USA
//
if (country != "Canada" && country != "USA")
	{
	pcZip = "*"
	}
//
// check if an critical entries were made
//
if (isEmpty(category))
	{
	alert("The advertisement category field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(addTitle))
	{
	alert("The advertisement title field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(email))
	{
	alert("The email address field is empty, it is a required field!! Please try again.")
	}
else if (!emailCheck(email))
	{
	// do nothing, the appropriate alert has already happened
	}
else if (isEmpty(url))
	{
	alert("The URL field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(vendor))
	{
	alert("The vendor field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(contact))
	{
	alert("The contact field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(address))
	{
	alert("The address 1 field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(city))
	{
	alert("The city field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(pcZip) && (country == "Canada" || country == "USA"))
	{
	alert("The postal code/ZIP field is empty, it is a required field!! Please try again.")
	}
else if (!isProvState(form))
	{
	// do nothing, the appropriate error message
	}
else if (!pcCheck(pcZip) && country == "Canada")
	{
	alert("The postal code entry has an invalid format! The format is AnA nAn where 'A'=letter, 'n'=number. Please try again.")
	}
else if (isEmpty(tel))
	{
	alert("The telephone field is empty, it is a required field!! Please try again.")
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
	if (isEmpty(price))
		{
		alert("Error: The total field is empty!  Select the desired duration of the ad.")
		}
	else
		{
		priceOK = 1
		if (validated == 0) 
			{
			validated = 1
			}
		}
	}
else
	{
	priceOK = 1
	}

} // end of big if testing for validated not equal to "3"

//
// determine if this is a validation process or a submission process
// based on the value of "whichOne" where 0 = validate only, 1 = print form, 2 = email form
//
if (validated >= 1)
	{
	if (whichOne == 0)
		{
		// validation process only
		//
		if (confirm("Your advertisement entry has now been validated and is ready to proceed to step #2. Do you wish to continue with your advertisement entry request?"))
			{
			// indicate the form hidden value that the entry has been validated and will be processed for submission
			//
			form.formValidate.value = validated // form has been validated
			// submit the entry for verification
			}
		}
	else if (whichOne == 1)
		{
		// first determine the browser type and release, if it is Nav3, then the self.print()
		// function will not work!!!!
		whichBrowser()
		if (browserVersion != 3)
			{
			// 
			// print the form
			//
			if (confirm("Your advertisement entry is now validated. Do you wish to print your entry (make 2 copies, one for your records, one for mailing out)?"))
				{
				self.print()
				validated = 2
				form.formValidate.value = validated // form has been printed
				}
			}
		else
			{
			// the browser is Nav3, and therefore, normal print doesn't work
			// so throw up an alert indicating this, and advise to print the email
			// instead	
			//
			alert("Netscape Navigator 3 does not support direct print function.  Please proceed to the next step, and print copies of your email you receive instead.  AEMMA apologizes for these little 'annoyances' with release compatibility issues.")
			validated = 2
			form.formValidate.value = validated // form has been "printed"
			}
		}
	else if (whichOne == 2)
		{
		// email the form to the subscriber, who will then forward it to AEMMA with a graphic attachment
		//
		if (validated == 2)
			{
			// "2" indicates that the form has been printed
			//
			if (confirm("Do you wish to email the entry request to yourself? (You will then forward the email to AEMMA with the graphic file as an attachment.)"))
				{
				validated = 3
				form.formValidate.value = validated // form is to be emailed
				form.action = "http://216.18.24.46/aemma/cgi-bin/vmp/adEntry.cgi"
				return true
				}
			else
				{
				return false
				}
			}
		else
			{
			alert("The form has not been printed!  Please press the 'Print' button to print the entry form, and then press the 'Email' button.")
			return false
			}
		}
	} // end of if for validated

else if (whichOne == 3)
	{
	alert("None of the previous steps were completed, therefore, the email was terminated!  Please proceed to step #1")
	}

if ((proceed == 0 || priceOK == 0) && whichOne == 2)
	{
	// for the "submit" button for email generation
	return false
	}

} // end of function: validateForm

//-->