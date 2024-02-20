"use strict";

$(document).ready(function () {
    function ajaxSend (data) {
        var ajaxReq = new XMLHttpRequest();
        ajaxReq.open("POST", "./control-panel/php/gallery-control-panel.php", true);

        ajaxReq.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                try {
                    var resp = JSON.parse (this.response);
                    if (resp["opType"] === "getCatg") {
                        processGetCatg (resp);
                    } else if (resp["opType"] === "createCatg") {
                        processCreateCatgs (resp);
                    } else if (resp["opType"] === "imgAdded") {
                        processUploadImg (resp);
                    } else if (resp["opType"] === "catgThumb") {
                        processCatgThumb (resp);
                    } else if (resp["opType"] === "catgImgs") {
                        processCatgImgs (resp);
                    } else if (resp["opType"] === "delCatg") {
                        processDelCatg (resp);
                    } else if (resp["opType"] === "delSelecImgs") {
                        processdDelSelecImgs (resp);
                    }
                } catch (error) {
                    console.log (this.response);
                }
                    
            } else {
                var data = "We reached our target server, but it returned an error";
                console.log("We reached our target server, but it returned an error");
            }
        };
        
        ajaxReq.onerror = function() {
            // There was a connection error of some sort
        };
        ajaxReq.send(data);
    }

    // Get catg 
    var catgID = getURLParameter ("catgID");
    var catgName = null;
    var getCatgories = new FormData ();
    getCatgories.append ("getCatg", true);
    ajaxSend (getCatgories);

    function processGetCatg (resp) {
        for (var i = 0; i < resp["data"].length; i++) {
            if (catgID === resp["data"][i]["catgId"]) {
                catgName = resp["data"][i]["catgName"];
                break;
            }
        }
        $("title").html (catgName + "Harvard International School");
        $(".page-fold__title").html (catgName);
        getImgs ();
    }

    function getImgs () {
        var formData = new FormData ();
        formData.append ("getCatgImgs", true);
        formData.append ("catgID", catgID);
        ajaxSend (formData);
    }

    function processCatgImgs (resp) {
        $(".img-gallery-imgs .container").html ("");
        for (var i = 0; i < resp["data"].length; i++) {
            if (resp["data"][i]["img_loc"] !== null) {
                var imgLoc = "./control-panel" + resp["data"][i]["img_loc"].replace (/^./, "");
            } else {
                var imgLoc = null;
            }
            var htm = "<div class='col-md-4 col-sm-12 img-gallery-imgs__item'>" + 
                      "<a href='" + imgLoc + "' data-lightbox='annual-day'>" + 
                      "<img src='" + imgLoc + "' class='img-gallery-imgs__item-img img-responsive'></a></div>";
            $(".img-gallery-imgs .container").append (htm);
        }
    }

    // get a parameter from url
    function getURLParameter(name) {
        return decodeURIComponent ((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
    }
});