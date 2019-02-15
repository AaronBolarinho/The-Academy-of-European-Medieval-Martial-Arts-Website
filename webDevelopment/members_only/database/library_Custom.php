<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';

Function CustomData($LinkID, $ID, $userID, $password, $first_name, $middle_initial, $surname, $privileged, $access_status, $renewal_status, $organization, $country, 
			$registration_date, $last_access_date, $resource, $ip_addy, $dnsname, $access_counter, $email, $comments ) {

// Build the report html 
?>
<html>
<head>
	<link rel="stylesheet" href="main.css" type="text/css">
	<link rel="stylesheet" href="css/default.css" type="text/css">
	<script type="text/javascript" src="library_main.js"></script>
</head>
<body bgcolor="white">
<center><table cellpadding="0" cellspacing="0" width="700" bgcolor="white">

<?php

// Build the SELECT Statement here.

	$echoString = "";
	$SQL  = 'SELECT ID, userID, password, first_name, middle_initial, surname, privileged, access_status, renewal_status, organization, country, ';
	$SQL .= '	registration_date, last_access_date, resource, ip_addy, dnsname, access_counter, email, comments ';
	$SQL .= ' FROM registeredUsers  ';

// build the "where" clause
	$Cntr = 'WHERE ';
	$Where = '';
	if ($userID != '')  			{ $Where .= $Cntr . 'userID LIKE "%' . $userID . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "userID=$userID, "; }
	if ($surname != '')  			{ $Where .= $Cntr . 'surname LIKE "%' . $surname . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "surname=$surname, "; }
	if ($first_name != '')  		{ $Where .= $Cntr . 'first_name LIKE "%' . $first_name . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "first name=$first_name, "; }

	if ($privileged != '') 			{ $Where .= $Cntr . 'privileged = ' . $privileged . ' ';  $Cntr = 'AND '; $echoString = $echoString . "privileged=$privileged, "; }
	if ($access_status != '')   		{ $Where .= $Cntr . 'access_status = ' . $access_status . ' ';      $Cntr = 'AND ';  $echoString = $echoString . "access status=$access_status, "; }
	if ($renewal_status != '') 		{ $Where .= $Cntr . 'renewal_status = ' . $renewal_status . ' ';     $Cntr = 'AND ';   $echoString = $echoString . "renewal status=$renewal_status, "; }

	if ($organization != '')  		{ $Where .= $Cntr . 'organization LIKE "%' . $organization . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "organization=$organization, "; }
	if ($country != '')  			{ $Where .= $Cntr . 'country LIKE "%' . $country . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "country=$country, "; }
	if ($registration_date != '')		{ $Where .= $Cntr . 'registration_date >= "' . $registration_date . '" '; $Cntr = 'AND ';   $echoString = $echoString . "registration date=$registration_date, "; }
	if ($last_access_date != '')		{ $Where .= $Cntr . 'last_access_date >= "' . $last_access_date . '" '; $Cntr = 'AND ';   $echoString = $echoString . "last access date=$last_access_date, "; }

	if ($resource != '')  			{ $Where .= $Cntr . 'resource LIKE "%' . $resource . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "resource=$resource, "; }
	if ($ip_addy != '')  			{ $Where .= $Cntr . 'ip_addy LIKE "%' . $ip_addy . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "IP=$ip_addy, "; }
	if ($dnsname != '')  			{ $Where .= $Cntr . 'dnsname LIKE "%' . $dnsname . '%" ';   $Cntr = 'AND ';  $echoString = $echoString . "dnsname=$dnsname, "; }
	if ($access_counter*1 > 0) 		{ $Where .= $Cntr . 'access_counter >= ' . $access_counter . ' ';  $Cntr = 'AND '; $echoString = $echoString . "access counter=$access_counter, "; }

	if ($email != '')  			{ $Where .= $Cntr . 'email LIKE "%' . $email . '%" '; $echoString = $echoString . "email=$email, "; }
	$SQL .= $Where." ";
	$SQL .= 'ORDER BY surname';

//echo ('debug: CustomData: sql#1 statement = '.$SQL.'<br />');

	$full_date= date("d-m-Y");	
	echo ('<caption>Registration/Members Custom Online Listing : '.$full_date.'</caption>');
	echo ('<tr><th>UserID</th><th>Name</th><th>Country</th><th>Email</th><th>Privileged</th><th>Access Status</th><th>Renewal Status</th><th>Access Count&nbsp;</th></tr>');
	echo ('<tr><td bgcolor="#FDD017" colspan="8" align="left"><font face="arial,helvetica" size="-2"><i>&nbsp;Search criteria : '.$echoString.'</i></font></td></tr>');


	$Result = mysql_query($SQL, $LinkID);
		while ($Line = mysql_fetch_object($Result)) {
			echo ('<tr OnMouseOver="navBar(this,1,1);"');
			echo (' OnMouseOut="navBar(this,2,1);"');
			echo (' OnClick="navBarClick(this,1,' . $Line->ID . ')">');

			echo ('<td><div id="Data" align="left">' . $Line->userID . '</div></td>');
			echo ('<td><div id="Data">' . $Line->surname . ', ' . $Line->first_name .' ' . $Line->middle_initial . '</div></td>');
			echo ('<td><div id="Data">' . $Line->country . '</div></td>');
			echo ('<td><div id="Data" align="left">' . $Line->email . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->privileged . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->access_status . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->renewal_status . '</div></td>');
			echo ('<td><div id="Data" align="center">' . $Line->access_counter . '</div></td>');
			echo ('</tr>');
		}

	$SQL = 'SELECT count(*) Count';
	$SQL .= ' FROM registeredUsers  ';
	$SQL .= $Where;

//echo ('debug: CustomData: sql#2 statement = '.$SQL.'<br />');

	$Result = mysql_query($SQL, $LinkID);
	while ($Line = mysql_fetch_object($Result)) {
		echo ('<tr bgcolor="gray"><td colspan="8"><font face="arial,helvetica,sans-serif" size="-2" color="white">&nbsp;<b>Total number of registrations from <b>AEMMA</b>: </b>'.$Line->Count.'&nbsp;&nbsp;</td></tr>');
	}

	echo ('</table>');
	mysql_free_result($Result);

}  //End Function CustomData


Function Custom($LinkID, $State) {

?>

<html>
<head>
	<link rel="stylesheet" href="main.css" type="text/css" />
	<link rel="stylesheet" type="text/css" media="all" href="skins/aqua/theme.css" title="Aqua" />
	<script type="text/javascript" src="calendar.js"></script>
	<script type="text/javascript" src="lang/calendar-en.js"></script>
	<script type="text/javascript" src="calendar-setup.js"></script>
</head>
<body align="center" valign="top" bgcolor="white">
<form name="Members" method="post" action="library_Custom.php">
	<table border="0" align="center" width="600" cellpadding="0" cellspacing="2" bgcolor="lightgrey" bordercolor="#000000">
	<tr>
		<td colspan="2" align="center" valign="center"><table border="1" width="100%"><tr><th align="center">CUSTOM ONLINE LISTING GENERATION</th></tr></table></td>
	</tr>
	<tr>
<?php
	echo ('<td valign="center" width="13%" id="Label">UserID:&nbsp;</td>');
	echo ('<td width="37%"><input type="text" name="userID" maxlength="12" size="22" value=""></td>');
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Surname:&nbsp;</td>');
	echo ('<td width="37%"><input type="text" name="surname" maxlength="30" size="22" value=""></td>');
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">First Name:&nbsp;</td>'); 
	echo ('<td width="37%"><input type="text" name="first_name" maxlength="30" size="22" value=""></td>');
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Privileged:&nbsp;</td>');
	echo ('<td width="37%"><input type="text" name="privileged" maxlength="1" size="1" value=""><font id="Label">&nbsp;(access to all contents including secured ones is enabled "1" or disabled and default "0",)</font></td>'); 
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Access Status:&nbsp;</td>'); 
	echo ('<td width="37%"><input type="text" name="access_status"  maxlength="1" size="1" value=""><font id="Label">&nbsp;(access to library is enabled and default "1" or disabled "0")</font></td>'); 
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Renewal Status:&nbsp;</td>'); 
	echo ('<td width="37%"><input type="text" name="renewal_status" maxlength="1" size="1" value=""><font id="Label">&nbsp;(individuals who have renewed their registrations "1" or not, default "0")</font></td>'); 
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Organization:&nbsp;</td>'); 
	echo ('<td width="37%"><input type="text" name="organization" maxlength="40" size="40" value=""></td>'); 
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Country:&nbsp;</td>');
	echo ('<td width="37%"><input type="text" name="country" maxlength="30" size="22" value=""></td>'); 
	echo ('</tr><tr>');

	echo ('<td valign="center" width="13%" id="Label">Registration Date:&nbsp;</td>'); 
	echo ('<td  width="37%"><input type="text"  name="registration_date" maxlength="10" size="10" value="" id="registration_date">'); 
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
		<td width="37%"><input type="text" name="last_access_date" maxlength="19" size="19" value="" id="last_access_date"><font id="Label">&nbsp;(yyyy-mm-dd hh:mm:ss)</font>
			<script type="text/javascript">
			Calendar.setup( {
				inputField : "last_access_date",
				ifFormat   : "%Y-%m-%d"
			});
		</script>
		</td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Last Resource&nbsp;Accessed:&nbsp;</td>
		<td width="37%"><input type="text" name="resource" maxlength="80" size="22" value=""></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">IP:&nbsp;</td>
		<td width="37%"><input type="text" name="ip_addy" maxlength="15" size="15" value=""><font id="Label">&nbsp;(IP address, automatically generated by system)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">DNS name:&nbsp;<br />&nbsp;</td>
		<td width="37%"><input type="text" name="dnsname" maxlength="120" size="42" value=""><br /><font id="Label">&nbsp;(dnsname, automatically generated by system using the IP address)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">Access Counter:&nbsp;</td>
		<td width="37%"><input type="text" name="access_counter" maxlength="4" size="4" value="0"><font id="Label">&nbsp;(total number of online library accesses for this individual)</font></td>
	</tr>
	<tr>
		<td valign="center" width="13%" id="Label">email:&nbsp;</td>
		<td width="37%"><input type="text" name="email" maxlength="60" size="42" value=""></td>
	</tr>
	<tr>
		<td colspan="2"><div class="NavText"><table border="1" width="100%"><tr><td bgcolor="#AFC7C7" id="Label"><center>Notes or Comments:</center></td></tr></table><center><textarea name="comments" rows="3" cols="78" wrap="virtual"></textarea></center><br /></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="hidden" name="ID" value="<?=$ID?>"><input type="hidden" name="State" value="<?=$State?>Data"><input type="Submit" value="Generate Customized Online Listing of Registration Information"></td>
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

if ($_SESSION["RoleID"] < 4) 
	{
	echo ('<html>');
	echo ('<head>');
	echo ('	<link rel="stylesheet" href="main.css" type="text/css">');
	echo ('</head>');
	echo ('<body align="center" valign="top" bgcolor="white">');
	echo ('<p>ERROR: You do not have the necessary permissions to create custom listings of data!</p>');
	echo ('</body>');
	echo ('</html>');
        }
else 
	{

	// The main loop.  Call functions based on the value of $_POST["state"], which gets set
	// via a hidden INPUT TYPE, or through URL parameters called by NavBar Click event.

	$ID = '';
	if (isset($_GET['ID']))		{ $ID = $_GET['ID']; }
	if (isset($_POST['ID']))	{ $ID = $_POST['ID']; }

	$State = '';
	if (isset($_GET['State']))	{ $State = $_GET['State']; }
	if (isset($_POST['State']))	{ $State = $_POST['State']; }

//	echo ('debug: main loop: ID passed = '.$ID.', state passed = '.$State );

	$LinkID = dbConnect($DB);

	switch($State) 
		{

		case 'Status':
			phpinfo();
			break;

		case 'Custom':
			Custom($LinkID, $State);
			break;

		case 'CustomData':
			CustomData($LinkID, $ID, $_POST['userID'], $_POST['password'], $_POST['first_name'], $_POST['middle_initial'], $_POST['surname'],
				$privileged, $access_status, $renewal_status, $_POST['organization'], $_POST['country'], $_POST['registration_date'],
				$_POST['last_access_date'], $_POST['resource'], $_POST['ip_addy'], $_POST['dnsname'], $access_counter, $_POST['email'],
				$_POST['comments']  );
			break;
		}
		dbClose($LinkID);
	}
?>
