window.onload = rotate;

var adImages = new Array("images/.jpg","...");
var thisAd = 0;

function rotate() {
	thisAd++;
	if (thisAd == adImages.length) {
		thisAd = 0;
	}
	document.getElementById("adBanner").src = adImages[thisAd];

	setTimeout("rotate()", 4 * 2000);
}

		// JavaScript Document
