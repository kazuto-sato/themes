<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package howcollect.toaster
 */

get_header();
?>

		<div class="top-main-body">
            <?php get_sidebar(); ?>
            <div class="main-content-wrap">
                <p class="main-content-title">TOP</p>
                <div class="content-wrap">
                    <!--メインに表示するコンテンツ-->
                    <h2 class="section-title">新着記事</h2>
                    <ul class="main-upper-wrap">
					<?php if( have_posts()): ?>
						<?php while (have_posts()): the_post(); ?>													
                        <li class="main-content new-content"><a href="<?php the_permalink();?>">
							<?php 
								if (has_post_thumbnail()):
									the_post_thumbnail();	
								else:
							?>
									<img src="<?php echo esc_url(get_theme_file_uri('image/Frame.png'));?>">
							<?php									
								endif;	
							?>                              
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
						<?php endwhile; ?>
                    <?php else: ?>
						<!--表示すべき投稿が一つもなかった時-->
						<p style="font-size:16px; color: #596164;">記事がありません</p>
					<?php endif; ?>	
                    </ul>             


					<h2 class="section-title">自作記事</h2>
					<ul class="main-upper-wrap">
					<?php
					//$argsのプロパティを変えていく
					$user = wp_get_current_user();//現在のログインユーザー情報取得
                    $user_name = $user-> nick_name;
					$user_id = $user->ID;
					$args = array(
						'post_type' => 'post', 
						'posts_per_page' => -1,
						'no_found_rows' => true,  //ページャーを使う時はfalseに。
						'author_name' => $user_name,
						'author' => $user_id,
					);

					$the_query = new WP_Query($args);
					if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
					?>	
					<li class="main-content new-content"><a href="<?php the_permalink(); ?>">
						<?php 
						if (has_post_thumbnail()) :
							the_post_thumbnail();
						else:
						?>					
						<img src="<?php echo esc_url(get_theme_file_uri('image/Frame.png'));?>">
						<?php endif; ?>
                        <p class="content-title"><?php the_title();?></p>
						<div class="content-outline">
                            <?php 
							echo get_avatar($user->get('ID'), ); // アバター取得// echo してもimgタグで入るので外側に書く必要はない、らしい							
							?>
                            <div class="post-profile">
								<p class="author-name"><?php the_author(); ?></p>
								<p class="post-date"><?php the_time('Y/m/d'); ?></p>    
							</div>	
                        </div>                                                         
                    </a></li>					
					<?php
					endwhile;
					endif;
					wp_reset_postdata();
					?>
					</ul>
					
                </div>
            </div>
        </div>

<?php
get_footer();

