<?php
// 	Program: 	retrieve_cookies.php
//	Description: 	retrieve language variables from cookies set - created Nov 2015.
//	Author:		David M. Cvet
//
//	2015 ------------------
//

if (!isset($_COOKIE["cookie_lang"])) 
	{
	// cookies were not set
    	$lang = "en";
	$lang_num = 0;
	}
else 
	{
   	$lang = $_COOKIE["cookie_lang"];
	$lang_num = $_COOKIE["cookie_num"];
	}

if (isset($_COOKIE["cookie_pgm"])) 
	{
	// current program cookie set
    	$pgm = $_COOKIE["cookie_pgm"];
	}
else
	{ $pgm = "index.php"; }

if (isset($_COOKIE["cookie_msg"])) 
	{
	// start login message cookie set
    	$message = $_COOKIE["cookie_msg"];
	}
else
	{ $message = ""; }

if (isset($_COOKIE["AIMS"])) 
	{
	// cookie is set
	$aims = $_COOKIE["AIMS"];
	}
else
	{ $aims = 0; }

?>
