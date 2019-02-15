<?php
//
// Program: glossary.php
// Author: David M. Cvet
// Created: Jan 08, 2019
// Description: a listing of many relevant and medieval terms
//---------------------------
// Updates:
//	2019 ------------------
//	jan 25:	standardized path names
//

$lang = "en";
$lang_num = 0;
$path_members 	= "../";						// the location of the members only scripts and files with respect to this calling script
$path_dbase 	= $path_members."database/";	// the location of the database scripts and files with respect to this calling script
$path_root		= "../../";						// the root location of the directories
$ss_path = $path_dbase."ss_path.stuff"; include "$ss_path";
$db_path = $path_dbase."DB.php"; include "$db_path";
session_start();
//$idvalid = $path_dbase."IDValid.php"; include_once "$idvalid";
$title[0] = $title[1] = "AEMMA: Glossary of Terms";
$retrieve = $path_members."php-bin/retrieve_cookies.php"; include "$retrieve";
$current_pgm = "glossary.php";
$menu_selected = "resources";
$config = $path_members."config/config.php"; include "$config";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main content -->
	<div id="main_content_AIMS">
	<!-- begin page header -->
	<h3><img src="../images/icons/dictionary.png" alt="" style="vertical-align:middle;width:40px;" />&nbsp;Resources: Glossary of Terms</h3>
<!-- end page header -->

<!-- page top header -->
<blockquote>
<table><tr><td><img src="../images/logos/logo_aemma_120.gif" alt="" /></td>
<td align="left">A glossary of many terms pertaining to medieval martial arts, tournaments and heraldry, some of arms and armour, while others related to heraldry. Some terms extracted from:<ul><li>Craig Turner and Tony Soper. <i>Methods and Practice of Elizabethan Swordplay</i>. Southern Illinois University Press, 1990</li><li>David Edge &amp; John Miles Paddock. <i>Arms &amp; Armor of the Medieval Knight, An Illustrated History of Weaponary in the Middle Ages</i>. Crescent Books, 1996</li><li><i>Boutell's Heraldry, Revised by J.P.Brooke-Little, Richmond Herald of Arms</i>. Frederick Warne & Co. Ltd., 1973</li></ul></td></tr></table>

<div style="float:left;width:100%;text-align:center;margin-bottom:15px;"><a href="#A" class="linksred">A</a> | <a href="#B" class="linksred">B</a> | <a href="#C" class="linksred">C</a> | <a href="#D" class="linksred">D</a> | <a href="#E" class="linksred">E</a> | <a href="#F" class="linksred">F</a> | <a href="#G" class="linksred">G</a> | <a href="#H" class="linksred">H</a> | <a href="#I" class="linksred">I</a> | <a href="#J" class="linksred">J</a> | <a href="#K" class="linksred">K</a> | <a href="#L" class="linksred">L</a> | <a href="#M" class="linksred">M</a> | <a href="#N" class="linksred">N</a> | <a href="#O" class="linksred">O</a> | <a href="#P" class="linksred">P</a> | <a href="#Q" class="linksred">Q</a> | <a href="#R" class="linksred">R</a> | <a href="#S" class="linksred">S</a> | <a href="#T" class="linksred">T</a> | <a href="#U" class="linksred">U</a> | <a href="#V" class="linksred">V</a> | <a href="#W" class="linksred">W</a> | <a href="#X" class="linksred">X</a> | <a href="#Y" class="linksred">Y</a> | <a href="#Z" class="linksred">Z</a></div>
<table align="center" style="border-collapse:collapse;background-color:white;" bordercolor="#666666" cellpadding="3"  width="100%" border="1" class="box">
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="A"></a>- A -</td>
</tr>
<tr>
	<td align="left"><b>&agrave; plaisance</b></td>
	<td align="left"><a name="plaisance"></a>combat fought primarily for the entertainment purposes which may employ specially modified weapons with shart edges and point removed or blunted - in some cases, modified armour was worn especially adapted for the needs of this particular style of hastlitude</td>
</tr>
<tr>
	<td align="left"><b>&agrave; outrance</b></td>
	<td align="left"><a name="outrance"></a>combat fought under war conditions, that is, using normal weapons of war and wearing the normal armour of warfare</td>
</tr>
<tr>
	<td align="left"><b>abrazare</b></td>
	<td align="left"><a name="abrazare"></a>a style of Italian (Friulian) <a href="mo_trng_grappling.php" class="linksred">grappling</a> as defined and documented by Fiore dei Liberi</td>
</tr>
<tr>
	<td align="left"><b>accoutrements</b></td>
	<td align="left"><a name="accoutrements"></a>dress; trappings; equipment; specifically, the devices and equipments worn by combatants</td>
</tr>
<tr>
	<td align="left"><b>ailette</b></td>
	<td align="left"><a name="ailette"></a>a flat plate of leather or partchment (square, round or diamond-shaped) which tied to the point of the shoulder worn between 1250-1350 used to display the owner's coat-of-arms</td>
</tr>
<tr>
	<td align="left"><a name="aketon"></a><b>aketon</b></td>
	<td>a padded and quilted garment, usually of linen, worn under or instead of plate or mail - similar to a gambeson</td>
</tr>
<tr>
	<td align="left"><b>appellant</b></td>
	<td align="left"><a name="appellant"></a>defines the challengers or <a href="#venans">venans</a> participating in the <a href="#pasdarmes"><i>pas d'armes</i></a> (the "visiting team") - the term "appellant" is referenced <a href="http://www.princeton.edu/~ezb/rene/renehome.html" class="linksred" target="_blank"><i>Traict&eacute; de la Forme et Devis d'ung Tournois</i></a> and Thomas, Duke of Gloucester, Constable under Richard II <a href="duels.html" class="linksred">On the Manner of Conducting Judicial Duels</a></td>
</tr>
<tr>
	<td align="left"><b>armigerous</b></td>
	<td align="left"><a name="armigerous"></a>a person who has been awarded or granted the right to bear arms (armorial bearings)</td>
</tr>
<tr>
	<td align="left"><b>arming points</b></td>
	<td align="left"><a name="arming points"></a>ties of flax or twine by which the armour was secured in place</td>
</tr>
<tr>
	<td align="left"><b>armizare</b></td>
	<td align="left"><a name="armazire"></a>a short form of <a href="mo_arte_armizare.php" class="linksred"><i>l'arte dell'armizare</i></a> loosely translated as "the art of arms" is a system of martial arts defined in the original treatise authored by Fiore dei Liberi entitled "<i>Flos Duellatorum</i>"</td>
</tr>
<tr>
	<td align="left"><b>armour nomenclature</b></td>
	<td align="left"><a name="armour"></a>a comprehensive listing of armour terms accompanied with an illustration can be viewed by clicking <a href="equipment_body.htm#nomenclature" class="linksred"><b>here</b></a></td>
</tr>
<tr>
	<td align="left"><b>armorial bearings</b></td>
	<td align="left"><a name="armorial bearings"></a>all components which constitutes an individual's coat of arms, comprised of shield, mantling, crest comprised of helmet and devices, and motto; depending upon position in government or of noble birth, supporters are included - arms typically refer to the shield only</td>
</tr>
<tr>
	<td align="left"><b>aventail</b></td>
	<td align="left"><a name="aventail"></a>a curtain of mail attached by means of staples (vervelles) around the base of a helmet (usually a basinet), and covering the shoulders. Also called <i>camail</i> (French)</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="B"></a>- B -</td>
</tr>
<tr>
	<td align="left"><b>banner</b></td>
	<td align="left"><a name="banner"></a>a heraldic banner, also called a "banner of arms", displays the basic coat of arms only, i.e. it contains the design usually displayed on the shield and omits the crest, helmet or coronet, mantling, supporters, motto or any other elements associated with the coat of arms - a heraldic banner is usually square or rectangular - click <a href="http://www.heraldry.ca/armoury/members_arms/c/cvet.jpg" class="linksred" target="_blank"><b>here</b></a> to view an example of a banner and standard</td>
</tr>
<tr>
	<td align="left"><b>banneret</b></td>
	<td align="left"><a name="banneret"></a>short for knight banneret, was a knight (not necessarily a nobleman) who led a company of troops during time of war under his own banner (which was square-shaped, in contrast to the tapering standard or the pennon flown by the lower-ranking knights) and were eligible to bear supporters in English heraldry</td>
</tr>
<tr>
	<td align="left"><b>barding</b></td>
	<td align="left"><a name="barding"></a>also spelled <i>bard</i> or <i>barb</i> is the armour for horses</td>
</tr>
<tr>
	<td align="left"><b>bascinet or basinet</b></td>
	<td align="left"><a name="bascinet"></a>an open-faced helmet with a globular or conical skull enclosing the sides of the face and neck,  usually worn with an aventail, and occasionaly a visor</td>
</tr>
<!--<tr>
	<td align="left"><a name="battle axe"></a><b>battle axe</b></td>
	<td>&nbsp;</td>
</tr>-->
<tr>
	<td align="left"><b>berfrois</b></td>
	<td align="left"><a name="berfrois"></a>a grandstand, usually a temporary structure made of wood, built alongside the lists to enable spectators to view the hastlitudes, usually reserved for the ladies, but nobles, prominent citizens and visiting dignitaries were also allowed to seat - also known as the <i>escafaut</i> or scaffold</td>
</tr>
<tr>
	<td align="left"><b>bevor</b></td>
	<td align="left"><a name="bevor"></a>a plate chin-shaped defense for the lower face often incorporating a gorget, sometimes called a <i>bavier</i> or <i>buffe</i></td>
</tr>
<!--<tr>
	<td align="left"><a name="bill head"></a><b>bill head</b></td>
	<td>&nbsp;</td>
</tr>-->
<tr>
	<td align="left"><b>bill</b></td>
	<td align="left"><a name="bill"></a>a staff weapon (dating from the 13<sup>th</sup> century) based upon the agricultural hedging bill; its curved blade is fitted with a top and rear spike</td>
</tr>
<!--<tr>
	<td align="left"><a name="black bill"></a><b>black bill</b></td>
	<td>&nbsp;</td>
</tr>-->
<tr>
	<td align="left"><b>blazon</b></td>
	<td align="left"><a name="blazon"></a>the textual description of the design and colours (tinctures) of arms which in the early days of heraldry had given rise to an heraldic language or blazon</td>
</tr>
<tr>
	<td align="left"><b>breastplate</b></td>
	<td align="left"><a name="breastplate"></a>a single plate or segmented plates of armour for the front of the torso, down to just above the waist</td>
</tr>
<tr>
	<td align="left"><b>braies</b></td>
	<td align="left"><a name="braies"></a>an under-garment, similar in style to boxer shorts of today, worn with chausses or split-hose</td>
</tr>
<tr>
	<td align="left"><b>bohort</b></td>
	<td align="left"><a name="bohort"></a>(behordicum, buhurdicium, boherd) - generally spontaneous amusements of the young not formally arranged and organized employing only blunted weapons, some German sources describing bohorts with no weapons at all - Knights Templars were unable to tourney because of papal ban but their Rule permitted them to participate in bohorts</td>
</tr>
<tr>
	<td align="left"><b>buckler</b></td>
	<td align="left"><a name="buckler"></a>a small round shield usually carried by the infantry</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="C"></a>- C -</td>
</tr>
<tr>
	<td align="left"><b>caparison</b></td>
	<td align="left"><a name="caparison"></a>is a large cloth, often decorated in the colours of the rider (coat of arms) worn for tournaments and parades</td>
</tr>
<tr>
	<td align="left"><b>chausses</b></td>
	<td align="left"><a name="chausses"></a>mail protection for the legs, either in the form of mail hose or strips of mail laced round the front of the leg</td>
</tr>
<tr>
	<td align="left"><b>coif</b></td>
	<td align="left"><a name="coif"></a>a hood, often padded and sometimes made of mail</td>
</tr>
<tr>
	<td align="left"><b>cotehardie</b></td>
	<td align="left"><a name="cotehardie"></a>a snug fitting, long jacket typified by numerous buttons along the front and sleeves from the wrist to mid fore-arm</td>
</tr>
<tr>
	<td align="left"><b>couter</b></td>
	<td align="left"><a name="couter"></a>a plate defence for the elbow, also known as a spelt cowter</td>
</tr>
<tr>
	<td align="left"><b>cuff</b></td>
	<td align="left"><a name="cuff"></a>an extension of the gauntlet for defending the wrist, contributing to the classic "hour-glass" shape of the gauntlets</td>
</tr>
<tr>
	<td align="left"><b>cuir bouilli</b></td>
	<td align="left"><a name="cuir"></a>leather hardened by super saturating in water or boiled in molten wax, and then dried over a former ("medieval plastic")</td>
</tr>
<tr>
	<td align="left"><b>cuisse</b></td>
	<td align="left"><a name="cuisse"></a>plate defense for the upper thighs</td>
</tr>
<tr>
	<td align="left"><b>cuirass</b></td>
	<td align="left"><a name="cuirass"></a>a backplate and breastplate designed to be worn together</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="D"></a>- D -</td>
</tr>
<tr>
	<td align="left"><b>defendant</b></td>
	<td align="left"><a name="defendant"></a>defines the defenders or <a href="#tenans">tenans</a> participating in a <a href="#pasdarmes"><i>pas d'armes</i></a> (the "home team") - the term "defendants" is referenced in <a href="http://www.princeton.edu/~ezb/rene/renehome.html" class="linksred" target="_blank"><i>Traict&eacute; de la Forme et Devis d'ung Tournois</i></a> and Thomas, Duke of Gloucester, Constable under Richard II <a href="duels.html" class="linksred">On the Manner of Conducting Judicial Duels</b></a></td>
</tr>
<tr>
	<td align="left"><b>demi-greave</b></td>
	<td align="left"><a name="demi-greave"></a>a small defense plate transitioning the poleyn articulations to a greave on the lower leg</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="E"></a>- E -</td>
</tr>
<tr>
	<td align="left"><b>emblazon</b></td>
	<td align="left"><a name="emblazon"></a>the visualizing or drawing or painting of arms from a <a href="#blazon" class="linksred">blazon</a></td>
</tr>
<tr>
	<td align="left"><b>emprise</b></td>
	<td align="left"><a name="emprise"></a>a challenge of a mock batter or war, in which the parties, typically, the English and the French would meet at a designated place to fight for the honor of their king and kingdom.</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="F"></a>- F -</td>
</tr>
<tr>
	<td align="left"><b>falchion</b></td>
	<td align="left"><a name="falchions"></a>a short, single-edged sword with a cleaver-like curved blade, popular from the 13th century onwards and used with all classes of soldiers</td>
</tr>
<tr>
	<td align="left"><b>fauld of four lames</b></td>
	<td align="left"><a name="fauld"></a>armour plate strips composed of horizontal lames attached to the bottom edge of the breastplate to protect the abdomen</td>
</tr>
<tr>
	<td align="left"><b>foible</b></td>
	<td align="left"><a name="foible"></a>the part of the blade nearest to the point</td>
</tr>
<tr>
	<td align="left"><b>forte</b></td>
	<td align="left"><a name="forte"></a>the strongest part of the blade, nearest the hilt</td>
</tr>
<tr>
	<td align="left"><b>fuller</b></td>
	<td align="left"><a name="fuller"></a>a groove down the centre of the blade on both sides of varying lengths on different swords for the purpose of lightening the weight of the sword and to increase its strength - sharing similar strength properties with an "I-beam" structure</td>
</tr>
<!--<tr>
	<td align="left"><a name="forest bills"></a><b>forest bills</b></td>
	<td>&nbsp;</td>
</tr>-->
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="G"></a>- G -</td>
</tr>
<tr>
	<td align="left"><b>gardbrace</b></td>
	<td align="left"><a name="gardbrace"></a>a reinforcing plate closely shaped to the pauldron, first appearing in the 15th century on Italian armours. It often covered the lower 3/4's of the front of the pauldron and was attached to it by a staple and pin as indicated in the figure</td>
</tr>
<tr>
	<td align="left"><b>gambeson</b></td>
	<td align="left"><a name="gambeson"></a>a quilted, skirted doublet of cloth, often made of linen, stuffed with tow, wood, grass or horse hair, usually worn under a mail shirt or as a separate defensive garment on its own</td>
</tr>
<tr>
	<td align="left"><b>gatlings or gadlings</b></td>
	<td align="left"><a name="gatlings"></a>protruding studs or bosses (sometimes zoomorphic) on the finger and knuckle joints of a gauntlet</td>
</tr>
<tr>
	<td align="left"><b>gauntlets</b></td>
	<td align="left"><a name="gauntlets"></a>defense of articulated plates for the hand in the form of a glove.  Gauntlets can also be in the form of a mit or initially of mail</td>
</tr>
<tr>
	<td align="left"><b>glaive</b></td>
	<td align="left"><a name="glaive"></a>an infantry staff weapon with first appeared in the 14th century and was favoured by the French.&nbsp; It had a long cleaver-like blade shaped like an enlarged bread-knife, sometimes with a false upper edge and which is usually attached to the shaft by langets.</td>
</tr>
<tr>
	<td align="left"><b>gorget</b></td>
	<td align="left"><a name="gorget"></a>or collar plate defense for the neck and extending to the top of the chest and shoulders, generally made up of 2 parts joined by a hinge, pivoting rivet or leather straps</td>
</tr>
<tr>
	<td align="left"><b>greave</b></td>
	<td align="left"><a name="greave"></a>also known as "schynbald" or "jamber". Plate defense for the leg from the knee to the ankle, initially protecting only the front in the early 14th century and later covering the entire leg. It is constructed of two contoured plates, fitted with hinges and closed with either pins or straps</td>
</tr>
<tr>
	<td align="left"><b>guard of vambrace</b></td>
	<td align="left"><a name="guard of vambrace"></a>an exaggerated defence for the right elbow and vambrace armour for the lower arm</td>
</tr>
<tr>
	<td align="left"><a name="guige"></a><b>guige</b></td>
	<td>a strap attached to the inside of a shield by which it could be slung around the neck of the bearer</td>
</tr>
<tr>
	<td align="left"><b>gussets of mail</b></td>
	<td align="left"><a name="gussets"></a>shaped pieces of mail which were sewn to the arming doublet to cover the armpits and portions of the arm left exposed by plate defenses</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="H"></a>- H -</td>
</tr>
<tr>
	<td align="left"><b>halberd</b></td>
	<td align="left"><a name="halberd"></a>an infrantry staff weapon especially popular with the Swiss.&nbsp; Its head consisted of a cleaver-like axe blade balanced at the rear by a fluke (hook) or lug, and surmounted by a spike, usually of quadrangular section.</td>
</tr>
<!--<tr>
	<td align="left"><a name="hangers"></a><b>hangers</b></td>
	<td>&nbsp;</td>
</tr>-->
<tr>
	<td align="left"><b>hastlitude</b></td>
	<td align="left"><a name="hastlitude"></a>literally a "spear game" referring to any chivalric sport involving the use of the lance - often used as a generic term for tourneying</td>
</tr>
<tr>
	<td align="left"><b>haubergeon or habergeon</b></td>
	<td align="left"><a name="haubergeon"></a>a short type of <a href="#hauberk" class="linksred">hauberk</a> - the terms used indiscriminately</td>
</tr>
<tr>
	<td align="left"><b>hauberk</b></td>
	<td align="left"><a name="hauberk"></a>a mail shirt reaching to between the knee and hip, and invariably with sleeves</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="I"></a>- I -</td>
</tr>
<tr>
	<td align="left"><b>imbroccata</b></td>
	<td align="left"><a name="IMBROCCATA"></a>a thrust with the hand pronated (knuckles forward, palm outward) passing over the opponent's hand and downward; also <b>foin</b></td>
</tr>
<tr>
	<td align="left"><b>inquartata</b></td>
	<td align="left"><a name="INQUARTATA"></a>a sideways or backwards step with the rear foot together with a lowering of the body underneath the incoming blade, dropping the left hand to the ground for support, followed by a counterattack with line; also <b>passata sotto</b>.</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="J"></a>- J -</td>
</tr>
<tr>
	<td align="left"><b>javelin</b></td>
	<td align="left"><a name="javelin"></a>a spear designed to be thrown rather than used as a thrusting weapon</td>
</tr>
<tr>
	<td align="left"><b>joust</b></td>
	<td align="left"><a name="joust"></a>single combat on horseback using lances</td>
</tr>
<tr>
	<td align="left"><b>jupon</b></td>
	<td align="left"><a name="jupon"></a>a tight-fitting garment, usually padded and worn over armour from c1350 - 1410, often used to display the wearer's arms</td>
</tr>
<!--
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="K"></a>- K -</td>
</tr>
-->
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="L"></a>- L -</td>
</tr>
<tr>
	<td align="left"><a name="lames"></a><b>lames</b></td>
	<td>a narrow strip or plate of steel, sometimes used in armour to provide enhanced articulation of the joints</td>
</tr>
<tr>
	<td align="left"><b>lance rest</b></td>
	<td align="left"><a name="lance rest"></a>a support structure for the lance when couched, bolted to the right side of the breastplate and was occasionally hinged</td>
</tr>
<tr>
	<td align="left"><b>lists</b></td>
	<td align="left"><a name="lists"></a>the designated area for combat usually associated with jousts, bounded by ditches, fences, barriers or landmarks</td>
</tr>
<tr>
	<td align="left"><b>livery</b></td>
	<td align="left"><a name="livery"></a>distinctive clothing, either of distinctive colors of fabric, or distinguished by badges, or both representing the arms of the lord, worn by the lord's retinue during medieval tournaments</td>
</tr>
<tr>
	<td align="left"><b>lower canon</b></td>
	<td align="left"><a name="lower canon"></a>individual plate armour, tubular in form to protect the lower arm</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="M"></a>- M -</td>
</tr>
<tr>
	<td align="left"><b>mandritta</b></td>
	<td align="left"><a name="MANDRITTA"></a>a horizontal cut delivered with the palm upward and the knuckles leading, from right to left</td>
</tr>
<tr>
	<td align="left"><b>m&ecirc;l&eacute;e</b></td>
	<td align="left"><a name="mele"></a>first appearing in north-eastern France in the late 11<sup>th</sup> century growing out of fashion and disappeared in the mid 14<sup>th</sup> century, involved most if not all participants of a tournament ( sometimes numbering in the hundreds ) fighting at the height of a tournament either on horseback or on foot with weapons ranging from lance to mace to sword</td>
</tr>
<tr>
	<td align="left"><b>montanta</b></td>
	<td align="left"><a name="montanta"></a>a sword movement, in which the blade comes from "below" and attempts to cut the opponent from below.</td>
</tr>
<!--<tr>
	<td align="left"><a name="morris pike"></a><b>morris pike</b></td>
	<td>&nbsp;</td>
</tr>-->
<!--<tr>
	<td align="left"><a name="partisan"></a><b>partisan</b></td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td align="left"><a name="passata"></a><b>passata</b></td>
	<td>&nbsp;</td>
</tr>-->
<!--
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="N"></a>- N -</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="O"></a>- O -</td>
</tr>
-->
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="P"></a>- P -</td>
</tr>
<tr>
	<td align="left"><b>pas d'armes</b></td>
	<td align="left"><a name="pasdarmes"></a>an elaborate form of <a href="#hastlitude">hastlitude</a> evolved in the late 14<sup>th</sup> and remained popular through the 15<sup>th</sup> centuries which typically involved a group of knights (<a href="#tenans">tenans</a> or <a href="#defendants">defendants</a>) or the "home team" and then who would let it be known that any other knight who wished to pass (<a href="#venans">venans</a> or <a href="#appellants">appellants</a>) or the "visiting team" to take up the challenges</td>
</tr>
<tr>
	<td align="left"><b>pauldron</b></td>
	<td align="left"><a name="pauldron"></a>a laminated plate defense for the shoulder extending at the front and rear to protect the armpit</td>
</tr>
<tr>
	<td align="left"><b>pike</b></td>
	<td align="left"><a name="pike"></a>long spear with a small steel head, carried by infrantrymen. Metal strips (cheeks) were riveted down the shaft from the point, to reinforce it. Pikes were used by the Flemings, Scots and Swiss, becoming as long as 22 feet (6.7m).</td>
</tr>
<tr>
	<td align="left"><b>plackart</b></td>
	<td align="left"><a name="plackart"></a>a reinforcement plate attached to the breastplate; it covered the lower half of the breastplate, however, Italian armour typically covered the entire breastplate</td>
</tr>
<tr>
	<td align="left"><b>poleyn</td>
	<td align="left"><a name="poleyn"></a>a cup-shaped plate defense for the knee, usually includes a side wing-like extension on the outside of the knee for additional protection</td>
</tr>
<tr>
	<td align="left"><b>pommel</b></td>
	<td align="left"><a name="pommel"></a>a variously shaped counterweight to the sword blade, attached to the end of the sword tang</td>
</tr>
<tr>
	<td align="left"><b>poniard</b></td>
	<td align="left"><a name="poniard"></a>is a form of dagger with a slim square or triangular blade; the poniard is almost identical to the dirk</td>
</tr>
<tr>
	<td align="left"><b>pourpoint</b></td>
	<td align="left"><a name="pourpoint"></a>a garment similar to that of a short sleeveless cotehardie whose development coincided with the adoption of plate leg harness and which were suspended by the pourpoint, thus distributing the load over the entire chest & abdomen of the wearer</td>
</tr>
<tr>
	<td align="left"><b>punta riversa</b></td>
	<td align="left"><a name="punta_riversa"></a>a thrust with the hand in supination (knuckles down, palm inward), delivered from the inside line, passing on either side of the opponent's ward, usually delivered on a step</td>
</tr>
<tr>
	<td align="left"><a name="pursuivant"></a><b>pursuivant</b></td>
	<td>a pursuivant, or more correctly a pursuivant of arms, is a junior officer of arms. Most pursuivants are attached to official heraldic authorities, such as the College of Arms in London or the Court of the Lord Lyon in Edinburgh.</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="Q"></a>- Q -</td>
</tr>
<tr>
	<td align="left"><b>quillons</b></td>
	<td align="left"><a name="quillons"></a>the arms of the crossbar on a sword guard</td>
</tr>
<tr>
	<td align="left"><a name="quintain"></a><b>quintain</b></td>
	<td>a target attached to a pole which was used in lance practice in preparation for the jousts</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="R"></a>- R -</td>
</tr>
<tr>
	<td align="left"><b>rapier</b></td>
	<td align="left"><a name="rapier"></a>a form of light, long-bladed sword, often with a complicated guard of thin betal bars, developed in the 16th century for the type of "fencing" reliant largely upon the point rather than the edge, although early forms were used for both cut and thrust.</td>
</tr>
<tr>
	<td align="left"><b>rebated</b></td>
	<td align="left"><a name="rebated"></a>weapons with their sharp edges removed or blunted</td>
</tr>
<tr>
	<td align="left"><b>rerebrace</b></td>
	<td align="left"><a name="rerebrace"></a>plate armour for the upper arm</td>
</tr>
<tr>
	<td align="left"><b>riversi</b></td>
	<td align="left"><a name="RIVERSI"></a>a horizontal cut delivered with the palm downward and the knuckles leading, from left to right</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="S"></a>- S -</td>
</tr>
<tr>
	<td align="left"><b>sabaton or solaret</b></td>
	<td align="left"><a name="solaret"></a>either laminated plate defense or mail defense for the foot, ending in a toe cap</td>
</tr>
<tr>
	<td align="left"><b>short staff or half pike</b></td>
	<td align="left"><a name="pike"></a>the half-pike is a short version of a regular medieval pike</td>
</tr>
<tr>
	<td align="left"><b>standard</b></td>
	<td align="left"><a name="standard"></a>an heraldic standard is a type of flag, containing heraldic devices and is used for personal identification - unlike the heraldic <a href="#banner" class="linksred">banner</a>, which is simply the shield of the coat of arms on a rectangular flag, the design and use of the standard is more regulated - a standard is not rectangular - it tapers, usually from 120 cm down to 60 cm and the fly edge is rounded (lanceolate) - click <a href="http://www.heraldry.ca/armoury/members_arms/c/cvet.jpg" class="linksred" target="_blank"><b>here</b></a> to view an example of a banner and standard</td>
</tr>
<!--<tr>
	<td align="left"><a name="skaines"></a><b>skaines</b></td>
	<td>&nbsp;</td>
</tr>-->
<tr>
	<td align="left"><b>spaudler</b></td>
	<td align="left"><a name="spaudler"></a>a light laminated defence protecting the point of the shoulder and top of the arm</td>
</tr>
<tr>
	<td align="left"><b>stoccata</b></td>
	<td align="left"><a name="STOCCATA"></a>a thrust with the hand supinated (knuckles down, palm inward) rising from underneath the opponent's ward; also <b>thrust</b></td>
</tr>
<tr>
	<td align="left"><b>stop rib</b></td>
	<td align="left"><a name="stop rib"></a>a small metal bar riveted to plate armour to stop the point of a weapon sliding into a joint or opening</td>
</tr>
<tr>
	<td align="left"><b>stramazone</b></td>
	<td align="left"><a name="STRAMAZONE"></a>a vertical cut to the head, palm to the left</td>
</tr>
<tr>
	<td align="left"><b>surcoat</b></td>
	<td align="left"><a name="surcoat"></a>a flowing garment worn over armour from the 12<sup>th</sup>, sometimes sleeveless or sleeved, usually reaching about mid-calf, later it was shortened and in the 14<sup>th</sup> century developed into the "<a href="#jupon" class="linksred">jupon</a>"</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="T"></a>- T -</td>
</tr>
<tr>
	<td align="left"><b>tabard</b></td>
	<td align="left"><a name="tabard"></a>a short, open-sided garment with short sleeves used to display the wearer's coat of arms, often worn by heralds</td>
</tr>
<tr>
	<td align="left"><b>tasset</b></td>
	<td align="left"><a name="tasset"></a>a small metal bar riveted to plate armour to stop the point of a weapon sliding into a joint or opening</td>
</tr>
<tr>
	<td align="left"><b>tenans</b></td>
	<td align="left"><a name="tenans"></a>a group of knights or <a href="#defendant">defendants</a> who issues a challenge to fight hastlitudes or a <a href="#pasdarmes"><i>pas d'armes</i></a> and then holds the field against all comers</td>
</tr>
<!--
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="U"></a>- U -</td>
</tr>
-->
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="V"></a>- V -</td>
</tr>
<tr>
	<td align="left"><b>vambrace</b></td>
	<td align="left"><a name="vambrace"></a>a defence for the top of the thigh, hung from the fauld by leather straps to cover the gap between the cuisses and breastplatel; this form of armour first appeared in the 15th century</td>
</tr>
<tr>
	<td align="left"><b>venans</b></td>
	<td align="left"><a name="venans"></a>tourneyers or jousters, sometimes referred to as <a href="#appellant">appellants</a>, who comes to attend hastlitudes or <i>pas d'armes</i> in answer to a challenge, and sometimes in costumes or "incognito"</td>
</tr>
<tr>
	<td align="left"><b>vervelles</b></td>
	<td align="left"><a name="vervelles"></a>staples attached to the base of a basinet for securing the aventail</td>
</tr>
<tr>
	<td align="left"><b>visor</b></td>
	<td align="left"><a name="visor"></a>protection for the eyes and face; a plate defence pivoted to the helmet</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="W"></a>- W -</td>
</tr>
<tr>
	<td align="left"><b>ward</b></td>
	<td align="left"><a name="ward"></a>to act on the defensive with a weapon; an old English term analogous to "guard"</td>
</tr>
<tr>
	<td align="left"><b>wing</b></td>
	<td align="left"><a name="wing"></a>a wing-like extension of the poleyns, for protecting the outside of the joints</td>
</tr>
<!--
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="X"></a>- X -</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="Y"></a>- Y -</td>
</tr>
<tr>
	<td colspan="2" class="purple_grad" align="center"><a name="Z"></a>- Z -</td>
</tr>
-->
</table></div>
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
