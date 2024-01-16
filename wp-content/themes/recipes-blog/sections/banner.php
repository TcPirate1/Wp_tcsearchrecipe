<?php
if ( ! get_theme_mod( 'recipes_blog_enable_banner_section', false ) ) {
	return;
}

$slider_content_ids  = array();
$slider_content_type = get_theme_mod( 'recipes_blog_banner_slider_content_type', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$slider_content_ids[] = get_theme_mod( 'recipes_blog_banner_slider_content_' . $slider_content_type . '_' . $i );
}
$banner_slider_args = array(
	'post_type'           => $slider_content_type,
	'post__in'            => array_filter( $slider_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);
$banner_slider_args = apply_filters( 'recipes_blog_banner_section_args', $banner_slider_args );

recipes_blog_render_banner_section( $banner_slider_args );

/**
 * Render Banner Section.
 */
function recipes_blog_render_banner_section( $banner_slider_args ) {     ?>

	<section id="recipes_blog_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			recipes_blog_section_link( 'recipes_blog_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$query = new WP_Query( $banner_slider_args );
			if ( $query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider recipes-blog-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php
					$i = 1;
					while ( $query->have_posts() ) :
						$query->the_post();
						$button_label = get_theme_mod( 'recipes_blog_banner_button_label_' . $i, '' );
						$button_link  = get_theme_mod( 'recipes_blog_banner_button_link_' . $i, '' );
						$button_link  = ! empty( $button_link ) ? $button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-img">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="banner-caption">
									<div class="asterthemes-wrapper">
										<div class="banner-catption-wrapper">
											<h1 class="banner-caption-title">
												<?php the_title(); ?>
											</h1>
											<?php if ( ! empty( $button_label ) ) { ?>
												<div class="banner-slider-btn">
													<a href="<?php echo esc_url( $button_link ); ?>" class="asterthemes-button"><?php echo esc_html( $button_label ); ?></a>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}
