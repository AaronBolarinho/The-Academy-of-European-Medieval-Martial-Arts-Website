var picture_Window_th_arms
function picture_th_arms()
{
if (!picture_Window_th_arms || picture_Window_th_arms.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_th_arms = window.open("picture_th_arms.htm","picture_th_arms","toolbar=no,menubar=no,scrollbars=yes,height=518,width=620")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_th_arms.focus()
	}
} // end function picture_th_arms
