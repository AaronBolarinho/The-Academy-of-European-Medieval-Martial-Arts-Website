<?php
// Program: sub_members_list_statuses.php
// Author: David M. Cvet
// Created: Nov 07, 2016
// Description: This standardizes the colour hightlights and symbols for each record across all reports.
//		It is "include" in the PHP
// Updates:
//	2016 ----------
//

// initialize all variables
$cross = "";

if ($status_ID == 2) { $colour = $colour_AC; $record_status = "status = active";} 						// active
elseif ($status_ID == 7) { $colour = $colour_DE; $cross = "<sup>&dagger;</sup>"; $record_status = "status = deceased"; } 	// deceased
elseif ($status_ID == 1) { $colour = $colour_NW; $record_status = "status = new"; } 						// new
elseif ($status_ID == 3) { $colour = $colour_IN; $record_status = "status = inactive"; } 					// inactive
elseif ($status_ID == 4) { $colour = $colour_RE; $record_status = "status = resigned"; } 					// resigned
elseif ($status_ID == 5) { $colour = $colour_UT; $record_status = "status = unable to trace/lost"; }				// unable to trace/lost
elseif ($status_ID == 6) { $colour = $colour_SP; $record_status = "status = suspended"; } 					// staff
else { $status_ID = ""; $colour = $colour_UN; $record_status = "status = undefined or not assigned"; }				// undefined or not assigned
?>
