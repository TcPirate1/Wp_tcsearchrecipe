<?php

if ( ! get_theme_mod( 'recipes_blog_enable_menus_section', false ) ) {
	return;
}

$args = '';

recipes_blog_render_service_section( $args );

/**
 * Render Service Section.
 */
function recipes_blog_render_service_section( $args ) { ?>
	<section id="recipes_blog_trending_section" class="asterthemes-frontpage-section trending-section trending-style-1">
		<?php
		if ( is_customize_preview() ) :
			recipes_blog_section_link( 'recipes_blog_service_section' );
		endif; ?>

		<div class="asterthemes-wrapper">
			<div class="menus-section">
				<?php
					$recipes_blog_heading_menus_section = get_theme_mod( 'recipes_blog_heading_menus_section', '' );
					if ( ! empty( $recipes_blog_heading_menus_section ) ) { ?>

					<h3><?php echo esc_html( $recipes_blog_heading_menus_section ); ?></h3>
				<?php } ?>
				<div class="tab">
			        <?php $recipes_blog_featured_post = get_theme_mod('recipes_blog_menus_number', '');
			          	for ( $j = 1; $j <= $recipes_blog_featured_post; $j++ ){ ?>
		          		<button class="tablinks" onclick="recipes_blog_menus_tab(event, '<?php $recipes_blog_main_id = get_theme_mod('recipes_blog_menus_text'.$j); $recipes_blog_tab_id = str_replace(' ', '-', $recipes_blog_main_id); echo $recipes_blog_tab_id; ?> ')">
			          	<?php echo esc_html(get_theme_mod('recipes_blog_menus_text'.$j)); ?></button>
			        <?php }?>
		      	</div>

		  	  	<?php for ( $j = 1; $j <= $recipes_blog_featured_post; $j++ ){ ?>
			        <div id="<?php $recipes_blog_main_id = get_theme_mod('recipes_blog_menus_text'.$j); $recipes_blog_tab_id = str_replace(' ', '-', $recipes_blog_main_id); echo $recipes_blog_tab_id; ?>"  class="tabcontent">
			        	<div class="menus_main_box">
					        <?php $args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'category_name' =>  get_theme_mod('recipes_blog_menus_category'.$j),
								'posts_per_page' => 9,
							); ?>
						    <?php $recipes_blog_arr_posts = new WP_Query( $args );
						    	if ( $recipes_blog_arr_posts->have_posts() ) :
						      	while ( $recipes_blog_arr_posts->have_posts() ) :
						        $recipes_blog_arr_posts->the_post();
						        ?>
						        <div class="menus_inner_box">
									<?php if ( has_post_thumbnail() ) :
										the_post_thumbnail();
									endif; ?>
									<div class="menus_content_box">
						        		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						            </div>
						        </div>
						      	<?php
						    endwhile;
						    wp_reset_postdata();
						    endif; ?>
					   	</div>
					</div>
				<?php }?>
			</div>
		</div>
	</section>
	<?php
}
