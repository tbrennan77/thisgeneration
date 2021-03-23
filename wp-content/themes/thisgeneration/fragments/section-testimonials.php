<?php if ( ! empty( $section['items_counters'] ) || ! empty( $section['background_image'] ) || ! empty( $section['items_testimonials'] ) ) : ?>
	<section class="section-testimonials">
		<div class="shell shell--lg">
			<div class="section__inner">
				<?php if ( ! empty( $section['items_counters'] ) ) : ?>
					<aside class="section__aside">
						<div class="counters counters--block">
							<ul>
								<?php foreach ( $section['items_counters'] as $item ) : ?>
									<?php if ( ! empty( $item['image'] ) ) : ?>
										<li>
											<div class="counter counter--alt">
												<div class="counter__image">
													<?php
														echo wp_get_attachment_image( $item['image'], 'counter-image-size' );
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
																	echo nl2br( esc_html( $item['title'] ) );
																?>
															</h3><!-- /.counter__title -->
														<?php endif; ?>
													</div><!-- /.counter__inner -->
												<?php endif; ?>
											</div><!-- /.counter -->
										</li>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</div><!-- /.counters -->
					</aside><!-- /.section__aside -->
				<?php endif; ?>

				<?php if ( ! empty( $section['background_image'] ) || ! empty( $section['items_testimonials'] ) ) : ?>
					<div class="section__content">
						<?php if ( ! empty( $section['background_image'] )  ) : ?>
							<div class="section__background">
								<div class="section__background-inner js-image-fit">
									<?php
										echo wp_get_attachment_image( $section['background_image'], 'full' );
									?>
								</div><!-- /.section__background-inner -->
							</div><!-- /.section__background -->
						<?php endif; ?>

						<?php if ( ! empty( $section['items_testimonials'] ) ) : ?>
							<div class="slider-testimonial js-testimonial-slider">
								<?php foreach ( $section['items_testimonials'] as $item ) : ?>
									<?php if ( ! empty( $item['text'] ) || ! empty( $item['name'] ) || ! empty( $item['review_via_text'] ) || ! empty( $item['image'] ) ) : ?>
										<div class="slider__slide">
											<div class="testimonial">
												<?php if ( ! empty( $item['text'] ) ) : ?>
													<blockquote>
														<?php
															echo esc_html( $item['text'] );
														?>
													</blockquote>
												<?php endif; ?>

												<?php if ( ! empty( $item['name'] ) ) : ?>
													<h5>
														<?php
															echo esc_html($item['name']);
														?>
													</h5>
												<?php endif; ?>

												<?php if ( ! empty( $item['review_via_text'] ) ) : ?>
													<?php
														echo apply_filters( 'the_content', $item['review_via_text'] );
													?>
												<?php endif; ?>

												<?php if ( ! empty( $item['image'] ) ) : ?>
													<div class="testimonial__image js-image-fit">
														<?php
															echo wp_get_attachment_image( $item['image'], 'medium' );
														?>
													</div><!-- /.testimonial__image -->
												<?php endif; ?>
											</div><!-- /.testimonial -->
										</div><!-- /.slider__slide -->
									<?php endif; ?>
								<?php endforeach; ?>
							</div><!-- /.slider -->
						<?php endif; ?>
					</div><!-- /.section__content -->
				<?php endif; ?>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	</section><!-- /.section-testimonials -->
<?php endif; ?>
