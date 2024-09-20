<?php
namespace Elementor;
if (!defined('ABSPATH')) {
  exit;
}

$html = '';

$settings = $this->get_settings();
$tabs = $this->get_settings_for_display( 'tabs' );
?>

<?php
if($settings['testimonial_style'] == "5")
{ 
 ?>
 <div class="testimonial-slider pt-slider-5">
   <div class="row">

    <div class="col-lg-6 col-md-12 col-sm-12">
     <div class="pt-thumbs-column">
      <div class="pt-thumbs-column-inner">
       <div class="slick-slider-thumb">
        <?php
        foreach ( $tabs as $index => $item )
        {     
         ?>
         <div class="item">
          <?php
          if(!empty($item['testimonial_image']['url'])) 
          {
            ?>
            <img  src="<?php echo esc_url($item['testimonial_image']['url']); ?>" alt="img">
            <?php 
          }
          ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>

<div class="col-lg-6 col-md-12 col-sm-12">
 <div class="pt-content-column">
  <div class="pt-content-column-inner">
   <div class="slick-slider-main">
     <?php
       foreach ( $tabs as $index => $item )
       {     
         ?>
    <div class="item">
     <div class="pt-testimonial pt-style-5">
      
         <div class="pt-testimonial-content">
           <div class="pt-testimonial-info">
            <div class="pt-testimonial-star">
              <?php
              $star = esc_html($item['star_num']);
              for($i=1;$i<=$star;$i++)
              { 
                ?>
                <i class="fa fa-star"></i>
              <?php } ?>
            </div>
            <?php 
            if (!empty($item['description_text'])) 
            {
              $desc_html = $this->parse_text_editor($item['description_text']);
              echo '<p class="pt-testimonial-description">'. $desc_html. '</p>';
            } 
            ?>
            <div class="pt-testimonial-meta">
             <h5 class="pt-testmonial-title"><?php echo esc_html($item['title_text']); ?></h5>  
             <span><?php echo esc_html($item['desg_text']) ?></span>
           </div>
         </div>
       </div>
   
   </div>
 </div>
  <?php } ?>



</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>







