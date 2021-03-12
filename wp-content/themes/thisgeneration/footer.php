			</div><!-- /.main -->

			<footer class="footer">
				<?php
					$footer_background_image = carbon_get_theme_option( 'crb_footer_background_image' );
					$footer_copyright    = carbon_get_theme_option( 'crb_footer_copyright' );
					$footer_column_one   = carbon_get_theme_option( 'crb_footer_column_1_title' );
					$footer_column_two   = carbon_get_theme_option( 'crb_footer_column_2_title' );
					$footer_column_three = carbon_get_theme_option( 'crb_footer_column_3_title' );
					$footer_column_four  = carbon_get_theme_option( 'crb_footer_column_4_title' );
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

							<div class="footer__col footer__col--left">
								<?php if($footer_column_one){?><div class="footer-header"><?php echo $footer_column_one; ?></div><?php } ?>
								<div class="footer__image">
									<a href="<?php echo esc_url( get_home_url() ); ?>">
										<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo-circle.png" alt="">
									</a>
								</div><!-- /.footer__image -->
								<?php
									crb_render_fragment( 'socials', array(
										'additional_class' => 'socials--blue socials--footer'
									) );
								?>
							</div><!-- /.footer__col -->

							<?php if ( has_nav_menu( 'footer-left-location' ) ) : ?>
								<div class="footer__col footer__col--center">
									<div class="footer-header"><?php echo $footer_column_two; ?></div>
									<?php
										wp_nav_menu( array(
											'container' => 'nav',
											'container_class' => 'footer__nav',
											'theme_location' => 'footer-left-location'
										) );
									?>
								</div><!-- /.footer__col -->
							<?php endif; ?>

							<?php if ( has_nav_menu( 'footer-middle-location' ) ) : ?>
								<div class="footer__col footer__col--center">
									<div class="footer-header"><?php echo $footer_column_three; ?></div>
									<?php
										wp_nav_menu( array(
											'container' => 'nav',
											'container_class' => 'footer__nav',
											'theme_location' => 'footer-middle-location'
										) );
									?>
								</div><!-- /.footer__col -->
							<?php endif; ?>

							<?php if ( has_nav_menu( 'footer-right-location' ) ) : ?>
								<div class="footer__col footer__col--center">
									<div class="footer-header"><?php echo $footer_column_four; ?></div>
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
					</div><!-- /.shell -->
				</div><!-- /.footer__body -->

				<?php if ( ! empty( $footer_copyright ) || has_nav_menu( 'footer-bottom-location' ) ) : ?>
					<div class="footer__bar">
						<div class="shell">
							<?php if ( ! empty( $footer_copyright ) ) : ?>
								<div class="copyright">
									<?php
										echo $footer_copyright;
									?>
								</div>
								<?php endif; ?>
								<?php if ( has_nav_menu( 'footer-bottom-location' ) ) : ?>
									<ul>
									<?php
										wp_nav_menu( array(
											'container' => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'footer-bottom-location'
										) );
									?>
									</ul>
								<?php endif; ?>
						</div><!-- /.shell -->
					</div><!-- /.footer__bar -->
				<?php endif; ?>
			</footer><!-- /.footer -->
		</div><!-- /.wrapper__inner -->
	</div><!-- /.wrapper -->
	<?php wp_footer(); ?>
</body>
</html>
