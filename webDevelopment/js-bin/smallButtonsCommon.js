var newWindow
var bullWindow
function updateHTML() {
	if (!newWindow || newWindow.closed){
		newWindow=window.open("../misc/updates.htm","displayWindow","toolbar=no,scrollbars=yes,height=300,width=600") }
	else {
		// choosing update window already opened; bring it into focus
		newWindow.focus() }
}
function bulletinsHTML() {
	if (!bullWindow || bullWindow.closed) {
		bullWindow=window.open("../bulletinReg.htm","displayWindowBull","toolbar=no,scrollbars=yes,height=139,width=600")}
	else {
		// choosing bulletin window already opened; bring it into focus
		bullWindow.focus() }
}
//
// code that deals with mouseovers and mouseout for the button images
// define the button image definitions
//
abouton = new Image();
abouton.src = "../images/button_aboutY.gif";
aboutoff = new Image();
aboutoff.src = "../images/button_about.gif";
affiliateson = new Image();
affiliateson.src = "../images/button_affiliatesY.gif";
affiliatesoff = new Image();
affiliatesoff.src = "../images/button_affiliates.gif";
andragogyon = new Image();
andragogyon.src = "../images/button_andragogyY.gif";
andragogyoff = new Image();
andragogyoff.src = "../images/button_andragogy.gif";
calendaron = new Image();
calendaron.src = "../images/button_calendarY.gif";
calendaroff = new Image();
calendaroff.src = "../images/button_calendar.gif";
chapterson = new Image();
chapterson.src = "../images/button_chaptersY.gif";
chaptersoff = new Image();
chaptersoff.src = "../images/button_chapters.gif";
contacton = new Image();
contacton.src = "../images/button_contactY.gif";
contactoff = new Image();
contactoff.src = "../images/button_contact.gif";
faqson = new Image();
faqson.src = "../images/button_faqsY.gif";
faqsoff = new Image();
faqsoff.src = "../images/button_faqs.gif";
gueston = new Image();
gueston.src = "../images/button_guestY.gif";
guestoff = new Image();
guestoff.src = "../images/button_guest.gif";
homeon = new Image();
homeon.src = "../images/button_homeY.gif";
homeoff = new Image();
homeoff.src = "../images/button_home.gif";
libraryon = new Image();
libraryon.src = "../images/button_libraryY.gif";
libraryoff = new Image();
libraryoff.src = "../images/button_library.gif";
linkson = new Image();
linkson.src = "../images/button_linksY.gif";
linksoff = new Image();
linksoff.src = "../images/button_links.gif";
ringon = new Image();
ringon.src = "../images/button_ringY.gif";
ringoff = new Image();
ringoff.src = "../images/button_ring.gif";
manuscriptson = new Image();
manuscriptson.src = "../images/button_manuscriptsY.gif";
manuscriptsoff = new Image();
manuscriptsoff.src = "../images/button_manuscripts.gif";
mapon = new Image();
mapon.src = "../images/button_mapY.gif";
mapoff = new Image();
mapoff.src = "../images/button_map.gif";
mediaon = new Image();
mediaon.src = "../images/button_mediaY.gif";
mediaoff = new Image();
mediaoff.src = "../images/button_media.gif";
membershipon = new Image();
membershipon.src = "../images/button_membershipY.gif";
membershipoff = new Image();
membershipoff.src = "../images/button_membership.gif";
mmafon = new Image();
mmafon.src = "../images/button_mmafY.gif";
mmafoff = new Image();
mmafoff.src = "../images/button_mmaf.gif";
ndfon = new Image();
ndfon.src = "../images/button_ndfY.gif";
ndfoff = new Image();
ndfoff.src = "../images/button_ndf.gif";
newson = new Image();
newson.src = "../images/button_newsY.gif";
newsoff = new Image();
newsoff.src = "../images/button_news.gif";
publicationson = new Image();
publicationson.src = "../images/button_publicationsY.gif";
publicationsoff = new Image();
publicationsoff.src = "../images/button_publications.gif";
researchon = new Image();
researchon.src = "../images/button_researchY.gif";
researchoff = new Image();
researchoff.src = "../images/button_research.gif";
resourceson = new Image();
resourceson.src = "../images/button_resourcesY.gif";
resourcesoff = new Image();
resourcesoff.src = "../images/button_resources.gif";
whitePaperson = new Image();
whitePaperson.src = "../images/button_rPapersY.gif";
whitePapersoff = new Image();
whitePapersoff.src = "../images/button_rPapers.gif";
searchon = new Image();
searchon.src = "../images/button_searchY.gif";
searchoff = new Image();
searchoff.src = "../images/button_search.gif";
tournamenton = new Image();
tournamenton.src = "../images/button_tournamentY.gif";
tournamentoff = new Image();
tournamentoff.src = "../images/button_tournament.gif";
trainingon = new Image();
trainingon.src = "../images/button_trainingY.gif";
trainingoff = new Image();
trainingoff.src = "../images/button_training.gif";
updateson = new Image();
updateson.src = "../images/button_updatesY.gif";
updatesoff = new Image();
updatesoff.src = "../images/button_updates.gif";
warrioron = new Image();
warrioron.src = "../images/button_warriorY.gif";
warrioroff = new Image();
warrioroff.src = "../images/button_warrior.gif";
bulletinsRegon = new Image();
bulletinsRegon.src = "../images/button_bulletinsRegY.gif";
bulletinsRegoff = new Image();
bulletinsRegoff.src = "../images/button_bulletinsReg.gif";
vmpon = new Image();
vmpon.src = "../images/button_vmpY.gif";
vmpoff = new Image();
vmpoff.src = "../images/button_vmp.gif";

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
