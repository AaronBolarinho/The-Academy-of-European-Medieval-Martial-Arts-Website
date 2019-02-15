// global parameters
var okToPrint
var emailOK
var helpWindow_book
var helpWindow_mag
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
		pcInputString = pcInputString.substring(i)
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
// add an additional $10 USD for any order in which the destination is outside of CAD and USA
//
function shipping(form)
{
var subTotal		= form.subTotal.value
var selectPos_ctry	= form.country.selectedIndex
var country		= form.country.options[selectPos_ctry].value

if (country == "Other")
	{
	// get rid of the "$" and turn the string into a number
	//
	old_price 	= subTotal.substring(1,10)
	numOld_price	= parseFloat(old_price)
	new_subTotal	= numOld_price + 10
	new_subTotal	= '$' + new_subTotal
	new_subTotal	= decimalPoint(new_subTotal)
	//
	// indicate to the user that an additional charge is to be applied, either continue or cancel request
	//
	if (confirm("There is an additional $10 USD shipping & handling charge for destinations outside of Canada and the United States! Do you wish to continue?"))
		{
		form.subTotal.value = new_subTotal
		}
	else
		{
		self.close()
		}
	}
} // end of function shipping


//
// add an additional $25 USD for any order given the source is the Scotland (Macdonalds)
//
function shippingWeaponsMac(form)
{
var subTotal		= form.subTotal.value
var selectPos_ctry	= form.country.selectedIndex
var country		= form.country.options[selectPos_ctry].value
var shipping_Cost	= form.shippingCostMac.value

if (shipping_Cost == 0)
	{
	// get rid of the "$" and turn the string into a number
	//
	old_price 	= subTotal.substring(1,10)
	numOld_price	= parseFloat(old_price)
	new_subTotal	= numOld_price + 25
	new_subTotal	= '$' + new_subTotal
	new_subTotal	= decimalPoint(new_subTotal)
	//
	// indicate to the user that an additional charge is to be applied, either continue or cancel request
	//
	if (confirm("There is an additional $25 USD shipping & handling charge! Do you wish to continue?"))
		{
		form.subTotal.value = new_subTotal
		form.shippingCostMac.value = 25
		}
	else
		{
		self.close()
		}
	}
//else
//	{
	// shipping cost has already been added, however, the user changed thd quantity
	// desired which fired off this again, therefore, simply add the shipping cost
	// to the new subTotal value
	//
//	old_price 	= subTotal.substring(1,10)
//	numOld_price	= parseFloat(old_price)
//	new_subTotal	= numOld_price + 75
//	new_subTotal	= '$' + new_subTotal
//	new_subTotal	= decimalPoint(new_subTotal)
//	form.subTotal.value = new_subTotal
//	form.shippingCostMac.value = 75
//	}

} // end of function shippingWeaponsMac

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
var name	= form.orderName.value
var street	= form.street1.value
var city	= form.city.value
var shipping_costMac	= form.shippingCostMac.value
okToPrint	= 0

//
// if the shipping costs were not added to the total cost, then fire off the appropriate
// shipping function
//
if (shipping_costMac == 0)
	{
	shippingWeaponsMac(form)
	}

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
	// increment okToPrint to continue with the process
	okToPrint++
	}

} // end of big proceed if

if (prnt == 0 && okToPrint >= 1)
	{
	// the form entries are now validated, bring up a window to ask if the browser
	// now wishes to proceed to step 2 and print?
	if (confirm("Your entries have been validated and are ready to print (step #2). Do you wish to print? (print 2 copies, 1 for your records, 1 to mail out)"))
		{
		OKtoEmail = "yes"
		form.OKtoEmail.value = OKtoEmail // a flag check for the email.cgi program
		whichBrowser()
		if (browserVersion == 3)
			{
			// print() does not work for nav 3.0, alert the user, to email and print email copies
			// instead of the form (email has all of the necessary info anyways
			alert("Warning! You are running Navigator 3.0. This release of the browser does not support direct printing of forms.  Please continue with the next step (email) and print yourself a copy of the email and mail this copy along with the money order to the address indicated.")
			}
		else
			{
			self.print()
			}
		}
	}
else if (prnt == 1 && okToPrint >= 1)
	{
	// the print button was pressed, however, validation still needed to happen
	OKtoEmail = "yes"
	form.OKtoEmail.value = OKtoEmail // a flag check for the email.cgi program
	whichBrowser()
	if (browserVersion == 3)
		{
		// print() does not work for nav 3.0, alert the user, to email and print email copies
		// instead of the form (email has all of the necessary info anyways
		alert("Warning! You are running Navigator 3.0. This release of the browser does not support direct printing of forms.  Please continue with the next step (email) and print yourself a copy of the email and mail this copy along with the money order to the address indicated.")
		}
	else
		{
		self.print()
		}
	}
else
	{
	// do nothing
	}

} // end of function validateForm


//
// this function will determine if the individual wishes to get both sword & dagger,
// sword only or dagger only (relevant to Macdonald's armoury - order_swordDagger.htm)
//
function whichWeapon(form,which)
{
var swordCost = form.sword.value
var daggerCost = form.dagger.value
var swordDaggerCost = form.swordDagger.value
form.shippingCostMac.value = 0
form.qty.value = 1

//
// gotta first remove the '$' sign from the price and then multiply
//
if (which == "1")
	{
	// user wishes to order both sword & dagger
	//
	form.itemRequested.value = "14c hand and a half broadsword & matching dagger"
	form.subTotal.value	= "$" + swordDaggerCost
	form.unit_price.value	= "$" + swordDaggerCost
	shippingWeaponsMac(form)
	}
else if (which == "2")
	{
	// user wishes to order only the sword
	//
	form.itemRequested.value = "14c hand and a half broadsword only"
	form.unit_price.value	= "$" + swordCost
	form.subTotal.value	= "$" + swordCost
	shippingWeaponsMac(form)
	}
else
	{
	form.itemRequested.value = "14c dagger only"
	form.unit_price.value	= "$" + daggerCost
	form.subTotal.value	= "$" + daggerCost
	shippingWeaponsMac(form)
	}
} // end of function: whichWeapon



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
//	new_unitPrice		= parseInt(new_unitPriceNoDollar)
	var tempAmount		= l_quantity * new_unitPrice
	tempAmount		= "$" + tempAmount
	form.subTotal.value	= decimalPoint(tempAmount)
	form.subscription.value = "2-year"
	}
} // end of function: setYear

//
// determine the video format requested by the form and assign
// the format to the hidden text object
//
function vidFormat(form,which)
{
if (which == 1)
	{
	form.videoFormat.value = "NTSC"
	}
else
	{
	form.videoFormat.value = "PAL"
	}

} // end of function: vidFormat

//
// determine the language requested by the form and assign
// the format to the hidden text object
//
function langFormat(form,which)
{
if (which == 1)
	{
	form.language.value = "English"
	}
else
	{
	form.language.value = "Italian"
	}

} // end of function: langFormat

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
	var rightOfDecimal = l_amount.substring(offset)
	var rightOfDecimal = l_amount.substring(offset+1)
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
//l2_price	= parseInt(l_price2)
l2_price	= parseFloat(l_price2)
l_amount	= l_quantity * l2_price
l_amount	= '$' + l_amount

//
// assign the final value, complete with decimal point followed by 2-digits
//
form.subTotal.value = decimalPoint(l_amount)

//
// in case the country is "Other", make sure that the additional $10 is included in the total amount
//
shipping(form)

} // end of function changeQuantity



//
// if the quantity value has been changed on the form, then calculate the new subtotal
//
function changeQuantityWeapons(form)
{
var l_quantity	= form.qty.value
var l_amount	= 0
var l_price	= form.unit_price.value

//
// remove the '$' sign from the price and then multiply
//
l_price2 	= l_price.substring(1,10)
//l2_price	= parseInt(l_price2)
l2_price	= parseFloat(l_price2)
l_amount	= l_quantity * l2_price
l_amount	= '$' + l_amount

//
// assign the final value, complete with decimal point followed by 2-digits
//
form.subTotal.value = decimalPoint(l_amount)

//
// make sure that the additional $25 is included in the total amount
//
shippingWeaponsMac(form)

} // end of function changeQuantityWeapons