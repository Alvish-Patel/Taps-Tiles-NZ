<?php
namespace Elementor;
if (!defined('ABSPATH')) {
  exit;
}

$settings = $this->get_settings();

$title_html = '';
$desc_html = '';

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

if($settings['service_style'] == '6')
{
  $tabs = $this->get_settings_for_display( 'list_items' );
  ?>

  <div class="service-slider pt-slider-6">
    <div class="row">
     <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="pt-content-column">
        <div class="pt-content-column-inner">
          <div class="slick-slider-main">
            <?php
            foreach($tabs as $key=>$item)
            {
              if (!empty($item['description_text'])) 
              {
                $desc_html = $this->parse_text_editor($item['description_text']);
              } 
              ?>
              <div class="item">
                <div class="pt-service-box pt-style-6">
                  <div class="pt-service-media">
                    <?php 
                    if(!empty($item['image']['url']))
                    {
                      ?>
                      <div class="pt-service-img">
                        <img src="<?php echo esc_url($item['image']['url']); ?>" alt="service-img">

                      </div>
                      <?php 
                    } 
                    ?>
                  </div>
                  <div class="pt-service-info">
                    <div class="pt-service-icon">
                      <i class="<?php echo esc_attr($item['service_icon']['value']); ?>" aria-hidden="true"></i>
                    </div>
                    <p><?php echo $desc_html; ?></p>
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
                              if(is_array($item['button_icon']['value']))
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

            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="pt-thumbs-column">
        <div class="pt-section-title pt-style-1 <?php echo $settings['content_align']; ?> ">
         <?php
         if(!empty($settings['sub_title_text']))
         {
          ?>
          <span class="pt-section-sub-title"><?php echo esc_html($settings['sub_title_text']); ?></span>
          <?php
        } 
        if(!empty($settings['section_title_text']))
        {
          ?>
          <h5 class="pt-section-main-title"><?php echo esc_html($settings['section_title_text']); ?></h5>
          <?php
        }
        if(!empty($settings['section_desc']))
        {
          ?>

          <p class="pt-section-description"><?php echo esc_html($settings['section_desc']); ?></p>
          <?php
        }
        ?>
      </div>
      <div class="pt-thumbs-column-inner">
        <div class="slick-slider-thumb">
         <?php
         foreach($tabs as $key=>$item)
         {
          $title = sprintf(' <div class="item"><%2$s><span>%3$s</span> %1$s</%2$s> </div>',$item['title_text'],$item['title_tag'],$item ['service_number']);
          echo $title;

        } ?>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<?php 
}
?>





