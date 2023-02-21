<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package howcollect.toaster
 */

get_header();
?>
<div class="top-main-body">
    <?php get_sidebar(); ?>
    <!--コンテンツ-->
    <div class="member-content-wrap">
        <p class="pan">パンくず＞リスト</p>
        <?php 
        $current_user = wp_get_current_user();
        $cuurent_displayname = $current_user->display_name;
        ?>
        <p class="main-content-title"><?php echo $cuurent_displayname; ?>さんのプロフィール</p>                
        <!--メインに表示するコンテンツ-->    
        <div class="profile-wrap">
            <div class="profile-left-wrap">
                <?php //ログイン中のユーザーアバター取得
                $user = wp_get_current_user();
                echo get_avatar($user->get('ID'), ); 
                ?>
            </div>
            <div class="profile-right-wrap">
                <?php //
                $current_user = wp_get_current_user();
                $cuurent_user_name = $current_user->user_name;
                ?>
                <p class="member-name"><?php echo $cuurent_user_name; ?></p>
                <div class="mail">
                    <svg class="mail-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
                    <p class="member-adress"></p>
                </div>    
            </div>
        </div>
        <div class="member-upper-post">
            <h2 class="section-title">最近投稿した記事</h2>
            <ul class="own-document-wrap">
                <li class="main-content new-content"><a href="#">
                    <img src="../image/Frame.png" class="content-thumbnail">
                    <p class="content-title">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル</p>
                    <div class="content-outline">
                        <img src="../image/IMG_7644.JPG" class="content-by-image">
                        <p class="post-date">2023/01/25</p>    
                    </div>
                </a></li>        
            </ul>    
        </div>
        <div class="member-buttom-post">
            <div class="mypost-list-header">
                <div class="description-header">タイトル</div>
                <div class="update-at-header">公開日</div>
                <div class="update-by-header">作成者</div>
            </div>
            <div class="mypost-list-content first-list-content">
                <div class="list-description">タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル</div>
                <div class="update-at">2023/2/10</div>
                <div class="update-by">
                    <img src="../image/IMG_7644.JPG" class ="column-author-image" style="max-width: 40px;">
                    <p class="column-author">Mr ryopimo</p>
                </div>
            </div>
        </div>    
    </div>
<?php get_footer();    