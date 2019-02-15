/*
======= Photo Viewer 2.30 ========
==== Created by Josh Freedman ====
====  Web 1 Marketing, Inc.   ====
====   Copyright (C) 2005     ====
====   All rights reserved.   ====
====  www.web1marketing.com   ====
==================================

Use of these scripts is free so long as you include proper
attribution (the block above) and a link from your site to
www.web1marketing.com.

Use these scripts at your own risk. The author assumes no
responsibility for support or for consequences of their use.

Comments and suggestions welcome: www.joshfreedman.com.

IT IS HIGHLY RECOMMENDED THAT NO CHANGES BE MADE TO THIS FILE AND
THAT ALL PARAMETER VALUES BE CUSTOMIZED IN THE PHOTO_LIST.JS FILES.

==== Version Notes ====
Version 2.30 Added optional index parameter
Version 2.22 Fixed clickMode and imageAlt behaviors
Version 2.21 Moved precaching image to bottom of page
Version 2.20 Added showFirst, showLast, click photo to advance, caption as photo ALT text
Version 2.13 Added slideshow features
Version 2.12 Parameterized ID's, wrapping optional
Version 2.11 Added caching of next image
Version 2.10 Added index functionality
Version 2.00 Functional browsing of images forward and back
*/

// ====================
// ==== Parameters ====
// ====================
var showIndex = new Boolean(true); // Enable index display
var indexSeparator = ' '; // String between index items
var showCaption = new Boolean(true); // Enable caption display
var preCache = new Boolean(true); // Activates pre-caching of next photo
var pictureID = 'photo'; // SPAN or DIV ID for photo
var captionID = 'caption'; // SPAN or DIV ID for caption
var indexID = 'index'; // SPAN or DIV ID for index
var wrapOn = new Boolean(true); // Wrapping from last photo to first and vice-versa
var slideMode = new Boolean(false); // Enables slideshow mode
var slideDelay = 10; // Default delay between slides inseconds
var clickMode = new Boolean(true); // Disable image clicking to advance
var imageALT = new Boolean(true); // Disable caption as image ALT tag text

// ==========================
// ==== Third Party Code ====
// ==========================

/*
Webmonkey GET Parsing Module
Language: JavaScript 1.0

Source: Webmonkey Code Library
(http://www.hotwired.com/webmonkey/javascript/code_library/)

Author: Patrick Corcoran
Author Email: patrick@taylor.org
*/

function createRequestObject() {
 FORM_DATA = new Object();
 // The Object ("Array") where our data will be stored.
 separator = ',';
 // The token used to separate data from multi-select inputs
 query = '' + this.location;
 query = query.substring((query.indexOf('?')) + 1);
 // Keep everything after the question mark '?'.
 if (query.length < 1) { return false; }  // Perhaps we got some bad data?
 keypairs = new Object();
 numKP = 1;
 while (query.indexOf('&') > -1) {
  keypairs[numKP] = query.substring(0,query.indexOf('&'));
  query = query.substring((query.indexOf('&')) + 1);
  numKP++;
 }
 keypairs[numKP] = query;
 for (i in keypairs) {
  keyName = keypairs[i].substring(0,keypairs[i].indexOf('='));
  // Left of '=' is name.
  keyValue = keypairs[i].substring((keypairs[i].indexOf('=')) + 1);
  // Right of '=' is value.
  while (keyValue.indexOf('+') > -1) {
   keyValue = keyValue.substring(0,keyValue.indexOf('+')) + ' ' + keyValue.substring(keyValue.indexOf('+') + 1);
   // Replace each '+' in data string with a space.
  }
  keyValue = unescape(keyValue);
  // Unescape non-alphanumerics
  if (FORM_DATA[keyName]) {
   FORM_DATA[keyName] = FORM_DATA[keyName] + separator + keyValue;
  } else {
   FORM_DATA[keyName] = keyValue;
  }
 }
 return FORM_DATA;
}

FORM_DATA = createRequestObject();

// =============================
// ==== The heart of it all ====
// =============================


var glbCacheTimer;
var glbSlideTimer;

// Contains index of the current photo, initialized to the first photo (1)
var glbCurrentPhoto = 1;

// Array holding photo filenames
var photos = new Array ();

// Array holding photo captions
var captions = new Array ();

// Array holding link names
var linkNames = new Array ();

function getObjectByID(id) {
  // Cross-browser function to return the object with the specific id

  if (document.all) { // IE
    return document.all[id];
  } else { // Netscape
    return document.getElementById(id);
  }
}


function showPhoto(index) {
  // Shows the photo with identified index
  var theURL = "" + this.location;

  // Strip parameters, if any present, from end of URL.
  if (theURL.indexOf("?")>0) {
    theURL = theURL.substring(0,theURL.indexOf("?"));
  }

  // Append the new photo index as a parameter.
  theURL += "?photo=" + index;

  // Append the slideshow mode as a parameter.
  if (slideMode == true) {
    theURL += "&slideMode=true";
    theURL += "&slideDelay=" + slideDelay;
  }

  // Go to the constructed URL which has the new
  // photo's index as a parameter.
  this.location = theURL;
}

function showNext() {
  if (glbCurrentPhoto >= photos.length) {
    if (wrapOn == true) {
      glbCurrentPhoto = 1;
      showPhoto (glbCurrentPhoto);
    }
  } else {
    glbCurrentPhoto += 1;
    showPhoto (glbCurrentPhoto);
  }
}

function showPrevious() {
  if (glbCurrentPhoto <= 1) {
    if (wrapOn == true) {
      glbCurrentPhoto = photos.length;
      showPhoto (glbCurrentPhoto);
    }
  } else {
    glbCurrentPhoto += -1;
    showPhoto (glbCurrentPhoto);
  }
}

function showFirst() {
	glbCurrentPhoto = 1;
	showPhoto (glbCurrentPhoto);
}

function showLast() {
	glbCurrentPhoto = photos.length;
	showPhoto (glbCurrentPhoto);
}

function initPhoto() {
  // Display the photo
  var photoLocation = getObjectByID(pictureID);
  var imgString = '';

  if (clickMode == true) {imgString += "<a href='javascript:void(showNext());'>";}
  imgString += "<img border='0' id='mainImage' src='"+ photos[glbCurrentPhoto-1] +"'";
  if (imageALT == true) {imgString += ' alt="'+captions[glbCurrentPhoto-1].replace(/"/g,"'").replace(/<[^>]*>/g,"")+'"';}
  imgString += ">";
  if (clickMode == true) {imgString += "</a>";}
  photoLocation.innerHTML = imgString;

  // Create caption if enabled.
  if (showCaption == true) {
    var photoCaption = getObjectByID(captionID);
    photoCaption.innerHTML = captions[glbCurrentPhoto-1];
  }

  // Build the index if enabled.
  if (showIndex == true) {buildIndex();}

  // Pre-cache if enabled.
  if ((preCache == true) && (glbCurrentPhoto < photos.length)) {
    // Start timer for cache loader routine to check if main image is loaded
    glbCacheTimer = setTimeout('cache(' + glbCurrentPhoto + ');', 500);
  }

  // Slideshow mode, if enabled.
  if (slideMode == true) {
    glbSlideTimer = setTimeout('showNext();', (slideDelay * 1000));
  }
}

function cache(photoID) {
  // Check to see if main image has loaded
  if (getObjectByID('mainImage').complete) {
    // Clear the timer
    clearTimeout(glbCacheTimer);
    // Load the next image.
    getObjectByID('cache').src= photos[photoID];
  } else {
    // Not loaded, so reset timer
    glbCacheTimer = setTimeout('cache(' + glbCurrentPhoto + ');', 500);
  }
}

function addPhoto(filename, caption, linkName) {
  // Add filenames and captions to their respective arrays.
  var len = photos.length;
  photos[len] = filename;
  captions[len] = caption;
  if (typeof linkName == "undefined") {
	linkNames[len] = len + 1;
  } else {
	linkNames[len] = linkName;
  }
}

function buildIndex() {
  // Creates a clickable list of image numbers.
  var indexString = '';
  var i;

  for (i = 1; i < photos.length+1; i++) {
    // If not the first photo, add separator
    if (i>1) {indexString += indexSeparator}
    // Make current photo # bold and don't make it a link
    if (i == glbCurrentPhoto) {
      indexString += '<b>' + linkNames[i-1] + '</b>';
    } else { // Make all other numbers links
      indexString += '<a href="javascript:void(showPhoto(' + i + '));">' + linkNames[i-1] + '</a>';
    }
  }
  // Display the index
  getObjectByID(indexID).innerHTML = indexString;
}

function enableSlideMode (newDelay) {
  // Turns slide mode on
  slideMode=Boolean(true);
  if (newDelay > 0) {
    slideDelay = newDelay;
  }
  showPhoto(glbCurrentPhoto); //necessary to reset URL parameters.
//  glbSlideTimer=setTimeout('showNext();',(slideDelay*1000));
}

function disableSlideMode() {
  slideMode = Boolean(false);
  clearTimeout (glbSlideTimer);
  showPhoto(glbCurrentPhoto); //necessary to reset URL parameters.
}

// Get photo index from URL, if there is one, otherwise start at 1
if (FORM_DATA["photo"]>0) {
  glbCurrentPhoto = Number(FORM_DATA["photo"]);
} else {
  glbCurrentPhoto = 1;
}

// Get slide mode from URL, if there is one
if (FORM_DATA["slideMode"] == "true") {
  slideMode = Boolean(true);
  slideDelay = FORM_DATA["slideDelay"];
}
