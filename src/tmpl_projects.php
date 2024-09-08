<?php /* Template Name: Projects Page Template */ get_header(); ?>
	<section class="main-content">
		<div class="inner">
			<div class="content">
				<h1><?php echo the_title() ?></h1>
				<?php echo the_content() ?>
				<?php
					$url = get_field('progress_cam_url');
					if($url != ''){
						echo '<div class="cta play-icon"><a href="' . $url . '" target="_blank">View Progress Cam</a><img src="' . esc_url( get_template_directory_uri() ) . '/img/play.png" alt="play"></div>';
					}
				?>
			</div>
			<?php
				$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail')[0];
				if($featuredImg != ''){
					echo '<div class="image"><img src="' . $featuredImg . '" alt="About Us"></div>';
				}
			?>
		</div>
	</section>

	<section class="case-studies">
		<div class="inner">
			<div class="gradient-header">
				<h2>Case Studies</h2>
				<div class="gradient"></div>
			</div>

			<div class="case-studies-outer">
				<?php 
					$itemCount = 0;
					$query_args = array(  
						'post_type' => 'casestudies',
						'post_status' => 'publish',
						'posts_per_page' => 100,
						'order' => 'DESC'
					);
					$loop = new WP_Query($query_args);
					$caseStudies = $loop->posts;
					foreach($caseStudies as $caseStudy){
						$title = $caseStudy->post_title;
						$content = $caseStudy->post_content;
						$photo = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID), 'single-post-thumbnail')[0];
						$itemCount++;
						$flipped = $itemCount % 2 == 0 ? "flipped" : "";

						echo '<div class="case-study ' . $flipped . '">'.
							'	<div class="photo"><img src="' . $photo . '" alt="' . $name . '"></div>'.
							'	<div class="content">'.
							'		<div class="title">' . $title . '</div>'.
							'		' . $content .
							'	</div>'.
							'</div>';
					}
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
						'post_type' => 'services',
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
							'		</br><a class="btn" href="/services">Learn More</a>'.
							'	</div>'.
							'</div>';
					}
				?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>	