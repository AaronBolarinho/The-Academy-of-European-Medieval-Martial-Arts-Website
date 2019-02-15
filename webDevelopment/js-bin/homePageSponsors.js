// global variables
//
var vmpWindow
var updatesWindow

// build the ticker tape display across the status bar
//
tick1 = ".....Welcome to A.E.M.M.A. - The Academy of European Medieval Martial Arts.....";
tick2 = "Check out Histoire Médiévale magazine in the Virtual Market Place....";
//tick3 = "Check out the Warrior-to-Warrior Forum and Guest book....";
//tick4 = "Click on 'Site Updates' to review revisions made to this site....";
//ticker = tick1 + tick2 + tick3 + tick4;
ticker = tick1 + tick2;

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
abouton = new Image();
abouton.src = "images/buttonH_aboutNY.jpg";
aboutoff = new Image();
aboutoff.src = "images/buttonH_aboutN.jpg";

ahfon = new Image();
ahfon.src = "images/ahfLogoSmallY.gif";
ahfoff = new Image();
ahfoff.src = "images/ahfLogoSmall.gif";

excon = new Image();
excon.src = "images/logo_excaliborY.jpg";
excoff = new Image();
excoff.src = "images/logo_excalibor.jpg";

gueston = new Image();
gueston.src = "images/guestbookY.gif";
guestoff = new Image();
guestoff.src = "images/guestbook.gif";

hmon = new Image();
hmon.src = "vmp/magazines/images/histoireMedievale/HM_logoHomePageY.jpg";
hmoff = new Image();
hmoff.src = "vmp/magazines/images/histoireMedievale/HM_logoHomePage.jpg";

imafon = new Image();
imafon.src = "images/IMAFlogo_coverY.jpg";
imafoff = new Image();
imafoff.src = "images/IMAFlogo_cover.jpg";

i2ceon = new Image();
i2ceon.src = "images/bird_tinyY.gif";
i2ceoff = new Image();
i2ceoff.src = "images/bird_tiny.gif";

knowledgeon = new Image();
knowledgeon.src = "images/buttonH_knowledgeNY.jpg";
knowledgeoff = new Image();
knowledgeoff.src = "images/buttonH_knowledgeN.jpg";

mbon = new Image();
mbon.src = "images/logo_mbY.jpg";
mboff = new Image();
mboff.src = "images/logo_mb.jpg";

mediaon = new Image();
mediaon.src = "images/camcorder74Y.gif";
mediaoff = new Image();
mediaoff.src = "images/camcorder74.gif";

mrlon = new Image();
mrlon.src = "images/logo_museumReplicasY.gif";
mrloff = new Image();
mrloff.src = "images/logo_museumReplicas.gif";

mton = new Image();
mton.src = "images/logo_medievalTimesY.jpg";
mtoff = new Image();
mtoff.src = "images/logo_medievalTimes.jpg";

orfon = new Image();
orfon.src = "images/logo_onRenFestY.jpg";
orfoff = new Image();
orfoff.src = "images/logo_onRenFest.jpg";


ppon = new Image();
ppon.src = "images/logo_pantherPrimitivesY.jpg";
ppoff = new Image();
ppoff.src = "images/logo_pantherPrimitives.jpg";

ptaon = new Image();
ptaon.src = "images/logo_pasttentsamericaY.gif";
ptaoff = new Image();
ptaoff.src = "images/logo_pasttentsamerica.gif";

renon = new Image();
renon.src = "images/logo_renstoreY.jpg";
renoff = new Image();
renoff.src = "images/logo_renstore.jpg";

ssion = new Image();
ssion.src = "images/SSIsmalllogoY.jpg";
ssioff = new Image();
ssioff.src = "images/SSIsmalllogo.jpg";

trainingon = new Image();
trainingon.src = "images/buttonH_trainingNY.jpg";
trainingoff = new Image();
trainingoff.src = "images/buttonH_trainingN.jpg";

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
        document.images[9].src = "images/buttonH_" + image + ".gif";
}