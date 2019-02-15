<?php
ini_set('display_errors', 'On');
// date: Dec 7, 2014
// program:	membership_body.php
// description:	Presents scheduling and fees structure
// 2014 -----------------
//	dec 07:	added a global file which will read current fees which will ensure that the fees
//		on the mobile is consistent with those displayed on the desktop version of site. (/php-bin/global_variables.php)
//	NOTE!!!	Any changes in fees on the php-bin/global_variables.php must be reflected in the paypal code, meaning, new code needs to be
//		generated and inserted into this page!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 2015 -----------------
//	dec 03: added Halifax to the locations to visit, and adjusted the followup CGI code to reflect the new location and email
// 2016 -----------------
//	mar 02:	modified the committed fees, annual, 6-month and 3-month
//	mar 21:	modified the FACT paypal buttons to map to the new pricing found in global_variables.php
//
include "../php-bin/retrieve_cookies.php";

include "../../php-bin/global_variables.php";
include "../config/config.php";
include "../config/content_about_visit_$lang.php";
$footer_updated[$lang_num] = "";
$current_pgm = "about_visit.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<p><?=$visit_p1[$lang_num]?></p>
<table width="80%" align="center">
<tr><td><font color="red">Text boxes highlighted with "*" are mandatory fields.</font>
<table align="center" width="80%" cellpadding="3" border="0">
<form action="http://aemma.netfirms.com/cgi-bin/guestVisit/guestVisit_v2.cgi" method="post">
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><font color="red"><b>*</b></font><b><?=$name[$lang_num]?></b></font></td>
	<td><input type="text" name="nxmx" size="30"></td>
</tr>
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><font color="red"><b>*</b></font><b><?=$email[$lang_num]?></b></font></td>
	<td align="left"><input type="text" name="xmxxl" size="30"></td>
</tr>
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><b><?=$phone[$lang_num]?></b></font></td>
	<td align="left"><input type="text" name="phone" size="12"></td>
</tr>
<!--
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><b>Day phone:</b></font></td>
	<td align="left"><input type="text" name="day_phone" size="12"></td>
</tr>
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><font color="red"><b>*</b></font><b>Evening phone:</b></font></td>
	<td align="left"><input type="text" name="night_phone" size="12"></td>
</tr>
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><b>Mobile:</b></font></td>
	<td align="left"><input type="text" name="mobile_phone" size="12"></td>
</tr>
-->
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><font color="red"><b>*</b></font><b><?=$city[$lang_num]?></b></font></td>
	<td align="left"><input type="text" name="cxtx"></td>
</tr>
<tr>
	<td  align="right" width="150" style="vertical-align:middle"><font color="red"><b>*</b></font><b>Prov/State/Region:</b></font></td>
	<td align="left"><select name='prov_state'>
	<option value=''>&nbsp;</option>
	<option value='Alberta'>ALBERTA</option>
	<option value='British Columbia'>BRITISH COLUMBIA</option>
	<option value='Manitoba'>MANITOBA</option>
	<option value='New Brunswick'>NEW BRUNSWICK</option>
	<option value='Newfoundland'>NEWFOUNDLAND</option>
	<option value='Northwest Territory'>NORTHWEST TERRITORY</option>
	<option value='Nova Scotia'>NOVA SCOTIA</option>
	<option value='Nunavut'>NUNAVUT</option>
	<option selected value='Ontario'>ONTARIO</option>
	<option value='Prince Edward Island'>PRINCE EDWARD ISLAND</option>
	<option value='Quebec'>QUEBEC</option>
	<option value='Saskatchewan'>SASKATCHEWAN</option>
	<option value='Yukon'>YUKON</option>
	<option value=''>----------</option>
	<option value='Alabama'>ALABAMA</option>
	<option value='Alaska'>ALASKA</option>
	<option value='American Samoa'>AMERICAN SAMOA</option>
	<option value='Arizona'>ARIZONA</option>
	<option value='Arkansas'>ARKANSAS</option>
	<option value='California'>CALIFORNIA</option>
	<option value='Colorado'>COLORADO</option>
	<option value='Connecticut'>CONNECTICUT</option>
	<option value='Delaware'>DELAWARE</option>
	<option value='District of Columbia'>DISTRICT OF COLUMBIA</option>
	<option value='Florida'>FLORIDA</option>
	<option value='Georgia'>GEORGIA</option>
	<option value='Guam'>GUAM</option>
	<option value='Hawaii'>HAWAII</option>
	<option value='Idaho'>IDAHO</option>
	<option value='Illinois'>ILLINOIS</option>
	<option value='Indiana'>INDIANA</option>
	<option value='Iowa'>IOWA</option>
	<option value='Kansas'>KANSAS</option>
	<option value='Kentucky'>KENTUCKY</option>
	<option value='Louisiana'>LOUISIANA</option>
	<option value='Maine'>MAINE</option>
	<option value='Marshall Islands'>MARSHALL ISLANDS</option>
	<option value='Maryland'>MARYLAND</option>
	<option value='Massachusetts'>MASSACHUSETTS</option>
	<option value='Michigan'>MICHIGAN</option>
	<option value='Minnesota'>MINNESOTA</option>
	<option value='Mississippi'>MISSISSIPPI</option>
	<option value='Missouri'>MISSOURI</option>
	<option value='Montana'>MONTANA</option>
	<option value='Nebraska'>NEBRASKA</option>
	<option value='Nevada'>NEVADA</option>
	<option value='New Hampshire'>NEW HAMPSHIRE</option>
	<option value='New Jersey'>NEW JERSEY</option>
	<option value='New Mexico'>NEW MEXICO</option>
	<option value='New York'>NEW YORK</option>
	<option value='North Carolina'>NORTH CAROLINA</option>
	<option value='North Dakota'>NORTH DAKOTA</option>
	<option value='Ohio'>OHIO</option>
	<option value='Oklahoma'>OKLAHOMA</option>
	<option value='Oregon'>OREGON</option>
	<option value='Palau'>PALAU</option>
	<option value='Pennsylvania'>PENNSYLVANIA</option>
	<option value='Puerto Rico'>PUERTO RICO</option>
	<option value='Rhode Island'>RHODE ISLAND</option>
	<option value='South Carolina'>SOUTH CAROLINA</option>
	<option value='South Dakota'>SOUTH DAKOTA</option>
	<option value='Tennessee'>TENNESSEE</option>
	<option value='Texas'>TEXAS</option>
	<option value='Utah'>UTAH</option>
	<option value='Vermont'>VERMONT</option>
	<option value='Virgin Islands'>VIRGIN ISLANDS</option>
	<option value='Virginia'>VIRGINIA</option>
	<option value='Washington'>WASHINGTON</option>
	<option value='West Virginia'>WEST VIRGINIA</option>
	<option value='Wisconsin'>WISCONSIN</option>
	<option value='Wyoming'>WYOMING</option>
	</select></td>
</tr>
<tr>
	<td  colspan="2"><font style="color:#CC3300;font-size:16px;"><b><?=$training_location[$lang_num]?></b></font><td>
</tr>
<tr>
	<td  colspan="2"><input type="radio" name="location" style="vertical-align:middle"  value="toronto" checked="checked"> Toronto&nbsp;<input type="radio" name="location" style="vertical-align:middle" value="guelph"> Guelph&nbsp;<input type="radio" name="location" style="vertical-align:middle" value="digby"> Digby, NS&nbsp;<input type="radio" name="location" style="vertical-align:middle" value="stratford"> Stratford&nbsp;<input type="radio" name="location" style="vertical-align:middle" value="ottawa"> Ottawa<!--<input type="radio" name="location" style="vertical-align:middle" value="UofT"> AEMMA@UofT--><!--&nbsp;<input type="radio" name="location" value="Ottawa" > Ottawa&nbsp;<input type="radio" name="location" value="Haarlem" > Haarlem, The Netherlands&nbsp;--><!--<input type="radio" name="location" value="watertown" > Watertown, NY--></td>
</tr>
<tr>
	<td  colspan="2"><br /><font color="#CC3300"><?=$how_did_you_hear[$lang_num]?></font></td>
</tr>
<tr>
	<td  colspan="2"><input type="radio" name="about" style="vertical-align:middle" value="google" checked="checked"><img src="../images/icons/google.png" style="vertical-align:middle" alt="" /> Google?&nbsp;<input type="radio" name="about" style="vertical-align:middle" value="fb"><img src="../images/icons/facebook.gif" style="vertical-align:middle" alt="" />&nbsp;facebook?&nbsp;<input type="radio" name="about" value="blog" style="vertical-align:middle"><img src="../images/icons/blogger.jpg" style="vertical-align:middle" alt="" />&nbsp;blog?&nbsp;<input type="radio" name="about" style="vertical-align:middle" value="q"><img src="../images/icons/radio.jpg" style="vertical-align:middle" alt="" />&nbsp;Radio&nbsp;<input type="radio" name="about" style="vertical-align:middle" value="tv"><img src="../images/icons/tv.jpg" style="vertical-align:middle" alt="" />&nbsp;TV&nbsp;<input type="radio" name="about" style="vertical-align:middle" value="npaper" ><img src="../images/icons/notepad.jpg" style="vertical-align:middle" alt="" />&nbsp;Newspaper</td>
</tr>
<tr>
	<td  colspan="2"><input type="radio" name="about" style="vertical-align:middle" value="flyer" ><img src="../images/icons/notepad.jpg" style="vertical-align:middle" alt="" />&nbsp;Flyers&nbsp;<input type="radio" name="about" style="vertical-align:middle" value="mouth" ><img src="../images/icons/trumpet.png" style="vertical-align:middle" alt="" />&nbsp;Word of Mouth&nbsp;<input type="radio" name="about" style="vertical-align:middle" value="rom" ><img src="../images/icons/ROM.gif" style="vertical-align:middle" alt="" />&nbsp;ROM&nbsp;<input type="radio" name="about" style="vertical-align:middle" value="other" ><img src="../images/icons/question.png" style="vertical-align:middle" alt="" />Other</td>
</tr>
<tr>
	<td  colspan="2"><br /><font color="#CC3300"><?=$visiter_comments[$lang_num]?></td>
</tr>
<tr>
	<td  colspan="2"><textarea name="comments" wrap="virtual" rows="3" cols="60"></textarea></td>
</tr>
<tr>
	<td  colspan="2"><?=$contact_method[$lang_num]?>&nbsp;&nbsp;<input type="radio" name="contact" style="vertical-align:middle" value="Yes"> Yes&nbsp;<input type="radio" name="contact" style="vertical-align:middle" value="No" checked="checked"> No</b></td>
</tr>
<tr>
	<td  colspan="2"><b><?=$privacy[$lang_num]?></b><p align="justify"><?=$privacy_p1[$lang_num]?></td>
</tr>
<tr>
	<td  colspan="2" align="center"><input type="hidden" value="AEMMA" name="school"><input type="submit" class="button"  name="<?=$button_submit[$lang_num]?>" value="<?=$button_submit[$lang_num]?>"> <input type="reset" class="button" name="<?=$button_clear[$lang_num]?>" value="<?=$button_clear[$lang_num]?>"></form></td>
</tr></table>
</td></tr></table>

<div style="float:left;width:100%;text-align:center;margin-bottom:20px;"><b><i><font color="#CC3300">Please wait for the confirmation of your guest visit request</font></i></b></div>
</div>
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
