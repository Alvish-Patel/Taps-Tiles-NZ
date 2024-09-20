<?php
if (function_exists('acf_add_local_field_group')):
    // Page Options
    acf_add_local_field_group(array(
        'key' => 'group_46Cg7N74rVLFfR6',
        'title' => 'Advance Options',
        'fields' => array(
            array(
                'key' => 'field_7a2p3jB7c4cciu',
                'label' => 'Header Options',
                'name' => 'tab_VLFfR6',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'placement' => 'left',
                'endpoint' => 0,
            ) ,
           
            
             array(
                'key' => 'field_QnF1Eb565',
                'label' => 'Hide Header',
                'name' => 'hide_header',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'choices' => array(
                            'inherit' => 'inherit',
                            'yes' => 'yes',
                            'no' => 'no',                            
                        ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'message' => '',
                'default_value' => 'inherit',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ) ,


             array(
                'key' => 'field_QnF1Eb',
                'label' => 'Set Seprate Header',
                'name' => 'set_sep_header',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_QnF1Eb565',
                            'operator' => '==',
                            'value' => 'no',
                        ) ,
                    ) ,
                ) ,
                'choices' => array(

                    'yes' => 'yes',
                    'no' => 'no',
                ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'message' => '',
                'default_value' => 'no',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ) ,

             array(
                'key' => 'key_pjros',
                'label' => 'Header Layout',
                'name' => 'header_layout',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_QnF1Eb',
                            'operator' => '==',
                            'value' => 'yes',
                        ) ,
                    ) ,
                ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_ATaJj057m',
                        'label' => 'Header Options',
                        'name' => 'header_options',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,

                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ) ,
                        'choices' => [
                            'default' => 'default',
                            'style-one' => 'Style One',
                            'style-two' => 'Style Two',
                            'style-three' => 'Style Three',
                            'style-four' => 'Style Four',
                        ],

                        'allow_null' => 0,
                        'default_value' => 'default',
                        'layout' => 'vertical',
                        'return_format' => 'value',
                    ) ,

                ) ,
            ) ,
            array(
                'key' => 'key_pjos',
                'label' => 'Logo option',
                'name' => 'logo_option',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_QnF1Eb',
                            'operator' => '==',
                            'value' => 'yes',
                        ) ,
                    ) ,
                ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'layout' => 'table',
                'sub_fields' => array(               
                   array(
                    'key' => 'field_QnF1b',
                    'label' => 'Set Seprate Logo',
                    'name' => 'set_sep_logo',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ) ,
                    'message' => '',
                    'default_value' => 'no',
                    'ui' => 1,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ) ,
                   array(
                    'key' => 'field_5d6d06',
                    'label' => 'Logo Image',
                    'name' => 'logo_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_QnF1b',
                                'operator' => '==',
                                'value' => '1',
                            ) ,
                        ) ,
                    ) ,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),

               ) ,
            ) , 

              // top header 
            array(
                'key' => 'field_QnF1Ebs',
                'label' => 'Set Top Header',
                'name' => 'set_top_header',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'choices' => array(

                            'inherit' => 'inherit',
                            'yes' => 'yes',
                            'no' => 'no',
                        ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'message' => '',
                'default_value' => 'no',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ) ,

             array(
                'key' => 'key_pjroswaser',
                'label' => 'Top Header style',
                'name' => 'top_header_style',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_QnF1Ebs',
                            'operator' => '==',
                            'value' => 'yes',
                        ) ,
                    ) ,
                ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'fisdffsdfa245ed',
                        'label' => 'select style ',
                        'name' => 'top_header_select_style',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,

                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ) ,
                        'choices' => array(
                            'top' => 'Default',
                            'top-one' => 'Style One',
                        ) ,

                        'allow_null' => 0,
                        'default_value' => '',
                        'layout' => 'vertical',
                        'return_format' => 'value',
                    ) ,
                ) ,
            ),
            
            
            array(
                'key' => 'key_pjroswas',
                'label' => 'Top Header Layout',
                'name' => 'top_header_layout',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
               'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_QnF1Ebs',
                            'operator' => '==',
                            'value' => 'yes',
                        ) ,
                    ) ,
                ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'fisdffsdfa245',
                        'label' => 'top Header Options',
                        'name' => 'top_header_options',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,

                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ) ,
                        'choices' => array(
                            'social-left' => 'social-left',
                            'social-right' => 'social-right',
                        ) ,

                        'allow_null' => 0,
                        'default_value' => '',
                        'layout' => 'vertical',
                        'return_format' => 'value',
                    ) ,
                ) ,
            ),

            // end top header


             array(
                'key' => 'field_7a2p3jB7c4iu',
                'label' => 'Banner Options',
                'name' => 'tab_VLFf45R6',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'placement' => 'left',
                'endpoint' => 0,
            ) ,

            array(
                'key' => 'field_QnFE45b565',
                'label' => 'Hide Banner',
                'name' => 'hide_banner',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'choices' => array(
                            'inherit' => 'inherit',
                            'yes' => 'yes',
                            'no' => 'no',                            
                        ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'message' => '',
                'default_value' => 'inherit',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ) ,
            array(
                'key' => 'field_QnF23',
                'label' => 'Content Padding',
                'name' => 'site_padding',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'choices' => array(


                    'yes' => 'yes',
                    'no' => 'no',
                ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'message' => '',
                'default_value' => 'inherit',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ) ,

            array(
                'key' => 'field_7a2p3jB7c456iu',
                'label' => 'Footer Options',
                'name' => 'tab_VLFf45R655',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'placement' => 'left',
                'endpoint' => 0,
            ) ,

             array(
                'key' => 'field_QnFEb565',
                'label' => 'Hide Footer',
                'name' => 'hide_footer',
                'type' => 'button_group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'choices' => array(
                            'inherit' => 'inherit',
                            'yes' => 'yes',
                            'no' => 'no',                            
                        ) ,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ) ,
                'message' => '',
                'default_value' => 'inherit',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ) ,
          

            

            
        ) ,
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ) ,
            ) ,

            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ) ,
            ) ,

             array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'room',
                ) ,
            ) ,
          
          
        ) ,
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
endif;
