var picture_Window_th_legs
function picture_th_legs()
{
if (!picture_Window_th_legs || picture_Window_th_legs.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_legs = window.open("picture_th_legs.htm","picture_th_legs","toolbar=no,menubar=no,scrollbars=yes,height=630,width=630")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_legs.focus()
	}
} // end function picture_th_legs
