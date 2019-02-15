var picture_Window_gambesonMRL
function picture_gambesonMRL()
{
if (!picture_Window_gambesonMRL || picture_Window_gambesonMRL.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_gambesonMRL = window.open("picture_gambesonMRL.htm","picture_gambesonMRL","toolbar=no,menubar=no,scrollbars=yes,height=310,width=210")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_gambesonMRL.focus()
	}
} // end function picture_gambesonMRL
