<script type="text/javascript">
<!--
function writeCookie() 
{
 var today = new Date();
 var the_date = new Date("December 31, 2023");
 var the_cookie_date = the_date.toGMTString();
 var the_cookie = "users_res="+ screen.width +"x"+ screen.height;
 var the_cookie = the_cookie + ";expires=" + the_cookie_date;
 document.cookie=the_cookie
 if (document.cookie){  
	location = '<?=$GLOBALS[callget_res_page_name]?>';
 }
 
}


function checkRes(width, height) {
	if(width != screen.width || height != screen.height) {
		writeCookie();
	} else {
		return true;
	}
}
//-->
</script>

<?
if(isset($HTTP_COOKIE_VARS["users_res"])) {
	$screen_res = $HTTP_COOKIE_VARS["users_res"];
	$screen_res_tmp = explode("x", $screen_res);
	$screen_width = $screen_res_tmp[0];
	$screen_height = $screen_res_tmp[1];
	?>
	<script type="text/javascript">
	<!--
	checkRes(<?=$screen_width?>, <?=$screen_height?>);
	//-->
	</script>
	<?
}
else //means cookie is not found set it using Javascript
{
?>
<script type="text/javascript">
<!--
writeCookie();
//-->
</script>
<?
}
?>
