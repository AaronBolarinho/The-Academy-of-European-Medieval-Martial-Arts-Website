// validate string entry
// updated: Feb 6, 2006
//

function stringCheck(inputString)
{

if (isBad(inputString))
	{
	alert("Warning: The text entered contains strings that are inappropriate / offensive / vacuous!  Please revise the text accordingly.");
	}
else
	{
	// do nothing
	}

} // end of function: stringCheck


// a general purpose function to see if there are any offensive words entered
// into the string.  the rest of the filtering function is handled by filter.pl
//
function isBad(inputString)
{
var localString			= inputString.toLowerCase();

if (
	(localString.indexOf("casino") != -1) || 
	(localString.indexOf("crap") != -1) || 
	(localString.indexOf("drug") != -1) || 
	(localString.indexOf("fuck") != -1) || 
	(localString.indexOf("gambling") != -1) || 
	(localString.indexOf("gottaoh") != -1) || 
	(localString.indexOf("holdem") != -1) || 
	(localString.indexOf("http") != -1) || 
	(localString.indexOf("ku.ku") != -1) || 	
	(localString.indexOf("mugo") != -1) || 	
	(localString.indexOf("mugu") != -1) || 
	(localString.indexOf("online") != -1) || 
	(localString.indexOf("pharmacy") != -1) || 
	(localString.indexOf("pharamacy") != -1) || 	
	(localString.indexOf("phentermine") != -1) || 	
	(localString.indexOf("poker") != -1) || 
	(localString.indexOf("porn") != -1) || 	
	(localString.indexOf("viagra") != -1) || 
	(localString.indexOf("xanax") != -1) || 
	(localString.indexOf("www") != -1))
	{
	return true;
	}
else
	{
	return false;
	}

} // end of function: isBad

