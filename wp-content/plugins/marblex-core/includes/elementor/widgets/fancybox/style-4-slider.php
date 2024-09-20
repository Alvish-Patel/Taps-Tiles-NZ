<?php
namespace Elementor;
if (!defined('ABSPATH')) {
    exit;
}
$settings = $this->get_settings();
$settings = $this->get_settings_for_display();


if ($settings['fancy_style'] === "4" && $settings['fancy_inner_style'] == 'slider') 
{

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
$tabs = $this->get_settings_for_display( 'list_items' );

$slider = new Slider_Controls();
$slider->add_render_attribute($this ,$settings);
?>

<div class="pt-fancy-box-slider pt-style-4 <?php echo $settings['content_align']; ?>">
    <div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>
        <?php
        foreach($tabs as $key=>$item)
        {

            $title_html = $item['fancy_title_text'];
            $title = sprintf('<%1$s class="pt-fancy-box-title">%2$s</%1$s>', $item['title_tag'],$title_html);


            if (!empty($item['fancy_description_text'])) 
            {
                $desc_html = $this->parse_text_editor($item['fancy_description_text']);
            } 
            if ( ! empty( $item['btn_link']['url'] ) ) 
            {
                $this->add_render_attribute( 'btn_attr'.$key, 'href', $item['btn_link']['url'] );

                if ( $item['btn_link']['is_external'] ) {
                    $this->add_render_attribute( 'btn_attr'.$key, 'target', '_blank' );
                }

                if ( ! empty( $item['btn_link']['nofollow'] ) ) {
                    $this->add_render_attribute( 'btn_attr'.$key, 'rel', 'nofollow' );
                }
            }
            ?>
            <div class="item">
                <div class="pt-fancy-box pt-style-4 <?php echo $settings['content_align']; ?>">
                   <div class="pt-fancy-box-info">
                    <?php echo $title; ?>
                    <p class="pt-fancy-box-description"><?php echo $desc_html; ?>  </p>
                    <div class="pt-fancy-box-content">
                     <div class="pt-fancy-box-icon">
                         <i class="<?php echo esc_attr($item['fancy_icon']['value']) ?>"></i>
                     </div>
                     <?php
                     if ($item['show_button'] == 'yes') 
                     {
                        ?>
                        <div class="pt-btn-container">
                            <a <?php echo $this->get_render_attribute_string('btn_attr'); ?>
                            <?php echo $this->get_render_attribute_string('btn_attr'.$key); ?>>
                            <div class="pt-button-block">
                              <?php  
                              if ($settings['btn_style'] == 'btn-flat' || $settings['btn_style'] == 'btn-outline')
                                { ?>
                                   <span class="pt-button-text"><?php echo esc_html($item['button_text']); ?>  </span>
                                   <?php
                               }

                               if($settings['btn_style'] == 'btn-link' || $settings['btn_style'] == 'btn-icon')  
                               {
                                if(is_array($settings['button_icon']['value']))
                                {
                                  echo wp_kses_post('<div  class="pt-svg">');
                                  Icons_Manager::render_icon( $item['button_icon'], [ 'aria-hidden' => 'true' ] ); 
                                  echo wp_kses_post('</div>');
                              }
                          }
                          if(!is_array($item['button_icon']['value']))
                          { 
                            ?>
                            <span class="pt-button-line-right"></span>
                            <i class="<?php echo esc_attr($item['button_icon']['value']) ?>"></i>
                            <?php 
                        } 
                        if ($settings['btn_style'] == 'btn-link')
                        { 
                           ?>
                           <span class="pt-button-text"><?php echo esc_html($item['button_text']); ?>  </span>
                       <?php } 

                       ?>
                   </div>
               </a>
           </div>
           <?php 
       }
       ?>
   </div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>


<?php
}?>








