<?php if ( ! empty( $section['title'] ) || ! empty( $section['items_questions'] ) ) : ?>
	<section class="section-questions">
		<div class="shell">
			<?php if ( ! empty( $section['title'] ) ) : ?>
				<header class="section__head">
					<h1>
						<?php
							echo esc_html( $section['title'] );
						?>
					</h1>
				</header><!-- /.section__head -->
			<?php endif; ?>

			<?php if ( ! empty( $section['items_questions'] ) ) : ?>
				<div class="section__body">
					<div class="questions">
						<ul>
							<?php foreach ( $section['items_questions'] as $item ) : ?>
								<?php if ( ! empty( $item['question'] ) && ! empty( $item['answer'] ) ) : ?>
									<li>
										<div class="question">
											<div class="question__head">
												<h6>
													<?php
														echo esc_html( $item['question'] );
													?>
												</h6>
											</div><!-- /.question__head -->

											<div class="question__body">
												<div class="question__entry richtext-entry">
													<?php
														echo apply_filters( 'the_content', $item['answer'] );
													?>
												</div><!-- /.question__entry -->
											</div><!-- /.question__body -->
										</div><!-- /.question -->
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div><!-- /.questions -->
				</div><!-- /.section__body -->
			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section-questions -->
<?php endif; ?>
