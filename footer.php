		</div>
		<footer>
			<div class="ym-wrapper">
				<h2 class="ym-hideme"><?php _e("Meta navigation", 'sunlix') ?></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'nav-meta',
						'container' => 'nav',
						'container_class' => 'ym-contain-dt nav-meta',
						'items_wrap' => '<ul>%3$s</ul>',
						'depth' => 1
					));
				?>
			</div>
		</footer>
		<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/all.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				hljs.initHighlightingOnLoad();
				$(".entry .gallery a, .entry .lefty a").attr("rel", "fancybox").fancybox({
					helpers: {
						title: {
							type: "over"
						}
					}
				});
			});
		</script>
		<?php wp_footer(); ?>
	</body>
</html>