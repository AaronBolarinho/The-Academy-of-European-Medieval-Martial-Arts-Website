<?php
ini_set('display_errors', 'On');
// 	Program: 	about_visit.php
//	Description: 	visit request to the Academy, created Jan 04, 2017
//	Author:		David M. Cvet
//
//	2016 ------------------
//
if (isset($_GET['BYP'])) {$bypass = 1;} else {$bypass = 0;}
//echo ('debug:about_visit:10:$bypass="'.$bypass.'"');
include "../php-bin/retrieve_cookies.php";
include "../config/config.php";
include "../config/content_about_visit_$lang.php";
$footer_updated[$lang_num] = "";
$current_pgm = "about_visit.php";
$path = "../";
$menu_selected = "AEMMA";
include "../php-bin/header.php";
?>
   <link href="<?=$path?>css/captcha_form.css" rel="stylesheet" type="text/css" />

   <style>
	.inputcaptcha {margin-left:15%;width:33% !important;float:left;	}
	.imgcaptcha{border:0;float:left;}
   </style>
   <script type="text/javascript" src="../js-bin/jquery.1.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(".refresh").click(function () {
	$(".imgcaptcha").attr("src","<?=$path?>php-bin/captcha_form.php?_="+((new Date()).getTime()));
	});
$('#Guest_form').submit(function() {
	if($('#password').val() != $('#cpassword').val()){
 		alert("Please re-enter confirm password");
 		$('#cpassword').val('');
 		$('#cpassword').focus();
 		return false;
 		}
	$.post("<?=$path?>php-bin/captcha_submit_form.php?"+$("#Guest_form").serialize(), { }, function(response){
		if(response==1)
			{
			alert("<?=$alert_1[$lang_num]?>");
			$(".imgcaptcha").attr("src","<?=$path?>php-bin/captcha_form.php?_="+((new Date()).getTime()));
			clear_form();
			document.Guest_form.image_captcha.style.display="none";
			document.Guest_form.submit_security.disabled=true;
			document.Guest_form.captcha.placeholder="You are human!";
			document.Guest_form.captcha.disabled=true;
			document.Guest_form.Name.disabled=false;
			document.Guest_form.Name.focus();
			}
		else
			{
           		alert("<?=$alert_2[$lang_num]?>");
			document.Guest_form.submit_security.disabled=true;
			clear_form();
			}
		});
	return false;
    	});

function clear_form() {
        $("#Name").val('');
        $("#Email").val('');
        $("#Phone").val('');
        $("#City").val('');
        $("#Comments").val('');
//        $("#cpassword").val('');
	$("#captcha").val('');
     	}
});
function enable_submit_security() {
document.Guest_form.submit_security.disabled=false;
}

function enable_submit_form_button() {
document.Guest_form.Submit_Email_Form_Button.disabled=false;
}

function submit_email_form() {
//alert("debug:about_visit:81:javascript:submit_email_form()");
//var location, about, contact;
var locTown, about, contact;

var name = document.getElementById("Name").value;
if (name === "") {alert("The 'Name' field is empty. Please type in your name and click the submit button again."); }
//else {alert("debug:about_visit:86:javascript:submit_email_form(), name='"+name+"'");}

var email = document.getElementById("Email").value;
if (email === "") {alert("The 'Email' field is empty. Please type in your email address and click the submit button again."); }
//else {alert("debug:about_visit:90:javascript:submit_email_form(), email='"+email+"'");}

var phone = document.getElementById("Phone").value;
if (phone === "") {alert("The 'Phone' field is empty. Please type in your telephone or mobile number and click the submit button again."); }
//else {alert("debug:about_visit:94:javascript:submit_email_form(), phone='"+phone+"'");}

var city = document.getElementById("City").value;
if (city === "") {alert("The 'City' field is empty. Please type in city/town of your residence and click the submit button again."); }
//else {alert("debug:about_visit:98:javascript:submit_email_form(), city='"+city+"'");}

//var e = document.getElementById("ProvState");
//var prov = e.options[e.selectedIndex].text;
//alert("debug:about_visit:101:javascript:submit_email_form(), prov='"+prov+"'");

var comments = document.getElementById("Comments").value;
//alert("debug:about_visit:103:javascript:submit_email_form(), comments='"+comments+"'");

if (document.getElementById("Location1").checked) {locTown = "Toronto";}
else if (document.getElementById("Location2").checked) {locTown = "Guelph";}
else if (document.getElementById("Location3").checked) {locTown = "Digby";}
else if (document.getElementById("Location4").checked) {locTown = "Stratford";}
else {locTown = "Ottawa";}
//alert("debug:about_visit:112:javascript:submit_email_form(), locTown='"+locTown+"'");

if (document.getElementById("About1").checked) {about = "Google";}
else if (document.getElementById("About2").checked) {about = "Facebook";}
else if (document.getElementById("About3").checked) {about = "blog";}
else if (document.getElementById("About4").checked) {about = "Radio";}
else if (document.getElementById("About5").checked) {about = "TV";}
else if (document.getElementById("About6").checked) {about = "Newspaper";}
else if (document.getElementById("About7").checked) {about = "Flyers";}
else if (document.getElementById("About8").checked) {about = "Word of Mouth";}
else if (document.getElementById("About9").checked) {about = "ROM";}
else {about = "Other";}
//alert("debug:about_visit:124:javascript:submit_email_form(), about='"+about+"'");

if (document.getElementById("Contact1").checked) {contact = "Yes";}
else {contact = "No";}

//alert("debug:about_visit:93:javascript:submit_email_form() where name='" + name + "', email='"+email+"', phone='"+phone+"', city='"+city+"', prov='"+provt+"', comments='"+comments+"'");
alert("debug:about_visit:93:javascript:submit_email_form() where name='" + name + "', email='"+email+"', phone='"+phone+"', city='"+city+"', location='"+locTown+"', about='"+about+"', comments='"+comments+"', contact='"+contact+"'");


//location.href = "<?=$path?>php-bin/sub_about_visit_email.php?LANG=<?=$lang?>&NME=" +  name + "&EML=" + email + "&PHN=" + phone + "&CTY=" + city + "&PRV=" + prov + "&LOC=" + locTown + "&ABT=" + about + "&CMT=" + comments + "&CON=" + contact;
//location.href = "<?=$path?>php-bin/sub_about_visit_email.php?LANG=<?=$lang?>&NME=" +  name + "&EML=" + email + "&PHN=" + phone + "&CTY=" + city + "&LOC=" + locTown + "&ABT=" + about + "&CMT=" + comments + "&CON=" + contact;
location.href = "<?=$path?>php-bin/sub_about_visit_email.php?LANG=<?=$lang?>";
//alert ("just after location.href");

}

</script>
<?php
include "../php-bin/header2.php";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<p><?=$visit_p1[$lang_num]?></p>
		<div class="visit_form">
<!--		<form action="about_visit.php?BYP=1" name="Guest_form" id="Guest_form" method="post" >-->
<!--		<form action="<?=$path?>php-bin/sub_about_visit_email.php?LANG=<?=$lang?>" name="Guest_form" id="Guest_form" method="post" >-->
		<form action="" name="Guest_form" id="Guest_form" method="post" >
		<table width="100%" cellpadding="3" border="0">
		<tr>
			<td colspan="2"><div id="captcha_div" style="float:left;width:100%;border:1px solid;border-radius:5px;background-color:#e5e5e5;margin-bottom:25px;padding-top:5px;padding-bottom:5px;" class="box"><input type="text" placeholder="<?=$enter_code[$lang_num]?>" id="captcha" name="captcha" class="inputcaptcha" required="required" oninput="enable_submit_security()" /><img src="<?=$path?>php-bin/captcha_form.php" id="image_captcha" class="imgcaptcha" alt="captcha"  />&nbsp;&nbsp;<img src="<?=$path?>images/icons/refresh.png" alt="reload" style="float:left;margin-top:10px;cursor:pointer;" class="refresh fade" title="click to refresh (re-generate) the security code" /><br /><br /><div style="text-align:center;"><input type="submit" value="Submit Security Code" name="submit_security" id="submit_security" disabled="true" /></div></div></td>
		</tr>
		<tr>
			<td  align="right" class="td_width" style="vertical-align:middle"><font color="red"><b>*</b></font><b><?=$name[$lang_num]?></b></td>
			<td><input type="text" name="Name" id="Name" style="width:50%;" required="required"  disabled="true" oninput="document.Guest_form.Email.disabled=false;" /></td>
		</tr>
		<tr>
			<td  align="right" class="td_width" style="vertical-align:middle"><font color="red"><b>*</b></font><b><?=$email[$lang_num]?></b></td>
			<td align="left"><input type="text" name="Email" id="Email" style="width:50%;" required="required"  disabled="true" oninput="document.Guest_form.Phone.disabled=false;" /></td>
		</tr>
		<tr>
			<td  align="right" class="td_width" style="vertical-align:middle"><font color="red"><b>*</b></font><b><?=$phone[$lang_num]?></b></td>
			<td align="left"><input type="text" name="Phone" id="Phone" style="width:25%;" required="required"  disabled="true" oninput="document.Guest_form.City.disabled=false;" /></td>
		</tr>
		<tr>
			<td  align="right" class="td_width" style="vertical-align:middle"><font color="red"><b>*</b></font><b><?=$city[$lang_num]?></b></td>
<!--			<td align="left"><input type="text" name="City" id="City" style="width:30%;" required="required"  disabled="true" oninput="document.Guest_form.ProvState.disabled=false; enable_submit_form_button()" /></td>-->
			<td align="left"><input type="text" name="City" id="City" style="width:30%;" required="required"  disabled="true" oninput="enable_submit_form_button()" /></td>
		</tr>
<!--
		<tr>
			<td  align="right" class="td_width" style="vertical-align:middle"><font color="red"><b>*</b></font><b>Prov/State/Region:</b></td>
			<td align="left"><select name="ProvState" id="ProvState" style="width:40%;">
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
			</select><br />&nbsp;</td>
		</tr>
-->
		<tr>
			<td  colspan="2"><font style="color:#CC3300;"><b><?=$training_location[$lang_num]?></b></font><td>
		</tr>
		<tr>
			<td  colspan="2"><div style="float:left;"><input type="radio" name="Location" id="Location1" style="vertical-align:middle"  value="Toronto" checked="checked" /> Toronto&nbsp;</div><div style="float:left;"><input type="radio" name="Location" id="Location2" style="vertical-align:middle" value="Guelph" /> Guelph&nbsp;</div><div style="float:left;"><input type="radio" name="Location" id="Location3" style="vertical-align:middle" value="Digby" /> Digby, NS&nbsp;</div><div style="float:left;"><input type="radio" name="Location" id="Location4" style="vertical-align:middle" value="Stratford" /> Stratford&nbsp;</div><div style="float:left;"><input type="radio" name="Location" id="Location5" style="vertical-align:middle" value="Ottawa" /> Ottawa</div></td>
		</tr>
		<tr>
			<td  colspan="2"><br /><font color="#CC3300"><?=$how_did_you_hear[$lang_num]?></font></td>
		</tr>
		<tr>
			<td  colspan="2"><div style="float:left;"><input type="radio" name="About" id="About1" style="vertical-align:middle" value="Google" checked="checked" /><img src="../images/icons/google.png" style="vertical-align:middle" alt="" /> Google?&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About2" style="vertical-align:middle" value="Facebook"  /><img src="../images/icons/facebook.gif" style="vertical-align:middle" alt="" /> FaceBook?&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About3" value="AEMMA blog" style="vertical-align:middle"  /><img src="../images/icons/blogger.jpg" style="vertical-align:middle" alt="" /> blog?&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About4" style="vertical-align:middle" value="Radio"  /><img src="../images/icons/radio.jpg" style="vertical-align:middle" alt="" /> Radio&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About5" style="vertical-align:middle" value="TV"  /><img src="../images/icons/tv.jpg" style="vertical-align:middle" alt="" /> TV&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About6" style="vertical-align:middle" value="Newspaper"  /><img src="../images/icons/notepad.jpg" style="vertical-align:middle" alt="" /> Newspaper&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About7" style="vertical-align:middle" value="Flyer"  /><img src="../images/icons/notepad.jpg" style="vertical-align:middle" alt="" /> Flyers&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About8" style="vertical-align:middle" value="Word of Mouth"  /><img src="../images/icons/trumpet.png" style="vertical-align:middle" alt="" /> Word of Mouth&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About9" style="vertical-align:middle" value="ROM"  /><img src="../images/icons/ROM.gif" style="vertical-align:middle" alt="" /> ROM&nbsp;</div><div style="float:left;"><input type="radio" name="About" id="About10" style="vertical-align:middle" value="Other like, I don't know, whatever..."  /><img src="../images/icons/question.png" style="vertical-align:middle" alt="" /> Other&nbsp;</div></td>
		</tr>
		<tr>
			<td  colspan="2"><br /><font color="#CC3300"><b><?=$visiter_comments[$lang_num]?></b></font></td>
		</tr>
		<tr>
			<td  colspan="2"><textarea name="Comments" id="Comments" wrap="virtual" rows="3" style="width:70%;" ></textarea></td>
		</tr>
		<tr>
			<td  colspan="2"><div style="float:left;"><?=$contact_method[$lang_num]?>&nbsp;&nbsp;</div><div style="float:left;"><input type="radio" name="Contact" id="Contact1" style="vertical-align:middle" value="Yes" checked="checked" />   <?=$yes[$lang_num]?>&nbsp;</div><div style="float:left;"><input type="radio" name="Contact" id="Contact2" style="vertical-align:middle" value="No" /> <?=$no[$lang_num]?></div></td>
		</tr>
		<tr>
			<td  colspan="2"><b><?=$privacy[$lang_num]?></b><p align="justify"><?=$privacy_p1[$lang_num]?></p></td>
		</tr>
		<tr>
			<td  colspan="2" align="center"><button class="button" name="Submit_Email_Form_Button" id="Submit_Email_Form_Button"  disabled="true" onclick="submit_email_form();"><?=$button_submit[$lang_num]?></button> <input type="reset" name="Clear" value="<?=$button_clear[$lang_num]?>" class="button" /></td>
		</tr>
		</table></form>
		</div>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
