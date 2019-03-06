<?php
// 	Program: 	mo_equip_recruit.php
//	Description: 	A presentation of the required and standard equipment for the rank of recruit, created July 12, 2017
//	Author:		David M. Cvet
//
//	2019 ------------------
//	jan 25:	standardized path names
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations in this script
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$current_pgm = "mo_equip_recruit.php";
$menu_selected = "training";
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";

session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $path_members."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $path_members."config/config.php"; include "$config";
$config_about = $path_members."config/content_mo_equip_recruit_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
$num = rand(1,3);
?>
<?php
 //include CSS Style Sheet
 echo "<link rel='stylesheet' type='text/css' href='../css/test.css' />";

 //include a javascript file
 echo "<script type='text/javascript' src='../js-bin/test.js'></script>";

  //include a jquery
 echo '<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>';

  //include fancybox
 echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />';

  //include a javascript file for fancybox
 echo '<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>';
?>

	<!-- begin main_content -->
	<div class="main_content_mods">
		<h2><?=$banner[$lang_num]?></h2>
		<h1 class="test textFont">Equipment Requirements</h1>
		<p class="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Equipment costs for recruits in all AEMMA salles is quite low. What gear you do need will be provided for you during your first few months; this will give you time to organise your finances and your future purchases.</p>
		<p class="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Talk to your salle's Free Scholar and senior students when you are ready to start purchasing gear. While you are encouraged to make purchases yourself, there are semi-regular group orders which you may have access to.</p>
		<p class="textFont">&nbsp;&nbsp;&nbsp;&nbsp;Below, you will find a list of the gear you need, suggested versions of that gear, and a broad purchasing timeline. As always, if you have any questions, ask your fellow salle members or pose your question to AEMMA members online.</p>
		<h2 class="textFont">Needed Your First Day:</h2>

    <div class="shoesDiv">
      <a data-fancybox="gallery1" href="../images/runningShoesGeneric.jpg" data-src="#hidden-content" href="javascript:;"><img class="shoesImage" src="../images/runningShoesGeneric.jpg"></a>
      <a data-fancybox="gallery1" href="../images/blackTrackPantsGeneric.jpg" data-src="#hidden-content2" href="javascript:;"></a>
      <div class="shoesContent">
          <h3 class="test">Indoor Shoes</h3>
          <ul>
            <li>Description One</li>
            <li>Description Two</li>
            <li>Description Three</li>
            <li>Description Four</li>
          </ul>
          <div class="buttonDiv">
            <button><---Click for Brands and Reviews</button>
          </div>
      </div>
    </div>

    <div class="shoesDiv">
      <div class="shoesContent">
          <h3 class="test">White Shirt</h3>
          <ul>
            <li>Description One</li>
            <li>Description Two</li>
            <li>Description Three</li>
            <li>Description Four</li>
          </ul>
          <div class="buttonDiv">
            <button>Click for more</button>
          </div>
      </div>
      <a data-fancybox="gallery2" href="../images/whiteTshirtGeneric.jpg"><img class="shoesImage"src="../images/whiteTshirtGeneric.jpg"></a>
    </div>

    <div class="shoesDiv">
      <a data-fancybox="gallery3" href="../images/blackTrackPantsGeneric.jpg"><img class="shoesImage"src="../images/blackTrackPantsGeneric.jpg"></a>
      <a data-fancybox="gallery3" href="../images/blackTrackPantsGeneric.jpg"></a>
      <a data-fancybox="gallery3" href="../images/blackTrackPantsGeneric.jpg"></a>
      <a data-fancybox="gallery3" href="../images/blackTrackPantsGeneric.jpg"></a>
      <a data-fancybox="gallery3" href="../images/blackTrackPantsGeneric.jpg"></a>
      <a data-fancybox="gallery3" href="../images/blackTrackPantsGeneric.jpg"></a>
      <div class="shoesContent">
          <h3 class="test">Black Pants</h3>
          <ul>
            <li>Description One</li>
            <li>Description Two</li>
            <li>Description Three</li>
            <li>Description Four</li>
          </ul>
          <div class="buttonDiv">
            <button>Click for more</button>
          </div>
      </div>
    </div>

    <div style="display: none;" id="hidden-content">
      <div class="shoesImageTest"></div>
      <h2>Hello</h2>
      <p>You are awesome.</p>
      <table style="width:100%">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Age</th>
        </tr>
        <tr>
          <td>Jill</td>
          <td>Smith</td>
          <td>50</td>
        </tr>
        <tr>
          <td>Eve</td>
          <td>Jackson</td>
          <td>94</td>
        </tr>
      </table>
      <button>Click for more</button>
    </div>

    <div style="display: none;" id="hidden-content2">
      <div class="shoesImageTest"></div>
      <h2>Hello</h2>
      <p>You are awesome 2.</p>
      <button>Click for more</button>
    </div>

    <div style="display: none;" id="hidden-content3">
      <div class="shoesImageTest"></div>
      <h2>Hello</h2>
      <p>You are awesome 3.</p>
      <button>Click for more</button>
    </div>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
