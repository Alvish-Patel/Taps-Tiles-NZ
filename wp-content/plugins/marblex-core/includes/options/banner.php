<?php
/*
 * Banner Options
 */

Redux::setSection( $options, array(
    'title' => esc_html__('Banner','marblex-core'),
    'id'    => 'section_c93098b',
    'icon'  => 'eicon-banner',
    'desc'  => esc_html__('Section For Customize Breadcrumbs.','marblex-core'),
    'fields'=> array(

       array(
            'id' => 'info_c93098b',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Banner Layout Options', 'marblex-core') ,
        ) ,
        array(
            'id' => 'indent_c8138f9',
            'type' => 'section',
            'indent' => true        ) ,

     
        array(
            'id'        => 'enable_banner',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Enable Banner','marblex-core'),
            'options'   => array(
                            'yes' => esc_html__('Yes','marblex-core'),
                            'no' => esc_html__('No','marblex-core')
                        ),
            'default'   => esc_html__('yes','marblex-core')
        ),

        array(
            'id'        => 'display_breadcrumbs',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Breadcrumbs on Banner','marblex-core'),
            'options'   => array(
                            'yes' => esc_html__('Yes','marblex-core'),
                            'no' => esc_html__('No','marblex-core')
                        ),
            'required'  => array( 'enable_banner', '=', 'yes' ),
         
                'default'   => esc_html__('yes','marblex-core')
        ),

        array(
            'id'        => 'display_title',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Display Title on Banner','marblex-core'),
            'options'   => array(
                            'yes' => esc_html__('Yes','marblex-core'),
                            'no' => esc_html__('No','marblex-core')
                        ),
            'required'  => array( 'enable_banner', '=', 'yes' ),
         
            'default'   => esc_html__('yes','marblex-core')
        ),

        array(
            'id'            => 'breadcrumbs_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Breadcrumb Color', 'marblex-core' ),
           
            'mode'          => 'background',
            'required'  => array( 'enable_banner', '=', 'yes' ),
            'transparent'   => false
        ),

         array(
            'id'            => 'breadcrumbs_hover_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Breadcrumb Hover Color', 'marblex-core' ),
           
            'mode'          => 'background',
            'required'  => array( 'enable_banner', '=', 'yes' ),
            'transparent'   => false
        ),

         array(
            'id'            => 'breadcrumbs_active_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Breadcrumb Active Color', 'marblex-core' ),
           
            'mode'          => 'background',
            'required'  => array( 'enable_banner', '=', 'yes' ),
            'transparent'   => false
        ),

           array(
            'id'            => 'breadcrumbs_indicator_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Indicator Icon Color', 'marblex-core' ),
           
            'mode'          => 'color',
            'required'  => array( 'enable_banner', '=', 'yes' ),
            'transparent'   => false
        ),
        array(
            'id'            => 'title_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Title Color', 'marblex-core' ),
           
            'mode'          => 'background',
            'required'  => array( 'enable_banner', '=', 'yes' ),
            'transparent'   => false
        ),

        array(
            'id'       => 'banner_back_type',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Banner Background Type', 'marblex-core' ),
            
            'options'  => array(
                'color' => 'Color',
                'image' => 'Image',
                
            ),
            'default'  => 'color',
            'required'  => array( 'enable_banner', '=', 'yes' ),
        ),

        array(
            'id'       => 'banner_image',         
            'type'     => 'media',
            'url'      => false,
            'title'    => esc_html__( 'Banner Background Image','marblex-core'),
            'read-only'=> false,
            'required'  => array( 'banner_back_type', '=', 'image' ),
            'subtitle' => esc_html__( 'Upload Image for your body.','marblex-core'),
            
            
        ), 

        array(
            'id'            => 'banner_back_color',
            'type'          => 'color',
            'title'         => esc_html__( 'Set Background Color', 'marblex-core' ),
            'subtitle'      => esc_html__( 'Choose Background Color', 'marblex-core' ),
            'required'  => array( 'banner_back_type', '=', 'color' ),
            'mode'          => 'background',
            'transparent'   => false,
           
        ),        

    )
)); 
?>