<?php
$header_option = get_field('key_pjros');
$pqf_options = get_option('pqf_options');
$sticky = '';

if(isset($pqf_options['sticky_header_enable']) && $pqf_options['sticky_header_enable'])
{
	$sticky = "pt-has-sticky";
}

if(isset($pqf_options['sidebar_logo']) && !empty($pqf_options['sidebar_logo']['url']))
{
	$sidebar_logo = $pqf_options['sidebar_logo']['url'];
}   

?>
<div class="pt-background-overlay"></div>
<div class="pt-sidebar">
	<div class="pt-close-btn">
		<a class="pt-close" href="javascript:void(0)">
			<i class="ti-close"></i>
		</a>
	</div>
	<div class="pt-sidebar-block mCustomScrollbar">
		<div class="pt-sidebar-header">
			<?php
			if(!empty($sidebar_logo))
			{
				?>
				<img src="<?php echo esc_url($sidebar_logo); ?>" class="pt-sidebar-logo" alt="<?php esc_attr_e('marblex-sidebar-logo','marblex'); ?>">
			<?php } ?>
		</div>
		<div class="pt-sidebar-content">
			<?php
			if(isset($pqf_options['sidebar_desc']) && !empty($pqf_options['sidebar_desc']))
			{
				?>
				<p><?php echo esc_html($pqf_options['sidebar_desc']); ?></p>
				<?php
			}
			?>
		</div>

		<div class="pt-sidebars">
			<?php dynamic_sidebar('pt_footer_6');
			?>
		</div>

		<div class="pt-sidebar-contact">
			<h2> Contact Info </h2>
			<ul class="pt-contact">
				<?php
				if(isset($pqf_options['address']) && !empty($pqf_options['address']))
				{
					?>
					<li>
						<i class="fa fa-map-marker"></i>
						<span>
							<?php echo esc_html($pqf_options['address']); ?>
						</span>
					</li>
				<?php } ?>

				<?php
				if(isset($pqf_options['phone']) && !empty($pqf_options['phone']))
				{
					?>
					<li>

						<a href="tel:<?php echo str_replace(str_split('(),-" '), '',$pqf_options['phone']); ?>"><i class="fa fa-phone"></i>
							<span><?php echo esc_html($pqf_options['phone']); ?></span>
						</a>
					</li>
				<?php } ?>

				<?php
				if(isset($pqf_options['email']) && !empty($pqf_options['email']))
				{
					?>
					<li>

						<a href="mailto:<?php echo esc_html($pqf_options['email']); ?>"><i class="fa fa-envelope"></i><span><?php echo esc_html($pqf_options['email']); ?></span></a>
					</li>
				<?php } ?>


			</ul>

		</div>
		<div class="pt-sidebar-social">
			<ul>
				<?php
				foreach ($pqf_options['social'] as $key => $value)
				{
					if(!empty($value))
					{
						?>
						<li><a href="<?php echo esc_url($value); ?>"><i class="fab <?php echo esc_attr($key); ?>"></i></a></li>

						<?php 
					} 
				} 
				?>
			</ul>
		</div>

	</div>
</div>
<header id="pt-header" class="pt-header-style-2 <?php echo esc_attr($sticky); ?>">
	<div class="pt-header-diff-block">
		<div class="row no-gutters">
			
			<div class="col-lg-12">
				<?php
				$top_header_class = '';
				if(function_exists('get_field'))
				{
					$header_option = get_field('field_QnF1Ebs');
					$header_style = get_field('key_pjroswaser');
					if($header_option == 'yes' && $header_style['top_header_select_style'] == 'top-one')
					{	
						$top_header_class = 'top-style-1';
					}
					else if($header_option == 'yes' && $header_style['top_header_select_style'] == 'top')
					{	
						$top_header_class = '';
					}
					elseif(isset($pqf_options['pt_top_header_style']) && $pqf_options['pt_top_header_style'] == 'top')
					{
						$top_header_class = '';
					}
					elseif(isset($pqf_options['pt_top_header_style']) && $pqf_options['pt_top_header_style'] == 'top-one')
					{
						$top_header_class = 'top-style-1';
					}
					else
					{
						$top_header_class = '';
					}
				}
				?>
				<div class="pt-top-header  <?php echo esc_attr($top_header_class); ?>">
					<div class="container-fluid p-0">
						<?php
						if(function_exists('get_field') && get_field('field_QnF1Ebs') != 'inherit')
						{
							$header_option = get_field('field_QnF1Ebs');
							$header_style = get_field('key_pjroswaser');
							if($header_option == 'yes' && $header_style['top_header_select_style'] == 'top')
							{
								get_template_part( 'template-parts/header/header', 'top' );
							}
							elseif($header_option == 'yes' && $header_style['top_header_select_style'] == 'top-one')
							{
								get_template_part( 'template-parts/header/header', 'top-one' );	
							}


						}
						elseif(class_exists('ReduxFramework'))
						{
							if($pqf_options['top_header_enable'] == 'yes')
							{
								if(isset($pqf_options['pt_top_header_style']) && $pqf_options['pt_top_header_style'] == 'top')
								{	
									get_template_part( 'template-parts/header/header', 'top' );
								} 
								elseif(isset($pqf_options['pt_top_header_style']) && $pqf_options['pt_top_header_style'] == 'top-one')
								{
									
									get_template_part( 'template-parts/header/header', 'top-one' );	
								}
								else
								{
									get_template_part( 'template-parts/header/header', 'top' );
								}
							}

						}
						?>
					</div>
				</div>
				<div class="pt-bottom-header">
					<div class="row no-gutters">
						<div class="col-lg-12">
							<nav class="navbar navbar-expand-lg navbar-light">
								<a class="navbar-brand" href="<?php  echo esc_url( home_url( '/' ) ); ?>">
									<?php marblex_display_logo(); ?> 
								</a>
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<?php if ( has_nav_menu( 'primary' ) ) : ?>
										<?php wp_nav_menu( array(
											'theme_location' => 'primary',
											'menu_class'  => 'navbar-nav ml-auto',
											'menu_id'     => 'pt-main-menu',
											'container_id' => 'pt-menu-contain',
											'container_class' => 'pt-menu-contain',
										) ); ?>
									<?php endif; ?>
								</div>
								<div class="pt-header-info-box">
									<div class="pt-menu-search-block">
										<?php get_template_part( 'template-parts/header/module/header','search'); ?>
									</div>
									<?php 
									
									if ( class_exists( 'WooCommerce' ) ) 
									{
										if(isset($pqf_options['header_cart_enable']) && $pqf_options['header_cart_enable'] == 'yes' )
										{

											?>
											<div class="pt-shop-btn">
												<div class="pt-cart-button"><?php echo do_shortcode( '[marblex-mini-cart]' ); ?></div>
											</div>
											<?php
										} } ?>

										<div class="pt-toggle-btn">
											<a href="javascript:void(0)" class='menu-toggle'>
												<span>menu</span>

											</a>
										</div>
									</div>
									<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<i class="fas fa-bars"></i>
									</button>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
