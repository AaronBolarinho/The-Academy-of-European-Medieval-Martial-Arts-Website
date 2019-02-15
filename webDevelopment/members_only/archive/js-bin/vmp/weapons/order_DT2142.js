var entryWindow_DT2142
function order_DT2142()
{
if (!entryWindow_DT2142 || entryWindow_DT2142.closed)
	{
	// weapons entry window has not been opened - first invokation
	entryWindow_DT2142 = window.open("order_DT2142.htm","weapons_DT2142","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_DT2142.focus()
	}
} // end function order_DT2142
