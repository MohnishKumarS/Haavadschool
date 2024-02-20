"use strict";



"use strict";



$(document).ready(function () {

    function ajaxSend (data) {

        var ajaxReq = new XMLHttpRequest();

        ajaxReq.open("POST", "./control-panel/php/video-gallery-controls.php", true);



        ajaxReq.onload = function() {

            if (this.status >= 200 && this.status < 400) {

                try {

					var resp = JSON.parse (this.response);

					//alert(resp["opType"]);

                    if (resp["opType"] === "getVideo") {

                        processGetVideo (resp);

                    }

					else if(resp["opType"] === "getFilter"){

						processGetFilters(resp);

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

    formData.append ("getFilter", true);

    ajaxSend (formData);



    function processGetVideo (resp) {

        var videoData = resp["data"];

		var htm="";

        for (var i = 0; i < videoData.length; i++) {

            htm += "<li class='video-gallery__gallery-item col-md-4 col-sm-6 col-xs-12'>" 

                      + "<div class='video-title'><h4 class='video-gallery__video-title'>" + videoData[i]["video_description"] + "</h4></div>"

                      + "<div class='video-gallery__video-code'>" + "<iframe id='ytplayer' class='video-gallery__video-player'" 

                      + "type='text/html' width='300' height='202'" 

                      + "src='https://www.youtube.com/embed/" + videoData[i]["video_id"] + "' frameborder='0' allowfullscreen></iframe>"

                      + "</div><div class='video-gallery__video-del'></div>";

            

        }

		

		document.getElementById('vid_box').innerHTML=htm;

		var breadc = resp["year"];

		if(breadc == "all")

			breadc="Recent Videos";

		document.getElementById('breadc').innerHTML="<span class='bread image-filters__item'>"+breadc+"</span>";

    }

	function processGetFilters(resp){

		//alert(resp["data"]);

        var imgGallery = document.getElementById('vid_filter');

		var r = resp["data"];

		var test = '<ul class="nav navbar-nav navbar-left img_cat_menu">'+

						'<li class="dropdown">'+

							'<a href="#" class="vid_click" data-value="all">All'+

							'</a>'+

						'</li>';

		for(var i=0;i<r.length;i++){

			test+='<li class="dropdown" id="video_cat_menu">'+

					'<a href="#" class="dropdown-toggle vid_click" data-toggle="dropdown" data-value="'+r[i]+'">'+r[i]+

					'</a>';

			test+= '</li>';

		}

		test+='</ul>';

		

		imgGallery.innerHTML=test;



	}



	function getVideo(year){

		var formData = new FormData ();

		formData.append ("getVideo2", true);

		formData.append ("year", year);

		ajaxSend (formData);

	}

	$(document).on('click','.vid_click',function(){

		getVideo($(this).data("value"));

	});

	getVideo("all");

});