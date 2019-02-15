<?php
ini_set('display_errors', 'On');
// 	Program: 	mo_rnk_maestro.php
//	Description: 	A members only detailed presentation of the rank of maestro, created July 11, 2017
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
$current_pgm = "mo_rnk_maestro.php";
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
$config_about = $path_members."config/content_mo_rnk_maestro_$lang.php"; include "$config_about";
$header = $path_members."php-bin/members_only_header.php"; include "$header";
?>
<script type="text/JavaScript">
// global variables
//
var window_maisterOthe
var window_provostOthe
var testWindow

function schollerTest()
{
if (!testWindow || testWindow.closed)
	{
	// window has not been opened - first invokation
	testWindow = window.open("schollerTest.htm","test","toolbar=no,menubar=no,scrollbars=yes,height=465,width=530")
	}
else
	{
	// window is opened somewhere, bring it into focus
	testWindow.close()
	testWindow = window.open("schollerTest.htm","test","toolbar=no,menubar=no,scrollbars=yes,height=465,width=530")
	}
} // end function schollerTest
function maisterOthe()
{
if (!window_maisterOthe || window_maisterOthe.closed)
	{window_maisterOthe = window.open("maisterOthe.htm","window_maisterOthe","toolbar=no,menubar=no,scrollbars=yes,height=450,width=600")}
else
	{window_maisterOthe.focus()}
} // end function maisterOthe 
function provostOthe()
{
if (!window_provostOthe || window_provostOthe.closed)
	{window_provostOthe = window.open("provostOthe.htm","window_provostOthe","toolbar=no,menubar=no,scrollbars=yes,height=450,width=600")}
else
	{window_provostOthe.focus()}
} // end function provostOthe 
</script>
<?php
$header2 = $path_members."php-bin/members_only_header2.php"; include "$header2";
?>
	<!-- begin main_content -->
	<div id="main_content">
		<h2><?=$banner[$lang_num]?></h2>
		<div class="about_image_arms">
			<div style="float:left;"><img src="../images/coatofarms/armorialBearings_CHA_230.png" alt="" width="100%"  /></div>
		</div>
		<p><?=$rnk_p11[$lang_num]?></p>

		<h4><?=$title_p2[$lang_num]?></h4>
		<ul>
		<li><a name="21"></a><?=$rnk_l21[$lang_num]?></li>
		<li><a name="22"></a><?=$rnk_l22[$lang_num]?></li>
		<li><a name="23"></a><?=$rnk_l23[$lang_num]?></li>
		</ul>

		<hr />
		<h4><?=$title_p3[$lang_num]?></h4>
		<b><?=$title_p31[$lang_num]?></b><br />
		<p><?=$rnk_p31[$lang_num]?></p>

		<b><?=$title_p32[$lang_num]?></b><br />
		<p><?=$rnk_p32[$lang_num]?></p>
		<p><?=$rnk_p33[$lang_num]?></p>
		<p><?=$rnk_p34[$lang_num]?></p>

		<b><?=$title_p33[$lang_num]?></b><br />
		<table cellpadding="3">
		<tr>
			<td><img src="../images/portraits/bio_rmartinez.jpg" border="1"></td>
			<td><a href="http://www.martinez-destreza.com/" target="_blank">Martinez Academy of Arms</a><br>Manhatten, NYC <img src="../images/flags/usFlag.gif" align="middle"><br>USA</td>
			<td><b>Maestro Ramon Martinez</b> <i>BA,</i> began his 29 year study of both classical and historical fencing under the tutelage of the late Ma&icirc;tre d'Armes Frederick Rohdes in New York City. In late 1982, shortly before his death, Ma&icirc;tre Rohdes conferred the rank of Fencing Master on Mr. Martinez. Maestro Martinez is the founder and director of <a href="http://www.martinez-destreza.com" target="_blank">Martinez Academy of Arms</a>.</td>
		</tr>
		<tr bgcolor=#f5f5f5>
			<td><img src="../images/portraits/bio_asinclair.jpg"  border="1"></td>
			<td><a href="http://www.scherma-antica.org/" target="_blank">Federazione Italiana Scherma Antica e Storica</a> (FISAS)<br>Legnano, Italy <img src="../images/flags/itFlag.gif" align="middle"></td>
			<td><b>Maestro Andrea Lupo-Sinclair</b> <i>BA, BA,</i> was born in 1964 in Florence and has been training in traditional fencing for over 17 years. Maestro Lupo-Sinclair is the founder & technical director of <a href="http://www.scherma-antica.org" target="_blank">Federazione Italiana Scherma Antica e Storica</a> (FISAS), the Italian Ancient & Historical Fencing Federation. </td>
		</tr>
		<tr>
			<td><img src="../images/portraits/bio_pmacdonald.jpg" border="1"></td>
			<td><a href="http://www.historicalfencing.org/Macdonaldacademy" target="_blank">The Macdonald Academy of Arms</a><br> Edinburgh, Scotland <img src="../images/flags/scFlag.gif" align="middle"></td>
			<td><b>Maestro Paul Macdonald</b> was born in 1972 in the West Highland village of Glenuig, Moidart, Scotland. He began his study of fencing in the 1992 at Napier University, in Edinburgh. Maestro Macdonald established <a href="http://www.historicalfencing.org/Macdonaldacademy" target="_blank">The Macdonald Academy of Arms</a> in 1998.</td>
		</tr>
		<tr bgcolor=#f5f5f5>
			<td><img src="../images/portraits/bio_jacostaMartinez.jpg" border="1"></td>
			<td><a href="http://www.martinez-destreza.com/" target="_blank">Martinez Academy of Arms</a><br>Manhatten, NYC <img src="../images/flags/usFlag.gif" align="middle"><br>USA</td>
			<td><b>Maestro Jeannette Acosta-Martinez</b> began her training under the tutelage of Ma&icirc;tre dArmes Frederick Rohdes, and after his death in 1983, continued with his protege Maestro Ramon Martinez. In all, she has spent a total of 18 years studying traditional fencing, both classical and historical.</td>
		</tr>
		<tr>
			<td><img src="../images/portraits/bio_dcvet.jpg" border="1" width="80"></td>
			<td><a href="http://www.aemma.org" target="_blank">Academy of European Medieval Martial Arts</a> (AEMMA)<br> Toronto, ON  Canada <img src="../images/flags/caFlag.gif" align="middle"></td>
			<td><b>David M. Cvet</b>, <i>B.Sc</i>, is the Founder and President of the <a href="http://www.aemma.org" target="_blank">Academy of European Medieval Martial Arts</a> (AEMMA). Having studied and practiced historical martial arts for almost 10 years, David received an "Acknowledged Instructor" (AI) designation for armoured longsword instruction in October 15, 2000 by the IMAF.</td>
		</tr>
		<tr>
			<td colspan=3><b><font size=3>The IMAF Secretary:</font></b></td>
		</tr>
		<tr bgcolor=#f5f5f5>
			<td><img src="../images/portraits/bio_bbrooks.jpg" border="1"></td>
			<td><a href="http://www.dawnduellists.org.uk/" target="_blank">The Dawn Duellists Society</a><br>Edinburgh, Scotland <img src="../images/flags/scFlag.gif" align="middle"></td>
			<td><b>Bob Brooks</b> has been heavily involved with the <a href="http://www.dawnduellists.org.uk/" target="_blank">The Dawn Duellists Society</a> since 1994, training with longsword, two-handed sword, spada da lato, early medieval broadsword, singlestick and smallsword.</td>
		</tr>
		</table>

		<br /><b><?=$title_p34[$lang_num]?></b><br /><br />
		<!-- CANADA -->
		<table cellpadding=3>
		<tr bgcolor="#333399">
			<td>&nbsp;<img src="../images/flags/caFlag.gif" style="vertical-align:middle;">&nbsp;<font  color="white"><b>Canada</b></td>
		</tr>
		<tr>
			<td><img src="../images/portraits/bio_dcvet.jpg" border="1" style="float:left;margin-right:8px;"><b>Name: David M. Cvet<br>AI: Acknowledged for Armoured Combat<br>Date: October 15, 2000<br>Location: Toronto, ON Canada</b><br><br><a href="mailto: David M. Cvet <dcvet@aemma.org>?subject=IMAF AI Info Request">David M. Cvet</a>,<i> B.Sc.</i>, born in Welland, ON, Canada in 1955, is the Founder and President of the <a href="http://www.aemma.org" target="_blank">Academy of European Medieval Martial Arts</a> (AEMMA), an organization dedicated to the resurrection and formalization of medieval martial arts training systems. He is also an Instructor working on the development of training curriculums that include armoured and unarmoured training systems. He received training in Milan, Italy employing steel weapons in longsword techniques and has participated in various organizations dedicated to studying the Middle Ages. In addition David has studied some Asian combat arts in his past. His background and experience having fired his desire to pursue a formal medieval martial arts training program, he founded AEMMA in mid-1998. He is a member of the advisory board of the <a href="http://www.aemma.org/misc/ssi.html">Swordplay Symposium International</a> (SSI), an interdisciplinary colloquium of historical fencing specialists dedicated to promoting and advancing the study of Western swordsmanship, and participating board member of the <a href="http://www.ahfi.org" target="_blank">Association for Historical Fencing</a> (AHF)<!-- and a member of the research board of the <a href="http://www.iamcr.com" target="_blank">International Academy for Medieval and Chivalric Research</a>-->.  David received his appointment of <a href="http://www.aemma.org/misc/trng_body.htm#freeScholler" target="_blank">free scholler</a> in October 15, 2000 and the "Acknowledged Instructor" (AI) designation for armoured longsword instruction in October 15, 2000 by the <a href="http://www.scherma-tradizionale.org/">International Masters at Arms Federation</a> (IMAF). David is also engaged with the <a href="http://www.rom.on.ca" target="_blank">Royal Ontario Museum</a> (ROM) in an advisory/consultant capacity for matters related to the medieval history as it pertains to military history, arms and armour.<br><br>Working with representatives of other martial arts disciplines, David had contributed to creation of an online journal entitled the "<a href="http://ejmas.com/" target="_blank">Electronic Journals of Martial Arts and Sciences</a>" (EJMAS), dedicated to promoting scholarship in various martial endeavors. He is the executive editor of the "<a href="http://ejmas.com/jwma/jwmaframe.htm" target="_blank">Journal of Western Martial Art</a>," one of the journals that comprise EJMAS.<br>&nbsp;</td>
		</tr>
		<tr bgcolor=#f5f5f5>
			<td><img src="../images/portraits/bio_bmcilmoyle.jpg" border="1" style="float:left;margin-right:8px;"><b>Name: Brian McIlmoyle<br>AI: Acknowledged for Armoured Combat<br>Date: October 14, 2001<br>Location: Toronto, ON Canada</b><br><br><a href="mailto: bmcilmoyle@aemma.org">Brian McIlmoyle</a>, born in Peterborough, ON, Canada in 1965, is the Vice President and co-Founder of the <a href="http://www.aemma.org" target="_blank">Academy of European Medieval Martial Arts</a> (AEMMA) and who has been studying and practicing Medieval swordsmanship in various forms for 16 years. He is also AEMMA's Principle Instructor and has been deeply involved in the development of the AEMMA training program. His 10 years of Canadian Armed forces experience is leveraged in the disciplined training of students. Current projects include the formalisation of armour, weapon and judging standards for use within Medieval swordsmanship tournaments. Brian's goal is to assist in the creation of a viable Western Martial Arts tradition that can co-exist on equal terms with the existing Eastern Martial Arts tradition. Brian had received his designation of <a href="http://www.aemma.org/misc/trng_body.htm#freeScholler">free scholler</a> in October 24, 2000. Brian also received his appointment of "Acknowledged Instructor" (AI) designation for armoured longsword instruction in October 14, 2001 by the <a href="http://www.scherma-tradizionale.org/">International Masters at Arms Federation</a> (IMAF).  Brian is also engaged with the <a href="http://www.rom.on.ca" target="_blank">Royal Ontario Museum</a> (ROM) in an advisory/consultant capacity for matters related to the medieval history as it pertains to military history, arms and armour.</td>
		</tr>
		</table>
		<!-- FINLAND -->
		<table cellpadding=3>
		<tr bgcolor="#333399">
			<td>&nbsp;<img src="../images/flags/fnFlag.gif" style="vertical-align:middle;">&nbsp;<font  color="white"><b>Finland</b></td>
		</tr>
		<tr>
			<td><img src="../images/portraits/bio_gwindsor.jpg" border="1" style="float:left;margin-right:8px;"><b>Name: Guy Windsor<br>AI: Acknowledged for Longsword & Medieval Sword & Buckler<br>Date: month nn yyyy<br>Location: Helsinki, Finland</b><br><br><a href="mailto: Guy Windsor <guy.windsor@swordschool.com>?subject=IMAF AI Info Request">Guy Windsor</a>, born in Cambridge, England in 1973, Mr. Windsor received his first lessons in classical fencing at the age of nine from his grandfather, Hector Apergis. In the 1920s Dr Apergis trained with Leon Paul, himself a student of the great Afred Hutton. Mr Windsor took up karate in 1985 and sport fencing at school in 1986, specialising in the foil for four years before adding the sabre. Becoming disillusioned with the sporting approach, he begun his studies in T'ai Chi Chuan, Okinawan Kobudo and Aikido in 1992. During his first year at Edinburgh University, Mr Windsor met Paul Macdonald and together they decided to form the Dawn Duellists Society.
			<p>After graduating with a degree in English literature, Mr Windsor found work as an antiques restorer and cabinet maker in Scotland, while at the same time teaching fencing at the DDS. In September 2000 he decided to teach swordsmanship full-time and in March 2001 opened <a href="http://www.swordschool.com/" target="_blank">The School of European Swordsmanship</a>, Helsinki. In Finland he has taken the opportunity to broaden his knowledge of martial arts by exchanging lessons with a Tai Shin Mun Kung Fu instructor and a fourth dan aikidoka. Mr Windsor has worked his way backwards through the history of fencing, specialising at first in the smallsword with a particular fondness for the work of Donald McBane.
			<p>His rapier method is heavily influenced by Maestro Lupo Sinclair, though generally based in earlier styles, including that of the idiosyncratic Vincentio Saviolo. His longsword method is largely based on Fiore, though Vadi is also influential. The sword and buckler method in I.33 is the latest addition to the SESH curriculum. Mr Windsor also particularly enjoys practice with spadroon, dagger, spada da lato and cavalry sabre. The emphasis in all his training is on the martial effectiveness and historical accuracy of the techniques. For many years Mr Windsor has been particularly interested in the internal, meditative and medical aspects of swordsmanship. To this end, he incorporates massage and herbal medicine at an early stage in his students' training and his study of Western shamanic techniques forms the basis of the more advanced internal and spiritual training. Mr Windsor divides his time between his own training, teaching at his salle in Helsinki, and taking workshops across Finland and abroad.
			<p>Guy Windsor is a registered instructor of swordsmanship with the British Academy of Fencing and the Amateur Martial Association. He is also a founding member of the <a href="http://www.hadesign.co.uk/BFHS/" target="_blank">British Federation of Historical Swordplay</a> and the <a href="http://www.dawnduellists.org.uk/" target="_blank">Dawn Duellists Society</a>. The IMAF designates Mr. Windsor as an Acknowledged Instructor for longsword and medieval sword & buckler.</td>
		</tr>
		</table>
		<!-- GERMANY -->
		<table cellpadding=3>
		<tr bgcolor="#333399">
			<td>&nbsp;<img src="../images/flags/gmFlag.gif" style="vertical-align:middle;">&nbsp;<font  color="white"><b>Germany</b></td>
		</tr>
		<tr>
			<td><img src="../images/portraits/bio_sdieke.jpg" border="1" style="float:left;margin-right:8px;"><b>Name: Stefan Dieke<br>AI: Acknowledged for German School of Rapier<br>Date: month nn yyyy<br>Location: Cologne, Germany</b><br><br><a href="mailto: Stefan Dieke <s.dieke@freifechter.org>?subject=IMAF AI Info Request">Stefan Dieke</a>, born in 1969, Stefan has been involved with historical fencing since 1992. Though his interest began as a minor aspect of his historical reenactment activities, he soon began working with historical fencing treatises, exclusively focusing on authenticity of the fighting techniques and their effective realization. Specializing in German rapier fencing, he has made a thorough study of Jakob Sutor's “New kunstliches Fechtbuch” of 1612 and Joachim Meyer’s treatise of 1570, which is likely the most complex and precise source for the German school of rapier fence.
			<p>Working with those primary sources, as well as the necessary secondary literature, Stefan developed a deep interest in, and appreciation for, the historical environment and the history of the art of fencing. The tradition of Johannes Liechtenauer's system for the longsword has a special position in the history of fencing in Germany, which engaged Stefan's curiosity. Based on the knowledge and skill that he had already acquired working with the rapier, he managed to reconstruct Liechtenauer's system in a historically valid and martially effective manner. Stefan's longsword research is based on the works of Peter von Danzig, Sigmund Ringeck, Lew the Jew, and Paulus Hector Mair. To achieve a well rounded knowledge about historical European fighting techniques, Stefan has also been studying unarmed fighting styles of the 15th and 16th centuries, as well as other armed styles such as staff ('Halbe Stange'), dagger and 19th century military saber.
			<p>Since 1997, Stefan has been studying Medieval History and Information Technology, with the focus on history and social sciences, at the University of Cologne, Germany. In the year 2000, together with some like-minded friends, he founded “<a href="http://www.freifechter.org/" target="_blank">Die Freifechter</a> - Gesellschaft für Historische Fechtkunst e.V.,” the first official club in Germany for historical fencing as a martial art. It is Stefan's ultimate aim to achieve a universal understanding of fencing theory which goes beyond individual weapons. In recognition of his solid scholarship and practice, IMAF designates Stefan as Acknowledged Instructor for the German school of rapier fencing. </td>
		</tr>
		</table>
		<!-- ITALY -->
		<table cellpadding=3>
		<tr bgcolor="#333399">
			<td>&nbsp;<img src="../images/flags/itFlag.gif" style="vertical-align:middle;">&nbsp;<font  color="white"><b>Italy</b></td>
		</tr>
		<tr>
			<td><img src="../images/portraits/bio_cbruno.jpg" border="1" style="float:left;margin-right:8px;"><b>Name: Cosimo Bruno<br>AI: Acknowledged for Unarmed Combat<br>Date: month nn yyyy<br>Location: Milan, Italy</b><br><br>Cosimo Bruno was born in Mesagne, Brindisi, Italy, in 1966. Growing up in an ill-famed quarter of the city, he immediately found the need to learn survival and street-defense techniques. He first studied boxing, but, noticing the great efficacy of the use of kicks in street defense, he became a practitioner of Boxe Française, a powerful system that includes the use of kicks. At the age of fourteen, he started training under Maestri Italo and Renato Manusardi, and, under them, began an excellent career of competitive combat in Boxe Française.  Always looking for a truly effective system of street defense, Cosimo also become an expert in Savate and Chausson, also including in his studies walking stick (canne), great stick (grand baton) and knife fighting. Cosimo, continues to research the psychological aspects of defense, by studying human behavior in extreme defense and critical situations.
			<p>Continuously searching for a balance between tradition, geniality, creativity and direct experience, he has become one of the foremost security professionals in Italy. He has worked as an Army Special Forces trainer, a bodyguard, and a director of bouncers, which is still his job today.  Cosimo’s system of self-defense applies the basic concepts of “do not waste any time,” “use your nature as your main weapon,” and “minimize any possibility of a mistake or unpredictable event.” He is also very experienced in the use of weapons of opportunity in combat. Maestro Italo Manusardi has named him as his spiritual heir and has given him the responsibility for the development, diffusion, and teaching of the Boxe Française, Savate, and Chausson throughout all of Italy.
			<p>Cosimo is always studying in order to improve his abilities in any and all street weapons, reasoning that no one should stop his research because he has earned a title. His personal point of view is that skills must be demonstrated on the field, and that there are too many teachers claiming titles that are not representative of their real experience. In recognition of his outstanding knowledge, experience,  skill, and superb teaching ability,  the IMAF designates Cosimo Bruno as an Acknowledged Instructor for Unarmed Combat.</td>
		</tr>
		</table>
		<!-- USA -->
		<table cellpadding=3>
		<tr bgcolor="#333399">
			<td>&nbsp;<img src="../images/flags/usFlag.gif" style="vertical-align:middle;">&nbsp;<font  color="white"><b>USA</b></td>
		</tr>
		<tr>
			<td><img src="../images/portraits/bio_jloriega.jpg" border="1" style="float:left;margin-right:8px;"><b>Name: James Loriega<br>AI: Acknowledged for La Navaja Sevillana - Sevillian weapons<br>Date: February nn, 2002<br>Location: Brooklyn, NY, USA</b><br><br>James Loriega began his formal training in edged weapons in 1967 when he embarked on his lifelong study of Martial Arts with Ronald Duncan, the “Father of American Ninjutsu”.In the mid-70s, after achieving various instructor – level ranks in Asian systems, Loriega gained his first exposure to the Western martial traditions under the tutelage of Maitre Michel Alaux, a former coach to the U.S. Olympic Fencing Team.  It was from Maitre Alaux, and his assistant at the time, Ms. Julia Jones, that Loriega learned the rudiments of Epée and Saber. In September of 1980, Loriega founded the New York Ninpokai, a training academy for the Traditional Arts of Ninjutsu. It would be ten years that Loriega was again exposed to western edged weapons.
			<p>In July of 1990, while conducting Ninjutsu seminars in Spain, Loriega discovered the Acero Sevillano (Sevillian Steel)  knife art of Andalusia. These arts include the use of the Cuchillo (Knife), Punal (Stiletto), Baston de estoque (sword cane), and Navaja (Clasp Knife). His summer for the next five years were spent in Seville, and in August of 1996, he received formal certification as an Instructor de Armas Blancas Sevillanas under Maestro de Armas Santiago Rivera, then headmaster of the Escuela Sevillana de Armas Blancas. At this time, he was also granted permission to open a recognized branch of the Escuela Sevillanas in New York City, known as the Raven Arts Institute.
			<p>Today, Loriega continues to travel and to train, in addition to offering instruction at the Raven Arts Institute, where courses are available in the use of the folding knife, stiletto, sword – cane, walking stick, improvised weaponry, and unarmed combatives. His first book, Sevillian Steel: the Knife Fighting Arts of Spain, (1999 Paladin Press) presents an overview of the edged weapons culture, styles and strategies of this western martial tradition. His writing have also appeared in mainstream martial arts publications such as Black Belt, Warriors, and Tactical Knives.
			<p>In recognition of his deep knowledge of Spanish Knifes in the Seville style and other Western styles, IMAF designates James Loriega as one of its Acknowledged Instructors.<br>&nbsp;</td>
		</tr>
		<tr bgcolor=#f5f5f5>
			<td><img src="../images/portraits/bio_pkautz.jpg" border="1" style="float:left;margin-right:8px;"><b>Name: Peter Kautz<br>AI: Acknowledged for American Heritage Martial Arts<br>Date: August 9, 2002<br>Location: Alpine, NY, USA</b><br><br>Pete Kautz is the director of <a href="http://www.alliancemartialarts.com/" target="_blank">Alliance Martial Arts</a> and the founder of the <a href="http://alliancemartialarts.com/america.htm" target="_blank">American Heritage Fighting Arts Association</a>.  He first started training in the blade arts after discovering John Styer’s Cold Steel in his local library at the age of nine.  He began formally training in the martial arts in 1981 and has been actively teaching since 1989.
			<p>Today, Pete is a well known WMA writer and seminar instructor.  He has taught groups worldwide, and his articles on the Western arts have appeared in a number of international publications.  He is one of the original founders of the now famous Western Martial Arts Workshop which has brought together experts from across the spectrum of the WMA resurgence since 1999.
			<p>Alliance Martial Arts is an international academy of arms, and has been offering programs from around the world with an emphasis on the cultural use of weaponry since 1995.  Alliance courses include Historical Eastern Arts (Chinese & Filipino), Historical Western Arts (German & American), and Modern Self Defense.
			<p>The <a href="http://alliancemartialarts.com/america.htm" target="_blank">American Heritage Fighting Arts Association</a> is dedicated to researching, practicing, preserving, documenting, and transmitting the fighting arts of 19th century America.  This includes training in a variety of civilian, military, frontier and exotic weapons, physical culture, unarmed fighting, and shooting safety, as well as academic and historical skills.  One greater goal of the AHFAA is to educate the public about the lost history of this turbulent period, which stands so close to us today and yet goes practically untaught in schools.
			<p>In 2002 the Maestros of the International Masters at Arms Federation invited Mr. Kautz become a member of their organization as an Acknowledged Instructor in recognition of his work teaching the historical 19th century American martial arts.</td>
		</tr>
		</table>

		<hr width=30% align=left>
		<ol><li><a name="1"></a><i><b>Historical and Classical Fencing, and Combative Arts:</b> is defined loosely as historical European martial arts (HEMA) or sometimes referred to as historical Western martial arts (WMA), which covers fighting styles from civilian duels to combative fighting arts which include, but not limited to longsword, single-sword, duelling sabre, dagger, stick fighting, epée, rapier, unarmed, armoured combat, pole-weapons, sword & buckler, etc.</i></li>
		</ol>

	</div><!-- end main_content -->
	<!-- begin footer -->
<?php
include "../php-bin/footer.php";
?>
	<!-- end footer -->
</div><!-- container -->
</body></html>
