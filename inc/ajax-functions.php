<?php 
// funções do ajax
function mostra_trampo_func(){
	$tipo=$_POST['trampo'];
	$resposta=array();
	$resposta['mensagem']= "fez ação e chamou funcao";
	$resposta['html']= '<h2 id="titulo">';
	if ($_POST['trampo']=='soundart') {
		$resposta['html'].= 'Sound Art</h2>';
	}
	else{
		$resposta['html'].= 'Trilhas</h2>';

	}
	$args = array('post_type' => $tipo, 'posts_per_page' => -1);
   	$trabalho_query = new WP_Query($args);
   if($trabalho_query->have_posts()) : 
   		$cont=0;
	   	while ( $trabalho_query->have_posts() ) {
			$trabalho_query->the_post();
			$resposta['html'].= '<article class="cada-trabalho" id="'.$cont.'" ><h3><a href="'.get_permalink( ).'">' . get_the_title().'</a></h3>';
			$resposta['html'] .= '</article>';
			$count++;
		}
   else: 
      $resposta['html'] = 'Nenhum SoundArt';
   	
   endif;
	$resposta['html'] .= '<div class="clearfix"></div>';

	echo json_encode($resposta);
	wp_die( );
}
add_action( 'wp_ajax_mostra_trampo', 'mostra_trampo_func' );
add_action( 'wp_ajax_nopriv_mostra_trampo', 'mostra_trampo_func' );