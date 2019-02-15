var entryWindow_hammerterz
function order_hammerterz(form)
{
if (!entryWindow_hammerterz || entryWindow_hammerterz.closed)
	{
	// magazine entry window has not been opened - first invokation
	entryWindow_hammerterz = window.open("order_hammerterz.htm","hammerterz","toolbar=no,menubar=no,scrollbars=no,height=465,width=618")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_hammerterz.focus()
	}
} // end function order_hammerterz
