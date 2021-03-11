<?php
	$has_video = ! empty( $section['video_link'] ) && ! empty( $section['video_thumbnail'] );
?>

<?php if ( ! empty( $section['image'] ) || $has_video || ! empty( $section['rich_text'] ) ) : ?>
	<section class="section-story">
		<div class="shell">
			<?php if ( ! empty( $section['image'] ) || $has_video ) : ?>
				<div class="section__media">
					<?php if ( ! empty( $section['image'] ) ) : ?>
						<div class="section__image">
							<?php
								echo wp_get_attachment_image( $section['image'], 'large' );
							?>
						</div><!-- /.section__image -->
					<?php endif; ?>

					<?php if ( $has_video ) : ?>
						<div class="section__video">
							<div class="section__video-inner">
								<?php
									echo wp_get_attachment_image( $section['video_thumbnail'], 'medium' );
								?>

								<a href="<?php echo esc_url( $section['video_link'] ); ?>" class="btn-play btn-play--small js-iframe-popup"></a>
							</div><!-- /.section__video-inner -->
						</div><!-- /.section__video -->
					<?php endif; ?>
				</div><!-- /.section__media -->
			<?php endif; ?>

			<?php if ( ! empty( $section['rich_text'] ) ) : ?>
				<div class="section__body">
					<div class="section__entry richtext-entry">
						<?php
							echo apply_filters( 'the_content', $section['rich_text'] );
						?>
					</div><!-- /.section__entry -->
				</div><!-- /.section__body -->
			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section-story -->
<?php endif; ?>
