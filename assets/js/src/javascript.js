jQuery(document).ready(function($) {
	//ajax facebook

var data = {
	'action': 'facebook_brasa_social_feed'
};
$.post(odin_main.ajaxurl, data, function(response) {
	$('#facebook-feed').html(response);
	$('#facebook-feed').owlCarousel({
 
    // Most important owl features
    items : 1,
    itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
     
    autoPlay : true,
    navigation : true,
    navigationText : ["<div class='prev-slider-2 nav-slider'></div>","<div class='prox-slider-2 nav-slider'></div>"],
    pagination:false,
    animateOut: 'fadeOut'

    
 
});
});

	




});
