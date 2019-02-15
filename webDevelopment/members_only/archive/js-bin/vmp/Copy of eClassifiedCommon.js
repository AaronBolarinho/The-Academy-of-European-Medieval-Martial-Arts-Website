// global parameters
var okToPrint
var emailOK
var helpWindow_book
var helpWindow_mag

//
// help window, specific for article type
//
function help(type)
{
if (type == "book")
	{
	if (!helpWindow_book || helpWindow_book.closed)
		{
		helpWindow_book=window.open("../help/book.htm","helpWin_book","toolbar=no,scrollbars=yes,height=400,width=300")
		}
	else
		{
		// choosing help window already opened; bring it into focus
		helpWindow_book.focus()
		}
	}
else if (type == "magazine")
	{
	if (!helpWindow_mag || helpWindow_mag.closed)
		{
		helpWindow_mag=window.open("../help/magazine.htm","helpWin_mag","toolbar=no,scrollbars=yes,height=400,width=300")
		}
	else
		{
		// choosing help window already opened; bring it into focus
		helpWindow_mag.focus()
		}
	}
else
	{
	// do nothing
	}

} // end of function: help


//
// validate the postal code for those big paws beloning to those crazy canuks!
//
function pcCheck(pcInputString)
{
var pcLength 		= pcInputString.length
var newPC 		= ""
var newPCnext		= 0
var nextcharType	= "a"
var oneChar		= ""
if (pcLength < 6)
	{
	alert("The postal code entry did not have enough alphanumeric characters entered!")
	return false
	}
//
// convert all postal code text to uppercase
//
pcInputString = pcInputString.toUpperCase()

//
// remove leading blanks in the entry
//
var pcOK = 0
for (var i = 0; i < pcLength && pcOK == 0; i++)
	{
	oneChar = pcInputString.charAt(i)
	if (oneChar == " ")
		{
		continue
		}
	else
		{
		pcInputString = pcInputString.substr(i)
		pcLength = pcInputString.length
		pcOK = 1
		}
	}
if (pcOK == 0)
	{
	alert("The postal code entered is all blanks!! Come on now, enter the correct postal code...")
	}
//
// pick apart the postal code, identify the pattern AnA nAn
for (var i = 0; i < pcLength && pcOK == 1; i++)
	{
	oneChar = pcInputString.charAt(i)
	if (i == 0 && (oneChar < "0" || oneChar > "9"))
		{
		// if the very first character in the postal code is not a letter, then it's invalid
		newPC = oneChar
		nextcharType = "n"
		newPCnext++
		}
	else if (i > 0 && (nextcharType == "n" && newPCnext == 1 && (oneChar >= "0" && oneChar <="9")))
		{
		// for the 2nd position of the pc, a number was found
		newPC = newPC + oneChar
		nextcharType = "a"
		newPCnext++
		}
	else if (i > 0 && (nextcharType == "a" && newPCnext == 2 && ((oneChar < "0" || oneChar >"9") && oneChar != " ")))
		{
		// for the 3rd position of the pc, a letter was found
		newPC = newPC + oneChar
		nextcharType = "a"
		newPCnext++
		}
	else if (i > 0 && (nextcharType == "a" && newPCnext == 3))
		{
		if (oneChar == " ")
			{
			// for the 3rd position of the pc, a blank letter was found
			newPC = newPC + oneChar
			nextcharType = "n"
			newPCnext++
			}
		else
			{
			// a non-blank character was found instead of a blank, 
			// will insert a blank, reduce the index count and throw this bank into the loop
			// to process the same character being pointed at this current index
			newPC = newPC + " " + oneChar
			nextcharType = "n"
			newPCnext++
			i--
			}
		}
	else if (i > 0 && (nextcharType == "n" && newPCnext == 4 && (oneChar >= "0" && oneChar <="9")))
		{
		// for the 4th (5th if you don't call "0" a position) position of the pc, a number was found
		newPC = newPC + oneChar
		nextcharType = "a"
		newPCnext++
		}
	else if (i > 0 && (nextcharType == "n" && newPCnext == 5 && ((oneChar < "0" || oneChar >"9") && oneChar != " ")))
		{
		// for the 4th (5th if you don't call "0" a position) position of the pc, a letter was found
		newPC = newPC + oneChar
		nextcharType = "a"
		newPCnext++
		}
	else if (i > 0 && (nextcharType == "a" && newPCnext == 5 && ((oneChar < "0" || oneChar >"9") && oneChar != " ")))
		{
		// for the 5th position of the pc, a letter was found
		newPC = newPC + oneChar
		nextcharType = "n"
		newPCnext++
		}

	else if (i > 0 && (nextcharType == "n" && newPCnext == 6 && (oneChar >= "0" && oneChar <= "9")))
		{
		// for the 6 and last (0 => 6) position of the pc, a number was found
		newPC = newPC + oneChar
		nextcharType = "x"
		newPCnext++
		pcOK = 2
		}
	else
		{
		if (i < pcLength && oneChar == " ")
			{
			continue
			}
		else
			{
			pcOK = 0
			}
		}

	} // end of for loop
if (pcOK >= 1)
	{
	return true
	}
else
	{
	return false
	}

} // end of function pcCheck

//
// check on the valid email ID entry, gotta have an "@" sign in it
//
function emailCheck(emailEntered)
{
var atPos	= emailEntered.indexOf("@")
emailOK	= 0
if (atPos < 0)
	{
	alert("Your email entry is invalid!! It must be of the form 'emailname@domain.com' or similar")
	}
else
	{
	emailOK = 1
	}
} // end of function emailCheck

//
// a general purpose function to see if an input value has been
// entered at all
//
function isEmpty(inputString)
{
if (inputString == null | inputString == "")
	{
	return true
	}
else
	{
	return false
	}
} // end of function isEmpty

//
// when the browser changes the quantity or frequency, make the appropriate changes to values
//
// the browser has completed the form, and will now submit the form to the printer and to
// email targets, verify that all fields have entries
//
function validateForm(form,prnt)
{
var proceed	= 0
var email	= form.email.value
var name	= form.name.value
var street	= form.street1.value
var city	= form.city.value

//
// re-check the email entry, to ensure it follows the format required
//
emailCheck(email)

//
// check if an critical entries were made
//
if (isEmpty(email))
	{
	alert("The email address field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(name))
	{
	alert("The name field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(street))
	{
	alert("The address field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(city))
	{
	alert("The city field is empty, it is a required field!! Please try again.")
	}
else
	{
	proceed = 1
	}
if (proceed == 1 && emailOK == 1)
{
//
// check if the country is canada or usa, then ensure the proper prov/state and zip/pc
// is selected/entered
var okToPrint		= 0
var selectPos_ctry	= form.country.selectedIndex
var selectPos_prov	= form.prov_state.selectedIndex
var country		= form.country.options[selectPos_ctry].value
var provState		= form.prov_state.options[selectPos_prov].value
var provinces		= new Array(10)
var OKtoEmail		= form.OKtoEmail.value
//
// initialize provinces array
//
provinces[0] = "AB"
provinces[1] = "BC"
provinces[2] = "MB"
provinces[3] = "NB"
provinces[4] = "NF"
provinces[5] = "ON"
provinces[6] = "QC"
provinces[7] = "PE"
provinces[8] = "SK"
provinces[9] = "YK"

var foundIt = 0
if (country == "Canada")
	{
	// check validity of province
	//
	if (isEmpty(provState))
		{
		alert("The Prov/State field is empty, it is a required field!! Please select the appropriate province.")
		}
	else
		{
		for (var i = 0; i < provinces.length; i++)
			{
			if (provinces[i] == provState)
				{
				foundIt = 1
				break
				}
			}
		if (foundIt == 0)
			{
			alert("Invalid province, Canada does not have 'states'!! Please try again.")
			}
		else
			{
			// check validity of postal code entry, first, is it null?
			var postalCode	= form.postalCode.value
			if (isEmpty(postalCode))
				{
				alert("The postal code field is empty, it is a required field!! Please try again.")
				}
			else
				{
				if (pcCheck(postalCode))
					{
					okToPrint++
					}
				else
					{
					alert("The postal code entry is invalid!! The format is AnA nAn where 'A' = letter, 'n' = number.  Please try again.")
					}
				}
			}
		}
	}
else if (country == "USA")
	{
	foundProv = 0
	if (isEmpty(provState))
		{
		alert("The Prov/State field is empty, it is a required field!! Please select the appropriate state.")
		}
	else
		{
		for (var i = 0; i < provinces.length; i++)
			{
			if (provinces[i] == provState)
				{
				foundProv = 1
				alert("Invalid state, America does not have 'provinces'!! Please try again.")
				break
				}
			}
		if (foundProv == 0)
			{
			// did not find a province to match the entry, therefore, a state was entered
			//
			// check validity of ZIP code entry, first, is it null?
			var postalCode	= form.postalCode.value
			if (isEmpty(postalCode))
				{
				alert("The ZIP code field is empty, it is a required field!! Please try again.")
				}
			else
				{
				okToPrint++
				}
			}
		}
	}
else
	{
	// do nothing - make sure that province/state remains null if "Other" is selected
	}

} // end of big proceed if

if (prnt == 0 && okToPrint >= 1)
	{
	// the form entries are now validated, bring up a window to ask if the browser
	// now wishes to proceed to step 2 and print?
	if (confirm("Your entries have been validated and are ready to print (step #2). Do you wish to print?"))
		{
		OKtoEmail = "yes"
		form.OKtoEmail.value = OKtoEmail // a flag check for the email.cgi program
		self.print()
		}
	}
else if (prnt == 1 && okToPrint >= 1)
	{
	// the print button was pressed, however, validation still needed to happen
	OKtoEmail = "yes"
	form.OKtoEmail.value = OKtoEmail // a flag check for the email.cgi program
	self.print()
	}
else
	{
	// do nothing
	}

} // end of function validateForm


//
// this function will re-calculate the subtotal on the entry form, should there
// be annual subscription rates, different for a 1-year subscription or 2-year or
// whatever is passed to this function via "which"
//
function setYear(form,which)
{
var l_quantity = form.qty.value

//
// gotta first remove the '$' sign from the price and then multiply
//
if (which == "1")
	{
	new_unitPriceDollar	= form.unit_price1.value
	form.unit_price.value	= form.unit_price1.value
	//
	// remove the dollar sign from the value
	//
	new_unitPriceNoDollar	= new_unitPriceDollar.substring(1,10)
	new_unitPrice		= parseFloat(new_unitPriceNoDollar)
	var tempAmount		= l_quantity * new_unitPrice
	tempAmount		= "$" + tempAmount
	form.subTotal.value	= decimalPoint(tempAmount)
	form.subscription.value = "1-year"
	}
else
	{
	new_unitPriceDollar	= form.unit_price2.value
	form.unit_price.value	= form.unit_price2.value
	//
	// remove the dollar sign from the value
	//
	new_unitPriceNoDollar	= new_unitPriceDollar.substring(1,10)
	new_unitPrice		= parseFloat(new_unitPriceNoDollar)
	var tempAmount		= l_quantity * new_unitPrice
	tempAmount		= "$" + tempAmount
	form.subTotal.value	= decimalPoint(tempAmount)
	form.subscription.value = "2-year"
	}
} // end of function: setYear


//
// determine if there is a decimal point in the amount, and if not, add a
// decimal point followed by 2 "0"s, or single "0" if there is a decimal
// point followed by a single digit
//
function decimalPoint(l_amount)
{
var offset = l_amount.indexOf('.')
if (offset<0)
	{
	l_amount = l_amount + ".00"
	return l_amount
	}
else 	{
	var rightOfDecimal = l_amount.substr(offset)
	var rightOfDecimal = l_amount.substr(offset+1)
	if (rightOfDecimal.length < 2)
		{
		l_amount = l_amount + "0"
		}
	return l_amount
	}
} // end of function: decimalPoint


//
// if the quantity value has been changed on the form, then calculate the new subtotal
//
function changeQuantity(form)
{
var l_quantity	= form.qty.value
var l_amount	= 0
var l_price	= form.unit_price.value

//
// remove the '$' sign from the price and then multiply
//
l_price2 	= l_price.substring(1,10)
l2_price	= parseFloat(l_price2)
l_amount	= l_quantity * l2_price
l_amount	= '$' + l_amount

//
// assign the final value, complete with decimal point followed by 2-digits
//
form.subTotal.value = decimalPoint(l_amount)

} // end of function changeQuantity