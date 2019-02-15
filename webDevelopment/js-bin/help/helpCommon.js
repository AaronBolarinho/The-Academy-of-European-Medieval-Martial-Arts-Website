// global parameters
var helpWindow_mmaf
var helpWindow_w2w
var helpWindow_eClass

//
// help window, specific for help type
//
function help(type)
{
if (type == "mmaf")
	{
	if (!helpWindow_mmaf || helpWindow_mmaf.closed)
		{
		helpWindow_mmaf=window.open("http://www.aemma.org/help/mmaf.htm","helpWin_mmaf","toolbar=no,scrollbars=yes,height=400,width=300")
		}
	else
		{
		// choosing help window already opened; bring it into focus
		helpWindow_mmaf.focus()
		}
	}
else if (type == "mmaf2")
	{
	if (!helpWindow_mmaf || helpWindow_mmaf.closed)
		{
		helpWindow_mmaf=window.open("http://www.aemma.org/help/mmaf.htm","helpWin_mmaf","toolbar=no,scrollbars=yes,height=400,width=300")
		}
	else
		{
		// choosing help window already opened; bring it into focus
		helpWindow_mmaf.focus()
		}
	}
else if (type == "w2w")
	{
	if (!helpWindow_w2w || helpWindow_w2w.closed)
		{
		helpWindow_w2w=window.open("http://www.aemma.org/help/w2w.htm","helpWin_w2w","toolbar=no,scrollbars=yes,height=400,width=300")
		}
	else
		{
		// choosing help window already opened; bring it into focus
		helpWindow_w2w.focus()
		}
	}
else if (type == "eClass")
	{
	if (!helpWindow_eClass || helpWindow_eClass.closed)
		{
		helpWindow_eClass=window.open("http://www.aemma.org/help/eClassifiedLeftHelp.htm","helpWin_eClass","toolbar=no,scrollbars=yes,height=400,width=300")
		}
	else
		{
		// choosing help window already opened; bring it into focus
		helpWindow_eClass.focus()
		}
	}
else
	{
	// do nothing
	}
} // end of function: help