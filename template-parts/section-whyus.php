<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-whyus-animation'];
$animation_delay = ( $mosacademy_options['sections-whyus-animation-delay'] ) ? $mosacademy_options['sections-whyus-animation-delay'] : 0;
$title = $mosacademy_options['sections-whyus-title'];
$content = $mosacademy_options['sections-whyus-content'];
$slides = $mosacademy_options['sections-whyus-slides'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_whyus', $page_details ); 
?>
<section id="section-whyus" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_whyus hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_whyus', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php //var_dump($slides); ?>
				<?php if (@$slides) : ?>
					<div class="wrapper">
						<div class="row">
							<?php foreach ($slides as $slide) : ?>
								<div class="col-md-4">
									<div class="unit">
										<?php if (@$slide['attachment_id']) : ?>
											<img class="img-responsive img-whyus" src="<?php echo wp_get_attachment_url( $slide['attachment_id'] ) ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $slide['title'] ) ) ?>" width="<?php echo $slide["width"]; ?>" height="<?php echo $slide["height"] ?>">
										<?php endif ?>
										<h4 class="unit-title"><?php echo $slide['title'] ?></h4>
										<?php if (@$slide['description']) : ?>
											<div class="desc"><?php echo do_shortcode( $slide['description'] ) ?></div>
										<?php endif ?>
										<?php if (@$slide['url']) : ?>
											<a class="hidden-link" href="<?php echo esc_url( do_shortcode( $slide['url'] ) ) ?>">View</a>
										<?php endif ?>
									</div>									
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
		<?php 
		/*
		* action_after_whyus hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_whyus', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_whyus', $page_details  ); ?>