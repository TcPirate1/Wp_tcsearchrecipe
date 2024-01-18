<?php
/**
 * Recipes Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package recipes_blog
 */

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Will throw exception if no .env file is found.

$spoonacular_api_key = getenv('SPOONACULAR_API_KEY');
// Fetch random recipe data
$url = "https://api.spoonacular.com/recipes/random?apiKey=$spoonacular_api_key";
$response = wp_remote_get($url);
$body = wp_remote_retrieve_body($response);
$data = json_decode($body, true);

if ( ! defined( 'RECIPES_BLOG_VERSION' ) ) {
	define( 'RECIPES_BLOG_VERSION', '1.0.0' );
}
$recipes_blog_theme_data = wp_get_theme();

if( ! defined( 'recipes_blog_THEME_NAME' ) ) define( 'recipes_blog_THEME_NAME', $recipes_blog_theme_data->get( 'Name' ) );

if ( ! function_exists( 'recipes_blog_setup' ) ) :
	
	function recipes_blog_setup() {
		
		load_theme_textdomain( 'recipes-blog', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'recipes-blog' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'recipes_blog_custom_background_args',
				array(
					'default-color' => '101010',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'recipes_blog_setup' );

function recipes_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'recipes_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'recipes_blog_content_width', 0 );

function recipes_blog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'recipes-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'recipes-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	register_sidebars(
		4,
		array(
			/* translators: %d: Footer Widget count. */
			'name'          => esc_html__( 'Footer Widget %d', 'recipes-blog' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'recipes-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title"><span>',
			'after_title'   => '</span></h6>',
		)
	);
}
add_action( 'widgets_init', 'recipes_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function recipes_blog_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'recipes-blog-slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'recipes-blog-fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'recipes-blog-style', get_template_directory_uri() . '/style.css', array(), RECIPES_BLOG_VERSION );

	// Navigation script.
	wp_enqueue_script( 'recipes-blog-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), RECIPES_BLOG_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'recipes-blog-slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'recipes-blog-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), RECIPES_BLOG_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'play',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap' ),
		array(),
		'1.0'
	);

	// Load the webfont.
	wp_enqueue_style(
		'readex',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200;300;400;500;600;700&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'recipes_blog_scripts' );

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'recipes_blog_loop_columns', 999);
if (!function_exists('recipes_blog_loop_columns')) {
	function recipes_blog_loop_columns() {
		return 3; // 3 products per row
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/theme-library/function-files/woocommerce.php';
}

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';



/**
 * GET STRAT FUNCTION
 */

function recipes_blog_getpage_css($hook) {
	wp_enqueue_script( 'recipes-blog-admin-script', get_template_directory_uri() . '/resource/js/recipes-blog-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'recipes-blog-admin-script', 'recipes_blog_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'recipes-blog-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'recipes_blog_getpage_css' );


add_action('wp_ajax_recipes_blog_dismissable_notice', 'recipes_blog_dismissable_notice');
function recipes_blog_switch_theme() {
    delete_user_meta(get_current_user_id(), 'recipes_blog_dismissable_notice');
}
add_action('after_switch_theme', 'recipes_blog_switch_theme');
function recipes_blog_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'recipes_blog_dismissable_notice', true);
    die();
}

function recipes_blog_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'recipes_blog_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
	    	
	    	<div class="at-admin-content" ><h2><?php esc_html_e('Welcome to Recipes Blog', 'recipes-blog'); ?></h2>
                <p><?php _e('Explore the features of our Pro Theme and take your recipes journey to the next level.', 'recipes-blog'); ?></p>
                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'recipes-blog'); ?><p>
                <div style="display: flex; justify-content: center;">

	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=recipes-blog-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'recipes-blog' ) ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/recipes-blog/"><?php esc_html_e('View Demo', 'recipes-blog') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/recipes-bloggers-wordpress-theme?_pos=1&_psq=reci&_ss=e&_v=1.0"><?php esc_html_e('Buy Now', 'recipes-blog') ?></a>
                </div>
            </div>
            <div class="at-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'recipes_blog_deprecated_hook_admin_notice' );


//Admin Notice For Getstart
function recipes_blog_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}