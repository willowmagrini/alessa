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
				<a data-post-type="soundart" href="#ancora">
					<img src="<?php echo get_template_directory_uri()."/assets/images/link-soundart.png"; ?>" alt="">
				</a>
			</article>

			<article class="trabalho" id="trilhas">
				<img src="<?php echo get_template_directory_uri()."/assets/images/fundo-trilhas.png"; ?>" alt="">
				<a data-post-type="trilha" href="#ancora">
					<?php echo '<img src="'.get_template_directory_uri().'/assets/images/link-trilhas-' .  get_locale(  ) . '.png">'; ?>

					<!-- <img src="<?php echo get_template_directory_uri()."/assets/images/link-trilhas.png"; ?>" alt=""> -->
				</a>

			</article>
		</section>
		<section class=" secao-front "id="conteudo-trabalhos">
			<div id="ancora"></div>
			<div class="interno">
<!-- 				<img src="<?php echo get_template_directory_uri()."/assets/images/ajax-loading.gif"; ?>" alt="">
 -->			</div>
		</section>
		<!-- <section class="secao-front" id="transicao">
			
		</section> -->
		<section class="secao-front" id="linda">
			<div class="interno">
				<div class="col-sm-8">
					<div id="intro-linda">
						<?php
							$linda=get_page_by_title( 'linda');
							echo get_field('texto_inicial', $linda->ID); 
						?>
						</p>
						
					</div>
					<div class="linda-post">
						<?php 
  							// print_r($linda);
  							echo get_the_post_thumbnail($linda->ID );
  							$content= $linda->post_content;
  							$content = apply_filters('the_content', $content);
  							echo $content;
						?>
						<a target="_blank" href="<?php echo get_field('link_da_materia',$linda->ID);?>">
							<?php  echo __('Leia a materia completa.', 'odin'); ?>
						</a>
						
					</div>
				</div>
				<img  id="img-linda" src="<?php echo get_template_directory_uri()."/assets/images/linda-barras.png"; ?>" alt="">

				<div class="col-sm-4">
				</div>	
				<div class="clearfix"></div>
			</div>
			

		</section> 
		<section class="secao-front" id="pianos">
			<div class="interno">
				<div class="col-sm-6"></div>
				<div class="col-sm-6">
					<h1>Alessa</h1>
					<h2>a Cidade e</h2> 
					<h2>os Pianos</h2>
					<div class="texto-pianos">
						<?php 
							$pianos=get_page_by_title( 'Pianos');
							// print_r($pianos);
							$pianos_conteudo=$pianos->post_content ;

  							$content = apply_filters('the_content', $pianos_conteudo );
  							echo $content;

						 ?>
					</div>
					<p class="ver-piano"><a href="">Venha ver o blog</a></p>

				</div>
				<div class="clearfix"></div>
			</div>

		</section> 
		<section class="secao-front" id="agenda">
			<?php get_template_part( 'content', 'agenda' ); ?>
			<div class="clearfix"></div>

		</section> 
		<section class="secao-front" id="ritaleena">
			<canvas  id='confetti' >
			</canvas>
			<div class="img-release">
				<img src="<?php echo get_template_directory_uri()."/assets/images/ritaleena.jpg"; ?>" alt="">
				<h4 class="fotos-release-texto"><a href="#" id="ritafotos"><?php echo __('Fotos', 'odin') ?></a></h4>
				<h4 class="fotos-release-texto"><a id='release-link' href="#release" id="ritalease"><?php  echo __('Release', 'odin') ?></a></h4>
			</div>
							
		<div id="release">
			<?php $ritaleena=get_page_by_title( 'ritaleena'); 
				$conteudo= $ritaleena->post_content;
				$conteudo = apply_filters('the_content', $conteudo);
  				echo $conteudo;
			?>
		</div>
		</section>
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
			<div class="clearfix"></div>

		</section>	
			
		
	</main><!-- #main -->

<?php
get_footer();
