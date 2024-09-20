<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
$html = '';
$list = '';

$settings = $this->get_settings();



$tabs = $this->get_settings_for_display( 'list' );
foreach ( $tabs as $index => $item ){
   $list.='<li>
   				<h5>'.$item['list_item_title'].'</h5>
   				<span>'.$item['list_item_sub_title'].'</span>
   			</li>';
}




?>
<div class="pt-portfolio-info-box">
	<?php
	if($settings['list_main_item_title'] != '' || $settings['info_description'] != '')
	{
	?>
		<div class="pt-porfolio-info-header">
			<h5><?php echo esc_html($settings['list_main_item_title']); ?></h5>
			<p><?php echo esc_html($settings['info_description']); ?></p>
		</div>
	<?php
	}
	?>
	<div class="pt-porfolio-info">
		<ul class="pt-info-list">
			<?php echo $list; ?>
		</ul>
	</div>
</div>