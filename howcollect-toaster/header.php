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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body　<?php body_class(); ?>>
    <div class="toppage-container">
        <div class="top-header">
            <div class="humburgar"><span></span><span></span><span></span></div>
            <p class="header-title">株式会社ハウコレ</p>
            <form class="search">
                <input type="search" placeholder="ドキュメント名などで検索"/>
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
			<?php //author.phpへのリンク生成
			$author_id = get_the_author_meta( 'ID' );
			$author_posts_url = get_author_posts_url( $author_id );
			$current_user = wp_get_current_user();
			$cuurent_username = $current_user->user_login;
			$user_path = $author_posts_url.$cuurent_username;
			?>		
            <div class="home-profile-btn"><a href="<?php echo $user_path; ?>">
				<?php
				$user = wp_get_current_user();
				echo get_avatar($user->get('ID'), ); // アバター取得// echo してもimgタグで入るので外側に書く必要はない、らしい
				?>				
            </a></div>
        </div>