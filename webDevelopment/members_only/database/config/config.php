<?php
// Program: config.php
//	Description: a single location for a variety of variables for the AIMS only
//	2016 ------------------
//	oct 16:	initialize the colours associated with ranks and the listing of ranks in this config ONLY!!!! No need to look for definitions of status colours elsewhere!
//

$banner[0] = "banner_oslj_gims_en.png";
$banner[1] = "banner_oslj_gims_en.png";

// initialize the colour variables (only edit the colours here for the entire report and its subroutines)
// these colour codes are input to the subroutine found in sub_members_list_statuses.php
$colour_AC = "blue";	// active
$colour_DE = "purple";	// deceased
$colour_SP = "brown";	// suspended
$colour_IN = "gray"; 	// inactive
$colour_RE = "red"; 	// resigned
$colour_UT = "gray";	// unable to trace/lost
$colour_NW = "green";	// new
$colour_UN = "black";	// undefined or not assigned

$array_status[1] = "New";
$array_status[2] = "Active";
$array_status[3] = "Inactive";
$array_status[4] = "Resigned";
$array_status[5] = "Lost";
$array_status[6] = "Suspended";
$array_status[7] = "Deceased";

$array_rank[1] = "Recruit";
$array_rank[2] = "Scholar";
$array_rank[3] = "Free Scholar";
$array_rank[4] = "Provost";
$array_rank[9] = "NA";
$array_rank[20] = "Visiting Scholar";
$array_rank[77] = "Honourary";


?>
