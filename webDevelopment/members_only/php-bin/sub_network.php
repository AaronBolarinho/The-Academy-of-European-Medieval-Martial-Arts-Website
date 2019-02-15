<?php
// Program: sub_network.php
// Author: David M. Cvet
// Created: Sep 26, 2013
// Description:
//	This will test the availability of the internet called by index.php. Should the network be down, then move the system to stand-alone and post
//	any transactions locally in cache/file for later transmission.  This will also trigger a change to the network status
//	icon situated on the menu strip on the right side
//	Note: to test the impact of the internet being up or down, remove the "!" which will emulate internet down - don't forget to return the "!" after testing!!!!
//---------------------------
// Updates:
//	2013 ----------
//

// parameters: hostname, port, errorno, error message (string), timeout in seconds
if (!$sock = @fsockopen('www.google.com', 80, $num, $error, 5))
	{ $network_up = 0; }
else
	{ $network_up = 1; }
?>

