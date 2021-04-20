<?php
	$has_button = ! empty( $section['button_link'] ) && ! empty( $section['button_text'] );

	// Check if the popup link is checked
	$has_video 		= $section['open_in_popup'];
	$is_full_width  = $section['full_width'];
	$bg_image  		= $section['bg_image'];
	$is_full_width  = $section['full_width'];
	$css_class  	= $section['css_class'];

	if ($bg_image) {
		$bg_image = wp_get_attachment_image_url( $section['bg_image'], 'full' );
	}

?>

<?php if ( ! empty( $section['rich_text_title'] ) || ! empty( $section['rich_text'] ) || $has_button ) : ?>
<?php if ( $bg_image ) { ?>
<div class="container">
	<div class="hero--video-wrapper" style="padding-right: 0px; padding-left: 0px; background: url(<?php echo $bg_image; ?>) no-repeat center top; background-size: cover;"></div>
<?php } ?>
	<section class="section-text <?php echo $css_class; ?> <?php if ( $is_full_width ) { ?>full_width<?php } ?>">
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
<?php if ( $bg_image ) { ?>
	</div>
</div>
<?php } ?>

<?php endif; ?>
