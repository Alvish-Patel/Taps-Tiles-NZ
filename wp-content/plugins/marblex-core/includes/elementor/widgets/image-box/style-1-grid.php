<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;
$settings = $this->get_settings();
if ( ! empty( $settings['title_link']['url'] ) ) 
{
    $this->add_render_attribute( 'link_attr', 'href', $settings['title_link']['url'] );

    if ( $settings['title_link']['is_external'] ) {
        $this->add_render_attribute( 'link_attr', 'target', '_blank' );
    }

    if ( ! empty( $settings['title_link']['nofollow'] ) ) {
        $this->add_render_attribute( 'link_attr', 'rel', 'nofollow' );
    }
}

?>
<div class="pt-image-box pt-style-1  <?php echo esc_attr($settings['content_align']); ?>">
   <div class="pt-image-box-media">
         <?php 
      if(!empty($settings['image']['url']))
      {
         ?> 
         <a <?php echo $this->get_render_attribute_string('link_attr'); ?> >  
         <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="box">
      </a>
         <?php 
      }
      ?>
   </div>
   <div class="pt-image-box-info">
      <?php 
      $title = sprintf('<%2$s class="pt-image-box-title"><a %3$s> %1$s </a> </%2$s>',$settings['title_text'],$settings['title_tag'],$this->get_render_attribute_string('link_attr') );
      echo $title; 
      ?>
   </div>
</div>



