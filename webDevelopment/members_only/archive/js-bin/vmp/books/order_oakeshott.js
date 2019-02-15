var entryWindow_oakeshott
function order_oakeshott()
{
if (!entryWindow_oakeshott || entryWindow_oakeshott.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_oakeshott = window.open("order_oakeshott.htm","books_oakeshott","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_oakeshott.focus()
	}
} // end function order_oakeshott
