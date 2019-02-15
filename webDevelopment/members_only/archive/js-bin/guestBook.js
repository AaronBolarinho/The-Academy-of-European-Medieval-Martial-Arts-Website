<!--
//
// verify that all of the required fields have data
//
function validateForm(form)
{
var name	= form.name.value
var city	= form.city.value
var email	= form.email.value
var comments	= form.comments.value
var other	= form.other.value

passOK	= 0
proceed	= 0

// figure on which country and prov was selected, if at all
//
var selectPos_prov	= form.prov_state.selectedIndex
var prov_state		= form.prov_state.options[selectPos_prov].value

var selectPos_ctry	= form.country.selectedIndex
var country		= form.country.options[selectPos_ctry].value

//
// check if all entries were made
//
if (isEmpty(name))
	{
	alert("The *** Name *** field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(email))
	{
	alert("The *** Email *** address field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(city))
	{
	alert("The *** City *** field is empty, it is a required field!! Please try again.")
	}
else if (isEmpty(country))
	{
	if (isEmpty(other))
		{
		alert("The *** Country *** & *** Other Country *** fields are empty, enter either a 'country' or enter a name of a country not included in the list!! Please try again.")
		}
	}
else if (isEmpty(comments))
	{
	alert("The *** Comments *** field is empty!! No point signing a guestbook without some sort of comment!! Please try again.")
	}
else
	{
	proceed = 1
	}


//
// now, check each required field to determine it's correctness and validity
//
// check if the email address is of the correct format
//
if (proceed == 1 && emailCheck(email))
	{
	// check if prov is consistent with CA or state consistent with USA
	//
	// do nothing if we get down here,email address is OK
	}
else
	{
	proceed = 0
	}
if (isProvState(form) && proceed ==1)
	{
	// proceed onwards...
	//
	}
else
	{
	proceed = 0
	}

//
// determine if everything is cool and proceed to invoke the CGI script
//
if (proceed == 1)
	{
	if (confirm("Your guestbook entry checks out, would you like to continue with you guestbook entry?"))
		{
		alert("inside guestBook.js and calling guestbook.cgi")
		form.action = "http://pathway3.pathcom.com/aemma/cgi-bin/guestBook/guestbook.cgi"
//		alert("after calling guestbook.cgi")
		return true
		}
	}
else
	{
	return false
	}

} // end of function: validateForm

//-->