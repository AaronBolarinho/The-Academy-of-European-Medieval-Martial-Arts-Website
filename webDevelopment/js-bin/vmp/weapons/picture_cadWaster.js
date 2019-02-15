var picture_window_cadWaster
function picture_cadWaster()
{
if (!picture_window_cadWaster || picture_window_cadWaster.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_window_cadWaster = window.open("picture_cadWaster.htm","picture_cadWaster","toolbar=no,menubar=no,scrollbars=yes,height=450,width=276")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_window_cadWaster.focus()
	}
} // end function picture_cadWaster
