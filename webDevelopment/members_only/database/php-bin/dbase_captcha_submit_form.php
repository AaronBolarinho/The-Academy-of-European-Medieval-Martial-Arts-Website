<?php
//ini_set('display_errors', 'On');
$vercode = $_COOKIE["cookie_ranStr"];

//if(($_REQUEST['captcha'] == $_SESSION['vercode'])){
if(($_REQUEST['captcha'] == $vercode)){
	$name = $_REQUEST['name'];
	echo 1;
}else{
	echo 0;
}

?>
