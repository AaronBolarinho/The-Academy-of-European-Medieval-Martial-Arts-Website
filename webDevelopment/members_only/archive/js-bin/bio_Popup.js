// updated: Feb 11, 2011
// global parameters
var popWin
function bioWin(name)
{
//alert ("inside bioWin with name="+name);
htmlWindow = "../misc/bios/bio_" + name + ".htm"
if (!popWin || popWin.closed)
	{
	// bio window has not been opened - first invokation
	popWin = window.open(htmlWindow,"bio","toolbar=no,menubar=no,scrollbars=yes,height=580,width=520")
	}
else
	{
	// bio window is opened somewhere, bring it into focus
	popWin.close()
	popWin = window.open(htmlWindow,"bio","toolbar=no,menubar=no,scrollbars=yes,height=580,width=520")
	}
} // end function bioWin
function bioWin_arms(name)
{
htmlWindow = "../../misc/bios/bio_" + name + ".htm"
if (!popWin || popWin.closed)
	{
	// bio window has not been opened - first invokation
	popWin = window.open(htmlWindow,"bio","toolbar=no,menubar=no,scrollbars=yes,height=580,width=520")
	}
else
	{
	// bio window is opened somewhere, bring it into focus
	popWin.close()
	popWin = window.open(htmlWindow,"bio","toolbar=no,menubar=no,scrollbars=yes,height=580,width=520")
	}
} // end function bioWin
function bioPop(dr,name,ht,wd)
{
//alert ("height="+ht+", width="+wd);
//alert ("inside bioWin with name="+name);
htmlWindow = dr + "/" + name
if (!popWin || popWin.closed)
	{
	// pop window has not been opened - first invokation
	popWin = window.open(htmlWindow,"pop","toolbar=no,menubar=no,scrollbars=yes,height="+ht+",width="+wd+"")
	}
else
	{
	// pop window is opened somewhere, bring it into focus
	popWin.close()
	popWin = window.open(htmlWindow,"pop","toolbar=no,menubar=no,scrollbars=yes,height="+ht+",width="+wd+"")
	}
} // end function newWin

