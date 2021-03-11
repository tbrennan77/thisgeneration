<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */


// Check our Advanced Custom Field (ACF) values for this page
$hero_background_image = get_field( "hero_background_image" );

if(get_field( "has_hero_section" )) { // Create a hero section if enabled
?>
<section class="hero" <?php if($hero_background_image) {echo "style=\"background-image: url(". esc_url($hero_background_image['url']) .")\"";} ?> >
			<div class="row row-grid align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2">
                    <!-- Image -->
                    <figure class="w-100">
                        <img alt="Image placeholder" src="assets/img/svg/illustrations/illustration-3.svg" class="img-fluid mw-md-120">
                    </figure>
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1 pr-md-5">
                	<?php if(get_field( "hero_header" )) { ?>
                    <!-- Heading -->
                    <h1 class="display-4 text-center text-md-left mb-3">
                        <?php the_field('hero_header'); ?>
                    </h1>
                    <?php } ?>
                    <?php if(get_field( "hero_sub-header" )) { ?>
                    <!-- Heading -->
                    <h2 class="display-4 text-center text-md-left mb-3">
                        <?php the_field('hero_sub-header'); ?>
                    </h2>
                    <?php } ?>
                    <?php if(get_field( "hero_description" )) { ?>
                    <!-- Text -->
                    <p class="lead text-center text-md-left text-muted">
                        <?php the_field('hero_description'); ?>
                    </p>
                	<?php } ?>
                    <!-- Buttons -->
                    <div class="text-center text-md-left mt-5">
                        <a href="#" class="btn btn-primary btn-icon">
                            <span class="btn-inner--text">Get started</span><span class="btn-inner--icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </span>
                        </a>
                        <a href="#" class="btn btn-neutral btn-icon d-none d-lg-inline-block">Learn more</a>
                    </div>
                </div>
            </div>
</section>
<?php } // end hero section ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
    $enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
    if(!$enable_vc ) {
    ?>
    <header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
    <?php }
     ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thisgeneration' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() && !$enable_vc ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'thisgeneration' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
