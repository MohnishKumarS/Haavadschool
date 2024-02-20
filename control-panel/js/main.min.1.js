"use strict";

$(document).ready(function () {
    // AJAX send data
    function ajaxSend (data, phpFile) {
        var ajaxReq = new XMLHttpRequest();
        ajaxReq.open("POST", phpFile, true);

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
                    } else if (resp["opType"] === "changePasswd") {
                        processdChangePasswd (resp);
                    }
                } catch (error) {
                    console.log (this.response);
                }
                    
            } else {
                var data = "We reached our target server, but it returned an error";
                createNotification (data, "warning", true);
                console.log("We reached our target server, but it returned an error");
            }
        };

        ajaxReq.upload.addEventListener('progress', function(e) {
            // While sending and loading data.
            if (bUploadingImgs) {
                if (e.lengthComputable) {
                    var $progressBar = $(".upload-imgs__progress-bar"),
                        $progressValue = $(".upload-imgs__progress-value"),
                        uploaded = parseInt((e.loaded / e.total) * 100),
                        uploadedPers = uploaded + "%";
                    if ($(".upload-imgs__progress-bar-wrapper").hasClass ("oa-hidden")) {
                        $(".upload-imgs__progress-bar-wrapper").removeClass ("oa-hidden");
                    }
                    $progressBar.attr ("value", e.loaded);
                    $progressBar.attr ("max", e.total);
                    $progressValue.html (uploadedPers);
                }
            }
        });
        
        ajaxReq.onerror = function() {
            // There was a connection error of some sort
        };
        ajaxReq.send(data);
    }

    // Get catg 
    var getCatgories = new FormData (this);
    getCatgories.append ("getCatg", true);
    ajaxSend (getCatgories, "./php/gallery-control-panel.php");
    function processGetCatg (resp) {
        var $uploadImgCatg  = $(".upload-imgs__catg");
        $uploadImgCatg.html ("");
        for (var i = 0; i < resp["data"].length; i++) {
            var $markup = "<option value=" + resp["data"][i]["catgId"] + ">" + resp["data"][i]["catgName"] + "</option>";
            $uploadImgCatg.append ($markup);
        }
    }

    // Create a new catg
    $("#Create-catg-form").submit(function (e) { 
        e.preventDefault();
        var formData = new FormData (this);
        ajaxSend (formData, "./php/gallery-control-panel.php");  
        document.getElementById ("Create-catg-form").reset ();
    });
    function processCreateCatgs (resp) {
        createNotification (resp["data"], resp["opStatus"], true);
        ajaxSend (getCatgories, "./php/gallery-control-panel.php");
    }

    // Upload Image
    var bUploadingImgs = false;
    $("#Upload-imgs-form").submit (function (e) {
        e.preventDefault();
        var $files = $(".upload-imgs__new-img");
        var bValidateFiles = null;
        for (var i = 0; i < $files.length; i++) {
            bValidateFiles = validateFileUpload ($files[i]);
            if (!bValidateFiles) {
                break;
            }
            if (i === $files.length - 1) {
                var formData = new FormData (this);
                /* for (var key of formData.entries()) {
                    console.log(key[0] + ', ' + key[1]);
                } */
                bUploadingImgs = true;
                var resp = ajaxSend (formData, "./php/gallery-control-panel.php");
            }
        }
    });
    function processUploadImg (resp) {
        bUploadingImgs = false;
        $(".upload-imgs__progress-bar-wrapper").addClass ("oa-hidden");
        createNotification (resp["data"], resp["opStatus"], true);
        createNewImgBlock ();
        var $newImgWrap = $(".upload-imgs__new-img-wrapper");
        for (var i = 0; i < ($newImgWrap.length - 1); i++) {
            $($newImgWrap[i]).remove ();
        }
    }

    // Display all catg with thumbnail
    function processCatgThumb (resp) {
        var thumb = [];
        var r = resp["data"];
        var $imgGallery = $($(".img-gallery")[0]);
        $imgGallery.html ("");
        for (var i = 0; i < r.length; i++) {
            var htm = "<li class='img-gallery__item'>" + "<div class='img-gallery__item-catg-name' data-catg-id='" + r[i]["catgID"] + "'>" 
                      + r[i]["catgName"] + "</div>" + "<img src='" + r[i]["imgLoc"] 
                      + "' class='img-gallery__item-img'>" + "<a class='img-gallery__item-see-catg'" 
                      + "href='javascript:void(0);'>See Album</a><a href='javascript:void (0);'" 
                      + "class='img-gallery__item-delete'>Delete</a>'" + "</li>";
            $imgGallery.append (htm);
        }
        $(".img-gallery").removeClass ("oa-hidden");
        $(".img-gallery-imgs").addClass ("oa-hidden");
        imgGallerySeeCatg ();
        imgGalleryDelCatg ();
    }

    // See images in a catg
    var catgToDisplay = null,
        currentCatgId = null;
    function imgGallerySeeCatg () {
        $(".img-gallery__item-see-catg").click (function () {
            var catgID = $(this).parents (".img-gallery__item").find (".img-gallery__item-catg-name").attr ("data-catg-id");
            var formData = new FormData ();
            formData.append ("getCatgImgs", true);
            formData.append ("catgID", catgID);
            ajaxSend (formData, "./php/gallery-control-panel.php");
            catgToDisplay = $(this).parents (".img-gallery__item").find (".img-gallery__item-catg-name");
            currentCatgId = catgID;
            $(".img-gallery").addClass ("oa-hidden");
            $(".img-gallery-imgs__controls").removeClass ("oa-hidden");
            
            $(".img-gallery-imgs").removeClass ("oa-hidden");
            var $imgGalleryImgsList = $($(".img-gallery-imgs__list")[0]),
                $loadingAnim = $(".oa-loading-anim").clone ();
            $imgGalleryImgsList.html ("");
            $loadingAnim.removeClass ("oa-hidden");
            $imgGalleryImgsList.append ($loadingAnim);
            
        });
    }
    function processCatgImgs (resp) {
        $(".img-gallery-imgs__list").html ("");
        for (var i = 0; i < resp["data"].length; i++) {
            var htm = "<li class='img-gallery-imgs__item'>" + "<img src='" + resp["data"][i]["img_loc"] 
                      + "' class='img-gallery-imgs__item-img'>" + "<label class='oa-checkbox img-gallery-imgs__item-checkbox'>" 
                      + "<input class='oa-checkbox__checkbox' type='checkbox' name='selectImg'>" 
                      + "<span class='oa-checkbox__indicator'></span></label>"
                      + "<label class='img-gallery-imgs__item-delete'><i class='fa fa-trash-o' aria-hidden='true'></i></label></li>";
            $(".img-gallery-imgs__list").append (htm);
        }
        $(".img-gallery-imgs__list").attr ("data-catg-id", currentCatgId);
        $(".img-gallery-wrapper__title").html (catgToDisplay);
        selectImgs ();
        imgSelectAll ();
        manageSelectAll (true);
        imgsCheckbox ();
    }

    // Delete a catg
    function imgGalleryDelCatg() {
        $(".img-gallery__item-delete").click (function () {
            var conf = confirm ("Do you want to delete this album?");
            if (conf === true) {
                var catgID = $(this).parents (".img-gallery__item").find (".img-gallery__item-catg-name").attr ("data-catg-id");
                var formData = new FormData ();
                formData.append ("deleteCatg", true);
                formData.append ("catgID", catgID);
                ajaxSend (formData, "./php/gallery-control-panel.php");
                $(this).parents (".img-gallery__item").remove ();
            }
        });
    }
    function processDelCatg (resp) {
        createNotification (resp["data"], resp["opStatus"], true);
    }
    function selectImgs () {
        // delete single image
        $(".img-gallery-imgs__item-delete").click (function () {
            var $element = $(this).parents (".img-gallery-imgs__item").find (".img-gallery-imgs__item-img");
            delSelectedImgs ($element);
        });
    }
    // delete selected images
    $(".img-gallery-imgs__del-selected").click (function () {
        var $element = $(this).parents (".img-gallery-imgs").find (".img-gallery-imgs__list").find (".selected");
        if ($($element).length > 0) {
            delSelectedImgs ($element);
        } else {
            createNotification ("Select image(s) to delete.", "warning", true)
        }
    });
    function delSelectedImgs ($e) {
        var conf = confirm ("Do you want to delete this image(s)?");
        if (conf === true) {
            var imgLoc = [];
            var $ele = $e;
            for (var i = 0; i < $ele.length; i++) {
                imgLoc[i] = $($ele[i]).attr ("src");
            }
            var formData = new FormData ();
            formData.append ("delSelectedImgs", true);
            formData.append ("catgID", currentCatgId);
            formData.append ("imgLoc", JSON.stringify (imgLoc));
            ajaxSend (formData, "./php/gallery-control-panel.php");

            for (var i = 0; i < $ele.length; i++) {
                $($ele[i]).parents (".img-gallery-imgs__item").remove ();
            }
        }
    }
    function processdDelSelecImgs (resp) {
        createNotification (resp["data"], resp["opStatus"], true);
    }
    $(".img-gallery-imgs__back-btn").click (function () {
        $(".img-gallery-imgs").addClass ("oa-hidden");
        $(".img-gallery").removeClass ("oa-hidden");
        $(".img-gallery-wrapper__title").html ("List of Albums")
    });
    // Select all button 
    function imgSelectAll () {
        $(".img-gallery-imgs__select-all").off ();
        $(".img-gallery-imgs__select-all").click(function () { 
            console.log($(".img-gallery-imgs__item-img"));
            var $imgGalleryImgs = $(".img-gallery-imgs__item-img");
            var $checkboxBtn = $(".img-gallery-imgs__item-checkbox .oa-checkbox__checkbox");
            if ($(this).hasClass ("select-mode")) {
                toggleAllImgs ($imgGalleryImgs, $checkboxBtn, true); 
            } else if ($(this).hasClass ("unselect-mode")) {
                toggleAllImgs ($imgGalleryImgs, $checkboxBtn, false); 
            }
            manageSelectAll (false);
        });
    }
    function manageSelectAll (firstLoad) {
        var $selectAll = $($(".img-gallery-imgs__select-all")[0]);
        if (!firstLoad) {
            toggleSelectAll ($selectAll);
        } else {
            if ($selectAll.hasClass ("unselect-mode")) {
                var $imgGalleryImgs = $(".img-gallery-imgs__item-img");
                var $checkboxBtn = $(".img-gallery-imgs__item-checkbox .oa-checkbox__checkbox");
                toggleAllImgs ($imgGalleryImgs, $checkboxBtn, false);
                toggleSelectAll ($selectAll);
            } 
        }
    }
    // select and unselect
    function toggleAllImgs ($imgGalImgs, $checkBtn, bSelectAll) {
        if (bSelectAll) {
            for (var i = 0; i < $imgGalImgs.length; i++) {
                $($imgGalImgs[i]).addClass ("selected");
                $checkBtn[i].checked = true;
            }
        } else {
            for (var j = 0; j < $imgGalImgs.length; j++) {
                $($imgGalImgs[j]).removeClass ("selected");
                $checkBtn[j].checked = false;
            }
        }
    }
    function toggleSelectAll ($selAll) {
        if ($selAll.hasClass ("select-mode")) {
            $selAll.removeClass ("select-mode");
            $selAll.addClass ("unselect-mode");
            var htm = "<i class='fa fa-times' aria-hidden='true'></i> Unselect All";
            $selAll.html (htm);
        } else if ($selAll.hasClass ("unselect-mode")) {
            $selAll.removeClass ("unselect-mode");
            $selAll.addClass ("select-mode");
            var htm = "<i class='fa fa-check' aria-hidden='true'></i> Select All";
            $selAll.html (htm);
        }
    }
    function imgsCheckbox () {
        $(".img-gallery-imgs__item-checkbox .oa-checkbox__checkbox").off ();
        $(".img-gallery-imgs__item-checkbox .oa-checkbox__checkbox").click (function () {
            if ($(this).is (":checked")) {
                $(this).attr ("checked", "checked");
                $(this).parents (".img-gallery-imgs__item").find (".img-gallery-imgs__item-img").addClass ("selected");
            } else {
                $(this).removeAttr ("checked");
                $(this).parents (".img-gallery-imgs__item").find (".img-gallery-imgs__item-img").removeClass ("selected");
            }
        });
    }

    // Change password
    $("#Change-passwd-form").submit(function (e) { 
        e.preventDefault();
        var newPass = $("[name=newPasswd]").val (),
            confNewPass = $("[name=confirmPasswd]").val ();
        
        var bPwdStrenght = validateForm ("pwdStrength", newPass),
            bPwdMatch = validateForm ("pwdMatch", [newPass, confNewPass]);
        if (bPwdMatch && bPwdStrenght) {
            var formData = new FormData (this);
            ajaxSend (formData, "./php/change-passwd.php");  
            document.getElementById ("Change-passwd-form").reset ();
        } else {
            var pMatch = bPwdMatch === true ? "<span style='color: var(--clr-success)'>Matching</span>" : "<span style='color: var(--clr-danger)'>Not Matching</span>",
                pStrenght = bPwdStrenght === true ? "<span style='color: var(--clr-success)'>Good</span>" : "<span style='color: var(--clr-danger)'>Bad (requires atleast 5 characters, 1 letter, 1 number)</span>";
            var ele = "<ul><li style='color: var(--clr-dark)'>Password Match: " + pMatch + "</li>" 
                      + "<li style='color: var(--clr-dark)'>Password Strenght: " + pStrenght + "</li></ul>"
                      console.log(ele)

            createNotification (ele, "", false);
        }
    });
    function processdChangePasswd (resp) {
        createNotification (resp["data"], resp["opStatus"], true);
    }
    function validateForm (type, val) {
        var allLetters = /^[a-zA-Z]+$/,
            letter = /[a-zA-Z]/,
            number = /[0-9]/;

        switch (type) {
            case "pwdStrength":
                if (val.length < 5 || !letter.test(val) || !number.test(val)) {
                    return false;
                }
                break;
            case "pwdMatch":
                if (val[0] !== val[1]) {
                    return false;
                }
                break;
            default:
                break;
        }
        return true;
    }

    // Add fields for more images
    $(".upload-imgs__add-more-btn").click (function () {
        createNewImgBlock ();
    });
    function createNewImgBlock () {
        var $newImgWrap = $(".upload-imgs__new-img-wrapper"),
            $addNewImgwrap = $($newImgWrap[0]).clone (),
            $addImgFileEle = $addNewImgwrap.find (".upload-imgs__new-img"),
            newImgELe = document.createElement ("input"),
            newImgClasses = $addImgFileEle.attr ("class"),
            newImgType = $addImgFileEle.attr ("type"),
            newImgName = $addImgFileEle.attr ("name"),
            newImgValue = "",
            newImgDataAfterContent = "Choose a file";

        $addNewImgwrap.find (".upload-imgs__new-img").remove ();

        $(newImgELe).addClass (newImgClasses);
        $(newImgELe).attr ("type", newImgType);
        $(newImgELe).attr ("name", newImgName);
        $(newImgELe).attr ("value", "");
        $(newImgELe).attr ("data-after-content", "Choose a file");

        $addNewImgwrap.prepend (newImgELe);

        $addNewImgwrap.insertBefore (".upload-imgs__add-more-btn");
        handleFileInput ();
    }

    // Tabs nav
    $(".nav-list__menu-item").click (function () {
        var $tabBlock = $(".tab-block");
        for (var i = 0; i < $tabBlock.length; i++) {     
            $($tabBlock[i]).css ("display", "none");
            $($(".nav-list__menu-item")[i]).removeClass ("active");
        }

        $(this).addClass ("active");

        if ($(this).hasClass ("create-catg-nav")) {
            $(".create-catg").css ("display", "block");
        } else if ($(this).hasClass ("upload-imgs-nav")) {
            $(".upload-imgs").css ("display", "block");
        } else if ($(this).hasClass ("all-catg-list-nav")) {
            $(".img-gallery-wrapper").css ("display", "block");

            var $imgGallery = $($(".img-gallery")[0]),
                $loadingAnim = $(".oa-loading-anim").clone ();
            $imgGallery.html ("");
            $loadingAnim.removeClass ("oa-hidden");
            $imgGallery.append ($loadingAnim);

            var getCatgThumb = new FormData (this);
            getCatgThumb.append ("getCatgThumb", true);
            ajaxSend (getCatgThumb, "./php/gallery-control-panel.php");
        } else if ($(this).hasClass ("settings-nav")) {
            $(".panel-settings").css ("display", "block");
        }
    });

    // input file. Display selected file name
    function handleFileInput () {
        var uploadImgsNewImg = document.getElementsByClassName ("upload-imgs__new-img");
        for (var j = 0; j < uploadImgsNewImg.length; j++) {
            uploadImgsNewImg[j].addEventListener("change", function () {
                var filName = $(this).prop ("files")[0]["name"];
                $(this).attr ("data-after-content", filName);
            });
        }
    } handleFileInput ();

    // notification-box 
    function createNotification (data, status, bTimeOut) {
        var $notfBox = $(".notification-box").clone ();
        $notfBox.removeClass ("oa-hidden");
        $notfBox.find (".notification-box__msg").html (data);
        $notfBox.find (".notification-box__close").click (function () {
            $(this).parents (".notification-box").addClass ("oa-hidden");
        });

        if (status === "success") {
            $notfBox.find (".notification-box__msg").addClass ("success-notification");
        } else if (status === "warning") {
            $notfBox.find (".notification-box__msg").addClass ("warning-notification");
        } else {
            $notfBox.find (".notification-box__msg").addClass ("danger-notification");
        }
        $(".page-content").prepend ($notfBox);

        if (bTimeOut) {
            setTimeout(function() {
                $notfBox.remove ();
            }, 5000);
        }
    }

    function validateFileUpload (file) {
        var fileName = [],
            fileSize = [],
            maxSize = 2000000;

        for (var i = 0; i < file.files.length; i++) {
            fileName[i] = file.files[i].name;
            fileSize[i] = file.files[i].size;
        }

        if (fileName.length) {
            for (var j = 0; j < fileName.length; j++) {
                var fileExt = fileName[j].substring(fileName[j].lastIndexOf('.') + 1).toLowerCase();
        
                if (fileExt == "gif" || fileExt == "png" || fileExt == "jpeg" || fileExt == "jpg") {
                    if(fileSize[j] > maxSize){
                        createNotification (("Image file size should not exceed " + (maxSize / 1000000) + "MB"), "danger", 5000);
                        return false;
                    }
                } 
                else {
                    createNotification ("Only PNG, JPG, JPEG and GIF file formats are allowed.", "danger", 5000);
                    return false;
                }
            }  
            return true;
        } else {
            createNotification ("Please include a image file to upload", "warning", 5000);
            return false; 
        }
    }

    // Menu bar
    var $hamBar = $(".nav-list__ham"),
        $menuBar = $(".nav-list__menu");

    manageMenu ();
    $(window).resize (function () { 
        manageMenu ();
    });
    $(".nav-list__ham").click(function () { 
        if ($menuBar.hasClass ("oa-hidden")) {
            $menuBar.removeClass ("oa-hidden");
        } else {
            $menuBar.addClass ("oa-hidden");
        }
    });
    function manageMenu () {
        if ($(window).width () > 768) {
            $hamBar.addClass ("oa-hidden");
            if ($menuBar.hasClass ("oa-hidden")) {
                $menuBar.removeClass ("oa-hidden");
            }
        } else {
            if ($hamBar.hasClass ("oa-hidden")) {
                $hamBar.removeClass ("oa-hidden");
            } 
            $menuBar.addClass ("oa-hidden");
        }
    }
});