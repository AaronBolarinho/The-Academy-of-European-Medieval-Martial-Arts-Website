<?php
// Program: sub_check_session_expiration.php
// Author: David M. Cvet
// Created: Nov 04, 2016
// Description:
//	This will check for a standard SESSION variable, specifically DBLogin to test if the session has or has not expired.
//	If the session has expired while logged into the members only area, the system will take the user back to the login screen
//	along with the appripriate message
//
//	2016 ------------------
//

if (!isset($_SESSION['DBLogin']))
	{
	// the session has timed out, go back to AIMS login
	$msg = "<font color='red'>Your session has expired requiring you to login again to the Members Only Area</font>";
	echo ('<script type="text/JavaScript">');
	echo ('parent.location.href="../'.$members_only_path.'content/members_only_login.php?MSG='.$msg.'"');
	echo ('</script>');
	exit;
	}
?>
