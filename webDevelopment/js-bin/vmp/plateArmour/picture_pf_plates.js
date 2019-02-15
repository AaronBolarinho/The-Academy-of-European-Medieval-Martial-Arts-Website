var picture_Window_pf_plates
function picture_pf_plates()
{
if (!picture_Window_pf_plates || picture_Window_pf_plates.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_pf_plates = window.open("picture_pf_plates.htm","picture_pf_plates","toolbar=no,menubar=no,scrollbars=yes,height=370,width=255")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_pf_plates.focus()
	}
} // end function picture_pf_plates
