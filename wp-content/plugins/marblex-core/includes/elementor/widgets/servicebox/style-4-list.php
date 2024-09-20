<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$settings = $this->get_settings();

$title_html = '';
$desc_html = '';


if($settings['service_style'] == '4')
{
	$tabs = $this->get_settings_for_display( 'list_items' );
	?>
	<div class="pt-service-box-4-list <?php echo $settings['content_align']; ?>">
		<?php
		foreach($tabs as $key=>$item)
		{


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
			?>
			<div class="item">
				<div class="pt-service-box pt-style-4">
					<div class="pt-service-img">
						<?php
						if(!empty($item['image']['url'])) 
						{
							?>
							<img decoding="async" src="<?php echo esc_url($item['image']['url']); ?>" alt="service-image">
							<?php 
						}
						?>
					</div>
					<div class="pt-service-box-title">
						<?php 
						$title = sprintf('<%2$s class="pt-service-box-title pt-hover-none">%1$s</%2$s>',$item['title_text'],$item['title_tag']);
						echo $title;
						?>
					</div>
					<?php if($item['show_button'] == 'yes')
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
				<?php } ?>
				
			</div>
		</div>
		<?php
	}
	?>
</div>
<?php 
}
?>