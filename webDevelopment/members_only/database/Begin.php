<?php 
//
// Program: Begin.php
// Author: David M. Cvet
// Created: Mar 27, 2016
// Description:
//	This script is the initial login window invoked by admin_login_GIMS.php with no parameters (initial program startup),
//	and creates a login table to capture userID and password. Once the user name and password are captured,
//	this script then calls Login.php upon clicking on "OK".
//	
//	The program flow: admin_login_GIMS.php ==> database/Begin.php ==> Login.php (<==DB.php) ==> GIMS_home_page.php
//---------------------------
// Updates:
//	2016 ----------
//	apr 9:	created variables for path names so that when this script is called from a URL or from admin_login_GIMS.php, it'll find the scripts and files!
//	sep 2:	added code to handle password entered as "password", requesting that the browser change their password under the members only area to something more secure
//	2019 ------------------
//	jan 25:	standardized path names
//
//session_start();
//include "../database/misc/header_database.php";
if (isset($_GET['MSG'])) { $message = $_GET['MSG']; } else { $message = ""; }
// begin determine IP address of user
    if (getenv('HTTP_X_FORWARDED_FOR')) {
        $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
        $ipaddress = getenv('REMOTE_ADDR');
//echo "Your Proxy IP address is : ".$pipaddress. "(via $ipaddress)" ;
    } else {
        $ipaddress = getenv('REMOTE_ADDR');
//        echo "Your IP address is : $ipaddress";
    }
// end determine IP address of user
?>
<h3><?=$h3[$lang_num]?></h3>
<div class="database_image">
	<div style="float:left;width:100%;"><img src="<?=$path_dbase?>images/icons/database_closed.png" alt="" width="100%" /></div>
	<div style="float:left;width:100%;margin-top:8px;text-align:center;"><span class="caption"><b><?=$open_closed[$lang_num]?></b></span></div>
</div>
<p><?=$intro_p[$lang_num]?></p>
<?php
if ($message) 
	{
	echo ('<div style="margin-left:33%;"><font style="color:red;font-size:18px;" class="blink">*** '.$message.' ***</font><br /><br /></div>');
	echo ('<script type="text/javascript">new Beep(22050).play(1200, .15, [Beep.utils.amplify(19000)]); new Beep(22050).play(800, .25, [Beep.utils.amplify(19000)]);</script>');
	}
?>
<div class="login_panel_wireframe">
	<div class="login_panel box"><!-- login username/password object -->
		<form action="<?=$path_dbase?>Login.php?LANG=<?=$lang?>&AIMS=1" name="Login_form" id="Login_form" method="post">
		<fieldset class="login_fieldset">
		<legend style="color:#0000FF;">AIMS Login</legend>
		<input type="hidden" name="MEMLOGIN" id="MEMLOGIN" value="1">
		<input type="hidden" name="IPaddress" id="IPaddress" value="<?=$ipaddress?>">
		<table style="width:100%;">
		<tr>
			<td colspan="2" style="text-align:center;"><input type="text" placeholder="<?=$enter_code[$lang_num]?>" id="captcha" name="captcha" class="inputcaptcha" required="required" oninput="enable_submit_step1()"><img src="<?=$path_dbase?>php-bin/dbase_captcha_form.php" id="image_captcha" class="imgcaptcha" alt="captcha"  /><img src="<?=$path_dbase?>images/icons/refresh.png" alt="reload" style="float:left;cursor:pointer;" class="refresh fade" title="click to refresh (re-generate) the security code" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="button" value="STEP 1: Submit Security Code" name="submit_step1" id="submit_step1" disabled="true"></td>
		</tr>
		<tr>
			<td colspan="2"><hr /></td>
		</tr>
			<tr>
			<td align="right"><label for="ID" >Username:&nbsp;</label></td>
			<td><input type="text" name="ID" id="ID"  maxlength="16" style="width:70%;" disabled="true" oninput="document.getElementById('PW').disabled=false;" /></td>
		</tr>
		<tr>
			<td align="right"><label for="PW" >Password:&nbsp;</label></td>
			<td><input type="password" name="PW" id="PW" maxlength="16" style="width:70%;"  disabled="true" oninput="enable_submit_step2()" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="button" class="button" value="STEP 2: Enter" name="submit_step2" id="submit_step2" disabled="true" onclick="submit_username_pwd()"> <input type="reset" class="button"  value="Reset Form"></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		</table>
		</fieldset>
		</form>
	</div><!-- login_panel box -->
	<div style="float:left;width:20%;margin-left:43%;margin-top:5px;margin-bottom:30px;"><img src="<?=$path_dbase?>images/AEMMA_logo_white_200_transparent.png" width="70%" alt="" title="The logo of AEMMA" /></div>
</div><!-- login_panel_wireframe -->
