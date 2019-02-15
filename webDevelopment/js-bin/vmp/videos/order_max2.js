var entryWindow_max2
function order_max2()
{
if (!entryWindow_max2 || entryWindow_max2.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_max2 = window.open("order_max2.htm","books_max2","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_max2.focus()
	}
} // end function order_max2	
