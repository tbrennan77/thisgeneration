<?php
	$has_button = ! empty( $section['button_link'] ) && ! empty( $section['button_text'] );
	$has_title_text_price_button_or_text = ! empty( $section['title'] ) || ! empty( $section['rich_text_price'] ) || ! empty( $section['rich_text'] ) || $has_button;
?>

<?php if ( $has_title_text_price_button_or_text || ! empty( $section['image'] ) ) : ?>
	<section class="section-cols section-cols--gray">
		<div class="shell">
			<div class="section__inner">
				<?php if ( $has_title_text_price_button_or_text ) : ?>
					<div class="section__content">
						<div class="section__content-inner">
							<?php if ( ! empty( $section['title'] ) ) : ?>
								<header class="section__head">
									<h1>
										<?php
											echo esc_html( $section['title'] );
										?>
									</h1>
								</header><!-- /.section__head -->
							<?php endif; ?>

							<?php if ( ! empty( $section['rich_text_price'] ) ) : ?>
								<div class="section__price">
									<?php
										echo apply_filters( 'the_content', $section['rich_text_price'] );
									?>
								</div><!-- /.section__price -->
							<?php endif; ?>

							<?php if ( ! empty( $section['rich_text'] ) ) : ?>
								<div class="section__entry richtext-entry">
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
						</div><!-- /.section__content-inner -->
					</div><!-- /.section__content -->
				<?php endif; ?>

				<?php if ( ! empty( $section['image'] ) ) : ?>
					<aside class="section__aside">
						<div class="section__image">
							<?php
								echo wp_get_attachment_image( $section['image'], 'large' );
							?>
						</div><!-- /.section__image -->
					</aside><!-- /.section__aside -->
				<?php endif; ?>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	</section><!-- /.section-cols -->
<?php endif; ?>
