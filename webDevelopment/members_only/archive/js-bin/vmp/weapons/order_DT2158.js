var entryWindow_DT2158
function order_DT2158()
{
if (!entryWindow_DT2158 || entryWindow_DT2158.closed)
	{
	// weapons entry window has not been opened - first invokation
	entryWindow_DT2158 = window.open("order_DT2158.htm","weapons_DT2158","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_DT2158.focus()
	}
} // end function order_DT2158
