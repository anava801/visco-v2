<?php /* Template Name: Innovation Park Page Template */ get_header(); ?>
	<section class="main-content">
		<div class="inner">
			<div class="content">
				<h1><?php echo the_title() ?></h1>
				<?php echo the_content() ?>
				<div class="cta"><a href="#" target="_blank">Submit Inquiry</a></div>
			</div>
			<?php
				$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail')[0];
				if($featuredImg != ''){
					echo '<div class="image"><img src="' . $featuredImg . '" alt="About Us"></div>';
				}
			?>
		</div>
	</section>

	<section class="about">
		<div class="inner">
			<div class="gradient-header">
				<h2><strong>About</strong> BZI Innovation Park</h2>
				<div class="gradient"></div>
			</div>

			<div class="content">
				<div class="left">
					<img src="<?php echo get_field('map') ?>" alt="BZI Innovation Park">
				</div>
				<div class="right">
					<?php echo get_field('about_content') ?>
				</div>
			</div>

		</div>
	</section>

	<?php
		$project = get_field('featured_project');
		if($project != ''){
	?>
	<section class="featured-project">
		<div class="inner">
			<h2>Featured Project</h2>

			<div class="project">
				<?php 
					$photo = wp_get_attachment_image_src(get_post_thumbnail_id($project->ID), 'single-post-thumbnail')[0];
					$title = $project->post_title;
					$body = $project->post_content;
				?>
				<div class="photo"><img src="<?php echo $photo ?>"></div>
				<div class="content">
					<h3><?php  echo $title ?></h3>
					<?php echo $body ?>
					<a class="btn" href="/projects#p<?php echo $project->ID ?>">Learn More</a>
				</div>
			</div>
		</div>
	</section>
	<?php
		}
	?>

<?php get_footer(); ?>	