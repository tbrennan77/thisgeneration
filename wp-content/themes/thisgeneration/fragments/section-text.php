<?php
	$has_button = ! empty( $section['button_link'] ) && ! empty( $section['button_text'] );

	// Check if the popup link is checked
	$has_video = $section['open_in_popup'];
?>

<?php if ( ! empty( $section['rich_text_title'] ) || ! empty( $section['rich_text'] ) || $has_button ) : ?>
	<section class="section-text">
		<?php if ( ! empty( $section['rich_text_title'] ) ) : ?>
			<header class="section__head">
				<div class="shell">
					<?php
						echo apply_filters( 'the_content', $section['rich_text_title'] );
					?>
				</div><!-- /.shell -->
			</header><!-- /.section__head -->
		<?php endif; ?>

		<?php if ( ! empty( $section['rich_text'] ) || $has_button ) : ?>
			<div class="section__body">
				<div class="shell">
					<?php if ( ! empty( $section['rich_text'] ) ) : ?>
						<div class="section__entry richtext-entry">
							<?php
								echo apply_filters( 'the_content', $section['rich_text'] );
							?>
						</div><!-- /.section__entry -->
					<?php endif; ?>

					<?php if ( $has_button ) : ?>
						<div class="section__actions">
							<?php if ( $has_video ) { ?>
								<a href="<?php echo esc_url( $section['button_link'] ); ?>" class="btn js-iframe-popup">
									<?php
									echo esc_html( $section['button_text'] );
								?>	
								</a>
							<?php } else { ?>
							<a href="<?php echo esc_url( $section['button_link'] ); ?>" class="btn">
								<?php
									echo esc_html( $section['button_text'] );
								?>
							</a>
							<?php } ?>
						</div><!-- /.section__actions -->
					<?php endif; ?>
				</div><!-- /.shell -->
			</div><!-- /.section__body -->
		<?php endif; ?>
	</section><!-- /.section-text -->
<?php endif; ?>
