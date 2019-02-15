//
// retrieve ordering information, i.e. book title, author, unit price from online store
// and populate the relevant fields
//
var entryWindow
function windowPrint(form)
{
alert("print function")
}

function orderEntry(form)
{
//
// resolve the form data, depending upon the item type
//
var item_type		= form.item_type.value
var quantity		= form.quantity.value
var mailer		= form.mailer.value		// "1" indicates to mail to AEMMA, "0" = other
var mailerHeader	= "<tr><td colspan=2><font face='arial,helvetic' size=-2><b>Note: </b>In order to process your request, you must print this form and mail with this form, a $US money order of the above amount to: <b>"
var mailerTrailer	= "</font></td></tr>"
var shippingTaxes	= form.shippingTaxes.value	// contains text if shipping and/or taxes not included
//var tempcontent = ""

//
// resolve the mailing address printed on the order entry form
//
if (mailer == 1)
	{
	var mailerName = "A.E.M.M.A.,"
	var mailerAddress = mailerHeader + mailerName + "</b>&nbsp;401-159&nbsp;Frederick&nbsp;St.,&nbsp;Toronto,&nbsp;ON&nbsp;&nbsp;M5A&nbsp;4P1,&nbsp;Canada" + mailerTrailer
	}
else
	{
	var mailerAddress = mailerHeader + form.mailerName.value + ", </b>" + form.mailerAddress.value + mailerTrailer
	}

if (item_type == "book" | item_type == "magazine" | item_type == "video")
	{
	var item_requested = form.title.value
	if (item_type == "book")
		{
		var publisher		= form.publisher.value
		var isbn		= form.isbn.value
		var author		= form.author.value
		var unit_price		= form.unit_price.value
		var sub_total		= quantity * unit_price
		var confirmationMessage	= "Please wait a moment for confirmation of your book order entry request"
		}
	else if (item_type == "magazine")
		{
		var publisher		= form.publisher.value
		var unit_price1		= form.unit_price1.value
		var sub_total		= quantity * unit_price1
		var unit_price2		= form.unit_price2.value
		var confirmationMessage	= "Please wait a moment for confirmation of your magazine order entry request"
		}
	else if (item_type == "video")
		{
		var producer		= form.publisher.value
		var unit_price1		= form.unit_price1.value
		var sub_total		= quantity * unit_price1
		var unit_price2		= form.unit_price2.value
		var confirmationMessage	= "Please wait a moment for confirmation of your video order entry request"
		}

	else
		{
		// do something later
		}
	}
else
	{
	// do something later
	}

//
// create a new window, if it already doesn't exist, otherwise close it if it is opened somewhere
//
if (!entryWindow || entryWindow.closed)
	{
	entryWinNeeded	= 1
	}
else
	{
//	alert("entry window exists somewhere")
	entryWindow.focus()
	entryWindow.form.itemRequested.value = item_number
	entryWinNeeded = 0
	}
//
// build the entry window HTML stuff and assign to the variable entryContent
// then write the contents of entryContent to the HTML document
//
if (entryWinNeeded) {
entryWindow = window.open("","entryForm","toolbar=no,menubar=yes,scrollbars=yes,height=470,width=628")
entryContent = "<HTML><HEAD><TITLE>A.E.M.M.A. Virtual Market Place Order Entry</TITLE></HEAD>"
entryContent += "<BODY BGCOLOR='#FFFFFF' TEXT='#000000'>"
entryContent += "<script language='javascript'>windowPrint(form){;alert('inside print function')}</script>"
entryContent += "<form><table width='560' border='0' cellspacing='0' cellpadding='3'>"
entryContent += "	<tr><td align=right valign=middle bgcolor='#DDDDDD'><b><font face='arial,helvetica,sans-serif' size='-2'>Item Requested: </b></font><BR></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='60' VALUE='" + item_requested + "' MAXLENGTH='60' NAME='itemRequested'></td></tr>"
entryContent += "	<tr><td align=right valign=baseline bgcolor='#DDDDDD'><b><font face='arial,helvetica,sans-serif' size='-2'>Item Type: </b></font></td>"
	if (item_type == "book")
		{
		entryContent += "	<td align=left valign=middle><INPUT TYPE='text' SIZE='12' VALUE='" + item_type + "' MAXLENGTH='12' NAME='itemType'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font face='arial,helvetica,sans-serif' size='-2'>ISBN: </b></font><INPUT TYPE='text' SIZE='13' VALUE='" + isbn + "' MAXLENGTH='13' NAME='isbn'></td></tr>"
		tempContent = "	<td align=left valign=top><INPUT TYPE='text' SIZE='4' VALUE='" + quantity + "' MAXLENGTH='4' NAME='quantity' onChange='changeQuantity(this.form)'>&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>@&nbsp;&nbsp;</b></font><INPUT TYPE='text' SIZE='10' VALUE='" + "$" + unit_price + "' MAXLENGTH='10' NAME='price'>&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>=</b>&nbsp;&nbsp;</font><INPUT TYPE='text' SIZE='12' VALUE='" + "$" + sub_total + "' MAXLENGTH='10' NAME='subTotal'><font face='arial,helvetica,sans-serif' size='-2'>&nbsp;&nbsp;" + shippingTaxes + "</td></tr>"
		}
	else if (item_type == "magazine")
		{
		tempContent = "	<td align=left valign=middle><INPUT TYPE='text' SIZE='4' VALUE='" + quantity + "' MAXLENGTH='4' NAME='quantity' onChange='changeQuantity(this.form)'>&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>@&nbsp;&nbsp;</b></font><INPUT TYPE='text' SIZE='10' VALUE='" + "$" + unit_price1 + "' MAXLENGTH='10' NAME='price'>&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>=</b>&nbsp;&nbsp;</font><INPUT TYPE='text' SIZE='12' VALUE='" + "$" + sub_total + "' MAXLENGTH='10' NAME='subTotal'><font face='arial,helvetica,sans-serif' size='-2'>&nbsp;&nbsp;" + shippingTaxes + "</td></tr>"

		if (unit_price2 != "NA")
			{
			entryContent += "	<td align=left valign=middle><INPUT TYPE='text' SIZE='12' VALUE='" + item_type + "' MAXLENGTH='12' NAME='itemType'>&nbsp;&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Subscription Selection:&nbsp;<input type='radio' name='radio' value='1-year' checked>&nbsp;1-year&nbsp;&nbsp;<input type='radio' name='radio' value='2-year'>&nbsp;2-year</font></td></tr>"
			}
		else
			{
			entryContent += "	<td align=left valign=middle><INPUT TYPE='text' SIZE='12' VALUE='" + item_type + "' MAXLENGTH='12' NAME='itemType'>&nbsp;&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Subscription Selection:&nbsp;<input type='radio' name='radio' value='1-year' checked>&nbsp;1-year</font></td></tr>"
			}
		}
	else if (item_type == "video")
		{
		tempContent = "	<td align=left valign=middle><INPUT TYPE='text' SIZE='4' VALUE='" + quantity + "' MAXLENGTH='4' NAME='quantity' onChange='changeQuantity(this.form)'>&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>@&nbsp;&nbsp;</b></font><INPUT TYPE='text' SIZE='10' VALUE='" + "$" + unit_price1 + "' MAXLENGTH='10' NAME='price'>&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-1'><b>=</b>&nbsp;&nbsp;</font><INPUT TYPE='text' SIZE='12' VALUE='" + "$" + sub_total + "' MAXLENGTH='10' NAME='subTotal'><font face='arial,helvetica,sans-serif' size='-2'>&nbsp;&nbsp;" + shippingTaxes + "</td></tr>"
		entryContent += "	<td align=left valign=middle><INPUT TYPE='text' SIZE='12' VALUE='" + item_type + "' MAXLENGTH='12' NAME='itemType'>&nbsp;&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Video Standard Selection:&nbsp;<input type='radio' name='radio' value='VHS NTSC' checked>&nbsp;VHS NTSC&nbsp;<input type='radio' name='radio' value='VHS PAL'>&nbsp;VHS PAL</font></td></tr>"
		}
	else
		{
		entryContent += "	<td align=left valign=middle><INPUT TYPE='text' SIZE='12' VALUE='" + item_type + "' MAXLENGTH='12' NAME='itemType'></td></tr>"
		}
entryContent += "	<tr><td align=right valign=baseline bgcolor='#DDDDDD'><b><font face='arial,helvetica,sans-serif' size='-2'>Quantity:  </b></font></td>"
entryContent += tempContent
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
entryContent += "<SELECT NAME='prov_state'><OPTION selected value=''>&nbsp;</OPTION><option value='AL'>ALABAMA</option><option value='AB'>ALBERTA</option><option value='AK'>ALASKA</option><option value='AS'>AMERICAN SAMOA</option><option value='AZ'>ARIZONA</option><option value='AR'>ARKANSAS</option><option value='BC'>BRITISH COLUMBIA</option><option value='CA'>CALIFORNIA</option><option value='CO'>COLORADO</option><option value='CT'>CONNECTICUT</option><option value='DE'>DELAWARE</option><option value='DC'>DISTRICT OF COLUMBIA</option><option value='FM'>FEDERATED STATES OF MICRONESIA</option><option value='FL'>FLORIDA</option><option value='GA'>GEORGIA</option><option value='GU'>GUAM</option><option value='HI'>HAWAII</option><option value='ID'>IDAHO</option><option value='IL'>ILLINOIS</option><option value='IN'>INDIANA</option><option value='IA'>IOWA</option><option value='KS'>KANSAS</option><option value='KY'>KENTUCKY</option><option value='LA'>LOUISIANA</option><option value='ME'>MAINE</option><option value='MB'>MANITOBA</option><option value='MH'>MARSHALL ISLANDS</option><option value='MD'>MARYLAND</option><option value='MA'>MARYLAND</option><option value='MI'>MICHIGAN</option><option value='MN'>MINNESOTA</option><option value='MS'>MISSISSIPPI</option><option value='MO'>MISSOURI</option><option value='MT'>MONTANA</option><option value='NE'>NEBRASKA</option><option value='NB'>NEW BRUNSWICK</option><option value='NF'>NEWFOUNDLAND</option><option value='NV'>NEVADA</option><option value='NH'>NEW HAMPSHIRE</option><option value='NJ'>NEW JERSEY</option><option value='NM'>NEW MEXICO</option><option value='NY'>NEW YORK</option><option value='NC'>NORTH CAROLINA</option><option value='ND'>NORTH DAKOTA</option><option value='MP'>NORTHERN MARIANA ISLANDS</option><option value='NT'>NORTHWEST TERRITORY</option><option value='OH'>OHIO</option><option value='OK'>OKLAHOMA</option><option value='ON'>ONTARIO</option><option value='OR'>OREGON</option><option value='PW'>PALAU</option><option value='PA'>PENNSYLVANIA</option><option value='PE'>PRINCE EDWARD ISLAND</option><option value='PR'>PUERTO RICO</option><option value='QC'>QUEBEC</option><option value='RI'>RHODE ISLAN</option><option value='SK'>SASKATCHEWAN</option><option value='SC'>SOUTH CAROLINA</option><option value='SD'>SOUTH DAKOTA</option><option value='TN'>TENNESSEE</option><option value='TX'>TEXAS</option><option value='UT'>UTAH</option><option value='VT'>VERMONT</option><option value='VI'>VIRGIN ISLANDS</option><option value='VA'>VIRGINIA</option><option value='WA'>WASHINGTON</option><option value='WV'>WEST VIRGINIA</option><option value='WI'>WISCONSIN</option><option value='WY'>WYOMING</option><option value='YK'>YUKON</option></SELECT></td></tr>"
entryContent += "	<tr><td align=right valign=middle><img src='../../images/required.gif' width=10 height=10 alt='Optional field' border=0>&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Postal Code/ZIP:</font></td>"
entryContent += "	<td align=left valign=top><INPUT TYPE='text' SIZE='11' VALUE='' MAXLENGTH='11' NAME='postalCode'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial,helvetica,sans-serif' size='-2'>Country:&nbsp;</font><SELECT NAME='country'><OPTION selected value='CAN'>Canada</OPTION><OPTION value='USA'>United States</OPTION><OPTION value='other'>Other</OPTION></SELECT></td></tr>"
entryContent += mailerAddress
entryContent += "</table><center><br><input type='button' name='button_submit' value='Submit Entry & Print' onClick='windowPrint(this.form)'>&nbsp;<input type='reset' name='Clear all fields' value='Clear all fields'>&nbsp;<input type='submit' name='cancel' value='Cancel' onClick='self.close()'></center>"
entryContent += "</form><b><i><center><font color='#CC3300'>" + confirmationMessage + "</font></i></b></center>"
entryContent += "</body></html>"
//
// write the HTML to the new window
//
entryWindow.document.write(entryContent)
entryWindow.document.close()	// close layout stream
} // end of if statement

// end of order entry window
//
} // end of function: orderEntry