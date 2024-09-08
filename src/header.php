<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?></title>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.typekit.net/qwz1lzg.css">

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

		<!-- UIkit -->
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()) ?>/css/uikit.css" />
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.12/dist/js/uikit-icons.min.js"></script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>
		<script>
			// conditionizr.com
			// configure environment tests
			conditionizr.config({
				assets: '<?php echo esc_url( get_template_directory_uri() ); ?>',
				tests: {}
			});

			$(document).ready(function(){
				$('#nav-icon4').click(function(){
					$(this).toggleClass('open');
					$('header, nav').toggleClass('open');
					$('body').toggleClass('no-scroll');
				});
			});
		</script>

	</head>
	<body <?php body_class(); ?>>
		<div class="wrapper">
			<header class="header clear" role="banner" uk-sticky>
				<div class="logo">
					<a href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.svg" alt="Logo" class="logo-img">
					</a>
				</div>

				<nav>
					<div id="main-nav">
					<?php
						$locations = get_nav_menu_locations();
						$menu = wp_get_nav_menu_object($locations['header-menu']);
						$menuItems = wp_get_nav_menu_items($menu->term_id);
						function buildNav($menuItems, $parentId){
							$menuHtml = '';
							foreach($menuItems as $item){
								$itemParentId = $item->menu_item_parent;
								if($itemParentId == $parentId){
									$menuHtml .= '<div class="nav-item"><a class="' . (get_the_ID() == $item->object_id ? 'active' : '') . '" href="' . $item->url . '">' . $item->title . '</a>'."\n";
									//$menuHtml .= '<div class="sub">' . buildNav($menuItems, $item->ID) . '</div>'."\n";
									$menuHtml .= '</div>'."\n";
								}
							}

							$locations = get_nav_menu_locations();
							$menu = wp_get_nav_menu_object($locations['extra-menu']);
							$tertiaryMenuItems = wp_get_nav_menu_items($menu->term_id);
							foreach($tertiaryMenuItems as $item){
								$menuHtml .= '<div class="nav-item mobile"><a href="' . $item->url . '">' . $item->title . '</a></div>'."\n";
							}
						
							return $menuHtml;
						}
						echo buildNav($menuItems, 0);

						// foreach($tertiaryMenuItems as $item){
						// 	echo '<div class="nav-item mobile"><a href="' . $item->url . '">' . $item->title . '</a></div>'."\n";
						// }
					?>
					</div>
				</nav>

				<div id="secondary-nav">
					<?php
						$locations = get_nav_menu_locations();
						$menu = wp_get_nav_menu_object($locations['extra-menu']);
						$tertiaryMenuItems = wp_get_nav_menu_items($menu->term_id);
						foreach($tertiaryMenuItems as $item){
							echo '<a href="' . $item->url . '">' . $item->title . '</a>'."\n";
						}
					?>
				</div>

				<div id="nav-icon4">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</header>
