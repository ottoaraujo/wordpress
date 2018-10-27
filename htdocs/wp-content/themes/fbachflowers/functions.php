<?php
/**
 * fBachFlowers functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @subpackage fBachFlowers
 * @author tishonator
 * @since fBachFlowers 1.0.0
 *
 */

require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'fbachflowers_setup' ) ) :
/**
 * fBachFlowers setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function fbachflowers_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'fbachflowers', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );

	// This theme uses wp_nav_menu() in header menu
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'fbachflowers' ),
		'footer'   => __( 'Footer Menu', 'fbachflowers' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// add the visual editor to resemble the theme style
	add_editor_style( array( 'css/editor-style.css', get_template_directory_uri() . '/style.css' ) );

	// add custom background				 
	add_theme_support( 'custom-background', 
				   array ('default-color'  => '#f7f7f7')
				 );

	// add content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}

	// add custom header
	add_theme_support( 'custom-header', array (
					   'default-image'          => '',
					   'random-default'         => '',
					   'flex-height'            => true,
					   'flex-width'             => true,
					   'uploads'                => true,
					   'width'              	=> 900,
					   'height'             	=> 100,
					   'default-text-color'		=> '#b4b4b4',
					   'wp-head-callback'   	=> 'fbachflowers_header_style',
					) );

	// add custom logo
	add_theme_support( 'custom-logo', array (
					   'width'                  => 145,
					   'height'                 => 36,
					   'flex-height'            => true,
					   'flex-width'             => true,
					) );

}
endif; // fbachflowers_setup
add_action( 'after_setup_theme', 'fbachflowers_setup' );

/**
 * Register theme settings in the customizer
 */
function fbachflowers_customize_register( $wp_customize ) {

	/**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'fbachflowers_social_section',
		array(
			'title'       => __( 'Social Sites', 'fbachflowers' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add facebook url
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_facebook',
		__( 'Facebook Page URL', 'fbachflowers' ));

	// Add google+ url
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_google',
		__( 'Google+ Page URL', 'fbachflowers' ));

	// Add twitter url
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_twitter',
		__( 'Twitter URL', 'fbachflowers' ));

	// Add LinkedIn
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_linkedin',
		__( 'LinkedIn', 'fbachflowers' ));

	// Add Instagram
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_instagram',
		__( 'Instagram', 'fbachflowers' ));

	// Add RSS Feeds url
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_rss',
		__( 'RSS Feeds URL', 'fbachflowers' ));

	// Add Tumblr Text Control
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_tumblr',
		__( 'Tumblr', 'fbachflowers' ));

	// Add YouTube channel url
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_youtube',
		__( 'YouTube channel URL', 'fbachflowers' ));

	// Add Pinterest Text Control
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_pinterest',
		__( 'Pinterest', 'fbachflowers' ));

	// Add VK Text Control
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_vk',
		__( 'VK', 'fbachflowers' ));

	// Add Flickr Text Control
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_flickr',
		__( 'Flickr', 'fbachflowers' ));

	// Add Vine Text Control
	fbachflowers_customize_add_social_site($wp_customize, 'fbachflowers_social_vine',
		__( 'Vine', 'fbachflowers' ));

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'fbachflowers_footer_section',
		array(
			'title'       => __( 'Footer', 'fbachflowers' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'fbachflowers_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fbachflowers_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'fbachflowers' ),
            'section'        => 'fbachflowers_footer_section',
            'settings'       => 'fbachflowers_footer_copyright',
            'type'           => 'text',
            )
        )
	);
	
	/**
	 * Add Animations Section
	 */
	$wp_customize->add_section(
		'fbachflowers_animations_display',
		array(
			'title'       => __( 'Animations', 'fbachflowers' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display Animations option
	$wp_customize->add_setting(
			'fbachflowers_animations_display',
			array(
					'default'           => 1,
					'sanitize_callback' => 'esc_attr',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
						'fbachflowers_animations_display',
							array(
								'label'          => __( 'Enable Animations', 'fbachflowers' ),
								'section'        => 'fbachflowers_animations_display',
								'settings'       => 'fbachflowers_animations_display',
								'type'           => 'checkbox',
							)
						)
	);
}

add_action('customize_register', 'fbachflowers_customize_register');

/**
 * Add Social Site control into Customizer
 */
function fbachflowers_customize_add_social_site($wp_customize, $controlId, $label) {

	$wp_customize->add_setting(
		$controlId,
		array(
		    'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $controlId,
        array(
            'label'          => $label,
            'section'        => 'fbachflowers_social_section',
            'settings'       => $controlId,
            'type'           => 'text',
            )
        )
	);
}

/**
 * the main function to load scripts in the fBachFlowers theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function fbachflowers_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
	wp_enqueue_style( 'fbachflowers-style', get_stylesheet_uri(), array() );
	
	wp_enqueue_style( 'fbachflowers-fonts', fbachflowers_fonts_url(), array(), null );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array( 'jquery' ) );

	wp_enqueue_script( 'fbachflowers-js', get_template_directory_uri() . '/js/fbachflowers.js', array( 'jquery', 'viewportchecker' ) );
	
	$data = array(
		'loading_effect' => ( get_theme_mod('fbachflowers_animations_display', 1) == 1 ),
	);
	wp_localize_script('fbachflowers-js', 'fbachflowers_options', $data);

}

add_action( 'wp_enqueue_scripts', 'fbachflowers_load_scripts' );

/**
 *	Load google font url used in the fBachFlowers theme
 */
function fbachflowers_fonts_url() {

    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by PT Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $archivo = _x( 'on', 'Archivo Narrow font: on or off', 'fbachflowers' );

    if ( 'off' !== $archivo ) {
        $font_families = array();
 
        $font_families[] = 'Archivo Narrow';
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
 * Display website's logo image
 */
function fbachflowers_show_website_logo_and_title() {

	if ( has_custom_logo() ) {

		the_custom_logo();

	} 

	$header_text_color = get_header_textcolor();

	if ( 'blank' !== $header_text_color ) {
	
		echo '<div id="site-identity">';
		echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
		echo '<h1 class="entry-title">' . esc_html( get_bloginfo('name') ) . '</h1>';
		echo '</a>';
		echo '<strong>' . esc_html( get_bloginfo('description') ) . '</strong>';
		echo '</div>';
	}
}

/**
 *	Displays the copyright text.
 */
function fbachflowers_show_copyright_text() {

	$footerText = get_theme_mod('fbachflowers_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function fbachflowers_widgets_init() {

	// Register Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'fbachflowers'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'fbachflowers'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );

	// Register Footer Column #1
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'fbachflowers' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'fbachflowers' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #2
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'fbachflowers' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'fbachflowers' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #3
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #3', 'fbachflowers' ),
							'id' 			 =>  'footer-column-3-widget-area',
							'description'	 =>  __( 'The Footer Column #3 widget area', 'fbachflowers' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
}
add_action( 'widgets_init', 'fbachflowers_widgets_init' );

function fbachflowers_header_style() {

	$header_text_color = get_header_textcolor();

	if ( ! has_header_image()
		&& ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
			 || 'blank' === $header_text_color ) ) {

		return;
	}

	$headerImage = get_header_image();
?>
	<style type="text/css">
		<?php if ( has_header_image() ) : ?>

				#header-main {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

		<?php endif; ?>

		<?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
					&& 'blank' !== $header_text_color ) : ?>

				#header-main, #header-main h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

		<?php endif; ?>
	</style>
<?php
}

function fbachflowers_display_single_social_site($socialSiteID, $title, $cssClass) {

	$socialURL = get_theme_mod( $socialSiteID );
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_attr( $title )
							. '" class="' . esc_attr( $cssClass ) . '"></a></li>';
	}
}

/**
 * Display Social Websites
 */
function fbachflowers_display_social_sites() {

	fbachflowers_display_single_social_site('fbachflowers_social_facebook', __('Follow us on Facebook', 'fbachflowers'), 'facebook16' );

	fbachflowers_display_single_social_site('fbachflowers_social_google', __('Follow us on Google+', 'fbachflowers'), 'google16' );

	fbachflowers_display_single_social_site('fbachflowers_social_twitter', __('Follow us on Twitter', 'fbachflowers'), 'twitter16' );

	fbachflowers_display_single_social_site('fbachflowers_social_linkedin', __('Follow us on LinkedIn', 'fbachflowers'), 'linkedin16' );

	fbachflowers_display_single_social_site('fbachflowers_social_instagram', __('Follow us on Instagram', 'fbachflowers'), 'instagram16' );

	fbachflowers_display_single_social_site('fbachflowers_social_rss', __('Follow our RSS Feeds', 'fbachflowers'), 'rss16' );

	fbachflowers_display_single_social_site('fbachflowers_social_tumblr', __('Follow us on Tumblr', 'fbachflowers'), 'tumblr16' );

	fbachflowers_display_single_social_site('fbachflowers_social_youtube', __('Follow us on Youtube', 'fbachflowers'), 'youtube16' );

	fbachflowers_display_single_social_site('fbachflowers_social_pinterest', __('Follow us on Pinterest', 'fbachflowers'), 'pinterest16' );

	fbachflowers_display_single_social_site('fbachflowers_social_vk', __('Follow us on VK', 'fbachflowers'), 'vk16' );

	fbachflowers_display_single_social_site('fbachflowers_social_flickr', __('Follow us on Flickr', 'fbachflowers'), 'flickr16' );

	fbachflowers_display_single_social_site('fbachflowers_social_vine', __('Follow us on Vine', 'fbachflowers'), 'vine16' );
}

function fbachflowers_get_page_title() {

	global $paged, $page;
	$pageTitle = '';
	
	if ( is_home() ) :
		if ( $paged >= 2 || $page >= 2 ) :
			$pageTitle = sprintf( esc_html__( '%s - Page %s', 'fbachflowers' ), single_post_title( '', false ), max( $paged, $page ) );	
		else :
			$pageTitle = single_post_title( '', false );	
		endif;

	elseif ( is_tag() ) :
		$pageTitle = sprintf( esc_html__( 'Tag Archives: %s', 'fbachflowers' ), single_tag_title( '', false ) );

	elseif ( is_category() ) :
		$pageTitle = sprintf( esc_html__( 'Category Archives: %s', 'fbachflowers' ), single_cat_title( '', false ) );
		
	elseif ( is_day() ) :
		$pageTitle = sprintf( esc_html__( 'Daily Archives: %s', 'fbachflowers' ), get_the_date() );

	elseif ( is_month() ) :
		$pageTitle = sprintf( esc_html__( 'Monthly Archives: %s', 'fbachflowers' ),
					get_the_date( _x( 'F Y', 'monthly archives date format', 'fbachflowers' ) ) );

	elseif ( is_year() ) :
		$pageTitle = sprintf( esc_html__( 'Yearly Archives: %s', 'fbachflowers' ),
					get_the_date( _x( 'Y', 'yearly archives date format', 'fbachflowers' )  ) );

	elseif ( is_archive() ) :
		$pageTitle = __( 'Archives', 'fbachflowers' );
		
	elseif ( is_404() ) :
		$pageTitle = __( 'Error 404: Not Found', 'fbachflowers' );
		
	endif;
		
	return $pageTitle;
}

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

?>
