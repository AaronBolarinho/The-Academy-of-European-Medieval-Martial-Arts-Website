<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_errors', 'On');
// 	Program: 	function_members_ChangePW.php
//	Description: 	This scripts provides the browser the function to change one's password. Passwords are encrypted in the database.
//			It is organized as a function so that the call can be made from Login.php, replacing the original call made by a javascript call
//			which didn't work on Windows and any windows browser.  Removing the javascript calls from the Login allowed the change password function
//			to work. A separate script ChangePW.php also calls this function, used by the menu.
//	Author:		David M. Cvet
//
//	2016 ----------
//	aug 16:	adjusted the code to support preferred principle name, turned it into a session variable
//	sep 01: enhanced the change password subroutine call to accept a return value from DB.php on the success/failure of the password change
//	sep 02: test for using "password" for the GIMS login, and if so, send user to this change password program
//	sep 08:	added GIMS variable, which will either maintain the GIMS drop-down menu, or revert it to pre-GIMS login
//	nov 29:	converted the script to a function for the reasons described above
//	2019 ------------------
//	jan 25:	standardized path names
//
Function members_ChangePW($msg, $aims) {
//echo ('debug:function_members_ChangePW:16:message="'.$msg.'", gims="'.$aims.'", $_POST[OldPW]="'.$_POST['OldPW'].'"');
if ($aims == 3)	{ $thumbs_OK_to_go = 0; } else 	{ $thumbs_OK_to_go = 1; }	// if gims ==3, this is a case where the thumbs icon is to appear upon initial presentation of ChangePW.php from the menu selection
// begin set database and members only library paths
//$aims = 1;	// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$modal = 0;	// disable the modal code in members_only_header2.php as no modals needed for this script
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
//$common_p1 = $path_members."php-bin/members_only_common_part1.php"; include "$common_p1";	// contains the first half of the header links, IDValid, retrieve cookies common to all members only scripts

// assign values to PHP variables, as it depends upon whether this function was called by the Login, or recalled from the form
if (isset($_POST['OldPW']))	{$old_pw = $_POST['OldPW'];}	elseif (isset($_GET['OldPW'])) {$old_pw = $_GET['OldPW'];} 	else {$old_pw = "";}
if (isset($_POST['NewPW1']))	{$new_pw1 = $_POST['NewPW1'];}	elseif (isset($_GET['NewPW1'])) {$new_pw1 = $_GET['NewPW1'];} 	else {$new_pw1 = "";}
if (isset($_POST['NewPW2']))	{$new_pw2 = $_POST['NewPW2'];}	elseif (isset($_GET['NewPW2'])) {$new_pw2 = $_GET['NewPW2'];} 	else {$new_pw2 = "";}

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include_once "$db_path";
//if (session_status() == PHP_SESSION_NONE) {session_start();}
session_start();

// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
//$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";
$idvalid = $path_dbase."IDValid.php"; include "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
$config_main = $path_members."../config/config.php"; include "$config_main";
$config = $path_members."config/config.php"; include "$config";

// end setup database and members only library paths
$current_pgm = "ChangePW.php?MSG=".$msg."&AIMS=".$aims;
if ($aims == 1)	{$menu_selected = "AIMS";}
else		{$menu_selected = "resources";}
$thumbs_up_down = "";
//if (isset($_GET['GIMS'])) {$aims = $_GET['GIMS'];} else {$aims = 0;}
$config_pwd = $path_members."config/content_members_changePW_$lang.php"; include "$config_pwd";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="'.$path_members.'js-bin/beep.js"></script>');
// check for the PHP parameter MSG, which is set only if the password change has been successful, in order to inform the browser
// that the password has been changed on the change password window
?>
  <script src="js-bin/jquery.min_v1.9.1.js"></script>
  <script src="js-bin/ResponsiveSlides.min.js"></script>
  <script>
	$(function () {
	// Slideshow
	$(".rslides1").responsiveSlides({
		// ** notes: default settings in ResponsiveSlides.min.js **
		//"auto": true, 		// Boolean: Animate automatically, true or false
		//"speed": 500, 		// Integer: Speed of the transition, in milliseconds
		//"timeout": 4000, 		// Integer: Time between slide transitions, in milliseconds
		//"pager": false, 		// Boolean: Show pager, true or false
		//"nav": false, 		// Boolean: Show navigation, true or false
		//"random": false, 		// Boolean: Randomize the order of the slides, true or false
		//"pause": false, 		// Boolean: Pause on hover, true or false
		//"pauseControls": true,	// Boolean: Pause when hovering controls, true or false
		//"prevText": "Previous", 	// String: Text for the "previous" button
		//"nextText": "Next", 		// String: Text for the "next" button
		//"maxwidth": "", 		// Integer: Max-width of the slideshow, in pixels
		//"navContainer": "", 		// Selector: Where auto generated controls should be appended to, default is after the <ul>
		//"manualControls": "", 	// Selector: Declare custom pager navigation
		//"namespace": "rslides", 	// String: change the default namespace used
		//"before": $.noop, 		// Function: Before callback
		//"after": $.noop 		// Function: After callback

		// ** revised settings
		speed: 2000,
		timeout: 7500,
		maxwidth: 550,
		random: true
		});
	});
  </script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main content container -->
	<div id="main_content_mo">
<?php
	if ($old_pw) 
		{
		if ($new_pw1 != $new_pw2)
			{
			$message = $pw_error_1[$lang_num]; 
			echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
			$thumbs_up_down = "&nbsp;&nbsp;<img src=\"images/icons/thumbs_down.png\" style=\"width:60%;\" alt=\"\" />";
			}
		elseif ($old_pw == $new_pw1)
			{
			$message = $pw_error_2[$lang_num]; 
			echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
			$thumbs_up_down = "&nbsp;&nbsp;<img src=\"images/icons/thumbs_down.png\" style=\"width:60%;\" alt=\"\" />";
			}
		elseif (strtolower($new_pw1) == "password" && strtolower($new_pw2) == "password")
			{
			$message = $msg = $pw_error_3[$lang_num]; 
			echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
			$thumbs_up_down = "&nbsp;&nbsp;<img src=\"images/icons/thumbs_down.png\" style=\"width:60%;\" alt=\"\" />";
			}
		else
			{
//			$LinkID=dbConnect($DB);
			$LinkID = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB);
//echo ('debug:function_member_ChangePW:76: old pw="'.$old_pw.'", new pw="'.$new_pw1.'"');
			$success = ChangePW($LinkID, $old_pw, $new_pw1);
			dbClose($LinkID);
			if ($success == 1) 
				{
				$message = $pw_OK[$lang_num]; 
				$thumbs_up_down = "&nbsp;&nbsp;<img src=\"images/icons/thumbs_up.png\" style=\"width:60%;\" alt=\"\" />";
//echo ('debug:function_members_ChangePW:75:$thumbs_up_down="'.$thumbs_up_down.'"');
				}
			elseif  ($success == 2)	
				{
				$message = $pw_not_OK[$lang_num];
				echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
				$thumbs_up_down = "&nbsp;&nbsp;<img src=\"images/icons/thumbs_down.png\" style=\"width:60%;\" alt=\"\" />";
				}
			else
				{
				$message = $pw_problems[$lang_num];
				echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
				$thumbs_up_down = "&nbsp;&nbsp;<img src=\"images/icons/thumbs_down.png\" style=\"width:60%;\" alt=\"\" />";
				}
			}
		}
	else	
		{
		if ($msg == "")
			{
//echo ('debug:function_members_ChangePW:91:$msg="'.$msg.'"');
			$msg = $pw_p1[$lang_num]; // if the message is generated by GIMS, then the variable $message would've been blank and would now be assigned the GIMS message
//echo ('debug:function_members_ChangePW:93:$msg="'.$msg.'"');
			} 
		elseif ($aims <> 3)
			{
//echo ('debug:function_members_ChangePW:97: about to invoke beep');
			// this indicates that the change password function was invoked by the GIMS login, as this prevents the user from logging in using password set to "password"
			$message = "<span class='blink'>".$msg."</span> ".$message;
			if ($thumbs_OK_to_go)	
				{
				echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
				$thumbs_up_down = "&nbsp;&nbsp;<img src=\"images/icons/thumbs_down.png\" style=\"width:60%;\" alt=\"\" />";
				}
			else	{$thumbs_up_down = "";}
			}
		else	{$thumbs_up_down = "";}
		}
?>
		<p><img src="images/1090x4_transparent.png" width="100%" alt="" /></p>
		<div class="change_login box">
			<form action="ChangePW.php?GIMS=<?=$aims?>" name="ChangePW" method="post">
			<table border="0" colspan="3" cellpadding="3" style="margin:auto;">
			<tr>
				<td align="center" colspan="3" class="proddesc"><b><u><?=$title[$lang_num]?></u></b><div align="center"><br /><?=$message?><br />&nbsp;</div></td>
			</tr>
			<tr>
				<td valign="bottom" align="right" id="Label" class="proddesc">Login ID:</td>
				<td valign="bottom" align="left"><font color="blue"><b><?=$_SESSION["UserID"]?></b></font></td>
				<td rowspan="4"><?=$thumbs_up_down?></td>
			</tr>
			<tr>
				<td valign="center" align="right" id="Label" class="proddesc"><?=$pw_old_pw[$lang_num]?></td>
				<td><input type="password" name="OldPW" size="16" maxlength="16" autofocus="autofocus"></td>
			</tr>
			<tr>
				<td valign="center" align="right" id="Label" class="proddesc"><?=$pw_new_pw[$lang_num]?></td>
				<td><input type="password" name="NewPW1" size="16" maxlength="16"></td>
			</tr>
			<tr>
				<td valign="center" align="right" id="Label" class="proddesc"><?=$pw_confirm[$lang_num]?></td>
				<td><input type="password" name="NewPW2" size="16" maxlength="16"></td>
			</tr>
			<tr>
				<td align="center" colspan="3"><br />&nbsp;<br /><input type="reset"  value="<?=$pw_reset[$lang_num]?>"><input type="submit" value="<?=$pw_change_pw[$lang_num]?>" name="OK"><br /><br /></td>
			</tr>
			</table></form>
		</div>
	</div><!-- main_content -->
	<!--- begin footer -->
<?php
$footer_var = $path_members."php-bin/footer.php"; include "$footer_var";
?>
	<!-- end footer -->
</div><!-- container -->
</body>
</html>
<?php
} // end function ChangePW
?>
