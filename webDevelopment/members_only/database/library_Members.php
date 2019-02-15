<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';

//     The default access level for new Login ID's is "2", which
//       means they can see the summary stats on the main menu and
//       change their own password - that's it.
//
//       Level 2 and up allows them to run the reports.
//
//       Level 3 and up allows them to list / view contact
//       details for each member and export data (as of July 10, 2006).
//
//       Level 4 allows the user to edit contact details for each member.
//
//       Level 5 and up allows them to create more Login IDs.
//
//       Level 6 allows them to backup the entire database (soon)
//       and export data.

Function MemberCreate($LinkID, $State, $ID, $userID, $password, $first_name, $middle_initial, $surname, $privileged, $access_status, $renewal_status, $renewal_notice, $member_status, $organization, $country, 
			$registration_date, $last_access_date, $resource, $ip_addy, $dnsname, $access_counter, $member_access_counter, $email, $comments, $Renewal ) 
{

// We create a blank record then pass through to the MemberUpdate to complete the process.

	$SQL    = 'INSERT INTO registeredUsers VALUES ()';
	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) {
		$ID = mysql_insert_id($LinkID);
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<center>(php: library_Members.php) Insertion Registration Record Status (Table : registeredUsers) new record ID "'.$ID.'" <b>was successful</b>.<br />');
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<center>Creation of new registration process continues....<br />');
		MemberUpdate($LinkID, $State, $ID, $userID, $password, $first_name, $middle_initial, $surname, $privileged, $access_status, $renewal_status, $renewal_notice, $member_status, $organization, $country, 
			$registration_date, $last_access_date, $resource, $ip_addy, $dnsname, $access_counter, $member_access_counter, $email, $comments, $Renewal );
	} else {
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<center>(php: library_Members.php) Create Registration Record Status (Table : registeredUsers) new record ID "'.$ID.'" could <b>NOT</b> be inserted.<br />');
		echo ('</center>SQL Statement in error:<br />'.$SQL.'<br /><br /><center>');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</center></font>');
	}


	// send an email with the new details on create
	//
	$first_part = "info-aemma";
	$third_part = "org";
	$second_part = "aemma";
	$at = "@";
	$dot = ".";

	$to = $email;
	$from = $first_part.$at.$second_part.$dot.$third_part;
	$subject = "AEMMA online library access info";
	$headers = 'From: '.$from. "\r\n".'bc: '.$from. "\r\n" .'X-Mailer: PHP/' . phpversion();
	$body = "Dear Subscriber,\n\nYour PayPal payment has been confirmed in our account.  Thank you for your interest and support.
In order to login to the online library, you will need enter your userID and password in the login popup window.

userID: ".$userID."\npassword: ".$password."

Enjoy the usage of the library.  Please ensure that your userID and password remain secured.  Take special 
note to the online library cover page, as periodically, there will be announcements made periodically of 
importance to library users.  The userID and password will operate only from the computer you initially 
login from and is not transferable to another computer, nor will the system support dial-up computers.

For informational purposes, if you train at a Western martial arts school/academy, please respond to this
email with the name of the school and URL if there is one.

AEMMA Administration
__________________________________________________________________________
Academy of European Medieval Martial Arts           www.aemma.org
email: info-aemma@aemma.org        
___________________________________________________________________________";

	if ( mail($to, $subject, $body, $headers) ) 
		{ echo '<p><font color="green"><b>email confirmation with login details message sent!</b></font></p>'; }
	else
		{ echo '<p><font color="red"><b>email confirmation message failed, contact webmaster for more info!</b></font></p>'; }

} // End Function MemberCreate

Function MemberUpdate($LinkID, $State, $ID, $userID, $password, $first_name, $middle_initial, $surname, $privileged, $access_status,
		      $renewal_status, $renewal_notice, $member_status, $organization, $country, $registration_date,
		      $last_access_date, $resource, $ip_addy, $dnsname, $access_counter, $member_access_counter, $email, $comments, $Renewal ) {

//	Se set default values.  Parameters passed with GET and POST are left blank if defaulted,
//	so we have to explicitly choose the default values - just to be safe. Set blank fields to Null.

	if ($userID == '')			{ $userID = 'Null'; }				else { $userID = "'" . addslashes($userID) . "'"; }
	if ($password == '')			{ $password = 'Null'; }				else { $password = "'" . addslashes($password) . "'"; }
	if ($first_name == '')			{ $first_name = 'Null'; }			else { $first_name = "'" . addslashes($first_name) . "'"; }
	if ($middle_initial == '')		{ $middle_initial = 'Null'; }			else { $middle_initial = "'" . addslashes($middle_initial) . "'"; }
	if ($surname == '')			{ $surname = 'Null'; }				else { $surname = "'" . addslashes($surname) . "'"; }
	if ($privileged == '')			{ $privileged = '0'; }
	if ($access_status == '')		{ $access_status = '1'; }
	if ($renewal_status == '')		{ $renewal_status = '0'; }
	if ($renewal_notice == '')		{ $renewal_notice = '0'; }
	if ($member_status == '')		{ $member_status = '0'; }
	if ($organization == '')		{ $organization = 'Null'; }			else { $organization = "'" . addslashes($organization) . "'"; }
	if ($country == '')			{ $country = 'Null'; }				else { $country = "'" . addslashes($country) . "'"; }
	if ($registration_date == '')		{ $registration_date = 'Null'; }		else { $registration_date = "'" . addslashes($registration_date) . "'"; }
	if ($last_access_date == '')		{ $last_access_date = 'Null'; }			else { $last_access_date = "'" . addslashes($last_access_date) . "'"; }
	if ($resource == '')			{ $resource = 'Null'; }				else { $resource = "'" . addslashes($resource) . "'"; }
	if ($ip_addy == '')			{ $ip_addy = 'Null'; }				else { $ip_addy = "'" . addslashes($ip_addy) . "'"; }
	if ($dnsname == '')			{ $dnsname = 'Null'; }				else { $dnsname = "'" . addslashes($dnsname) . "'"; }
	if ($access_counter == '')		{ $access_counter = '0'; }
	if ($member_access_counter == '')	{ $member_access_counter = '0'; }
//	if ($email == '')			{ $email = 'Null'; }				
//	if ($email == '')			{ $email = 'Null'; }				else { $email = "'" . addslashes($email) . "'"; }
	if ($email == '')			{ $email = 'Null'; }				else { $email_noquotes = $email; $email = "'" . $email . "'"; }
	if ($comments == '')			{ $comments = 'Null'; }				else { $comments = "'" . addslashes($comments) . "'"; }

// Now save People information

	$SQL  = 'UPDATE registeredUsers SET ';
	$SQL .= 'userID 		= ' . $userID . ', ';
	$SQL .= 'password 		= ' . $password . ', ';
	$SQL .= 'first_name 		= ' . $first_name . ', ';
	$SQL .= 'middle_initial	 	= ' . $middle_initial . ', ';
	$SQL .= 'surname	 	= ' . $surname . ', ';
	$SQL .= 'privileged		= ' . $privileged . ', ';
	$SQL .= 'access_status	 	= ' . $access_status . ', ';
	$SQL .= 'renewal_status		= ' . $renewal_status . ', ';
	$SQL .= 'renewal_notice		= ' . $renewal_notice . ', ';
	$SQL .= 'member_status		= ' . $member_status . ', ';
	$SQL .= 'organization	 	= ' . $organization . ', ';
	$SQL .= 'country	 	= ' . $country . ', ';
	$SQL .= 'registration_date  	= ' . $registration_date . ', ';
	$SQL .= 'last_access_date	= ' . $last_access_date . ', ';
	$SQL .= 'resource	 	= ' . $resource . ', ';
	$SQL .= 'ip_addy	 	= ' . $ip_addy . ', ';
	$SQL .= 'dnsname		= ' . $dnsname . ', ';
	$SQL .= 'access_counter	 	= ' . $access_counter . ', ';
	$SQL .= 'member_access_counter	= ' . $member_access_counter . ', ';
	$SQL .= 'email			= ' . $email . ', ';
	$SQL .= 'comments		= ' . $comments . ' ';
	$SQL .= 'WHERE ID = ' . $ID;

	$Result = mysql_query($SQL, $LinkID);
	if (mysql_errno($LinkID) == 0) 
		{
		echo ('<font color="green">&nbsp;<p>&nbsp;<p>&nbsp;<center>(php: library_Members.php) Update Registration Record Status (Table : registeredUsers) member record userID# "'.$userID.'" successfully saved.</font><br />');
		if ($Renewal == 1)
			{
			echo ('<font color="green"><p>&nbsp;<b>No renewal email sent on this update.</b></font><br />');
			}
		}
	else 
		{
		echo ('<font color="red">&nbsp;<p>&nbsp;<p>&nbsp;<center>(php: library_Members.php) Update Registration Record Status (Table : registeredUsers) updated member record userID# "'.$userID.'" could <b>NOT</b> be saved.<br />');
		echo ('</center>SQL Statement in error:<br />'.$SQL.'<br /><br /><center>');
		echo ('Please try again or select menu option to continue.<br /><br />');
		echo ('If this problem persists, please call your local system administrator.<p><br />');
		echo ('DB Error: [' . mysql_errno($LinkID) . '] : ' . mysql_error($LinkID) . '</center></font>');
		}

//	echo ('<font color="green"> *** debug: state = "'.$State.'" <br />');
//	echo ('<font color="green"> *** debug: renewal = "'.$Renewal.'" <br />');

	if ($Renewal == 0 && $renewal_notice == 1)
		{
//		echo ('<font color="green">debug: inside expired email portion</font>');
		// send an email to the individual whose record has just been updated with renewal notice set to "1" (this record will show up green in the
		// library_Report_registrations_expired.php) - this will save the administrative task of entering the user's email addies into a form
		// email (template) indicating that their library card is about to, or has expired

		// send an email with the new details on create
		//
		$first_part = "info-aemma";
		$third_part = "org";
		$second_part = "aemma";
		$at = "@";
		$dot = ".";

		$to = $email_noquotes;
		$from = $first_part.$at.$second_part.$dot.$third_part;
		$subject = "AEMMA online library access renewal notice";
		$headers = 'From: '.$from. "\r\n".'bc: '.$from. "\r\n" .'X-Mailer: PHP/' . phpversion();
		$body = "Dear Library Subscriber,\n\nYour annual payment submitted on ".$registration_date." for access to the online library is nearing its termination the end of this month. 
We would be grateful if you would care to renew your contribution to the library. Please visit the online library, and re-register in order to renew your subscription.

FYI, your last library resource accessed was: ".$resource." on ".$last_access_date.".

For your convenience, your userID: ".$userID." and password: ".$password."

We appreciate your continued interest, support and patronage.

AEMMA Administration
__________________________________________________________________________
Academy of European Medieval Martial Arts           www.aemma.org
email: info-aemma@aemma.org        
___________________________________________________________________________";

		if ( mail($to, $subject, $body, $headers) ) 
			{ echo '<p><font color="green"><b>renewal notice email with login, last resource and date acccessed details sent!</b><br /><br />email message echoed below:<br /></br />'.$body.'</font></p>'; }
		else
			{ echo '<p><font color="red"><b>renewal notice email message failed, contact webmaster for more info!</b></font></p>'; }

		}


} // End Function MemberUpdate


Function MemberDelete($LinkID, $userID) {

	echo ('MemberDelete routine reserved for future use.<br />');

} // End Function MemberDelete

Function MemberShow($LinkID, $State, $ID) {

?>

<html>
<head>
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" type="text/css" media="all" href="skins/aqua/theme.css" title="Aqua" />
	<script type="text/javascript" src="calendar.js"></script>
	<script type="text/javascript" src="lang/calendar-en.js"></script>
	<script type="text/javascript" src="calendar-setup.js"></script>
</head>
<body align="center" valign="top" bgcolor="white">
<form name="Members" method="post" action="library_Members.php">
<?php
	$SQL  = 'SELECT ID, userID, password, first_name, middle_initial, surname, privileged, access_status, renewal_status, renewal_notice, member_status, organization, country, ';
	$SQL .= '	registration_date, last_access_date, resource, ip_addy, dnsname, access_counter, member_access_counter, email, comments ';
	$SQL .= ' FROM registeredUsers';
	$SQL .= ' WHERE ID = ' . $ID*1;

	$Result = mysql_query($SQL, $LinkID);
	$Line1 = mysql_fetch_object($Result);
	$full_date = date("Y-m-d");

	$renewal_notice_prev = $Line1->renewal_notice;		
?>
	<table border="0" align="center" width="650" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
	<tr>
		<td colspan="2" align="center" valign="center"><table border="1" width="100%"><tr><th align="center">AEMMA ONLINE LIBRARY REGISTRATION / MEMBERS ONLY ADMINISTRATION - <?=strtoupper($State);?></th></tr></table></td>
	</tr>
	<tr>
<?php
	if ($State <> "Create")
		{
		echo ('<td valign="center" width="13%" id="Label">ID#:&nbsp;</td>');
		echo ('<td width="37%"><input type="text" name="ID" maxlength="6" size="6" value="'.$Line1->ID.'"><font id="Label">&nbsp;(this is a unique number automatically assigned to each registrant)</font></td>');
		echo ('</tr><tr>');
		}

	if ($State == "Create")
		{ echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>UserID:&nbsp;</td>'); }
	else
		{ echo ('<td valign="center" width="13%" id="Label">UserID:&nbsp;</td>'); }
	echo ('<td width="37%"><input type="text" name="userID" maxlength="12" size="22" value="'.$Line1->userID.'"></td>');
	echo ('</tr><tr>');

	if ($State == "Create")
		{ echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>Password:&nbsp;</td>'); }
	else
		{ echo ('<td valign="center" width="13%" id="Label">Password:&nbsp;</td>'); }
	echo ('<td width="37%"><input type="text" name="password" maxlength="12" size="12" value="'.$Line1->password.'"></td>');
	echo ('</tr><tr>');

	if ($State == "Create")
		{ echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>Surname:&nbsp;</td>'); }
	else
		{ echo ('<td valign="center" width="13%" id="Label">Surname:&nbsp;</td>'); }
	echo ('<td width="37%"><input type="text" name="surname" maxlength="30" size="22" value="'.$Line1->surname.'"></td>');
	echo ('</tr><tr>');

	if ($State == "Create")
		{ echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>First Name:&nbsp;</td>'); }
	else
		{ echo ('<td valign="center" width="13%" id="Label">First Name:&nbsp;</td>'); }
	echo ('<td width="37%"><input type="text" name="first_name" maxlength="30" size="22" value="'.$Line1->first_name.'"></td>');
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Middle Initial(s):&nbsp;</td>');
	echo ('<td width="37%"><input type="text" name="middle_initial"  maxlength="6" size="6" value="'.$Line1->middle_initial.'"></td>');
	echo ('</tr><tr>');

	if ($State == "Create")
		{
		echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>Privileged:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="privileged" maxlength="1" size="1" value="0"><font id="Label">&nbsp;(access to all contents including secured ones is enabled "1" or disabled and default "0",)</font></td>'); 
		}
	else
		{
		echo ('<td valign="center" width="13%" id="Label">Privileged:&nbsp;</td>');
		echo ('<td width="37%"><input type="text" name="privileged" maxlength="1" size="1" value="'.$Line1->privileged.'"><font id="Label">&nbsp;(access to all contents including secured ones is enabled "1" or disabled and default "0",)</font></td>'); 
		}
	echo ('</tr><tr>');

	if ($State == "Create")
		{
		echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>Access Status:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="access_status"  maxlength="1" size="1" value="1"><font id="Label">&nbsp;(access to library is enabled and default "1" or disabled "0")</font></td>'); 
		}
	else
		{
		echo ('<td valign="center" width="13%" id="Label">Access Status:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="access_status"  maxlength="1" size="1" value="'.$Line1->access_status.'"><font id="Label">&nbsp;(access to library is enabled and default "1" or disabled "0")</font></td>'); 
		}
	echo ('</tr><tr>');

	if ($State == "Create")
		{
		echo ('<td valign="center" width="13%" id="Label">Renewal Status:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="renewal_status" maxlength="1" size="1" value="0"><font id="Label">&nbsp;(individuals who have renewed their registrations "1" or not, default "0")</font></td>'); 
		}
	else
		{
		echo ('<td valign="center" width="13%" id="Label">Renewal Status:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="renewal_status" maxlength="1" size="1" value="'.$Line1->renewal_status.'"><font id="Label">&nbsp;(individuals who have renewed their registrations "1" or not, default "0")</font></td>'); 
		}
	echo ('</tr><tr>');

	if ($State == "Create")
		{
		echo ('<td valign="center" width="13%" id="Label">Renewal Notice:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="renewal_notice" maxlength="1" size="1" value="0"><font id="Label">&nbsp;(individuals who have been informed of their registration expiry "1" or not, default "0")</font></td>'); 
		}
	else
		{
		echo ('<td valign="center" width="13%" id="Label">Renewal Notice:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="renewal_notice" maxlength="1" size="1" value="'.$Line1->renewal_notice.'"><font id="Label">&nbsp;(set this to "1" will generate an email to inform the user of impending registration expiry, default "0")</font></td>'); 
		}
	echo ('</tr><tr>');

	if ($State == "Create")
		{
		echo ('<td valign="center" width="13%" id="Label">Member Status:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="member_status" maxlength="1" size="1" value="0"><font id="Label">&nbsp;(only AEMMA members or students have access to those resources set to "1" or not, default "0")</font></td>'); 
		}
	else
		{
		echo ('<td valign="center" width="13%" id="Label">Member Status:&nbsp;</td>'); 
		echo ('<td width="37%"><input type="text" name="member_status" maxlength="1" size="1" value="'.$Line1->member_status.'"><font id="Label">&nbsp;(only AEMMA members or students have access to those resources set to "1" or not, default "0")</font></td>'); 
		}
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Organization:&nbsp;</td>'); 
	echo ('<td width="37%"><input type="text" name="organization" maxlength="40" size="40" value="'.$Line1->organization.'"></td>'); 
	echo ('</tr><tr>');

	if ($State == "Create")
		{ echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>Country:&nbsp;</td>'); }
	else
		{ echo ('<td valign="center" width="13%" id="Label">Country:&nbsp;</td>'); }
	echo ('<td width="37%"><input type="text" name="country" maxlength="30" size="22" value="'.$Line1->country.'"></td>'); 
	echo ('</tr><tr>');

	if ($State == "Create")
		{ 
		echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>Registration Date:&nbsp;</td>'); 
		echo ('<td  width="37%"><input type="text"  name="registration_date" maxlength="10" size="10" value="'.$full_date.'" id="registration_date">'); 
		}
	else
		{
		echo ('<td valign="center" width="13%" id="Label">Registration Date:&nbsp;</td>'); 
		echo ('<td  width="37%"><input type="text"  name="registration_date" maxlength="10" size="10" value="'.$Line1->registration_date.'" id="registration_date">'); 
		}
?>
				<script type="text/javascript">
					Calendar.setup( {
						inputField : "registration_date",
						ifFormat   : "%Y-%m-%d"
					});
				</script><font id="Label">&nbsp;(yyyy-mm-dd)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Last Access Date:&nbsp;</td>
		<td width="37%"><input type="text" name="last_access_date" maxlength="19" size="19" value="<?=$Line1->last_access_date?>"><font id="Label">&nbsp;(yyyy-mm-dd hh:mm:ss)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Last Resource&nbsp;Accessed:&nbsp;</td>
		<td width="37%"><input type="text" name="resource" maxlength="80" size="22" value="<?=$Line1->resource?>"></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">IP:&nbsp;</td>
		<td width="37%"><input type="text" name="ip_addy" maxlength="15" size="15" value="<?=$Line1->ip_addy?>"><font id="Label">&nbsp;(IP address, automatically generated by system)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">DNS name:&nbsp;<br />&nbsp;</td>
		<td width="37%"><input type="text" name="dnsname" maxlength="120" size="60" value="<?=$Line1->dnsname?>"><br /><font id="Label">&nbsp;(dnsname, automatically generated by system using the IP address)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Access Counter:&nbsp;</td>
		<td width="37%"><input type="text" name="access_counter" maxlength="4" size="4" value="<?=$Line1->access_counter?>"><font id="Label">&nbsp;(total number of online library accesses for this individual)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Member Access Counter:&nbsp;</td>
		<td width="37%"><input type="text" name="member_access_counter" maxlength="4" size="4" value="<?=$Line1->member_access_counter?>"><font id="Label">&nbsp;(total number of members only online accesses for this individual)</font></td>
	</tr>
	<tr>
<?php
	if ($State == "Create")
		{ echo ('<td valign="center" width="13%" id="Label"><font color="red" size="+1">*</font>email:&nbsp;</td>'); }
	else
		{ echo ('<td valign="center" width="13%" id="Label">email:&nbsp;</td>'); }
?>
		<td width="37%"><input type="text" name="email" maxlength="60" size="42" value="<?=$Line1->email?>"></td>
	</tr>
<?php
	if ($State == "Create")
		{ echo ('<tr><td colspan="2" id="Label"><center><font color="red">The fields marked with an "*" are required fields during creation of a new registration record!</font></center></td></tr>'); }
?>
	<tr>
		<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#AFC7C7" id="Label"><center>Notes or Comments:</center></td></tr></table><center><textarea name="comments" rows="4" cols="80" wrap="virtual"><?=$Line1->comments?></textarea></center><br /></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="hidden" name="ID" value="<?=$ID?>"><input type="hidden" name="State" value="Member<?=$State?>"><input type="hidden" name="Renewal" value="<?=$renewal_notice_prev?>"><input type="Submit" value="Save Registration Information"></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	</table>
</form>
</body>
</html>

<?php

} //End Function MemberShow

// Main Loop

      if ($_SESSION["RoleID"] < 3) {
?>
<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
	</head>

	<body align="center" valign="top" bgcolor="white">
	<?
	if ($rtype == "library")
		{ echo ('<p>ERROR: You do not have the necessary permissions to view / edit AEMMA online library registration data.</p>'); }
	else
		{ echo ('<p>ERROR: You do not have the necessary privileges to access the AEMMA members only area.</p>'); }
	?>
        </body>
</html>
<?
        }
        else {

// The main loop.  Call functions based on the value of $_POST["state"], which gets set
// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.

		$ID = '';
		if (isset($_GET['ID']))		{ $ID = $_GET['ID']; }
		if (isset($_POST['ID']))	{ $ID = $_POST['ID']; }

		$State = '';
		if (isset($_GET['State']))	{ $State = $_GET['State']; }
		if (isset($_POST['State']))	{ $State = $_POST['State']; }

		$Renewal = '';
		if (isset($_GET['Renewal']))	{ $Renewal = $_GET['Renewal']; }
		if (isset($_POST['Renewal']))	{ $Renewal = $_POST['Renewal']; }

		// rtype specifies the AEMMA resource type accessed
		// rtype = "library" == access for the online library
		// rtype = "member" == access for the members only area
		//
		$rtype = "";
		if (isset($_GET['rtype'])) { $what = $_GET['rtype']; }
		if ($rtype == "")
			{ $rtype = "library"; }


//		echo ('debug: main loop: ID passed = '.$ID.', state passed = '.$State );

		$LinkID = dbConnect($DB);

		switch($State) {

			case 'Status':
				phpinfo();
				break;

			case 'Create':
			case 'Expired':
			case 'Update':
				MemberShow($LinkID, $State, $_GET['ID']);
				break;

			case 'MemberExpired':
			case 'MemberUpdate':
      			if ($_SESSION["RoleID"] > 3) 
				{
				$privileged		= isset($_POST['privileged'])			?  $_POST['privileged'] : "";
				$access_status		= isset($_POST['access_status'])		?  $_POST['access_status'] : "";
				$renewal_status		= isset($_POST['renewal_status'])		?  $_POST['renewal_status'] : "";
				$renewal_notice		= isset($_POST['renewal_notice'])		?  $_POST['renewal_notice'] : "";
				$member_status		= isset($_POST['member_status'])		?  $_POST['member_status'] : "";
				$access_counter		= isset($_POST['access_counter'])		?  $_POST['access_counter'] : "";
				$member_access_counter	= isset($_POST['member_access_counter'])	?  $_POST['member_access_counter'] : "";

				MemberUpdate($LinkID, $State, $ID, $_POST['userID'], $_POST['password'], $_POST['first_name'], $_POST['middle_initial'], $_POST['surname'],
					$privileged, $access_status, $renewal_status, $renewal_notice, $member_status, $_POST['organization'], $_POST['country'], $_POST['registration_date'],
					$_POST['last_access_date'], $_POST['resource'], $_POST['ip_addy'], $_POST['dnsname'], $access_counter, $member_access_counter, $_POST['email'],
					$_POST['comments'], $Renewal  );
				}
			else
				{
				?>
				<html>
				<head>
				<link rel="stylesheet" href="main.css" type="text/css">
				</head>
				<body align="center" valign="top" bgcolor="white">
				<?
				if ($rtype == "library")
					{ echo ('<p>ERROR: You do not have the necessary permissions to edit AEMMA online library registration data.</p>'); }
				else
					{ echo ('<p>ERROR: You do not have the necessary privileges to access the AEMMA members only area.</p>'); }
				?>
        			</body>
				</html>
				<?
				}
				break;

			case 'MemberCreate':
      			if ($_SESSION["RoleID"] > 3) 
				{
				$privileged		= isset($_POST['privileged'])			?  $_POST['privileged'] : "";
				$access_status		= isset($_POST['access_status'])		?  $_POST['access_status'] : "";
				$renewal_status		= isset($_POST['renewal_status'])		?  $_POST['renewal_status'] : "";
				$renewal_notice		= isset($_POST['renewal_notice'])		?  $_POST['renewal_notice'] : "";
				$member_status		= isset($_POST['member_status'])		?  $_POST['member_status'] : "";
				$access_counter		= isset($_POST['access_counter'])		?  $_POST['access_counter'] : "";
				$member_access_counter	= isset($_POST['member_access_counter'])	?  $_POST['member_access_counter'] : "";

				MemberCreate($LinkID, $State, $ID, $_POST['userID'], $_POST['password'], $_POST['first_name'], $_POST['middle_initial'], $_POST['surname'],
					$privileged, $access_status, $renewal_status, $renewal_notice, $member_status, $_POST['organization'], $_POST['country'], $_POST['registration_date'],
					$_POST['last_access_date'], $_POST['resource'], $_POST['ip_addy'], $_POST['dnsname'], $access_counter, $member_access_counter, $_POST['email'],
					$_POST['comments'], $Renewal );
				}
			else
				{
				?>
				<html>
				<head>
				<link rel="stylesheet" href="main.css" type="text/css">
				</head>
				<body align="center" valign="top" bgcolor="white">
				<?
				if ($rtype == "library")
					{ echo ('<p>ERROR: You do not have the necessary permissions to create AEMMA online library registration data.</p>'); }
				else
					{ echo ('<p>ERROR: You do not have the necessary privileges to access the AEMMA members only area.</p>'); }
				?>
       			</body>
				</html>
				<?
				}
				break;

			case 'MemberDelete':
				MemberDelete($LinkID, $ID);
				break;
		}
		dbClose($LinkID);
	}
?>
