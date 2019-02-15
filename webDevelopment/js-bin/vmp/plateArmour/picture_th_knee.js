var picture_Window_th_knee
function picture_th_knee()
{
if (!picture_Window_th_knee || picture_Window_th_knee.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_knee = window.open("picture_th_knee.htm","picture_th_knee","toolbar=no,menubar=no,scrollbars=yes,height=520,width=660")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_knee.focus()
	}
} // end function picture_th_knee
