//
// check on the valid email ID entry, gotta have an "@" sign in it
//
function emailCheck(emailEntered)
{
var atPos	= emailEntered.indexOf("@")
if (atPos < 0)
	{
	alert("Your email entry is invalid!! It must be of the form 'emailname@domain.com' or similar")
	return false
	}
else
	{
	return true
	}
} // end of function emailCheck

//
// a general purpose function to see if an input value contains
// only numeric values (ignores "$" and decimal point)
//
function isNumber(inputString)
{
var dollar   = 0
var decimal  = 0
var inputStr = inputString.toString()
for (var i=0; i < inputStr.length; i++)
	{
	var oneChar = inputStr.charAt(i)
	if (i == 0 && oneChar == "$")
		{
		if (dollar == 0)
			{
			dollar++
			continue
			}
		}
	else if (oneChar == ".")
		{
		if (decimal == 0)
			{
			decimal++
			continue
			}
		}
	if (oneChar < "0" || oneChar > "9")
		{
		return false
		}
	}
return true

} // end of function: isNumber

//
// a general purpose function to see if an input value has been
// entered at all
//
function isEmpty(inputString)
{
//alert("inside isEmpty function");
if (inputString == null | inputString == "")
	{
	return true
	}
else
	{
	return false
	}
} // end of function: isEmpty


//
// a general purpose function to see if there are any "bad" words entered
// into the string, presently, the words scanned for are:
// sex, drug, alcohol, cock, cunt, tits
// - new words will be added to the above list as they are discovered
//
function isBad(inputString)
{
var stringLength	= inputString.length - 3
var foundSomething	= 0

for (var i = 0; i < stringLength && foundSomething == 0; i++)
	{
	word3 = inputString.substring(i, i+3)
	word4 = inputString.substring(i, i+4)

	if (word3 == "sex")
		{
		foundSomething = 1
		}
	else if (word4 == "drug" || word4 == "alco" || word4 == "cock" || word4 == "tits" || word4 == "sexy" || word4 == "fuck")
		{
		foundSomething = 1
		}
	else
		{
		// do nothing, continue
		}
	}
if (foundSomething == 0)
	{
	return false
	}
else
	{
	return true
	}

} // end of function: isBad

//
// Determine what today's date is, return the value in the format of mm/dd/yy
//
function getToday()
{
var todayIs = new Date();
var todaysDate = todayIs.getDate()
var todaysMonth = todayIs.getMonth() + 1
var todaysYear = todayIs.getYear() - 100 + 2000
if (todaysMonth < 10)
	{
	todaysMonth = "0" + todaysMonth
	}
todaysMonth = "" + todaysMonth
if (todaysMonth.length < 2)
	{
	todaysMonth = "0" + todaysMonth
	}
todaysDate = "" + todaysDate
if (todaysDate.length < 2)
	{
	todaysDate = "0" + todaysDate
	}
todaysYear = "" + todaysYear

//alert(todaysMonth)
//alert(todaysDate)
//alert(todaysYear)
//alert("inside javaScriptComm - getToday")

var todayReturn = todaysMonth + "/" + todaysDate + "/" + todaysYear
return todayReturn

} // end of function: getToday


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
// validate the postal code for those big paws beloning to those crazy canuks!
//
function pcCheck(pcInputString)
{
var pcLength 		= pcInputString.length
var newPC 		= ""
var newPCnext		= 0
var nextcharType	= "a"
var oneChar		= ""
var firstCheck		= 1
var pcOK		= 0
if (pcInputString.charAt(0) != "*"){
	firstCheck = 0 }

if (pcLength < 6 && firstCheck == 0)
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
if (firstCheck == 1)
	{
	pcOK = 2
	}
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


function isProvState(form)
{
//
// check if the country is canada or usa, then ensure the proper prov/state and zip/pc
// is selected/entered
var selectPos_ctry	= form.country.selectedIndex
var selectPos_prov	= form.prov_state.selectedIndex
var country		= form.country.options[selectPos_ctry].value
var provState		= form.prov_state.options[selectPos_prov].value
var provinces		= new Array(10)
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
var field_OK = 0
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
		for (var i = 0; i < provinces.length && foundIt == 0; i++)
			{
			if (provinces[i] == provState)
				{
				foundIt = 1
				}
			}
		if (foundIt == 0)
			{
			alert("Invalid province, Canada does not have 'states'!! Please try again.")
			}
		else
			{
			field_OK = 1
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
		for (var i = 0; i < provinces.length && foundProv == 0; i++)
			{
			if (provinces[i] == provState)
				{
				foundProv = 1
				alert("Invalid state, America does not have 'provinces'!! Please try again.")
				}
			}
		if (foundProv == 0)
			{
			// did not find a province to match the entry, therefore, a state was entered
			field_OK = 1
			}
		}
	}
else
	{
	// do nothing - make sure that province/state remains null if "Other" is selected
	field_OK = 1
	}

if (field_OK == 0)
	{
	return false
	}
else
	{
	return true
	}

} // end of function: isProvState
