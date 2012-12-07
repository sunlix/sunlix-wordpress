<?php

/*
 * sidebar
 */
?>

<aside class="ym-col1">
	<h2 class="ym-hideme"><?php _e("Sidebar", 'sunlix') ?></h2>

<?php

if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) :

?>

	<?php get_search_form() ?>

	<section class="ym-contain-oh categories">
		<header>
			<h3><?php _e("Categories") ?></h3>
		</header>
		<ul>
			<?php wp_list_cats() ?>
		</ul>
	</section>
	<section class="ym-contain-oh archives">
		<header>
			<h3><?php _e("Archives") ?></h3>
		</header>
		<ul class="linearize-level-1">
			<?php wp_get_archives("type=yearly") ?>
		</ul>
	</section>

<?php

endif

?>

</aside>
