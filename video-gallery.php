<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="shortcut icon" type="image/png" href="assets/img/harvard_favicon.png"/>

    <title>Video Gallery - Haavad International School</title>



    <!-- Bootstrap -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <link href="assets/css/styles.css?ver=01.25.2018.01" rel="stylesheet">

	

	<!-- Font montserrat -->

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" rel="stylesheet">



	<style>

		.image-filters__item {

			display: inline-block;

			padding: 5px 10px;

			margin: 5px 5px;

			background-color: #03B486;

			border-radius: 20px;

		}

		.image-filters__item.active {

			background-color: #098d6b;

		}

		.image-filters__link {

			font-size: 18px;

			font-weight: 700;

			color: white;

		}

		.image-filters__link:hover, .image-filters__link:active, .image-filters__link:focus {

			text-decoration: none;

			color: whitesmoke;

		}

		li{

			list-style:none;

		}

		.video-title{

			height:50px;

		}

	</style>

	

  </head>

  <body>

	<?php include 'control-panel/php/header.php'?>

  

	<div id="Gallery-page-fold">

		<div class="text-center">

			<h1><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;Video Gallery</h1>

		</div>

	</div>

	

	<div class="gallery-videos">

		<div class="container">

			<div id="vid_filter">

				<ul class="video-gallery">

					<div class="loading-anim text-center">

						<i class="fa fa-cog fa-spin"></i>

						<span>Loading...</span>
						<i class="fa fa-cog fa-spin"></i>

					</div>

				</ul>

			</div>

			<hr/><br/>

			<div id="breadc">

			</div>

			<hr style="border:1px dashed gray"/>

			<div id="vid_box">

				

			</div>

		</div>

	</div>

	

	<?php include 'control-panel/php/footer.php';?>

	<div class="footer-copy text-center">

		<p>&copy; Copyrights <script>document.write(new Date().getFullYear())</script>, Haavad Hi-Tech Matric Higher Secondary School</p>

	</div>

	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/main.js"></script>

	<script src="assets/js/video-gallery.js"></script>

	<!-- Font awesome -->

	<script src="https://use.fontawesome.com/26689146d3.js"></script>

	



  </body>

</html>

