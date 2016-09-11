<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
define( 'ODIN_GRUNT_SUPPORT', true );

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
//require_once get_template_directory() . '/core/classes/class-shortcodes-menu.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/inc/custom-post.php';
require_once get_template_directory() . '/inc/custom-fields.php';
require_once get_template_directory() . '/inc/ajax-functions.php';
require_once get_template_directory() . '/inc/custom-fields.php';
require_once get_template_directory() . '/inc/options.php';
require_once get_template_directory() . '/inc/brasa-social-feed.php';
$options = get_option('social');
global $brasa_social_feed;
$brasa_social_feed = new Brasa_Social_Feed(
	array(
		'facebook_api_url' => $options['facebook_api_url'],
		'facebook_auth'    => $options['facebook_auth'],
		'youtube_auth'     => $options['youtube_auth'],
		'youtube_user'     => $options['youtube_user']
	)
);
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
// require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
//require_once get_template_directory() . '/core/classes/class-term-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since 2.2.0
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' ),
				'menu-internas'  => __( 'Menu Internas', 'odin' ),
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since Odin 2.2.10
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
if (!function_exists('odin_widgets_init')) {
 	function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

 } 

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 2.2.0
 */
if (!function_exists('odin_flush_rewrite')) {
	function odin_flush_rewrite() {
		flush_rewrite_rules();
	}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );
}
/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
if (!function_exists('odin_enqueue_scripts')) {
	function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// General scripts.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		// Bootstrap.
		wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

		// FitVids.
		wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

		// Main jQuery.
		wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );
	} else {
		// Grunt main file with Bootstrap, FitVids and others libs.


		$options = get_option('social');
		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:700,400,300|Codystar|Warnes|Monoton|Special+Elite|Alegreya+Sans:200,300,400', array(), null, 'all' );
		wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );
		wp_localize_script( 'odin-main-min', 'odin_main', array('ajaxurl' => admin_url( 'admin-ajax.php' ), 'twitter_widget_id' => $options['twitter_widget_id'] ) );

	}

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

}

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
if (!function_exists('odin_stylesheet_uri')) {
	function odin_stylesheet_uri( $uri, $dir ) {
		return $dir . '/assets/css/style.css';
	}

	add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );
}


/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}
add_image_size('blog', 400, 400);
if (!function_exists('add_class_attachment_link')) {
	function add_class_attachment_link($html){
	    $postid = get_the_ID();
	    $html = str_replace('<a','<a class="cboxElement"',$html);
	    return $html;
	}
	add_filter('wp_get_attachment_link','add_class_attachment_link',10,1);
}



add_filter( 'show_admin_bar', '__return_false' );


function imagem_para_thumbnail($post){
	
	if (is_int($post)) {
		$parent_post = get_page($post) ;

	}
	else if(is_object($post)){
		$parent_post = $post;	
	}
	// else if(is_string($post) ){
	// 	$parent_post = get_page_by_title($post, OBJECT, 'post' );
	// }
	else{
		return 'Entrada de post invalida, necessita ser id, objeto ou titulo';
	}
		$parent_post_id = $parent_post->ID;

	

	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $parent_post->post_content, $matches);
	$first_img = $matches [1] [0];
	$filename = parse_url($first_img);
	$filename = $filename['path'];
	
	// Check the type of file. We'll use this as the 'post_mime_type'.
	$filetype = wp_check_filetype( basename( $filename ), null );
	// Get the path to the upload directory.
	$wp_upload_dir = wp_upload_dir();
	// Prepare an array of post data for the attachment.
	// return $filename;
	$filename = str_replace('/alessa/wp-content/uploads/sites/20/', '', $filename);

	// return $filename;
	$attachment = array(
	    'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
	    'post_mime_type' => $filetype['type'],
	    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
	    'post_content'   => '',
	    'post_status'    => 'inherit'
	);
	// Insert the attachment.
	$attach_id = wp_insert_attachment( $attachment, $filename );
	 
	// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	 
	// Generate the metadata for the attachment, and update the database record.
	$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
	wp_update_attachment_metadata( $attach_id, $attach_data );
	 
	set_post_thumbnail( $parent_post_id, $attach_id );
}

function get_first_image() {
	global $post, $posts;
	if (has_post_thumbnail($post->ID )) {
		$first_img = "";
	}
	else{
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];
		$first_img = parse_url($first_img);
		if(empty($first_img)){ //Defines a default image
			$first_img = "/images/default.jpg";
		}
	}
	
	return $first_img['path'];
}

// Adiciona novos tamanhos de imagem
// adiciona thumbnail galeria
if ( function_exists( 'add_image_size' ) ) {
add_image_size('horizontal', 300, 450, 1 );
add_image_size('vertical', 450, 300, 1 );
add_image_size('ritaleena', 400, 400 );

}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
$addsizes = array(
"horizontal" => __( "Horizontal galeria"),
"vertical" => __( "Vertical galeria")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}

function add_styles()
{
	if ( is_page_template('page-blog.php') OR is_singular('post' )) {
		$pianos=get_page_by_title( 'Pianos');
		// print_r($pianos);
		$fundo = get_field('fundo',$pianos->ID);
		echo $pianos->ID;
		$estilo='background-image:url('.$fundo.');';

		if (get_field('repetir_imagem',$pianos->ID) != 1) {
			$estilo .= ";background-repeat:no-repeat;background-size:cover;background-attachment: fixed;";
		}		
		?>
    	<style type="text/css">
    	<?php
		echo 
			'body{ 
				'.$estilo.';	
			}';
		?>

    	</style>
    	<?php
	}
	if (is_page_template('page-ritaleena.php')	){
		$pianos=get_page_by_title( '[:pb]Fotos Ritaleena[:en]Ritaleena Photos[:]');
		// print_r($pianos);
		$fundo = get_field('fundo',$pianos->ID);
		echo $pianos->ID;
		$estilo='background-image:url('.$fundo.');';

		if (get_field('repetir_imagem',$pianos->ID) != 1) {
			$estilo .= ";background-repeat:no-repeat;background-size:cover;background-attachment: fixed;";
		}		
		?>
    	<style type="text/css">
    	<?php
		echo 
			'body{ 
				'.$estilo.';	
			}';
		?>

    	</style>
    	<?php
    }
	if (is_singular('soundart' )OR is_singular('trilha') OR is_page( get_the_id() )) {
	?>
    	<style type="text/css">
    	<?php
			$fields = get_fields(get_the_id()); 
			echo 
			'h1.entry-title{ 
				font-family:"'.$fields['fonte_do_titulo']['font'].'"!important;
				background-color: '.$fields['cor_do_fundo_da_fonte'].'!important;
				color: '.$fields['cor_do_titulo'].'!important;
			}';
			
		?>

    	</style>
    <?php
    // print_r($fields);
	}
	$trab=get_page_by_title( '[:pb]Trabalhos[:]');
	// echo 'aqui'.$trab->ID;
	// print_r($trab);

	$campos = get_fields($trab->ID); 
	// print_r($campos); 
	// echo "aqui";
	// print_r($campos['fonte_soundart']['font']);
	if (is_home()) {
		?>
		<style type="text/css">
		<?php 
		echo 
			'#conteudo-trabalhos h2#titulo.trilha{
				font-family:"'.$campos['fonte_trilhas']['font'].'";
				font-size: '.$campos['tamanho_trilhas'].'px;
				color:'.$campos['cor_trilhas'].';
			}
			#conteudo-trabalhos h2#titulo.soundart{
				font-family:"'.$campos['fonte_soundart']['font'].'";
				font-size: '.$campos['tamanho_soundart'].'px;
				color:'.$campos['cor_soundart'].';
			}
			';
		?>

    	</style>
    <?php
	}
   
}
add_action('wp_head', 'add_styles');
// 
// 
// 
add_action('admin_head', 'some_itens_painel');

function some_itens_painel() {
  echo '<style>
	.acfgfs-font-variants,.acfgfs-font-subsets{
      display:none;
    } 
  </style>';
}
// 
// fontes dos titulos soundart e trilhas 
function google_fonts() {
	function theme_slug_fonts_url() {
	$trab=get_page_by_title( '[:pb]Trabalhos[:]');
	$campos = get_fields($trab->ID); 
	$font_families=array();
	// foreach ($campos as $font => $args) {
	// 	echo 'aqui';
	// 	print_r($args['font']);
	// 	// echo $args['font'].':'.$args['variants'][0].$args['subsets'][0]
	// 	$font_families[]='';
	// }
	// print_r($campos);
	$font_families=array($campos['fonte_soundart']['font'].':'.$campos['fonte_soundart']['variants'][0] , $campos['fonte_trilhas']['font'].':'.$campos['fonte_trilhas']['variants'][0]);
		$fonts_url = '';
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
			);
		 
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

		return esc_url_raw( $fonts_url );
	}
	wp_register_style('googleFonts', theme_slug_fonts_url());
    wp_enqueue_style( 'googleFonts');
}


add_action( 'wp_print_styles', 'google_fonts' );

function my_gallery_shortcode( $output = '', $atts, $instance ) {
	$return = $output; // fallback

	// print_r($atts);

	return $atts['ids'];
}

add_filter( 'post_gallery', 'my_gallery_shortcode', 10, 3 );
