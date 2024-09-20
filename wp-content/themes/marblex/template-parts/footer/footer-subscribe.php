<?php
if(class_exists('ReduxFramework'))
{
	$logo = '';
	$pqf_options = get_option('pqf_options');
	if(isset($pqf_options['subscribe_img']) && !empty($pqf_options['subscribe_img']['url']))
	{
		$img = $pqf_options['subscribe_img']['url'];
	}
	else
	{
		$img = '';
	}

	?>
	<div class="pt-subscribe align-items-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12"> 
					<div class="pt-subscribe-bg">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="pt-footer-logo">
								<?php
								if(!empty($pqf_options['logo_footer']['url']))
								{
									$logo = $pqf_options['logo_footer']['url'];
									?>
									<img src="<?php echo esc_url($logo) ?>" class="pt-footer-logo" alt="<?php esc_attr_e('marblex-footer-logo','marblex'); ?>">
									<?php
								}
								?>
							</div>
							</div>
							<div class="col-lg-6 align-self-center">
								<div class="pt-subscribe-from">
									<?php
									if(isset($pqf_options['subscribe_shortcode']) && !empty($pqf_options['subscribe_shortcode']))
									{
										echo do_shortcode($pqf_options['subscribe_shortcode']);
									}

									?>
								</div>
							</div>
						</div>
					</div>
				</div>



			</div>

		</div>
	</div>
	<?php } ?>