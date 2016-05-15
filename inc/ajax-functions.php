<?php 
// funções do ajax
function mostra_trampo_func(){
	$tipo=$_POST['trampo'];
	$resposta=array();
	$resposta['mensagem']= "fez ação e chamou funcao";
	$resposta['html']= '<h2>';
	if ($_POST['trampo']=='soundart') {
		$resposta['html'].= 'Sound Art</h2>';
	}
	else{
		$resposta['html'].= 'Trilhas</h2>';

	}
	$args = array('post_type' => $tipo);
   	$trabalho_query = new WP_Query($args);
   if($trabalho_query->have_posts()) : 
	   	while ( $trabalho_query->have_posts() ) {
			$trabalho_query->the_post();
			$resposta['html'].= '<article class="cada-trabalho" ><h3><a href="'.get_permalink( ).'">' . get_the_title().'</a></h3>';
			$resposta['html'] .= '</article>';
		}
   else: 
      $resposta['html'] = 'Nenhum SoundArt';
   	
   endif;
	
	echo json_encode($resposta);
	wp_die( );
}
add_action( 'wp_ajax_mostra_trampo', 'mostra_trampo_func' );
add_action( 'wp_ajax_nopriv_mostra_trampo', 'mostra_trampo_func' );