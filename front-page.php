<?php
get_header(); ?>
	<main id="content" class="home <?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
		<section class="secao-front amarelo" id="inicio">
			<div id="scroll-paralax" class="parallax">

			    <div id="group4" class="parallax__group">
						<div class="parallax__layer parallax__layer--fore vel2">
			        <div class="title2 title">Aqui você poderá ver uma variedade de projetos, de trilhas à arte sonora, de blocos de carnaval à mapas de pianos, da música popular à música experimental.<br><a id="btn-mais"href="#fim">Ver mais</a></div>
			      </div>
						<div class="parallax__layer parallax__layer--back" >
			        <div class="title title3">Sou musicista, cantora e trabalho com música e tecnologia.</div>
			      </div>
			      <div class="parallax__layer parallax__layer--deep">
			        <div class="title">Olá, eu sou a Alessa e este é meu portfólio online.</div>
			      </div>

			    </div>

			</div>
			<div id="fim">
				Formada em Comunicação Social pela PUC-SP (2006) e em Música Popular na Faculdade Santa Marcelina (2011), tem pós graduação em Canção Popular (2012) também pela Santa Marcelina. Concluiu seu mestrado em Studio Composition na Goldsmiths, University of London na Inglaterra (2014). Se apresenta na cena musical paulistana desde 2004 onde cantou, tocou e arranjou para bandas como Estatuto da Gafieira, Funkalleros e Ale Soda Pop. Foi idealizadora do projeto Alessa, a Cidade e os Pianos, blog musical que dedica-se a mapear os pianos da cidade de São Paulo. É idealizadora, vocalista e diretora musical do Bloco Ritaleena, cordão carnavalesco de São Paulo que homenageia a cantora Rita Lee. É editora e colunista da revista de cultura eletroacústica linda do coletivo NME (Nova Música Eletroacústica). Além de seu trabalho em performance, atualmente pesquisa as áreas de música e tecnologia.<br><a id="voltar" href="#">Voltar</a>
			</div>

		</section>
		<section class="secao-front" id="piano">

		</section>
		<section class="secao-front" id="sound-trilha">
			<article class="trabalho" id="soundart">
				<img src="<?php echo get_template_directory_uri()."/assets/images/fundo-soundart.png"; ?>" alt="">
				<a data-post-type="soundart" href="#">
					<img src="<?php echo get_template_directory_uri()."/assets/images/link-soundart.png"; ?>" alt="">
				</a>
			</article>

			<article class="trabalho" id="trilhas">
				<img src="<?php echo get_template_directory_uri()."/assets/images/fundo-trilhas.png"; ?>" alt="">
				<a data-post-type="trilha" href="#">
					<?php echo '<img src="'.get_template_directory_uri().'/assets/images/link-trilhas-' .  get_locale(  ) . '.png">'; ?>

					<!-- <img src="<?php echo get_template_directory_uri()."/assets/images/link-trilhas.png"; ?>" alt=""> -->
				</a>
		<?php


	?>
			</article>
		</section>
		<section class=" secao-front "id="conteudo-trabalhos">
			<a href="#ancora" id="link-ancora"></a>
			<div id="ancora"></div>

			<div class="interno">
			</div>
		</section>
		<!-- <section class="secao-front" id="transicao">

		</section> -->
		<section class="secao-front" id="linda">
			<div class="interno">
				<div class="col-sm-8">
					<div id="intro-linda">
						<?php
							$linda=get_page_by_slug( 'linda');
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
		<section class="secao-front" id="ritaleena">
			<canvas  id='confetti' >
			</canvas>
			<div class="img-release">
				<img src="<?php echo get_template_directory_uri()."/assets/images/ritaleena.jpg"; ?>" alt="">
				<h4 class="fotos-release-texto"><a href="fotos-ritaleena/" id="ritafotos"><?php echo __('Fotos', 'odin') ?></a></h4>
				<h4 class="fotos-release-texto"><a id='release-link' href="#release" id="ritalease"><?php  echo __('Release', 'odin') ?></a></h4>
			</div>

		<div id="release">
			<?php $ritaleena=get_page_by_slug( 'ritaleena-release');
				$conteudo= $ritaleena->post_content;
				$conteudo = apply_filters('the_content', $conteudo);
  				echo $conteudo;
			?>
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
							$pianos=get_page_by_slug( 'blog');
							// print_r($pianos);
							$pianos_conteudo=$pianos->post_content ;

  							$content = apply_filters('the_content', $pianos_conteudo );
  							echo $content;

						 ?>
					</div>
					<p class="ver-piano"><a href="blog"><?php echo __('Check out the blog', 'odin'); ?></a></p>

				</div>
				<div class="clearfix"></div>
			</div>

		</section>
		<section class="secao-front" id="agenda">
			<?php get_template_part( 'content', 'agenda' ); ?>
			<div class="clearfix"></div>

		</section>

		<section class="secao-front" id="contato">
			<img class="titulo-contato" src="<?php echo get_template_directory_uri()."/assets/images/titulo-contato.png"; ?>" alt="">
			<article id="interno-contato" class="row">
				<div class="col-sm-6" id="socials-contato">
					<div id="facebook-feed"></div>
				</div>
				<div class="col-sm-6 pull-right" id="form-contato">
					<?php
					echo do_shortcode( '[contact-form-7 id="10" title="Contato"]' ); ?>
					<?php
					 // echo do_shortcode( '[contact-form-7 id="4" title="Formulário de contato 1"]' ); ?>

				</div>
			</article>
			<div class="clearfix"></div>

		</section>

<div id="loader-trabalhos">
				<img  src="<?php echo get_template_directory_uri()."/assets/images/ajax-loading.gif"; ?>" alt="">
			</div>
	</main><!-- #main -->

<?php
get_footer();
