var entryWindow_liberi
function order_liberi()
{
if (!entryWindow_liberi || entryWindow_liberi.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_liberi = window.open("order_liberi.htm","books_liberi","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_liberi.focus()
	}
} // end function order_liberi
