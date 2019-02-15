var entryWindow_swordDagger
function order_swordDagger()
{
if (!entryWindow_swordDagger || entryWindow_swordDagger.closed)
	{
	// weapons entry window has not been opened - first invokation
	entryWindow_swordDagger = window.open("order_swordDagger.htm","weapons_swordDagger","toolbar=no,menubar=no,scrollbars=yes,height=465,width=630")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_swordDagger.focus()
	}
} // end function order_swordDagger
