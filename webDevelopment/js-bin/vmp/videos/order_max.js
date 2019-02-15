var entryWindow_max
function order_max()
{
if (!entryWindow_max || entryWindow_max.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_max = window.open("order_max.htm","books_max","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_max.focus()
	}
} // end function order_max
