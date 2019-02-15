// global variables
//
var vmpWindow
var updatesWindow

// build the ticker tape display across the status bar
//
tick1 = ".....Welcome to A.E.M.M.A. - The Academy of European Medieval Martial Arts.....";
tick2 = "AEMMA's Virtual Market Place is open for business, check it out....";
tick3 = "Check out the Warrior-to-Warrior Forum and Guest book....";
tick4 = "Click on 'Site Updates' to review revisions made to this site....";
ticker = tick1 + tick2 + tick3 + tick4;
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
abouton.src = "images/buttonH_aboutY.gif";
aboutoff = new Image();
aboutoff.src = "images/buttonH_about.gif";
affiliateson = new Image();
affiliateson.src = "images/buttonH_affiliatesY.gif";
affiliatesoff = new Image();
affiliatesoff.src = "images/buttonH_affiliates.gif";
contacton = new Image();
contacton.src = "images/buttonH_contactY.gif";
contactoff = new Image();
contactoff.src = "images/buttonH_contact.gif";
calgaryon = new Image();
calgaryon.src = "images/buttonH_calgaryY.gif";
calgaryoff = new Image();
calgaryoff.src = "images/buttonH_calgary.gif";
gueston = new Image();
gueston.src = "images/buttonH_guestY.gif";
guestoff = new Image();
guestoff.src = "images/buttonH_guest.gif";
homeon = new Image();
homeon.src = "images/buttonH_homeY.gif";
homeoff = new Image();
homeoff.src = "images/buttonH_home.gif";
libraryon = new Image();
libraryon.src = "images/buttonH_libraryY.gif";
libraryoff = new Image();
libraryoff.src = "images/buttonH_library.gif";
linkson = new Image();
linkson.src = "images/buttonH_linksY.gif";
linksoff = new Image();
linksoff.src = "images/buttonH_links.gif";
ringon = new Image();
ringon.src = "images/buttonH_ringY.gif";
ringoff = new Image();
ringoff.src = "images/buttonH_ring.gif";
mapon = new Image();
mapon.src = "images/buttonH_mapY.gif";
mapoff = new Image();
mapoff.src = "images/buttonH_map.gif";
membershipon = new Image();
membershipon.src = "images/buttonH_membershipY.gif";
membershipoff = new Image();
membershipoff.src = "images/buttonH_membership.gif";
newson = new Image();
newson.src = "images/buttonH_newsY.gif";
newsoff = new Image();
newsoff.src = "images/buttonH_news.gif";
researchon = new Image();
researchon.src = "images/buttonH_researchY.gif";
researchoff = new Image();
researchoff.src = "images/buttonH_research.gif";
whitePaperson = new Image();
whitePaperson.src = "images/buttonH_rPapersY.gif";
whitePapersoff = new Image();
whitePapersoff.src = "images/buttonH_rPapers.gif";
searchon = new Image();
searchon.src = "images/buttonH_searchY.gif";
searchoff = new Image();
searchoff.src = "images/buttonH_search.gif";
trainingon = new Image();
trainingon.src = "images/buttonH_trainingY.gif";
trainingoff = new Image();
trainingoff.src = "images/buttonH_training.gif";
updateson = new Image();
updateson.src = "images/buttonH_updatesY.gif";
updatesoff = new Image();
updatesoff.src = "images/buttonH_updates.gif";
warrioron = new Image();
warrioron.src = "images/buttonH_w2wY.gif";
warrioroff = new Image();
warrioroff.src = "images/buttonH_w2w.gif";
bullon = new Image();
bullon.src = "images/buttonH_bullY.gif";
bulloff = new Image();
bulloff.src = "images/buttonH_bull.gif";
vmpon = new Image();
vmpon.src = "images/buttonH_vmpY.gif";
vmpoff = new Image();
vmpoff.src = "images/buttonH_vmp.gif";
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