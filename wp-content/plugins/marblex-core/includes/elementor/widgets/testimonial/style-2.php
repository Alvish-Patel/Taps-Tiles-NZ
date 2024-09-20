<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$html = '';

$settings = $this->get_settings();
$tabs = $this->get_settings_for_display( 'tabs' );

$slider = new Slider_Controls();
$slider->add_render_attribute($this , $settings);

?>

<?php
if($settings['testimonial_style'] == "2")
{ 
 ?>
 <div class="pt-testimonial-box-slider pt-style-2 <?php echo esc_attr($settings['content_align']);  ?>">
   <div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>
     <?php
     foreach ( $tabs as $index => $item )
     {     
       ?>
       <div class="item">
         <div class="pt-testimonial-box pt-style-2 <?php echo esc_attr($settings['content_align']);  ?>">
          <div class="pt-testimonial-media">
            <?php 
            if(!empty($item['image']['url']))
            {
             ?>
             <div class="pt-testimonial-img">
              <img src="<?php echo esc_url($item['image']['url']); ?>" alt="Testimonial-image">
            </div>
            <?php 
          }
          ?>
        </div>
        <div class="pt-testimonial-info">
          <div class="pt-testimonial-content">
            <?php 
            if (!empty($item['description_text'])) 
            {
              $desc_html = $this->parse_text_editor($item['description_text']);
              echo '<p class="pt-testimonial-description">'. $desc_html. '</p>';
            } 
            ?>
          </div>
          <div class="pt-team-content-info">
            <div class="pt-testimonial-meta">
              <?php
              $title_html = $item['title_text']; 
              $title = sprintf('<%1$s class="pt-testmonial-title">%2$s</%1$s>', $item['title_tag'],$title_html);
              echo $title; ?>
              <span><?php echo esc_html($item['desg_text']); ?></span> 
            </div>
            <div class="pt-testimonial-icon">
              <i class="<?php echo esc_attr($item['testi_icon']['value']) ?>"></i>
            </div>
          </div>
        </div>
      </div>

    </div>
  <?php } ?>
</div>
</div>
<?php } ?>





