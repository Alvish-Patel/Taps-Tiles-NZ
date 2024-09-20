<?php
namespace Marblex\Elementor_widgets; 

class Custom_Post_Data
{
	public function get_custom_post($post_type = '' , $return = '')
	{
		$array = array();
		global $post;
		$args = array(
			'post_type'         => $post_type,
			'post_status'       => 'publish',
			'posts_per_page' => 100
		);
		$wp_query = new \WP_Query($args);
		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				if ($return == 'id') {
					$array[get_the_ID()] = get_the_title();
				}
				else if ($return == 'slug') {
					$array[$post->post_name] = get_the_title();
				}
			}
		}
		return $array;
	}
	
	public function get_taxonony($taxonony = '')
	{
		if (empty($taxonony)) {
			return;
		}
	    $show_count = 0; // 1 for yes, 0 for no
	    $pad_counts = 0; // 1 for yes, 0 for no
	    $hierarchical = 1; // 1 for yes, 0 for no
	    $title = '';
	    $empty = 0;
	    $array = array();
	    $args = array(
	    	'taxonomy' => $taxonony,
	    	'show_count' => $show_count,
	    	'pad_counts' => $pad_counts,
	    	'hierarchical' => $hierarchical,
	    	'hide_empty' => false,
	    	'parent' => 0
	    );
	    $wp_object =  get_categories($args);
	    $array[0] = 'select taxonomy';
	    if (!empty($wp_object)) {
	    	foreach ($wp_object as $val) {
	    		
	    		$array[$val->term_id] = $val->name;
	    	}
	    }
	    return $array;
	}
	public function build_args( $post_type = '' , $settings = array() , $taxos = array())
	{
		$tax_query = array();
   
   		$taxargs = array();
		$args = array(
	       'post_type'         => $post_type,
	       'post_status'       => 'publish', 
   		);
   		if(!empty($settings['post_ids']))
   		{
   			$args['post__in'] = $settings['post_ids'];	
   		}
   		if(!empty($settings['posts_per_page']))
   		{
   			$args['posts_per_page'] = $settings['posts_per_page'];	
   		}
   		if(!empty($settings['order']))
   		{
   			$args['order'] = $settings['order'];	
   		}
   		if(!empty($taxos))
   		{
   			foreach($taxos as $key=>$val)
   			{
   			if(!empty($settings[$key]))
   			{
			   $tax_query['taxonomy'] = $val;
		       $tax_query['field'] = 'term_id';
		       $tax_query['terms'] = $settings[$key];
		       $tax_query['operator'] = 'IN';
		       array_push($taxargs, $tax_query);
   			}	
   			}
	   		if(!empty($tax_query))
	   		{
		       $args['tax_query'] = $taxargs;
		       $args['tax_query']['relation'] = 'AND';
	   		}
   		}
   		if(!empty($settings['meta_filter']))
   		{
   			if($settings['meta_filter'] == 'liked')
   			{
   				$args['meta_key'] = '_post_like_count'; 
     			$args['orderby'] = 'meta_value_num';
     			$args['order'] = 'DESC';	
   			}

   			if($settings['meta_filter'] == 'view')
   			{
   				$args['meta_key'] = 'post_views_count'; 
     			$args['orderby'] = 'meta_value_num';
     			$args['order'] = 'DESC';	
   			}
   			
   		}
   		return $args;
   		
	}

	public function get_layout_controls($obj)
	{
		$obj->add_control(
			'layout',
			[
				'label' => __( 'Grid', 'marblex-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'multiple' => false,
				'default' => '3',
				'options' => [
					'1'  => __( 'One Column', 'marblex-core' ),
					'2'  => __( 'Two Column', 'marblex-core' ),
					'3'  => __( 'Three Column', 'marblex-core' ),
					'4'  => __( 'Four Column', 'marblex-core' ),
					
				],
				'condition' => ['layout_style' => ['grid']]	
							
			]
		);

		
		$obj->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'marblex-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				
				'step' => 1,
				'default' => 10,
			]
		);

		$obj->add_control(
			'order',
			[
				'label' => __( 'Order', 'marblex-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'multiple' => false,
				'default' => 'inherit',
				'options' => [
					'DESC' => 'DESC',
            		'ASC' => 'ASC',
				],
				
							
			]
		);

		$obj->add_control(
			'meta_filter',
			[
				'label' => __( 'Filter', 'marblex-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'multiple' => false,
				'default' => '',
				'options' => [
					'none' => 'none',
					'liked' => 'Most Liked',
            		'view' => 'Most Viewed',
				],
				
							
			]
		);

	}

	

	

	public function pagination( $wp_query )
	{
		  global $paged;
		  if (empty($paged)) 
		  {
		  	$paged = 1;
		  }

		
		   $pagination_args = array(
		    //'base'            => get_pagenum_link(1) . '%_%',
		    'format'      => '?paged=%#%',
		    'total'           => $wp_query->max_num_pages,
		    'current'         => $paged,
		    'show_all'        => False,
		    'end_size'        => 1,
		    'mid_size'        => 2,
		    'prev_next'       => True,
		    'prev_text'       =>  esc_html__( 'Previous page', 'marblex-core' ),
		    'next_text'       => esc_html__( 'Next page', 'marblex-core' ),
		    'type'            => 'list',
		    'add_args'        => false,
		    'add_fragment'    => ''
    		);    
   			$paginate_links = paginate_links($pagination_args);

   			if ($paginate_links) {
  
		        echo '<div class="col-lg-12 col-md-12">
						<div class="pt-pagination">				
							<nav aria-label="Page navigation">';
							printf( esc_html__('%s','marblex'),$paginate_links);
							echo '</nav>
						</div>
					</div>';
    		}
	}
}
