var picture_Window_phGreatSword
function picture_phGreatSword()
{
if (!picture_Window_phGreatSword || picture_Window_phGreatSword.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_phGreatSword = window.open("picture_phGreatSword.htm","picture_phGreatSword","toolbar=no,menubar=no,scrollbars=yes,height=325,width=445")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_phGreatSword.focus()
	}
} // end function picture_phGreatSword
