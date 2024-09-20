<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;
$settings = $this->get_settings();
?>
<div class="pt-section-title pt-style-1 <?php echo $settings['content_align']; ?> ">
   <?php
	if(!empty($settings['sub_title_text']))
	{
		?>
   		 <span class="pt-section-sub-title"><?php echo esc_html($settings['sub_title_text']); ?></span>
		<?php
	} 
	if(!empty($settings['title_text']))
	{
		?>
		<h5 class="pt-section-main-title"><?php echo esc_html($settings['title_text']); ?></h5>
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
