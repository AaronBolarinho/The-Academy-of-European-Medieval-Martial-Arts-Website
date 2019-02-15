//updated: July 20, 2011
//
// function call: TMainMenu(name,direction)
// ------------------------------------------------------------------------
// name: presently set to 'drop'
// direction: orientation of the main menu selections 'horizontal' across the page, 'vertical' vertically on the left side of the page, the popups behave normally in both cases
//
// function call: TPopMenu(label,icon,clickType,clickParam,status)
// ------------------------------------------------------------------------
// label: the name which appears on the nav bar button
// icon: this inserts an icon to the left of the label on the nav bar button, shifting the label to the right. "0" determines no icon, and the label is centred; '' offsets the label to the right as if an invisible icon exists.
// clickType: this defines the behaviour of the click on that menu selection, including target of the URL
//	"function": 
//	"f":
//	"address": the URL entered in the "clickParam" will be set to target="_blank" (new window)
//	"a": the URL entered in the "clickParam" will be set to target="_top"
//	"a_fr": the URL entered in the "clickParam" will be set to a frame target="mainFrame"
// clickParam: the destination URL
// status: what appears in the status bar of the browser (works on IE, but in FF, this must be enabled under "advanced javascript")
// 2014 -------------------------
//	dec 07:	replaced "misc/membership_body.htm" with "misc/membership_body.php" to allow for a single source of fees from "php-bin/global_variables.php"
//	dec 07:	replaced "misc/contact_body.htm" with "misc/contact_body.php" to allow for a single source of telephone numbers from "php-bin/global_variables.php"
// 2015 -------------------------
//	nov 18:	replaced home_v2.htm with home_v3.htm, inserting random photos of AEMMA through the years
//

var drop = new TMainMenu('drop','horizontal');

var dropHome = new TPopMenu('&nbsp;&nbsp;h&nbsp;o&nbsp;m&nbsp;e&nbsp;&nbsp;','0','a_fr','misc/home_v3.htm',' selected: home  ');

var dropAbout = new TPopMenu('&nbsp;&nbsp;a&nbsp;b&nbsp;o&nbsp;u&nbsp;t&nbsp;&nbsp;&nbsp;A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;&nbsp;','0','','',' selected: about AEMMA');
  	var dropAbout_Aboutus = new TPopMenu('o&nbsp;r&nbsp;g&nbsp;a&nbsp;n&nbsp;i&nbsp;z&nbsp;a&nbsp;t&nbsp;i&nbsp;o&nbsp;n&nbsp;a&nbsp;l&nbsp;&nbsp;&nbsp;i&nbsp;n&nbsp;f&nbsp;o','','','',' selected: about AEMMA ==> organizational info');
  		var dropAbout_Aboutus_about = new TPopMenu('w&nbsp;h&nbsp;a&nbsp;t&nbsp;&nbsp;&nbsp;i&nbsp;s&nbsp;&nbsp;&nbsp;A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;?','','a_fr','misc/about_body.htm#about',' selected: about AEMMA ==> organizational info ==> what is AEMMA?');
  		var dropAbout_Aboutus_arms = new TPopMenu('a r m o r i a l&nbsp;&nbsp;&nbsp;&nbsp;b e a r i n g s','','a_fr','arms/a/aemma.htm',' selected: about AEMMA ==> organizational info ==> armorial bearings');
  		var dropAbout_Aboutus_executive = new TPopMenu('t h e&nbsp;&nbsp;&nbsp;&nbsp;e x e c u t i v e','','a_fr','misc/about_body.htm#exec',' selected: about AEMMA ==> organizational info ==> the executive');
  		var dropAbout_Aboutus_instructors = new TPopMenu('t h e&nbsp;&nbsp;&nbsp;&nbsp;i n s t r u c t o r s','','a_fr','misc/about_body.htm#instructors',' selected: about AEMMA ==> organizational info ==> the instructors');
  		var dropAbout_Aboutus_professional = new TPopMenu('p r o f e s s i o n a l&nbsp;&nbsp;&nbsp;&nbsp;r e l a t i o n s h i p s','','a_fr','misc/about_body.htm#professional',' selected: about AEMMA ==> organizational info ==> professional relationships');
//  		var dropAbout_Aboutus_associate = new TPopMenu('a s s o c i a t e&nbsp;&nbsp;&nbsp;&nbsp;g r o u p s&nbsp;&nbsp;&nbsp;&nbsp;r e p s','','a_fr','misc/about_body.htm#aagReps',' selected: about AEMMA ==> about AEMMA ==> associate representatives');
  		var dropAbout_Aboutus_advisors = new TPopMenu('a c a d e m i c&nbsp;&nbsp;&nbsp;&nbsp;a d v i s o r s','','a_fr','misc/about_body.htm#advisors',' selected: about AEMMA ==> organizational info ==> academic advisors');
  		var dropAbout_Aboutus_fencing = new TPopMenu('f e n c i n g&nbsp;&nbsp;&nbsp;&nbsp;a d v i s o r s','','a_fr','misc/about_body.htm#fencing',' selected: about AEMMA ==> organizational info ==> fencing advisors');
  		var dropAbout_Aboutus_patrons = new TPopMenu('p a t r o n s','','a_fr','misc/about_body.htm#patrons',' selected: about AEMMA ==> organizational info ==> patrons');
  		var dropAbout_Aboutus_research = new TPopMenu('r e s e a r c h&nbsp;&nbsp;&nbsp;&nbsp;a s s o c i a t e s','','a_fr','misc/about_body.htm#research',' selected: about AEMMA ==> organizational info ==> research associates');
		var dropAbout_Aboutus_spacer = new TPopMenu('--------------------------------------','','a_fr','misc/about_body.htm#about','--------------------------------------');
  		var dropAbout_Aboutus_rules = new TPopMenu('s a l l e&nbsp;&nbsp;&nbsp;&nbsp;d - a r m e s&nbsp;&nbsp;&nbsp;&nbsp;r u l e s','','a_fr','misc/rulesSalledArmes.htm',' selected: about AEMMA ==> organizational info ==> rules of the salle d-armes');
  		var dropAbout_Aboutus_disclaimer = new TPopMenu('d i s c l a i m e r','','a_fr','misc/disclaimer.htm',' selected: about AEMMA ==> organizational info ==> disclaimer');
  		var dropAbout_Aboutus_privacy = new TPopMenu('p r i v a c y&nbsp;&nbsp;&nbsp;&nbsp;p o l i c y','','a_fr','misc/privacy.htm',' selected: about AEMMA ==> organizational info ==> privacy policy');
//  	var dropAbout_Edmonton = new TPopMenu('<b>A E M M A&nbsp;&nbsp;&nbsp;E d m o n t o n</b>','','address','http://edmonton.aemma.org',' selected: about AEMMA ==> AEMMA Edmonton');
  	var dropAbout_Guelph = new TPopMenu('<b>A E M M A&nbsp;&nbsp;&nbsp;G u e l p h</b>','','address','http://guelph.aemma.org',' selected: about AEMMA ==> AEMMA  Guelph');
  	var dropAbout_NS = new TPopMenu('<b>A E M M A&nbsp;&nbsp;&nbsp;N o v a&nbsp;&nbsp;S c o t i a</b>','','address','http://novascotia.aemma.org',' selected: about AEMMA ==> AEMMA Nova Scotia');
  	var dropAbout_Stratford = new TPopMenu('<b>A E M M A&nbsp;&nbsp;&nbsp;S t r a t f o r d</b>','','address','http://straford.aemma.org',' selected: about AEMMA ==> AEMMA Stratford');
//  	var dropAbout_UofT = new TPopMenu('<b>A E M M A&nbsp;&nbsp;&nbsp;University&nbsp;&nbsp;of&nbsp;&nbsp;Toronto</b>','','address','http://uoft.aemma.org',' selected: about AEMMA ==> AEMMA@UofT');
  	var dropAbout_Contact = new TPopMenu('<b>c o n t a c t i n g</b>&nbsp;&nbsp;&nbsp;A E M M A','','a_fr','misc/contact_body.php',' selected: about AEMMA ==> contacting AEMMA');
  	var dropAbout_Schedule = new TPopMenu('<b>t r a i n i n g</b>&nbsp;&nbsp;&nbsp;s c h e d u l e','','a_fr','misc/membership_body.php#schedule',' selected: about AEMMA ==> training schedule');
  	var dropAbout_Fees = new TPopMenu('<b>f e e s</b>&nbsp;&nbsp;&nbsp;s t r u c t u r e','','a_fr','misc/membership_body.php#fees',' selected: about AEMMA ==> fees structure');
  	var dropAbout_Location_TTC = new TPopMenu('t r a i n i n g&nbsp;&nbsp;&nbsp;<b>l o c a t i o n</b>&nbsp;&nbsp;&nbsp;b y&nbsp;&nbsp;&nbsp;T T C','','a_fr','misc/location.htm#location_TTC',' selected: about AEMMA ==> training location by TTC');
  	var dropAbout_Location_driving = new TPopMenu('t r a i n i n g&nbsp;&nbsp;&nbsp;<b>l o c a t i o n</b>&nbsp;&nbsp;&nbsp;b y&nbsp;&nbsp;&nbsp;c a r','','a_fr','misc/location.htm#location_driving',' selected: about AEMMA ==> training location by car');
  	var dropAbout_SallePhotos = new TPopMenu('p h o t o s&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;s a l l e','','a_fr','misc/location.htm#photosalle',' selected: about AEMMA ==> photos of the salle');
  	var dropAbout_Visit = new TPopMenu('g&nbsp;u&nbsp;e&nbsp;s&nbsp;t&nbsp;&nbsp;&nbsp;v&nbsp;i&nbsp;s&nbsp;i&nbsp;t&nbsp;&nbsp;&nbsp;r&nbsp;e&nbsp;q&nbsp;u&nbsp;e&nbsp;s&nbsp;t','','a_fr','misc/membership_body.php#visitRequest',' selected: about AEMMA ==> guest visit request');
	var dropAbout_Start = new TPopMenu('n&nbsp;e&nbsp;w&nbsp;&nbsp;&nbsp;t&nbsp;o&nbsp;&nbsp;&nbsp;t&nbsp;h&nbsp;i&nbsp;s&nbsp;?&nbsp;-&nbsp;&nbsp;&nbsp;s t a r t&nbsp;&nbsp;&nbsp;&nbsp;h e r e ! ! !','','a_fr','misc/startHere_body.htm',' selected: about AEMMA ==> visitors start here');
	var dropAbout_spacer = new TPopMenu('--------------------------------------','','a_fr','misc/about_body.htm#about','--------------------------------------');
	var dropAbout_Affiliates = new TPopMenu('a f f i l i a t e s','','a_fr','affiliates_main.htm',' selected: about AEMMA ==> affiliates');
//  	var dropAbout_Associates = new TPopMenu('a s s o c i a t e s','','a_fr','associates_main.htm',' selected: about AEMMA ==> associates');
  	var dropAbout_Chapters = new TPopMenu('c h a p t e r s','','a_fr','chapters_main.htm',' selected: about AEMMA ==> chapters');
  	var dropAbout_Calendar = new TPopMenu('<img src="images/icons/icon_calendar_15.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;<b>c a l e n d a r</b>&nbsp;&nbsp;:&nbsp;&nbsp;training&nbsp;&nbsp;&&nbsp;&nbsp;events','','a_fr','calendar/gcalendar.htm',' selected: about AEMMA ==> training & events calendar');
  	var dropAbout_FAQs = new TPopMenu('<img src="images/icons/faqs.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;<b>f</b>&nbsp;r&nbsp;e&nbsp;q&nbsp;u&nbsp;e&nbsp;n&nbsp;t&nbsp;l&nbsp;y&nbsp;&nbsp;<b>a</b>&nbsp;s&nbsp;k&nbsp;e&nbsp;d&nbsp;&nbsp;<b>q</b>&nbsp;u&nbsp;e&nbsp;s&nbsp;t&nbsp;i&nbsp;o&nbsp;n&nbsp;<b>s</b>','','a_fr','misc/aemma_faqs.php',' selected: about AEMMA ==> FAQs');
  	var dropAbout_Demos = new TPopMenu('<img src="images/icons/icon_trumpets_15.gif" style="vertical-align:middle" alt="" /><img src="images/icons/icon_trumpets_15.gif" style="vertical-align:middle" alt="" /><img src="images/icons/icon_trumpets_15.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;d e m o n s t r a t i o n s','','a_fr','misc/eventsDetails.htm',' selected: about AEMMA ==> demonstrations');
  	var dropAbout_Presentations = new TPopMenu('<img src="images/icons/icon_trumpets_15.gif" style="vertical-align:middle" alt="" /><img src="images/icons/icon_trumpets_15.gif" style="vertical-align:middle" alt="" /><img src="images/icons/icon_trumpets_15.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;p r e s e n t a t i o n s','','a_fr','misc/presentation_details.htm',' selected: about AEMMA ==> presentations');
  	var dropAbout_MembersRoll = new TPopMenu('m e m b e r s h i p&nbsp;&nbsp;&nbsp;&nbsp;r o l l','','a_fr','misc/membershipRoll.htm',' selected: about AEMMA ==> membership roll');
  	var dropAbout_Roll = new TPopMenu('<b>r o l l&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;a r m s</b>&nbsp;&nbsp;<img src="images/coatofarms/tinyShield.gif" style="vertical-align:middle" alt="" /><img src="images/rhsc_shield_tiny.gif" style="vertical-align:middle" alt="" /><img src="images/cha_smallshield.gif" style="vertical-align:middle" alt="" />...','','a_fr','arms/roll_startPage.htm',' selected: about AEMMA ==> roll of arms');
  	var dropAbout_News = new TPopMenu('n e w s ,&nbsp;&nbsp;p r e s e n t a t i o n s ,&nbsp;&nbsp;e v e n t s','','a_fr','news_main.htm',' selected: about AEMMA ==> news, presentations, events');
  	var dropAbout_Press = new TPopMenu('p r e s s&nbsp;&nbsp;r e l e a s e s','','a_fr','press_main.htm',' selected: about AEMMA ==> press releases');
 
var dropTradition = new TPopMenu('&nbsp;&nbsp;t&nbsp;r&nbsp;a&nbsp;d&nbsp;i&nbsp;t&nbsp;i&nbsp;o&nbsp;n&nbsp;s&nbsp;&nbsp;&nbsp;','0','','',' selected: traditions');
	var dropTradition_armizare = new TPopMenu('l&nbsp;&#180;&nbsp;a&nbsp;r&nbsp;t&nbsp;e&nbsp;&nbsp;&nbsp;d&nbsp;e&nbsp;l&nbsp;l&nbsp;&#180;&nbsp;a&nbsp;r&nbsp;m&nbsp;i&nbsp;z&nbsp;a&nbsp;r&nbsp;e','','','',' selected: traditions ==> l&#180;arte dell&#180;armizare');
		var dropTradition_armizare_about = new TPopMenu('I&nbsp;t&nbsp;a&nbsp;l&nbsp;i&nbsp;a&nbsp;n&nbsp;&nbsp;&nbsp;a&nbsp;r&nbsp;t&nbsp;&nbsp;&nbsp;o&nbsp;f&nbsp;&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;s','','a_fr','misc/tradition_italian.htm',' selected: traditions ==> l&#180;arte dell&#180;armizare ==> Italian art of arms');
		var dropTradition_armizare_liberi = new TPopMenu('M&nbsp;a&nbsp;e&nbsp;s&nbsp;t&nbsp;r&nbsp;o&nbsp;&nbsp;&nbsp;F&nbsp;i&nbsp;o&nbsp;r&nbsp;e&nbsp;&nbsp;&nbsp;d&nbsp;e&nbsp;i&nbsp;&nbsp;&nbsp;L&nbsp;i&nbsp;b&nbsp;e&nbsp;r&nbsp;i','','a_fr','onlineResources/liberi/prologue_body.htm',' selected: traditions ==> l&#180;arte dell&#180;armizare ==> Maestro Fiore dei Liberi');
		var dropTradition_armizare_flos = new TPopMenu('F&nbsp;l&nbsp;o&nbsp;s&nbsp;&nbsp;&nbsp;D&nbsp;u&nbsp;e&nbsp;l&nbsp;l&nbsp;a&nbsp;t&nbsp;o&nbsp;r&nbsp;u&nbsp;m&nbsp;,&nbsp;&nbsp;&nbsp;1&nbsp;4&nbsp;1&nbsp;0','','a_fr','onlineResources/liberi/contents.htm',' selected: traditions ==> l&#180;arte dell&#180;armizare ==> Flos Duellatorum, 1410');
	var dropTradition_fechten = new TPopMenu('f e c h t k u n s t','','','',' selected: traditions ==> fechtkunst');
		var dropTradition_fechten_about = new TPopMenu('G&nbsp;e&nbsp;r&nbsp;m&nbsp;a&nbsp;n&nbsp;&nbsp;&nbsp;a&nbsp;r&nbsp;t&nbsp;&nbsp;&nbsp;o&nbsp;f&nbsp;&nbsp;&nbsp;f&nbsp;e&nbsp;n&nbsp;c&nbsp;e','','a_fr','misc/tradition_german.htm',' selected: traditions ==>  fechtkunstGerman ==> art of fence');
		var dropTradition_fechten_masters = new TPopMenu('G&nbsp;e&nbsp;r&nbsp;m&nbsp;a&nbsp;n&nbsp;&nbsp;&nbsp;m&nbsp;a&nbsp;s&nbsp;t&nbsp;e&nbsp;r&nbsp;s','','a_fr','misc/maestro_german.htm',' selected: traditions ==> fechtkunstGerman ==> German masters');
//	var dropTradition_rapier = new TPopMenu('d e l l a&nbsp;&nbsp;&nbsp;s c h e r m a','','','',' selected: traditions ==> della scherma');
//		var dropTradition_rapier_about = new TPopMenu('I&nbsp;t&nbsp;a&nbsp;l&nbsp;i&nbsp;a&nbsp;n&nbsp;&nbsp;&nbsp;r&nbsp;a&nbsp;p&nbsp;i&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;f&nbsp;e&nbsp;n&nbsp;c&nbsp;i&nbsp;n&nbsp;g','','a_fr','misc/tradition_rapier.htm',' selected: traditions ==> della scherma ==> Italian rapier fencing');

var dropTraining = new TPopMenu('&nbsp;&nbsp;t&nbsp;r&nbsp;a&nbsp;i&nbsp;n&nbsp;i&nbsp;n&nbsp;g&nbsp;&nbsp;','0','','',' selected: training');
  	var dropTraining_Intro = new TPopMenu('<b>i n t r o d u c t i o n&nbsp;&nbsp;&nbsp;t o&nbsp;&nbsp;&nbsp;A r m i z a r e</b>','','a_fr','misc/introduction_to_training.php',' selected: training ==> intro to armizare');
	var dropTraining_styles = new TPopMenu('m&nbsp;a&nbsp;r&nbsp;t&nbsp;i&nbsp;a&nbsp;l&nbsp;&nbsp;&nbsp;s&nbsp;t&nbsp;y&nbsp;l&nbsp;e&nbsp;s&nbsp;&nbsp;&nbsp;@&nbsp;&nbsp;&nbsp;A E M M A','','','',' selected: training ==> martial styles @ AEMMA');
	  	var dropTraining_styles_grappling = new TPopMenu('g&nbsp;r&nbsp;a&nbsp;p&nbsp;p&nbsp;l&nbsp;i&nbsp;n&nbsp;g','','a_fr','training/grappling/grapplingTraining.htm',' selected: training ==> martial styles @ AEMMA ==> grappling');
	  	var dropTraining_styles_dagger = new TPopMenu('d&nbsp;a&nbsp;g&nbsp;g&nbsp;e&nbsp;r','','a_fr','training/dagger/daggerTraining.htm',' selected: training ==> martial styles @ AEMMA ==> dagger');
	  	var dropTraining_styles_sword = new TPopMenu('s&nbsp;w&nbsp;o&nbsp;r&nbsp;d&nbsp;s&nbsp;m&nbsp;a&nbsp;n&nbsp;s&nbsp;h&nbsp;i&nbsp;p','','a_fr','training/longsword/longswordTraining.htm',' selected: training ==> martial styles @ AEMMA ==> swordsmanship');
	  	var dropTraining_styles_armoured = new TPopMenu('a&nbsp;r&nbsp;m&nbsp;o&nbsp;u&nbsp;r&nbsp;e&nbsp;d&nbsp;&nbsp;&nbsp;c&nbsp;o&nbsp;m&nbsp;b&nbsp;a&nbsp;t','','a_fr','training/armour/armourTraining.htm',' selected: training ==> martial styles @ AEMMA ==> armoured combat');
	  	var dropTraining_styles_pole = new TPopMenu('p&nbsp;o&nbsp;l&nbsp;e&nbsp;&nbsp;&nbsp;w&nbsp;e&nbsp;a&nbsp;p&nbsp;o&nbsp;n&nbsp;s','','a_fr','training/pollaxe/pollaxeTraining.htm',' selected: training ==> martial styles @ AEMMA ==> pole weapons');
	  	var dropTraining_styles_longbow = new TPopMenu('m&nbsp;e&nbsp;d&nbsp;i&nbsp;e&nbsp;v&nbsp;a&nbsp;l&nbsp;&nbsp;&nbsp;l&nbsp;o&nbsp;n&nbsp;g&nbsp;b&nbsp;o&nbsp;w&nbsp;&nbsp;&nbsp;a&nbsp;r&nbsp;c&nbsp;h&nbsp;e&nbsp;r&nbsp;y','','a_fr','training/archery/archeryTraining2.htm',' selected: training ==> martial styles @ AEMMA ==> medieval longbow archery');
	  	var dropTraining_styles_horsemanship = new TPopMenu('h&nbsp;o&nbsp;r&nbsp;s&nbsp;e&nbsp;m&nbsp;a&nbsp;n&nbsp;s&nbsp;h&nbsp;i&nbsp;p','','a_fr','training/mounted/mountedTraining2.htm',' selected: training ==> martial styles @ AEMMA ==> horsemanship');
	  	var dropTraining_styles_trebuchet = new TPopMenu('s&nbsp;e&nbsp;i&nbsp;g&nbsp;e&nbsp;&nbsp;&nbsp;m&nbsp;a&nbsp;c&nbsp;h&nbsp;i&nbsp;n&nbsp;e&nbsp;s','','a_fr','training/trebuchet/trebuchetTraining.htm',' selected: training ==> martial styles @ AEMMA ==> seige machines');
	  	var dropTraining_styles_rapier = new TPopMenu('I&nbsp;t&nbsp;a&nbsp;l&nbsp;i&nbsp;a&nbsp;n&nbsp;&nbsp;&nbsp;r&nbsp;a&nbsp;p&nbsp;i&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;f&nbsp;e&nbsp;n&nbsp;c&nbsp;i&nbsp;n&nbsp;g','','a_fr','misc/tradition_rapier.htm',' selected: training ==> martial styles @ AEMMA ==> Italian rapier fencing');
	var dropTraining_rank = new TPopMenu('r&nbsp;a&nbsp;n&nbsp;k&nbsp;i&nbsp;n&nbsp;g&nbsp;&nbsp;&nbsp;s&nbsp;y&nbsp;s&nbsp;t&nbsp;e&nbsp;m','','','',' selected: training ==> ranking system');
	  	var dropTraining_rank_overview = new TPopMenu('o&nbsp;v&nbsp;e&nbsp;r&nbsp;v&nbsp;i&nbsp;e&nbsp;w&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;h&nbsp;i&nbsp;s&nbsp;t&nbsp;o&nbsp;r&nbsp;y','','a_fr','misc/rank_body.htm#rankIntro',' selected: training ==> ranking system ==> overview & history');
	  	var dropTraining_rank_recruit = new TPopMenu('r&nbsp;e&nbsp;c&nbsp;r&nbsp;u&nbsp;i&nbsp;t&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','a_fr','misc/rank_body.htm#recruit',' selected: training ==> ranking system ==> recruit level');
	  	var dropTraining_rank_scholler = new TPopMenu('s&nbsp;c&nbsp;h&nbsp;o&nbsp;l&nbsp;l&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','a_fr','misc/rank_body.htm#scholler',' selected: training ==> ranking system ==> scholler level');
	  	var dropTraining_rank_freeScholler = new TPopMenu('f&nbsp;r&nbsp;e&nbsp;e&nbsp;&nbsp;&nbsp;s&nbsp;c&nbsp;h&nbsp;o&nbsp;l&nbsp;l&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','a_fr','misc/rank_body.htm#freeScholler',' selected: training ==> ranking system ==> free scholler level');
	  	var dropTraining_rank_provost = new TPopMenu('p&nbsp;r&nbsp;o&nbsp;v&nbsp;o&nbsp;s&nbsp;t&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','a_fr','misc/rank_body.htm#provost',' selected: training ==> ranking system ==> provost level');
	  	var dropTraining_rank_maestro = new TPopMenu('m&nbsp;a&nbsp;e&nbsp;s&nbsp;t&nbsp;r&nbsp;o&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','a_fr','misc/rank_body.htm#maestro',' selected: training ==> ranking system ==> maestro level');
	var dropTraining_equipment = new TPopMenu('e&nbsp;q&nbsp;u&nbsp;i&nbsp;p&nbsp;m&nbsp;e&nbsp;n&nbsp;t&nbsp;&nbsp;&nbsp;r&nbsp;e&nbsp;q&nbsp;u&nbsp;i&nbsp;r&nbsp;e&nbsp;m&nbsp;e&nbsp;n&nbsp;t&nbsp;s','','','',' selected: training ==> equipment requirements');
	  	var dropTraining_equipment_recruit = new TPopMenu('r&nbsp;e&nbsp;c&nbsp;r&nbsp;u&nbsp;i&nbsp;t&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','a_fr','misc/equipment_body.htm#recruitGear',' selected: training ==> equipment requirements ==> recruit level');
	  	var dropTraining_equipment_scholler = new TPopMenu('s&nbsp;c&nbsp;h&nbsp;o&nbsp;l&nbsp;l&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;a&nbsp;n&nbsp;d&nbsp;&nbsp;&nbsp;a&nbsp;b&nbsp;o&nbsp;v&nbsp;e&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l&nbsp;s','','a_fr','misc/equipment_body.htm#schollerGear',' selected: training ==> equipment requirements ==> scholler and above level');
	  	var dropTraining_equipment_armour = new TPopMenu('a&nbsp;r&nbsp;m&nbsp;o&nbsp;u&nbsp;r e d&nbsp;&nbsp;&nbsp;c o m b a t&nbsp;&nbsp;&nbsp;h a r n e s s','','a_fr','misc/equipment_body.htm#hard_armoured',' selected: training ==> equipment requirements ==> armoured combat harness');
	  	var dropTraining_equipment_armourArms = new TPopMenu('a&nbsp;r&nbsp;m&nbsp;o&nbsp;u&nbsp;r e d&nbsp;&nbsp;&nbsp;c o m b a t&nbsp;&nbsp;&nbsp;a r m s','','a_fr','misc/equipment_body.htm#armoured_arms',' selected: training ==> equipment requirements ==> armoured combat arms');
	  	var dropTraining_equipment_nomenclature = new TPopMenu('a&nbsp;r&nbsp;m&nbsp;o&nbsp;u&nbsp;r&nbsp;&nbsp;&nbsp;n&nbsp;o&nbsp;m&nbsp;e&nbsp;n&nbsp;c&nbsp;l&nbsp;a&nbsp;t&nbsp;u&nbsp;r&nbsp;e','','a_fr','misc/equipment_body.htm#nomenclature',' selected: training ==> equipment requirements ==> armour nomenclature');
	  	var dropTraining_equipment_period = new TPopMenu('p&nbsp;e&nbsp;r&nbsp;i&nbsp;o&nbsp;d&nbsp;&nbsp;&nbsp;g&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;n&nbsp;t&nbsp;s','','a_fr','misc/equipment_body.htm#periodGarments',' selected: training ==> equipment requirements ==> period garments');
	var dropTraining_structure = new TPopMenu('t&nbsp;r&nbsp;a&nbsp;i&nbsp;n&nbsp;i&nbsp;n&nbsp;g&nbsp;&nbsp;&nbsp;p&nbsp;r&nbsp;o&nbsp;g&nbsp;r&nbsp;a&nbsp;m&nbsp;s','','','',' selected: training ==> training programs');
	  	var dropTraining_structure_intro = new TPopMenu('o&nbsp;v&nbsp;e&nbsp;r&nbsp;v&nbsp;i&nbsp;e&nbsp;w','','a_fr','misc/trng_body.htm',' selected: training ==> training programs ==> overview');
	  	var dropTraining_structure_recruit = new TPopMenu('r&nbsp;e&nbsp;c&nbsp;r&nbsp;u&nbsp;i&nbsp;t&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','','',' selected: training ==> training programs ==> recruit level');
	  		var dropTraining_structure_recruit_principles = new TPopMenu('t r a i n i n g&nbsp;&nbsp;&nbsp;o v e r v i e w','','a_fr','misc/trng_recruit1.htm#principles',' selected: training ==> training programs ==> recruit level ==> training overview');
	  		var dropTraining_structure_recruit_core = new TPopMenu('c o r e&nbsp;&nbsp;&nbsp;t r a i n i n g&nbsp;&nbsp;&nbsp;c o m p o n e n t s','','a_fr','misc/trng_recruit2.htm#core',' selected: training ==> training programs ==> recruit level ==> core training components');
	  		var dropTraining_structure_recruit_recruitVideos = new TPopMenu('t r a i n i n g&nbsp;&nbsp;&nbsp;v i d e o s&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;p h o t o s','','a_fr','misc/trng_recruit2.htm#recruitVideos',' selected: training ==> training programs ==> recruit level ==> training videos & photos');
	  	var dropTraining_structure_scholler = new TPopMenu('s&nbsp;c&nbsp;h&nbsp;o&nbsp;l&nbsp;l&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','','',' selected: training ==> training programs ==> scholler level');
	  		var dropTraining_structure_scholler_principlesScholler = new TPopMenu('t r a i n i n g&nbsp;&nbsp;&nbsp;o v e r v i e w','','a_fr','misc/trng_scholler1.htm#principlesScholler',' selected: training ==> training programs ==> scholler level ==> training overview');
	  		var dropTraining_structure_scholler_schedule = new TPopMenu('s e g m e n t s&nbsp;&nbsp;&nbsp;s c h e d u l e','','a_fr','misc/trng_scholler1.htm#schollerSchedule',' selected: training ==> training programs ==> scholler level ==> segments schedule');
	  		var dropTraining_structure_scholler_abrazare = new TPopMenu('- - a b r a z a r e','','a_fr','misc/trng_scholler1.htm#abrazare',' selected: training ==> training programs ==> scholler level ==> abrazare');
	  		var dropTraining_structure_scholler_daga = new TPopMenu('- - d a g a','','a_fr','misc/trng_scholler1.htm#daga',' selected: training ==> training programs ==> scholler level ==> daga');
	  		var dropTraining_structure_scholler_spada = new TPopMenu('- - s p a d a','','a_fr','misc/trng_scholler1.htm#spada',' selected: training ==> training programs ==> scholler level ==> spada');
	  		var dropTraining_structure_scholler_spadaLonga = new TPopMenu('- - s p a d a&nbsp;&nbsp;&nbsp;l o n g a','','a_fr','misc/trng_scholler1.htm#spadaLonga',' selected: training ==> training programs ==> scholler level ==> spada longa');
	  		var dropTraining_structure_scholler_arme = new TPopMenu('- - a r m e','','a_fr','misc/trng_scholler1.htm#arme',' selected: training ==> training programs ==> scholler level ==> arme');
	  		var dropTraining_structure_scholler_azza = new TPopMenu('- - a z z a&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;l a n z a','','a_fr','misc/trng_scholler1.htm#azza',' selected: training ==> training programs ==> scholler level ==> azza e lanza');
	  		var dropTraining_structure_scholler_brocchiere = new TPopMenu('- - s p a d a&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;b r o c c h i e r e','','a_fr','misc/trng_scholler1.htm#brocchiere',' selected: training ==> training programs ==> scholler level ==> spada e brocchiere');
	  		var dropTraining_structure_scholler_cavallo = new TPopMenu('- - a&nbsp;&nbsp;&nbsp;c a v a l l o','','a_fr','training/mounted/mountedTraining2.htm',' selected: training ==> training programs ==> scholler level ==> a cavallo');
	  	var dropTraining_structure_freeScholler = new TPopMenu('f&nbsp;r&nbsp;e&nbsp;e&nbsp;&nbsp;&nbsp;s&nbsp;c&nbsp;h&nbsp;o&nbsp;l&nbsp;l&nbsp;e&nbsp;r&nbsp;&nbsp;&nbsp;l&nbsp;e&nbsp;v&nbsp;e&nbsp;l','','a_fr','misc/trng_freescholler1.htm',' selected: training ==> training programs ==> free scholler level');
	var dropTraining_partners = new TPopMenu('f&nbsp;i&nbsp;n&nbsp;d&nbsp;&nbsp;&nbsp;t&nbsp;r&nbsp;a&nbsp;i&nbsp;n&nbsp;i&nbsp;n&nbsp;g&nbsp;&nbsp;&nbsp;p&nbsp;a&nbsp;r&nbsp;t&nbsp;n&nbsp;e&nbsp;r&nbsp;s','','a_fr','http://forums.swordforum.com/forumdisplay.php?s=&daysprune=30&forumid=42',' selected: training ==> find training partners');
	var dropTraining_force = new TPopMenu('<b>u&nbsp;s&nbsp;e&nbsp;&nbsp;o&nbsp;f&nbsp;&nbsp;f&nbsp;o&nbsp;r&nbsp;c&nbsp;e&nbsp;&nbsp;&nbsp;a&nbsp;n&nbsp;d&nbsp;&nbsp;&nbsp;t&nbsp;h&nbsp;e&nbsp;&nbsp;&nbsp;l&nbsp;a&nbsp;w</b>','','a_fr','misc/use_of_force.htm',' selected: training ==> use of force and the law');


	var dropTraining_spacer = new TPopMenu('--------------------------------------','','a_fr','','--------------------------------------');
	var dropTraining_private = new TPopMenu('p r i v a t e&nbsp;&nbsp;&nbsp;l e s s o n s','','a_fr','misc/privateLessons.htm',' selected: training ==> private lessons');
	var dropTraining_spacer = new TPopMenu('--------------------------------------','','a_fr','','--------------------------------------');

	var dropTraining_tournaments = new TPopMenu('<b>p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s</b>','','','',' selected: training ==> pas d armes');
		var dropTraining_tournaments_intro = new TPopMenu('<b>u n d e r t a k i n g&nbsp;&nbsp;&nbsp;a&nbsp;&nbsp;&nbsp;p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s</b>','','a_fr','misc/medievalTournament.htm',' selected: training ==> pas d armes ==> of the undertaking of a pas d armes');
		var dropTraining_tournaments_planning = new TPopMenu('p l a n n i n g&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s','','a_fr','misc/medievalTournament.htm#planning',' selected: training ==> pas d armes ==> planning the pas d armes');
		var dropTraining_tournaments_inspection = new TPopMenu(' a r m o u r&nbsp;&nbsp;&nbsp;i n s p e c t i o n s','','a_fr','misc/medievalTournament.htm#prior',' selected: training ==> pas d armes ==> armour inspections');
		var dropTraining_tournaments_personnel = new TPopMenu('p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s&nbsp;&nbsp;&nbsp;o f f i c i a l s','','','',' selected: training ==> pas d armes ==> pas d armes officials');
			var dropTraining_tournaments_personnel_patron = new TPopMenu('p a t r o n s&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s','','a_fr','misc/medievalTournament.htm#patron',' selected: training ==> pas d armes ==> pas d armes officials ==> patrons of the pas d armes');
			var dropTraining_tournaments_personnel_king = new TPopMenu('k i n g&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;a r m s','','a_fr','misc/medievalTournament.htm#king',' selected: training ==> pas d armes ==> pas d armes officials ==> king of arms');
			var dropTraining_tournaments_personnel_procession = new TPopMenu('t h e&nbsp;&nbsp;&nbsp;p r o c e s s i o n&nbsp;&nbsp;&nbsp;h e r a l d','','a_fr','misc/medievalTournament.htm#procession_herald',' selected: training ==> pas d armes ==> pas d armes officials ==> the procession herald');
			var dropTraining_tournaments_personnel_heralds = new TPopMenu('t h e&nbsp;&nbsp;&nbsp;h e r a l d s','','a_fr','misc/medievalTournament.htm#heralds',' selected: training ==> pas d armes ==> pas d armes officials ==> the heralds');
			var dropTraining_tournaments_personnel_squires = new TPopMenu('t h e&nbsp;&nbsp;&nbsp;s q u i r e s','','a_fr','misc/medievalTournament.htm#squires',' selected: training ==> pas d armes ==> pas d armes officials ==> the squires');
			var dropTraining_tournaments_personnel_marshals = new TPopMenu('t h e&nbsp;&nbsp;&nbsp;m a r s h a l s','','a_fr','misc/medievalTournament.htm#marshals',' selected: training ==> pas d armes ==> pas d armes officials ==> the marshals');
//		var dropTraining_tournaments_conducting = new TPopMenu('c o n d u c t i n g&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;t o u r n a m e n t','','a_fr','misc/medievalTournament.htm#conducting','conducting the tournament');
		var dropTraining_tournaments_ceremony = new TPopMenu('p r o t o c o l s&nbsp;&nbsp;&nbsp;and&nbsp;&nbsp;&nbsp;c e r e m o n y','','','',' selected: training ==> pas d armes ==> protocols and ceremony');
			var dropTraining_tournaments_ceremony_array = new TPopMenu('c o m b a t a n t \' s&nbsp;&nbsp;&nbsp;a c c o u t r e m e n t s','','a_fr','misc/medievalTournament.htm#array',' selected: training ==> pas d armes ==> etiquette and ceremony ==> combatants accoutrements');
			var dropTraining_tournaments_ceremony_opening = new TPopMenu('o p e n i n g&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s','','a_fr','misc/medievalTournament.htm#prior',' selected: training ==> pas d armes ==> etiquette and ceremony ==> opening the pas d armes');
			var dropTraining_tournaments_ceremony_bouts = new TPopMenu('s e t u p&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;b o u t s','','a_fr','misc/medievalTournament.htm#bouts',' selected: training ==> pas d armes ==> etiquette and ceremony ==> setup of the bouts');
			var dropTraining_tournaments_ceremony_closing = new TPopMenu('c l o s i n g&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s','','a_fr','misc/medievalTournament.htm#closing',' selected: training ==> pas d armes ==> etiquette and ceremony ==> closing the pas d armes');
//		var dropTraining_tournaments_forms = new TPopMenu('f o r m s&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;e n g a g e m e n t s','','a_fr','misc/medievalTournament.htm#forms','forms of engagements');
		var dropTraining_tournaments_victory = new TPopMenu('v i c t o r y&nbsp;&nbsp;&nbsp;c o n d i t i o n s','','a_fr','misc/medievalTournament.htm#victory',' selected: training ==> pas d armes ==> victory conditions');
		var dropTraining_tournaments_rules = new TPopMenu('r u l e s&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;e n g a g e m e n t','','a_fr','misc/medievalTournament.htm#rules',' selected: training ==> pas d armes ==> rules of engagement');
	  	var dropTraining_tournaments_armour = new TPopMenu('a&nbsp;r&nbsp;m&nbsp;o&nbsp;u&nbsp;r e d&nbsp;&nbsp;&nbsp;c o m b a t&nbsp;&nbsp;&nbsp;h a r n e s s','','a_fr','misc/equipment_body.htm#hard_armoured',' selected: training ==> pas d armes ==> armoured combat harness');
	  	var dropTraining_tournaments_armourArms = new TPopMenu('a&nbsp;r&nbsp;m&nbsp;o&nbsp;u&nbsp;r e d&nbsp;&nbsp;&nbsp;c o m b a t&nbsp;&nbsp;&nbsp;a r m s','','a_fr','misc/equipment_body.htm#armoured_arms',' selected: training ==> pas d armes ==> armoured combat arms');
//		var dropTraining_tournaments_equipment = new TPopMenu('a r m s&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;a r m o u r','','a_fr','misc/medievalTournament.htm#equipment','arms & armour');
		var dropTraining_tournaments_tournyVideos = new TPopMenu('p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s / d u e l s&nbsp;&nbsp;&nbsp;v i d e o s','','a_fr','misc/medievalTournament.htm#tournyVideos',' selected: training ==> pas d armes ==> tournament/duels videos');
//		var dropTraining_tournaments_trial = new TPopMenu('t r i a l&nbsp;&nbsp;&nbsp;b y&nbsp;&nbsp;&nbsp;c o m b a t','','a_fr','misc/medievalTournament.htm#duel',' selected: training ==> pas d armes ==> trial by combat');
		var dropTraining_tournaments_references = new TPopMenu('r e f e r e n c e s','','a_fr','misc/medievalTournament.htm#references',' selected: training ==> pas d armes ==> references');
//  		var dropTraining_tournaments_blog = new TPopMenu('<img src="images/blogger_13.jpg">&nbsp;&nbsp;&nbsp;A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;&nbsp;&nbsp;t&nbsp;o&nbsp;u&nbsp;r&nbsp;n&nbsp;a&nbsp;m&nbsp;e&nbsp;n&nbsp;t&nbsp;&nbsp;&nbsp;b&nbsp;l&nbsp;o&nbsp;g','','a_fr','http://aemma-tournament.blogspot.com','AEMMA tournament blog');
		var dropTraining_tournaments_spacer = new TPopMenu('--------------------------------------','','a_fr','','--------------------------------------');
		var dropTraining_tournaments_announcement = new TPopMenu('p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s&nbsp;&nbsp;&nbsp;a n n o u n c e m e n t','','a_fr','misc/medievalTournament_current.htm',' selected: training ==> pas d armes ==> pas d armes announcement');
		var dropTraining_tournaments_roll = new TPopMenu('p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s&nbsp;&nbsp;&nbsp;r o l l','','a_fr','misc/medievalTournament_roll_current.htm',' selected: training ==> pas d armes ==> pas d armes roll');
//		var dropTraining_tournaments_armoured_2008 = new TPopMenu('2 0 0 8&nbsp;&nbsp;&nbsp;p&nbsp;a&nbsp;s&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;s','','a_fr','misc/medievalTournament_2008.htm',' selected: training ==> pas d armes ==> 2008 pas d armes');
//	var dropTraining_newbie = new TPopMenu('n&nbsp;e&nbsp;w&nbsp;&nbsp;&nbsp;m&nbsp;e&nbsp;m&nbsp;b&nbsp;e&nbsp;r&nbsp;s&nbsp;&nbsp;&nbsp;<b>f&nbsp;r&nbsp;e&nbsp;e&nbsp;&nbsp;&nbsp;m&nbsp;o&nbsp;n&nbsp;t&nbsp;h</b>','','a_fr','images/newMemberMonth.pdf','new members free month');
	var dropTraining_trialCombat = new TPopMenu('<b>t r i a l&nbsp;&nbsp;&nbsp;b y&nbsp;&nbsp;&nbsp;c o m b a t</b>','','','',' selected: training ==> trial by combat');
		var dropTraining_trialCombat_intro = new TPopMenu('o n&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;t r i a l&nbsp;&nbsp;&nbsp;b y&nbsp;&nbsp;&nbsp;c o m b a t','','a_fr','misc/judicialDuel.htm',' selected: training ==> trial by combat ==> on the trial by combat');
	var dropTraining_unarmoured = new TPopMenu('<b>u n a r m o u r e d&nbsp;&nbsp;&nbsp;t o u r n a m e n t</b>','','','',' selected: training ==> unarmoured tournament');
		var dropTraining_unarmoured_intro = new TPopMenu('o n&nbsp;&nbsp;&nbsp;t h e&nbsp;&nbsp;&nbsp;u n a r m o u r e d&nbsp;&nbsp;&nbsp;t o u r n e y','','a_fr','misc/unarmouredTourney.htm',' selected: training ==> unarmoured tournament ==> on the unarmoured tournament');

//	var dropTraining_database = new TPopMenu('W&nbsp;M&nbsp;A&nbsp;&nbsp;&nbsp;d&nbsp;a&nbsp;t&nbsp;a&nbsp;b&nbsp;a&nbsp;s&nbsp;e','','a_fr','http://wma.411now.net/','WMA database');
//	var dropTraining_youth = new TPopMenu('y&nbsp;o&nbsp;u&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;p&nbsp;r&nbsp;o&nbsp;g&nbsp;r&nbsp;a&nbsp;m','','a_fr','misc/youthProgram.htm','youth program');

var dropKnowledgeBase = new TPopMenu('&nbsp;&nbsp;k&nbsp;n&nbsp;o&nbsp;w&nbsp;l&nbsp;e&nbsp;d&nbsp;g&nbsp;e&nbsp;b&nbsp;a&nbsp;s&nbsp;e&nbsp;&nbsp;','0','','',' selected: knowledgebase');
//  	var dropKnowledgeBase_dvd = new TPopMenu('A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;&nbsp;&nbsp;D&nbsp;V&nbsp;D&nbsp;s','','a_fr','misc/dvd.htm','AEMMA DVDs');
  	var dropKnowledgeBase_articles = new TPopMenu('a r t i c l e s','','','',' selected: knowledgebase ==> articles');
  		var dropKnowledgeBase_articles_jwma = new TPopMenu('J r n l&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;W e s t e r n&nbsp;&nbsp;&nbsp;M a r t i a l&nbsp;&nbsp;&nbsp;A r t','','address','http://jwma.ejmas.com',' selected: knowledgebase ==> articles ==> Journal of Western Martial Art');
  		var dropKnowledgeBase_articles_jmanly = new TPopMenu('J r n l&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;M a n l y&nbsp;&nbsp;&nbsp;A r t s','','address','http://jmanly.ejmas.com',' selected: knowledgebase ==> articles ==> Journal of Manly Arts');
  		var dropKnowledgeBase_articles_aemma = new TPopMenu('a r t i c l e s&nbsp;&nbsp;&nbsp;b y&nbsp;&nbsp;&nbsp;A E M M A','','a_fr','onlineResources/aemma_articles.htm',' selected: knowledgebase ==> articles ==> articles by AEMMA');
  	var dropKnowledgeBase_resources = new TPopMenu('e x t e r n a l&nbsp;&nbsp;&nbsp;&nbsp;r e s o u r c e s','','a_fr','http://jwma.ejmas.com/misc/external_resources.htm',' selected: knowledgebase ==> external resources');
  	var dropKnowledgeBase_glossary = new TPopMenu('g l o s s a r y&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;t e r m s','','a_fr','misc/glossary.html',' selected: knowledgebase ==> glossary of terms');
  	var dropKnowledgeBase_forums = new TPopMenu('H E S&nbsp;&nbsp;&nbsp;f o r u m s','','a_fr','http://forums.swordforum.com/forumdisplay.php?s=beeb9317461e0467f76291ca00caf5bb&forumid=15',' selected: knowledgebase ==> HES forums');
  	var dropKnowledgeBase_heraldry = new TPopMenu('<img src="images/rhsc_shield_tiny.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;<b>h e r a l d r y</b>','','','',' selected: knowledgebase ==> heraldry');
  		var dropKnowledgeBase_heraldry_intro = new TPopMenu('w h a t&nbsp;&nbsp;&nbsp;i s&nbsp;&nbsp;&nbsp;h e r a l d r y ?','','a_fr','http://www.heraldry.ca/misc/whatIsHeraldry.htm',' selected: knowledgebase ==> heraldry ==> what is heraldry?');
 		var dropKnowledgeBase_heraldry_misconceptions = new TPopMenu('c o m m o n&nbsp;&nbsp;&nbsp;m i s c o n c e p t i o n s','','a_fr','http://www.heraldry.ca/misc/misconceptions.htm',' selected: knowledgebase ==> heraldry ==> common misconceptions');
 		var dropKnowledgeBase_heraldry_history = new TPopMenu('h i s t o r y&nbsp;&nbsp;&nbsp;o f&nbsp;&nbsp;&nbsp;h e r a l d r y','','a_fr','http://www.heraldry.ca/misc/historyHeraldryCanada.htm',' selected: knowledgebase ==> heraldry ==> history of heraldry');
 		var dropKnowledgeBase_heraldry_books = new TPopMenu('r e c o m m e n d e d&nbsp;&nbsp;&nbsp;b o o k s','','a_fr','http://www.heraldry.ca/library/books.htm',' selected: knowledgebase ==> heraldry ==> recommended books');
 		var dropKnowledgeBase_heraldry_forums = new TPopMenu('h e r a l d r y&nbsp;&nbsp;&nbsp;f o r u m s','','a_fr','http://forums.heraldry.ca',' selected: knowledgebase ==> heraldry ==> heraldry forums');
  		var dropKnowledgeBase_heraldry_web = new TPopMenu('<img src="images/rhsc_shield_tiny.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;R&nbsp;H&nbsp;S&nbsp;C&nbsp;&nbsp;&nbsp;w&nbsp;e&nbsp;b&nbsp;s&nbsp;i&nbsp;t&nbsp;e','','address','http://www.heraldry.ca',' selected: knowledgebase ==> heraldry ==> RHSC website');
  		var dropKnowledgeBase_heraldry_blog = new TPopMenu('<img src="images/blogger_13.jpg" style="vertical-align:middle" />&nbsp;&nbsp;&nbsp;R&nbsp;H&nbsp;S&nbsp;C&nbsp;&nbsp;&nbsp;b&nbsp;l&nbsp;o&nbsp;g','','address','http://canadian-heraldry.blogspot.com',' selected: knowledgebase ==> heraldry ==> RHSC blog');
  		var dropKnowledgeBase_heraldry_face = new TPopMenu('<img src="images/logos/facebook.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;R&nbsp;H&nbsp;S&nbsp;C&nbsp;&nbsp;&nbsp;f&nbsp;a&nbsp;c&nbsp;e&nbsp;b&nbsp;o&nbsp;o&nbsp;k','','address','http://www.facebook.com/group.php?gid=35284796074',' selected: knowledgebase ==> heraldry ==> RHSC facebook');

  	var dropKnowledgeBase_projects = new TPopMenu('i n t e r n a l&nbsp;&nbsp;&nbsp;p r o j e c t s','','a_fr','misc/research_body.htm',' selected: knowledgebase ==> internal projects');
  	var dropKnowledgeBase_library = new TPopMenu('<b>o n l i n e&nbsp;&nbsp;&nbsp;&nbsp;l i b r a r y</b>','','','',' selected: knowledgebase ==> online library');
  		var dropKnowledgeBase_library_intro = new TPopMenu('o&nbsp;v&nbsp;e&nbsp;r&nbsp;v&nbsp;i&nbsp;e&nbsp;w&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;u&nbsp;s&nbsp;a&nbsp;g&nbsp;e','','a_fr','onlineResources/library_startPage.htm',' selected: knowledgebase ==> online library ==> overview & usage');
  		var dropKnowledgeBase_library_14 = new TPopMenu('1&nbsp;1&nbsp;-&nbsp;1&nbsp;4&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;i&nbsp;e&nbsp;s','','a_fr','onlineResources/library_11c_body.htm',' selected: knowledgebase ==> online library ==> 11-14th centuries');
  		var dropKnowledgeBase_library_15 = new TPopMenu('1&nbsp;5&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;y','','a_fr','onlineResources/library_15c_body.htm',' selected: knowledgebase ==> online library ==> 15th century');
  		var dropKnowledgeBase_library_16 = new TPopMenu('1&nbsp;6&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;y','','a_fr','onlineResources/library_16c_body.htm',' selected: knowledgebase ==> online library ==> 16th century');
  		var dropKnowledgeBase_library_17 = new TPopMenu('1&nbsp;7&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;y','','a_fr','onlineResources/library_17c_body.htm',' selected: knowledgebase ==> online library ==> 17th century');
  		var dropKnowledgeBase_library_18 = new TPopMenu('1&nbsp;8&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;y','','a_fr','onlineResources/library_18c_body.htm',' selected: knowledgebase ==> online library ==> 18th century');
  		var dropKnowledgeBase_library_19 = new TPopMenu('1&nbsp;9&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;y','','a_fr','onlineResources/library_19c_body.htm',' selected: knowledgebase ==> online library ==> 19th century');
  		var dropKnowledgeBase_library_20 = new TPopMenu('2&nbsp;0&nbsp;t&nbsp;h&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;y','','a_fr','onlineResources/library_20c_body.htm',' selected: knowledgebase ==> online library ==> 20th century');
  		var dropKnowledgeBase_library_21 = new TPopMenu('2&nbsp;1&nbsp;s&nbsp;t&nbsp;&nbsp;&nbsp;c&nbsp;e&nbsp;n&nbsp;t&nbsp;u&nbsp;r&nbsp;y','','a_fr','onlineResources/library_21c_body.htm',' selected: knowledgebase ==> online library ==> 21st century');
  	var dropKnowledgeBase_media = new TPopMenu('<img src="images/camcorder_15h.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;v i d e o&nbsp;&nbsp;&nbsp;l i b r a r y','','a_fr','onlineResources/media_body.php',' selected: knowledgebase ==> video library');
  	var dropKnowledgeBase_sources = new TPopMenu('m a n u s c r i p t s&nbsp;&nbsp;&nbsp;s o u r c e s','','a_fr','onlineResources/manuscriptsSources_body.htm',' selected: knowledgebase ==> manuscripts sources');
  	var dropKnowledgeBase_publications = new TPopMenu('p u b l i c a t i o n s&nbsp;&nbsp;&nbsp;( A E M M A )','','a_fr','onlineResources/publications/publications_body.htm',' selected: knowledgebase ==> publications (AEMMA)');
  	var dropKnowledgeBase_photos = new TPopMenu('a r m s&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;a r m o u r&nbsp;&nbsp;&nbsp;p h o t o&nbsp;&nbsp;&nbsp;l i b r a r y','','a_fr','misc/photo_library.htm',' selected: knowledgebase ==> arms & armour photo library');
  	var dropKnowledgeBase_plibrary = new TPopMenu('<img src="images/camera_15h.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;p h o t o&nbsp;&nbsp;&nbsp;l i b r a r y','','a_fr','onlineResources/aemma_album.htm',' selected: knowledgebase ==> photo library');

  var dropVMP = new TPopMenu('&nbsp;s&nbsp;h&nbsp;o&nbsp;p&nbsp;&nbsp;@&nbsp;&nbsp;&nbsp;A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;','0','','',' selected: shop @ AEMMA');
	var dropVMP_AEMMA = new TPopMenu('A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;&nbsp;&nbsp;s&nbsp;w&nbsp;a&nbsp;g','','a_fr','vmp/AEMMAwear/wear_main.htm',' selected: shop @ AEMMA ==> AEMMA swag');
	var dropVMP_accessories = new TPopMenu('a&nbsp;c&nbsp;c&nbsp;e&nbsp;s&nbsp;s&nbsp;o&nbsp;r&nbsp;i&nbsp;e&nbsp;s','','a_fr','vmp/accessories/accessories_main.htm',' selected: shop @ AEMMA ==> accessories');
	var dropVMP_arms = new TPopMenu('a&nbsp;r&nbsp;m&nbsp;s&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;a&nbsp;r&nbsp;m&nbsp;o&nbsp;u&nbsp;r','','a_fr','vmp/armsArmour/armour_main.htm',' selected: shop @ AEMMA ==> arms & armour');
	var dropVMP_music = new TPopMenu('a&nbsp;r&nbsp;t&nbsp;s&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;m&nbsp;u&nbsp;s&nbsp;i&nbsp;c','','a_fr','vmp/arts/arts_main.htm',' selected: shop @ AEMMA ==> arts & music');
	var dropVMP_books = new TPopMenu('b&nbsp;o&nbsp;o&nbsp;k&nbsp;s','','a_fr','vmp/books/books_main.htm',' selected: shop @ AEMMA ==> books');
	var dropVMP_buy = new TPopMenu('e - C l a s s i f i e d s','','a_fr','vmp/buy_sell/buySell_main.htm',' selected: shop @ AEMMA ==> e-Classifieds');
	var dropVMP_tours = new TPopMenu('d&nbsp;e&nbsp;s&nbsp;t&nbsp;i&nbsp;n&nbsp;a&nbsp;t&nbsp;i&nbsp;o&nbsp;n&nbsp;s&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;t&nbsp;o&nbsp;u&nbsp;r&nbsp;s','','a_fr','vmp/tours/tours_main.htm',' selected: shop @ AEMMA ==> destinations & tours');
	var dropVMP_garments = new TPopMenu('g&nbsp;a&nbsp;r&nbsp;m&nbsp;e&nbsp;n&nbsp;t&nbsp;s','','a_fr','vmp/garments/garments_main.htm',' selected: shop @ AEMMA ==> garments');
	var dropVMP_leather = new TPopMenu('l&nbsp;e&nbsp;a&nbsp;t&nbsp;h&nbsp;e&nbsp;r','','a_fr','vmp/leather/leather_main.htm',' selected: shop @ AEMMA ==> leather');
	var dropVMP_media = new TPopMenu('m&nbsp;u&nbsp;l&nbsp;t&nbsp;i&nbsp;-&nbsp;m&nbsp;e&nbsp;d&nbsp;i&nbsp;a','','a_fr','vmp/videos/videos_main.htm',' selected: shop @ AEMMA ==> multi-media');
	var dropVMP_periodicals = new TPopMenu('p&nbsp;e&nbsp;r&nbsp;i&nbsp;o&nbsp;d&nbsp;i&nbsp;c&nbsp;a&nbsp;l&nbsp;s','','a_fr','vmp/magazines/periodicals_main.htm',' selected: shop @ AEMMA ==> periodicals');
	var dropVMP_proShop = new TPopMenu('p&nbsp;r&nbsp;o&nbsp;&nbsp;&nbsp;s&nbsp;h&nbsp;o&nbsp;p','','a_fr','vmp/proShop/proShop_main.htm',' selected: shop @ AEMMA ==> pro shop');

var dropWeb = new TPopMenu('&nbsp;&nbsp;w&nbsp;e&nbsp;b&nbsp;&nbsp;&nbsp;e&nbsp;l&nbsp;e&nbsp;m&nbsp;e&nbsp;n&nbsp;t&nbsp;s&nbsp;&nbsp;','0','','',' selected: web elements');
  	var dropWeb_guestbook = new TPopMenu('g&nbsp;u&nbsp;e&nbsp;s&nbsp;t&nbsp;b&nbsp;o&nbsp;o&nbsp;k','','a_fr','guestBook/gbxx_body.htm',' selected: web elements ==> guestbook');
  	var dropWeb_blog = new TPopMenu('<img src="images/blogger_13.jpg" style="vertical-align:middle" alt="" />&nbsp;&nbsp;&nbsp;S&nbsp;w&nbsp;i&nbsp;n&nbsp;g&nbsp;i&nbsp;n&nbsp;g&nbsp;&nbsp;&nbsp;S&nbsp;w&nbsp;o&nbsp;r&nbsp;d&nbsp;s','','address','http://armizare.blogspot.com',' selected: web elements ==> Swinging Swords blog');
  	var dropWeb_blog2 = new TPopMenu('<img src="images/blogger_13.jpg" style="vertical-align:middle" alt="" />&nbsp;&nbsp;&nbsp;F&nbsp;o&nbsp;r&nbsp;z&nbsp;a&nbsp;&nbsp;&nbsp;e&nbsp;&nbsp;&nbsp;D&nbsp;e&nbsp;s&nbsp;t&nbsp;r&nbsp;e&nbsp;z&nbsp;z&nbsp;a','','address','http://forzaedestrezza.blogspot.com',' selected: web elements ==> Forze e Destrezza blog');
  	var dropWeb_youTube = new TPopMenu('<img src="images/youTube.jpg" style="vertical-align:middle" alt="" />&nbsp;&nbsp;&nbsp;A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;&nbsp;&nbsp;c&nbsp;h&nbsp;a&nbsp;n&nbsp;n&nbsp;e&nbsp;l','','address','http://ca.youtube.com/aemmachannel',' selected: web elements ==> AEMMA channel');
  	var dropWeb_facebook = new TPopMenu('<img src="images/logos/facebook.gif" style="vertical-align:middle" alt="" />&nbsp;&nbsp;&nbsp;A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;&nbsp;&nbsp;F&nbsp;a&nbsp;c&nbsp;e&nbsp;b&nbsp;o&nbsp;o&nbsp;k','','address','http://www.facebook.com/group.php?gid=36158957655',' selected: web elements ==> AEMMA Facebook');
//	var dropWeb_tournaments_blog = new TPopMenu('<img src="images/blogger_13.jpg">&nbsp;&nbsp;&nbsp;A&nbsp;E&nbsp;M&nbsp;M&nbsp;A&nbsp;&nbsp;&nbsp;t&nbsp;o&nbsp;u&nbsp;r&nbsp;n&nbsp;a&nbsp;m&nbsp;e&nbsp;n&nbsp;t&nbsp;&nbsp;&nbsp;b&nbsp;l&nbsp;o&nbsp;g','','a_fr','http://aemma-tournament.blogspot.com','AEMMA tournament blog');
  	var dropWeb_links = new TPopMenu('w&nbsp;e&nbsp;b&nbsp;&nbsp;&nbsp;l&nbsp;i&nbsp;n&nbsp;k&nbsp;s','','','',' selected: web elements ==> web links');
		var dropWeb_links_vendors = new TPopMenu('arms & armour','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#vendors',' selected: web elements ==> web links ==> arms & armour');
		var dropWeb_links_armourers = new TPopMenu('armour (historical reproductions)','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#armourers',' selected: web elements ==> web links ==> armour (historical reproductions)');
		var dropWeb_links_archery = new TPopMenu('archery supplies','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#archery',' selected: web elements ==> web links ==> archery supplies');
		var dropWeb_links_assoc = new TPopMenu('associations, federations, etc.','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#assoc',' selected: web elements ==> web links ==> associations, federations, etc.');
		var dropWeb_links_heraldry = new TPopMenu('heraldry resources','','a_fr','http://www.heraldry.ca/misc/linksherald.html',' selected: web elements ==> web links ==> heraldry resources');
		var dropWeb_links_maorg = new TPopMenu('Western martial arts schools','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#maorg',' selected: web elements ==> web links ==> Western martial arts schools');
//		var dropWeb_links_resources = new TPopMenu('medieval resources','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#resources',' selected: web elements ==> web links ==> medieval resources');
		var dropWeb_links_museums = new TPopMenu('museums & academic institutions','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#museums',' selected: web elements ==> web links ==> museums & academic institutions');
		var dropWeb_links_reenact = new TPopMenu('re-enactment groups','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#reenact',' selected: web elements ==> web links ==> re-enactment groups');
		var dropWeb_links_stage = new TPopMenu('stage combat','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#stage',' selected: web elements ==> web links ==> stage combat');
		var dropWeb_links_swords = new TPopMenu('sword smiths & distributors','','a_fr','http://jwma.ejmas.com/misc/external_links.htm#swords',' selected: web elements ==> web links ==> sword smiths & distributors');
	var dropWeb_search = new TPopMenu('s&nbsp;e&nbsp;a&nbsp;r&nbsp;c&nbsp;h&nbsp;&nbsp;&nbsp;u&nbsp;t&nbsp;i&nbsp;l&nbsp;i&nbsp;t&nbsp;y','','a_fr','misc/search_body.htm',' selected: web elements ==> search utility');
	var dropWeb_map = new TPopMenu('s&nbsp;i&nbsp;t&nbsp;e&nbsp;&nbsp;&nbsp;m&nbsp;a&nbsp;p','','a_fr','misc/siteMap.htm',' selected: web elements ==> site map');
	var dropWeb_updates = new TPopMenu('w e b s i t e&nbsp;&nbsp;&nbsp;u&nbsp;p&nbsp;d&nbsp;a&nbsp;t&nbsp;e&nbsp;s','','a_fr','misc/updates.htm',' selected: web elements ==> website updates');
	var dropWeb_spacer = new TPopMenu('--------------------------------------','','a_fr','onlineResources/lnk_body.htm','--------------------------------------');
	var dropWeb_members = new TPopMenu('s&nbsp;t&nbsp;u&nbsp;d&nbsp;e&nbsp;n&nbsp;t&nbsp;s&nbsp;/&nbsp;m&nbsp;e&nbsp;m&nbsp;b&nbsp;e&nbsp;r&nbsp;s&nbsp;&nbsp;&nbsp;o&nbsp;n&nbsp;l&nbsp;y','','a_fr','onlineResources/members/memberLogon.shtml',' selected: web elements ==> students/members only');


// ---Add Navigation Objects--------------------------------------------------------------------------------

// Navigation
drop.Add(dropHome);

drop.Add(dropAbout);
	dropAbout.Add(dropAbout_Aboutus);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_about);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_arms);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_executive);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_instructors);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_professional);
//		dropAbout_Aboutus.Add(dropAbout_Aboutus_associate);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_advisors);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_fencing);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_patrons);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_research);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_spacer);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_rules);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_disclaimer);
		dropAbout_Aboutus.Add(dropAbout_Aboutus_privacy);
//	dropAbout.Add(dropAbout_Edmonton);
	dropAbout.Add(dropAbout_Guelph);
	dropAbout.Add(dropAbout_NS);
	dropAbout.Add(dropAbout_Stratford);
//	dropAbout.Add(dropAbout_UofT);
	dropAbout.Add(dropAbout_Contact);
	dropAbout.Add(dropAbout_Schedule);
	dropAbout.Add(dropAbout_Fees);
	dropAbout.Add(dropAbout_Location_TTC);
	dropAbout.Add(dropAbout_Location_driving);
	dropAbout.Add(dropAbout_SallePhotos);
	dropAbout.Add(dropAbout_Visit);
	dropAbout.Add(dropAbout_Start);
	dropAbout.Add(dropAbout_spacer);
	dropAbout.Add(dropAbout_Affiliates);
//	dropAbout.Add(dropAbout_Associates);
	dropAbout.Add(dropAbout_Chapters);
	dropAbout.Add(dropAbout_Calendar);
	dropAbout.Add(dropAbout_FAQs);
	dropAbout.Add(dropAbout_Demos);
	dropAbout.Add(dropAbout_Presentations);
	dropAbout.Add(dropAbout_MembersRoll);
	dropAbout.Add(dropAbout_Roll);
	dropAbout.Add(dropAbout_News);
	dropAbout.Add(dropAbout_Press);

drop.Add(dropTradition);
	dropTradition.Add(dropTradition_armizare);
		dropTradition_armizare.Add(dropTradition_armizare_about);
		dropTradition_armizare.Add(dropTradition_armizare_liberi);
		dropTradition_armizare.Add(dropTradition_armizare_flos);
	dropTradition.Add(dropTradition_fechten);
		dropTradition_fechten.Add(dropTradition_fechten_about);
		dropTradition_fechten.Add(dropTradition_fechten_masters);
//	dropTradition.Add(dropTradition_rapier);
//		dropTradition_rapier.Add(dropTradition_rapier_about);

drop.Add(dropTraining);
	dropTraining.Add(dropTraining_Intro);
	dropTraining.Add(dropTraining_styles);
		dropTraining_styles.Add(dropTraining_styles_grappling);
		dropTraining_styles.Add(dropTraining_styles_dagger);
		dropTraining_styles.Add(dropTraining_styles_sword);
		dropTraining_styles.Add(dropTraining_styles_armoured);
		dropTraining_styles.Add(dropTraining_styles_pole);
		dropTraining_styles.Add(dropTraining_styles_longbow);
		dropTraining_styles.Add(dropTraining_styles_horsemanship);
		dropTraining_styles.Add(dropTraining_styles_trebuchet);
		dropTraining_styles.Add(dropTraining_styles_rapier);
	dropTraining.Add(dropTraining_rank);
		dropTraining_rank.Add(dropTraining_rank_overview);
		dropTraining_rank.Add(dropTraining_rank_recruit);
		dropTraining_rank.Add(dropTraining_rank_scholler);
		dropTraining_rank.Add(dropTraining_rank_freeScholler);
		dropTraining_rank.Add(dropTraining_rank_provost);
		dropTraining_rank.Add(dropTraining_rank_maestro);
	dropTraining.Add(dropTraining_equipment);
		dropTraining_equipment.Add(dropTraining_equipment_recruit);
		dropTraining_equipment.Add(dropTraining_equipment_scholler);
		dropTraining_equipment.Add(dropTraining_equipment_armour);
		dropTraining_equipment.Add(dropTraining_equipment_armourArms);
		dropTraining_equipment.Add(dropTraining_equipment_nomenclature);
		dropTraining_equipment.Add(dropTraining_equipment_period);
	dropTraining.Add(dropTraining_structure);
		dropTraining_structure.Add(dropTraining_structure_intro);
		dropTraining_structure.Add(dropTraining_structure_recruit);
			dropTraining_structure_recruit.Add(dropTraining_structure_recruit_principles);
			dropTraining_structure_recruit.Add(dropTraining_structure_recruit_core);
			dropTraining_structure_recruit.Add(dropTraining_structure_recruit_recruitVideos);
		dropTraining_structure.Add(dropTraining_structure_scholler);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_principlesScholler);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_schedule);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_abrazare);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_daga);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_spada);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_spadaLonga);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_arme);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_azza);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_brocchiere);
			dropTraining_structure_scholler.Add(dropTraining_structure_scholler_cavallo);
		dropTraining_structure.Add(dropTraining_structure_freeScholler);
	dropTraining.Add(dropTraining_partners);
	dropTraining.Add(dropTraining_force);
	dropTraining.Add(dropTraining_spacer);
	dropTraining.Add(dropTraining_private);
	dropTraining.Add(dropTraining_spacer);

	dropTraining.Add(dropTraining_tournaments);
		dropTraining_tournaments.Add(dropTraining_tournaments_intro);
		dropTraining_tournaments.Add(dropTraining_tournaments_planning);
		dropTraining_tournaments.Add(dropTraining_tournaments_inspection);
		dropTraining_tournaments.Add(dropTraining_tournaments_personnel);
			dropTraining_tournaments_personnel.Add(dropTraining_tournaments_personnel_patron);
			dropTraining_tournaments_personnel.Add(dropTraining_tournaments_personnel_king);
			dropTraining_tournaments_personnel.Add(dropTraining_tournaments_personnel_procession);
			dropTraining_tournaments_personnel.Add(dropTraining_tournaments_personnel_heralds);
			dropTraining_tournaments_personnel.Add(dropTraining_tournaments_personnel_squires);
			dropTraining_tournaments_personnel.Add(dropTraining_tournaments_personnel_marshals);
//		dropTraining_tournaments.Add(dropTraining_tournaments_conducting);
		dropTraining_tournaments.Add(dropTraining_tournaments_ceremony);
			dropTraining_tournaments_ceremony.Add(dropTraining_tournaments_ceremony_array);
			dropTraining_tournaments_ceremony.Add(dropTraining_tournaments_ceremony_opening);
			dropTraining_tournaments_ceremony.Add(dropTraining_tournaments_ceremony_bouts);
			dropTraining_tournaments_ceremony.Add(dropTraining_tournaments_ceremony_closing);
//		dropTraining_tournaments.Add(dropTraining_tournaments_forms);
		dropTraining_tournaments.Add(dropTraining_tournaments_victory);
		dropTraining_tournaments.Add(dropTraining_tournaments_rules);
		dropTraining_tournaments.Add(dropTraining_tournaments_armour);
		dropTraining_tournaments.Add(dropTraining_tournaments_armourArms);
//		dropTraining_tournaments.Add(dropTraining_tournaments_equipment);
		dropTraining_tournaments.Add(dropTraining_tournaments_tournyVideos);
//		dropTraining_tournaments.Add(dropTraining_tournaments_trial);
		dropTraining_tournaments.Add(dropTraining_tournaments_references);
//		dropTraining_tournaments.Add(dropTraining_tournaments_blog);
		dropTraining_tournaments.Add(dropTraining_tournaments_spacer);
		dropTraining_tournaments.Add(dropTraining_tournaments_announcement);
		dropTraining_tournaments.Add(dropTraining_tournaments_roll);
//		dropTraining_tournaments.Add(dropTraining_tournaments_armoured_2008);
	dropTraining.Add(dropTraining_trialCombat);
		dropTraining_trialCombat.Add(dropTraining_trialCombat_intro);
	dropTraining.Add(dropTraining_unarmoured);
		dropTraining_unarmoured.Add(dropTraining_unarmoured_intro);
//	dropTraining.Add(dropTraining_newbie);
//	dropTraining.Add(dropTraining_database);
//	dropTraining.Add(dropTraining_youth);

drop.Add(dropKnowledgeBase);     
//       	dropKnowledgeBase.Add(dropKnowledgeBase_dvd); 	
       	dropKnowledgeBase.Add(dropKnowledgeBase_photos);
       	dropKnowledgeBase.Add(dropKnowledgeBase_articles);
	       	dropKnowledgeBase_articles.Add(dropKnowledgeBase_articles_aemma);
	       	dropKnowledgeBase_articles.Add(dropKnowledgeBase_articles_jmanly);
	       	dropKnowledgeBase_articles.Add(dropKnowledgeBase_articles_jwma);
       	dropKnowledgeBase.Add(dropKnowledgeBase_resources);
       	dropKnowledgeBase.Add(dropKnowledgeBase_glossary);
       	dropKnowledgeBase.Add(dropKnowledgeBase_heraldry);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_intro);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_misconceptions);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_history);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_books);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_forums);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_web);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_blog);
       		dropKnowledgeBase_heraldry.Add(dropKnowledgeBase_heraldry_face);
       	dropKnowledgeBase.Add(dropKnowledgeBase_forums);
       	dropKnowledgeBase.Add(dropKnowledgeBase_projects);
       	dropKnowledgeBase.Add(dropKnowledgeBase_sources);
       	dropKnowledgeBase.Add(dropKnowledgeBase_library);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_intro);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_14);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_15);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_16);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_17);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_18);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_19);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_20);
       		dropKnowledgeBase_library.Add(dropKnowledgeBase_library_21);
       	dropKnowledgeBase.Add(dropKnowledgeBase_plibrary);
       	dropKnowledgeBase.Add(dropKnowledgeBase_publications);
       	dropKnowledgeBase.Add(dropKnowledgeBase_media);

drop.Add(dropVMP);
  	dropVMP.Add(dropVMP_AEMMA);
	dropVMP.Add(dropVMP_accessories);
	dropVMP.Add(dropVMP_arms);
	dropVMP.Add(dropVMP_music);
	dropVMP.Add(dropVMP_books);
	dropVMP.Add(dropVMP_buy);
	dropVMP.Add(dropVMP_tours);
	dropVMP.Add(dropVMP_garments);
	dropVMP.Add(dropVMP_leather);
	dropVMP.Add(dropVMP_media);
	dropVMP.Add(dropVMP_periodicals);
	dropVMP.Add(dropVMP_proShop);

drop.Add(dropWeb);
	dropWeb.Add(dropWeb_guestbook);
	dropWeb.Add(dropWeb_blog);
	dropWeb.Add(dropWeb_blog2);
	dropWeb.Add(dropWeb_youTube);
	dropWeb.Add(dropWeb_facebook);
//	dropWeb.Add(dropWeb_tournaments_blog);
	dropWeb.Add(dropWeb_links);
		dropWeb_links.Add(dropWeb_links_vendors);
		dropWeb_links.Add(dropWeb_links_armourers);
		dropWeb_links.Add(dropWeb_links_archery);
		dropWeb_links.Add(dropWeb_links_assoc);
		dropWeb_links.Add(dropWeb_links_heraldry);
		dropWeb_links.Add(dropWeb_links_maorg);
//		dropWeb_links.Add(dropWeb_links_resources);
		dropWeb_links.Add(dropWeb_links_museums);
		dropWeb_links.Add(dropWeb_links_reenact);
		dropWeb_links.Add(dropWeb_links_stage);
		dropWeb_links.Add(dropWeb_links_swords);
	dropWeb.Add(dropWeb_search);
	dropWeb.Add(dropWeb_map);
	dropWeb.Add(dropWeb_updates);
	dropWeb.Add(dropWeb_spacer);
	dropWeb.Add(dropWeb_members);

