<?php
// 	Program: 	members_roll.php
//	Description: 	presentation of the roll of arms of personal armorial bearings of members of AEMMA. created December 2017.
//			Note: the total number of arms in the roll is updated, along with the date in the config files associated with this script
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$modal = 0;												// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$current_pgm = "members_roll.php";
$menu_selected = "resources";

$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_members_roll_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";

// retrieve armigers records and populate respective arrays
$LinkID=dbConnect($DB);
$SQL  = 'SELECT Award_ID, Award_Symbol_Code, Award_Description_en, Award_Description_fr, Award_Link from tbl_Armigerous_Symbols ';
$SQL .= 'ORDER BY Award_ID';
$Result = mysqli_query($LinkID, $SQL);
$i = 0;
$index_award_ID	= 0;
$index_award_code = 1;
$index_award_desc_en = 2;
$index_award_desc_fr = 3;
$index_award_link = 4;
while ($Line_A = mysqli_fetch_object($Result))
	{
	$array_awards_symbols[$i][$index_award_ID]	= $Line_A->Award_ID;
	$array_awards_symbols[$i][$index_award_code]	= $Line_A->Award_Symbol_Code;
	$array_awards_symbols[$i][$index_award_desc_en]	= $Line_A->Award_Description_en;
	$array_awards_symbols[$i][$index_award_desc_fr]	= $Line_A->Award_Description_fr;
	$array_awards_symbols[$i][$index_award_link]	= $Line_A->Award_Link;
	$i++;
	}
if ($i > 0) 
	{$num_array_armigerous_external_awards = sizeof($array_awards_symbols); $_SESSION['Array_awards'] = $array_awards_symbols; }
else	{ $num_array_armigerous_external_awards = 0; }

?>
	<!-- begin page content -->
	<div style="float:left;margin-top:0px;width:1240px;height:50px;background-image:url('<?=$path_members?>images/banner_shields_50h.png');background-repeat:repeat-x;"></div>
	<div id="main_content_mo">
		<h2><?=$title[$lang_num]?></h2>
		<div class="roll_bourbon">
			<div class="roll_bourbon_image"><a href="<?=$path_members?>images/presentationArms.jpg"><img src="<?=$path_members?>images/presentationArms.jpg" class="fade" width="100%" alt="" title="click to view larger image of the same" style="box-shadow: 10px 10px 5px 0px #5e5e5e;" /></a></div>
			<div class="roll_bourbon_caption"><?=$armoury_caption[$lang_num]?></div>
		</div>
		<div class="roll_herald">
			<div class="roll_herald_image"><a href="<?=$path_members?>images/knightly_herald_banner.jpg"><img src="<?=$path_members?>images/knightly_herald_banner.jpg" width="100%" class="fade" alt="" title="click to view larger image of the same" style="box-shadow: 10px 10px 5px 0px #5e5e5e;" /></a></div>
			<div class="roll_herald_caption"><?=$herald_caption[$lang_num]?></div>
		</div>
		<p><?=$armoury_p1[$lang_num]?></p>
		<p><?=$armoury_p2[$lang_num]?></p>
		<p><?=$armoury_p3[$lang_num]?></p></td>
		<p><?=$armoury_total[$lang_num]?>&nbsp;<b><?=$total_number?></b></p>
		<h3><?=$armoury_instructions[$lang_num]?></h3>
		<p><?=$armoury_p4[$lang_num]?></p>
		<div style="cursor:pointer;">
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=a"><img src="<?=$path_members?>armoury/alphabet/a.png" class="fade" title="Surnames beginning with the letter 'A'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=b"><img src="<?=$path_members?>armoury/alphabet/b.png" class="fade" title="Surnames beginning with the letter 'B'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=c"><img src="<?=$path_members?>armoury/alphabet/c.png" class="fade" title="Surnames beginning with the letter 'C'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=d"><img src="<?=$path_members?>armoury/alphabet/d.png" class="fade" title="Surnames beginning with the letter 'D'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=e"><img src="<?=$path_members?>armoury/alphabet/e.png" class="fade" title="Surnames beginning with the letter 'E'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=f"><img src="<?=$path_members?>armoury/alphabet/f.png" class="fade" title="Surnames beginning with the letter 'F'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=g"><img src="<?=$path_members?>armoury/alphabet/g.png" class="fade" title="Surnames beginning with the letter 'G'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=h"><img src="<?=$path_members?>armoury/alphabet/h.png" class="fade" title="Surnames beginning with the letter 'H'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=i"><img src="<?=$path_members?>armoury/alphabet/i.png" class="fade" title="Surnames beginning with the letter 'I'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=j"><img src="<?=$path_members?>armoury/alphabet/j.png" class="fade" title="Surnames beginning with the letter 'J'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=k"><img src="<?=$path_members?>armoury/alphabet/k.png" class="fade" title="Surnames beginning with the letter 'K'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=l"><img src="<?=$path_members?>armoury/alphabet/l.png" class="fade" title="Surnames beginning with the letter 'L'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=m"><img src="<?=$path_members?>armoury/alphabet/m.png" class="fade" title="Surnames beginning with the letter 'M'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=n"><img src="<?=$path_members?>armoury/alphabet/n.png" class="fade" title="Surnames beginning with the letter 'N'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=o"><img src="<?=$path_members?>armoury/alphabet/o.png" class="fade" title="Surnames beginning with the letter 'O'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=p"><img src="<?=$path_members?>armoury/alphabet/p.png" class="fade" title="Surnames beginning with the letter 'P'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=q"><img src="<?=$path_members?>armoury/alphabet/q.png" class="fade" title="Surnames beginning with the letter 'Q'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=r"><img src="<?=$path_members?>armoury/alphabet/r.png" class="fade" title="Surnames beginning with the letter 'R'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=s"><img src="<?=$path_members?>armoury/alphabet/s.png" class="fade" title="Surnames beginning with the letter 'S'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=t"><img src="<?=$path_members?>armoury/alphabet/t.png" class="fade" title="Surnames beginning with the letter 'T'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=u"><img src="<?=$path_members?>armoury/alphabet/u.png" class="fade" title="Surnames beginning with the letter 'U'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=v"><img src="<?=$path_members?>armoury/alphabet/v.png" class="fade" title="Surnames beginning with the letter 'V'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=w"><img src="<?=$path_members?>armoury/alphabet/w.png" class="fade" title="Surnames beginning with the letter 'W'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=x"><img src="<?=$path_members?>armoury/alphabet/x.png" class="fade" title="Surnames beginning with the letter 'X'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=y"><img src="<?=$path_members?>armoury/alphabet/y.png" class="fade" title="Surnames beginning with the letter 'Y'" alt="" /></a></div>
			<div style="float:left;"><a href="<?=$path_members?>armoury/armorial_letter.php?LTR=z"><img src="<?=$path_members?>armoury/alphabet/z.png" class="fade" title="Surnames beginning with the letter 'Z'" alt="" /></a></div>
		</div>
	</div>
	<!-- end page content -->
	<!-- begin footer -->
<?php
$footer_var = $path_members."php-bin/footer.php"; include "$footer_var";
?>
		<!-- end footer -->
</div><!-- container -->
</body></html>
