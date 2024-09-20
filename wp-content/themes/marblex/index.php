<?php
use peaceful\marblex\Helper;
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage marblex
 * @since marblex 1.0
 */

get_header(); 
$pqf_options = get_option('pqf_options'); 
?>

<div class="peacefulthemes-contain-area">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<?php
					$flag = 1;				
					$row = 'row';
					$blogcol = 'col-xl-12 col-lg-12 col-md-12';
					$sidecol = 'col-xl-4 col-lg-4 col-md-12';
					$mainblogcol = 'col-lg-8 col-xl-8 col-md-12';
					
					if(is_active_sidebar('sidebar-1'))
					{
						$sidebar = true;
						$mainblogcol = 'col-lg-8 col-xl-8 col-md-12';
					}
					else
					{
						$sidebar = false;
						$mainblogcol = 'col-lg-12';
					}
					if(isset($pqf_options['blog_layout']))
					{

						if($pqf_options['blog_layout']  === 'one-column'){
							$row = 'row';
							$blogcol = 'col-lg-12';
						} 
						else if($pqf_options['blog_layout']  === 'two-column'){
							$row = 'row';
							$blogcol = 'col-lg-6';					
							
						} 

						else if($pqf_options['blog_layout']  === 'three-column'){
							$row = 'row';
							$blogcol = 'col-lg-4';					
							
						} 

						else if($pqf_options['blog_layout']  === 'four-column'){
							$row = 'row';
							$blogcol = 'col-lg-3';					
							
						} 
					}
				
					if(isset($pqf_options['pt_blog_sidebar']))
					{
						if($pqf_options['pt_blog_sidebar']  === 'no_sidebar'){
						$sidebar = false;
						$mainblogcol = 'col-lg-12';
						}

						else if($pqf_options['pt_blog_sidebar']  === 'right_sidebar'){
							if(!is_active_sidebar('sidebar-1'))
							{
								$sidebar = false;
								$mainblogcol = 'col-lg-12';
							}
							else
							{
								$sidebar = true;
							}
							
							$row = 'row';
						}

						else if($pqf_options['pt_blog_sidebar']  === 'left_sidebar'){
							if(!is_active_sidebar('sidebar-1'))
							{
								$sidebar = false;
								$mainblogcol = 'col-lg-12';
							}
							else
							{
								$sidebar = true;
							}
							$row = 'row flex-row-reverse';
						}
					}

					
				?>
				<div class="<?php echo esc_attr($row , 'marblex'); ?>">
					
					<?php if ( have_posts() ){
						if($flag == 1){
							echo '<div class="'.esc_attr($mainblogcol).'">
									<div class="row">';
						
								// Start the loop.
								while ( have_posts() ){
									the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									echo '<div class="'.esc_attr($blogcol,'marblex').'">';
										get_template_part( 'template-parts/post/content', get_post_format() );
									echo '</div>'; //End $blogcol class div
									
									// End the loop.
								}

								Helper::instance()->pagination();
							echo '</div></div>'; //End $blogcol class div

							// Previous/next page navigation.
												
					
						

						if($sidebar){
						?>
							<div class="<?php echo esc_attr($sidecol , 'marblex'); ?>">
								<?php get_sidebar(); ?>
							</div>
						<?php 
						
						} 

						
				}	

				if($flag == 0){			
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						echo '<div class="'.esc_attr($blogcol,'marblex').'">';
							get_template_part( 'template-parts/post/content', get_post_format() );
						echo '</div>';
						
						// End the loop.
					}
			

					// Previous/next page navigation.
					
			
			 	} 
			}
			else
			{
				get_template_part( 'template-parts/post/content', get_post_format() );

			}
			
			?>
			
				</div> 

				

				<!-- .Row -->
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
</div>
<?php get_footer(); ?>
