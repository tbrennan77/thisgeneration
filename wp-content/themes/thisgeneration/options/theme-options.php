<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->set_page_file( 'crbn-theme-options.php' )
	->add_tab( __( 'Header', 'crb' ), array(
		Field::make( 'text', 'crb_header_button_link', __( 'Button link', 'crb' ) ),
		Field::make( 'text', 'crb_header_button_text', __( 'Button text', 'crb' ) ),
	) )
	->add_tab( __( 'Footer', 'crb' ), array(
		Field::make( 'image', 'crb_footer_background_image', __( 'Background image', 'crb' ) ),
		Field::make( 'rich_text', 'crb_footer_copyright', __( 'Copyright', 'crb' ) )
			->set_settings( array(
				'media_buttons' => false,
				'tinymce' => array(
					'toolbar1' => 'bold,italic,link',
					'toolbar2' => false,
				),
				'quicktags' => false
			) )
	) )
	->add_tab( __( 'Socials', 'crb' ), array(
		Field::make( 'text', 'crb_facebook_url', __( 'Facebook link', 'crb' ) ),
		Field::make( 'text', 'crb_instagram_url', __( 'Instagram link', 'crb' ) ),
		Field::make( 'text', 'crb_linkedin_url', __( 'LinkedIn link', 'crb' ) )
	) )
	->add_tab( __( 'Blog callout', 'crb' ), array(
		Field::make( 'checkbox', 'crb_blog_callout_alternative', __( 'Smaller font for text and larger font for form', 'crb' ) )
			->set_option_value( 'yes' ),
		Field::make( 'text', 'crb_blog_callout_title', __( 'Title', 'crb' ) ),
		Field::make( 'textarea', 'crb_blog_callout_text', __( 'Text', 'crb' ) ),
		Field::make( 'gravity_form', 'crb_blog_callout_form', __( 'Select a Form', 'crb' ) )
	) )
	->add_tab( __( 'Misc', 'crb' ), array(
		Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script', 'crb' ) ),
		Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script', 'crb' ) ),
	) );
