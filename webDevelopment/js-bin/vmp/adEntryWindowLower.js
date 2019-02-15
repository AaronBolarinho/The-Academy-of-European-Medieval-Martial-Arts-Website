//
// This is the window used to allow vendors to enter details regarding their
// advertisement subscription for the VMP
//
var entryWindow_ad
function adEntryForm()
{
if (!entryWindow_ad || entryWindow_ad.closed)
	{
	// book entry window has not been opened - first invokation
	entryWindow_ad = window.open("../../adEntry.htm","adEntry","toolbar=no,menubar=no,scrollbars=yes,height=600,width=590")
	}
else
	{
	// book entry window is opened somewhere, bring it into focus
	entryWindow_ad.focus()
	}
} // end function adEntry

