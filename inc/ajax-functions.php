<?php
// funções do ajax
function mostra_trampo_func(){

	$tipo=$_POST['trampo'];
	$resposta=array();
	$resposta['mensagem']= "fez ação e chamou funcao";
	$resposta['html']= '<h2 class="'.$tipo.'" id="titulo">';
	if ($_POST['trampo']=='soundart') {
		$resposta['html'].= 'Sound Art</h2>';
	}
	else{
		$resposta['html'].= 'Trilhas</h2>';

	}
	$resposta['html'].= '<div id="slider-trabalhos">';
	$args = array('post_type' => $tipo, 'posts_per_page' => -1);
   	$trabalho_query = new WP_Query($args);
   if($trabalho_query->have_posts()) :
   		$cont=0;
	   	while ( $trabalho_query->have_posts() ) {
			$trabalho_query->the_post();
			$resposta['html'].= '<a href="'.get_permalink( ).'"><article class="cada-trabalho" id="'.$cont.'" >'.get_the_post_thumbnail( $trabalho_query->post->ID, 'horizontal', array('id'=>'thumb_trabalho') ).'<h3>' . get_the_title().'</h3>';
			$resposta['html'] .= '</article></a>';
			$count++;
		}
   else:
      $resposta['html'] = 'Nenhum SoundArt';

   endif;
   	$resposta['html'].= '</div><!-- id="slider-trabalhos"-->';

	$resposta['html'] .= '<div class="clearfix"></div>';

	echo json_encode($resposta);
	wp_die( );
}
add_action( 'wp_ajax_mostra_trampo', 'mostra_trampo_func' );
add_action( 'wp_ajax_nopriv_mostra_trampo', 'mostra_trampo_func' );
