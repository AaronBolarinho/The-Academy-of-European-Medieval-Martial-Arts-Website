var entryWindow_brown
function order_brown()
{
if (!entryWindow_brown || entryWindow_brown.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_brown = window.open("order_brown.htm","books_brown","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_brown.focus()
	}
} // end function order_brown
