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

var popWin;
function popupWin(htmlWindow)
	{
//var revised_htmlWindow = "http://www.aemma.org/onlineResources/"+htmlWindow;
var revised_htmlWindow = "../../onlineResources/"+htmlWindow;
//	alert ("debug:library_11c:27:javascript:popupWin(htmlWindow)="+htmlWindow);
	if (!popWin || popWin.closed)
		{
		// popup window has not been opened - first invokation
		popWin = window.open(revised_htmlWindow,"11th","toolbar=no,menubar=no,scrollbars=yes,height=640,width=720");
		}
	else
		{
		// popup window is opened somewhere, bring it into focus
		popWin.focus();
		popWin.close();
		popWin = window.open(revised_htmlWindow,"11th","toolbar=no,menubar=no,scrollbars=yes,height=640,width=720");
		}
} // end function popupWin

