<?php
/**
 * The template used for displaying sound-art content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="interno">
		<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>

		<div class="entry-content col-md-12">
			<?php
			$content = get_the_content();
			$content = preg_replace('/\[gallery ids=[^\]]+\]/', '',  $content );
			$content = apply_filters('the_content', $content );
			echo $content;
				
			?>
		</div><!-- .entry-content -->
		<div class="col-md-12 single-soundart-galeria">
			<?php if ( ($post->post_type == 'soundart' OR $post->post_type == 'trilha') && $post->post_status == 'publish' ) {
					$attachments = get_posts( array(
						'post_type' => 'attachment',
						'posts_per_page' => -1,
						'post_parent' => $post->ID,
						'exclude'     => get_post_thumbnail_id()
						) );

					$gallery = get_post_gallery_images( $post->ID );
					echo '<div id="owlsingle">';

					foreach( $gallery as $image_url ) {

						echo '<div class="' . $class . ' data-design-thumbnail"><img src="' . $image_url . '"></div>';

					}
					echo "</div>";


					// if ( $attachments ) {
					// 	echo '<div id="owlsingle">';
					// 	foreach ( $attachments as $attachment ) {
					// 		$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
					// 		$thumbimg = wp_get_attachment_image( $attachment->ID, 'single-galeria' );
					// 		wp_get_attachment_link( $attachment->ID, 'single-galeria', true );
					// 		echo '<div class="' . $class . ' data-design-thumbnail">' . $thumbimg . '</div>';
					// 	}
					// 	echo "</div>";
			
					// }
				}
				 ?>
				
		</div>
		<div class="faixa-preta">
			 <div class="paginacao-single">
			 	<?php 
				previous_post_link( '<strong class="anterior-single"> %link</strong>', ' <span></span>%title' );
				next_post_link( '<strong class="proximo-single"> %link</strong>', '%title <span></span>' );?>
			 </div>	
		</div>
	</div>
</article><!-- #post-## -->

