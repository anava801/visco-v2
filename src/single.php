<?php get_header(); ?>

	<section class="news-header">
		<div class="inner">
			<h1>News</h1>
			<?php
				if ( have_posts() ) : while (have_posts() ) : the_post();
					$readTimeInMinutes = round(str_word_count($post->post_content)/200);
					$readTimeInMinutes = ($readTimeInMinutes == 0) ? 1 : $readTimeInMinutes;
					//$category = get_the_category($post->ID)[0]->name;
					//$categoryId = get_the_category($post->ID)[0]->cat_ID;
			?>
			<div class="title"><?php echo $post->post_title ?></div>
			<div class="post-meta">
				<div class="date"><?php the_time("M j") ?></div>
				<div class="read-time"><?php echo $readTimeInMinutes ?> Minute Read</div>
			</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</section>
	
	<section class="article">
		<div class="inner">
			<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
				<?php
					$postImage = get_the_post_thumbnail_url($post->ID, 'full');
					$readTimeInMinutes = round(str_word_count($post->post_content)/200);
					$readTimeInMinutes = ($readTimeInMinutes == 0) ? 1 : $readTimeInMinutes;
					$category = get_the_category($post->ID)[0]->name;
					$categoryId = get_the_category($post->ID)[0]->cat_ID;
				?>
				<article class="post page featured">
					<?php
						if($postImage != '') echo '<img src="'. $postImage .'" alt="' . $post->post_title . '"><div class="divider"></div>';
					?>
					<div class="content"><?php echo the_content() ?></div>
					<?php //comments_template(); ?>
					<div class="divider"></div>
				</article>
			<?php endwhile; ?>

			<?php else : ?>
				<article>
					<h1><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
				</article>
			<?php endif; ?>

			<div class="btn-wrapper">
				<a href="/news" class="btn">View All Posts</a>
				<div class="line"></div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
