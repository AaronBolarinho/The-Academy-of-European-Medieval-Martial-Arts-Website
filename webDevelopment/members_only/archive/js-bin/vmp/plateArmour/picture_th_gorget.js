var picture_Window_th_gorget
function picture_th_gorget()
{
if (!picture_Window_th_gorget || picture_Window_th_gorget.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_gorget = window.open("picture_th_gorget.htm","picture_th_gorget","toolbar=no,menubar=no,scrollbars=yes,height=480,width=500")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_gorget.focus()
	}
} // end function picture_th_gorget
