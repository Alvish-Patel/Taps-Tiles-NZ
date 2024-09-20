<?php
/*
 * Banner Options
 */

Redux::setSection( $options, array(
    'title' => esc_html__('Shop','marblex-core'),
    'id'    => 'section_c930',
    'icon'  => 'eicon-products',
    'desc'  => esc_html__('Section For Customize Shop page.','marblex-core'),
    'fields'=> array(

        array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),

            'title' => __('Shop Page', 'marblex-core') ,
        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,




        array(
            'id'        => 'shop_column_num',
            'type'      => 'select',
            'title'     => esc_html__( 'Shop page Setting','marblex-core' ),
            'subtitle'  => wp_kses( __( '<br />Choose among these structures (Right Sidebar, Left Sidebar, 1column, 2column and 3column) for your blog section.<br />To filling these column sections you should go to appearance > widget.<br />And put every widget that you want in these sections.','marblex-core' ), array( 'br' => array() ) ),
            'options'   => array(
                '1' => esc_html__( 'Style One','marblex-core' ),
                '2' => esc_html__( 'Style Two','marblex-core' ),
                '3' => esc_html__( 'Style three','marblex-core' ),
                '4' => esc_html__( 'Style four','marblex-core' ),
                '5' => esc_html__( 'Style five','marblex-core' ),
                '6' => esc_html__( 'Style six','marblex-core' ),



            ),
            'default'   => 'Style three',
        ),


        array(
            'id' => 'info_general'.rand(10,1000),
            'type' => 'info',
            'style' => 'custom',
            'color' => sanitize_hex_color($color),
            'title' => __('Shop Page Sidebar Options', 'marblex-core') ,
        ) ,

        array(
            'id' => 'section-general'.rand(10,1000),
            'type' => 'section',
            'indent' => true
        ) ,
        array(
            'id'        => 'pt_shop_siderbar',
            'type'      => 'select',
            'title'     => esc_html__( 'Shop Page Sidebar Setting','marblex-core' ),


            'options'   => array(
                'no_sidebar' => esc_html__( 'no sidebar','marblex-core' ),
                'left_sidebar' => esc_html__( 'left sidebar','marblex-core' ),
                'right_sidebar' => esc_html__( 'right_sidebar','marblex-core' ),
            ),
            'default'   => 'left sidebar',
        ),
    )

));
?>