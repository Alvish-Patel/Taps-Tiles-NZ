<?php 
namespace marblex_Core\Includes\Helper;
class Marblex_Helper
{
	protected static $instance = null;

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	public function __construct(){
    }

    public static function  pt_grid_class($count = null , $crop_layout = null )
    {

         $class = '';
        if ($crop_layout == 'crop_style_1'){
            
        switch ($count)
         {
                case 1:
                case 6:  $class .= 'ipt-lg-6 style_1';
                break;
                default: $class .= 'ipt-lg-3 style_1';
                // break;
            }
        }
        
       //  if ($crop_layout == '2'){
      if ($crop_layout == 'crop_style_2'){
            switch ($count)
         {


                case 1:
                case 2:
                case 3:  $class .= 'ipt-lg-4 style_2';
                break;
                default: $class .= 'ipt-lg-6 style_2';
                break;
            }
        }

        return $class;


    }
  

    public static function portfolio_manasory($wp_get_attachment_url = '' ,$crop = false, $count = '0' ,$crop_layout)
     {
        if ($crop_layout == 'crop_style_1'){
        $pt_featured_image_url = '';
        if (strlen($wp_get_attachment_url)) {
                switch ($count) {
                    case 1:
                    case 6:
                        $pt_featured_image_url = aq_resize($wp_get_attachment_url, "958", "468", $crop, true, true);
                        break;
                    default:
                        $pt_featured_image_url = aq_resize($wp_get_attachment_url, "467", "461", $crop, true, true);
                }
            if (!(bool)$pt_featured_image_url) {
                $pt_featured_image_url = $wp_get_attachment_url;
            }
            $featured_image = '<img  src="' . $pt_featured_image_url . '" alt="" />';
        } else {
            $featured_image = '';
        }
    }
    if ($crop_layout == 'crop_style_2'){
        $pt_featured_image_url = '';
        if (strlen($wp_get_attachment_url)) {
                switch ($count) {
                    case 1:
                    case 2:
                    case 3:
                        $pt_featured_image_url = aq_resize($wp_get_attachment_url, "415", "419", $crop, true, true);
                        break;
                    default:
                        $pt_featured_image_url = aq_resize($wp_get_attachment_url, "628", "421", $crop, true, true);
                }
            if (!(bool)$pt_featured_image_url) {
                $pt_featured_image_url = $wp_get_attachment_url;
            }
            $featured_image = '<img  src="' . $pt_featured_image_url . '" alt="" />';
        } else {
            $featured_image = '';
        }
    }
        return $featured_image;
    }


    public static function portfolio_grid($wp_get_attachment_url = '' ,$width, $height,$crop = false, $count = '0')
    {
        $pt_featured_image_url = '';
        if (strlen($wp_get_attachment_url)) {
            switch ($count) {
                    // case 3:
                    // case 4:
                    //     $pt_featured_image_url = aq_resize($wp_get_attachment_url, "958", "468", $crop, true, true);
                    //     break;
                default:
                $pt_featured_image_url = aq_resize($wp_get_attachment_url, $width, $height, $crop, true, true);
            }
            if (!(bool)$pt_featured_image_url) {
                $pt_featured_image_url = $wp_get_attachment_url;
            }
            $featured_image = '<img  src="' . $pt_featured_image_url . '" alt="" />';
        } else {
            $featured_image = '';
        }
        return $featured_image;
    }
    
    public static function blog_img($wp_get_attachment_url = '' ,$width, $height,$crop = yes)
    { 
        $pt_featured_image_url = '';
        if (strlen($wp_get_attachment_url)) {
         $pt_featured_image_url = aq_resize($wp_get_attachment_url, $width, $height, $crop, true, true);
         
         if (!(bool)$pt_featured_image_url) {
            $pt_featured_image_url = $wp_get_attachment_url;
        }
        $featured_image = '<img  src="' . $pt_featured_image_url . '" alt="" />';
    } else {
        $featured_image = '';
    }
    return $featured_image;
} 
public static function blog_crop($wp_get_attachment_url = '' ,$crop = false, $count = '0')
{
    $pt_featured_image_url = '';
    if (strlen($wp_get_attachment_url)) {
        $pt_featured_image_url = aq_resize($wp_get_attachment_url, "467", "352", $crop, true, true);
        if (!(bool)$pt_featured_image_url) {
            $pt_featured_image_url = $wp_get_attachment_url;
        }
        $featured_image = '<img  src="' . $pt_featured_image_url . '" alt="blog-image" />';
    } else {
        $featured_image = '';
    }
    return $featured_image;
}
public static function pt_portfolio_get_category()
{
    $taxonomy = 'portfolio-categories';
    $orderby = 'name';
    $show_count = 0; // 1 for yes, 0 for no
    $pad_counts = 0; // 1 for yes, 0 for no
    $hierarchical = 1; // 1 for yes, 0 for no
    $title = '';
    $empty = 0;

    $args = array(
        'taxonomy' => $taxonomy,
        'orderby' => $orderby,
        'show_count' => $show_count,
        'pad_counts' => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li' => $title,
        'hide_empty' => false,
        'parent' => 0
    );
    $array = get_categories($args);
    return $array;
}    

}

Marblex_Helper::instance();