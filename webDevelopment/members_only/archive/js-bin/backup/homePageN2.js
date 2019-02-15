//
// change tracking
//
//====================================================================
// Dec 19, 2003 - added guelph and halifax buttons to home page
//

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
homeSwordon.src = "images/navigation/homePage_swordY.jpg";
homeSwordoff = new Image();
homeSwordoff.src = "images/navigation/homePage_sword.jpg";

homeDagaon = new Image();
homeDagaon.src = "images/navigation/homePage_dagaY.jpg";
homeDagaoff = new Image();
homeDagaoff.src = "images/navigation/homePage_daga.jpg";

homePollaxeon = new Image();
homePollaxeon.src = "images/navigation/homePage_pollaxeY.jpg";
homePollaxeoff = new Image();
homePollaxeoff.src = "images/navigation/homePage_pollaxe.jpg";

homeArmouron = new Image();
homeArmouron.src = "images/navigation/homePage_armourY.jpg";
homeArmouroff = new Image();
homeArmouroff.src = "images/navigation/homePage_armour.jpg";

homeMountedon = new Image();
homeMountedon.src = "images/navigation/homePage_mountedY.jpg";
homeMountedoff = new Image();
homeMountedoff.src = "images/navigation/homePage_mounted.jpg";


homeGrapplingon = new Image();
homeGrapplingon.src = "images/navigation/homePage_grapplingY.jpg";
homeGrapplingoff = new Image();
homeGrapplingoff.src = "images/navigation/homePage_grappling.jpg";

homeArcheryon = new Image();
homeArcheryon.src = "images/navigation/homePage_archeryY.jpg";
homeArcheryoff = new Image();
homeArcheryoff.src = "images/navigation/homePage_archery.jpg";

homeTrebon = new Image();
homeTrebon.src = "images/navigation/homePage_trebuchetY.jpg";
homeTreboff = new Image();
homeTreboff.src = "images/navigation/homePage_trebuchet.jpg";

abouton = new Image();
abouton.src = "images/navigation/buttonH_gradientY_about.jpg";
aboutoff = new Image();
aboutoff.src = "images/navigation/buttonH_gradient_about.jpg";

ahfon = new Image();
ahfon.src = "images/ahfLogoSmallY.jpg";
ahfoff = new Image();
ahfoff.src = "images/ahfLogoSmall.jpg";

affiliateon = new Image();
affiliateon.src = "images/navigation/world_mapNY.jpg";
affiliateoff = new Image();
affiliateoff.src = "images/navigation/world_mapN.jpg";

beachballon = new Image();
beachballon.src = "images/armouredBeachMinusBall_75h.jpg";
beachballoff = new Image();
beachballoff.src = "images/armouredBeachBall_75h.jpg";

calendaron = new Image();
calendaron.src = "images/old_worldY.jpg";
calendaroff = new Image();
calendaroff.src = "images/old_world.gif";

gueston = new Image();
gueston.src = "images/navigation/guestbookSignY.jpg";
guestoff = new Image();
guestoff.src = "images/navigation/guestbookSign.gif";

edmontonHon = new Image();
edmontonHon.src = "images/navigation/buttonH_gradientY_edmonton.jpg";
edmontonHoff = new Image();
edmontonHoff.src = "images/navigation/buttonH_gradient_edmonton.jpg";

guelphHon = new Image();
guelphHon.src = "images/navigation/buttonH_gradientY_guelph.jpg";
guelphHoff = new Image();
guelphHoff.src = "images/navigation/buttonH_gradient_guelph.jpg";

placeHolderHon = new Image();
placeHolderHon.src = "images/navigation/buttonH_gradient_placeHolderY.jpg";
placeHolderHoff = new Image();
placeHolderHoff.src = "images/navigation/buttonH_gradient_placeHolder.jpg";

novaScotiaHon = new Image();
novaScotiaHon.src = "images/navigation/buttonH_gradientY_NS.jpg";
novaScotiaHoff = new Image();
novaScotiaHoff.src = "images/navigation/buttonH_gradient_NS.jpg";

uoftHon = new Image();
uoftHon.src = "images/navigation/buttonH_gradientY_uoft.jpg";
uoftHoff = new Image();
uoftHoff.src = "images/navigation/buttonH_gradient_uoft.jpg";

hmon = new Image();
hmon.src = "vmp/magazines/images/histoireMedievale/HM_logoHomePageY.jpg";
hmoff = new Image();
hmoff.src = "vmp/magazines/images/histoireMedievale/HM_logoHomePage.jpg";

imafon = new Image();
imafon.src = "images/IMAFlogo_coverY.jpg";
imafoff = new Image();
imafoff.src = "images/IMAFlogo_cover.jpg";

fact75on = new Image();
fact75on.src = "images/navigation/FACTlogo_75Y.jpg";
fact75off = new Image();
fact75off.src = "images/navigation/FACTlogo_75.jpg";

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
knowledgeon.src = "images/navigation/buttonH_gradientY_library.jpg";
knowledgeoff = new Image();
knowledgeoff.src = "images/navigation/buttonH_gradient_library.jpg";

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
startHereon.src = "images/navigation/buttonH_gradientY_visitors.jpg";
startHereoff = new Image();
startHereoff.src = "images/navigation/buttonH_gradient_visitors.jpg";

trainingon = new Image();
trainingon.src = "images/navigation/buttonH_gradientY_training.jpg";
trainingoff = new Image();
trainingoff.src = "images/navigation/buttonH_gradient_training.jpg";

ston = new Image();
ston.src = "images/SSDAffiliateY.jpg";
stoff = new Image();
stoff.src = "images/SSDAffiliate.jpg";

vmpon = new Image();
vmpon.src = "images/navigation/buttonH_gradientY_vmp.jpg";
vmpoff = new Image();
vmpoff.src = "images/navigation/buttonH_gradient_vmp.jpg";

webStuffon = new Image();
webStuffon.src = "images/navigation/buttonH_gradientY_web.jpg";
webStuffoff = new Image();
webStuffoff.src = "images/navigation/buttonH_gradient_web.jpg";

eClassifiedon = new Image();
eClassifiedon.src = "images/navigation/index2_eClassifiedY.gif";
eClassifiedoff = new Image();
eClassifiedoff.src = "images/navigation/index2_eClassified.gif";
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
        document.images[17].src = "images/navigation/buttonH_" + image + ".jpg";
}
