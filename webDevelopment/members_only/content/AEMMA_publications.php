<?php
//
// Program: AEMMA_publications.php
// Author: David M. Cvet
// Created: Jan 10, 2019
// Description: a listing of various publications published internally by AEMMA
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
$title[0] = $title[1] = "AEMMA: Publications by AEMMA";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
$current_pgm = "AEMMA_publications.php";
$menu_selected = "resources";
$config = $path_members."config/config.php"; include "$config";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
?>
<script type="text/javascript">
function DownloadPopUp() {
//alert("debug:sub_wine_kit_add:UploadFile():126");
var popup = "../publications/cvet/download.htm";
window.open(popup,'_blank','location=yes,height=460,width=650,scrollbars=yes,status=yes');
}

function DownloadPopUpBrief() {
//alert("debug:sub_wine_kit_add:UploadFile():126");
var popup = "../publications/cvet/book1_p78.pdf";
window.open(popup,'_blank','location=yes,height=650,width=650,scrollbars=yes,status=yes');
}

</script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
	<!-- begin page header -->
	<h3><img src="../images/icons/book.png" alt="" style="vertical-align:middle;width:50px;" />&nbsp;Resources: Publications by AEMMA</h3>
<!-- end page header -->

<p>Welcome to AEMMA's private publications listing.  AEMMA's mission to further develop and evolve the historical fighting art through the promotion and sharing information of historical Western martial arts is facilitated with this area containing a listing of private publications created by individuals within AEMMA.  Publications may include written, oral and/or video works. For more information pertaining to the publications listed below, contact <script language="javascript"><!--
				var link = "<b>AEMMA</b>";
				var tag1 = "mail";
				var tag2 = "to:";
				var tag3 = "class=linksred";
				var email1 = "%20info-aemma";
				var email2 = "aemma";
				var email3 = ".org";
				var subject = "Private Publications Listing Info Request";
				var cc = "";
				var bcc = "";
				var body = "";
				document.write("<a " + tag3 + " h" + "ref=" + tag1 + tag2 + email1 + "@" + email2 + email3 + "?cc=" + cc + "&bcc=" + bcc + "&subject=" + escape(subject) + "&body=" + escape(body) + ">" + link + "</a>")
				//--></script>.<br>&nbsp;
<a name="cvet"></a><table style="width:100%;background-color:#FFFFCC;border-style:solid;border-width:thin;padding:6px;">
<tr>
	<td width="125"><center><a href="javascript:DownloadPopUpBrief()"><img src="../publications/cvet/book1_cover_100.jpg" nosave border="1" height="144" width="110" alt="" title="click to review sample extract of David's book" class="box fade"></a></center></td>
	<td>
		<b>Title:</b> "The Art of Longsword Combat - Book #1"<br>
		<b>Author:</b> David M. Cvet, 2001<br>
		<b>Source: </b><a href="http://www.aemma.org">Academy of European Medieval Martial Arts</a><br>
		<b>Posted:</b> June 26, 2001</font><br><br>
		The purpose of this manual, the first book of a four book series is to train the student in the methods, principles and techniques of European Medieval Martial Arts, focused on longsword (<i>spada longa</i>) along with grappling (<i>abrazare</i>) and dagger (<i>daga</i>) techniques.  This work was created to form the basis of the <b>recruit</b> training program for the Academy of European Medieval Martial Arts or AEMMA.   The methodology of training is heavily influenced by Fiore dei Liberi's "<b>Flos Duellatorum</b>" (1410) treatise, however, other references for this work include but not limited to historical documents and treatises such as Hans Talhoffer, 1459, "<b>Alte Armatur und Ringkunst</b>" , Hans Talhoffer, 1467, "<b>Fechtbuch aus dem Jahre 1467</b>",  Jakob Sutor, 1612, "<b>Neu K&uuml;nstliches Fechtbuchh</b>".<p>Book 1 provides the student with the fundamental skills, theory and history to challenge for the rank of <b>scholler</b>.  Upon completion of this level of training, the student will be capable in performing all of the longsword guards (<i>posta</i>) and wards, offensive strikes, drills, armed and unarmed techniques and possess a historical knowledge and theory of the martial art. <i><font color="red">Click on the book cover on the left to view example extracts from David's book.</i></td>
	<td>&nbsp;</td>
	<td width="175">
		<b>Freely Downloadable in PDF format (7.2MB)</b><br><br><a href="javascript:DownloadPopUp()"><img SRC="../images/downloadButton.gif" alt="" title="click to go to download page of The Art of Longsword Combat - Book #1" nosave border="0" height="24" width="96" class="fade"></a><br><br><font color="red">** Financial gifts graciously accepted **<br><b>Hardcopies of Book #1 no longer available</b><br><br>
		<script language="javascript"><!--
				var link = "<img src=\"../images/orderInfoButton.gif\" alt=\"\" title=\"The Art of Longsword Combat - Book #1\" nosave border=\"0\" height=\"24\" width=\"96\" class=\"fade\" />";
				var tag1 = "mail";
				var tag2 = "to:";
				var tag3 = "class=linksred";
				var email1 = "%20info";
				var email2 = "aemma";
				var email3 = ".org";
				var subject = "Book #1 Request";
				var cc = "";
				var bcc = "";
				var body = "";
				document.write("<a " + tag3 + " h" + "ref=" + tag1 + tag2 + email1 + "@" + email2 + email3 + "?cc=" + cc + "&bcc=" + bcc + "&subject=" + escape(subject) + "&body=" + escape(body) + ">" + link + "</a>")
				//--></script><br><br></td>
</tr>
</table>
</div><!-- main_content_AIMS -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
