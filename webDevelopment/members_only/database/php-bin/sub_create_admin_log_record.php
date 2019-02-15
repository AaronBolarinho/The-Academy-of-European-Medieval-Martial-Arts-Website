<?php
// Function: sub_create_admin_log_record.php
// Author: David M. Cvet
// Created: Nov 12, 2016
// Description: This is to standardize the recording of an admin log record to table tbl_Admin_log
//---------------------------
// Updates:
//	2018 ----------
//	apr 26:	adjusted the table tbl_Admin_log so that the Index_ID field is auto-increment which eliminates the error message regarding no default value


	// We create a blank record in tbl_Admin_log in order to generate the next index_num, then pass through to update that new record with admin log details.
	$SQL_log    = 'INSERT INTO tbl_Admin_log VALUES ()';
	$Result_log = mysqli_query($LinkID, $SQL_log);
	if (mysqli_errno($LinkID) == 0) 
		{
		$index_num = mysqli_insert_id($LinkID);
		$SQL_log  = 'UPDATE tbl_Admin_log SET ';
		$SQL_log .= 'Username	= "'.$_SESSION['UserID'].'", ';
		$SQL_log .= 'Roles_ID	=  '.$_SESSION['RoleID'].', ';
		$SQL_log .= 'IPaddyUser	= "'.$_SESSION['IPaddress'].'", ';
		$SQL_log .= 'Member_ID	=  '.$_SESSION['MemberID'].', ';
		$SQL_log .= 'Action		=  "'.$pp_fields_changed.'" ';
		$SQL_log .= 'WHERE Index_ID = '.$index_num;
		$Result_log = mysqli_query($LinkID, $SQL_log);
		if (mysqli_errno($LinkID) == 0) 
			{
			// don't need to do anything, the admin log record was successfully entered
			}
		else
			{
			$modal_operation .= " <font color='red'>Failed to update the initialized blank log record in <b>tbl_Admin_log</b> for recent operation on member ID: ".$member_ID;
			$modal_operation .= " in <b>sub_create_admin_log_record.php:24f</b> operating under userID: <b>".$_SESSION['UserID'].". </b>. Please copy the entire message and email to the webmaster.";
			$modal_operation .= " <font color='red'>The SQL where the failure occurred: </font>'".$SQL_log."'";
			$modal_msg_footer .= $comma." Operation 24f FAILED!";
			$modal_footer_bgcolor = $modal_colour_orange;
			$modal_footer_bgcolor = $modal_colour_orange;
			}
		}
	else
		{
		// the insertion of a blank admin log record failed - most likely because there is a problem with the insertion SQL or the table tbl_Admin_log
		$modal_operation .= " <font color='red'>Failed to insert a blank log record in <b>tbl_Admin_log</b> for recent operation on member ID: ".$member_ID;
		$modal_operation .= " in <b>sub_create_admin_log_record.php:13f</b> operating under userID: <b>".$_SESSION['UserID'].". </b>. Please copy the entire message and email to the webmaster.";
		$modal_operation .= " <font color='red'>The SQL where the failure occurred: </font>'".$SQL_log."'";
		$modal_msg_footer .= $comma." Operation 13f FAILED!";
		$modal_footer_bgcolor = $modal_colour_orange;
		$modal_footer_bgcolor = $modal_colour_orange;
		}
?>

