<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function recipe_delights_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'recipe-delights', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'recipe_delights_theme_setup', 100 );

function recipe_delights_styles() {
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];

    wp_enqueue_style( 'blossom-recipe', get_template_directory_uri()  . '/style.css' );
    wp_enqueue_style( 'recipe-delights-style', get_stylesheet_directory_uri() . '/style.min.css', array( 'blossom-recipe' ), $version );

    wp_enqueue_script( 'recipe-delights-custom', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery'), $version, true );
}
add_action( 'wp_enqueue_scripts', 'recipe_delights_styles');

function blossom_recipe_header(){ 
    $ed_cart   = get_theme_mod( 'ed_shopping_cart', true );
    $ed_search = get_theme_mod( 'ed_header_search', true ); ?>

    <header id="masthead" class="site-header header-three" itemscope itemtype="https://schema.org/WPHeader">
        <div class="header-t">
            <div class="container">
                <?php if( blossom_recipe_social_links( false ) ){
                    echo '<div class="header-social-icons">';
                    blossom_recipe_social_links();
                    echo '</div>';
                }  blossom_recipe_primary_nagivation(); ?>
                <?php if( ( blossom_recipe_is_woocommerce_activated() && $ed_cart ) || $ed_search ){ 
                    echo '<div class="search-wrap">';
                    if( $ed_search ) blossom_recipe_form_section();
                    if( blossom_recipe_is_woocommerce_activated() && $ed_cart ) blossom_recipe_wc_cart_count();
                    echo '</div>';
                } ?>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <?php blossom_recipe_site_branding( false ); ?>
            </div>
        </div><!-- .main-header -->
    </header>
    <?php
}

function blossom_recipe_banner(){
    if( is_front_page() || is_home() ) {
        $ed_banner          = get_theme_mod( 'ed_banner_section', 'slider_banner' );
        $slider_type        = get_theme_mod( 'slider_type', 'latest_posts' ); 
        $slider_cat         = get_theme_mod( 'slider_cat' );
        $posts_per_page     = get_theme_mod( 'no_of_slides', 4 );
        $banner_title       = get_theme_mod( 'banner_title', __( 'Relaxing Is Never Easy On Your Own', 'recipe-delights' ) );
        $banner_subtitle    = get_theme_mod( 'banner_subtitle' , __( 'Come and discover your oasis. It has never been easier to take a break from stress and the harmful factors that surround you every day!', 'recipe-delights' ) ) ;
        $banner_button      = get_theme_mod( 'banner_button', __( 'Read More', 'recipe-delights' ) );
        $banner_url         = get_theme_mod( 'banner_url', '#' );

        $image_size = 'blossom-recipe-slider';
        
        if( $ed_banner == 'static_banner' && has_custom_header() ){ ?>
            <div class="site-banner static-banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>">
                <?php 
                the_custom_header_markup(); 
                if( $ed_banner == 'static_banner' && ( $banner_title || $banner_subtitle || ( $banner_button && $banner_url ) )){ ?>
                    <div class="banner-caption">
                        <div class="container">
                            <?php 
                            if( $banner_title ) echo '<h2 class="banner-title">' . esc_html( $banner_title ) . '</h2>';
                            if( $banner_subtitle ) echo '<div class="banner-desc">' . wp_kses_post( $banner_subtitle ) . '</div>';
                            if( $banner_button && $banner_url ) echo '<a href="'.esc_url( $banner_url ).'" class="btn btn-green"><span>'.esc_html( $banner_button ).'</span></a>';
                            ?>
                        </div>
                    </div> <?php 
                }
                ?>
            </div>
            <?php
        }elseif( $ed_banner == 'slider_banner' ){
            if( $slider_type == 'latest_posts' || $slider_type == 'cat' || ( blossom_recipe_is_brm_activated() && $slider_type == 'latest_recipes' ) || ( blossom_recipe_is_delicious_recipe_activated() && $slider_type == 'latest_dr_recipe' ) ){
            
                $args = array(
                    'post_status'         => 'publish',            
                    'ignore_sticky_posts' => true
                );
                if( blossom_recipe_is_delicious_recipe_activated() && $slider_type == 'latest_dr_recipe' ){
                    $args['post_type']      = DELICIOUS_RECIPE_POST_TYPE;
                    $args['posts_per_page'] = $posts_per_page;          
                }elseif( $slider_type == 'latest_recipes' ){
                    $args['post_type']      = 'blossom-recipe';
                    $args['posts_per_page'] = $posts_per_page;          
                }elseif( $slider_type === 'cat' && $slider_cat ){
                    $args['post_type']      = 'post';
                    $args['cat']            = $slider_cat; 
                    $args['posts_per_page'] = -1;  
                }else{
                    $args['post_type']      = 'post';
                    $args['posts_per_page'] = $posts_per_page;
                }
                    
                $qry = new WP_Query( $args );
            
                if( $qry->have_posts() ){ ?>
                <div class="site-banner slider-five">
                    <div class="container">
                        <div class="banner-slider owl-carousel">
                            <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                            <div class="slider-item">
                                <a href="<?php the_permalink(); ?>">
                                <?php  
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );    
                                    }else{ 
                                        blossom_recipe_get_fallback_svg( $image_size );
                                    } ?> 
                                    </a>
                                    <?php
                                    if( blossom_recipe_is_delicious_recipe_activated() && DELICIOUS_RECIPE_POST_TYPE == get_post_type() ){
                                        echo '<div class="recipe-meta-data">';
                                            recipe_delights_recipe_keywords();
                                        echo '</div>';
                                    } ?>
                                    <div class="banner-caption">
                                        <?php the_title( '<h3 class="banner-title"><a href="' . esc_url( get_the_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                    </div>
                                    <?php
                                    if ( blossom_recipe_is_delicious_recipe_activated() &&  DELICIOUS_RECIPE_POST_TYPE === get_post_type() ){
                                        echo '<div class="recipe-item-meta">';
                                            blossom_recipe_prep_time();
                                            blossom_recipe_difficulty_level();
                                            blossom_recipe_recipe_rating();
                                        echo '</div>'; 
                                    }
                                    ?>
                                </a>
                            </div>
                            <?php } ?>                        
                        </div>
                    </div>
                </div>
                <?php
                }
                wp_reset_postdata();
            }            
        }
    }  
}

if( ! function_exists( 'recipe_delights_recipe_keywords' ) ) :
/**
 * Recipe Keys.
 */
function recipe_delights_recipe_keywords(){
    global $recipe;
    if ( ! empty( $recipe->recipe_keys ) ) : ?>
        <span class="dr-category">
            <?php
            foreach( $recipe->recipe_keys as $recipe_key ) {
                $key = get_term_by( 'name', $recipe_key, 'recipe-key' ); ?>
                <a href="<?php echo esc_url( get_term_link( $key, 'recipe-key' ) ); ?>" title="<?php echo esc_attr( $recipe_key ); ?>">
                    <?php delicious_recipes_get_tax_icon( $key ); ?>
                    <span class="cat-name"><?php echo esc_html( $recipe_key ); ?></span>
                </a>
            <?php } ?>
        </span>
    <?php endif;
}
endif;

function blossom_recipe_body_classes( $classes ) {

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    
    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
        $classes[] = 'custom-background-color';
    }
    
    if( is_home() || is_archive() || is_search() ){
        $classes[] = 'list-view';
    }

    if( is_single() || is_page() ){
        $classes[] = 'underline';
    }

    $classes[] = blossom_recipe_sidebar( true );
    
    return $classes;
}

function blossom_recipe_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Lato: on or off', 'recipe-delights' ) ) {
        $fonts[] = 'Lato:300,300i,400,400i,600,600i,700,700i,800,800i';
    }

    /* translators: If there are characters in your language that are not supported by Marcellus, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Bitter: on or off', 'recipe-delights' ) ) {
        $fonts[] = 'Bitter:';
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $fonts ) ),
        'subset' => urlencode( $subsets ),
    );

    if ( $fonts ) {
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    if( get_theme_mod( 'ed_localgoogle_fonts', false ) ) {
        $fonts_url = blossom_recipe_get_webfont_url( add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
    }
    
    return esc_url_raw( $fonts_url );
}

function blossom_recipe_footer_bottom(){ ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="copyright">            
            <?php
                blossom_recipe_get_footer_copyright();
                esc_html_e( ' Recipe Delights | Developed By ', 'recipe-delights' );
                echo '<a href="' . esc_url( 'https://blossomthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Blossom Themes', 'recipe-delights' ) . '</a>.';
                
                printf( esc_html__( ' Powered by %s', 'recipe-delights' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'recipe-delights' ) ) .'" target="_blank">WordPress</a>. ' );
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
        </div>
    </div>
    <?php
}

function recipe_delights_dynamic_css(){
    $primary_color = '#c94f68';

    echo "<style type='text/css' media='all'>"; ?>

    .btn-link:after,
    .readmore-btn .more-button:after {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='<?php echo recipe_delights_hash_to_percent23( recipe_delights_sanitize_hex_color( $primary_color ) ); ?>' d='M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z'%3E%3C/path%3E%3C/svg%3E");    
    }

    <?php echo "</style>"; 
}
add_action( 'wp_head', 'recipe_delights_dynamic_css',99 );

function recipe_delights_hash_to_percent23( $color_code ){
    $color_code = str_replace( "#", "%23", $color_code );
    return $color_code;
}

function recipe_delights_sanitize_hex_color( $color ){
	if ( '' === $color )
		return '';

    // 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;
}