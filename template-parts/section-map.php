<?php 
global $mosacademy_options;
$title = $mosacademy_options['contact-address']['0']['title'];
$attachment_id = $mosacademy_options['contact-address']['0']['attachment_id'];
$map_link = $mosacademy_options['contact-address']['0']['map_link'];
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_map', $page_details ); 
?>
<section id="section-map" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_map hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_map', $page_details ); 
		?>
		<?php if ($map_link) echo '<a href="'.$map_link.'" class="map-link" class="map-url" target="_blank">'; ?>
		<?php if ($attachment_id) :  ?>
			<div class="visible-lg"><img class="img-responsive img-map" src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" alt="<?php echo $alt_tag['inner'] . $title ?>"></div>	
			<div class="visible-md"><img class="img-responsive img-map" src="<?php echo aq_resize(wp_get_attachment_url( $attachment_id ), 1200, 300, true); ?>" alt="<?php echo $alt_tag['inner'] . $title ?>"></div>			
			<div class="visible-sm"><img class="img-responsive img-map" src="<?php echo aq_resize(wp_get_attachment_url( $attachment_id ), 992, 300, true); ?>" alt="<?php echo $alt_tag['inner'] . $title ?>"></div>			
			<div class="visible-xs"><img class="img-responsive img-map" src="<?php echo aq_resize(wp_get_attachment_url( $attachment_id ), 768, 300, true); ?>" alt="<?php echo $alt_tag['inner'] . $title ?>"></div>			
		<?php endif ?>
		<?php if ($map_link) echo '</a>'; ?>
		<?php 
		/*
		* action_after_map hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_map', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_map', $page_details  ); ?>