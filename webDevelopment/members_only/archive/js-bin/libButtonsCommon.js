//
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

// code that deals with mouseovers and mouseout for the button images
// define the button image definitions
//
shieldon = new Image();
shieldon.src = "../images/swordShield2.gif";
shieldoff = new Image();
shieldoff.src = "../images/swordShield1.gif";

c11on = new Image();
c11on.src = "../images/navigation/button_lib_11_14c_gold_grad.jpg";
c11off = new Image();
c11off.src = "../images/navigation/button_lib_11_14c_purple_grad.jpg";
c11Oon = new Image();
c11Oon.src = "../images/navigation/button_lib_11_14c_gold_grad.jpg";
c11Ooff = new Image();
c11Ooff.src = "../images/navigation/button_lib_11_14c_red_grad.jpg";

c15on = new Image();
c15on.src = "../images/navigation/button_lib_15c_gold_grad.jpg";
c15off = new Image();
c15off.src = "../images/navigation/button_lib_15c_purple_grad.jpg";
c15Oon = new Image();
c15Oon.src = "../images/navigation/button_lib_15c_gold_grad.jpg";
c15Ooff = new Image();
c15Ooff.src = "../images/navigation/button_lib_15c_red_grad.jpg";

c16on = new Image();
c16on.src = "../images/navigation/button_lib_16c_gold_grad.jpg";
c16off = new Image();
c16off.src = "../images/navigation/button_lib_16c_purple_grad.jpg";
c16Oon = new Image();
c16Oon.src = "../images/navigation/button_lib_16c_gold_grad.jpg";
c16Ooff = new Image();
c16Ooff.src = "../images/navigation/button_lib_16c_red_grad.jpg";

c17on = new Image();
c17on.src = "../images/navigation/button_lib_17c_gold_grad.jpg";
c17off = new Image();
c17off.src = "../images/navigation/button_lib_17c_purple_grad.jpg";
c17Oon = new Image();
c17Oon.src = "../images/navigation/button_lib_17c_gold_grad.jpg";
c17Ooff = new Image();
c17Ooff.src = "../images/navigation/button_lib_17c_red_grad.jpg";

c18on = new Image();
c18on.src = "../images/navigation/button_lib_18c_gold_grad.jpg";
c18off = new Image();
c18off.src = "../images/navigation/button_lib_18c_purple_grad.jpg";
c18Oon = new Image();
c18Oon.src = "../images/navigation/button_lib_18c_gold_grad.jpg";
c18Ooff = new Image();
c18Ooff.src = "../images/navigation/button_lib_18c_red_grad.jpg";

c19on = new Image();
c19on.src = "../images/navigation/button_lib_19c_gold_grad.jpg";
c19off = new Image();
c19off.src = "../images/navigation/button_lib_19c_purple_grad.jpg";
c19Oon = new Image();
c19Oon.src = "../images/navigation/button_lib_19c_gold_grad.jpg";
c19Ooff = new Image();
c19Ooff.src = "../images/navigation/button_lib_19c_red_grad.jpg";

c20on = new Image();
c20on.src = "../images/navigation/button_lib_20c_gold_grad.jpg";
c20off = new Image();
c20off.src = "../images/navigation/button_lib_20c_purple_grad.jpg";
c20Oon = new Image();
c20Oon.src = "../images/navigation/button_lib_20c_gold_grad.jpg";
c20Ooff = new Image();
c20Ooff.src = "../images/navigation/button_lib_20c_red_grad.jpg";

c21on = new Image();
c21on.src = "../images/navigation/button_lib_21c_gold_grad.jpg";
c21off = new Image();
c21off.src = "../images/navigation/button_lib_21c_purple_grad.jpg";
c21Oon = new Image();
c21Oon.src = "../images/navigation/button_lib_21c_gold_grad.jpg";
c21Ooff = new Image();
c21Ooff.src = "../images/navigation/button_lib_21c_red_grad.jpg";

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
