//
// determine the browser version and vendor, and put out the appropriate message
//
function whichBrowser() {
var major = parseInt(navigator.appVersion)
if (major == "4")
	{
	if (navigator.appName == "Netscape")
		{
		top.location = "index2.htm"
		}
	else if (navigator.appVersion.indexOf("MSIE") != -1)
		{
		alert("You appear to be running Microsoft Internet Explorer V4 or MSIE. There may be some incompatibilities with MSIE with respect to handling standard JavaScript.  Simply click on the 'Yes' button to bypass the error message windows should they appear in order to continue with the WEB process.  These errors will not have any effect on your surfing the AEMMA WEB site. We are in the process to correct the incompatibilities, please bear with us.")
		}
	}
else if (major == "3")
	{
	if (navigator.appName == "Netscape")
		{
		alert("You appear to be running Netscape Navigator V3. There may be some incompatibilities with this release of the Navigator with respect to handling new versions JavaScript.  Simply click on the 'OK' button to bypass the error message windows should they appear in order to continue with the WEB process.  These errors will not have any effect on your surfing the AEMMA WEB site. You can continue with this version of Navigator or click on the Netscape Communicator icon at the bottom of the home page, and then download the latest version of the Netscape Communicator. It's free!! We are in the process to correct the incompatibilities, please bear with us.")
		}
	else if (navigator.appVersion.indexOf("MSIE") != -1)
		{
		alert("You appear to be running Microsoft Internet Explorer V3 or MSIE. There may be some incompatibilities with this release of MSIE with respect to handling new versions JavaScript.  Simply click on the 'Yes' button to bypass the error message windows should they appear in order to continue with the WEB process.  These errors will not have any effect on your surfing the AEMMA WEB site. You can continue with this version of MSIE or click on the Microsoft Internet Explorer icon at the bottom of the home page, and then download the latest version of the Microsoft Internet Explorer. It's free!! We are in the process to correct the incompatibilities, please bear with us.")
		}
	}
else if (major == "2")
	{
	if (navigator.appName == "Netscape")
		{
		alert("You appear to be running Netscape Navigator V2. There are some incompatibilities with this release of the Navigator with respect to handling new versions JavaScript.  Simply click on the 'OK' button to bypass the error message windows should they appear in order to continue with the WEB process.  These errors will not have any effect on your surfing the AEMMA WEB site. You can continue with this version of Navigator or click on the Netscape Communicator icon at the bottom of the home page, and then download the latest version of the Netscape Communicator. It's free!! We are in the process to correct the incompatibilities, please bear with us.")
		}
	else if (navigator.appVersion.indexOf("MSIE") != -1)
		{
		alert("You appear to be running Microsoft Internet Explorer V2 or MSIE. There may be some incompatibilities with this release of MSIE with respect to handling new versions JavaScript.  Simply click on the 'Yes' button to bypass the error message windows should they appear in order to continue with the WEB process.  These errors will not have any effect on your surfing the AEMMA WEB site. You can continue with this version of MSIE or click on the Microsoft Internet Explorer icon at the bottom of the home page, and then download the latest version of the Microsoft Internet Explorer. It's free!! We are in the process to correct the incompatibilities, please bear with us.")
		}
	}
else
	{
	// the browser in use is really old, recommend a free upgrade
	//
	alert("You appear to be using a WEB browser that is 'really..really' old or unidentifiable!  You can continue with this browser or click on the 'Netscape Now' graphic at the bottom of the home page, and then download the latest version of the Netscape Communicator. It's free!!")
	}
//
// replace the initial window with the "real" home page
//
top.location = "index2.htm"

} // end of function: whichBrowser