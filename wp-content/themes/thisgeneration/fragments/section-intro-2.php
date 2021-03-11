<?php if ( ! empty( $section['title'] ) || crb_has_socials() ) : ?>
	<section class="section-small-intro">
		<div class="shell shell--lg">
			<?php if ( ! empty( $section['title'] ) ) : ?>
				<h1>
					<?php
						echo esc_html( $section['title'] );
					?>
				</h1>
			<?php endif; ?>

			<?php if ( crb_has_socials() ) : ?>
				<?php
					crb_render_fragment( 'socials', array(
						'additional_class' => 'socials--gray-borders'
					) );
				?>
			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section-small-intro -->
<?php endif; ?>
