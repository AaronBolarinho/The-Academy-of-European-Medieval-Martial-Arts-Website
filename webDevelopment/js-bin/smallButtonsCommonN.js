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
abouton.src = "../images/button_aboutNY.gif";
aboutoff = new Image();
aboutoff.src = "../images/button_aboutN.gif";
aboutOon = new Image();
aboutOon.src = "../images/button_aboutNY.gif";
aboutOoff = new Image();
aboutOoff.src = "../images/button_aboutNO.gif";

aboutHon = new Image();
aboutHon.src = "../images/button_aboutNheaderY.gif";
aboutHoff = new Image();
aboutHoff.src = "../images/button_aboutNheader.gif";
aboutHOon = new Image();
aboutHOon.src = "../images/button_aboutNheaderY.gif";
aboutHOoff = new Image();
aboutHOoff.src = "../images/button_aboutNheaderO.gif";

articleson = new Image();
articleson.src = "../images/button_articlesNY.gif";
articlesoff = new Image();
articlesoff.src = "../images/button_articlesN.gif";
articlesOon = new Image();
articlesOon.src = "../images/button_articlesNY.gif";
articlesOoff = new Image();
articlesOoff.src = "../images/button_articlesNO.gif";


affiliateson = new Image();
affiliateson.src = "../images/button_affiliatesNY.gif";
affiliatesoff = new Image();
affiliatesoff.src = "../images/button_affiliatesN.gif";
affiliatesOon = new Image();
affiliatesOon.src = "../images/button_affiliatesNY.gif";
affiliatesOoff = new Image();
affiliatesOoff.src = "../images/button_affiliatesNO.gif";

associateson = new Image();
associateson.src = "../images/button_associateY.gif";
associatesoff = new Image();
associatesoff.src = "../images/button_associate.gif";
associatesOon = new Image();
associatesOon.src = "../images/button_associateY.gif";
associatesOoff = new Image();
associatesOoff.src = "../images/button_associateO.gif";

bioson = new Image();
bioson.src = "../images/button_biosNY.gif";
biosoff = new Image();
biosoff.src = "../images/button_biosN.gif";
biosOon = new Image();
biosOon.src = "../images/button_biosNY.gif";
biosOoff = new Image();
biosOoff.src = "../images/button_biosNO.gif";

eventson = new Image();
eventson.src = "../images/button_eventsNY.gif";
eventsoff = new Image();
eventsoff.src = "../images/button_eventsN.gif";
eventsOon = new Image();
eventsOon.src = "../images/button_eventsNY.gif";
eventsOoff = new Image();
eventsOoff.src = "../images/button_eventsNO.gif";

chapterson = new Image();
chapterson.src = "../images/button_chaptersNY.gif";
chaptersoff = new Image();
chaptersoff.src = "../images/button_chaptersN.gif";
chaptersOon = new Image();
chaptersOon.src = "../images/button_chaptersNY.gif";
chaptersOoff = new Image();
chaptersOoff.src = "../images/button_chaptersNO.gif";

contacton = new Image();
contacton.src = "../images/button_contactNY.gif";
contactoff = new Image();
contactoff.src = "../images/button_contactN.gif";
contactOon = new Image();
contactOon.src = "../images/button_contactNY.gif";
contactOoff = new Image();
contactOoff.src = "../images/button_contactNO.gif";

equipmenton = new Image();
equipmenton.src = "../images/button_equipmentNY.gif";
equipmentoff = new Image();
equipmentoff.src = "../images/button_equipmentN.gif";
equipmentOon = new Image();
equipmentOon.src = "../images/button_equipmentNY.gif";
equipmentOoff = new Image();
equipmentOoff.src = "../images/button_equipmentNO.gif";

faqson = new Image();
faqson.src = "../images/button_faqsNY.gif";
faqsoff = new Image();
faqsoff.src = "../images/button_faqsN.gif";
faqsOon = new Image();
faqsOon.src = "../images/button_faqsNY.gif";
faqsOoff = new Image();
faqsOoff.src = "../images/button_faqsNO.gif";

forumson = new Image();
forumson.src = "../images/button_forumsNY.gif";
forumsoff = new Image();
forumsoff.src = "../images/button_forumsN.gif";
forumsOon = new Image();
forumsOon.src = "../images/button_forumsNY.gif";
forumsOoff = new Image();
forumsOoff.src = "../images/button_forumsNO.gif";

guestBookon = new Image();
guestBookon.src = "../images/button_guestBookNY.gif";
guestBookoff = new Image();
guestBookoff.src = "../images/button_guestBookN.gif";
guestBookOon = new Image();
guestBookOon.src = "../images/button_guestBookNY.gif";
guestBookOoff = new Image();
guestBookOoff.src = "../images/button_guestBookNO.gif";

guestbkon = new Image();
guestbkon.src = "../images/guestbookSignY.jpg";
guestbkoff = new Image();
guestbkoff.src = "../images/guestbookSign.gif";


homeon = new Image();
homeon.src = "../images/button_homeNY.gif";
homeoff = new Image();
homeoff.src = "../images/button_homeN.gif";

knowledgeon = new Image();
knowledgeon.src = "../images/button_knowledgeBaseNY.gif";
knowledgeoff = new Image();
knowledgeoff.src = "../images/button_knowledgeBaseN.gif";
knowledgeOon = new Image();
knowledgeOon.src = "../images/button_knowledgeBaseNY.gif";
knowledgeOoff = new Image();
knowledgeOoff.src = "../images/button_knowledgeBaseNO.gif";

libraryon = new Image();
libraryon.src = "../images/button_libraryNY.gif";
libraryoff = new Image();
libraryoff.src = "../images/button_libraryN.gif";
libraryOon = new Image();
libraryOon.src = "../images/button_libraryNY.gif";
libraryOoff = new Image();
libraryOoff.src = "../images/button_libraryNO.gif";

linkson = new Image();
linkson.src = "../images/button_linksNY.gif";
linksoff = new Image();
linksoff.src = "../images/button_linksN.gif";
linksOon = new Image();
linksOon.src = "../images/button_linksNY.gif";
linksOoff = new Image();
linksOoff.src = "../images/button_linksNO.gif";

partnerson = new Image();
partnerson.src = "../images/button_partnersNY.gif";
partnersoff = new Image();
partnersoff.src = "../images/button_partnersN.gif";
partnersOon = new Image();
partnersOon.src = "../images/button_partnersNY.gif";
partnersOoff = new Image();
partnersOoff.src = "../images/button_partnersNO.gif";

ringon = new Image();
ringon.src = "../images/button_ringsNY.gif";
ringoff = new Image();
ringoff.src = "../images/button_ringsN.gif";
ringOon = new Image();
ringOon.src = "../images/button_ringsNY.gif";
ringOoff = new Image();
ringOoff.src = "../images/button_ringsNO.gif";

rankson = new Image();
rankson.src = "../images/button_ranksNY.gif";
ranksoff = new Image();
ranksoff.src = "../images/button_ranksN.gif";
ranksOon = new Image();
ranksOon.src = "../images/button_ranksNY.gif";
ranksOoff = new Image();
ranksOoff.src = "../images/button_ranksNO.gif";

siteMapon = new Image();
siteMapon.src = "../images/button_siteMapNY.gif";
siteMapoff = new Image();
siteMapoff.src = "../images/button_siteMapN.gif";
siteMapOon = new Image();
siteMapOon.src = "../images/button_siteMapNY.gif";
siteMapOoff = new Image();
siteMapOoff.src = "../images/button_siteMapNO.gif";

multiMediaon = new Image();
multiMediaon.src = "../images/button_multiMediaNY.gif";
multiMediaoff = new Image();
multiMediaoff.src = "../images/button_multiMediaN.gif";
multiMediaOon = new Image();
multiMediaOon.src = "../images/button_multiMediaNY.gif";
multiMediaOoff = new Image();
multiMediaOoff.src = "../images/button_multiMediaNO.gif";

membershipon = new Image();
membershipon.src = "../images/button_scheduleFeesLocationY.gif";
membershipoff = new Image();
membershipoff.src = "../images/button_scheduleFeesLocation.gif";
membershipOon = new Image();
membershipOon.src = "../images/button_scheduleFeesLocationY.gif";
membershipOoff = new Image();
membershipOoff.src = "../images/button_scheduleFeesLocationO.gif";

newson = new Image();
newson.src = "../images/button_newsNY.gif";
newsoff = new Image();
newsoff.src = "../images/button_newsN.gif";
newsOon = new Image();
newsOon.src = "../images/button_newsNY.gif";
newsOoff = new Image();
newsOoff.src = "../images/button_newsNO.gif";

publicationson = new Image();
publicationson.src = "../images/button_publicationsNY.gif";
publicationsoff = new Image();
publicationsoff.src = "../images/button_publicationsN.gif";
publicationsOon = new Image();
publicationsOon.src = "../images/button_publicationsNY.gif";
publicationsOoff = new Image();
publicationsOoff.src = "../images/button_publicationsNO.gif";

projectson = new Image();
projectson.src = "../images/button_projectsNY.gif";
projectsoff = new Image();
projectsoff.src = "../images/button_projectsN.gif";
projectsOon = new Image();
projectsOon.src = "../images/button_projectsNY.gif";
projectsOoff = new Image();
projectsOoff.src = "../images/button_projectsNO.gif";

resourceson = new Image();
resourceson.src = "../images/button_resourcesNY.gif";
resourcesoff = new Image();
resourcesoff.src = "../images/button_resourcesN.gif";
resourcesOon = new Image();
resourcesOon.src = "../images/button_resourcesNY.gif";
resourcesOoff = new Image();
resourcesOoff.src = "../images/button_resourcesNO.gif";

sourceson = new Image();
sourceson.src = "../images/button_sourcesNY.gif";
sourcesoff = new Image();
sourcesoff.src = "../images/button_sourcesN.gif";
sourcesOon = new Image();
sourcesOon.src = "../images/button_sourcesNY.gif";
sourcesOoff = new Image();
sourcesOoff.src = "../images/button_sourcesNO.gif";

tournamentson = new Image();
tournamentson.src = "../images/button_tournamentsNY.gif";
tournamentsoff = new Image();
tournamentsoff.src = "../images/button_tournamentsN.gif";
tournamentsOon = new Image();
tournamentsOon.src = "../images/button_tournamentsNY.gif";
tournamentsOoff = new Image();
tournamentsOoff.src = "../images/button_tournamentsNO.gif";

searchon = new Image();
searchon.src = "../images/button_searchNY.gif";
searchoff = new Image();
searchoff.src = "../images/button_searchN.gif";
searchOon = new Image();
searchOon.src = "../images/button_searchNY.gif";
searchOoff = new Image();
searchOoff.src = "../images/button_searchNO.gif";

trainingon = new Image();
trainingon.src = "../images/button_trainingNY.gif";
trainingoff = new Image();
trainingoff.src = "../images/button_trainingN.gif";
trainingOon = new Image();
trainingOon.src = "../images/button_trainingNY.gif";
trainingOoff = new Image();
trainingOoff.src = "../images/button_trainingNO.gif";

updateson = new Image();
updateson.src = "../images/button_updatesNY.gif";
updatesoff = new Image();
updatesoff.src = "../images/button_updatesN.gif";
updatesOon = new Image();
updatesOon.src = "../images/button_updatesNY.gif";
updatesOoff = new Image();
updatesOoff.src = "../images/button_updatesNO.gif";

bulletinsRegon = new Image();
bulletinsRegon.src = "../images/button_bulletinsRegY.gif";
bulletinsRegoff = new Image();
bulletinsRegoff.src = "../images/button_bulletinsReg.gif";

vmpon = new Image();
vmpon.src = "../images/button_virtualmpNY.gif";
vmpoff = new Image();
vmpoff.src = "../images/button_virtualmpN.gif";
vmpOon = new Image();
vmpOon.src = "../images/button_virtualmpNY.gif";
vmpOoff = new Image();
vmpOoff.src = "../images/button_virtualmpNO.gif";

webStuffon = new Image();
webStuffon.src = "../images/button_webStuffNY.gif";
webStuffoff = new Image();
webStuffoff.src = "../images/button_webStuffN.gif";
webStuffOon = new Image();
webStuffOon.src = "../images/button_webStuffNY.gif";
webStuffOoff = new Image();
webStuffOoff.src = "../images/button_webStuffNO.gif";

wmadbon = new Image();
wmadbon.src = "../images/button_wmadbY.gif";
wmadboff = new Image();
wmadboff.src = "../images/button_wmadb.gif";
wmadbOon = new Image();
wmadbOon.src = "../images/button_wmadbY.gif";
wmadbOoff = new Image();
wmadbOoff.src = "../images/button_wmadbO.gif";

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
