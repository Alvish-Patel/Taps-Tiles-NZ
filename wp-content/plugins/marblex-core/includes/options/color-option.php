<?php
/*
 * Color Options
 */
Redux::setSection( $options, array(
    'title' => esc_html__('Color Option','marblex-core'),
    'id'    => 'color-section',
    

    'fields'=> array(

        array(
            'id' => 'info_N7VD05',
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('This section contains options for site colors', 'marblex-core') ,
        ) ,

        array(
            'id' => 'indent_N7VDM0M',
            'type' => 'section',
            'indent' => true
        ) ,

     
    

        array(
            'id'        => 'pt_custom_color',
            'type'      => 'button_set',
            'title'     => esc_html__( 'Use Custom Color','marblex-core'),
            
            'options'   => array(
                            'yes' => esc_html__('Yes','marblex-core'),
                            'no' => esc_html__('No','marblex-core')
                        ),
            'default'   => esc_html__('no','marblex-core')
        ),
        
       
        
        array(
            'id' => 'pt_primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'marblex-core') ,         
            'subtitle' => esc_html__('Replace With Your Color', 'marblex-core') ,       
            'mode' => 'background',
            'required' => array(
                'pt_custom_color',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,
        array(
            'id' => 'pt_secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'marblex-core') ,         
            'subtitle' => esc_html__('Replace With Your Color', 'marblex-core') ,       
            'mode' => 'background',
            'required' => array(
                'pt_custom_color',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,

        array(
            'id' => 'pt_dark_color',
            'type' => 'color',
            'title' => esc_html__('Dark Color', 'marblex-core') ,         
            'subtitle' => esc_html__('Replace With Your Color', 'marblex-core') ,       
            'mode' => 'background',
            'required' => array(
                'pt_custom_color',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,

        array(
            'id' => 'pt_grey_color',
            'type' => 'color',
            'title' => esc_html__('Gray Color', 'marblex-core') ,        
            'subtitle' => esc_html__('Replace With Your Color', 'marblex-core') ,       
            'mode' => 'background',
            'required' => array(
                'pt_custom_color',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,

        array(
            'id' => 'pt_white_color',
            'type' => 'color',
            'title' => esc_html__('White Color', 'marblex-core') ,
            'subtitle' => esc_html__('Replace With Your Color', 'marblex-core') ,       
            
            'mode' => 'background',
            'required' => array(
                'pt_custom_color',
                '=',
                'yes'
            ) ,
            'transparent' => false
        ) ,
    )
));