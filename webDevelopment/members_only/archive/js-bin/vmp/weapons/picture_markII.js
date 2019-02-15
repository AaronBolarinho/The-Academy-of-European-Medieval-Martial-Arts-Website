var picture_Window_markII
function picture_markII()
{
if (!picture_Window_markII || picture_Window_markII.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_markII = window.open("picture_markII.htm","picture_markII","toolbar=no,menubar=no,scrollbars=yes,height=260,width=276")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_markII.focus()
	}
} // end function picture_markII
