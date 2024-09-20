<?php
/*
 * Footer Options
 */
Redux::setSection( $options, array(
    'title'      => esc_html__( 'Contact', 'marblex-core' ),
    'id'         => 'contact_section',
    'icon'       => 'el el-address-book',    
    'fields'     => array(
       
        array(
            'id'        => 'phone',
            'type'      => 'text',
            'title'     => esc_html__( 'Contact Number','marblex-core'),
            
            
        ),
         array(
            'id'        => 'email',
            'type'      => 'text',
            'title'     => esc_html__( 'Email','marblex-core'),
            
            
        ),
           array(
            'id'        => 'time',
            'type'      => 'text',
            'title'     => esc_html__( 'Time','intexure-core'),
            
        ),
        array(
            'id'        => 'address',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Address','marblex-core'),
            
        ),
        
       
       
    )
));