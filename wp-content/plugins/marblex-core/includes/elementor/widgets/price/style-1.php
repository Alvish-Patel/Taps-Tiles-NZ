<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 

$settings   = $this->get_settings();
$tabs       = $this->get_settings_for_display('tabs');
$align      = $settings['align'];


$active = $settings['active'];
if ($active === "yes") {
 $align .= ' active';
}

if ($settings['price_style'] === "1") {
  ?>

  <div class="pt-pricebox pt-style-1 <?php echo esc_attr($align); ?> ">
    <div class="pt-pricebox-info">
      <div class="pt-price-content">
       <h5 class="pt-pricebox-title"> <?php echo esc_html($settings['title']); ?></h5>
        <h2 class="price"> <span class="dollar"><?php echo esc_html($settings['price_currency']); ?></span><?php echo esc_html($settings['price']); ?> <span class="price-month"><?php echo esc_html($settings['price_duration']); ?></span></h2>
     </div>
     <ul class="pt-list-info">
      <?php
      foreach ($tabs as $index => $item) {

        if($item['enable_disable'] == 'yes')
        {
          $class = 'active';
        }                   
        else
        {
          $class = '';
        }  
        ?>
        <li class="<?php echo $class; ?>" >
          <i aria-hidden="true" class="<?php echo esc_html($item['plan_icons']['value']); ?>"></i>
          <?php 
          if (!empty($item['plan_title'])) {

            $desc_html = $this->parse_text_editor($item['plan_title']);

          } else {

            $desc_html = "";

          }?>
          <span> <?php echo $desc_html; ?></span>
        </li>
      <?php }?>
    </ul>
    
    <?php
    if($settings['show_button'] == 'yes')
    {

      require  MARBLEX_CORE_DIR . '/includes/elementor/widgets/button/style.php';
    }
    ?>
  </div>
  <div class="pt-pricebox-media">
     <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="pt-price-img" class="pt-price-img" >
  </div>
</div>
<?php } ?>





