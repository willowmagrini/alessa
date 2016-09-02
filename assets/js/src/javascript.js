jQuery(document).ready(function($) {
	//ajax facebook

	var data = {
		'action': 'facebook_brasa_social_feed'
	};
	$.post(odin_main.ajaxurl, data, function(response) {
		$('#facebook-feed').html(response);
		$('#facebook-feed').owlCarousel({
	    items : 1,
	    itemsDesktop : [1000,2], //5 items between 1000px and 901px
	    itemsDesktopSmall : [900,2], // betweem 900px and 601px
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
				    itemsDesktop : [1000,1], //5 items between 1000px and 901px
				    itemsDesktopSmall : [900,1], // betweem 900px and 601px
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
	

});
