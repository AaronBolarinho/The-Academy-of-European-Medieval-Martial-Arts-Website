<?php
//
// Program: arms_armour_collections.php
// Author: David M. Cvet
// Created: Jan 08, 2019
// Description: a listing of student's submissions of photos of arms & armour collections during their travels for interest
//---------------------------
// Updates:
//	2019 ------------------
//	jan 25:	standardized path names
//

$lang = "en";
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$title[0] = $title[1] = "AEMMA: Arms & Armour Collections";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
$current_pgm = "glossary.php";
$menu_selected = "resources";
$config = $path_members."config/config.php"; include "$config";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main content -->
	<div id="main_content_AIMS" style="background-image:url('../images/armsarmour_background4.jpg');">
	<!-- begin page header -->
	<h3><img src="../images/icons/helm.png" alt="" style="vertical-align:middle;width:50px;" />&nbsp;Resources: Arms &amp; Armour Colections</h3>
<!-- end page header -->
<p>This page presents a selection of photographs of arms and armour collections contributed to AEMMA by AEMMA students who are enthusiastic on this subject, and took photographs of artifacts from around the world at museums, collections and exhibits.  The images are presented for informational purposes only, and are copyright by the individual who had originally created the contributed photographs.</p>
<h3>Contributions</h3>
<table border="0">
<tr>
	<td valign="top">10/2005</td>
	<td><b>David M. Cvet - </b><a href="arms_armour_collections/cvet_10-05/cvet.php"><b>Effigies from the National Museum</a>, Ljubljana, Slovenia</b>
	<br />Images of stone effigies from the collection at the <a href="http://www.narmuz-lj.si/english/01_informations/welcome.html" target="_blank" >National Museum of Slovenia</a> / <a href="http://www.narmuz-lj.si/slovensko/01_informacije/pozdrav.html" target="_blank" ><i>Narodni muzej Slovenije</i></a> in Ljubljana, depicts armour consistent with late 16th century Europe in which their design appears to have been influenced by German armourers, perhaps even manufactured in Nurenburg.</td>
</tr>
<tr>
	<td valign="top">10/2005</td>
	<td><b>Adam Trumpour - </b><a href="arms_armour_collections/trumpour/trumpour.php"><b>Arms & Armour, Kaiserburg-Museum</a> (Imperial Castle Museum), Nuremberg, Germany</b>
	<br />The artifacts photographed are part of the arms & armour collection at the <a href="http://www.nuernberg.de/internet/portal_e/kultur/ctz_2302.html"  target="_blank">Kaiserburg-Museum</a>, Nuremberg, Germany.  This museum, opened in 1999 and is a branch of the Germanisches Nationalmuseum housing a permanent historical display.</td>
</tr>
<tr>
	<td valign="top">07/1993</td>
	<td><b>Peter T. Yu (Chronos) - </b><a href="arms_armour_collections/chronos/chronos.php"><b>Arms & Armour, Tower</a>, London</b>
	<br />A remarkable collection of photographs of the arms and armour residing in the Tower of London before the collection was moved to the Royal Armories in Leeds in 1996.  The photographs were taken by Peter T. Yu, AEMMA's videographer and chronicler.</td>
</tr>
</table>
</div><!-- main_content_AIMS  -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
