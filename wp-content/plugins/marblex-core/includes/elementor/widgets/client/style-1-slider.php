<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
$settings = $this->get_settings();
$tabs = $this->get_settings_for_display( 'list_items' );

if($settings['client_style'] == '1' && $settings['inner_style'] == 'slider')
{
   $slider = new Slider_Controls();
   $slider->add_render_attribute($this , $settings);

   if(!empty($settings['custom_dimension']['width']))
   {
    $width = $settings['custom_dimension']['width'];
    $this->add_render_attribute('custom_width', 'style', 'width:'.$width.'px;');
}

if(!empty($settings['custom_dimension']['height']))
{

  $height = $settings['custom_dimension']['height'];
  $this->add_render_attribute('custom_width', 'style', 'height:'.$height.'px;'); 

} 
?>
<div class="pt-client-box-slider pt-client-style-1" >
    <div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>> 

       <?php 
       foreach ( $tabs as $index => $item )
       {
           if ( ! empty( $item['btn_link']['url'] ) ) 
           {
            $this->add_render_attribute( 'btn_attr_link'.$index, 'href', $item['btn_link']['url'] );
            if ( $item['btn_link']['is_external'] ) {
                $this->add_render_attribute( 'btn_attr_link'.$index, 'target', '_blank' );
            }
            if ( ! empty( $item['btn_link']['nofollow'] ) ) {
                $this->add_render_attribute( 'btn_attr_link'.$index, 'rel', 'nofollow' );
            }
        }
        ?> 
        <div class="item">
            <div class="pt-client-box pt-client-style-1">


                <a <?php echo $this->get_render_attribute_string('btn_attr_link'.$index); ?>>
                  <?php
                  if(!empty($item['image']['url']))
                  { 
                      ?>
                      <img src="<?php echo esc_url($item['image']['url']); ?>" alt="pt-client-img" class="pt-client-img" <?php echo $this->get_render_attribute_string('custom_width'); ?>>
                  <?php } ?>

                  <?php
                  if(!empty($item['image1']['url']))
                  { 
                      ?>
                      <img src="<?php echo esc_url($item['image1']['url']); ?>" alt="pt-client-img" class="pt-client-hover-img" <?php echo $this->get_render_attribute_string('custom_width'); ?>>
                  <?php } ?>

              </a>
          </div>
      </div>
  <?php } ?>
</div>
</div>
<?php } 

