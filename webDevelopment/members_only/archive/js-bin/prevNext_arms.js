function previous(name,letter) 
{
	var winName
	if (name == "none")
	{
  		alert("You are at the beginning of the '"+letter+"' list!")
	}
	else
	{
  	winName = name + ".htm";
  	location = winName;
	}
}

function next(name,letter) 
{
	var winName
	if (name == "none")
	{
  		alert("You are at the end of the '"+letter+"' list!")
	}
	else
	{
  	winName = name + ".htm";
  	location = winName;
	}
}

function directory(letter) 
{
	var winName
  	winName = letter + ".htm";
  	location = winName;
}

//
// code that deals with mouseovers and mouseout for the button images
// define the button image definitions
//
prevon = new Image();
prevon.src = "../../images/navigation/button_prevB.jpg";
prevoff = new Image();
prevoff.src = "../../images/navigation/button_prev.jpg";
nexton = new Image();
nexton.src = "../../images/navigation/button_nextB.jpg";
nextoff = new Image();
nextoff.src = "../../images/navigation/button_next.jpg";
diron = new Image();
diron.src = "../../images/navigation/button_dirB.jpg";
diroff = new Image();
diroff.src = "../../images/navigation/button_dir.jpg";

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
