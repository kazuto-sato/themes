<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package howcollect.toaster
 */

get_header();
?>
 <div class="top-main-body">
            <?php get_sidebar(); ?>
            <div class="column-content-wrap">
                <p class="pan">パンくず＞リスト</p>
                <p class="main-content-title"><?php the_archive_title();?></p>
                <!--アーカイブのメインに表示するコンテンツ-->
                <div class="column-container">
                    <div class="column-header">
                        <div class="column-name-header">用語</div>
                        <div class="column-description-header">説明</div>
                        <div class="update-at-header">登録日時</div>
                        <div class="update-by-header">作成者</div>
                    </div>
                    <!--用語集が一つずつ入っていく-->
                    <?php
                     $args = array(
                    'post_type' => 'words',// 投稿タイプを指定
                    'posts_per_page' => 100,// 表示する記事数
                    );
                    $news_query = new WP_Query( $args );
                    if ( $news_query->have_posts() ): 
                        while ( $news_query->have_posts() ):  
                            $news_query->the_post(); 
                    ?>
                    <div class="column-content">
                        <div class="column-name"><?php the_title(); ?></div>
                        <div class="column-description"><?php the_content(); ?></div>
                        <div class="update-at"><?php the_time('Y/m/d'); ?></div>
                        <div class="update-by"><a href="<?php the_permalink(); ?>">
                            <?php $author_id = get_the_author_meta('ID');
							echo get_avatar($author_id); 
                            // アバター取得// echo してもimgタグで入るので外側に書く必要はない、らしい ?>
                            <p class="column-author"><?php the_author(); ?></p>
                        </a></div>
                    </div>  
                    <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>                                             
                </div>                                        
            </div>
        </div>
<?php
get_footer();
