<?php
// 	Program: content_members_changePW_en.php
//	Description: source for the English textual content on the members only change password page (members_changePW.php)
//	2016 ------------------
//
// English content -------------------
$title[0]	= "CHANGE YOUR MEMBERS' ONLY AREA ACCESS PASSWORD";
$pw_old_pw[0]	= "Old Password:";
$pw_new_pw[0]	= "New Password:";
$pw_confirm[0]	= "Confirm:";
$pw_reset[0]	= "Reset Form";
$pw_change_pw[0] = "Change Password";
if (isset($_SESSION['PName']))
	{
	$pw_p1[0]	= "<font color='green'>".$_SESSION['PName'].", the system will encrypt your password before saving it.</font>";
	$pw_error_1[0] = "<font color='red'>".$_SESSION['PName'].", the new password confirmation does <b>NOT</b> not match new password entered.<br />'Please try again.</font>";
	$pw_error_2[0] = "<font color='red'>".$_SESSION['PName'].", the new password is <b>same as old password</b>.<br />Please try again.</font>";
	$pw_OK[0] = "<font color='green'>".$_SESSION['PName'].", your password has been <b>successfully</b> updated.<br />You can continue with this session in the members only area, but once you logout, you will need to enter your new password.</font>";
	$pw_not_OK[0] = "<font color='red'>".$_SESSION['PName'].", your password has <b>NOT</b> been changed due to the old password being incorrect.<br />Please try again or contact the administrator for assistance.</font>";
	$pw_problems[0] = "<font color='red'>".$_SESSION['PName'].", your password was <b>NOT</b> changed due to a problem with the AIMS systems processing your change request.<br />Please contact the administrator and describe to him/her of what you were attempting to do.</font>";
	}
?>
