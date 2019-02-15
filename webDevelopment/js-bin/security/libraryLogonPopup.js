// global parameters
var libraryLogon
function libraryAccess(treatPath)
{
// Oct 29, 2006 : the approach to the popup was dropped due to the re-structuring of the navigation in the website - rather than a popup 
// for login, the login shtml now appears within the iframe.

// alert ("Notice: No new library registrations will be processed until after May 10th.  AEMMA apologizes for the inconvenience for new registrations")
//logonWindow = "http://www.aemma.org/onlineResources/" + treatPath + "/" + treatPath + "_logon.shtml"
//document.write ("http://www.aemma.org/onlineResources/" + treatPath + "/" + treatPath + "_logon.shtml");
var url;
url = "http://www.aemma.org/onlineResources/" + treatPath + "/" + treatPath + "_logon.shtml";
//url = "http://aemma.netfirms.com/aemma.org/onlineResources/" + treatPath + "/" + treatPath + "_logon.shtml";
parent.location.href = url;

//if (!libraryLogon || libraryLogon.closed)
//	{
//	// logon window has not been opened - first invokation
//	libraryLogon = window.open(logonWindow,"popLogon","toolbar=no,menubar=no,scrollbars=yes,height=350,width=450")
//	}
//else
//	{
//	// logon window is opened somewhere, bring it into focus
//	libraryLogon.close()
//	libraryLogon = window.open(logonWindow,"popLogon","toolbar=no,menubar=no,scrollbars=yes,height=350,width=450")
//	}
	//alert(treatPath);
	
} // end function libraryAccess

function libraryAccess2(treatPath)
{
var url;
url = "http://www.aemma.org/onlineResources/" + treatPath + "/" + treatPath + "_logon.shtml";
//url = "http://aemma.netfirms.com/aemma.org/onlineResources/" + treatPath + "/" + treatPath + "_logon.shtml";
location.href = url;
} // end function libraryAccess

