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
<div class="article-main-body">
		<?php get_sidebar(); ?>
		<!--コンテンツ-->
		<div class="single-page-wrap">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<div class="receipe-outline">
				<p class="pan"><?php bread(); ?></p>
				<div class="outline-title-wrap">
					<svg class="outline-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
					<p class="outline-title"><?php the_title();?></p>
				</div>
				<ul class="outline">
					<?php /*
					<li class="outline-list"><a href="#list-1"><span>1</span></a></li>
					<li class="outline-list"><a href="#list-2"><span>2</span></a></li>
					<li class="outline-list"><a href="#list-3"><span>3</span></a></li>
					<li class="outline-list"><a href="#list-4"><span>4</span></a></li>
					*/?>
				</ul>
				<div class="update-by"><a href="#">
					<?php 
					$author_id = get_the_author_meta('ID');
					echo get_avatar($author_id); // アバター取得// echo してもimgタグで入るので外側に書く必要はない、らしい
					?>
					<p class="column-author"><?php the_author();?></p>
				</a></div>
			</div>
			<div class="receipe-content-wrap">
				<p class="receipe-title"><?php the_title(); ?></p>
				<p class="receipe-posted-date"><?php the_time('Y/m/d'); ?></p>
				<?php 
					if (has_post_thumbnail()):
						the_post_thumbnail();	
					else:?>
						<img src="<?php echo esc_url(get_theme_file_uri('image/Frame.png'));?>">
					<?php									
					endif;	
				?> 					
				<?php 
				the_content();
				?>
			</div>
			<?php endwhile; endif; ?>	
		</div>
	</div>     
<?php get_footer();
