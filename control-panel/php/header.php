<?php

	$page=basename($_SERVER['PHP_SELF'],'.php') === ""?"home":basename($_SERVER['PHP_SELF'],'.php');

	$menu = '<nav class="navbar navbar-default navbar-fixed-top">

	  <div class="container ewall-nav-brand" id="titlehead" style="">
  <a class="navbar-brand ewall-nav-brand__link" href="./" style=""
    ><img
      src="assets/img/newlogo.png"
      width="70"
      height="70"
      class="img-responsive"
      alt="LOGO"
  /></a>

  <div class="ewall-nav-brand__text">
    <h1 class="ewall-nav-brand__name">HAAVAD HI-TECH MATRIC HIGHER SECONDARY SCHOOL</h1>
    <h4 class="ewall-nav-brand__slogan">"Be The Light"</h4>
  </div>

<!--
  <h4 class="ewall-nav-brand__sub-text">
    (Affiliated to CBSE, New Delhi) Affiliation No:1931403
  </h4>
-->
</div>

	  <div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar top-bar"></span>
			  <span class="icon-bar middle-bar"></span>
			  <span class="icon-bar bottom-bar"></span>
			</button>
		</div>

		<div id="navbar" class="navbar-collapse collapse">

			<ul class="nav navbar-nav">

			  <li id="home"><a href="./"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a></li>

			 

			  

		<li class="dropdown">

			<li id="aboutus" class="dropdown">

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<i class="fa fa-group" aria-hidden="true"></i>&nbsp;About Us<b class="caret"></b></a>

				<ul class="dropdown-menu">

					<li><a href="management"><i class="fa fa-building"></i>&nbsp;Management</a></li>

					<li><a href="motto"><i class="fa fa-star"></i>&nbsp;School Motto</a></li>

					<li><a href="affidavit"><i class="fa fa-file-word"></i>&nbsp;Affidavit</a></li>
						
					<li id="appendix" class="dropdown-submenu">
					
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

							<i class="fa fa-group" aria-hidden="true"></i>&nbsp;Appendix IX<b class="caret"></b></a>

							<ul class="dropdown-menu">
								
								<li><a href="CBSE AFFILIATION.pdf"><i class="fa fa-file-word"></i>&nbsp;CBSE Affiliation</a></li>
								<li><a href="Trust Document.pdf"><i class="fa fa-file-word"></i>&nbsp;Trust Document</a></li>
								<li><a href="Recognition - 2022.pdf"><i class="fa fa-file-word"></i>&nbsp;Recognition Certificate</a></li>
								<li><a href="NOC certificate - CBSE.pdf"><i class="fa fa-file-word"></i>&nbsp;NOC</a></li>
								<li><a href="Building stability - CBSE.pdf"><i class="fa fa-file-word"></i>&nbsp;Building Stability Certificate</a></li>
								<li><a href="Building License - CBSE.pdf"><i class="fa fa-file-word"></i>&nbsp;Building License by Government</a></li>
								<li><a href="Fire certificate - CBSE.pdf"><i class="fa fa-file-word"></i>&nbsp;Fire Safety Certificate</a></li>
								<li><a href="DEO certificate - CBSE.pdf"><i class="fa fa-file-word"></i>&nbsp;DEO Certificate</a></li>
								<li><a href="Sanitary certificate - CBSE.pdf"><i class="fa fa-file-word"></i>&nbsp;Sanitary Certificate</a></li>
								<li><a href="feestructure"><i class="fa fa-file-word"></i>&nbsp;Fee Structure</a></li>
								<li><a href="calender"><i class="fa fa-file-word"></i>&nbsp;Annual Academic Calender</a></li>
								<li><a href="smc"><i class="fa fa-file-word"></i>&nbsp;School Management Committee</a></li>
								<li><a href="pta.php"><i class="fa fa-file-word"></i>&nbsp;Parents Teachers Association</a></li>
							</ul>					
					</li>

				</ul>

			</li>

			  <li id="academics" class="dropdown">

				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

				  <i class="fa fa-book" aria-hidden="true"></i>&nbsp;Academics<b class="caret"></b></a>

				  <ul class="dropdown-menu">

					<li><a href="assessment"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;Assessment</a></li>

					<li><a href="curriculum"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Curriculum & Books</a></li>

					<li><a href="calender"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Calender</a></li>

					<li><a href="studentenroll"><i class="fa fa-wpforms" aria-hidden="true"></i>&nbsp;Student Enrollment</a></li>

					<li><a href="faculty"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Faculty</a></li>

					<li><a href="staffenrich"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Staff Enrichment Programme</a></li>
					
					<li><a href="homeworkpolicy.php"><i class="fa fa-file-word" aria-hidden="true"></i>&nbsp;Homework Policy</a></li>
					
					<li id="tc" class="dropdown-submenu">
					
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

							<i class="fa fa-file-word" aria-hidden="true"></i>&nbsp;T.C<b class="caret"></b></a>

							<ul class="dropdown-menu">
								
								<li><a href="TCMarksPage3a.pdf"><i class="fa fa-file-word"></i>&nbsp;TC 6 Page 1</a></li>
								<li><a href="TCMarksPage3b.pdf"><i class="fa fa-file-word"></i>&nbsp;TC 6 Page 2</a></li>
								<li><a href="TCMarksPage1a.pdf"><i class="fa fa-file-word"></i>&nbsp;TC 7 Page 1</a></li>
								<li><a href="TCMarksPage1b.pdf"><i class="fa fa-file-word"></i>&nbsp;TC 7 Page 2</a></li>
								<li><a href="TCMarksPage2a.pdf"><i class="fa fa-file-word"></i>&nbsp;TC 123 Page 1</a></li>
								<li><a href="TCMarksPage2b.pdf"><i class="fa fa-file-word"></i>&nbsp;TC 123 Page 2</a></li>
							</ul>					
					</li>

				  </ul>

			  </li>

			  <li id="admission" class="dropdown">

				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;Admission<b class="caret"></b></a>

				  <ul class="dropdown-menu">

					<li><a href="healthcare"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;Health Care</a></li>

					<li><a href="procedure"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Procedure</a></li>

					<li><a href="rules"><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp;Rules</a></li>

					<li><a href="withdrawals"><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;Withdrawals</a></li>

					<li><a href="transport"><i class="fa fa-bus" aria-hidden="true"></i>&nbsp;Transport</a></li>

					<li><a href="documents"><i class="fa fa-wpforms" aria-hidden="true"></i>&nbsp;Documents Required</a></li>

					<li><a href="feestructure"><i class="fa fa-file-word" aria-hidden="true"></i>&nbsp;Fee Structure</a></li>

				  </ul>

			  </li>

			  <li id="campus" class="dropdown">

				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;Campus<b class="caret"></b></a>

				  <ul class="dropdown-menu">

					<li><a href="activities"><i class="fa fa-trophy" aria-hidden="true"></i>&nbsp;Activities</a></li>

					<li><a href="infrastructure"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;Infrastructure</a></li>

				  </ul>

			  </li>

			  <li id="gallery" class="dropdown">

				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Gallery<b class="caret"></b></a>

				  <ul class="dropdown-menu">

					<li><a href="gallery"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Image Gallery</a></li>

					<li><a href="video-gallery"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;Video Gallery</a></li>

				  </ul>

			  </li>

			  <li id="events"><a href="events"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;Events</a></li>

			 

			 

			  <li id="circular"><a href="circular"><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp;Circular</a></li>

			  <li id="annualreport"><a href="annualreport"><i class="fa fa-file-word" aria-hidden="true"></i>&nbsp;Annual Report</a></li>

			  <li id="prayer"><a href="prayer"><i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;Prayer</a></li>

			  <li id="contact"><a href="contact"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Contact</a></li>

			</ul>

		</div>

	  </div>

	</nav>

	';

	$page_group=array(

		"home" => array("index"),

		"aboutus" => array("management","motto","smc"),

		"academics" => array("assessment","curriculum","calender","studentenroll","faculty","staffenrich"),

		"admission" => array("healthcare","procedure","rules","withdrawals","transport","documents","feestructure"),

		"campus" => array("activities","infrastructure"),

		"gallery" => array("gallery","video-gallery"),

		"events" => array("events"),

		"circular" => array("circular"),

		"annualreport" => array("annualreport"),

		"prayer" => array("prayer"),

		"contact" =>array("contact")

	);

	//echo $menu;

	foreach($page_group as $key => $p){

		if(in_array($page,$p)){

			$pageop = $key;

			break;

		}

	}

	$script='<script>document.getElementById("'.$pageop.'").classList.add("active");</script>';

	echo $menu.$script;

//	echo array_search(array("management"),$page_group);

?>