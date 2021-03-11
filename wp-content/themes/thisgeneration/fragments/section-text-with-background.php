<?php
	$section_alt = '';

	if ( ! empty( $section['alt'] ) ) {
		$section_alt = 'section-text-with-image--alt';
	}
?>

<?php if ( ! empty( $section['rich_text_title'] ) || ! empty( $section['form'] ) ) : ?>
	<section class="section-text-with-image <?php echo esc_attr( $section_alt ); ?>">
		<?php if ( ! empty( $section['background_image'] ) ) : ?>
			<div class="section__image js-image-fit image-fit">
				<?php
					echo wp_get_attachment_image( $section['background_image'], 'full' );
				?>
			</div><!-- /.section__image -->
		<?php endif; ?>

		<div class="shell">
			<?php if ( ! empty( $section['rich_text_title'] ) ) : ?>
				<header class="section__head">
					<?php
						echo apply_filters( 'the_content', $section['rich_text_title'] );
					?>
				</header><!-- /.section__head -->
			<?php endif; ?>

			<?php if ( ! empty( $section['form'] ) ) : ?>
				<div class="section__body">
					<div class="form form--contact">
						<?php
							crb_render_gform( $section['form'] , array( 'display_title' => false, 'display_description' => false ) );
						?>
					</div><!-- /.form -->
				</div><!-- /.section__body -->
			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section-text-with-image -->
<?php endif; ?>
