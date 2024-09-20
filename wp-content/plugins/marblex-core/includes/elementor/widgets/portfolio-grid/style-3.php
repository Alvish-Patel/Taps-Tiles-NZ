<?php
namespace Elementor;
use Peaceful\Marblex\Options;
use marblex_Core\Includes\Helper\Marblex_Helper;
if (!defined('ABSPATH')) {
  exit;
}
$html = '';
$settings = $this->get_settings();
$this->add_render_attribute( 'btn_attr', 'class', 'pt-button' );
if($settings['btn_style'] == 'btn-flat')
{

  $this->add_render_attribute( 'btn_attr', 'class', 'pt-button-flat' ); 
}

if($settings['btn_style'] == 'btn-outline')
{

  $this->add_render_attribute( 'btn_attr', 'class', 'pt-button-outline' ); 
}

if($settings['btn_style'] == 'btn-link')
{

  $this->add_render_attribute( 'btn_attr', 'class', 'pt-button-link' ); 
}
if($settings['btn_style'] == 'btn-icon')
{

  $this->add_render_attribute( 'btn_attr', 'class', 'pt-button-link' ); 
}
$max_count = 25;
$count = 0;
$cut = ($settings['crop_images']);
$height = '';
$weight = '';
if ($cut === 'false' )
{
  $height = $settings['crop_height'];
  $weight = $settings['crop_weight'];
}


$args = array(
  'post_type' => 'portfolio',
  'post_status' => 'publish',
  'suppress_filters' => 0,
);
$posts = new \WP_Query($args);
global $post;


?>
<div class="pt-filters">
 <div class="filters pt-filter-button-group">
  <ul>

    <li class="active pt-filter-btn" data-filter="*">All</li>
    <?php
    $taxonomy = 'portfolio-categories';
          $terms = get_terms($taxonomy); // Get all terms of a taxonomy
          if ( $terms && !is_wp_error( $terms ) ) {
           foreach ( $terms as $term ) {

            ?>
            <li class="pt-filter-btn" data-filter=".<?php echo $term->term_id; ?>"><?php echo esc_html($term->name); ?></li>
          <?php } } ?>
        </ul>
      </div>
    </div>

    <div class="pt-grid style-3<?php echo esc_attr($settings['no_padding']); ?>" data-next_items="<?php echo esc_attr($settings['next_items']); ?>" data-initial_items="<?php echo esc_attr($settings['initial_items']); ?>">
      <?php
      $i=0;
      if ($posts->have_posts())
      {
        $catname = '';
        while ($posts->have_posts()) {
          $posts->the_post();
          $image_url = wp_get_attachment_url( get_post_thumbnail_id($posts->ID) );
          $category = (array) get_the_terms( $post->ID, 'portfolio-categories' );
          $array = json_decode(json_encode($category), true);
            //print_r($array);
          foreach ( $array as $cat){
            $catname .= " ".$cat['term_id'] ." ";
          }
          if ($count < $max_count)
          {
           $count++;
         }
         else
         {
           $count = 1;
         }

         $item_class = Marblex_Helper::pt_grid_class($count);
         $final_url = Marblex_Helper::portfolio_grid($image_url , $weight, $height,  $cut , 0);
         ?>
         <div class="pt-grid-item pt-filter-items <?php echo esc_attr($settings['grid_style'])."  ".$item_class . " ".$catname; ?>">
          <div class="pt-portfoliobox-3">
            <div class="pt-portfolio-img">
              <a href="<?php the_permalink(); ?>">
               <?php echo $final_url; ?>
             </a>
           </div>
           <div class="pt-portfolio-info">
            <div class="pt-portfolio-content">
             <?php
             $term_data = '';
             $terms = get_the_terms( get_the_ID(), 'portfolio-categories' );
             if ( $terms && ! is_wp_error( $terms ) ) {
              $draught_links = [];
              foreach ( $terms as $index => $term )
              {
                if($index <= 0)
                {
                  $term_data .= '<a href="'.esc_url(get_category_link($term->term_id)).'">'.esc_html($term->name).'</a>';
                }
              }
              ?>

              <span> <?php echo ($term_data); ?> </span>

              <?php
            }
            ?>
            <h5><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h5>
          </div>
          <a href="<?php the_permalink(); ?>" class="pt-portfolio-icon-bg">
            <div class="pt-portfolio-icon"><i class="<?php echo esc_attr($settings['selected_icon']['value']) ?>"></i></div>
          </a>
        </div>
      </div>

      
    </div>


    <?php
    $catname = ''; $i++; }
  }
  ?>
</div>
<div class="pt-btn-load-container pt-button-container <?php echo esc_html($settings['button_text_align']); ?>">
 <a id="showMore" href="#" <?php echo $this->get_render_attribute_string('btn_attr'); ?>>
  <div class="pt-button-block">
    <i class="<?php echo esc_attr($settings['button_icon']['value']); ?> "></i>
    <span  class="pt-button-text"><?php echo esc_html($settings['loadmore_text']); ?></span>
  </div>
</a>
</div>
