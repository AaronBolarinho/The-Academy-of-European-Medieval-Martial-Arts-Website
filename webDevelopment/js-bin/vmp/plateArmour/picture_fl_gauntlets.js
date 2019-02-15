var picture_Window_fl_gauntlets
function picture_fl_gauntlets()
{
if (!picture_Window_fl_gauntlets || picture_Window_fl_gauntlets.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_fl_gauntlets = window.open("picture_fl_gauntlets.htm","picture_fl_gauntlets","toolbar=no,menubar=no,scrollbars=yes,height=538,width=824")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_fl_gauntlets.focus()
	}
} // end function picture_fl_gauntlets
