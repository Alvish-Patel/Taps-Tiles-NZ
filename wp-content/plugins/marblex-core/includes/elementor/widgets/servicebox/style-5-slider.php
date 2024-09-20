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


if($settings['service_style'] == '5' && $settings['service_inner_style'] == 'slider')
{
	$tabs = $this->get_settings_for_display( 'list_items' );

	$slider = new Slider_Controls();
	$slider->add_render_attribute($this ,$settings);

	?>

	<div class="pt-service-box-slider pt-style-5 <?php echo $settings['content_align']; ?>">
		<div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>
			<?php
			foreach($tabs as $key=>$item)
			{
				if (!empty($item['description_text'])) 
				{
					$desc_html = $this->parse_text_editor($item['description_text']);
				} 
				?>
				<div class="item">
					<div class="pt-service-box pt-style-5 <?php echo $settings['content_align']; ?>">
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
							<?php 
							$title = sprintf('<%2$s class="pt-service-title"><a %3$s>%1$s</a></%2$s>',$item['title_text'],$item['title_tag'],$this->get_render_attribute_string('title_link'.$key));
							echo $title; ?>
							<p><?php echo $desc_html; ?></p>
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
				<?php
			}
			?>
		</div>
	</div>
	<?php 
}
?>





