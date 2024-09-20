<?php 
/**
	Custom Color
**/
add_action( 'wp_head', 'marblex_color_style'); 
function marblex_color_style()
{
	$pqf_options = get_option('pqf_options'); 
	$style = '';
	if(isset($pqf_options['pt_custom_color']) && $pqf_options['pt_custom_color'] == 'yes')
	{
		$style .= ':root {';
		if(!empty($pqf_options['pt_primary_color']))
		{
			$style .= '--primary-color: '.$pqf_options['pt_primary_color'].' !important;';
		}
		if(!empty($pqf_options['pt_secondary_color']))
		{
			$style .= '--secondary-color: '.$pqf_options['pt_secondary_color'].' !important;';
		}
		if(!empty($pqf_options['pt_dark_color']))
		{
			$style .= '--dark-color: '.$pqf_options['pt_dark_color'].' !important;';
		}
		if(!empty($pqf_options['pt_grey_color']))
		{
			$style .= '--grey-color: '.$pqf_options['pt_grey_color'].' !important;';
		}
		if(!empty($pqf_options['pt_white_color']))
		{
			$style .= '--white-color: '.$pqf_options['pt_white_color'].' !important;';
		}
		$style .= '}';

		wp_register_style( 'pt-color-style', false );
		wp_enqueue_style( 'pt-color-style' );

		wp_add_inline_style( 'pt-color-style', $style );
	}
}
?>