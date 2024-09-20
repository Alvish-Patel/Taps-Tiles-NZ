<?php
class Marblex_Custom_Post
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct()
    {
        add_action('init', array(
            $this,
            'portfolio'
        ));
    }

    public function portfolio()
    {

        $labels = array(
            'name' => esc_html__('Portfolio', 'post type general name', 'marblex-core') ,
            'singular_name' => esc_html__('Portfolio', 'post type singular name', 'marblex-core') ,
            'featured_image' => esc_html__('Portfolio Photo', 'marblex-core') ,
            'set_featured_image' => esc_html__('Set Portfolio Photo', 'marblex-core') ,
            'remove_featured_image' => esc_html__('Remove Portfolio Photo', 'marblex-core') ,
            'use_featured_image' => esc_html__('Use as Portfolio Photo', 'marblex-core') ,
            'menu_name' => esc_html__('Portfolio', 'admin menu', 'marblex-core') ,
            'name_admin_bar' => esc_html__('Portfolio', 'add new on admin bar', 'marblex-core') ,
            'add_new' => esc_html__('Add New', 'Portfolio', 'marblex-core') ,
            'add_new_item' => esc_html__('Add New Portfolio', 'marblex-core') ,
            'new_item' => esc_html__('New Portfolio', 'marblex-core') ,
            'edit_item' => esc_html__('Edit Portfolio', 'marblex-core') ,
            'view_item' => esc_html__('View Portfolio', 'marblex-core') ,
            'all_items' => esc_html__('All Portfolio', 'marblex-core') ,
            'search_items' => esc_html__('Search Portfolio', 'marblex-core') ,
            'parent_item_colon' => esc_html__('Parent Portfolio :', 'marblex-core') ,
            'not_found' => esc_html__('No Classs found.', 'marblex-core') ,
            'not_found_in_trash' => esc_html__('No Classs found in Trash.', 'marblex-core')
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'menu_icon' => 'dashicons-layout',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'category',
                'tag',
                'excerpt'
            )
        );

        register_post_type('portfolio', $args);

        register_taxonomy('portfolio-categories', 'portfolio', array(
            'label' => esc_html__('Portfolio Category', 'marblex-core') ,
            'rewrite' => true,
            'hierarchical' => true,
        ));
        register_taxonomy('portfolio-tag', 'portfolio', array(
            'label' => esc_html__('Portfolio Tag', 'marblex-core') ,
            'rewrite' => true,
            'hierarchical' => true,
        ));
    }
   
}

new Marblex_Custom_Post;

