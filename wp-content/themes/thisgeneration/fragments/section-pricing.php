<?php if ( ! empty( $section['title'] ) || ! empty( $section['subtitle'] ) || ! empty( $section['items_prices'] ) ) : ?>
	<section class="section-pricing">
		<div class="shell">
			<?php if ( ! empty( $section['title'] ) || ! empty( $section['subtitle'] ) ) : ?>
				<header class="section__head">
					<?php if ( ! empty( $section['title'] ) ) : ?>
						<h1>
							<?php
								echo esc_html( $section['title'] );
							?>
						</h1>
					<?php endif; ?>

					<?php if ( ! empty( $section['subtitle'] ) ) : ?>
						<p>
							<?php
								echo esc_html( $section['subtitle'] );
							?>
						</p>
					<?php endif; ?>
				</header><!-- /.section__head -->
			<?php endif; ?>

			<?php if ( ! empty( $section['items_prices'] ) ) : ?>
				<div class="section__body">
					<div class="list-prices">
						<ul>
							<?php foreach ( $section['items_prices'] as $item ) : ?>
								<?php if ( ! empty( $item['price'] ) || ! empty( $item['text'] ) ) : ?>
									<li>
										<?php if ( ! empty( $item['price'] ) ) : ?>
											<h1>
												<?php
													echo esc_html( $item['price'] );
												?>
											</h1>
										<?php endif; ?>
										<p>
										<?php if ( ! empty( $item['text'] ) ) : ?>
											<?php
												echo apply_filters( 'the_content', $item['text'] );
											?>
										<?php endif; ?>
										</p>
										<?php if ( ! empty( $item['button_link'] ) ) : ?>
											<a href="<?php echo esc_html( $item['button_link'] ); ?>" class="btn btn--block btn--ghost"><?php echo esc_html( $item['button_text'] ); ?></a>
										<?php endif; ?>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div><!-- /.list-prices -->
				</div><!-- /.section__body -->
			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section-pricing -->
<?php endif; ?>
