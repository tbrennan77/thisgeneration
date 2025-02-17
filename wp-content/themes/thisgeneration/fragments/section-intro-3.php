<?php
	$has_button = ! empty( $section['button_link'] ) && ! empty( $section['button_text'] );
	$has_socials = crb_has_socials();
?>

<?php if ( ! empty( $section['rich_text'] ) || $has_button || ! empty( $section['image'] ) || $has_socials ) : ?>
	<section class="section-intro">
		<div class="shell shell--lg">
			<div class="section__inner">
				<?php if ( ! empty( $section['rich_text'] ) || $has_button ) : ?>
					<div class="section__content">
						<?php if ( ! empty( $section['rich_text'] ) ) : ?>
							<div class="section__entry">
								<?php
									echo apply_filters( 'the_content', $section['rich_text'] );
								?>
							</div><!-- /.section__entry -->
						<?php endif; ?>

						<?php if ( $has_button ) : ?>
							<div class="section__actions">
								<ul>
									<li>
										<a href="<?php echo esc_url( $section['button_link'] ); ?>" class="btn btn--block">
											<?php
												echo esc_html( $section['button_text'] );
											?>
										</a>
									</li>
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
					<footer class="section__foot">
						<?php
							crb_render_fragment( 'socials', array(
								'additional_class' => ''
							) );
						?>
					</footer><!-- /.section__foot -->
				<?php endif; ?>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	</section><!-- /.section-intro -->
<?php endif; ?>
