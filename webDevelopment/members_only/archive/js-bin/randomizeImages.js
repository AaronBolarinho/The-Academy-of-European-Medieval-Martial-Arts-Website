// randomize the images in the picture bar
//
function writeit()
{
var slideshow_width='109px' //SET IMAGE WIDTH
var slideshow_height='109px' //SET IMAGE HEIGHT
var pause=6000 //SET PAUSE BETWEEN SLIDE (3000=3 seconds)

var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
fadeimages[0]="images/banner/picturebar1_0.jpg"
fadeimages[1]="images/banner/picturebar1_1.jpg"
fadeimages[2]="images/banner/picturebar1_2.jpg"
fadeimages[3]="images/banner/picturebar1_3.jpg"
fadeimages[4]="images/banner/picturebar1_4.jpg"
fadeimages[5]="images/banner/picturebar1_5.jpg"

////NO need to edit beyond here/////////////

var preloadedimages=new Array()

for (p=0;p<fadeimages.length;p++)
	{
	preloadedimages[p]=new Image()
	preloadedimages[p].src=fadeimages[p]
	}

var ie4=document.all
var dom=document.getElementById

if (ie4||dom)
	{
	document.write('<div style="position:relative;width:'+slideshow_width+';height:'+slideshow_height+';overflow:hidden"><div  id="canvas0" style="border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000:position:absolute;width:'+slideshow_width+';height:'+slideshow_height+';top:0;left:0;filter:alpha(opacity=10);-moz-opacity:10"></div><div id="canvas1" style="position:absolute;width:'+slideshow_width+';height:'+slideshow_height+';top:0;left:0;filter:alpha(opacity=10);-moz-opacity:10"></div></div>')
//	document.write ('<img src="'+pics0[useRand0]+'" name="randimg0" width="109" height="109" id="randimg0" alt="Academy of European Medieval Martial Arts"  border="0" style="border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;">')
//	alert ("debug: writeit:ie4||dom")
	}
else
	document.write('<img name="defaultslide" src="'+fadeimages[0]+'">')

var curpos=10
var degree=10
var curcanvas="canvas0"
var curimageindex=0
var nextimageindex=1

fadepic()
} // writeit

function fadepic()
{
//alert ("debug: fadepic")
if (curpos<100)
	{
	curpos+=10
	if (tempobj.filters)
		tempobj.filters.alpha.opacity=curpos
	else if (tempobj.style.MozOpacity)
		tempobj.style.MozOpacity=curpos/101
	}
else
	{
	clearInterval(dropslide)
	nextcanvas=(curcanvas=="canvas0")? "canvas0" : "canvas1"
	tempobj=ie4? eval("document.all."+nextcanvas) : document.getElementById(nextcanvas)
	tempobj.innerHTML='<img src="'+fadeimages[nextimageindex]+'">'
	nextimageindex=(nextimageindex<fadeimages.length-1)? nextimageindex+1 : 0
	setTimeout("rotateimage()",pause)
	}
} // fadepic

function init() 
{
if (!document.getElementById) return
var imgOriginSrc;
var imgTemp = new Array();
var imgarr = document.getElementsByTagName('img');
for (var i = 0; i < imgarr.length; i++) 
	{
    	if (imgarr[i].getAttribute('hsrc')) 
		{
       		imgTemp[i] = new Image();
        	imgTemp[i].src = imgarr[i].getAttribute('hsrc');
        	imgarr[i].onmouseover = function() 
			{
            		imgOriginSrc = this.getAttribute('src');
            		this.setAttribute('src',this.getAttribute('hsrc'))
        		}
		}
        imgarr[i].onmouseout = function() 
		{
            	this.setAttribute('src',imgOriginSrc)
        	}
    	}
} // init

function rotateimage()
{
if (ie4||dom)
	{
	resetit(curcanvas)
	var crossobj=tempobj=ie4? eval("document.all."+curcanvas) : document.getElementById(curcanvas)
	crossobj.style.zIndex++
	var temp='setInterval("fadepic()",50)'
	dropslide=eval(temp)
	curcanvas=(curcanvas=="canvas0")? "canvas1" : "canvas0"
	}
else
	document.images.defaultslide.src=fadeimages[curimageindex]
	curimageindex=(curimageindex<fadeimages.length-1)? curimageindex+1 : 0
} // rotateimage

function resetit(what)
{
curpos=10
var crossobj=ie4? eval("document.all."+what) : document.getElementById(what)
if (crossobj.filters)
	crossobj.filters.alpha.opacity=curpos
else if (crossobj.style.MozOpacity)
	crossobj.style.MozOpacity=curpos/101
} // resetit

function startit()
{
var crossobj=ie4? eval("document.all."+curcanvas) : document.getElementById(curcanvas)
crossobj.innerHTML='<img src="'+fadeimages[curimageindex]+'">'
rotateimage()
} // startit

function duitt()
{
init();
if (ie4||dom)
	{
	startit();
	}
else
	{
	setInterval("rotateimage()",pause);
	}
} // duitt

