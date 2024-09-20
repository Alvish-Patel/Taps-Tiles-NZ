<?php
/*
 * Archive Page Options
*/

// archive Page Settings
Redux::setSection( $options, array(
    'title' => esc_html__('Archive Page Settings','marblex-core'),
    'id'    => 'section_0becesba',
    'subsection' => true,
    'desc'  => esc_html__('This section contains options for Pages.','marblex-core'),
    'fields'=> array(

        array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Archive Page Column Option', 'marblex-core') ,

        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,

        marblex_core_get_layout_options( 'archive_blog' , 'column' , ''),

         array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Archive Page Sidebar Options', 'marblex-core') ,

        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,

        marblex_core_get_layout_options( 'archive_blog' , 'sidebar' , '' ),


    )
    ));
