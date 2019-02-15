<?php
// index.php == created: March 23, 2016
// author: David M. Cvet
// Description: this script is the working home page for the AEMMA members only website. The idea is to embedd the facebook
//		in order to make this home page reactive
//---------------------------
// Updates:
//	2016 ----------
//	nov 11:	added new session variable $_SESSION['POSTIT'], setting this to "1" in table "Post_it" will enable the post-it to popup on the members only home page to promote an event
//		and when that event page is visited, the session variable is then disabled so that the post-it doesn't cover the home page content
//		Also, the menu for AIMS has a function to enable/disable the Post-it, and update the text appearing on the Post-it note
//	2019 ------------------
//	jan 25:	standardized path names
//
//if (isset($_GET['LANG'])) { $current_pgm = "index.php"; $menu_selected = "home"; } else { $current_pgm = ""; $menu_selected = "";}
//include "php-bin/retrieve_cookies.php";
$aims = 1;	// flag to indicate that we are now in the AIMS database system, so the menu bar needs to be expanded by the AIMS menu item
$lang = "en";
$lang_num = 0;
$path_members 	= "";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../";						// the root location of the directories calling script
$current_pgm = "index.php";
$menu_selected = "home";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

// begin retrieve post-it values
$LinkID=dbConnect($DB);
$SQL = 'SELECT Enabled, Announcement_en, Click_Statement_en, Announcement_fr, Click_Statement_fr, Date FROM Post_it';
$Result = mysqli_query($LinkID, $SQL);
if (mysqli_num_rows($Result) > 0) 
	{
	$Line = mysqli_fetch_object($Result);
	$postit_enabled 	= $Line->Enabled; 
	$postit_announcement[0]	= $Line->Announcement_en; 
	$postit_click[0] 	= $Line->Click_Statement_en; 
	$postit_announcement[1]	= $Line->Announcement_fr; 
	$postit_click[1] 	= $Line->Click_Statement_fr; 
	$postit_date		= $Line->Date; 
	}
else
	{ $postit_enabled = 0; }
mysqli_close($LinkID);
// end retrieve post-it values

$config = $path_members."config/config.php"; include "$config";
//$postit = $path_members."config/postit.php"; include "$postit";
$config_index = $path_members."config/content_index_$lang.php"; include "$config_index";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
<!-- begin page content -->
<div id="main_content">
		<!-- begin == this is the main body of the page for content -->
		<img src="images/1090x4_transparent.png" alt="" width="100%" />
<?php
if ($postit_enabled)
	{
?>
		<!-- begin Post-it popup-->
		<div class="quote-container">
			<i class="pin"></i>
			<blockquote class="note yellow">
			<?=$postit_announcement[$lang_num]?>
			<cite class="author"><?=$postit_click[$lang_num]?></cite>
			</blockquote>
		</div>
		<!-- end Post-it popup-->
<?php
	}
?>
		<div>
			<div class="main_login_approved"><img src="<?=$path_members?>images/login_approved.png" width="100%" alt="" /></div>
			<div><h2><?=$title[$lang_num]?> </h2></div>
		</div>
		<div class="main_arms"><img src="<?=$path_members?>images/coatofarms/aemma_arms_340_transparent.png" width="100%" alt="" /></div>
		<div class="main_p1"><p><?=$home_p1[$lang_num]?></p></div>
		<div class="main_p2"><p><?=$home_p2[$lang_num]?></p></div>
		<div class="main_gray_box box"><!-- begin gray box -->
			<div class="main_left_column"><!-- begin left column: name, address ending with email -->
				<table style="margin:15px;width:100%;">
				<tr>
					<td align="right" valign="top"><b>Full Name:</b></td>
					<td><?=$_SESSION['uname']?></td>
				</tr>
				<tr>
					<td valign="top" align="right"><b>Address:</b></td>
					<td valign="top"><?=$_SESSION['Address']?>
<?php
//if ($_SESSION['address2'])
//	{ echo ('<br />'.$_SESSION['address2']); }
//if ($_SESSION['address3'])
//	{ echo ('<br />'.$_SESSION['address3']); }
?>
					<br /><?=$_SESSION['City']?>, <?=$_SESSION['ProvState']?>&nbsp;&nbsp;<?=$_SESSION['PCZip']?></td>
				</tr>
				<tr>
					<td align="right"><b>Tel (H):</b></td><td><?=$_SESSION['NumHome']?></td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>	<td align="right"><b>Tel (C):</b></td><td><?=$_SESSION['NumMobile']?></td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td align="right"><b>email:</b></td><td><?=$_SESSION['Email']?></td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td align="right"><b>Emerg<span style="font-size:0.5em;">&nbsp;</span>contact:</b></td><td colspan="2"><?=$_SESSION['EmergContact']?></td>
				</tr>
				<tr>
					<td align="right"><b>Emerg<span style="font-size:0.5em;">&nbsp;phone:</b></td><td colspan="2"><?=$_SESSION['EmergContactPhone']?></td>
				</tr>
				</table>
			</div><!-- end left column: name, address ending with email -->

			<div class="main_middle_column"><!-- begin middle column: portrait -->
				<div align="center"><img src="<?=$_SESSION['portrait_URL']?>/<?=$_SESSION['portrait_File']?>" class="main_portrait_img_element" alt="" /><br /><br /><i><?=$portrait_caption[$lang_num]?></i></div>
			</div><!-- end middle column: portrait -->

			<div class="main_right_column"><!-- begin right colum: birthday, rank, etc. -->
				<table style="margin:15px;width:100%;">
<!--				<tr>
					<td colspan="2"><span style="color:green;"><b><i>(Date&nbsp;format: yyyy-mm-dd)</i></b></span></td>
				</tr>
-->
				<tr>
					<td align="right" width="40%"><b>Birth Year:</b></td>
					<td><?=$_SESSION['BirthDate']?></td>
				</tr>
				<tr>
					<td align="right"><b>Membership<span style="font-size:0.5em;">&nbsp;</span>Date:</b></td>
					<td><?=$_SESSION['DateJoined']?></td>
				</tr>
<?php
if ($_SESSION['spouse'])
	{ echo ('<tr><td align="right"><b>Spouse:</b></td><td>'.$_SESSION['Spouse'].'</td></tr>'); }
?>
				<tr>
					<td align="right"><b>Rank:</b></td>
					<td><?=$_SESSION['Rank']?></td>
				</tr>
				<tr>
					<td align="right"><b>username:</b></td><td><?=$_SESSION['username']?></td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td align="right"><b>member num:</b></td><td><?=$_SESSION['MemberNumber']?></td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td align="right"><b>Chapter:</b></td><td><?=$_SESSION['Chapter']?></td>
					<td>&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2"><?=$correct_p1[$lang_num]?>&nbsp;<?=$correct_p2[$lang_num]?><br /><script type="text/JavaScript"><!--
							var link = "<?=$admin_addy?><img src='<?=$path_members?>images/atsign_12.gif' alt='' style='vertical-align:middle;' /><?=$admin_1st_qual?><img src='<?=$path_members?>images/dot.gif' alt='' /><?=$admin_2nd_qual?>";
							var tag1 = "mail";
							var tag2 = "to:";
							var tag3 = "style=\"cursor:pointer\" title=\"<?=$correct_p3[$lang_num]?>\"";
							var email1 = "%20<?=$admin_addy?>";
							var email2 = "<?=$admin_1st_qual?>";
							var email3 = ".<?=$admin_2nd_qual?>";
							var subject = "<?=$correct_subject[$lang_num]?>";
							var body = "";
							document.write("<a " + tag3 + " h" + "ref=" + tag1 + tag2 + email1 + "@" + email2 + email3 + "?subject=" + escape(subject) + "&body=" + escape(body) + ">" + link + "</a>")
							//--></script></td>
				</tr>
				</table>
			</div><!-- end right colum: birthday, rank, etc. -->
		</div><!-- begin gray box -->
</div><!-- main_content -->
<?php
// begin footer
include "php-bin/footer.php";
// end footer
?>
</div><!-- container -->
</body></html>
