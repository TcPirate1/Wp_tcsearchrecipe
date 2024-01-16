<?php
/**
 * Help Panel.
 *
 * @package recipes_blog
 */
?>

<div id="help-panel" class="panel-left visible">

    <div id="#help-panel" class="steps">  
        <h4><?php esc_html_e( 'Quick Setup for Home Page', 'recipes-blog' ); ?></h4>
        <hr class="quick-set">
        <p><?php esc_html_e( '1) Go to the dashboard. navigate to pages, add a new one, and label it "home" or whatever else you like.The page has now been created.', 'recipes-blog' ); ?></p>
        <p><?php esc_html_e( '2) Go back to the dashboard and then select Settings.', 'recipes-blog' ); ?></p>
        <p><?php esc_html_e( '3) Then Go to readings in the setting.', 'recipes-blog' ); ?></p>
        <p><?php esc_html_e( '4) There are 2 options your latest post or static page.', 'recipes-blog' ); ?></p>
        <p><?php esc_html_e( '5) Select static page and select from the dropdown you wish to use as your home page, save changes.', 'recipes-blog' ); ?></p>
        <p><?php esc_html_e( '6) You can set the home page in this manner.', 'recipes-blog' ); ?></p>
        <hr>
        <h4><?php esc_html_e( 'Setup Slider Section', 'recipes-blog' ); ?></h4>
        <hr class="quick-set">
         <p><?php esc_html_e( '1) Go to Appereance > then Go to Customizer.', 'recipes-blog' ); ?></p>
         <p><?php esc_html_e( '2) In Customizer > Go to Front Page Options > Go to Banner Section.', 'recipes-blog' ); ?></p>
         <p><?php esc_html_e( '3) For Setup Banner Section you have to create post in dashboard first.', 'recipes-blog' ); ?></p>
         <p><?php esc_html_e( '4) In Banner Section > Enable the Toggle button > and fill the following details.', 'recipes-blog' ); ?></p>
         <p><?php esc_html_e( '5) In this way you can set Banner Section.', 'recipes-blog' ); ?></p>
         <hr>
        <h4><?php esc_html_e( 'Setup Menus Section', 'recipes-blog' ); ?></h4>
        <hr class="quick-set">
         <p><?php esc_html_e( '1) Go to Post > add new post and add category which you want.', 'recipes-blog' ); ?></p>
         <p><?php esc_html_e( '2) Go to Customizer > Go to Front Page Options > Go to Menus Section.', 'recipes-blog' ); ?></p>
         <p><?php esc_html_e( '4) In Menus Section > Enable the Toggle button and give heading and select category which you want.', 'recipes-blog' ); ?></p>
         <p><?php esc_html_e( '5) In this way you can set Menus Section.', 'recipes-blog' ); ?></p>
    </div>
    <hr>

    <div class="custom-setting">
        <h4><?php esc_html_e( 'Quick Customizer Settings', 'recipes-blog' ); ?></h4>
        <span><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a></span>
    </div>
    <hr>
   <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-site-alt3"></span>
            </div>
            <h5><?php esc_html_e( 'Site Logo', 'recipes-blog' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-color-picker"></span>
            </div>
            <h5><?php esc_html_e( 'Color', 'recipes-blog' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=primary_color' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-screenoptions"></span>
            </div>
            <h5><?php esc_html_e( 'Theme Options', 'recipes-blog' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=recipes_blog_theme_options' ) ); ?>"target="_blank" class=""><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a>
            
        </div>
    </div>
    <div class="setting-box">
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-format-image"></span>
            </div>
            <h5><?php esc_html_e( 'Header Image ', 'recipes-blog' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=header_image' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-align-full-width"></span>
            </div>
            <h5><?php esc_html_e( 'Footer Options ', 'recipes-blog' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=recipes_blog_footer_copyright_text' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a>
            
        </div>
        <div class="custom-links">
            <div class="icon-box">
                <span class="dashicons dashicons-admin-page"></span>
            </div>
            <h5><?php esc_html_e( 'Front Page Options', 'recipes-blog' ); ?></h5>
            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=recipes_blog_front_page_options' ) ); ?>" target="_blank" class=""><?php esc_html_e( 'Customize', 'recipes-blog' ); ?></a>
            
        </div>
    </div>
</div>