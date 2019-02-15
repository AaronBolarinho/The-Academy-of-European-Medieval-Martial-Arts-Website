//
// interactive menu buttons code for pages invoking below the root level
//
homeSwordon = new Image();
homeSwordon.src = "../images/navigation/homePage_swordY.jpg";
homeSwordoff = new Image();
homeSwordoff.src = "../images/navigation/homePage_sword.jpg";

homeSwordOon = new Image();
homeSwordOon.src = "../images/navigation/homePage_swordY.jpg";
homeSwordOoff = new Image();
homeSwordOoff.src = "../images/navigation/homePage_swordO.jpg";

homeSword2on = new Image();
homeSword2on.src = "../images/navigation/homePage_swordY.jpg";
homeSword2off = new Image();
homeSword2off.src = "../images/navigation/homePage_sword.jpg";

homeBuckleron = new Image();
homeBuckleron.src = "../images/navigation/homePage_bucklerY.jpg";
homeBuckleroff = new Image();
homeBuckleroff.src = "../images/navigation/homePage_buckler.jpg";

homeBucklerOon = new Image();
homeBucklerOon.src = "../images/navigation/homePage_bucklerY.jpg";
homeBucklerOoff = new Image();
homeBucklerOoff.src = "../images/navigation/homePage_bucklerO.jpg";

homeDagaon = new Image();
homeDagaon.src = "../images/navigation/homePage_dagaY.jpg";
homeDagaoff = new Image();
homeDagaoff.src = "../images/navigation/homePage_daga.jpg";

homeDagaOon = new Image();
homeDagaOon.src = "../images/navigation/homePage_dagaY.jpg";
homeDagaOoff = new Image();
homeDagaOoff.src = "../images/navigation/homePage_dagaO.jpg";

homeDaga2on = new Image();
homeDaga2on.src = "../images/navigation/homePage_dagaY.jpg";
homeDaga2off = new Image();
homeDaga2off.src = "../images/navigation/homePage_daga.jpg";

homePollaxeon = new Image();
homePollaxeon.src = "../images/navigation/homePage_pollaxeY.jpg";
homePollaxeoff = new Image();
homePollaxeoff.src = "../images/navigation/homePage_pollaxe.jpg";

homePollaxeOon = new Image();
homePollaxeOon.src = "../images/navigation/homePage_pollaxeY.jpg";
homePollaxeOoff = new Image();
homePollaxeOoff.src = "../images/navigation/homePage_pollaxeO.jpg";

homePollaxe2on = new Image();
homePollaxe2on.src = "../images/navigation/homePage_pollaxeY.jpg";
homePollaxe2off = new Image();
homePollaxe2off.src = "../images/navigation/homePage_pollaxe.jpg";

homeArmourOon = new Image();
homeArmourOon.src = "../images/navigation/homePage_armourY.jpg";
homeArmourOoff = new Image();
homeArmourOoff.src = "../images/navigation/homePage_armourO.jpg";

homeArmouron = new Image();
homeArmouron.src = "../images/navigation/homePage_armourY.jpg";
homeArmouroff = new Image();
homeArmouroff.src = "../images/navigation/homePage_armour.jpg";

homeArmour2on = new Image();
homeArmour2on.src = "../images/navigation/homePage_armourY.jpg";
homeArmour2off = new Image();
homeArmour2off.src = "../images/navigation/homePage_armour.jpg";

homeMountedon = new Image();
homeMountedon.src = "../images/navigation/homePage_mountedY.jpg";
homeMountedoff = new Image();
homeMountedoff.src = "../images/navigation/homePage_mounted.jpg";

homeMountedOon = new Image();
homeMountedOon.src = "../images/navigation/homePage_mountedY.jpg";
homeMountedOoff = new Image();
homeMountedOoff.src = "../images/navigation/homePage_mountedO.jpg";

homeGrapplingon = new Image();
homeGrapplingon.src = "../images/navigation/homePage_grapplingY.jpg";
homeGrapplingoff = new Image();
homeGrapplingoff.src = "../images/navigation/homePage_grappling.jpg";

homeGrapplingOon = new Image();
homeGrapplingOon.src = "../images/navigation/homePage_grapplingY.jpg";
homeGrapplingOoff = new Image();
homeGrapplingOoff.src = "../images/navigation/homePage_grapplingO.jpg";

homeGrappling2on = new Image();
homeGrappling2on.src = "../images/navigation/homePage_grapplingY.jpg";
homeGrappling2off = new Image();
homeGrappling2off.src = "../images/navigation/homePage_grappling.jpg";

homeArcheryon = new Image();
homeArcheryon.src = "../images/navigation/homePage_archeryY.jpg";
homeArcheryoff = new Image();
homeArcheryoff.src = "../images/navigation/homePage_archery.jpg";

homeArcheryOon = new Image();
homeArcheryOon.src = "../images/navigation/homePage_archeryY.jpg";
homeArcheryOoff = new Image();
homeArcheryOoff.src = "../images/navigation/homePage_archeryO.jpg";

homeTrebon = new Image();
homeTrebon.src = "../images/navigation/homePage_trebuchetY.jpg";
homeTreboff = new Image();
homeTreboff.src = "../images/navigation/homePage_trebuchet.jpg";

homeTrebOon = new Image();
homeTrebOon.src = "../images/navigation/homePage_trebuchetY.jpg";
homeTrebOoff = new Image();
homeTrebOoff.src = "../images/navigation/homePage_trebuchetO.jpg";

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
