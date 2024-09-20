<?php
use peaceful\marblex\Helper;
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage marblex
 * @since 1.0
 * @version 3.4
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}


?>
<div id="comments" class="pt-comment-area">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
				<?php 
					$comments_number = get_comments_number();
					echo esc_html($comments_number); 
				?>
				<?php echo esc_html__('Comment', 'marblex'); ?>
		</h3>

		<ol class="commentlist">
			<?php wp_list_comments( array(
			'callback' => array(Helper::instance(),'comments'),
			'style'      => 'ol',			
			'avatar_size'=> 120,
			) );
		?>
		</ol><!-- .commentlist -->

		<?php the_comments_pagination( array(
			'prev_text' => Helper::instance()->get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Previous', 'marblex' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'marblex' ) . '</span>' . Helper::instance()->get_svg( array( 'icon' => 'arrow-right' ) ),
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'marblex' ); ?></p>
	<?php
	endif;
	$commenter = wp_get_current_commenter();
	
	$comments_args = array(
        // Change the title of send button 
        'label_submit' => esc_html__( 'Post comment', 'marblex' ),
        // Change the title of the reply section
        'title_reply' => esc_html__( 'Write a Reply or Comment', 'marblex' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
       
        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true"  cols="60" rows="6" placeholder="'.esc_attr__('Enter Your Comment' , 'marblex').'" ></textarea></p>',


);
comment_form( $comments_args );

	
	?>
</div><!-- #comments -->

