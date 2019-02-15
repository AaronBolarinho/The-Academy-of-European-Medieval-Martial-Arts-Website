/***********************************************
* Ultimate Fade-In Slideshow (v1.5): © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
* updated: Apr 23, 2009
***********************************************/
 
var fadeimages0=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
//fadeimages[0]=["images/banner/picturebar1_0.jpg", "", ""] //plain image syntax
//fadeimages[1]=["images/banner/picturebar1_1.jpg", "http://www.sun.com", ""] //image with link syntax
//fadeimages[2]=["images/banner/picturebar1_2.jpg", "http://www.sun.com", "_blank"] //image with link and target syntax
fadeimages0[0]=["a/aemma_60.jpg", "", ""]
fadeimages0[1]=["b/brundle_60.jpg", "", ""]
fadeimages0[2]=["b/brydon_60.jpg", "", ""]
fadeimages0[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages0[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages0[5]=["d/decoste_60.jpg", "", ""] 
fadeimages0[6]=["e/elema_60.jpg", "", ""] 
fadeimages0[7]=["f/fisher_60.jpg", "", ""] 
fadeimages0[8]=["f/fmss_60.gif", "", ""] 
fadeimages0[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages0[10]=["h/howe_60.jpg", "", ""] 
fadeimages0[11]=["k/kari_60.jpg", "", ""] 
fadeimages0[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages0[13]=["l/lemar_60.jpg", "", ""] 
fadeimages0[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages0[15]=["m/murphy_60.jpg", "", ""] 
fadeimages0[16]=["o/omsg_60.jpg", "", ""] 
fadeimages0[17]=["p/penney_60.jpg", "", ""] 
fadeimages0[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages0[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages0[20]=["s/sprules_60.jpg", "", ""] 
fadeimages0[21]=["v/valente_60.jpg", "", ""] 
fadeimages0[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages0[23]=["w/williams_60.jpg", "", ""] 
fadeimages0[24]=["w/winslow_60.jpg", "", ""] 
fadeimages0[25]=["w/woods_60.jpg", "", ""] 
fadeimages0[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages0[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages0[28]=["g/gienow_60.jpg", "", ""] 
fadeimages0[29]=["r/rumball_60.jpg", "", ""] 
fadeimages0[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages0[31]=["m/mckee_60.jpg", "", ""] 
fadeimages0[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages0[33]=["g/gienow_60.jpg", "", ""] 
fadeimages0[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages0[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages0[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages0[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages0[37]=["w/woods_jr_60.jpg", "", ""] 

var fadeimages1=new Array() 
fadeimages1[0]=["a/aemma_60.jpg", "", ""] //plain image syntax
fadeimages1[1]=["b/brundle_60.jpg", "", ""] //image with link syntax
fadeimages1[2]=["b/brydon_60.jpg", "", ""] //image with link and target syntax
fadeimages1[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages1[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages1[5]=["d/decoste_60.jpg", "", ""] 
fadeimages1[6]=["e/elema_60.jpg", "", ""] 
fadeimages1[7]=["f/fisher_60.jpg", "", ""] 
fadeimages1[8]=["f/fmss_60.gif", "", ""] 
fadeimages1[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages1[10]=["h/howe_60.jpg", "", ""] 
fadeimages1[11]=["k/kari_60.jpg", "", ""] 
fadeimages1[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages1[13]=["l/lemar_60.jpg", "", ""] 
fadeimages1[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages1[15]=["m/murphy_60.jpg", "", ""] 
fadeimages1[16]=["o/omsg_60.jpg", "", ""] 
fadeimages1[17]=["p/penney_60.jpg", "", ""] 
fadeimages1[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages1[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages1[20]=["s/sprules_60.jpg", "", ""] 
fadeimages1[21]=["v/valente_60.jpg", "", ""] 
fadeimages1[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages1[23]=["w/williams_60.jpg", "", ""] 
fadeimages1[24]=["w/winslow_60.jpg", "", ""] 
fadeimages1[25]=["w/woods_60.jpg", "", ""] 
fadeimages1[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages1[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages1[28]=["g/gienow_60.jpg", "", ""] 
fadeimages1[29]=["r/rumball_60.jpg", "", ""] 
fadeimages1[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages1[31]=["m/mckee_60.jpg", "", ""] 
fadeimages1[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages1[33]=["g/gienow_60.jpg", "", ""] 
fadeimages1[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages1[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages1[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages1[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages1[37]=["w/woods_jr_60.jpg", "", ""] 

var fadeimages2=new Array()
fadeimages2[0]=["a/aemma_60.jpg", "", ""] //plain image syntax
fadeimages2[1]=["b/brundle_60.jpg", "", ""] //image with link syntax
fadeimages2[2]=["b/brydon_60.jpg", "", ""] //image with link and target syntax
fadeimages2[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages2[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages2[5]=["d/decoste_60.jpg", "", ""] 
fadeimages2[6]=["e/elema_60.jpg", "", ""] 
fadeimages2[7]=["f/fisher_60.jpg", "", ""] 
fadeimages2[8]=["f/fmss_60.gif", "", ""] 
fadeimages2[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages2[10]=["h/howe_60.jpg", "", ""] 
fadeimages2[11]=["k/kari_60.jpg", "", ""] 
fadeimages2[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages2[13]=["l/lemar_60.jpg", "", ""] 
fadeimages2[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages2[15]=["m/murphy_60.jpg", "", ""] 
fadeimages2[16]=["o/omsg_60.jpg", "", ""] 
fadeimages2[17]=["p/penney_60.jpg", "", ""] 
fadeimages2[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages2[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages2[20]=["s/sprules_60.jpg", "", ""] 
fadeimages2[21]=["v/valente_60.jpg", "", ""] 
fadeimages2[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages2[23]=["w/williams_60.jpg", "", ""] 
fadeimages2[24]=["w/winslow_60.jpg", "", ""] 
fadeimages2[25]=["w/woods_60.jpg", "", ""] 
fadeimages2[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages2[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages2[28]=["g/gienow_60.jpg", "", ""] 
fadeimages2[29]=["r/rumball_60.jpg", "", ""] 
fadeimages2[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages2[31]=["m/mckee_60.jpg", "", ""] 
fadeimages2[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages2[33]=["g/gienow_60.jpg", "", ""] 
fadeimages2[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages2[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages2[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages2[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages2[37]=["w/woods_jr_60.jpg", "", ""] 

var fadeimages3=new Array() 
fadeimages3[0]=["a/aemma_60.jpg", "", ""] //plain image syntax
fadeimages3[1]=["b/brundle_60.jpg", "", ""] //image with link syntax
fadeimages3[2]=["b/brydon_60.jpg", "", ""] //image with link and target syntax
fadeimages3[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages3[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages3[5]=["d/decoste_60.jpg", "", ""] 
fadeimages3[6]=["e/elema_60.jpg", "", ""] 
fadeimages3[7]=["f/fisher_60.jpg", "", ""] 
fadeimages3[8]=["f/fmss_60.gif", "", ""] 
fadeimages3[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages3[10]=["h/howe_60.jpg", "", ""] 
fadeimages3[11]=["k/kari_60.jpg", "", ""] 
fadeimages3[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages3[13]=["l/lemar_60.jpg", "", ""] 
fadeimages3[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages3[15]=["m/murphy_60.jpg", "", ""] 
fadeimages3[16]=["o/omsg_60.jpg", "", ""] 
fadeimages3[17]=["p/penney_60.jpg", "", ""] 
fadeimages3[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages3[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages3[20]=["s/sprules_60.jpg", "", ""] 
fadeimages3[21]=["v/valente_60.jpg", "", ""] 
fadeimages3[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages3[23]=["w/williams_60.jpg", "", ""] 
fadeimages3[24]=["w/winslow_60.jpg", "", ""] 
fadeimages3[25]=["w/woods_60.jpg", "", ""] 
fadeimages3[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages3[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages3[28]=["g/gienow_60.jpg", "", ""] 
fadeimages3[29]=["r/rumball_60.jpg", "", ""] 
fadeimages3[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages3[31]=["m/mckee_60.jpg", "", ""] 
fadeimages3[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages3[33]=["g/gienow_60.jpg", "", ""] 
fadeimages3[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages3[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages3[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages3[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages3[37]=["w/woods_jr_60.jpg", "", ""] 

var fadeimages4=new Array() 
fadeimages4[0]=["a/aemma_60.jpg", "", ""] //plain image syntax
fadeimages4[1]=["b/brundle_60.jpg", "", ""] //image with link syntax
fadeimages4[2]=["b/brydon_60.jpg", "", ""] //image with link and target syntax
fadeimages4[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages4[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages4[5]=["d/decoste_60.jpg", "", ""] 
fadeimages4[6]=["e/elema_60.jpg", "", ""] 
fadeimages4[7]=["f/fisher_60.jpg", "", ""] 
fadeimages4[8]=["f/fmss_60.gif", "", ""] 
fadeimages4[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages4[10]=["h/howe_60.jpg", "", ""] 
fadeimages4[11]=["k/kari_60.jpg", "", ""] 
fadeimages4[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages4[13]=["l/lemar_60.jpg", "", ""] 
fadeimages4[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages4[15]=["m/murphy_60.jpg", "", ""] 
fadeimages4[16]=["o/omsg_60.jpg", "", ""] 
fadeimages4[17]=["p/penney_60.jpg", "", ""] 
fadeimages4[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages4[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages4[20]=["s/sprules_60.jpg", "", ""] 
fadeimages4[21]=["v/valente_60.jpg", "", ""] 
fadeimages4[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages4[23]=["w/williams_60.jpg", "", ""] 
fadeimages4[24]=["w/winslow_60.jpg", "", ""] 
fadeimages4[25]=["w/woods_60.jpg", "", ""] 
fadeimages4[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages4[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages4[28]=["g/gienow_60.jpg", "", ""] 
fadeimages4[29]=["r/rumball_60.jpg", "", ""] 
fadeimages4[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages4[31]=["m/mckee_60.jpg", "", ""] 
fadeimages4[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages4[33]=["g/gienow_60.jpg", "", ""] 
fadeimages4[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages4[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages4[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages4[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages4[37]=["w/woods_jr_60.jpg", "", ""] 

var fadeimages5=new Array() 
fadeimages5[0]=["a/aemma_60.jpg", "", ""] //plain image syntax
fadeimages5[1]=["b/brundle_60.jpg", "", ""] //image with link syntax
fadeimages5[2]=["b/brydon_60.jpg", "", ""] //image with link and target syntax
fadeimages5[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages5[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages5[5]=["d/decoste_60.jpg", "", ""] 
fadeimages5[6]=["e/elema_60.jpg", "", ""] 
fadeimages5[7]=["f/fisher_60.jpg", "", ""] 
fadeimages5[8]=["f/fmss_60.gif", "", ""] 
fadeimages5[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages5[10]=["h/howe_60.jpg", "", ""] 
fadeimages5[11]=["k/kari_60.jpg", "", ""] 
fadeimages5[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages5[13]=["l/lemar_60.jpg", "", ""] 
fadeimages5[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages5[15]=["m/murphy_60.jpg", "", ""] 
fadeimages5[16]=["o/omsg_60.jpg", "", ""] 
fadeimages5[17]=["p/penney_60.jpg", "", ""] 
fadeimages5[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages5[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages5[20]=["s/sprules_60.jpg", "", ""] 
fadeimages5[21]=["v/valente_60.jpg", "", ""] 
fadeimages5[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages5[23]=["w/williams_60.jpg", "", ""] 
fadeimages5[24]=["w/winslow_60.jpg", "", ""] 
fadeimages5[25]=["w/woods_60.jpg", "", ""] 
fadeimages5[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages5[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages5[28]=["g/gienow_60.jpg", "", ""] 
fadeimages5[29]=["r/rumball_60.jpg", "", ""] 
fadeimages5[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages5[31]=["m/mckee_60.jpg", "", ""] 
fadeimages5[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages5[33]=["g/gienow_60.jpg", "", ""] 
fadeimages5[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages5[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages5[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages5[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages5[37]=["w/woods_jr_60.jpg", "", ""] 

var fadeimages6=new Array() 
fadeimages6[0]=["a/aemma_60.jpg", "", ""] //plain image syntax
fadeimages6[1]=["b/brundle_60.jpg", "", ""] //image with link syntax
fadeimages6[2]=["b/brydon_60.jpg", "", ""] //image with link and target syntax
fadeimages6[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages6[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages6[5]=["d/decoste_60.jpg", "", ""] 
fadeimages6[6]=["e/elema_60.jpg", "", ""] 
fadeimages6[7]=["f/fisher_60.jpg", "", ""] 
fadeimages6[8]=["f/fmss_60.gif", "", ""] 
fadeimages6[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages6[10]=["h/howe_60.jpg", "", ""] 
fadeimages6[11]=["k/kari_60.jpg", "", ""] 
fadeimages6[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages6[13]=["l/lemar_60.jpg", "", ""] 
fadeimages6[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages6[15]=["m/murphy_60.jpg", "", ""] 
fadeimages6[16]=["o/omsg_60.jpg", "", ""] 
fadeimages6[17]=["p/penney_60.jpg", "", ""] 
fadeimages6[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages6[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages6[20]=["s/sprules_60.jpg", "", ""] 
fadeimages6[21]=["v/valente_60.jpg", "", ""] 
fadeimages6[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages6[23]=["w/williams_60.jpg", "", ""] 
fadeimages6[24]=["w/winslow_60.jpg", "", ""] 
fadeimages6[25]=["w/woods_60.jpg", "", ""] 
fadeimages6[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages6[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages6[28]=["g/gienow_60.jpg", "", ""] 
fadeimages6[29]=["r/rumball_60.jpg", "", ""] 
fadeimages6[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages6[31]=["m/mckee_60.jpg", "", ""] 
fadeimages6[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages6[33]=["g/gienow_60.jpg", "", ""] 
fadeimages6[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages6[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages6[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages6[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages6[37]=["w/woods_jr_60.jpg", "", ""] 

var fadeimages7=new Array() 
fadeimages7[0]=["a/aemma_60.jpg", "", ""] //plain image syntax
fadeimages7[1]=["b/brundle_60.jpg", "", ""] //image with link syntax
fadeimages7[2]=["b/brydon_60.jpg", "", ""] //image with link and target syntax
fadeimages7[3]=["c/cvet_dm_60.jpg", "", ""] 
fadeimages7[4]=["c/cvet_aj_60.jpg", "", ""] 
fadeimages7[5]=["d/decoste_60.jpg", "", ""] 
fadeimages7[6]=["e/elema_60.jpg", "", ""] 
fadeimages7[7]=["f/fisher_60.jpg", "", ""] 
fadeimages7[8]=["f/fmss_60.gif", "", ""] 
fadeimages7[9]=["g/goodfellow_60.jpg", "", ""] 
fadeimages7[10]=["h/howe_60.jpg", "", ""] 
fadeimages7[11]=["k/kari_60.jpg", "", ""] 
fadeimages7[12]=["l/lelchuk_60.jpg", "", ""] 
fadeimages7[13]=["l/lemar_60.jpg", "", ""] 
fadeimages7[14]=["m/mcilmoyle_60.jpg", "", ""] 
fadeimages7[15]=["m/murphy_60.jpg", "", ""] 
fadeimages7[16]=["o/omsg_60.jpg", "", ""] 
fadeimages7[17]=["p/penney_60.jpg", "", ""] 
fadeimages7[18]=["r/ravignat_60.jpg", "", ""] 
fadeimages7[19]=["r/rekuta_60.jpg", "", ""] 
fadeimages7[20]=["s/sprules_60.jpg", "", ""] 
fadeimages7[21]=["v/valente_60.jpg", "", ""] 
fadeimages7[22]=["w/weingartner_60.jpg", "", ""] 
fadeimages7[23]=["w/williams_60.jpg", "", ""] 
fadeimages7[24]=["w/winslow_60.jpg", "", ""] 
fadeimages7[25]=["w/woods_60.jpg", "", ""] 
fadeimages7[26]=["o/oneail_j_60.jpg", "", ""] 
fadeimages7[27]=["o/oneail_n_60.jpg", "", ""] 
fadeimages7[28]=["g/gienow_60.jpg", "", ""] 
fadeimages7[29]=["r/rumball_60.jpg", "", ""] 
fadeimages7[30]=["b/birtwistle_60.jpg", "", ""] 
fadeimages7[31]=["m/mckee_60.jpg", "", ""] 
fadeimages7[32]=["b/bolarinho_60.jpg", "", ""] 
fadeimages7[33]=["g/gienow_60.jpg", "", ""] 
fadeimages7[34]=["g/gienow_jr_60.jpg", "", ""] 
fadeimages7[35]=["c/cvet_ml_60.jpg", "", ""] 
fadeimages7[35]=["c/cvet_cd_60.jpg", "", ""] 
fadeimages7[36]=["b/brundle_jr_60.jpg", "", ""]
fadeimages7[37]=["w/woods_jr_60.jpg", "", ""] 

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
