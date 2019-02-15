<?php
ini_set('display_errors', 'On');
//
// Program: sub_string_backslash.php
// Author: David M. Cvet
// Created: Mar 10, 2017
// Description:
//	This function will check for the instance of backslashes in the string sent and if so, will strip the backslashes.
//	Then, this function will check for the instance(s) of single-quotes and/or double-quotes, and if so, insert backslashes
//---------------------------
// Updates:
//	2017 ----------
//

function StringBackSlash($string_from_source)
	{
	$returned_string = $string_from_source;
	// strip any back-slashes from the string to prevent multiple instances of backslashes against the same quote or double-quote
	$new_string = stripslashes($string_from_source);

	// check if the description text has any single quotes or double quotes in the string and if so, the escape them with a "\" using  addslashes($variable)
	$num_new_string_quotes = substr_count($new_string, '"') + substr_count($new_string, "'");
	if ($num_new_string_quotes) {$returned_string = addslashes($new_string); }
	else {$returned_string = $new_string;}

	return $returned_string;
	}
?>
