<?php
/**
 * Template Name: Ritaleena
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
							while ( have_posts() ) : the_post();
           	
		
								function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
print_r($output);
  return $output;
}
echo catch_that_image();
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
