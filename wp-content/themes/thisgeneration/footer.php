			</div><!-- /.main -->

			<footer class="footer">
				<?php
					$footer_background_image = carbon_get_theme_option( 'crb_footer_background_image' );
					$footer_copyright = carbon_get_theme_option( 'crb_footer_copyright' );
				?>

				<?php if ( ! empty( carbon_get_the_post_meta( 'crb_show_footer_top_logo' ) ) ) : ?>
					<a href="<?php echo esc_url( get_home_url() ); ?>" class="footer__logo">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo-alt.png" alt="">
					</a>
				<?php endif; ?>

				<div class="footer__body">
					<?php if ( ! empty( $footer_background_image ) ) : ?>
						<div class="footer__background js-image-fit image-fit">
							<?php
								echo wp_get_attachment_image( $footer_background_image, 'full' );
							?>
						</div><!-- /.footer__background -->
					<?php endif; ?>

					<div class="shell">
						<div class="footer__cols">
							<?php if ( has_nav_menu( 'footer-left-location' ) ) : ?>
								<div class="footer__col footer__col--left">
									<?php
										wp_nav_menu( array(
											'container' => 'nav',
											'container_class' => 'footer__nav',
											'theme_location' => 'footer-left-location'
										) );
									?>
								</div><!-- /.footer__col -->
							<?php endif; ?>

							<div class="footer__col footer__col--center">
								<div class="footer__image">
									<a href="<?php echo esc_url( get_home_url() ); ?>">
										<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo-circle.png" alt="">
									</a>
								</div><!-- /.footer__image -->
							</div><!-- /.footer__col -->

							<?php if ( has_nav_menu( 'footer-right-location' ) ) : ?>
								<div class="footer__col footer__col--right">
									<?php
										wp_nav_menu( array(
											'container' => 'nav',
											'container_class' => 'footer__nav',
											'theme_location' => 'footer-right-location'
										) );
									?>
								</div><!-- /.footer__col -->
							<?php endif; ?>
						</div><!-- /.footer__cols -->

						<?php
							crb_render_fragment( 'socials', array(
								'additional_class' => 'socials--blue'
							) );
						?>
					</div><!-- /.shell -->
				</div><!-- /.footer__body -->

				<?php if ( ! empty( $footer_copyright ) || has_nav_menu( 'footer-bottom-location' ) ) : ?>
					<div class="footer__bar">
						<div class="shell">
							<ul>
								<?php if ( ! empty( $footer_copyright ) ) : ?>
									<li>
										<?php
											echo $footer_copyright;
										?>
									</li>
								<?php endif; ?>

								<?php if ( has_nav_menu( 'footer-bottom-location' ) ) : ?>
									<?php
										wp_nav_menu( array(
											'container' => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'footer-bottom-location'
										) );
									?>
								<?php endif; ?>
							</ul>
						</div><!-- /.shell -->
					</div><!-- /.footer__bar -->
				<?php endif; ?>
			</footer><!-- /.footer -->
		</div><!-- /.wrapper__inner -->
	</div><!-- /.wrapper -->
	<?php wp_footer(); ?>
</body>
</html>
