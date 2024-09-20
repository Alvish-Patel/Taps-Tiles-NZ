<?php
/*
 * Blog Page Options
*/
Redux::setSection($options, array(
    'title' => esc_html__('Page', 'marblex-core') ,
    'id' => 'section_dab925e',
    'icon' => 'eicon-product-pages',
    'customizer_width' => '1000px',
));

// Blog Page Settings
Redux::setSection( $options, array(
    'title' => esc_html__('Blog Page Settings','marblex-core'),
    'id'    => 'section_0beceba',
    'subsection' => true,
    'desc'  => esc_html__('This section contains options for Pages.','marblex-core'),
    'fields'=> array(
        array(
            'id' => 'info__0beceba',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),

            'title' => __('Blog Page Options', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_0beceba',
            'type' => 'section',
            'indent' => true
        ) ,      

        array(
            'id'       => 'blog_btn_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Button Name', 'marblex-core' ),
            'subtitle' => esc_html__( 'Change Blog Button Name in blog page and single blog page', 'marblex-core' ),
            'default'  => esc_html__('Read More','marblex-core' ),
        ),
        array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Blog Page Column Option', 'marblex-core') ,
            
        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) , 

        marblex_core_get_layout_options( 'blog' , 'column' , ''),
        
         array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Blog Page Sidebar Options', 'marblex-core') ,
            
        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,       

      marblex_core_get_layout_options( 'pt_blog' , 'sidebar' , '' ),

        array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),

            'title' => __('Blog Single Page Sider Options', 'marblex-core') ,
        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,

        marblex_core_get_layout_options( 'single_blog' , 'sidebar' , '' ),    


     

         
        array(
            'id'        => 'enable_comment',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Comments','marblex-core'),
            'subtitle' => esc_html__( 'Turn on to display comments.','marblex-core'),
            'options'   => array(
                            'yes' => esc_html__('On','marblex-core'),
                            'no' => esc_html__('Off','marblex-core')
                        ),
            'default'   => esc_html__('yes','marblex-core')
        ),

        
    )
    ));
Redux::setSection( $options, array(
        'title' => esc_html__('404','marblex-core'),
        'id'    => 'fourzerofour-section',
        
        'subsection' => true,
        'desc'  => esc_html__('This section contains options for 404.','marblex-core'),
        'fields'=> array(
            array(
                'id' => 'info_general'.rand(10,1000),
                'type' => 'info',
                'style' => 'custom',
                'color' => sanitize_hex_color($color),
    
                'title' => __('404 Page Options', 'marblex-core') ,
            ) ,
    
            array(
                'id' => 'section-general'.rand(10,1000),
                'type' => 'section',
                'indent' => true
            ) ,   
            
    
            array(
                'id'        => 'title_404',
                'type'      => 'text',
                'title'     => esc_html__( '404 Page Title','marblex-core'),
                'default'   => esc_html__( '404 Error','marblex-core' )
            ),
            array(
                'id'        => 'description_404',
                'type'      => 'textarea',
                'title'     => esc_html__( '404 Page Description','marblex-core'),
                'default'   => esc_html__( 'Oops! This Page is Not Found.','marblex-core' )
            ),
        )) 
    );   
?>