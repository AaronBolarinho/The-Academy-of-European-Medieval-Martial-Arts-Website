<?php
// 	Program: 	admin_login_AIMS.php (AEMMA Info Management System)
//	Author:		David M. Cvet
//	Created: 	November 2016
// 	Description:
//	Upon invokation of the script, i.e. www.aemma.org/database (AEMMA Info Management System),
//	given there were not parameters passed, it assumes that it is an initial login, and starts by invoking Begin.php
//	This script is the main driver for the content manipulation and presentation of
// 	the WKCIS system and related applications. It uses an iFrame to invoke the various database functions.
//	
//	The program flow: admin_login_AIMS.php ==> database/Begin.php ==> Login.php (<==DB.php) ==> AIMS_home_page.php
//		- Begin.php presents the login screen requesting Username and Password and calls Login.php from the login <form>
//		- Login.php - upon validated login, it calls index.php with the PGM variable "Home_logged_in.php"
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories calling script
$current_pgm = "res_gallery.php";
$menu_selected = "admin";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$login_AIMS = $path_members."config/content_admin_login_AIMS_$lang.php"; include "$login_AIMS";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
echo ('<script type="text/javascript" src="'.$path_members.'../js-bin/beep.js"></script>');
?>
<!--   <link href="<?=$path_dbase?>css/dbase_captcha_form.css" rel="stylesheet" type="text/css" />-->
   <style>
	.inputcaptcha {margin-left:15%;width:33% !important;float:left;	}
	.imgcaptcha{border:0;float:left;}
   </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script language="javascript">
$(document).ready(function(){
$(".refresh").click(function () {
	$(".imgcaptcha").attr("src","<?=$path_dbase?>php-bin/dbase_captcha_form.php?_="+((new Date()).getTime()));
	});
$('#Login_form').submit(function() {
	if($('#password').val() != $('#cpassword').val()){
 		alert("Please re-enter confirm password");
 		$('#cpassword').val('');
 		$('#cpassword').focus();
 		return false;
 		}
	$.post("<?=$path_dbase?>php-bin/dbase_captcha_submit_form.php?"+$("#Login_form").serialize(), { }, function(response){
        	if(response==1){
           		$(".imgcaptcha").attr("src","<?=$path_dbase?>php-bin/dbase_captcha_form.php?_="+((new Date()).getTime()));
			clear_form();
			document.Login_form.image_captcha.style.display="none";
			document.Login_form.submit_step1.disabled=true;
//			document.Form_Security.SecurityAnswer.disabled=false;
			document.Login_form.captcha.placeholder="You are human!";
			document.Login_form.captcha.disabled=true;
			document.Login_form.ID.disabled=false;
//			document.Login_form.PW.disabled=false;
			document.Login_form.ID.focus();
        	}else{
           		alert("<?=$alert_2[$lang_num]?>");
			document.Login_form.submit_step1.disabled=true;}
			clear_form();
		});
	return false;
    	});

function clear_form() {
        $("#name").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#username").val('');
        $("#password").val('');
        $("#cpassword").val('');
	$("#captcha").val('');
     	}
});

function enable_submit_step1() {
    document.Login_form.submit_step1.disabled=false;
}
function disable_submit_step1() {
    document.Login_form.submit_step1.disabled=true;
}

function enable_submit_step2() {
    document.Login_form.submit_step2.disabled=false;
}
function disable_submit_step2() {
    document.Login_form.submit_step2.disabled=true;
}

function submit_username_pwd() {
//alert("inside submit_username_pwd");
var usernme = document.Login_form.ID.value;
var pwd = document.Login_form.PW.value;
var ipaddress = document.Login_form.IPaddress.value;
//var pname = "<?=$_SESSION['PName']?>";
//alert("inside submit_username_pwd:ID=" + usernme + ", PW=" + pwd + ", FN=" + pname + ", IP=" + ipaddress);
//location.href="<?=$path_dbase?>Login.php?LANG=<?=$lang?>&GIMS=1&ID=" +  usernme + "&PW=" + pwd + "&PN=" + pname + "&IP=" + ipaddress;
location.href="<?=$path_dbase?>Login.php?LANG=<?=$lang?>&AIMS=1&ID=" +  usernme + "&PW=" + pwd + "&IP=" + ipaddress;

}

</script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>

<!-- begin page content presentation -->
	<!-- begin main content -->
	<div id="main_content_AIMS">
<?php
		// include the file containing the main menu bar for GIMS level of presentation
		$begin = $path_dbase."Begin.php";  include "$begin"; 
?>
	</div>
	<!-- end main content -->
	<!-- begin footer -->
<?php
	$footer_var = $path_members."php-bin/footer.php"; include "$footer_var";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
