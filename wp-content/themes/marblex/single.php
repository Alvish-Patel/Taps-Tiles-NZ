<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage marblex
 * @since 1.0
 * @version 1.0
 */

get_header();

$pqf_options = get_option('pqf_options');

$row = 'row';
if(is_active_sidebar('sidebar-1'))
{
	$sidebar = true;
	$blogcol = 'col-lg-8 col-xl-8 col-md-12';
}
else
{
	$sidebar = false;
	$blogcol = 'col-lg-12 col-xl-12 col-md-12';	
}
if(isset($pqf_options['single_blog_sidebar']))
{
	if($pqf_options['single_blog_sidebar']  === 'no_sidebar')
	{
	$sidebar = false;
	$blogcol = 'col-xl-12 col-lg-12 col-md-12';
	}
	else if($pqf_options['single_blog_sidebar']  === 'right_sidebar'){
		$sidebar = true;
		$row = 'row';
	}

	else if($pqf_options['single_blog_sidebar']  === 'left_sidebar'){
		$sidebar = true;
		$row = 'row flex-row-reverse';
	}	
}

?>
<div class="peacefulthemes-contain-area">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="<?php echo esc_attr($row); ?>">
					<div class="<?php echo esc_attr($blogcol); ?>">					
					<?php
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/post/content', get_post_format() );
					endwhile; // End of the loop. ?>
					</div>
					<?php if ( $sidebar ) { ?>		
					<div class="col-xl-4 col-lg-4 col-md-12">
						<?php get_sidebar(); ?>
					</div>
					<?php } ?>
				</div>
			</div><!-- #primary -->
		</main><!-- #main -->
	</div><!-- .container -->
</div>

<?php get_footer(); ?>