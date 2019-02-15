var entryWindow_amberger
function order_amberger()
{
if (!entryWindow_amberger || entryWindow_amberger.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_amberger = window.open("order_amberger.htm","books_amberger","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_amberger.focus()
	}
} // end function order_amberger
