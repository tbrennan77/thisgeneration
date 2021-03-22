<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<meta name="viewport" id="viewportMeta" content="width=1440, initial-scale=1.0" />

	<script>
	   (function(window, undefined) {
		   function viewportMetaContent() {
			   var viewportMeta = document.getElementById('viewportMeta');
			   if ( screen.width < 768 ) {
				   viewportMeta.setAttribute('content', 'width=device-width, user-scalable=no');
			   } else {
				   viewportMeta.setAttribute('content', 'width=1440');
			   };
		   };

		   viewportMetaContent();
		   window.addEventListener('resize', viewportMetaContent, false);
	   })(window);
	</script>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<div class="wrapper__inner">
			<header class="header">
				<div class="shell shell--lg">
					<div class="header__inner">
						<a href="<?php echo esc_url( get_home_url() ); ?>" class="logo">
							<?php
								echo esc_html( get_bloginfo( 'name' ) );
							?>

							<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/logo.png" alt="">
						</a>

						<?php
							$header_button_link = carbon_get_theme_option( 'crb_header_button_link' );
							$header_button_text = carbon_get_theme_option( 'crb_header_button_text' );

							$header_button_link_2 = carbon_get_theme_option( 'crb_header_button_link_2' );
							$header_button_text_2 = carbon_get_theme_option( 'crb_header_button_text_2' );

							$has_button = ! empty( $header_button_link ) && ! empty( $header_button_text );
							$has_button_2 = ! empty( $header_button_link_2 ) && ! empty( $header_button_text_2 );
						?>

						<?php if ( has_nav_menu( 'header-location' ) || $has_button ) : ?>
							<nav class="nav">
								<ul>
									<?php
										if ( has_nav_menu( 'header-location' ) ) {
											wp_nav_menu( array(
												'container' => '',
												'items_wrap' => '%3$s',
												'theme_location' => 'header-location'
											) );
										}
									?>

									<?php if ( $has_button ) : ?>
										<li class="nav__btn">
											<a href="<?php echo esc_url( $header_button_link ); ?>">
												<?php
													echo esc_html( $header_button_text );
												?>
											</a>
										</li>
									<?php endif; ?>

									<?php if ( $has_button_2 ) : ?>
										<li class="nav__btn ghost">
											<a href="<?php echo esc_url( $header_button_link_2 ); ?>" class="btn--ghost">
												<?php
													echo esc_html( $header_button_text_2 );
												?>
											</a>
										</li>
									<?php endif; ?>
								</ul>
							</nav><!-- /.nav -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'header-location' ) || $has_button ) : ?>
							<a href="#" class="nav-trigger js-nav-trigger">
								<span></span>

								<span></span>

								<span></span>
							</a>
						<?php endif; ?>
					</div><!-- /.header__inner -->
				</div><!-- /.shell -->
			</header><!-- /.header -->

			<div class="main">
