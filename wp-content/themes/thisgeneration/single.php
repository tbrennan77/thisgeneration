<?php get_header(); ?>

<section class="section-blog section-blog--single">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'article-single' ); ?>>
			<?php
				$post_background_image = carbon_get_the_post_meta( 'crb_post_background_image' );
			?>

			<?php if ( has_post_thumbnail() || ! empty( $post_background_image ) ) : ?>
				<div class="article__thumbnail">
					<?php if ( ! empty( $post_background_image ) ) : ?>
						<div class="article__background">
							<div class="article__background-inner js-image-fit image-fit">
								<?php
									echo wp_get_attachment_image( $post_background_image, 'full' );
								?>
							</div><!-- /.article__background-inner -->
						</div><!-- /.article__background -->
					<?php endif; ?>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="article__image js-image-fit image-fit">
							<?php
								the_post_thumbnail( 'large' );
							?>
						</div><!-- /.article__image -->
					<?php endif; ?>
				</div><!-- /.article__thumbnail -->
			<?php endif; ?>

			<div class="article__body">
				<div class="shell">
					<header class="article__head">
						<h1>
							<?php
								echo esc_html( get_the_title() );
							?>
						</h1>
					</header><!-- /.article__head -->

					<?php
						get_template_part( 'fragments/post-meta-custom-single' );
					?>

					<div class="article__socials">
						<p>
							<?php
								_e( 'Share some great content', 'crb' );
							?>
						</p>

						<div class="socials socials--medium socials--dark-gray">
							<ul>
								<li>
									<a target="_blank" href="<?php echo esc_url( 'https://twitter.com/home?status=' . get_the_permalink() ); ?>">
										<i class="fab fa-twitter"></i>
									</a>
								</li>

								<li>
									<a target="_blank" href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() ); ?>">
										<i class="fab fa-facebook-f"></i>
									</a>
								</li>

								<?php
									$instagram_link = carbon_get_theme_option( 'crb_instagram_url' );
								?>

								<?php if ( ! empty( $instagram_link ) ) : ?>
									<li>
										<a target="_blank" href="<?php echo esc_url( $instagram_link ); ?>">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
								<?php endif; ?>

								<li>
									<a target="_blank" href="<?php echo esc_url( 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() ); ?>">
										<i class="fab fa-linkedin-in"></i>
									</a>
								</li>

								<li>
									<a target="_blank" href="mailto:?subject=I wanted you to see this article&amp;body=Check out the article <?php echo esc_url( get_the_permalink() ); ?>">
										<i class="fas fa-envelope" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</div><!-- /.socials -->
					</div><!-- /.article__socials -->

					<div class="article__inner">
						<?php if ( has_excerpt() ) : ?>
							<div class="article__excerpt">
								<h2>
									<?php
										echo esc_html( get_the_excerpt() );
									?>
								</h2>
							</div><!-- /.article__excerpt -->
						<?php endif; ?>

						<div class="article__entry richtext-entry">
							<?php
								the_content();

								wp_link_pages();
							?>
						</div><!-- /.article__entry -->
					</div><!-- /.article__inner -->

					<?php
						$post_author_id = get_the_author_meta( 'ID' );
						$post_author_avatar = get_avatar( get_the_author_meta( 'ID' ), 123 );
						$post_author_has_socials = crb_author_has_socials();
						$post_author_display_name = get_the_author_meta( 'display_name' );
						$post_author_description = get_the_author_meta( 'description' );
					?>

					<?php if ( ! empty( $post_author_id ) ) : ?>
						<div class="writer">
							<?php if ( ! empty( $post_author_avatar ) || $post_author_has_socials || ! empty( $post_author_display_name ) ) : ?>
								<div class="writer__aside">
									<?php if ( ! empty( $post_author_avatar ) ) : ?>
										<div class="writer__image">
											<div class="writer__image-inner js-image-fit image-fit">
												<?php
													echo $post_author_avatar;
												?>
											</div><!-- /.writer__image-inner -->
										</div><!-- /.writer__image -->
									<?php endif; ?>

									<?php if ( $post_author_has_socials ) : ?>
										<?php
											crb_render_fragment( 'socials-author', array(
												'additional_class' => 'socials--small socials--dark-gray'
											) );
										?>
									<?php endif; ?>

									<?php if ( ! empty( $post_author_display_name ) ) : ?>
										<p>
											<?php
												echo __( 'Follow', 'crb' ) . ' ' . esc_html( $post_author_display_name );
											?>
										</p>
									<?php endif; ?>
								</div><!-- /.writer__aside -->
							<?php endif; ?>

							<?php if ( ! empty( $post_author_description ) ) : ?>
								<div class="writer__content">
									<div class="writer__entry richtext-entry">
										<?php
											echo wpautop( esc_html( $post_author_description ) );
										?>
									</div><!-- /.writer__entry -->
								</div><!-- /.writer__content -->
							<?php endif; ?>
						</div><!-- /.writer -->
					<?php endif; ?>
				</div><!-- /.shell -->
			</div><!-- /.article__body -->
		</article><!-- /.article-single -->
	<?php endwhile; ?>
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

	get_footer();
?>
