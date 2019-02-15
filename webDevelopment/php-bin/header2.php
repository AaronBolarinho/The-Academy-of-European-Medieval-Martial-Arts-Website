<?php
// 	Program: 	header2.php
//	Description: 	This typically follows the header.php script for the subpages all having a similar structure.
//			If something else needs to be added to the header, e.g. javascript or otherwise, then copy the
//			contents below into that PHP script and modify to suit.
//
//	2016 ------------------
//	may 26:	included a conditional in the sub_fadeslideshow.js, which checks the screen width, if >750, each banner image height is set to 109 pixels,
//		if the screen is <= 750, each banner image height is set to 70 pixels
//
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
	<!-- begin menu bar -->
<?php
// include the file containing the main menu bar
$menu_bar = $path."php-bin/menu.php";
include "$menu_bar";
?>
	<!-- end menu bar -->

