var entryWindow_clements
function order_clements()
{
if (!entryWindow_clements || entryWindow_clements.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_clements = window.open("order_clements.htm","books_clements","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_clements.focus()
	}
} // end function order_clements
