<?php
$ip = $_SERVER['REMOTE_ADDR'];
//echo "<font face='Verdana' size='1'><b>IP Address#= $ip</b>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
   <!-- XHTML conversion - Nov 7, 2008 -->
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="stylesheet" type="text/css" href="../misc/css/default_page.css" />
   <link rel="shortcut icon" href="../images/shield_tiny.gif" />
   <script src="../js-bin/stringCheck.js"></script>
  <title>AEMMA Guest Book Add Form</title>
</head>
<body>
<blockquote>
<!-- begin page header -->
<center><table width="700" cellpadding="3" cellspacing="0" border="0">
<tr bgcolor="#461B7E">
	<td class="purplebar">&nbsp;AEMMA Guest Book Sign-in Form</td>
</tr></table></center>
<!-- end page header -->

<p><center><form action="http://aemma.netfirms.com/cgi-bin/GB_gbgb/guestbook_V3.cgi" method="post">
<table width="700" cellpadding="3" border="0">
<tr>
	<td align="right" width="150"><img src="../images/gb_im1.jpg" alt="" /></td>
	<td align="left"><input type="text" name="im1" size="30"  onChange="stringCheck(value)"></td>
</tr>
<tr>
	<td align=right  width="150"><img src="../images/gb_im2.jpg" alt="" /></td>
	<td align="left"><input type="text" name="im2" size="30" value=""  onChange="stringCheck(value)"></td>
</tr>
<tr>
	<td align="right" width="150"><img src="../images/gb_im3.jpg" alt="" /></td>
	<td align="left"><input type="text" name="im3"  onChange="stringCheck(value)"></td>
</tr>
<tr>
	<td align="right" width="150"><img src="../images/gb_im4.jpg" alt="" /></td>
	<td align="left"><select name="im4">
	<option value="0" selected>Prov/State/Region</option>
	<option value="Alabama">ALABAMA</option>
	<option value="Alberta">ALBERTA</option>
	<option value="Alaska">ALASKA</option>
	<option value="American Samoa">AMERICAN SAMOA</option>
	<option value="Arizona">ARIZONA</option>
	<option value="Arkansas">ARKANSAS</option>
	<option value="British Columbia">BRITISH COLUMBIA</option>
	<option value="California">CALIFORNIA</option>
	<option value="Colorado">COLORADO</option>
	<option value="Connecticut">CONNECTICUT</option>
	<option value="Delaware">DELAWARE</option>
	<option value="District of Columbia">DISTRICT OF COLUMBIA</option>
	<option value="Florida">FLORIDA</option>
	<option value="Georgia">GEORGIA</option>
	<option value="Guam">GUAM</option>
	<option value="Hawaii">HAWAII</option>
	<option value="Idaho">IDAHO</option>
	<option value="Illinois">ILLINOIS</option>
	<option value="Indiana">INDIANA</option>
	<option value="Iowa">IOWA</option>
	<option value="Kansas">KANSAS</option>
	<option value="Kentucky">KENTUCKY</option>
	<option value="Louisiana">LOUISIANA</option>
	<option value="Maine">MAINE</option>
	<option value="Manitoba">MANITOBA</option>
	<option value="Marshall Islands">MARSHALL ISLANDS</option>
	<option value="Maryland">MARYLAND</option>
	<option value="Massachusetts">MASSACHUSETTS</option>
	<option value="Michigan">MICHIGAN</option>
	<option value="Minnesota">MINNESOTA</option>
	<option value="Mississippi">MISSISSIPPI</option>
	<option value="Missouri">MISSOURI</option>
	<option value="Montana">MONTANA</option>
	<option value="Nebraska">NEBRASKA</option>
	<option value="New Brunswick">NEW BRUNSWICK</option>
	<option value="Newfoundland">NEWFOUNDLAND</option>
	<option value="Nevada">NEVADA</option>
	<option value="New Hampshire">NEW HAMPSHIRE</option>
	<option value="New Jersey">NEW JERSEY</option>
	<option value="New Mexico">NEW MEXICO</option>
	<option value="New York">NEW YORK</option>
	<option value="North Carolina">NORTH CAROLINA</option>
	<option value="North Dakota">NORTH DAKOTA</option>
	<option value="Northwest Territory">NORTHWEST TERRITORY</option>
	<option value="Nova Scotia">NOVA SCOTIA</option>
	<option value="Ohio">OHIO</option>
	<option value="Oklahoma">OKLAHOMA</option>
	<option value="Ontario">ONTARIO</option>
	<option value="Oregon">OREGON</option>
	<option value="Palau">PALAU</option>
	<option value="Pennsylvania">PENNSYLVANIA</option>
	<option value="Prince Edward Island">PRINCE EDWARD ISLAND</option>
	<option value="Puerto Rico">PUERTO RICO</option>
	<option value="Quebec">QUEBEC</option>
	<option value="Rhode Island">RHODE ISLAND</option>
	<option value="Saskatchewan">SASKATCHEWAN</option>
	<option value="South Carolina">SOUTH CAROLINA</option>
	<option value="South Dakota">SOUTH DAKOTA</option>
	<option value="Tennessee">TENNESSEE</option>
	<option value="Texas">TEXAS</option>
	<option value="Utah">UTAH</option>
	<option value="Vermont">VERMONT</option>
	<option value="Virgin Islands">VIRGIN ISLANDS</option>
	<option value="Virginia">VIRGINIA</option>
	<option value="Washington">WASHINGTON</option>
	<option value="West Virginia">WEST VIRGINIA</option>
	<option value="Wisconsin">WISCONSIN</option>
	<option value="Wyoming">WYOMING</option>
	<option value="Yukon">YUKON</option>
	</select></td>
</tr>
<tr>
	<td align="right" width="150"><font color="#CC3300" size="-2"><b>Enter prov/state/region<br />here if not on list ==></b></font></td>
	<td align="left"><input type="text" name="otherProv" size="19"  onChange="stringCheck(value)"></td>
</tr>
<tr>
	<td align="right" width="150"><img src="../images/gb_im5.jpg" alt="" /></td>
	<td align="left"><select name="im5">
	<option selected value="0">Country</option>
	<option value="Australia">Australia</option>
	<option value="Austria">Austria</option>
	<option value="Belgium">Belgium</option>
	<option value="Brasil">Brasil</option>
	<option value="Canada">Canada</option>
	<option value="Chile">Chile</option>
	<option value="Czech Republic">Czech Republic</option>
	<option value="Finland">Finland</option>
	<option value="France">France</option>
	<option value="Germany">Germany</option>
	<option value="Great Britain">Great Britian</option>
	<option value="India">India</option>
	<option value="Ireland">Ireland</option>
	<option value="Italy">Italy</option>
	<option value="Japan">Japan</option>
	<option value="Lithuania">Lithuania</option>
	<option value="Malta">Malta</option>
	<option value="Mexico">Mexico</option>
	<option value="Netherlands">Netherlands</option>
	<option value="New Zealand">New Zealand</option>
	<option value="Norway">Norway</option>
	<option value="Poland">Poland</option>
	<option value="Portugal">Portugal</option>
	<option value="Russia">Russia</option>
	<option value="Scotland">Scotland</option>
	<option value="Slovakia">Slovakia</option>
	<option value="Slovenia">Slovenia</option>
	<option value="South Africa">South Africa</option>
	<option value="Sweden">Sweden</option>
	<option value="Switzerland">Switzerland</option>
	<option value="Ukraine">Ukraine</option>
	<option value="USA">USA</option>
	<option value="Zimbabwe">Zimbabwe</option>
	</select></td>
</tr>
<tr>
	<td align="right" width="150"><font color="#CC3300" size="-2"><b>Enter country here<br />if not on list ==></b></font></td>
	<td align="left"><input type="text" name="other" size="19"  onChange="stringCheck(value)"></td>
</tr>
<tr>
	<td colspan="2" align="left"><img src="../images/gb_im6.jpg" alt="" /></td>
</tr>
<tr>
	<td colspan="2" align="left"><textarea name="yz2" wrap="virtual" rows="4" cols="60" value=""  onChange="stringCheck(value)"></textarea></td>
</tr>
<tr>
	<td colspan="2" align="left">Would you like someone to contact you?&nbsp;&nbsp;<b><input type="radio" name="contact" value="1"> Yes&nbsp;<input type="radio" name="contact" value="0" CHECKED> No</b><br />&nbsp;</td>
</tr>
<tr>
	<td colspan="2" align="left"><b>Privacy and Confidentiality</b><p align="justify">The guest understands that the information collected in this online guestbook form is for the sole purpose for the inclusion and presentation online in the <b>AEMMA</b> guestbook. The comments entered will not be edited nor changed by <b>AEMMA</b> and will be included in the guestbook as is, provided it successfully passes filter processes which shall reject entries of inappropriate content. </p>
	<p align="justify">The guestbook entry which includes their <b>email address</b> submitted by the guest shall not be used for the purpose of promoting products and/or services of any kind by <b>AEMMA</b>.  Once the entry becomes available online, <b>AEMMA</b> cannot provide any guarantees on the safe and/or consented usage of the information displayed in the public Internet on the <b>AEMMA</b> website and therefore is released from all accountability in that regard. By virtue of your submitting a guestbook entry, <b>AEMMA</b> will assume that the guest is in agreement.</p>
	<p align="justify">For additional details on the <b>AEMMA</b> Privacy and Security Policy, in particular, how <b>AEMMA</b> handles the presentation of email addresses on the <b>AEMMA</b> website, click <a href="../misc/privacy.htm"><b>here</b></a>.<br />&nbsp;</p></td>
</tr>
<tr>
	<td colspan="2"><center><input type="submit" name="Submit Guest Book Entry" value="Submit guest book entry"><input type="reset" name="Clear all fields" value="Clear all fields"></center><input type="hidden" name="ipaddr" value="<? echo($ip); ?>"></td>
</tr>
<tr>
	<td colspan="2"><center><font color="#CC3300"><b>Click on the Submit button to proceed with the next step in processing your guest book entry...</font></b></center></td>
</tr>

</table></form></center>
<font size="-2">Updated: June 15, 2009</font>
</blockquote>
</body>
</html>
