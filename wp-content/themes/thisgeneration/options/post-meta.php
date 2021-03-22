<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'post_meta', __( 'Sections', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'templates/section-builder.php' )
	->add_fields( array(
		Field::make( 'complex', 'crb_section_builder_sections', '' )
			->set_layout( 'tabbed-vertical' )
			->setup_labels( array(
				'singular_name' => 'Section',
				'plural_name' => 'Sections',
			) )
			->add_fields( 'intro-1', array(
				Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'bold,italic,link,formatselect,forecolor',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'text', 'button_1_link', __( 'Button 1 link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'button_1_text', __( 'Button 1 text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'button_2_link', __( 'Button 2 link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'button_2_text', __( 'Button 2 text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
			) )
			->add_fields( 'intro-2', array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) )
			) )
			->add_fields( 'intro-3', array(
				Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'bold,italic,link,formatselect,forecolor',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'text', 'button_link', __( 'Button link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'button_text', __( 'Button text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
			) )
			->add_fields( 'text-and-image-or-video', array(
				Field::make( 'checkbox', 'reverse_section', __( 'Reverse section', 'crb' ) )
					->set_option_value( 'yes' ),
				Field::make( 'radio', 'section_subtype', __( 'Choose Option', 'crb' ) )
					->set_options( array(
						'default' => 'Default',
						'counter_and_foot_image' => 'Counter and foot image'
					) ),
				Field::make( 'text', 'counter_text', __( 'Counter text', 'crb' ) )
					->set_conditional_logic( array(
						array(
							'field' => 'section_subtype',
							'value' => 'counter_and_foot_image',
						)
					) ),
				Field::make( 'rich_text', 'rich_text_title', __( 'Title', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'formatselect',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) ),
				Field::make( 'radio', 'radio_image_or_video', __( 'Choose Option', 'crb' ) )
					->set_options( array(
						'image' => 'Image',
						'video' => 'Video'
					) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_conditional_logic( array(
						array(
							'field' => 'radio_image_or_video',
							'value' => 'image',
						)
					) ),
				Field::make( 'image', 'video_thumbnail', __( 'Video thumbnail', 'crb' ) )
					->set_width( 50 )
					->set_conditional_logic( array(
						array(
							'field' => 'radio_image_or_video',
							'value' => 'video',
						)
					) ),
				Field::make( 'text', 'video_link', __( 'Video link', 'crb' ) )
					->set_width( 50 )
					->set_conditional_logic( array(
						array(
							'field' => 'radio_image_or_video',
							'value' => 'video',
						)
					) ),
				Field::make( 'text', 'button_1_link', __( 'Button 1 link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'button_1_text', __( 'Button 1 text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'button_2_link', __( 'Button 2 link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'text', 'button_2_text', __( 'Button 2 text', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'image', 'foot_image', __( 'Foot image', 'crb' ) )
					->set_conditional_logic( array(
						array(
							'field' => 'section_subtype',
							'value' => 'counter_and_foot_image',
						)
					) )
			) )
			->add_fields( 'counters', array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'button_link', __( 'Button Link', 'crb' ) ),
				Field::make( 'text', 'button_text', __( 'Button Text', 'crb' ) ),
				Field::make( 'complex', 'items_counters', __( 'Items - counters', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => 'Item',
						'plural_name' => 'Items',
					) )
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Image', 'crb' ) )
							->set_required( true ),
						Field::make( 'text', 'number', __( 'Number', 'crb' ) ),
						Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
						Field::make( 'text', 'description', __( 'Description', 'crb' ) )
					) )
			) )
			->add_fields( 'callout', array(
				Field::make( 'checkbox', 'alternative', __( 'Smaller font for text and larger font for form', 'crb' ) )
					->set_option_value( 'yes' ),
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'textarea', 'text', __( 'Text', 'crb' ) ),
				Field::make( 'gravity_form', 'form', __( 'Select a Form', 'crb' ) )
			) )
			->add_fields( 'text', array(
				Field::make( 'rich_text', 'rich_text_title', __( 'Title', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'formatselect,forecolor',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'bold,italic,link,formatselect,forecolor',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'text', 'button_link', __( 'Button link', 'crb' ) ),
				Field::make( 'text', 'button_text', __( 'Button text', 'crb' ) )
			) )
			->add_fields( 'story', array(
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					->set_required( true )
					->set_help_text( 'Recommended image size: 465x479' ),
				Field::make( 'text', 'video_link', __( 'Video link', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'image', 'video_thumbnail', __( 'Video thumbnail', 'crb' ) )
					->set_width( 50 ),
				Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) )
			) )
			->add_fields( 'about', array(
				Field::make( 'image', 'main_image', __( 'Main image', 'crb' ) ),
				Field::make( 'media_gallery', 'other_images', __( 'Other images', 'crb' ) ),
				Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) )
			) )
			->add_fields( 'questions', array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'complex', 'items_questions', __( 'Items - Questions', 'crb' ) )
					->set_layout( 'tabbed-vertical' )
					->setup_labels( array(
						'singular_name' => 'Item',
						'plural_name' => 'Items',
					) )
					->add_fields( array(
						Field::make( 'text', 'question', __( 'Question', 'crb' ) )
							->set_required( true ),
						Field::make( 'rich_text', 'answer', __( 'Answer', 'crb' ) )
							->set_required( true )
					) )
			) )
			->add_fields( 'testimonials', array(
				Field::make( 'complex', 'items_counters', __( 'Items - counters', 'crb' ) )
					->set_required( true )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => 'Item',
						'plural_name' => 'Items',
					) )
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Image', 'crb' ) )
							->set_required( true ),
						Field::make( 'text', 'number', __( 'Number', 'crb' ) ),
						Field::make( 'textarea', 'title', __( 'Title', 'crb' ) )
					) ),
				Field::make( 'image', 'background_image', __( 'Background image', 'crb' ) ),
				Field::make( 'complex', 'items_testimonials', __( 'Items - testimonials', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => 'Item',
						'plural_name' => 'Items',
					) )
					->add_fields( array(
						Field::make( 'text', 'text', __( 'Text', 'crb' ) ),
						Field::make( 'text', 'name', __( 'Name', 'crb' ) ),
						Field::make( 'rich_text', 'review_via_text', __( 'Review via text', 'crb' ) )
							->set_settings( array(
								'media_buttons' => false,
								'tinymce' => array(
									'toolbar1' => 'bold,italic,link,formatselect',
									'toolbar2' => false,
								),
								'quicktags' => false
							) ),
						Field::make( 'image', 'image', __( 'Image', 'crb' ) )
					) )
			) )
			->add_fields( 'features', array(
				Field::make( 'rich_text', 'rich_text_title', __( 'Title', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'bold,italic,formatselect,forecolor',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'complex', 'items_features', __( 'Items - features', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => 'Item',
						'plural_name' => 'Items',
					) )
					->add_fields( array(
						Field::make( 'text', 'link', __( 'Link', 'crb' ) ),
						Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) )
							->set_required( true )
							->set_settings( array(
								'media_buttons' => false,
								'tinymce' => array(
									'toolbar1' => 'bold,forecolor',
									'toolbar2' => false,
								),
								'quicktags' => false
							) )
					) )
			) )
			->add_fields( 'pricing', array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'text', 'subtitle', __( 'Subtitle', 'crb' ) ),
				Field::make( 'complex', 'items_prices', __( 'Items - prices', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => 'Item',
						'plural_name' => 'Items',
					) )
					->add_fields( array(
						Field::make( 'text', 'price', __( 'Price', 'crb' ) ),
						Field::make( 'rich_text', 'text', __( 'Text', 'crb' ) )
							->set_settings( array(
								'media_buttons' => false,
								'tinymce' => array(
									'toolbar1' => 'bold,italic,link',
									'toolbar2' => false,
								),
								'quicktags' => false
							) ),
							Field::make( 'text', 'button_link', __( 'Button link', 'crb' ) ),
							Field::make( 'text', 'button_text', __( 'Button text', 'crb' ) )
					) )
			) )
			->add_fields( 'text-and-image-type-2', array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'rich_text', 'rich_text_price', __( 'Price text', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'bold,italic,link',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'rich_text', 'rich_text', __( 'Text', 'crb' ) ),
				Field::make( 'text', 'button_link', __( 'Button link', 'crb' ) ),
				Field::make( 'text', 'button_text', __( 'Button text', 'crb' ) ),
				Field::make( 'image', 'image', __( 'Image', 'crb' ) )
			) )
			->add_fields( 'slider', array(
				Field::make( 'text', 'title', __( 'Title', 'crb' ) ),
				Field::make( 'complex', 'items_slides', __( 'Items - slides', 'crb' ) )
					->set_layout( 'tabbed-horizontal' )
					->setup_labels( array(
						'singular_name' => 'Item',
						'plural_name' => 'Items',
					) )
					->add_fields( array(
						Field::make( 'image', 'image', __( 'Image', 'crb' ) )
							->set_required( true )
					) ),
				Field::make( 'image', 'foot_image', __( 'Foot image', 'crb' ) )
			) )
			->add_fields( 'text-with-background', array(
				Field::make( 'checkbox', 'alt', __( 'Less top and bottom space', 'crb' ) )
					->set_option_value( 'yes' ),
				Field::make( 'image', 'background_image', __( 'Background image', 'crb' ) ),
				Field::make( 'rich_text', 'rich_text_title', __( 'Title', 'crb' ) )
					->set_settings( array(
						'media_buttons' => false,
						'tinymce' => array(
							'toolbar1' => 'bold,italic,link,formatselect,forecolor',
							'toolbar2' => false,
						),
						'quicktags' => false
					) ),
				Field::make( 'gravity_form', 'form', __( 'Select a Form', 'crb' ) )
			) )
	) );

Container::make( 'post_meta', __( 'Page footer options', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_id', '!=', get_option( 'page_for_posts' ) )
	->add_fields( array(
		Field::make( 'checkbox', 'crb_show_footer_top_logo', __( 'Show footer top logo', 'crb' ) )
			->set_option_value( 'yes' )
	) );

Container::make( 'post_meta', __( 'Page options', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_id', '=', get_option( 'page_for_posts' ) )
	->add_tab( __( 'Intro', 'crb' ), array(
		Field::make( 'rich_text', 'crb_blog_rich_text_title', __( 'Title', 'crb' ) ),
		Field::make( 'image', 'crb_blog_image', __( 'Image', 'crb' ) )
	) );

Container::make( 'post_meta', __( 'Post options', 'crb' ) )
	->where( 'post_type', '=', 'post' )
	->add_fields( array(
		Field::make( 'image', 'crb_post_background_image', __( 'Background image', 'crb' ) ),
		Field::make( 'checkbox', 'crb_post_is_video_post', __( 'Video post', 'crb' ) )
			->set_option_value( 'yes' )
	) );

Container::make( 'post_meta', __( 'Page options', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->where( 'post_template', '=', 'default' )
	->where( 'post_id', '!=', get_option( 'page_for_posts' ) )
	->add_fields( array(
		Field::make( 'image', 'crb_page_background_image', __( 'Background image', 'crb' ) )
	) );

Container::make( 'user_meta', __( 'User options', 'crb' ) )
	->add_fields( array(
		Field::make( 'text', 'crb_user_facebook_link', __( 'Facebook link', 'crb' ) ),
		Field::make( 'text', 'crb_user_instagram_link', __( 'Instagram link', 'crb' ) ),
		Field::make( 'text', 'crb_user_youtube_link', __( 'YouTube link', 'crb' ) ),
		Field::make( 'text', 'crb_user_linkedin_link', __( 'LinkedIn link', 'crb' ) )
	) );

/*
Container::make( 'post_meta', __( 'Custom Data', 'crb' ) )
	->where( 'post_type', '=', 'page' )
	->add_fields( array(
	Field::make( 'complex', 'crb_my_data' )
		->add_fields( array(
		Field::make( 'text', 'title' )
			->help_text( 'lorem' ),
		) ),
	Field::make( 'map', 'crb_location' )
		->set_position( 37.423156, -122.084917, 14 ),
	Field::make( 'image', 'crb_img' ),
	Field::make( 'file', 'crb_pdf' ),
	) );
*/
