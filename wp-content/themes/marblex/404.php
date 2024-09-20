<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage marblex
 * @since 1.0
 * @version 1.0
 */

get_header(); 
$pqf_options = get_option('pqf_options');  
$title_text = 'Oops! This Page is Not Found.' ;
$desc_text = 'Please go back to home and try to find out once again.';
if(isset($pqf_options['title_404']) && !empty($pqf_options['title_404']))
{
	$title_text = $pqf_options['title_404'];
}

if(isset($pqf_options['description_404']) && !empty($pqf_options['description_404']))
{
	$desc_text = $pqf_options['description_404'];
}

?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="pt-not-found">
				<div class="page-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="pt-error-block">

								
								<div class="pt-errot-text"><?php esc_html_e( '404', 'marblex' ); ?></div>
								<h2><?php echo  esc_html($title_text); ?></h2>
								<p><?php echo esc_html( $desc_text ); ?></p> 
								<div class="pt-btn-block">

									
									<div class="pt-btn-container">
										<a href="<?php echo esc_url(home_url()); ?>" class="pt-button">
											<div class="pt-button-block">
												<span  class="pt-button-text"><?php esc_html_e('Back to Home', 'marblex'); ?></span>
												<span class="pt-button-line-right"></span>
												<i class="ion ion-ios-arrow-right"></i>
											</div>  
										</a>
									</div>	              
								</div>    
								
							</div>
						</div>
					</div>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->

<?php get_footer();