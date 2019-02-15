<?php
ini_set('display_errors', 'On');
// 	Program: 	listing_by_rank.php
//	Description: 	Listing of the instructors of the Academy, created Nov 01, 2016
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
if (isset($_GET['RNK'])) { $rank_ID = $_GET['RNK']; } else { $rank_ID = 1; }	//default rank listed is recruit
if (isset($_GET['LST'])) { $list = $_GET['LST']; } else { $list = "all"; }	//default rank listed is recruit

// define the default or selected default tab based on which tab the selection criteria had occured in
// A new chapter will require a new tab to be defined !!!!!!!!!!!!!!!!!!!
$tab0_active = $tab1_active = $tab2_active = $tab3_active = $tab4_active = "";
$tab0_display = $tab1_display = $tab2_display = $tab3_display = $tab4_display = "";
if (isset($_GET['CHAP']))  
	{
	$radio_button_clicked = 1;
	$chapter_ID = $_GET['CHAP'];
	if ($_GET['CHAP'] == "TO")
		{ $tab0_active = "active"; $tab0_display = "style='display:block;'";}
	elseif ($_GET['CHAP'] == "GU")
		{ $tab1_active = "active"; $tab1_display = "style='display:block;'"; }
	elseif ($_GET['CHAP'] == "DB")
		{ $tab2_active = "active"; $tab2_display = "style='display:block;'"; }
	elseif ($_GET['CHAP'] == "ST")
		{ $tab3_active = "active"; $tab3_display = "style='display:block;'"; }
	else
		{ $tab4_active = "active"; $tab4_display = "style='display:block;'"; }
	}
else
	{
	$radio_button_clicked = 0;
	$chapter_ID = "";
	// the default tab to display upon opening the window
	$tab0_active = "active";
	$tab0_display = "style='display:block;'";
	}
// end default tab selection

$title[0] = "Listing by Rank";

switch ($rank_ID) {
	case 1:
		$report_title = "Listing of Recruits";
		$list_pref = "Recruits";
		break;
	case 2:
		$report_title = "Listing of Scholars";
		$list_pref = "Scholars";
		break;
	case 3:
		$report_title = "Listing of Free Scholars";
		$list_pref = "Free Schollars";
		break;
	case 4:
		$report_title = "Listing of Provosts";
		$list_pref = "Provosts";
		break;
	case 77:
		$report_title = "Listing of Honourary Members";
		$list_pref = "Honourary Members";
		break;
	}
// begin set database and members only library paths
$modal 			= 0;							// disable the modal popup as there are no insert/update operations to the database
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
// test to determine if the initial database login session remains intact or the session has timed out before attempting to connect with the database
$session_expiration = $path_members."php-bin/sub_check_session_expiration.php"; include "$session_expiration";
// end setup database and members only library paths

$lang = "en";
$lang_num = 0;
$path_members = "../";
include "../config/config.php";
$current_pgm = "listing_by_rank.php?RNK=".$rank_ID;
$menu_selected = "resources";
include "../php-bin/members_only_header.php";
// begin javascript function openTab is integral building the tabs allowing presentation of more content on different tabs on the same page
?>
  <script type="text/javascript">
  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  </script>
<?php
// end javascript function openTab is integral building the tabs allowing presentation of more content on different tabs on the same page
?>
<script language="javascript">
function submit_new_list(which,RnkID,Chap) {
//alert("inside submit_new_list"+which+RnkID);
//var usernme = document.Login_form.ID.value;
//var pwd = document.Login_form.PW.value;
//var ipaddress = document.Login_form.IPaddress.value;
//var pname = "<?=$_SESSION['PName']?>";
//alert("inside submit_username_pwd:ID=" + usernme + ", PW=" + pwd + ", FN=" + pname + ", IP=" + ipaddress);
location.href="listing_by_rank.php?RNK="+RnkID+"&LST="+which+"&CHAP="+Chap;
//alert("");
//location.href="<?=$path_dbase?>Login.php?LANG=<?=$lang?>&AIMS=1&ID=" +  usernme + "&PW=" + pwd + "&IP=" + ipaddress;
}

</script>

<?php
include "../php-bin/members_only_header2.php";
$LinkID=dbConnect($DB);
$SQL  = 'SELECT Chapter_ID, Chapter_Name FROM Chapters ';
$SQL .= 'WHERE ChapterState_ID IN (1,2,3) ORDER BY Index_ID';
$Result = mysqli_query($LinkID, $SQL);
$i = 0;
$chapter_found_index = 0;
while ($Line = mysqli_fetch_object($Result))
	{
	$array_chapter_name[$i] = $Line->Chapter_Name;
	$array_chapter_ID[$i] 	= $Line->Chapter_ID;
	if ($array_chapter_ID[$i] == $chapter_ID) {$chapter_found_index = $i;}
//echo ('debug:listing_by_rank:137:$chapter_ID="'.$chapter_ID.'", $array_chapter_ID['.$i.']="'.$array_chapter_ID[$i].'"<br />');
	$i++;
	}
$array_num_chapters = sizeof($array_chapter_name);
//echo ('debug:listing_by_rank:141:$array_num_chapters="'.$array_num_chapters.'"<br />');
// If a new chapter is to be added, a NEW tab is required to be defined below !!!!!!!!!!!!!!!!!!!!!!!!!
$tab0[$lang_num] = "Toronto";
$tab1[$lang_num] = "Guelph";
$tab2[$lang_num] = "Digby";
$tab3[$lang_num] = "Stratford";
$tab4[$lang_num] = "Ottawa";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<img src="../images/1090x4_transparent.png" width="100%" alt="" />
		<ul class="tab">
		  <li><a href="#" class="tablinks <?=$tab0_active?>" onclick="openTab(event, 'Toronto')"><?=$tab0[$lang_num]?></a></li>
		  <li><a href="#" class="tablinks <?=$tab1_active?>" onclick="openTab(event, 'Guelph')"><?=$tab1[$lang_num]?></a></li>
		  <li><a href="#" class="tablinks <?=$tab2_active?>" onclick="openTab(event, 'Digby')"><?=$tab2[$lang_num]?></a></li>
		  <li><a href="#" class="tablinks <?=$tab3_active?>" onclick="openTab(event, 'Stratford')"><?=$tab3[$lang_num]?></a></li>
		  <li><a href="#" class="tablinks <?=$tab4_active?>" onclick="openTab(event, 'Ottawa')"><?=$tab4[$lang_num]?></a></li>
		</ul>
<?php
if ($radio_button_clicked)	// this checks if the chapter ID has been passed to the re-iteration of this script because someone selected an alternate radio button
	{
	// generate the listing for the tab currently active
	$chapter_ID = $array_chapter_ID[$chapter_found_index];
	echo ('<div id="'.$array_chapter_name[$chapter_found_index].'" class="tabcontent" '.${'tab'.$chapter_found_index.'_display'}.'><!-- begin '.$array_chapter_name[$chapter_found_index].' tab section -->');
	include "listing_by_rank_chapter.php";
	echo ('</div><!-- end '.$array_chapter_name[$chapter_found_index].' tab section -->');
	for ($anc=0;$anc<$array_num_chapters;$anc++)
		{
		if ($anc<>$chapter_found_index)
			{
			$chapter_ID = $array_chapter_ID[$anc];
//echo ('debug:listing_by_rank:174:$array_chapter_ID['.$anc.']="'.$array_chapter_ID[$anc].'"<br />$chapter_ID="'.$chapter_ID.'", $chapter_found_index="'.$chapter_found_index.'"<br />');
			echo ('<div id="'.$array_chapter_name[$anc].'" class="tabcontent" '.${'tab'.$anc.'_display'}.'><!-- begin '.$array_chapter_name[$anc].' tab section -->');
			include "listing_by_rank_chapter.php";
			echo ('</div><!-- end '.$array_chapter_name[$anc].' tab section -->');
			}
		}
	}
else
	{
	for ($anc=0;$anc<$array_num_chapters;$anc++)
		{
		$chapter_ID = $array_chapter_ID[$anc];
		echo ('<div id="'.$array_chapter_name[$anc].'" class="tabcontent" '.${'tab'.$anc.'_display'}.'><!-- begin '.$array_chapter_name[$anc].' tab section -->');
		include "listing_by_rank_chapter.php";
		echo ('</div><!-- end '.$array_chapter_name[$anc].' tab section -->');
		}
	}
?>
	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
