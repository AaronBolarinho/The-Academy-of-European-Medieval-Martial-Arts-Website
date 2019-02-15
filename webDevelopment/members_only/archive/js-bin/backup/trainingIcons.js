//
// interactive menu buttons code for pages invoking below the root level
//
homeSwordon = new Image();
homeSwordon.src = "../../images/homePage_swordY.jpg";
homeSwordoff = new Image();
homeSwordoff.src = "../../images/homePage_sword.jpg";

homeSwordOon = new Image();
homeSwordOon.src = "../../images/homePage_swordY.jpg";
homeSwordOoff = new Image();
homeSwordOoff.src = "../../images/homePage_swordO.jpg";

homeBuckleron = new Image();
homeBuckleron.src = "../../images/homePage_bucklerY.jpg";
homeBuckleroff = new Image();
homeBuckleroff.src = "../../images/homePage_buckler.jpg";

homeBucklerOon = new Image();
homeBucklerOon.src = "../../images/homePage_bucklerY.jpg";
homeBucklerOoff = new Image();
homeBucklerOoff.src = "../../images/homePage_bucklerO.jpg";

homeDagaon = new Image();
homeDagaon.src = "../../images/homePage_dagaY.jpg";
homeDagaoff = new Image();
homeDagaoff.src = "../../images/homePage_daga.jpg";

homeDagaOon = new Image();
homeDagaOon.src = "../../images/homePage_dagaY.jpg";
homeDagaOoff = new Image();
homeDagaOoff.src = "../../images/homePage_dagaO.jpg";

homePollaxeon = new Image();
homePollaxeon.src = "../../images/homePage_pollaxeY.jpg";
homePollaxeoff = new Image();
homePollaxeoff.src = "../../images/homePage_pollaxe.jpg";

homePollaxeOon = new Image();
homePollaxeOon.src = "../../images/homePage_pollaxeY.jpg";
homePollaxeOoff = new Image();
homePollaxeOoff.src = "../../images/homePage_pollaxeO.jpg";

homeArmourOon = new Image();
homeArmourOon.src = "../../images/homePage_armourY.jpg";
homeArmourOoff = new Image();
homeArmourOoff.src = "../../images/homePage_armourO.jpg";

homeArmouron = new Image();
homeArmouron.src = "../../images/homePage_armourY.jpg";
homeArmouroff = new Image();
homeArmouroff.src = "../../images/homePage_armour.jpg";

homeMountedon = new Image();
homeMountedon.src = "../../images/homePage_mountedY.jpg";
homeMountedoff = new Image();
homeMountedoff.src = "../../images/homePage_mounted.jpg";

homeMountedOon = new Image();
homeMountedOon.src = "../../images/homePage_mountedY.jpg";
homeMountedOoff = new Image();
homeMountedOoff.src = "../../images/homePage_mountedO.jpg";

homeGrapplingon = new Image();
homeGrapplingon.src = "../../images/homePage_grapplingY.jpg";
homeGrapplingoff = new Image();
homeGrapplingoff.src = "../../images/homePage_grappling.jpg";

homeGrapplingOon = new Image();
homeGrapplingOon.src = "../../images/homePage_grapplingY.jpg";
homeGrapplingOoff = new Image();
homeGrapplingOoff.src = "../../images/homePage_grapplingO.jpg";

homeArcheryon = new Image();
homeArcheryon.src = "../../images/homePage_archeryY.jpg";
homeArcheryoff = new Image();
homeArcheryoff.src = "../../images/homePage_archery.jpg";

homeArcheryOon = new Image();
homeArcheryOon.src = "../../images/homePage_archeryY.jpg";
homeArcheryOoff = new Image();
homeArcheryOoff.src = "../../images/homePage_archeryO.jpg";

homeTrebon = new Image();
homeTrebon.src = "../../images/homePage_trebuchetY.jpg";
homeTreboff = new Image();
homeTreboff.src = "../../images/homePage_trebuchet.jpg";

homeTrebOon = new Image();
homeTrebOon.src = "../../images/homePage_trebuchetY.jpg";
homeTrebOoff = new Image();
homeTrebOoff.src = "../../images/homePage_trebuchetO.jpg";

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
