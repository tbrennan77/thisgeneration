<?php
/**
 * Template Name: Landing Page
 */
?>

<?php
	get_header();

	$sections = carbon_get_the_post_meta( 'crb_section_builder_sections' );

	foreach ( $sections as $section ) {
		crb_render_fragment( 'section-' . $section['_type'] , array(
			'section' => $section
		) );
	}

	get_footer();
?>
