var picture_Window_th_greaves
function picture_th_greaves()
{
if (!picture_Window_th_greaves || picture_Window_th_greaves.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_greaves = window.open("picture_th_greaves.htm","picture_th_greaves","toolbar=no,menubar=no,scrollbars=yes,height=630,width=630")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_greaves.focus()
	}
} // end function picture_th_greaves
