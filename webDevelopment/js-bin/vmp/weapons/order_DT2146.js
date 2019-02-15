var entryWindow_DT2146
function order_DT2146()
{
if (!entryWindow_DT2146 || entryWindow_DT2146.closed)
	{
	// weapons entry window has not been opened - first invokation
	entryWindow_DT2146 = window.open("order_DT2146.htm","weapons_DT2146","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_DT2146.focus()
	}
} // end function order_DT2146
