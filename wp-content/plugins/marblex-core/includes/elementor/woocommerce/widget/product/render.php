<?php
namespace Elementor;

use Elementor\Plugin;
if ( ! defined( 'ABSPATH' ) ) exit;  
	
	$settings = $this->get_settings();
	$category = '';
	$tag = '';
	if(!empty($settings['pt_woo_category']))
	{
		foreach ( $settings['pt_woo_category'] as $element ) {
			$category .= $element .",";
		}

	  $category = "category=" . '"' . rtrim($category,",") .'"';
	  

	}

	if(!empty($settings['pt_woo_tag']))
	{
		foreach ( $settings['pt_woo_tag'] as $element ) {
			$tag .= $element .",";
		}

	  $tag = "tag=" . '"' . rtrim($tag,",") .'"';
	  

	}

	if($settings['pt_show_pagination'] == 'yes')
	{
		$pagination = 'paginate="true"';
	}
	else
	{
		$pagination = 'paginate="false"';	
	}

	if($settings['pt_pt_woo_order_by'] !== 'none')
	{
		$orderby= 'orderby ="'.$settings['pt_pt_woo_order_by'].'"';
	}
	else
	{
		$orderby = '';	
	}

	if(!empty($settings['pt_cat_operator']))
	{
		$cat_operator= 'cat_operator="'.$settings['pt_cat_operator'].'"';
	}
	else
	{
		$cat_operator = '';	
	}

	if(!empty($settings['pt_tag_operator']))
	{
		$tag_operator= 'tag_operator="'.$settings['pt_tag_operator'].'"';
	}
	else
	{
		$tag_operator = '';	
	}


	echo do_shortcode( '['.$settings['pt_product_type'].' per_page="'.$settings['pt_woo_per_page'].'" columns="'.$settings['pt_woo_column'].'" '.$category.' order="'.$settings['pt_woo_order'].'" '.$pagination.' '.$orderby.' '.$cat_operator.' '.$tag.' '.$tag_operator.']' );
?>
    