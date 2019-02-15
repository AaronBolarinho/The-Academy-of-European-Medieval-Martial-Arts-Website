//function previous(letter,previous,current,next,idx) 
function previous(letter,previous,idx) 
{
	var winName
	if (previous == 0)
	{
  		alert("You are at the beginning of the '"+letter+"' list!")
	}
	else
	{
//  	winName = name + ".php";
//  	winName = "armorial_entry.php?LTR=" + letter;
	winName = "armorial_entry.php?LTR=" + letter + "&CURR=" + previous + "&IDX=" + idx;
  	location = winName;
	}
}

function next(letter,next,idx)
{
	var winName
	if (next == 0)
	{
  		alert("You are at the end of the '"+letter+"' list!")
	}
	else
	{
//  	winName = name + ".php";
//  	winName = "armorial_entry.php?FL=" + name + "&LTR=" + letter;
	winName = "armorial_entry.php?LTR=" + letter + "&CURR=" + next + "&IDX=" + idx;

  	location = winName;
	}
}

function directory(letter) 
{
	var winName
//  	winName = letter + "/" + letter + ".php";
  	winName = "armorial_letter.php?LTR=" + letter;
  	location = winName;
}

//
// code that deals with mouseovers and mouseout for the button images
// define the button image definitions
//
prevon = new Image();
prevon.src = "../images/button_prevB.jpg";
prevoff = new Image();
prevoff.src = "../images/button_prev.jpg";
nexton = new Image();
nexton.src = "../images/button_nextB.jpg";
nextoff = new Image();
nextoff.src = "../images/button_next.jpg";
diron = new Image();
diron.src = "../images/button_dirB.jpg";
diroff = new Image();
diroff.src = "../images/button_dir.jpg";

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
