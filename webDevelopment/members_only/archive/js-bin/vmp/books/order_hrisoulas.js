var entryWindow_hrisoulas
function order_hrisoulas()
{
if (!entryWindow_hrisoulas || entryWindow_hrisoulas.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_hrisoulas = window.open("order_hrisoulas.htm","books_hrisoulas","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_hrisoulas.focus()
	}
} // end function order_hrisoulas
