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
							'		</br><a class="btn white" href="'. get_site_url() . '/services">Learn More</a>'.
							'	</div>'.
							'</div>';
					}
				?>
			</div>
		</div>
	</section>

	<section class="about">
		<div class="inner">
			<div class="logo"><img src="<?php echo get_field('sp_logo'); ?>" alt="VISCO"></div>
			<div class="right">
				<h3><?php echo get_field('sp_title'); ?></h3>
				<div class="content">
					<div class="body"><?php echo get_field('sp_content'); ?></div>
					<div class="cta">
						<a href="<?php echo get_site_url() ?>/about" class="btn">Learn More</a>
					</div>
				</div>
				<div class="stats-wrapper">
				<?php
					while( have_rows('sp_stats') ) : the_row();
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
		</div>
	</section>

<section class="leadership">
	<div class="inner">
		<h2>Our Leadership</h2>

		<div class="content"><?php echo get_field('leadership_content'); ?></div>

		<div class="bios">
			<?php
				$page = get_page_by_path( 'about' );
				while( have_rows('bios', $page->ID) ) : the_row();
					$name = get_sub_field('name');
					$title = get_sub_field('title');
					$bio = get_sub_field('bio');
					$photo = get_sub_field('photo');
					$bioLink = get_sub_field('bio_link');
					$bioLinkLabel = get_sub_field('bio_link_label');
					$bioLinkLabel = $bioLinkLabel == '' ? 'Read More' : $bioLinkLabel;

					echo '<div class="bio">';
					if($bioLink != ''){
						echo '	<div class="photo"><a href="' . $bioLink . '" target="_blank"><img src="' . $photo . '" alt="' . $name . '"></a></div>';
					}else{
						echo '	<div class="photo"><img src="' . $photo . '" alt="' . $name . '"></div>';
					}
						
					echo '	<div class="content">'.
						'		<div class="name-container">'.
						'			<div class="name">' . $name . '</div>'.
						'			<div class="title">' . $title . '</div>'.
						'		</div>'.
						'	</div>'.
						'</div>';
				endwhile;
			?>
		</div>
		
		<a href="<?php echo get_site_url() ?>/about" class="btn">Learn More</a>
	</div>
</section>

	<section class="featured-projects">
		<div class="inner">
			<h2>Featured Projects</h2>
			
			<?php
				while( have_rows('featured_projects') ) : the_row();
					$title = get_sub_field('title');
					$description = get_sub_field('description');
					$photo = get_sub_field('photo');
					$link = get_sub_field('link');
				?>
				<div class="project">
					<div class="photo"><img src="<?php echo $photo ?>"></div>
					<div class="content">
						<h3><?php  echo $title ?></h3>
						<?php echo $description ?>
						<div><a class="btn white" href="<?php echo $link ?>">Learn More</a></div>
					</div>
				</div>
			<?php
				endwhile;
			?>
		</div>
	</section>

	<section class="related-links">
		<div class="inner">
			<h2>Related Links</h2>
			<div class="links">
				<?php 
					while( have_rows('related_links') ) : the_row();
						$body = get_sub_field('body');
						$link = get_sub_field('link');
						$logo = get_sub_field('logo');

						echo '<div class="link">'.
							'	<div class="logo">'.
							'		<a href="' . $link . '" target="_blank"><img src="' . $logo . '" alt="' . $body . '"></a>'.
							'		<div class="arrow"><a href="' . $link . '" target="_blank"><img src="' . esc_url( get_template_directory_uri()) . '/img/icons/pill-arrow-horizontal.svg"></a></div>'.
							'	</div>'.
							'	<p><a href="' . $link . '" target="_blank">' . $body . '</a></p>'.
							'	<a class="arrow-desktop" href="' . $link . '" target="_blank"><img src="' . esc_url( get_template_directory_uri()) . '/img/icons/pill-arrow-horizontal.svg"></a>'.
							'</div>';
					endwhile;
				?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>	