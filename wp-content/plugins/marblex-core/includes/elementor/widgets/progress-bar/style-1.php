<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
$html = '';

$progress_bar = $this->get_settings_for_display( 'progress_bar' );
$align = '';

$settings = $this->get_settings();


?>

<?php 
if($settings['design_style'] == 1)
{
  ?>
  <div class="pt-progressbar-box pt-progressbar-style-1 <?php echo esc_attr( $align ); ?>">
    <?php foreach ($progress_bar as $index => $item ) {     
     ?>
     <div class="pt-progressbar-content">
      <span class="progress-title"><?php echo sprintf('%1$s',esc_html($item['section_title'],'gymster-core')) ; ?></span>
      <span class="progress-value"><?php echo ($item['tab_score']['size']);echo ($item['tab_score']['unit']); ?> </span>
      <div class="pt-progress-bar">
        <span data-width="<?php  echo $item['tab_score']['size']; ?>" class="show-progress"></span>
      </div>

    </div>
  <?php } ?>
</div>
<?php } 


