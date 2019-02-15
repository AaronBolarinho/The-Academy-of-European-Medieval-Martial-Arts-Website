var entryWindow_verbruggen
function order_verbruggen()
{
if (!entryWindow_verbruggen || entryWindow_verbruggen.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_verbruggen = window.open("order_verbruggen.htm","books_verbruggen","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_verbruggen.focus()
	}
} // end function order_verbruggen
