<?php
/**
 * The template used for displaying sound-art content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('interno-sound'); ?>>
	<div class="interno row">
		<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>

		<div class="entry-content col-md-12		">
			<?php
			$content = get_the_content();
			// $content = preg_replace('/\[gallery ids=[^\]]+\]/', '',  $content );	
			$content = apply_filters('the_content', $content );
			echo $content;
				
			?>
		</div><!-- .entry-content -->
		
		<div class="faixa-preta">
			 <div class="paginacao-single">
			 	<?php 
				previous_post_link( '<strong class="anterior-single"> %link</strong>', ' <span></span>%title' );
				next_post_link( '<strong class="proximo-single"> %link</strong>', '%title <span></span>' );?>
			 </div>	
		</div>
	</div>
</article><!-- #post-## -->

