var picture_Window_paddedCoif
function picture_paddedCoif()
{
if (!picture_Window_paddedCoif || picture_Window_paddedCoif.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_paddedCoif = window.open("picture_paddedCoif.htm","picture_paddedCoif","toolbar=no,menubar=no,scrollbars=yes,height=290,width=290")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_paddedCoif.focus()
	}
} // end function picture_paddedCoif
