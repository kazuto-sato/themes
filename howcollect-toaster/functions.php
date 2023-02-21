<?php
/**
 * howcollect.toaster functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package howcollect.toaster
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function howcollect_toaster_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on howcollect.toaster, use a find and replace
		* to change 'howcollect-toaster' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'howcollect-toaster', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'howcollect-toaster' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
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
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'howcollect_toaster_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'howcollect_toaster_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function howcollect_toaster_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'howcollect_toaster_content_width', 640 );
}
add_action( 'after_setup_theme', 'howcollect_toaster_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function howcollect_toaster_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'howcollect-toaster' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'howcollect-toaster' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'howcollect_toaster_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
/*
ここにデフォのcssだったりの読み込みが記述されている
function howcollect_toaster_scripts() {
	wp_enqueue_style( 'howcollect-toaster-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'howcollect-toaster-style', 'rtl', 'replace' );

	wp_enqueue_script( 'howcollect-toaster-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'howcollect_toaster_scripts' );
*/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/* 固定ページ一覧にスラッグを追加する */
function add_page_column_slug_title( $columns ) {
	$columns[ 'slug' ] = "スラッグ";
	return $columns;
}
function add_page_column_slug( $column_name, $post_id ) {
	if( $column_name == 'slug' ) {
		$post = get_post( $post_id );
		$slug = $post->post_name;
		echo esc_attr( $slug );
	}
}
add_filter( 'manage_pages_columns', 'add_page_column_slug_title' );
add_action( 'manage_pages_custom_column', 'add_page_column_slug', 10, 2 );


//CSSの読み込み
function my_enqueue_styles(){
	wp_enqueue_style('ress', get_theme_file_uri('reset.css'), array(), false, 'all');
	wp_enqueue_style('slick_theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css', array('ress'), false, 'all');
	wp_enqueue_style('slick_min', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css', array('slick_theme'), false, 'all');
	wp_enqueue_style('style', get_stylesheet_uri('style.css'), array('slick_min'), false, 'all');	
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');
//jquery読み込み
function add_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'add_jquery');

//jsの読み込み
function my_enqueue_scripts(){
	wp_enqueue_script('slick_js','https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',array(),false,'all');
	wp_enqueue_script('main_js',get_theme_file_uri().'/template/js/main.js',array('slick_js'),false,'all');
}
add_action('wp_footer','my_enqueue_scripts');



add_action('init',function(){
	//用語集カスタム投稿タイプ
	register_post_type('words',[
		'label' => '用語集',
		'menu_position' => 4,
		'menu_icon'=>'dashicons-admin-generic',
		'public' => true,
		'has_archive' => true
	]);
});
//読み込みたくないcss
add_action("wp_enqueue_scripts", function () {	
	//※登録ハンドル名はid属性から-cssを取ったもの
	 wp_dequeue_style("dashicons");
	 wp_dequeue_style("admin-bar");
	 wp_dequeue_style("wp-block-library");
	 wp_dequeue_style("classic-theme-styles");	
	 wp_dequeue_style("global-styles-inline");
}, 100);
// global-styles-inline-css を非表示にする
add_action( 'wp_enqueue_scripts', 'remove_my_global_styles' );
function remove_my_global_styles() {
	wp_dequeue_style( 'global-styles' );
}
// meta name="generator" を非表示にする
remove_action('wp_head', 'wp_generator');
// 絵文字用JS・CSSを非表示にする
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
// EditURIを非表示にする
remove_action('wp_head', 'rsd_link');
/* wlwmanifestの出力を排除する */
remove_action('wp_head', 'wlwmanifest_link');
//デフォで入っているhtml,bodyのmarginを消すため
add_filter( 'show_admin_bar', '__return_false' );
//パンくずリスト 後々追加していきます、多分
function bread() {
    $home = '<li><a href="'.get_bloginfo('url').'" >ホーム</a></li>';
 
    echo '<ul>';
    if ( is_front_page() ) {
    // トップページの場合		
    }
    else if ( is_category() ) {
    // カテゴリページの場合
		the_category();
    }
    else if ( is_archive() ) {
    // 月別アーカイブ・タグページの場合
    }
    else if ( is_single() ) {
    // 投稿ページの場合
		
    }
    else if( is_page() ) {
    // 固定ページの場合
    }
    else if( is_search() ) {
    // 検索ページの場合
    }
    else if( is_404() ) {
    // 404ページの場合
    }
    echo "</ul>";
}
//アーカイブページの有効化
function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'receipe'; //任意のスラッグ名
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );