"use strict";

$(document).ready(function () {
    function ajaxSend (data) {
        var ajaxReq = new XMLHttpRequest();
        ajaxReq.open("POST", "./control-panel/php/gallery-control-panel.php", true);

        ajaxReq.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                try {
                    var resp = JSON.parse (this.response);
                    if (resp["opType"] === "getFilters") {
                        processGetFilters (resp);
                    }  else if (resp["opType"] === "catgThumb") {
                        processCatgThumb (resp);
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

    var formData = new FormData (this);
    formData.append ("getFilters", true);
    ajaxSend (formData);
    var filterList = [];
    function processGetFilters (resp) {
        var $imgGallery = $($(".img-gallery .container")[0]);
        var r = resp["data"];
        var markup = "<ul class='image-filters'><li class='image-filters__item active' data-filter-id='none'>" 
                     + "<a href='javascript:void(0);' class='image-filters__link'>All</a></li>";

        $imgGallery.html ("");
        for (var i = 0; i < r.length; i++) {
            if (r[i]["filterHidden"] !== "1") {
                markup += "<li class='image-filters__item' data-filter-id=" + r[i]["filterId"] + ">" 
                        + "<a href='javascript:void(0);' class='image-filters__link'>" + r[i]["filterName"] + "</a></li>"
            } 
            filterList[i] = [];
            filterList[i]["name"] = r[i]["filterName"];
            filterList[i]["ID"] = r[i]["filterId"];
            filterList[i]["hidden"] = r[i]["filterHidden"];
        }
        markup += "</ul>";
        $imgGallery.append (markup);
        getThumb ();
        filterClick ();
    }
    function filterClick () {
        $(".image-filters__link").click(function () { 
            var filtID = $(this).parents (".image-filters__item").attr ("data-filter-id"),
                $imgGalleryItems = $(".img-gallery__item"),
                $imgFiltersItem = $(".image-filters__item");
            if (filtID !== "none") {
                for (var i = 0; i < $imgGalleryItems.length; i++) {
                    if ($($imgGalleryItems[i]).attr ("data-filter-id").trim () === filtID.trim ()) {
                        $($imgGalleryItems[i]).css ("display", "inline-block");
                    } else {
                        $($imgGalleryItems[i]).css ("display", "none");
                    }
                }
            } else {
                for (var j = 0; j < $imgGalleryItems.length; j++) {
                    $($imgGalleryItems[j]).css ("display", "inline-block");
                }
            }

            for (var k = 0; k < $imgFiltersItem.length; k++) {
                $($imgFiltersItem[k]).removeClass ("active");
            }
            $(this).parents (".image-filters__item").addClass ("active");
        });
    }

    function getThumb () {
        var getCatgThumb = new FormData (this);
        getCatgThumb.append ("getCatgThumb", true);
        ajaxSend (getCatgThumb);
    }

    // Display all catg with thumbnail
    function processCatgThumb (resp) {
        var thumb = [];
        var r = resp["data"];
        var $imgGallery = $($(".img-gallery .container")[0]);
        for (var i = 0; i < r.length; i++) {
            if (r[i]["catgHidden"] !== "1") {
                if (r[i]["imgLoc"] !== null) {
                    var imgLoc = "./control-panel" + r[i]["imgLoc"].replace (/^./, "");
                } else {
                    imgLoc = null;
                }
                var htm = "<div class='img-gallery__item col-md-4 col-sm-12' data-filter-id='" + r[i]["filterID"] + "' data-catg-hidden='" 
                          + r[i]["catgHidden"] + "' style='display: none;'>"
                          + "<a class='img-gallery__item-see-catg' href='javascript:void(0);'>" + 
                        "<img src='" + imgLoc + "' class='img-gallery__item-img img-responsive'></a>" + 
                        "<h3 class='img-gallery__item-catg-name' data-catg-id='" + r[i]["catgID"] + "'>" + r[i]["catgName"] + "</h3>";
                $imgGallery.append (htm);
            }
        }
        var $imgGalleryItems = $(".img-gallery__item");
        for (var j = 0; j < filterList.length; j++) {
            if (filterList[j]["hidden"] !== "1") {
                for (var k = 0; k < $imgGalleryItems.length; k++) {
                    if ($($imgGalleryItems[k]).attr ("data-filter-id").trim () === filterList[j]["ID"].trim () && $($imgGalleryItems[k]).attr ("data-catg-hidden") !== "1") {
                        $($imgGalleryItems[k]).css ("display", "inline-block");
                    } 
                }
            } else {
                for (var l = 0; l < $imgGalleryItems.length; l++) {
                    if ($($imgGalleryItems[l]).attr ("data-filter-id").trim () === filterList[j]["ID"].trim ()) {
                        $($imgGalleryItems[l]).remove ();
                    }
                }
            }
        }
        catgClick ();
    }

    function catgClick () {
        $(".img-gallery__item-see-catg").click (function () {
            var catgID = $(this).parents (".img-gallery__item").find (".img-gallery__item-catg-name").attr ("data-catg-id");
            window.location.href = "gallery-images.html?catgID=" + catgID;
        });
    }
});