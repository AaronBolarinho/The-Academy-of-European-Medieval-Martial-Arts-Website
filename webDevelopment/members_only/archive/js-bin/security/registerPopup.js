// global parameters
var registerPopup
function reg_Popup()
{
//alert("reg_popup");
if (!registerPopup || registerPopup.closed)
	{
	// registration window has not been opened - first invokation
	registerPopup = window.open("http://www.aemma.org/onlineResources/paypal.htm","popRegister","toolbar=no,menubar=no,scrollbars=yes,height=400,width=620")
	}
else
	{
	// registration window is opened somewhere, bring it into focus
	registerPopup.close()
	registerPopup = window.open("http://www.aemma.org/onlineResources/paypal.htm","popRegister","toolbar=no,menubar=no,scrollbars=yes,height=400,width=620")
	}
} // end function reg_Popup
