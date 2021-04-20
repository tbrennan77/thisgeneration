<?php
	$has_button_1 	 = ! empty( $section['button_1_text'] );
	$has_button_2 	 = ! empty( $section['button_2_text'] );
	$contact_email 	 = $section['contact_email'];
	$contact_phone   = $section['contact_phone'];
	$contact_website = $section['contact_website'];
	//$is_full_width   = $section['full_width'];
	//$css_class  	 = $section['css_class'];
	$has_socials 	 = $section['show_social_share']; //= crb_has_socials();

	$has_image = ( $section['radio_image_or_video'] === 'image' ) && ! empty( $section['image'] );
	$has_video = ( $section['radio_image_or_video'] === 'video' ) && ! empty( $section['video_link'] ) && ! empty( $section['video_thumbnail'] );

	$has_image_or_video = $has_image || $has_video;

	$section_reverse_class = '';
	$section_alt_class = '';
	$is_section_alt = false;

	if ( ! empty( $section['reverse_section'] ) ) {
		$section_reverse_class = 'section-cols--reverse';
	}

	if ( ! empty( $section['section_subtype'] ) && $section['section_subtype'] === 'counter_and_foot_image' ) {
		$section_alt_class = 'section-cols--alt';
		$is_section_alt = true;
	}
?>

<?php if ( ! empty( $section['rich_text_title'] ) || ! empty( $section['rich_text'] ) || $has_image_or_video || $has_button_1 || $has_button_2 ) : ?>
	<section class="section-cols <?php echo esc_attr( $section_alt_class ); ?> <?php echo esc_attr( $section_reverse_class ); ?>">
		<div class="shell">
			<div class="section__inner">
				<?php if ( ! empty( $section['rich_text_title'] ) || ! empty( $section['rich_text'] ) || $has_button_1 || $has_button_2 ) : ?>
					<div class="section__content">
						<div class="section__content-inner">
							<?php if ( $is_section_alt && ! empty( $section['counter_text'] ) ) : ?>
								<div class="section__counter">
									<span>
										<?php
											echo esc_html( $section['counter_text'] );
										?>
									</span>
								</div><!-- /.section__counter -->
							<?php endif; ?>

							<?php if ( ! empty( $section['rich_text_title'] ) ) : ?>
								<header class="section__head">
									<?php
										echo apply_filters( 'the_content', $section['rich_text_title'] );
									?>
								</header><!-- /.section__head -->
							<?php endif; ?>

							<?php if ( ! empty( $section['rich_text'] ) ) : ?>
								<div class="section__entry richtext-entry">
									<?php
										echo apply_filters( 'the_content', $section['rich_text'] );
									?>
								</div><!-- /.section__entry -->
								<div class="section__actions links">
									<ul>
										<?php if ( $contact_email ) : ?>
											<li>
												<i class="fal fa-envelope"></i><a href="mailto:<?php
													echo $section['contact_email'];
												?>"><?php
													echo $section['contact_email'];
												?></a>
											</li>
										<?php endif; ?>
										<?php if ( $contact_phone ) : ?>
											<li>
												<i class="fal fa-mobile"></i><a href="tel:<?php
												 	echo $section['contact_phone'];
												?>"><?php
												 	echo $section['contact_phone'];
												?></a>
											</li>
										<?php endif; ?>
										<?php if ( $contact_website ) : ?>
											<li><i class="fal fa-browser"></i><a href="<?php
													echo $section['contact_website'];
												?>" target="_blank">
												<?php
													echo $section['contact_website'];
												?></a>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( $has_button_1 || $has_button_2 ) : ?>
								<div class="section__actions">
									<ul>
										<?php if ( $has_button_1 ) : ?>
											<li>
												<a href="<?php echo esc_url( $section['button_1_link'] ); ?>" class="btn btn--block <?php if (!($section['button_1_link'])) { echo "disabled"; } ?>">
													<?php
														echo esc_html( $section['button_1_text'] );
													?>
												</a>
											</li>
										<?php endif; ?>

										<?php if ( $has_button_2 ) : ?>
											<li>
												<a href="<?php echo esc_url( $section['button_2_link'] ); ?>" class="btn btn--block btn--ghost">
													<?php
														echo esc_html( $section['button_2_text'] );
													?>
												</a>
											</li>
										<?php endif; ?>
									</ul>
								</div><!-- /.section__actions -->
							<?php endif; ?>

							<?php if ( $has_socials ) : ?>
								<footer class="section__foot">
									<div class="share__text">Share: </div><?php
										crb_render_fragment( 'socials', array(
											'additional_class' => ''
										) );
									?>
								</footer><!-- /.section__foot -->
							<?php endif; ?>


						</div><!-- /.section__content-inner -->
					</div><!-- /.section__content -->
				<?php endif; ?>

				<?php if ( $has_image_or_video ) : ?>
					<aside class="section__aside">
						<div class="section__image">
							<?php
								if ( $has_image ) {
									echo wp_get_attachment_image( $section['image'], 'large' );
								}
								else if ( $has_video ) {
									echo wp_get_attachment_image( $section['video_thumbnail'], 'large' );
								}
							?>

							<?php if ( $has_video ) : ?>
								<a href="<?php echo esc_url( $section['video_link'] ); ?>" class="btn-play js-iframe-popup"></a>
							<?php endif; ?>
						</div><!-- /.section__image -->
					</aside><!-- /.section__aside -->
				<?php endif; ?>
			</div><!-- /.section__inner -->

			<?php if ( $is_section_alt && ! empty( $section['foot_image'] ) ) : ?>
				<footer class="section__foot">
					<?php
						echo wp_get_attachment_image( $section['foot_image'], 'large' );
					?>
				</footer><!-- /.section__foot -->
			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section-cols -->
<?php endif; ?>
