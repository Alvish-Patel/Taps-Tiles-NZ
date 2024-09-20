<?php 
use peaceful\marblex\Helper;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
  $pqf_options = get_option('pqf_options');  
  $current_queried_post_type = get_post_type( get_queried_object_id() );
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

	// Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
  ?>
  <div class="pt-blog-post">
    <div class="pt-post-media">
      <?php
      if(has_post_thumbnail())
      {
        the_post_thumbnail();
        ?>
        <div class="pt-post-category">
         <?php
         $i =0;
         $categories = get_the_category( get_the_ID() );
         foreach( $categories as $category ) {
          if($i==0)
          {
            ?>
            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_attr( $category->name ) ?></a>
            <?php   
            $i++;     
          }}         
          ?> 
        </div>
        <?php
      } 

      the_content();

      
      ?>
    </div>
    <div class="pt-blog-contain">
      <?php
      $archive_year  = get_the_time( 'Y' ); 
      $archive_month = get_the_time( 'm' ); 
      $archive_day   = get_the_time( 'd' ); 
      $date_format = get_option( 'date_format' );

      if($current_queried_post_type == 'page' || $current_queried_post_type == 'post' )
      {
        ?>
        <div class="pt-post-meta">
         <ul>
           <li class="pt-post-meta"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo esc_html( get_the_date( $date_format, get_the_ID() ) ); ?></a>
           </li>
           <li class="pt-post-comment">
            <?php
            if(get_comments_number(get_the_ID()) == 1)
            {
              $comment = esc_html__('Comment','marblex');
            }
            else
            {
              $comment = esc_html__('Comments','marblex');
            }
            ?>
            <a href="<?php the_permalink(); ?>"><?php echo get_comments_number(get_the_ID()).' '.$comment; ?></a>
          </li>

        </ul>
      </div>

      <?php
    }
    
    if(!is_single())
    {
      ?>
      <h5 class="pt-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
      <?php 
    }

    if(!is_single())
    {
      the_excerpt();
      wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'marblex' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      ) );

      $btn_text = 'Read More';
      if(isset($pqf_options['blog_btn_text']) && !empty($pqf_options['blog_btn_text']))
      {
        $btn_text = $pqf_options['blog_btn_text'];
      } 

      if($current_queried_post_type == 'page' || $current_queried_post_type == 'post' )
      {
        ?>            

        <div class="pt-btn-container">
          <a href="<?php the_permalink(); ?>" class="pt-button">
            <div class="pt-button-block">
              <span  class="pt-button-text"><?php echo esc_html($btn_text); ?></span>
              <span class="pt-button-line-right"></span>
              <i class="ion ion-ios-arrow-right"></i>
            </div>  
          </a>
        </div>
        <?php 
      }
    }

    
    ?>
    
    
  </div>
</div>


<?php 

if(is_single())
{
 Helper::instance()->Pev_next_post_data();  
}

if(isset($pqf_options['enable_comment']))
{
  $options = $pqf_options['enable_comment'];
  if($options == "yes")
  {
   if(is_single()){
				// If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
     comments_template();
 endif;

}
}
}
else {
  if(is_single()){
			// If comments are open or we have at least one comment, load up the comment template.
   if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;

}

}

?>
</article><!-- #post-## -->