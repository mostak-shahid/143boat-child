<?php
add_action( 'action_below_page', 'map_section_fnc', 10, 1 );
function map_section_fnc ($page_details) {
    if ($page_details["id"] == 43) {
        get_template_part( 'template-parts/section', 'map' );
    }
}
add_action('action_above_header', 'sticky_menu_fnc', 10, 1);
function sticky_menu_fnc ($page_details) {
	?>
	<div class="sticky-menu"><?php echo do_shortcode( "[mosmenu container='nav' container_class='mosmenu menu-centered' menu_class='mos-menu' location='mainmenu']" ) ?></div>
	<?php
}
add_action( 'action_before_page_content_area', 'child_pageTitle', 10, 1 );
function child_pageTitle ($page_details) {
    global $mosacademy_options;
    ?>
    <div class="child_page_title">
        <div class="row">
            <div class="col-md-6">
                <span class="pagetitle">
                    <?php 
                    if (is_home()) 
                        _e($mosacademy_options['blog-archive-title']);
                    elseif (is_single()) {
                        if($mosacademy_options['single-blog-title-option'] == 2 AND $mosacademy_options['single-blog-title'])
                            echo $mosacademy_options['single-blog-title'];
                        else the_title();
                    }
                    elseif (is_404()) {                    
                        _e($mosacademy_options['404-page-title']);
                    }
                    elseif (is_search()){
                        _e('Search reasult for ');
                        echo get_search_query();
                    }
                    elseif (is_shop() OR is_product_category()){
                        _e('Shop');
                    }
                    elseif(!$hide_title) the_title();
                    ?>
                        
                </span>
            </div>
            <div class="col-md-6">
                <div class="cbreadcrumbs"><?php echo mos_breadcrumbs() ?></div>
            </div>
        </div>
    </div>    
    <?php
}

// add_action( 'wp_head', 'remove_theme_actions' );
// function remove_theme_actions () {
//  remove_action( 'action_contact_page_form', 'contact_info', 5 );
//  remove_action( 'action_contact_page_form', 'form_generator', 10 );
//  remove_action( 'action_team_archive_page', 'team_archive_page_fnc', 10 );
// }
add_action( 'init', 'child_text_layout_manager' );
function child_text_layout_manager () {
    global $mosacademy_options;
    //Why us
    if ($mosacademy_options['sections-whyus-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_whyus', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_whyus', 'start_row', 11, 1 );
        add_action( 'action_before_whyus', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_whyus', 'end_div', 10, 1 );
        add_action( 'action_after_whyus', 'end_div', 11, 1 );
        add_action( 'action_after_whyus', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-whyus-text-layout'] == 'container-fliud') {
        add_action( 'action_before_whyus', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_whyus', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-whyus-text-layout'] == 'container-full') {
        add_action( 'action_before_whyus', 'start_full_width', 10, 1 );
        add_action( 'action_after_whyus', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_whyus', 'start_container', 10, 1 );
        add_action( 'action_after_whyus', 'end_div', 10, 1 );
    }
    //Page
    if ($mosacademy_options['sections-cpage-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_cpage', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_cpage', 'start_row', 11, 1 );
        add_action( 'action_before_cpage', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_cpage', 'end_div', 10, 1 );
        add_action( 'action_after_cpage', 'end_div', 11, 1 );
        add_action( 'action_after_cpage', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-cpage-text-layout'] == 'container-fliud') {
        add_action( 'action_before_cpage', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_cpage', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-cpage-text-layout'] == 'container-full') {
        add_action( 'action_before_cpage', 'start_full_width', 10, 1 );
        add_action( 'action_after_cpage', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_cpage', 'start_container', 10, 1 );
        add_action( 'action_after_cpage', 'end_div', 10, 1 );
    }
    //Gallery
    if ($mosacademy_options['sections-cgallery-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_cgallery', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_cgallery', 'start_row', 11, 1 );
        add_action( 'action_before_cgallery', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_cgallery', 'end_div', 10, 1 );
        add_action( 'action_after_cgallery', 'end_div', 11, 1 );
        add_action( 'action_after_cgallery', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-cgallery-text-layout'] == 'container-fliud') {
        add_action( 'action_before_cgallery', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_cgallery', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-cgallery-text-layout'] == 'container-full') {
        add_action( 'action_before_cgallery', 'start_full_width', 10, 1 );
        add_action( 'action_after_cgallery', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_cgallery', 'start_container', 10, 1 );
        add_action( 'action_after_cgallery', 'end_div', 10, 1 );
    }
    //Testimonial
    if ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_testimonial', 'start_row', 11, 1 );
        add_action( 'action_before_testimonial', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 11, 1 );
        add_action( 'action_after_testimonial', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-full') {
        add_action( 'action_before_testimonial', 'start_full_width', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_testimonial', 'start_container', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    }
}





