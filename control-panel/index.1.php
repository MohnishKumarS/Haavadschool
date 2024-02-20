<?php require_once ("./php/access.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gallery Control Panel</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="./css/common.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="oa-container">
            <nav class="nav-list">
                <div class="oa-container">
                    <a class="nav-list__ham oa-hidden" href="javascript:void(0);"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
                    <div class="nav-list__menu">
                        <a href="javascript:void(0);" class="nav-list__menu-item active upload-imgs-nav"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload images</a>
                        <a href="javascript:void(0);" class="nav-list__menu-item create-catg-nav"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create Album</a>
                        <a href="javascript:void(0);" class="nav-list__menu-item all-catg-list-nav"><i class="fa fa-picture-o" aria-hidden="true"></i> All Albums</a>
                        <a href="javascript:void(0);" class="nav-list__menu-item settings-nav"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                    </div>
                </div>
            </nav>

            <div class="page-content">
                <div class="notification-box oa-hidden">
                    <p class="notification-box__msg"></p>
                    <span class="notification-box__close"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span>
                </div>
                <section class="upload-imgs tab-block">
                    <h3 class="tab-block__title">Upload images</h3>
                    <form id="Upload-imgs-form" class="upload-imgs__form content-block" action="./php/gallery-control-panel.php" method="POST">
                        <h4 class="upload-imgs__sub-title">Select a album</h4>

                        <select class="upload-imgs__catg oa-select-btn" name="imgCatg">
                        </select>
                        
                        <h4 class="upload-imgs__sub-title">Add Images</h4>
                        <div class="upload-imgs__new-img-wrapper">
                            <input class="upload-imgs__new-img oa-input-file" type="file" name="img[]" value="" data-after-content="Choose a file">
                            <input class="upload-imgs__new-img-descrip oa-input-text oa-hidden" type="text" name="imgDescrip[]" value="" placeholder="image description">
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

                <section class="create-catg tab-block">
                    <h3 class="tab-block__title">Create new Album</h3>
                    <form id="Create-catg-form" class="create-catg__form content-block" action="./php/gallery-control-panel.php" method="POST">
                        <input class="create-catg__input oa-input-text" type="text" name="catgName" value="" placeholder="Enter album name" required>
                        <input class="" type="hidden" name="createCatg" value="true">
                        <button class="create-catg__submit-btn oa-btn-danger" type="submit">Create</button>
                    </form>
                </section>
                
                <section class="img-gallery-wrapper tab-block">
                    <h3 class="img-gallery-wrapper__title tab-block__title">All album</h3>
                    <ul class="img-gallery">
                    </ul>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./js/main.min.js"></script>
    </body>
</html>