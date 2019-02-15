var entryWindow_hrisoutlas
function order_hrisoutlas()
{
if (!entryWindow_hrisoutlas || entryWindow_hrisoutlas.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_hrisoutlas = window.open("order_hrisoutlas.htm","books_hrisoutlas","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_hrisoutlas.focus()
	}
} // end function order_hrisoutlas
