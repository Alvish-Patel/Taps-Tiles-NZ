<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage marblex
 * @since 1.0
 * @version 1.2
 */
$pqf_options = get_option('pqf_options');
?>
</div><!-- #content -->
<!-- Footer start -->

<footer id="pt-footer">
  <?php
  if(class_exists('ReduxFramework'))
  {  
    ?>
    <div class="pt-footer-style-1">
    <?php } 

    if(isset($pqf_options['footer_subscribe']) && $pqf_options['footer_subscribe'] == 'yes')
    {
      get_template_part( 'template-parts/footer/footer', 'subscribe' );  
    }


    get_template_part( 'template-parts/footer/footer', 'widgets' );

    get_template_part( 'template-parts/footer/site', 'info' );

    ?>
    <?php
    if(class_exists('ReduxFramework'))
    {  
      ?>
    </div>
  <?php } ?>

</footer>
<!-- Footer stop-->

</div><!-- .site-content-contain -->
</div> <!-- Peaceful themes -->
</div><!-- #page -->


<!-- === back-to-top === -->
<div id="back-to-top">
  <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
</div>
<!-- === back-to-top End === -->

<?php wp_footer(); ?>
</body>
</html>
