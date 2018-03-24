// all variables for manipulating the dom
var OverlayContainer = document.getElementById("mainoeverlaycontainer");
var overlay = document.getElementsByClassName("overlay");
var btn = document.getElementById("btn");
var overlayContent = document.getElementsByClassName("showmoreoverlay");
var roomsOverlay = document.getElementsByClassName("roomsoverlay");
var overContentIndex = [];

var selectOverlayContent = function(overlayValue) {
    console.log(overlayValue);
    if (overlayValue == 0 || overlayValue == 1 || overlayValue == 2) {
        overlay[0].style.display = "block";
        overlay[1].style.display = "none";
        roomsOverlay[overlayValue].style.display = "block";

    } else if (overlayValue == 3 || overlayValue == 4) {
        overlay[0].style.display = "none";
        overlay[1].style.display = "block";
        roomsOverlay[overlayValue].style.display = "block";
    }
};
var showMore = function() {

    var overlayContentLength = overlayContent.length;

    for (var ii = 0; ii < overlayContent.length; ii++) {
        overlayContent[ii].addEventListener("click", function() {
            OverlayContainer.style.display = "block";
            for (var i = 0; i < overlayContentLength; i++) {
                if (this == overlayContent[i]) {
                    for (var x = 0; x < overlay.length; x++) {
                        overlay[x].style.display = "none";
                    }
                    for (var x = 0; x < roomsOverlay.length; x++) {
                        roomsOverlay[x].style.display = "none";
                    }
                    selectOverlayContent(i);
                    break;
                }
            }
        }, false);
    }

};
var overlayContainerFunction = function() {
    this.style.display = "none";
};
var btnFunction = function() {
    OverlayContainer.style.display = "none";

};

var EventsInit = function() {
    btn.addEventListener("click", btnFunction, false);
    OverlayContainer.addEventListener("click", overlayContainerFunction, false);
    showMore();
};

EventsInit();