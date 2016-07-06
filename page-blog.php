<?php
/**
 * Template Name: Blog
 *
 * The template for displaying pages with sidebar.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
	<div class="fundo">
		<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
			<main id="main-content" class="site-main" role="main">
								
				<article >
					<div class="interno">
					<header class="entry-header"><h1 class="entry-title">Alessa a cidade e os pianos</h1></header><!-- .entry-header -->'
						<div class="entry-content col-md-12">
						<?php
							$wp_query = new WP_Query(array( 
			                'post_type'         => 'post',
			                'posts_per_page'    => 10,
			                
			            ));

			            if ($wp_query->have_posts()) {
			            	
			            	echo '<div class="masonry-container">';
			                while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
								// echo'<pre>';
			     //            	print_r($post);     	   
			     //            	echo '</pre>';
			                    // print_r(get_attached_media('image',$post ));
			                    echo get_the_post_thumbnail($post).'

			                    	<div class="item">
									   	<div class="well"> 
										<a href="'.get_permalink($post->ID ).'">
											<img class="masonry-img" src="'.
											
											get_first_image() .'">
										</a>	
									   	</div>
									   	<div class="titulo-post">
											<a href="'.get_permalink($post->ID ).'">
										   		<h2>'.get_the_title( $post ).'</h2>
										   	</a>	
									   	</div>
									</div>
									';

			                 endwhile; 
			                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
			            	echo '</div><!-- class=masonry-container-->';

			            }
			            else{
			                echo __('Não existem posts.', "odin");
			            }
			            
						?>
						</div> <!-- class="entry-content col-md-12"> -->
					</div><!--interno  -->
				</article>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
get_footer();
