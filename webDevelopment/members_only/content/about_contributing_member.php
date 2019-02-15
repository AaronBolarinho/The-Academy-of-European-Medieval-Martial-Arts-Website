<?php
ini_set('display_errors', 'On');
// 	Program: 	about_contributing_member.php
//	Description: 	a page soliciting ongoing contributions in the form of 3/6/12-month subscriptions via paypal, created Dec 07, 2016
//	Author:		David M. Cvet
//
//	2016 ------------------
//
$lang = "en";
$modal = 0;					// no need for modal popups as there are no database operations (update/insert) in this script
$lang_num = 0;
$members_only_path = "../";			// the location of the members only scripts and files with respect to this calling script
$dbase_path = $path = "../database/";		// the location of the database scripts and files with respect to this calling script
$current_pgm = "about_fees.php";
$menu_selected = "AEMMA";

$ss_path = $dbase_path."ss_path.stuff"; include "$ss_path";
$db_path = $dbase_path."DB.php"; include "$db_path";
session_start();
// begin check if the browser is still in session with DBLogin
$check_session = $members_only_path."php-bin/sub_check_session_expiration.php"; include "$check_session";
// end check if the browser is still in session
$retrieve = $members_only_path."php-bin/retrieve_cookies.php"; include "$retrieve";

$config = $members_only_path."config/config.php"; include "$config";
$config_about = $members_only_path."config/content_about_contributing_member_$lang.php"; include "$config_about";
$header = $members_only_path."php-bin/members_only_header.php"; include "$header";
$header2 = $members_only_path."php-bin/members_only_header2.php"; include "$header2";


?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$title[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$paypal_p1[$lang_num]?></p>
		<p><?=$paypal_p2[$lang_num]?></p>

		<table class="paypal_methods box" cellpadding="6" align="center">
		<tr class="chalkbar">
			<td><div align="center"><b>PayPal Method</b></div></td>
			<td><b>PayPal Options</b></td>
		</tr>
		<tr>
			<td align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="1927231">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="" class="fade" title="Contributing Member AEMMA: $20.00 CAD for each month, recurring 12 months only" />
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" alt="" />
			</form>
			</td>
			<td align="left">Contributing Member AEMMA: $20.00 CAD for each month<br /><b>(recurring - 12 months only)</b></td>
		</tr>
		<tr class='graybar'>
			<td align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="1929153">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="" class="fade" title="Contributing Member AEMMA: $20.00 CAD for each month, recurring 6 months only"/>
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" alt="" />
			</form>
			</td>
			<td align="left">Contributing Member AEMMA: $20.00 CAD for each month<br /><b>(recurring - 6 months only)</b></td>
		</tr>
		<tr>
			<td align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="1929371">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="" class="fade" title="Contributing Member AEMMA: $20.00 CAD for each month, recurring 3 months only"/>
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" alt="" />
			</form>
			</td>
			<td align="left">Contributing Member AEMMA: $20.00 CAD for each month<br /><b>(recurring - 3 months only)</b></td>
		</tr>
		</table><br />&nbsp;

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
