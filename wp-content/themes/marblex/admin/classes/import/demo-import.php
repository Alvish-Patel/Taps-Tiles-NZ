<?php
function marblex_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Main Home',
			'categories'                 => array( 'LTR' ),
			'local_import_file'            => Pcfq_Theme_Helper::pcfq_demo_file_path('xml','xml'),
			'local_import_widget_file'     => Pcfq_Theme_Helper::pcfq_demo_file_path('wie','wie'),
			'local_import_customizer_file' => Pcfq_Theme_Helper::pcfq_demo_file_path('dat','dat'),
			'local_import_redux'               => array(
				array(
					'file_path'    => Pcfq_Theme_Helper::pcfq_demo_file_path('json','json'),
					'option_name' => 'pqf_options',
				),
			),
			'import_preview_image_url'   => Pcfq_Theme_Helper::pcfq_demo_prev_img_url('prv-1','jpg'),
			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'marblex' ),
			'preview_url'                => 'https://marblex.peacefulqode.com/',
		),
		array(
			'import_file_name'           => 'Home 2',
			'categories'                 => array( 'LTR' ),
			'local_import_file'            => Pcfq_Theme_Helper::pcfq_demo_file_path('xml','xml'),
			'local_import_widget_file'     => Pcfq_Theme_Helper::pcfq_demo_file_path('wie','wie'),
			'local_import_customizer_file' => Pcfq_Theme_Helper::pcfq_demo_file_path('dat','dat'),
			'local_import_redux'               => array(
				array(
					'file_path'    => Pcfq_Theme_Helper::pcfq_demo_file_path('json','json'),
					'option_name' => 'pqf_options',
				),
			),
			'import_preview_image_url'   => Pcfq_Theme_Helper::pcfq_demo_prev_img_url('prv-2','jpg'),
			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'marblex' ),
			'preview_url'                => 'https://marblex.peacefulqode.com/home-2/',
		),
		array(
			'import_file_name'           => 'Home 3',
			'categories'                 => array( 'LTR' ),
			'local_import_file'            => Pcfq_Theme_Helper::pcfq_demo_file_path('xml','xml'),
			'local_import_widget_file'     => Pcfq_Theme_Helper::pcfq_demo_file_path('wie','wie'),
			'local_import_customizer_file' => Pcfq_Theme_Helper::pcfq_demo_file_path('dat','dat'),
			'local_import_redux'               => array(
				array(
					'file_path'    => Pcfq_Theme_Helper::pcfq_demo_file_path('json','json'),
					'option_name' => 'pqf_options',
				),
			),
			'import_preview_image_url'   => Pcfq_Theme_Helper::pcfq_demo_prev_img_url('prv-3','jpg'),
			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'marblex' ),
			'preview_url'                => 'https://marblex.peacefulqode.com/home-3/',
		),
		array(
			'import_file_name'           => 'Home 4',
			'categories'                 => array( 'LTR' ),
			'local_import_file'            => Pcfq_Theme_Helper::pcfq_demo_file_path('xml','xml'),
			'local_import_widget_file'     => Pcfq_Theme_Helper::pcfq_demo_file_path('wie','wie'),
			'local_import_customizer_file' => Pcfq_Theme_Helper::pcfq_demo_file_path('dat','dat'),
			'local_import_redux'               => array(
				array(
					'file_path'    => Pcfq_Theme_Helper::pcfq_demo_file_path('json','json'),
					'option_name' => 'pqf_options',
				),
			),
			'import_preview_image_url'   => Pcfq_Theme_Helper::pcfq_demo_prev_img_url('prv-5','jpg'),
			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'marblex' ),
			'preview_url'                => 'https://marblex.peacefulqode.com/home-4/',
		),
		array(
			'import_file_name'           => 'Home 5',
			'categories'                 => array( 'LTR' ),
			'local_import_file'            => Pcfq_Theme_Helper::pcfq_demo_file_path('xml','xml'),
			'local_import_widget_file'     => Pcfq_Theme_Helper::pcfq_demo_file_path('wie','wie'),
			'local_import_customizer_file' => Pcfq_Theme_Helper::pcfq_demo_file_path('dat','dat'),
			'local_import_redux'               => array(
				array(
					'file_path'    => Pcfq_Theme_Helper::pcfq_demo_file_path('json','json'),
					'option_name' => 'pqf_options',
				),
			),
			'import_preview_image_url'   => Pcfq_Theme_Helper::pcfq_demo_prev_img_url('prv-5','jpg'),
			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'marblex' ),
			'preview_url'                => 'https://marblex.peacefulqode.com/home-5/',
		),
		array(
			'import_file_name'           => 'Home 6',
			'categories'                 => array( 'LTR' ),
			'local_import_file'            => Pcfq_Theme_Helper::pcfq_demo_file_path('xml','xml'),
			'local_import_widget_file'     => Pcfq_Theme_Helper::pcfq_demo_file_path('wie','wie'),
			'local_import_customizer_file' => Pcfq_Theme_Helper::pcfq_demo_file_path('dat','dat'),
			'local_import_redux'               => array(
				array(
					'file_path'    => Pcfq_Theme_Helper::pcfq_demo_file_path('json','json'),
					'option_name' => 'pqf_options',
				),
			),
			'import_preview_image_url'   => Pcfq_Theme_Helper::pcfq_demo_prev_img_url('prv-6','jpg'),
			'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'marblex' ),
			'preview_url'                => 'https://marblex.peacefulqode.com/home-6/',
		),

	);
}
add_filter( 'pt-ocdi/import_files', 'marblex_ocdi_import_files' );

function marblex_ocdi_after_import( $selected_import ) {
	// Assign menus to their locations.
     $locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
    $menus = wp_get_nav_menus(); // registered menus
    $arr = json_decode(json_encode($menus), true);


	        foreach($arr as $a) { // assign menus to theme locations
	        	if( $a['name'] == 'Main Menu' ) {
	        		$locations['primary'] = $a['term_id'];

	        	}

	        }
	        set_theme_mod( 'nav_menu_locations', $locations );


	        if ( 'Main Home' === $selected_import['import_file_name'] ) {


	// Assign front page and posts page (blog page).
	        	$front_page_id = get_page_by_title( 'Main Home' );
	        	$blog_page_id  = get_page_by_title( 'blog' );

	        	update_option( 'show_on_front', 'page' );
	        	update_option( 'page_on_front', $front_page_id->ID );
	        	update_option( 'page_for_posts', $blog_page_id->ID );

	        }
	        if ( 'Home 2' === $selected_import['import_file_name'] ) {


	// Assign front page and posts page (blog page).
	        	$front_page_id = get_page_by_title( 'home -2' );
	        	$blog_page_id  = get_page_by_title( 'blog' );

	        	update_option( 'show_on_front', 'page' );
	        	update_option( 'page_on_front', $front_page_id->ID );
	        	update_option( 'page_for_posts', $blog_page_id->ID );

	        }
	        if ( 'Home 3' === $selected_import['import_file_name'] ) {


	// Assign front page and posts page (blog page).
	        	$front_page_id = get_page_by_title( 'home-3' );
	        	$blog_page_id  = get_page_by_title( 'blog' );

	        	update_option( 'show_on_front', 'page' );
	        	update_option( 'page_on_front', $front_page_id->ID );
	        	update_option( 'page_for_posts', $blog_page_id->ID );

	        }
	        if ( 'Home 4' === $selected_import['import_file_name'] ) {


	// Assign front page and posts page (blog page).
	        	$front_page_id = get_page_by_title( 'home 4' );
	        	$blog_page_id  = get_page_by_title( 'blog' );

	        	update_option( 'show_on_front', 'page' );
	        	update_option( 'page_on_front', $front_page_id->ID );
	        	update_option( 'page_for_posts', $blog_page_id->ID );

	        }
	        if ( 'Home 5' === $selected_import['import_file_name'] ) {


	// Assign front page and posts page (blog page).
	        	$front_page_id = get_page_by_title( 'home 5' );
	        	$blog_page_id  = get_page_by_title( 'blog' );

	        	update_option( 'show_on_front', 'page' );
	        	update_option( 'page_on_front', $front_page_id->ID );
	        	update_option( 'page_for_posts', $blog_page_id->ID );

	        }
	        if ( 'Home 6' === $selected_import['import_file_name'] ) {


	// Assign front page and posts page (blog page).
	        	$front_page_id = get_page_by_title( 'home 6' );
	        	$blog_page_id  = get_page_by_title( 'blog' );

	        	update_option( 'show_on_front', 'page' );
	        	update_option( 'page_on_front', $front_page_id->ID );
	        	update_option( 'page_for_posts', $blog_page_id->ID );

	        }


	        if ( class_exists( 'RevSlider' ) ) {
	        	if ( 'RTL' === $selected_import['import_file_name'] ) 
	        	{

	        		$slider_array = array(

	        			Pcfq_Theme_Helper::pcfq_demo_file_path('1' , 'zip' , 'slider'),
	        		);
	        	}
	        	else{
	        		$slider_array = array(

	        			Pcfq_Theme_Helper::pcfq_demo_file_path('1' , 'zip' , 'slider'),
	        			Pcfq_Theme_Helper::pcfq_demo_file_path('2' , 'zip' , 'slider'),
	        			Pcfq_Theme_Helper::pcfq_demo_file_path('3' , 'zip' , 'slider'),
	        			Pcfq_Theme_Helper::pcfq_demo_file_path('4' , 'zip' , 'slider'),
	        			Pcfq_Theme_Helper::pcfq_demo_file_path('5' , 'zip' , 'slider'),
	        			Pcfq_Theme_Helper::pcfq_demo_file_path('6' , 'zip' , 'slider'),
	        		);
	        	}

	        	$slider = new RevSlider();

	        	foreach($slider_array as $filepath){
	        		$slider->importSliderFromPost(true,true,$filepath);
	        	}
	        }


    // remove default post
	        wp_delete_post(1);
	    }
	    add_action( 'pt-ocdi/after_import', 'marblex_ocdi_after_import' );
