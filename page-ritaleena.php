<?php
/**
 * Template Name: Ritaleena
 *
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
					<header class="entry-header"><h1 class="entry-title">Ritaleena</h1></header><!-- .entry-header -->'
						<div class="entry-content col-md-12">
						<?php 
							while ( have_posts() ) : the_post();
		 					$gallery = get_post_gallery( $post );
			            	echo '<div class="masonry-container">';
			            	// print_r($gallery);
			            	$gallery=explode(',', $gallery);
			            	// print_r($gallery);
		 					foreach ($gallery as $image) {
		 						echo '
							
			                    	<div class="item">
									   	<div class="well"> 
									   		<a href="'.wp_get_attachment_url($image).'" class="cboxElement">	
												'.wp_get_attachment_image($image,'blog').'
											</a>
									   	</div>
									</div>
									';
		 						
		 					}
			                 endwhile; 
			                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

			            
			            ?>
						</div> <!-- class="entry-content col-md-12"> -->
					</div><!--interno  -->
				</article>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
get_footer();
