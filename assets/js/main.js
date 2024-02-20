$(function(){

$(".dropdown").hover(            

		function() {

			$('.dropdown-menu', this).stop( true, true ).fadeIn("fast");

			$(this).toggleClass('open');

			$('b', this).toggleClass("caret caret-up");                

		},

		function() {

			$('.dropdown-menu', this).stop( true, true ).fadeOut("fast");

			$(this).toggleClass('open');

			$('b', this).toggleClass("caret caret-up");                

		});

});





		$(window).on('scroll', function(){

			var scrollTop = $(window).scrollTop()

			if(screen.width >= 780){

				if(scrollTop >=100){

					document.getElementById('titlehead').style.display="none";

				}

				else{

					document.getElementById('titlehead').style.display="block";

				}

			}

		})