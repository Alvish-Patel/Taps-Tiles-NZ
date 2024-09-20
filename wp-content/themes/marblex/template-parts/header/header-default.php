<?php
/**
* Displays header widgets if assigned
*
* @package WordPress
* @subpackage marblex
* @since 1.0
* @version 1.0
*/
$sticky = 'pt-has-sticky';
$sidebar_logo = '';
$pqf_options = get_option('pqf_options');

if(isset($pqf_options['sticky_header_enable']) && $pqf_options['sticky_header_enable'] == 0)
{
	$sticky = '';
}
?>
<div class="pt-background-overlay"></div>

<header id="pt-header" class="pt-header-default <?php echo esc_attr($sticky); ?> ">
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
	<div class="pt-top-header <?php echo esc_attr($top_header_class); ?>">
		<div class="container">
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
		<div class="container">
			<div class="row">
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
						<?php 
						if(class_exists('ReduxFramework'))
						{
							if(isset($pqf_options['header_action_enable']) && $pqf_options['header_action_enable'] == 'yes' )
							{
								?>
								<div class="pt-btn-container">
									<?php
									if(isset($pqf_options['action_btn_url']) && !empty($pqf_options['action_btn_url']))
									{
										$url = $pqf_options['action_btn_url'];
									}
									else
									{
										$url = "#";
									} 
									?>

									<a href="<?php echo esc_url($url); ?>" class="pt-button pt-button-flat">
										<div class="pt-button-block">
											<?php
											if(isset($pqf_options['action_btn_text']) && !empty($pqf_options['action_btn_text']))
											{
												$text = $pqf_options['action_btn_text'];
											}
											else
											{
												$text = 'Book Now';
											}
											?>
											<span class="pt-button-text"><?php echo esc_html($text); ?></span>
											 <span class="pt-button-line-right"></span>
											 <i class="ion ion-ios-arrow-right"></i>
										</div>
									</a>

								</div>
								<?php
							}
						}
						?>
						
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fas fa-bars"></i>
						</button>					
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>