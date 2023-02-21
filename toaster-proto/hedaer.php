<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package howcollect.toaster
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo bloginfo('charset'); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <title><?php wp_title();?></title>
    
    <!-- slick css -->
    <link rel="stylesheet" href="slick/slick.css">

	<?php wp_head(); ?>
</head>
<body>
    <div class="toppage-container">
        <div class="top-header">
            <div class="humburgar"><span></span><span></span><span></span></div>
            <p class="header-title"><a>株式会社ハウコレ</a></p>
            <form class="search">
                <input type="search" placeholder="ドキュメント名などで検索"/>
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="home-profile-btn">
                <a><img src="<?php echo esc_url(get_theme_file_uri('image/IMG_7644.JPG'));?>"></a>
            </div>
        </div>