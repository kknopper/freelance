<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'guru', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'guru' ) );

//* Add Image upload and Color select to WordPress Theme Customizer
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//* Include Customizer CSS
include_once( get_stylesheet_directory() . '/lib/output.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Guru' );
define( 'CHILD_THEME_URL', 'http://www.appfinite.com/shop/guru' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'guru_enqueue_scripts_styles' );
function guru_enqueue_scripts_styles() {

    /*wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700', array(), CHILD_THEME_VERSION );*/
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_script( 'guru-global', get_bloginfo( 'stylesheet_directory' ) . '/js/global.js', array( 'jquery' ), '1.0.0' );

}

//* Add Font Awesome Support
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '4.5.0' );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add accessibility support
add_theme_support( 'genesis-accessibility', array( 'drop-down-menu', 'search-form', 'skip-links' ) );

//* Add WooCommerce Support
add_theme_support( 'genesis-connect-woocommerce' );

//* Disables Default WooCommerce CSS
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

//* Load Custom WooCommerce style sheet
function wp_enqueue_woocommerce_style(){
    wp_register_style( 'custom-woocommerce', get_stylesheet_directory_uri() . '/woocommerce/css/woocommerce.css' );

    if ( class_exists( 'woocommerce' ) ) {
        wp_enqueue_style( 'custom-woocommerce' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
    'flex-height'     => true,
    'width'           => 300,
    'height'          => 60,
    'header-selector' => '.site-title a',
    'header-text'     => false,
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
    'header',
    'nav',
    'subnav',
    'footer-widgets',
    'footer',
) );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add new image sizes
add_image_size( 'featured-content-lg', 1200, 600, TRUE );
add_image_size( 'featured-content-sm', 600, 400, TRUE );
add_image_size( 'portfolio-thumbnail', 348, 240, TRUE );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Unregister the header right widget area
unregister_sidebar( 'header-right' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

//* Remove output of primary navigation right extras
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_subnav', 5 );

//* Add featured image above the entry content
add_action( 'genesis_entry_header', 'guru_featured_photo', 5 );
function guru_featured_photo() {

    if ( is_attachment() || ! genesis_get_option( 'content_archive_thumbnail' ) )
        return;

    if ( is_singular() && $image = genesis_get_image( array( 'format' => 'url', 'size' => genesis_get_option( 'image_size' ) ) ) ) {
        printf( '<div class="featured-image"><img src="%s" alt="%s" class="entry-image"/></div>', $image, the_title_attribute( 'echo=0' ) );
    }

}

/*//* Add support for 1-column footer widget area
add_theme_support( 'genesis-footer-widgets', 1 );*/

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for footer menu
add_theme_support ( 'genesis-menus' , array ( 'primary' => 'Primary Navigation Menu', 'secondary' => 'Secondary Navigation Menu', 'footer' => 'Footer Navigation Menu' ) );

//* Hook menu in footer
add_action( 'genesis_footer', 'guru_footer_menu', 7 );
function guru_footer_menu() {
    printf( '<nav %s>', genesis_attr( 'nav-footer' ) );
    wp_nav_menu( array(
        'theme_location' => 'footer',
        'container'      => false,
        'depth'          => 1,
        'fallback_cb'    => false,
        'menu_class'     => 'genesis-nav-menu',
    ) );

    echo '</nav>';
}

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Theme Settings init
add_action( 'admin_menu', 'guru_theme_settings_init', 15 );
/**
 * This is a necessary go-between to get our scripts and boxes loaded
 * on the theme settings page only, and not the rest of the admin
 */
function guru_theme_settings_init() {
    global $_genesis_admin_settings;

    add_action( 'load-' . $_genesis_admin_settings->pagehook, 'guru_add_portfolio_settings_box', 20 );
}

// Add Portfolio Settings box to Genesis Theme Settings
function guru_add_portfolio_settings_box() {
    global $_genesis_admin_settings;

    add_meta_box( 'genesis-theme-settings-guru-portfolio', __( 'Portfolio Page Settings', 'guru' ), 'guru_theme_settings_portfolio',     $_genesis_admin_settings->pagehook, 'main' );
}

/**
 * Adds Portfolio Options to Genesis Theme Settings Page
 */
function guru_theme_settings_portfolio() { ?>

    <p><?php _e("Display which category:", 'genesis'); ?>
    <?php wp_dropdown_categories(array('selected' => genesis_get_option('guru_portfolio_cat'), 'name' => GENESIS_SETTINGS_FIELD.'[guru_portfolio_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("All Categories", 'genesis'), 'hide_empty' => '0' )); ?></p>

    <p><?php _e("Exclude the following Category IDs:", 'genesis'); ?><br />
    <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[guru_portfolio_cat_exclude]" value="<?php echo esc_attr( genesis_get_option('guru_portfolio_cat_exclude') ); ?>" size="40" /><br />
    <small><strong><?php _e("Comma separated - 1,2,3 for example", 'genesis'); ?></strong></small></p>

    <p><?php _e('Number of Posts to Show', 'genesis'); ?>:
    <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[guru_portfolio_cat_num]" value="<?php echo esc_attr( genesis_option('guru_portfolio_cat_num') ); ?>" size="2" /></p>

    <p><span class="description"><?php _e('<b>NOTE:</b> The Portfolio Page displays the "Portfolio Page" image size plus the excerpt or full content as selected below.', 'guru'); ?></span></p>

    <p><?php _e("Select one of the following:", 'genesis'); ?>
    <select name="<?php echo GENESIS_SETTINGS_FIELD; ?>[guru_portfolio_content]">
        <option style="padding-right:10px;" value="full" <?php selected('full', genesis_get_option('guru_portfolio_content')); ?>><?php _e("Display post content", 'genesis'); ?></option>
        <option style="padding-right:10px;" value="excerpts" <?php selected('excerpts', genesis_get_option('guru_portfolio_content')); ?>><?php _e("Display post excerpts", 'genesis'); ?></option>
    </select></p>

    <p><label for="<?php echo GENESIS_SETTINGS_FIELD; ?>[guru_portfolio_content_archive_limit]"><?php _e('Limit content to', 'genesis'); ?></label> <input type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[guru_portfolio_content_archive_limit]" id="<?php echo GENESIS_SETTINGS_FIELD; ?>[guru_portfolio_content_archive_limit]" value="<?php echo esc_attr( genesis_option('guru_portfolio_content_archive_limit') ); ?>" size="3" /> <label for="<?php echo GENESIS_SETTINGS_FIELD; ?>[guru_portfolio_content_archive_limit]"><?php _e('characters', 'genesis'); ?></label></p>

    <p><span class="description"><?php _e('<b>NOTE:</b> Using this option will limit the text and strip all formatting from the text displayed. To use this option, choose "Display post content" in the select box above.', 'genesis'); ?></span></p>
<?php
}

//* Customizing podcast slug for podcasts
add_filter("podcast_list_post_type_args", 'my_rewrite_slug');
function my_rewrite_slug($args) {
    $args['rewrite']['slug'] = 'podcast';
    return $args;
}

//* Register widget areas
genesis_register_sidebar( array(
    'id'          => 'front-page-1',
    'name'        => __( 'Front Page 1', 'guru' ),
    'description' => __( 'This is the front page 1 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-2',
    'name'        => __( 'Front Page 2', 'guru' ),
    'description' => __( 'This is the front page 2 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-3',
    'name'        => __( 'Front Page 3', 'guru' ),
    'description' => __( 'This is the front page 3 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-4',
    'name'        => __( 'Front Page 4', 'guru' ),
    'description' => __( 'This is the front page 4 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-5',
    'name'        => __( 'Front Page 5', 'guru' ),
    'description' => __( 'This is the front page 5 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-6',
    'name'        => __( 'Front Page 6', 'guru' ),
    'description' => __( 'This is the front page 6 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-7',
    'name'        => __( 'Front Page 7', 'guru' ),
    'description' => __( 'This is the front page 7 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-8',
    'name'        => __( 'Front Page 8', 'guru' ),
    'description' => __( 'This is the front page 8 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-9',
    'name'        => __( 'Front Page 9', 'guru' ),
    'description' => __( 'This is the front page 9 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-10',
    'name'        => __( 'Front Page 10', 'guru' ),
    'description' => __( 'This is the front page 10 section.', 'guru' ),
) );
genesis_register_sidebar( array(
    'id'          => 'front-page-11',
    'name'        => __( 'Front Page 11', 'guru' ),
    'description' => __( 'This is the front page 11 section.', 'guru' ),
) );


function blog_category_dropdown(){

   $str = '<div class="solid-section" style="padding: 0px;">
<div class="flexible-widgets widget-area">
<div class="form-filters">
<div class="container"><form action="?" method="post">
<div class="form-row">
<div class="form-controls">
<div class="select-container"><select id="field-filter" class="select select-js" name="field-filter" onchange="gotocategory(this)">';
   $terms = get_terms( 'category' );
   $str .= '<option value="">Filter By Category</option>';
   $sel_id = get_queried_object_id();
   foreach($terms as $term){
       if($sel_id == $term->term_id)
        $selected = 'selected';
       else
         $selected = '';
       $str .= '<option value="'.get_term_link($term->term_id).'" '.$selected.'>'.$term->name.'</option>';
   }
   $str .= '</select></div>
<!-- /.select-container -->

</div>
<!-- /.form-controls -->

</div>
<!-- /.form-row -->

</form><!-- /.container -->

</div>
</div>
</div>
</div>';

   echo $str;

}

add_shortcode('blog_category_dropdown','blog_category_dropdown');




function podcast_category_dropdown(){

   $str = '<div class="solid-section" style="padding: 0px;">
<div class="flexible-widgets widget-area">
<div class="form-filters">
<div class="container"><form action="?" method="post">
<div class="form-row">
<div class="form-controls">
<div class="select-container"><select id="field-filter" class="select select-js" name="field-filter" onchange="gotocategory(this)">';
   $terms = get_terms( 'podcast_cat' );
   $str .= '<option value="">Filter By Category</option>';
   $sel_id = get_queried_object_id();
   foreach($terms as $term){
       if($sel_id == $term->term_id)
        $selected = 'selected';
       else
         $selected = '';
       $str .= '<option value="'.get_term_link($term->term_id).'" '.$selected.'>'.$term->name.'</option>';
   }
   $str .= '</select></div>
<!-- /.select-container -->

</div>
<!-- /.form-controls -->

</div>
<!-- /.form-row -->

</form><!-- /.container -->

</div>
</div>
</div>
</div>';

   echo $str;

}

add_shortcode('podcast_category_dropdown','podcast_category_dropdown');

//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() {
    ?>
    <p>&copy; Copyright <?php echo date("Y"); ?> &middot; The Personal Branding Group, Inc. &middot; All Rights Reserved</p>
    <?php
}