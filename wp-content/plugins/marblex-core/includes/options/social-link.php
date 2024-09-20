<?php
/*
 * Footer Options
 */


Redux::setSection( $options, array(
    'title'      => esc_html__( 'Social link', 'marblex-core' ),
    'id'         => 'social_section',
    'icon'       => ' eicon-social-icons',    
    'fields'     => array(

                    array(
                        'id'       => 'social',
                        'type'     => 'sortable',
                        'title'    => __('Social Share icons', 'marblex-core'),
                        
                        
                        'mode'     => 'text',
                        'label' => true,
                        'options' => array(
                             'fa-facebook-f' => '',
                             'fa-instagram' => '',
                             'fa-skype' => '',
                             'fa-twitter' => '',
                        ),
                    ),

                    array(
                        'id'       => 'footer_social',
                        'type'     => 'sortable',
                        'title'    => __('Social Link icons For Footer', 'marblex-core'),
                       
                        'mode'     => 'text',
                        'label' => true,
                        'options' => array(
                             'fa-facebook-f' => '',
                             'fa-instagram' => '',
                             'fa-skype' => '',
                             'fa-twitter' => '',
                        ),
                    ),

                    )
));
