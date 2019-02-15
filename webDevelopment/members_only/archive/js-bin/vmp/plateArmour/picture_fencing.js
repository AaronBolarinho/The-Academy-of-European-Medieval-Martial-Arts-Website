var picture_Window_fencing
function picture_fencing()
{
if (!picture_Window_fencing || picture_Window_fencing.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_fencing = window.open("picture_fencing.htm","picture_fencing","toolbar=no,menubar=no,scrollbars=yes,height=430,width=380")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_fencing.focus()
	}
} // end function picture_fencing
