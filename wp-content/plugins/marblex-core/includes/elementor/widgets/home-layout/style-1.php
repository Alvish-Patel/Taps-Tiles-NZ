<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
$settings = $this->get_settings(); 
if ( ! empty( $settings['grid_btn_link']['url'] ) ) 
{
  $this->add_render_attribute( 'btn_attr_link', 'href', $settings['grid_btn_link']['url'] );
  if ( $settings['grid_btn_link']['is_external'] ) {
    $this->add_render_attribute( 'btn_attr_link', 'target', '_blank' );
 }
 if ( ! empty( $settings['grid_btn_link']['nofollow'] ) ) {
    $this->add_render_attribute( 'btn_attr_link', 'rel', 'nofollow' );
 }
}
?> 

<div class="pt-home-layout">
   <a <?php echo $this->get_render_attribute_string('btn_attr_link'); ?>>
      <div class="pt-home-inner-layout">
         <div class="pt-image-box-img">
           <?php
           if(!empty($settings['image']['url']))
           {
              ?>
              <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="layout"  <?php echo $this->get_render_attribute_string('custom_width'); ?> >
              <?php
           }
           ?>
        </div>
        <h5 class="pt-section-title"><?php echo esc_html($settings['title_text']); ?></h5>
     </div>
  </a>
</div>



