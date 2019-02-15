<?php
 session_save_path("/home/users/web/b2211/nf.aemma/cgi-bin/tmp");
	session_start();
	include_once 'library_IDValid.php';
	include_once 'library_DB.php';
?>

<html>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css">
	</head>

	<body align="center" valign="top" bgcolor="white">

<?php

	if (isset($_POST['OldPW'])) {

		if ($_POST['NewPW1'] != $_POST['NewPW2']) {
			echo ('&nbsp;<p>&nbsp;<p>&nbsp;<center>New password confirmation does NOT not match new password.<br>');
			echo ('Please try again.<br>');
			exit();
		} elseif ($_POST['OldPW'] == $_POST['NewPW1']) {
			echo ('&nbsp;<p>&nbsp;<p>&nbsp;<center>New password is same as old.<br>');
			echo ('Please try again.<br>');
			exit();
		}

		$LinkID=dbConnect($DB);
		ChangePW($LinkID, $_POST['OldPW'], $_POST['NewPW1']);
		dbClose($LinkID);

	} else {
?>
		<p>&nbsp;
		<p>&nbsp;
		<form action="library_ChangePW.php" name="ChangePW" method="POST">
			<table border="0" colspan="2" align="center" cellpadding="1" bordercolor="#000000">
				<tr><td align="center" colspan="2"><B><U>CHANGE PASSWORD</U><HR></B></td></tr>
				<tr>
				<td valign="bottom" align="right"><div id="Label">Login ID:</td>
				<td valign="bottom" align="left"><font color="blue"><B><?=$_SESSION["UserID"]?></B></font></td>
				</tr>
				<tr>
				<td valign="center" align="right"><div id="Label">Old Password:</td>
				<td><input type="password" name="OldPW" size=16 maxlength="16"></td>
				</tr>
				<tr>
				<td valign="center" align="right"><div id="Label">New Password:</td>
				<td><input type="password" name="NewPW1" size=16 maxlength="16"></td>
				</tr>
				<tr>
				<td valign="center" align="right"><div id="Label">Confirm:</td>
				<td><input type="password" name="NewPW2" size=16 maxlength="16"></td>
				</tr>
			</table>
			<center>
			<input type="reset"  value="Reset Form">
			<input type="submit" value="Change Password" name="OK"></td></tr>
			</center>
		</form>
<?php
	}
?>

	</body>
</html>
