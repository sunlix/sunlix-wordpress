		</div>
		<footer>
			<nav id="nav-meta" class="ym-hlist nav-meta">
				<div class="ym-wrapper ym-clearfix">
					<h2 class="ym-hideme"><?php _e("Meta navigation", 'sunlix') ?></h2>
					<?php
						wp_nav_menu(array(
							'theme_location'	=> 'nav-meta',
							'container'			=> 'nav',
							'container_class'	=> 'ym-contain-dt nav-meta',
							'items_wrap'		=> '<ul class="linearize-level-2">%3$s</ul>',
							'depth'				=> 1
						));
					?>
				</div>
			</nav>
		</footer>
		<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/yaml-focusfix.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.libs.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.settings.min.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
