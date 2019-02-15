// randomize the images in the picture bar
//
pics0 = new Array (
"images/banner/picturebar1_0.jpg",
"images/banner/picturebar1_1.jpg",
"images/banner/picturebar1_2.jpg",
"images/banner/picturebar1_3.jpg",
"images/banner/picturebar1_4.jpg",
"images/banner/picturebar1_5.jpg",
"images/banner/picturebar1_6.jpg",
"images/banner/picturebar1_7.jpg",
"images/banner/picturebar1_8.jpg")

pics1 = new Array (
"images/banner/picturebar2_0.jpg",
"images/banner/picturebar2_1.jpg",
"images/banner/picturebar2_2.jpg",
"images/banner/picturebar2_4.jpg",
"images/banner/picturebar2_3.jpg",
"images/banner/picturebar2_5.jpg",
"images/banner/picturebar2_6.jpg",
"images/banner/picturebar2_7.jpg",
"images/banner/picturebar2_8.jpg")

pics2 = new Array (
"images/banner/picturebar3_0.jpg",
"images/banner/picturebar3_1.jpg",
"images/banner/picturebar3_2.jpg",
"images/banner/picturebar3_3.jpg",
"images/banner/picturebar3_4.jpg",
"images/banner/picturebar3_5.jpg",
"images/banner/picturebar3_6.jpg",
"images/banner/picturebar3_7.jpg",
"images/banner/picturebar3_8.jpg")

pics3 = new Array (
"images/banner/picturebar4_0.jpg",
"images/banner/picturebar4_1.jpg",
"images/banner/picturebar4_2.jpg",
"images/banner/picturebar4_3.jpg",
"images/banner/picturebar4_4.jpg",
"images/banner/picturebar4_5.jpg",
"images/banner/picturebar4_6.jpg",
"images/banner/picturebar4_7.jpg",
"images/banner/picturebar4_8.jpg")

pics4 = new Array (
"images/banner/picturebar5_0.jpg",
"images/banner/picturebar5_1.jpg",
"images/banner/picturebar5_2.jpg",
"images/banner/picturebar5_3.jpg",
"images/banner/picturebar5_4.jpg",
"images/banner/picturebar5_5.jpg",
"images/banner/picturebar5_6.jpg",
"images/banner/picturebar5_7.jpg",
"images/banner/picturebar5_8.jpg")

pics5 = new Array (
"images/banner/picturebar6_0.jpg",
"images/banner/picturebar6_1.jpg",
"images/banner/picturebar6_2.jpg",
"images/banner/picturebar6_3.jpg",
"images/banner/picturebar6_4.jpg",
"images/banner/picturebar6_5.jpg",
"images/banner/picturebar6_6.jpg",
"images/banner/picturebar6_7.jpg",
"images/banner/picturebar6_8.jpg")

pics6 = new Array (
"images/banner/picturebar7_0.jpg",
"images/banner/picturebar7_1.jpg",
"images/banner/picturebar7_2.jpg",
"images/banner/picturebar7_3.jpg",
"images/banner/picturebar7_4.jpg",
"images/banner/picturebar7_5.jpg",
"images/banner/picturebar7_6.jpg",
"images/banner/picturebar7_7.jpg",
"images/banner/picturebar7_8.jpg")

// this uses a randomizer to generate any number from 1-4 (or however many
// images you have, just change the number). The number has to be one below
// the total, because it seems to count 0 as a number (so your images are
// numbered 0, 1, 2 and 3).

var rnum0 = Math.random() ;
var rnum1 = Math.random() ;
var rnum2 = Math.random() ;
var rnum3 = Math.random() ;
var rnum4 = Math.random() ;
var rnum5 = Math.random() ;
var rnum6 = Math.random() ;

var picnum0 = Math.round(rnum0*8);
var picnum1 = Math.round(rnum1*8);
var picnum2 = Math.round(rnum2*8);
var picnum3 = Math.round(rnum3*8);
var picnum4 = Math.round(rnum4*8);
var picnum5 = Math.round(rnum5*8);
var picnum6 = Math.round(rnum6*8);

useRand0 = picnum0;
useRand1 = picnum1;
useRand2 = picnum2;
useRand3 = picnum3;
useRand4 = picnum4;
useRand5 = picnum5;
useRand6 = picnum6;

