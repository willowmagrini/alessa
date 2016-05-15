<?php
get_header(); ?>

	<main id="content" class="home <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
		<section class="secao-front amarelo" id="inicio">
			
		</section>
		<section class="secao-front" id="piano">
			
		</section>
		<section class="secao-front" id="sound-trilha">
			<article class="trabalho" id="soundart">
				<img src="<?php echo get_template_directory_uri()."/assets/images/fundo-soundart.png"; ?>" alt="">
				<a data-post-type="soundart" href="#conteudo-trabalhos">
					<img src="<?php echo get_template_directory_uri()."/assets/images/link-soundart.png"; ?>" alt="">
				</a>
			</article>

			<article class="trabalho" id="trilhas">
				<img src="<?php echo get_template_directory_uri()."/assets/images/fundo-trilhas.png"; ?>" alt="">
				<a data-post-type="trilha" href="#conteudo-trabalhos">
					<img src="<?php echo get_template_directory_uri()."/assets/images/link-trilhas.png"; ?>" alt="">
				</a>

			</article>
		</section>
		<section class=" secao-front "id="conteudo-trabalhos">
			<div class="interno">
<!-- 				<img src="<?php echo get_template_directory_uri()."/assets/images/ajax-loading.gif"; ?>" alt="">
 -->			</div>
		</section>
		<!-- <section class="secao-front" id="transicao">
			
		</section> -->
		<section class="secao-front" id="contato">
			<img class="titulo-contato" src="<?php echo get_template_directory_uri()."/assets/images/titulo-contato.png"; ?>" alt="">
			<article id="interno-contato" class="row">
				<div class="col-md-6" id="socials-contato">
					<div id="facebook-feed"></div>
				</div>
				<div class="col-md-6 pull-right" id="form-contato">
					<?php 
					echo do_shortcode( '[contact-form-7 id="10" title="Contato"]' ); ?>	
					<?php
					 // echo do_shortcode( '[contact-form-7 id="4" title="Formulário de contato 1"]' ); ?>		
	
				</div>
				
			</article>
		</section>	
			
		
	</main><!-- #main -->

<?php
get_footer();
