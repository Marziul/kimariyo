<?php

/**
 * HashOne functions and definitions
 *
 * @package HashOne
 */
if (!function_exists('hashone_setup')) :

    function hashone_setup() {

        load_theme_textdomain('hashone', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');
        add_image_size('hashone-portfolio-thumb', 550, 500, true);
        add_image_size('hashone-team-thumb', 400, 400, true);
        add_image_size('hashone-thumb', 100, 100, true);
        add_image_size('hashone-blog-header', 700, 340, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'hashone'),
        ));

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        //Support for woocommerce
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('hashone_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_theme_support('custom-logo', array(
            'height' => 60,
            'width' => 300,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('.hs-site-title', '.hs-site-description'),
        ));
        
        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        
        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        add_editor_style(array('css/editor-style.css', hashone_fonts_url()));
    }

endif; // hashone_setup
add_action('after_setup_theme', 'hashone_setup');

function hashone_content_width() {
    $GLOBALS['content_width'] = apply_filters('hashone_content_width', 640);
}

add_action('after_setup_theme', 'hashone_content_width', 0);

/**
 * Enables the Excerpt meta box in Page edit screen.
 */
function hashone_add_excerpt_support_for_pages() {
    add_post_type_support('page', 'excerpt');
}

add_action('init', 'hashone_add_excerpt_support_for_pages');

// Register widget area.
function hashone_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'hashone'),
        'id' => 'hashone-right-sidebar',
        'description' => esc_html__('Add widgets here to appear in your sidebar.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Left Sidebar', 'hashone'),
        'id' => 'hashone-left-sidebar',
        'description' => esc_html__('Add widgets here to appear in your sidebar.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Contact Form', 'hashone'),
        'id' => 'hashone-contact-form',
        'description' => esc_html__('Add widgets here to appear in the Contact Section of the Home Page.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('About Us', 'hashone'),
        'id' => 'hashone-about-us',
        'description' => esc_html__('Add widgets here to appear in the About Section of the Home Page.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer One', 'hashone'),
        'id' => 'hashone-footer1',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Two', 'hashone'),
        'id' => 'hashone-footer2',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Three', 'hashone'),
        'id' => 'hashone-footer3',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Four', 'hashone'),
        'id' => 'hashone-footer4',
        'description' => esc_html__('Add widgets here to appear in your Footer.', 'hashone'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'hashone_widgets_init');

if (!function_exists('hashone_fonts_url')) :

    /**
     * Register Google fonts for Hashone.
     *
     * @since Hashone 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function hashone_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Open Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Open Sans font: on or off', 'hashone')) {
            $fonts[] = 'Open Sans:400,300,600,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Roboto Condensed font: on or off', 'hashone')) {
            $fonts[] = 'Roboto Condensed:300italic,400italic,700italic,400,300,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'hashone');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $query_args = array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                'display' => 'swap',
            );
            $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
        }

        return esc_url_raw($fonts_url);
    }

endif;

/**
 * Enqueue scripts and styles.
 */
function hashone_scripts() {
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.3.3', true);
    wp_enqueue_script('isotope-pkgd', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery', 'imagesloaded'), '20150903', true);
    wp_enqueue_script('nivo-lightbox', get_template_directory_uri() . '/js/nivo-lightbox.js', array('jquery'), '20150903', true);
    wp_enqueue_script('jquery-stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array('jquery', 'imagesloaded'), '20150903', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '20150903', true);
    wp_enqueue_script('odometer', get_template_directory_uri() . '/js/odometer.js', array(), '20150903', true);
    wp_enqueue_script('waypoint', get_template_directory_uri() . '/js/waypoint.js', array(), '20150903', true);
    wp_enqueue_script('jquery-nav', get_template_directory_uri() . '/js/jquery.nav.js', array(), '20161003', true);
    wp_enqueue_script('hashone-custom', get_template_directory_uri() . '/js/hashone-custom.js', array('jquery'), '20150903', true);

    wp_enqueue_style('hashone-style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('hashone-fonts', hashone_fonts_url(), array(), null);
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.4.0');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.3.3');
    wp_enqueue_style('nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css', array(), '1.3.3');


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'hashone_scripts');

/**
 * Enqueue admin style
 */
function hashone_admin_scripts() {
    wp_enqueue_style('hashone-admin-style', get_template_directory_uri() . '/inc/css/admin-style.css', array(), '1.0');
}

add_action('admin_enqueue_scripts', 'hashone_admin_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/hashone-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom breadcrumb function
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * Load FontAwesome Array
 */
require get_template_directory() . '/inc/fontawesome-list.php';

/**
 * Metabox functions
 */
require get_template_directory() . '/inc/hashone-metabox.php';

/**
 * Wocommerce additions
 */
require get_template_directory() . '/inc/woo-functions.php';

/**
 * Welcome Page.
 */
require get_template_directory() . '/welcome/welcome.php';

/**
 * TGMPA Page.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';







function phone_number_post_type(){
    // Custom Post Type Labels     
    $labels = array(
        'name'               => _x( 'Phone Number', 'post type general name' ),
        'singular_name'      => _x( 'Phone Number', 'post type singular name' ),
        'add_new'            => _x( 'Add new Phone Number', 'phoneumber' ),
        'add_new_item'       => __( 'Add new Phone Number' ),
        'edit_item'          => __( 'Edit Phone Number' ),
        'new_item'           => __( 'New Phone Number' ),
        'all_items'          => __( 'All Phone Number' ),
        'view_item'          => __( 'View Phone Number' ),
        'search_items'       => __( 'Search Phone Number' ),
        'not_found'          => __( 'No Phone Number found' ),
        'not_found_in_trash' => __( 'No Phone Number found in trash' ),
        'parent_item_colon'  => __( 'Parent Phone Number' ),
        'menu_name'          => __( 'Phone Number' )
    );
   
    // Custom Post Type Supports 
    $supports = array('title', 'editor', 'thumbnail', 'comments');
   
    // Custom Post Type Arguments 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
        'description'        => '',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'show_in_admin_bar'  => true,
        'exclude_from_search'=> false,
        'query_var'          => true,
        'can_export'         => true,
        'rewrite'              => array("slug" => "numara"), // Permalinks format
        'has_archive'        => true,
        //'menu_position'      => 5,
        'supports'           => $supports,
        'capability_type'    => 'post',
    );
   
    register_post_type( 'phone_number', $args );

}
add_action( 'init', 'phone_number_post_type' );



function phone_number_taxonomy() {
    
    // Taxonomy Labels     
    $labels = array(
        'name'                       => _x( 'Phone Number Categories', 'taxonomy general name' ),
        'singular_name'              => _x( 'Category', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Categories' ),
        'popular_items'              => __( 'Popular Categories' ),
        'all_items'                  => __( 'All Categories' ),
        'parent_item'                => __( 'Parent Category' ),
        'parent_item_colon'          => __( 'Parent: Category' ),
        'edit_item'                  => __( 'Edit Category' ),
        'view_item'                  => __( 'View Category' ),
        'update_item'                => __( 'Update Category' ),
        'add_new_item'               => __( 'Add New Category' ),
        'new_item_name'              => __( 'New Category Name' ),
        'add_or_remove_items'        => __( 'Add or remove Categories' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas' ),
        'menu_name'                  => __( 'Categories' ),
    );
   
    // Linked Custom Post Type
    $cpts = array('phonenumber');
   
    // Taxonomy Arguments 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'description'        => 'place each testimonial into a category.',
        'public'             => true,
        'show_ui'            => true,
        'show_tagcloud'      => false,
        'show_in_nav_menus'  => false,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => false,
    );
    register_taxonomy( 'phonenumber', $cpts, $args );
    
}
add_action( 'init', 'phone_number_taxonomy' );





function myshortcode_title(){
   return get_the_title();
}
add_shortcode( 'page_title', 'myshortcode_title' );




/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );









