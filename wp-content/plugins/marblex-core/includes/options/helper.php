<?php 
function marblex_core_get_layout_options($name = '' , $type ='' , $title ='' , $subtitle = '')
{
	if($type == 'column')
	{
      return array(
        'id'        => $name.'_layout',
        'type'      => 'select',
        'title'     => esc_html__( $title ,'marblex-core' ),
        'subtitle'  => wp_kses( __( $subtitle ,'marblex-core' ), array( 'br' => array() ) ),
        'options'   => array(
            'one-column'    => esc_html__('One Columns','marblex-core' ),
            'two-column'    => esc_html__('Two Columns','marblex-core' ),
            'three-column'  => esc_html__('Three Columns','marblex-core' ),
            'four-column'   => esc_html__('Four Columns','marblex-core' ),
        ),
        'default'   => 'one-column',
    );
  }
  if($type == 'sidebar')
  {
   return array(
    'id'        => $name.'_sidebar',
    'type'      => 'select',
    'title'     => esc_html__( $title ,'marblex-core' ),
    'subtitle'  => esc_html__( $subtitle,'marblex-core' ),
    'options'   => array(
        'no_sidebar'     =>  esc_html__( 'No Sidebar','marblex-core' ),  
        'left_sidebar'   =>  esc_html__( 'Left Sidebar','marblex-core' ),  
        'right_sidebar'  =>  esc_html__( 'Right Sidebar','marblex-core' ),  
    ),
    'default'   => 'right_sidebar',
);
}
}
