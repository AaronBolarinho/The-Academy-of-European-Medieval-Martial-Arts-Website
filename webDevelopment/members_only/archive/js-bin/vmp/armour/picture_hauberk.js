var picture_Window_hauberk
function picture_hauberk()
{
if (!picture_Window_hauberk || picture_Window_hauberk.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_hauberk = window.open("picture_hauberk.htm","picture_hauberk","toolbar=no,menubar=no,scrollbars=yes,height=400,width=320")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_hauberk.focus()
	}
} // end function picture_hauberk
