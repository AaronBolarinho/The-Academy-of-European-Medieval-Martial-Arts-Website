<?php
// Program: navTree_database.php
// Author: David M. Cvet
// Created: March 18, 2008
// Description:
//	This PHP creates the navigation frame on the left side of this application. It is the script that links all program calls
//	with respect to the passing of necessary PHP parameters
//---------------------------
// Updates:
//	2012 ----------
//	mar 26:	added new navigation item to handle attendance tracking 
//	
echo ('
<table><tr><td>
<p><div align="center"><img src="../images/Aemma_logo_black_100.gif"></div>
<div id="NavBar"><ul id="NavList">
	<li><a href="index.php?PGM=Main&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">Reports</a></li>
	<li><a href="index.php?PGM=Main&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;Database Home Page</a></li>
<!-- Class Attendance Tracking -->
	<li><a href="index.php?PGM=Main&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;Attendance Tracking</a></li>
		<li><a href="index.php?PGM=attendance_class&SCH='.$school.'&CHAP=1&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Toronto Classes</a></li>
		<li><a href="index.php?PGM=attendance_class&SCH='.$school.'&CHAP=2&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guelph Classes</a></li>
		<li><a href="index.php?PGM=attendance_class&SCH='.$school.'&CHAP=3&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Digby Classes</a></li>
		<li><a href="index.php?PGM=attendance_class&SCH='.$school.'&CHAP=5&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stratford Classes</a></li>
<!-- Active Mem. Reports -->
	<li><a href="index.php?PGM=Main&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;Active Mem. Reports</a></li>
		<li><a href="index.php?PGM=Report_ranks&RNK=1&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recruits (All)</a></li>
		<li><a href="index.php?PGM=Report_ranks&RNK=2&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Schollers (All)</a></li>
		<li><a href="index.php?PGM=Report_ranks&RNK=3&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Free Schollers (All)</a></li>
		<li><a href="index.php?PGM=Report_ranks&RNK=4&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Provosts (All)</a></li>
		<li><a href="index.php?PGM=Main&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chapters</a></li>
			<li><a href="index.php?PGM=Report_chapter&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'&Chapter=1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Toronto</a></li>
			<li><a href="index.php?PGM=Report_chapter&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'&Chapter=2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guelph</a></li>
			<li><a href="index.php?PGM=Report_chapter&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'&Chapter=3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Digby</a></li>
			<li><a href="index.php?PGM=Report_chapter&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'&Chapter=5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stratford</a></li>
<!-- Misc. Reports -->
	<li><a href="index.php?PGM=Main&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;Misc. Reports</a></li>
		<li><a href="index.php?PGM=Report_archery&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Archers</a></li>
		<li><a href="index.php?PGM=Report_armour&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Armoured Harness</a></li>
		<li><a href="index.php?PGM=Report_inactive&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Inactive Members</a></li>
		<li><a href="index.php?PGM=Report_injury&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Injuries Report</a></li>
		<li><a href="index.php?PGM=Report_rapier&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Italian Rapier</a></li>
		<li><a href="index.php?PGM=Report_period&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Period Garments</a></li>
		<li><a href="index.php?PGM=Report_ROMarchery&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ROM Archery Class</a></li>
		<li><a href="index.php?PGM=Report_ROMsword&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ROM Sword Class</a></li>
<!-- Admin Functions -->
	<li><a href="index.php?PGM=MemberList&List=1&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">Admin Functions</a></li>
		<li><a href="index.php?PGM=MemberList&List=2&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;Member Admin</a></li>
			<li><a href="index.php?PGM=Members&State=Create&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create New Member</a></li>
			<li><a href="index.php?PGM=MemberList&List=1&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Act/New Members</a></li>
			<li><a href="index.php?PGM=MemberList&List=2&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit All Records</a></li>
		<li><a href="index.php?PGM=Custom&State=Custom&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;Custom Online Listings</a></li>
		<li><a href="index.php?PGM=Export&State=Export&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;Export Database</a></li>
		<li><a href="index.php?PGM=rep_misc_accessLogs&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;Access Logs</a></li>
		<li><a href="index.php?PGM=ChangePW&SCH='.$school.'&LGID='.$login_ID.'&RID='.$uRec_ID.'&SECL='.$seclvl.'">&nbsp;&nbsp;&nbsp;Change Password</a><br></li>
	<li><a href="Logout.php">Logout</a></li>
	<li><a target="_top" href="http://www.aemma.org/index2.php?pg=admin">AEMMA Administration</a></li>
</ul></div>
</td></tr></table>')
?>
