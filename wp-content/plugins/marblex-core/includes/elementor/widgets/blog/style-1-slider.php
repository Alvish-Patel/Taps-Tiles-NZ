<?php
namespace Elementor;
use marblex_Core\Includes\Helper\Marblex_Helper;

if ( ! defined( 'ABSPATH' ) ) 
{
  exit; 
}

$settings = $this->get_settings();

$align = $settings['text_align'];
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

$max_count = 1;
$count = 0;
$cut = ($settings['crop_images']);
global $paged;
if (empty($paged))
{
  $paged = 1;
}

$args = array(
  'post_type'         => 'post',
  'post_status'       => 'publish',
  'suppress_filters'  => 0,
  'paged' => $paged

);
$posts = new \WP_Query($args);
$slider = new Slider_Controls();
$slider->add_render_attribute($this , $settings);



if($settings['blog_style'] === "0")
{
  ?>
  <div class="pt-blog text-<?php echo esc_attr($align,'marblex-core'); ?>"> 
    <div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>

      <?php 
      if ( $posts -> have_posts() ) 
      {
        while ( $posts -> have_posts() ) 
        {
          $posts->the_post();
          $image_url = wp_get_attachment_url( get_post_thumbnail_id($posts->ID) );
          ?>
          <div class="item">

            <div class="pt-blog-post">
              <div class="pt-post-media">
                <?php
                if ($count < $max_count)
                {
                  $count++;
                }
                else
                {
                 $count = 1;
               }
               $item_class = Marblex_Helper::pt_grid_class($count);
               $final_url = Marblex_Helper::blog_crop($image_url , $cut , $count);
               echo  $final_url;
               
               $archive_year  = get_the_time( 'Y' ); 
               $archive_month = get_the_time( 'm' ); 
               $archive_day   = get_the_time( 'd' ); 
               $date_format = get_option( 'date_format' );

               ?>
               <div class="pt-post-category">
                 <?php
                 $i =0;
                 $categories = get_the_category( get_the_ID() );
                 foreach( $categories as $category ) {
                  if($i==0)
                  {
                    ?>
                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_attr( $category->name ) ?></a>
                    <?php   
                    $i++;     
                  }}         
                  ?> 
                </div>
              </div>
              <div class="pt-blog-contain">
                <div class="pt-post-meta">
                  <ul>        
                   <li class="pt-post-meta">
                    <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                      <?php echo esc_html( get_the_date($date_format, get_the_ID() ) ); ?>
                    </a>
                  </li>
                  <li class="pt-post-comment">
                    <?php
                    if(get_comments_number(get_the_ID()) == 1)
                    {
                      $comment = esc_html__('Comment','marblex-core');
                    }
                    else
                    {
                      $comment = esc_html__('Comments','marblex-core');
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>"><?php echo get_comments_number(get_the_ID()).' '.$comment; ?></a>
                  </li>
                </ul>
              </div>
              <h5 class="pt-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              
              <?php 
              if ($settings['des_button'] == 'yes') {

               the_excerpt();

             }  ?>
             
             <?php 
             if ($settings['hide_button'] == 'yes') { ?>
               <div class="pt-btn-container">
                <a href="<?php echo the_permalink(); ?>" <?php echo $this->get_render_attribute_string('btn_attr'); ?>>
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
<?php 
}
?>



