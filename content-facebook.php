<?php 
/* facebook posts content */
global $fb_post;
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
$text = $fb_post['message'];
$mensagem = preg_replace($reg_exUrl, "", $text);
?>
<div>
	<div class="  img-container">
		<?php if($fb_post['picture'] && !empty($fb_post['picture'])): ?>
			<a class="social-link social-link-image col-md-12" target="_blank"  href="<?php echo esc_url($fb_post['link']);?>">

			    <img src="<?php echo esc_url($fb_post['picture']);?>">
			 </a>
	    <?php endif;?>
	</div><!-- .col-md-4 pull-left img-container -->
	<div class=" ">
		<?php if($mensagem && !empty($mensagem)): ?>
			<a class="social-link social-link-text col-md-12" target="_blank"  href="<?php echo esc_url($fb_post['link']);?>">
				 <?php echo esc_textarea($mensagem);?>
 			    <img class="link-facebook" src="<?php echo get_template_directory_uri()."/assets/images/facebook.png"; ?>">

			</a> 
	    <?php endif;?>
	</div><!-- .col-md-7 pull-right -->
</a><!-- .col-md-12 -->
<div class="col-md-12" style="height:1px;clear:both"></div><!-- .col-md-12 -->
</div>
