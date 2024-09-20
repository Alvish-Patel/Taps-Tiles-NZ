<?php

/**
 * Template Status
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

global $wpdb;

if(!function_exists('Pcfq_Status_Info_Helper')){
    function Pcfq_Status_Info_Helper() {
        return Pcfq_Status_Info_Helper::instance();
    }
}

if ( !class_exists( "Pcfq_Status_Info_Helper" ) ){
	class Pcfq_Status_Info_Helper{
		protected static $instance = null;

		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}    
		
		public function pfcq_let_to_num( $v ) {
			$l = substr($v, -1);
			$ret = substr($v, 0, -1);
			switch(strtoupper($l)){
			   case 'P': $ret *= 1024;
			   case 'T': $ret *= 1024;
			   case 'G': $ret *= 1024;
			   case 'M': $ret *= 1024;
			   case 'K': $ret *= 1024;
			   break;
			}
  			return $ret;
 		}

		public function memory_limit(){
			$limit = $this->pfcq_let_to_num( WP_MEMORY_LIMIT );
			if ( function_exists( 'memory_get_usage' ) ) {
				$limit = max( $limit, $this->pfcq_let_to_num( @ini_get( 'memory_limit' ) ) );
			}

			return $limit;
		}

	}
}

?>
<div class="wrap Pcfq-wrap-status_panel">
	

	<table class="Pcfq-status-table_panel info_table widefat" cellspacing="0">
		<thead>
			<tr>
				<th colspan="4"><?php esc_html_e( 'Server Info', 'marblex' ); ?></th>
			</tr>
		</thead>
		<tbody>
		    <tr>
		      <td><?php esc_html_e( 'PHP Version', 'marblex' ); ?>:</td>
		      <td>
				
		      	<?php
		      		$php_requirements = 5.3;
					if ( version_compare( phpversion(), $php_requirements, '<' ) ) {
						?>
						<span class="message_info message_info-error">
							<span class="dashicons dashicons-warning"></span>
								<?php
									echo esc_html( phpversion() );
									esc_html_e( '- We recommend a minimum PHP version of ', 'marblex');
									echo esc_html($php_requirements);
								?>
						</span>
						<?php
					} else {
						?>
							<span class="message_info message_info-success"><?php echo esc_html( phpversion() ); ?></span>
						<?php
					}
		      	?>	

		      	</td>
		    </tr>	    
		    <tr>
		      <td><?php esc_html_e( 'PHP Post Max Size', 'marblex' ); ?>:</td>
		      <td>
		      		<span class="message_info message_info-info info">
						<span class="dashicons dashicons-warning"></span>
							<?php
								
								
								echo esc_html(size_format(Pcfq_Status_Info_Helper()->pfcq_let_to_num((ini_get('post_max_size')))));
							?>
							<br/>
							<a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
								<?php
								esc_html_e( ' How you can change this', 'marblex');
								?>	
							</a>
					</span>
		      		
		      	</td>
		    </tr>		    

		    <tr>
		      <td><?php esc_html_e( 'PHP Max Execution Time Limit', 'marblex' ); ?>:</td>
		      <td>
		      	
		      	<?php
		      	$max_execution_time_requirements = 600;
		      	
		      	if ( $max_execution_time_requirements > ini_get('max_execution_time') ) {
		      		?>
		      		<span class="message_info message_info-error">
		      			<span class="dashicons dashicons-warning"></span>
		      			<?php
		      				echo esc_html( ini_get('max_execution_time') );
		      				esc_html_e( '- We recommend setting max execution time to at least ', 'marblex');
		      				echo esc_html($max_execution_time_requirements);
		      			?>
		      			<br/>
		      			<a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
		      				<?php
		      				esc_html_e( ' How you can change this', 'marblex');
		      				?>	
		      			</a>
		      		</span>
		      		<?php
		      	}
		      	else{
		      		?>
		      		<span class="message_info message_info-success"><?php echo esc_html(ini_get('max_execution_time')); ?></span>
		      		<?php
		      	}
		      	?>	
		      	</td>
		    </tr>			    

		    <tr>
		      <td><?php esc_html_e( 'PHP Max Input Time', 'marblex' ); ?>:</td>
		      <td>
		      	
		      	<?php
		      	$max_input_time_requirements = 600;
		      	if ( $max_input_time_requirements > ini_get('max_input_time') ) {
		      		?>
		      		<span class="message_info message_info-error">
		      			<span class="dashicons dashicons-warning"></span>
		      			<?php
		      				echo esc_html(ini_get('max_input_time'));
		      				esc_html_e('- We recommend setting max input time to at least ', 'marblex');
		      				echo esc_html($max_input_time_requirements);
		      			?>
		      			<br/>
		      			<a target="_blank" href="http://www.wpbeginner.com/wp-tutorials/how-to-increase-the-maximum-file-upload-size-in-wordpress/">
		      				<?php
		      				esc_html_e( ' How you can change this.', 'marblex');
		      				?>	
		      			</a>
		      		</span>
		      		<?php
		      	}
		      	else{
		      		?>
		      		<span class="message_info message_info-success"><?php echo esc_html(ini_get('max_input_time')); ?></span>
		      		<?php
		      	}
		      	?>	
		      	</td>
		    </tr>		    

		    <tr>
		      <td><?php esc_html_e( 'PHP Max Input Vars', 'marblex' ); ?>:</td>
		      <td>
		      	<?php
		      	$max_input_vars = 3000;
		      	
		      	if ( $max_input_vars > ini_get('max_input_vars') ) {
		      		?>
		      		<span class="message_info message_info-error">
		      			<span class="dashicons dashicons-warning"></span>
		      			<?php
		      				echo esc_html(ini_get('max_input_vars'));
		      				echo sprintf( esc_html__( '. We recommend minimum value: %d. Max input vars limitation will truncate POST data such as menus.' , 'marblex' ) ,$max_input_vars );
		      			?>
		      			<br/>
		      			<a target="_blank" href="https://premium.wpmudev.org/forums/topic/increase-wp-memory-limit-php-max-input-vars/">
		      				<?php
		      				esc_html_e( ' How you can change this.', 'marblex');
		      				?>	
		      			</a>
		      		</span>
		      		<?php
		      	}
		      	else{
		      		?>
		      		<span class="message_info message_info-success"><?php echo esc_html(ini_get('max_input_vars')); ?></span>
		      		<?php
		      	}
		      	?>		
		      	</td>
		    </tr>		    
		    <tr>
		      <td><?php esc_html_e( 'MySql Version', 'marblex' ); ?>:</td>
		      <td><?php echo (!empty( $wpdb->is_mysql ) ? $wpdb->db_version() : ''); ?></td>
		    </tr>		    
		    <tr>
		      <td><?php esc_html_e( 'Max upload size', 'marblex' ); ?>:</td>
		      <td>
		      	<?php
		      		$max_upload_size = 134217728;
		      		if ( $max_upload_size > wp_max_upload_size() ) {
		      		?>
			      		<span class="message_info message_info-error">
			      			<span class="dashicons dashicons-warning"></span>
			      			<?php
			      				echo esc_html(size_format(wp_max_upload_size()));
			      				esc_html_e( '. We recommend minimum value: 128 MB.' , 'marblex')
			      			?>
			      			<br/>
			      			<a target="_blank" href="https://premium.wpmudev.org/forums/topic/increase-wp-memory-limit-php-max-input-vars/">
			      				<?php
			      				esc_html_e( ' To see how you can change this please check this guide', 'marblex');
			      				?>	
			      			</a>
			      		</span>
			      		<?php
			      	}
			      	else{
			      		?>
			      		<span class="message_info message_info-success"><?php echo esc_html(size_format(wp_max_upload_size())); ?></span>
			      		<?php
			      	}
		      	?>
		      </td>
		    </tr>

		  </tbody>
	</table>	

	<table class="Pcfq-status-table_panel info_table widefat" cellspacing="0">
		<thead>
			<tr>
				<th colspan="4"><?php esc_html_e( 'WordPress Info', 'marblex' ); ?></th>
			</tr>
		</thead>
		<tbody>
		        
		    <tr>
		      <td><?php esc_html_e( 'Version', 'marblex' ); ?>:</td>
		      <td><?php echo esc_html(get_bloginfo( 'version' )); ?></td>
		    </tr>		    
		    <tr>
		      <td><?php esc_html_e( 'Memory Limit', 'marblex' ); ?>:</td>
		      <td>		      	
		      	<?php
		      	$memory_limit = 134217728;
		      	
		      	if ( $memory_limit > Pcfq_Status_Info_Helper()->memory_limit() ) {
		      		?>
		      		<span class="message_info message_info-error">
		      			<span class="dashicons dashicons-warning"></span>
		      			<?php
		      				echo esc_html(size_format(Pcfq_Status_Info_Helper()->memory_limit()));
		      				esc_html_e( ' .We recommend setting memory to be at least 128MB.' , 'marblex')
		      			?>
		      			<br/>
		      			<a target="_blank" href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP">
		      				<?php
		      				esc_html_e( ' To see how you can change this please check this guide', 'marblex');
		      				?>	
		      			</a>
		      		</span>
		      		<?php
		      	}
		      	else{
		      		?>
		      		<span class="message_info message_info-success">
		      			<?php echo esc_html(size_format(Pcfq_Status_Info_Helper()->memory_limit())); ?>
		      		</span>
		      		<?php
		      	}
		      	?>	
		      </td>
		    </tr>
		   
		  </tbody>
	</table>

			<div class="Pcfq-btn-holder">
    				<a  class="button button-primary button-prev" href="<?php echo esc_url(admin_url('admin.php?page=Pcfq-activate-theme-panel')); ?>">
				<span class="text-btn"><?php esc_html_e( 'Prev Step', 'marblex' ); ?></span>
				</a>
				<a  class="button button-primary button-next" href="<?php echo esc_url(admin_url('admin.php?page=Pcfq-plugins-panel')); ?>">
				<span class="text-btn"><?php esc_html_e( 'Next Step', 'marblex' ); ?></span>
				</a>

			</div>		
</div>
