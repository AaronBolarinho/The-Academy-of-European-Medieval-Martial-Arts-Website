var pub_Window_kautz
function pub_kautz()
{
if (!pub_Window_kautz || pub_Window_kautz.closed)
	{
	// window has not been opened - first invokation
	pub_Window_kautz = window.open("kautz/cover.htm","pub_kautz","toolbar=no,menubar=no,scrollbars=yes,height=500,width=420")
	}
else
	{
	// picture window is opened somewhere, bring it into focus
	pub_Window_kautz.focus()
	}
} // end function pub_kautz
