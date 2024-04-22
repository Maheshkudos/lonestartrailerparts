<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lonestartrailerparts
*/

?>
</div>
<?php
	$block_fields                 = get_fields( $block['id'] );
	$option_fields                = get_fields( 'option' );
	$footer_logo                  = ( isset( $option_fields['lstp_footer_logo'] ) ) ? $option_fields['lstp_footer_logo'] : null;
	$footer_content               = ( isset( $option_fields['lstp_footer_content'] ) ) ? $option_fields['lstp_footer_content'] : null;
	$footer_address_information   = ( isset( $option_fields['lstp_footer_address_information'] ) ) ? $option_fields['lstp_footer_address_information'] : null;
	$footer_copyright             = ( isset( $option_fields['lstp_footer_copyright'] ) ) ? $option_fields['lstp_footer_copyright'] : null;
?>
	<footer id="colophon" class="site-footer">
		<div class="footer-main bg-air-force-blue pt-130 pb-90 xl:pt-100 xl:pb-70 mx:pt-70 mx:pb-50 md:py-50">
			<div class="container">
				<?php if(!empty($footer_logo)){ ?>
					<div class="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php echo wp_get_attachment_image( $footer_logo, "full"); ?>
						</a>
					</div>
				<?php } ?>
				<div class="footer-top">
					<?php if(!empty($footer_address_information)){ ?>
						<div class="cl-left">
							<?php
								foreach($footer_address_information as $address_list){
									$footer_company_title  = $address_list['footer_company_title'];
									$footer_address        = $address_list['footer_address'];
									$footer_address_link   = $address_list['footer_address_link'];
									$footer_phone_number   = $address_list['footer_phone_number'];
									$footer_social_list    = $address_list['footer_social_list'];
										$has_content = !empty($footer_company_title) || !empty($footer_address) || !empty($footer_phone_number) || !empty($footer_social_list);
										if($has_content){
							?>
							<div class="footer-content">
								<?php if(!empty($footer_company_title)){ ?>
									<h4 class="footer-menu-title"><?php echo $footer_company_title; ?></h4>
								<?php } ?>
                              
                                <?php if(!empty($footer_address) || !empty($footer_phone_number)){ ?>
								<div class="footer-address-item">
									<?php if(!empty($footer_address) || !empty($footer_address_link)){ ?>
										<a href="<?php echo $footer_address_link['url']; ?>" target="<?php echo $footer_address_link['target']; ?>">
											<span class="address"><?php echo $footer_address; ?></span>
										</a>
									<?php } else { ?>
										<?php if(!empty($footer_address)){ ?>
											<p class="address"><?php echo $footer_address; ?></p>
										<?php } ?>
									<?php } ?>
									<?php if(!empty($footer_phone_number)){ ?>
										<a class="" href="<?php echo $footer_phone_number['url']; ?>" target="<?php echo $footer_phone_number['target']; ?>"><?php echo     $footer_phone_number['title']; ?></a>
									<?php } ?>
								</div>
                              <?php } ?>
                              
								<?php if(!empty($footer_social_list)){ ?>
									<ul class="social-icons">
										<?php foreach ($footer_social_list as $key) { ?>
											<li>
												<?php
													$footer_socia_icon      = $key['social_icon'];
													$footer_sociallink_text = $key['link_text'];
													$footer_social_link     = $key['social_links'];
													$footer_social_text     = $key['social_text'];
												?>
												<?php if($footer_sociallink_text == 'text'){ ?>
													<?php if(!empty($footer_social_text) || !empty($footer_socia_icon) ){ ?>
														<?php echo $footer_social_link['title']; ?><?php echo $footer_social_text; ?>
													<?php } ?>
												<?php } else { ?>
													<?php if(!empty($footer_social_link) || !empty($footer_socia_icon) ){ ?>
														<a href="<?php echo $footer_social_link['url']; ?>" target="<?php echo $footer_social_link['target']; ?>">
															<?php echo wp_get_attachment_image( $footer_socia_icon, "full"); ?>
														</a>
													<?php } ?>
												<?php } ?>
											</li>
										<?php } ?>
									</ul>
								<?php } ?>
							</div>
							<?php } } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php if(!empty($footer_copyright)){ ?>
			<div class="footer-bottom py-42 xl:py-22 bg-bright-red">
				<div class="container">
					<div class="footer-links">
						<div class="cl-left-links md:text-center cp">
							<ul>
								<?php echo $footer_copyright; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</footer><!-- #colophon --><!-- .site-info -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>