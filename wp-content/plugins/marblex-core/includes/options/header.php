<?php
/*
* Header Options
*/

Redux::setSection($options, array(
    'title' => esc_html__('Header', 'marblex-core') ,
    'id' => 'section_230ac35',
    'icon' => 'eicon-header',
    'customizer_width' => '500px',
));

Redux::setSection($options, array(
    'title' => esc_html__('Layout', 'marblex-core') ,
    'id' => 'section_09d4601',
    'subsection' => true,
    'desc' => esc_html__('Section For Customize Header', 'marblex-core') ,
    'fields' => array(

        array(
            'id' => 'info__09d4601',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Header Layout Options', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_09d4601',
            'type' => 'section',
            'indent' => true
        ) ,
        array(
            'id'        => 'pt_header_layout',
            'type'      => 'select',
            'title'     => esc_html__( 'Header Layout','marblex-core' ),
            'options'   => array(
                'default' => esc_html__( 'Default','marblex-core' ),
                'style-one' => esc_html__( 'Style One','marblex-core' ),
                'style-two' => esc_html__( 'Style Two','marblex-core' ),
                'style-three' => esc_html__( 'Style Three','marblex-core' ),
                'style-four' => esc_html__( 'Style Four','marblex-core' ),
            ),
            'default'   => 'default',
        ),

        array(
            'id' => 'header_action_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Action Button', 'marblex-core') ,

            'options' => array(
                'yes' => esc_html__('Yes', 'marblex-core') ,
                'no' => esc_html__('No', 'marblex-core')

            ) ,
            'default' => esc_html__('no', 'marblex-core'),
            'required' => array('pt_header_layout', '=', array('default','style-three' ) ) ,
        ) ,

         array(
            'id' => 'action_btn_text',
            'type' => 'text',
            'title' => esc_html__('Action Button Text', 'marblex-core') ,
            'required' => array('header_action_enable', '=', array('yes' ) ) ,

        ) ,

        array(
            'id' => 'action_btn_url',
            'type' => 'text',
            'title' => esc_html__('Action Button Url', 'marblex-core') ,
            'required' => array('header_action_enable', '=', array('yes' ) ) ,

        ) ,

        array(
            'id' => 'action_back_color',
            'type' => 'color',
            'title' => esc_html__('Action Button Background', 'marblex') ,

            'mode' => 'background',
            'required' => array(
                'header_action_enable',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,
          array(
            'id' => 'action_back_hover_color',
            'type' => 'color',
            'title' => esc_html__('Action Button Hover Background', 'marblex') ,

            'mode' => 'background',
            'required' => array(
                'header_action_enable',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,

         array(
            'id' => 'action_text_color',
            'type' => 'color',
            'title' => esc_html__('Action Button Text', 'marblex') ,

            'mode' => 'background',
            'required' => array(
                'header_action_enable',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,
            array(
            'id' => 'action_text_hover_color',
            'type' => 'color',
            'title' => esc_html__('Action Button Text Hover', 'marblex') ,

            'mode' => 'background',
            'required' => array(
                'header_action_enable',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,

        array(
            'id' => 'header_search_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Search Button', 'marblex-core') ,

            'options' => array(
                'yes' => esc_html__('Yes', 'marblex-core') ,
                'no' => esc_html__('No', 'marblex-core')

            ) ,
            'default' => esc_html__('yes', 'marblex-core'),
            'required' => array('pt_header_layout', '=', array('style-one','style-two','style-four' )  ) ,
        ) ,
         array(
            'id' => 'header_cart_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Cart Button', 'marblex-core') ,

            'options' => array(
                'yes' => esc_html__('Yes', 'marblex-core') ,
                'no' => esc_html__('No', 'marblex-core')

            ) ,
            'default' => esc_html__('yes', 'marblex-core'),
            'required' => array('pt_header_layout', '=', array('style-one','style-two','style-four' )  ) ,
           
        ) ,

         array(
            'id' => 'header_sidebar_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Siderbar', 'marblex-core') ,

            'options' => array(
                'yes' => esc_html__('Yes', 'marblex-core') ,
                'no' => esc_html__('No', 'marblex-core')

            ) ,
            'default' => esc_html__('yes', 'marblex-core'),
             'required' => array('pt_header_layout', '=', array('style-one','style-two','style-four' )  ) ,
            
        ) ,
        array(
            'id' => 'sidebar_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Image', 'marblex-core') ,
            'read-only' => false,
            'required' => array(
                'header_sidebar_enable',
                '=',
                'yes'
            ) ,
        ) ,

        array(
            'id' => 'sidebar_logo_dimenation',
            'type' => 'dimensions',
            'units' => array(
                'em',
                'px',
                '%'
            ) , // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true', // Allow users to select any type of unit
            'title' => esc_html__('Sidebar Logo (Width/Height) Option', 'marblex-core') ,
            'required' => array(
                'header_sidebar_enable',
                '=',
                'yes'
            ) ,

            ) ,

        array(
            'id'        => 'sidebar_desc',
            'type'      => 'textarea',
            'title'    => __('Enter Description', 'marblex-core'),
            'desc' => esc_html__('Enter Text', 'marblex-core') ,
            'required' => array(
                'header_sidebar_enable',
                '=',
                'yes'
            ) ,
        ),


        array(
            'id' => 'header_back_opt_switch',
            'type' => 'button_set',
            'title' => esc_html__('Background', 'marblex-core') ,

            'options' => array(
                'none' => esc_html__('none', 'marblex-core') ,
                'image' => esc_html__('Image', 'marblex-core') ,
                'color' => esc_html__('Color', 'marblex-core'),
                'transparent' => esc_html__('Transparent', 'marblex-core'),
                'dark' => esc_html__('Dark', 'marblex-core'),
                'white' => esc_html__('White', 'marblex-core')
            ) ,
            'default' => esc_html__('none', 'marblex-core')
        ) ,
        array(
            'id' => 'header_back_img',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Image', 'marblex-core') ,
            'read-only' => false,
            'required' => array(
                'header_back_opt_switch',
                '=',
                'image'
            ) ,
        ) ,        

        array(
            'id' => 'header_back_color',
            'type' => 'color',
            'title' => esc_html__('Color', 'marblex-core') ,         

            'mode' => 'background',
            'required' => array(
                'header_back_opt_switch',
                '=',
                'color'
            ) ,
            'transparent' => false
        ) ,
        array(
            'id' => 'info__09d461',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Header Menu Color Options', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_09d601',
            'type' => 'section',
            'indent' => true
        ) ,
        array(
            'id' => 'menu_normal_color',
            'type' => 'color',
            'title' => esc_html__('Normal Color', 'marblex-core') ,         

            'mode' => 'background',

            'transparent' => false
        ) ,
        array(
            'id' => 'menu_hover_color',
            'type' => 'color',
            'title' => esc_html__('Hover Color', 'marblex-core') ,         

            'mode' => 'background',

            'transparent' => false
        ) ,

        array(
            'id' => 'menu_active_color',
            'type' => 'color',
            'title' => esc_html__('Active Color', 'marblex-core') ,         

            'mode' => 'background',

            'transparent' => false
        ) ,

        array(
            'id' => 'info__09d61',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Header Sub Menu Color Options', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_09d01',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'sub_menu_normal_color',
            'type' => 'color',
            'title' => esc_html__('Normal Color', 'marblex-core') ,         

            'mode' => 'background',

            'transparent' => false
        ) ,
        array(
            'id' => 'sub_menu_hover_color',
            'type' => 'color',
            'title' => esc_html__('Hover Color', 'marblex-core') ,         

            'mode' => 'background',

            'transparent' => false
        ) ,

        array(
            'id' => 'sub_menu_active_color',
            'type' => 'color',
            'title' => esc_html__('Active Color', 'marblex-core') ,         

            'mode' => 'background',

            'transparent' => false
        ) ,

        array(
            'id' => 'sub_menu_background_color',
            'type' => 'color',
            'title' => esc_html__('Background Color', 'marblex-core') ,         

            'mode' => 'background',

            'transparent' => false
        ) ,

        array(
            'id' => 'sub_menu_background_hover_color',
            'type' => 'color',
            'title' => esc_html__('Background Hover Color', 'marblex-core') ,        

            'mode' => 'background',            
            'transparent' => false
        ) ,

        array(
            'id' => 'sub_menu_background_active_color',
            'type' => 'color',
            'title' => esc_html__('Background Active Color', 'marblex-core') ,        

            'mode' => 'background',            
            'transparent' => false
        ) ,

    )
));

Redux::setSection($options, array(
    'title' => esc_html__('Top Header', 'marblex-core') ,
    'id' => 'section_05b1956',
    'subsection' => true,
    'desc' => esc_html__('Section For Customize Top header.', 'marblex-core') ,
    'fields' => array(
        array(
            'id' => 'info__05b1956',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Top Header Setting', 'marblex-core') ,
        ) ,
        array(
            'id' => 'section_1b5c143',
            'type' => 'section',
            'indent' => true
        ) ,
        array(
            'id' => 'top_header_enable',
            'type' => 'button_set',
            'title' => esc_html__('Enable Top Header', 'marblex-core') ,
            'options' => array(
                'yes' => esc_html__('Yes', 'marblex-core') ,
                'no' => esc_html__('No', 'marblex-core')
            ) ,
            'default' => esc_html__('no', 'marblex-core')
        ) ,
        array(
            'id'        => 'pt_top_header_style',
            'type'      => 'select',
            'title'     => esc_html__( 'Top Header style','marblex-core' ),
            'options'   => array(
                'top' => esc_html__( 'Default','marblex-core' ),
                'top-one' => esc_html__( 'Style one','marblex-core' ),
            ),
            'default'   => 'top',
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ),
        
        array(
            'id'        => 'pt_top_header_layout',
            'type'      => 'select',
            'title'     => esc_html__( 'Top Header Layout','marblex-core' ),
            'options'   => array(
                'social-right' => esc_html__( 'Social Right','marblex-core' ),
                'social-left' => esc_html__( 'Social Left','marblex-core' ),
            ),
            'default'   => 'social-right',
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ),
        array(
            'id' => 'top_header_text',
            'type' => 'text',
            'title' => esc_html__('Action Text', 'marblex-core') ,
            'required' => array(
                'pt_top_header_layout',
                '=',
                'social-style-two'
            ) ,
        ) ,
        array(
            'id'       => 'social_switch',
            'type'     => 'switch',
            'title'    => __('Display Social Media In Header', 'marblex-core'),
            'default'  => true,
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ),
        array(
            'id'       => 'contact_switch',
            'type'     => 'switch',
            'title'    => __('Display Contact In Header', 'marblex-core'),
            'default'  => true,
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ),

        array(
            'id' => 'top_header_txt_color',
            'type' => 'color',
            'title' => esc_html__('Top Header Text Color', 'marblex-core') ,
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ) ,

        array(
            'id' => 'top_header_txt_hover_color',
            'type' => 'color',
            'title' => esc_html__('Top Header Text Hover Color', 'marblex-core') ,
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ) ,
        array(
            'id' => 'top_header_icon_color',
            'type' => 'color',
            'title' => esc_html__('Top Header Icon Color', 'marblex-core') ,
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ) ,
        array(
            'id' => 'top_header_icon_hover_color',
            'type' => 'color',
            'title' => esc_html__('Top Header Icon Hover Color', 'marblex-core') ,
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ) ,        


        array(
            'id' => 'top_header_back_type',
            'type' => 'button_set',
            'title' => esc_html__('Top Header Background Type', 'marblex-core') ,
            'options' => array(
                'none' => esc_html__('none','marblex-core'),
                'image' => esc_html__('Image', 'marblex-core') ,
                'color' => esc_html__('color', 'marblex-core'),
                'transparent' => esc_html__('Transparent', 'marblex-core'),
                'dark' => esc_html__('Dark', 'marblex-core'),
                'white' => esc_html__('White', 'marblex-core')
            ) ,
            'default' => esc_html__('none', 'marblex-core'),
            'required' => array(
                'top_header_enable',
                '=',
                'yes'
            ) ,
        ) ,
        array(
            'id' => 'top_header_bck_color',
            'type' => 'color',
            'title' => esc_html__('Top-Header Background Color', 'marblex-core') ,
            'default' => '#ffffff',
            'mode' => 'background',
            'transparent' => false,
            'required' => array(
                'top_header_back_type',
                '=',
                'color'
            ) ,
        ) ,
        array(
            'id' => 'top_header_back_image',
            'type' => 'media',
            'title' => esc_html__('Background Image', 'marblex-core') ,
            'default' => '#ffffff',
            'url'=>true,
            'required' => array(
                'top_header_back_type',
                '=',
                'image'
            ) ,
        ) ,


    )
));


//Sticky Header Options
Redux::setSection($options, array(
    'title' => esc_html__('Sticky Header', 'marblex-core') ,
    'id' => 'section_00142ab',
    'subsection' => true,
    'desc' => esc_html__('Section For Customize Stikcy header.', 'marblex-core') ,
    'fields' => array(
        

        array(
            'id' => 'indent_general_ac21601',
            'type' => 'section',
            'indent' => true
        ) ,

        array(
            'id' => 'sticky_header_enable',
            'title' => esc_html__('Enable Sticky Header', 'marblex-core') ,
            'type' => 'switch',
            'default' => true,
        ) ,
        
    )
));

?>