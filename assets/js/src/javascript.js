
jQuery(document).ready(function($) {
	
	//ajax facebook
	function scrollTo(){

	  var topPos = document.getElementById('fim').offsetTop;
	  document.getElementById('scroll-paralax').scrollTop = topPos-10;
	}
	$("#voltar").click(function(e){

		e.preventDefault();
		element=document.getElementById('scroll-paralax')
		$("#fim").animate({opacity: 0}, 1200);
		$(".parallax__layer").animate({opacity:1 }, 1900);
		$(element).animate({scrollTop: 0 },1900 ,'easeInOutQuint');

		$("#fim").css('z-index',9);
		$("#scroll-paralax").css('z-index',99999);

	});
	$("#btn-mais").click(function(e){
		e.preventDefault();
		var $el = $('#scroll-paralax');  //record the elem so you don't crawl the DOM everytime
		var bottom = $el.position().top + $el.outerHeight(true);
		// var topPos = document.getElementById('fim').offsetTop;
		element=document.getElementById('scroll-paralax')
		$(element).animate({scrollTop: bottom },1900 ,'easeInOutQuint');
		setTimeout(function(){
			$(".parallax__layer").animate({opacity:0 }, 700);
			$("#fim").animate({opacity: 1}, 700);
		}, 1200);
		$("#fim").css('z-index',9999);
		$("#scroll-paralax").css('z-index',9);
	});

	var data = {
		'action': 'facebook_brasa_social_feed'
	};
	$.post(odin_main.ajaxurl, data, function(response) {
		$('#facebook-feed').html(response);
		$('#facebook-feed').owlCarousel({
	    items : 1,
	    itemsDesktop : [1199,1],
	    itemsDesktopSmall : [980,1],
	    itemsTablet: [768,1],
	    itemsMobile : [479,1],
	    autoPlay : true,
	    navigation : false,
	    pagination:false,
	});
	});

	$('.single-soundart .gallery').owlCarousel({
	    items : 1,
	    itemsDesktop : [1000,1], //5 items between 1000px and 901px
	    itemsDesktopSmall : [900,1], // betweem 900px and 601px
	    autoPlay : true,
	    navigation : false,
	    pagination:false,
	});
	$('.single-trilha .gallery').owlCarousel({
		items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1],
		itemsMobile : [479,1],
		autoPlay : true,
		navigation : false,
		pagination:false,
	    autoPlay : true,
	    navigation : false,
	    pagination:false,
	});

	// pega os trabalhos
	$(".trabalho a").click(function(e){
		e.preventDefault();
		$('#conteudo-trabalhos .interno').fadeOut();
		$('#loader-trabalhos').fadeIn();
		trampo=$(this).attr("data-post-type");
	    var data = {
			'action': 'mostra_trampo',
			'trampo':trampo,
		};
		console.log(data);
		$.post(odin_main.ajaxurl, data, function(response) {
	        response=jQuery.parseJSON(response);
   			console.log(response);
   			html=response.html;
   			// location.hash = "#conteudo-trabalhos";
   			$('#conteudo-trabalhos .interno').html(html);
			$('#loader-trabalhos').fadeOut();
			$('#conteudo-trabalhos .interno').fadeIn();

			$( "#thumb_trabalho" ).load(function() {
				$('#slider-trabalhos').owlCarousel({
					items : 1,
					itemsDesktop : [1199,1],
					itemsDesktopSmall : [980,1],
					itemsTablet: [768,1],
					itemsMobile : [479,1],
					autoPlay : true,
					navigation : false,
					pagination:false,
				    autoPlay : true,
				    navigation : false,
				    pagination:true,
				});
			  // Handler for .load() called.
	  			$('#link-ancora').click();

			});

		});

	});
	$("#release-link").click(function(e){
		e.preventDefault();
		$("#release").fadeIn();

	});
	$( '.nav navbar-nav' ).click(function(e){
		e.preventDefault();
		$("#release").fadeIn();

	});


});
