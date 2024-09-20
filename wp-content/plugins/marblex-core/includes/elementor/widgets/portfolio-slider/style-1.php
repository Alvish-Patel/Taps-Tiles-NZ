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

$layout = $settings['portfolio_style'];

$cut = (bool) ($settings['crop_images']);

$height = '';

$weight = '';

if ($cut == 1 ){

  $height = $settings['crop_height'];

  $weight = $settings['crop_weight'];


  $img_args = array('size_dimention' => array('width' => $weight , 'height' => $height));



}


$args = array(

  'post_type' => 'portfolio',

  'post_status' => 'publish',

  'suppress_filters' => 0,

);

$posts = new \WP_Query($args);

global $post;

$slider = new Slider_Controls();

$slider->add_render_attribute($this ,$settings);

?>

<div class="pt-portfoliobox pt-portfoliobox-style-<?php echo esc_html($layout); ?>">

  <div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>

    <?php

    if ($posts->have_posts()) {

      while ($posts->have_posts()) {

        $posts->the_post();

        $image_url = wp_get_attachment_url( get_post_thumbnail_id($posts->ID) );





        if ($cut == 1 ){

          $final_url = Marblex_Helper::portfolio_grid($image_url , $weight, $height,  $cut , 0 );

        }

        else

        {

          $final_url = '<img  src="' . $image_url . '" alt="portfolio-slider" />';

        }



        ?>

        <div class="item">

          <div class="pt-portfoliobox-<?php echo esc_html($layout); ?>">

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

 }

}

wp_reset_query();

?>

</div>

</div>


