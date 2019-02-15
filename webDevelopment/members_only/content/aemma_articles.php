<?php
//
// Program: aemma_articles.php
// Author: David M. Cvet
// Created: Jan 08, 2019
// Description: a listing of articles written by members of AEMMA
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
$title[0] = $title[1] = "AEMMA: Articles by AEMMA";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
$current_pgm = "aemma_articles.php";
$menu_selected = "resources";
$config = $path_members."config/config.php"; include "$config";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main content -->
	<div id="main_content_AIMS" style="background-image:url('../images/armsarmour_background4.jpg');">
	<!-- begin page header -->
	<h3><img src="../images/icons/news-icon.png" alt="" style="vertical-align:middle;width:50px;" /> <img src="../images/AEMMA_logo_white_200_transparent.png" alt="" style="vertical-align:middle;width:40px;" />&nbsp;Resources: Articles: Articles by AEMMA</h3>
<!-- end page header -->
<p>This page presents a collection of articles, papers or publications on subjects relevant to the mission and goals of AEMMA, written by AEMMA students or members published on AEMMA's website, online journals, e-zines, or hard-copy publications, magazines or journals.
<h3>Contributions</h3>
<table border="0">
<tr>
	<td valign="top">12/2009</td>
	<td><b>Matthew Brundle. </b>"<a href="articles/2009/brundle_dec2009.php"><b>Why Become a Scholar?</b></b></a>". Academy of European Medieval Martial Arts. December 2009.
	<br />Some find that there are several advantages to becoming a scholar. The first and most immediate is a sense of accomplishment. It is no small task to be successful in your challenge. As with anything difficult, success breeds enhanced self-esteem and self-concept proportionate to the task.</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">06/2009</td>
	<td><b>David M. Cvet. "<a href="articles/2009/dcvet_journal_slovenianMilitaryHistory.pdf" target="_blank"><i>Raziskava o Fioreju dei liberi in njegovih
razpravah, ki opisujejo L`arte dell`armizare, 1409 / An Examination of Fiore dei Liberi and his treatises describing L`arte dell`armizare, c. 1409</i></b></b></a>". <a href="http://www.slovenskavojska.si/publikacije/vojaska-zgodovina/" target="_blank">Voja&#353;ka Zgodovina / Military History</a>. Ljubljana, Slovenia. June 2009.
	<br />Fiore dei Liberi's legacy created 600 years ago is honoured in the 21st century with the careful reconstruction and resurrection of the fighting art he described in his treatises entitled "Flos Duellatorum" and "Fior Battaglia"....</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">01/2009</td>
	<td><b>Matthew Brundle. </b>"<a href="articles/2009/brundle_jan2009.php"><b>So You Want To Fight in Armour.....</b></b></a>". Academy of European Medieval Martial Arts. January 2009.
	<br />As students of  Western Historical Martial Arts it is, for many, a desirable extension, or sometimes the ultimate goal, to train and fight in an accurate, period appropriate medieval harness (suit of armour).</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">09/2008</td>
	<td><b>David M. Cvet. </b>"<a href="articles/2008/jwma_cvet/cvet_sep2008.php"><b>A Brief Examination of Fiore dei Liberi's Treatises <i>Flos Duellatorum</i> & <i>Fior di Battaglia</i></b></b></a>". <a href="http://jwma.ejmas.com" target="_blank">Journal of Western Martial Art</a>. September 2008.
	<br />An examination of Fiore's life based on currently available material and a brief comparative analysis of the Pisani-Dossi, Morgan's and Getty's versions of Fiore's treatises.</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">07/2008</td>
	<td><b>Russ Howe. </b>"<a href="articles/2008/jwma_howe/howe_jul2008.php"><b>Fiore dei Liberi : Origins and Motivations</b></a>". <a href="http://jwma.ejmas.com" target="_blank">Journal of Western Martial Art</a>. July 2008.
	<br />A comprehensive exploration of the life of Friulian swordsmaster, Fiore dei Liberi, who was born mid-14th century, died early 15th century, and the politics of the period and area in which Fiore grew up, learned the art while traveling throughout Europe.</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">03/2007</td>
	<td><b>Toma&#382; Lazar. "</b><a href="articles/ploscni_oklep-TomazLazar_mar2007.pdf" target="_blank"><b><i>Plo&#353;&#269;ni oklep</i></a> ('plate armour')</b>". <i>&#381;ivljenje in Tehnika</i></a>. Ljubljana, Slovenia. March 2007.
	<br />An article published in a Slovenian periodical <a href="http://www.tzs.si" class="linksred" target="_blank"><i>&#381;ivljenje in Tehnika</i></a> ("Life and Technology") describing the "technology" behind the construction of plate armour, some artifacts in the article is sourced from the collection at the <a href="http://www.narmuz-lj.si/english/01_informations/welcome.html" target="_blank" class="linksred">National Museum of Slovenia</a> / <a href="http://www.narmuz-lj.si/slovensko/01_informacije/pozdrav.html" target="_blank" class="linksred"><i>Narodni muzej Slovenije</i></a> in Ljubljana. (pdf fomat - 1.0 MB)</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">09/2006</td>
	<td><b>Dr. Charles H. Hackney. </b>"<a href="articles/2006/jwma_hackney/hackney_sep2006.php"><b>Reflections on <i>audatia</i> as a Martial Virtue</b></a>". <a href="http://jwma.ejmas.com" target="_blank">Journal of Western Martial Art</a>. September 2006.
	<br />Charles examines, from a variety of perspectives, Liberi's use of the term <i>audatia</i> by drawing primarily from the philosophical and psychological literature, as virtue theories are currently gaining ground in these fields. He discusses how it may be cultivated, and how it may be applied in the life of a martial artist.</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">01/2005</td>
	<td><b>David M. Cvet. </b>"<a href="articles/2005/jwma_cvet/cvet_jan2005.php"><b>The Measure of a Master Swordsman</b></a>". <a href="http://jwma.ejmas.com" target="_blank">Journal of Western Martial Art</a>. January 2005.
	<br />A detailed examination of one of the earliest known swordsmasters of the late 14th and early 15th century, of a page known as "<i>sette spada</i>" from the treatise written by Fiore dei Liberi in 1410 illustrating the combative attributes required of a skilled fighter stemming from an allegorical interpretation and symbolism of beasts.</td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">06/2003</td>
	<td><b>Michael Rasmusson. </b>"<a href="articles/2003/jwma_rasmusson/rasmusson_jun2003.php"><b>Blossfechten and the Fechtschulen - German Judicial and Sport Dueling from the Dark Ages to the Renaissance</b></a>". <a href="http://jwma.ejmas.com" target="_blank">Journal of Western Martial Art</a>. June 2003.
	<br />An in-depth look at the development and the relevance of the German fencing school or "<i>fechtschule</i>" form of fencing bouts from its roots before the 14th century to 17th century to the challenges faced today with holding and administering unarmoured longsword fencing bouts which remain within the spirit of the earlier <i>fechtschule</i> principles. </td>
</tr>
<tr><td colspan="2"></td></tr>
<!--
<tr>
	<td valign="top">10/02</td>
	<td><b>David M. Cvet - </b><a href="http://www.aemma.org/misc/news/wma2002/summaryReport.html"><b>Summary of the 4th International WMAW</b></a>
	<br />The magnificant tradition of the Western Martial Arts Workshop was secured with yet another successful WMAW weekend hosted by the Chicago Swordplay Guild at a retreat on the shores of Lake Michigan in a gothic revival setting of Racine, Wisconsin approximately 1.5 hours north of Chicago.</td>
</tr>
-->
<tr>
	<td valign="top">02/2002</td>
	<td><b>David M. Cvet. </b>"<a href="http://www.newyorkcarver.com/martialarts.htm" target="_blank"><b>Historical Martial Arts: Alive and Well</b></a>". <a href="http://www.newyorkcarver.com" target="_blank">Gothic & Medieval Art, History & Architecture</a>. February 2002.
	<br />The article reviews some of the current developments internationally with respect to the reconstruction, study and the practice of historical Western martial arts. </td>
</tr>
<tr><td colspan="2"></td></tr>
<tr>
	<td valign="top">01/2002</td>
	<td><b>David M. Cvet. </b>"<a href="articles/2002/jwma_cvet/cvet_feb2002.php"><b>Study of the Destructive Capabilities of the European Longsword</b></a>". <a href="http://jwma.ejmas.com" target="_blank">Journal of Western Martial Art</a>. January 2002.
	<br />Much has been written and discussed across the historical European martial arts community in articles and forums on the subject of the value or lack of value of practice cutting employing sharp swords.</td>
</tr>
</table>
</div><!-- main_content_AIMS  -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
