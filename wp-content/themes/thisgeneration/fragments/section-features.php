<?php if ( ! empty( $section['rich_text_title'] ) || ! empty( $section['items_features'] ) ) : ?>
	<section class="section-features">
		<?php if ( ! empty( $section['rich_text_title'] ) ) : ?>
			<header class="section__head">
				<div class="shell">
					<?php
						echo apply_filters( 'the_content', $section['rich_text_title'] );
					?>
				</div><!-- /.shell -->
			</header><!-- /.section__head -->
		<?php endif; ?>

		<?php if ( ! empty( $section['items_features'] ) ) : ?>
			<div class="section__body">
				<div class="shell">
					<div class="list-features">
						<ul>
							<?php foreach ( $section['items_features'] as $item ) : ?>
								<?php if (! empty( $item['rich_text'] ) ) { ?>
									<?php if ( ! empty( $item['link'] ) )  { ?>
										<li>
											<a href="<?php echo esc_url( $item['link'] ); ?>">
												<span></span>

												<?php
													echo apply_filters( 'the_content', $item['rich_text'] );
												?>
											</a>
										</li>
									<?php } else { ?>
										<li>
												<?php
													echo apply_filters( 'the_content', $item['rich_text'] );
												?>
										</li>
									<?php } ?>
								<?php } ?>
							<?php endforeach; ?>
						</ul>
					</div><!-- /.list-features -->
				</div><!-- /.shell -->
			</div><!-- /.section__body -->
		<?php endif; ?>
	</section><!-- /.section-features -->
<?php endif; ?>
