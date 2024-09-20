<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}
$settings = $this->get_settings();
$tabs = $this->get_settings_for_display( 'tabs' );

?>
<div class=" pt-timelines"  >

	<div class="cntl">

		<span class="cntl-bar cntl-center">
			<span class="cntl-bar-fill"></span>
		</span>

		<div class="cntl-states">
			<?php foreach ($tabs as $key => $value) {
				 ?>
			<div class="cntl-state">
				<div class="cntl-content">
					<h4><?php echo esc_html($value['title_text']); ?></h4>
					<p><?php echo esc_html($value['description_text']); ?></p>
				</div>
				<div class="cntl-image"><img src="<?php echo esc_url($value['image']['url']); ?>" alt="history-image"></div>
				<div class="cntl-icon cntl-center"><?php echo esc_html($value['title_number']); ?></div>
			</div>

		<?php } ?>

		</div>

	</div>

</div>