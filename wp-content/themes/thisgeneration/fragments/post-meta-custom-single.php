<?php
/**
 *
 *
 * Should be called only within The Loop.
 *
 * It will be displayed only for post type "post".
 */

if ( empty( $post ) || get_post_type() !== 'post' ) {
	return;
}
?>

<div class="article__meta">
	<ul>
		<?php if ( ! empty( get_the_author() ) ) : ?>
			<li>
				<?php
					echo esc_html( get_the_author() );
				?>
			</li>
		<?php endif; ?>

		<li>
			<?php
				the_time( 'F j' );
			?>
		</li>

		<?php if ( has_tag() ) : ?>
			<li>
				<?php
					the_tags( '', ', ', '' );
				?>
			</li>
		<?php endif; ?>
	</ul>
</div><!-- /.article__meta -->
