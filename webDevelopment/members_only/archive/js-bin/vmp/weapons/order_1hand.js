var entryWindow_1hand
function order_1hand()
{
if (!entryWindow_1hand || entryWindow_1hand.closed)
	{
	// weapons entry window has not been opened - first invokation
	entryWindow_1hand = window.open("order_1hand.htm","weapons_1hand","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_1hand.focus()
	}
} // end function order_1hand
