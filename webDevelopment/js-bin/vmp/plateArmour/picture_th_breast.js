var picture_Window_th_breast
function picture_th_breast()
{
if (!picture_Window_th_breast || picture_Window_th_breast.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_breast = window.open("picture_th_breast.htm","picture_th_breast","toolbar=no,menubar=no,scrollbars=yes,height=550,width=425")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_breast.focus()
	}
} // end function picture_th_breast
