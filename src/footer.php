
			<section class="footer">
				<div class="inner">
					<div class="left">
						<div class="footer-nav">
							<?php
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object($locations['footer-menu']);
								$menuItems = wp_get_nav_menu_items($menu->term_id);

								foreach($menuItems as $item){
									echo '<a href="' . $item->url . '">' . $item->title . '</a></br>'."\n";
								}

								// function buildNav($menuItems, $parentId){
								// 	$menuHtml = '';
								// 	foreach($menuItems as $item){
								// 		$itemParentId = $item->menu_item_parent;
								// 		if($itemParentId == $parentId){
								// 			$menuHtml .= '<div class="nav-item"><a href="' . $item->url . '">' . $item->title . '</a>'."\n";
								// 			//$menuHtml .= '<div class="sub">' . buildNav($menuItems, $item->ID) . '</div>'."\n";
								// 			$menuHtml .= '</div>'."\n";
								// 		}
								// 	}
		
								// 	$locations = get_nav_menu_locations();
								// 	$menu = wp_get_nav_menu_object($locations['extra-menu']);
								// 	$tertiaryMenuItems = wp_get_nav_menu_items($menu->term_id);
								// 	foreach($tertiaryMenuItems as $item){
								// 		$menuHtml .= '<div class="nav-item mobile"><a href="' . $item->url . '">' . $item->title . '</a></div>'."\n";
								// 	}
								
								// 	return $menuHtml;
								// }
								// echo buildNav($menuItems, 0);
							?>
						</div>

						<div class="small">
							<a href="mailto:contact@buildvisco.com">contact@buildvisco.com</a>
							<div class="phone">1-(888) 926-8028</div>
						</div>
					</div>

					<div class="right">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/footer-logo.svg" alt="VISCO">
						<div class="small">@ <?php echo date( 'Y') ?> VISCO</div>
					</div>
				</div>
			</section>
		</div>


		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
