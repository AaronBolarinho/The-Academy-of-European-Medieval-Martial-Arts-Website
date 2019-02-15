<?php
// begin test for browser and desktop/smartphone/tablet device - then call up the relevant code designed for that platform
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
// detect browser type
$browser = "";
$found = 0;
// Chromium
$chrome = strpos($ua, 'chromium') ? true : false;        // Open Source Chromium
if ($chrome)
	{ $browser = "chromium"; $found = 1; }
// Chrome
$chrome = strpos($ua, 'chrome') ? true : false;        	// Google Chrome
if ($chrome && !$found)
	{ $browser = "chrome"; }
// Firefox
$firefox = strpos($ua, 'firefox') ? true : false;    	// All Firefox
if ($firefox && !$found)
	{ $browser = "firefox"; }
// Internet Exlporer
$msie = strpos($ua, 'msie') ? true : false;        	// All Internet Explorer
if ($msie && !$found)
	{ $browser = "msie"; }
// Opera
$opera = preg_match("/\bopera\b/i", $ua);              	// All Opera
if ($opera && !$found)
	{ $browser = "opera"; }
// Safari
$safari = strpos($ua, 'safari') ? true : false;        	// All Safari
if ($safari && !$found)
	{ $browser = "safari"; }

$tablet_browser = 0;
$mobile_browser = 0;
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', $ua)) 
	{ $tablet_browser++; }
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', $ua)) 
	{ $mobile_browser++; }
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) 
	{ $mobile_browser++; }
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) 
	{ $mobile_browser++; }
if (strpos($ua,'opera mini') > 0) 
	{
	$mobile_browser++;
	//Check for tablets on opera mini alternative headers
	$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
	if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) 
		{ $tablet_browser++; }
	}
?>
