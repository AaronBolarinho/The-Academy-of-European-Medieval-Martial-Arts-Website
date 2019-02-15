var picture_Window_swordDagger
function picture_swordDagger()
{
if (!picture_Window_swordDagger || picture_Window_swordDagger.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_swordDagger = window.open("picture_swordDagger.htm","picture_swordDagger","toolbar=no,menubar=no,scrollbars=yes,height=548,width=364")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_swordDagger.focus()
	}
} // end function picture_swordDagger
