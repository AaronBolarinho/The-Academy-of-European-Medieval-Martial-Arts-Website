<?php
//ini_set('display_errors', 'On');
// Program: library_startPage.php
// Author: David M. Cvet
// Created: Aug 10, 2017
// Description:
//	Originally created in 1998 as a basic HTML page, this script will serve the same purpose as the original by introducing the browser
//	to the online library and instructions on using it.
//---------------------------
// Updates:
//	2019 ----------
//	jan 22:	enhanced the code to detect whether or not the access to the online library is from the public site or from the members only area using PHP parameter "MA"


if (isset($_GET['MA'])) { $member_access = 1; } else { $member_access = 0; }	//default access is public
$current_pgm = "library_startPage.php";

if (!$member_access)
	{
	$php_string = "";
	// access to the online library is via the public site
	include "../php-bin/retrieve_cookies.php";
	include "../config/config.php";
	include "../config/content_library_startPage_$lang.php";
	$path 	= "../";
	$menu_selected = "resources";
	include "../php-bin/header.php";
	echo ('<script type="text/javascript" src="'.$path.'js-bin/disable.js"></script>');
	echo ('<script type="text/javascript" src="'.$path.'js-bin/libButtonsCommon.js"></script>');
	echo ('<script type="text/javascript" src="'.$path.'js-bin/security/libraryLogonFunction.js"></script>');
	echo ('<script type="text/javascript" src="'.$path.'js-bin/security/registerPopup.js"></script>');
	include "../php-bin/header2.php";
	}
else
	{
	// access to the online library is via the members only area
	// begin set database and members only library paths
	$php_string			= "?MA=1";
	$modal 				= 0;								// disable the modal popup as there are no insert/update operations to the database
	$path				= "../";							// the root path for the website
	$path_members 		= $path."members_only/";			// the location of the members only scripts and files with respect to this calling script
	$path_dbase 		= $path_members."database/";		// the location of the database scripts and files with respect to this calling script
	$ss_path 			= $path_dbase."ss_path.stuff"; include "$ss_path";
	$db_path 			= $path_dbase."DB.php"; include "$db_path";
	session_start();
	$lang = "en";
	$lang_num = 0;
	include $path."config/config.php";
	$menu_selected = "resources";
	include $path_members."php-bin/members_only_header.php";
	echo ('<script type="text/javascript" src="'.$path.'js-bin/disable.js"></script>');
	echo ('<script type="text/javascript" src="'.$path.'js-bin/libButtonsCommon.js"></script>');
	echo ('<script type="text/javascript" src="'.$path.'js-bin/security/libraryLogonFunction.js"></script>');
	echo ('<script type="text/javascript" src="'.$path.'js-bin/security/registerPopup.js"></script>');
	include $path_members."php-bin/members_only_header2.php";
	}
?>
<!-- begin main_content -->
<div id="main_content" style="background-image:url('../images/text.gif');">
<!-- begin page header -->
<h1 style="font-size:1.3em;"><img src="<?=$path_members?>images/icons/book_24.gif" width='30' style="vertical-align:middle;" alt='' /><img src="<?=$path_members?>images/letters/number_0.png" width='30' style="vertical-align:middle;" alt='' /> resources : online library : overview & usage</h1>
<!-- end page header -->
<!--<h2><img src="../images/letter_O.gif" NOSAVE height=50 width=50 align=middle hspace=2>nline Library</h2>-->
<p align="center"><table width="100%" border="0">
<tr>
	<td width="75%"><div style="float:right;margin-left:15px;width:35%;"><img src="../images/books_shelf.gif" width="100%" alt="AEMMA online library" /></div><h2>Welcome to AEMMA's Online Library.</h2>The purpose of this online library is to provide the Academy's (AEMMA) students with historical references to facilitate their learning and training of historical Western martial arts, and secondly, to share historical manuscripts contained within this online library comprised of treatises, German <i>fechtb&uuml;cher</i> <a href="#footnote_1">[ 1 ]</a>, Italian <i>libri</i> and other materials with practitioners and schollers external to the Academy who also are engagerd with the study and practice historical European martial arts.  AEMMA's efforts in the research and development of historical European martial arts has resulted in accumulating of and gaining access to this material from the various libraries, private individuals, museums and institutions and worked with these sources in order to obtain permission to make available to the WMA <a href="#footnote_2">[ 2 ]</a> community the material where possible while abiding with their copyright requirements. If the reader has any questions regarding this online library or any other material on this website, feel free to email 
	<script type="text/JavaScript">
				var link = "<b>AEMMA</b>";
				var tag1 = "mail";
				var tag2 = "to:";
				var tag3 = "class=\"linksred\"";
				var email1 = "%20info-AEMMA";
				var email2 = "aemma";
				var email3 = ".org";
				var subject = "AEMMA Online Library Info Request";
				var cc = "";
				var bcc = "";
				var body = "";
				document.write("<a " + tag3 + " h" + "ref=" + tag1 + tag2 + email1 + "@" + email2 + email3 + "?cc=" + cc + "&bcc=" + bcc + "&subject=" + escape(subject) + "&body=" + escape(body) + ">" + link + "</a>")
				</script>.</td>
	</tr></table></p>

<h4>Notes on Usage</h4>
<table align="center" width="100%" border="0">
<tr>
	<td colspan="2"><a name="register"></a><b>1. Registering with AEMMA and receive your Online Library e-card</b><br />Due to the recurring high cost of supporting the <b>Online Library</b> in terms of bandwidth consumption as a result of numerous downloads worldwide of the material found in this online library, the Academy requests that users external to the Academy wishing to gain access to the online library, submit a small annual registration fee as indicated on the registration form.  The collection of this fee from external users will allow the Academy to recoup the bandwidth consumption costs and thus ensure that the online library remains accessible to practitioners and researchers external to the Academy.  Surplus funds accumulated will be allocated to the digitization of new microfilms acquisitions in the possession of AEMMA.  However, the treatises by <a href="../onlineResources/library_public_access.php?LIB=liberi/liberiHome.htm"><b>Fiore dei Liberi</b></a>, <a href="../onlineResources/library_public_access.php?LIB=silver/silverHome.htm"><b>George Silver</b></a> and <a href="../onlineResources/library_public_access.php?LIB=capoferro/contents.htm"><b>Ridolfo Capo Ferro</b></a> do not fall under this plan and are accessible to all as this material forms the core sources for the AEMMA recruit training program.
	<p>In order to obtain your <font color="#461B7E"><b>Online Library e-card</b></font>, <a href="javascript:reg_Popup()"><b>click here</b></a> which will pop-up a window containing instructions for registering. <font color=red><b>Note:</b> If your browser has pop-ups disabled, you will not see the registration window. If you cannot enable pop-ups for www.aemma.org in your browser, then <a href="../onlineResources/paypal.htm"><b>click here</b></a>.</font></p>
	<p><font color="#461B7E"><b>In the meantime, if you wish to send us your comments, or your interest in obtaining a library e-card, feel free to email AEMMA by clicking 
	<script type="text/JavaScript">
				var link = "<b>Online Library e-card</b>";
				var tag1 = "mail";
				var tag2 = "to:";
				var tag3 = "class=\"linksred\"";
				var email1 = "%20info-AEMMA";
				var email2 = "aemma";
				var email3 = ".org";
				var subject = "AEMMA Online Library e-card";
				var cc = "";
				var bcc = "";
				var body = "";
				document.write("<a " + tag3 + " h" + "ref=" + tag1 + tag2 + email1 + "@" + email2 + email3 + "?cc=" + cc + "&bcc=" + bcc + "&subject=" + escape(subject) + "&body=" + escape(body) + ">" + link + "</a>")
				</script>.</b><br />&nbsp;</p></td>
</tr>
<tr>
	<td colspan="2"><b>2. Navigating the Online Library</b><br />The library has been partitioned into 8 segments.  Each segment representing a particular century or groups of centuries.  There are two approaches to navigating the library, the first is to use century buttons below which are visible on each page of each segment.  When you are in a particular period, the button will remain an orange colour in order to provide a visual cue as to where you are.  The second approach is to employ the pull-down menu from the navigation bar across the top of the window.
	<!-- start navigation strip -->
	<div style="float:left;width:100%;text-align:center;margin-top:20px;margin-bottom:20px;"><img src="../images/navigation/buttun_lib_left_end_purple_grad.gif" alt="" /><a href="../onlineResources/library_11c.php<?=$php_string?>" onMouseout="m0('c11')" onMouseover="m1('c11'),window.status='Navigation Bar: 11-14th Centuries';return true" ><img src="../images/navigation/button_lib_11_14c_purple_grad.jpg" border="0" alt="11-14th Centuries" title="11-14th Centuries" name="c11" /></a><a href="../onlineResources/library_15c.php<?=$php_string?>" onMouseout="m0('c15')" onMouseover="m1('c15'),window.status='Navigation Bar: 15th Century';return true" ><img src="../images/navigation/button_lib_15c_purple_grad.jpg" alt="15th Century" title="15th Century" border="0" name="c15" /></a><a href="../onlineResources/library_16c.php<?=$php_string?>" onMouseout="m0('c16')" onMouseover="m1('c16'),window.status='Navigation Bar: 16th Century';return true" ><img src="../images/navigation/button_lib_16c_purple_grad.jpg" alt="16th Century"  title="16th Century"border="0" name="c16" /></a><a href="../onlineResources/library_17c.php<?=$php_string?>" onMouseout="m0('c17')" onMouseover="m1('c17'),window.status='Navigation Bar: 17th Century';return true" ><img src="../images/navigation/button_lib_17c_purple_grad.jpg" alt="17th Century" title="17th Century" border="0" name="c17" /></a><a href="../onlineResources/library_18c.php<?=$php_string?>" onMouseout="m0('c18')" onMouseover="m1('c18'),window.status='Navigation Bar: 18th Century';return true" ><img src="../images/navigation/button_lib_18c_purple_grad.jpg" alt="18th Century" title="18th Century" border="0" name="c18" /></a><a href="../onlineResources/library_19c.php<?=$php_string?>" onMouseout="m0('c19')" onMouseover="m1('c19'),window.status='Navigation Bar: 19th Century';return true" ><img src="../images/navigation/button_lib_19c_purple_grad.jpg" alt="19th Century" title="19th Century" border="0" name="c19" /></a><a href="../onlineResources/library_20c.php<?=$php_string?>" onMouseout="m0('c20')" onMouseover="m1('c20'),window.status='Navigation Bar: 20th Century';return true" ><img src="../images/navigation/button_lib_20c_purple_grad.jpg" alt="20th Century" title="20th Century" border="0" name="c20" /></a><a href="../onlineResources/library_21c.php<?=$php_string?>" onMouseout="m0('c21')" onMouseover="m1('c21'),window.status='Navigation Bar: 21st Century';return true" ><img src="../images/navigation/button_lib_21c_purple_grad.jpg" alt="21st Century" title="21st Century" border="0" name="c21" /></a><img src="../images/navigation/buttun_lib_right_end_purple_grad.gif" alt="" /><br /><br /><b>Click on any one of the buttons above to begin your navigating through the online library</b></div>
	<!-- end navigation strip -->
	<p><b>3. The Table Listings of the Online Manuscripts</b><br />Each segment has a table presented comprised of 3 columns as illustrated below.  The <b>Sample Image</b> is simply a representative page or leaf from the online manuscript.  There are no links behind this image.<img src="../images/adobe.gif" width="95" height="31" border="0" hspace="3" style="float:left" alt="" />  The second column <b>Special Links</b> provides additional links with respect to the particular manuscript. Some links such as the purple & white shield indicates that this particular resource is not available in the public domain and is accessible only through userID and password held by AEMMA students.  Other shields may link to alternative sites with other versions of transcriptions and translations.  Other images can include the <b>Adobe</b> icon which indicates the manuscript is available for viewing in <b>pdf</b> format.</p></td>
</tr>
<tr>
	<td colspan="2">The third column is comprised of two rows, the first entitled <b>Author, Title - Source</b> is self-explanatory.  The <b>source</b> link, if known will be clearly evident and will take you to the URL of the original source of the material.  This row is highlighted with a light grey colour in order to distinguish it from the second row in this column.  The second row entitled <b>Citation - Description</b> includes the library's/museum's reference or citation identifiers for the material.  The description is a highlight of the contents of the material.  It may also include additional information on other links that are relevant to the material of interest.</td>
</tr>
</table>

<br />
<table align="center" width="95%" cellpadding="4" align="center">
<tr class="gold_grad">
	<td width="125" align="center"><b>Sample Image</b></td>
	<td width="125" align="center"><b>Special Links</b></td>
	<td><b>Author</b>, Year, "<a href="../onlineResources/library_11c.php"><b>Title</b></font></a>" - <a href="../onlineResources/library_11c.php">Source</font></a>
</tr>
<tr class="purple_grad">
	<td colspan="3" class="purple_grad"><img src="../images/flags/gmFlag.gif" style="vertical-align:middle" hspace="4" height="16" width="27" /> <b>Peter von Danzig</b>, 1452, "<a href="../onlineResources/library_public_access.php?LIB=secure/danzig_SecureLogon.shtml" class="linksgrad" onMouseOver="window.status='Online Library: Peter von Danzig';return true" onMouseOver="window.status='Online Library: Restricted access to von Danzig to AEMMA internal only';return true"><b>untitled</b></a>"&nbsp;&nbsp;<b>Bibliotheca dell'Academica Nazionale dei Lincei e Corsiniana</b></td>
</tr>
<tr>
	<td width="125"><img src="../onlineResources/images/libList_danzig.jpg" width="120" alt="" /></td>
	<td width="125" align="center"><a href="../onlineResources/library_public_access.php?LIB=secure/danzig_SecureLogon.shtml" onMouseOver="window.status='Online Library: Restricted access to AEMMA internal only';return true"><img src="../onlineResources/images/aemma_shield_shadow.jpg" class="fade" border="0" alt="" /></a><br /><a href="" onMouseOver="window.status='Schielhau: English translation in progress of von Danzig';return true" target="_blank"><img src="../onlineResources/images/scania.jpg" border="0" hspace="3" alt="Click to view English translation in progress of Danzig's manuscript" /></a><br /><a href="http://www.freifechter.org" onMouseOver="window.status='Freifechter: modern German transcription of Ringeck';return true" target="_blank"><img src="../images/freifechterSmall.jpg" alt="Click to view a modern German transcription of Ringeck" border="0" height="30" width="120" hspace="3" /></a></td>
	<td><table>
		<tr>
			<td align="left"><font color="red"><b>Cod.44 A 8 (Cod. 1449) 1452 / Bibliotheca dell'Academica Nazionale dei Lincei e Corsiniana </b></font>- von Danzig's fechtb&uuml;ch contains comments on the cryptic verses of Liechtenauer and other German masters covering the use of the sword-and-buckler, dagger, longsword and grappling.  The manual contains 114 leaves of text in which all but 2 leaves contain illustrations. <br /><b> -  released November 29, 2001</b><ul><li>Click on the <a href="../onlineResources/library_public_access.php?LIB=secure/danzig_SecureLogon.shtml">AEMMA arms</a> to view Peter von Danzig's untitled treatise <b>( internal access only )</b></li><li>Click on the <a href="">"griffen" arms</a> to view some English translations in progress of Danzig's fechtb&uuml;ch.</li><li>Click on the <a href="http://www.freifechter.org" target="_blank"><b>Die Freifechter</b></a> logo to view an online German transcription of von Danzig. </li></ul></td>
		</tr></table>
	</td>
</tr>
</table><hr width="95%" align="center" />


<table align="center" width="100%" border="0">
<tr>
	<td><b>4. Audio Files</b>&nbsp;<img src="../images/icons/speaker.gif" alt="" /><br />Some of the online manuscripts have an audio component indicated by the <b>speaker icon</b> <img src="../images/icons/speaker.gif" nosave> situated next to the country flag on the library listings. Internal to the manuscript, any text that has an audio component is also identified with the <b>speaker icon</b>.  To hear the text verbally, click on the <b>speaker icon</b> in the page displayed.<br />&nbsp;</td>
</tr>
<tr>
	<td><b>5. Copyright &copy; Information<br /><font color="red">The images are available online for scientific and academic research purposes only and remain the property of the sources.  AEMMA does not assume any copyright for the historical manuscripts, treatises, German <i>fechtb&uuml;cher</i> and Italian <i>libri</i> presented.  The copyright is held by the originating sources. Any desire to use the images for commercial publications, or for profit, or copied is strictly prohibited. If publications require images from this library, explicit permission from the sources must be obtained. The relevant sources and contacts are provided in the presentation of the material.</font> </b><br />&nbsp;</td>
</tr>
</table>


<!-- FOOTNOTES -->
<hr width="50%" align="center" />
<h2 style="text-align:center;"><img src="../images/sword_bucklerL.jpg" height="60" width="55" style="vertical-align:middle" alt="" /><b><font color="#400040"> Footnotes </font></b><img src="../images/sword_bucklerR.jpg" height="60" width="55" style="vertical-align:middle" alt="" /></h2>
<ol>
<li><a name="footnote_1"></a><font color="red"><b>fechtbuch</b></font> <i><b>n</i></b> German word for "fight book".</li>
<li><a name="footnote_2"></a><b>WMA</b> = Western Martial Arts.</li>
<li><a name="footnote_3"></a><img src="../onlineResources/images/aemma_shieldS.jpg" height="30" width="24" style="float:left" alt="" />  The AEMMA shield visible in some of the entries above indicates a resource that has restricted access to AEMMA internal only for research and study, and is not available for viewing in the public domain.  This is due to the fact that permission to release the material into the public domain from the source was not granted.</li>
<li><a name="footnote_4"></a><img src="../images/icons/speaker.gif" alt="" /> Some of the online manuscripts have an audio component indicated by the speaker icon situated next to the country flag on the library listings.</li>
</ol>
</div><!-- main content -->
	<!-- begin footer -->
<?php
$footer_updated[0] = "Released: November 9, 1998&nbsp;/&nbsp;Last updated: October 03, 2017";
$footer_updated[1] = "Sortie le : 9 novembre 1998&nbsp;/&nbsp;dernière mise à jour : 03 octobre 2017";
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</body>
</html>
