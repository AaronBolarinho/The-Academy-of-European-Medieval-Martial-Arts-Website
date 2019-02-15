// global parameters
var libraryLogon
function libraryAccess(treatPath)
{
logonWindow = "http://www.aemma.org/onlineResources/" + treatPath + "/" + treatPath + "_logon.shtml"
if (!libraryLogon || libraryLogon.closed)
	{
	// logon window has not been opened - first invokation
	libraryLogon = window.open(logonWindow,"popLogon","toolbar=no,menubar=no,scrollbars=yes,height=350,width=450")
	}
else
	{
	// logon window is opened somewhere, bring it into focus
	libraryLogon.close()
	libraryLogon = window.open(logonWindow,"popLogon","toolbar=no,menubar=no,scrollbars=yes,height=350,width=450")
	}
	//alert(treatPath);
	
} // end function libraryAccess
