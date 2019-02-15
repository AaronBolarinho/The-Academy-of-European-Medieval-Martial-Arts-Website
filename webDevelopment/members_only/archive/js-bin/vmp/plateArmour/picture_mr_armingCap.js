var picture_Window_mr_armingCap
function picture_mr_armingCap()
{
if (!picture_Window_mr_armingCap || picture_Window_mr_armingCap.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_mr_armingCap = window.open("picture_mr_armingCap.htm","picture_mr_armingCap","toolbar=no,menubar=no,scrollbars=yes,height=310,width=230")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_mr_armingCap.focus()
	}
} // end function picture_mr_armingCap
