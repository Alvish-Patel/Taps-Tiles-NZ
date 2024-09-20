<?php
add_action( 'tgmpa_register', 'marblex_register_required_plugins' );


function marblex_register_required_plugins() {
		$plugins = array(
		 array(
            'name'      => esc_html__( 'Advanced Custom Fields','marblex' ),
            'slug'      => 'advanced-custom-fields',
            'required'  => true,

        ),
        array(
            'name'      => esc_html__( 'Elementor','marblex' ),
            'slug'      => 'elementor',
            'required'  => true,

        ),
        array(
            'name'      => esc_html__( 'JetSticky For Elementor','restika' ),
            'slug'      => 'jetsticky-for-elementor',
            'required'  => true,

        ),
         array(
            'name'      => esc_html__( 'Redux Framework','marblex' ),
            'slug'      => 'redux-framework',
            'required'  => true,

        ),
        array(
            'name'      => esc_html__( 'One Click Demo Import','marblex' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,

        ),
        array(
            'name'      => esc_html__( 'MC4WP: Mailchimp for WordPress','marblex' ),
            'slug'      => 'mailchimp-for-wp',
            'required'  => true,

        ),
        array(
            'name'      => esc_html__( 'Contact Form 7','marblex' ),
            'slug'      => 'contact-form-7',
            'required'  => true,

        ),
          array(
            'name'      => esc_html__( 'WooCommerce','marblex' ),
            'slug'      => 'woocommerce',
            'required'  => true,

        ),

		array(
			'name'      => esc_html__( 'marblex core','marblex' ),
			'slug'      => 'marblex-core',
			'source'    => Pcfq_Theme_Helper::pcfq_external_plugin_url('marblex/marblex-core'),

			'required'  => true,
		),
		array(
			'name'      => esc_html__( 'Slider Revolution','marblex' ),
			'slug'      => 'revslider',
			'source'    => Pcfq_Theme_Helper::pcfq_external_plugin_url('revslider'),
			'required'  => true,
		),

	);


	$config = array(
		'id'           => 'marblex',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}