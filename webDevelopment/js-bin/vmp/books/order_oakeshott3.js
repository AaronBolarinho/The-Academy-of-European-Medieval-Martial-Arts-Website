var entryWindow_oakeshott3
function order_oakeshott3()
{
if (!entryWindow_oakeshott3 || entryWindow_oakeshott3.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_oakeshott3 = window.open("order_oakeshott3.htm","books_oakeshott3","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_oakeshott3.focus()
	}
} // end function order_oakeshott3
