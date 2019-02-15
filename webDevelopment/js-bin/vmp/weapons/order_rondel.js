var entryWindow_rondel
function order_rondel()
{
if (!entryWindow_rondel || entryWindow_rondel.closed)
	{
	// weapons entry window has not been opened - first invokation
	entryWindow_rondel = window.open("order_rondel.htm","weapons_rondel","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_rondel.focus()
	}
} // end function order_rondel
