<?php /* Template Name: Home Page Template */ get_header(); ?>	

	<section class="hero">
		<?php 
			$heading = get_field('hero_heading');
			$body = get_field('hero_body');
			$image = get_field('hero_photo');
		?>
		<div class="image">
			<img src="<?php echo $image ?>">
		</div>
		<div class="inner">
			<div class="content">
				<h1><?php echo $heading ?></h1>
				<p><?php echo $body ?></p>
			</div>
		</div>
	</section>

	<section class="stats">
		<div class="inner">
			<div class="content">
				<?php echo get_field('stats_body'); ?>
			</div>

			<div class="stats-wrapper">
			<?php
				while( have_rows('stats') ) : the_row();
					$label = get_sub_field('label');
					$number = get_sub_field('number');

					echo '<div class="stat">'.
						'	<div class="number">' . $number . '</div>'.
						'	<div class="label">' . $label . '</div>'.
						'</div>';
				endwhile;
			?>
			</div>
		</div>
	</section>

	<section class="industries">
		<div class="inner">
			<?php
				while( have_rows('industries') ) : the_row();
					$title = get_sub_field('title');
					$photo = get_sub_field('photo');

					echo '<div class="industry">'.
						'	<div class="image"><img src="' . $photo . '" alt="' . $title . '"></div>'.
						'	<div class="title">' . $title . '</div>'.
						'</div>';
				endwhile;
			?>
			</div>
		</div>
	</section>

	<section class="services">
		<div class="inner">
			<h2>Services</h2>

			<div class="services-container">
				<?php 
					$itemCount = 0;
					$query_args = array(  
						'post_type' => 'servicecategory',
						'post_status' => 'publish',
						'posts_per_page' => 100,
						'order' => 'DESC'
					);
					$loop = new WP_Query($query_args);
					$services = $loop->posts;
					foreach($services as $service){
						$title = $service->post_title;
						$content = get_field('summary', $service->ID); $service->post_content;
						$photo = wp_get_attachment_image_src(get_post_thumbnail_id($service->ID), 'single-post-thumbnail')[0];
						$itemCount++;
						$flipped = $itemCount % 2 == 0 ? "" : "flipped";

						echo '<div class="service ' . $flipped . '">'.
							'	<div class="photo"><img src="' . $photo . '" alt="' . $name . '"></div>'.
							'	<div class="content">'.
							'		<div class="title">' . $title . '</div>'.
							'		' . $content .
							'		</br><a class="btn white" href="/services">Learn More</a>'.
							'	</div>'.
							'</div>';
					}
				?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>	