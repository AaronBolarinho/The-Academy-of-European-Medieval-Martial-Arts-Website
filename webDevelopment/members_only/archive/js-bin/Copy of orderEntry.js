//
// retrieve ordering information, i.e. book title, author, unit price from online store
// and populate the relevant fields
//
var orderWindow

function orderEntry(form)
{
//
// resolve the form data, depending upon the item type
//
var item_type			= form.item_type.value

if (item_type == "book")
	{
	var item_requested	= form.title.value
	var publisher		= form.publisher.value
	var author		= form.author.value
	}

//
// create a new window, if it already doesn't exist, otherwise close it if it is opened somewhere
//
if (entryWindow || entryWindow.open)
	{
	entryWindow.close()
	}
//
// build the entry window HTML stuff and assign to the variable entryContent
// then write the contents of entryContent to the HTML document
//
var entryWindow = window.open("","","toolbar=no,scrollbars=no,height=600,width=560")
entryContent = "<HTML><HEAD><TITLE>VMP Order Entry</TITLE></HEAD>"
entryContent += "<BODY BGCOLOR='#FFFFFF' TEXT='#000000'>"
entryContent += "<form><table width='560' border='0' cellspacing='0' cellpadding='3'>"
entryContent += "	<tr><td align=right valign=middle bgcolor='#DDDDDD'><b><font face='arial,helvetica,sans-serif' size='-2'>Item Requested: </b></font><BR></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='60' VALUE='" + item_requested + '" MAXLENGTH='60' NAME='itemRequested'></td></tr>"
entryContent += "	<tr><td align=right valign=baseline bgcolor='#DDDDDD'><b><font face='arial,helvetica,sans-serif' size='-2'>Item Type: </b></font></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='12' VALUE='" + item_type + "' MAXLENGTH='12' NAME='itemType'></td></tr>"
entryContent += "	<tr><td align=right valign=baseline bgcolor='#DDDDDD'><b><font face='arial,helvetica,sans-serif' size='-2'>Quantity:  </b></font></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='4' VALUE='1' MAXLENGTH='4' NAME='quantity'>&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>@&nbsp;&nbsp;</b></font><INPUT TYPE='text' SIZE='10' VALUE='' MAXLENGTH='10' NAME='price'>&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>=</b>&nbsp;&nbsp;</font><INPUT TYPE='text' SIZE='12' VALUE='' MAXLENGTH='10' NAME='subTotal'><font face='arial,helvetica,sans-serif' size='-2'>&nbsp;&nbsp;(Shipping & Taxes not included)</td></tr>"
entryContent += "	<tr><td  bgcolor='#DDDDDD'>&nbsp;</font></td><td  bgcolor='#DDDDDD'>&nbsp;</font></td></tr>"
entryContent += "	<tr><td align=right valign=top>&nbsp;</td>"
entryContent += "	<td align=left valign=top><img src='../../images/required.gif' width=10 height=10 alt='Optional field' border=0>&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Optional field for non-North American destinations</font></td></tr>"
entryContent += "	<tr><td align=right valign=top><font face='arial,helvetica,sans-serif' size='-2'>E-Mail Address:<br>(userid@domain.com) </font></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='40' VALUE='' MAXLENGTH='60' NAME='email'></td></tr>"
entryContent += "	<tr><td align=right valign=baseline><font face='arial,helvetica,sans-serif' size='-2'>Name:  </font></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='40' VALUE='' MAXLENGTH='60' NAME='name'></td></tr>"
entryContent += "	<tr><td align=right valign=middle><font face='arial,helvetica,sans-serif' size='-2'>Address 1:</font></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='40' VALUE='' MAXLENGTH='40' NAME='street1'></td></tr>"
entryContent += "	<tr><td align=right valign=middle><img src='../../images/required.gif' width=10 height=10 alt='Optional field' border=0>&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Address 2:</font><BR></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='40' VALUE='' MAXLENGTH='40' NAME='street2'></td></tr>"
entryContent += "	<tr><td align=right valign=baseline><font face='arial,helvetica,sans-serif' size='-2'>City: </font></td>"
entryContent += "	<td align=left valign=middle><INPUT TYPE='text' SIZE='15' VALUE='' MAXLENGTH='22' NAME='city'>&nbsp;&nbsp;<img src='../../images/required.gif' width=10 height=10 alt='Optional field for non-North American destinations' border=0>&nbsp;<font face='arial,helvetica,sans-serif' size='-2'> Prov/State: </font>"
entryContent += "<SELECT NAME='prov_state'>
<OPTION selected value=''>&nbsp;</OPTION>
<OPTION value='AB'>Alberta</OPTION>
<OPTION value='BC'>British Columbia</OPTION>
<OPTION value='ON'>Ontario</OPTION>
<OPTION value='PQ'>Quebec</OPTION>
<OPTION value='PEI'>Prince Edward Island</OPTION>
<OPTION value='NF'>Newfoundland</OPTION>
<OPTION value='NS'>Nova Scotia</OPTION>
<OPTION value='NB'>New Brunswick</OPTION>
<OPTION value='SK'>Saskatchewan</OPTION>
<OPTION value='MN'>Manitoba</OPTION>
<OPTION value='YK'>Yukon Territory</OPTION>
<OPTION value='NY'>New York</OPTION>
<OPTION value='NH'>New Hampshire</OPTION>
<OPTION value='OI'>Ohio</OPTION>
<OPTION value='ME'>Maine</OPTION>
</SELECT></td></tr>"
entryContent += "	<tr><td align=right valign=middle><img src='../../images/required.gif' width=10 height=10 alt='Optional field' border=0>&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Postal Code/ZIP:</font></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='11' VALUE='' MAXLENGTH='11' NAME='postalCode'></td></tr>"
entryContent += "	<tr><td align=right valign=middle><font face='arial,helvetica,sans-serif' size='-2'>Country:</font></td>"
entryContent += "	<td align=left><INPUT TYPE='text' SIZE='30' VALUE='' MAXLENGTH='30' NAME='country'></td></tr>"
entryContent += "</table><br><center><input type='submit' name='button_submit' value='Submit Request'>&nbsp;<input type='reset' name='Clear all fields' value='Clear all fields'>&nbsp;<input type='button' name='cancel' value='Cancel' onClick='thisWindow.close()'>"
entryContent += "<p></form><b><i><font color='#CC3300'>Please wait a moment for confirmation of your book order entry request</font></i></b></center>"
entryContent += "</form></body></html>"

//
// write the HTML to the new window
//
entryWindow.document.write(entryContent)
entryWindow.document.close()	// close layout stream

// end of order entry window
}