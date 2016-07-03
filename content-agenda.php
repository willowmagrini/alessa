<div class="neon "id="sub"><span>Agenda</span></div>

<div id="eventos-container">
	<div class="eventos-interno">
		 <?php $current_date = get_the_time('U');
            $wp_query = new WP_Query(array( 
                'post_type'         => 'eventos',
                'posts_per_page'    => 2,
                'orderby'       => '_start_eventtimestamp',
                'order'         => 'ASC',
                'meta_query'    => array(
                    array(
                    'key'       => '_start_eventtimestamp',
                    'value'     => $current_date,
                    'compare'   => '>',
                    ),
                )
            ));
            if ($wp_query->have_posts()) {
                while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
                    $date = get_post_meta(get_the_id(),'_start_eventtimestamp', true);
                    echo '<div class="evento col-sm-6">
                        <div class="data-evento inline-block">
                            <h2 class="dia">'.date_i18n('d' , $date).'</h2>
                            <h5 class="mes">'.date_i18n("F", mktime(0, 0, 0, date_i18n('m', $date ), 10)).'</h5>
                        </div>
                        <div class="titulo-evento inline-block">
                            <div class="titulo-evento"><h2>'.get_the_title().'</h2></div>
                        </div>
                        <div class="conteudo-evento inline-block">
                            <div class="texto-evento">'.apply_filters('the_content',get_the_excerpt()).'</div>
                            <div class="leia-mais-inc"></div>
                        </div>
                    </div>
                    <!--class="evento"-->';

                 endwhile; 
                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly

            }
            else{
                echo __('Não há eventos agendados no momento.', "skt-hotel");
            }
            
         ?>
		
	</div>
	<div class="borda esquerda">
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>					
	</div>
	<div class="borda topo">
		
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
	</div>
	<div class="borda baixo">
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
		<div class="bola "></div>
	</div>	
	<div class="borda direita">
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		<div class="bola"></div>
		

	</div>
	<div class="clearfix"></div>
</div>
