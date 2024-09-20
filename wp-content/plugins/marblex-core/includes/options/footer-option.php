<?php
/*
 * Footer Options
 */

Redux::setSection( $options, array(
    'title' => esc_html__( 'Footer', 'marblex-core' ),
    'id'    => 'footer-editor',
    'icon'  => 'eicon-footer',
    'customizer_width' => '500px',
) );

Redux::setSection( $options, array(
    'title' => esc_html__('Footer Logo','marblex-core'),
    'id'    => 'footer-logo',
    
    'subsection' => true,
    'desc'  => esc_html__('This section contains options for footer.','marblex-core'),
    'fields'=> array(

      array(
            'id' => 'info_L6N7VDM05M',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('This sectin contain options for Footer logo', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indentL6N7VDM05M',
            'type' => 'section',
            'indent' => true
        ) ,
        
        array(
            'id'       => 'logo_footer',         
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Footer Logo','marblex-core'),
            'read-only'=> false,
            
        ), 

    )
)); 



Redux::setSection( $options, array(
    'title' => esc_html__('Footer Option','marblex-core'),
    'id'    => 'footer-section',
    
    'subsection' => true,    
    'fields'=> array(

        array(
            'id' => 'info_N7VDM05M',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('This section contains options for footer', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_N7VDM05M',
            'type' => 'section',
            'indent' => true
        ) ,

       
        
        array(
            'id'        => 'footer_layout',
            'type'      => 'select',
            'title'     => esc_html__( 'Footer Layout Type','marblex-core' ),
            'subtitle'  => wp_kses( __( '<br />Choose among these structures (1column, 2column and 3column) for your footer section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','marblex-core' ), array( 'br' => array() ) ),            
            'options'   => array(
                                '1' =>  esc_html__( 'Footer Layout 1','marblex-core' ), 
                                '2' =>  esc_html__( 'Footer Layout 2','marblex-core' ),
                                '3' =>  esc_html__( 'Footer Layout 3','marblex-core' ), 
                                '4' =>  esc_html__( 'Footer Layout 4','marblex-core' ),    
                                                           
                            ),
            'default'   => '4',
        ),
         array(
            'id' => 'footer_back_opt_switch',
            'type' => 'button_set',
            'title' => esc_html__('Background', 'marblex-core') ,
            
            'options' => array(
                'none' => esc_html__('none', 'marblex-core') ,
                'image' => esc_html__('Image', 'marblex-core') ,
                'color' => esc_html__('Color', 'marblex-core'),                
            ) ,
            'default' => esc_html__('none', 'marblex-core')
        ) ,
         array(
            'id' => 'footer_back_img',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Image', 'marblex-core') ,
            'read-only' => false,
            'required' => array(
                'footer_back_opt_switch',
                '=',
                'image'
            ) ,
        ) ,        

        array(
            'id' => 'footer_back_color',
            'type' => 'color',
            'title' => esc_html__('Color', 'marblex-core') ,         
            
            'mode' => 'background',
            'required' => array(
                'footer_back_opt_switch',
                '=',
                'color'
            ) ,
            'transparent' => false
        ) ,
    )
));

Redux::setSection( $options, array(
    'title'      => esc_html__( 'Footer Copyright', 'marblex-core' ),
    'id'         => 'footer-copyright',
    
    'subsection' => true,
    'fields'     => array(
        array(
            'id' => 'info_7VDM05M',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('This section contains options Footer Copyright', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_7VDM05M',
            'type' => 'section',
            'indent' => true
        ) ,
        array(
            'id'        => 'copyright_text',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Copyright Text','marblex-core'),
            'default'   => esc_html__( 'Copyright '.date('Y').' marblex All Rights Reserved.','marblex-core'),
        ),

    )) 
);

Redux::setSection( $options, array(
    'title'      => esc_html__( 'Subscribe', 'marblex-core' ),
    'id'         => 'marblex-subscribe',
    
    'subsection' => true,
    'fields'     => array(

        array(
            'id' => 'info_7VM05M',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('This section contains options Subscription Block', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_7VM05M',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id'        => 'footer_subscribe',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Subscribe','marblex-core'),
            'subtitle' => esc_html__( 'Display Subscribe On All page', 'marblex-core' ),
            'options'   => array(
                            'yes' => esc_html__('Yes','marblex-core'),
                            'no' => esc_html__('No','marblex-core')
                        ),
            'default'   => esc_html__('yes','marblex-core')
        ),

        array(
            'id'        => 'subscribe_shortcode',
            'type'      => 'text',
            'title'     => esc_html__( 'Subscribe Shortcode','marblex-core'),
            'subtitle'  => wp_kses( __( '<br />Put you Mailchimp for WP Shortcode here','marblex-core' ), array( 'br' => array() ) ),
            'required'  => array( 'footer_subscribe', '=', 'yes' ),
        ),
    )) 
);