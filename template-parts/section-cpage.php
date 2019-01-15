<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-cpage-animation'];
$animation_delay = ( $mosacademy_options['sections-cpage-animation-delay'] ) ? $mosacademy_options['sections-cpage-animation-delay'] : 0;
$title = $mosacademy_options['sections-cpage-title'];
$content = $mosacademy_options['sections-cpage-content'];
$url = $mosacademy_options['sections-cpage-url'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_cpage', $page_details ); 
?>
<section id="section-cpage" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_cpage hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_cpage', $page_details ); 
		?>
			<div class="row">
				<div class="col-md-7">
					<div class="wrapper">
						<?php if ($title) : ?>				
							<div class="title-wrapper">
								<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
							</div>
						<?php endif; ?>
						<?php if ($content) : ?>				
							<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
						<?php endif; ?>
						<?php if ($url) : ?>				
							<div class="url-wrapper"><a class="btn btn-page" href="<?php echo esc_url( do_shortcode( $url ) ) ?>">Read More</a></div>
						<?php endif; ?>						
					</div>
				</div>
			</div>

		<?php 
		/*
		* action_after_cpage hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_cpage', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_cpage', $page_details  ); ?>