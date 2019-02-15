var entryWindow_davidson
function order_davidson()
{
if (!entryWindow_davidson || entryWindow_davidson.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_davidson = window.open("order_davidson.htm","books_davidson","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_davidson.focus()
	}
} // end function order_davidson
