<?php
namespace Elementor;
use Peaceful\Debate\Options;
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
$max_count = $settings['initial_items'];
$count = 0;
$cut = ($settings['crop_images']);
$crop_layout = ($settings['crop_style']);
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

    <div class="pt-masonry <?php echo esc_attr($settings['no_padding']); ?>" data-next_items="<?php echo esc_attr($settings['next_items']); ?>" data-initial_items="<?php echo esc_attr($settings['initial_items']); ?>">
      <div class="grid-sizer pt-col-4"></div>
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

          $item_class = Marblex_Helper::pt_grid_class($count , $crop_layout);
          $final_url = Marblex_Helper::portfolio_manasory($image_url , $cut , $count , $crop_layout);
          ?>
          <div class="pt-masonry-item pt-filter-items  <?php echo $item_class; ?><?php echo esc_attr($catname) ?>" >
            <div class="pt-portfoliobox-1">

              <div class="pt-portfolio-block">

                <div class="pt-portfolio-img  ">

                  <?php echo $final_url; ?>

                </div>

                <div class="pt-portfolio-info">
                  <h5><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h5>

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

                </div>
                <?php 
                if ($settings['hide_button'] == 'yes') { ?>
                  <div class="pt-btn-container">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>" <?php echo $this->get_render_attribute_string('btn_attr'); ?>>
                      <div class="pt-button-block">
                        <?php  
                        if ($settings['btn_style'] == 'btn-flat' || $settings['btn_style'] == 'btn-outline')
                          { ?>
                           <span class="pt-button-text"><?php echo esc_html($settings['button_text']); ?>  </span>
                           <?php
                         }

                         if($settings['btn_style'] == 'btn-link' || $settings['btn_style'] == 'btn-icon')  
                         {
                          if(is_array($settings['button_icon']['value']))
                          {
                            echo wp_kses_post('<div  class="pt-svg">');
                            Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); 
                            echo wp_kses_post('</div>');
                          }
                        }
                        if(!is_array($settings['button_icon']['value']))
                        { 
                          ?>
                          <span class="pt-button-line-right"></span>
                          <i class="<?php echo esc_attr($settings['button_icon']['value']) ?>"></i>
                          <?php 
                        } 
                        if ($settings['btn_style'] == 'btn-link')
                        { 
                         ?>
                         <span class="pt-button-text"><?php echo esc_html($settings['button_text']); ?>  </span>
                       <?php } 

                       ?>
                     </div>
                   </a>
                 </div>

               <?php } ?>

             </div>

           </div>
         </div>

         <?php
         $catname = ''; $i++; }
       }
       ?>
     </div>

     <div class="pt-button-container text-center">
      <a id="showMore" class="pt-button pt-button-flat" href="#" >
        <div class="pt-button-block">
          <span class="pt-btn-text">
            <?php
            echo esc_html($settings['loadmore_text']); 
            ?>
          </span> 
          <?php 
          if(is_array($settings['loadmore_icon']['value']))
          { 
           ?>
           <img src="<?php echo esc_url($settings['loadmore_icon']['value']['url']) ?>">
           <?php 
         }
         else
         { 
           ?>
           <span class="pt-button-line-right"></span>
           <i class="<?php echo esc_attr($settings['loadmore_icon']['value']) ?>"></i>
           <?php 
         } 
         
         ?>
       </div>
     </a>
   </div>