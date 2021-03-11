<?php
	$socials = crb_get_social_icon_names();

	if ( empty( $additional_class ) ) {
		$additional_class = '';
	}
?>

<?php if ( crb_has_socials() ) : ?>
	<div class="socials <?php echo esc_attr( $additional_class ); ?>">
		<ul>
			<?php foreach ( $socials as $icon_name => $social ) : ?>
				<?php
					$social_url = carbon_get_theme_option( 'crb_' . $social . '_url' );
				?>

				<?php if ( ! empty( $social_url ) ) : ?>
					<li>
						<a href="<?php echo esc_url( $social_url ) ?>" target="_blank">
							<i class="<?php echo esc_attr( 'fab fa-' . $icon_name ); ?>"></i>
						</a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div><!-- /.socials -->
<?php endif; ?>

