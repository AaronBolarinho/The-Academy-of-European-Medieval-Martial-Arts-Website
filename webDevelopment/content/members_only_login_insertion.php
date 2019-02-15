<?php
ini_set('display_errors', 'On');

// 	Program: 	members_only_login_insertion.php
// 	Description:
//	This script is the initial login window invoked with no parameters (initial program startup via menu),
//	and creates a login table to capture userID and password. Once the user name and password are captured,
//	this script then calls Login.php upon clicking on "OK".  This script is code shared with the commanderies'
//	login page
//	
//	The program flow: members_only_login.php (<==content/members_only_login_insertion.php) ==> database/Login.php (<==database/DB.php) ==> content/Main.php
//	Author:		David M. Cvet
//
//	2015 ------------------
//	oct 14: inserted member annual contribution link
//

if (isset($_GET['MSG'])) { $message = $_GET['MSG']; } else { $message = ""; }

// begin determine IP address of user
    if (getenv('HTTP_X_FORWARDED_FOR')) {
        $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
        $ipaddress = getenv('REMOTE_ADDR');
	//echo "Your Proxy IP address is : ".$pipaddress. "(via $ipaddress)";
    } else {
        $ipaddress = getenv('REMOTE_ADDR');
//        echo "Your IP address is : $ipaddress"; exit;
    }
// end determine IP address of user
?>
	<!-- begin page content -->
	<div id="main_content" style="background-color:#ffffcc;">
		<h2><?=$title[$lang_num]?></h2>
		<div class="login_image"><img src="../images/login_not_approved.png" alt="" width="100%" style="padding-right:10px; margin-bottom:15px;" /></div>
		<p style="text-indent:0px;"><?=$login_p1[$lang_num]?></p>
<!--		<p style="text-indent:0px;"><?=$login_p1_temp[$lang_num]?></p>-->
		<p style="text-indent:0px;"><?=$login_p2[$lang_num]?><br /><script type="text/JavaScript">
				var link = "<?=$email_access?><img src=\"../images/atsign_12.gif\" style=\"vertical-align:middle\" border=\"0\" alt=\"\" /><?=$email_access_1st_qual?><img src=\"../images/dot.gif\" border=\"0\" alt=\"\" /><?=$email_access_2nd_qual?>";
				var tag1 = "mail";
				var tag2 = "to:";
				var tag3 = "";
				var email1 = "%20<?=$email_access?>";
				var email2 = "<?=$email_access_1st_qual?>";
				var email3 = ".<?=$email_access_2nd_qual?>";
				var subject = "<?=$login_email_subject[$lang_num]?>";
				var body = "";
				document.write("<a " + tag3 + " h" + "ref=" + tag1 + tag2 + email1 + "@" + email2 + email3 + "?subject=" + escape(subject) + "&body=" + escape(body) + ">" + link + "</a>")
				</script></p>
<?php
if ($message) 
	{
	echo ('<div style="margin-left:30%;"><font style="color:red;font-size:18px;" class="blink">*** '.$message.' ***</font><br /><br /></div>');
	echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
	}
?>
		<div class="login_panel_wireframe">
		<div class="login_panel box"><!-- login username/password object -->
			<form action="<?=$path_dbase?>Login.php?LANG=<?=$lang?>" name="Login" method="post">
			<!--<fieldset style="background-color:#ffffbb;text-align:left;" class="box">-->
			<!--<legend style="color:#0000FF;"><?=$title[$lang_num]?></legend>-->
			<input type="hidden" name="MEMLOGIN" id="MEMLOGIN" value="1">
			<input type="hidden" name="IPaddress" value="<?=$ipaddress?>">
			<table style="width:100%;margin-left:15px;">
			<tr>
				<td align="right"><label for="ID" >Username:&nbsp;</label></td>
				<td><input type="text" name="ID" id="ID"  maxlength="16" style="width:70%;" /></td>
			</tr>
			<tr>
				<td align="right"><label for="PW" >Password:&nbsp;</label></td>
				<td><input type="password" name="PW" id="PW" maxlength="16" style="width:70%;" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" class="button" value="  <?=$login_enter[$lang_num]?>  " name="OK"> <input type="reset"  class="button" value="<?=$login_reset[$lang_num]?>"> <button class="button"><?=$forgot_password[$lang_num]?></button></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			</table>
			<!--</fieldset>-->
			</form>
		</div><!-- end login_panel --></div>
		<div class="login_badge_wireframe"><div style="float:left;width:15%;margin-left:43%;margin-top:15px;margin-bottom:50px;"><img src="../images/AEMMA_logo_white_200_transparent.png" width="100%" alt="" title="Logo of the Academy of European Medieval Martial Arts" /></div></div>
	</div>
	<!-- end page content -->

