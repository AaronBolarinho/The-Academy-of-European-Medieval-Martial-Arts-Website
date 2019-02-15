// global variables
//
var vmpWindow
var updatesWindow

// build the ticker tape display across the status bar
//
tick1 = ".....Welcome to A.E.M.M.A. - The Academy of European Medieval Martial Arts.....";
tick2 = "Visit the Royal Ontario Museum (ROM) on May 11th to see \"How a man shall be armed in the 14th century\"....";
tick3 = "5th Annual International Western Martial Arts Workshop, Toronto, October 24, 25, 26 2003.......";
//tick4 = "Click on 'Site Updates' to review revisions made to this site.......";
//ticker = tick1 + tick2 + tick3 + tick4;
ticker = tick1 + tick2 + tick3;

wait = 100;
w = self;
head = "";
tail = "";

// determine if the page is within someone's frame
// if so, then make it the top page
//
if (top != self) {
	top.location = location
	}

//
// bring up the announcement window for the virtual market place
//
function vmp() {
	if (!vmpWindow || vmpWindow.closed)
		{
		vmpWindow=window.open("vmp/vmpADD.htm","displayWindowVMP","toolbar=no,scrollbars=no,height=120,width=475")
		}
	else
		{
		// choosing update window already opened; bring it into focus
		vmpWindow.focus()
		}
} // end of function: vmp


//
// close the announcement window when leaving the home page
//
function vmpClose() {
	if (vmpWindow)
		{
		vmpWindow.close()
		}
} // end of function: vmp


function tickertape() {
setTimeout('tickertape()', wait);
head = ticker.substring(1, ticker.length);
tail = ticker.substring(0, 1);
ticker = head + tail;
w.defaultStatus = ticker;

} // end of function: tickertape


function updatesWin() {
	if (!updatesWindow || updatesWindow.closed)
		{
		updatesWindow=window.open("misc/updates.htm","displayUpdatesWindow","toolbar=no,scrollbars=yes,height=100,width=600")
		}
	else
		{
		// choosing update window already opened; bring it into focus
		updatesWindow.focus()
		}
} // end of function: updatesWin

function tickerstop() {
	w.defaultStatus = "";
	//
	// the VMP small window is closed here, rather than in the "onunload" statement
	// because in Navigator 3.0, it kept complaining about window.close() not a function
	// I think it was because the Nav 3.0 was literally checking/validating this 
	// command on startup, of course, the VMP small window doesn't exist at that point
	// till later, which is why the close statement is placed here
	//
	vmpClose()
} // end of function: tickerstop

//
// interactive menu buttons code
//
homeSwordon = new Image();
homeSwordon.src = "images/homePage_swordY.jpg";
homeSwordoff = new Image();
homeSwordoff.src = "images/homePage_sword.jpg";

homeDagaon = new Image();
homeDagaon.src = "images/homePage_dagaY.jpg";
homeDagaoff = new Image();
homeDagaoff.src = "images/homePage_daga.jpg";

homePollaxeon = new Image();
homePollaxeon.src = "images/homePage_pollaxeY.jpg";
homePollaxeoff = new Image();
homePollaxeoff.src = "images/homePage_pollaxe.jpg";

homeArmouron = new Image();
homeArmouron.src = "images/homePage_armourY.jpg";
homeArmouroff = new Image();
homeArmouroff.src = "images/homePage_armour.jpg";

homeMountedon = new Image();
homeMountedon.src = "images/homePage_mountedY.jpg";
homeMountedoff = new Image();
homeMountedoff.src = "images/homePage_mounted.jpg";

homeGrapplingon = new Image();
homeGrapplingon.src = "images/homePage_grapplingY.jpg";
homeGrapplingoff = new Image();
homeGrapplingoff.src = "images/homePage_grappling.jpg";

homeArcheryon = new Image();
homeArcheryon.src = "images/homePage_archeryY.jpg";
homeArcheryoff = new Image();
homeArcheryoff.src = "images/homePage_archery.jpg";

abouton = new Image();
abouton.src = "images/buttonH_aboutNY.jpg";
aboutoff = new Image();
aboutoff.src = "images/buttonH_aboutN.jpg";

ahfon = new Image();
ahfon.src = "images/ahfLogoSmallY.jpg";
ahfoff = new Image();
ahfoff.src = "images/ahfLogoSmall.jpg";

affiliateon = new Image();
affiliateon.src = "images/world_mapNY.jpg";
affiliateoff = new Image();
affiliateoff.src = "images/world_mapN.jpg";

calendaron = new Image();
calendaron.src = "images/old_worldY.jpg";
calendaroff = new Image();
calendaroff.src = "images/old_world.gif";

gueston = new Image();
gueston.src = "images/guestbookSignY.jpg";
guestoff = new Image();
guestoff.src = "images/guestbookSign.gif";

hmon = new Image();
hmon.src = "vmp/magazines/images/histoireMedievale/HM_logoHomePageY.jpg";
hmoff = new Image();
hmoff.src = "vmp/magazines/images/histoireMedievale/HM_logoHomePage.jpg";

imafon = new Image();
imafon.src = "images/IMAFlogo_coverY.jpg";
imafoff = new Image();
imafoff.src = "images/IMAFlogo_cover.jpg";

facton = new Image();
facton.src = "images/FACTlogo_80Y.jpg";
factoff = new Image();
factoff.src = "images/FACTlogo_80.jpg";

guelphon = new Image();
guelphon.src = "images/logo_guelphCoverY.jpg";
guelphoff = new Image();
guelphoff.src = "images/logo_guelphCover.jpg";

i2ceon = new Image();
i2ceon.src = "images/bird_tinyY.gif";
i2ceoff = new Image();
i2ceoff.src = "images/bird_tiny_trans.gif";

kidson = new Image();
kidson.src = "images/kidsProgram_80Y.jpg";
kidsoff = new Image();
kidsoff.src = "images/kidsProgram_80.jpg";

knowledgeon = new Image();
knowledgeon.src = "images/buttonH_knowledgeNY.jpg";
knowledgeoff = new Image();
knowledgeoff.src = "images/buttonH_knowledgeN.jpg";

jwmaon = new Image();
jwmaon.src = "images/logo_ejmasY.jpg";
jwmaoff = new Image();
jwmaoff.src = "images/logo_ejmas.jpg";

mediaon = new Image();
mediaon.src = "images/camcorder_multimediaY.jpg";
mediaoff = new Image();
mediaoff.src = "images/camcorder_multimedia.jpg";

ssion = new Image();
ssion.src = "images/SSIsmalllogoY.jpg";
ssioff = new Image();
ssioff.src = "images/SSIsmalllogo.jpg";

startHereon = new Image();
startHereon.src = "images/buttonH_startHereY.jpg";
startHereoff = new Image();
startHereoff.src = "images/buttonH_startHere.jpg";

trainingon = new Image();
trainingon.src = "images/buttonH_trainingNY.jpg";
trainingoff = new Image();
trainingoff.src = "images/buttonH_trainingN.jpg";

ston = new Image();
ston.src = "images/SSDAffiliateY.jpg";
stoff = new Image();
stoff.src = "images/SSDAffiliate.jpg";

vmpon = new Image();
vmpon.src = "images/buttonH_virtualmpNY.jpg";
vmpoff = new Image();
vmpoff.src = "images/buttonH_virtualmpN.jpg";

webStuffon = new Image();
webStuffon.src = "images/buttonH_webStuffNY.jpg";
webStuffoff = new Image();
webStuffoff.src = "images/buttonH_webStuffN.jpg";

eClassifiedon = new Image();
eClassifiedon.src = "images/index2_eClassifiedY.gif";
eClassifiedoff = new Image();
eClassifiedoff.src = "images/index2_eClassified.gif";
//
// the functions that will flip the images depending upon the mouse action
//
function m1(gifName) {
        imgOn = eval(gifName + "on.src");
        document [gifName].src = imgOn;
}

function m0(gifName) {
        imgOff = eval(gifName + "off.src");
        document [gifName].src = imgOff;
}
function showblurb(image) {
        //For navigation mouse-overs, bottom-left of the page
        document.images[7].src = "images/buttonH_" + image + ".gif";
}
