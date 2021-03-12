<?php

function crb_get_social_icon_names() {
	$socials = [
		'facebook-f' => 'facebook',
		'instagram' => 'instagram',
		'youtube' => 'youtube',
		'linkedin-in' => 'linkedin'
	];

	return $socials;
}

function crb_has_socials() {
	$socials = crb_get_social_icon_names();

	foreach ( $socials as $social ) {
		if ( carbon_get_theme_option( 'crb_' . $social . '_url' ) ) {
			return true;
		}
	}

	return false;
}

function crb_author_has_socials() {
	$socials = crb_get_social_icon_names();

	foreach ( $socials as $social ) {
		if ( carbon_get_user_meta( get_the_author_meta( 'ID' ), 'crb_user_' . $social . '_link' ) ) {
			return true;
		}
	}

	return false;
}
