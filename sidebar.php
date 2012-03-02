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

	<section class="categories">
		<header>
			<h3><?php _e("Categories") ?></h3>
		</header>
		<ul>
			<?php wp_list_cats() ?>
		</ul>
	</section>
	<section class="archives">
		<header>
			<h3><?php _e("Archives") ?></h3>
		</header>
		<ul>
			<?php wp_get_archives("type=yearly") ?>
		</ul>
	</section>
	<section class="bookmarks">
		<header>
			<h3><?php _e("Worth reading links", 'sunlix') ?></h3>
		</header>
			<?php wp_list_bookmarks("title_li=&category_before=&category_after=&title_before=<h4>&title_after=</h4>") ?>
	</section>

<?php

endif

?>

</aside>