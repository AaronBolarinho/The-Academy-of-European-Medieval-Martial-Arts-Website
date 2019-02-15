<?php
ini_set('display_errors', 'On');
//
// Program: sub_about_visit_email.php
// Implemented: Jan 04, 2017
// Description:
//	This script will extract the contents of its companion online email form, perform basic
//	validation checking on their values, and compose an email sent to a target email address. 
//	It is called by the PHP script: about_visit.php
//	The only edits required for specific store implementation are the email variables.
//---------------------------
// Updates:
//	2017 ----------

// retrieve the default email addresses variables
include "../config/config.php";
$date_stamp = date("F j, Y, g:i a");
$err = 0;
$body_message = $email_message = "";
// retrieve the form elements
if(isset($_GET['NME'])) {$sender_name = $_GET['NME'];} else { $sender_name = "NA";} 
if(isset($_GET['EML'])) {$email_from = $_GET['EML'];} else { $email_from = "NA";}
if(isset($_GET['PHN'])) {$phone = $_GET['PHN'];} else { $phone = "NA";}
if(isset($_GET['CTY'])) {$city = $_GET['CTY'];} else { $city = "NA";}
//if(isset($_GET['PRV'])) {$required_fields++; $prov = $_GET['PRV'];} else {$prov = "Ontario";}
if(isset($_GET['LOC'])) {$location = $_GET['LOC'];} else {$location = "Toronto";}
if(isset($_GET['ABT'])) {$about = $_GET['ABT'];} else {$about = "Google";}
if(isset($_GET['CMT'])) {$comments = $_GET['CMT'];} else {$comments = "none entered";}
if(isset($_GET['CON'])) {$contact_by_email = $_GET['CON'];} else {$contact_by_email = "Yes";}

//echo ('debug:sub_about_visit_email:41:$sender_name ="'.$sender_name.'", $email="'.$email.'", $phone="'.$phone.'", $city="'.$city.'", $prov="'.$prov.'", $location="'.$location.'", $about="'.$about.'", $comments="'.$comments.'", $contact_by_email="'.$contact_by_email.'"');
echo ('debug:sub_about_visit_email:41:$sender_name ="'.$sender_name.'", $email_from="'.$email_from.'", $phone="'.$phone.'", $city="'.$city.'", $location="'.$location.'", $about="'.$about.'", $comments="'.$comments.'", $contact_by_email="'.$contact_by_email.'"<br />');

$span = "<span style='margin:0; color:#777; font-size:13px; line-height:16px;'>";
$close_span = "</span>";

function died($error) {
// error messages to be displayed should there be a problem with the form variables
echo "<span style='margin:0; font-size:13px; color:red; line-height:16px;'>We are very sorry, but there were error(s) found with the info you submitted. ";
echo "These errors appear below.</span><br /><br />";
echo $error."<br /><br />";
echo "Please go back and fix these errors.<br /><br /><div align=\"center\"><form><input type=\"button\" value=\"Go back to email form\" onclick=\"history.back()\"></form></div><br />";
die();
}

function clean_string($string) {
$bad = array("content-type","bcc:","to:","cc:","href");
return str_replace($bad,"",$string);
}

//if ($required_fields == 4)
//	{
	// check the validity of the info entered
	// determine the send to string of email addies and subject depending upon the selection of location
	$email_subject = "Practice visit request for location of: ".$location;
     
	// check validity of email address entered on the online form
    	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  	if(!preg_match($email_exp,$email_from)) 
		{ $error_message .= $span.'The Email Address you entered does not appear to be valid.<br />'; $err=1;}
	
	// check validity of the name entered on the online form
	$string_exp = "/^[A-Za-z .'-]+$/";
	if(!preg_match($string_exp,$sender_name)) 
		{ 
		if (!$err) {$error_message .= $span; $err=1;}
		$error_message .= 'The Name you entered does not appear to be valid. Do not include hash marks, exclamations, and other non-valid alphanumeric characters in your name. <br />'; 
		//echo ('<script type="text/JavaScript">confirm("The First Name you entered does not appear to be valid. Do not include periods, dashes, etc. in your First Name entry.");</script>');
		}

	// check validity of comments entered on the online form
//  	if(strlen($comments) < 2) 
//		{ if (!$err) {$error_message .= $span; $err=1;} $error_message .= 'The Comments you entered do not appear to be valid or is blank.<br />';}

	// if the variable $error_message has anything asigned to it, kill the script
//	if(strlen($error_message) > 0) 
//		{ died($error_message); }

	// compose the email to AEMMA					{
	// compose the message within the body of the email
	$body_message .= "Details captured from online guest visit request form"."\n";
	$body_message .= "------------------------------------------------------"."\n";
	$body_message .= "\tName: ".clean_string($sender_name)."\n";
	$body_message .= "\temail: ".clean_string($email_from)."\n";
	$body_message .= "\tphone: ".clean_string($phone)."\n";
	$body_message .= "\tCity: ".clean_string($city)."\n";
//	$body_message .= "\tProv: ".$prov."\n\n";
	$body_message .= "\tDate: ".$date_stamp."\n";
	$body_message .= "\tLocation: ".$location."\n\n";
	$body_message .= "How did you hear about us? ==> ".$about."\n\n";
	$body_message .= "Comment(s)/Question(s): ".clean_string($comments)."\n";
	$body_message .= "------------------------------------------------------"."\n\n";
	$body_message .= "Message generated online from aemma.org"."\n\n";
//	$body_message .= "<img src=\"../images/AEMMA_logo_white_200_transparent.png\" alt=\"\" style=\"float:left;\" />";


	$email_message .= $body_message."\n\n";

	//construct email to list depending upon which chapter (location) been selected
	if ($location == "Toronto")
		{
		$email_to = $eaddy_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_2.$at.$first_qualifier.".".$second_qualifier; 
		$email_cc = $email_from.",".$eaddy_tor_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_tor_2.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_tor_3.$at.$first_qualifier.".".$second_qualifier;
		}
	elseif ($location == "Guelph")
		{
		$email_to = $eaddy_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_2.$at.$first_qualifier.".".$second_qualifier; 
		if ($eaddy_gue_2) { $email_cc = $email_from.",".$eaddy_gue_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_gue_2.$at.$first_qualifier.".".$second_qualifier;}
		else { $email_cc = $email_from.",".$eaddy_gue_1.$at.$first_qualifier.".".$second_qualifier;}
		}
	elseif ($location == "Digby")
		{
		$email_to = $eaddy_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_2.$at.$first_qualifier.".".$second_qualifier; 
		if ($eaddy_dig_2) { $email_cc = $email_from.",".$eaddy_dig_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_dig_2.$at.$first_qualifier.".".$second_qualifier;}
		else { $email_cc = $email_from.",".$eaddy_dig_1.$at.$first_qualifier.".".$second_qualifier;}
		}
	elseif ($location == "Stratford")
		{
		$email_to = $eaddy_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_2.$at.$first_qualifier.".".$second_qualifier; 
		if ($eaddy_str_2) { $email_cc = $email_from.",".$eaddy_str_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_str_2.$at.$first_qualifier.".".$second_qualifier;}
		else { $email_cc = $email_from.",".$eaddy_str_1.$at.$first_qualifier.".".$second_qualifier;}
		}
	elseif ($location == "Ottawa")
		{
		$email_to = $eaddy_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_2.$at.$first_qualifier.".".$second_qualifier; 
		if ($eaddy_ott_2) { $email_cc = $email_from.",".$eaddy_ott_1.$at.$first_qualifier.".".$second_qualifier.",".$eaddy_ott_2.$at.$first_qualifier.".".$second_qualifier;}
		else { $email_cc = $email_from.",".$eaddy_ott_1.$at.$first_qualifier.".".$second_qualifier;}
		}

	$email_to = "david.cvet@aemma.org";
	$email_cc = "info-aemma@aemma.org";

	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'Cc: '.$email_cc."\r\n" .
	'X-Mailer: PHP/' . phpversion();
echo ('debug:sub_about_visit_email:143:$email_to="'.$email_to.'",<br />$email_subject = "'.$email_subject.'",<br />email_message="'.$email_message.'",<br />$header="'.$header.'"');

	mail($email_to, $email_subject, $email_message, $headers); 
?>
	<!-- begin generate a confirmation window -->
	<script type="text/JavaScript">
	var confirmation
	window.history.back();
	window.close();
	confirmation = window.open("about_visit_email_confirmation.php?NME=<?=$sender_name?>","popup","toolbar=no,menubar=no,scrollbars=yes,height=450,width=500")
	</script>
	<!-- end generate a confirmation window -->
<?php
//	} // end big if
//else
//	{
	// the minimum required fields were NOT met
//	}
?>
