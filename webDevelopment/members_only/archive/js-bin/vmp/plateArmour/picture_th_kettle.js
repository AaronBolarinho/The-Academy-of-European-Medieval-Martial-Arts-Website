var picture_Window_th_kettle
function picture_th_kettle()
{
if (!picture_Window_th_kettle || picture_Window_th_kettle.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_kettle = window.open("picture_th_kettle.htm","picture_th_kettle","toolbar=no,menubar=no,scrollbars=yes,height=630,width=530")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_kettle.focus()
	}
} // end function picture_th_kettle
