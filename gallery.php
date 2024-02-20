<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<link rel="shortcut icon" type="image/png" href="assets/img/harvard_favicon.png"/>
	
    <title>Image Gallery - Harvard International School</title>

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
		
		
	</style>

  </head>
  <body>
	<?php include 'control-panel/php/header.php'?>
  
	<div id="Gallery-page-fold">
		<div class="text-center">
			<h1><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Image Gallery</h1>
		</div>
	</div>
	
	<div class="gallery-images img-gallery">
		<div class="container">
			<div id="img_filter">
				<div class="loading-anim text-center">
					<i class="fa fa-cog fa-spin"></i>
					<span>Loading...</span>
					<i class="fa fa-cog fa-spin"></i>
				</div>
			</div>
			<hr/><br/>
			<div id="breadcrumbs">
			</div>
			<hr style="border:1px dashed gray"/>
			<br/>
			<div id="img_box_c">
			</div>
		</div>
	<br/>
	</div>
	<?php include 'control-panel/php/footer.php';?>
	<div id="myModal" class="modal">

  <!-- Modal content -->
	  <div class="modal-content">
		<span class="close">&times;</span>
			<img id="modal-img" src="" style="width:100%"/>
	  </div>

	</div>
	<div class="footer-copy text-center">
		<p>&copy; Copyrights <script>document.write(new Date().getFullYear())</script>, Haavad Hi-Tech Matric Higher Secondary School</p>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/gallery.js"></script>
	<!-- Font awesome -->
	<script src="https://use.fontawesome.com/26689146d3.js"></script>
	<script>	
	
	function ajaxSend (data) {
        var ajaxReq = new XMLHttpRequest();
        ajaxReq.open("POST", "./control-panel/php/gallery-control-panel.php", true);
        ajaxReq.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                try {
                    var resp = JSON.parse (this.response);
					//	alert(resp["opType"]);
									console.log(resp);
                    if (resp["opType"] === "getFilters") {
                        processGetFilters (resp);
                    }  else if (resp["opType"] === "getImages") {
                        placeImg (resp);
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

    var formData = new FormData ();
    formData.append ("getFilters", true);
    ajaxSend (formData);
    var filterList = [];
	
	
	function processGetFilters(resp){
        var imgGallery = document.getElementById('img_filter');
		// console.log(resp);

		var r = resp["data"];
		var sb = resp["subdata"];
		var test = '<ul class="nav navbar-nav navbar-left img_cat_menu">'+
						'<li class="dropdown">'+
							'<a href="#" class="cat_click" data-value="all">Recent'+
							'</a>'+
						'</li>';;
		for(var i=0;i<r.length;i++){
			test+='<li class="dropdown" id="img_cat_menu">'+
					'<a href="#" class="dropdown-toggle" data-toggle="dropdown">'+
						r[i]["years"]+'<b class="caret"></b>'+
					'</a>';
					if(sb[r[i]["years"]]){
						test+='<ul class="dropdown-menu">';
						for(var j=0;j<sb[r[i]["years"]].length;j++)
							test+='<li class="cat_click" data-value="'+sb[r[i]["years"]][j][1]+'"><a href="javascript:void(0	)">'+sb[r[i]["years"]][j][0]+'</a></li>';
						test+=  '</ul>';
					}else{
						test+='<ul class="dropdown-menu">'+
								'<li>No new Events</li>'+
							'</ul>';
					}
			test+= '</li>';
		}
		test+='</ul>';
		
		imgGallery.innerHTML=test;
		getImage("all");

	}
	function getImage(id){
		var fdata = new FormData ();
        fdata.append ("getImages", true);
        fdata.append ("cat_id", id);
		ajaxSend (fdata);
	}
	$(document).on('click','.cat_click',function(){
		getImage($(this).data("value"));
	});
	
	function placeImg(resp){
		//alert(resp["data"]);
		var r = resp["data"];
		var ic = document.getElementById('img_box_c');
		document.getElementById('breadcrumbs').innerHTML="<p><strong></strong> "+resp['breadcrumbs']+"</p>";
		var temp="";
		for(i=0;i<r.length;i++){
			temp+='<div class="col-sm-3 imclass" style="background:url(control-panel/'+r[i]+');background-size:cover;background-repeat:no-repeat">'+
					
				'</div>';
		}
//		alert(temp);
		ic.innerHTML=temp;
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
	var bg;
	$(document).on('click','.imclass',function(){
		bg = $(this).css('background-image');
        bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
		document.getElementById('modal-img').src=bg;
		modal.style.display = "block";
	});
	
	</script>
	
  </body>
</html>
