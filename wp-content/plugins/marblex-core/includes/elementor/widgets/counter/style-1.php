<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
$settings = $this->get_settings();
?>

<div class="pt-counter pt-counter-style-1 <?php echo $settings['content_align']; ?>">

    <div class="pt-counter-media"> <i class="<?php echo esc_attr($settings['selected_icon']['value']) ?>"></i>
    </div>

   <div class="pt-counter-info">
      <div class="pt-counter-num-prefix">
         <?php
        if(!empty($settings['title_number']))
        { 
        ?>
         <h5 class="timer" data-to="<?php echo esc_html($settings['title_number']);?>" data-speed="5000"><?php echo esc_html($settings['title_number']);?></h5>
         <?php } ?>

         <?php 
         if ($settings['show_prefix'] == 'yes') { ?>
         <?php
        if(!empty($settings['counter_prefix']))
        { 
        ?>
         <span class="pt-counter-prefix"><?php echo esc_html($settings['counter_prefix']);?></span>
          <?php } ?>
          <?php } ?>
          
      </div>
      <?php
        if(!empty($settings['description']))
        { 
        ?>
      <p class="pt-counter-description"><?php echo esc_html($settings['description']);?></p>
      <?php } ?>
   </div>
   
</div>

