var picture_Window_JProndel
function picture_JProndel()
{
if (!picture_Window_JProndel || picture_Window_JProndel.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_JProndel = window.open("picture_JProndel.htm","picture_JProndel","toolbar=no,menubar=no,scrollbars=yes,height=520,width=580")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_JProndel.focus()
	}
} // end function picture_JProndel
