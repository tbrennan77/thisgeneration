<?php
	$has_button_1 = ! empty( $section['button_1_link'] ) && ! empty( $section['button_1_text'] );
	$has_button_2 = ! empty( $section['button_2_link'] ) && ! empty( $section['button_2_text'] );
	$has_socials = crb_has_socials();
?>

<?php if ( ! empty( $section['rich_text'] ) || $has_button_1 || $has_button_2 || ! empty( $section['image'] ) || $has_socials ) : ?>
	<section class="section-intro section-intro--member">
		<div class="shell shell--lg">
			<div class="section__inner">
				<?php if ( ! empty( $section['rich_text'] ) || $has_button_1 || $has_button_2 ) : ?>
					<div class="section__content">
						<?php if ( ! empty( $section['rich_text'] ) ) : ?>
							<div class="section__entry">
								<?php
									echo apply_filters( 'the_content', $section['rich_text'] );
								?>
							</div><!-- /.section__entry -->
						<?php endif; ?>

						<?php if ( $has_button_1 || $has_button_2 ) : ?>
							<div class="section__actions">
								<ul>
									<?php if ( $has_button_1 ) : ?>
										<li>
											<a href="<?php echo esc_url( $section['button_1_link'] ); ?>" class="btn btn--block btn--ghost btn--white-text">
												<?php
													echo esc_html( $section['button_1_text'] );
												?>
											</a>
										</li>
									<?php endif; ?>

									<?php if ( $has_button_2 ) : ?>
										<li>
											<a href="<?php echo esc_url( $section['button_2_link'] ); ?>" class="btn btn--block">
												<?php
													echo esc_html( $section['button_2_text'] );
												?>
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</div><!-- /.section__actions -->
						<?php endif; ?>
					</div><!-- /.section__content -->
				<?php endif; ?>

				<?php if ( ! empty( $section['image'] ) ) : ?>
					<div class="section__image">
						<?php
							echo wp_get_attachment_image( $section['image'], 'large' );
						?>
					</div><!-- /.section__image -->
				<?php endif; ?>

				<?php if ( $has_socials ) : ?>
					<?php
						crb_render_fragment( 'socials', array(
								'additional_class' => ''
							) );
					?>
				<?php endif; ?>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	</section><!-- /.section-intro -->
<?php endif; ?>
