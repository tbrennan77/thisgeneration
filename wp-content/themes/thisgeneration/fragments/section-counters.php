<?php if ( ! empty( $section['title'] ) || ! empty( $section['items_counters'] ) ) : ?>
	<section class="section-counters">
		<?php if ( ! empty( $section['title'] ) ) : ?>
			<header class="section__head">
				<div class="shell">
					<h2>
						<?php
							echo esc_html( $section['title'] );
						?>
					</h2>
				</div><!-- /.shell -->
			</header><!-- /.section__head -->
		<?php endif; ?>

		<?php if ( ! empty( $section['items_counters'] ) ) : ?>
			<div class="section__body">
				<div class="shell">
					<div class="counters">
						<ul>
							<?php foreach ( $section['items_counters'] as $item ) : ?>
								<?php if ( ! empty( $item['image'] ) ) : ?>
									<li>
										<div class="counter">
											<div class="counter__image">
												<?php
													echo wp_get_attachment_image( $item['image'], 'loop-page-featured-image-size' );
												?>
											</div><!-- /.counter__image -->

											<?php if ( ! empty( $item['number'] ) || ! empty( $item['title'] ) ) : ?>
												<div class="counter__inner">
													<?php if ( ! empty( $item['number'] ) ) : ?>
														<div class="counter__number">
															<?php
																echo esc_html( $item['number'] );
															?>
														</div><!-- /.counter__number -->
													<?php endif; ?>

													<?php if ( ! empty( $item['title'] ) ) : ?>
														<h3 class="counter__title">
															<?php
																echo esc_html( $item['title'] );
															?>
														</h3><!-- /.counter__title -->
													<?php endif; ?>

													<?php if ( ! empty( $item['description'] ) ) : ?>
														<p class="counter__description">
															<?php
																echo esc_html( $item['description'] );
															?>
														</p><!-- /.counter__title -->
													<?php endif; ?>
												</div><!-- /.counter__inner -->
											<?php endif; ?>
										</div><!-- /.counter -->
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div><!-- /.counters -->
				</div><!-- /.shell -->
				<?php if ( ! empty( $section['button_link'] ) ) : ?>
				<div class="shell">
					<a href="<?php echo esc_html( $section['button_link'] ); ?>" class="btn btn--block btn--ghost"><?php echo esc_html( $section['button_text'] ); ?></a>
				</div><!-- /.shell -->
				<?php endif; ?>
			</div><!-- /.section__body -->
		<?php endif; ?>

	</section><!-- /.section-counters -->
<?php endif; ?>
