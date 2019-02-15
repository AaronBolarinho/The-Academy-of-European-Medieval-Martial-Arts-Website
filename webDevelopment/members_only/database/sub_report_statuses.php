<?php
// Program: sub_report_statuses.php
// Author: David M. Cvet
// Created: February 25, 2012
// Description: This standardizes the colour hightlights and symbols for each record across all reports.
//
//---------------------------
// Updates:
//	2012 ----------
//
if ($memberStatus == 1) { $colour = "green"; $s1=1; }		// new
elseif ($memberStatus == 3) { $colour = "#736F6E"; $s3=1; }	// inactive
elseif ($memberStatus == 4) { $colour = "orange"; $s4=1; }	// resigned
elseif ($memberStatus == 5) { $colour = "brown"; $s5=1; }	// lost
elseif ($memberStatus == 6) { $colour = "blue"; $s6=1; }	// suspended
else { $colour = "#333333"; $s2=1; }				// active4
?>
