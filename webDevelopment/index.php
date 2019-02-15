<?php
// index.php == created: March 09, 2016
// author: David M. Cvet
// Description: the splash page for the AEMMA website
//---------------------------
// Updates:
//	2017 ----------
//
$title="AEMMA";
// these are javascripts necessary for scaling image maps for responsive design, and for highlighting those areas on the image maps (optional)
// these are most relevant in the Canadian Dictionary 
$jquery_min = "jquery.min_v1.10.2.js";
$jquery_maphilight = "jquery.maphilight.js";
$ios_orientation = "ios-orientationchange-fix.min.js";
$rwdImageMaps = "jquery.rwdImageMaps.min.v1.5.js";
// end image maps javascript variables
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <meta name="keywords" content="medieval swordsmanship, HEMA, medieval swordsmanship, broad blade sword, sword, sword, rapier, sword fighting, full contact, sword fighting, full contact, AEMMA, A.E.M.M.A., armour, armor, combat, sparring,  Talhoffer, Hans Talhoffer, fechtbuch, DiGrassi, Giacomo DiGrassi, defense, full contact, spada, arte of defense, claymore, swordmaster, swordplay, swordmanship, swordsmanship, sword, Toronto, Talhoffer, Hans Talhoffer, fechtbuch, sword master, medieval, martial arts, George Silver, Silver, Vincentio Saviolo, Saviolo, Fiore de Liberi, de Liberi, Talhoffer, Hans Talhoffer, fechtbuch, HEMA, Hutton, Charles Studer, Studer, Jakob Sutor, Sutor, Camillo Agrippa, Agrippa, Vincentio Saviolo, Saviolo, Alfred Hutton, Hutton, I.33, dusak, buckler, degen, spada, longsword, swordplay, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordsmanship, swordplay, swordsmanship, Marrozo, sabre, Knftliches Fechtbuch, Knftliches, medieval swordsmanship, langen schwerdt, schwerdt, rapier, dagger, Das Solothurner Fechtbuch, Solothurner, spadone, spear, pollaxe, ringen, shield, schlager, spadroon, pallas armas, halb schwert, broadsword, fechtbuch, au plesaunce, ootrance, appellant, defendant, reihenfolgen, folgen, scholler, free scholler, provost, maister, maestro, Hounskull Basinet, Heaume, Klappvisier, Sallet, Bevor, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, live steel, Longbow, long ,bow, archery, archerie, arc, archers, warbow, toxophilite, crecy, poitiers, flight, clout, roving, target, bearing, arrowheads, archery, archers" />
  <meta name="description" content="The mission of AEMMA is to resurrect the combat skills, philosophies and principles of an accomplished European Medieval martial artist and to achieve a state of which would be consistent with that of a 14th century warrior in both technology and ideal." />
  <title><?=$title?></title>
  <link href="<?=$path?>images/shield.ico" rel="shortcut icon" />
<?php
include "php-bin/image_map_highlights.php";
?>
</head>
<body style="background-image:url('images/background_velum.jpg');margin:0 0;">
<img src="images/aemma_cover_new2a.jpg" usemap="#splashpage_map" id="splashpage_map_element" style="width:100%;" />

<map name="splashpage_map" id="splashpage_map_element" class="map">
<!-- #$-:Image map file created by GIMP Image Map plug-in -->
<!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
<!-- #$-:Please do not edit lines starting with "#$" -->
<!-- #$VERSION:2.3 -->
<!-- #$AUTHOR:David M. Cvet -->
<area shape="circle" coords="654,449,174" href="main.php" title="click to peruse the AEMMA website"  onmouseover="if(document.images) document.getElementById('splashpage_map_element').src='images/aemma_cover_new2b.jpg';" onmouseout="if(document.images) document.getElementById('splashpage_map_element').src='images/aemma_cover_new2a.jpg';"/>
</map>
<!--<img src="images/aemma_cover_new2.jpg" alt="" width="100%" height="100%" />-->
<!-- end == this is the end of the main body of the page for content -->
</body></html>
