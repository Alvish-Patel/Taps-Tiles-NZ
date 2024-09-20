<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;
$settings = $this->get_settings();
$tabs = $this->get_settings_for_display( 'list_items' );

$slider = new Slider_Controls();
$slider->add_render_attribute($this , $settings);
?>
<div class="pt-image-box-slider pt-client-style-1 <?php echo esc_attr($settings['content_align']); ?>" >
  <div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>> 

     <?php 
     foreach ( $tabs as $index => $item )
     { 
      if ( ! empty( $item['title_link']['url'] ) ) 
      {
         $this->add_render_attribute( 'link_attr'.$index, 'href', $item['title_link']['url'] );

        if ( $item['title_link']['is_external'] ) {
          $this->add_render_attribute( 'link_attr'.$index, 'target', '_blank' );
       }

       if ( ! empty( $item['title_link']['nofollow'] ) ) {
          $this->add_render_attribute( 'link_attr'.$index, 'rel', 'nofollow' );
       }
    }
    ?>
    <div class="item">
    <div class="pt-image-box pt-style-1  <?php echo esc_attr($settings['content_align']); ?>">
      <div class="pt-image-box-media">
         <?php 
         if(!empty($item['image']['url']))
         {
            ?> 
            <a <?php echo $this->get_render_attribute_string('link_attr'.$index); ?> >  
               <img src="<?php echo esc_url($item['image']['url']); ?>" alt="box">
            </a>
            <?php 
         }
         ?>
      </div>
      <div class="pt-image-box-info">
         <?php 
         $title = sprintf('<%2$s class="pt-image-box-title"><a %3$s> %1$s</a> </%2$s>',$item['title_text'],$item['title_tag'],$this->get_render_attribute_string('link_attr'.$index) );
         echo $title; 
         ?>
      </div>
   </div>
</div>
<?php } ?>
</div>
</div>



