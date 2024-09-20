<?php

/**
 * Template Activate Theme
 *
 * @link       https://themeforest.net/user/peacefuldesign
 * @since      1.0.0
 *
 * 
 * 
 */

/**
 * @since      1.0.0
 * 
 * 
 * @author     PeaceFulThemes
 */

?>
<div class="Pcfq-activation-theme_form">
	<div class="container-form">
		<?php
			if(!Pcfq_Theme_Helper::pcfq_purchase_verify()):
		?>
			<h1 class="Pcfq-title"><?php esc_html_e( 'Activate your Licence', 'marblex' ); ?></h1>
			<div class="Pcfq-content">
				<p class="Pcfq-content_subtitle">
					<?php echo sprintf( esc_html__('Welcome and thank you for Choosing %s Theme!', 'marblex'), esc_html(wp_get_theme()->get('Name')));?>
					<br/>
					<?php echo sprintf(esc_html__('The %s theme needs to be activated to enable all features, import demo and Support.', 'marblex'), esc_html(wp_get_theme()->get('Name')));?>
				</p>
			</div>
			
			<form class="form Pcfq-purchase" action="<?php echo esc_url( admin_url( 'admin.php?page=Pcfq-activate-theme-panel' ) ); ?>" method="post">
				<div class="help-description">
					<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e('How to find purchase code?', 'marblex');?></a>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label class="form-label" for="user_email"><?php esc_html_e( 'E-mail address', 'marblex' ); ?></label>
						<input class="form-control" type="text" placeholder="<?php esc_attr_e( 'E-mail address', 'marblex' ); ?>" name="user_email" value="<?php echo esc_attr( get_option('admin_email') ); ?>" required>
					</div>

					<div class="form-group">
						<label class="form-label" for="purchase_item"><?php esc_html_e( 'Enter Your Purchase Code', 'marblex' ); ?></label>
						<input class="form-control" placeholder="<?php esc_attr_e( 'Enter Your Purchase Code', 'marblex' ); ?>" type="text" name="purchase_item" required>
					</div>					
				</div>


				<?php wp_nonce_field( 'purchase-activation', 'security' ); ?>

				<input type="hidden" name="action" value="theme_activation">

				<input type="hidden" name="content">
				<input type="hidden" name="js_activation">

				<button type="submit" class="button button-primary activate-license" value="submit">
					<span class="text-btn"><?php esc_html_e( 'Activate', 'marblex' ); ?></span>
					<span class="loading-icon"></span>
				</button>
			</form>	

		<?php
			else:
				$js_activation = get_option( 'pcfq_js_activation_data' );
				$deactivation_form = ' deactivation_form';
				
			?>
				<div class="Pcfq-activation-theme_congratulations">
	    			<h1 class="Pcfq-title">
	    				<span>
	    					<?php esc_html_e( 'Thank you!', 'marblex' ); ?>
	    				</span>
	    				<br/>
	    				<?php esc_html_e( 'Your theme\'s license is activated successfully.', 'marblex' ); ?>
	    			</h1>
    			</div>
    			<form class="form Pcfq-deactivate_theme<?php echo esc_attr($deactivation_form);?>" action="" method="post">
    				<div class="form-group hidden_group">
    					<input type="hidden" name="deactivate_theme" value="1" class="form-control">
    				</div>

					

					<?php wp_nonce_field( 'purchase-activation', 'security' ); ?>

					<button type="submit" class="button button-primary deactivate_theme-license" value="submit" onclick="return confirm_deactivate();">
						<span class="text-btn"><?php esc_html_e( 'Deactivate', 'marblex' ); ?></span>
						<span class="loading-icon"></span>
					</button>
    			</form>

    			
			
    		<?php
			endif;
		?>	

		<div class="text-desc-info">
			
				<h1><?php esc_html_e('Important Note:' , 'marblex') ?></h1>
				<ul>
					<li>
					<?php esc_html_e('The purchase code is valid only for two domains. One for devlopment and other for production.' , 'marblex') ?></li>
					<li>
						<?php esc_html_e('If you want to use purchase code on third domain then you have to deactivate one domain.' , 'marblex') ?>
					</li>
					
				</ul>

					<p class="text-desc-info_author"><?php esc_html_e('If you want to buy more license then follow the link:', 'marblex');?>
				<a target="_blank" href="https://themeforest.net/item/marblex-construction-engineering-wordpress-theme/27026518">ThemeForest peacefuldesign </a>
			</p>

			
			
			
		
		</div>

		<div class="Pcfq-btn-holder">
    				<a  class="button button-primary button-prev" href="<?php echo esc_url(admin_url('admin.php?page=Pcfq-dashboard-panel')); ?>">
				<span class="text-btn"><?php esc_html_e( 'Prev Step', 'marblex' ); ?></span>
				</a>
				<a  class="button button-primary button-next" href="<?php echo esc_url(admin_url('admin.php?page=Pcfq-status-panel')); ?>">
				<span class="text-btn"><?php esc_html_e( 'Next Step', 'marblex' ); ?></span>
				</a>

			</div>	
	</div>

</div>

<script type="text/javascript">
	function confirm_deactivate()
	{
		var c = confirm('Are you sure?');
		if(c == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>

