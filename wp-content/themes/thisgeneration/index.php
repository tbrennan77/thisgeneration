<?php
	get_header();

	$blog_intro_rich_text_title = carbon_get_post_meta( get_option( 'page_for_posts' ), 'crb_blog_rich_text_title' );
	$blog_intro_image = carbon_get_post_meta( get_option( 'page_for_posts' ), 'crb_blog_image' );
	$has_socials = crb_has_socials();
?>

<?php if ( ! empty( $blog_intro_rich_text_title ) || ! empty( $blog_intro_image ) || $has_socials ) : ?>
	<section class="section-intro-blog">
		<div class="shell shell--lg">
			<div class="section__cols">
				<?php if ( ! empty( $blog_intro_rich_text_title ) ) : ?>
					<div class="section__col section__col-size1">
						<?php
							echo apply_filters( 'the_content', $blog_intro_rich_text_title );
						?>
					</div><!-- /.section__col -->
				<?php endif; ?>

				<?php if ( ! empty( $blog_intro_image ) ) : ?>
					<div class="section__col section__col-size2">
						<div class="section__image">
							<?php
								echo wp_get_attachment_image( $blog_intro_image, 'large' );
							?>
						</div><!-- /.section__image -->
					</div><!-- /.section__col -->
				<?php endif; ?>

				<?php if ( $has_socials ) : ?>
					<div class="section__col section__col-size3">
						<?php
							crb_render_fragment( 'socials', array(
								'additional_class' => 'socials--alt'
							) );
						?>
					</div><!-- /.section__col -->
				<?php endif; ?>
			</div><!-- /.section__cols -->
		</div><!-- /.shell -->
	</section><!-- /.section-intro-blog -->
<?php endif; ?>

<section class="section-blog">
	<div class="shell shell--lg">
		<div class="section__nav">
			<?php
				$tags = get_tags( array(
					'hide_empty' => false,
					'orderby' => 'term_id',
					'number' => 5
				) );
			?>

			<?php if ( ! empty( $tags ) ) : ?>
				<nav>
					<ul>
						<?php foreach ( $tags as $tag ) : ?>
							<li>
								<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
									<?php
										echo esc_html( $tag->name );
									?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav><!-- /.nav -->
			<?php endif; ?>

			<?php get_search_form() ?>
		</div><!-- /.section__nav -->

		<div class="section__body">
			<?php
				if ( is_single() ) {
					// get_template_part( 'loop', 'single' );
				} else {
					get_template_part( 'loop' );
				}
			?>
		</div><!-- /.section__body -->

		<?php
			$next_posts_link = get_next_posts_link( esc_html__( 'Load More', 'crb' ) );
		?>

		<?php if ( $next_posts_link ) : ?>
			<footer class="section__foot js-load-more">
				<?php
					printf( '%s', $next_posts_link );
				?>
			</footer><!-- /.section__foot -->
		<?php endif; ?>
	</div><!-- /.shell -->
</section><!-- /.section-blog -->

<?php
	crb_render_fragment( 'section-callout', array(
		'section' => array(
			'alternative' => carbon_get_theme_option( 'crb_blog_callout_alternative' ),
			'title' => carbon_get_theme_option( 'crb_blog_callout_title' ),
			'text' => carbon_get_theme_option( 'crb_blog_callout_text' ),
			'form' => carbon_get_theme_option( 'crb_blog_callout_form' )
		)
	) );
?>

<?php get_footer(); ?>
