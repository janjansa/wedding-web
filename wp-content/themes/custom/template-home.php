<?php
/*
	   Template name: Home
   */
?>

<?php
get_header(
	null,
	array(
		'rootClasses' => '--home-loader',
		'bodyClasses' => '--home-loader',
	)
);
?>


<?php
get_template_part(
	'includes/section',
	'navbar',
	array(
		'classes' => '--loader-nav',
	)
);
?>

<?php
get_template_part(
	'includes/section',
	'smoothscroll',
);
?>



	<section class="c-hero --loader-prepare">
		<div class="container">
			<?php while (have_rows('hero')) :
				the_row(); ?>
				<div class="c-hero__headline-wrap">
					<h1 class="c-hero__headline --loader-headline desktop-tablet-only"><span>
							<?php the_sub_field('headline_first_line'); ?>
						</span> <span>
							<?php the_sub_field('headline_second_line'); ?>
						</span> <span>
							<?php the_sub_field('headline_third_line'); ?>
						</span></h1>
					<h1 class="c-hero__headline --loader-appear-up phone-only">
						<?php the_sub_field('headline_first_line'); ?>
						<?php the_sub_field('headline_second_line'); ?>
						<?php the_sub_field('headline_third_line'); ?>
					</h1>
					<p class="c-hero__sub-headline --loader-left">
						<?php the_sub_field('small_text'); ?>
					</p>
				</div>
				<a class="c-hero__scroll-btn --cursor-orange-small --loader-right" role="button" title="scroll down">
					<div class="btn-arrow-css btn-arrow-css--homepage">
						<div class="btn-arrow-css__arrow">
							<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14.5179 22.3001C14.7841 22.5664 15.2159 22.5664 15.4821 22.3001L19.8212 17.9611C20.0874 17.6948 20.0874 17.2631 19.8212 16.9968C19.5549 16.7306 19.1232 16.7306 18.8569 16.9968L15 20.8538L11.1431 16.9968C10.8768 16.7306 10.4451 16.7306 10.1788 16.9968C9.91255 17.2631 9.91255 17.6948 10.1788 17.9611L14.5179 22.3001ZM14.3182 8.18164V21.818H15.6818V8.18164H14.3182Z" fill="#485956" />
							</svg>
						</div>
					</div>
					<?php the_sub_field('arrow_button_text'); ?>
				</a>
				<div class="c-hero__video">
					<div class="c-hero__video__animation-frame showreel-video-link --cursor-orange-play --loader-left-long">
						<?php while ( have_rows( 'video' ) ) : the_row(); ?>
								<?php while ( have_rows( 'content-switcher-base' ) ) : the_row(); ?>
									<?php echo do_shortcode("[wp-video-popup id='showreel-video-link' video='".get_sub_field( 'video_embed_link' )."']");?>
								<?php endwhile; ?>
						<?php endwhile; ?>
						<?php
						get_template_part(
							'includes/section',
							'content-switcher-base',
							array(
								'field' => "video",
								'classes' => '',
							)
						);
						?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</section>



	<?php
		get_template_part(
			'includes/section',
			'footer',
			array(
				'classes' => '',
			)
		);
	?>

	</div> <!-- smooth-content -->
</div> <!-- smooth-wrapper -->

<?php get_footer(); ?>