// updated: May 22, 2015
// global parameters
var popWin
function symWin(name)
{
//alert ("inside symWin with name="+name);
htmlWindow = name;
if (!popWin || popWin.closed)
	{
	// bio window has not been opened - first invokation
	popWin = window.open(htmlWindow,"symbolism","toolbar=no,menubar=no,scrollbars=yes,height=580,width=520")
	}
else
	{
	// bio window is opened somewhere, bring it into focus
	popWin.close()
	popWin = window.open(htmlWindow,"symbolism","toolbar=no,menubar=no,scrollbars=yes,height=580,width=520")
	}
} // end function bioWin

