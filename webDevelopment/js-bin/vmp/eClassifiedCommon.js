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
	else if (word4 == "drug" || word4 == "alco" || word4 == "cock" || word4 == "tits" || word4 == "guns")
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
// validate title entry
//
function titleCheck(inputString)
{
if (isEmpty(inputString))
	{
	alert("Error: The advertisement title is empty!  This field is required.")
//	break
	}
if (isBad(inputString))
	{
	alert("Warning: The advertisement title contains words that are inappropriate for the e-classifieds!  Please revise the title accordingly.")
//	break
	}

} // end of function: titleCheck
