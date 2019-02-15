var picture_Window_th_gauntlets
function picture_th_gauntlets()
{
if (!picture_Window_th_gauntlets || picture_Window_th_gauntlets.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_gauntlets = window.open("picture_th_gauntlets.htm","picture_th_gauntlets","toolbar=no,menubar=no,scrollbars=yes,height=475,width=500")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_gauntlets.focus()
	}
} // end function picture_th_gauntlets
