//pop-up window script
var picture_details
function details()
{
if (!picture_details || picture_details.closed)
	{
	// details window has not been opened - first invokation
	picture_details = window.open("presentation_details.htm","details","toolbar=no,menubar=no,scrollbars=yes,height=600,width=600")
	}
else
	{
	// goliath window is opened somewhere, bring it into focus
	picture_details.focus()
	picturedetails = window.open("presentation_details.htm","details","toolbar=no,menubar=no,scrollbars=yes,height=600,width=600")
	}
} // end function details
function events()
{
if (!picture_details || picture_details.closed)
	{
	// details window has not been opened - first invokation
	picture_details = window.open("eventsDetails.htm","details","toolbar=no,menubar=no,scrollbars=yes,height=600,width=600")
	}
else
	{
	// goliath window is opened somewhere, bring it into focus
	picture_details.focus()
	picturedetails = window.open("eventsDetails.htm","details","toolbar=no,menubar=no,scrollbars=yes,height=600,width=600")
	}
} // end function events
function testimonials()
{
if (!picture_details || picture_details.closed)
	{
	// details window has not been opened - first invokation
	picture_details = window.open("testimonials.htm","details","toolbar=no,menubar=no,scrollbars=yes,height=600,width=550")
	}
else
	{
	// goliath window is opened somewhere, bring it into focus
	picture_details.focus()
	picturedetails = window.open("testimonials.htm","details","toolbar=no,menubar=no,scrollbars=yes,height=600,width=550")
	}
} // end function testimonials
function slovenia()
{
if (!picture_details || picture_details.closed)
	{
	// media window has not been opened - first invokation
	picture_details = window.open("../video/slovenianNews.htm","mediaBig","toolbar=no,menubar=no,scrollbars=yes,height=420,width=440")
	}
else
	{
	// media window is opened somewhere, bring it into focus
	picture_details.focus()
	picture_details = window.open("../video/slovenianNews.htm","mediaBig","toolbar=no,menubar=no,scrollbars=yes,height=460,width=440")
	}
} // end function slovenia
function timeline()
{
if (!picture_details || picture_details.closed)
	{
	// media window has not been opened - first invokation
	picture_details = window.open("../video/fairchildTV.htm","mediaBig","toolbar=no,menubar=no,scrollbars=yes,height=420,width=440")
	}
else
	{
	// media window is opened somewhere, bring it into focus
	picture_details.focus()
	picture_details = window.open("../video/fairchildTV.htm","mediaBig","toolbar=no,menubar=no,scrollbars=yes,height=460,width=440")
	}
} // end function timeline


