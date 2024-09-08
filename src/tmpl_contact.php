<?php /* Template Name: Contact Page Template */ get_header(); ?>	
	<section class="content">
		<div class="inner">
			<div class="content">
				<h1><?php echo the_title() ?></h1>
				<?php echo the_content() ?>
			</div>

			<div class="map">
				<?php
					$mapEmbed = get_field('map_embed_code');
					if($mapEmbed != ''){
						echo  $mapEmbed;
					}
				?>
				<h3>Headquarters</h3>
				<div class="headquarters-content">
					<div class="address">
						<?php echo get_field('address') ?>
					</div>
					<div class="contact">
						<?php echo get_field('contact_info') ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>	