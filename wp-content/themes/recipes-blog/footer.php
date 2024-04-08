<?php
/**
 * The template for displaying the footer
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package recipes_blog
 */

// Get the footer background color/image settings from customizer
$recipes_blog_footer_background_color = get_theme_mod('footer_background_color_setting', ''); // Default to white if not set
$recipes_blog_footer_background_image = get_theme_mod('footer_background_image_setting');

if (!is_front_page() || is_home()) {
    ?>
    </div>
    </div>
</div>
<?php } ?>

<footer id="colophon" class="site-footer" style="background-color: <?php echo esc_attr($recipes_blog_footer_background_color); ?>; <?php echo ($recipes_blog_footer_background_image) ? 'background-image: url(' . esc_url($recipes_blog_footer_background_image) . ');' : ''; ?>">
    <div class="site-footer-top">
        <div class="asterthemes-wrapper">
            <div class="footer-widgets-wrapper">

                <?php
                // Footer Widget
                do_action('recipes_blog_footer_widget');
                ?>

            </div>
        </div>
    </div>
    <div class="site-footer-bottom">
        <div class="asterthemes-wrapper">
            <div class="site-footer-bottom-wrapper">
                <div class="site-info">
                    <?php
                    do_action('recipes_blog_footer_copyright');
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php
$recipes_blog_is_scroll_top_active = get_theme_mod('recipes_blog_scroll_top', true);
if ($recipes_blog_is_scroll_top_active) :
    ?>
    <a href="#" id="scroll-to-top" class="recipes-blog-scroll-to-top"><i class="<?php echo esc_attr(get_theme_mod('recipes_blog_scroll_btn_icon', 'fas fa-chevron-up')); ?>"></i></a>
<?php
endif;
?>
</div>

<?php wp_footer(); ?>

</body>

</html>
