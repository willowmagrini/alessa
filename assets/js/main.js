jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();
	$( '.zilla-one-third' ).fitVids();
	$( '.googlemaps iframe' ).fitVids();
	$( '#main-content iframe' ).fitVids();



	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();
	// $('a.cboxElement').colorbox({rel:'gal'});


});
