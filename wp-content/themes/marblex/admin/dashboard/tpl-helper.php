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

$allowed_html = array(
	'a' => array(
		'href' => true,
		'target' => true,
	),
);
?>
<div class="Pcfq-theme-helper">
	<div class="container-form">
		<h1 class="Pcfq-title">
			<?php echo esc_html__('Need Help?', 'marblex');?>
		</h1>
		<div class="Pcfq-content">
			<p class="Pcfq-content_subtitle">
				<?php
				echo wp_kses( __( 'Please read a <a target="_blank" href="https://themeforest.net/page/item_support_policy">Support Policy</a> before submitting a ticket and make sure that your question related to our product issues.', 'marblex' ), $allowed_html);
				?>
				<br/>
				<?php
				echo esc_html__('If You Did Not Find An Answer To Your Question, Feel Free To Contact Us.', 'marblex');
				?>
			</p>
		</div>
		<div class="Pcfq-row">			
			<div class="Pcfq-col Pcfq-col-4">
				<div class="Pcfq-col_inner">
					<div class="Pcfq-info-box_wrapper">
						<div class="Pcfq-info-box">
							<div class="Pcfq-info-box_icon-wrapper">
								<div class="Pcfq-info-box_icon">
									<img src="<?php echo CONST_MARBLEX_URI . '/admin/assest/img/doc.png'?>">
								</div>
							</div>
							<div class="Pcfq-info-box_content-wrapper">	
								<div class="Pcfq-info-box_title">
									<h3 class="Pcfq-info-box_icon-heading">
										<?php
										esc_html_e('Documentation', 'marblex');
										?>
									</h3>
								</div>					
								<div class="Pcfq-info-box_content">
									<p>
										<?php
										esc_html_e('Please Read The Documentation. All Functionality Will Mention Here To Resolve Your Issues.', 'marblex');
										?>
									</p>
								</div>		
								<?php 
								$documentation_link = 'https://documentation.peacefulqode.com/v/'.wp_get_theme().'-documentation/'; 
								?>
								<div class="Pcfq-info-box_btn">
									<a target="_blank" href="<?php echo esc_url($documentation_link); ?>">
										<?php
										esc_html_e('Visit Documentation', 'marblex');
										?>	
									</a>
								</div>
							</div>
						</div>			
					</div>	
				</div>
			</div>
			
			<div class="Pcfq-col Pcfq-col-4">
				<div class="Pcfq-col_inner">
					<div class="Pcfq-info-box_wrapper">
						<div class="Pcfq-info-box">
							<div class="Pcfq-info-box_icon-wrapper">
								<div class="Pcfq-info-box_icon">
									<img src="<?php echo CONST_MARBLEX_URI . '/admin/assest/img/mail.png'?>">
								</div>
							</div>
							<div class="Pcfq-info-box_content-wrapper">	
								<div class="Pcfq-info-box_title">
									<h3 class="Pcfq-info-box_icon-heading">
										<?php
										esc_html_e('Support Mail', 'marblex');
										?>
									</h3>
								</div>					
								<div class="Pcfq-info-box_content">
									<p>
										<?php
										esc_html_e('If Your Query Is Not Solved Then Submit A Ticket With A Good Description Of Your Issue.', 'marblex');
										?>
									</p>
									<h2>Email : peacefulthemes@gmail.com</h2>
								</div>		
								<div class="Pcfq-info-box_btn">
									<!-- <a target="_blank" href="https://webgeniuslab.ticksy.com"> -->
										<a href="mailto:peacefulthemes@gmail.com" target="_blank">
											<?php
											esc_html_e('Create a ticket', 'marblex');
											?>	
											
										</a>
									</div>
								</div>
							</div>			
						</div>	
					</div>
				</div>	

				<div class="Pcfq-col Pcfq-col-4">
					<div class="Pcfq-col_inner">
						<div class="Pcfq-info-box_wrapper">
							<div class="Pcfq-info-box">
								<div class="Pcfq-ribbon"><span>Recommend</span></div>
								<div class="Pcfq-info-box_icon-wrapper">
									<div class="Pcfq-info-box_icon">
										<img src="<?php echo CONST_MARBLEX_URI . '/admin/assest/img/customizing.png'?>">
									</div>
								</div>
								<div class="Pcfq-info-box_content-wrapper">	
									<div class="Pcfq-info-box_title">
										<h3 class="Pcfq-info-box_icon-heading">
											<?php
											esc_html_e('Theme Customization ', 'marblex');
											?>
										</h3>
									</div>					
									<div class="Pcfq-info-box_content">
										<p>
											<?php
											esc_html_e('If You Want To Customization Theme Core Function. Submit The Request Here With All Details.', 'marblex');
											?>
										</p>
										<h2>Email Us : peacefulthemes@gmail.com</h2>
									</div>		
									<div class="Pcfq-info-box_btn">
										<!-- <a target="_blank" href="https://webgeniuslab.ticksy.com"> -->
											<a href="https://peacefulqode.com/contact/" target="_blank">
												<?php
												esc_html_e('Create a Request', 'marblex');
												?>	

											</a>
										</div>
									</div>
								</div>			
							</div>	
						</div>
					</div>				
				
			</div>
			
		</div>
	</div>

