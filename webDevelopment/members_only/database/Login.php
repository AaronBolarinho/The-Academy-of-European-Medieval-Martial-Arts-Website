<?php
ini_set('display_errors', 'On');
//
// Program: Login.php
// Author: David M. Cvet
// Created: Nov 30, 2015
// Description:
//	This procedure, invoked by a login form, will make a connection to the SQL server
//	and then login using the userID and password entered by user.  Calls "dbConnect" and "dbLogin", both which
//	are part of the included DB.php script. 
//	
//	note: use "session_destroy();" to clear out session variables upon logging out
//	
//	The program flow#1: members_only_login.php (<==database/members_only_login_insertion.php) ==> database/Login.php (<==database/DB.php) ==> content/Main.php
//	The program flow#2: admin_login_MIMS.php ==> database/Begin.php ==> Login.php (& DB.php) ==> AIMS_home_page.php
//		- admin_login_MIMS.php: presents the login screen requesting Username and Password and calls Login.php from the login <form>
//		- Login.php:		upon validated login, it calls index.php with the PGM variable "Home_logged_in.php"
//		- AIMS_home_page.php: 	provides the home page and welcome to a member who successfully logs into the members' only area
//
//---------------------------
// Updates:
//	2016 -----------
//	aug 16:	adjusted the code to support preferred principle name and salutation, turned them into a session variables
//	sep 07:	Main.php is invoking a bad command, invoking a code 400
//		- two problems, the session values are NOT being stored on the server
//		- problem with some code in Main.php
//	sep 09:	reset AIMS to "0" whenever the user attempting to login into AIMS is still using "password" as their password
//	nov 03:	added a new session variable $_SESSION['DBLogin'] which keeps track of whether or not the database connection remains intact throughout the session
//
	if (isset($_GET['LANG'])) { $lang = $_GET['LANG']; } else { $lang = "en"; }
	if (isset($_GET['AIMS'])) 
		{
		$aims = $_GET['AIMS'];
		if ($aims)
			{ setcookie("AIMS", "$aims", time() + (86400 * 3), "/"); } // 86400 = 1 day, this will cause the appearance of the AIMS menu option, and disable the sub-menu for login once logged in
//		include "../php-bin/retrieve_cookies.php";
		}
	else { $aims = 0; }

	// this is to handle the AIMS admin login, whereby the form invokes the login script via javascript, carrying the values of the form data elements
	if (isset($_GET['ID'])) { $username = $_GET['ID']; } else { $username = $_POST['ID']; }
	if (isset($_GET['PW'])) { $pwd = $_GET['PW']; } else { $pwd = $_POST['PW']; }
	if (isset($_GET['IP'])) { $ipaddress = $_GET['IP']; } else { $ipaddress = $_POST['IPaddress']; }

	include 'ss_path.stuff';
	session_start();
	include_once 'DB.php';
	include 'function_LogAccess.php';
	include 'function_members_ChangePW.php';
	// initialize the SESSION variables, in order to eliminate the PHP warning messages
	$_SESSION['UserID']   		= '';
	$_SESSION['MemberID'] 		= '';
	$_SESSION['RoleID']   		= '';
	$_SESSION['RoleDesc'] 		= '';
	$_SESSION['DBlogin'] 		= 0;			// this is a session variable which determines whether or not the username is logged into the AIMS database
	$_SESSION['IPaddress'] 		= $ipaddress;
	$LinkID				= dbConnect($DB);
	$_SESSION['LinkID'] 		= $LinkID;
//	$_SESSION['POSTIT']		= 1;		// setting this to "1" will enable the post-it to popup on the members only home page to promote an event

	// if the user logging in is NOT accessing the database and is a member, assign value of "1" in member_login.htm as a hidden form value
	// else it is assigned "0" in the database/index.php script for database access users
	//
	if (isset($_GET['MEMLOGIN']))	{ $member_login = $_GET['MEMLOGIN']; }
	if (isset($_POST['MEMLOGIN']))	{ $member_login = $_POST['MEMLOGIN']; }
//echo ('debug:login.php:55:just before dbLogin; $_POST[ID]="'.$_POST['ID'].'", $_POST[PW]="'. $_POST['PW'].'"');exit; // (post data exists and is sourced from form)
//	$db_login_return = dbLogin($LinkID, $_POST['ID'], $_POST['PW']);
	$db_login_return = dbLogin($LinkID, $username, $pwd);
//$db_login_return = 4;
//echo ('debug:login.php:57:just after dbLogin, $db_login_return="'.$db_login_return.'", gims="'.$aims.'"');exit; // (code returns the valid values for the various scenarios with respect to usernames and passwords)
	if ( $db_login_return <> 3)
		{
		// the login failed due to incorrect User Name (return value of 1) or Password (return value of 2) or Password still is "password" when logging into AIMS (return value of 4)
		if ($db_login_return == 1) 
			{
			if ($lang == "en")
				{ $msg = "Your <b>Username</b> ==> <font color='black'><b><i>".$username."</i></b></font> <== entered is incorrect or invalid. Please Try Again!"; }
			else	{ $msg = "Votre <b>Username</b> ==> <font color='black'><b><i>".$username."</i></b></font> <== entré est incorrecte ou invalide . Veuillez réessayer!"; }
			echo ('<script type="text/JavaScript">');
			if ($aims)
				{ dbClose($LinkID); echo ('parent.location.href="../../members_only/content/admin_login_AIMS.php?MSG='.$msg.'"'); }

			else
				{ echo ('parent.location.href="../../content/members_only_login.php?MSG='.$msg.'"'); }
			echo ('</script>');
			exit;
			//setcookie("cookie_msg", "$db_message", time() + (86400 * 3), "/"); // 86400 = 1 day
			} 
		elseif ($db_login_return == 2)  
			{
			if ($lang == "en")
				{ $msg = "Your <font color='green'><b>Username</b> ==> <font color='black'><b><i>".$username."</i></b></font> <== is correct</font>, but your <b>Password</b> entered is incorrect. Please Try Again!";  }
			else	{ $msg = "Votre <font color='green'><b>Username</b> ==> <font color='black'><b><i>".$username."</i></b></font> <==  est correcte</font> , mais votre <b>Password</b> est entré est incorrect . Veuillez réessayer!"; }
			echo ('<script type="text/JavaScript">');
			echo ('parent.location.href="../../content/members_only_login.php?MSG='.$msg.'"');
			echo ('</script>');
			exit;
			//echo ('debug:login:76:$db_login_return="'.$db_login_return.'"'); exit;  (code is correct to this point for return value of "2")
			//setcookie("cookie_msg", "$db_message", time() + (86400 * 3), "/"); // 86400 = 1 day
			}
		elseif ($db_login_return == 4)
			{
			// retrieve the full name of the user logged in and other details which may or may not be needed
			$SQL = 'SELECT M.Salutation, M.Member_Number, M.FirstName, M.MiddleName, M.LastName, M.PreferredName, M.Postnominals, M.Gender, M.Portrait_URL, M.Portrait_File, M.Address, M.City, M.ProvState, M.PCZip, M.NumHome, M.NumMobile, M.Email, M.Birth_Date, M.Spouse, M.Date_Joined, M.EmergContactName, M.EmergContactPhone, M.Chapter_ID, MR.Rank_ID, R.Rank_Desc ';
			$SQL .= ' FROM Members M, Members_Rank MR, Ranks R';
			$SQL .= ' WHERE M.Member_ID = '.$_SESSION['MemberID'];
//			$SQL .= ' WHERE M.Member_ID = 6766';
			$SQL .= ' AND (M.Member_ID = MR.Member_ID) AND (MR.Rank_ID = R.Rank_ID) ';
			$Result = mysqli_query($LinkID, $SQL);
//echo ('debug:login.php:148:SQL="'.$SQL.'"');
			while ($obj = mysqli_fetch_object($Result)) 
				{
				if ($obj->MiddleName)
					{ $uname_temp = $obj->FirstName.' '.$obj->MiddleName.' '.$obj->LastName;}
				else
					{ $uname_temp = $obj->FirstName.' '.$obj->LastName;}
				if ($obj->Postnominals <> "")
					{ $uname_temp .= ', '.$obj->Postnominals; }
				if ($obj->Salutation <> "")
					{ $uname_temp = $obj->Salutation.' '.$uname_temp; }
				$_SESSION['uname'] = $uname_temp;
				$_SESSION['username'] = $username;
				$_SESSION['Salutation'] = $obj->Salutation;
				if ($obj->Member_Number) { $_SESSION['MemberNumber'] = $obj->Member_Number; } else { $_SESSION['MemberNumber'] = "Not assigned"; } 
				$_SESSION['FName'] = $obj->FirstName;
				$_SESSION['PName'] = $obj->PreferredName;
				$_SESSION['Address'] = $obj->Address;
				$_SESSION['City'] = $obj->City;
				$_SESSION['ProvState'] = $obj->ProvState;
				$_SESSION['PCZip'] = $obj->PCZip;
				$_SESSION['NumHome'] = $obj->NumHome;
				$_SESSION['NumMobile'] = $obj->NumMobile;
				$_SESSION['Email'] = $obj->Email;
				$_SESSION['Gender'] = $obj->Gender;
				$_SESSION['BirthDate'] = $obj->Birth_Date;
				$_SESSION['Spouse'] = $obj->Spouse;
				$_SESSION['DateJoined'] = $obj->Date_Joined;
				$_SESSION['EmergContact'] = $obj->EmergContactName;
				$_SESSION['EmergContactPhone'] = $obj->EmergContactPhone;
				$_SESSION['Rank_ID'] = $obj->Rank_ID;
				$_SESSION['Rank'] = $obj->Rank_Desc;
				$_SESSION['ChapterID'] = $obj->Chapter_ID;
				$_SESSION['portrait_URL'] = $obj->Portrait_URL;
				$_SESSION['portrait_File'] = $obj->Portrait_File;
				if (!$_SESSION['PName']) { $_SESSION['PName'] = $_SESSION['FName']; }
//echo ('debug:Login:182:$_SESSION[\'PName\']="'.$_SESSION['PName'].'", $_SESSION[\'portrait\']="'.$_SESSION['portrait'].'", $_SESSION[\'RoleID\']="'.$_SESSION['RoleID'].'"'); exit; //(at this point, the SESSION variables continue to hold their assigned values)
				}
				// retrieve the user's commandery ID, necessary to bring up the oblations page specific for that commandery
				$SQL  = 'SELECT MC.Chapter_ID, C.Chapter_Name FROM Members_Chapter MC, Chapters C ';
				$SQL .= 'WHERE MC.Member_ID = '.$_SESSION['MemberID'].' AND MC.Chapter_ID = C.Chapter_ID ';
				$SQL .= 'AND MC.Current_Status = 1';
				$Result = mysqli_query($LinkID, $SQL);
				if (mysqli_errno($LinkID) == 0) 
					{
					$obj = mysqli_fetch_object($Result);
					$_SESSION['Chapter'] = $obj->Chapter_Name;
					}
				else
					{ $_SESSION['Chapter'] = "NA"; }
			if ($aims == 1)
				{
//echo ('debug:login.php:76:return = 4');exit;
				dbClose($LinkID);
				if ($lang == "en")
					{$msg = "<font color='red'>".$_SESSION['PName'].", your password is still set to the default '<i><b>password</b></i>' which is not permitted to gain access to <font color='green'><b>AIMS</b></font></font>.<br /><font color='blue'>Please change your password to something more secure and memorable.<br />If you need assistance, please contact the administrator/webmaster.</font>"; }
				else
					{$msg = "<font color='red'>".$_SESSION['PName'].", votre mot de passe est toujours réglé sur la valeur par défaut  « <i><b>password</b></i> » qui ne sont pas autorisés à accéder à <font color='green'><b>AIMS</b></font></font>.<br /><font color='blue'>PS'il vous plaît changer votre mot de passe à quelque chose de plus sûr et mémorable.<br />Si vous avez besoin d'aide, s'il vous plaît contacter l'administrateur / webmaster.</font>"; }
				// reset AIMS to "0" so that given the user's password is "password", attempting to login into AIMS is now disabled
				$aims = 0;
				setcookie("AIMS", "$aims", time() + (86400 * 3), "/");
				members_ChangePW($msg, $aims);
//				echo ('<script type="text/JavaScript">');
//				echo ('parent.location.href="../content/members_changePW.php?MSG='.$msg.'&AIMS='.$aims.'"');	// reset AIMS variable to "0" so that the AIMS drop down menu reverts to pre-AIMS login options
//				echo ('</script>');
				exit;
//				dbClose($LinkID);
//				exit();
				}
			else
				{
				// this is NOT a AIMS login, advise the user to change their default password to something else for security purposes
				if ($lang == "en")
					{$msg = "<font color='red'>".$_SESSION['PName'].", your password is still set to the default '<i><b>password</b></i>'.<br />Please consider changing your password to something more secure and memorable.</font><br /><font color='blue'>You may, however, continue with your current session without changing your password at this time.<br />If you need assistance, please contact the administrator/webmaster.</font>"; }
				else
					{$msg = "<font color='red'>".$_SESSION['PName'].", votre mot de passe est toujours réglé sur la valeur par défaut  « <i><b>password</b></i> ».<br />S'il vous plaît envisager de changer votre mot de passe à quelque chose de plus sûr et mémorable.</font><br /><font color='blue'>Vous pouvez, toutefois, continuer votre session en cours sans changer votre mot de passeen ce moment.<br />Si vous avez besoin d'aide, s'il vous plaît contacter l'administrateur / webmaster.</font>"; }
//echo ('debug:login.php	:123:return = 4, msg="'.$msg.'"');exit; // (code works to this point when gims <> 1 and return value = 4)
				members_ChangePW($msg, $aims);
//				echo ('<script type="text/JavaScript">');
//				echo ('parent.location.href="../content/members_changePW.php?MSG='.$msg.'"');
//				echo ('</script>');
				exit;
				}
			} // end $db_login_return == 4
		} // end $db_login_return <> 3
	else
		{
		// login is successful - record the login in table: Login_log
		$OK = 1;
		setcookie("AEMMA_Cookie", "$OK", time() + (86400 * 3), "/"); // 86400 = 1 day
		if ($aims)
			{ $resource = "successfully logged into AIMS"; }
		else
			{ $resource = "successfully logged into AEMMA Members' Only Area"; }
//echo ('LogAccess($LinkID, $_SESSION[\'MemberID\']="'.$_SESSION['MemberID'].'", $_SESSION[\'UserID\']="'.$_SESSION['UserID'].'", $_SESSION[\'RoleID\']="'.$_SESSION['RoleID'].'", $resource="'.$resource.'", $ipaddress="'.$ipaddress); exit; // (code at this point has member ID, userID, roleID, resource access and IP addy)
		LogAccess($LinkID, $_SESSION['MemberID'], $_SESSION['UserID'], $_SESSION['RoleID'], $resource, $ipaddress);
		}

	// retrieve the full name of the user logged in and other details which may or may not be needed
	$SQL = 'SELECT DISTINCT M.Salutation, M.Member_Number, M.FirstName, M.MiddleName, M.LastName, M.PreferredName, M.Postnominals, M.Gender, M.Portrait_URL, M.Portrait_File, M.Address, M.City, M.ProvState, M.PCZip, M.NumHome, M.NumMobile, M.Email, M.Birth_Date, M.Spouse, M.Date_Joined, M.EmergContactName, M.EmergContactPhone, MR.Rank_ID, R.Rank_Desc ';
	$SQL .= ' FROM Members M, Members_Rank MR, Ranks R';
	$SQL .= ' WHERE M.Member_ID = '.$_SESSION['MemberID'];
//	$SQL .= ' WHERE M.Member_ID = 6766';
	$SQL .= ' AND (M.Member_ID = MR.Member_ID) AND (MR.Rank_ID = R.Rank_ID) AND (MR.Current_Status = 1) ';
	$Result = mysqli_query($LinkID, $SQL);
//if ($aims) { echo ('debug:login.php:148:SQL="'.$SQL.'"');exit; }
//echo ('debug:login.php:148:SQL="'.$SQL.'"');
	while ($obj = mysqli_fetch_object($Result)) 
		{
		if ($obj->MiddleName)
			{ $uname_temp = $obj->FirstName.' '.$obj->MiddleName.' '.$obj->LastName;}
		else
			{ $uname_temp = $obj->FirstName.' '.$obj->LastName;}
		if ($obj->Postnominals <> "")
			{ $uname_temp .= ', '.$obj->Postnominals; }
		if ($obj->Salutation <> "")
			{ $uname_temp = $obj->Salutation.' '.$uname_temp; }
		$_SESSION['uname'] = $uname_temp;
		$_SESSION['username'] = $username;
		if ($obj->Member_Number) { $_SESSION['MemberNumber'] = $obj->Member_Number; } else { $_SESSION['MemberNumber'] = "Not assigned"; } 
		$_SESSION['Salutation'] = $obj->Salutation;
		$_SESSION['FName'] = $obj->FirstName;
		$_SESSION['PName'] = $obj->PreferredName;
		$_SESSION['Address'] = $obj->Address;
		$_SESSION['City'] = $obj->City;
		$_SESSION['ProvState'] = $obj->ProvState;
		$_SESSION['PCZip'] = $obj->PCZip;
		$_SESSION['NumHome'] = $obj->NumHome;
		$_SESSION['NumMobile'] = $obj->NumMobile;
		$_SESSION['Email'] = $obj->Email;
		$_SESSION['Gender'] = $obj->Gender;
		$_SESSION['BirthDate'] = $obj->Birth_Date;
		$_SESSION['Spouse'] = $obj->Spouse;
		$_SESSION['DateJoined'] = $obj->Date_Joined;
		$_SESSION['Rank_ID'] = $obj->Rank_ID;
		$_SESSION['Rank'] = $obj->Rank_Desc;
		$_SESSION['EmergContact'] = $obj->EmergContactName;
		$_SESSION['EmergContactPhone'] = $obj->EmergContactPhone;
		$_SESSION['portrait_URL'] = $obj->Portrait_URL;
		$_SESSION['portrait_File'] = $obj->Portrait_File;
		if (!$_SESSION['PName']) { $_SESSION['PName'] = $_SESSION['FName']; }
//echo ('debug:Login:182:$_SESSION[\'PName\']="'.$_SESSION['PName'].'", $_SESSION[\'portrait\']="'.$_SESSION['portrait'].'", $_SESSION[\'RoleID\']="'.$_SESSION['RoleID'].'"'); exit; //(at this point, the SESSION variables continue to hold their assigned values)
		// retrieve the user's commandery ID, necessary to bring up the oblations page specific for that commandery
		$SQL  = 'SELECT MC.Chapter_ID, C.Chapter_Name FROM Members_Chapter MC, Chapters C ';
		$SQL .= 'WHERE MC.Member_ID = '.$_SESSION['MemberID'].' AND MC.Chapter_ID = C.Chapter_ID ';
		$SQL .= 'AND MC.Current_Status = 1';
		$Result = mysqli_query($LinkID, $SQL);
		if (mysqli_errno($LinkID) == 0) 
			{
			$obj = mysqli_fetch_object($Result);
			$_SESSION['Chapter'] = $obj->Chapter_Name;
			}
		else
			{ $_SESSION['Chapter'] = "NA"; }
		}
//	dbClose($LinkID);

	if ($aims)
		{
//echo ('debug:Login:188: just before javascript call to AIMS_home_page.php:$_SESSION[\'PName\']="'.$_SESSION['PName'].'", $_SESSION[\'portrait\']="'.$_SESSION['portrait'].'", $_SESSION[\'RoleID\']="'.$_SESSION['RoleID'].'"'); exit; //(at this point, the SESSION variables continue to hold their assigned values just before calling javascript)
		echo ('<script type="text/JavaScript">');
		echo ('parent.location.href="AIMS_home_page.php"');
		echo ('</script>');
		exit;
		}
	else
		{
//echo ('debug:Login:196: just before javascript call to Main.php:$_SESSION[\'PName\']="'.$_SESSION['PName'].'", $_SESSION[\'portrait\']="'.$_SESSION['portrait'].'", $_SESSION[\'RoleID\']="'.$_SESSION['RoleID'].'"'); exit; //(at this point, the SESSION variables continue to hold their assigned values just before calling javascript)
		echo ('<script type="text/JavaScript">');
		echo ('parent.location.href="../index.php"');
//		echo ('about to invoke../members_only/content/Main.php');
		echo ('</script>');
		exit;
		}
?>
