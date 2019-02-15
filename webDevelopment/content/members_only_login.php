<?php
ini_set('display_errors', 'On');

// 	Program: 	members_only_login.php
// 	Description:
//	This script is the initial login window invoked with no parameters (initial program startup via menu),
//	and creates a login table to capture userID and password. Once the user name and password are captured,
//	this script then calls Login.php upon clicking on "OK".
//	
//	The program flow: members_only_login.php (<==content/members_only_login_insertion.php) ==> database/Login.php (<==database/DB.php) ==> content/Main.php
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$path = "../";
$path_dbase = "../members_only/database/";					// to ensure that the paths are correct for access to main website database scripts
$current_pgm = "members_only_login.php";
$menu_selected = "members";
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
session_start();
$retrieve_cookies = $path."php-bin/retrieve_cookies.php"; include "$retrieve_cookies";
$config = $path."config/config.php"; include "$config";
$content_members_login_ = $path."config/content_members_login_$lang.php"; include "$content_members_login_";
$header = $path."php-bin/header.php"; include "$header";
echo ('<script type="text/javascript" src="'.$path.'js-bin/beep.js"></script>');
$header2 = $path."php-bin/header2.php"; include "$header2";		// continue to use the header2 file from the main website
$members_only_login_insertion = "members_only_login_insertion.php"; include "$members_only_login_insertion";?>
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
