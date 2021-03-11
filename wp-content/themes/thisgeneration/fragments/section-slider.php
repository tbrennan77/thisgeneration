<?php if ( ! empty( $section['title'] ) || ! empty( $section['items_slides'] ) || ! empty( $section['foot_image'] ) ) : ?>
	<section class="section-houses">
		<?php if ( ! empty( $section['title'] ) ) : ?>
			<header class="section__head">
				<div class="shell">
					<h1>
						<?php
							echo esc_html( $section['title'] );
						?>
					</h1>
				</div><!-- /.shell -->
			</header><!-- /.section__head -->
		<?php endif; ?>

		<?php if ( ! empty( $section['items_slides'] ) ) : ?>
			<div class="section__body">
				<div class="slider-houses js-houses-slider">
					<?php foreach ( $section['items_slides'] as $slide ) : ?>
						<?php if ( ! empty( $slide['image'] ) ) : ?>
							<div class="slider__slide">
								<div class="slider__slide-image js-object-fit image-fit">
									<?php
										echo wp_get_attachment_image( $slide['image'], 'large' );
									?>
								</div><!-- /.slider__slide-image -->
							</div><!-- /.slider__slide -->
						<?php endif; ?>
					<?php endforeach; ?>
				</div><!-- /.slider -->
			</div><!-- /.section__body -->
		<?php endif; ?>

		<?php if ( ! empty( $section['foot_image'] ) ) : ?>
			<footer class="section__foot">
				<div class="shell">
					<?php
						echo wp_get_attachment_image( $section['foot_image'], 'large' );
					?>
				</div><!-- /.shell -->
			</footer><!-- /.section__foot -->
		<?php endif; ?>
	</section><!-- /.section-houses -->
<?php endif; ?>
