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
					<header class="entry-header"><h1 class="entry-title"><?php echo __('Página não encontrada') ?></h1></header><!-- .entry-header -->'
						<div class="entry-content col-md-12">
							<h3>Pelo visto você entrou em uma página que não existe...</h3>

						</div> <!-- class="entry-content col-md-12"> -->
					</div><!--interno  -->
				</article>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
get_footer();
