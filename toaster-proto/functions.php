<?php
/**
 * howcollect.toaster functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package howcollect.toaster
 */



//CSSの読み込み
function my_enqueue_styles(){
	wp_enqueue_style('ress', '/css/reset.css', array(), false, 'all');
	wp_enqueue_style('style', get_stylesheet_uri(), array('ress'), false, 'all');	
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');


add_action('init',function(){
	//用語集カスタム投稿タイプ
	register_post_type('words',[
		'label' => '用語一覧',
		'menu_position' => 4,
		'menu_icon'=>'dashicons-admin-generic',
		'public' => true
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

