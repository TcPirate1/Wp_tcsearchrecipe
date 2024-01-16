<?php
/**
 * Getting Started Page.
 *
 * @package recipes_blog
 */

if( ! function_exists( 'recipes_blog_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function recipes_blog_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'recipes-blog' ),
		__( 'Getting Started', 'recipes-blog' ),
		'manage_options',
		'recipes-blog-getting-started',
		'recipes_blog_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'recipes_blog_getting_started_menu' );

if( ! function_exists( 'recipes_blog_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function recipes_blog_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_recipes-blog-getting-started' != $hook ) return;

    wp_enqueue_style( 'recipes-blog-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, RECIPES_BLOG_VERSION );

    wp_enqueue_script( 'recipes-blog-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), RECIPES_BLOG_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'recipes_blog_getting_started_admin_scripts' );

if( ! function_exists( 'recipes_blog_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function recipes_blog_getting_started_page(){ 
	$recipes_blog_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'recipes-blog' );?> <span class="theme-name"><?php echo esc_html( recipes_blog_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$recipes_blog_description = explode( '. ', $recipes_blog_theme->get( 'Description' ) );

						array_pop( $recipes_blog_description );

						$recipes_blog_description = implode( '. ', $recipes_blog_description );

						echo esc_html( $recipes_blog_description . '.' );
					?></p>
					<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/recipes-blog/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'recipes-blog' ); ?>" target="_blank">
			            <?php esc_html_e( 'REVIEW', 'recipes-blog' ); ?>
			        </a>
			        <a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/recipes-blog/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'recipes-blog' ); ?>" target="_blank">
			            <?php esc_html_e( 'CONTACT SUPPORT', 'recipes-blog' ); ?>
			        </a>
				</div>
				<div class="intro-img">
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/screenshot.png'; ?>" />
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'recipes-blog' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'recipes-blog' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;