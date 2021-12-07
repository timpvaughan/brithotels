<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brit_Hotels
 */

?>



</div><!-- #content -->





	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer-wrap">
						<?php
						$telephone = get_field('brithotels_telephone',  'option');
						if($telephone == '' || $telephone == '#'){
							echo '<h4><a href="tel:+44 (0) 20 7373 0027" title="Call Brit Hotels Dashboard">+44 (0) 20 7373 0027</a></h4>';
						}
						else{
							echo '<h4><a href="tel:'.$telephone.'" title="Call Brit Hotels Dashboard">'.$telephone.'</a></h4>';
						}
						?>
						<!--<h4>+44 (0) 20 7703 0011</h4>-->
						<p class="footer-nav"></p>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'menu_id'        => 'footer-menu',
								'menu_class'     => 'footer-nav',
							) );
						?>
						
						
									<div class="row justify-content-md-center footer-icons">
										<div class="col col-lg-1">
											<a href="https://www.instagram.com/brit_hotels" target="_blank" title="Link to Instagram"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/instagram.svg" alt="Instagram Logo" /></a>
										</div>
									</div>


						<p class="copyright-text"><?php echo sprintf(__('All rights reserved 2020 © Brit Hotels • Website by <a href="%s">Cross Origin', 'brithotels'), 'https://crossorigin.co.uk' ); ?></a></p>

					</div>
				</div>
			</div>
		</div>
		<a href="#" class="back-to-top" title="Back to top Link">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png" alt="back to top" />
			<span><?php esc_html_e('Back to top', 'brithotels'); ?></span>
		</a>
	</div>

	<div class="pb93"></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>