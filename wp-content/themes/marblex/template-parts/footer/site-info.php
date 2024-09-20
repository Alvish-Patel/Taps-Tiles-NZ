<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage marblex
 * @since 1.0
 * @version 1.0
 */
$pqf_options = get_option('pqf_options'); 
?>

<div class="pt-copyright-footer">
	<div class="container">
		<div class="row">	
			<div class="col-md-12 align-self-center">		
				<?php
				if(isset($pqf_options['copyright_text']) && !empty($pqf_options['copyright_text']))
				{ 
					?>
					<span class="pt-copyright"><?php echo esc_html( $pqf_options['copyright_text'] ); ?></span>				
				<?php }
				else
				{
					?>				
					
					<span class="pt-copyright"><?php printf( esc_html__( 'Proudly powered by %s', 'marblex' ), 'marblex.' ); ?></span>				

				<?php } ?>
				
			</div>		
			
		</div>
	</div>
	
</div>