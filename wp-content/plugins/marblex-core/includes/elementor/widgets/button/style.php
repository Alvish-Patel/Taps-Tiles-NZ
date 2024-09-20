<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
$html = '';

$settings = $this->get_settings();


$title_html = $settings['button_text'];


$this->add_render_attribute( 'btn_attr', 'class', 'pt-button' ); 

if ( ! empty( $settings['btn_link']['url'] ) ) 
{
  $this->add_render_attribute( 'btn_attr', 'href', $settings['btn_link']['url'] );

  if ( $settings['btn_link']['is_external'] ) {
    $this->add_render_attribute( 'btn_attr', 'target', '_blank' );
  }

  if ( ! empty( $settings['btn_link']['nofollow'] ) ) {
    $this->add_render_attribute( 'btn_attr', 'rel', 'nofollow' );
  }
}

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

?>

<div class="pt-btn-container">
  <a <?php echo $this->get_render_attribute_string('btn_attr'); ?>>
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
     <?php 
      } 
     ?>
   </div>
 </a>
</div>

<?php
$this->add_render_attribute( 'btn_attr', 'href', '' ); 
?>