<?php
function add_dumketo_theme_functions($sections){
    global $container_list, $animations, $section_list, $bootstrap_grids, $col_ratio;
    $page_sections = array_diff($section_list,array('banner' => 'Banner Section', 'welcome' => 'Welcome Section'));

    // $sections[] = array(
    //     'title'            => __( 'Child theme', 'redux-framework-demo' ),
    //     'id'               => 'child-theme',
    //     'desc'             => '',
    //     'customizer_width' => '400px',
    //     'icon'             => 'el el-move'
    // );
    $sections[] = array(
        'title'            => __( 'Why us Section', 'redux-framework-demo' ),
        'id'               => 'sections-whyus',
        'desc'             => '',
        'customizer_width' => '450px',
        'subsection' => true,
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-whyus-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-whyus-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-whyus .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-whyus-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-whyus .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-whyus-border',
                'type'     => 'border',
                'title'    => __( 'Why us Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-whyus .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-whyus-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-whyus-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-whyus-title',
                'type'     => 'text',
                'title'    => __( 'Why us Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-whyus-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'          => 'sections-whyus-slides',
                'type'        => 'slides',
                'title'       => __( 'Section Details', 'redux-framework-demo' ),             
                'show' => array(
                    'title' => true,
                    'description' => true,
                    'url' => true              // <<========= that is what was asked at the top.
                ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'redux-framework-demo' ),
                    'description' => __( 'Description Here', 'redux-framework-demo' ),
                    'url'         => __( 'Give us a link!', 'redux-framework-demo' ),
                ),
            ),
            array(
                'id'       => 'sections-whyus-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Why us Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-whyus-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-whyus-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Why us Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-whyus-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-whyus-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Why us Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-whyus-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-whyus-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Why us Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-whyus-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-whyus-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    $sections[] = array(
        'title'            => __( 'Page Section', 'redux-framework-demo' ),
        'id'               => 'sections-cpage',
        'desc'             => '',
        'customizer_width' => '450px',
        'subsection' => true,
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-cpage-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-cpage-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-cpage .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-cpage-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-cpage .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-cpage-border',
                'type'     => 'border',
                'title'    => __( 'Page Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-cpage .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-cpage-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-cpage-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-cpage-title',
                'type'     => 'text',
                'title'    => __( 'Page Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-cpage-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-cpage-url',
                'type'     => 'text',
                'title'    => __( 'Page Section URL', 'redux-framework-demo' ),
            ),
            array(
                'id'       => 'sections-cpage-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Page Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-cpage-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-cpage-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Page Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-cpage-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-cpage-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Page Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-cpage-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-cpage-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Page Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-cpage-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-cpage-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    );
    //New Gallery
    $sections[] = array(
        'title'            => __( 'New Gallery Section', 'redux-framework-demo' ),
        'id'               => 'sections-cgallery',
        'desc'             => '',
        'customizer_width' => '450px',
        'subsection' => true,
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-cgallery-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-cgallery-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-cgallery .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-cgallery-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-cgallery .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-cgallery-border',
                'type'     => 'border',
                'title'    => __( 'New Gallery Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-cgallery .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-cgallery-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-cgallery-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-cgallery-title',
                'type'     => 'text',
                'title'    => __( 'New Gallery Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-cgallery-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-cgallery-zoom',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Zoom Image', 'redux-framework-demo' ),
                'compiler' => 'true',
                'default'  => array( 'url' => get_template_directory_uri() . '/images/zoom.png' ),
            ),
            array(
                'id'       => 'sections-cgallery-gallery',
                'type'     => 'gallery',
                'title'    => __( 'Add/Edit Gallery', 'redux-framework-demo' ),
            ),
            array(
                'id'       => 'sections-cgallery-large-size',
                'type'     => 'select',
                'title'    => __( 'Large Image Size', 'redux-framework-demo' ),
                'desc'     => __( 'Select an option.', 'redux-framework-demo' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'actual' => __( 'Actual Size', 'redux-framework-demo' ),
                    'max'   => __( 'Max Size (Width 1920px)', 'redux-framework-demo' ),
                    'container'     => __( 'Container Size (Width 1140px)', 'redux-framework-demo' ),
                ),
                'default'  => 'max',
            ),
            array(
                'id'       => 'sections-cgallery-gap',
                'type'     => 'checkbox',
                'title'    => __( 'Grid Spacing', 'redux-framework-demo' ),                
                'options'  => array(
                    '1' => 'Yes I like to use gap between grids.',
                ),
            ), 
            array(
                'id'      => 'sections-cgallery-layout',
                'type'    => 'select_image',
                'title'   => __( 'Gallery Layout', 'redux-framework-demo' ),
                'options' => array(
                    array(
                        'alt' => 'Layout 2',
                        'img' => ReduxFramework::$_url . '../sample/presets/gallery-template-2.jpg',
                    ),
                ),
                'default' => ReduxFramework::$_url . '../sample/presets/gallery-template-2.jpg',
            ),
            array(
                'id'       => 'sections-cgallery-url',
                'type'     => 'text',
                'title'    => __( 'View More Link(if any)', 'redux-framework-demo' ),
                'validate'     => 'no_html',
            ),
            array(
                'id'       => 'sections-cgallery-background-type',
                'type'     => 'button_set',
                'title'    => __( 'New Gallery Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-cgallery-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-cgallery-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'New Gallery Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-cgallery-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-cgallery-background-solid',
                'type'     => 'background',                
                'title'    => __( 'New Gallery Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-cgallery-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-cgallery-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'New Gallery Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-cgallery-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-cgallery-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    //Testimonial Gallery
    $sections[] = array(
        'title'            => __( 'Testimonial Section', 'redux-framework-demo' ),
        'id'               => 'sections-testimonial',
        'desc'             => '',
        'customizer_width' => '450px',
        'subsection' => true,
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-testimonial-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-testimonial-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-testimonial-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-testimonial-border',
                'type'     => 'border',
                'title'    => __( 'Testimonial Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-testimonial .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-testimonial-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-testimonial-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-testimonial-title',
                'type'     => 'text',
                'title'    => __( 'Testimonial Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-testimonial-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-testimonial-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Testimonial Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-testimonial-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-testimonial-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Testimonial Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-testimonial-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Testimonial Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-testimonial-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Testimonial Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-testimonial-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-testimonial-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    return $sections;
}
add_filter("redux/options/mosacademy_options/sections", 'add_dumketo_theme_functions');