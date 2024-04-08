<?php

/**
 * Custom template tags for this theme
 *
 * @package recipes_blog
 */

if ( ! function_exists( 'recipes_blog_posted_on_single' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time on single posts.
     */
    function recipes_blog_posted_on_single() {
        if ( get_theme_mod( 'recipes_blog_single_post_hide_date', false ) ) {
            return;
        }

        $recipes_blog_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $recipes_blog_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $recipes_blog_time_string = sprintf(
            $recipes_blog_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $recipes_blog_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $recipes_blog_time_string . '</a></span>';

        echo $recipes_blog_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'recipes_blog_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function recipes_blog_posted_on() {
        if ( get_theme_mod( 'recipes_blog_post_hide_date', false ) ) {
            return;
        }

        $recipes_blog_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $recipes_blog_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $recipes_blog_time_string = sprintf(
            $recipes_blog_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $recipes_blog_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $recipes_blog_time_string . '</a></span>';

        echo $recipes_blog_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;


if ( ! function_exists( 'recipes_blog_posted_by_single' ) ) :
    /**
     * Prints HTML with meta information for the current author on single posts.
     */
    function recipes_blog_posted_by_single() {
        if ( get_theme_mod( 'recipes_blog_single_post_hide_author', false ) ) {
            return;
        }
        $recipes_blog_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $recipes_blog_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'recipes_blog_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function recipes_blog_posted_by() {
        if ( get_theme_mod( 'recipes_blog_post_hide_author', false ) ) {
            return;
        }
        $recipes_blog_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $recipes_blog_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

	/**
	 * Prints HTML with meta information for the categories.
	 */

if ( ! function_exists( 'recipes_blog_categories_single_list' ) ) :
    function recipes_blog_categories_single_list( $with_background = false ) {
        if ( is_singular( 'post' ) ) {
            $recipes_blog_hide_category = get_theme_mod( 'recipes_blog_single_post_hide_category', false );

            if ( ! $recipes_blog_hide_category ) {
                $recipes_blog_categories = get_the_category();
                $recipes_blog_separator  = '';
                $recipes_blog_output     = '';
                if ( ! empty( $recipes_blog_categories ) ) {
                    foreach ( $recipes_blog_categories as $category ) {
                        $recipes_blog_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $recipes_blog_separator;
                    }
                    echo trim( $recipes_blog_output, $recipes_blog_separator );
                }
            }
        }
    }
endif;

if ( ! function_exists( 'recipes_blog_categories_list' ) ) :
    function recipes_blog_categories_list( $with_background = false ) {
        $recipes_blog_hide_category = get_theme_mod( 'recipes_blog_post_hide_category', true );

        if ( ! $recipes_blog_hide_category ) {
            $recipes_blog_categories = get_the_category();
            $recipes_blog_separator  = '';
            $recipes_blog_output     = '';
            if ( ! empty( $recipes_blog_categories ) ) {
                foreach ( $recipes_blog_categories as $category ) {
                    $recipes_blog_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $recipes_blog_separator;
                }
                echo trim( $recipes_blog_output, $recipes_blog_separator );
            }
        }
    }
endif;

if ( ! function_exists( 'recipes_blog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function recipes_blog_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
			$recipes_blog_hide_tag = get_theme_mod( 'recipes_blog_post_hide_tags', false );

			if ( ! $recipes_blog_hide_tag ) {
				/* translators: used between list items, there is a space after the comma */
				$recipes_blog_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'recipes-blog' ) );
				if ( $recipes_blog_tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'recipes-blog' ) . '</span>', $recipes_blog_tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'recipes-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'recipes_blog_post_thumbnail' ) ) :
	function recipes_blog_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			if ( get_theme_mod( 'recipes_blog_single_post_hide_feature_image', false ) ) {
			return;
		}
			?>

			<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else :
  			if ( get_theme_mod( 'recipes_blog_post_hide_feature_image', false ) ) {
				return;
		    }
		 ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
