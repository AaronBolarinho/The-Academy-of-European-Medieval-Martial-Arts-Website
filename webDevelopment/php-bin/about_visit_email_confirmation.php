<?php
//
// Program: about_visit_email_confirmation.php
// Description:
//	This script creates a popup email confirmation window called by the PHP script: sub_about_visit_email.php
//	*** There are no edits required for specific store impelementations.
//---------------------------
// Updates:
//	2016 ----------
//
$name = $_GET['NME'];
//$lang = $_GET['LANG'];
//$lang_num = $_GET['LANGN'];
$path = "../";			// the location of the members only scripts and files with respect to this calling script
$current_pgm = "members_first_contact_email_confirmation.php";
$menu_selected = "resources";
include "../config/config.php";
include "header.php";
//$config_conf = $path."config/content_members_first_contact_email_confirmation_$lang.php"; include "$config_conf";
$fadeslideshow = $path."js-bin/sub_fadeslideshow.js";
include "$fadeslideshow";
?>
</head>
<body>
<!-- begin page content presentation -->
<div id="container">
	<!-- begin banner -->
	<div id="banner">
		<img src="<?=$path?>images/<?=$banner_image[$lang_num]?>" alt="" width="100%" />
	</div>
	<!-- end banner -->
	<!-- begin random pictures bar -->
	<div class="fadeslideshow_banner">
		<div style="float:left;" id="fadeshow1"></div>
		<div style="float:left;" id="fadeshow2"></div>
		<div style="float:left;" id="fadeshow3"></div>
		<div style="float:left;" id="fadeshow4"></div>
		<div style="float:left;" id="fadeshow5"></div>
		<div style="float:left;" id="fadeshow6"></div>
		<div style="float:left;" id="fadeshow7"></div>
		<div style="float:left;" id="fadeshow8"></div>
		<div style="float:left;" id="fadeshow9"></div>
		<div style="float:left;" id="fadeshow10"></div>
	</div>
	<!-- end random pictures bar -->

<div style="float:left;text-align:center;width:100%;margin-top:-25px;"><br /><br /><img src="<?=$path?>images/AEMMA_logo_white_200_transparent.png" width="30%" alt="" /></div>
<div style="float:left;text-align:left;width:100%;margin-top:25px;padding:20px;">Thank you, <b><?=$name?></b>, for requesting a visit to AEMMA. You will receive a response within a few days.</p></div>
<div style="float:left;text-align:center;width:100%;margin-bottom:20px;"><form method="post"><input class="button" type="button" value="Close Window" onclick="window.close()"></form></div>
	<!-- begin footer -->
<?php
include "footer.php";
?>
	<!-- end footer -->

</div><!-- container -->
</body>
</html>
