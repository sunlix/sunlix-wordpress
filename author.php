<?php

/*
 * list all articles of author
 */

get_header()

?>

<div class="ym-column linearize-level-1">

<?php

	get_sidebar()

?>

	<div class="ym-col3">
		<h2 class="ym-hideme"><?php _e("Content") ?></h2>

<?php

	if(have_posts()) :
		the_post()

?>

		<h3><?php printf(__('All articles by %1$s', 'sunlix'), get_the_author()) ?></h3>

<?php

		rewind_posts();

		sxPaging();

		while (have_posts()) :
			the_post();

			get_template_part('content', get_post_format());

		endwhile;

		sxPaging();

	else:

		get_template_part("404");

	endif

?>

	</div>
</div>

<?php

get_footer();
