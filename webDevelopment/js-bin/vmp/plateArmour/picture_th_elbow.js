var picture_Window_th_elbow
function picture_th_elbow()
{
if (!picture_Window_th_elbow || picture_Window_th_elbow.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_elbow = window.open("picture_th_elbow.htm","picture_th_elbow","toolbar=no,menubar=no,scrollbars=yes,height=440,width=740")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_elbow.focus()
	}
} // end function picture_th_elbow
