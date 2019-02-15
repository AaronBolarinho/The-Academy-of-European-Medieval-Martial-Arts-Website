/***********************************************
* Ultimate Fade-In Slideshow (v1.5): © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
*
* updated: Oct 10, 2009
*
***********************************************/
 
var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
//fadeimages[0]=["images/banner/picturebar1_0.jpg", "", ""] //plain image syntax
//fadeimages[1]=["images/banner/picturebar1_1.jpg", "http://www.sun.com", ""] //image with link syntax
//fadeimages[2]=["images/banner/picturebar1_2.jpg", "http://www.sun.com", "_blank"] //image with link and target syntax
fadeimages[0]=["images/banner/picturebar1_0.jpg", "", ""]
fadeimages[1]=["images/banner/picturebar1_1.jpg", "", ""]
fadeimages[2]=["images/banner/picturebar1_2.jpg", "", ""]
fadeimages[3]=["images/banner/picturebar1_3.jpg", "", ""] 
fadeimages[4]=["images/banner/picturebar1_4.jpg", "", ""] 
fadeimages[5]=["images/banner/picturebar1_5.jpg", "", ""] 
fadeimages[6]=["images/banner/picturebar1_6.jpg", "", ""] 
fadeimages[7]=["images/banner/picturebar1_7.jpg", "", ""] 
fadeimages[8]=["images/banner/picturebar1_8.jpg", "", ""] 
fadeimages[9]=["images/banner/picturebar1_9.jpg", "", ""] 
fadeimages[10]=["images/banner/picturebar1_10.jpg", "", ""] 
fadeimages[11]=["images/banner/picturebar1_11.jpg", "", ""] 
fadeimages[12]=["images/banner/picturebar1_12.jpg", "", ""] 
fadeimages[13]=["images/banner/picturebar1_13.jpg", "", ""] 
fadeimages[14]=["images/banner/picturebar1_14.jpg", "", ""] 
fadeimages[15]=["images/banner/picturebar1_15.jpg", "", ""] 
fadeimages[16]=["images/banner/picturebar1_16.jpg", "", ""] 
fadeimages[17]=["images/banner/picturebar1_17.jpg", "", ""] 
fadeimages[18]=["images/banner/picturebar1_18.jpg", "", ""] 
fadeimages[19]=["images/banner/picturebar1_19.jpg", "", ""] 

var fadeimages1=new Array() 
fadeimages1[0]=["images/banner/picturebar2_0.jpg", "", ""] 
fadeimages1[1]=["images/banner/picturebar2_1.jpg", "", ""] 
fadeimages1[2]=["images/banner/picturebar2_2.jpg", "", ""] 
fadeimages1[3]=["images/banner/picturebar2_3.jpg", "", ""] 
fadeimages1[4]=["images/banner/picturebar2_4.jpg", "", ""] 
fadeimages1[5]=["images/banner/picturebar2_5.jpg", "", ""] 
fadeimages1[6]=["images/banner/picturebar2_6.jpg", "", ""] 
fadeimages1[7]=["images/banner/picturebar2_7.jpg", "", ""] 
fadeimages1[8]=["images/banner/picturebar2_8.jpg", "", ""] 
fadeimages1[9]=["images/banner/picturebar2_9.jpg", "", ""] 
fadeimages1[10]=["images/banner/picturebar2_10.jpg", "", ""] 
fadeimages1[11]=["images/banner/picturebar2_11.jpg", "", ""] 
fadeimages1[12]=["images/banner/picturebar2_12.jpg", "", ""] 
fadeimages1[13]=["images/banner/picturebar2_13.jpg", "", ""] 
fadeimages1[14]=["images/banner/picturebar2_14.jpg", "", ""] 
fadeimages1[15]=["images/banner/picturebar2_15.jpg", "", ""] 
fadeimages1[16]=["images/banner/picturebar2_16.jpg", "", ""] 
fadeimages1[17]=["images/banner/picturebar2_17.jpg", "", ""] 
fadeimages1[18]=["images/banner/picturebar2_18.jpg", "", ""] 

var fadeimages2=new Array()
fadeimages2[0]=["images/banner/picturebar3_0.jpg", "", ""]
fadeimages2[1]=["images/banner/picturebar3_1.jpg", "", ""]
fadeimages2[2]=["images/banner/picturebar3_2.jpg", "", ""] 
fadeimages2[3]=["images/banner/picturebar3_3.jpg", "", ""] 
fadeimages2[4]=["images/banner/picturebar3_4.jpg", "", ""] 
fadeimages2[5]=["images/banner/picturebar3_5.jpg", "", ""] 
fadeimages2[6]=["images/banner/picturebar3_6.jpg", "", ""] 
fadeimages2[7]=["images/banner/picturebar3_7.jpg", "", ""] 
fadeimages2[8]=["images/banner/picturebar3_8.jpg", "", ""] 
fadeimages2[9]=["images/banner/picturebar3_9.jpg", "", ""] 
fadeimages2[10]=["images/banner/picturebar3_10.jpg", "", ""] 
fadeimages2[11]=["images/banner/picturebar3_11.jpg", "", ""] 
fadeimages2[12]=["images/banner/picturebar3_12.jpg", "", ""] 
fadeimages2[13]=["images/banner/picturebar3_13.jpg", "", ""] 
fadeimages2[14]=["images/banner/picturebar3_14.jpg", "", ""] 
fadeimages2[15]=["images/banner/picturebar3_15.jpg", "", ""] 
fadeimages2[16]=["images/banner/picturebar3_16.jpg", "", ""] 
fadeimages2[17]=["images/banner/picturebar3_17.jpg", "", ""] 
fadeimages2[18]=["images/banner/picturebar3_18.jpg", "", ""] 

var fadeimages3=new Array() 
fadeimages3[0]=["images/banner/picturebar4_0.jpg", "", ""] 
fadeimages3[1]=["images/banner/picturebar4_1.jpg", "", ""] 
fadeimages3[2]=["images/banner/picturebar4_2.jpg", "", ""] 
fadeimages3[3]=["images/banner/picturebar4_3.jpg", "", ""] 
fadeimages3[4]=["images/banner/picturebar4_4.jpg", "", ""] 
fadeimages3[5]=["images/banner/picturebar4_5.jpg", "", ""] 
fadeimages3[6]=["images/banner/picturebar4_6.jpg", "", ""] 
fadeimages3[7]=["images/banner/picturebar4_7.jpg", "", ""] 
fadeimages3[8]=["images/banner/picturebar4_8.jpg", "", ""] 
fadeimages3[9]=["images/banner/picturebar4_9.jpg", "", ""] 
fadeimages3[10]=["images/banner/picturebar4_10.jpg", "", ""] 
fadeimages3[11]=["images/banner/picturebar4_11.jpg", "", ""] 
fadeimages3[12]=["images/banner/picturebar4_12.jpg", "", ""] 
fadeimages3[13]=["images/banner/picturebar4_13.jpg", "", ""] 
fadeimages3[14]=["images/banner/picturebar4_14.jpg", "", ""] 
fadeimages3[15]=["images/banner/picturebar4_15.jpg", "", ""] 
fadeimages3[16]=["images/banner/picturebar4_16.jpg", "", ""] 
fadeimages3[17]=["images/banner/picturebar4_17.jpg", "", ""] 
fadeimages3[18]=["images/banner/picturebar4_18.jpg", "", ""] 

var fadeimages4=new Array() 
fadeimages4[0]=["images/banner/picturebar5_0.jpg", "", ""] 
fadeimages4[1]=["images/banner/picturebar5_1.jpg", "", ""] 
fadeimages4[2]=["images/banner/picturebar5_2.jpg", "", ""] 
fadeimages4[3]=["images/banner/picturebar5_3.jpg", "", ""] 
fadeimages4[4]=["images/banner/picturebar5_4.jpg", "", ""] 
fadeimages4[5]=["images/banner/picturebar5_5.jpg", "", ""] 
fadeimages4[6]=["images/banner/picturebar5_6.jpg", "", ""] 
fadeimages4[7]=["images/banner/picturebar5_7.jpg", "", ""] 
fadeimages4[8]=["images/banner/picturebar5_8.jpg", "", ""] 
fadeimages4[9]=["images/banner/picturebar5_9.jpg", "", ""] 
fadeimages4[10]=["images/banner/picturebar5_10.jpg", "", ""] 
fadeimages4[11]=["images/banner/picturebar5_11.jpg", "", ""] 
fadeimages4[12]=["images/banner/picturebar5_12.jpg", "", ""] 
fadeimages4[13]=["images/banner/picturebar5_13.jpg", "", ""] 
fadeimages4[14]=["images/banner/picturebar5_14.jpg", "", ""] 
fadeimages4[15]=["images/banner/picturebar5_15.jpg", "", ""] 
fadeimages4[16]=["images/banner/picturebar5_16.jpg", "", ""] 
fadeimages4[17]=["images/banner/picturebar5_17.jpg", "", ""] 
fadeimages4[18]=["images/banner/picturebar5_18.jpg", "", ""] 

var fadeimages5=new Array() 
fadeimages5[0]=["images/banner/picturebar6_0.jpg", "", ""] 
fadeimages5[1]=["images/banner/picturebar6_1.jpg", "", ""] 
fadeimages5[2]=["images/banner/picturebar6_2.jpg", "", ""]
fadeimages5[3]=["images/banner/picturebar6_3.jpg", "", ""] 
fadeimages5[4]=["images/banner/picturebar6_4.jpg", "", ""] 
fadeimages5[5]=["images/banner/picturebar6_5.jpg", "", ""] 
fadeimages5[6]=["images/banner/picturebar6_6.jpg", "", ""] 
fadeimages5[7]=["images/banner/picturebar6_7.jpg", "", ""] 
fadeimages5[8]=["images/banner/picturebar6_8.jpg", "", ""] 
fadeimages5[9]=["images/banner/picturebar6_9.jpg", "", ""] 
fadeimages5[10]=["images/banner/picturebar6_10.jpg", "", ""] 
fadeimages5[11]=["images/banner/picturebar6_11.jpg", "", ""] 
fadeimages5[12]=["images/banner/picturebar6_12.jpg", "", ""] 
fadeimages5[13]=["images/banner/picturebar6_13.jpg", "", ""] 
fadeimages5[14]=["images/banner/picturebar6_14.jpg", "", ""] 
fadeimages5[15]=["images/banner/picturebar6_15.jpg", "", ""] 
fadeimages5[16]=["images/banner/picturebar6_16.jpg", "", ""] 
fadeimages5[17]=["images/banner/picturebar6_17.jpg", "", ""] 
fadeimages5[18]=["images/banner/picturebar6_18.jpg", "", ""] 

var fadeimages6=new Array() 
fadeimages6[0]=["images/banner/picturebar7_0.jpg", "", ""] 
fadeimages6[1]=["images/banner/picturebar7_1.jpg", "", ""] 
fadeimages6[2]=["images/banner/picturebar7_2.jpg", "", ""]
fadeimages6[3]=["images/banner/picturebar7_3.jpg", "", ""] 
fadeimages6[4]=["images/banner/picturebar7_4.jpg", "", ""] 
fadeimages6[5]=["images/banner/picturebar7_5.jpg", "", ""] 
fadeimages6[6]=["images/banner/picturebar7_6.jpg", "", ""] 
fadeimages6[7]=["images/banner/picturebar7_7.jpg", "", ""] 
fadeimages6[8]=["images/banner/picturebar7_8.jpg", "", ""] 
fadeimages6[9]=["images/banner/picturebar7_9.jpg", "", ""] 
fadeimages6[10]=["images/banner/picturebar7_10.jpg", "", ""] 
fadeimages6[11]=["images/banner/picturebar7_11.jpg", "", ""] 
fadeimages6[12]=["images/banner/picturebar7_12.jpg", "", ""] 
fadeimages6[13]=["images/banner/picturebar7_13.jpg", "", ""] 
fadeimages6[14]=["images/banner/picturebar7_14.jpg", "", ""] 
fadeimages6[15]=["images/banner/picturebar7_15.jpg", "", ""] 
fadeimages6[16]=["images/banner/picturebar7_16.jpg", "", ""] 
fadeimages6[17]=["images/banner/picturebar7_17.jpg", "", ""] 
fadeimages6[18]=["images/banner/picturebar7_18.jpg", "", ""] 

var fadeimages7=new Array() 
fadeimages7[0]=["images/banner/picturebar8_0.jpg", "", ""] 
fadeimages7[1]=["images/banner/picturebar8_1.jpg", "", ""] 
fadeimages7[2]=["images/banner/picturebar8_2.jpg", "", ""]
fadeimages7[3]=["images/banner/picturebar8_3.jpg", "", ""] 
fadeimages7[4]=["images/banner/picturebar8_4.jpg", "", ""] 
fadeimages7[5]=["images/banner/picturebar8_5.jpg", "", ""] 
fadeimages7[6]=["images/banner/picturebar8_6.jpg", "", ""] 
fadeimages7[7]=["images/banner/picturebar8_7.jpg", "", ""] 
fadeimages7[8]=["images/banner/picturebar8_8.jpg", "", ""] 
fadeimages7[9]=["images/banner/picturebar8_9.jpg", "", ""] 
fadeimages7[10]=["images/banner/picturebar8_10.jpg", "", ""] 
fadeimages7[11]=["images/banner/picturebar8_11.jpg", "", ""] 
fadeimages7[12]=["images/banner/picturebar8_12.jpg", "", ""] 
fadeimages7[13]=["images/banner/picturebar8_13.jpg", "", ""] 
fadeimages7[14]=["images/banner/picturebar8_14.jpg", "", ""] 
fadeimages7[15]=["images/banner/picturebar8_15.jpg", "", ""] 
fadeimages7[16]=["images/banner/picturebar8_16.jpg", "", ""] 
fadeimages7[17]=["images/banner/picturebar8_17.jpg", "", ""] 
fadeimages7[18]=["images/banner/picturebar8_18.jpg", "", ""] 

var fadeimages8=new Array() 
fadeimages8[0]=["images/banner/picturebar9_0.jpg", "", ""] 
fadeimages8[1]=["images/banner/picturebar9_1.jpg", "", ""] 
fadeimages8[2]=["images/banner/picturebar9_2.jpg", "", ""]
fadeimages8[3]=["images/banner/picturebar9_3.jpg", "", ""] 
fadeimages8[4]=["images/banner/picturebar9_4.jpg", "", ""] 
fadeimages8[5]=["images/banner/picturebar9_5.jpg", "", ""] 
fadeimages8[6]=["images/banner/picturebar9_6.jpg", "", ""] 
fadeimages8[7]=["images/banner/picturebar9_7.jpg", "", ""] 
fadeimages8[8]=["images/banner/picturebar9_8.jpg", "", ""] 
fadeimages8[9]=["images/banner/picturebar9_9.jpg", "", ""] 
fadeimages8[10]=["images/banner/picturebar9_10.jpg", "", ""] 
fadeimages8[11]=["images/banner/picturebar9_11.jpg", "", ""] 
fadeimages8[12]=["images/banner/picturebar9_12.jpg", "", ""] 
fadeimages8[13]=["images/banner/picturebar9_13.jpg", "", ""] 
fadeimages8[14]=["images/banner/picturebar9_14.jpg", "", ""] 
fadeimages8[15]=["images/banner/picturebar9_15.jpg", "", ""] 
fadeimages8[16]=["images/banner/picturebar9_16.jpg", "", ""] 
fadeimages8[17]=["images/banner/picturebar9_17.jpg", "", ""] 
fadeimages8[18]=["images/banner/picturebar9_18.jpg", "", ""] 

var fadeimages9=new Array() 
fadeimages9[0]=["images/banner/picturebar10_0.jpg", "", ""] 
fadeimages9[1]=["images/banner/picturebar10_1.jpg", "", ""] 
fadeimages9[2]=["images/banner/picturebar10_2.jpg", "", ""]
fadeimages9[3]=["images/banner/picturebar10_3.jpg", "", ""] 
fadeimages9[4]=["images/banner/picturebar10_4.jpg", "", ""] 
fadeimages9[5]=["images/banner/picturebar10_5.jpg", "", ""] 
fadeimages9[6]=["images/banner/picturebar10_6.jpg", "", ""] 
fadeimages9[7]=["images/banner/picturebar10_7.jpg", "", ""] 
fadeimages9[8]=["images/banner/picturebar10_8.jpg", "", ""] 
fadeimages9[9]=["images/banner/picturebar10_9.jpg", "", ""] 
fadeimages9[10]=["images/banner/picturebar10_10.jpg", "", ""] 
fadeimages9[11]=["images/banner/picturebar10_11.jpg", "", ""] 
fadeimages9[12]=["images/banner/picturebar10_12.jpg", "", ""] 
fadeimages9[13]=["images/banner/picturebar10_13.jpg", "", ""] 
fadeimages9[14]=["images/banner/picturebar10_14.jpg", "", ""] 
fadeimages9[15]=["images/banner/picturebar10_15.jpg", "", ""] 
fadeimages9[16]=["images/banner/picturebar10_16.jpg", "", ""] 
fadeimages9[17]=["images/banner/picturebar10_17.jpg", "", ""] 
fadeimages9[18]=["images/banner/picturebar10_18.jpg", "", ""] 

var fadebgcolor="white"
 
////NO need to edit beyond here/////////////
 
var fadearray=new Array() //array to cache fadeshow instances
var fadeclear=new Array() //array to cache corresponding clearinterval pointers
 
var dom=(document.getElementById) //modern dom browsers
var iebrowser=document.all
 
function fadeshow(theimages, fadewidth, fadeheight, borderwidth, delay, pause, displayorder){
this.pausecheck=pause
this.mouseovercheck=0
this.delay=delay
this.degree=10 //initial opacity degree (10%)
this.curimageindex=0
this.nextimageindex=1
fadearray[fadearray.length]=this
this.slideshowid=fadearray.length-1
this.canvasbase="canvas"+this.slideshowid
this.curcanvas=this.canvasbase+"_0"
if (typeof displayorder!="undefined")
theimages.sort(function() {return 0.5 - Math.random();}) //thanks to Mike (aka Mwinter) :)
this.theimages=theimages
this.imageborder=parseInt(borderwidth)
this.postimages=new Array() //preload images
for (p=0;p<theimages.length;p++){
this.postimages[p]=new Image()
this.postimages[p].src=theimages[p][0]
}
 
var fadewidth=fadewidth+this.imageborder*2
var fadeheight=fadeheight+this.imageborder*2
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
document.write('<div id="master'+this.slideshowid+'" style="position:relative;width:'+fadewidth+'px;height:'+fadeheight+'px;overflow:hidden;"><div id="'+this.canvasbase+'_0" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);-moz-opacity:10;-khtml-opacity:10;background-color:'+fadebgcolor+'"></div><div id="'+this.canvasbase+'_1" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);-moz-opacity:10;background-color:'+fadebgcolor+'"></div></div>')
else
document.write('<div><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'"></div>')
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers such as Firefox
this.startit()
else{
this.curimageindex++
setInterval("fadearray["+this.slideshowid+"].rotateimage()", this.delay)
}
}

function fadepic(obj){
if (obj.degree<100){
obj.degree+=10
if (obj.tempobj.filters&&obj.tempobj.filters[0]){
if (typeof obj.tempobj.filters[0].opacity=="number") //if IE6+
obj.tempobj.filters[0].opacity=obj.degree
else //else if IE5.5-
obj.tempobj.style.filter="alpha(opacity="+obj.degree+")"
}
else if (obj.tempobj.style.MozOpacity)
obj.tempobj.style.MozOpacity=obj.degree/101
else if (obj.tempobj.style.KhtmlOpacity)
obj.tempobj.style.KhtmlOpacity=obj.degree/100
}
else{
clearInterval(fadeclear[obj.slideshowid])
obj.nextcanvas=(obj.curcanvas==obj.canvasbase+"_0")? obj.canvasbase+"_0" : obj.canvasbase+"_1"
obj.tempobj=iebrowser? iebrowser[obj.nextcanvas] : document.getElementById(obj.nextcanvas)
obj.populateslide(obj.tempobj, obj.nextimageindex)
obj.nextimageindex=(obj.nextimageindex<obj.postimages.length-1)? obj.nextimageindex+1 : 0
setTimeout("fadearray["+obj.slideshowid+"].rotateimage()", obj.delay)
}
}
 
fadeshow.prototype.populateslide=function(picobj, picindex){
var slideHTML=""
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML='<a href="'+this.theimages[picindex][1]+'" target="'+this.theimages[picindex][2]+'">'
slideHTML+='<img src="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px">'
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML+='</a>'
picobj.innerHTML=slideHTML
}
 
 
fadeshow.prototype.rotateimage=function(){
if (this.pausecheck==1) //if pause onMouseover enabled, cache object
var cacheobj=this
if (this.mouseovercheck==1)
setTimeout(function(){cacheobj.rotateimage()}, 100)
else if (iebrowser&&dom||dom){
this.resetit()
var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
crossobj.style.zIndex++
fadeclear[this.slideshowid]=setInterval("fadepic(fadearray["+this.slideshowid+"])",50)
this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"
}
else{
var ns4imgobj=document.images['defaultslide'+this.slideshowid]
ns4imgobj.src=this.postimages[this.curimageindex].src
}
this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
}
 
fadeshow.prototype.resetit=function(){
this.degree=10
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
if (crossobj.filters&&crossobj.filters[0]){
if (typeof crossobj.filters[0].opacity=="number") //if IE6+
crossobj.filters(0).opacity=this.degree
else //else if IE5.5-
crossobj.style.filter="alpha(opacity="+this.degree+")"
}
else if (crossobj.style.MozOpacity)
crossobj.style.MozOpacity=this.degree/101
else if (crossobj.style.KhtmlOpacity)
crossobj.style.KhtmlOpacity=obj.degree/100
}
 
 
fadeshow.prototype.startit=function(){
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
this.populateslide(crossobj, this.curimageindex)
if (this.pausecheck==1){ //IF SLIDESHOW SHOULD PAUSE ONMOUSEOVER
var cacheobj=this
var crossobjcontainer=iebrowser? iebrowser["master"+this.slideshowid] : document.getElementById("master"+this.slideshowid)
crossobjcontainer.onmouseover=function(){cacheobj.mouseovercheck=1}
crossobjcontainer.onmouseout=function(){cacheobj.mouseovercheck=0}
}
this.rotateimage()
}
