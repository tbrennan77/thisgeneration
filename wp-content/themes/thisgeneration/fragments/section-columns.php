<section class="section-cols section--columns">
	<div class="shell">
		<div class="section__inner">
			<div class="columns">
					<?php foreach ( $section['columns'] as $column ) : ?>
					<?php
					$column_class = 'column';

					if ( ! empty( $column['image_id'] ) ) {
						$column_class .= ' column--has-image';
					}
					?>
					<div class="<?php echo $column_class; ?>" style="background-image: url(<?php echo wp_get_attachment_image_url( absint( $column['image_id'] ), 'full' ); ?>);">
						<?php if ( ! empty( $column['title'] ) ): ?>
							<div class="column__head">
								<h2><?php echo esc_attr( $column['title'] ); ?></h2>
							</div><!-- /.column__head -->
						<?php endif ?>

						<?php if ( ! empty( $column['content'] ) ): ?>
							<div class="column__body">
								<?php echo apply_filters( 'the_content', $column['content'] ); ?>
							</div><!-- /.column__body -->
						<?php endif ?>
					</div><!-- /.column -->
				<?php endforeach ?>
			</div><!-- /.columns -->
		</div><!-- /.section__inner -->
	</div>
</section><!-- /.section -->
