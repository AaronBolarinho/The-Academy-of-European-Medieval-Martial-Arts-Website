var picture_Window_1hand
function picture_1hand()
{
if (!picture_Window_1hand || picture_Window_1hand.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_1hand = window.open("picture_1hand.htm","picture_1hand","toolbar=no,menubar=no,scrollbars=yes,height=548,width=364")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_1hand.focus()
	}
} // end function picture_1hand
