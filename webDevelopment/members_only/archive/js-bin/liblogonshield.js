//
// code that deals with mouseovers and mouseout for the button images
// define the button image definitions
//
shieldon = new Image();
shieldon.src = "../images/swordShield2.gif";
shieldoff = new Image();
shieldoff.src = "../images/swordShield1.gif";

shield1on = new Image();
shield1on.src = "../images/swordShield2.gif";
shield1off = new Image();
shield1off.src = "../images/swordShield1.gif";

shield2on = new Image();
shield2on.src = "../images/swordShield2.gif";
shield2off = new Image();
shield2off.src = "../images/swordShield1.gif";

shield3on = new Image();
shield3on.src = "../images/swordShield2.gif";
shield3off = new Image();
shield3off.src = "../images/swordShield1.gif";

shield4on = new Image();
shield4on.src = "../images/swordShield2.gif";
shield4off = new Image();
shield4off.src = "../images/swordShield1.gif";

shield5on = new Image();
shield5on.src = "../images/swordShield2.gif";
shield5off = new Image();
shield5off.src = "../images/swordShield1.gif";

shield6on = new Image();
shield6on.src = "../images/swordShield2.gif";
shield6off = new Image();
shield6off.src = "../images/swordShield1.gif";

shield7on = new Image();
shield7on.src = "../images/swordShield2.gif";
shield7off = new Image();
shield7off.src = "../images/swordShield1.gif";

shield8on = new Image();
shield8on.src = "../images/swordShield2.gif";
shield8off = new Image();
shield8off.src = "../images/swordShield1.gif";

shield9on = new Image();
shield9on.src = "../images/swordShield2.gif";
shield9off = new Image();
shield9off.src = "../images/swordShield1.gif";

shield10on = new Image();
shield10on.src = "../images/swordShield2.gif";
shield10off = new Image();
shield10off.src = "../images/swordShield1.gif";


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
