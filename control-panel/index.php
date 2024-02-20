<?php require_once ("./php/access.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gallery Control Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
        <link href="./css/common.min.css?ver=2.12.21.17.02" rel="stylesheet">
		<style>
		.image-filters__item {
			padding: 5px 10px;
			margin: 5px 5px;
			background-color: #03B486;
			border-radius: 20px;
			outline:none;
			color:white;
			border:none;
		}
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  background-color: #fefefe;
		  margin: auto;
		  padding: 20px;
		  border: 1px solid #888;
		  width: 80%;
		}

		/* The Close Button */
		.close {
		  color: black;
		  float: right;
		  font-size: 28px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #000;
		  text-decoration: none;
		  cursor: pointer;
		}
		</style>
    </head>
    <body>
        <div class="oa-container">
            <nav class="nav-list">
                <div class="oa-container">
                    <a class="nav-list__ham oa-hidden" href="javascript:void(0);"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
                    <ul class="nav-list__menu">
                        <li class="nav-list__menu-item active">
                            <a href="javascript:void(0);" class="nav-list__menu-dropdown-trigger oa-dropdown-trigger" data-oa-dropdown="#Image-gallery-links"><i class="fa fa-picture-o" aria-hidden="true"></i> Manage Photos</a>
                            <ul id="Image-gallery-links" class="nav-list__dropdown oa-dropdown oa-hidden">
                                <a href="javascript:void(0);" class="nav-list__menu-link upload-imgs-nav"><i class="fa fa-upload" aria-hidden="true"></i> Upload images</a>
<!--                                <a href="javascript:void(0);" class="nav-list__menu-link manage-catg-nav"><i class="fa fa-tachometer" aria-hidden="true"></i> Manange Albums</a>-->
                                <a href="javascript:void(0);" class="nav-list__menu-link manage-filters-nav"><i class="fa fa-list-ul" aria-hidden="true"></i> Manange Catgories</a>
                                <a href="javascript:void(0);" class="nav-list__menu-link img-gallery-nav"><i class="fa fa-th-large" aria-hidden="true"></i> Image Gallery</a>
                            </ul>
                        </li>
                        <li class="nav-list__menu-item">
                            <a href="javascript:void(0);" class="nav-list__menu-dropdown-trigger oa-dropdown-trigger" data-oa-dropdown="#Video-gallery-links"><i class="fa fa-video-camera" aria-hidden="true"></i> Manage Video</a>
                            <ul id="Video-gallery-links" class="nav-list__dropdown oa-hidden">
                                <a href="javascript:void(0);" class="nav-list__menu-link upload-videos-nav"><i class="fa fa-upload" aria-hidden="true"></i> Upload Videos</a>
                                <a href="javascript:void(0);" class="nav-list__menu-link video-gallery-nav"><i class="fa fa-th-large" aria-hidden="true"></i> Video Gallery</a>
                            </ul>
                        </li>
                        <li class="nav-list__menu-item">
                            <a href="javascript:void(0);" class="nav-list__menu-dropdown-trigger nav-list__menu-link poster-nav"><i class="fa fa-cog" aria-hidden="true"></i> Posters</a>
                        </li>
                        <li class="nav-list__menu-item">
                            <a href="javascript:void(0);" class="nav-list__menu-dropdown-trigger nav-list__menu-link settings-nav"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="page-content">
                <div class="notification-box oa-hidden">
                    <p class="notification-box__msg"></p>
                    <span class="notification-box__close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                </div>

                <!-- IMAGE SECTIONS -->
                <section class="upload-imgs tab-block">
                    <h3 class="tab-block__title">Upload images</h3>
                    <form id="Upload-imgs-form" class="upload-imgs__form content-block" action="./php/gallery-control-panel.php" method="POST">
                        <h4 class="upload-imgs__sub-title">Select a album</h4>

                        <select class="upload-imgs__catg oa-select-btn" name="imgCatg" id="imgCatg">
                        </select>
                        <h4 class="upload-imgs__sub-title">Add Images</h4>
                        <div class="upload-imgs__new-img-wrapper">
                            <input class="upload-imgs__new-img oa-input-file" type="file" name="img[]" value="" data-after-content="Choose a file">
                            <a href="javascript:void(0);" class="upload-imgs__delete-file-inp"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <input class="upload-imgs__new-img-descrip oa-input-text oa-hidden" type="text" name="imgDescrip[]" value="" placeholder="image description" maxlength="240">
                        </div>
                        <input type="hidden" name="imgUpload" value="true">
                        <button type="button" class="upload-imgs__add-more-btn oa-btn-success">+ Add More</button>
                        <button class="upload-imgs__submit-btn oa-btn-danger" type="submit">Upload</button>
                    </form>
                    <div class=""></div>
                    <div class="upload-imgs__progress-bar-wrapper oa-hidden">
                        <h4 class="upload-imgs__progress-title">Uploading...</h4>
                        <progress class="upload-imgs__progress-bar" value="" max=""></progress>
                        <span class="upload-imgs__progress-value"></span>
                    </div>
                </section>
<!--
                <section class="manage-catg tab-block">
                    <h3 class="tab-block__title">Create new Album</h3>
                    <form id="Create-catg-form" class="create-catg__form content-block" action="./php/gallery-control-panel.php" method="POST">
                        <h4 class="create-catg__sub-title">Enter album name</h4>
                        <input class="create-catg__input oa-input-text" type="text" name="catgName" value="" placeholder="Enter album name" maxlength="1000" required>
                        <h4 class="create-catg__sub-title">Select category</h4>
                        <select class="create-catg__filters oa-select-btn" name="catgFilter">
                        </select>
                        <input class="" type="hidden" name="createCatg" value="true">
                        <button class="create-catg__submit-btn oa-btn-danger" type="submit">Create</button>
                    </form>
                    <h3 class="tab-block__title">Edit Albums</h3>
                    <ul class="manage-catgs__catg-list">
                    </ul>
                    <div class="notification-box edit-catg-name-box oa-hidden">
                        <p class="notification-box__msg edit-catg-name-box__msg"></p>
                        <span class="notification-box__close edit-catg-name-box__close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                        <form id="Edit-catg-name-form" class="edit-catg-name-form content-block" action="./php/gallery-control-panel.php" method="POST">
                            <input class="edit-catg-name-box__input oa-input-text" type="text" placeholder="Enter new name" value="" maxlength="1000" required>
                            <input class="edit-catg-name-box__catg-details" type="hidden" name="catgName" value="">
                            <input class="edit-catg-name-box__catg-details" type="hidden" name="catgID" value="">
                            <button class="edit-catg-name-box__submit-btn oa-btn-danger" type="submit">Change Name</button>                     
                        </form>
                    </div>
                    <div class="notification-box edit-catg-filter-box oa-hidden">
                        <p class="notification-box__msg edit-catg-filter-box__msg"></p>
                        <span class="notification-box__close edit-catg-filter-box__close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                        <form id="Edit-catg-filter-form" class="edit-catg-filter-form content-block" action="./php/gallery-control-panel.php" method="POST">
                            <select class="edit-catg-filter-box__catg-list oa-select-btn" name="filterID">
                            </select>
                            <input class="edit-catg-filter-box__catg-details" type="hidden" name="catgID" value="">
                            <button class="edit-catg-filter-box__submit-btn oa-btn-danger" type="submit">Change</button>                     
                        </form>
                    </div>
                </section>-->

                <section class="manage-filters tab-block">
                    <h3 class="tab-block__title">Create new Category</h3>
                    <form id="Create-filter-form" class="create-filter__form content-block" action="./php/gallery-control-panel.php" method="POST">
                        <input class="create-filter__input oa-input-text" type="text" name="filterName" value="" placeholder="Enter category name" maxlength="1000" required>
						<br/><br/>
                        <select class="create-filter__input oa-select-btn" name="catYear">
							<option value="0" disabled selected>Select a Year</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
						</select>
						<br/><br/>
                        <input class="" type="hidden" name="createFilter" value="true">
                        <button class="create-filter__submit-btn oa-btn-danger" type="submit">Create</button>
                    </form>
					<h3 class="tab-block__title">Set Global Limit</h3>
					<form id="Set-limit-form" class="create-filter__form content-block" action="./php/gallery-control-panel.php" method="POST">
						<select class="oa-select-btn" style="width:30%" name="limit">
							<option value="0" selected disabled>Select Limit</option>
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select><br/><br/>
						<input class="" type="hidden" name="setLimit" value="true">
                        <button class="create-filter__submit-btn oa-btn-danger" type="submit">Set</button>
						<br/>
						<br/>
					</form>

					<h3 class="tab-block__title">Set News flash</h3>
					<form id="Set-limit-form" class="create-filter__form content-block" action="./php/gallery-control-panel.php" method="POST">
						<input class="" type="hidden" name="setFlash" value="true">
						<textarea class="create-filter__input oa-input-text" type="text" name="flashNews" placeholder="Enter Flash News" maxlength="1000" required style="height:150px;width:80%;"></textarea><br/>
                        <button class="create-filter__submit-btn oa-btn-danger" type="submit">Set</button>
						<br/>
						<br/>
					</form>

                    <h3 class="tab-block__title">Edit Categories</h3>
                    <ul class="manage-filters__filter-list">
                    </ul>
                    <div class="notification-box edit-filter-name-box oa-hidden">
                        <p class="notification-box__msg edit-filter-name-box__msg"></p>
                        <span class="notification-box__close edit-filter-name-box__close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                        <form id="Edit-filter-name-form" class="edit-filter-name-form content-block" action="./php/gallery-control-panel.php" method="POST">
                            <input class="edit-filter-name-box__input oa-input-text" type="text" placeholder="Enter new name" value="" maxlength="1000" required>
                            <input class="edit-filter-name-box__filter-details" type="hidden" name="filterName" value="">
                            <input class="edit-filter-name-box__filter-details" type="hidden" name="filterID" value="">
                            <button class="edit-filter-name-box__submit-btn oa-btn-danger" type="submit">Change Name</button>                     
                        </form>
                    </div>
                </section>
                
                <section class="img-gallery-wrapper tab-block">
                    <div class="img-gallery-wrapper__filter-select-wrapper">
                        <h3 class="img-gallery-wrapper__filter-title tab-block__title">Select Category</h3>
                        <select class="img-gallery-wrapper__filters oa-select-btn" name ="imgCatg2" id="imgCatg2">
                        </select>
                    <h3 class="img-gallery-wrapper__title tab-block__title">Gallery</h3>
                    </div>
					<div class="container">
						<div class="row">
							<div id="img-gallery">
							</div>
						</div>
					</div>
                    <div class="img-gallery-imgs">
                        <div class="img-gallery-imgs__controls oa-hidden">
                            <a href="javascript:void (0);" class="img-gallery-imgs__back-btn oa-hidden"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to albums</a>
                            <a href="javascript:void (0);" class="img-gallery-imgs__select-all img-gallery-imgs__control unselect-mode"><i class="fa fa-check" aria-hidden="true"></i> Select All</a>
                            <a href="javascript:void (0);" class="img-gallery-imgs__del-selected img-gallery-imgs__control"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                        </div>
                        <ul class="img-gallery-imgs__list">
                        </ul>
                    </div>
                </section>

                <!-- VIDEO SECTIONS -->
                <section class="upload-videos tab-block">
                    <h3 class="tab-block__title">Add videos</h3>
                    <form id="Upload-videos-form" class="upload-videos__form content-block" action="./php/video-gallery-controls.php" method="POST">
                        <div class="upload-videos__new-video-wrapper">
                            <h4 class="upload-videos__sub-title">Video 1</h4>
                            <input class="upload-videos__video-description oa-input-text" type="text" name="videoDescription[]" value="" placeholder="Video description"
                                maxlength="1000" required>
                            <input class="upload-videos__video-year oa-input-text " type="number" name="videoYear[]" value="" placeholder="Video year"
                                maxlength="1000" required style="margin-bottom:10px">
                            <input class="upload-videos__video-url oa-input-text" type="url" name="videoURL[]" value="" placeholder="Enter Youtube Video URL"
                                maxlength="1000" required>
                            <a href="javascript:void(0);" class="upload-videos__delete-video-inp">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                        <input type="hidden" name="videoUpload" value="true">
                        <button type="button" class="upload-videos__add-more-btn oa-btn-success">+ Add More</button>
                        <button class="upload-videos__submit-btn oa-btn-danger" type="submit">Upload</button>
                    </form>
                    <div class=""></div>
                    <div class="upload-videos__progress-bar-wrapper oa-hidden">
                        <h4 class="upload-videos__progress-title">Uploading...</h4>
                        <progress class="upload-videos__progress-bar" value="" max=""></progress>
                        <span class="upload-videos__progress-value"></span>
                    </div>
                </section>

                <section class="video-gallery tab-block">
                    <h3 class="video-gallery__title tab-block__title">Video Gallery</h3>
                    <ul class="video-gallery__gallery">
                        <li class="video-gallery__gallery-item">
                            <h4 class="video-gallery__video-title">Lorem Ipsum</h4>
                            <div class="video-gallery__video-code">
                                <iframe id="ytplayer" type="text/html" width="360" height="202" src="" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="video-gallery__video-del"><a class="video-gallery__video-del-btn" href="javascript:video (0);">DELETE</a></div>
                        </li>
                    </ul>
                </section>

                    <!-- CONTROL PANEL PASSWORD -->
                    <section class="poster-wrapper tab-block">
                    <h3 class="panel-settings__title tab-block__title">Upload poster image</h3>
                    <form id="Change-passwd-form" class="panel-settings__passwd-form content-block" action="./php/change-passwd.php" method="POST">
                        <h4 class="panel-settings__sub-title">add image</h4>
                        <input class="panel-settings__input panel-settings__current-passwd-input oa-input-text" type="file" name="posterimg" value="" required>
                      
                        <button class="panel-settings__submit-btn oa-btn-danger" type="submit">Submit</button>
                    </form>
                </section>

                <!-- CONTROL PANEL PASSWORD -->
                <section class="panel-settings tab-block">
                    <h3 class="panel-settings__title tab-block__title">Change control panel password</h3>
                    <form id="Change-passwd-form" class="panel-settings__passwd-form content-block" action="./php/change-passwd.php" method="POST">
                        <h4 class="panel-settings__sub-title">Current password</h4>
                        <input class="panel-settings__input panel-settings__current-passwd-input oa-input-text" type="password" name="currentPasswd" value="" placeholder="Enter current password" required>
                        <h4 class="panel-settings__sub-title">New password</h4>
                        <input class="panel-settings__input oa-input-text" type="password" name="newPasswd" value="" placeholder="Enter new password" required>
                        <input class="panel-settings__input oa-input-text" type="password" name="confirmPasswd" value="" placeholder="Re-enter new password" required>
                        <input class="" type="hidden" name="changePasswd" value="true">
                        <button class="panel-settings__submit-btn oa-btn-danger" type="submit">Submit</button>
                    </form>
                </section>
            </div>
            <div class="oa-loading-anim oa-hidden">
                <i class="fa fa-cog fa-spin"></i>
                <span>Loading...</span>
                <i class="fa fa-cog fa-spin"></i>
            </div>
        </div>
		<div id="myModal" class="modal">
			<div class="modal-content" style="text-align:center">
				<span class="close">&times;</span>
				<div  id="modal-ele"></div>
				<img id="modal-img" src=""/><br/>
				
			</div>
		</div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
			"use strict"
            if (typeof jQuery === 'undefined') {
                document.write("<scr" + "ipt src=\"./js/jquery-3.2.1.min.js\"></" + "script>");
            }
			
			var modal = document.getElementById("myModal");

		// Get the button that opens the modal

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];


			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			  modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal) {
				modal.style.display = "none";
			  }
			}
			function reqsend(fdata,src) {
				var conf = confirm ("Do you want to remove this Image?");
				if (conf) {
					var getCatgories = new FormData ();
					getCatgories.append ("deleteImg", true);
					getCatgories.append ("id", fdata);
					getCatgories.append ("name", src);
					var ajaxReq = new XMLHttpRequest();
					ajaxReq.open("POST", "./php/gallery-control-panel.php", true);
					ajaxReq.onload = function() {
						if (this.status >= 200 && this.status < 400) {
							try {
								var resp = JSON.parse (this.response);
								alert("Image Deleted");
								modal.style.display="none";
								const e = new Event("change");
								const element = document.querySelector('#imgCatg2')
								element.dispatchEvent(e);
								
							} catch (error) {
								alert(error);
								console.log (this.response);
							}
								
						} else {
							var data = "We reached our target server, but it returned an error";
							createNotification (data, "warning", true);
							console.log("We reached our target server, but it returned an error");
						}
					}
				};
		        ajaxReq.onerror = function() {
            // There was a connection error of some sort
				};
				ajaxReq.send(getCatgories);

			}
			var bg;
			
			$(document).on('click','.imclass',function(){
				bg = $(this).attr('src');
				var id = $(this).data("value");
				document.getElementById('modal-img').src=bg;
				document.getElementById('modal-ele').innerHTML='<button onclick="reqsend('+id+',\''+bg+'\')" class="image-filters__item">Delete</button>';
				modal.style.display = "block";
			});
			
        </script>
        <script src="./js/main.min.js?ver=2.12.20.17"></script>
    </body>
</html>