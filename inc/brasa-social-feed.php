<?php
class Brasa_Social_Feed{
	public function __construct($args){
		$this->args = $args;

		//ajax facebook
		add_action( 'wp_ajax_facebook_brasa_social_feed', array($this,'do_ajax_facebook') );
		add_action( 'wp_ajax_nopriv_facebook_brasa_social_feed', array($this,'do_ajax_facebook') );

		//ajax youtube
		add_action( 'wp_ajax_youtube_brasa_social_feed', array($this,'do_ajax_youtube') );
		add_action( 'wp_ajax_nopriv_youtube_brasa_social_feed', array($this,'do_ajax_youtube') );

		//add youtube cron
		if ( ! wp_next_scheduled( 'brasa_social_feed_cron_youtube' ) ) {
			wp_schedule_event( time(), 'hourly', 'brasa_social_feed_cron_youtube' );
		}
		add_action( 'brasa_social_feed_cron_youtube', array($this,'do_cron_youtube') );
	}

	public function get_facebook_posts($limit = 2){
		$request_url = add_query_arg( 
			array(
				'access_token' => $this->args['facebook_auth'],
				'posts.limit'  => $limit,
				'fields'	   => 'picture,link,message,type'	
			), 
			$this->args['facebook_api_url'] 
		);
		// echo $request_url;
		$request_url = esc_url_raw($request_url);
		$request = wp_remote_get( $request_url );
		$response = json_decode( wp_remote_retrieve_body( $request ), true );
		return $response['data'];
	}

	public function do_ajax_facebook(){
		// echo'teste';
		$limit = 3;
		$posts = $this->get_facebook_posts($limit);
		
		if(!$posts || empty($posts))
			wp_die();
		// echo 'teste';
		foreach ($posts as $post) {
			global $fb_post;
			$fb_post = $post;
		// 	echo '<pre>';
		// print_r($post);
		// echo '</pre>';
			// echo 'teste';
			get_template_part('content','facebook');
		}
		wp_die();
	}
}