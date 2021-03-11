<?php if ( ! empty( $section['main_image'] ) || ! empty( $section['other_images'] ) || ! empty( $section['rich_text'] ) ) : ?>
	<section class="section-about">
		<div class="shell">
			<div class="section__inner">
				<?php if ( ! empty( $section['main_image'] ) || ! empty( $section['other_images'] ) ) : ?>
					<aside class="section__aside">
						<div class="section__images">
							<?php if ( ! empty( $section['main_image'] ) ) : ?>
								<div class="section__image section__image--lg">
									<?php
										echo wp_get_attachment_image( $section['main_image'], 'large' );
									?>
								</div><!-- /.section__image -->
							<?php endif; ?>

							<?php foreach ( $section['other_images'] as $item ) : ?>
								<div class="section__image">
									<?php
										echo wp_get_attachment_image( $item, 'large' );
									?>
								</div><!-- /.section__image -->
							<?php endforeach; ?>
						</div><!-- /.section__images -->
					</aside><!-- /.section__aside -->
				<?php endif; ?>

				<?php if ( ! empty( $section['rich_text'] ) ) : ?>
					<div class="section__content">
						<div class="section__entry richtext-entry">
							<?php
								echo apply_filters( 'the_content', $section['rich_text'] );
							?>
						</div><!-- /.section__entry -->
					</div><!-- /.section__content -->
				<?php endif; ?>
			</div><!-- /.section__inner -->
		</div><!-- /.shell -->
	</section><!-- /.section-about -->
<?php endif; ?>
