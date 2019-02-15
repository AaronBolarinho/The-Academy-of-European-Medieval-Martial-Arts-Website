<?php
// 	Program: 	members_only_header2.php
//	Description: 	This typically follows the header.php script for the subpages all having a similar structure.
//			If something else needs to be added to the header, e.g. javascript or otherwise, then copy the
//			contents below into that PHP script and modify to suit.
//
//	2016 ------------------
//	may 26:	included a conditional in the sub_fadeslideshow.js, which checks the screen width, if >750, each banner image height is set to 109 pixels,
//		if the screen is <= 750, each banner image height is set to 70 pixels
//	2019 ------------------
//	jan 25:	standardized path names
//
$fadeslideshow = $path_members."js-bin/sub_fadeslideshow.js";include "$fadeslideshow";
?>
</head>
<body>
<?php
if ($modal)
	{
	$modal_include = $path_dbase."php-bin/msg_handler_modal.php";include "$modal_include";
?>
	<script type="text/javascript">
	// javascript functions related to modal popup windows wrt the PHP script, msg_handler_modal.php
	// Get the modal
	var modal_msg = document.getElementById('msgModal');

	// Get the button that opens the modal
	// var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span_msg = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	//btn.onclick = function() {
	modal_msg.style.display = "block";
	//}

	// When the user clicks on <span> (x), close the modal
	span_msg.onclick = function() {
	modal_msg.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal_msg) {
	modal_msg.style.display = "none";
		}
   	}
	</script>
<?php
	}
?>
<!-- begin page content presentation (php-bin/members_only_header2.php) -->
<div id="container">
	<!-- begin banner -->
	<div id="banner">
		<img src="<?=$path_members?>images/banner_1500.jpg" alt="" width="100%" />
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
		<div style="float:left;" id="fadeshow11"></div>
	</div>
	<!-- end random pictures bar -->
	<!-- begin menu bar -->
<?php
// include the file containing the main menu bar
$menu_bar = $path_members."php-bin/members_only_menu.php";
include "$menu_bar";
?>
	<!-- end menu bar -->

