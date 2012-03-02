<?php

/*
 * displays a single page
 * note: without comments, pages won't used for comments
 */

get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post()

?>

		<h2 class="ym-hideme"><?php _e("Content") ?></h2>

<?php

		get_template_part('content', get_post_format());

	endwhile;

else :

	get_template_part("404");

endif;

get_footer();