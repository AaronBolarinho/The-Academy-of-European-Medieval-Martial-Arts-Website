var picture_Window_gambeson
function picture_gambeson()
{
if (!picture_Window_gambeson || picture_Window_gambeson.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_gambeson = window.open("picture_gambeson.htm","picture_gambeson","toolbar=no,menubar=no,scrollbars=yes,height=310,width=210")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_gambeson.focus()
	}
} // end function picture_gambeson
