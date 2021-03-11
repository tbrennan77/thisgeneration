<?php if ( have_posts() ) : ?>
	<div class="articles">
		<ul class="articles__items">
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="articles__item">
					<div class="article">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="article__image js-image-fit image-fit">
								<a href="<?php echo esc_url( get_the_permalink() ); ?>">
									<?php the_post_thumbnail( 'loop-page-featured-image-size' ); ?>
								</a>
							</div><!-- /.article__image -->
						<?php endif; ?>

						<div class="article__content">
							<?php
								get_template_part( 'fragments/post-meta-custom' );
							?>

							<h2 class="article__title">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'crb' ), get_the_title() ) ); ?>">
									<?php
										echo esc_html( get_the_title() );
									?>
								</a>
							</h2>

							<div class="article__entry">
								<?php
									echo wp_trim_words( esc_html( get_the_excerpt() ), 27, ' ... <a href="' . get_the_permalink() . '">read more</a>' );
								?>
							</div><!-- /.article__entry -->
						</div><!-- /.article__content -->
					</div><!-- /.article -->
				</li>
			<?php endwhile; ?>
		</ul>
	</div><!-- /.articles -->
<?php else : ?>
	<div class="articles">
		<ul class="articles__items">
			<li class="articles__item">
				<div class="article article--error404 article--not-found">
					<div class="article__body">
						<div class="article__entry richtext-entry">
							<p>
								<?php
								if ( is_category() ) { // If this is a category archive
									printf( __( "Sorry, but there aren't any posts in the %s category yet.", 'crb' ), single_cat_title( '', false ) );
								} else if ( is_date() ) { // If this is a date archive
									_e( "Sorry, but there aren't any posts with this date.", 'crb' );
								} else if ( is_author() ) { // If this is a category archive
									$userdata = get_user_by( 'id', get_queried_object_id() );
									printf( __( "Sorry, but there aren't any posts by %s yet.", 'crb' ), esc_html( $userdata->display_name ) );
								} else if ( is_search() ) { // If this is a search
									_e( 'No posts found. Try a different search?', 'crb' );
								} else {
									_e( 'No posts found.', 'crb' );
								}
								?>
							</p>
						</div><!-- /.article__entry -->
					</div><!-- /.article__body -->
				</div><!-- /.article -->
			</li>
		</ul>
	</div><!-- /.articles -->
<?php endif; ?>
