<?php /* Template Name: Services Page Template */ get_header(); ?>
	<section class="services-header">
		<div class="inner">
			<h1><?php echo the_title() ?></h1>
		</div>
	</section>

	<?php
		$count = 0;
		$query_args = array(  
			'post_type' => 'servicecategory',
			'post_status' => 'publish',
			'posts_per_page' => 100,
			'order' => 'DESC'
		);
		$loop = new WP_Query($query_args);
		$serviceCategories = $loop->posts;
		foreach($serviceCategories as $serviceCategory){
			$title = $serviceCategory->post_title;
			$content = get_field('summary', $serviceCategory->ID); $serviceCategory->post_content;
			$photo = wp_get_attachment_image_src(get_post_thumbnail_id($serviceCategory->ID), 'single-post-thumbnail')[0];
			$count++;
			echo '<section class="service-categories ' . (($count != 0 && $count % 2 == 0) ? 'bg2' : '') . '">'.
				'	<div class="inner">'.
				'		<div class="service">'.
				'			<div class="content">'.
				'				<div class="gradient-header">'.
				'					<h2>' . $title . '</h2>'.
				'					<div class="gradient"></div>'.
				'				</div>'.
				'				' . $content .
				'			</div>'.
				'			<div class="photo"><img src="' . $photo . '" alt="' . $name . '"></div>'.
				'		</div>'.
				'	</div>'.
				'</section>';
		}
	?>

	<section class="services">
		<div class="inner">
			<div class="service-items">
				<?php 
					while( have_rows('services') ) : the_row();
						$title = get_sub_field('title');
						$description = get_sub_field('description');
						$photo = get_sub_field('photo');

						echo '<div class="service">'.
							'	<div class="photo"><img src="' . $photo . '" alt="' . $title . '"></div>'.
							'	<div class="content">'.
							'		<div class="title">' . $title . '</div>'.
							'		' . $description .
							'	</div>'.
							'</div>';
					endwhile;
				?>
			</div>
		</div>
	</section>

	<?php 
		$name = get_field('quote_name');
		$quote = get_field('quote');

		if($quote != ''){
	?>
	<section class="quote">
		<div class="inner">
			<?php echo "\"" . $quote . "\" | " . $name ?>
		</div>
	</section>
	<?php
		}
	?>
<?php get_footer(); ?>	