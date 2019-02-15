var entryWindow_talh
function order_talh()
{
if (!entryWindow_talh || entryWindow_talh.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_talh = window.open("order_talhoffer.htm","books_talh","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_talh.focus()
	}
} // end function order_talh
