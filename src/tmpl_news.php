<?php /* Template Name: News Page Template */ get_header(); ?>
	<section class="news">
		<div class="inner">
			<h1>News</h1>

			<div class="news-container">
				<?php 
					$args = array('numberposts' => 100);
					$posts = get_posts($args);
					foreach ($posts as $post){
						$title = $post->post_title;
						$content = wp_trim_words( $post->post_content, 51, '...' );
						$photo = get_the_post_thumbnail_url($post->ID, 'full');
						$flipped = $itemCount % 2 == 0 ? "" : "flipped";

						echo '<article>'.
							'	<div class="photo"><img src="' . $photo . '" alt="' . $name . '"></div>'.
							'	<div class="content">'.
							'		<div class="title">' . $title . '</div>'.
							'		' . $content .
							'		</br><a class="btn white" href="' . get_permalink($post->ID) . '">Learn More</a>'.
							'	</div>'.
							'</article>';
					}
				?>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>	