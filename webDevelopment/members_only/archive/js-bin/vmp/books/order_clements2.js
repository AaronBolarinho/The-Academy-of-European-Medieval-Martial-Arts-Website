var entryWindow_clements2
function order_clements2()
{
if (!entryWindow_clements2 || entryWindow_clements2.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_clements2 = window.open("order_clements2.htm","books_clements2","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_clements2.focus()
	}
} // end function order_clements2
