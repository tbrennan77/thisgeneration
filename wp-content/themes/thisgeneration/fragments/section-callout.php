<?php
	$section_alt = '';
	$form_large = '';

	if ( ! empty( $section['alternative'] ) ) {
		$section_alt = 'section-callout--alt';
		$form_large = 'form--large';
	}
?>

<?php if ( ! empty( $section['title'] ) || ! empty( $section['text'] ) || ! empty( $section['form'] ) ) : ?>
	<section class="section-callout <?php echo esc_attr( $section_alt ); ?>">
		<div class="shell">
			<?php if ( ! empty( $section['title'] ) ) : ?>
				<header class="section__head">
					<h1>
						<?php
							echo esc_html( $section['title'] );
						?>
					</h1>
				</header><!-- /.section__head -->
			<?php endif; ?>

			<?php if ( ! empty( $section['text'] ) ) : ?>
				<div class="section__entry">
					<p>
						<?php
							echo nl2br( esc_html( $section['text'] ) );
						?>
					</p>
				</div><!-- /.section__entry -->
			<?php endif; ?>

			<?php if ( ! empty( $section['form'] ) ) : ?>
				<div class="section__form">
					<div class="form form--subscribe <?php echo esc_attr( $form_large ); ?>">
						<?php
							crb_render_gform( $section['form'], array(
								'display_title' => false,
								'display_description' => false
							) );
						?>
					</div><!-- /.form form--subscribe -->
				</div><!-- /.section__form -->
			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section-callout -->
<?php endif; ?>
