<?php /* Template Name: About Page Template */ get_header(); ?>	
	<section class="main-content">
		<div class="inner">
			<div class="content">
				<h1><?php echo the_title() ?></h1>
				<?php echo the_content() ?>
			</div>
			<?php
				$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail')[0];
				if($featuredImg != ''){
					echo '<div class="image"><img src="' . $featuredImg . '" alt="About Us"></div>';
				}
			?>
		</div>
	</section>

	<section class="leadership">
		<div class="inner">
			<div class="gradient-header">
				<h2>Our Leadership</h2>
				<div class="gradient"></div>
			</div>

			<div class="bios">
				<?php 
					while( have_rows('bios') ) : the_row();
						$name = get_sub_field('name');
						$title = get_sub_field('title');
						$bio = get_sub_field('bio');
						$photo = get_sub_field('photo');
						$bioLink = get_sub_field('bio_link');
						$bioLinkLabel = get_sub_field('bio_link_label');
						$bioLinkLabel = $bioLinkLabel == '' ? 'Read More' : $bioLinkLabel;

						echo '<div class="bio">'.
							'	<div class="photo"><img src="' . $photo . '" alt="' . $name . '"></div>'.
							'	<div class="content">'.
							'		<div class="name-container">'.
							'			<div class="name">' . $name . '</div>'.
							'			<div class="title">' . $title . '</div>'.
							'		</div>'.
							'		<p>' . $bio . '</p>';
						if($bioLink != ''){
							echo '		<a href="' . $bioLink . '" class="btn" target="_blank">' . $bioLinkLabel . '</a>';
						}
						echo '	</div>'.
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