<?php

/*
 * standard article output for listings, single and page view
 */

if (is_single()) :

?>

<nav class="ym-contain-dt no-margin">
	<h4 class="ym-hideme"><?php _e('Article navigation', 'sunlix'); ?></h4>
	<?php previous_post_link("%link", "&larr; %title"); ?>
	<?php next_post_link("%link", "%title &rarr;"); ?>
</nav>

<?php

endif

?>

<article>
	<header>

<?php

	if (is_single() || is_page()) :

?>

		<h3>
			<?php the_title(); edit_post_link(__("Edit"), ' <span class="warning">// ', "</span>") ?>
		</h3>

<?php

	else :

?>

		<h4>
			<a href="<?php the_permalink() ?>" title="<?php printf(__('Read article %1$s', 'sunlix'), '&bdquo;'. get_the_title() .'&ldquo;') ?>"><?php the_title() ?></a>
		</h4>

<?php

	endif

?>

	</header>
	<div class="ym-contain-dt entry">

<?php

	if (is_single() || is_page()) :

		the_content();

	else :

		the_excerpt();

	endif;

	wp_link_pages();

?>

	</div>

<?php

if (!is_page()) :

?>

	<footer>
		<div class="ym-contain-dt author">
			<small>

			<?php

				printf(__('Published by %1$s on %2$s in %3$s', 'sunlix'),
					'<a href="'. esc_url(get_author_posts_url(get_the_author_meta('ID'))) .'" title="'. esc_attr(sprintf(__('View all articles by %1$s', 'sunlix'), get_the_author())) .'">'. get_the_author() .'</a>',
					esc_html(get_the_time(get_option("date_format"))),
					get_the_category_list(", ")
				);

				?>
			</small>
		</div>
		<p class="ym-contain-dt social">
			<a class="btn comment" href="<?php comments_link() ?>" title="<?php printf(__('Comment the article %1$s', 'sunlix'), '&bdquo;'. get_the_title() .'&ldquo;') ?>">
				<span>
					<?php _e("Comments") ?>
				</span>
				<span>
					<span><?php comments_number("0", "1", "%") ?></span>
				</span>
			</a>
		</p>
	</footer>

<?php

endif;

if (is_single()) :

	comments_template();

endif

?>

</article>

<?php

if (is_single()) :

?>

<nav class="ym-contain-dt">
	<h4 class="ym-hideme"><?php _e('Article navigation', 'sunlix'); ?></h4>
	<?php previous_post_link("%link", "&larr; %title"); ?>
	<?php next_post_link("%link", "%title &rarr;"); ?>
</nav>

<?php

endif

?>
