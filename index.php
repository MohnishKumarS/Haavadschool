<?php
	include 'control-panel/php/db-connect.php';
	SqlConnection();
	$sql = $connect_db->query("SELECT * FROM flash WHERE id=1");
	if($sql->num_rows>0){
		$row=$sql->fetch_assoc();
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" type="image/png" href="assets/img/harvard_favicon.png"/>
    <title>haavad International School</title>
	<meta name="description" content="At haavad we help your children develop properly and grow through hands-on learning and fun experiences. The Mission of this school is to empower all its students to ne problem solvers, users of technology. Effective communicators and lifelong learners in a rapidly changing global community and by providing challenging experience in a safe, caring , supportive and co-operative environment and to prepare them to be successful and happy in the highly competitive and challenging present global scenario.">
	<meta name="keywords" content="haavad cbse school, haavad, haavad international school, haavad school, haavad tirunelvelli district, haavad international school ulagaratchagarpuram, haavad international school tirunelvelli, cbse school in ulagaratchagarpuram tirunelvelli, haavad cbse, haavadcbse.com, haavad international cbse school">
	<meta name='url' content='http://haavadcbse.com/'>
	
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/styles.css?ver=01.25.2018.01" rel="stylesheet">
	
	<!-- Font montserrat -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" rel="stylesheet">
	<style>
		.marquee{
			border:1px solid #03b486;
			
		}
		.mspan{
			width:20%;
			padding:5px;
			background:#03b486;
			text-align:center;
			color:white;
		}
		.mcontent{
			padding-top:5px;
		}
	</style>
  </head>
  <body>
	<?php include 'control-panel/php/header.php'?>
	
  <!-- Original content 
  
	<div id="Home-page-fold">
		<div class="text-center">
			<h1></h1>
		</div>
	</div>
	-->
	
	
	  <!-- New code for slide-->
	<!--<link rel="stylesheet" href="http://harvardcbse.com/assets/css/slide.css">-->
	<style>
		.w3-content{margin-left:auto;margin-right:auto}
		.w3-content{max-width:980px}
		.w3-section{margin-top:16px!important;margin-bottom:16px!important}
		.w3-animate-fading{animation:fading 8s infinite}
		@keyframes fading{0%{opacity:0.2}50%{opacity:1}100%{opacity:0.2}}
	</style>
	
	<div class="slidetop">
		<div class="w3-content w3-section slidetop" style="max-width:100%">
		  <img class="mySlides w3-animate-fading" src="assets/img/1.jpg" style="width:100%">
		  <!--<img class="mySlides w3-animate-fading" src="assets/img/2.jpg" style="width:100%"> -->
		  <img class="mySlides w3-animate-fading" src="assets/img/3.jpg" style="width:100%">
		  <img class="mySlides w3-animate-fading" src="assets/img/4.jpg" style="width:100%">
		  <img class="mySlides w3-animate-fading" src="assets/img/5.jpg" style="width:100%">
		  <img class="mySlides w3-animate-fading" src="assets/img/6.jpg" style="width:100%">
		  <img class="mySlides w3-animate-fading" src="assets/img/7.jpg" style="width:100%">
		</div>
	</div>
	<div class="marquee container" style="display:flex;padding-left:0px;">
		<span class="mspan">Latest Updates</span>
		<marquee class="mcontent" id="mcontent"><?php echo $row['news'];?></marquee>
	</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 8000);    
}
</script>
	
	<!--
	<div >
	<iframe src='http://harvardcbse.com/slide.html' width='100%' height='100%' scrolling='no' frameborder='0' allowfullscreen='true' allowtransparency='true'></iframe>
	</div>
	-->
	
	<!--
	<div >
	<iframe src='http://harvardcbse.com/assets/img/home_hero_image.jpg' width='100%' height='100%' scrolling='no' frameborder='0' allowfullscreen='true' allowtransparency='true'></iframe>
	</div>
	-->
	
	<div class="container">
		<div class="home-page-features clearfix">
			<div class="col-md-4 col-sm-12 text-center">
				<img src="assets/img/education.png">
				<p style="padding:20px 0;"><strong>ACTIVE LEARNING</strong></p>
			</div>
			<div class="col-md-4 col-sm-12 text-center">
				<img src="assets/img/teacher.png">
				<p style="padding:20px 0;"><strong>EXPERT TEACHERS</strong></p>
			</div>
			<div class="col-md-4 col-sm-12 text-center">
				<img src="assets/img/location.png">
				<p style="padding:20px 0;"><strong>PEACEFUL ENVIRONMENT</strong></p>
			</div>
		</div>
	</div>
	
	<div class="home-page-about">
		<div class="container">
			<div class="col-md-6 col-sm-12">
				<img src="assets/img/home_about.jpg" class="img-responsive img-rounded"><br>
			</div>
			<div class="col-md-6 col-sm-12">
				<p><strong>FACILITIES</strong></p>
				<div class="harvard-underline"></div>
				<p>A Vast expanse of 3 acres provides a perfect ambience for an aesthetically chartered school building. The lung space the open lawns are marked with a colourful bonanza of fresh floral bounty.<br><br>
				Our school is a significant personal and social environment in the lives of its students. A child-friendly school ensures every child an environment that is physically safe, emotionally secure and psychologically enabling. <a href="#">Know more…</a><br><br>
				Model Teachers demonstrate strong instructional practice, a dedication to professional growth, and a strong understanding of their community’s needs. <a href="#">Know more…</a></p>
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
	<!-- Font awesome -->
	<script src="https://use.fontawesome.com/26689146d3.js"></script>
	<script>

	</script>
  </body>
</html>
