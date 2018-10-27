<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 * @subpackage fBachFlowers
 * @author tishonator
 * @since fBachFlowers 1.0.0
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<div class="clear">
			</div><!-- .clear -->

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<?php get_sidebar( 'footer' ); ?>

					<div class="clear">
						<div id="fsocial">
							<ul class="footer-social-widget">
								<?php fbachflowers_display_social_sites(); ?>
							</ul>
						</div>
					</div>

					<div class="clear">
					</div>

					<nav id="footer-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', ) ); ?>
					</nav>

					<div class="clear">
					</div><!-- .clear -->

					<div id="copyright">

						<p>
						 <?php fbachflowers_show_copyright_text(); ?> <a href="<?php echo esc_url( 'https://tishonator.com/product/fbachflowers' ); ?>" title="<?php esc_attr_e( 'fBachFlowers Theme', 'fbachflowers' ); ?>">
							<?php esc_html_e('fBachFlowers Theme', 'fbachflowers'); ?></a> <?php esc_attr_e( 'powered by', 'fbachflowers' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'fbachflowers' ); ?>">
							<?php esc_html_e('WordPress', 'fbachflowers'); ?></a>
						</p>
						
					</div><!-- #copyright -->

				</div><!-- #footer-content-wrapper -->

			</footer><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>