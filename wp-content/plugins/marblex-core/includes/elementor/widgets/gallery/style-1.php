<?php
namespace Elementor;

if (!defined('ABSPATH')) {
  exit;
}
$html = '';
$settings = $this->get_settings();

$tabs = $this->get_settings_for_display( 'tabs' );

?>

<div class="pt-gallery pt-style-1 <?php echo $settings['text_align']; ?> <?php echo $settings['portfolio_hover_style']; ?>">
  <?php 
  foreach ($tabs as $key => $value) 
  {    
    ?>
    <div class="pt-gallery-block">
      <?php
      if (!empty($value['gallery_image']['url']))
      {
        ?>
        <div class="pt-gallery-img">
          <img src="<?php echo esc_url($value['gallery_image']['url']); ?>" alt="gallery-img" <?php echo $this->get_render_attribute_string('custom_width'); ?>/> 
        </div>
        <?php
      }
      ?>
      <div class="pt-gallery-info">
        <?php  
        $title = sprintf('<%1$s class="pt-gallery-title"><a href="%3$s">%2$s</a></%1$s>', $value['title_tag'],$value['gallery_title_text'],$value['gallery_image']['url']); 

        echo $title 
        ?>
      </div>
    </div>
    <?php 
  }
  ?>
</div>