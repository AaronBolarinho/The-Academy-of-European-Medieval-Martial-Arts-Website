var picture_Window_rondel
function picture_rondel()
{
if (!picture_Window_rondel || picture_Window_rondel.closed)
	{
	// weapons entry window has not been opened - first invokation
	picture_Window_rondel = window.open("picture_rondel.htm","picture_rondel","toolbar=no,menubar=no,scrollbars=yes,height=548,width=364")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	picture_Window_rondel.focus()
	}
} // end function picture_rondel
