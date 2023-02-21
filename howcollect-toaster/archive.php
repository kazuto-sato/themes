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
            <div class="archive-content-wrap">
                <p class="pan">パンくず＞リスト</p>
                <p class="main-content-title">レシピ一覧</p>
                <!--アーカイブのメインに表示するコンテンツ-->
                <ul class="main-archive-wrap">
					<?php if(have_posts()): while(have_posts()): the_post(); ?>
                    <li class="main-content new-content"><a href="<?php the_permalink(); ?>">
                        <?php 
						if (has_post_thumbnail()):
							the_post_thumbnail();
						else: ?>
						<img src="<?php echo esc_url(get_theme_file_uri('image/Frame.png'));?>">
						<?php endif; ?>
                        <p class="content-title"><?php the_title(); ?></p>
                        <div class="content-outline">
							<?php 
								$author_id = get_the_author_meta('ID');
								echo get_avatar($author_id); // アバター取得// echo してもimgタグで入るので外側に書く必要はない、らしい
							?>	
                            <div class="post-profile">
								<p class="author-name"><?php the_author(); ?></p>
								<p class="post-date"><?php the_time('Y/m/d'); ?></p>    
							</div>	
                        </div>
                    </a></li>
					<?php endwhile; endif; ?>
                </ul>                                        
            </div>
        </div>
<?php
get_footer();
